<!DOCTYPE html>
<html lang="ar" dir="rtl" class="min-h-screen">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول - نظام إدارة الرحلات الجوية</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-gray-900 via-gray-950 to-black">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute w-96 h-96 bg-blue-500/5 rounded-full blur-3xl top-20 -right-20 animate-blob"></div>
        <div class="absolute w-96 h-96 bg-indigo-500/5 rounded-full blur-3xl bottom-20 -left-20 animate-blob animation-delay-2000"></div>
    </div>

    <div class="max-w-md w-full relative">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="mb-4 text-sky-400">
                <i class="fas fa-plane text-4xl transform -rotate-45 animate-float"></i>
            </div>
            <h2 class="text-3xl font-bold bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                نظام إدارة الرحلات الجوية
            </h2>
        </div>

        <!-- Login Card -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-2xl shadow-2xl overflow-hidden border border-gray-800">
            <!-- Header Section -->
            <div class="bg-gradient-to-l from-sky-900/50 to-indigo-900/50 px-6 py-8 text-center">
                <h2 class="text-2xl font-bold text-white mb-2">تسجيل الدخول</h2>
                <p class="text-sky-300/80 text-sm">مرحباً بك مجدداً في نظام إدارة الرحلات</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form method="POST" action="/login" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-300">
                            البريد الإلكتروني
                        </label>
                        <div class="relative group">
                            <input type="email"
                                   id="email"
                                   name="email"
                                   placeholder="أدخل بريدك الإلكتروني"
                                   class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                          border border-gray-700 rounded-xl placeholder-gray-500
                                          text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                          focus:border-sky-500 transition-all">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            كلمة المرور
                        </label>
                        <div class="relative group">
                            <input type="password"
                                   id="password"
                                   name="password"
                                   placeholder="أدخل كلمة المرور"
                                   class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                          border border-gray-700 rounded-xl placeholder-gray-500
                                          text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                          focus:border-sky-500 transition-all">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full flex justify-center items-center px-6 py-3 rounded-xl text-base
                                   font-medium text-white bg-gradient-to-r from-sky-500 to-sky-600
                                   hover:from-sky-600 hover:to-sky-700 focus:outline-none focus:ring-2
                                   focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-sky-500
                                   transition-all duration-300 transform hover:scale-[1.02] shadow-lg
                                   shadow-sky-500/25 group">
                        <i class="fas fa-sign-in-alt ml-2 group-hover:rotate-12 transition-transform"></i>
                        تسجيل الدخول
                    </button>
                </form>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400">
                        ليس لديك حساب؟
                        <a href="/register"
                           class="font-medium text-sky-400 hover:text-sky-300 transition-colors">
                            إنشاء حساب جديد
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Text -->
        <p class="mt-8 text-center text-sm text-gray-500">
            جميع الحقوق محفوظة &copy; 2024 نظام إدارة الرحلات الجوية
        </p>
    </div>

    @if($errors->any() || session('error') || session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if($errors->any())
                window.Toast.show("{{ $errors->first() }}", 'error');
            @endif

            @if(session('error'))
                window.Toast.show("{{ session('error') }}", 'error');
            @endif

            @if(session('success'))
                window.Toast.show("{{ session('success') }}", 'success');
            @endif
        });
    </script>
    @endif

    <style>
    @keyframes blob {
        0% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0, 0) scale(1); }
    }

    @keyframes float {
        0% { transform: translateY(0px) rotate(-45deg); }
        50% { transform: translateY(-10px) rotate(-45deg); }
        100% { transform: translateY(0px) rotate(-45deg); }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }
    </style>
</body>
</html>
