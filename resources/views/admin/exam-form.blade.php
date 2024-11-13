@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ isset($exam) ? 'Edit' : 'Add' }} Exam</h1>

    <form action="{{ isset($exam) ? route('admin.exams.update', $exam->id) : route('admin.exams.create') }}" method="POST">
        @csrf
        @if (isset($exam))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Exam Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $exam->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="date">Exam Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $exam->date ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection
