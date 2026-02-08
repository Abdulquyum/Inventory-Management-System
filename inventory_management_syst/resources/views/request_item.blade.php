<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Item - NOUN IMS</title>
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

        .card {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 18px 30px rgba(31, 24, 18, 0.08);
            max-width: 860px;
        }

        .card h2 {
            font-family: "Playfair Display", serif;
            font-size: 22px;
            margin: 0 0 16px;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .row {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .field label {
            display: block;
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 10px 12px;
            font-family: inherit;
            background: #fffdf9;
            color: var(--ink);
        }

        .field textarea { resize: vertical; min-height: 120px; }

        .help {
            font-size: 12px;
            color: var(--muted);
            margin-top: 6px;
        }

        .alert {
            border: 1px solid #f0d2ce;
            background: #fdf1ef;
            color: #7b2a25;
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 20px;
        }

        .alert ul { margin: 0; padding-left: 18px; }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
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

        .btn-secondary {
            background: #f5efe6;
            color: var(--ink);
            border-color: #eadfcf;
        }

        .btn-accent {
            background: var(--moss);
            color: #fffdf9;
            border-color: rgba(31, 24, 18, 0.2);
            box-shadow: 0 12px 20px rgba(31, 24, 18, 0.12);
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
            <div class="brand-sub">Staff Panel</div>
            <nav class="nav">
                @if(Auth::user())
                    <a href="/dashboard" class="active">Dashboard</a>
                @else
                    <a href="/adminDashboard" class="active">Dashboard</a>
                @endif
                <a href="/items">Inventory</a>
                <a href="/requests" class="active">Requests</a>
                
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <button class="btn btn-secondary" type="submit">Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            <section class="page-header">
                <div>
                    <h1 class="title">Request Inventory Item</h1>
                    <p class="subtitle">Submit a new inventory request for approval.</p>
                </div>
            </section>

            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <h2>Request Details</h2>
                <form method="POST" action="{{ route('requests.store') }}" class="form-grid">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="field">
                            <label>Requester Name</label>
                            <input type="text" name="requester_name" placeholder="Dr. A. Ibrahim" required>
                        </div>
                        <div class="field">
                            <label>Department</label>
                            <input type="text" name="department" placeholder="Computer Science" required>
                        </div>
                    </div>

                    <div class="field">
                        <label>Select Item</label>
                        <select name="item" required>
                            <option selected>Choose item...</option>
                            @foreach($items as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Quantity Needed</label>
                        <input type="number" name="quantity" min="1" max="10">
                        <div class="help">Max request limit: 10 units</div>
                    </div>

                    @error('quantity')
                        <div class="alert">{{ $message }}</div>
                    @enderror

                    <div class="field">
                        <label>Purpose / Reason</label>
                        <textarea name="purpose" placeholder="e.g. For upcoming exams..."></textarea>
                    </div>

                    <div class="actions">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-accent">Submit Request</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
