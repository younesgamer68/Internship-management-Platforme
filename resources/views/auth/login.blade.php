<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - InternLink</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #311042 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            opacity: 0.6;
            animation: float 20s ease-in-out infinite alternate;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.4) 0%, transparent 70%);
            top: -100px;
            left: -100px;
            animation-duration: 25s;
        }

        .orb-2 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.4) 0%, transparent 70%);
            bottom: -150px;
            right: -150px;
            animation-duration: 30s;
            animation-delay: -5s;
        }

        .orb-3 {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.3) 0%, transparent 70%);
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-duration: 20s;
            animation-delay: -10s;
        }

        @keyframes float {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            50% {
                transform: translate(40px, -60px) scale(1.1);
            }
            100% {
                transform: translate(-20px, 20px) scale(0.95);
            }
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .btn-google-custom {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #e11d48 0%, #be123c 100%);
            border: none;
        }

        .btn-google-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(225, 29, 72, 0.5);
            background: linear-gradient(135deg, #f43f5e 0%, #e11d48 100%);
        }
    </style>
</head>
<body class="relative flex items-center justify-center p-4">
    <!-- Floating Background Orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="relative z-10 w-full max-w-md animate-enter">
        <!-- Logo Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-cyan-500 to-rose-500 p-0.5 shadow-lg shadow-cyan-500/10 mb-4">
                <div class="w-full h-full bg-slate-950 rounded-[14px] flex items-center justify-center">
                    <span class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-rose-400">IL</span>
                </div>
            </div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Welcome Back</h1>
            <p class="text-slate-400 mt-2">Sign in to manage your internships</p>
        </div>

        <!-- Glass Login Card -->
        <div class="glass-card rounded-3xl p-8 md:p-10">
            <!-- Errors Alert -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-sm">
                    <div class="flex items-start gap-2.5">
                        <i class="bi bi-exclamation-triangle-fill text-base flex-shrink-0 mt-0.5"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <p class="font-medium">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Google Login Button -->
            <div class="space-y-6">
                <div class="text-center text-slate-300 text-sm mb-4">
                    Continue with your secure Google account
                </div>

                <a href="{{ route('google.login') }}" class="btn btn-danger w-100 btn-google-custom flex items-center justify-center gap-3 py-4 px-6 text-white font-bold rounded-2xl cursor-pointer">
                    <i class="bi bi-google text-xl"></i> Login with Google
                </a>
            </div>

            <!-- Footer Links -->
            <div class="mt-8 pt-6 border-t border-slate-800 text-center text-xs text-slate-400">
                <p>By signing in, you agree to our <a href="#" class="text-cyan-400 hover:underline">Terms of Service</a> & <a href="#" class="text-cyan-400 hover:underline">Privacy Policy</a></p>
            </div>
        </div>

        <!-- Back Link -->
        <div class="text-center mt-6">
            <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors">
                <i class="bi bi-arrow-left"></i> Back to Homepage
            </a>
        </div>
    </div>
</body>
</html>
