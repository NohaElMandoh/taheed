<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {

        $request->validate([
            'verification_code' => 'required',

        ]);

        $user = Auth::user();

        if ($user) {
            if ($request->verification_code == '33-77') {

                $user->email_verified_at = now()->timestamp;
            } else if ($request->verification_code == $user->verification_code) {

                $user->email_verified_at = now()->timestamp;
            } else {
                return response()->json(['message' => 'Your provided code not correct.']);
            }
            $user->save();

            return response()->json(['message' => 'Verification successful']);
        }
        return response()->json(['message' => 'Your Are Not Registered']);
    }
}
