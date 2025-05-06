<!DOCTYPE html>
<html lang="ar" dir="rtl" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviation Management - Admin Panel</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="h-full bg-gradient-to-br from-gray-900 via-gray-950 to-black overflow-x-hidden">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute w-96 h-96 bg-sky-500/5 rounded-full blur-3xl top-20 -right-20 animate-blob"></div>
        <div class="absolute w-96 h-96 bg-indigo-500/5 rounded-full blur-3xl bottom-20 -left-20 animate-blob animation-delay-2000"></div>
    </div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-gray-900/80 backdrop-blur-lg border-b border-gray-800">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-reverse space-x-4">
                <button id="dashboardBtn"
                    class="relative p-3 rounded-xl bg-gray-800 hover:bg-gray-700 transition-all duration-300
                           transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-sky-500
                           focus:ring-offset-2 focus:ring-offset-gray-900 group">
                    <i class="fas fa-bars text-sky-400 text-lg group-hover:rotate-180 transition-transform duration-300"></i>
                </button>
            </div>
            <div class="logo text-2xl font-bold flex items-center gap-3">
                <div class="bg-sky-500/10 p-2 rounded-lg">
                    <i class="fas fa-user-shield text-sky-400"></i>
                </div>
                <span class="bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                    لوحة تحكم المدير
                </span>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="fixed bottom-4 left-4 bg-green-500/10 border border-green-500 text-green-400 px-6 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 left-4 bg-red-500/10 border border-red-500 text-red-400 px-6 py-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif
        

    <!-- Main Content -->
    <main class="pt-20 min-h-screen">
        @yield('content')
    </main>

    <!-- Sidebar Overlay -->
    <div id="sidebarOverlay"
         class="fixed inset-0 bg-black/70 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
           class="fixed top-0 left-0 h-full w-72 transform -translate-x-full transition-transform duration-300
                  ease-in-out z-50">
        <div class="relative h-full bg-gray-900/95 backdrop-blur-xl border-r border-gray-800 shadow-2xl">
            <div class="flex h-full flex-col py-8 px-6">
                <!-- Header Section -->
                <div class="mb-8 text-center">
                    <div class="w-16 h-16 rounded-full bg-sky-500/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-shield text-3xl text-sky-400"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2">لوحة الإدارة</h2>
                    <p class="text-sm text-gray-400">مرحباً، {{ Auth::user()->name }}</p>
                    <span class="inline-block px-3 py-1 bg-sky-500/10 text-sky-400 text-xs rounded-full mt-2">
                        مدير النظام
                    </span>
                </div>

                <!-- Navigation Links -->
                <div class="flex-1 space-y-2">
                    <a href="{{ route('admin.index') }}"
                       class="group flex items-center rounded-xl px-4 py-3 text-gray-400
                              hover:bg-sky-500/10 hover:text-sky-400 transition-all duration-300">
                        <i class="fas fa-home w-6 group-hover:scale-110 transition-transform"></i>
                        <span class="mr-3">الرئيسية</span>
                    </a>

                    <a href="{{ route('admin.flights') }}"
                    class="group flex items-center rounded-xl px-4 py-3 text-gray-400
                            hover:bg-sky-500/10 hover:text-sky-400 transition-all duration-300">
                        <i class="fas fa-plane w-6 group-hover:scale-110 transition-transform"></i>
                        <span class="mr-3">الرحلات</span>
                    </a>

                    <a {{-- href="{{ route('admin.bookings') }}" --}}
                       class="group flex items-center rounded-xl px-4 py-3 text-gray-400
                              hover:bg-sky-500/10 hover:text-sky-400 transition-all duration-300">
                        <i class="fas fa-ticket-alt w-6 group-hover:scale-110 transition-transform"></i>
                        <span class="mr-3">الحجوزات</span>
                    </a>

                    <a href="{{ route('logout') }}"
                       class="group flex items-center rounded-xl px-4 py-3 text-gray-400
                              hover:bg-red-500/10 hover:text-red-400 transition-all duration-300">
                        <i class="fas fa-sign-out-alt w-6 group-hover:scale-110 transition-transform"></i>
                        <span class="mr-3">تسجيل الخروج</span>
                    </a>
                </div>

                <!-- Close Button -->
                <button id="closeSidebar"
                        class="mt-6 w-full rounded-xl bg-gradient-to-r from-sky-500/80 to-sky-600/80 px-4 py-3
                               text-white hover:from-sky-600/80 hover:to-sky-700/80 transition-all duration-300
                               focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2
                               focus:ring-offset-gray-900 shadow-lg shadow-sky-500/20 group">
                    <span class="flex items-center justify-center">
                        <i class="fas fa-times ml-2 group-hover:rotate-90 transition-transform"></i>
                        إغلاق
                    </span>
                </button>
            </div>
        </div>
    </aside>

    <style>
    @keyframes blob {
        0% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0, 0) scale(1); }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }
    </style>

    <script>
        const dashboardBtn = document.getElementById("dashboardBtn");
        const sidebar = document.getElementById("sidebar");
        const sidebarOverlay = document.getElementById("sidebarOverlay");
        const closeSidebar = document.getElementById("closeSidebar");

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebarFunc() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('overflow-hidden');
        }

        dashboardBtn.addEventListener("click", openSidebar);
        closeSidebar.addEventListener("click", closeSidebarFunc);
        sidebarOverlay.addEventListener("click", closeSidebarFunc);
    </script>

    @stack('scripts')
</body>
</html>
