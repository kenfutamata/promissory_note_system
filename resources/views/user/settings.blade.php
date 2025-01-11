<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
            padding: 20px;
            padding-left: 40px;
            padding-right: 40px;  
        }

        .settings {
            max-width: 100%;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: 95%;
            padding-top: 5px;
        }

        .settings-group {
            margin-bottom: 30px;
        }

        .settings-group h2 {
            margin-bottom: 15px;
            color: #1a5f7a;
            font-size: 1.2em;
        }

        .settings-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #1a5f7a;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        select, input[type="range"] {
            width: 150px;
        }

        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #1a5f7a;
            color: #fff;
            cursor: pointer;
            font-size: 1em;
        }

        .button:hover {
            background-color: #144d60;
        }

        .settings-container {
            width: 95%;
            max-width: 100%;
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
    <div class="settings">
        <h2>Settings</h2>

        <div class="settings-container">
            <div class="settings-group">
                <h2>Appearance</h2>
                <div class="settings-option">
                    <span>Dark Mode</span>
                    <label class="switch">
                        <input type="checkbox" id="darkModeToggle">
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="settings-option">
                    <span>Font Size</span>
                    <input type="range" id="fontSizeSlider" min="12" max="20" step="1" value="16">
                </div>
                <div class="settings-option">
                    <span>Theme Color</span>
                    <input type="color" id="themeColorPicker" value="#1a5f7a">
                </div>
            </div>

            <div class="settings-group">
                <h2>Language</h2>
                <div class="settings-option">
                    <span>Preferred Language</span>
                    <select id="languageSelect">
                        <option value="en">English</option>
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                    </select>
                </div>
            </div>

            <div class="settings-group">
                <h2>Notifications</h2>
                <div class="settings-option">
                    <span>Enable Notifications</span>
                    <label class="switch">
                        <input type="checkbox" id="notificationsToggle">
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="settings-option">
                    <span>Email Notifications</span>
                    <label class="switch">
                        <input type="checkbox" id="emailNotificationsToggle">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>

            <div class="settings-group">
                <h2>Privacy</h2>
                <div class="settings-option">
                    <span>Private Account</span>
                    <label class="switch">
                        <input type="checkbox" id="privacyToggle">
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="settings-option">
                    <span>Two-Factor Authentication</span>
                    <label class="switch">
                        <input type="checkbox" id="twoFactorToggle">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>

            <div class="settings-group">
                <button class="button" id="resetButton">Reset to Default</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>