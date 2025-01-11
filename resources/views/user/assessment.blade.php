<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessments</title>
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

        .assessment h2{
            padding-top: 0px; 
        }

        .assessment-list {
            display: flex;
            flex-direction: column; 
            gap: 10px; 
            margin-bottom: 20px;
        }

        .assessment-item {
            background-color: #f0f0f0; 
            padding: 15px;
            border-radius: 5px;
            display: block; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
        }

        .assessment-item h4 {
            margin: 0;
        }

        .btn {
            display: inline-block;
            background-color: #1a5f7a;  
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 1em;
            border-style: none;
        }

        .btn:hover {
            background-color: #1f77a1; 
        }

        #uploadedImage {
            margin-top: 20px;
            max-width: 100%; 
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
            font-weight: 600;
        }

        .form-group select,
        .form-group input {
            width: 100%; 
            padding: 12px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-family: 'Poppins', sans-serif;
            font-size: 1em;
            box-sizing: border-box; 
        }

        .form-group input[type="file"] {
            padding: 8px;
            cursor: pointer;
        }

        .content {
            padding: 20px;
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
    <div class="assessment">
        <h2>Assessments</h2>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        <form action="{{ route('user.assessment') }}" method="POST" enctype="multipart/form-data">
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

            <div class="form-group">
                <label for="assessmentType">Assessment Details</label>
                <select name="assessment_type" id="assessmentType" required>
                    <option value="">Select Assessment Period</option>
                    <option value="Prelim">Prelim</option>
                    <option value="Midterm">Midterm</option>
                    <option value="Semifinal">Semifinal</option>
                    <option value="Final">Final</option>
                </select>
            </div>

            <div class="form-group">
                <label for="assessmentFile">Upload Assessment</label>
                <input type="file" name="assessment_file" id="assessmentFile" accept="application/pdf,image/*" required>
            </div>

            <div class="form-group">
                <label for="receiptFile">Upload Receipt</label>
                <input type="file" name="receipt_file" id="receiptFile" accept="application/pdf,image/*">
            </div>

            <div class="form-group">
                <label for="uploadedDate">Submission Date</label>
                <input type="date" name="uploaded_date" id="uploadedDate" value="{{ date('Y-m-d') }}" required>
            </div>

            <button type="submit" class="btn">Submit Assessment</button>
        </form>
        
        @foreach($assessments as $assessment)
            <div class="assessment-item">
                <div>
                    <h4>{{ $assessment->assessment_type }} Exam</h4>
                    <p>Status: <strong>{{ $assessment->status ?? 'Pending' }}</strong></p>
                    <p>Assessment File: 
                        <a href="{{ asset('storage/' . $assessment->assessment_path) }}" target="_blank">View</a>
                    </p>
                    @if($assessment->receipt_path)
                        <p>Receipt File: 
                            <a href="{{ asset('storage/' . $assessment->receipt_path) }}" target="_blank">View</a>
                        </p>
                    @endif
            </div>
        @endforeach

        <input type="file" id="fileUpload" accept="image/*" style="display: none;">
        <img id="uploadedImage" src="" alt="Uploaded Image" style="display: none;">
    </div>
</div>
</body>
</html>
