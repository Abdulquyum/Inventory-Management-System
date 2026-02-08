<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Request - NOUN IMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #1f1b17;
            --muted: #6e6a64;
            --paper: #f6f0e6;
            --moss: #2f5c3b;
            --olive: #4b6a41;
            --sand: #eadfcf;
            --line: #d8cbbb;
            --accent: #b25c2f;
            --sun: #f2b667;
            --warn: #d67c2f;
            --danger: #b33c34;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Space Grotesk", system-ui, -apple-system, sans-serif;
            color: var(--ink);
            background: radial-gradient(1200px 600px at 10% -10%, #fff4dd 0%, transparent 60%),
                        radial-gradient(1000px 700px at 90% -20%, #e7f0e4 0%, transparent 55%),
                        var(--paper);
        }

        .shell {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 260px 1fr;
        }

        .sidebar {
            padding: 28px 22px;
            background: linear-gradient(180deg, #1c1b1a 0%, #2b2621 100%);
            color: #f2ede6;
        }

        .brand {
            font-family: "Playfair Display", serif;
            font-size: 22px;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .brand-sub {
            color: #c7c1b8;
            font-size: 13px;
        }

        .nav {
            margin-top: 28px;
            display: grid;
            gap: 8px;
        }

        .nav a {
            color: #e6e1da;
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.03);
        }

        .nav a.active {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .nav a.logout {
            border: 1px solid rgba(255, 255, 255, 0.16);
        }

        .content {
            padding: 36px 40px 60px;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }

        .title {
            font-family: "Playfair Display", serif;
            font-size: 34px;
            margin: 0;
        }

        .subtitle {
            margin: 8px 0 0;
            color: var(--muted);
        }

        .profile {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 999px;
            box-shadow: 0 12px 24px rgba(31, 24, 18, 0.08);
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2f5c3b, #b25c2f);
        }

        .profile button {
            border: none;
            background: transparent;
            font-family: inherit;
            font-weight: 600;
            color: var(--ink);
            cursor: pointer;
        }

        .actions {
            position: relative;
        }

        .menu {
            position: absolute;
            right: 0;
            top: 48px;
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.1);
            padding: 6px;
            min-width: 160px;
            display: none;
        }

        .actions:focus-within .menu {
            display: block;
        }

        .menu a,
        .menu button {
            display: block;
            width: 100%;
            text-align: left;
            border: none;
            background: transparent;
            padding: 8px 10px;
            border-radius: 8px;
            font-family: inherit;
            cursor: pointer;
            color: var(--ink);
            text-decoration: none;
        }

        .card {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.08);
            max-width: 760px;
        }

        .card h2 {
            font-family: "Playfair Display", serif;
            font-size: 22px;
            margin: 0 0 16px;
        }

        .card p {
            color: var(--muted);
            margin: 0 0 20px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .btn {
            border: 1px solid transparent;
            border-radius: 12px;
            padding: 10px 16px;
            font-family: inherit;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .actions-row {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-secondary {
            background: #f5efe6;
            color: var(--ink);
            border-color: #eadfcf;
        }

        .btn-secondary:hover {
            background: #eadfcf;
        }

        .btn-accent {
            background: var(--moss);
            color: #fffdf9;
            border-color: rgba(31, 24, 18, 0.2);
            box-shadow: 0 12px 20px rgba(31, 24, 18, 0.12);
        }

        .btn-accent:hover {
            background: #28492d;
        }

        .request-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }

        .detail-item {
            padding: 14px;
            background: #fbf7f1;
            border: 1px solid #f0e8dd;
            border-radius: 12px;
        }

        .detail-label {
            font-size: 12px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 15px;
            font-weight: 600;
            color: var(--ink);
        }

        @media (max-width: 980px) {
            .shell { grid-template-columns: 1fr; }
            .content { padding: 28px 20px 50px; }
            .page-header { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
    <div class="shell">
        <aside class="sidebar">
            <div class="brand">NOUN IMS</div>
            <div class="brand-sub">Administration Console</div>
            <nav class="nav">
                <a href="/adminDashboard">Dashboard</a>
                <a href="/adminInventory">Inventory</a>
                <a href="/adminRequests" class="active">Requests</a>
                <a href="/reports">Reports</a>
                <a href="/users">Users</a>
                <a href="/logout" class="logout">Logout</a>
            </nav>
        </aside>

        <main class="content">
            <section class="page-header">
                <div>
                    <h1 class="title">Review Request</h1>
                    <p class="subtitle">Process and manage inventory request.</p>
                </div>
                <div class="profile actions" tabindex="0">
                    <div class="avatar"></div>
                    <button type="button">Admin User</button>
                    <div class="menu">
                        <a href="{{ route('adminProfile') }}">Profile</a>
                        <form action="{{ route('adminLogout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </section>

            <div class="card">
                <h2>Request Details</h2>
                <div class="request-details">
                    <div class="detail-item">
                        <div class="detail-label">Requester</div>
                        <div class="detail-value">{{ $request->requester_name ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Department</div>
                        <div class="detail-value">{{ $request->department ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Item</div>
                        <div class="detail-value">{{ $request->item ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Quantity</div>
                        <div class="detail-value">{{ $request->quantity ?? 0 }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Requested Date</div>
                        <div class="detail-value">{{ $request->created_at->format('M d, Y') ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value" style="color: {{ $request->status === 'pending' ? 'var(--warn)' : ($request->status === 'approved' ? 'var(--moss)' : 'var(--danger)') }}">{{ ucfirst($request->status) }}</div>
                    </div>
                </div>

                @if($request->purpose)
                    <div style="margin-bottom: 20px;">
                        <strong>Purpose / Reason:</strong>
                        <p style="background: #fbf7f1; padding: 12px; border-radius: 8px; margin: 8px 0; color: var(--muted);">{{ $request->purpose }}</p>
                    </div>
                @endif

                @if($request->status === 'pending')
                    <form method="POST" action="{{ route('requests.approve', $request->id) }}" class="form-grid">
                        @csrf
                        @method('PATCH')
                        <p style="font-size: 14px; color: var(--muted); text-align: center;">Are you sure you want to approve this request?</p>
                        <div class="actions-row">
                            <a href="{{ route('requests.index') ?? '/adminRequests' }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-accent">Approve Request</button>
                        </div>
                    </form>
                @elseif($request->status === 'approved')
                    <div style="padding: 16px; background: #e7efe5; border: 1px solid #d7e5d8; border-radius: 12px; color: var(--moss); text-align: center;">
                        ✓ This request has been approved.
                    </div>
                @else
                    <div style="padding: 16px; background: #f6e4e2; border: 1px solid #f0d2ce; border-radius: 12px; color: var(--danger); text-align: center;">
                        This request has been declined.
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>