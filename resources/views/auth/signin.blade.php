<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة أسيوط الجديدة التكنولوجية - تسجيل الدخول</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="{{ asset('public/resources/auth/signin/signin.css')}}" rel="stylesheet">
</head>
<body  class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl flex flex-col md:flex-row border border-black overflow-hidden">
        <div class="w-full md:w-1/2 p-4 bg-blue-100">
            <img src="{{ asset('public/resources/auth/login/image2.png')}}"  alt="شعار الجامعة" class="w-full h-24 object-cover mb-3">
            <h2 class="text-xl font-semibold text-center text-[#5A2A42] mb-4">سجل دخول لحسابك</h2>
            <form id="loginForm" class="space-y-3">
                <div>
                    <label class="block text-[#004D61]"><i class="fas fa-id-card mr-2"></i> الرقم القومي</label>
                    <input type="text" id="nationalId" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="أدخل الرقم القومي">
                    <p id="idError" class="text-red-500 text-sm hidden">يجب إدخال رقم قومي صحيح مكون من 14 رقمًا</p>
                </div>
                <div>
                    <label class="block text-[#004D61]"><i class="fas fa-envelope mr-2"></i> البريد الإلكتروني</label>
                    <input type="email" id="email" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="example@gmail.com">
                    <p id="emailError" class="text-red-500 text-sm hidden">يجب إدخال بريد إلكتروني صحيح</p>
                </div>
                <div>
                    <label class="block text-[#004D61]"><i class="fas fa-lock mr-2"></i> كلمة المرور</label>
                    <input type="password" id="password" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="أدخل كلمة المرور">
                    <p id="passwordError" class="text-red-500 text-sm hidden">يجب إدخال كلمة مرور لا تقل عن 6 أحرف</p>
                </div>
                <button type="submit" class="w-full bg-[#5A2A42] text-white py-2 rounded-lg hover:bg-[#3F1E30]">
                    <i class="fas fa-sign-in-alt mr-2"></i> تسجيل الدخول
                </button>
            </form>
        </div>
        <div class="w-full md:w-1/2 p-4 border-t md:border-r md:border-t-0 border-gray-300">
            <img src="{{ asset('public/resources/auth/login/image2.png')}}" alt="شعار الجامعة" class="w-full h-24 object-cover mb-3">
            <h2 class="text-lg font-semibold text-center text-[#5A2A42] mb-3">تعليمات تسجيل الدخول</h2>
            <ul class="list-disc pr-4 text-[#004D61] text-sm">
                <li>أدخل الرقم القومي المكون من 14 رقمًا</li>
                <li>أدخل بريدك الإلكتروني الصحيح</li>
                <li>أدخل كلمة المرور الخاصة بك</li>
                <li>اضغط على زر تسجيل الدخول للوصول إلى الموقع</li>
            </ul>
        </div>
    </div>

    <script>
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
            if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                emailError.classList.remove("hidden");
                valid = false;
            } else {
                emailError.classList.add("hidden");
            }

            let password = document.getElementById("password").value;
            let passwordError = document.getElementById("passwordError");
            if (password.length < 6) {
                passwordError.classList.remove("hidden");
                valid = false;
            } else {
                passwordError.classList.add("hidden");
            }

            if (valid) {
                alert("تم تسجيل الدخول بنجاح!");
            }
        });
    </script>
</body>
</html>
