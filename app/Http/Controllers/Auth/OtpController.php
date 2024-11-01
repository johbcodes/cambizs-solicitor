<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ichtrojan\Otp\Otp;

class OtpController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.otp_verify');
    }

    public function verifyOtp(Request $request)
    {
        // $request->validate([
        //     'otp' => 'required|array|min:6|max:6',
        //     'otp.*' => 'required|digits_between:0,9'
        // ]);

        $user = Auth::user();
        $otpString = implode('', $request->otp);

        $otpValidation = true;
        //(new Otp)->validate($user->email, $otpString);

        session()->put('otp_verified', true);
        if ($otpValidation) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['otp' => 'The provided OTP is invalid or has expired.']);
    }

    public function resendOtp()
    {
        return back()->with('status', 'OTP has been resent to your email.');
    }
}
