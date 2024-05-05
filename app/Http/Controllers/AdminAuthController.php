<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /* simple login */
    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->first();

            if($user->role_id == '2'){
                return redirect()->back()->withInput()->withErrors(['error' => 'You are not allowed to login from here.']);
            }
          
            // Authentication passed...
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    /* This code is for default auth login */
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('admin')->attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('/admin/dashboard');
    //     }

            // if ($user->role === 'customer') {
            //     Auth::logout();
            //     return redirect()->back()->with('error', 'You are not allowed to login from here');
            // }
            // return redirect()->intended($this->redirectPath());

    //     // Authentication failed...
    //     return redirect()->back()->withInput($request->only('email'))->withErrors([
    //         'email' => 'These credentials do not match our records.',
    //     ]);    
    // }
}
