<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\CustomerRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Email verification middleware
Route::middleware(['auth', 'verified'])->group(function () {
    // Your authenticated routes here...
});

// Customer Registration
Route::get('/customer/register',  'App\Http\Controllers\CustomerRegistrationController@showRegistrationForm')->name('customer.register');
Route::post('/customer/register', 'App\Http\Controllers\CustomerRegistrationController@register');

// Admin Registration
Route::get('/admin/register', 'App\Http\Controllers\AdminRegistrationController@showRegistrationForm')->name('admin.register');
Route::post('/admin/register', 'App\Http\Controllers\AdminRegistrationController@register');

Route::get('/admin/login', 'App\Http\Controllers\AdminAuthController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\AdminAuthController@login')->name('admin.login.submit');
Route::get('/admin/dashboard', 'App\Http\Controllers\AdminAuthController@adminDashboard')->name('admin.dashboard');

