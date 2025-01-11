<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
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

        .header {
            background-color: #1a5f7a;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .header h1 {
            font-size: 1.2em;
            margin: 0;
            font-weight: 600;
        }

        .user-indicator {
            display: flex;
            align-items: center;
            padding-right: 50px;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-grow: 1;
            text-align: center;
            padding-right: 150px;
        }

        .nav-link {
            color: #ffffff;
            font-size: 1.0em;
            text-decoration: none;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ddd;
        }

        .logout-indicator {
            font-size: 1.8em; 
            margin-left: 15px;
            color: white;
            text-decoration: none;
        }

        .logout-indicator:hover {
            color: #ddd;
        }

        .content {
            padding: 80px 20px 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            padding-top: 35px;
        }

        .form-container h3 {
            margin-top: 0;
            font-size: 1.3em;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 15px;
            margin-bottom: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.0em;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .form-container button {
            width: 100%;
            padding: 13px;
            background-color: #1a5f7a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            font-family: 'Poppins', sans-serif;
        }

        .form-container button:hover {
            background-color: #143f50;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 1.1em;
            color: #fff;
        }

        .alert-success {
            background-color: #4CAF50;
        }

        .alert-danger {
            background-color: #f44336;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-column {
            flex: 1;
            min-width: 45%;
        }

        .profile-pic {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="header-logo">
        <img src="/images/uclogo.jpg" alt="UC Logo" class="logo-img">
        <h1>Welcome, Admin!</h1> 
    </div>

    <div class="nav-links">
        <a href="{{ route('admin.registerStudent') }}" class="nav-link"><i class="fas fa-user-plus"></i> Register Student</a>
        <a href="{{ route('admin.viewStudents') }}" class="nav-link"><i class="fas fa-users"></i> View Students</a>
    </div>

    <div class="user-indicator">
        <a href="{{ route('login') }}" class="logout-indicator" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</header>

<div class="content">
    <div class="form-container">
        <h3>Register New Student</h3>

        @if(session('status'))
            <div class="alert {{ session('status') == 'Student registered successfully!' ? 'alert-success' : 'alert-danger' }}">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.registerStudent') }}" method="POST">
            @csrf

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-row">
                <div class="form-column">
                    <input type="text" name="user_id" id="user_id" placeholder="Student ID" required>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
                    <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="form-column">
                    <input type="text" name="program" id="program" placeholder="Program" required>
                    <input type="text" name="year_section" id="year_section" placeholder="Year & Section" required>
                    <select name="department" required>
                        <option value="">Select Department</option>
                        <option value="College of Computer Studies">College of Computer Studies</option>
                        <option value="College of Nursing">College of Nursing</option>
                        <option value="College of Engineering">College of Engineering</option>
                        <option value="College of Customs Administration">College of Customs Administration</option>
                        <option value="College of Business and Accountancy">College of Business and Accountancy</option>
                        <option value="College of Education">College of Education</option>
                        <option value="College of Criminology">College of Criminology</option>
                        <option value="College of Marine Transportation">College of Marine Transportation</option>
                        <option value="Senior High School">Senior High School</option>
                        <option value="Basic Education">Basic Education</option>
                    </select>
                    <input type="password" name="password" id="password" placeholder="Password" required>

                    <input type="file" name="profile_picture" id="profile_picture" class="profile-pic" accept="image/*">
                </div>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</div>
</body>
</html>
