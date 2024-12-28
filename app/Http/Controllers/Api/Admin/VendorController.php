<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    // Get all vendors with product count for DataTable
    public function getVendorsWithProductCount(Request $request)
    {
        $vendors = Vendor::withCount('products')->get();

        return DataTables::of($vendors)
            ->addColumn('product_count', function ($vendor) {
                return $vendor->products_count;
            })
            ->make(true);
    }
    // Create a new vendor
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_name' => 'required|string|max:255|unique:vendors',
            'slug' => 'required|string|max:255|unique:vendors',
            'email' => 'required|string|email|max:255|unique:vendors',
            'phone_number' => 'required|string|max:15|unique:vendors',
            'company_name' => 'required|string|max:255|unique:vendors',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|string',
            'password' => 'required|string|min:4',
            'profile_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:5120',
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
        $data['profile_image'] = $profileImagePath;
        $vendor = Vendor::create($data);

        return response()->json(['message' => 'Vendor created successfully', 'vendor' => $vendor], 201);
    }

    // // Get all vendors
    // public function index()
    // {
    //     $vendors = Vendor::all();
    //     return response()->json($vendors, 200);
    // }

    // Get a single vendor by ID
    public function find($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found'], 404);
        }

        return response()->json($vendor, 200);
    }

    // Update a vendor
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'vendor_name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:vendors,slug,' . $id,
            'email' => 'sometimes|string|email|max:255|unique:vendors,email,' . $id,
            'phone_number' => 'sometimes|string|max:15',
            'company_name' => 'sometimes|string|max:255|unique:vendors,company_name' . $id,
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|string',
            'status' => 'sometimes|boolean',
            'is_verified' => 'sometimes|boolean',
            'email_verified' => 'sometimes|boolean',
            'email_verify_token' => 'nullable|string',
            'email_verified_at' => 'nullable|date',
            'profile_image' => 'nullable|string',
            'country_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
        ]);
        $profile_image = $vendor->image;
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($vendor->image) {
                Storage::disk('public')->delete($vendor->image);
            }
            // create the new image
            $profile_image = $request->file('image')->create('products/', 'public');
        }
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $profile_image = null;
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image')->create('vendors/', 'public');
        }
        $data = $request->all();
        $data['profile_image'] = $profile_image;

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $data['profile_image'] = $profile_image;
        $vendor->update($data);

        return response()->json(['message' => 'Vendor updated successfully', 'vendor' => $vendor], 200);
    }

    // Delete a vendor
    public function delete($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found'], 404);
        }
        if (!empty($vendor->profile_image)) {
            $profile_image = json_decode($vendor->profile_image, true);

            Storage::disk('public')->delete($profile_image);
        }
        $vendor->delete();

        return response()->json(['message' => 'Vendor deleted successfully'], 200);
    }
}
