<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promissory Note History</title>
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

        .history h2 {
            padding-top: 0px;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .history-table th, .history-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .history-table th {
            background-color: #1a5f7a;
            color: white;
        }
        .history-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .history-table tr:hover {
            background-color: #ddd;
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
    <div class="history">
        <h2>Promissory Note History</h2>
        <p>Below is the record of all promissory notes you have created.</p>

        <table class="history-table">
            <thead>
                <tr>
                    <th>Date Created</th>
                    <th>Amount Balance</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
                <tbody>
                    @if($promissoryNotes->isEmpty())
                    <tr>
                        <td colspan="4">No promissory notes found.</td>
                    </tr>
                    @else
                        @foreach($promissoryNotes as $note)
                            <tr>
                                <td>{{ $note->created_at->format('Y-m-d H:i') }}</td>
                                <td>₱{{ number_format($note->balance_due, 2) }}</td>
                                <td>{{ $note->payment_schedule }}</td>
                                <td>
                                    @if($note->cads)
                                        {{ $note->cads->status }} 
                                    @else
                                        Not Approved
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
