<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VerificationContoller extends controller
{
    public  function index($id)
    {
        $vendor = Vendor::findOrFail($id);
        return response()->json($vendor);
    }
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
            'company_name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|string',
            'status' => 'sometimes|boolean',
            'is_verified' => 'sometimes|boolean',
            'email_verified' => 'sometimes|boolean',
            'email_verify_token' => 'nullable|string',
            'email_verified_at' => 'nullable|date',
            'password' => 'nullable|string|min:8',
            'profile_image' => 'nullable|string',
            'country_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $vendor->update($data);

        return response()->json(['message' => 'Vendor updated successfully', 'vendor' => $vendor], 200);
    }
}
