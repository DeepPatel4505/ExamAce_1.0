@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ isset($result) ? 'Edit' : 'Add' }} Result</h1>

    <form action="{{ isset($result) ? route('admin.results.update', $result->id) : route('admin.results.create') }}" method="POST">
        @csrf
        @if (isset($result))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="exam_id">Exam</label>
            <select name="exam_id" id="exam_id" class="form-control" required>
                @foreach ($exams as $exam)
                    <option value="{{ $exam->id }}" {{ (isset($result) && $result->exam_id == $exam->id) ? 'selected' : '' }}>{{ $exam->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="result">Result</label>
            <input type="text" name="result" id="result" class="form-control" value="{{ old('result', $result->result ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection
