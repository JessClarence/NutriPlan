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
            background-color: #f5f6fa;
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

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: left;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
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
            <a href="create">Nurse Assessment</a>
            <h5>Others</h5>
            <a href="show" class="active">Patient Records</a>
            <a href="#">Settings</a>
            <a href="#">Logout</a>
        </div>
        <!-- Main Content -->
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="topbar mb-4">
                        <div class="search-bar">
                            <input type="text" placeholder="Search...">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h2>Patient Records</h2>
                        <a href="create" class="btn btn-primary mb-2">Add Patient</a>
                    </div>
                    <p>List of Patients</p>

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Patient Table -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Health Information</th>
                                <th>Gender</th>
                                <th>Date of Admission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nurses as $nurse)
                            <tr>
                                <td>{{ $nurse->id }}</td>
                                <td>{{ $nurse->first_name }} {{ $nurse->last_name }}</td>
                                <td>{{ $nurse->condition_type }}</td>
                                <td>{{ ucfirst($nurse->gender) }}</td>
                                <td>{{ $nurse->date_of_admission }}</td>
                                <td>
                                    <button href="#" class="btn btn-info btn-sm">View</button>
                                    <a href="{{ route('nurse.edit', $nurse) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('nurse.destroy', $nurse) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <!-- Add pagination links here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</x-app-layout>
