<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Student Assessments and Receipts</title>
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

        .form-container select {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.0em;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .form-container button {
            width: 48%;
            padding: 13px;
            font-size: 1.0em;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            border-radius: 5px;
        }

        .approve-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        .approve-btn:hover {
            background-color: #45a049;
        }

        .reject-btn {
            background-color: #f44336;
            color: white;
            border: none;
        }

        .reject-btn:hover {
            background-color: #e53935;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .status-pending {
            color: #f9a825;
            font-weight: bold;
        }

        .status-rejected {
            color: #f44336;
            font-weight: bold;
        }

        .status-approved {
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header-logo">
            <img src="/images/uclogo.jpg" alt="UC Logo" class="logo-img">
            <h1>Hello, Accounting!</h1>
        </div>

        <div class="user-indicator">
            <a href="{{ route('login') }}" class="logout-indicator" title="Logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </header>

    <div class="content">
        <div class="form-container">
            <h3>Verify Student Assessments and Receipts</h3>

            @if (session('status'))
                <div class="alert {{ session('status_type') === 'error' ? 'alert-danger' : 'alert-success' }}">
                    {{ session('status') }}
                </div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Assessments</th>
                        <th>Receipts</th>
                        <th>Assessment Period</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Date Approved</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assessments as $assessment)
                        <tr>
                            <td>{{ $assessment->user_id }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $assessment->assessment_path) }}" target="_blank">View Assessment</a>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $assessment->receipt_path) }}" target="_blank">View Receipt</a>
                            </td>
                            <td>{{ $assessment->assessment_type }}</td>
                            <td>
                                <span class="status-{{ $assessment->status ?? 'pending' }}">
                                    {{ ucfirst($assessment->status ?? 'Pending') }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('accounting.verifyAssessment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="assessment_id" value="{{ $assessment->assessment_id }}">
                                    <input type="hidden" name="assessment_type" value="{{ $assessment->assessment_type }}">
                                    <button type="submit" name="action" value="approved" class="approve-btn">Approve</button>
                                    <button type="submit" name="action" value="rejected" class="reject-btn">Reject</button>
                                </form>
                            </td>
                            <td>
                                {{ $assessment->date_approved ? \Carbon\Carbon::parse($assessment->date_approved)->format('F j, Y') : 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
