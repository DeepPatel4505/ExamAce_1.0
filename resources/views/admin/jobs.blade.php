@extends('layouts.admin')

@section('content')
<div class="dashboard-header">
    <h1>Manage Jobs</h1>
</div>

<div class="container">

    <!-- Search Form -->
    <form action="{{ route('admin.jobs.index') }}" method="GET" class="search-form-container">
        <div class="left">
            <a href="{{ route('admin.jobs.create') }}" class="btn-add">+ Add Job</a>
        </div>
        <div class="right">
            <input type="text" name="search" placeholder="Search exams" class="form-control" value="{{ $search }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
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


                    <!-- Delete Button (inside form) -->
                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Job?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $jobs->links('pagination.default') }}
</div>
@endsection