<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AdminDashboardController extends Controller
{



 // Show the login form
 public function showLoginForm()
 {
     return view('admin.login');
 }

 // Handle the login form submission
 public function login(Request $request)
 {
     // Validate the form data
     $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required|min:6',
     ]);
  
  
     // Attempt to log the user in
     if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
         // If successful, redirect to intended location
         
         $user= Auth::guard('admin')->user();
       
         if($user->role ?? '' == 'admin' ){
     
         return redirect()->intended('/admin/dashboard');
         }
        else   return redirect()->back()
        ->withErrors('you are not admin')
        ->withInput();
     }

     // If unsuccessful, redirect back to the login form with input data
     return redirect()->back()->withInput($request->only('email', 'remember'));
 }
 public function dashboard(Request $request){
    return view('admin.dashboard');
 }
 public function logout(Request $request)
 {
     Auth::guard('admin')->logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();
     return redirect()->route('admin.login')
         ->withSuccess('You have logged out successfully!');
 }
 public function users(Request $request){
    $users=User::latest()->paginate(10);
    return view('admin.users',compact('users'));
 }

}
