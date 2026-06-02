<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
            /* ── LOGO ── */
        .logo-wrapper {
            position: absolute;
            top: 28px;
            left: 5%;
            transform: translateX(-50%);
            z-index: 5;
            padding: 8px 12px;
            border-radius: 12px;
            -webkit-backdrop-filter: blur(6px);
            backdrop-filter: blur(6px);
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .logo-wrapper>* {
            display: block;
            max-width: 220px;
            height: auto;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 via-slate-50 to-sky-50 text-slate-900">
     <div class="logo-wrapper">
        <x-logo variant="landing" size="lg" href="/" />
    </div>
    <div class="flex min-h-screen items-center justify-center px-4 py-10">
        <div
            class="w-full max-w-md rounded-[28px] border border-slate-200 bg-white/95 p-8 shadow-[0_24px_80px_rgba(15,23,42,0.12)] backdrop-blur-xl">
            <div class="mb-8 space-y-2 text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Admin access</p>
                <h1 class="text-3xl font-semibold text-slate-900">Admin login</h1>
                <p class="text-sm leading-6 text-slate-600">Use your admin credentials or reset the password with the
                    secure recovery flow.</p>
            </div>

          

            <div class="space-y-6">
                <div id="login-panel" class="space-y-5">
                    @if ($errors->any())
                        <div class="rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-4">
                        @csrf
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                            <input id="email" name="email" type="email"
                                placeholder="Email" required
                                class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                        </div>

                        <div class="space-y-2 relative">
                            <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                            <div class="relative">
                                <input id="password" name="password" type="password"  placeholder="Password" required
                                    class="w-full rounded-2xl border border-slate-300 bg-slate-50 pr-12 pl-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                                <button type="button" data-toggle="password" data-target="password"
                                    aria-label="Toggle password visibility"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <svg id="icon-password-eye" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Log
                            in as admin</button>
                    </form>

                    <div class="flex items-center justify-between gap-3 text-sm text-slate-600">
                        <button id="forgot-password-link" type="button"
                            class="font-semibold text-sky-600 transition hover:text-sky-700">Forgot password?</button>
                        <a href="{{ route('choose_path') }}" class="text-slate-500 transition hover:text-slate-900">Back
                            to Choose Path</a>
                    </div>
                </div>

                <div id="forgot-panel" class="hidden space-y-5">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700">
                        Enter your admin email and we will send a verification code to reset your password.
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="reset-email" class="block text-sm font-semibold text-slate-700">Email</label>
                            <input id="reset-email" type="email" placeholder="admin@internlink.test" required
                                class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                        </div>
                        <button id="send-code-btn" type="button"
                            class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Send
                            the verification code</button>
                    </div>

                    <button id="forgot-back" type="button"
                        class="text-sm text-slate-500 transition hover:text-slate-900">← Back to login</button>
                </div>

                <div id="verify-panel" class="hidden space-y-5">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700">
                        Enter the 6-digit code we sent to your email. The code expires in 10 minutes.
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="verification-code"
                                class="block text-sm font-semibold text-slate-700">Verification code</label>
                            <input id="verification-code" type="text" inputmode="numeric" maxlength="6"
                                placeholder="123456" required
                                class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                        </div>
                        <button id="verify-code-btn" type="button"
                            class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Verify
                            code</button>
                    </div>

                    <button id="verify-back" type="button"
                        class="text-sm text-slate-500 transition hover:text-slate-900">← Back to email</button>
                </div>

                <div id="reset-panel" class="hidden space-y-5">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700">
                        Set a new password for the admin account and you will be redirected to the dashboard.
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-2 relative">
                            <label for="new-password" class="block text-sm font-semibold text-slate-700">New
                                password</label>
                            <div class="relative">
                                <input id="new-password" type="password" placeholder="New password" required
                                    class="w-full rounded-2xl border border-slate-300 bg-slate-50 pr-12 pl-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                                <button type="button" data-toggle="password" data-target="new-password"
                                    aria-label="Toggle password visibility"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="space-y-2 relative">
                            <label for="confirm-password" class="block text-sm font-semibold text-slate-700">Confirm new
                                password</label>
                            <div class="relative">
                                <input id="confirm-password" type="password" placeholder="Confirm new password" required
                                    class="w-full rounded-2xl border border-slate-300 bg-slate-50 pr-12 pl-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                                <button type="button" data-toggle="password" data-target="confirm-password"
                                    aria-label="Toggle password visibility"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button id="update-password-btn" type="button"
                            class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Change
                            password</button>
                    </div>
                </div>

                <div id="notification" class="hidden rounded-2xl border px-4 py-3 text-sm"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const panels = {
                login: document.getElementById('login-panel'),
                forgot: document.getElementById('forgot-panel'),
                verify: document.getElementById('verify-panel'),
                reset: document.getElementById('reset-panel'),
            };
            const stepIndicator = document.getElementById('step-indicator');
            const notification = document.getElementById('notification');
            const csrfToken = '{{ csrf_token() }}';
            const urls = {
                requestCode: @json(route('admin.password.request_code')),
                verifyCode: @json(route('admin.password.verify_code')),
                updatePassword: @json(route('admin.password.update')),
            };

            function showPanel(name) {
                Object.values(panels).forEach(panel => panel.classList.add('hidden'));
                panels[name].classList.remove('hidden');

                const stepLabels = {
                    login: 'Sign in',
                    forgot: 'Send code',
                    verify: 'Verify code',
                    reset: 'Change password',
                };
                stepIndicator.textContent = stepLabels[name];
            }

            function showMessage(type, message) {
                notification.classList.remove('hidden', 'border-red-200', 'bg-red-50', 'text-red-700', 'border-emerald-200', 'bg-emerald-50', 'text-emerald-700');
                notification.textContent = message;
                if (type === 'error') {
                    notification.classList.add('border-red-200', 'bg-red-50', 'text-red-700');
                } else {
                    notification.classList.add('border-emerald-200', 'bg-emerald-50', 'text-emerald-700');
                }
            }

            function clearMessage() {
                notification.classList.add('hidden');
            }

            document.getElementById('forgot-password-link').addEventListener('click', function () {
                clearMessage();
                showPanel('forgot');
            });

            document.getElementById('forgot-back').addEventListener('click', function () {
                clearMessage();
                showPanel('login');
            });

            document.getElementById('verify-back').addEventListener('click', function () {
                clearMessage();
                showPanel('forgot');
            });

            document.getElementById('send-code-btn').addEventListener('click', async function () {
                clearMessage();
                const emailInput = document.getElementById('reset-email');
                const email = emailInput.value.trim();
                if (!email) {
                    showMessage('error', 'Please enter your admin email.');
                    return;
                }

                try {
                    const response = await fetch(urls.requestCode, {
                        method: 'POST',
                        credentials: 'same-origin',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ email }),
                    });
                    const result = await response.json();
                    if (!response.ok) {
                        throw new Error(result.message || 'Unable to send verification code.');
                    }
                    showMessage('success', result.message || 'Verification code sent.');
                    showPanel('verify');
                } catch (error) {
                    showMessage('error', error.message);
                }
            });

            // Password visibility toggles
            document.querySelectorAll('button[data-toggle="password"]').forEach(btn => {
                btn.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    if (!input) return;
                    if (input.type === 'password') {
                        input.type = 'text';
                    } else {
                        input.type = 'password';
                    }
                });
            });

            document.getElementById('verify-code-btn').addEventListener('click', async function () {
                clearMessage();
                const code = document.getElementById('verification-code').value.trim();
                if (!code) {
                    showMessage('error', 'Please enter the verification code.');
                    return;
                }

                try {
                    const response = await fetch(urls.verifyCode, {
                        method: 'POST',
                        credentials: 'same-origin',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ code }),
                    });
                    const result = await response.json();
                    if (!response.ok) {
                        throw new Error(result.message || 'Verification failed.');
                    }
                    showMessage('success', result.message || 'Code verified.');
                    showPanel('reset');
                } catch (error) {
                    showMessage('error', error.message);
                }
            });

            document.getElementById('update-password-btn').addEventListener('click', async function () {
                clearMessage();
                const password = document.getElementById('new-password').value;
                const passwordConfirmation = document.getElementById('confirm-password').value;
                if (!password || !passwordConfirmation) {
                    showMessage('error', 'Please complete both password fields.');
                    return;
                }
                if (password !== passwordConfirmation) {
                    showMessage('error', 'Passwords do not match.');
                    return;
                }

                try {
                    const response = await fetch(urls.updatePassword, {
                        method: 'POST',
                        credentials: 'same-origin',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ password, password_confirmation: passwordConfirmation }),
                    });
                    const result = await response.json();
                    if (!response.ok) {
                        throw new Error(result.message || 'Unable to update password.');
                    }
                    showMessage('success', 'Password updated. Redirecting to dashboard...');
                    window.location.href = result.redirect;
                } catch (error) {
                    showMessage('error', error.message);
                }
            });
        });
    </script>
</body>

</html>