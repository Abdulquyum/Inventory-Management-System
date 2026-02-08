<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - NOUN IMS</title>
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

        .grid {
            display: grid;
            grid-template-columns: 1fr 280px;
            gap: 22px;
        }

        .card {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.08);
        }

        .profile-head {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2f5c3b, #b25c2f);
        }

        .name {
            font-size: 22px;
            font-weight: 600;
            margin: 0;
        }

        .role {
            font-size: 13px;
            color: var(--muted);
        }

        .detail-list {
            display: grid;
            gap: 12px;
        }

        .detail {
            display: grid;
            gap: 4px;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--line);
            background: #ffffff;
        }

        .detail span {
            font-size: 12px;
            color: var(--muted);
        }

        .detail strong {
            font-weight: 600;
        }

        .actions {
            display: grid;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 16px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fffdf9;
            font-weight: 600;
            color: var(--ink);
            text-decoration: none;
        }

        .btn.primary {
            background: var(--moss);
            color: #fffdf9;
            border-color: var(--moss);
        }

        .note {
            font-size: 13px;
            color: var(--muted);
            margin-top: 16px;
        }

        @media (max-width: 980px) {
            .shell { grid-template-columns: 1fr; }
            .content { padding: 28px 20px 50px; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .grid { grid-template-columns: 1fr; }
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
                <a href="/adminRequests">Requests</a>
                <!-- <a href="#">Reports</a> -->
                <a href="/users">Users</a>
                <a href="/profile" class="active">Profile</a>
                <a><form action="/adminLogout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Logout</button>
                </form></a>
            </nav>
        </aside>

        <main class="content">
            <section class="page-header">
                <div>
                    <h1 class="title">Profile</h1>
                    <p class="subtitle">Manage your administrator details and access.</p>
                </div>
            </section>

            <section class="grid">
                <div class="card">
                    <div class="profile-head">
                        <div class="avatar"></div>
                        <div>
                            <p class="name">{{ $user->name }}</p>
                            <div class="role">Administrator</div>
                        </div>
                    </div>

                    <div class="detail-list">
                        <div class="detail">
                            <span>Staff ID</span>
                            <strong>{{ $user->staff_id }}</strong>
                        </div>
                        <div class="detail">
                            <span>Email Address</span>
                            <strong>{{ $user->email }}</strong>
                        </div>
                        <div class="detail">
                            <span>Account ID</span>
                            <strong>{{ $user->id }}</strong>
                        </div>
                    </div>
                    <p class="note">For security reasons, your password is never displayed.</p>
                </div>

                <aside class="card">
                    <div class="actions">
                        <a href="#" class="btn primary">Edit profile</a>
                        <a href="#" class="btn">Change password</a>
                        <a href="/adminDashboard" class="btn">Back to dashboard</a>
                    </div>
                </aside>
            </section>
        </main>
    </div>
</body>
</html>
