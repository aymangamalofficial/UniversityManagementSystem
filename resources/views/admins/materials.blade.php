@extends('admins.layout')

@section('title', 'المواد الدراسية')

@section('main-content')
<main class="p-6">
    <div class="modal-content py-4">
        <h2 class="text-4xl mb-4 text-pink-950">إدارة المواد الدراسية</h2>
        <p class="text-gray-600 mt-4 mb-6 text-center md:text-right">لتعين دكتور و معيد لكل مادة اختر من القائمة المنسدلة ثم اضغط تعيين   </p>
    </div>
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
                    @php $i = 1; @endphp
                    @foreach($courses as $course)
                    <form method="POST" action="{{ route('materials.admin.update') }}">
                        @csrf
                        <tr class="hover:bg-gray-100">
                            <td class="border p-2">{{ $i++ }}</td>
                            <td class="border p-2"> {{ $course->course_name }} </td>
                            <input type="hidden" name="course_id" value="{{ $course->course_id }}">
                            <td class="border p-2">
                                <select name="doc" class="w-auto min-w-[200px] p-2 border border-gray-400" title="اختر دكتور للتعيين">
                                    <option class="px-4 py-2" value="0" disabled selected>اختر اسم الدكتور </option>
                                    @foreach($doctors as $doctor)
                                        @if($doctor->instructor_id == $course->doctor_id)
                                            <option class="px-4 py-2" value="{{ $doctor->instructor_id }}" selected>{{ $doctor->name }}</option>
                                        @else
                                            <option class="px-4 py-2" value="{{ $doctor->instructor_id }}">{{ $doctor->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td class="border p-2">
                                <select name="assist" class="w-auto min-w-[200px] p-2 border border-gray-400" title="اختر معيد للتعين">
                                    <option class="px-4 py-2" value="0" disabled selected>اختر اسم المعيد </option>
                                    @foreach($assistants as $assistant)
                                    @if($assistant->instructor_id == $course->assistant_id)
                                        <option class="px-4 py-2" value="{{ $assistant->instructor_id }}" selected>{{ $assistant->name }}</option>
                                    @else
                                        <option class="px-4 py-2" value="{{ $assistant->instructor_id }}">{{ $assistant->name }}</option>
                                    @endif
                                        @endforeach
                                </select>
                            </td>
                            <td class="border p-2 space-x-2">
                                <button type="submit" {{--==onclick="opensave()"--}} class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">تعيين</button>
                                {{-- <button onclick="opendelete()" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">حذف</button> --}}
                                {{-- <button onclick="openedite()" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">تعديل</button> --}}
                            </td>
                        </tr>
                    </form>
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

@endsection
