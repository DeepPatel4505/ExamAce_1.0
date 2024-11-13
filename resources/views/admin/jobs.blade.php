@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Jobs</h1>
    
    <!-- Search Form -->
    <form action="{{ route('admin.jobs.index') }}" method="GET" class="search-form-container">
    <input type="text" name="search" placeholder="Search exams" class="form-control" value="{{ $search }}">
    <button type="submit" class="btn btn-primary">Search</button>
</form>


    <!-- Jobs Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="{{ route('admin.jobs.index', ['sort' => 'title']) }}">Title</a></th>
                <th><a href="{{ route('admin.jobs.index', ['sort' => 'location']) }}">Location</a></th>
                <th>Eligibility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->title }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->eligibility }}</td>
                <td>
                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('admin.jobs.destroy', $job->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $jobs->links('pagination.default') }}
</div>
@endsection
