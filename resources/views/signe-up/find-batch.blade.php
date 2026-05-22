<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Internships - Find Batch</title>
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
            overflow-x: hidden;
        }

        /* ── LAYOUT ── */
        .container {
            display: flex;
            min-height: 100vh;
        }

        /* LEFT SIDE */
        .left {
            flex: 1;
            padding: clamp(140px, 15vw, 260px) clamp(24px, 4.2vw, 80px) clamp(30px, 3.1vw, 60px);
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        /* RIGHT SIDE */
        .right {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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

        /* ── HEADING ── */
        .heading {
            margin-bottom: 30px;
            align-self: center;
            width: 100%;
            max-width: 440px;
            text-align: left;
        }

        .heading h1 {
            font-size: clamp(1.8rem, 2.2vw, 2.5rem);
            font-weight: 600;
            color: #1a2e35;
            line-height: 1.3;
            margin-top: 4px;
        }

        /* ── FORM ── */
        .form-container {
            width: 100%;
            max-width: 440px;
            align-self: center;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .input-group {
            position: relative;
            width: 100%;
        }

        .input-group input {
            width: 100%;
            padding: 16px 14px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 1rem;
            color: #111827;
            outline: none;
            transition: all 0.2s ease;
            background: #fff;
        }

        .input-group input:focus {
            border: 2px solid #000;
            padding: 15px 13px;
            /* Subtract 1px to offset border thickness */
        }

        .input-group label {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.2s ease;
            background: #fff;
            padding: 0 4px;
        }

        .input-group input:focus~label,
        .input-group input:not(:placeholder-shown)~label {
            top: 0;
            font-size: 0.8rem;
            color: #111827;
        }

        .input-group input::placeholder {
            color: transparent;
        }

        .input-group input:focus::placeholder {
            color: #9ca3af;
        }

        /* ── INFO BOX ── */
        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: #eff6ff;
            border: 1px solid #93c5fd;
            border-radius: 6px;
        }

        .info-icon {
            color: #3b82f6;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2px;
        }

        .info-text {
            font-size: 0.9rem;
            line-height: 1.4;
            color: #1a2e35;
        }

        /* ── CONTINUE BUTTON ── */
        .continue-btn {
            width: 100%;
            padding: 14px;
            background: #e5e7eb;
            color: #9ca3af;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: not-allowed;
            margin-top: 4px;
        }

        /* ── HELP TEXT ── */
        .help-text {
            text-align: center;
            font-size: 0.9rem;
            color: #4b5563;
        }

        .help-text a {
            color: #111827;
            text-decoration: underline;
            font-weight: 500;
        }

        /* ── BACK LINK ── */
        .back-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #1a2e35;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
            margin-top: 60px;
            align-self: center;
            width: 100%;
            max-width: 440px;
            text-align: left;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* ══════════════════════════════════════
           RIGHT SIDE — SUBTLE ANIMATED BG
        ══════════════════════════════════════ */
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
                padding-top: 200px;
            }
        }

        @media (max-width: 1280px) {
            .left {
                padding-top: 120px;
                padding: clamp(140px, 20vw, 260px) clamp(24px, 4.2vw, 80px) clamp(30px, 3.1vw, 60px);

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

            .heading,
            .form-container,
            .back-link {
                max-width: 100%;
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

            .heading h1 {
                font-size: 1.8rem;
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

            .heading h1 {
                font-size: 1.6rem;
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

        <!-- LEFT COLUMN -->
        <div class="left">

            <!-- Heading -->
            <div class="heading">
                <h1>Your internship journey<br>starts here</h1>
            </div>

            <!-- Form -->
            <div class="form-container">

                <div class="input-group">
                    <input type="text" id="batchCode" placeholder="E.g. ABCD12345" required>
                    <label for="batchCode">Enter batch code *</label>
                </div>

                <div class="info-box">
                    <div class="info-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9" stroke="#03b1ac" stroke-width="2" />
                            <path d="M12 10V16" stroke="#03b1ac" stroke-width="2" stroke-linecap="round" />
                            <circle cx="12" cy="7" r="1.5" fill="#03b1ac" />
                        </svg>
                    </div>
                    <div class="info-text">
                        Enter the batch code from your university's welcome email, or use the login link that must be
                        provided.
                    </div>
                </div>

                <button class="continue-btn" disabled>Continue</button>

                <div class="help-text">
                    Need help? Email us at <a
                        href="mailto:support@virtualinternships.com">support@virtualinternships.com</a>
                </div>

            </div>

            <!-- Back link -->
            <a href="javascript:history.back()" class="back-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span>Back</span>
            </a>

        </div>

        <!-- RIGHT COLUMN -->
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

        /* ── Particle config ── */
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