<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{

    public function create(){
        return view('user/signin', [
            'title' => 'Sign in'
        ]);
    }

    public function store(Request $request)
    {

        // Validate Requests
        $req = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        // Attempt Login
        $user = Auth::attempt($req);

        if(!$user){
            throw ValidationException::withMessages([
                'error' => 'Incorrect/Invalid Authentication!'
            ]);
        };

        // Re-Generate Session
        $request->session()->regenerate();

        // Redirect User
        if($user->role->name == 'User'){
            return redirect('/')->with('success', 'Login Successful!');
        }

        if($user->role->name == 'Vendor'){
            return redirect('/vendor.dashboard')->with('success', 'Login Successful!');
        }

        if($user->role->name == 'Admin'){
            return redirect('/admin.dashboard')->with('success', 'Login Successful!');
        }

        if($user->role->name == 'Moderator'){
            return redirect('/admin.dashboard')->with('success', 'Login Successful!');
        }

        // Return to the login page if there is a problem
        return view('/signin', [
            'title' => 'Sign in - '.config('app.name')
        ]);
    }

    public function logout(Request $request)
    {
        // Log out the user and destroy the session
        Auth::logout();
        Session::flush();

        return redirect('/signin')->with('success', 'Logged Out Successfully!');
    }
}
