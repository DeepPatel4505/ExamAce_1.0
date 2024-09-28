@extends('layouts.app')

@section('content')
<h1>Edit User</h1>

@if($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="username">Username</label>
    <input type="text" name="username" value="{{ old('username', $user->username) }}" required>

    <label for="firstName">First Name</label>
    <input type="text" name="firstName" value="{{ old('firstName', $user->firstName) }}" required>

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" value="{{ old('lastName', $user->lastName) }}" required>

    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

    <label for="age">Age</label>
    <input type="number" name="age" value="{{ old('age', $user->age) }}" required>

    <label for="preference">Preference (comma-separated)</label>
    <input type="text" name="preference" value="{{ old('preference', implode(',', $user->preference)) }}">


    <label for="qualification">Qualification</label>
    <input type="text" name="qualification" value="{{ old('qualification', $user->qualification) }}" required>

    <button type="submit">Update User</button>
</form>
@endsection