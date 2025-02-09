<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الجامعة - الطلاب</title>
    <link rel="stylesheet" href="{{ asset('public/css/dashboard_std.css') }}">
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
                    <a href="/unversity/Home/home.html">
                        <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n.jpg') }}" alt="Logo" class="w-full h-full rounded-full">
                    </a>
                </div>
            </div>

            <!-- Centered Title -->
            <div class="flex-1 text-center">
                <a href="/unversity/Home/home.html" class="text-lg font-bold">جامعة أسيوط الجديدة التكنولوجية</a>
            </div>

            <!-- Login Button and Mobile Menu -->
            <div class="flex items-center space-x-3">
                <button class="login hidden md:inline-block bg-blue-300 text-black hover:shadow-lg hover:text-white transition px-4 py-2 rounded-lg duration-200">
                    <a class="signin" href="/Safety/Login/login.html">تسجيل الخروج <i class="fi fi-rr-sign-in-alt"></i></a>
                </button>
                <button id="menu-toggle" class="md:hidden bg-gray-700 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>
    </header>



    <div class="flex  md:flex-row h-screen">
            <aside class="w-64 bg-blue-50 shadow-2xl md:block hidden h-screen">
                <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n-removebg-preview.png') }}" alt="شعار الجامعة" class="p-6 ">
                <h2 class="text-xl font-bold text-center text-pink-950 mb-6">لوحة التحكم</h2>
                <div class="nav">
                    <ul>
                        <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الرئيسية</a></li>
                        <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الدكاترة</a></li>
                        <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">المعيدين</a></li>
                        <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الطلاب</a></li>
                        <li><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الإعدادات</a></li>
                    </ul>
                </div>
            </aside>
        <main class="flex-1 p-6 relative md:mr-10">
            <h1 class="text-2xl font-bold text-red-900 mb-4">إدارة الطلاب</h1>
            <p class="text-gray-600 mt-4 mb-6 text-center md:text-right">لإضافة طالب جديد اضغط علي الزر ادناه  </p>
            <button  id="addStudentBtn" class="btn1 p-1.5 hover:text-white" onclick="openModal()"> إضافة طالب</button>

            <div id="modal" class="modal flex">
                <div class="modal-content">
                    <h2 class="text-lg mb-4 text-pink-950">إضافة طالب جديد</h2>
                    <input type="text" placeholder="الاسم الكامل" class="w-full p-4 border mb-4">
                    <input type="text" placeholder="الرقم القومي" class="w-full p-4 border mb-4">
                    <input type="text" placeholder="كود الطالب" class="w-full p-4 border mb-4">
                    <select class="w-full p-4 border mb-4">
                        <option value="">اختر السنة الدراسية </option>
                        <option value="السنة الأولى">السنة الأولى</option>
                        <option value="السنة الثانية">السنة الثانية</option>
                        <option value="السنة الثالثة">السنة الثالثة</option>
                        <option value="السنة الرابعة">السنة الرابعة</option>
                    </select>
                    <select class="w-full p-4 border mb-4">
                        <option value="">اختر البرنامج</option>
                        <option value="تكنولوجيا المعلومات ">تكنولوجيا المعلومات</option>
                        <option value="تكنولوجيا شبكات نقل و توزيع الكهرباء">تكنولوجيا شبكات نقل و توزيع الكهرباء </option>
                        <option value="تكنولوجيا الأجهزة الإلكترونية و الكهربائية">تكنولوجيا الأجهزة الإلكترونية و الكهربائية</option>
                        <option value="تكنولوجيا التصنيع الغذائي  ">تكنولوجيا التصنيع الغذائي </option>
                    </select>
                    <div class="flex justify-between mt-4">
                        <button class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
                        <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow mt-16 overflow-x-auto">
                <h2 class="text-lg font-semibold mb-4">إدارة الطلاب</h2>
                <!--  البحث والتصفية -->
                <div class="flex flex-col md:flex-row items-center md:justify-between mb-6 space-y-4 md:space-y-0">
                    <!--  البحث -->
                    <input type="text" id="searchInput" placeholder=" ابحث عن الطالب..." class="border p-2 rounded-lg w-full md:w-1/3">

                    <!-- فلترة بالسنة -->
                    <select id="yearFilter" class="border p-2 rounded-lg w-full md:w-1/4">
                        <option value=""> اختر السنة الدراسية</option>
                        <option value="السنة الأولى">السنة الأولى</option>
                        <option value="السنة الثانية">السنة الثانية</option>
                        <option value="السنة الثالثة">السنة الثالثة</option>
                        <option value="السنة الرابعة">السنة الرابعة</option>
                    </select>

                    <!-- فلترة بالتخصص -->
                    <select id="majorFilter" class="border p-2 rounded-lg w-full md:w-1/4">
                        <option value=""> اختر البرنامج</option>
                        <option value="تكنولوجيا المعلومات ">تكنولوجيا المعلومات</option>
                        <option value="تكنولوجيا شبكات نقل و توزيع الكهرباء">تكنولوجيا شبكات نقل و توزيع الكهرباء </option>
                        <option value="تكنولوجيا الأجهزة الإلكترونية و الكهربائية">تكنولوجيا الأجهزة الإلكترونية و الكهربائية</option>
                        <option value="تكنولوجيا التصنيع الغذائي  ">تكنولوجيا التصنيع الغذائي </option>
                    </select>
                </div>
                        <h2 class="text-lg font-semibold mb-4">قائمة الطلاب</h2>
                        @if(!$students->isEmpty())
                        @foreach($students as $student)
                            <p>{{ $student->name }}</p>
                        @endforeach
                    @else
                        <p>لا توجد بيانات متاحة</p>
                    @endif
                        <table class="w-full border-collapse border border-gray-500 mt-10 text-center">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border p-2">م</th>
                                    <th class="border p-2">الاسم</th>
                                    <th class="border p-2">الرقم القومي</th>
                                    <th class="border p-2">كود الطالب</th>
                                    <th class="border p-2">السنة</th>
                                    <th class="border p-2">التخصص</th>
                                    <th class="border p-2">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="studentsBody" >
                                <tr class="hover:bg-gray-100">
                                    <td class="border p-2">1</td>
                                    <td class="border p-2">أحمد محمد</td>
                                    <td class="border p-2">123456789</td>
                                    <td class="border p-2">S001</td>
                                    <td class="border p-2">السنة الأولى</td>
                                    <td class="border p-2">علوم الحاسب</td>
                                    <td class="border p-2 space-x-2">
                                        <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">حذف</button>
                                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">تعديل</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
        </main>
    </div>
    <script src="{{ asset('public/js/dash-std.js') }}">
    </script>
</body>
</html>
