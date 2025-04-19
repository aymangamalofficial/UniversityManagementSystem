@extends('admins.layout')

@section('title', 'إدارة أعضاء هيئة التدريس و الهيئة المعاونة')

@section('main-content')

    <main class="p-6">
        <div class="modal-content py-4">
            <h2 class="text-4xl mb-4 text-pink-950">إدارة الأدمن</h2>
            <p class="text-gray-600 mt-4 mb-6 text-center md:text-right">لإضافة أدمن جديد اضغط على الزر أدناه</p>
            <button id="addStudentBtn" class="btn1 p-1.5 hover:text-white" onclick="openModal()">إضافة أدمن</button>
        </div>
        <!-- table -->
        @if(!$admins->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-lg mt-16 overflow-x-auto">
            <h2 class="text-4xl mb-4 text-pink-950">قائمة الأدمن </h2>
            <div class="flex flex-col md:flex-row items-center gap-4 mb-6">
            <table class="border-collapse w-full shadow-sm rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">الاسم</th>
                        <th class="border border-gray-300 px-4 py-3">الرقم القومي</th>
                        <th class="border border-gray-300 px-4 py-3">الرقم الجامعي</th>
                        <th class="border border-gray-300 px-4 py-3">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($admins as $admin)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="border border-gray-300 px-4 py-3">{{ $admin->name }}</td>
                        <td class="border border-gray-300 px-4 py-3">{{$admin->national_id }}</td>
                        <td class="border border-gray-300 px-4 py-3"> {{$admin->code}}</td>
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
<div class="p-4 mt-8 bg-gray-100 rounded-lg shadow w-full">
    <h3 class="text-center font-bold text-lg text-pink-950 mb-4">لا يوجد أعضاء هيئة تدريس او هيئة معاونة</h3>
</div>

@endif
    </main>

    <div id="studentModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <h2 class="text-xl mb-4">إضافة أدمن جديد</h2>
            <form method="POST" action="">
                @csrf
            <input type="text"  name="name"  id="studentName" placeholder="اسم الأدمن" class="border p-2 w-full mb-2">
            <input type="text"  name="national_id" id="studentNID" placeholder="الرقم القومي" class="border p-2 w-full mb-2">
            <input type="text"  name="code" id="studentID" placeholder="الكود الجامعي" class="border p-2 w-full mb-2">

            <h3 class="text-lg mb-2">اختر الصلاحيات:</h3>
            <div class="border p-2 rounded-lg w-full">
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول للإعدادت"> الوصول للإعدادت
                </label>
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول لإدارة الطلاب"> الوصول لإدارة الطلاب
                </label>
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول لإدارة أعضاء هيئة التدريس"> الوصول لإدارة أعضاء هيئة التدريس
                </label>
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول الإدارة المواد الدراسية"> الوصول لإدارة المواد الدراسية
                </label>
            </div>

            <button type="submit" onclick="addStudent()" class="bg-green-500 text-white px-4 py-2 hover:bg-green-600 mt-4">حفظ</button>
            <button type="button" onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
        </form>
    </div>
    </div>


    <div id="studentEdite" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <h2 class="text-xl mb-4">تعديل بيانات أدمن </h2>
            <input type="text" id="studentName1" placeholder="اسم الأدمن" class="border p-2 w-full mb-2">
            <input type="text" id="studentNID1" placeholder="الرقم القومي" class="border p-2 w-full mb-2">
            <input type="text" id="studentID1" placeholder="الكود الجامعي" class="border p-2 w-full mb-2">
            <h3 class="text-lg mb-2">اختر الصلاحيات المراد تعديلها:</h3>
            <div class="border p-2 rounded-lg w-full">
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول للإعدادت"> الوصول للإعدادت
                </label>
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول لإدارة الطلاب"> الوصول لإدارة الطلاب
                </label>
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول لإدارة أعضاء هيئة التدريس"> الوصول لإدارة أعضاء هيئة التدريس
                </label>
                <label class="block">
                    <input type="checkbox" class="mr-2" value="الوصول الإدارة المواد الدراسية"> الوصول لإدارة المواد الدراسية
                </label>
            </div>
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

        <!-- save -->
        <div id="saveMessage" class="fixed inset-0 flex items-center justify-center hidden opacity-70">
            <div class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
                تم حفظ البيانات  بنجاح!
            </div>
        </div>

            <!-- edite -->
    <div id="editedMessage" class="fixed inset-0 flex items-center justify-center hidden opacity-70">
        <div class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
            تم تعديل البيانات بنجاح!
        </div>
    </div>

    @endsection
