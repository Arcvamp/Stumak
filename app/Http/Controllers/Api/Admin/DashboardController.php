<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Role;
use App\Models\Vendor;

class DashboardController extends Controller
{
    public function index()
    {
        // User statistics
        $admin = Auth::user();
        $totalUsers = User::count();
        $verifiedUsers = User::where('verified_status', 'verified')->count(); 
        $unverifiedUsers = User::where('verified_status', 'unverified')->count();

        // Vendor statistics
        $totalVendors = Vendor::count();
        $verifiedVendors = Vendor::where('is_verified', true)->count();

        // Product and order statistics
        $totalProducts = Product::count();
        // $totalOrders = Order::count();
        // $pendingOrders = Order::where('status', 'pending')->count();
        // $totalEarnings = Order::where('status', 'paid')->sum('total_price');

        // return view('admin.dashboard', compact(
        //     'totalUsers', 'verifiedUsers', 'unverifiedUsers',
        //     'totalVendors', 'verifiedVendors', 
        //     'totalProducts', 'totalOrders', 'pendingOrders', 'totalEarnings'
        // ));
        return response()->json($totalUsers, $verifiedUsers, $unverifiedUsers, $totalVendors, $verifiedVendors, $totalProducts);
    }
    // public function getproduct()
    // {
    //     $Product = Product::withCount('products')->get();
    //     return response()->json($Product);
    // }
    // public function getUser()
    // {
    //     $user = User::withCount('users')->get();
    //     return response()->json($user);
    // }
    // public function getVendor(){
    //     $vendor= Vendor::withCount('vendors')->get();
    //     return response()->json($vendor);
    // }
}
