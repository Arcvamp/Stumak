<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\State;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->route()->getName() === 'vendor.register') {
            return view('user/register', [
                'title' => 'Create Stumak Vendor Account',
                'data' => 'vendor'
            ]);
        } else {
            // Regular user registration
            return view('user/register', [
                'title' => 'Create Stumak Account',
                'data' => 'user'
            ]);
        }
    }

    public function fetch_country()
    {
        $country = Country::all();
        return response()->json($country);
    }

    public function fetch_state($id)
    {
        $state = State::where('country_id', $id)->get();
        return response()->json($state);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'phone' => 'required|numeric|digits_between:7,15',
            'matric_no' => 'required|string|max:255|unique:users,matric_no',
            'country_id' => 'required|exists:country,id',
            'state_id' => 'required|exists:state,id',
            'city_id' => 'required|exists:city,id',
            'post_code' => 'nullable|string|max:10',
            'street_address' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|email|unique:users,email|max:255'
        ]);

        try {
            // Generate email verification token and OTP
            $emailVerifyToken = Str::random(64);
            $otp = random_int(100000, 999999);

            // Create the user
            $data = $request->all();
            $data['email_verify_token'] = $emailVerifyToken;
            $data['verified_status'] = 'unverified';
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);


            // // Send OTP to the user's email
            // Mail::send('emails.verify-email', ['otp' => $otp], function ($message) use ($user) {
            //     $message->to($user->email);
            //     $message->subject('Email Verification OTP');
            // });

            // Store OTP in the session
            session(['email_otp' => $otp]);


            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'User registered successfully! Please verify your email.',
                'data' => [
                    'email' => $user->email,
                    'matric_no' => $user->matric_no,
                ],
            ], 201);
        } catch (\Exception $e) {
            // Handle errors and return a failure response


            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    public function verifyEmail(Request $request)
    {
        // Validate OTP input
        $validator=Validator::make($request->all(),[
            'otp' => 'required|numeric',
            
        ]);
        $data=$request->all();
        $otp = $request->input('otp');

        // Verify OTP
        if (session('email_otp') != $otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP.'
            ], 400);
        }

        // Update user verification status
        $data['email_verified_at']= now();
        $data['verified_status']='verified';
        $user = Auth::user();

        $user->update($data);

        // Clear OTP from session
        session()->forget('email_otp');

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Email verified successfully!'
        ]);
    }
}
