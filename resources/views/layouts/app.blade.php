<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam-Ace</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jobs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tag.css') }}" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body>
@include("includes.header")
    <div class="container">
    @yield("content")
    </div>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>