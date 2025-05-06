<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviation Management</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="relative">
    <!-- Background Image with Overlay -->
    <div class="fixed inset-0 -z-10">
        <img src="http://127.0.0.1:8000/background.jpg"
             alt="Background"
             class="object-cover w-full h-full">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-black/80 backdrop-blur-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="text-2xl font-bold">
                    <span class="bg-gradient-to-r from-sky-400 to-cyan-300 bg-clip-text text-transparent">
                        Aviation Management
                    </span>
                </div>

                <!-- Navigation Links -->
                <ul class="hidden md:flex items-center space-x-8 space-x-reverse">
                    <li>
                        <a href="#home"
                           class="text-white px-4 py-2 rounded-lg transition-all duration-300
                                  hover:bg-sky-500 hover:text-white">
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="#features"
                           class="text-white px-4 py-2 rounded-lg transition-all duration-300
                                  hover:bg-sky-500 hover:text-white">
                            المميزات
                        </a>
                    </li>
                    <li>
                        <a href="#about"
                           class="text-white px-4 py-2 rounded-lg transition-all duration-300
                                  hover:bg-sky-500 hover:text-white">
                            عن النظام
                        </a>
                    </li>
                    <li>
                        <a href="#contact"
                           class="text-white px-4 py-2 rounded-lg transition-all duration-300
                                  hover:bg-sky-500 hover:text-white">
                            اتصل بنا
                        </a>
                    </li>
                </ul>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="fixed inset-0 bg-black/95 z-40 hidden">
        <div class="flex flex-col items-center justify-center h-full space-y-8">
            <a href="#home" class="text-white text-xl hover:text-sky-500 transition-colors">الرئيسية</a>
            <a href="#features" class="text-white text-xl hover:text-sky-500 transition-colors">المميزات</a>
            <a href="#about" class="text-white text-xl hover:text-sky-500 transition-colors">عن النظام</a>
            <a href="#contact" class="text-white text-xl hover:text-sky-500 transition-colors">اتصل بنا</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="relative min-h-screen">
        @yield("content")
    </main>

    <script>
        // Mobile Menu Toggle
        const menuBtn = document.querySelector('button');
        const mobileMenu = document.querySelector('.fixed.inset-0.bg-black\\/95');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
