{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسالة تحقق</title>
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            direction: rtl;
            text-align: right;
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
            background: #f8f8f8;
            padding: 15px;
            border-right: 5px solid #0073e6;
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
        <div class="header">رسالة هامة</div>
        <div class="content">
            <p>مرحبًا، {{ $details['name'] }}</p>
            <p>هذه رسالة تحتوي على كود تحقق لك:</p>
            <div class="code-box">
                <code>{{ $details['code'] }}</code>
            </div>
            <p>يرجى استخدام هذا الكود للوصول إلى الخدمة الخاصة بك.</p>
        </div>
        <div class="footer">مع أطيب التحيات،<br> فريق الدعم</div>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسالة مميزة</title>
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            direction: rtl;
            text-align: right;
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
            background: #f8f8f8;
            padding: 15px;
            border-right: 5px solid #0073e6;
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
        <div class="header">رسالة هامة</div>
        <div class="content">
            <p>مرحبًا،</p>
            <p>هذه رسالة تحتوي على كود مميز لك:</p>
            <div class="code-box">
                <code>1234-5678-ABCD-EFGH</code>
            </div>
            <p>يرجى استخدام هذا الكود للوصول إلى الخدمة الخاصة بك.</p>
        </div>
        <div class="footer">مع أطيب التحيات،<br> فريق الدعم</div>
    </div>
</body>
</html>

