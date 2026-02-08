<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Inventory Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #1c1b1a;
            --muted: #6b6a68;
            --paper: #f7f2ea;
            --moss: #2e5a3c;
            --olive: #4a6a43;
            --sand: #e9dfd2;
            --line: #d6cbbd;
            --accent: #b25c2f;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Space Grotesk", system-ui, -apple-system, sans-serif;
            color: var(--ink);
            background: radial-gradient(1200px 600px at 15% -10%, #fff4dd 0%, transparent 60%),
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

        .page-title {
            font-family: "Playfair Display", serif;
            font-size: 34px;
            margin: 0;
        }

        .page-sub {
            margin: 8px 0 0;
            color: var(--muted);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 180px));
            gap: 12px;
        }

        .stat {
            background: var(--sand);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 12px 14px;
            text-align: right;
        }

        .stat-label {
            font-size: 12px;
            color: var(--muted);
        }

        .stat-value {
            font-size: 22px;
            font-weight: 600;
            color: var(--olive);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 22px;
        }

        .card {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.08);
            position: relative;
            overflow: hidden;
        }

        .card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(178, 92, 47, 0.08) 100%);
            opacity: 0.7;
            pointer-events: none;
        }

        .card h2 {
            font-family: "Playfair Display", serif;
            font-size: 22px;
            margin: 0 0 12px;
        }

        .list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 10px;
        }

        .list-item {
            display: grid;
            gap: 4px;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--line);
            background: #ffffff;
        }

        .name {
            font-weight: 600;
        }

        .meta {
            font-size: 13px;
            color: var(--muted);
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            background: #e7efe5;
            color: var(--moss);
        }

        .tag.admin { background: #f5e9df; color: var(--accent); }

        .empty {
            padding: 18px;
            border: 1px dashed var(--line);
            border-radius: 12px;
            color: var(--muted);
        }

        @media (max-width: 900px) {
            .shell { grid-template-columns: 1fr; }
            .sidebar { border-bottom: 1px solid rgba(255, 255, 255, 0.12); }
            .content { padding: 28px 20px 50px; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .stats { grid-template-columns: repeat(2, minmax(0, 140px)); }
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
                <a href="/items">Inventory</a>
                <a href="/adminRequests">Requests</a>
                <!-- <a href="/reports">Reports</a> -->
                <a href="/users" class="active">Users</a>
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
                    <h1 class="page-title">Users</h1>
                    <p class="page-sub">Manage administrators and staff accounts in one place.</p>
                </div>
                <div class="stats">
                    <div class="stat">
                        <div class="stat-label">Administrators</div>
                        <div class="stat-value">{{ $administrators->count() }}</div>
                    </div>
                    <div class="stat">
                        <div class="stat-label">Staff</div>
                        <div class="stat-value">{{ $users->count() }}</div>
                    </div>
                </div>
            </section>

            <section class="grid">
                <div class="card">
                    <h2>Administrators</h2>
                    <ul class="list">
                        @forelse($administrators as $administrator)
                            <li class="list-item">
                                <div class="name">{{ $administrator->name }}</div>
                                <div class="meta">{{ $administrator->email }} | Staff ID: {{ $administrator->staff_id }}</div>
                                <span class="tag admin">Admin</span>
                            </li>
                        @empty
                            <li class="empty">No administrators available yet.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="card">
                    <h2>Staff Accounts</h2>
                    <ul class="list">
                        @forelse($users as $user)
                            <li class="list-item">
                                <div class="name">{{ $user->name }}</div>
                                <div class="meta">{{ $user->email }}</div>
                                <span class="tag">Staff</span>
                            </li>
                        @empty
                            <li class="empty">No staff accounts available yet.</li>
                        @endforelse
                    </ul>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
