<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
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

        .contact-container {
            width: 90%;
            max-width: 500px;
            background-color: #ffffff; 
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow-y: auto; 
            padding: 20px;
            margin-bottom: 10px;
        }

        .contact-section {
            margin-bottom: 30px;
        }

        .contact-section h2 {
            color: #1a5f7a; 
            margin-bottom: 10px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-item i {
            font-size: 1.3em;
            margin-right: 15px;
            color: #1a5f7a;
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
    <div class="contact-container">
        <h1>Contact Information</h1>

        <div class="contact-section">
            <h2>UCLM Cashier's Office</h2>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>Phone: 09959624133</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>Email: uclmcollege.payments@gmail.com</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <span>Office Hours: 9:00 AM - 5:00 PM</span>
            </div>
        </div>

        <div class="contact-section">
            <h2>UCLM Accounting Office</h2>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>Phone: 099528302136</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>Email: uclm.acctg@gmail.com</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <span>Office Hours: 9:00 AM - 5:00 PM</span>
            </div>
        </div>

        <div class="contact-section">
            <h2>UCLM EDP</h2>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>Phone: 09158871109</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>Email: uclmedp@gmail.com</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <span>Office Hours: 9:00 AM - 5:00 PM</span>
            </div>
        </div>

        <div class="back-link">
            <a href="{{ route('login') }}">&larr; Back to Login</a>
        </div>
    </div>
</body>
</html>
