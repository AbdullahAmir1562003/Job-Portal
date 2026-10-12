<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobApplicationController extends Controller
{
    /**
     * Store a seeker's job application.
     */
    public function store(Request $request, JobPost $jobPost): RedirectResponse
    {
        if (! $request->user()->isSeeker()) {
            abort(403, 'Only job seekers can apply for jobs.');
        }

        $existing = JobApplication::where('job_post_id', $jobPost->id)
            ->where('user_id', $request->user()->id)
            ->first();

        if ($existing) {
            return back()->with('status', 'You have already applied for this job.');
        }

        $request->validate([
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'cover_letter' => ['nullable', 'string', 'max:2000'],
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        JobApplication::create([
            'job_post_id' => $jobPost->id,
            'user_id' => $request->user()->id,
            'resume_path' => $resumePath,
            'cover_letter' => $request->cover_letter,
        ]);

        return back()->with('status', 'Application submitted successfully!');
    }

    /**
     * View seeker's submitted applications.
     */
    public function myApplications(Request $request): View
    {
        $applications = JobApplication::with('jobPost')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(10);

        return view('jobs.my-applications', compact('applications'));
    }

    /**
     * View applications received for a specific job (Employer only).
     */
    public function viewJobApplicants(Request $request, JobPost $jobPost): View
    {
        if ($jobPost->user_id !== $request->user()->id) {
            abort(403);
        }

        $applications = $jobPost->hasMany(JobApplication::class)
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('jobs.applicants', compact('jobPost', 'applications'));
    }
}