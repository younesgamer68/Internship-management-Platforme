<div class="min-h-screen relative overflow-hidden bg-white">
    <style>
 

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
            cursor: not-allowed;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: background 0.18s, border-color 0.18s, box-shadow 0.18s;
            margin-bottom: 22px;
            text-decoration: none;
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

        /* ── LOGO ── */
        .logo-wrapper {
            position: absolute;
            top: 28px;
            left: 5%;
            transform: translateX(-50%);
            z-index: 5;
            padding: 8px 12px;
            border-radius: 12px;
            backdrop-filter: blur(6px);
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .logo-wrapper>* {
            display: block;
            max-width: 220px;
            height: auto;
        }

        /* ── RIGHT SIDE ── */
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
        }
    </style>

    <div class="logo-wrapper">
        <x-logo variant="landing" size="lg" href="/" />
    </div>

    <div class="container">
        <!-- Background Page (Behind Modal) -->
        <div class="left opacity-30 pointer-events-none">
            <div class="form-wrap">
                <h1 class="form-title">Get experience that<br>employers actually notice</h1>

                <form>
                    <div class="field-label">Email address <span class="req">*</span></div>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="4" width="20" height="16" rx="2" stroke="#9ca3af" stroke-width="2" />
                                <path d="M2 7L12 13L22 7" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </span>
                        <input type="email" value="{{ session('pending_user_email') }}" disabled>
                    </div>

                    <button type="button" class="btn-email">Continue with email</button>
                </form>
                <div class="or-divider">Or</div>

                <button type="button" class="btn-google" disabled>
                    <svg class="g-logo" width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21.35 11.1h-9.2v2.8h5.3c-.23 1.45-1.6 4.25-5.3 4.25-3.2 0-5.8-2.65-5.8-5.92s2.6-5.92 5.8-5.92c1.82 0 3.03.78 3.73 1.45l2.55-2.45C17.57 3.2 15.7 2.2 13 2.2 7.9 2.2 3.8 6.58 3.8 11.98s4.1 9.78 9.2 9.78c5.3 0 8.85-3.73 8.85-9.04 0-.6-.07-1.05-.5-1.62z"
                            fill="#4285F4" />
                    </svg>
                    Continue with Google
                </button>

                <p class="terms-text">
                    By continuing you are agreeing to Virtual Internships's<br>
                    <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a> and confirming that you're<br>
                    above 18 years of age.
                </p>
            </div>
        </div>

        <div class="right opacity-30 pointer-events-none">
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
            </div>
        </div>

        <!-- Verification Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
            <div class="bg-white rounded-2xl pt-10 pb-8 px-10 w-full max-w-md shadow-xl relative">

                <!-- Close -->
                <a href="{{ route('get_started') }}"
                    class="absolute top-5 right-5 text-gray-400 hover:text-gray-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>

                <!-- Title -->
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Verify your email</h2>

                <!-- Subtitle -->
                <p class="text-gray-500 text-sm leading-relaxed mb-7">
                    Please enter the OTP(one time password) sent to
                    <br>
                    <span class="text-gray-800 font-semibold break-all">{{ session('pending_user_email') }}</span>
                </p>

                <form @submit.prevent="$wire.code = otp.join(''); $wire.verify()" x-data="{
                        otp: ['','','','','',''],
                        focus(i) { $refs['otp'+i]?.focus() },
                        handleInput(i, e) {
                            const v = e.target.value.replace(/\D/,'');
                            this.otp[i] = v;
                            e.target.value = v;
                            $wire.code = this.otp.join('');
                            if (v && i < 5) this.focus(i+1);
                        },
                        handleKey(i, e) {
                            if (e.key === 'Backspace' && !this.otp[i] && i > 0) {
                                this.focus(i-1);
                                $wire.code = this.otp.join('');
                            }
                        },
                        handlePaste(e) {
                            const digits = e.clipboardData.getData('text').replace(/\D/g,'').slice(0,6).split('');
                            digits.forEach((d,i) => { this.otp[i] = d; });
                            $wire.code = this.otp.join('');
                            this.focus(Math.min(digits.length, 5));
                            e.preventDefault();
                        }
                    }">

                    <!-- OTP Inputs -->
                    <div class="flex gap-3 justify-between mb-7">
                        <template x-for="i in [0,1,2,3,4,5]" :key="i">
                            <input :x-ref="'otp'+i" type="text" inputmode="numeric" maxlength="1" :value="otp[i]"
                                @input="handleInput(i, $event)" @keydown="handleKey(i, $event)"
                                @paste="i === 0 && handlePaste($event)" class="w-12 h-14 text-center text-xl font-bold text-gray-900
                                       border border-gray-300 rounded-xl
                                       focus:border-2 focus:border-gray-900 focus:outline-none
                                       transition-all duration-150 bg-white" />
                        </template>
                    </div>

                    @error('code')
                        <p class="text-red-500 text-sm mb-4 text-center">{{ $message }}</p>
                    @enderror

                    @if (session('status') == 'verification-code-sent')
                        <p class="text-green-600 text-sm mb-4 text-center">
                            A new verification code has been sent!
                        </p>
                    @endif

                    <!-- Confirm Button -->
                    <button type="submit" class="w-full bg-gray-900 hover:bg-black text-white py-3.5 rounded-xl
                               font-semibold text-base transition-colors duration-200 mb-3">
                        Confirm
                    </button>

                    <!-- Resend Timer -->
                    <div x-data="{ timer: 57, interval: null }"
                        x-init="interval = setInterval(() => { if (timer > 0) timer--; else clearInterval(interval) }, 1000)">

                        <button type="button" :disabled="timer > 0"
                            @click="if(timer === 0){ $wire.resendCode(); timer = 57; clearInterval(interval); interval = setInterval(() => { if(timer > 0) timer--; else clearInterval(interval) }, 1000) }"
                            class="w-full border border-gray-200 rounded-xl py-3.5 text-sm font-medium
                                   text-gray-700 hover:bg-gray-50 disabled:opacity-60 disabled:cursor-not-allowed
                                   transition-colors duration-200">
                            <span x-show="timer > 0">Resend OTP in <span x-text="timer"></span>s</span>
                            <span x-show="timer === 0">Resend OTP</span>
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Background Particle Script (Copied from get-started) -->
    <script>
        const canvas = document.getElementById('particles-canvas');
        const ctx = canvas.getContext('2d');
        const right = document.querySelector('.right');

        function resize() {
            if (!right) return;
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
</div>









