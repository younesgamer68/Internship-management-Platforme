<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Internships - Start Your Journey</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Roboto, -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Arial, sans-serif;
            background: #fff;
            min-height: 100vh;
            font-size: 16px;
            color: #111827;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .left {
            flex: 1;
            padding: 32px 80px 60px;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .right {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 400px;
            width: 100%;
            align-self: center;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #111827;
            line-height: 1.25;
            margin-bottom: 32px;
        }

        .field-label {
            font-size: 0.88rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .field-label .req {
            color: #ef4444;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 14px;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
        }

        .input-wrap input {
            width: 100%;
            padding: 14px 18px 14px 42px;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #111827;
            background: #fff;
            outline: none;
            transition: border-color 0.18s, box-shadow 0.18s;
            font-family: inherit;
        }

        .input-wrap input::placeholder {
            color: #9ca3af;
        }

        .input-wrap input:focus {
            border-color: #2ab5b0;
            box-shadow: 0 0 0 3px rgba(42, 181, 176, 0.12);
        }

        .btn-email {
            width: 100%;
            padding: 14px;
            background: #e5e7eb;
            color: #9ca3af;
            border: none;
            border-radius: 8px;
            font-size: 0.97rem;
            font-weight: 500;
            cursor: not-allowed;
            font-family: inherit;
            transition: background 0.18s, color 0.18s;
            margin-bottom: 22px;
        }

        .btn-email.active {
            background: #2ab5b0;
            color: #fff;
            cursor: pointer;
        }

        .btn-email.active:hover {
            background: #1a9994;
        }

        .or-divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
            color: #9ca3af;
            font-size: 0.9rem;
        }

        .or-divider::before,
        .or-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        .btn-google {
            width: 100%;
            padding: 13px 18px;
            background: #fff;
            color: #111827;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.97rem;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: background 0.18s, border-color 0.18s, box-shadow 0.18s;
            margin-bottom: 22px;
            text-decoration: none;
        }

        .btn-google:hover {
            background: #f9fafb;
            border-color: #9ca3af;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .terms-text {
            font-size: 0.8rem;
            color: #6b7280;
            text-align: center;
            line-height: 1.6;
            margin-bottom: 36px;
        }

        .terms-text a {
            color: #111827;
            font-weight: 700;
            text-decoration: underline;
        }

        .terms-text a:hover {
            color: #2ab5b0;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #374151;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            transition: color 0.18s;
        }

        .back-link:hover {
            color: #2ab5b0;
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

        /* ── RIGHT SIDE (From choose_intership) ── */
        .right-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(145deg, #ddf0fb 0%, #c8e8f7 40%, #d4eef9 70%, #e2f4fd 100%);
            z-index: 0;
        }

        .orbs {
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(55px);
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            top: -160px;
            left: -130px;
            background: radial-gradient(circle, rgba(100, 200, 240, 0.75) 0%, transparent 70%);
            animation: orbDrift1 16s ease-in-out infinite alternate;
        }

        .orb-2 {
            width: 460px;
            height: 460px;
            bottom: -140px;
            right: -110px;
            background: radial-gradient(circle, rgba(60, 175, 220, 0.7) 0%, transparent 70%);
            animation: orbDrift2 20s ease-in-out infinite alternate;
        }

        .orb-3 {
            width: 300px;
            height: 300px;
            top: 30%;
            left: 50%;
            background: radial-gradient(circle, rgba(160, 225, 250, 0.6) 0%, transparent 70%);
            animation: orbDrift3 25s ease-in-out infinite alternate;
        }

        .orb-4 {
            width: 220px;
            height: 220px;
            top: 10%;
            right: 10%;
            background: radial-gradient(circle, rgba(42, 181, 176, 0.35) 0%, transparent 70%);
            filter: blur(40px);
            animation: orbDrift1 30s ease-in-out infinite alternate-reverse;
        }

        @keyframes orbDrift1 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(60px, 50px);
            }
        }

        @keyframes orbDrift2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-50px, -60px);
            }
        }

        @keyframes orbDrift3 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-40px, 30px);
            }
        }

        .blob {
            position: absolute;
            top: -100px;
            left: -50px;
            width: 450px;
            height: 450px;
            background: rgba(150, 210, 235, 0.55);
            border-radius: 60% 40% 55% 45% / 50% 60% 40% 50%;
            z-index: 2;
            animation: blobMorph 18s ease-in-out infinite alternate;
        }

        @keyframes blobMorph {
            0% {
                border-radius: 60% 40% 55% 45% / 50% 60% 40% 50%;
            }

            50% {
                border-radius: 50% 50% 40% 60% / 60% 40% 55% 45%;
            }

            100% {
                border-radius: 45% 55% 60% 40% / 45% 55% 50% 50%;
            }
        }

        #particles-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
            pointer-events: none;
        }

        .right-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 600px;
            padding: clamp(40px, 4.2vw, 80px) clamp(24px, 3.1vw, 60px) clamp(30px, 3.1vw, 60px);
        }

        .avatars {
            display: flex;
            justify-content: center;
            margin-bottom: 32px;
        }

        .avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 3px solid #e8f4f8;
            overflow: hidden;
            margin-left: -12px;
        }

        .avatar:first-child {
            margin-left: 0;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background: #d1d5db;
        }

        .avatar-special {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 3px solid #e8f4f8;
            overflow: hidden;
            margin-left: -12px;
        }

        .avatar-special img {
            width: 80%;
            height: 100%;
            object-fit: cover;
            background: #d1d5db;
        }

        .stats-heading {
            font-size: clamp(1.5rem, 1.7vw, 2.3rem);
            font-weight: 700;
            color: #1a2e35;
            line-height: 1.35;
            margin-bottom: clamp(30px, 3.1vw, 60px);
        }

        .stats-heading .highlight {
            color: #2ab5b0;
        }

        .trust-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #1a2e35;
            margin-bottom: 40px;
        }

        .logos {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: clamp(20px, 2.1vw, 40px) clamp(30px, 4.2vw, 80px);
            align-items: center;
            justify-items: center;
        }

        .logo-item {
            width: clamp(80px, 10vw, 150px);
            height: clamp(40px, 4vw, 60px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-item img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1440px) {
            .left {
                padding-top: 140px;
            }
        }

        @media (max-width: 1280px) {
            .left {
                padding-top: 120px;
            }

            .avatar,
            .avatar-special {
                width: 52px;
                height: 52px;
            }

            .blob {
                width: 340px;
                height: 340px;
            }

            .orb-1 {
                width: 380px;
                height: 380px;
            }

            .orb-2 {
                width: 350px;
                height: 350px;
            }

            .orb-3 {
                width: 220px;
                height: 220px;
            }
        }

        @media (max-width: 1100px) {
            .container {
                flex-direction: column;
            }

            .left {
                padding: 100px 40px 40px;
            }

            .right {
                min-height: 500px;
            }

            .right-content {
                padding: 50px 40px 40px;
            }

            .blob {
                width: 280px;
                height: 280px;
                top: -60px;
                left: -30px;
            }

            .logos {
                gap: 24px 40px;
            }
        }

        @media (max-width: 900px) {
            .left {
                padding: 90px 30px 30px;
            }

            .stats-heading {
                font-size: 1.5rem;
            }

            .logos {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px 30px;
            }
        }

        @media (max-width: 768px) {
            .left {
                padding: 80px 20px 24px;
            }

            .right-content {
                padding: 40px 20px 30px;
            }

            .right {
                min-height: 400px;
            }

            .avatar,
            .avatar-special {
                width: 48px;
                height: 48px;
            }

            .blob {
                display: none;
            }

            .logo-wrapper {
                top: 16px;
                padding: 6px 10px;
            }

            .logo-wrapper>* {
                max-width: 160px;
            }
        }

        @media (max-width: 480px) {
            .left {
                padding: 72px 16px 20px;
            }

            .right-content {
                padding: 30px 16px 24px;
            }

            .stats-heading {
                font-size: 1.25rem;
            }

            .logos {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px 20px;
            }

            .trust-title {
                font-size: 0.9rem;
            }

            .back-link {
                font-size: 0.82rem;
            }
        }
    </style>
</head>

<body>

    <div class="logo-wrapper">
        <x-logo variant="landing" size="lg" href="/" />
    </div>

    <div class="container">
        <div class="left">

            <div class="form-wrap">
                <h1 class="form-title">Get experience that<br>employers actually notice</h1>

                <form method="POST" action="{{ route('register.quick') }}">
                    @csrf

                    <div class="field-label">Email address <span class="req">*</span></div>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="4" width="20" height="16" rx="2" stroke="#9ca3af" stroke-width="2" />
                                <path d="M2 7L12 13L22 7" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </span>
                        <input type="email" id="email-input" name="email" placeholder="name@university.edu"
                            oninput="toggleEmailBtn(this.value)">
                    </div>

                    <button type="submit" class="btn-email" id="email-btn" disabled>Continue with email</button>
                </form>
                <div class="or-divider">Or</div>

                <a href="{{ route('google.login', ['role' => 'intern']) }}" class="btn-google">
                    <svg class="g-logo" width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path
                            d="M21.35 11.1h-9.2v2.8h5.3c-.23 1.45-1.6 4.25-5.3 4.25-3.2 0-5.8-2.65-5.8-5.92s2.6-5.92 5.8-5.92c1.82 0 3.03.78 3.73 1.45l2.55-2.45C17.57 3.2 15.7 2.2 13 2.2 7.9 2.2 3.8 6.58 3.8 11.98s4.1 9.78 9.2 9.78c5.3 0 8.85-3.73 8.85-9.04 0-.6-.07-1.05-.5-1.62z"
                            fill="#4285F4" />
                    </svg>
                    Continue with Google
                </a>

                <p class="terms-text">
                    By continuing you are agreeing to Virtual Internships's<br>
                    <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a> and confirming that you're<br>
                    above 18 years of age.
                </p>

                <a href="javascript:history.back()" class="back-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Back
                </a>
            </div>
        </div>

        <div class="right">
            <div class="right-bg"></div>
            <div class="orbs">
                <div class="orb orb-1"></div>
                <div class="orb orb-2"></div>
                <div class="orb orb-3"></div>
                <div class="orb orb-4"></div>
            </div>
            <div class="blob"></div>
            <canvas id="particles-canvas"></canvas>

            <div class="right-content">
                <div class="avatars">
                    <div class="avatar"><img src="{{ asset('images/Avatars/Youness.jpg') }}" alt="Intern 2"></div>
                    <div class="avatar-special"><img src="{{ asset('images/Avatars/Mohmmed.png') }}" alt="Intern 3">
                    </div>
                </div>

                <h2 class="stats-heading">
                    <span class="highlight">10,000+ interns</span> launch their<br>
                    careers with us every month
                </h2>

                <p class="trust-title">Trusted by education providers worldwide</p>

                <div class="logos">
                    <div class="logo-item"><img
                            src="https://icesst.com/wp-content/uploads/2024/07/uiz-ibn-zohr-logo-9C971C192C-seeklogo.com_.png"
                            alt="University of New Mexico"></div>
                    <div class="logo-item"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/9/94/Universiapolis.png"
                            alt="University of Auckland"></div>
                    <div class="logo-item"><img src="https://uploads.9rayti.com/2012/07/logo-encg-casablanca.png"
                            alt="Landmark University"></div>
                    <div class="logo-item"><img src="https://upload.wikimedia.org/wikipedia/commons/d/df/OFPPT_Logo.png"
                            alt="University of South Carolina"></div>
                    <div class="logo-item"><img src="https://tagdev.ruforum.org/sites/default/files/UM6P.png"
                            alt="University of Salford"></div>
                    <div class="logo-item"><img
                            src="https://prod.cdn-medias.jeuneafrique.com/cdn-cgi/image/q=auto,f=auto,metadata=none,width=1280,height=720,fit=cover/https://prod.cdn-medias.jeuneafrique.com/medias/2018/02/23/aui.png"
                            alt="Bayes Business School"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleEmailBtn(val) {
            const btn = document.getElementById('email-btn');
            if (val.trim().length > 0) {
                btn.classList.add('active');
                btn.disabled = false;
            } else {
                btn.classList.remove('active');
                btn.disabled = true;
            }
        }

        const canvas = document.getElementById('particles-canvas');
        const ctx = canvas.getContext('2d');
        const right = document.querySelector('.right');

        function resize() {
            const rect = right.getBoundingClientRect();
            canvas.width = rect.width;
            canvas.height = rect.height;
        }
        resize();
        window.addEventListener('resize', () => { resize(); init(); });

        const COUNT = 80;
        let particles = [];

        function rand(min, max) { return Math.random() * (max - min) + min; }

        class Particle {
            constructor() { this.reset(true); }

            reset(initial = false) {
                this.x = rand(0, canvas.width);
                this.y = initial ? rand(0, canvas.height) : canvas.height + 10;
                this.r = rand(2, 5);
                this.alpha = rand(0.35, 0.75);
                this.vx = rand(-0.18, 0.18);
                this.vy = rand(-0.4, -0.15);
                this.life = 0;
                this.maxLife = rand(200, 420);
                const palette = [
                    '42,181,176',
                    '80,195,220',
                    '140,215,240',
                    '200,238,252',
                    '255,255,255',
                ];
                this.color = palette[Math.floor(Math.random() * palette.length)];
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;
                this.life++;
                const half = this.maxLife / 2;
                if (this.life < half) {
                    this.currentAlpha = this.alpha * (this.life / half);
                } else {
                    this.currentAlpha = this.alpha * (1 - (this.life - half) / half);
                }
                if (this.life >= this.maxLife) this.reset();
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(${this.color}, ${this.currentAlpha})`;
                ctx.fill();
            }
        }

        function init() {
            particles = [];
            for (let i = 0; i < COUNT; i++) {
                const p = new Particle();
                p.life = Math.floor(rand(0, p.maxLife));
                particles.push(p);
            }
        }

        function loop() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            requestAnimationFrame(loop);
        }

        init();
        loop();
    </script>

</body>

</html>