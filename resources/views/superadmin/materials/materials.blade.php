<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الجامعة - الصفحة الرئيسية</title>
    <link rel="stylesheet" href="{{ asset('public/css/admin/materials.css') }}">
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
                    <li class="mb-4"><a href="{{ route('members.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">اعضاء هيئة التدريس</a></li>
                    <li class="mb-4"><a href="{{ route('students.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الطلاب</a></li>
                    <li class="mb-4"><a href="{{ route('materials.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">المواد</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الإعدادات</a></li>
                </ul>
            </div>
        </aside>


        <main class="p-6">
                <div class="modal-content py-4">
                    <h2 class="text-4xl mb-4 text-pink-950">إدارة المواد</h2>
                    <form method="POST" action="">
                        @csrf
                    <div class="flex flex-col md:flex-row gap-4">
                        <select name="department_id" class="w-auto min-w-[200px] p-4 border border-gray-400" title="اختر البرنامج">
                            <option class="px-4 py-2" value="" disabled selected>اختر البرنامج</option>
                            @foreach($departments as $department)
                                <option class="px-4 py-2" value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                        <select name="year" class="w-auto min-w-[200px] p-4 border border-gray-400" title="اختر السنةالدراسية">
                            <option class="px-4 py-2" value="" disabled selected>اختر الفرقة </option>
                            <option class="px-4 py-2" value="1">الفرقة الأولى</option>
                            <option class="px-4 py-2" value="2">الفرقة الثانية</option>
                            <option class="px-4 py-2" value="3">الفرقة الثالثة</option>
                            <option class="px-4 py-2" value="4">الفرقة الرابعة</option>
                        </select>
                        <select name="semester" class="w-auto min-w-[200px] p-4 border border-gray-400" title="اختر الترم">
                            <option class="px-4 py-2" value="" disabled selected>اختر الترم </option>
                            <option class="px-4 py-2" value="1">الترم الاول </option>
                            <option class="px-4 py-2" value="2">الترم الثاني</option>
                        </select>
                        <button class="bg-green-500 text-white px-2 py-1  hover:bg-green-600" type="submit">إظهار</button>
                    </form>
                </div>

                </div>


                    @if(isset($courses))
                        <h2 class="text-2xl mt-48 mr-10">قائمة المواد</h2>
                        <div class="p rounded shadow">
                            <table class="w-full  bg-white border-collapse border border-gray-500 mt-10 mb-10 text-center rounded">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-700">
                                        <th class="border p-2">م</th>
                                        <th class="border p-2">اسم المادة</th>
                                        <th class="border p-2">اسم الدكتور</th>
                                        <th class="border p-2">اسم المعيد</th>
                                        <th class="border p-2">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white" id="studentsBody" >
                                    @foreach($courses as $course)
                                        <tr class="hover:bg-gray-100">
                                            <td class="border p-2">1</td>
                                            <td class="border p-2"> C++ </td>
                                            <td class="border p-2">
                                                <select class="w-auto min-w-[200px] p-2 border border-gray-400" title="اختر دكتور للتعيين">
                                                    <option class="px-4 py-2" value="" disabled selected>اختر اسم الدكتور </option>
                                                    @foreach($doctors as $doctor)
                                                        <option class="px-4 py-2" value="{{ $doctor->instructor_id }}">{{ $doctor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="border p-2">
                                                <select class="w-auto min-w-[200px] p-2 border border-gray-400" title="اختر معيد للتعين">
                                                    <option class="px-4 py-2" value="" disabled selected>اختر اسم المعيد </option>
                                                    @foreach($assistants as $assistant)
                                                        <option class="px-4 py-2" value="{{ $assistant->instructor_id }}">{{ $assistant->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="border p-2 space-x-2">
                                                <button onclick="opensave()" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">تعيين</button>
                                                {{-- <button onclick="opendelete()" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">حذف</button> --}}
                                                {{-- <button onclick="openedite()" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">تعديل</button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center text-2xl text-gray-500 mt-10">اختر المواد التي تريد عرضها</div>

                    @endif
        </main>





































            <!-- حذف -->
            <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center w-96 animate-fadeIn">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">تأكيد الحذف</h2>
                    <p class="text-gray-700">سوف يتم حذف هذا العنصر وكافة معلوماته بشكل نهائي!<br>هل ترغب بالاستمرار؟</p>
                    <div class="flex justify-between mt-4">
                        <button onclick="deleteMessage()" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">حذف</button>
                        <button onclick="closeModal('deleteModal')" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">إلغاء</button>
                    </div>
                </div>
            </div>
            <div id="deletedMessage" class="fixed inset-0 flex items-center justify-center hidden opacity-70">
                <div class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
                    تم الحذف بنجاح!
                </div>
            </div>

            <!-- تعديل -->
            <div id="editeModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center w-96 animate-fadeIn">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">تأكيد التعديل</h2>
                    <p class="text-gray-700">هل تعديل المعلومات ؟   </p>
                    <div class="flex justify-between mt-4">
                        <button onclick="editeMessage()" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">تعديل</button>
                        <button onclick="editeModal('editeModal')" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">إلغاء</button>
                    </div>
                </div>
            </div>
            <div id="editeMessage" class="fixed inset-0 flex items-center justify-center hidden opacity-70">
                <div class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
                    تم التعديل بنجاح!
                </div>
            </div>

            <!-- حفظ -->
            <div id="saveModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center w-96 animate-fadeIn">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">تأكيد الحفظ</h2>
                    <p class="text-gray-700">هل ترغب بحفظ التغييرات؟</p>
                    <div class="flex justify-between mt-4">
                        <button onclick="saveMessage()" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">حفظ</button>
                        <button onclick="saveModal('saveModal')" class="bg-gray-500 text-white px-3 py-1 rounded-md hover:bg-gray-600 transition">إلغاء</button>
                    </div>
                </div>
            </div>
            <div id="saveMessage" class="fixed inset-0 flex items-center justify-center hidden opacity-70">
                <div class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
                    تم الحفظ بنجاح!
                </div>
            </div>


    <button  class="bg-blue-400 opacity-70 rounded-2xl hover:opacity-100 hover:bg-pink-950 hover:text-blue-200 " onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top"><i class="fa-regular fa-circle-up"></i></i></button>
    <script src="{{ asset('public/js/admin/materials.js') }}">
    </script>
</body>
</html>
