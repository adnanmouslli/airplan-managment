@extends("layout.userApp")

@section("content")
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Error Message -->
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

    <!-- Profile Container -->
    <div class="max-w-4xl mx-auto">
        <!-- Profile Card -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-800">
            <!-- Profile Header -->
            <div class="bg-gradient-to-l from-blue-900 to-indigo-900 px-8 py-8 text-center relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0 bg-repeat opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23fff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'3\'/%3E%3C/g%3E%3C/svg%3E')"></div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2 relative z-10">الملف الشخصي</h1>
                <p class="text-blue-200 relative z-10">إدارة معلومات حسابك الشخصي</p>
            </div>

            <!-- Profile Content -->
            <div class="p-8">
                <div class="flex flex-col lg:flex-row gap-12">
                    <!-- Profile Picture Section -->
                    <div class="flex flex-col items-center space-y-4">
                        <div class="relative group">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-sky-500 to-indigo-500 rounded-full opacity-75 group-hover:opacity-100 blur group-hover:blur-md transition-all duration-300"></div>
                            <div class="relative w-40 h-40 rounded-full overflow-hidden border-4 border-gray-900 shadow-xl transition-transform duration-300 group-hover:scale-105">
                                <img src="{{$ip}}{{Auth::user()->imageUrl}}"
                                     alt="Profile Picture"
                                     class="w-full h-full object-cover">
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                            {{$user->name}}
                        </h2>
                    </div>

                    <!-- User Details Section -->
                    <div class="flex-1 space-y-6">
                        <!-- Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-400">
                                    <i class="fas fa-envelope text-sky-400"></i>
                                    <span>البريد الإلكتروني</span>
                                </label>
                                <p class="text-lg font-medium text-gray-300 bg-gray-800/50 backdrop-blur-sm p-3 rounded-lg border border-gray-700">
                                    {{$user->email}}
                                </p>
                            </div>

                            <!-- Phone -->
                            <div class="space-y-2">
                                <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-400">
                                    <i class="fas fa-phone text-sky-400"></i>
                                    <span>رقم الهاتف</span>
                                </label>
                                <p class="text-lg font-medium text-gray-300 bg-gray-800/50 backdrop-blur-sm p-3 rounded-lg border border-gray-700">
                                    {{$user->phone}}
                                </p>
                            </div>

                            <!-- Address -->
                            <div class="space-y-2">
                                <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-400">
                                    <i class="fas fa-map-marker-alt text-sky-400"></i>
                                    <span>العنوان</span>
                                </label>
                                <p class="text-lg font-medium text-gray-300 bg-gray-800/50 backdrop-blur-sm p-3 rounded-lg border border-gray-700">
                                    {{$user->address}}
                                </p>
                            </div>

                            <!-- Role -->
                            <div class="space-y-2">
                                <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-400">
                                    <i class="fas fa-user-tag text-sky-400"></i>
                                    <span>نوع الحساب</span>
                                </label>
                                <p class="text-lg font-medium text-gray-300 bg-gray-800/50 backdrop-blur-sm p-3 rounded-lg border border-gray-700">
                                    {{$user->role}}
                                </p>
                            </div>

                            <!-- Join Date -->
                            <div class="space-y-2 md:col-span-2">
                                <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-400">
                                    <i class="fas fa-calendar text-sky-400"></i>
                                    <span>تاريخ الانضمام</span>
                                </label>
                                <p class="text-lg font-medium text-gray-300 bg-gray-800/50 backdrop-blur-sm p-3 rounded-lg border border-gray-700">
                                    {{$user->created_at}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('profile.edit') }}"
                       class="group inline-flex items-center justify-center px-6 py-3 rounded-xl text-base
                              font-medium text-white bg-gradient-to-r from-sky-500/80 to-sky-600/80
                              hover:from-sky-600/80 hover:to-sky-700/80 transition-all duration-300
                              transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                              focus:ring-offset-gray-900 focus:ring-sky-500 shadow-lg shadow-sky-500/25">
                        <i class="fas fa-edit ml-2 group-hover:rotate-12 transition-transform"></i>
                        تعديل الملف الشخصي
                    </a>

                    <a href="{{ route('profile.editPassword') }}"
                       class="group inline-flex items-center justify-center px-6 py-3 rounded-xl text-base
                              font-medium text-white bg-gradient-to-r from-indigo-500/80 to-indigo-600/80
                              hover:from-indigo-600/80 hover:to-indigo-700/80 transition-all duration-300
                              transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                              focus:ring-offset-gray-900 focus:ring-indigo-500 shadow-lg shadow-indigo-500/25">
                        <i class="fas fa-key ml-2 group-hover:rotate-12 transition-transform"></i>
                        تغيير كلمة المرور
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

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
