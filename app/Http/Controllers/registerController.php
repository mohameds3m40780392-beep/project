<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // 1. التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // confirmed تبحث عن حقل password_confirmation
        ]);

        // 2. إنشاء المستخدم وتشفير كلمة المرور
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // التشفير هنا
        ]);

        // 3. تسجيل دخول المستخدم فوراً بعد الإنشاء
        Auth::login($user);

        // 4. التوجيه للرئيسية
        return redirect()->route('home')->with('success', 'تم إنشاء الحساب وتسجيل الدخول بنجاح!');
    }
}