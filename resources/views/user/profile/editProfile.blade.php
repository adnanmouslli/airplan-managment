@extends("layout.userApp")

@section("content")
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Profile Container -->
    <div class="max-w-2xl mx-auto">
        <!-- Profile Card -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-800">
            <!-- Header Section -->
            <div class="bg-gradient-to-l from-blue-900 to-indigo-900 px-8 py-8 text-center relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0 bg-repeat opacity-20"
                         style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23fff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'3\'/%3E%3C/g%3E%3C/svg%3E')">
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2 relative z-10">تعديل الملف الشخصي</h1>
                <p class="text-blue-200 relative z-10">يمكنك تعديل معلومات حسابك الشخصي هنا</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form action="{{ route('profile.update', ['id'=>$user->id]) }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-user text-sky-400"></i>
                            <span>الاسم</span>
                        </label>
                        <div class="relative group">
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{$user->name}}"
                                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                          placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                          transition-all pr-10">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

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
                                   value="{{$user->email}}"
                                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                          placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                          transition-all pr-10">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Address Field -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-map-marker-alt text-sky-400"></i>
                            <span>العنوان</span>
                        </label>
                        <div class="relative group">
                            <input type="text"
                                   id="address"
                                   name="address"
                                   value="{{$user->address}}"
                                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                          placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                          transition-all pr-10">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-map-marker-alt text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-phone text-sky-400"></i>
                            <span>رقم الهاتف</span>
                        </label>
                        <div class="relative group">
                            <input type="number"
                                   id="phone"
                                   name="phone"
                                   value="{{$user->phone}}"
                                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                          placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                          transition-all pr-10">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-500 group-hover:text-sky-400 transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit"
                                class="w-full flex justify-center items-center px-6 py-3 rounded-xl text-base
                                       font-medium text-white bg-gradient-to-r from-sky-500/80 to-sky-600/80
                                       hover:from-sky-600/80 hover:to-sky-700/80 focus:outline-none focus:ring-2
                                       focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-sky-500
                                       transition-all duration-300 transform hover:scale-[1.02] shadow-lg
                                       shadow-sky-500/25 group">
                            <i class="fas fa-save ml-2 group-hover:rotate-12 transition-transform"></i>
                            حفظ التغييرات
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
