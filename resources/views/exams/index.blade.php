@extends('layouts.app')

@section('content')
<div class="job-search">
    <form method="GET" action="/exams">
        <input type="text" name="search" placeholder="Search exams..." value="{{ request()->search }}">
        <select name="job_type">
            <option value="">All Types</option>
            <option value="Central_Govt" {{ request()->job_type == 'Central_Govt' ? 'selected' : '' }}>Central Govt</option>
            <option value="State_Govt" {{ request()->job_type == 'State_Govt' ? 'selected' : '' }}>State Govt</option>
        </select>
        <button type="submit">Search</button>
    </form>
</div>

<div class="job-listings">
@foreach ($exams as $exam)
    <div class="job-item">
        <h2>{{ $exam->name }}</h2>
        <p>{{ $exam->exam_date->format('d M Y') }}</p>
    <p><strong>Qualification:</strong> {{ $exam->qualification }}</p>
        <a href="/exams/{{ $exam->id }}">View Details</a>
    </div>
@endforeach

</div>
{{ $exams->links('pagination.default') }}

@endsection
