@extends('instructors.layout')

@section('title', '  ادراة الامتحانات - الهيئة المعاونة')

@section('main-content')


    <main class="p-6 mr-0 md:mr-[220px]">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Course 1  -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-sky-950 text-white p-2 grid grid-cols-12 gap-3 items-center">
                <i data-lucide="book-open" class="w-6 h-6 col-span-1 sm:col-span-1"></i>
                <div class="col-span-11 sm:col-span-11">
                    <h2 dir="ltr" class="text-lg">IOT (internet of things)</h2>
                </div>
            </div>

            <div class="p-4 text-sm">
                <p class="mb-1">
                    <i data-lucide="user" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">دكتور المادة :</span>
                    <span class="w-1.5 text-blue-700">محمود</span>
                </p>
                <p class="mb-1">
                    <i data-lucide="graduation-cap" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">الفرقة :</span>
                    <span class="w-1.5 text-blue-700">التالتة</span>
                </p>
                <p class="mb-1">
                    <i data-lucide="school" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">القسم :</span>
                    <span class="w-1.5 text-blue-700">تكنولوجيا المعلومات</span>
                </p>
            </div>

            <div class="flex justify-center items-center gap-x-2 m-2">
                <button onclick="openAssignmentModal()" class="cursor-pointer text-white p-1 px-3 bg-sky-600 rounded hover:bg-sky-800 hover:shadow flex items-center gap-1">
                    رفع Assignment
                    <i data-lucide="upload" class="w-4 h-4"></i>
                </button>
                <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                    عرض Assignments
                    <i data-lucide="eye" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
        <!-- Course 2  -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-sky-950 text-white p-2 grid grid-cols-12 gap-3 items-center">
                <i data-lucide="book-open" class="w-6 h-6 col-span-1 sm:col-span-1"></i>
                <div class="col-span-11 sm:col-span-11">
                    <h2 dir="ltr" class="text-lg">JAVA</h2>
                </div>
            </div>

            <div class="p-4 text-sm">
                <p class="mb-1">
                    <i data-lucide="user" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">دكتور المادة :</span>
                    <span class="w-1.5 text-blue-700">محمود</span>
                </p>
                <p class="mb-1">
                    <i data-lucide="graduation-cap" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">الفرقة :</span>
                    <span class="w-1.5 text-blue-700">التالتة</span>
                </p>
                <p class="mb-1">
                    <i data-lucide="school" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">القسم :</span>
                    <span class="w-1.5 text-blue-700">تكنولوجيا المعلومات</span>
                </p>
            </div>

            <div class="flex justify-center items-center gap-x-2 m-2">
                <button onclick="openAssignmentModal()" class="cursor-pointer text-white p-1 px-3 bg-sky-600 rounded hover:bg-sky-800 hover:shadow flex items-center gap-1">
                    رفع Assignment
                    <i data-lucide="upload" class="w-4 h-4"></i>
                </button>
                <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                    عرض Assignments
                    <i data-lucide="eye" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

    </div>

    <div id="assignmentTimeline" class="mt-5 bg-gray-100 p-2 rounded shadow ">
        <li  class="text-xl font-bold text-sky-900 mb-4 border-b-4 border-blue-500 pb-2">
            Assignment
            <span class="text-pink-900">IOT</span>
        </li>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2">
            <!-- Timeline Item 1 -->
            <li class="bg-white shadow rounded-lg p-4 border border-sky-100 ">
                <div class="grid grid-cols-12 gap-3  items-center ">
                    <i data-lucide="file" class="w-10 h-10 items-center col-span-1 sm:col-span-1 text-sky-700"></i>
                    <div class="col-span-11 sm:col-span-11">
                        <div class="items-center justify-between mb-2">
                            <h3 class="font-semibold text-blue-800 text-md">1.pdf</h3>
                            <p class="text-sm text-gray-700 mb-1">
                                <strong>المادة:</strong> IOT
                            </p>
                        </div>
                        <div class="col-span-4 sm:col-span-4">
                            <span class="text-sm text-gray-500">2025-06-14 10:15 ص</span>
                            <a href="/uploads/assignment1.pdf" target="_blank" class="inline-flex items-center gap-1 text-sm text-white bg-sky-600 hover:bg-sky-800 px-3 py-1 rounded transition">
                                عرض الملف
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>



    </main>


<!-- assignmentModal -->



@endsection
