@extends('layouts.app')

@section('content')

    <div class="main">
        @include("includes.sidebar")

        <div class="content">
            @include("includes.latestJoblisting")
            @include("includes.latestJoblisting")
        </div>

    </div>

@endsection
