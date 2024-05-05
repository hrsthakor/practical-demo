<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;


class CustomerRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.customer-register');
    }

    public function register(RegistrationRequest $request)
    {
        // $role = Role::where('name', request()->is('customer/register') ? '2' : '1')->first();
        try {
            // Create a new user
            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => '2', // Assign the role 'customer'
            ]);

            // Redirect after successful registration
            return redirect('admin/login')->with('success', 'Registration successful. Please check your email for verification.');
        } catch (Exception $e) {
            // Handle the exception, you can log it or return an error response
            return redirect()->back()->withInput()->withErrors(['error' => 'Registration failed. Please try again later.']);
        }
    }
}
