<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

        .content {
            margin-left: 270px; 
            padding: 80px 20px 20px; 
        }

        .account h2 {
            padding-top: 0px;
        }

        .account-info {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex; 
            align-items: center; 
            color: #1a5f7a;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .account-info img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: block;
            margin-right: 20px; 
        }

        .account-info form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .account-info label {
            margin-top: 10px;
        }

        .account-info input {
            width: calc(100% - 20px); 
            margin-bottom: 10px; 
            padding: 10px; 
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }

        .account-info button {
            width: 98%; 
            margin-top: 20px;
            padding: 13px;
            background-color: #1a5f7a; 
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        .account-info button:hover {
            background-color: #165a6c; 
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px; 
            padding-right: 30px;
        }

        .form-column {
            flex: 1;
            margin-right: 30px;
        }

        .form-column:last-child {
            margin-right: 0; 
        }
    </style>
</head>
<body>

<x-app>
</x-app>

<header class="header">
    <div class="header-logo">
        <img src="{{ asset('images/logo.jpg') }}" alt="University of Cebu Logo" class="logo-img">
        <h1>University of Cebu Promissory Portal</h1>
    </div>
    <div class="user-indicator">
        <img src="{{ asset('images/' . (Auth::user()->profile_picture ?: 'default.jpg')) }}" alt="Profile Picture" id="userProfilePic">
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
    <div class="account">
        <h2>Profile Details</h2>
    
        <div class="account-info">
            <img src="{{ asset('storage/' . (Auth::user()->profile_picture ?: 'default.jpg')) }}" alt="Profile Picture" id="profilePic">
            <form action="{{ route('user.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-column">
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}" required>
                    </div>

                    <div class="form-column">
                        <label for="program">Program:</label>
                        <input type="text" id="program" name="program" value="{{ Auth::user()->program }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-column">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" id="middle_name" name="middle_name" value="{{ Auth::user()->middle_name }}" required>
                    </div>

                    <div class="form-column">
                        <label for="yearSection">Year Level:</label>
                        <input type="text" id="yearSection" name="yearSection" value="{{ Auth::user()->year_section }}" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-column">
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}" required>
                    </div>
                    <div class="form-column">
                        <label for="department">Department:</label>
                        <input type="text" id="department" name="department" value="{{ Auth::user()->department }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-column">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-column">
                        <label for="profilePicUpload">Change Profile Picture:</label>
                        <input type="file" id="profilePicUpload" name="profile_picture" accept="image/*">
                    </div>
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
