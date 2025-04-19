<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الجامعة - إدارة الطلاب</title>
    <link rel="stylesheet" href="{{ asset('public/css/admin/dashboard_std.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
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
                    <li class="mb-4"><a href="{{ route('members.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">اعضاء هيئة التدريس</a></li>
                    <li class="mb-4"><a href="{{ route('students.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الطلاب</a></li>
                    <li class="mb-4"><a href="{{ route('materials.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">المواد</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الإعدادات</a></li>
                </ul>
            </div>
        </aside>
    <main class="p-6">
        <div class="modal-content py-4">
            <h2 class="text-4xl mb-4 text-pink-950">إدارة الطلاب</h2>
            <p class="text-gray-600 mt-4 mb-6 text-center md:text-right">لإضافة طالب جديد اضغط على الزر أدناه</p>
            <button id="addStudentBtn" class="btn1 p-1.5 hover:text-white" onclick="openModal()">إضافة طالب</button>
        </div>
        @if(!$students->isEmpty())
        <!-- table -->
        <div class="bg-white p-6 rounded-lg shadow-lg mt-16 overflow-x-auto">
            <div class="flex flex-col md:flex-row items-center gap-4 mb-6">
                <!-- حقل البحث بالكود الجامعي -->
                <input type="text" id="codeSearch" class="border p-2 rounded-lg w-full md:w-1/4" placeholder="ابحث بالكود الجامعي">
                <select id="yearFilter" class="border p-2 rounded-lg w-full md:w-1/4">
                    <option value="">اختر السنة الدراسية</option>
                    <option value="الأولى">الأولى</option>
                    <option value="الثانية">الثانية</option>
                    <option value="الثالثة">الثالثة</option>
                    <option value="الرابعة">الرابعة</option>
                </select>

                <select id="majorFilter" class="border p-2 rounded-lg w-full md:w-1/4">
                    <option value="">اختر البرنامج</option>
                    <option value="تكنولوجيا المعلومات">تكنولوجيا المعلومات</option>
                    <option value="تكنولوجيا شبكات نقل و توزيع الكهرباء">تكنولوجيا شبكات نقل و توزيع الكهرباء</option>
                    <option value="تكنولوجيا الأجهزة الإلكترونية و الكهربائية">تكنولوجيا الأجهزة الإلكترونية و الكهربائية</option>
                    <option value="تكنولوجيا التصنيع الغذائي">تكنولوجيا التصنيع الغذائي</option>
                </select>
            </div>

            <table class="border-collapse w-full shadow-sm rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">الاسم</th>
                        <th class="border border-gray-300 px-4 py-3">الرقم القومي</th>
                        <th class="border border-gray-300 px-4 py-3">الرقم الجامعي</th>
                        <th class="border border-gray-300 px-4 py-3">البرنامج</th>
                        <th class="border border-gray-300 px-4 py-3">السنة</th>
                        <th class="border border-gray-300 px-4 py-3">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $i = 1;
                    @endphp
                    @foreach($students as $student)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="border border-gray-300 px-4 py-3">{{ $student->name }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $student->national_id }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $student->code }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $student->department['department_name'] }}</td>
                            <td class="border border-gray-300 px-4 py-3">
                                @if($student->year == 1)
                                    الأولى
                                @elseif($student->year == 2)
                                    الثانية
                                @elseif($student->year == 3)
                                    الثالثة
                                @elseif($student->year == 4)
                                    الرابعة
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-3 space-x-2">
                                <button onclick="openEdite()" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition">تعديل</button>
                                <button onclick="opendelete()" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition">حذف</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="text-center text-2xl text-gray-500 mt-10">لا توجد بيانات متاحة</div>
        @endif
    </main>

    <form method="POST" action="">
        @csrf
        <div id="studentModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg w-1/3">
                <h2 class="text-xl mb-4">إضافة طالب جديد</h2>
                <input type="text" name="student_name" id="studentName" placeholder="اسم الطالب" class="border p-2 w-full mb-2">
                <input type="text" name="national_id" id="studentNID" placeholder="الرقم القومي" class="border p-2 w-full mb-2">
                <input type="text" name="code" id="studentID" placeholder="الكود الجامعي" class="border p-2 w-full mb-2">
                <select name="student_year" id="studentYear" class="w-full p-4 border mb-4" title="اختر سنة">
                    <option value="" disabled selected>اختر السنة الدراسية </option>
                    <option value="1">السنة الأولى</option>
                    <option value="2">السنة الثانية</option>
                    <option value="3">السنة الثالثة</option>
                    <option value="4">السنة الرابعة</option>
                </select>
                <select name="student_department" id="studentProgram" class="w-full p-4 border mb-4" title="اختر برنامج">
                    <option value="" disabled selected> اختر البرنامج</option>
                    <option value="1">تكنولوجيا المعلومات</option>
                    <option value="2">تكنولوجيا شبكات نقل و توزيع الكهرباء </option>
                    <option value="3">تكنولوجيا الأجهزة الإلكترونية و الكهربائية</option>
                    <option value="4">تكنولوجيا التصنيع الغذائي </option>
                </select>
                <button type="submit" onclick="addStudent()" class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
            </form>
                <button type="button" onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
            </div>
        </div>


    <div id="studentEdite" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <h2 class="text-xl mb-4">إضافة طالب جديد</h2>
            <input type="text" id="studentName1" placeholder="اسم الطالب" class="border p-2 w-full mb-2">
            <input type="text" id="studentNID1" placeholder="الرقم القومي" class="border p-2 w-full mb-2">
            <input type="text" id="studentID1" placeholder="الكود الجامعي" class="border p-2 w-full mb-2">
            <select id="studentYear1" class="w-full p-4 border mb-4" title="اختر سنة">
                <option value="">اختر السنة الدراسية </option>
                <option value="السنة الأولى">السنة الأولى</option>
                <option value="السنة الثانية">السنة الثانية</option>
                <option value="السنة الثالثة">السنة الثالثة</option>
                <option value="السنة الرابعة">السنة الرابعة</option>
            </select>
            <select id="studentProgram1" class="w-full p-4 border mb-4" title="اختر برنامج">
                <option value="">اختر البرنامج</option>
                <option value="تكنولوجيا المعلومات ">تكنولوجيا المعلومات</option>
                <option value="تكنولوجيا شبكات نقل و توزيع الكهرباء">تكنولوجيا شبكات نقل و توزيع الكهرباء </option>
                <option value="تكنولوجيا الأجهزة الإلكترونية و الكهربائية">تكنولوجيا الأجهزة الإلكترونية و الكهربائية</option>
                <option value="تكنولوجيا التصنيع الغذائي  ">تكنولوجيا التصنيع الغذائي </option>
            </select>
            <button onclick="EditeStudent()" class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
            <button onclick="closeEdite()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
        </div>
    </div>

    <!-- delete -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-96 animate-fadeIn">
            <h2 class="text-xl font-bold mb-2 text-gray-800">تأكيد الحذف</h2>
            <p class="text-gray-700">سوف يتم حذف هذا العنصر وكافة معلوماته بشكل نهائي!<br>هل ترغب بالاستمرار؟</p>
            <div class="flex justify-between mt-4">
                <button onclick="deleteMessage()" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">حذف</button>
                <button onclick="closedeleteModal('deleteModal')" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">إلغاء</button>
            </div>
        </div>
    </div>
    <div id="deletedMessage" class="fixed inset-0 flex items-center justify-center hidden opacity-70">
        <div class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
            تم الحذف بنجاح!
        </div>
    </div>

    <script src="{{ asset('public/js/admin/dash-std.js') }}">
    </script>
</body>
</html>
