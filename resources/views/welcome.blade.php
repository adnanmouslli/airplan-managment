@extends("layout.app")

@section("content")
<!-- Hero Section -->
<div class="relative min-h-screen flex items-center justify-center px-4">
    <!-- Animated Background - Simplified -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[600px] h-[600px] bg-sky-500/5 rounded-full blur-3xl top-0 right-0 animate-blob"></div>
        <div class="absolute w-[600px] h-[600px] bg-indigo-500/5 rounded-full blur-3xl bottom-0 left-0 animate-blob animation-delay-2000"></div>
    </div>

    <!-- Main Content -->
    <div class="relative text-center max-w-4xl mx-auto space-y-12">
        <!-- Logo & Title -->
        <div class="space-y-8">
            <i class="fas fa-plane text-6xl text-sky-400 transform -rotate-45 animate-float"></i>
            <h1 class="text-5xl md:text-6xl font-bold">
                <span class="bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                    نظام إدارة الرحلات الجوية
                </span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                منصة متكاملة تجمع بين التقنية الحديثة وسهولة الاستخدام
            </p>
        </div>

        <!-- Main Features -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 px-4">
            <div class="p-6 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all">
                <i class="fas fa-clock text-sky-400 text-2xl"></i>
                <p class="text-white mt-2">حجز سريع</p>
            </div>
            <div class="p-6 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all">
                <i class="fas fa-shield-alt text-sky-400 text-2xl"></i>
                <p class="text-white mt-2">آمن وموثوق</p>
            </div>
            <div class="p-6 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all">
                <i class="fas fa-headset text-sky-400 text-2xl"></i>
                <p class="text-white mt-2">دعم 24/7</p>
            </div>
            <div class="p-6 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all">
                <i class="fas fa-tag text-sky-400 text-2xl"></i>
                <p class="text-white mt-2">أسعار تنافسية</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-8">
            <a href="/login"
               class="px-8 py-3 bg-sky-500 hover:bg-sky-600 text-white rounded-xl transition-all
                      flex items-center justify-center gap-2 text-lg">
                <i class="fas fa-sign-in-alt"></i>
                تسجيل الدخول
            </a>
            <a href="/register"
               class="px-8 py-3 bg-white/10 hover:bg-white/20 text-white rounded-xl transition-all
                      flex items-center justify-center gap-2 text-lg backdrop-blur-sm">
                <i class="fas fa-user-plus"></i>
                إنشاء حساب
            </a>
        </div>
    </div>
</div>

<!-- News Section -->
<section class="relative bg-gradient-to-b from-black via-gray-900 to-black py-32 px-4">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="container mx-auto max-w-6xl relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <span class="inline-block px-4 py-1 rounded-full bg-sky-500/10 text-sky-400 text-sm font-semibold tracking-wider mb-6">
                آخر المستجدات
            </span>
            <h2 class="text-4xl md:text-6xl font-bold bg-gradient-to-r from-white via-sky-200 to-white bg-clip-text text-transparent mb-8">
                أحدث أخبار الطيران
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                تابع آخر التطورات والأخبار في عالم الطيران والسفر
            </p>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- News Card 1 -->
            <div class="group bg-gray-800/50 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden transform
                        transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-sky-500/10
                        border border-gray-700">
                <div class="relative h-56 overflow-hidden">
                    <img src="http://127.0.0.1:8000/image1.jpg"
                         alt="News 1"
                         class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="inline-block px-3 py-1 bg-sky-500/10 text-sky-400 text-sm rounded-full">
                            سلامة الطيران
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-sky-400 transition-colors">
                        تحسينات جديدة في إجراءات السلامة الجوية
                    </h3>
                    <p class="text-gray-400">
                        تطبيق معايير دولية جديدة لتعزيز أمان الرحلات الجوية عالمياً.
                    </p>
                </div>
            </div>

            <!-- News Card 2 -->
            <div class="group bg-gray-800/50 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden transform
                        transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-sky-500/10
                        border border-gray-700">
                <div class="relative h-56 overflow-hidden">
                    <img src="http://127.0.0.1:8000/image2.jpg"
                         alt="News 2"
                         class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="inline-block px-3 py-1 bg-sky-500/10 text-sky-400 text-sm rounded-full">
                            تطوير الأسطول
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-sky-400 transition-colors">
                        توسعات جديدة في أساطيل الطيران
                    </h3>
                    <p class="text-gray-400">
                        خطط طموحة لتوسيع الأساطيل لتلبية الطلب المتزايد.
                    </p>
                </div>
            </div>

            <!-- News Card 3 -->
            <div class="group bg-gray-800/50 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden transform
                        transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-sky-500/10
                        border border-gray-700">
                <div class="relative h-56 overflow-hidden">
                    <img src="http://127.0.0.1:8000/image3.jpg"
                         alt="News 3"
                         class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="inline-block px-3 py-1 bg-sky-500/10 text-sky-400 text-sm rounded-full">
                            الاستدامة
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-sky-400 transition-colors">
                        تقنيات جديدة للوقود المستدام
                    </h3>
                    <p class="text-gray-400">
                        ابتكارات في مجال الوقود الصديق للبيئة لتقليل البصمة الكربونية.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes blob {
    0% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0, 0) scale(1); }
}

@keyframes float {
    0% { transform: translateY(0px) rotate(-45deg); }
    50% { transform: translateY(-20px) rotate(-45deg); }
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

@keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slide-down {
    from { transform: translateY(-100%); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes slide-right {
    from { transform: translateX(-100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes slide-up {
    from { transform: translateY(100%); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.animate-fade-in {
    animation: fade-in 1.5s ease-out forwards;
}

.animate-slide-down {
    animation: slide-down 1s ease-out forwards;
}

.animate-slide-right {
    animation: slide-right 1s ease-out forwards;
}

.animate-slide-up {
    animation: slide-up 1s ease-out forwards;
}
</style>
@endsection
