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

        .chart {
            height: 300px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .dashboard-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            flex: 1;
            min-width: 200px;
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
            <a href="/nurse" class="active">Dashboard</a>
            <a href="nurse/create">Nurse Assessment</a>
            <h5>Others</h5>
            <a href="nurse/show">Patient Records</a>
            <a href="#">Settings</a>
            <a href="#">Logout</a>
        </div>
        <div class="dashboard-cards">
            @yield('content')
        </div>
        <!-- Main Content -->
        <div class="content">
            <div class="col-md-9">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
</body>
</html>
</x-app-layout>
