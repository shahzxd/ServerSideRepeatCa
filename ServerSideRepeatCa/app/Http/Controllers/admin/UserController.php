<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $userId = Auth::id();
        $users = User::query()
            ->where('id', '!=', $userId)
            ->get();
        $data = [
            'title' => 'User list',
            'breadcrumbs' => array("admin/dashboard" => "Dashboard", 'user/index' => 'Users'),
            'active' => 'users',
            'users' => $users,
        ];

        return view('admin.users.index', compact('data'));
    }
    public function delete($id)
    {
        // Find and delete the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function edit()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Edit Profile',
            'breadcrumbs' => [
                'admin/dashboard' => 'Dashboard',
                'profile' => 'Profile'
            ],
            'active' => 'profile',

            'user' => $user
        ];
        return view('admin.users.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.edit')
                ->withErrors($validator)
                ->withInput();
        }

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
