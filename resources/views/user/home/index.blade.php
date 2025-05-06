@extends("layout.userApp")

{{-- @section("color-home")
#fff
@endsection

@section("color-flight")
#fff
@endsection

@section("color-s")
#fff
@endsection

@section("color-a")
#fff
@endsection --}}

@section("content")
<div class="container mx-auto py-8 px-4">
    <!-- Hero Section -->
    <div class="bg-gradient-to-l from-gray-900/50 to-gray-800/50 backdrop-blur-xl rounded-2xl p-12 mb-12 text-white shadow-xl border border-gray-800 transform hover:scale-[1.02] transition-transform duration-300">
        <div class="relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                مرحباً بكم في نظام إدارة الرحلات الجوية
            </h1>
            <p class="text-xl md:text-2xl text-gray-300">اكتشف رحلتك القادمة وتابع حالة رحلاتك بكل سهولة</p>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
       <!-- Search Flights Card -->
        <div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-xl shadow-lg border border-gray-800 hover:shadow-2xl transition-all duration-300">
            <h3 class="text-2xl font-bold mb-6 text-sky-400">البحث عن الرحلات</h3>
            <form action="{{ route('search.flights') }}" method="GET" class="space-y-6">
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="text-gray-300 font-medium">من</label>
                        <i class="fas fa-plane-departure text-sky-400"></i>
                    </div>
                    <input type="text" name="departure"
                        class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300 placeholder-gray-500
                                focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 transition-all"
                        placeholder="مدينة المغادرة">
                </div>
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="text-gray-300 font-medium">إلى</label>
                        <i class="fas fa-plane-arrival text-sky-400"></i>
                    </div>
                    <input type="text" name="destination"
                        class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300 placeholder-gray-500
                                focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 transition-all"
                        placeholder="مدينة الوصول">
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-sky-500/80 to-sky-600/80 hover:from-sky-600/80 hover:to-sky-700/80
                            text-white font-bold py-3 px-6 rounded-lg transform hover:-translate-y-1 transition-all duration-200
                            focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                    <i class="fas fa-search ml-2"></i>
                    بحث
                </button>
            </form>
        </div>

<!-- Track Flight Card -->
<div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-xl shadow-lg border border-gray-800 hover:shadow-2xl transition-all duration-300">
    <h3 class="text-2xl font-bold mb-6 text-sky-400">تتبع رحلتك</h3>
    <form action="{{ route('track.flight') }}" method="POST" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label class="text-gray-300 font-medium">رقم الرحلة</label>
                <i class="fas fa-search-location text-sky-400"></i>
            </div>
            <input type="text" name="flightNumber"
                   class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300 placeholder-gray-500
                          focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 transition-all"
                   placeholder="رقم الرحلة">
        </div>
        <button type="submit"
                class="w-full bg-gradient-to-r from-sky-500/80 to-sky-600/80 hover:from-sky-600/80 hover:to-sky-700/80
                       text-white font-bold py-3 px-6 rounded-lg transform hover:-translate-y-1 transition-all duration-200
                       focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-gray-900">
            <i class="fas fa-plane-departure ml-2"></i>
            تتبع
        </button>
    </form>
