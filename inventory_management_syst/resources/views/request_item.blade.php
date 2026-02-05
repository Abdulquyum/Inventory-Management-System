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
                <a href="/dashboard"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="/items"><i class="fas fa-box me-2"></i> Inventory</a>
                <a href="/requests" class="active"><i class="fas fa-clipboard-list me-2"></i> Requests</a>
                <a href="#"><i class="fas fa-chart-bar me-2"></i> Reports</a>
                <a href="#"><i class="fas fa-users me-2"></i> Users</a>
                <a href="/logout" class="mt-5"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </nav>
        </div>
        <div class="col-md-10 bg-light p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Request Inventory Item</h4>
            </div>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Request Inventory Item</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Staff Name</label>
                                <input type="text" class="form-control" value="Dr. A. Ibrahim" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Department</label>
                                <input type="text" class="form-control" value="Computer Science" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Item</label>
                            <select class="form-select">
                                <option selected>Choose item...</option>
                                <option value="1">A4 Paper Reams</option>
                                <option value="2">Whiteboard Markers</option>
                                <option value="3">Extension Socket</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantity Needed</label>
                            <input type="number" class="form-control" min="1" max="10">
                            <small class="text-muted">Max request limit: 10 units</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Purpose / Reason</label>
                            <textarea class="form-control" rows="3" placeholder="e.g. For upcoming exams..."></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
</body>
</html>
