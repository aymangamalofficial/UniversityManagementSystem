@extends('student.stddashboard.layout')
@section('title', 'تسجيل الغياب')
@section('content')

<main class="p-6 mr-0 md:mr-[220px]">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- كرت 1 - مادة C++ -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-sky-950 text-white p-2 grid grid-cols-12 gap-3 items-center">
            <i data-lucide="book-open" class="w-6 h-6 col-span-1"></i>
            <div class="col-span-11">
                <h2 dir="ltr" class="text-lg">C++</h2>
            </div>
        </div>
        <div class="p-4 text-sm">
            <p class="mb-1">
                <i data-lucide="user" class="inline w-4 h-4 mr-1"></i>
                دكتور المادة : <span class="text-blue-700">محمد عبد الوهاب</span>
            </p>
            <p class="mb-1">
                <i data-lucide="graduation-cap" class="inline w-4 h-4 mr-1"></i>
                الفرقة : <span class="text-blue-700">الأولى</span>
            </p>
            <p class="mb-1">
                <i data-lucide="school" class="inline w-4 h-4 mr-1"></i>
                القسم : <span class="text-blue-700">تكنولوجيا المعلومات</span>
            </p>
        </div>
        <div class="flex justify-center gap-2 mb-4">
            <a href="{{ route('student.stdprofile.QRlogin')}}" class="text-white text-xs px-3 py-1 bg-red-600 rounded hover:bg-red-800 flex items-center gap-1">
                تسجيل غياب السكشن <i data-lucide="scan-qr-code" class="w-4 h-4"></i>
            </a>
            <a href="{{ route('student.stdprofile.QRlogin')}}" class="text-white text-xs px-3 py-1 bg-green-600 rounded hover:bg-green-800 flex items-center gap-1">
                تسجيل غياب المحاضرة <i data-lucide="scan-qr-code" class="w-4 h-4"></i>
            </a>
        </div>
    </div>

    <!-- كرت 2 - مادة IOT -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-sky-950 text-white p-2 grid grid-cols-12 gap-3 items-center">
            <i data-lucide="book-open" class="w-6 h-6 col-span-1"></i>
            <div class="col-span-11">
                <h2 dir="ltr" class="text-lg">IOT (Internet of Things)</h2>
            </div>
        </div>
        <div class="p-4 text-sm">
            <p class="mb-1">
                <i data-lucide="user" class="inline w-4 h-4 mr-1"></i>
                دكتور المادة : <span class="text-blue-700">سامح</span>
            </p>
            <p class="mb-1">
                <i data-lucide="graduation-cap" class="inline w-4 h-4 mr-1"></i>
                الفرقة : <span class="text-blue-700">الثالثة</span>
            </p>
            <p class="mb-1">
                <i data-lucide="school" class="inline w-4 h-4 mr-1"></i>
                القسم : <span class="text-blue-700">تكنولوجيا المعلومات</span>
            </p>
        </div>
        <div class="flex justify-center gap-2 mb-4">
            <a href="{{ route('student.stdprofile.QRlogin')}}" class="text-white text-xs px-3 py-1 bg-red-600 rounded hover:bg-red-800 flex items-center gap-1">
                تسجيل غياب السكشن <i data-lucide="scan-qr-code" class="w-4 h-4"></i>
            </a>
            <a href="{{ route('student.stdprofile.QRlogin')}}" class="text-white text-xs px-3 py-1 bg-green-600 rounded hover:bg-green-800 flex items-center gap-1">
                تسجيل غياب المحاضرة <i data-lucide="scan-qr-code" class="w-4 h-4"></i>
            </a>
        </div>
    </div>

  </div>
</main>




<script>
// navbar
            lucide.createIcons();
            document.getElementById("avatar-btn").addEventListener("click", function () {
                document.getElementById("dropdown-menu").classList.toggle("hidden");
            });
            document.addEventListener("click", function (event) {
                if (!document.getElementById("avatar-btn").contains(event.target)) {
                    document.getElementById("dropdown-menu").classList.add("hidden");
                }
            });
// ##################################################################################
            document.getElementById("not-btn").addEventListener("click", function () {
                document.getElementById("dropdown2-menu").classList.toggle("hidden");
            });
            document.addEventListener("click", function (event) {
                if (!document.getElementById("not-btn").contains(event.target)) {
                    document.getElementById("dropdown2-menu").classList.add("hidden");
                }
            });
// ##################################################################################
            function fadeRemove(btn) {
                const alertBox = btn.parentElement;
                alertBox.classList.add('opacity-0');
                setTimeout(() => {
                    alertBox.remove();
                }, 300);
            }
// ############################################################################
        const iconOpen = document.getElementById("icon-open");
        const sidebar = document.getElementById("sidebar");

        iconOpen.addEventListener("click", (e) => {
            e.stopPropagation();
            sidebar.classList.toggle("translate-x-full");
            iconOpen.classList.toggle("rotate-45"); //  تدوير للزر
        });

// لو ضغط خارج القائمة، اقفلها وارجع الأيقونة
        document.addEventListener("click", (e) => {
            const isClickInsideSidebar = sidebar.contains(e.target);
            const isClickOnIcon = iconOpen.contains(e.target);

            if (!isClickInsideSidebar && !isClickOnIcon && window.innerWidth < 768) {
                sidebar.classList.add("translate-x-full");
                iconOpen.classList.remove("rotate-45"); // يرجع الزر زي ما كان
            }
        });
//########################################################################################
    document.getElementById("qrLink").addEventListener("click", function (e) {
        const filters = [
        "collageFilter",
        "yearFilter",
        "majorFilter",
        "subFilter",
        "groupFilter",
        "sectionFilter"
        ];

        let isValid = true;

        for (const id of filters) {
        const value = document.getElementById(id).value;
        if (!value) {
            isValid = false;
            break;
        }
        }

        const errorMessage = document.getElementById("filterError");

        if (!isValid) {
        e.preventDefault();
        errorMessage.classList.remove("hidden");
        } else {
        errorMessage.classList.add("hidden");
        }
    });
</script>
</body>
</html>

@endsection
