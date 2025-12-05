@extends('instructors.layout')

@section('title', 'بيانات المواد الدراسية - الهيئة المعاونة')

@section('main-content')
<main class="p-6 mr-0 md:mr-[220px]">
    @if($courses->count() == 0)
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded">
            لا يوجد لديك أي مواد دراسية مسؤول عنها حتى الآن.
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($courses as $course)
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
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
                    <span class="w-1.5 text-blue-700">{{ $course->doctor->name ?? '-' }}</span>
                </p>
                <p class="mb-1">
                    <i data-lucide="graduation-cap" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">الفرقة :</span>
                    <span class="w-1.5 text-blue-700">{{ $course->year ?? '-' }}</span>
                </p>
                <p class="mb-1">
                    <i data-lucide="school" class="inline w-4 h-4 mr-1"></i>
                    <span class="w-1.5">القسم :</span>
                    <span class="w-1.5 text-blue-700">{{ $course->department->department_name ?? '-' }}</span>
                </p>
            </div>
            <div class="flex justify-center items-center gap-x-2 m-2">
                <button onclick="showMaterials({{ $course->course_id }})"

                    data-course='@json($course)'
                    data-materials='@json($course->materials)'
                    class="cursor-pointer text-white p-1 px-3 bg-pink-900 rounded hover:bg-pink-800 hover:shadow flex items-center gap-1">
                    عرض الملفات
                    <i data-lucide="eye" class="w-4 h-4"></i>
                </button>
                <button onclick="toggleUpload({{ $course->course_id }})" class="cursor-pointer text-white p-1 px-3 bg-sky-600 rounded hover:bg-sky-800 hover:shadow flex items-center gap-1">
                    رفع ملف
                    <i data-lucide="upload" class="w-4 h-4"></i>
                </button>
            </div>

            {{-- جزء رفع ملفات --}}
            <div id="upload-{{ $course->course_id }}" class="hidden p-4">
                <form action="{{ route('materials.upload', $course->course_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label class="block mb-1">اسم الملف:</label>
                        <input type="text" name="material_name" class="border rounded w-full p-1" required>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1">اختر الملف:</label>
                        <input type="file" name="material_file" class="border rounded w-full p-1" required>
                    </div>
                    <button type="submit" class="bg-sky-700 text-white px-3 py-1 rounded hover:bg-sky-900">رفع</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    {{-- جزء عرض ملفات بعرض الصفحة بالكامل --}}
    <div id="materials-full-width" class="hidden mt-8 bg-gray-100 p-4 rounded shadow">
        <div id="materials-content"></div>
    </div>
</main>

<script>
    function showMaterials(courseId) {
        // إخفاء جزء عرض ملفات أولاً
        document.getElementById('materials-full-width').classList.remove('hidden');
        // جلب بيانات الزر المضغوط
        let btn = event.currentTarget;
        let course = JSON.parse(btn.getAttribute('data-course'));
        let materials = JSON.parse(btn.getAttribute('data-materials'));
        // بناء الكود
        let html = `
            <li class="text-xl font-bold text-sky-900 mb-4 border-b-4 border-blue-500 pb-2 flex items-center gap-2">
                ملفات <span class="text-pink-900 ml-2">${course.course_name}</span>
            </li>
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2">
        `;
        if(materials.length > 0) {
            materials.forEach(function(material) {
                html += `
                <li class="bg-white shadow rounded-lg p-4 border border-sky-100 flex flex-col sm:flex-row items-center justify-between gap-2">
                    <div class="flex items-center gap-3 w-full">
                        <i data-lucide="file" class="w-10 h-10 text-sky-700"></i>
                        <div class="flex-1">
                            <h3 class="font-semibold text-blue-800 text-md mb-1">${material.material_name}</h3>
                            <p class="text-sm text-gray-700 mb-1">
                                <strong>المادة:</strong> ${course.course_name}
                            </p>
                            <span class="text-xs text-gray-500">${material.created_at ? material.created_at : ''}</span>
                        </div>
                    </div>
                    <a href="{{ asset('public/uploads/materials/${material.material_url}')}}" target="_blank" class="inline-flex items-center gap-1 text-sm text-white bg-sky-600 hover:bg-sky-800 px-3 py-1 rounded transition">
                        عرض الملف
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </a>
                </li>
                `;
            });
        } else {
            html += `<div class="text-gray-500">لا توجد ملفات لهذه المادة.</div>`;
        }
        html += `</ul>`;
        document.getElementById('materials-content').innerHTML = html;
        // إعادة تفعيل أيقونات lucide
        if(window.lucide) lucide.createIcons();
        // سكرول للأسفل
        document.getElementById('materials-full-width').scrollIntoView({behavior: "smooth"});
    }

    function toggleUpload(courseId) {
        document.querySelectorAll('[id^="upload-"]').forEach(el => el.classList.add('hidden'));
        let upDiv = document.getElementById('upload-' + courseId);
        if(upDiv) upDiv.classList.toggle('hidden');
    }
</script>
@endsection
