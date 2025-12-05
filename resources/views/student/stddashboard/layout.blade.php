<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة أسيوط الجديدة صفحة   -  الطلاب</title>
    <link rel="stylesheet" href="{{ asset('public/resources/student/stddashboard/final/final.css') }}">
    <link rel="stylesheet" href="{{ asset('public/resources/student/stddashboard/result/result.css') }}">
    <link rel="stylesheet" href="{{ asset('public/resources/student/stddashboard/assiment/assiment.css') }}">
    <link rel="stylesheet" href="{{ asset('public/resources/student/stddashboard/absence/absence.css') }}">
    <link rel="stylesheet" href="{{ asset('public/resources/student/stddashboard/matirel/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('public/resources/student/stddashboard/settings/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('public/resources/student/stdprofile/std.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
</head>
<body class="bg-white pt-28  pb-20">
    <header>
        <nav class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center shadow-lg fixed top-0 left-0 w-full">
            <button id="toggleSidebar" class="md:hidden bg-gray-700 p-2 rounded-lg ml-2">
                <i id="icon-open" class="h-6 w-6 block transition-transform duration-100" data-lucide="menu"></i>
            </button>

            <div class="flex items-center space-x-3">
                <div class="bg-gray-600 w-10 h-10 rounded-full overflow-hidden">
                    <a href="#">
                        <img src="{{ asset('public/resources/admins/463211000_519263080949177_8597348305848868951_n.jpg') }}" alt="Logo" class="w-full h-full object-cover">
                    </a>
                </div>
                <a href="#" class="text-lg font-bold mr-2">جامعة أسيوط الجديدة التكنولوجية</a>
            </div>

            <div class="hidden md:flex items-center space-x-6" id="nav-links">
                <ul class="flex space-x-6">
                    <li><a href="{{ route('students.stdprofile.profile') }}" class="hover:text-blue-300">الملف الشخصي</a></li>
                </ul>
            </div>

            <div class="relative mt-2 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-3">
                <div class="relative">
                    <button id="not-btn" class="focus:outline-none">
                        <i data-lucide="bell-ring" class="w-7 h-7 text-white"></i>
                    </button>
                    <span class="absolute top-1 right-2 translate-x-1/2 -translate-y-1/2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">+2</span>
                    <div id="dropdown2-menu" class="hidden absolute left-0 mt-3 w-48 bg-white text-black shadow-lg rounded py-2 z-50">
                        <div class="alert-item hover:bg-sky-300 p-1 grid grid-cols-12 gap-0.5 items-center transition-opacity duration-300">
                            <p class="col-span-11">تم تعيينك لمادة C++</p>
                            <button onclick="fadeRemove(this)" class="text-red-500 col-span-1 hover:text-red-900 font-bold text-lg leading-none ml-4">&times;</button>
                        </div>
                        <div class="alert-item hover:bg-sky-300 p-1 grid grid-cols-12 gap-0.5 items-center transition-opacity duration-300">
                            <p class="col-span-11">تم تعيينك لمادة JAVA</p>
                            <button onclick="fadeRemove(this)" class="text-red-500 col-span-1 hover:text-red-900 font-bold text-lg leading-none ml-4">&times;</button>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <button id="avatar-btn" class="focus:outline-none">
                        <i data-lucide="user" class="w-7 h-7 text-white"></i>
                    </button>
                    <div id="dropdown-menu" class="hidden absolute left-0 mt-3 w-48 bg-white text-black shadow-lg rounded-lg py-2 z-50">
                        <!-- <a href="#" onclick="openModal()" class="block px-4 py-2 hover:bg-gray-200">الإعدادت</a> -->
                        <a href="{{ route('students.stdprofile.profile') }}" class="block px-4 py-2 hover:bg-gray-200">الملف الشخصي</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-red-500 text-red-700 hover:text-white">تسجيل الخروج</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <aside id="sidebar" class="fixed  top-10 right-0 h-screen bg-blue-100/75 transform translate-x-full transition-transform duration-300 z-50 md:translate-x-0">
        <div class="sidebar mt-16">
            <ul>
                <li class="mb-4"><a href="{{ route ('students.stddashboard.dash') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> المواد </a></li>
                {{-- <li class="mb-4"><a href="{{ route ('students.stddashboard.final') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200">     النتيجة </a></li> --}}
                <li class="mb-4"><a href="{{ route ('students.stddashboard.result') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> الدرجات </a></li>
                <li class="mb-4"><a href="{{ route ('students.stddashboard.assignment') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> الأسيمنتات </a></li>
                <li class="mb-4"><a href="{{ route ('students.stdprofile.QRlogin') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> تسجيل الغياب </a></li>
                {{-- <li class="mb-4"><a href="{{ route ('students.stddashboard.settings') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200">   إعدادات الملف الشخصي </a></li> --}}
                <li class="mb-4"><a href="{{ route ('students.stdprofile.profile') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200">الملف الشخصي</a></li>

            </ul>
        </div>
    </aside>
@yield('content')
<script src="{{ asset('public/resources/student/stddashboard/final/final.js') }}"></script>
<script src="{{ asset('public/resources/student/stddashboard/result/result.js') }}"></script>
<script src="{{ asset('public/resources/student/stddashboard/assiment/assiment.js') }}"></script>
<script src="{{ asset('public/resources/student/stddashboard/settings/settings.js') }}"></script>
<script src="{{ asset('public/resources/student/stddashboard/matirel/dash.js') }}"></script>

<script src="{{ asset('public/resources/student/stdprofile/std.js') }}"></script>

</body>
</html>
