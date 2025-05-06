@extends("layout.userApp")

@section("content")
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Password Change Container -->
    <div class="max-w-2xl mx-auto">
        <!-- Form Card -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-800">
            <!-- Header Section -->
            <div class="bg-gradient-to-l from-blue-900 to-indigo-900 px-8 py-8 text-center relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0 bg-repeat opacity-20"
                         style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23fff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'3\'/%3E%3C/g%3E%3C/svg%3E')">
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2 relative z-10">تغيير كلمة المرور</h1>
                <p class="text-blue-200 relative z-10">يمكنك تحديث كلمة المرور الخاصة بك هنا</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form action="{{ route('profile.updatePassword', ['id'=>Auth::user()->id]) }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-envelope text-sky-400"></i>
                            <span>البريد الإلكتروني</span>
                        </label>
                        <div class="relative group">
                            <input type="email"
                                   id="email"
                                   name="email"
                                   placeholder="أدخل بريدك الإلكتروني"
                                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                          placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                          transition-all pr-10">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Old Password Field -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-lock text-sky-400"></i>
                            <span>كلمة المرور القديمة</span>
                        </label>
                        <div class="relative group">
                            <input type="password"
                                   id="oldPassword"
                                   name="oldPassword"
                                   placeholder="أدخل كلمة المرور القديمة"
                                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                          placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                          transition-all pr-10">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- New Password Field -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-key text-sky-400"></i>
                            <span>كلمة المرور الجديدة</span>
                        </label>
                        <div class="relative group">
                            <input type="password"
                                   id="newPassword"
                                   name="newPassword"
                                   placeholder="أدخل كلمة المرور الجديدة"
                                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                          placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                          transition-all pr-10">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Security Notice -->
                    <div class="rounded-lg bg-sky-900/30 backdrop-blur-sm p-4 border border-sky-800">
                        <div class="flex items-start space-x-3 space-x-reverse">
                            <div class="flex-shrink-0 p-1">
                                <i class="fas fa-shield-alt text-sky-400"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-sky-300 mb-1">إرشادات الأمان</h4>
                                <p class="text-sm text-gray-400">
                                    تأكد من اختيار كلمة مرور قوية تحتوي على:
                                </p>
                                <ul class="mt-2 space-y-1 text-sm text-gray-400 list-inside">
                                    <li class="flex items-center space-x-2 space-x-reverse">
                                        <i class="fas fa-check text-sky-400 text-xs"></i>
                                        <span>أحرف كبيرة وصغيرة</span>
                                    </li>
                                    <li class="flex items-center space-x-2 space-x-reverse">
                                        <i class="fas fa-check text-sky-400 text-xs"></i>
                                        <span>أرقام</span>
                                    </li>
                                    <li class="flex items-center space-x-2 space-x-reverse">
                                        <i class="fas fa-check text-sky-400 text-xs"></i>
                                        <span>رموز خاصة</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit"
                                class="group w-full flex justify-center items-center px-6 py-3 rounded-xl text-base
                                       font-medium text-white bg-gradient-to-r from-sky-500/80 to-sky-600/80
                                       hover:from-sky-600/80 hover:to-sky-700/80 focus:outline-none focus:ring-2
                                       focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-sky-500
                                       transition-all duration-300 transform hover:scale-[1.02] shadow-lg
                                       shadow-sky-500/25">
                            <i class="fas fa-key ml-2 group-hover:rotate-12 transition-transform"></i>
                            تحديث كلمة المرور
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (isset($msgError))
<div class="fixed bottom-4 left-4 z-50 animate-slide-up">
    <div class="bg-red-900/50 backdrop-blur-xl border border-red-800 text-red-200 p-4 rounded-lg shadow-lg">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-circle text-red-400"></i>
            </div>
            <div class="mr-3">
                <p class="text-sm">{{$msgError}}</p>
            </div>
        </div>
    </div>
</div>
@endif

<style>
    @keyframes slide-up {
        from {
            transform: translateY(100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .animate-slide-up {
        animation: slide-up 0.3s ease-out forwards;
    }
</style>
@endsection
