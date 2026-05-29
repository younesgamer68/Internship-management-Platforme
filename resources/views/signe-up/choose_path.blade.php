<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Choose Path</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
        }

        .stage {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden
        }

        .scene {
            position: absolute;
            left: 50%;
            top: 45%;
            width: 1280px;
            height: 720px;
            transform: translate(-50%, -50%) scale(var(--scene-scale, 1));
            transform-origin: center center
        }

        .avatar {
            position: absolute;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform .3s ease, box-shadow .3s ease;
            background: transparent
        }

        .avatar img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: contain
        }

        .av1 {
            border: 2px solid #fff;
            width: 120px;
            height: 120px;
            top: 170px;
            left: 150px
        }

        .av2 {
            border: 2px solid #fff;
            width: 120px;
            height: 120px;
            top: 170px;
            right: 150px
        }

        .av3 {
            width: 120px;
            height: 120px;
            top: 390px;
            left: 50px
        }

        .av4 {
            width: 120px;
            height: 120px;
            top: 390px;
            right: 50px;
            border: 2px solid #fff;
            box-sizing: border-box
        }

        .av5 {
            border: 2px solid #fff;
            width: 120px;
            height: 120px;
            bottom: 10px;
            left: 145px
        }

        .av6 {
            border: 2px solid #fff;
            width: 120px;
            height: 120px;
            bottom: 10px;
            right: 145px
        }

        /* Individual image scaling */
        .av1 img {
            transform: scale(1);
        }

        .av2 img {
            transform: scale(1);
        }

        .av3 img {
            transform: scale(1.4);
        }

        .av4 img {
            transform: scale(1.3);
        }

        .av5 img {
            transform: scale(1);
        }

        .av6 img {
            transform: scale(1.2);
        }

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 720px;
            padding: 120px 20px 40px;
            position: relative;
            z-index: 2
        }

        /* Logo wrapper: centered, glass background, responsive */
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

        .cards img {
            height: 200px;
        }

        .logo-wrapper>* {
            display: block;
            max-width: 220px;
            height: auto;
        }

        @media (max-width: 768px) {
            .logo-wrapper {
                top: 16px;
                padding: 6px 10px;
            }

            .logo-wrapper>* {
                max-width: 160px;
            }

            .main {
                padding-top: 100px;
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #444444;
            text-align: center;
            line-height: 1.3;
            max-width: 660px;
            margin-bottom: 36px
        }

        h1 .accent {
            color: #2ab5b0
        }

        .subtitle {
            font-size: 1rem;
            color: #444;
            font-weight: 600;
            margin-bottom: 28px
        }

        .cards {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
            justify-content: center
        }

        .cards img {
            height: 170px;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            width: 300px;
            padding: 1px 28px 26px;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            transition: box-shadow .25s, transform .25s;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .06)
        }

        .card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, .13);
            transform: translateY(-4px)
        }

        .admin-btn-wrap {
            margin-top: 18px;
            display: flex;
            justify-content: center;
        }

        .admin-btn {
            font-size: .8rem;
            font-weight: 600;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 999px;
            padding: 8px 14px;
            background: #ffffff;
            text-decoration: none;
            transition: all .18s ease;
        }

        .admin-btn:hover {
            color: #111827;
            border-color: #9ca3af;
            transform: translateY(-1px);
        }

        .card-icon {
            font-size: 72px;
            margin-bottom: 28px;
            min-height: 90px;
            display: flex;
            align-items: center
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto
        }

        .card-label {
            font-size: .95rem;
            font-weight: 600;
            color: #1a2e35;
            line-height: 1.4;
            max-width: 200px
        }

        .arrow {
            font-size: 1.4rem;
            color: #555;
            flex-shrink: 0
        }
    </style>
</head>

<body>
    <div class="logo-wrapper">
        <x-logo variant="landing" size="lg" href="/" />
    </div>

    <div class="stage">
        <div class="scene">
            <div class="avatar av1"><img src="{{ asset('images/Avatars/Untitled-3.png') }}" alt="avatar"></div>
            <div class="avatar av2"><img src="{{ asset('images/Gifs/Avatar asian woman.gif') }}" alt="avatar"></div>
            <div class="avatar av3"><img src="{{ asset('images/Gifs/ae.gif') }}" alt="avatar"></div>
            <div class="avatar av4"><img src="{{ asset('images/Gifs/Doctor Avatar.gif') }}" alt="avatar"></div>
            <div class="avatar av5"><img src="{{ asset('images/Avatars/Untitled-5.png') }}" alt="avatar"></div>
            <div class="avatar av6"><img src="{{ asset('images/Avatars/Untitled-4.png') }}" alt="avatar"></div>

            <div class="main">
                <h1>The #1 Platform for <span class="accent">Guaranteed</span><br>Remote Internships</h1>
                <p class="subtitle">What are you looking for?</p>

                <div class="cards">
                    <div class="card" onclick="location.href='{{ route('choose_intership') }}'">
                        <img src="https://assets.virtualinternships.com/main-app/images/Common/graduation-hat.svg"
                            alt="Student icon" class="card-icon">
                        <div class="card-footer">
                            <span class="card-label">I'm looking for an internship</span>
                            <span class="arrow">→</span>
                        </div>
                    </div>

                    <div class="card" onclick="location.href='{{ route('get_started_company') }}'">
                        <img src="https://assets.virtualinternships.com/main-app/images/Common/online-study.svg"
                            alt="Company icon" class="card-icon">
                        <div class="card-footer">
                            <span class="card-label">I'm looking for an intern for my company</span>
                            <span class="arrow">→</span>
                        </div>
                    </div>
                </div>

                <div class="admin-btn-wrap">
                    <a class="admin-btn" href="{{ route('admin.login') }}">am admin</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const scene = document.querySelector('.scene');
        function updateSceneScale() { const scale = Math.min(window.innerWidth / 1280, window.innerHeight / 720, 1); scene.style.setProperty('--scene-scale', scale.toFixed(4)) }
        updateSceneScale(); window.addEventListener('resize', updateSceneScale);
    </script>
</body>

</html>