</div>
        <!-- Important Info Card -->
        <div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-xl shadow-lg border border-gray-800 hover:shadow-2xl transition-all duration-300">
            <h3 class="text-2xl font-bold mb-6 text-sky-400">معلومات مهمة</h3>
            <ul class="space-y-4">
                <li class="flex items-center space-x-3 space-x-reverse group">
                    <span class="h-10 w-10 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                                group-hover:scale-110 transition-transform">
                        <i class="fas fa-plane-departure"></i>
                    </span>
                    <span class="text-gray-300 group-hover:text-sky-400 transition-colors">تحديثات حول حالة الرحلات</span>
                </li>
                <li class="flex items-center space-x-3 space-x-reverse group">
                    <span class="h-10 w-10 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                                group-hover:scale-110 transition-transform">
                        <i class="fas fa-map"></i>
                    </span>
                    <span class="text-gray-300 group-hover:text-sky-400 transition-colors">إرشادات السفر</span>
                </li>
                <li class="flex items-center space-x-3 space-x-reverse group">
                    <span class="h-10 w-10 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                                group-hover:scale-110 transition-transform">
                        <i class="fas fa-suitcase"></i>
                    </span>
                    <span class="text-gray-300 group-hover:text-sky-400 transition-colors">متطلبات الأمتعة</span>
                </li>
                <li class="flex items-center space-x-3 space-x-reverse group">
                    <span class="h-10 w-10 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                                group-hover:scale-110 transition-transform">
                        <i class="fas fa-building"></i>
                    </span>
                    <span class="text-gray-300 group-hover:text-sky-400 transition-colors">خدمات المطار</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Latest Updates Section -->
    <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl shadow-lg border border-gray-800 p-8 mb-12">
        <h2 class="text-3xl font-bold mb-8 text-sky-400 border-b border-gray-800 pb-4">آخر التحديثات</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 rounded-lg bg-gradient-to-br from-sky-500/5 to-indigo-500/5 hover:from-sky-500/10 hover:to-indigo-500/10
                        transition-colors duration-200 border border-gray-800">
                <div class="flex items-center space-x-4 space-x-reverse mb-4">
                    <span class="h-12 w-12 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400">
                        <i class="fas fa-newspaper text-xl"></i>
                    </span>
                    <div>
                        <h4 class="font-bold text-xl text-sky-400">تحديث إجراءات السفر</h4>
                        <p class="text-gray-400">إرشادات جديدة للسفر وإجراءات السلامة</p>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-lg bg-gradient-to-br from-sky-500/5 to-indigo-500/5 hover:from-sky-500/10 hover:to-indigo-500/10
                        transition-colors duration-200 border border-gray-800">
                <div class="flex items-center space-x-4 space-x-reverse mb-4">
                    <span class="h-12 w-12 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400">
                        <i class="fas fa-tags text-xl"></i>
                    </span>
                    <div>
                        <h4 class="font-bold text-xl text-sky-400">عروض خاصة</h4>
                        <p class="text-gray-400">اكتشف أحدث العروض والخصومات على الرحلات</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <div class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl shadow-md hover:shadow-xl border border-gray-800
                    transition-all duration-300 text-center group">
            <div class="h-16 w-16 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                        mx-auto mb-4 transform group-hover:scale-110 transition-transform duration-200">
                <i class="fas fa-plane-departure text-2xl"></i>
            </div>
            <h3 class="font-bold text-lg text-gray-300 group-hover:text-sky-400 transition-colors">جدول الرحلات</h3>
        </div>
        <div class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl shadow-md hover:shadow-xl border border-gray-800
                    transition-all duration-300 text-center group">
            <div class="h-16 w-16 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                        mx-auto mb-4 transform group-hover:scale-110 transition-transform duration-200">
                <i class="fas fa-suitcase-rolling text-2xl"></i>
            </div>
            <h3 class="font-bold text-lg text-gray-300 group-hover:text-sky-400 transition-colors">معلومات الأمتعة</h3>
        </div>
        <div class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl shadow-md hover:shadow-xl border border-gray-800
                    transition-all duration-300 text-center group">
            <div class="h-16 w-16 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                        mx-auto mb-4 transform group-hover:scale-110 transition-transform duration-200">
                <i class="fas fa-concierge-bell text-2xl"></i>
            </div>
            <h3 class="font-bold text-lg text-gray-300 group-hover:text-sky-400 transition-colors">خدمات إضافية</h3>
        </div>
        <div class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl shadow-md hover:shadow-xl border border-gray-800
                    transition-all duration-300 text-center group">
            <div class="h-16 w-16 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400
                        mx-auto mb-4 transform group-hover:scale-110 transition-transform duration-200">
                <i class="fas fa-headset text-2xl"></i>
            </div>
            <h3 class="font-bold text-lg text-gray-300 group-hover:text-sky-400 transition-colors">الدعم والمساعدة</h3>
        </div>
    </div>
</div>


@endsection
