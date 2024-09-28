@extends('layouts.app')

@section('content')
<h1>Create User</h1>

@if($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label>Username</label>
    <input type="text" name="username">

    <label>First Name</label>
    <input type="text" name="firstName">

    <label>Last Name</label>
    <input type="text" name="lastName">

    <label>Email</label>
    <input type="email" name="email">

    <label>Password</label>
    <input type="password" name="password">

    <label>Age</label>
    <input type="number" name="age">

    <label for="preference">Preference (comma-separated)</label>
    <input type="text" name="preference" value="{{ old('preference') }}" required>


    <label>Qualification</label>
    <input type="text" name="qualification">

    <button type="submit">Create</button>
</form>
@endsection