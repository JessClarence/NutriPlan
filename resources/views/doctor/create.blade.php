<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f7fa;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff; 
        }

        .card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #2d3436;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
            padding-left: 10px;
            color: white;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            margin-bottom: 5px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #636e72;
            border-radius: 5px;
        }

        .sidebar a.active {
            background-color: #0984e3;
            border-radius: 5px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            border-radius: 20px;
            background-color: #fff;
            border-bottom: 1px solid #dfe6e9;
        }

        .topbar .search-bar input {
            padding: 5px;
            width: 300px;
            border: 1px solid #dfe6e9;
            border-radius: 10px;
            border-color: slategray;
        }

        .topbar .user-info {
            display: flex;
            align-items: center;
        }

        .topbar .user-info img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .topbar .user-info .user-name {
            font-weight: bold;
        }

        .wrapper {
            display: flex;
        }
        
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Doctor Module</h2>
            <p></p>
            <h5>Menu</h5>
            <a href="/doctor">Dashboard</a>
            <a href="show">Doctor Assessment</a>
            <a href="create" class="active">Diagnosis</a>
            <h5>Others</h5>
            <a href="id/edit">Patient Records</a>
            <a href="#">Settings</a>
            <a href="#">Logout</a>
        </div>
        <!-- Main Content -->
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <h2>Diagnosis</h2>
                    <p>Doctor Diagnosis</p>
                    <h2 class="text-center mb-4">Patient Information</h2>
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="condition" class="form-label">Condition</label>
                                <input type="text" class="form-control" id="condition" placeholder="Condition">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="First Name" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Last Name" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" placeholder="Age" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="height" class="form-label">Height (cm)</label>
                                <input type="number" class="form-control" id="height" placeholder="Height" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="weight" class="form-label">Weight (kg)</label>
                                <input type="number" class="form-control" id="weight" placeholder="Weight" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dailyActivity" class="form-label">Daily Activity</label>
                                <input type="text" class="form-control" id="dailyActivity" placeholder="Daily Activity" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="bmi" class="form-label">BMI</label>
                                <input type="text" class="form-control" id="bmi" placeholder="BMI" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" placeholder="Gender" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="dateOfBirth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dateOfBirth" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="recommendation" class="form-label">Recommendation</label>
                                <textarea class="form-control" id="recommendation" rows="3" placeholder="Enter recommendation..."></textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</html>
</x-app-layout>
