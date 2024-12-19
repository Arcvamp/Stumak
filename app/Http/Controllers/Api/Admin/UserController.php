<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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
    public function fetchUsers(){
        $query = User::with('role:id,role_name') // Eager load the related Role
            ->select(['id', 'first_name', 'last_name', 'email', 'phone_number', 'role_id', 'active', 'created_at']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('role_name', function ($user) {
                return $user->role ? $user->role->role_name : 'N/A'; 
            })
            ->rawColumns(['role_name']) // Allow raw HTML if needed
            ->make(true);
    }


    // Create a new user
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|numeric|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'active' => 'required|boolean',
        ]);

        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'active' => $request->active,
            ]);

            return response()->json(['status' => 'success', 'message' => 'User created successfully.']);
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create user.'], 500);
        }
    }

    // Edit user details
    public function edit($id)
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

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|numeric|unique:users,phone_number,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'active' => 'required|boolean',
        ]);

        try {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
                'role_id' => $request->role_id,
                'active' => $request->active,
            ]);

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
            $user->delete();

            return response()->json(['status' => 'success', 'message' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            Log::error('User deletion failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete user.'], 500);
        }
    }
}
