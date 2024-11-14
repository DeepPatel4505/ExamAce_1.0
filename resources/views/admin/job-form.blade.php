@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">{{ isset($job) ? 'Edit' : 'Add' }} Job</h1>

    <form action="{{ isset($job) ? route('admin.jobs.update', $job->id) : route('admin.jobs.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @if (isset($job))
        @method('PUT')
        @endif

        <!-- Job Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
            <input type="text" name="title" id="title" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('title', $job->title ?? '') }}" required>
        </div>

        <!-- Organization -->
        <div class="mb-4">
            <label for="organization" class="block text-sm font-medium text-gray-700">Organization</label>
            <input type="text" name="organization" id="organization" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('organization', $job->organization ?? '') }}" required>
        </div>

        <!-- Job Type -->
        <div class="mb-4">
            <label for="job_type" class="block text-sm font-medium text-gray-700">Job Type</label>
            <select id="job_type" name="job_type" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" required>
                <option value="Government" {{ old('job_type', $job->job_type ?? '') == 'Government' ? 'selected' : '' }}>Government</option>
                <option value="Private" {{ old('job_type', $job->job_type ?? '') == 'Private' ? 'selected' : '' }}>Private</option>
            </select>
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('location', $job->location ?? '') }}" required>
        </div>

        <!-- Eligibility -->
        <div class="mb-4">
            <label for="eligibility" class="block text-sm font-medium text-gray-700">Eligibility</label>
            <select id="eligibility" name="eligibility" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" required>
                <option value="">Select eligibility</option>
                <option value="10th" {{ old('eligibility', $job->eligibility ?? '') == '10th' ? 'selected' : '' }}>10th Pass</option>
                <option value="12th" {{ old('eligibility', $job->eligibility ?? '') == '12th' ? 'selected' : '' }}>12th Pass</option>
                <option value="graduate" {{ old('eligibility', $job->eligibility ?? '') == 'graduate' ? 'selected' : '' }}>Graduate</option>
                <option value="post_graduate" {{ old('eligibility', $job->eligibility ?? '') == 'post_graduate' ? 'selected' : '' }}>Post Graduate</option>
            </select>
        </div>

        <!-- Vacancies -->
        <div class="mb-4">
            <label for="vacancies" class="block text-sm font-medium text-gray-700">Vacancies</label>
            <input type="number" name="vacancies" id="vacancies" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('vacancies', $job->vacancies ?? '') }}" required>
        </div>

        <!-- Application Start Date -->
        <div class="mb-4">
            <label for="application_start_date" class="block text-sm font-medium text-gray-700">Application Start Date</label>
            <input type="date" name="application_start_date" id="application_start_date" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900"
                value="{{ old('application_start_date', isset($job) && $job->application_start_date ? \Carbon\Carbon::parse($job->application_start_date)->format('Y-m-d') : '') }}"
                required>
        </div>

        <!-- Application End Date -->
        <div class="mb-4">
            <label for="application_end_date" class="block text-sm font-medium text-gray-700">Application End Date</label>
            <input type="date" name="application_end_date" id="application_end_date" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900"
                value="{{ old('application_end_date', isset($job) && $job->application_end_date ? \Carbon\Carbon::parse($job->application_end_date)->format('Y-m-d') : '') }}"
                required>
        </div>

        <!-- Job Status -->
        <div class="mb-4">
            <label for="job_status" class="block text-sm font-medium text-gray-700">Job Status</label>
            <select id="job_status" name="job_status" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" required>
                <option value="Open" {{ old('job_status', $job->job_status ?? '') == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="Closed" {{ old('job_status', $job->job_status ?? '') == 'Closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <!-- Save Button -->
        <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Save</button>
    </form>
</div>
@endsection