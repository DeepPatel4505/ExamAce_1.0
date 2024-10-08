@extends('layouts.app')

@section('content')
<div class="job-details">
    <a href="{{ url()->previous() }}" class="back-button">Back</a>

    <h1>Edit Job: {{ $job->title }}</h1>

    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" required>
        </div>

        <div class="form-group">
            <label for="organization">Organization:</label>
            <input type="text" id="organization" name="organization" value="{{ old('organization', $job->organization) }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}" required>
        </div>

        <div class="form-group">
            <label for="eligibility">Eligibility:</label>
            <textarea id="eligibility" name="eligibility" required>{{ old('eligibility', $job->eligibility) }}</textarea>
        </div>

        <div class="form-group">
            <label for="vacancies">Vacancies:</label>
            <input type="number" id="vacancies" name="vacancies" value="{{ old('vacancies', $job->vacancies) }}" required>
        </div>

        <div class="form-group">
            <label for="application_start_date">Application Start Date:</label>
            <input type="date" id="application_start_date" name="application_start_date" value="{{ old('application_start_date', $job->application_start_date->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="application_end_date">Application End Date:</label>
            <input type="date" id="application_end_date" name="application_end_date" value="{{ old('application_end_date', $job->application_end_date->format('Y-m-d')) }}" required>
        </div>

        <div class="tags-container">
            <strong>Tags:</strong>
            @foreach ($job->tags as $tag)
            <span class="tag-badge">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $job->tags->contains($tag) ? 'checked' : '' }}>
                <label>{{ $tag->name }}</label>
            </span>
            @endforeach
        </div>

        <div class="admin-options">
            <button type="submit" class="edit-link">Update Job</button>

        </div>
    </form>
</div>
@endsection
