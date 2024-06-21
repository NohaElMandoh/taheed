<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
    
class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $verificationCode = Str::random(6);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verificationCode
        ]);
        // Mail::to($user->email)->send(new VerificationCodeEmail($verificationCode));
     
        return response()->json(['message' => 'User registered successfully check your email to get verification code', 'user' => $user]);
    }
}
