<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قارئ QR</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');

        a{
            text-decoration: none;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Tajawal", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f4f4f4;
            flex-direction: column;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 400px;
        }

        .btn1 {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            background: #75b3ff;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            margin-bottom: 10px;
        }
/* #580D2Eff */
/* #75b3ff */

        .btn1:hover {
            background: #69abfc;
            transform: scale(1.05);
        }

        .redirect-btn {
            display: none;
            background: #011a5ea8;
            color: white;
            border: none;
        }

        .redirect-btn:hover {
            background: #580D2Eff;
        }

        i {
            width: 22px;
            height: 22px;
        }

        /* تنسيق قارئ QR */
        #reader {
            width: 100%;
            max-width: 350px;
            margin-top: 20px;
            display: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: #333;">افتح الكاميرا لتسجيل الحضور</h2>

        <button class="btn1" onclick="startScanner()">
            <i data-lucide="camera"></i> فتح الكاميرا
        </button>

        <a id="redirectBtn" class="btn1 redirect-btn no-underline" href="{{ route('students.stddashboard.dash') }}" style="display: none;">
            <i data-lucide="arrow-right"></i>  العودة لصفحة الرئيسية
        </a>

        <div id="reader"></div>
        <p id="result" style="color: #333; margin-top: 35px; font-size: 40px;"></p>
    </div>

    <script>
        lucide.createIcons();

        let scanner;

        function startScanner() {
            scanner = new Html5Qrcode("reader");
            document.getElementById("reader").style.display = "block";
            document.getElementById("redirectBtn").style.display = "block";

            scanner.start(
                { facingMode: "environment" },
                { fps: 10, qrbox: 250 },
                (decodedText) => {
                    console.log("✅ تم مسح الـ QR Code بنجاح: ", decodedText); // ✅ طباعة واضحة للنتيجة

                    document.getElementById("result").innerText = decodedText;
                    sendToBackend(decodedText);

                    // تأخير التوقف لحظة حتى لا يتوقف قبل الطباعة
                    setTimeout(() => {
                        scanner.stop();
                        console.log("⏹️ تم إيقاف الماسح الضوئي.");
                    }, 500);
                },
                (errorMessage) => {
                    console.log("⚠️ خطأ في المسح: ", errorMessage);
                }
            ).catch(err => {
                console.error("❌ حدث خطأ:", err);
            });
        }

        function sendToBackend(qrData) {
            console.log("📤 يتم إرسال البيانات إلى السيرفر...", qrData); // تأكيد الإرسال

            fetch("{{ route('students.qr.scan') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ qr_result: qrData })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert("✅ " + data.success);
                } else if(data.error) {
                    alert("❌ " + data.error);
                }
                console.log("رد السيرفر:", data); // طباعة رد السيرفر
            })
            .catch(error => {
                console.error("❌ خطأ في الإرسال:", error); // طباعة خطأ الإرسال
            });
        }
    </script>

</body>
</html>
