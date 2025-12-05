<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>إدارة الجامعة - @yield('title') </title>
        <link rel="stylesheet" href="{{ asset('public/resources/admins/home/dashboard_home.css') }}">
        <link rel="stylesheet" href="{{ asset('public/resources/admins/dash-dr/dashboard_dr.css') }}">
        <link rel="stylesheet" href="{{ asset('public/resources/admins/materials/materials.css') }}">
        <link rel="stylesheet" href="{{ asset('public/resources/admins/std/dashboard_std.css') }}">
        <link rel="stylesheet" href="{{ asset('public/resources/admins/settings/settings.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body class="bg-gray-100">
        <header>
            <nav class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center shadow-lg">
                <!-- Logo and Site Name -->
                <div class="flex items-center space-x-3">
                    <div class="bg-gray-600 w-10 h-10 rounded-full">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('public/resources/admins/463211000_519263080949177_8597348305848868951_n.jpg') }}" alt="Logo" class="w-full h-full rounded-full">
                        </a>
                    </div>
                </div>

                <!-- Centered Title -->
                <div class="flex-1 text-center">
                    <a href="{{ route('home') }}" class="text-lg font-bold">جامعة أسيوط الجديدة التكنولوجية</a>
                </div>

                <!-- Login Button and Mobile Menu -->
                <div class="flex items-center space-x-3">
                    <button class="login hidden md:inline-block bg-blue-300 text-black hover:shadow-lg hover:text-white transition px-4 py-2 rounded-lg duration-200">
                        <a class="signin" href="{{ route('logout') }}">تسجيل الخروج <i class="fi fi-rr-sign-in-alt"></i></a>
                    </button>
                    <button id="menu-toggle" class="md:hidden bg-gray-700 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </nav>
        </header>

        <aside class="bg-blue-100">
            <img src="{{ asset('public/resources/admins/463211000_519263080949177_8597348305848868951_n-removebg-preview.png') }}" alt="شعار الجامعة" class="p-3 mt-9 ">
            <h2 class="text-xl font-bold text-center text-pink-950 mb-2">لوحة التحكم</h2>
            <div class="nav">
                <ul>
                    <li class="mb-4"><a href="{{ route('admin.home') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200">الرئيسية</a></li>
                    <li class="mb-4"><a href="{{ route('members.admin.index') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200">أعضاء هيئة التدريس</a></li>
                    <!-- <li class="mb-4"><a href="/dashboard/assit/assit.html" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200">المعيدين</a></li> -->
                    <li class="mb-4"><a href="{{ route('students.admin.index') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200">الطلاب</a></li>
                    <li class="mb-4"><a href="{{ route('materials.admin.index') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200">المواد</a></li>
                    <li class="mb-4"><a href="{{ route('settings.admin.index') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200">الإعدادات</a></li>
                </ul>
            </div>
        </aside>

        @yield('main-content')

        @if (session('msg'))
            <div id="Message" class="fixed inset-0 flex items-center justify-center opacity-70">
                <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
                    {{ session('msg') }}
                </div>
            </div>

            <script>
                setTimeout(() => {
                    document.getElementById('Message').classList.add("hidden");
                }, 3000);
            </script>
        @endif
        @if (session('msg-error'))
            <div id="Message-error" class="fixed inset-0 flex items-center justify-center opacity-70">
                <div class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
                    {{ session('msg-error') }}
                </div>
            </div>

            <script>
                setTimeout(() => {
                    document.getElementById('Message-error').classList.add("hidden");
                }, 3000);
            </script>
        @endif

        <button  class="bg-blue-400 opacity-70 rounded-2xl hover:opacity-100 hover:bg-pink-950 hover:text-blue-200 " onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top"><i class="fa-regular fa-circle-up"></i></i></button>

        <script src="{{ asset('public/resources/admins/home/dashboard_home.js') }}"></script>
        <script src="{{ asset('public/resources/admins/dash-dr/dr.js') }}"></script>
        <script src="{{ asset('public/resources/admins/materials/materials.js') }}"></script>
        <script src="{{ asset('public/resources/admins/std/dash-std.js') }}"></script>
        <script src="{{ asset('public/resources/admins/settings/settings.js') }}"></script>
    </body>

</html>
