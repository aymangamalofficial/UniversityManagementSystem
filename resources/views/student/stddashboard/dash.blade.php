@extends('student.stddashboard.layout')
@section('title', 'لوحة التحكم')
@section('content')

<main class="p-6 mr-0 md:mr-[220px]">
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($courses->count() == 0)
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded">
            لا يوجد لديك أي مواد دراسية مضافة لك حتى الآن.
        </div>
    @else
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6 rounded">
            لديك {{ $courses->count() }} مادة دراسية مضافة.
        </div>
        <div class="relative">

        <!-- أزرار التحكم -->
        <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-sky-50 p-2 rounded-full shadow hover:bg-sky-300">
            <i class="h-6 w-6 block transition-transform duration-100 hover:text-white" data-lucide="arrow-left"></i>
        </button>
        <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-sky-50 p-2 rounded-full shadow hover:bg-sky-300">
            <i class="h-6 w-6 block transition-transform duration-100 hover:text-white" data-lucide="arrow-right"></i>
        </button>

    @endif

    <!-- الحاوية القابلة للتمرير -->
    <div id="slider" class="flex overflow-x-auto space-x-4 scroll-smooth px-10 py-4">
@foreach($courses as $course)
        <!-- Course 1 -->
<div class="min-w-[350px] bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-sky-950 text-white p-2 grid grid-cols-12 gap-3 items-center">
            <i data-lucide="book-open" class="w-6 h-6 col-span-1 sm:col-span-1"></i>
            <div class="col-span-11 sm:col-span-11">
                <h2 dir="ltr" class="text-lg">{{ $course->course_name }}</h2>
            </div>
        </div>

        <div class="p-4 text-sm">
            <p class="mb-1">
                <i data-lucide="user" class="inline w-4 h-4 mr-1"></i>
                <span class="w-1.5">دكتور المادة :</span>
                <span class="w-1.5 text-blue-700">{{ $course->doctor->name ?? 'لم يتم التعيين بعد' }}</span>
            </p>
            <p class="mb-1">
                <i data-lucide="graduation-cap" class="inline w-4 h-4 mr-1"></i>
                <span class="w-1.5">الفرقة :</span>
                <span class="w-1.5 text-blue-700">{{ $course->year ?? '-' }}</span>
            </p>
            <p class="mb-1">
                <i data-lucide="school" class="inline w-4 h-4 mr-1"></i>
                <span class="w-1.5">القسم :</span>
                <span class="w-1.5 text-blue-700">{{ $course->department->department_name ?? '-' }} </span>
            </p>
        </div>

        <div class="flex justify-center items-center gap-x-2 m-2">

            <button class="cursor-pointer text-white p-1 px-3 bg-pink-700 rounded hover:bg-pink-900 hover:shadow flex items-center gap-1">
                عرض الملفات
                <i data-lucide="eye" class="w-4 h-4"></i>
            </button>
        </div>
    </div>
</div>

@endforeach



    </div>
</div>




    <!--  بدايه ل تايم لاين  -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-4 md:m-10" dir="ltr">
        <div class="bg-gray-50 p-4 md:p-6 rounded-2xl shadow-md border border-gray-300">
            <div class="flex justify-between items-center mb-4" dir="rtl">
                <h2 class="text-xl md:text-3xl font-semibold text-blue-800">ملفات المحاضرات</h2>
            </div>
            <div class="space-y-4" id="doctor-files-list">
                <!-- سيتم تعبئتها ديناميكياً -->
            </div>
        </div>
        <div class="bg-gray-50 p-4 md:p-6 rounded-2xl shadow-md border border-gray-300">
            <div class="flex justify-between items-center mb-4" dir="rtl">
                <h2 class="text-xl md:text-3xl font-semibold text-pink-900">ملفات السكاشن</h2>
            </div>
            <div class="space-y-4" id="assistant-files-list">
                <!-- سيتم تعبئتها ديناميكياً -->
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('public/resources/student/stddashboard/matirel/dash.js') }}"></script>
<script>
const allDoctorMaterials = @json($materials_doctors);
const allAssistantMaterials = @json($materials_assistants);
const courses = @json($courses);

// عرض الملفات تلقائياً لأول مادة عند التحميل
window.addEventListener('DOMContentLoaded', function() {
    if (courses.length > 0) {
        showFilesForCourse(courses[0].course_id);
    }
});

// عند الضغط على أي مادة في السلايدر
const courseCards = document.querySelectorAll('#slider > div');
courseCards.forEach((card, idx) => {
    card.addEventListener('click', function() {
        showFilesForCourse(courses[idx].course_id);
    });
});

function showFilesForCourse(courseId) {
    // ملفات الدكتور
    const doctorFiles = allDoctorMaterials.filter(m => m.course_id == courseId);
    const doctorList = document.getElementById('doctor-files-list');
    doctorList.innerHTML = doctorFiles.length ? doctorFiles.map(m => `
        <div class='flex flex-col sm:flex-row sm:justify-between sm:items-center p-4 bg-white rounded-lg shadow-sm border border-gray-200 gap-3 sm:gap-0'>
            <div class='flex items-center space-x-2'>
                <i class="fas fa-file-alt text-blue-500"></i>
                <div>
                    <p class="font-medium text-gray-900">${m.material_name}</p>
                    <p class="text-sm text-gray-500">${m.created_at ? m.created_at.substring(0,10) : ''}</p>
                </div>
            </div>
            <div class='flex items-center justify-between sm:justify-end sm:space-x-2'>
                <span class='text-sm text-gray-500'>${m.created_at ? m.created_at.substring(0,10) : ''}</span>
                <button onclick="window.open('../public/uploads/materials/${m.material_url}', '_blank')" class="bg-blue-600 text-white text-sm px-2 py-0.5 rounded-md hover:bg-blue-700 transition ml-2 sm:ml-0">تحميل</button>
            </div>
        </div>
    `).join('') : '<div class="text-gray-400">لا يوجد ملفات</div>';
    // ملفات المعيد
    const assistantFiles = allAssistantMaterials.filter(m => m.course_id == courseId);
    const assistantList = document.getElementById('assistant-files-list');
    assistantList.innerHTML = assistantFiles.length ? assistantFiles.map(m => `
        <div class='flex flex-col sm:flex-row sm:justify-between sm:items-center p-4 bg-white rounded-lg shadow-sm border border-gray-200 gap-3 sm:gap-0'>
            <div class='flex items-center space-x-2'>
                <i class="fas fa-file-alt text-pink-900"></i>
                <div>
                    <p class="font-medium text-gray-900">${m.material_name}</p>
                    <p class="text-sm text-gray-500">${m.created_at ? m.created_at.substring(0,10) : ''}</p>
                </div>
            </div>
            <div class='flex items-center justify-between sm:justify-end sm:space-x-2'>
                <span class='text-sm text-gray-500'>${m.created_at ? m.created_at.substring(0,10) : ''}</span>
                <button onclick="window.open('../public/uploads/materials/${m.material_url}', '_blank')" class="bg-pink-900 text-white text-sm px-2 py-0.5 rounded-md hover:bg-pink-800 transition ml-2 sm:ml-0">تحميل</button>
            </div>
        </div>
    `).join('') : '<div class="text-gray-400">لا يوجد ملفات</div>';
}
</script>
@endsection
