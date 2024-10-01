@extends('layouts.app')

@section('content')
<div class="job-details">

    <a href="{{ url()->previous() }}" class="back-button">Back</a>

    <h1>{{ $result->name }}</h1>
    <p><strong>Link:</strong> <a href="{{ $result->result_link }}">{{ $result->result_link }}</a></p>
    <p><strong>Release date:</strong> {{ $result->release_date }}</p>


    <div class="tags-container">
    @foreach ($result->tags as $tag)
        <span class="tag-badge">{{ $tag->name }}</span>
    @endforeach
</div>

</div>
@endsection