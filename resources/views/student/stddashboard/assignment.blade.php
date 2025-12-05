@extends('student.stddashboard.layout')
@section('title', 'assignment')
@section('content')



    <main class="p-6 mr-0 md:mr-[220px]">
<div class="relative">
    <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-sky-50 p-2 rounded-full shadow hover:bg-sky-300">
        <i class="h-6 w-6 block transition-transform duration-100 hover:text-white" data-lucide="arrow-left"></i>
    </button>
    <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-sky-50 p-2 rounded-full shadow hover:bg-sky-300">
        <i class="h-6 w-6 block transition-transform duration-100 hover:text-white" data-lucide="arrow-right"></i>
    </button>

    <!-- الحاوية القابلة للتمرير -->
    <div id="slider" class="flex overflow-x-auto space-x-4 scroll-smooth px-10 py-4">

        <!-- Course 1 -->
        <div class="min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
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

                    <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                        عرض Assignments
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Course 2 -->
        <div class="min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
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

                    <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                        عرض Assignments
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Course 3 -->
        <div class="min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
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

                    <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                        عرض Assignments
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Course 4 -->
        <div class="min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
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

                    <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                        عرض Assignments
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Course 5 -->
        <div class="min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
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

                    <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                        عرض Assignments
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Course 6 -->
        <div class="min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
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

                    <button class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                        عرض Assignments
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>


<div id="assignmentProgressBar" class="w-full h-2 bg-gray-200 rounded overflow-hidden hidden mt-4">
    <div id="assignmentProgress" class="h-full bg-blue-500 transition-all duration-300 ease-out" style="width: 0%;"></div>
</div>

<div id="uploadSuccessMessage"
        class="hidden text-green-600 text-xl mt-4 font-semibold text-center">
        تم رفع الملف بنجاح
</div>


    <!--  بدايه ل تايم لاين  -->

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-4 md:m-10" dir="ltr">
    <!-- أسيمنتات المحاضرات -->
    <div class="bg-gray-50 p-4 md:p-6 rounded-2xl shadow-md border border-gray-300">
            <div class="flex justify-between items-center mb-4" dir="rtl">
                <h2 class="text-xl md:text-3xl font-semibold text-blue-800">أسيمنتات المحاضرات</h2>
            </div>

            <div class="space-y-4">
                <!-- عنصر واحد -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center p-4 bg-white rounded-lg shadow-sm border border-gray-200 gap-3 sm:gap-0">
                    <div class="flex items-center space-x-2">
                        <i data-lucide="file-text" class="text-blue-500 w-5 h-5"></i>
                        <div>
                            <p class="font-medium text-gray-900">Intro to Computer Science</p>
                            <p class="text-sm text-red-500"><span> 20/10/2025 12AM</span> :  معاد التسليم  </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between sm:justify-end sm:space-x-2">
                        <span class="text-sm text-gray-500">2025/05/17</span>
                        <label class="bg-blue-600 text-white text-sm px-2 py-0.5 rounded-md hover:bg-blue-700 transition ml-2 sm:ml-0 cursor-pointer">
                            رفع
                            <input type="file" style="display: none;" onchange="handleFileUpload(event)">
                        </label>
                    </div>
                </div>
            </div>
    </div>

    <!-- أسيمنتات السكاشن -->
    <div class="bg-gray-50 p-4 md:p-6 rounded-2xl shadow-md border border-gray-300">
        <div class="flex justify-between items-center mb-4" dir="rtl">
            <h2 class="text-xl md:text-3xl font-semibold text-pink-900">أسيمنتات السكاشن</h2>
        </div>

        <div class="space-y-4">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center p-4 bg-white rounded-lg shadow-sm border border-gray-200 gap-3 sm:gap-0">
                <div class="flex items-center space-x-2">
                    <i data-lucide="file-text" class="text-pink-900 w-5 h-5"></i>
                    <div>
                        <p class="font-medium text-gray-900">Intro to Computer Science</p>
                        <p class="text-sm text-green-500">  تم التسليم  </p>
                        <!-- <p class="text-sm text-red-500"><span> 20/10/2025 12AM</span> :  معاد التسليم  </p> -->
                    </div>
                </div>

                <div class="flex items-center justify-between sm:justify-end sm:space-x-2">
                    <span class="text-sm text-gray-500">2025/05/17</span>
                    <label class="bg-pink-900 text-white text-sm px-2 py-0.5 rounded-md hover:bg-pink-800 transition ml-2 sm:ml-0 cursor-pointer">
                        رفع
                        <input type="file" style="display: none;" onchange="handleFileUpload(event)">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>



    </main>
    <div id="assignmentProgressBar" class="w-full h-2 bg-gray-200 rounded overflow-hidden hidden mt-4">
        <div id="assignmentProgress" class="h-full bg-blue-500 transition-all duration-300 ease-out" style="width: 0%;"></div>
    </div>

    <!-- رسالة تأكيد -->
    <div id="uploadSuccessMessage" class="hidden text-green-600 text-sm mt-2 font-medium">
        تم رفع الملف بنجاح
    </div>


@endsection
