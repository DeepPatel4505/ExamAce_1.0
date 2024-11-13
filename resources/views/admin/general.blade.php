@extends('layouts.admin')

@section('content')

<div class="dashboard-header">
    <h1>General Analytics</h1>
</div>

<div class="dashboard-cards">
    <!-- Registered Users -->
    <div class="dashboard-card">
        <h3>Registered Users</h3>
        <p class="count">{{ $usersCount }}</p>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">View All Users</a>
    </div>

    <!-- Open Jobs -->
    <div class="dashboard-card">
        <h3>Open Jobs</h3>
        <p class="count">{{ $openJobsCount }}</p>
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-primary">Manage Jobs</a>
    </div>

    <!-- Exams -->
    <div class="dashboard-card">
        <h3>Exams</h3>
        <p class="count">{{ $examsCount }}</p>
        <a href="{{ route('admin.exams.index') }}" class="btn btn-primary">Manage Exams</a>
    </div>

    <!-- Results -->
    <div class="dashboard-card">
        <h3>Results</h3>
        <p class="count">{{ $resultsCount }}</p>
        <a href="{{ route('admin.results.index') }}" class="btn btn-primary">View Results</a>
    </div>
</div>
    

@endsection