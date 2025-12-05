<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الجامعة - الصفحة الرئيسية</title>
    <link rel="stylesheet" href="{{ asset('public/css/admin/dashboard_home.css') }}">
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
                        <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n.jpg') }}" alt="Logo" class="w-full h-full rounded-full">
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
                    <a class="signin" href="{{ route('home') }}">تسجيل الخروج <i class="fi fi-rr-sign-in-alt"></i></a>
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
            <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n-removebg-preview.png') }}" alt="شعار الجامعة" class="p-6 mt-9">
            <h2 class="text-xl font-bold text-center text-pink-950 mb-6">لوحة التحكم</h2>
            <div class="nav">
                <ul>
                    <li class="mb-4"><a href="{{ route('admin.home') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الرئيسية</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الدكاترة</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">المعيدين</a></li>
                    <li class="mb-4"><a href="{{ route('students.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الطلاب</a></li>
                    <li class="mb-4"><a href="{{ route('materials.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">المواد</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الإعدادات</a></li>
                </ul>
            </div>
        </aside>


        <main class="p-6">
            <div class="modal-content py-4">
                <h2 class="text-4xl mb-4 text-pink-950">إدارة جامعة أسيوط التكنولوجية الجديدة </h2>
                <div class="flex flex-col md:flex-row gap-4">

                    <div class="p-4 mt-8 bg-gray-100 rounded-lg shadow w-full">
                        <h3 class="text-center font-bold text-lg text-pink-950 mb-4">الإحصائيات</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <p class="text-gray-600">عدد الدكاترة</p>
                                <h4 class="font-bold text-2xl text-red-900">{{ $NumberOfDoctors }}</h4>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <p class="text-gray-600">عدد الطلاب</p>
                                <h4 class="font-bold text-2xl text-red-900">{{ $NumberOfStudents }}</h4>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <p class="text-gray-600">عدد المعيدين</p>
                                <h4 class="font-bold text-2xl text-red-900">{{ $NumberOfAssistants }}</h4>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <p class="text-gray-600">عدد الأقسام</p>
                                <h4 class="font-bold text-2xl text-red-900">{{ $NumberOfDepartments }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!$lastInstructors->isEmpty())
                <div class="p rounded shadow border">
                    <h2 class="text-2xl mt-15 mr-10">أعضاء هيئة التدريس الجدد</h2>
                    <table class="w-full  bg-white border-collapse border border-gray-500 mt-10 mb-10 text-center rounded">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="border p-2">م</th>
                                <th class="border p-2">الإسم </th>
                                <th class="border p-2">وظيفة التدريس </th>
                                {{-- <th class="border p-2">الكود الجامعي </th> --}}
                                <th class="border p-2">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="studentsBody" >
                            @php
                                $i = 1;
                            @endphp
                            @foreach($lastInstructors as $lastInstructor)
                                <tr class="hover:bg-gray-100">
                                    <td class="border p-2">{{ $i++ }}</td>
                                    <td class="border p-2">{{ $lastInstructor->name }}</td>
                                    <td class="border p-2">
                                        @if($lastInstructor->role_id == 0)
                                            معيد
                                        @elseif($lastInstructor->role_id == 1)
                                            دكتور
                                        @endif
                                    </td>
                                    {{-- <td class="border p-2">1</td> --}}
                                    <td class="border p-2 space-x-2">
                                        <button  class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">عرض</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-4 mt-8 bg-gray-100 rounded-lg shadow w-full">
                    <h3 class="text-center font-bold text-lg text-pink-950 mb-4">لا يوجد أعضاء هيئة تدريس جدد</h3>
                </div>
            @endif
    </main>


























    <button  class="bg-blue-400 opacity-70 rounded-2xl hover:opacity-100 hover:bg-pink-950 hover:text-blue-200 " onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top"><i class="fa-regular fa-circle-up"></i></i></button>
    <script src="{{ asset('public/js/admin/dashboard_home.js') }}">
    </script>
</body>
</html>
