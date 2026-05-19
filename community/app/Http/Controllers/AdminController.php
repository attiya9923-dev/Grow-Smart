<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\Crop;
use App\Models\CropDetail;
use App\Models\PestManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.info');
    }
    public function allUsers()
    {
        $users = User::latest()->get();

        return view(
            'admin.dashboard',
            compact('users')
        );
    }

    public function addExpert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[^A-Za-z0-9]/',
            ],
            'role' => 'required|in:admin,user,expert',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->role === 'admin',
            'is_expert' => $request->role === 'expert',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', is_urdu() ? ($user->name . ' کو بطور ' . ($request->role === 'expert' ? 'ماہر' : ($request->role === 'admin' ? 'منتظم' : 'صارف')) . ' کامیابی سے شامل کر دیا گیا ہے۔') : ($user->name . ' was added successfully as ' . ucfirst($request->role) . '.'));
    }

    public function dashboard()
    {
        $cropQuestions = Question::with('user')
            ->where('category', 'crop')
            ->latest()
            ->get();

        $fruitQuestions = Question::with('user')
            ->where('category', 'fruit')
            ->latest()
            ->get();

        $vegetableQuestions = Question::with('user')
            ->where('category', 'vegetable')
            ->latest()
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'cropQuestions',
                'fruitQuestions',
                'vegetableQuestions'
            )
        );
    }

    public function makeExpert(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->is_expert = true;
        $user->is_admin = false;
        $user->save();

        return back()->with(
            'success',
            is_urdu() ? ($user->name . ' اب ماہر ہیں۔') : ($user->name . ' is now an Expert.')
        );
    }

    public function makeAdmin(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->is_admin = true;
        $user->is_expert = false;
        $user->save();

        return back()->with(
            'success',
            is_urdu() ? ($user->name . ' اب منتظم ہیں۔') : ($user->name . ' is now an Admin.')
        );
    }

    public function makeUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->is_admin = false;
        $user->is_expert = false;
        $user->save();

        return back()->with(
            'success',
            is_urdu() ? ($user->name . ' اب صارف ہیں۔') : ($user->name . ' is now a User.')
        );
    }

    public function toggleActive(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->is_active = !$user->is_active;
        $user->save();

        return back()->with(
            'success',
            is_urdu() ? ($user->name . ' کی حیثیت کامیابی سے اپ ڈیٹ کر دی گئی ہے۔') : ($user->name . ' status updated.')
        );
    }

}