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
            padding: clamp(100px, 9.4vw, 180px) clamp(24px, 4.2vw, 80px) clamp(30px, 3.1vw, 60px);
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
            margin-bottom: 10px;
            align-self: center;
            width: 100%;
            max-width: 440px;
            text-align: left;
        }

        .heading h1 {
            font-size: clamp(1.4rem, 1.6vw, 1.95rem);
            font-weight: 700;
            color: #444444;
            line-height: 1.2;
            margin-top: 4px;
        }

        .heading h1 .accent {
            color: #2ab5b0;
        }

        .subheading {
            font-size: 0.95rem;
            color: #6b7280;
            margin-bottom: 40px;
            align-self: center;
            width: 100%;
            max-width: 440px;
            text-align: left;
        }

        /* ── SECTION LABEL ── */
        .section-label {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            color: #9ca3af;
            text-transform: uppercase;
            margin-bottom: 18px;
            align-self: center;
            width: 100%;
            max-width: 440px;
            text-align: left;
        }

        /* ── OPTION CARDS ── */
        .options {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 32px;
            width: 100%;
            max-width: min(470px, 100%);
            align-self: center;
        }

        .option-card {
            border: 1.5px solid #e6e9ec;
            border-radius: 12px;
            padding: 20px 20px 18px 20px;
            cursor: pointer;
            transition: all 0.18s ease;
            position: relative;
            background: #fff;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .option-card:hover {
            border-color: #2ab5b0;
            box-shadow: 0 4px 16px rgba(42, 181, 176, 0.15);
        }

        .option-header {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .option-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 24px;
        }

        .icon-blue {
            background: #f3f4f6;
            color: #03b1ac;
        }

        .icon-teal {
            background: #f3f4f6;
            color: #03b1ac;
        }

        .option-icon svg {
            fill: currentColor;
        }

        .option-content {
            flex: 1;
        }

        .option-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1a2e35;
            margin-bottom: 6px;
        }

        .option-desc {
            font-size: 0.9rem;
            color: #6b7280;
            line-height: 1.5;
        }

        .option-info {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1.5px solid #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #9ca3af;
            flex-shrink: 0;
            margin-left: auto;
        }

        .option-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            background: #f3f4f6;
            border-radius: 6px;
            font-size: 0.78rem;
            color: #4b5563;
            white-space: nowrap;
        }

        .tag-icon {
            font-size: 14px;
            color: #6b7280;
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


        /* ══════════════════════════════════════
           RIGHT SIDE — SUBTLE ANIMATED BG
        ══════════════════════════════════════ */

        /* Base gradient — same light blue family as original */
        .right-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(145deg, #ddf0fb 0%, #c8e8f7 40%, #d4eef9 70%, #e2f4fd 100%);
            z-index: 0;
        }

        /* Slow soft light orbs */
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

        /* Decorative blob */
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

        /* Canvas for particles */
        #particles-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
            pointer-events: none;
        }

        /* Right content sits above everything */
        .right-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 600px;
            padding: clamp(40px, 4.2vw, 80px) clamp(24px, 3.1vw, 60px) clamp(30px, 3.1vw, 60px);
        }

        /* Profile avatars */
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

        /* Stats heading */
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

        /* Trust section */
        .trust-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #1a2e35;
            margin-bottom: 40px;
        }

        /* University logos */
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

        /* Large desktops below 1920 */
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

        /* Tablet / narrow desktop */
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
            .subheading,
            .section-label,
            .footer-link {
                max-width: 100%;
            }

            .options {
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

        /* Smaller tablets */
        @media (max-width: 900px) {
            .left {
                padding: 90px 30px 30px;
            }

            .option-icon {
                width: 44px;
                height: 44px;
                font-size: 20px;
            }

            .option-icon svg {
                width: 20px;
                height: 20px;
            }

            .stats-heading {
                font-size: 1.5rem;
            }

            .logos {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px 30px;
            }
        }

        /* Mobile landscape / large phones */
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
                font-size: 1.35rem;
            }

            .subheading {
                font-size: 0.88rem;
                margin-bottom: 24px;
            }

            .option-card {
                padding: 16px;
            }

            .option-title {
                font-size: 0.95rem;
            }

            .option-desc {
                font-size: 0.82rem;
            }

            .tag {
                padding: 5px 8px;
                font-size: 0.72rem;
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

        /* Small phones */
        @media (max-width: 480px) {
            .left {
                padding: 72px 16px 20px;
            }

            .right-content {
                padding: 30px 16px 24px;
            }

            .heading h1 {
                font-size: 1.2rem;
            }

            .option-header {
                gap: 10px;
            }

            .option-icon {
                width: 38px;
                height: 38px;
            }

            .option-icon svg {
                width: 18px;
                height: 18px;
            }

            .options {
                gap: 14px;
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

            .footer-link {
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

        <!-- LEFT COLUMN — UNTOUCHED -->
        <div class="left">

            <!-- Heading -->
            <div class="heading">
                <h1>Start Your <span class="accent">Internship</span> Journey</h1>
            </div>
            <p class="subheading">And gain experience to be career-ready</p>

            <!-- Section -->
            <div class="section-label">I am applying</div>

            <!-- Options -->
            <div class="options">

                <!-- Option 1: Through a partnership -->
                <a href="{{ route('find_batch') }}" class="option-card" style="text-decoration: none; color: inherit;">
                    <div class="option-header">
                        <div class="option-icon icon-blue">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                <path
                                    d="M12 3L1 9L12 15L21 10.09V17H23V9M5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z" />
                            </svg>
                        </div>
                        <div class="option-content">
                            <div class="option-title">Through a partnership</div>
                            <div class="option-desc">Select this if you are applying through an institution which has a
                                partnership with Virtual Internships</div>
                        </div>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9" stroke="#6b7280" stroke-width="2" />
                            <path d="M12 10V16" stroke="#6b7280" stroke-width="2" stroke-linecap="round" />
                            <circle cx="12" cy="7" r="1.5" fill="#6b7280" />
                        </svg>
                    </div>
                    <div class="option-tags">
                        <span class="tag">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M12 8.5A3.5 3.5 0 1 1 12 15.5A3.5 3.5 0 0 1 12 8.5Z" stroke="#6b7280"
                                    stroke-width="2" />
                                <path
                                    d="M19.4 15A7.9 7.9 0 0 0 20 12A7.9 7.9 0 0 0 19.4 9L21 7L17 3L15 4.6A7.9 7.9 0 0 0 12 4A7.9 7.9 0 0 0 9 4.6L7 3L3 7L4.6 9A7.9 7.9 0 0 0 4 12A7.9 7.9 0 0 0 4.6 15L3 17L7 21L9 19.4A7.9 7.9 0 0 0 12 20A7.9 7.9 0 0 0 15 19.4L17 21L21 17L19.4 15Z"
                                    stroke="#6b7280" stroke-width="2" stroke-linejoin="round" />
                            </svg> Special programs
                        </span>
                        <span class="tag">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M3 9V7A2 2 0 0 1 5 5H19A2 2 0 0 1 21 7V9C19.9 9 19 9.9 19 11C19 12.1 19.9 13 21 13V15A2 2 0 0 1 19 17H5A2 2 0 0 1 3 15V13C4.1 13 5 12.1 5 11C5 9.9 4.1 9 3 9Z"
                                    stroke="#6b7280" stroke-width="2" stroke-linejoin="round" />
                                <path d="M12 7V17" stroke="#6b7280" stroke-width="2" stroke-dasharray="2 2" />
                            </svg> Support & assistance
                        </span>
                    </div>
                </a>

                <!-- Option 2: Independently -->
                <div class="option-card" onclick="location.href='{{ route('get_started') }}'" role="button"
                    tabindex="0">
                    <div class="option-header">
                        <div class="option-icon icon-teal">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                <path
                                    d="M12 4C14.21 4 16 5.79 16 8C16 10.21 14.21 12 12 12C9.79 12 8 10.21 8 8C8 5.79 9.79 4 12 4M12 14C16.42 14 20 15.79 20 18V20H4V18C4 15.79 7.58 14 12 14Z" />
                            </svg>
                        </div>
                        <div class="option-content">
                            <div class="option-title">Independently</div>
                            <div class="option-desc">Select this if you are a student applying independently</div>
                        </div>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9" stroke="#6b7280" stroke-width="2" />
                            <path d="M12 10V16" stroke="#6b7280" stroke-width="2" stroke-linecap="round" />
                            <circle cx="12" cy="7" r="1.5" fill="#6b7280" />
                        </svg>
                    </div>
                    <div class="option-tags">
                        <span class="tag">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="5" width="18" height="16" rx="2" stroke="#6b7280" stroke-width="2" />
                                <path d="M16 3V7M8 3V7M3 11H21" stroke="#6b7280" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            Flexible start date
                        </span>
                        <span class="tag">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="9" stroke="#6b7280" stroke-width="2" />
                                <path d="M3 12H21M12 3C15 7 15 17 12 21M12 3C9 7 9 17 12 21" stroke="#6b7280"
                                    stroke-width="2" stroke-linecap="round" />
                            </svg>
                            Global opportunities
                        </span>
                        <span class="tag">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M20 12L12 20L4 12V4H12L20 12Z" stroke="#6b7280" stroke-width="2"
                                    stroke-linejoin="round" />
                                <circle cx="8" cy="8" r="1.5" fill="#6b7280" />
                            </svg> Program fees
                        </span>
                    </div>
                </div>

            </div>

            <!-- Footer link -->
            <a href="{{ route('choose_path') }}" class="footer-link">
                <svg width="24" height="24" viewBox="0 0 72 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M70 10H20V4L2 12L20 20V14H70V10Z" fill="black" />
                </svg>
                <span>Not a student? Continue as a company</span>
            </a>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="right">

            <!-- Background layers -->
            <div class="right-bg"></div>

            <div class="orbs">
                <div class="orb orb-1"></div>
                <div class="orb orb-2"></div>
                <div class="orb orb-3"></div>
                <div class="orb orb-4"></div>
            </div>

            <!-- Morphing blob (same position as original) -->
            <div class="blob"></div>

            <!-- Particle canvas -->
            <canvas id="particles-canvas"></canvas>

            <!-- Content — same HTML as original -->
            <div class="right-content">

                <!-- Profile avatars -->
                <div class="avatars">
                    <div class="avatar"><img src="{{ asset('images/Avatars/Youness.jpg') }}" alt="Intern 2"></div>
                    <div class="avatar-special"><img src="{{ asset('images/Avatars/Mohmmed.png') }}" alt="Intern 3">
                    </div>
                </div>

                <!-- Stats -->
                <h2 class="stats-heading">
                    <span class="highlight">10,000+ interns</span> launch their<br>
                    careers with us every month
                </h2>

                <!-- Trust -->
                <p class="trust-title">Trusted by education providers worldwide</p>

                <!-- University logos -->
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
                this.vy = rand(-0.4, -0.15);   // float upward
                this.life = 0;
                this.maxLife = rand(200, 420);
                /* soft teal / sky / white */
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
                p.life = Math.floor(rand(0, p.maxLife)); // stagger start
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