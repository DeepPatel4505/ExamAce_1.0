<!-- resources/views/admin/sidebar.blade.php -->
<div class="admin-sidebar">
    <h1>
        Admin DashBoard
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
                <i class="fa fa-briefcase"></i>
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
</div>


