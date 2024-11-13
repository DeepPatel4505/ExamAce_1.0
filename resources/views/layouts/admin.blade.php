<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        @include('admin.sidebar')
        
        <!-- Main Content -->
        <div class="admin-content">
            @yield('content')
        </div>
    </div>

    <!-- <script src="{{ asset('js/admin.js') }}"></script> -->
</body>
</html>
