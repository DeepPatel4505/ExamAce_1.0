@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="all-tags-heading">Search your preference...</h1>

        <!-- Tag Search Form -->
        <form class="tag-search-form" action="{{ route('tags.search') }}" method="GET">
            <input type="text" name="query" class="tag-search-input" placeholder="Search tags...">
            <button type="submit" class="tag-search-button">Search</button>
        </form>

        <!-- Display Message if No Tags Found -->
        @if(session('message'))
            <p class="no-tag-message">{{ session('message') }}</p>
        @endif

        <!-- Display Tags List -->
        @if(isset($tags) && !$tags->isEmpty())
            <ul class="tag-all-list">
                @foreach($tags as $tag)
                    <li class="tag-list-item">
                        <a href="{{ route('tags.show', $tag) }}" class="tag-link">
                            {{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
