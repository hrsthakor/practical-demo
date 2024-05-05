<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class AdminRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.admin-register');
    }

    public function register(RegistrationRequest $request)
    {
        // $role = Role::where('name', request()->is('admin/register') ? '1' : '2')->first();
           // Create a new user 
        try {
           $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => '1', // Assign the role 'admin'
        ]);

        // Redirect after registration
        return redirect('admin/login')->with('success', 'Admin registration successful. Please check your email for verification.');
    } catch (Exception $e) {
        // Handle the exception, you can log it or return an error response
        return redirect()->back()->withInput()->withErrors(['error' => 'Registration failed. Please try again later.']);
    }
    }

    public function adminDashboard()
    {
        return view('Dashboard.dashboard');
    }
}
