<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة أسيوط الجديدة صفحة   - الطلاب </title>
    <link rel="stylesheet" href="{{ asset('public/resources/student/stdprofile/std.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="icon" href="/favicon.ico">
</head>
<body class="bg-white pt-28 mr-4 pb-20">
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
                    <li><a href="{{ route('students.stddashboard.dash')}} " class="hover:text-blue-300">إدارة  المواد</a></li>
                </ul>
            </div>
<!-- button set,not,user -->
            <div class="relative mt-2 grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-3 gap-3">
                <div class="relative">
                    <a href="#" onclick="openModal()" class="block ">
                            <i data-lucide="settings" class="w-7 h-7 text-white"></i>
                    </a>
                </div>

                <div class="relative">
                    <button id="not-btn" class="focus:outline-none">
                        <i data-lucide="bell-ring" class="w-7 h-7 text-white"></i>
                    </button>
                    <span class="absolute top-1 right-2 translate-x-1/2 -translate-y-1/2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">+2</span>
                    <div id="dropdown2-menu" class="hidden absolute left-0 mt-3 w-48 bg-white text-black shadow-lg rounded py-2 z-50">
                        <div class="alert-item hover:bg-sky-300 p-1 grid grid-cols-12 gap-0.5 items-center transition-opacity duration-300">
                            <p class="col-span-11">تم  قبولك  في الكورس C++</p>
                            <button onclick="fadeRemove(this)" class="text-red-500 col-span-1 hover:text-red-900 font-bold text-lg leading-none ml-4">&times;</button>
                        </div>

                    </div>
                </div>

                <div class="relative">
                    <button id="avatar-btn" class="focus:outline-none">
                        <i data-lucide="user" class="w-7 h-7 text-white"></i>
                    </button>
                    <div id="dropdown-menu" class="hidden absolute left-0 mt-3 w-48 bg-white text-black shadow-lg rounded-lg py-2 z-50">
                        <a href="{{ route('students.stdprofile.profile') }}" class="block px-4 py-2 hover:bg-gray-200">الملف الشخصي</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-red-500 text-red-700 hover:text-white">تسجيل الخروج</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <aside id="sidebar" class="fixed md:hidden top-10 right-0 h-screen bg-blue-100/75 transform translate-x-full transition-transform duration-300 z-50 md:translate-x-0">
        <div class="sidebar mt-16">
            <ul>
                <li class="mb-4"><a href="{{ route ('students.stddashboard.dash') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> المواد </a></li>
                <li class="mb-4"><a href="{{ route ('students.stddashboard.final') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200">     النتيجة </a></li>
                <li class="mb-4"><a href="{{ route ('students.stddashboard.result') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> الدرجات </a></li>
                <li class="mb-4"><a href="{{ route ('students.stddashboard.assignment') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> الأسيمنتات </a></li>
                <li class="mb-4"><a href="{{ route ('students.stdprofile.QRlogin') }}" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> تسجيل الغياب </a></li>
                <li class="mb-4"><a href="{{ route ('students.stddashboard.settings') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200">   إعدادات الملف الشخصي </a></li>
                <li class="mb-4"><a href="{{ route ('students.stdprofile.profile') }}" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200">  </a></li>

            </ul>
        </div>
    </aside>

    <div class="grid md:grid-cols-2 gap-8 items-center flex-row-reverse">
        <div class="genral">
            <h1 class="text-2xl font-bold text-pink-950 leading-tight text-center md:text-right">
                مرحباً  <span class="text-blue-900">{{ $student->name }}</span> في جامعة أسيوط الجديدة التكنولوجية
            </h1>
            <div class="bg-gray-50 shadow-md m-10 rounded-2xl p-5 border border-gray-300">
                <div class="relative flex items-center space-x-3 mb-4 text-base sm:text-lg md:text-xl">
                    <div class="bg-blue-500 text-white p-3 rounded-full">
                        <img src="{{ asset('public/resources/student/stdprofile/user.png') }}" alt="" class="w-5 h-5">
                    </div>
                    <h4 class="text-red-900 text-2xl">الطالب/ة :</h4>
                    <h4 class="text-gray-700 text-2xl">{{ $student->name }} </h4>
                </div>
                <ul class="space-y-3">
                    {{-- <li class="flex items-center space-x-2"><i data-lucide="school" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">الفرقه :</span><span class="text-gray-700" >{{ $instructor->name }}</span></li> --}}
                    <li class="flex items-center space-x-2"><i data-lucide="key" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">الكود الجامعي :</span><span class="text-gray-700">{{ $student->code }}</span></li>
                    {{-- <li class="flex items-center space-x-2"><i data-lucide="phone" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">رقم الهاتف :</span><span class="text-gray-700">{{ $student->phone }}</span></li> --}}
                    <li class="flex items-center space-x-2"><i data-lucide="at-sign" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">الإيميل :</span><span class="text-gray-700" dir="ltr" >{{ $student->email }}</span></li>
                    <li class="flex items-center space-x-2"><i data-lucide="id-card" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">الرقم القومي :</span><span class="text-gray-700">{{ $student->national_id }}</span></li>
                    <li class="flex items-center space-x-2"><i data-lucide="file-user" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">البرنامج :</span><span class="text-gray-700">{{ $student->department->department_name }} </span></li>
                </ul>
            </div>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('public/resources/student/stdprofile/student.gif') }}" alt="Student Image" class="w-80 h-80">
        </div>
    </div>
<!-- settingsModal -->
<div id="settingsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 px-4">
    <div class="bg-white top-10 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-3 rounded-xl shadow-lg w-full max-w-md mx-auto p-6 relative overflow-y-auto max-h-[90vh]">
        <button onclick="closeModal()" class="absolute top-3 right-4 text-gray-500 hover:text-black text-2xl font-bold">&times;</button>
        <h2 class="text-2xl font-semibold text-center mb-1">إعدادات الحساب</h2>
        <p class="text-gray-500 text-center mb-6">تعديل البيانات الشخصية</p>
        <div class="flex flex-col items-center mb-6">
            <label for="profileImageInput" class="cursor-pointer">
                <img id="previewImage" src="{{ asset('public/resources/student/stdprofile/user.png') }}" alt="الصورة الشخصية" class="w-20 h-20 rounded-full border shadow-md object-cover">
            </label>
            <input type="file" id="profileImageInput" class="hidden" accept="image/*" onchange="previewSelectedImage(event)">
            <p class="text-sm text-gray-500 mt-2">اضغط على الصورة لتغييرها</p>
            <button onclick="updatePhone()" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 mt-2">تحديث البيانات</button>
        </div>
        <form onsubmit="return false">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">الاسم الكامل</label>
                <input type="text" value="{{ $student->name }} " disabled class="mt-1 border block w-full rounded-md border-gray-300 shadow-sm" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">الرقم الجامعي</label>
                <input type="text" value="{{ $student->code }}" disabled class="mt-1 border block w-full rounded-md border-gray-300 shadow-sm" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">رقم الهاتف</label>
                <input id="phoneInput" type="text" value="{{ $student->phone }}" class="mt-1 border block w-full rounded-md border-gray-300 shadow-sm" />
                <p id="phoneError" class="text-red-600 text-sm mt-1 hidden"></p>
            </div>

        </form>
            <div id="progressBar" class="w-full h-2 bg-gray-200 rounded overflow-hidden hidden">
                <div id="progress" class="h-full bg-blue-500 transition-all duration-300 ease-out" style="width: 0%;">
                </div>
            </div>
    </div>
</div>






<script src={{ asset('public/resources/student/stdprofile/std.js') }}>

</script>

</body>
</html>
