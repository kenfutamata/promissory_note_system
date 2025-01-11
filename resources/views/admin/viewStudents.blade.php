<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .table-container h3 {
            font-size: 1.3em;  
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container table, th, td {
            border: 1px solid #ccc;
        }

        .table-container th, td {
            padding: 15px;
            text-align: left;
        }

        .table-container th {
            background-color: #1a5f7a;
            color: white;
        }

        .table-container td {
            background-color: #f9f9f9;
        }

        .table-container td a {
            text-decoration: none;
            color: #1a5f7a;
            font-weight: bold;
        }

        .table-container td a:hover {
            text-decoration: underline;
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
    <div class="table-container">
        <h3>Registered Students</h3>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Program</th>
                    <th>Year & Section</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->user_id }}</td>
                    <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->program }}</td>
                    <td>{{ $student->year_section }}</td>
                    <td>{{ $student->department }}</td>

                       <td><div class="d-flex">
                            <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#showStudentModal{{ $student->user_id }}">Show</button>
                            <button class="btn btn-warning btn-sm me-2">Edit</button>  
                            <form action="" method="POST"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                       </td>
                </tr>


                <!-- Modal for showing user information (INSIDE the loop) -->
                <div class="modal fade" id="showStudentModal{{ $student->user_id }}" tabindex="-1" aria-labelledby="showStudentModalLabel{{ $student->user_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showStudentModalLabel{{ $student->user_id }}">Student Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Student ID:</strong> {{ $student->user_id }}</p>
                                <p><strong>Full Name:</strong> {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</p>
                                <p><strong>Email:</strong> {{ $student->email }}</p>
                                <p><strong>Program:</strong> {{ $student->program }}</p>
                                <p><strong>Year & Section:</strong> {{ $student->year_section }}</p>
                                <p><strong>Department:</strong> {{ $student->department }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

    <!--Update Student Information-->
                    <div class="modal fade" id="editStudentModal{{$student->user_id}}" tabindex="-1" aria-labelledby="editStudentModalLabel{{$student->user_id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStudentModalLabel{{$student->user_id}}">Edit Student User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('cars.update_car', $car->car_id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}">                                
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $student->middle_name) }}">                                
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}">                                
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}">                                
                                </div>

                                <div class="mb-3">
                                    <label for="select_program" class="form-label">Select Program</label>
                                    <select class="form-control" id="program" name="program">
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
                                </div>

                                <div class="mb-3">
                                    <label for="license_plate" class="form-label">License Plate</label>
                                    <input type="text" class="form-control" id="license_plate" name="license_plate" value="{{ old('license_plate', $car->license_plate) }}">
                                    @error('license_plate')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $car->description) }}</textarea>
                                    @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="rate" class="form-label">Rental Rate (per day)</label>
                                    <input type="number" class="form-control" id="rate" name="rate" value="{{ old('rate', $car->rate) }}">
                                    @error('rate')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="addCarTransmission" class="form-label">Transmission</label>
                                    <select class="form-control" id="transmission" name="transmission">
                                    <option>Automatic</option>
                                    <option>Manual</option>
                                    </select>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>

                @endforeach
            </tbody>  
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
