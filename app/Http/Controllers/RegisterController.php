<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function create(){

        return view('user/register', [
            'title' => 'Create Account'
        ]);
    }

    public function store(Request $request){

        // Validate Requests
        $req = $request->validate([
            'data' => ['required'],
            'email' => ['required', 'email'],
        ]);

        // Iterate based on FE
        // $req->

        // Create Account
        $results = User::create($req);

        // Error Handling
        if(!$results){
            throw ValidationException::withMessages([
                'error' => 'Error Messages'
            ]);
        }

        Auth::login($results);

        // Redirect to Sign in
        return redirect('/signin');

    }

}
