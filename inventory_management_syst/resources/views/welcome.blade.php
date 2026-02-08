<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOUN Inventory Management System</title>
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
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Space Grotesk", system-ui, -apple-system, sans-serif;
            color: var(--ink);
            background: radial-gradient(1200px 600px at 12% -10%, #fff4dd 0%, transparent 60%),
                        radial-gradient(1000px 700px at 92% -20%, #e7f0e4 0%, transparent 55%),
                        var(--paper);
        }

        .hero {
            min-height: 100vh;
            display: grid;
            align-items: center;
            padding: 48px 6vw 64px;
            position: relative;
            overflow: hidden;
        }

        .orb {
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(242, 182, 103, 0.45) 0%, rgba(242, 182, 103, 0) 70%);
            top: -120px;
            right: -80px;
            pointer-events: none;
        }

        .ribbon {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 24px;
            background: linear-gradient(135deg, rgba(47, 92, 59, 0.18) 0%, rgba(178, 92, 47, 0.14) 100%);
            bottom: -120px;
            left: -60px;
            transform: rotate(-10deg);
            pointer-events: none;
        }

        .shell {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 36px;
            align-items: center;
            max-width: 1100px;
            margin: 0 auto;
        }

        .title {
            font-family: "Playfair Display", serif;
            font-size: clamp(34px, 4vw, 52px);
            margin: 0 0 12px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.7;
            margin: 0 0 26px;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fffdf9;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 18px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fffdf9;
            text-decoration: none;
            color: var(--ink);
            font-weight: 600;
        }

        .btn.primary {
            background: var(--moss);
            color: #fffdf9;
            border-color: var(--moss);
        }

        .btn.ghost {
            background: transparent;
            border: 1px dashed var(--line);
            color: var(--muted);
        }

        .panel {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 20px 40px rgba(31, 24, 18, 0.1);
            display: grid;
            gap: 18px;
        }

        .panel h2 {
            font-family: "Playfair Display", serif;
            margin: 0;
            font-size: 22px;
        }

        .panel p {
            color: var(--muted);
            margin: 0;
        }

        .list {
            display: grid;
            gap: 12px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .list li {
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--line);
            background: #ffffff;
        }

        .list strong {
            display: block;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .list span {
            font-size: 13px;
            color: var(--muted);
        }

        .link-row {
            display: grid;
            gap: 10px;
        }

        @media (max-width: 720px) {
            .hero { padding: 36px 6vw 54px; }
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="orb"></div>
        <div class="ribbon"></div>
        <div class="shell">
            <section>
                <span class="tag">NOUN IMS</span>
                <h1 class="title">Inventory management built for clarity.</h1>
                <p class="subtitle">Track items, manage requests, and keep approvals moving with a focused, elegant workflow for staff and administrators.</p>
                <div class="actions">
                    <a class="btn primary" href="{{ url('/login') }}">Staff login</a>
                    <a class="btn" href="{{ url('/register') }}">Staff register</a>
                    <a class="btn" href="{{ url('/adminLogin') }}">Admin login</a>
                    <a class="btn ghost" href="{{ url('/adminRegister') }}">Admin register</a>
                </div>
            </section>

            <section class="panel">
                <h2>What you can do</h2>
                <p>Organize stock, respond to requests, and maintain audit-ready records.</p>
                <ul class="list">
                    <li>
                        <strong>Request flow tracking</strong>
                        <span>Monitor status from submission to approval.</span>
                    </li>
                    <li>
                        <strong>Inventory visibility</strong>
                        <span>Keep a live view of quantities and alerts.</span>
                    </li>
                    <li>
                        <strong>Admin oversight</strong>
                        <span>Centralized controls for users and reports.</span>
                    </li>
                </ul>
                <div class="link-row">
                    <a class="btn" href="{{ url('/dashboard') }}">Go to dashboard</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
