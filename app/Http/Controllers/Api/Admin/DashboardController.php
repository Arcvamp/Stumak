<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admins/dashboard', [
            'title' => 'Sign in'
        ]);
    }
}
