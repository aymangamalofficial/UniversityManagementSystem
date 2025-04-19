<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة أسيوط الجديدة التكنولوجية - تسجيل الدخول</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="{{ asset('public/resources/auth/login/login.css') }}" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl flex flex-col md:flex-row border border-black overflow-hidden">
        <div class="w-full md:w-1/2 p-6">
            <img src="{{ asset('public/resources/auth/login/image2.png') }}" alt="شعار الجامعة" class="w-full h-24 object-cover mb-3">
            <h2 class="text-xl font-semibold text-center text-[#5A2A42] mb-4">إنشاء حساب</h2>
            <form id="loginForm" class="space-y-3" method="POST" action="{{ route('check.login') }}">
                @csrf
                <div>
                    @if (session('error'))
                                <br><center><strong class="text-center text-red">{{ session('error') }}</strong></center>
                            @endif
                    <label class="block text-[#004D61]">نوع المستخدم</label>
                    <select name="userType" id="userType" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]">
                        <option value="student">طالب</option>
                        <option value="assistant">معيد</option>
                        <option value="doctor">دكتور</option>
                        <option value="admin">أدمن</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[#004D61]">الرقم القومي</label>
                    <input name="id" type="text" id="nationalId" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="أدخل الرقم القومي">
                    <p id="idError" class="text-red-500 text-sm hidden">يجب إدخال رقم قومي صحيح مكون من 14 رقمًا</p>
                </div>
                <div>
                    <label class="block text-[#004D61]">البريد الإلكتروني </label>
                    <input name="email" type="email" id="email" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="example@gmail.com">
                    <p id="emailError" class="text-red-500 text-sm hidden">يجب إدخال بريد إلكتروني صحيح</p>
                </div>
                <button id="sendCodeBtn" type="submit" class="w-full bg-[#004D61] text-white py-2 rounded-lg hover:bg-[#003245] mt-2">
                    إرسال الكود للتفعيل
                </button>
                <p id="timer" class="text-center text-gray-500 text-sm hidden">يمكنك إعادة إرسال الكود بعد <span id="countdown">60</span> ثانية</p>
                <button id="resendCodeBtn" type="button" class="w-full bg-gray-500 text-white py-2 rounded-lg mt-2 hidden">إعادة إرسال الكود</button>
            </form>
        </div>
        <div class="w-full md:w-1/2 p-6 border-t md:border-t-0 md:border-r bg-blue-100 border-gray-300">
            <img src="{{ asset('public/resources/auth/login/image2.png') }}" alt="شعار الجامعة" class="w-full h-24 object-cover mb-3">
            <h2 class="text-lg font-semibold text-center text-[#5A2A42] mb-3">تعليمات إنشاء حساب</h2>
            <ul class="list-disc pr-4 text-[#004D61] text-sm">
                <li>اختر نوع المستخدم المناسب لك</li>
                <li>أدخل الرقم القومي المكون من 14 رقمًا</li>
                <li>أدخل بريدك الإلكتروني المسجل على جوجل</li>
                <li>اضغط على زر إرسال الكود لمتابعة إنشاء الحساب</li>
            </ul>
        </div>
    </div>

    {{-- <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let valid = true;

            let nationalId = document.getElementById("nationalId").value;
            let idError = document.getElementById("idError");
            if (!/^\d{14}$/.test(nationalId)) {
                idError.classList.remove("hidden");
                valid = false;
            } else {
                idError.classList.add("hidden");
            }

            let email = document.getElementById("email").value;
            let emailError = document.getElementById("emailError");
            if (!/^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(email)) {
                emailError.classList.remove("hidden");
                valid = false;
            } else {
                emailError.classList.add("hidden");
            }

            if (valid) {
                startTimer();
            }
        });

        function startTimer() {
            let timerElement = document.getElementById("timer");
            let countdownElement = document.getElementById("countdown");
            let resendButton = document.getElementById("resendCodeBtn");
            let sendCodeBtn = document.getElementById("sendCodeBtn");
            let timeLeft = 60;

            sendCodeBtn.disabled = true;
            timerElement.classList.remove("hidden");
            resendButton.classList.add("hidden");

            let timer = setInterval(function() {
                timeLeft--;
                countdownElement.textContent = timeLeft;
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    timerElement.classList.add("hidden");
                    resendButton.classList.remove("hidden");
                    sendCodeBtn.disabled = false;
                }
            }, 1000);
        }

        document.getElementById("resendCodeBtn").addEventListener("click", function() {
            startTimer();
        });
    </script> --}}
</body>
</html>
