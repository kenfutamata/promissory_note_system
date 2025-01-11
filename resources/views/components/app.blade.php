<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/path/to/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #1a5f7a;
        }

        .header {
            background-color: #ffffff;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            width: 70px;
            height: 45px;
            margin-right: 10px;
        }

        .header h1 {
            font-size: 1.2em;
            margin: 0;
            display: inline-block;
            font-weight: 600;
        }

        .user-indicator {
            display: flex;
            align-items: center;
            padding-right: 50px;
        }

        #userProfilePic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            top: 60px;
            left: 0;
            height: calc(100% - 60px);
            background-color: #4c6a92;
            padding-top: 30px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #ffffff;
        }

        .sidebar-content {
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: #ffffff;
            padding: 15px 20px;
            text-decoration: none;
            font-size: 1.1em;
            display: flex;
            align-items: center;
            border-left: 3px solid transparent;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }

        .sidebar a i {
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #2e4d66;
            color: #fff;
            border-left: 3px solid #fff;
            padding-left: 30px;
        }

        .sidebar a:hover i {
            color: #fff;
        }

        .logout-indicator {
            font-size: 1.5em;
            color: #1a5f7a;  
            display: flex;
            align-items: center;
            position: absolute; 
            bottom: 20px; 
            width: 79%;
            margin-bottom: 30px;
        }

        .logout-indicator i {
            margin-right: 10px;
            transition: color 0.3s ease;
        }
        
        .content {
            margin-left: 270px;
            padding: 80px 20px 20px;
            transition: margin-left 0.3s ease;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-content">
        <a href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
        <a href="{{ route('user.notifications') }}"><i class="fas fa-bell"></i><span> Notifications</span></a>
        <a href="{{ route('user.assessment') }}"><i class="fas fa-file-alt"></i><span> Assessment</span></a>
        <a href="{{ route('user.promissory') }}"><i class="fas fa-file-signature"></i><span> Promissory</span></a>
        <a href="{{ route('user.history') }}"><i class="fas fa-history"></i><span> History</span></a>
        <a href="{{ route('user.settings') }}"><i class="fas fa-cog"></i><span> Settings</span></a>
        <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i><span> Profile</span></a>
    </div>

    <a href="{{ route('login') }}" class="logout-indicator"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
</div>


</body>
</html>
