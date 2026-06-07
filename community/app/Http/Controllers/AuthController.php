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
}
