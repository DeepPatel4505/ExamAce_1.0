@extends('layouts.app')

@section('content')
<div class="job-search">
    <form method="GET" action="/jobs">
        <input type="text" name="search" placeholder="Search jobs..." value="{{ request()->search }}">
        <select name="job_type">
            <option value="">All Types</option>
            <option value="Eligible_Jobs" {{ request()->job_type == 'Eligible_Jobs' ? 'selected' : '' }}>Eligible Jobs</option>
        </select>
        <button type="submit">Search</button>
    </form>
</div>

<div class="job-listings" >
@foreach ($jobs as $job)
    <div class="job-item">
        <h2>{{ $job->title }}</h2>
        <p>{{ $job->organization }}</p>
        <p>{{ $job->location }}</p>
        <p>{{ $job->application_start_date->format('d M Y') }} - {{ $job->application_end_date->format('d M Y') }}</p>
        <a href="/jobs/{{ $job->id }}">View Details</a>
    </div>
@endforeach

</div>
{{ $jobs->links('pagination.default') }}

@endsection
