<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Job;


class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::query();

        // Apply filters
        if ($request->filled('search')) {
            $jobs->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('job_type')) {
            $jobs->where('job_type', $request->job_type);
        }

        // Apply pagination and sorting
        $jobs = $jobs->orderBy('created_at', 'desc')->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
}
