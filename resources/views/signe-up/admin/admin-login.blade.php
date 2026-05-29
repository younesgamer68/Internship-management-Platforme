<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 100%);
            min-height: 100vh;
            color: #111827;
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
            padding: 24px;
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: 8px;
            color: #111827;
        }

        .sub {
            font-size: 0.92rem;
            color: #6b7280;
            margin-bottom: 18px;
            line-height: 1.5;
        }

        .field {
            margin-bottom: 14px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #d1d5db;
            border-radius: 10px;
            outline: none;
            font-size: 0.95rem;
        }

        input:focus {
            border-color: #2ab5b0;
            box-shadow: 0 0 0 3px rgba(42, 181, 176, 0.14);
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #111827;
            color: #fff;
            padding: 12px 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 4px;
        }

        .btn:hover {
            background: #0b1220;
        }

        .hint {
            margin-top: 14px;
            font-size: 0.82rem;
            color: #4b5563;
            background: #f9fafb;
            border: 1px dashed #d1d5db;
            border-radius: 10px;
            padding: 10px 12px;
            line-height: 1.5;
        }

        .error {
            margin-bottom: 12px;
            color: #b91c1c;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 0.88rem;
        }

        .back {
            display: inline-block;
            margin-top: 14px;
            color: #374151;
            text-decoration: underline;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Admin Login</h1>
        <p class="sub">Sign in with your admin account to open the dashboard.</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.attempt') }}">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', 'admin@internlink.test') }}"
                    required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" value="AdminPass123!" required>
            </div>

            <button class="btn" type="submit">Log in as admin</button>
        </form>

        <div class="hint">
            Demo credentials:<br>
            admin@internlink.test<br>
            AdminPass123!
        </div>

        <a class="back" href="{{ route('choose_path') }}">Back to Choose Path</a>
    </div>
</body>

</html>