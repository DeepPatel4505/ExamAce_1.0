@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Exams</h1>

    <!-- Search Form -->
    <form action="{{ route('admin.exams.index') }}" method="GET" class="search-form-container">
    <input type="text" name="search" placeholder="Search exams" class="form-control" value="{{ $search }}">
    <button type="submit" class="btn btn-primary">Search</button>
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
                    <a href="{{ route('admin.exams.destroy', $exam->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $exams->links('pagination.default') }}
</div>
@endsection
