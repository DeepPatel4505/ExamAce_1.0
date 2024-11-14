@extends('layouts.admin')

@section('content')

<div class="dashboard-header">
    <h1>Users</h1>
</div>

<div class="users-content">
    <!-- Search and Filter Section -->
    <form action="{{ route('admin.users.index') }}" method="GET" class="search-filter-form">
        <div class="form-group">
            <label for="search">Search by Username or Email:</label>
            <input type="text" name="search" id="search" placeholder="Enter username or email" value="{{ request('search') }}">
        </div>

        <div class="form-group">
            <label for="sort">Sort By:</label>
            <select name="sort" id="sort">
                <option value="username" {{ request('sort') === 'username' ? 'selected' : '' }}>Username</option>
                <option value="email" {{ request('sort') === 'email' ? 'selected' : '' }}>Email</option>
                <option value="fullname" {{ request('sort') === 'fullname' ? 'selected' : '' }}>Full Name</option>
            </select>
        </div>

        <button type="submit" class="btn">Search</button>
    </form>

    <!-- Users Table -->
    <table class="users-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination-links">
        {{ $users->links('pagination.default') }}
    </div>
</div>

@endsection
