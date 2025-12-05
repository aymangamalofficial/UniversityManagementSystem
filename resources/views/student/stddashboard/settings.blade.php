@extends('student.stddashboard.layout')
@section('title', 'إعدادات الملف الشخصي')
@section('content')

<main class="p-6 mr-0 md:mr-[220px]">
    <form id="studentForm"  class="max-w-3xl mx-auto">
    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-6">

    <!-- الصورة -->
    <div class="sm:col-span-2 border-b border-gray-300 pb-4">
    <label class="block text-sm font-bold text-gray-900 mb-2">الصورة</label>
    <div class="flex items-center gap-x-4">
        <!-- معاينة -->
        <img id="profilePreview" src="https://via.placeholder.com/48x48?text=👤" alt="صورة المستخدم"
        class="w-14 h-14 rounded-full object-cover border border-gray-300 shadow-sm" />

        <!-- زر مخصص -->
        <div>
        <input type="file" id="photoInput" accept="image/*" class="hidden" />
        <button type="button" id="uploadBtn"
            class="rounded-md bg-white px-3 py-1.5 text-sm font-semibold text-gray-800 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 shadow-sm">
            اختر صورة
        </button>
        </div>
    </div>
    </div>


        <!-- الاسم -->
        <div class="sm:col-span-2">
        <label for="name" class="block text-sm font-bold text-gray-900">الاسم</label>
        <input id="name" name="name" type="text" value="محمود محمد" readonly class="mt-1 block w-full rounded-md bg-gray-100 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 sm:text-sm" />
        </div>

        <!-- الرقم القومي -->
        <div>
        <label for="national-id" class="block text-sm font-bold text-gray-900">الرقم القومي</label>
        <input id="national-id" name="national_id" type="text" value="12345678901234" readonly class="mt-1 block w-full rounded-md bg-gray-100 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 sm:text-sm" />
        </div>

        <!-- الكود الجامعي -->
        <div>
        <label for="student-code" class="block text-sm font-bold text-gray-900">الكود الجامعي</label>
        <input id="student-code" name="student_code" type="text" value="778954" readonly class="mt-1 block w-full rounded-md bg-gray-100 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 sm:text-sm" />
        </div>

        <div>
        <label for="student-code" class="block text-sm font-bold text-gray-900">الفرقة </label>
        <input id="student-code" name="student_code" type="text" value="الأولي" readonly class="mt-1 block w-full rounded-md bg-gray-100 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 sm:text-sm" />
        </div>
        <div>
        <label for="student-code" class="block text-sm font-bold text-gray-900">البرنامج </label>
        <input id="student-code" name="student_code" type="text" value="تكنولوجيا المعلومات" readonly class="mt-1 block w-full rounded-md bg-gray-100 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 sm:text-sm" />
        </div>

        <!-- رقم الهاتف -->
        <div>
        <label for="phone" class="block text-sm font-bold text-gray-900">رقم الهاتف</label>
        <input id="phone" name="phone" type="text" placeholder="01036987452" class="mt-1 block w-full rounded-md bg-white px-3 py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
        <p id="phone-error" class="text-red-600 text-sm mt-1 hidden">رقم الهاتف غير صحيح</p>
        </div>


        <!-- الإيميل -->
        <div>
        <label for="email" class="block text-sm font-bold text-gray-900">الإيميل</label>
        <input id="email" name="email" type="email" placeholder="123@gmail.com" class="mt-1 block w-full rounded-md bg-white px-3 py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" />
        <p id="email-error" class="text-red-600 text-sm mt-1 hidden">الإيميل غير صالح</p>
        </div>
    </div>

    <!-- زر الحفظ -->
    <div class="mt-6 flex justify-end">
        <button type="submit" class="rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600">
        حفظ
        </button>
    </div>
    <p id="formSuccess" class="text-green-600 text-sm mt-4 hidden text-center">تم حفظ البيانات بنجاح!</p>
        <div id="assignmentProgressBar" class="w-full h-2 bg-gray-200 rounded overflow-hidden hidden col-span-2 lg:col-span-1">
        <div id="assignmentProgress" class="h-full bg-blue-500 transition-all duration-300 ease-out" style="width: 0%;"></div>
    </div>
    </form>
</main>


    <script src="/std/std dashboard/settings/settings.js">
    </script>
</body>
</html>

@endsection
