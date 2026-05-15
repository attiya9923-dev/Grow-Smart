<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Crop;
use App\Models\EmailVerification;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (!$user->is_active) {
                Auth::logout();
                return view('home');
            }

            if ($user->is_admin) {
                return redirect()->route('admin.info');
            }

            if ($user->is_expert) {
                return redirect()->route('expert.users');
            }

            return redirect()->route('dashboard');
        }

        return view('home');
    }
     public function dashboard()
    {
        $month = now()->month;

        $cropQuery = Crop::query();
        if (is_urdu()) {
            $cropQuery->where('urdu_completed', true)
                ->whereNotNull('name_ur')
                ->where('name_ur', '!=', '');
        }

        if ($month >= 4 && $month <= 9) {
            $sliderCrops = (clone $cropQuery)->where('season', 'summer')
                ->take(10)
                ->get();
        } else {
            $sliderCrops = (clone $cropQuery)->where('season', 'winter')
                ->take(10)
                ->get();
        }

        $cropDataCrops = (clone $cropQuery)->take(8)->get();

        $pestCrops = (clone $cropQuery)
            ->whereHas('pestManagements', function ($query) {
                if (is_urdu()) {
                    $query->where('urdu_completed', true);
                }
            })
            ->take(8)
            ->get();

        return view('front.dashboard', compact(
            'sliderCrops',
            'cropDataCrops',
            'pestCrops'
        ));
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[^A-Za-z0-9]/',
            ],
        ], [
            'password.required' =>
                'Please enter a password.',

            'password.min' =>
                'Password must be at least 8 characters long.',

            'password.confirmed' =>
                'Password confirmation does not match.',

            'password.regex' =>
                'Password must contain at least one special character.',
        ]);

        EmailVerification::where(
            'email',
            $request->email
        )->delete();

        $otp = rand(100000, 999999);

        EmailVerification::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        Mail::to($request->email)->send(
            new SendOtpMail(
                $request->name,
                $otp,
                current_language()
            )
        );

        session([
            'email' => $request->email
        ]);

        return redirect()
            ->route('verify.form')
            ->with(
                'success',
                'OTP sent successfully.'
            );
    }

    public function showVerifyForm()
    {
        if (!session()->has('email')) {
            return redirect()
                ->route('register');
        }

        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $email = session('email');

        $verification = EmailVerification::where(
            'email',
            $email
        )->first();

        if (!$verification) {
            return redirect()
                ->route('register')
                ->with(
                    'error',
                    'Verification request not found.'
                );
        }

        if (
            Carbon::now()->gt(
                $verification->expires_at
            )
        ) {
            $verification->delete();

            return redirect()
                ->route('register')
                ->with(
                    'error',
                    'OTP expired. Please register again.'
                );
        }

        if ($verification->otp != $request->otp) {
            return back()->with(
                'error',
                'Invalid OTP.'
            );
        }

        $user = User::create([
            'name' => $verification->name,
            'email' => $verification->email,
            'password' => $verification->password,
            'email_verified_at' => now(),
            'is_admin' => false,
            'is_expert' => false,
            'is_active' => true,
        ]);

        $verification->delete();

        session()->forget('email');

        Auth::login($user);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Registration Successful.'
            );
    }

    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectToPanel(Auth::user());
        }

        return view('auth.login');
    }
}
