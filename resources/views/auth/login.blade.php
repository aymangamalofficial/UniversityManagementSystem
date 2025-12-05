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
            <h2 class="text-xl font-semibold text-center text-[#5A2A42] mb-4">تسجيل دخول حساب</h2>
            <form id="loginForm" class="space-y-3" method="POST" action="{{ route('check.login') }}">
                @csrf
                <div>
                    @if (session('success'))
                        <br><center><strong class="text-green-500 text-md">{{ session('success') }}</strong></center>
                    @endif
                    @if (session('error'))
                        <br><center><strong class="text-red-500 text-md">{{ session('error') }}</strong></center>
                    @endif
                    <label class="block text-[#004D61]">نوع المستخدم</label>
                    <select name="userType" id="userType" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]">
                        <option value="student">طالب</option>
                        <option value="instructor">مساعد/عضو هيئة تدريس</option>
                        <option value="admin">مشرف</option>
                    </select>
                    @error('userType')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-[#004D61]">الرقم القومي</label>
                    <input name="id" type="text" id="nationalId" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="أدخل الرقم القومي">
                    @error('id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-[#004D61]"> ادخل كلمه المرور</label>
                    <input name="password" type="password" id="email" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="123456">
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button id="sendCodeBtn" type="submit" class="w-full bg-[#004D61] text-white py-2 rounded-lg hover:bg-[#003245] mt-2">
                    تسجيل
                    الدخول
                </button>
            </form>
            <p class="text-center text-blue-500 underline">انتقل <a href="{{ route('signup') }}" >لتفعيل الحساب</a></p>
                </div>
        <div class="w-full md:w-1/2 p-6 border-t md:border-t-0 md:border-r bg-blue-100 border-gray-300">
            <img src="{{ asset('public/resources/auth/login/image2.png') }}" alt="شعار الجامعة" class="w-full h-24 object-cover mb-3">
            <h2 class="text-lg font-semibold text-center text-[#5A2A42] mb-3">طريقة التسجيل</h2>
            <ul class="list-disc pr-4 text-[#004D61] text-sm">
                <li>اختر نوع المستخدم المناسب لك</li>
                <li>أدخل الرقم القومي المكون من 14 رقمًا</li>
                <li>ادخل كلمة المرور</li>
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
