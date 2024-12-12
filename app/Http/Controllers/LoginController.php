<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function index()
    {
        return view('user/signin', [
            'title' => 'Sign in'
        ]);
    }

    public function store(Request $request)
    {
        // Validate login input
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        // Attempt to login using the given credentials
        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'error' => 'Invalid credentials, please try again!'
            ]);
        }

        // Regenerate session
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Create JWT payload
        $payload = [
            'iss' => config('app.name'), // Issuer
            'sub' => $user->id,          // Subject (user ID)
            'iat' => time(),             // Issued at
            'exp' => time() + 60 * 60    // Expiry (1 hour from now)
        ];

        // Generate JWT token
        $jwtToken = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        // Store JWT token in session
        Session::put('jwt_token', $jwtToken);

        // Role-based redirection
        if ($user->role->name === 'User') {
            return redirect('/')->with('success', 'Login Successful!');
        }

        if ($user->role->name === 'Vendor') {
            return redirect('/vendor.dashboard')->with('success', 'Login Successful!');
        }

        if ($user->role->name === 'Admin' || $user->role->name === 'Moderator') {
            return redirect('/admin.dashboard')->with('success', 'Login Successful!');
        }

        // Default redirect if role isn't matched
        return redirect('/api/signin')->withErrors(['error' => 'Unauthorized role']);
    }

    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();
        Session::flush(); // Clears the session, including JWT token

        return redirect('/signin')->with('success', 'Logged out successfully!');
    }
}
