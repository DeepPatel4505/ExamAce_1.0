@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ isset($job) ? 'Edit' : 'Add' }} Job</h1>

    <form action="{{ isset($job) ? route('admin.jobs.update', $job->id) : route('admin.jobs.create') }}" method="POST">
        @csrf
        @if (isset($job))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $job->title ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $job->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $job->location ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection
