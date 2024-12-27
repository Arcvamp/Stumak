<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class VerficationController extends Controller
{
    // Fetch and display the vendor list
    public function index()
    {
        return view('admins.vendors.index', [
            'title' => 'vendors'
        ]);
    }

      
    // Create a new vendor
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:vendors',
            'email' => 'required|string|email|max:255|unique:vendors',
            'phone_number' => 'required|string|max:15',
            'company_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|string',
            'password' => 'required|string|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'country_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $profileImagePath = null;

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $date['profile_image'] = $profileImagePath;
        $vendor = Vendor::create($data);

        return response()->json(['message' => 'Vendor created successfully', 'vendor' => $vendor], 201);
    }

  
   
}
