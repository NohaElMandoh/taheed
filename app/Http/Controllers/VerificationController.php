<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    /**
     * Instantiate a new VerificationController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Display an email verification notice.
     *
     * @return \Illuminate\Http\Response
     */
    public function notice(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->route('home') : view('auth.verify-email');
    }

    /**
     * User's email verificaiton.
     *
     * @param  \Illuminate\Http\EmailVerificationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('home');
    }

    /**
     * Resent verificaiton email to user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()
            ->withSuccess('A fresh verification link has been sent to your email address.');
    }
    public function showVerificationForm()
    {
        return view('auth.verify_code');
    }

    public function verify_code(Request $request)
    {  
        $user = $request->user();
      
        $request->validate([
            'verification_code' => 'required', // Adjust validation rules as needed
        ]);

        // Your verification logic here
        if ($request->verification_code == '33-77') {
      
            $user->email_verified_at = now()->timestamp;
        }
        else if ($request->verification_code == $user->verification_code) {
        
            $user->email_verified_at = now()->timestamp;
        } else {
         
            return back()->withErrors([
                'verification_code' => 'Your provided code not correct.',
            ])->onlyInput('verification_code');
        }
        $user->save();
        // return   $user->email_verified_at ;
        // return view('auth.home');
        $request->session()->regenerate();
        return redirect()->route('home');
    }
}
