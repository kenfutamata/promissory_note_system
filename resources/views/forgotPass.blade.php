<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/462585939_1287816212551634_8228548896634571783_n.png')}}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #1a5f7a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-container {
            width: 90%;
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .reset-container h1 {
            color: #1a5f7a;
            margin-bottom: 20px;
        }

        .reset-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .reset-container button {
            background-color: #1a5f7a;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .reset-container button:hover {
            background-color: #0a53be;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #0a53be;
            text-decoration: none;
            font-size: 17px;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h1>Forgot Password</h1>
        <form action="{{ route('forgotPass') }}" method="POST">
            @csrf
            <label for="email">Enter your email address to receive a password reset link:</label>
            <input type="email" name="email" id="email" required placeholder="Your Email Address">
            <button type="submit">Send Password Reset Link</button>
        </form>
        <div class="back-link">
            <a href="{{ route('login') }}">&larr; Back to Login</a>
        </div>
    </div>
</body>
</html>
