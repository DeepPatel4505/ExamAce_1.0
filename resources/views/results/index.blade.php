@extends('layouts.app')

@section('content')
<div class="job-search">
    <form method="GET" action="/results">
        <input type="text" name="search" placeholder="Search jobs..." value="{{ request()->search }}">
        <select name="job_type">
            <option value="">All Types</option>
            <option value="Central_Govt" {{ request()->job_type == 'Central_Govt' ? 'selected' : '' }}>Central Govt</option>
            <option value="State_Govt" {{ request()->job_type == 'State_Govt' ? 'selected' : '' }}>State Govt</option>
        </select>
        <button type="submit">Search</button>
    </form>
</div>

<div class="job-listings">
@foreach ($results as $result)
    <div class="job-item">
        <h2>{{ $result->name }}</h2>
        <p>{{ $result->result_link }}</p>
        <p>{{ $result->release_date }}</p>
        <a href="/results/{{ $result->id }}">View Details</a>
    </div>
@endforeach

</div>
{{ $results->links('pagination.default') }}

@endsection
