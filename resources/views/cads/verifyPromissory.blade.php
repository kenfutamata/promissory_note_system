<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Student Promissory Notes</title>
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

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .form-container h3 {
            margin-top: 0;
            font-size: 1.3em;
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

        .content {
            padding: 100px 20px 20px;
        }

        .message-success {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none;
            text-align: center;
        }

        .note-box {
            background-color: #e3f2fd;
            border: 1px solid #90caf9;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            height: 25px;
            align-items: center;
        }

        .note-box h4 {
            margin: 0;
            font-size: 1.0em;
        }

        .note-details {
            display: none;
            margin-top: 5px;
            margin-bottom: 15px;
            padding: 15px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .action-buttons {
            margin-top: 10px;
        }

        .approve-btn, .reject-btn {
            width: 10%;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 1.0em;
        }

        .approve-btn {
            background-color: #4CAF50;
            font-family: 'Poppins', sans-serif;
        }

        .reject-btn {
            background-color: #f44336;
            font-family: 'Poppins', sans-serif;
        }

        .approve-btn:hover, .reject-btn:hover {
            opacity: 1.0;
        }

        .user-indicator {
            display: flex;
            align-items: center;
            margin-right: 50px;
        }

        .logout-indicator {
            font-size: 1.8em;
            color: white;
            text-decoration: none;
        }

        .logout-indicator:hover {
            color: #ddd;
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

<header class="header">
    <div class="header-logo">
        <img src="/images/uclogo.jpg" alt="UC Logo" class="logo-img">
        <h1>Good day, Campus Director!</h1>
    </div>

    <div class="user-indicator">
        <a href="{{ route('login') }}" class="logout-indicator" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</header>

<div class="content">
    <div class="form-container">
        <h3>Verify Student Promissory Notes</h3>
        @if (session('status'))
            <div class="alert {{ session('status_type') === 'error' ? 'alert-danger' : 'alert-success' }}">
                {{ session('status') }}
            </div>
        @endif

        <div id="message-success" class="message-success">
            Transaction successful! Notification email has been sent.
        </div>

        @foreach($promissoryNotes as $note)
        <div class="note-box" onclick="this.nextElementSibling.style.display = this.nextElementSibling.style.display === 'block' ? 'none' : 'block';">
            <h4>Submission Date: {{ \Carbon\Carbon::parse($note->submitted_at)->format('F j, Y') }}</h4>
        </div>
        <div id="note-{{ $note->note_id }}" class="note-details">
            <p><strong>Student Name:</strong> {{ $note->name }}</p>
            <p><strong>Program, Year and Section:</strong> {{ $note->year_section }}</p>
            <p><strong>Contact Number:</strong> {{ $note->contact_no }}</p>
            <p><strong>Amount Due For:</strong> {{ $note->amount_due_for }}</p>
            <p><strong>Partial Payment: </strong> ₱{{ $note->partial_payment }}</p>
            <p><strong>Balance Due: </strong> ₱{{ $note->balance_due }}</p>
            <p><strong>Reason:</strong> {{ $note->reason }}</p>
            <p><strong>Payment Schedule:</strong> {{ $note->payment_schedule }}</p>
            <p><strong>Assessment File:</strong> 
                @if($note->assessment_path)
                    <a href="{{ asset('storage/' . $note->assessment_path) }}" target="_blank">View Assessment</a>
                @else
                    Not provided
                @endif
            <p><strong>Receipt File:</strong> 
                @if($note->receipt_path)
                    <a href="{{ asset('storage/' . $note->receipt_path) }}" target="_blank">View Receipt</a>
                @else
                    Not provided
                @endif
            </p>

            <div class="action-buttons">
                <form action="{{ route('cads.verifyPromissory') }}" method="POST">
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->note_id }}">
                    <button type="submit" name="action" value="approved" class="approve-btn">Approve</button>
                    <button type="submit" name="action" value="rejected" class="reject-btn">Reject</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
