<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promissory Note</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/462585939_1287816212551634_8228548896634571783_n.png')}}">

    <style>
        .body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; 
            color: #1a5f7a;
        }

        .content {
            margin-left: 270px; 
            padding: 80px 20px 20px; 
            height: calc(100vh - 60px); 
            overflow-y: visible;
        }

        .promissory h2 {
            padding-top: 0px; 
        }

        .promissory-note-form {
            max-width: 100%; 
            margin: 20px auto;
            padding: 30px;
            background-color: #fff; 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #1a5f7a; 
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input.error, .form-group textarea.error {
            border-color: red; 
        }

        .form-group .error-message {
            color: red; 
            font-size: 0.9em;
            margin-top: 5px;
        }

        .form-columns {
            display: flex;
            justify-content: space-between;
            gap: 20px; 
        }

        .form-column {
            flex: 1; 
        }

        .button {
            background-color: #1a5f7a; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #2e8bc0; 
        }

        .note-footer {
            margin-top: 20px;
            font-size: 0.9em;
            text-align: center;
            color: #555;
        }

        .payment-columns {
            display: flex;
            justify-content: space-between;
            gap: 20px; 
        }

        .radio-group {
            margin: 20px 0 30px; 
        }

        .radio-group label {
            margin-right: 10px; 
            font-weight: bold; 
            font-size: 1em; 
            margin-bottom: 30px;
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

        .payment-agreement {
            display: flex;
            align-items: center;
            gap: 10px; 
        }

        .payment-agreement p {
            margin: 0;
            font-size: 1em;
        }

        .payment-agreement input[type="date"] {
            width: auto; 
            padding: 5px;
            font-size: 1em;
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
    <div class="promissory">
        <h2>Promissory Note</h2>
        <p>Please fill out the form below to create a new promissory note.</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form class="promissory-note-form" action="{{ route('user.promissory') }}" method="POST">
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
            
            <div class="form-columns">
                <div class="form-column">
                    <div class="form-group">
                        <label for="user_id">Student ID Number:</label>
                        <input type="text" id="user_id" name="user_id" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Student Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="radio-group">
                        <label>Amount Due For:</label>
                        <label><input type="radio" name="amount_due_for" value="prelim" required> Prelim</label>
                        <label><input type="radio" name="amount_due_for" value="midterm"> Midterm</label>
                        <label><input type="radio" name="amount_due_for" value="semifinal"> Semi-Final</label>
                        <label><input type="radio" name="amount_due_for" value="finals"> Finals</label>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-group">
                        <label for="year_section">Program, Year and Section:</label>
                        <input type="text" id="year_section" name="year_section" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <input type="text" id="contact_no" name="contact_no" required>
                    </div>
                </div>
            </div>

            <div class="payment-columns">
                <div class="form-group form-column">
                    <label for="balance_due">Amount Due Balance:</label>
                    <input type="number" id="balance_due" name="balance_due" required>
                </div>
                <div class="form-group form-column">
                    <label for="partial_payment">Partial Payment:</label>
                    <input type="number" id="partial_payment" name="partial_payment" required>
                </div>
            </div>

            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea id="reason" name="reason" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="payment_schedule">Payment Agreement:</label>
                <div class="payment-agreement">
                    <p>We hereby agree to pay the entire balance due on or before</p>
                    <input type="date" name="payment_schedule" required>
                </div>
            </div>

            <button type="submit" class="button">Submit Promissory Note</button>
        </form>
    </div>

    <div class="note-footer">
        <p>This promissory note is issued in accordance with established policies. All terms and conditions are governed by applicable regulations.</p>
    </div>
</div>
