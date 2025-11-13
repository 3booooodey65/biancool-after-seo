<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسالة تواصل معنا</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 20px;
            direction: rtl;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .header {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
            border-bottom: 1px solid #e5e7eb;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(180deg); }
        }

        .header h2 {
            font-size: 28px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .header::after {
            content: '✉️';
            font-size: 40px;
            display: block;
            margin-top: 15px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .content {
            padding: 40px;
        }

        .field {
            margin-bottom: 20px;
            padding: 18px;
            background: #f8fafc;
            border-radius: 12px;
            border-right: 4px solid #3b82f6;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }

        .field::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .field:hover::before {
            transform: translateX(0);
        }

        .field:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
            background: #ffffff;
        }

        .field strong {
            display: inline-block;
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 8px;
            font-weight: 600;
            position: relative;
        }

        .field-content {
            color: #374151;
            font-size: 15px;
            line-height: 1.6;
            background: white;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            word-wrap: break-word;
        }

        .name-field .field-content::before {
            content: '👤';
            margin-left: 8px;
        }

        .phone-field .field-content::before {
            content: '📱';
            margin-left: 8px;
        }

        .message-field .field-content::before {
            content: '💬';
            margin-left: 8px;
        }

        .message-field .field-content {
            min-height: 80px;
            white-space: pre-line;
        }

        .footer {
            background: #f9fafb;
            padding: 16px;
            text-align: center;
            color: #6b7280;
            font-size: 13px;
            border-top: 1px solid #f3f4f6;
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
                border-radius: 15px;
            }

            .header {
                padding: 20px;
            }

            .header h2 {
                font-size: 22px;
            }

            .content {
                padding: 20px;
            }

            .field {
                padding: 15px;
                margin-bottom: 15px;
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <div class="header">
            <h2>رسالة جديدة من صفحة تواصل معنا</h2>
        </div>

        <div class="content">
            <div class="field name-field">
                <strong>الاسم:</strong>
                <div class="field-content">{{ $contact->name }}</div>
            </div>

            <div class="field phone-field">
                <strong>الهاتف:</strong>
                <div class="field-content">{{ $contact->phone_number }}</div>
            </div>

            <div class="field message-field">
                <strong>الرسالة:</strong>
                <div class="field-content">{{ $contact->message }}</div>
            </div>
        </div>

        <div class="footer">
            تم إرسال هذه الرسالة من خلال نموذج التواصل في الموقع
        </div>
    </div>
</body>
</html>
