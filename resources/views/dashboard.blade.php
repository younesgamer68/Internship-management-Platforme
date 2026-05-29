<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - InternLink</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #0b0f19 0%, #111827 50%, #1e1b4b 100%);
            min-height: 100vh;
            color: #f1f5f9;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.45);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5);
        }

        .header-gradient {
            background: linear-gradient(135deg, #2ab5b0 0%, #6366f1 100%);
        }

        .avatar-glow {
            box-shadow: 0 0 25px rgba(42, 181, 176, 0.35);
        }
    </style>
</head>
<body class="p-4 md:p-8 flex items-center justify-center">
    <div class="w-full max-w-5xl animate-enter">
        
        <!-- Top Navigation / Greeting -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-cyan-500 to-rose-500 p-0.5">
                    <div class="w-full h-full bg-slate-950 rounded-[10px] flex items-center justify-center">
                        <span class="text-lg font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-rose-400">IL</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">InternLink Workspace</h1>
                    <p class="text-xs text-slate-400">Google Authentication Status: <span class="text-emerald-400 font-semibold">Active <i class="bi bi-shield-check"></i></span></p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                    <span class="w-2 h-2 inline-block rounded-full bg-emerald-400 mr-1.5 animate-pulse"></span> {{ auth()->user()->status ?? 'Active' }}
                </span>
                <span class="px-3.5 py-1.5 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                    <i class="bi bi-person-badge mr-1"></i> {{ auth()->user()->role ?? 'User' }}
                </span>
            </div>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Sidebar Profile Card -->
            <div class="lg:col-span-1 flex flex-col gap-6">
                <!-- User Profile Summary -->
                <div class="glass-card rounded-3xl p-6 text-center">
                    <div class="relative w-28 h-28 mx-auto mb-6">
                        @if(auth()->user()->avatar)
                            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" class="w-full h-full rounded-2xl object-cover border-2 border-cyan-400 avatar-glow">
                        @else
                            <div class="w-full h-full rounded-2xl bg-gradient-to-tr from-cyan-500 to-indigo-500 flex items-center justify-center text-4xl font-extrabold text-white avatar-glow">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    
                    <h2 class="text-xl font-bold text-white mb-1">{{ auth()->user()->name ?? 'No Name Provided' }}</h2>
                    <p class="text-sm text-slate-400 mb-6">{{ auth()->user()->email }}</p>

                    <div class="space-y-3.5 pt-6 border-t border-slate-800 text-left">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400">User ID</span>
                            <span class="font-mono text-slate-200">{{ auth()->user()->user_id ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400">Google ID</span>
                            <span class="font-mono text-slate-200 text-right truncate max-w-[150px]" title="{{ auth()->user()->google_id }}">{{ auth()->user()->google_id ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400">Join Date</span>
                            <span class="text-slate-200">{{ auth()->user()->join_date ? \Carbon\Carbon::parse(auth()->user()->join_date)->format('M d, Y') : 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400">Last Login</span>
                            <span class="text-slate-200">{{ auth()->user()->last_login ? \Carbon\Carbon::parse(auth()->user()->last_login)->diffForHumans() : 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Google Account Integration Info -->
                <div class="glass-card rounded-3xl p-6">
                    <h3 class="text-sm font-bold text-slate-300 uppercase tracking-wider mb-4"><i class="bi bi-google mr-1.5"></i> Connected Provider</h3>
                    <div class="flex items-center gap-3.5 bg-slate-900/60 rounded-2xl p-4 border border-slate-800">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyan-400 to-blue-500 flex items-center justify-center text-white text-lg">
                            <i class="bi bi-google"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-white">Google Account</h4>
                            <p class="text-xs text-slate-400">Provider: {{ auth()->user()->provider ?? 'google' }}</p>
                        </div>
                    </div>

                    <!-- Log Out Action -->
                    <div class="mt-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center justify-center gap-2.5 py-3.5 px-4 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 font-bold rounded-2xl border border-rose-500/20 transition-all transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer">
                                <i class="bi bi-box-arrow-right text-lg"></i> Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Profile Details and Metadata -->
            <div class="lg:col-span-2 flex flex-col gap-8">
                <!-- User Metadata Details Card -->
                <div class="glass-card rounded-3xl p-6 md:p-8">
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <i class="bi bi-card-text text-cyan-400"></i> Workspace Profile Details
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Role -->
                        <div class="flex flex-col gap-1.5 bg-slate-900/40 border border-slate-800/80 rounded-2xl p-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wider">Role</span>
                            <span class="text-base font-semibold text-slate-200">{{ auth()->user()->role_name ?? 'User' }}</span>
                        </div>
                        <!-- Phone Number -->
                        <div class="flex flex-col gap-1.5 bg-slate-900/40 border border-slate-800/80 rounded-2xl p-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wider">Phone Number</span>
                            <span class="text-base font-semibold text-slate-200">{{ auth()->user()->phone_number ?? 'Not provided' }}</span>
                        </div>
                        <!-- Department -->
                        <div class="flex flex-col gap-1.5 bg-slate-900/40 border border-slate-800/80 rounded-2xl p-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wider">Department</span>
                            <span class="text-base font-semibold text-slate-200">{{ auth()->user()->department ?? 'Not assigned' }}</span>
                        </div>
                        <!-- Position -->
                        <div class="flex flex-col gap-1.5 bg-slate-900/40 border border-slate-800/80 rounded-2xl p-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wider">Position</span>
                            <span class="text-base font-semibold text-slate-200">{{ auth()->user()->position ?? 'Not assigned' }}</span>
                        </div>
                        <!-- Line Manager -->
                        <div class="flex flex-col gap-1.5 bg-slate-900/40 border border-slate-800/80 rounded-2xl p-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wider">Line Manager</span>
                            <span class="text-base font-semibold text-slate-200">{{ auth()->user()->line_manager ?? 'None' }}</span>
                        </div>
                        <!-- Second Line Manager -->
                        <div class="flex flex-col gap-1.5 bg-slate-900/40 border border-slate-800/80 rounded-2xl p-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wider">Second Line Manager</span>
                            <span class="text-base font-semibold text-slate-200">{{ auth()->user()->seconde_line_manager ?? 'None' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Welcome Info Banner -->
                <div class="bg-gradient-to-r from-cyan-500/20 to-indigo-500/20 border border-cyan-500/20 rounded-3xl p-6 md:p-8 flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-400/20 flex items-center justify-center text-cyan-400 text-2xl flex-shrink-0">
                        <i class="bi bi-party-fill"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white mb-2">Setup Complete!</h4>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            Google Single Sign-On (SSO) is successfully configured using Laravel Socialite. You are securely logged in and authenticated. Any updates to your profile will automatically sync upon next sign-in.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
