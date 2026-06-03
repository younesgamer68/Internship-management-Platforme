<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background-color: #eef0f3;
            background-image:
                radial-gradient(ellipse 80% 60% at 50% 0%, rgba(16,185,129,0.07) 0%, transparent 60%),
                radial-gradient(circle, #c8cdd6 1px, transparent 1px);
            background-size: 100% 100%, 28px 28px;
        }

        .logo-wrapper {
            position: fixed;
            top: 22px;
            left: 26px;
            z-index: 10;
        }

        /* ── Card ── */
        .card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 448px;
            background: #ffffff;
            border-radius: 28px;
            border: 1px solid rgba(0,0,0,0.06);
            box-shadow:
                0 0 0 1px rgba(16,185,129,0.04),
                0 2px 4px rgba(0,0,0,0.04),
                0 8px 24px rgba(0,0,0,0.07),
                0 32px 64px rgba(0,0,0,0.07);
            padding: 44px 44px 40px;
            animation: slideUp 0.38s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes slideUp {
            from { opacity:0; transform: translateY(18px) scale(0.98); }
            to   { opacity:1; transform: translateY(0)    scale(1);    }
        }

        /* ── Header ── */
        .card-header { text-align: center; margin-bottom: 30px; }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #0f6e56;
            margin-bottom: 12px;
        }

        .eyebrow-dot {
            width: 7px; height: 7px;
            background: #10b981;
            border-radius: 50%;
            animation: blink 2.2s ease-in-out infinite;
        }

        @keyframes blink {
            0%,100% { opacity:1; transform:scale(1); }
            50%      { opacity:0.3; transform:scale(0.7); }
        }

        h1 {
            font-size: 28px;
            font-weight: 800;
            color: #0a0f0d;
            letter-spacing: -0.7px;
            line-height: 1.2;
            margin-bottom: 9px;
        }

        .subtitle {
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.65;
        }

        /* ── Separator ── */
        .sep {
            height: 1px;
            margin: 26px 0;
            background: linear-gradient(to right, transparent, #d1fae5, #a7f3d0, #d1fae5, transparent);
        }

        /* ── Notice box ── */
        .notice {
            background: #f0fdf9;
            border: 1px solid #a7f3d0;
            border-left: 3px solid #10b981;
            border-radius: 12px;
            padding: 13px 15px;
            font-size: 13.5px;
            color: #065f46;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        /* ── Error box ── */
        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-left: 3px solid #ef4444;
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 13px;
            color: #dc2626;
            margin-bottom: 18px;
        }

        /* ── Labels ── */
        label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #374151;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        /* ── Inputs ── */
        .input-wrap {
            position: relative;
            margin-bottom: 16px;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: #0a0f0d;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
        }

        input:focus {
            background: #fff;
            border-color: #10b981;
            box-shadow: 0 0 0 3.5px rgba(16,185,129,0.15);
        }

        input::placeholder { color: #94a3b8; }

        .has-eye { padding-right: 44px; }

        .eye-btn {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #94a3b8;
            padding: 4px;
            display: flex;
            align-items: center;
            transition: color 0.15s;
        }
        .eye-btn:hover { color: #10b981; }

        /* ── Primary button ── */
        .btn-primary {
            width: 100%;
            height: 50px;
            background: #0a0f0d;
            color: #fff;
            border: none;
            border-radius: 14px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 0.01em;
            margin-top: 4px;
            transition: background 0.15s, box-shadow 0.15s, transform 0.1s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.14), 0 6px 16px rgba(10,15,13,0.2);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(16,185,129,0.15) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .btn-primary:hover { background: #1a2420; box-shadow: 0 2px 6px rgba(0,0,0,0.14), 0 10px 24px rgba(10,15,13,0.22); }
        .btn-primary:hover::after { opacity: 1; }
        .btn-primary:active { transform: scale(0.99); }

        /* ── Footer row ── */
        .footer-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .link-teal {
            font-size: 13px;
            font-weight: 600;
            color: #10b981;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            transition: color 0.15s;
        }
        .link-teal:hover { color: #059669; }

        .link-muted {
            font-size: 13px;
            color: #94a3b8;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.15s;
        }
        .link-muted:hover { color: #475569; }

        /* ── Back link ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            font-weight: 500;
            color: #94a3b8;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            margin-top: 20px;
            transition: color 0.15s;
        }
        .back-link:hover { color: #10b981; }

        /* ── Notification ── */
        #notification { border-radius: 12px; padding: 12px 14px; font-size: 13px; margin-top: 16px; }
        #notification.hidden { display: none; }
        #notification.success { background:#f0fdf9; border:1px solid #a7f3d0; border-left:3px solid #10b981; color:#065f46; }
        #notification.error   { background:#fef2f2; border:1px solid #fecaca; border-left:3px solid #ef4444; color:#dc2626; }

        /* ── Panel transitions ── */
        .panel { display: none; }
        .panel.active { display: block; animation: fadeUp 0.22s ease both; }

        @keyframes fadeUp {
            from { opacity:0; transform:translateY(6px); }
            to   { opacity:1; transform:translateY(0); }
        }
    </style>
</head>

<body>
    <div class="logo-wrapper">
        <x-logo variant="landing" size="lg" href="/" />
    </div>

    <div class="card">

        <!-- ══ LOGIN PANEL ══ -->
        <div id="login-panel" class="panel active">
            <div class="card-header">
                <div class="eyebrow"><span class="eyebrow-dot"></span> Admin access</div>
                <h1>Admin login</h1>
                <p class="subtitle">Use your admin credentials or reset the password with the secure recovery flow.</p>
            </div>
            <div class="sep"></div>

            @if ($errors->any())
                <div class="error-box">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}">
                @csrf
                <div class="input-wrap">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="admin@internlink.test" required>
                </div>
                <div class="input-wrap">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="••••••••" required class="has-eye">
                    <button type="button" class="eye-btn" data-target="password" aria-label="Toggle password">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                <button type="submit" class="btn-primary">Log in as admin</button>
            </form>

            <div class="footer-row">
                <button id="forgot-password-link" type="button" class="link-teal">Forgot password?</button>
                <a href="{{ route('choose_path') }}" class="link-muted">Back to Choose Path</a>
            </div>
        </div>

        <!-- ══ FORGOT PANEL ══ -->
        <div id="forgot-panel" class="panel">
            <div class="card-header">
                <div class="eyebrow"><span class="eyebrow-dot"></span> Admin access</div>
                <h1>Admin login</h1>
                <p class="subtitle">Use your admin credentials or reset the password with the secure recovery flow.</p>
            </div>
            <div class="sep"></div>

            <div class="notice">Enter your admin email and we will send a verification code to reset your password.</div>

            <div class="input-wrap">
                <label for="reset-email">Email</label>
                <input id="reset-email" type="email" placeholder="admin@internlink.test" required>
            </div>
            <button id="send-code-btn" type="button" class="btn-primary">Send the verification code</button>
            <button id="forgot-back" type="button" class="back-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to login
            </button>
        </div>

        <!-- ══ VERIFY PANEL ══ -->
        <div id="verify-panel" class="panel">
            <div class="card-header">
                <div class="eyebrow"><span class="eyebrow-dot"></span> Admin access</div>
                <h1>Admin login</h1>
                <p class="subtitle">Use your admin credentials or reset the password with the secure recovery flow.</p>
            </div>
            <div class="sep"></div>

            <div class="notice">Enter the 6-digit code we sent to your email. The code expires in 10 minutes.</div>

            <div class="input-wrap">
                <label for="verification-code">Verification code</label>
                <input id="verification-code" type="text" inputmode="numeric" maxlength="6" placeholder="123456" required>
            </div>
            <button id="verify-code-btn" type="button" class="btn-primary">Verify code</button>
            <button id="verify-back" type="button" class="back-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to email
            </button>
        </div>

        <!-- ══ RESET PANEL ══ -->
        <div id="reset-panel" class="panel">
            <div class="card-header">
                <div class="eyebrow"><span class="eyebrow-dot"></span> Admin access</div>
                <h1>Admin login</h1>
                <p class="subtitle">Set a new password and you will be redirected to the dashboard.</p>
            </div>
            <div class="sep"></div>

            <div class="notice">Set a new password for the admin account and you will be redirected to the dashboard.</div>

            <div class="input-wrap">
                <label for="new-password">New password</label>
                <input id="new-password" type="password" placeholder="••••••••" required class="has-eye">
                <button type="button" class="eye-btn" data-target="new-password" aria-label="Toggle">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>
            <div class="input-wrap">
                <label for="confirm-password">Confirm new password</label>
                <input id="confirm-password" type="password" placeholder="••••••••" required class="has-eye">
                <button type="button" class="eye-btn" data-target="confirm-password" aria-label="Toggle">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>
            <button id="update-password-btn" type="button" class="btn-primary">Change password</button>
        </div>

        <div id="notification" class="hidden"></div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const panels = {
            login:  document.getElementById('login-panel'),
            forgot: document.getElementById('forgot-panel'),
            verify: document.getElementById('verify-panel'),
            reset:  document.getElementById('reset-panel'),
        };

        const notification = document.getElementById('notification');

        function showPanel(name) {
            Object.values(panels).forEach(p => p.classList.remove('active'));
            panels[name].classList.add('active');
            notification.className = 'hidden';
        }

        function showMessage(type, message) {
            notification.className = type === 'error' ? 'error' : 'success';
            notification.textContent = message;
        }

        document.querySelectorAll('.eye-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const inp = document.getElementById(this.dataset.target);
                if (inp) inp.type = inp.type === 'password' ? 'text' : 'password';
            });
        });

        document.getElementById('forgot-password-link').addEventListener('click', () => showPanel('forgot'));
        document.getElementById('forgot-back').addEventListener('click',           () => showPanel('login'));
        document.getElementById('verify-back').addEventListener('click',            () => showPanel('forgot'));

        const csrfToken = '{{ csrf_token() }}';
        const urls = {
            requestCode:    @json(route('admin.password.request_code')),
            verifyCode:     @json(route('admin.password.verify_code')),
            updatePassword: @json(route('admin.password.update')),
        };

        document.getElementById('send-code-btn').addEventListener('click', async function () {
            const email = document.getElementById('reset-email').value.trim();
            if (!email) { showMessage('error', 'Please enter your admin email.'); return; }
            try {
                const res  = await fetch(urls.requestCode, {
                    method: 'POST', credentials: 'same-origin',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                    body: JSON.stringify({ email }),
                });
                const data = await res.json();
                if (!res.ok) throw new Error(data.message || 'Unable to send code.');
                showMessage('success', data.message || 'Verification code sent.');
                showPanel('verify');
            } catch (e) { showMessage('error', e.message); }
        });

        document.getElementById('verify-code-btn').addEventListener('click', async function () {
            const code = document.getElementById('verification-code').value.trim();
            if (!code) { showMessage('error', 'Please enter the verification code.'); return; }
            try {
                const res  = await fetch(urls.verifyCode, {
                    method: 'POST', credentials: 'same-origin',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                    body: JSON.stringify({ code }),
                });
                const data = await res.json();
                if (!res.ok) throw new Error(data.message || 'Verification failed.');
                showMessage('success', data.message || 'Code verified.');
                showPanel('reset');
            } catch (e) { showMessage('error', e.message); }
        });

        document.getElementById('update-password-btn').addEventListener('click', async function () {
            const password             = document.getElementById('new-password').value;
            const passwordConfirmation = document.getElementById('confirm-password').value;
            if (!password || !passwordConfirmation) { showMessage('error', 'Please complete both password fields.'); return; }
            if (password !== passwordConfirmation)   { showMessage('error', 'Passwords do not match.');             return; }
            try {
                const res  = await fetch(urls.updatePassword, {
                    method: 'POST', credentials: 'same-origin',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                    body: JSON.stringify({ password, password_confirmation: passwordConfirmation }),
                });
                const data = await res.json();
                if (!res.ok) throw new Error(data.message || 'Unable to update password.');
                showMessage('success', 'Password updated. Redirecting…');
                window.location.href = data.redirect;
            } catch (e) { showMessage('error', e.message); }
        });
    });
    </script>
</body>
</html>