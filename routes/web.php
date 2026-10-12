<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public homepage redirects to jobs listing
Route::get('/', function () {
    return redirect()->route('jobs.index');
});

// Public job browse & detail routes
Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{jobPost}', [JobPostController::class, 'show'])->name('jobs.show');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Seeker Application Routes
    Route::post('/jobs/{jobPost}/apply', [JobApplicationController::class, 'store'])->name('applications.store');
    Route::get('/my-applications', [JobApplicationController::class, 'myApplications'])->name('applications.my');

    // Employer Job Management Routes (Protected by employer middleware)
    Route::middleware('employer')->group(function () {
        Route::get('/job/create', [JobPostController::class, 'create'])->name('jobs.create');
        Route::post('/job', [JobPostController::class, 'store'])->name('jobs.store');
        Route::get('/my-jobs', [JobPostController::class, 'myJobs'])->name('jobs.my-jobs');
        Route::delete('/jobs/{jobPost}', [JobPostController::class, 'destroy'])->name('jobs.destroy');
        Route::get('/jobs/{jobPost}/applicants', [JobApplicationController::class, 'viewJobApplicants'])->name('jobs.applicants');
    });

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';