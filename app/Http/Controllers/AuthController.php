<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // عرض نموذج تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        try {
            // التحقق من صحة البيانات
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ], [
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'يرجى إدخال بريد إلكتروني صحيح',
                'password.required' => 'كلمة المرور مطلوبة',
                'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'يرجى التحقق من البيانات المدخلة');
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if (Auth::user()->isAdmin == 0) {
                    return redirect()
                        ->intended('/home')
                        ->with('success', 'تم تسجيل الدخول بنجاح');
                } else if (Auth::user()->isAdmin == 1 && Auth::user()->role == "admin") {
                    return redirect()
                        ->route("admin.index")
                        ->with('success', 'تم تسجيل الدخول بنجاح');
                }
            }

            return back()
                ->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة')
                ->withInput();

        } catch (\Exception $e) {
            return back()
                ->with('error', 'حدث خطأ غير متوقع، يرجى المحاولة مرة أخرى')
                ->withInput();
        }
    }

    // عرض نموذج التسجيل
    public function showSignupForm()
    {
        return view('auth.register');
    }
    
    // تسجيل المستخدم
    public function register(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // تخزين الصورة في مجلد `public/images`
       // $path = $request->file('image')->store('images/users', 'public');
        $image = $request->file('image');

        // إنشاء اسم فريد للصورة مع الاحتفاظ بالامتداد
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // تحديد المسار إلى المجلد `public/images`
        $destinationPath = public_path('images');

        // نقل الصورة إلى المجلد
        $image->move($destinationPath, $imageName);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'passport' => rand(1 , 1000),
            'imageUrl' => 'images/' . $imageName
        ]);

        return redirect()->route('login');
    }

    // تسجيل الخروج
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}