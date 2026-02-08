<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register - NOUN IMS</title>
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
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 32px 16px;
        }

        .register-shell {
            width: min(980px, 100%);
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 24px;
        }

        .panel {
            background: #fffdf9;
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 20px 40px rgba(31, 24, 18, 0.1);
        }

        .hero {
            display: grid;
            gap: 16px;
            align-content: center;
            background: linear-gradient(135deg, #1c1b1a 0%, #2f5c3b 55%, #b25c2f 100%);
            color: #f6efe6;
            border: none;
        }

        .hero h1 {
            font-family: "Playfair Display", serif;
            font-size: 34px;
            margin: 0;
        }

        .hero p {
            color: #e3ddd4;
            margin: 0;
        }

        .hero ul {
            margin: 0;
            padding-left: 18px;
            color: #e3ddd4;
            font-size: 14px;
            display: grid;
            gap: 6px;
        }

        .login h2 {
            font-family: "Playfair Display", serif;
            font-size: 26px;
            margin: 0 0 8px;
        }

        .login p {
            margin: 0 0 24px;
            color: var(--muted);
        }

        .field {
            display: grid;
            gap: 8px;
            margin-bottom: 18px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--line);
            background: #fff;
            font-family: inherit;
        }

        .error {
            color: #b33c34;
            font-size: 13px;
        }

        .btn {
            width: 100%;
            border: none;
            padding: 12px 16px;
            border-radius: 999px;
            font-weight: 600;
            background: var(--moss);
            color: #fffdf9;
            cursor: pointer;
        }

        .links {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 18px;
            font-size: 13px;
        }

        .links a {
            color: var(--accent);
            text-decoration: none;
        }

        .top-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 16px;
        }

        @media (max-width: 900px) {
            .register-shell { grid-template-columns: 1fr; }
            .hero { min-height: 180px; }
        }
    </style>
</head>
<body>
    <div class="register-shell">
        <section class="panel login">
            <a class="top-link" href="/adminLogin">Already have an account? Login</a>
            <h2>Create admin account</h2>
            <p>Set up your administrator profile for inventory control.</p>

            <form action="{{ route('adminRegister.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="John Doe" value="{{ old('name') }}" required>
                </div>

                <div class="field">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="staff@noun.edu.ng" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="staff_id">Staff ID</label>
                    <input type="text" name="staff_id" id="staff_id" placeholder="123456" value="{{ old('staff_id') }}" required>
                </div>

                <div class="field">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" value="admin" readonly required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="********" required>
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required>
                </div>

                <button type="submit" class="btn">Register</button>
            </form>

            <div class="links">
                <span>Need a staff account?</span>
                <a href="/login">Staff login</a>
            </div>
        </section>

        <section class="panel hero">
            <h1>NOUN Inventory</h1>
            <p>Keep procurement and approvals in sync with clear admin oversight.</p>
            <ul>
                <li>Track request lifecycles and approvals.</li>
                <li>Manage stock counts and low inventory alerts.</li>
                <li>Generate audit-ready reports in minutes.</li>
            </ul>
        </section>
    </div>
</body>
</html>
