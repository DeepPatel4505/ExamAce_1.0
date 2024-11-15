<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            font-size: 24px;
            color: #fff;
            text-decoration: none;
        }

        .navbar-user-options {
            display: flex;
            align-items: center;
        }

        .user-button {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border: 1px solid white;
            margin-left: 10px;
        }

        .user-button:hover {
            background-color: white;
            color: #333;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .profile-details p {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="navbar-logo" href="{{ url('/') }}">
                Exam<span>Ace</span>
            </a>
            <div class="navbar-user-options">
                @if(Auth::check())
                <span class="user-greeting">{{ Auth::user()->name }}</span>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="user-button">Logout</button>
                </form>
                @else
                <a href="{{ url('/login') }}" class="user-button">Login</a>
                <a href="{{ url('/register') }}" class="user-button">Sign Up</a>
                @endif
            </div>
        </nav>
    </header>

    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-details">
            @if(Auth::check())
            <p><strong>Name:</strong> {{ Auth::user()->username }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Highest qualification:</strong> {{ Auth::user()->qualification }}</p>
            
            @else
            <p>Please log in to view your profile.</p>
            @endif
        </div>
    </div>

    <!-- <div>
        <form action="{{route('test.mail',Auth::user()->id)}}" method="get">
            <button type="submit">Test</button>
        </form>
    </div> -->
</body>

</html>