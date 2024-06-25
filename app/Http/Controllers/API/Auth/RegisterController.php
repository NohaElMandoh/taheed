<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([

            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
        ]);
        $verificationCode = Str::random(6);

        $user = User::create([
            'name' => 'app',
            'email' => $request->email,
            'password' => Hash::make(123),
            'verification_code' => $verificationCode
        ]);
        // Mail::to($user->email)->send(new VerificationCodeEmail($verificationCode));
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['message' => 'User registered successfully check your email to get verification code', 'user' => $user,'Token'=>$token]);
    }


    public function update_phone(Request $request)
    {

        $request->validate([

            'phone' => 'required|string|unique:users,phone',
        ]);
        $user = Auth::user();
        $user->phone = $request->phone;
        $user->save();
        return response()->json(['message' => 'Your phone updated successfully']);
    }
    public function update_info(Request $request)
    {

        $request->validate([

            'name' => 'required|string|unique:users,name',
            'nationali_id' => 'required|string|unique:users,nationali_id',

        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->nationali_id = $request->nationali_id;

        $user->save();
        return response()->json(['message' => 'Your info updated successfully']);
    }
}
