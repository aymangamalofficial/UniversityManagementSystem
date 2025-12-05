@extends('instructors.layout')

@section('title', 'ادارة تسجيل غياب الطلاب - الهيئة المعاونة')

@section('main-content')
<main class="p-6 mr-0 md:mr-[220px]">
    <div class="modal-content py-4">
        <h2 class="text-4xl mb-4 text-pink-950">إدارة تسجيل غياب الطلاب </h2>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 items-center gap-4 mb-6">
        <select id="courseFilter" class="border p-2 rounded-lg w-full">
            <option value="">اختر المادة</option>
            @foreach($courses as $course)
                <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>

        @if($instructor->role_id === 0)
            {{-- معيد: فقط سكشن --}}
            <input type="text" id="sessionTypeFilter" value="section" class="border p-2 rounded-lg w-full bg-gray-100 text-gray-700 hidden" readonly style="pointer-events: none;" />
            <input type="text" value="سكشن" class="border p-2 rounded-lg w-full bg-gray-100 text-gray-700" readonly style="pointer-events: none;" />

        @else
            {{-- دكتور: فقط محاضرة --}}
            <input type="text" id="sessionTypeFilter" value="lecture" class="border p-2 rounded-lg w-full bg-gray-100 text-gray-700 hidden" readonly style="pointer-events: none;" />
            <input type="text" value="محاضرة" class="border p-2 rounded-lg w-full bg-gray-100 text-gray-700" readonly style="pointer-events: none;" />

        @endif

        </select>
    </div>
    <div class="w-full flex justify-center">
        <button id="generateQRBtn" class="btn1 mt-5 inline-flex px-4 py-2 bg-blue-200 text-black rounded-lg items-center justify-center gap-2 shadow-md transition duration-300 mb-3">
            إنشاء QR للغياب <i data-lucide="qr-code" class="w-5 h-5"></i>
        </button>
    </div>
    <p id="filterError" class="text-red-600 text-2xl mt-2 text-center hidden">
        يرجى تحديد كل الحقول قبل المتابعة.
    </p>

    <!-- Popup Modal for QR -->
    <div id="qrPopup" class="fixed inset-0 top-16 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
        <div class="relative bg-white rounded-lg shadow-lg flex flex-col items-center p-8">
            <button onclick="closeQRPopup()" class="absolute top-2 left-2 text-3xl text-gray-700 hover:text-red-600">&times;</button>
            <img id="qrPopupImage" src="" alt="QR Code" class="w-[450px] h-[450px] mb-4">
            <div id="qrPopupExpire" class="text-gray-700 text-xl"></div>
        </div>
    </div>
</main>

<script>
let qrInterval = null;
let lastQRData = null;

function showQRPopup(qrValue, expiry) {
    document.getElementById('qrPopupImage').src = `https://api.qrserver.com/v1/create-qr-code/?size=450x450&data=${qrValue}`;
    // document.getElementById('qrPopupExpire').innerText = "ينتهي في: " + expiry;
    document.getElementById('qrPopup').classList.remove('hidden');
}

function closeQRPopup() {
    document.getElementById('qrPopup').classList.add('hidden');
    if (qrInterval) clearInterval(qrInterval);
}

function fetchAndShowQR() {
    const courseId = document.getElementById('courseFilter').value;
    const sessionType = document.getElementById('sessionTypeFilter').value;
    if (!courseId || !sessionType) {
        document.getElementById('filterError').classList.remove('hidden');
        return;
    }
    document.getElementById('filterError').classList.add('hidden');

    fetch("{{ route('instructors.qr.generate') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            course_id: courseId,
            session_type: sessionType
        })
    })
    .then(res => res.json())
    .then(data => {
        lastQRData = data;
        showQRPopup(data.qr_value, data.expiry_time);
    });
}

document.getElementById('generateQRBtn').addEventListener('click', function() {
    if (qrInterval) clearInterval(qrInterval);
    fetchAndShowQR();
    qrInterval = setInterval(() => {
        fetchAndShowQR();
    }, 3000);
});

// إغلاق النافذة عند الضغط خارجها
document.getElementById('qrPopup').addEventListener('click', function(e) {
    if (e.target === this) closeQRPopup();
});
</script>
@endsection

