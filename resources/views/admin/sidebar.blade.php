<!-- resources/views/admin/sidebar.blade.php -->
<div class="admin-sidebar">
    <h1 class="text-xl font-semibold mb-6 flex items-center space-x-2">
        <!-- Back Icon and Link -->
        <a href="/" class="text-blue-400 hover:text-blue-500 flex items-center transition duration-200">
            <i class="fa fa-arrow-left mr-1"></i> <!-- Back Arrow Icon -->
            <span>Home</span>
        </a>
        <!-- Separator and Title -->
        <span class="text-gray-500">/</span>
        <span>ExamAce</span>
    </h1>

    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('admin') }}" class="sidebar-link {{ Request::is('admin') ? 'active' : '' }}">
                <i class="fa fa-home"></i>
                General
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ Request::is('admin/users') ? 'active' : '' }}">
                <i class="fa fa-users"></i>
                Manage Users
            </a>
        </li>
        <li>
            <a href="{{ route('admin.jobs.index') }}" class="sidebar-link {{ Request::is('admin/jobs') ? 'active' : '' }}">
                <i class="fa fa-briefcase"></i>
                Manage Jobs
            </a>
        </li>
        <li>
            <a href="{{ route('admin.exams.index') }}" class="sidebar-link {{ Request::is('admin/exams') ? 'active' : '' }}">
                <i class="fa fa-book"></i>
                Manage Exams
            </a>
        </li>
        <li>
            <a href="{{ route('admin.results.index') }}" class="sidebar-link {{ Request::is('admin/results') ? 'active' : '' }}">
                <i class="fa fa-trophy"></i>
                Manage Results
            </a>
        </li>
    </ul>

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2">
            <i class="fa fa-sign-out-alt mr-2"></i>Logout
        </button>
    </form>
</div>