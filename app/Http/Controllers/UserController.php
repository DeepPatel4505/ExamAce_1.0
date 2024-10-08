<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Registration Method
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'age' => 'nullable|integer',
            'preference' => 'nullable|string',
            'qualification' => 'nullable|string',
        ]);

        $preferences = $request->input('preference') ? array_filter(explode(',', $request->input('preference'))) : [];

        $age = $request->age ?? 0;
        $qualification = $request->qualification ?? "";

        $user = User::create([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $age,
            'preference' => $preferences,
            'qualification' => $qualification,
        ]);

        Auth::login($user);

        // Redirect to the welcome page
        return redirect('/')->with('success', 'User registered and logged in successfully.');
    }

    public function showRegistrationForm()
    {
        return view('users.register');
    }


    // Login Method
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['username' => 'The provided credentials do not match our records.']);
    }
    public function showLoginForm()
    {
        return view('users.login');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'age' => 'required|integer',
            'preference' => 'nullable|string',
            'qualification' => 'required|string',
        ]);

        $preferences = $request->input('preference') ? array_filter(explode(',', $request->input('preference'))) : [];

        $user->update([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'age' => $request->age,
            'preference' => $preferences,
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

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
