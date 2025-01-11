<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>{{ $subject }}</h1>
        <p>{{ $messageBody }}</p>
        <div class="footer">
            <p>Thank you for your attention.</p>
            <p>Best regards,<br>Campus Director</p>
        </div>
    </div>
</body>
</html>
