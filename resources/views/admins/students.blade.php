@extends('admins.layout')

@section('title', 'ادارة الطلاب')

@section('main-content')
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
                                {{-- <button onclick="openEdite()" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition">تعديل</button> --}}
                            <form action="{{ route('students.admin.del') }}" method="POST">
                                @csrf
                                <input type="hidden" id="studentID" name="student_id" value="{{ $student->student_id }}">
                                <button type="submit" {{--onclick="opendelete()"--}} class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition">حذف</button>
                            </form>
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









@endsection
