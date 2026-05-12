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

}
