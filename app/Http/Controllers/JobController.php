<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

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
        $job = Job::with('tags')->findOrFail($id);
        session(['previous_url' => url()->previous()]);
        return view('jobs.show', compact('job'));
    }

    public function edit($id) // Ensure this uses route model binding
    {
        $job = Job::with('tags')->findOrFail($id);
        //dd($job);
        //dd($job->tags());
        return view('jobs.edit', compact('job'));
    }


    public function update(Request $request, Job $job) // Use Request and Job model binding
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'eligibility' => 'required|string',
            'vacancies' => 'required|integer',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date',
            'tags' => 'array',
        ]);
        if (!$job->id) {
            dd("Job ID is null");
        }
        // Update the job with validated data
        $job->update($validatedData);

        // Sync the tags if applicable
        if (isset($validatedData['tags'])) {
            $job->tags()->sync($validatedData['tags']);
        }

        // Redirect back to the job index with a success message
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id) // Using route model binding
    {
        $job = Job::findOrFail($id);
        if ($job) $job->delete();
        return redirect(session('previous_url'))->with('success', 'Job deleted successfully.');
    }
}
