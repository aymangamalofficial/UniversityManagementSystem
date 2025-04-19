<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة أسيوط الجديدة التكنولوجية - إدخال الكود</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="{{ asset('public/resources/auth/code/code.css')}}" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl flex flex-col md:flex-row border border-black overflow-hidden">
        <div class="w-full md:w-1/2 p-6 bg-blue-100">
    <img src="{{ asset('public/resources/auth/code/image-removebg-preview.png')}}" alt="شعار الجامعة" class="w-full h-32 object-cover mb-4">
            <h2 class="text-2xl font-semibold text-center text-[#5A2A42] mb-6">إدخال الكود</h2>
            <form id="codeForm" class="space-y-4" method="POST" action="{{ route('check.code') }}">
                @csrf
                <div>
                    {{-- <input type="hidden" name="vcode" value="{{ $email }}"> --}}
                    @if (session('error'))
                                <br><center><strong class="text-center text-red">{{ session('error') }}</strong></center>
                            @endif
                    <label class="block text-[#004D61]"><i class="fas fa-key mr-2"></i> الكود المرسل</label>
                    <input type="text" name="code" id="verificationCode" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="أدخل الكود هنا" required>
                    <p id="codeError" class="text-red-500 text-sm hidden">يجب إدخال كود صحيح مكون من 6 أرقام</p>
                </div>
                <button type="submit" class="w-full bg-[#5A2A42] text-white py-3 rounded-lg hover:bg-[#3F1E30]">
                    <i class="fas fa-check-circle mr-2"></i> تأكيد الكود
                </button>
            </form>
        </div>
        <div class="w-full md:w-1/2 p-6 border-t md:border-r md:border-t-0 border-gray-300">
            <img src="{{ asset('public/resources/auth/code/image-removebg-preview.png') }}" alt="شعار الجامعة" class="w-full h-32 object-cover mb-4">
            <h2 class="text-xl font-semibold text-center text-[#5A2A42] mb-4">تعليمات إدخال الكود</h2>
            <ul class="list-disc pr-6 text-[#004D61]">
                <li>تحقق من بريدك الإلكتروني للحصول على الكود</li>
                <li>أدخل الكود المكون من 6 أرقام</li>
                <li>اضغط على زر تأكيد الكود للمتابعة</li>
            </ul>
        </div>
    </div>

    {{-- <script>
        document.getElementById("codeForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let valid = true;

            let verificationCode = document.getElementById("verificationCode").value;
            let codeError = document.getElementById("codeError");
            if (!/^\d{6}$/.test(verificationCode)) {
                codeError.classList.remove("hidden");
                valid = false;
            } else {
                codeError.classList.add("hidden");
            }

            if (valid) {
                alert("تم تأكيد الكود بنجاح!");
            }
        });
    </script> --}}
</body>
</html>
