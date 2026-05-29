<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Access the Company Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <style>
        /* (styles copied from Things_to_add.html) */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --white: #ffffff;
            --black: #0a0a0a;
            --dark-panel: #111111;
            --card-bg: #1c1c1c;
            --card-active: #222222;
            --teal: #00c896;
            --text-dim: rgba(255, 255, 255, .45);
            --text-mid: rgba(255, 255, 255, .7);
            --border: #e2e2e2;
            --border-dark: rgba(255, 255, 255, .09);
            --input-focus: #111111;
            --font: 'Poppins', sans-serif;
        }

        html,
        body {
            height: 100%;
            font-family: var(--font);
            background: var(--black);
        }

        .page {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            min-height: 100vh;
        }

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

        .left {
            background: var(--white);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 48px;
        }

        .left__inner {
            width: 100%;
            max-width: 360px;
        }

        .left__heading {
            font-size: 1.75rem;
            font-weight: 600;
            color: #111;
            line-height: 1.25;
            margin-bottom: 16px;
            letter-spacing: -.4px;
        }

        .left__sub {
            font-size: .875rem;
            color: #555;
            line-height: 1.65;
            margin-bottom: 28px;
        }

        .left__sub strong {
            color: #111;
            font-weight: 600;
        }

        .field {
            position: relative;
            margin-bottom: 16px;
        }

        .field__label {
            position: absolute;
            top: -9px;
            left: 12px;
            background: var(--white);
            padding: 0 4px;
            font-size: .72rem;
            font-weight: 500;
            color: #777;
            pointer-events: none;
            z-index: 1;
        }

        .field__label span {
            color: #e53935;
        }

        .field__wrap {
            display: flex;
            align-items: center;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
            transition: border-color .2s;
        }

        .field__wrap:focus-within {
            border-color: #111;
        }

        .field__icon {
            padding: 0 12px;
            display: flex;
            align-items: center;
            color: #aaa;
        }

        .field__icon svg {
            width: 17px;
            height: 17px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .field__input {
            flex: 1;
            border: none;
            outline: none;
            padding: 14px 14px 14px 0;
            font-family: var(--font);
            font-size: .9rem;
            color: #111;
            background: transparent;
        }

        .field__input::placeholder {
            color: #bbb;
        }

        .btn-primary {
            width: 100%;
            padding: 14px;
            background: #111;
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-family: var(--font);
            font-size: .92rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s, transform .15s;
            margin-bottom: 20px;
            letter-spacing: .1px;
        }

        .btn-primary:hover {
            background: #2a2a2a;
            transform: translateY(-1px);
        }

        .btn-google {
            width: 100%;
            padding: 13px;
            background: var(--white);
            color: #333;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-family: var(--font);
            font-size: .9rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background .2s, border-color .2s;
            margin-bottom: 24px;
        }

        .btn-google:hover {
            background: #f7f7f7;
            border-color: #ccc;
        }

        .g-logo {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .legal {
            font-size: .75rem;
            color: #aaa;
            text-align: center;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .legal a {
            color: #111;
            font-weight: 600;
            text-decoration: none;
        }

        .legal a:hover {
            text-decoration: underline;
        }

        .intern-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: .85rem;
            color: #555;
            text-decoration: none;
            font-weight: 500;
            transition: color .2s;
        }

        .intern-link:hover {
            color: #111;
        }

        .intern-link svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .intern-link span {
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        .right {
            background: var(--dark-panel);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: clamp(36px, 5vw, 80px);
            position: relative;
            overflow: hidden;
            align-items: center;
        }

        /* ── FOOTER LINK ── */
        .footer-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #444444;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            transition: color 0.2s;
            align-self: center;
            width: 100%;
            max-width: 440px;
            text-align: left;
        }

        .footer-link:hover {
            color: #2ab5b0;
        }

        .right__inner {
            width: min(100%, 460px);
            margin-inline: auto;
        }

        .right::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 380px;
            height: 380px;
            background: radial-gradient(circle, rgba(0, 200, 150, .13) 0%, transparent 70%);
            pointer-events: none;
        }

        .stats {
            display: flex;
            gap: 40px;
            margin-bottom: 36px;
        }

        .stat__num {
            font-size: 2rem;
            font-weight: 600;
            color: var(--white);
            letter-spacing: -1px;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat__label {
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-dim);
        }

        .right__headline {
            font-size: clamp(1.7rem, 2.8vw, 2.4rem);
            font-weight: 800;
            color: var(--white);
            line-height: 1.2;
            margin-bottom: 4px;
            letter-spacing: -.5px;
        }

        .right__headline-accent {
            color: var(--teal);
            display: block;
            margin-bottom: 32px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
        }

        .feature-toggle {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .feat-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            background: var(--card-bg);
            border: 1px solid var(--border-dark);
            border-radius: 12px;
            padding: 16px 20px;
            transition: background .25s, border-color .25s, transform .18s, box-shadow .25s;
            cursor: pointer;
        }

        .feat-card:hover {
            background: #252525;
            border-color: rgba(255, 255, 255, .18);
            transform: translateY(-1px);
        }

        .feat-card:active,
        .feature-toggle:focus-visible+.feat-card {
            transform: translateY(0);
        }

        .feature-toggle:focus-visible+.feat-card {
            outline: 2px solid rgba(0, 200, 150, .35);
            outline-offset: 2px;
        }

        .feature-toggle:checked+.feat-card {
            background: #1e2a25;
            border-color: rgba(0, 200, 150, .3);
            box-shadow: inset 0 0 0 1px rgba(0, 200, 150, .12);
        }

        .feat-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .06);
            margin-top: 1px;
        }

        .feature-toggle:checked+.feat-card .feat-icon {
            background: var(--teal);
        }

        .feat-icon svg {
            width: 18px;
            height: 18px;
            stroke: var(--text-dim);
            fill: none;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .feature-toggle:checked+.feat-card .feat-icon svg {
            stroke: #fff;
        }

        .feat-title {
            font-size: .88rem;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 4px;
            transition: color .25s;
        }

        .feat-card:hover .feat-title {
            color: rgba(255, 255, 255, .88);
        }

        .feature-toggle:checked+.feat-card .feat-title {
            color: var(--white);
        }

        .feat-desc {
            font-size: .78rem;
            color: var(--text-dim);
            line-height: 1.55;
        }

        @media (max-width:1280px) {
            .page {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            }

            .right {
                padding: clamp(28px, 4vw, 56px);
            }

            .left {
                padding: 48px 28px;
            }
        }
    </style>
</head>

<body>
    <div class="logo-wrapper">
        <x-logo variant="landing" size="lg" href="/" />
    </div>
    <div class="page">

        <div class="left">
            <div class="left__inner">

                <h1 class="left__heading">Access the<br>company platform</h1>

                <p class="left__sub">Use your <strong>work email address</strong> to continue. Need an account?<br>We'll
                    help you create one.</p>

                <div class="field">
                    <span class="field__label">Work email address <span>*</span></span>
                    <div class="field__wrap">
                        <span class="field__icon"><svg viewBox="0 0 24 24">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <polyline points="2,4 12,13 22,4" />
                            </svg></span>
                        <input class="field__input" type="email" placeholder="example@yourcompany.com"
                            autocomplete="email" />
                    </div>
                </div>

                <button class="btn-primary">Continue with email</button>

                <div class="divider">
                    <div class="divider__line"></div><span class="divider__text">Or</span>
                    <div class="divider__line"></div>
                </div>

                <a href="{{ route('google.login', ['role' => 'company_manager']) }}" class="btn-google">
                    <svg class="g-logo" width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path
                            d="M21.35 11.1h-9.2v2.8h5.3c-.23 1.45-1.6 4.25-5.3 4.25-3.2 0-5.8-2.65-5.8-5.92s2.6-5.92 5.8-5.92c1.82 0 3.03.78 3.73 1.45l2.55-2.45C17.57 3.2 15.7 2.2 13 2.2 7.9 2.2 3.8 6.58 3.8 11.98s4.1 9.78 9.2 9.78c5.3 0 8.85-3.73 8.85-9.04 0-.6-.07-1.05-.5-1.62z"
                            fill="#4285F4" />
                    </svg>
                    Continue with Google
                </a>

                <p class="legal">By continuing you are agreeing to Virtual Internships's<br><a href="#">Terms of Use</a>
                    &nbsp;&amp;&nbsp; <a href="#">Privacy Policy</a></p>

                <!-- Footer link -->
                <a href="{{ route('choose_path') }}" class="footer-link">
                    <svg width="24" height="24" viewBox="0 0 72 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path d="M70 10H20V4L2 12L20 20V14H70V10Z" fill="black" />
                    </svg>
                    <span>Not a student? Continue as a company</span>
                </a>

            </div>
        </div>

        <div class="right">
            <div class="right__inner">

                <div class="stats">
                    <div class="stat">
                        <div class="stat__num">10,000+</div>
                        <div class="stat__label">Interns Placed</div>
                    </div>
                    <div class="stat">
                        <div class="stat__num">100+</div>
                        <div class="stat__label">Countries</div>
                    </div>
                    <div class="stat">
                        <div class="stat__num">250+</div>
                        <div class="stat__label">Universities</div>
                    </div>
                </div>

                <h2 class="right__headline">Hire global interns.<span
                        class="right__headline-accent">Effortlessly.</span></h2>

                <div class="features">

                    <input class="feature-toggle" type="radio" name="feature-card" id="feature-card-1">
                    <label class="feat-card" for="feature-card-1">
                        <div class="feat-icon"><svg viewBox="0 0 24 24">
                                <path d="M12 2L4 6v6c0 5.25 3.5 10.15 8 11.35C16.5 22.15 20 17.25 20 12V6L12 2z" />
                            </svg></div>
                        <div class="feat-body">
                            <div class="feat-title">Pre-vetted candidates</div>
                            <div class="feat-desc">University-endorsed students ready to contribute from day one.</div>
                        </div>
                    </label>

                    <input class="feature-toggle" type="radio" name="feature-card" id="feature-card-2">
                    <label class="feat-card" for="feature-card-2">
                        <div class="feat-icon"><svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="3" />
                                <path d="M19.07 4.93A10 10 0 0 0 4.93 19.07M19.07 19.07A10 10 0 0 0 4.93 4.93" />
                            </svg></div>
                        <div class="feat-body">
                            <div class="feat-title">Zero cost to host</div>
                            <div class="feat-desc">Universities cover placement fees. You hire talent for free.</div>
                        </div>
                    </label>

                    <input class="feature-toggle" type="radio" name="feature-card" id="feature-card-3" checked>
                    <label class="feat-card" for="feature-card-3">
                        <div class="feat-icon"><svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="7" height="7" rx="1" />
                                <rect x="14" y="3" width="7" height="7" rx="1" />
                                <rect x="3" y="14" width="7" height="7" rx="1" />
                                <rect x="14" y="14" width="7" height="7" rx="1" />
                            </svg></div>
                        <div class="feat-body">
                            <div class="feat-title">End-to-end platform</div>
                            <div class="feat-desc">Interviews, offers, weekly feedback managed in one place.</div>
                        </div>
                    </label>

                    <input class="feature-toggle" type="radio" name="feature-card" id="feature-card-4">
                    <label class="feat-card" for="feature-card-4">
                        <div class="feat-icon"><svg viewBox="0 0 24 24">
                                <polyline points="20 12 20 22 4 22 4 12" />
                                <rect x="2" y="7" width="20" height="5" rx="1" />
                                <line x1="12" y1="22" x2="12" y2="7" />
                                <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z" />
                                <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z" />
                            </svg></div>
                        <div class="feat-body">
                            <div class="feat-title">Get rewarded</div>
                            <div class="feat-desc">Share your referral code. Earn rewards when they host an intern.
                            </div>
                        </div>
                    </label>

                </div>

            </div>
        </div>

    </div>

    <script>
        const input = document.querySelector('.field__input');
        const wrap = document.querySelector('.field__wrap');
        if (input && wrap) {
            input.addEventListener('focus', () => { wrap.style.boxShadow = '0 0 0 3px rgba(0,0,0,.08)'; });
            input.addEventListener('blur', () => { wrap.style.boxShadow = 'none'; });
            input.addEventListener('keydown', e => { if (e.key === 'Enter') { const primaryButton = document.querySelector('.btn-primary'); if (primaryButton) primaryButton.click(); } });
        }
        const statNumbers = document.querySelectorAll('.stat__num');
        const duration = 1600;
        const easeOutCubic = t => 1 - Math.pow(1 - t, 3);
        statNumbers.forEach(el => {
            const text = (el.textContent || '').trim();
            const target = parseInt(text.replace(/[^\d]/g, ''), 10);
            const hasPlus = text.includes('+');
            if (!Number.isFinite(target)) return;
            const startTime = performance.now();
            const tick = now => {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const value = Math.floor(target * easeOutCubic(progress));
                el.textContent = value.toLocaleString() + (hasPlus ? '+' : '');
                if (progress < 1) { requestAnimationFrame(tick); }
            };
            requestAnimationFrame(tick);
        });
        const featureToggles = Array.from(document.querySelectorAll('.feature-toggle'));
        let activeFeatureIdx = featureToggles.findIndex(toggle => toggle.checked);
        if (activeFeatureIdx < 0) activeFeatureIdx = 0;
        featureToggles.forEach((toggle, index) => { toggle.addEventListener('change', () => { if (toggle.checked) activeFeatureIdx = index; }); });
        if (featureToggles.length > 1) { setInterval(() => { activeFeatureIdx = (activeFeatureIdx + 1) % featureToggles.length; featureToggles[activeFeatureIdx].checked = true; }, 3000); }
    </script>

</body>

</html>