<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed|regex:/[A-Z]/|regex:/[0-9]/',
            'terms' => 'required|accepted',
        ], [
            'password.regex' => 'Password must contain at least one uppercase letter and one number.',
            'terms.required' => 'You must agree to the terms and conditions.',
            'email.unique' => 'This email is already registered.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => false,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Account created successfully! Welcome to New Diamond Academy.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function toggleAdmin(User $user)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return back()->with('error', 'Unauthorized action.');
        }

        $user->update(['is_admin' => !$user->is_admin]);

        return back()->with('success', $user->name . ' admin status updated.');
    }
}
