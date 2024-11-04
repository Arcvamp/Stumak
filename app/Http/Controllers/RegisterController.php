<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index(Request $request){
        if ($request->route()->getName() === 'vendor.register') {
            return view('user/register', [
                'title' => 'Create Stumak Vendor Account',
                'data'=>'vendor'
            ]);
        } else {
            // Regular user registration
            return view('user/register', [
                'title' => 'Create Stumak  Account' ,
                'data'=>'user'               
            ]);
        }
      
    }

    public function store(Request $request) {
        // Validate the request (this will automatically handle the redirection with errors if validation fails)
        $validatedData = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|min:4',
            'email' => 'required|email|unique:users,email'
        ]);
    
        // Create Account
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
    
        // Error Handling in case user creation fails
        // if (!$user) {
        //     return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
        // }
    
        // Log the user in
        Auth::login($user);
    
        // Redirect to the sign-in page or any other route after successful registration
        return response()->json(['success' => true, 'message' => 'User registered successfully!']);

    }
    
}
