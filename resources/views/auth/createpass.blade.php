<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء كلمة المرور</title>
    <link  href="{{ asset('public/resources/auth/pass/creatpass.css') }}" rel="stylesheet" >
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl flex flex-col md:flex-row border border-black overflow-hidden">
        <div class="w-full md:w-1/2 p-6">
            <img src="{{ asset('public/resources/auth/pass/image-removebg-preview.png')}}" alt="شعار الجامعة" class="w-full h-32 object-cover mb-4">
            <h2 class="text-2xl font-semibold text-center text-[#5A2A42] mb-6">إنشاء كلمة المرور</h2>
            <form id="passwordForm" class="space-y-4" method="POST" action="{{ route('create.password') }}">
                @csrf
                <div>
                    <label class="block text-[#004D61]">كلمة المرور</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="أدخل كلمة المرور">
                        <i class="fas fa-eye absolute left-3 top-3 text-gray-500 cursor-pointer" onclick="togglePassword('password', this)"></i>
                        @if(isset($errorMessages['password']))
                            <p class="text-red-500 text-md text-center">{{ $errorMessages['password'] }}</p>
                        @endif
                    </div>
                    <p id="passwordStrength" class="text-sm mt-1"></p>
                </div>

                <div>
                    <label class="block text-[#004D61]">تأكيد كلمة المرور</label>
                    <div class="relative">
                        <input type="password" name="confirmPassword" id="confirmPassword" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#5A2A42]" placeholder="أعد إدخال كلمة المرور">
                        <i class="fas fa-eye absolute left-3 top-3 text-gray-500 cursor-pointer" onclick="togglePassword('confirmPassword', this)"></i>
                        @if(isset($errorMessages['confirmPassword']))
                            <p class="text-red-500 text-md text-center">{{ $errorMessages['confirmPassword'] }}</p>
                        @endif
                    </div>
                    <p id="confirmError" class="text-red-500 text-sm hidden">كلمتا المرور غير متطابقتين</p>
                </div>
                <button {{--onclick="submit()"--}} type="submit" class="w-full bg-[#5A2A42] text-white py-3 rounded-lg hover:bg-[#3F1E30]">إنشاء الحساب</button>
            </form>
        </div>
        <div class="w-full md:w-1/2 p-6 border-t md:border-r md:border-t-0 bg-blue-100 border-gray-300">
            <img src="{{ asset('public/resources/auth/pass/image-removebg-preview.png') }}" alt="شعار الجامعة" class="w-full h-32 object-cover mb-4">
            <h2 class="text-xl font-semibold text-center text-[#5A2A42] mb-4">تعليمات إنشاء كلمة المرور</h2>
            <ul class="list-disc pr-6 text-[#004D61]">
                <li>يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل</li>
                <li>يُفضل أن تحتوي على أحرف كبيرة وصغيرة وأرقام ورموز</li>
                <li>تأكد من تطابق كلمة المرور في الحقلين</li>
                <li>استخدم زر العين لإظهار أو إخفاء كلمة المرور</li>
            </ul>
        </div>
    </div>


            <!-- save -->
            <div id="saveMessage" class="fixed inset-0 flex items-center justify-center hidden opacity-70">
                <div class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow-lg text-xl font-semibold animate-fadeIn">
                    تم حفظ كلمة  المرور!
                </div>
            </div>
            {{-- <script>
                function togglePassword(fieldId, icon) {
                    let field = document.getElementById(fieldId);
                    if (field.type === "password") {
                        field.type = "text";
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    } else {
                        field.type = "password";
                        icon.classList.remove("fa-eye-slash");
                        icon.classList.add("fa-eye");
                    }
                }

                document.getElementById("passwordForm").addEventListener("submit", function(event) {
                    event.preventDefault();

                    let password = document.getElementById("password").value;
                    let confirmPassword = document.getElementById("confirmPassword").value;
                    let confirmError = document.getElementById("confirmError");
                    let saveMessage = document.getElementById("saveMessage");

                    if (password !== confirmPassword) {
                        confirmError.classList.remove("hidden");
                        return;
                    }

                    confirmError.classList.add("hidden");


                    saveMessage.classList.remove("hidden");


                    setTimeout(() => {
                        saveMessage.classList.add("hidden");
                    }, 7000);
                });
            </script> --}}

</body>
</html>
