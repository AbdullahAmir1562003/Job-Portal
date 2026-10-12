<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobPostController extends Controller
{
    /**
     * Display a listing of all jobs (Public/Job Seekers).
     */
    public function index(Request $request): View
    {
        $query = JobPost::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->input('job_type'));
        }

        $jobs = $query->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job post (Employer only).
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created job post in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'in:Full-time,Part-time,Remote,Internship'],
            'salary' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $request->user()->jobPosts()->create($validated);

        return redirect()->route('jobs.index')->with('status', 'Job posted successfully!');
    }

    /**
     * Display the specified job post.
     */
    public function show(JobPost $jobPost): View
    {
        $jobPost->load('user');
        return view('jobs.show', compact('jobPost'));
    }

    /**
     * Show employer's own job postings.
     */
    public function myJobs(Request $request): View
    {
        $jobs = $request->user()->jobPosts()->latest()->paginate(10);
        return view('jobs.my-jobs', compact('jobs'));
    }

    /**
     * Remove the specified job post.
     */
    public function destroy(Request $request, JobPost $jobPost): RedirectResponse
    {
        if ($jobPost->user_id !== $request->user()->id) {
            abort(403);
        }

        $jobPost->delete();

        return redirect()->route('jobs.my-jobs')->with('status', 'Job post deleted successfully!');
    }
}