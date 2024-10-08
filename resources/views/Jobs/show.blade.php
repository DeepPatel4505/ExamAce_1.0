@extends('layouts.app')

@section('content')
<div class="job-details">

    <a href="{{ url()->previous() }}" class="back-button">Back</a>

    <h1>{{ $job->title }}</h1>
    <p><strong>Organization:</strong> {{ $job->organization }}</p>
    <p><strong>Location:</strong> {{ $job->location }}</p>
    <p><strong>Eligibility:</strong> {!! nl2br(e($job->eligibility)) !!}</p>
    <p><strong>Vacancies:</strong> {{ $job->vacancies }}</p>
    <p><strong>Application Start Date:</strong> {{ $job->application_start_date->format('d M Y') }}</p>
    <p><strong>Application End Date:</strong> {{ $job->application_end_date->format('d M Y') }}</p>


    <div class="tags-container">
        @foreach ($job->tags as $tag)
        <span class="tag-badge">
            <a href="{{ route('tags.show', $tag) }}" class="tag-link">
                {{ $tag->name }}
            </a>
        </span>
        @endforeach
    </div>


    @if(Auth::check() && Auth::user()->email == 'admin@xyz.com')

        <div class="admin-options">
            <div class="edit-btn">
                <a href="{{ url('/jobs/'.$job->id.'/edit' ) }}" class="edit-link">
                    <i class="fa fa-edit"></i>
                    Edit
                </a>
            </div>
            <div class="delete-btn">
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-link">Delete</button>
                </form>
            </div>
        </div>

    @endif


</div>
@endsection