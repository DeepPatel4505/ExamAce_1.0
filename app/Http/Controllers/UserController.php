<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
{
    // Validate the input first
    $request->validate([
        'username' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'age' => 'required|integer',
        'preference' => 'nullable|string',  // Validate as a string
        'qualification' => 'required|string',
    ]);

    // Convert comma-separated values into an array
    $preferences = $request->input('preference') ? array_filter(explode(',', $request->input('preference'))) : [];

    // Create the user
    User::create([
        'username' => $request->username,
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'age' => $request->age,
        'preference' => $preferences,  // Store the array
        'qualification' => $request->qualification,
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

public function update(Request $request, User $user)
{
    // Validate the input first
    $request->validate([
        'username' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'age' => 'required|integer',
        'preference' => 'nullable|string',  // Validate as a string
        'qualification' => 'required|string',
    ]);

    // Convert comma-separated values into an array
    $preferences = $request->input('preference') ? array_filter(explode(',', $request->input('preference'))) : [];

    // Update the user
    $user->update([
        'username' => $request->username,
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'email' => $request->email,
        'age' => $request->age,
        'preference' => $preferences,  // Store the array
        'qualification' => $request->qualification,
    ]);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
