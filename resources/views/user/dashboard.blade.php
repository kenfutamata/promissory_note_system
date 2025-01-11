<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/462585939_1287816212551634_8228548896634571783_n.png')}}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #1a5f7a;
        }

        .dashboard {
            font-family: 'Poppins', sans-serif;
            color: #1a5f7a;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard h2 {
            margin-top: 0;
        }

        .dashboard-subtitle {
            font-size: 1.1em;
            margin-bottom: 20px;
            color: #555;
        }

        .dashboard-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .dashboard-card {
            flex: 1;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            height: 90px;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card i {
            color: #1a5f7a;
        }

        .dashboard-card h3 {
            margin: 0;
            font-size: 2em;
            color: #1a5f7a;
        }

        .dashboard-card p {
            margin: 0;
            color: #777;
        }

        .dashboard-announcements {
            margin-top: 20px;
        }

        .dashboard-announcements h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .dashboard-announcements ul {
            list-style: none;
            padding: 0;
        }

        .dashboard-announcements li {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dashboard-announcements li p {
            margin: 0;
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
    <div class="dashboard">
        <h2>Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}!</h2>
        <p class="dashboard-subtitle">Here is a quick overview of your activities.</p>

        <div class="dashboard-cards">
            <div class="dashboard-card">
                <i class="fas fa-book fa-3x"></i>
                <div>
                    <h3>{{ $assessmentsSubmitted }}</h3>
                    <p>Assessments Submitted</p>
                </div>
            </div>
            <div class="dashboard-card">
                <i class="fas fa-file-signature fa-3x"></i>
                <div>
                    <h3>{{ $promissoryNotesCount }}</h3>
                    <p>Promissory Notes</p>
                </div>
            </div>
            <div class="dashboard-card">
                <i class="fas fa-history fa-3x"></i>
                <div>
                    <h3>5</h3>
                    <p>Activity History</p>
                </div>
            </div>
        </div>

        <div class="dashboard-announcements">
            <h3>Announcements</h3>
            <ul>
                <li>
                    <p><strong>Midterm Assessments Due:</strong> Submit by December 15, 2024.</p>
                </li>
                <li>
                    <p><strong>Payment Reminder:</strong> Outstanding balances must be cleared before finals.</p>
                </li>
                <li>
                    <p><strong>System Maintenance:</strong> Scheduled downtime on December 20, 2024.</p>
                </li>
            </ul>
        </div>

        <div class="dashboard-announcements">
            <h3>To-Do List</h3>
            <ul>
                <li>
                    <input type="checkbox" id="task1"> 
                    <label for="task1">Complete Promissory Note Submission</label>
                </li>
                <li>
                    <input type="checkbox" id="task2"> 
                    <label for="task2">Pay Outstanding Balance</label>
                </li>
                <li>
                    <input type="checkbox" id="task3"> 
                    <label for="task3">Upload Midterm Assessment</label>
                </li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>