@extends('layouts.admin')

@section('content')
<div class="dashboard-header">
    <h1>Manage Results</h1>
</div>

<div class="container">
    <!-- Search Form -->
    <form action="{{ route('admin.results.index') }}" method="GET" class="search-form-container">
        <div class="left">
            <a href="{{ route('admin.results.create') }}" class="btn-add">+ Add Result</a>
        </div>
        <div class="right">
            <input type="text" name="search" placeholder="Search exams" class="form-control" value="{{ $search }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Results Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="{{ route('admin.results.index', ['sort' => 'name']) }}">Name</a></th>
                <th><a href="{{ route('admin.results.index', ['sort' => 'release_date']) }}">Release Date</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td>{{ $result->name }}</td>
                <td>{{ $result->release_date }}</td>
                <td class="text-right">
                    <!-- Edit Button -->
                    <a href="{{ route('admin.results.edit', $result->id) }}" class="btn btn-warning">Edit</a>

                    <!-- Delete Button (inside form) -->
                    <form action="{{ route('admin.results.destroy', $result->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this result?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $results->links('pagination.default') }}
</div>
@endsection