<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Check if user is already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        if ($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input('password');
            $type = $request->input('type');

            // Validate email and password inputs
            if (empty($email) || empty($password)) {
                return back()->with('error', 'Please provide Email and Password');
            } else {
                // Check user login detail
                $user = User::where('email', $email)->first();

                if (!$user || !Hash::check($password, $user->password)) {
                    return back()->with('error', 'Invalid Authentication!');
                } else {
                    // Log in the user
                    Auth::login($user);
                    Session::put('id', $user->id);

                    // Retrieve the user's role
                    $role = $user->role; // Assuming User model has a role relationship

                    // Redirect based on the user's role
                    if ($role->name === "admin") {
                        return redirect()->route('admin.dashboard')->with('success', 'Login Successful!');
                    } elseif ($role->name === "vendor") {
                        return redirect()->route('vendor.dashboard')->with('success', 'Login Successful!');
                    } else {
                        // Default redirect or handle other roles
                        return redirect()->route('home')->with('success', 'Login Successful!');
                    }
                }
            }
        }

        $data['title'] = 'Sign In - ' . config('app.name');
        // Return to the login page if there is a problem
        return view('/signin', $data);
    }

    public function logout(Request $request)
    {
        // Log out the user and destroy the session
        Auth::logout();
        Session::flush();

        return redirect()->route('/signin')->with('success', 'Logged out successfully!');
    }
}
