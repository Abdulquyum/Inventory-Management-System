<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - NOUN Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar { min-height: 100vh; background-color: #006837; color: white; }
        .sidebar a { color: rgba(255,255,255,0.8); text-decoration: none; padding: 10px 20px; display: block; }
        .sidebar a:hover, .sidebar a.active { background-color: #004d29; color: white; border-left: 4px solid #fff; }
        .stat-card { border-left: 4px solid #006837; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <div class="p-4 text-center border-bottom border-secondary">
                <h5 class="fw-bold">NOUN IMS</h5>
                <small>Admin Panel</small>
            </div>
            <nav class="mt-3">
                <a href="/dashboard" class="active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="/items"><i class="fas fa-box me-2"></i> Inventory</a>
                <a href="/requests"><i class="fas fa-clipboard-list me-2"></i> Requests</a>
                <a href="#"><i class="fas fa-chart-bar me-2"></i> Reports</a>
                <a href="/users"><i class="fas fa-users me-2"></i> Users</a>
                <a href="/logout" class="mt-5"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </nav>
        </div>

        <div class="col-md-10 bg-light p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Dashboard Overview</h4>
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Admin User
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('adminProfile') }}">Profile</a></li>
                        <li>
                            <form action="{{ route('adminLogout') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <form action="{{ route('items.store') }}" method="post">
                @csrf
                @method('POST')
                <!-- Form fields for adding an item would go here -->
                 <label>Item Name:</label>
                 <input type="text" name="name" required><br>
                    <label>Amount:</label>
                    <input type="number" name="amount" required><br>
                    <label>Quantity:</label>
                    <input type="number" name="quantity" required><br>
                    <label>Status:</label>
                    <input type="text" name="status" value="available" required><br>
                    <button type="submit">Add Item</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>