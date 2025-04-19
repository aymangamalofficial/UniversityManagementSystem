@extends('admins.layout')

@section('title', 'الصفحة الرئيسية')

@section('main-content')
    <main class="p-6">
        <div class="modal-content py-4">
                <h2 class="text-4xl mb-4 text-pink-950">إدارة جامعة أسيوط التكنولوجية الجديدة </h2>
            <div class="flex flex-col md:flex-row gap-4">

                <div class="  p-4 mt-8 bg-gray-100 rounded-lg shadow w-full">
                    <div class="flex text-center">
                        <h3 class="text-center font-bold text-3xl text-pink-950 mb-4">الإحصائيات</h3>
                        <img src="{{ asset('public/resources/admins/home/analysis-unscreen.gif') }}" title="statistics" class="w-12 h-12">
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex flex-col bg-white p-4 rounded-lg shadow-md border border-gray-200 items-center gap-3 group transition-all duration-300 hover:shadow-lg hover:scale-105 w-64">
                            <img src="{{ asset('public/resources/admins/home/lecturer.gif') }}" title="doc" class="w-12 h-12 transition-all duration-300 group-hover:scale-110 group-hover:translate-y-[-3px]">
                            <p class="text-gray-600 text-3xl transition-all duration-300 group-hover:text-gray-800 group-hover:scale-105">عدد الدكاترة</p>
                            <h4 class="font-bold text-3xl text-red-900 transition-all duration-300 group-hover:text-red-700 group-hover:scale-110">{{ $NumberOfDoctors }}</h4>
                            <div class="w-full bg-gray-300 h-2 rounded-full overflow-hidden mt-2">
                                <div class="bg-red-600 h-full w-[80%] transition-all duration-1000"></div>
                            </div>
                        </div>

                        <div class="flex flex-col bg-white p-4 rounded-lg shadow-md border border-gray-200 items-center gap-3 group transition-all duration-300 hover:shadow-lg hover:scale-105 w-64">
                            <img src="{{ asset('public/resources/admins/home/administrative-assistant.gif') }}" title="doc" class="w-12 h-12 transition-all duration-300 group-hover:scale-110 group-hover:translate-y-[-3px]">
                            <p class="text-gray-600 text-2xl transition-all duration-300 group-hover:text-gray-800 group-hover:scale-105">عدد المُعيدين</p>
                            <h4 class="font-bold text-3xl text-red-900 transition-all duration-300 group-hover:text-red-700 group-hover:scale-110">{{ $NumberOfAssistants }}</h4>
                            <div class="w-full bg-gray-300 h-2 rounded-full overflow-hidden mt-2">
                                <div class="bg-blue-600 h-full w-[50%] transition-all duration-1000"></div>
                            </div>
                        </div>

                        <div class="flex flex-col bg-white p-4 rounded-lg shadow-md border border-gray-200 items-center gap-3 group transition-all duration-300 hover:shadow-lg hover:scale-105 w-64">
                            <img src="{{ asset('public/resources/admins/home/student.gif') }}" title="doc" class="w-12 h-12 transition-all duration-300 group-hover:scale-110 group-hover:translate-y-[-3px]">
                            <p class="text-gray-600 text-3xl transition-all duration-300 group-hover:text-gray-800 group-hover:scale-105">عدد الطلاب</p>
                            <h4 class="font-bold text-3xl text-red-900 transition-all duration-300 group-hover:text-red-700 group-hover:scale-110">{{ $NumberOfStudents }}</h4>
                            <div class="w-full bg-gray-300 h-2 rounded-full overflow-hidden mt-2">
                                <div class="bg-green-600 h-full w-[90%] transition-all duration-1000"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!$lastInstructors->isEmpty())
            <div class="bg-white p-6 rounded-lg shadow-lg mt-16 overflow-x-auto">

                <h2 class="text-2xl mt-5 mr-10 mb-5">أعضاء هيئة التدريس الجدد</h2>
                <div class="flex flex-col md:flex-row items-center gap-4 mb-6">
                    <!-- حقل البحث بالكود الجامعي -->
                    <input type="text" id="codeSearch" class="border p-2 rounded-lg w-full md:w-1/4" placeholder="ابحث بالكود الجامعي">

                    <select id="majorFilter" class="border p-2 rounded-lg w-full md:w-1/4">
                        <option value="">اختر الهيئة</option>
                        <option value="هيئة تدريس">هيئة تدريس</option>
                        <option value="هيئة معاونة">هيئة معاونة</option>
                    </select>
                </div>

                    <!-- جدول البيانات -->
                    <table class="border-collapse w-full shadow-sm rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="border border-gray-300 px-4 py-3">الاسم</th>
                                <th class="border border-gray-300 px-4 py-3">الرقم القومي</th>
                                <th class="border border-gray-300 px-4 py-3">الرقم الجامعي</th>
                                <th class="border border-gray-300 px-4 py-3">الهيئة التابع لها</th>
                                <th class="border border-gray-300 px-4 py-3">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody id="dataTable">
                            @foreach($lastInstructors as $lastInstructor)
                                <tr class="hover:bg-gray-100">
                                    <td class="border p-2">{{ $lastInstructor->name }}</td>
                                    <td class="border p-2">{{ $lastInstructor->national_id }}</td>
                                    <td class="border p-2">{{ $lastInstructor->code }}</td>
                                    <td class="border p-2">
                                        @if($lastInstructor->role_id == 0)
                                        هيئة معاونة
                                        @elseif($lastInstructor->role_id == 1)
                                        هيئة تدريس
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-3 space-x-2">
                                        <button  class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">عرض</button>
                                        <!-- <button onclick="openEditedr()" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition">تعديل</button> -->
                                        <!-- <button onclick="opendelete()" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition">حذف</button> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @else
        <div class="p-4 mt-8 bg-gray-100 rounded-lg shadow w-full">
            <h3 class="text-center font-bold text-lg text-pink-950 mb-4">لا يوجد أعضاء هيئة تدريس جدد</h3>
        </div>
        @endif
    </main>
@endsection
