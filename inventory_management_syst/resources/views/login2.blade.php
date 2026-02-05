<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NOUN Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { width: 100%; max-width: 400px; border: none; shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .noun-green { color: #006837; } /* NOUN Corporate Green */
        .btn-noun { background-color: #006837; color: white; }
        .btn-noun:hover { background-color: #004d29; color: white; }
    </style>
</head>
<body>

<div class="card login-card p-4">
    <div class="card-body text-center">
        <h3 class="noun-green fw-bold mb-3">NOUN Inventory</h3>
        <p class="text-muted mb-4">Sign in to your account</p>

        <form action="{{ route('AdminLogin.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="staff@noun.edu.ng" required>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="********" required>
            </div>

            <div class="mb-3 form-check text-start">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-noun py-2">Login</button>
            </div>
        </form>
        
        <div class="mt-3">
            <a href="#" class="text-decoration-none small text-muted">Forgot Password?</a>
        </div>
    </div>
</div>

</body>
</html>