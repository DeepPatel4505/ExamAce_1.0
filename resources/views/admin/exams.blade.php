@extends('layouts.admin')

@section('content')
<div class="dashboard-header">
    <h1>Manage Exams</h1>
</div>

<div class="container">

    <!-- Search Form -->
    <form action="{{ route('admin.exams.index') }}" method="GET" class="search-form-container">
        <div class="left">
            <a href="{{ route('admin.exams.create') }}" class="btn-add">+ Add Exam</a>
        </div>
        <div class="right">
            <input type="text" name="search" placeholder="Search exams" class="form-control" value="{{ $search }}">
            <button type="submit" class="btn btn-primary">Search</button>

        </div>
    </form>


    <!-- Exams Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="{{ route('admin.exams.index', ['sort' => 'name']) }}">Exam Name</a></th>
                <th><a href="{{ route('admin.exams.index', ['sort' => 'exam_date']) }}">Date</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
            <tr>
                <td>{{ $exam->name }}</td>
                <td>{{ $exam->exam_date->format('Y-m-d') }}</td>

                <td>
                    <a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-warning">Edit</a>
                    <!-- Delete Button (inside form) -->
                    <form action="{{  route('admin.exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Exam?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $exams->links('pagination.default') }}
</div>
@endsection