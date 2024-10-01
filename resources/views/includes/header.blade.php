<header>
    <nav class="navbar">
        <a class="navbar-logo" href="{{ url('/') }}">
            Exam<span>Ace</span>
        </a>

        <div class="hamburger-menu" id="hamburger-menu">
            ☰
        </div>

        <div class="navbar-list" id="navbar-list">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Menu </span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/jobs') }}">Jobs</a></li>
                        <li><a href="{{ url('/exams') }}">Exams</a></li>
                        <li><a href="{{ url('/results') }}">Results</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="navbar-user-options">
            @if(Auth::check())
            <a href="{{ url('/profile') }}" class="user-button">Profile</a>
            @else
            <a href="{{ url('/login') }}" class="user-button">Login</a>
            <a href="{{ url('/register') }}" class="user-button">Sign Up</a>
            @endif
        </div>
    </nav>
</header>