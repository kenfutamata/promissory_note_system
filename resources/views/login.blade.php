<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/462585939_1287816212551634_8228548896634571783_n.png')}}">

    <title>Promissory Portal Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            background-image: url('images/ucbg.png'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 800px;
            max-width: 95%;
            border: 10px solid white;
        }

        .logo-section {
            background-color: #0046ad;
            color: #fff;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px;
            text-align: center;
            border-radius: 10px;
        }

        .logo-section img {
            max-width: 180px;
            height: 180px;
            border-radius: 50%; 
            margin-bottom: 20px;
        }

        .logo-section h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #fff;
        }

        .logo-section p {
            font-size: 16px;
            font-weight: 300;
            color: #fff;
        }

        .login-section {
            flex: 1.2;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-section h2 {
            font-size: 25px;
            margin-bottom: 20px;
            color: #1a5f7a;
        }

        .login-section form input[type="text"],
        .login-section form input[type="password"] {
            width: 92%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 30px; 
            font-size: 16px;
            font-family: 'Poppins', sans-serif; 
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .login-section form input::placeholder {
            font-family: 'Poppins', sans-serif;
            color: #aaa;
        }

        .login-section form button {
            background-color: #1a5f7a;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 30px; 
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            width: 100%;
            margin-top: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .login-section form button:hover {
            background-color: #143f50;
        }

        .login-section .links {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
        }

        .login-section .links a {
            color: #1a5f7a;
            text-decoration: none;
        }

        .login-section .links a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="images/uclogo.jpg" alt="UC Logo">
            <h1>University of Cebu</h1>
            <p>Promissory Note Portal</p>
        </div>
        
        <div class="login-section">
            <h2>Promissory Portal Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="text" name="id_or_email" placeholder="Email Address or ID Number" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>

                @if($errors->has('id_or_email'))
                    <div class="error-message">{{ $errors->first('id_or_email') }}</div>
                @endif
            </form>

            <div class="links">
                <a href="{{ route('forgotPass') }}">Forgot Password?</a> ·  
                <a href="{{ route('contactInfo') }}">Need Help?</a>
            </div>
        </div>
    </div>
</body>
</html>
