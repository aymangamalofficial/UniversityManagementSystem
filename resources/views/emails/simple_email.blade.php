
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>رسالة مميزة</title>
    <style>
        @import "tailwindcss";
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');

body {
  font-family: "Cairo";

}
        .email-container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #0073e6;
            color: white;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .content {
            padding: 20px;
            font-size: 18px;
            color: #333;
            line-height: 1.8;
        }
        .code-box {

            padding: 15px;
            border-right: 5px solid #0073e6;
            border-left: 5px solid #0073e6;
            font-family: monospace;
            font-size: 16px;
            text-align: center;
            direction: ltr;
            margin-top: 10px;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 16px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- الصورة الدائرية -->
    <div class="bg-gray-600 w-32 h-32 rounded-full mb-3 mx-auto overflow-hidden">
        <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n.jpg') }}" alt="Logo" class="w-full h-full object-cover">
    </div>

    <!-- النص تحتها مباشرة -->
    <p class=" text-sky-600 p-2 font-bold text-2xl  rounded text-center w-fit mx-auto">
        NATU
    </p>
    <div class="flex-1 text-center mt-5">
        <p  class="text-lg text-white p-2 font-bold bg-gray-800 rounded">جامعة أسيوط الجديدة التكنولوجية</p>
    </div>
    <div class="content text-center">
        <div>
            <p>مرحبًا،{{ $details['name'] }}</p>
            <p>{{ $details['message'] }}</p>
        </div>
        <div class="code-box bg-gray-200">
            <div class="text-2xl">
                <code class="rounded p-2" style="letter-spacing: 15px;">{{ $details['code'] }}</code>
            </div>
        </div>
        <h6> استخدام هذا الكود لتفعيل الحساب الخاص بك</h6>
    </div>
    <div class="footer">
        <time id="currentTime">Mon, 12-5-2025 12:51:6 PM</time>
    </div>
</div>
</body>


{{-- <script>
      const now = new Date();

      //‎ ISO-8601 لإسناد القيمة المعيارية
      const isoString = now.toISOString();

      // تنسيق مقروء بالعربية – مصر
      const readable = now.toLocaleString('ar-EG', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true
      });

      const timeElement = document.getElementById('currentTime');
      timeElement.setAttribute('datetime', isoString);
      timeElement.textContent = readable;
</script> --}}

</html>

