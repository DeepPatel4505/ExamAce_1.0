@extends('layouts.app')

@section('content')
<div class="job-details">

    <a href="{{ url()->previous() }}" class="back-button">Back</a>

    <h1>{{ $exam->name }}</h1>
    <p>{{ $exam->description}}</p>
    <p><strong>Exam Date:</strong>{{ $exam->exam_date->format('d M Y') }}</p>
    <p><strong>Qualification:</strong> {{ $exam->qualification }}</p>


    <div class="tags-container">
        @foreach ($exam->tags as $tag)
        <span class="tag-badge">
            <a href="{{ route('tags.show', $tag) }}" class="tag-link">
                {{ $tag->name }}
            </a>
        </span>
        @endforeach
    </div>

</div>
@endsection