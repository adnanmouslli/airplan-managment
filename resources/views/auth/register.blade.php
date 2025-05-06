<!DOCTYPE html>
<html lang="ar" dir="rtl" class="min-h-screen">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>إنشاء حساب - نظام إدارة الرحلات الجوية</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-gray-900 via-gray-950 to-black">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute w-96 h-96 bg-blue-500/5 rounded-full blur-3xl top-20 -right-20 animate-blob"></div>
        <div class="absolute w-96 h-96 bg-indigo-500/5 rounded-full blur-3xl bottom-20 -left-20 animate-blob animation-delay-2000"></div>
        <div class="absolute w-96 h-96 bg-sky-500/5 rounded-full blur-3xl top-1/2 left-1/2 animate-blob animation-delay-4000"></div>
    </div>

    <div class="max-w-2xl w-full relative">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="mb-4 text-sky-400">
                <i class="fas fa-plane text-4xl transform -rotate-45 animate-float"></i>
            </div>
            <h2 class="text-3xl font-bold bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                نظام إدارة الرحلات الجوية
            </h2>
        </div>

        <!-- Register Card -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-2xl shadow-2xl overflow-hidden border border-gray-800">
            <!-- Header Section -->
            <div class="bg-gradient-to-l from-sky-900/50 to-indigo-900/50 px-6 py-8 text-center">
                <h2 class="text-2xl font-bold text-white mb-2">إنشاء حساب جديد</h2>
                <p class="text-sky-300/80 text-sm">أهلاً بك في نظام إدارة الرحلات الجوية</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form method="POST" action="/register" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Two Columns Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">الاسم</label>
                            <div class="relative group">
                                <input type="text" name="name" placeholder="أدخل اسمك"
                                       class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                              border border-gray-700 rounded-xl placeholder-gray-500
                                              text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                              focus:border-sky-500 transition-all">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-user text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">البريد الإلكتروني</label>
                            <div class="relative group">
                                <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني"
                                       class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                              border border-gray-700 rounded-xl placeholder-gray-500
                                              text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                              focus:border-sky-500 transition-all">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-envelope text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Address Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">العنوان</label>
                            <div class="relative group">
                                <input type="text" name="address" placeholder="أدخل عنوانك"
                                       class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                              border border-gray-700 rounded-xl placeholder-gray-500
                                              text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                              focus:border-sky-500 transition-all">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-map-marker-alt text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">رقم الهاتف</label>
                            <div class="relative group">
                                <input type="number" name="phone" placeholder="أدخل رقم هاتفك"
                                       class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                              border border-gray-700 rounded-xl placeholder-gray-500
                                              text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                              focus:border-sky-500 transition-all">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-phone text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Password Fields -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">كلمة المرور</label>
                            <div class="relative group">
                                <input type="password" name="password" placeholder="أدخل كلمة المرور"
                                       class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                              border border-gray-700 rounded-xl placeholder-gray-500
                                              text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                              focus:border-sky-500 transition-all">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-lock text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">تأكيد كلمة المرور</label>
                            <div class="relative group">
                                <input type="password" name="confirm-password" placeholder="أعد إدخال كلمة المرور"
                                       class="appearance-none block w-full px-4 py-3 pr-10 bg-gray-800/50
                                              border border-gray-700 rounded-xl placeholder-gray-500
                                              text-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500
                                              focus:border-sky-500 transition-all">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-lock text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Field -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">الصورة الشخصية</label>
                        <div class="relative group">
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed
                                      rounded-xl bg-gray-800/30 hover:bg-gray-800/50 hover:border-sky-500 transition-all">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-cloud-upload-alt text-sky-400 text-3xl mb-3 group-hover:scale-110 transition-transform"></i>
                                    <div class="flex text-sm">
                                        <label for="image" class="relative cursor-pointer rounded-md font-medium text-sky-400 hover:text-sky-300">
                                            <span>اختر صورة</span>
                                            <input id="image" name="image" type="file" class="sr-only">
                                        </label>
                                        <p class="pr-1 text-gray-400">أو قم بسحب وإفلات الصورة هنا</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG حتى 10MB</p>
                                </div>
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
                        <i class="fas fa-user-plus ml-2 group-hover:rotate-12 transition-transform"></i>
                        إنشاء الحساب
                    </button>
                </form>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-400">
                        لديك حساب بالفعل؟
                        <a href="/login" class="font-medium text-sky-400 hover:text-sky-300 transition-colors">
                            تسجيل الدخول
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

    .animation-delay-4000 {
        animation-delay: 4s;
    }
    </style>
</body>
</html>
