<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Fetch and display the user list
    public function index()
    {
        return view('admins.users.index', [
            'title' => 'Users'
        ]);
    }

    // Fetch users for DataTables
    public function fetchALL()
    {
        $query = User::select([
                'id',
                DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),
                'email',
                'phone',
                'matric_no',
                'profile_image',
                'status',
                'created_at'
            ]);

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('profile_image', function ($row) {
                $imagePath = $row->profile_image ? asset('storage/' . $row->profile_image) : 'images/placeholder.png';
                return '<img src="' . $imagePath . '" width="50" height="50" alt="User Image"/>';
            })
            ->rawColumns(['profile_image']) // Mark the 'profile_image' column as raw to render HTML
            ->make(true);
    }

    // Create a new user
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'matric_no' => 'required|string|unique:users,matric_no|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'nullable|numeric|unique:users,phone',
            'password' => 'required|string|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'country_id' => 'nullable|exists:countries,id',
            'state_id' => 'nullable|exists:states,id',
            'city_id' => 'nullable|exists:cities,id',
            'street_address' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:20',
            'about' => 'nullable|string',
            'terms_condition' => 'nullable|boolean',
            'email_verified' => 'nullable|boolean',
            'verified_status' => 'nullable|in:unverified,verified',
            'status' => 'required|in:inactive,active',
        ]);

        try {
            $profileImagePath = null;

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            }
            $data = $request->all();
            $data['password']=Hash::make($request->password);
            $data['profile_image']=$profileImagePath;
            // Create user record
            $user = User::create($data);

            return response()->json(['status' => 'success', 'message' => 'User created successfully.', 'user' => $user]);
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create user.'], 500);
        }
    }

    // Edit user details
    public function find($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json(['status' => 'success', 'user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User not found.'], 404);
        }
    }

    // Update user details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|numeric|unique:users,phone,' . $user->id,
            'status' => 'required|in:inactive,active',
        ]);

        try {
            $profileImagePath = $user->profile_image;

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($profileImagePath) {
                    Storage::disk('public')->delete($profileImagePath);
                }
                $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            }
            $data=$request->all();
            $data=$profileImagePath;
            // Update user record
            $user->update($data);

            return response()->json(['status' => 'success', 'message' => 'User updated successfully.']);
        } catch (\Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update user.'], 500);
        }
    }

    // Delete a user
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            
            // Delete profile image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $user->delete();

            return response()->json(['status' => 'success', 'message' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            Log::error('User deletion failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete user.'], 500);
        }
    }
}
