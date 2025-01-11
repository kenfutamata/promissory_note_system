<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
        }

        .h2 {
            margin-top: 3;
        }

        .notification {
            background-color: #f0f0f0; 
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #87CEEB; 
        }

        .notification h3 {
            margin: 0 0 5px;
            font-size: 1.1em;
        }

        .notification p {
            margin: 0;
            color: #555;
        }
    </style>
</head>
<body>

<x-app>
</x-app>

<header class="header">
    <div class="header-logo">
        <img src="images/logo.jpg" alt="University of Cebu Logo" class="logo-img">
        <h1>University of Cebu Promissory Portal</h1>
    </div>
    <div class="user-indicator">
        <img src="images/default.jpg" alt="Profile Picture" id="userProfilePic">
        <div>
            <span id="userName">
                {{ Auth::user()->first_name }} 
                @if(Auth::user()->middle_name) 
                    {{ Auth::user()->middle_name }} 
                @endif 
                {{ Auth::user()->last_name }}
            </span>
            <div class="user-info">
                <span id="userSchoolId">{{ Auth::user()->user_id }}</span>
                <span id="userProgram"> | {{ Auth::user()->program }}</span>
                <span id="userSection">- {{ Auth::user()->year_section }}</span>
            </div>
        </div>
    </div>
</header>

    <div class="content">
        <h2>Your Notifications</h2>

        <div class="notification">
            <h3>New Assessment Available</h3>
            <p>You have a new assessment available for submission due on October 20, 2024.</p>
        </div>

        <div class="notification">
            <h3>Promissory Note Approved</h3>
            <p>Your promissory note submitted on October 12, 2024, has been approved.</p>
        </div>

        <div class="notification">
            <h3>Important Update</h3>
            <p>All students must attend the orientation on October 18, 2024.</p>
        </div>

        <div class="notification">
            <h3>Reminder</h3>
            <p>Please submit your documents for the upcoming semester by October 25, 2024.</p>
        </div>

        <div class="notification">
            <h3>New Message</h3>
            <p>You have received a new message from your instructor. Please check your inbox.</p>
        </div>
    </div>
</body>
</html>
