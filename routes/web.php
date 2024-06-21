<?php

use Illuminate\Support\Facades\Route;

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

// // Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/verification_code', [App\Http\Controllers\ClientRegistrationController::class, 'verification_code'])->name('verification_code');

// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', [App\Http\Controllers\ClientRegistrationController::class, 'create']);

// Route::get('/register', [App\Http\Controllers\ClientRegistrationController::class, 'register'])->name('register');
// Route::post('/register', [App\Http\Controllers\ClientRegistrationController::class, 'create']);

// // Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// // Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// // Client Registration
// // Route::get('/register', [App\Http\Controllers\ClientRegistrationController::class, 'showRegistrationForm'])->name('register');
// // Route::post('/register', [App\Http\Controllers\ClientRegistrationController::class, 'register']);

// // Admin Dashboard
// Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');


Route::controller(App\Http\Controllers\ClientRegistrationController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login');
    Route::get('/home', 'home')->name('home');
    Route::post('/logout', 'logout')->name('logout');
});

// Define Custom Verification Routes
Route::controller(App\Http\Controllers\VerificationController::class)->group(function () {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/email/resend', 'resend')->name('verification.resend');


    Route::get('/verify', 'showVerificationForm')->name('verify_form');
    Route::post('/verify_active', 'verify_code')->name('verify.active');
});
Route::controller(App\Http\Controllers\AdminDashboardController::class)->group(function () {
    Route::get('/admin/login', 'showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'login')->name('admin.login.submit');

    Route::post('/admin/logout', 'logout')->name('admin.logout');
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard')->middleware('admin.auth'); 
});
Route::controller(App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
});
Route::controller(App\Http\Controllers\MotorcycleController::class)->group(function () {
    Route::get('/motorcycles', 'index')->name('motorcycles.index');
});
