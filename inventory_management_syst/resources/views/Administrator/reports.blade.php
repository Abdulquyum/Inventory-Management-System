<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - NOUN IMS</title>
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

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 18px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.08);
            position: relative;
            overflow: hidden;
            animation: rise 0.6s ease both;
        }

        .stat::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(178, 92, 47, 0.08) 100%);
            opacity: 0.7;
            pointer-events: none;
        }

        .stat-label {
            font-size: 13px;
            color: var(--muted);
        }

        .stat-value {
            font-size: 28px;
            font-weight: 600;
            margin: 6px 0 0;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            background: #eef3ea;
            color: var(--moss);
            margin-top: 8px;
        }

        .pill.warn { background: #f8efe2; color: var(--warn); }
        .pill.danger { background: #f6e4e2; color: var(--danger); }

        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 22px;
        }

        .card {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.08);
        }

        .card h2 {
            font-family: "Playfair Display", serif;
            font-size: 22px;
            margin: 0 0 14px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table th,
        .table td {
            text-align: left;
            padding: 10px 8px;
            border-bottom: 1px solid var(--line);
        }

        .table th {
            font-size: 12px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .table tr:hover td {
            background: #fbf7f0;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge.pending { background: #f8efe2; color: var(--warn); }
        .badge.done { background: #e7efe5; color: var(--moss); }
        .badge.info { background: #e4edf4; color: #2f5d7a; }

        @keyframes rise {
            from { transform: translateY(12px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
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
                <a href="/reports" class="active">Reports</a>
                <a href="/users">Users</a>
                <a>
                    <form action="/adminLogout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-light px-3 py-2">Logout</button>
                    </form>
                </a>
            </nav>
        </aside>

        <main class="content">
            <section class="page-header">
                <div>
                    <h1 class="title">System Reports</h1>
                    <p class="subtitle">Overview of inventory activity, requests, and system performance.</p>
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

            <section class="stats">
                <div class="stat">
                    <div class="stat-label">Total Requests</div>
                    <div class="stat-value">328</div>
                    <div class="pill">This month</div>
                </div>
                <div class="stat" style="animation-delay: 0.05s;">
                    <div class="stat-label">Fulfilled Orders</div>
                    <div class="stat-value">245</div>
                    <div class="pill">74.7% rate</div>
                </div>
                <div class="stat" style="animation-delay: 0.1s;">
                    <div class="stat-label">Average Processing Time</div>
                    <div class="stat-value">2.3 days</div>
                    <div class="pill info">On track</div>
                </div>
            </section>

            <section class="grid">
                <div class="card">
                    <h2>Request Performance</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Total Requests</th>
                                <th>Approved</th>
                                <th>Declined</th>
                                <th>Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January 2026</td>
                                <td>124</td>
                                <td><span class="badge done">98</span></td>
                                <td>12</td>
                                <td><span class="badge pending">14</span></td>
                            </tr>
                            <tr>
                                <td>February 2026</td>
                                <td>156</td>
                                <td><span class="badge done">127</span></td>
                                <td>18</td>
                                <td><span class="badge pending">11</span></td>
                            </tr>
                            <tr>
                                <td>March 2026</td>
                                <td>89</td>
                                <td><span class="badge done">71</span></td>
                                <td>10</td>
                                <td><span class="badge pending">8</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card">
                    <h2>Inventory Status Report</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Total Items</th>
                                <th>In Stock</th>
                                <th>Low Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Electronics</td>
                                <td>340</td>
                                <td>285</td>
                                <td>55</td>
                                <td><span class="badge warn">Attention needed</span></td>
                            </tr>
                            <tr>
                                <td>Furniture</td>
                                <td>156</td>
                                <td>142</td>
                                <td>14</td>
                                <td><span class="badge done">Healthy</span></td>
                            </tr>
                            <tr>
                                <td>Stationery</td>
                                <td>890</td>
                                <td>756</td>
                                <td>134</td>
                                <td><span class="badge pending">Monitor</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
