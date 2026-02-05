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
                <a href="/admin"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="/inventory" class="active"><i class="fas fa-box me-2"></i> Inventory</a>
                <a href="/requests"><i class="fas fa-clipboard-list me-2"></i> Requests</a>
                <a href="#"><i class="fas fa-chart-bar me-2"></i> Reports</a>
                <a href="/users"><i class="fas fa-users me-2"></i> Users</a>
                <a href="/logout" class="mt-5"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </nav>
        </div>

        <div class="col-md-10 bg-light p-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Inventory Items</h4>
    <a href="/items/add">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal">
            <i class="fas fa-plus"></i> Add New Item
        </button>
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Amount (#)</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#001</td>
                    <td>Dell Latitude Laptop</td>
                    <td>Electronics</td>
                    <td>12</td>
                    <td><span class="badge bg-success">In Stock</span></td>
                    <td>
                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->quantity}}</td>
                    @if($item->quantity > 4)
                    <td><span class="badge bg-success">In stock</span></td>
                    @else
                    <td><span class="badge bg-danger">Low stock</span></td>
                    @endif
                    <td>
                        <a href="/items/{{$item->id}}/edit"><button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button></a>
                        <form action="items/destroy/{{$item->id}}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addItemModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Inventory Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" placeholder="e.g. Office Chair">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Electronics</option>
                            <option>Stationery</option>
                            <option>Furniture</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Initial Quantity</label>
                        <input type="number" class="form-control" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (Optional)</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Save Item</button>
                </form>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

</body>
</html>