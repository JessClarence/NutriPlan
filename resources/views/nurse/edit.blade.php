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
            <h2>Nurse Module</h2>
            <p></p>
            <h5>Menu</h5>
            <a href="/nurse">Dashboard</a>
            <a href="../create"> Nurse Assessment</a>
            <h5>Others</h5>
            <a href="../show" class="active">Patient Records</a>
            <a href="#">Settings</a>
            <a href="#">Logout</a>
        </div>
        <!-- Main Content -->
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h2>Nurse Assessment</h2> 
                        <a href="{{ url('nurse/show') }}" class="btn btn-primary mb-2">Back</a> 
                    </div>
                    <p>Edit Patient Information</p>
                    <h2 class="text-center mb-4">Edit Patient Information</h2>
                    <form action="{{ route('nurse.update', $nurse) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Condition Type</label>
                                <input type="text" name="condition_type" class="form-control" value="{{ $nurse->condition_type }}" id="condition_type" placeholder="Condition Type">
                                @error('condition_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label name="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $nurse->first_name }}" id="first_name" placeholder="First Name">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label name="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $nurse->last_name }}" id="last_name" placeholder="Last Name">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label name="age" class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" value="{{ $nurse->age }}" id="age" placeholder="Age">
                                @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label name="height" class="form-label">Height (cm)</label>
                                <input type="number" name="height" class="form-control" value="{{ $nurse->height }}" id="height" placeholder="Height">
                                @error('height') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label name="weight" class="form-label">Weight (kg)</label>
                                <input type="number" name="weight" class="form-control" value="{{ $nurse->weight }}" id="weight" placeholder="Weight">
                                @error('weight') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label name="bmi" class="form-label">BMI</label>
                                <input type="text" name="bmi" class="form-control" value="{{ $nurse->bmi }}" id="bmi" placeholder="BMI" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label name="daily_activity" class="form-label">Daily Activity</label>
                                <select name="daily_activity" class="form-select" value="{{ $nurse->daily_activity }}" id="daily_activity">
                                    <option selected>Select Daily Activity</option>
                                    <option value="1">Sedentary</option>
                                    <option value="2">Lightly Active</option>
                                    <option value="3">Moderately Active</option>
                                    <option value="4">Very Active</option>
                                    <option value="5">Extra Active</option>
                                </select>
                                @error('daily_activity') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label name="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-select" value="{{ $nurse->gender }}" id="gender">
                                    <option selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label name="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" value="{{ $nurse->date_of_birth }}" id="date_of_birth">
                                @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label name="date_of_admission" class="form-label">Date of Admission</label>
                                <input type="date" name="date_of_admission" class="form-control" value="{{ $nurse->date_of_admission }}" id="date_of_admission">
                                @error('date_of_admission') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="text-end">
                            <button  type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const heightInput = document.getElementById('height');
        const weightInput = document.getElementById('weight');
        const bmiInput = document.getElementById('bmi');

        function calculateBMI() {
            const height = parseFloat(heightInput.value);
            const weight = parseFloat(weightInput.value);

            if (height > 0 && weight > 0) {
                const heightInMeters = height / 100; // Convert cm to meters
                const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(2); // Calculate BMI and format to 2 decimal places
                bmiInput.value = bmi;
            } else {
                bmiInput.value = ''; // Clear the BMI value if inputs are invalid
            }
        }

        heightInput.addEventListener('input', calculateBMI);
        weightInput.addEventListener('input', calculateBMI);
    });
</script>

</html>
</x-app-layout>
