@extends('layouts.app')

@section('content')
    <div class="main">
        @include("includes.sidebar", ['tags' => $tags])

        <div class="content">
            {{-- Pass the $jobs variable to the job listing component --}}
            @include("includes.latestJoblisting", ['jobs' => $jobs])
            @include("includes.latestExams", ['exams' => $exams])
            @include("includes.latestResults", ['results' => $results])
        </div>

    </div>
@endsection
