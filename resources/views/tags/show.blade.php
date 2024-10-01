@extends('layouts.app')

@section('content')
    <div class="tag-page-container">
        <h1 class="tag-name">{{ $tag->name }}</h1>

        <section class="tag-section">
            <h2 class="section-heading">Jobs:</h2>
            @if($jobs->isEmpty())
                <p class="no-data-message">No jobs found for this tag.</p>
            @else
                <ul class="tag-list">
                    @foreach($jobs as $job)
                        <a href="{{ url('/jobs/'.$job->id) }}"><li class="tag-list-item">{{ $job->title }}</li></a>
                    @endforeach
                </ul>
            @endif
        </section>

        <section class="tag-section">
            <h2 class="section-heading">Exams:</h2>
            @if($exams->isEmpty())
                <p class="no-data-message">No exams found for this tag.</p>
            @else
                <ul class="tag-list">
                    @foreach($exams as $exam)
                        <a href="{{ url('/exams/'.$exam->id) }}"><li class="tag-list-item">{{ $exam->name }}</li></a>
                    @endforeach
                </ul>
            @endif
        </section>

        <section class="tag-section">
            <h2 class="section-heading">Results:</h2>
            @if($results->isEmpty())
                <p class="no-data-message">No results found for this tag.</p>
            @else
                <ul class="tag-list">
                    @foreach($results as $result)
                        <a href="{{ url('/results/'.$result->id) }}"><li class="tag-list-item">{{ $result->name }}</li></a>
                    @endforeach
                </ul>
            @endif
        </section>
    </div>
@endsection
