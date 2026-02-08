<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests - NOUN IMS</title>
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

        .actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fffdf9;
            color: var(--ink);
            text-decoration: none;
            font-weight: 600;
        }

        .btn.primary {
            background: var(--moss);
            border-color: var(--moss);
            color: #fffdf9;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 18px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.08);
        }

        .stat-label {
            font-size: 13px;
            color: var(--muted);
        }

        .stat-value {
            font-size: 26px;
            font-weight: 600;
            margin-top: 6px;
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

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            background: #e7efe5;
            color: var(--moss);
        }

        .badge.pending { background: #f8efe2; color: var(--warn); }
        .badge.rejected { background: #f6e4e2; color: var(--danger); }

        .empty {
            padding: 18px;
            border: 1px dashed var(--line);
            border-radius: 12px;
            color: var(--muted);
        }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            padding: 0;
            background: #f6e4e2;
            color: var(--danger);
            border: 1px solid #f0d2ce;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-delete:hover {
            background: #f0d2ce;
        }

        .actions-cell {
            display: flex;
            gap: 8px;
            align-items: center;
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
                <!-- <a href="/reports">Reports</a> -->
                <a href="/users">Users</a>
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
                    <h1 class="title">Requests</h1>
                    <p class="subtitle">Monitor, review, and resolve inventory requests.</p>
                </div>
                <div class="actions">
                    <a href="/requests" class="btn">Request item</a>
                    <a href="/adminRequests" class="btn primary">Refresh list</a>
                </div>
            </section>

            <section class="stats">
                <div class="stat">
                    <div class="stat-label">Total Requests</div>
                    <div class="stat-value">{{ $requested_info->count() }}</div>
                </div>
                <div class="stat">
                    <div class="stat-label">Pending</div>
                    <div class="stat-value">{{ $requested_info->where('status', 'pending')->count() }}</div>
                </div>
                <div class="stat">
                    <div class="stat-label">Approved</div>
                    <div class="stat-value">{{ $requested_info->where('status', 'approved')->count() }}</div>
                </div>
            </section>

            <section class="card">
                <h2>Recent Requests</h2>
                @forelse($requested_info as $request)
                    @if ($loop->first)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Requester</th>
                                    <th>Department</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Purpose</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif
                                <tr>
                                    <td>{{ $request->requester_name }}</td>
                                    <td>{{ $request->department }}</td>
                                    <td>{{ $request->item }}</td>
                                    <td>{{ $request->quantity }}</td>
                                    <td>{{ $request->created_at->format('M d, Y') }}</td>
                                    <td>{{ $request->purpose }}</td>
                                    <td>
                                        <div class="actions-cell">
                                            <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-outline-light px-3 py-1">
                                                <span class="badge {{ $request->status }}">
                                                    {{ ucfirst($request->status) }}
                                                </span>
                                            </a>
                                            <form action="/adminRequests/{{ $request->id }}/destroy" method="POST" style="display: inline;" onsubmit="return confirm('Delete this request?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete" title="Delete request">🗑</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                    @if ($loop->last)
                            </tbody>
                        </table>
                    @endif
                @empty
                    <div class="empty">No requests submitted yet.</div>
                @endforelse
            </section>
        </main>
    </div>
</body>
</html>
