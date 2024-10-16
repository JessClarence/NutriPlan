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
        
        .actions {
            display: flex;
            gap: 10px;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f6fa;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
        }

        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .container {
            width: 100%;
            margin: 0 auto;
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

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .table th {
            background-color: #007bff;
            color: white;
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

        .card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 10px;
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

        .wrapper {
            display: flex;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Dietitian Module</h2>
            <p></p>
            <h5>Menu</h5>
            <a href="/dietitian" >Dashboard</a>
            <a href="../show">Dietitian</a>
            <a href="../create">Calculation</a>
            <a href="#">Meal Plan</a>
            <a href="" class="active">Inventory</a>
            <a href="#">Nutrition Analysis</a>
            <h5>Others</h5>
            <a href="edit" >Patient Records</a>
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
                </div>
                <div class="d-flex justify-content-between">
                    <h2>Inventory</h2>
                    <a href="" class="btn btn-primary mb-2">Add Item</a>
                </div>
                <p> Kitchen Inventory </p>

                <!-- Inventory Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Expiration Date</th>
                            <th>Days Left</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cupboard</td>
                            <td>Canned Goods</td>
                            <td>Tomato Paste</td>
                            <td>2</td>
                            <td>25 Dec 2024</td>
                            <td>177</td>
                            <td>
                                <div class="actions">
                                    <button class="btn-edit">✏️</button>
                                    <button class="btn-delete">🗑️</button>
                                </div>         
                            </td>
                         </tr>
                    </tbody>   
                            {{-- <tbody>
                                @foreach ($inventory as $item)
                                <tr>
                                    <td>{{ $item['location'] }}</td>
                                    <td>{{ $item['category'] }}</td>
                                    <td>{{ $item['item'] }}</td>
                                    <td>{{ $item['qty'] }}</td>
                                    <td>{{ $item['expiration'] }}</td>
                                    <td>{{ $item['days_left'] }}</td>
                                    <td>
                                         <div class="actions">
                                            <button class="btn-edit">✏️</button>
                                            <button class="btn-delete">🗑️</button>
                                        </div>         
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>    --}}
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
    </div>
</body>
</html>
</x-app-layout>
