<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // 1. عرض صفحة تسجيل الدخول
    public function show()
    {
        return view('login');
    }

    // 2. معالجة بيانات تسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من صيغة المدخلات أولاً
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // محاولة تسجيل الدخول (يقوم لارافل هنا بمقارنة كلمة المرور المشفرة تلقائياً)
        if (Auth::attempt($credentials, $request->remember)) {

            // إعادة توليد الجلسة للأمان (تمنع هجمات Session Fixation)
            $request->session()->regenerate();

            // التحويل إلى الصفحة الرئيسية بعد النجاح
            return redirect()->route('home');
        }

        // في حال فشل البيانات (إرجاع خطأ للمستخدم)
        throw ValidationException::withMessages([
            'email' => __('بيانات الاعتماد هذه لا تطابق سجلاتنا.'),
        ]);
    }

    // 3. تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }



    // ضيف الدالة دي جوه الكلاس
    public function googleLogin()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'password' => Hash::make(Str::random(24)),
            ]);

            // 1. تسجيل الدخول مع تفعيل خاصية "تذكرني"
            Auth::login($user, true);

            // 2. تحديث الجلسة وحفظها يدوياً (حل مشكلة عدم التحويل)
            request()->session()->regenerate();
            request()->session()->save();

            // 3. التحويل باستخدام الـ Route اللي أنت عملته
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'فشل تسجيل الدخول');
        }
    }
}