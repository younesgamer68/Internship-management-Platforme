<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Step indicator animations */
        .step-dot {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .step-dot.active {
            background: #0d9488;
            border-color: #0d9488;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.15);
        }
        .step-dot.completed {
            background: #0d9488;
            border-color: #0d9488;
        }
        .step-connector {
            transition: background 0.5s ease;
        }

        /* Form section transitions */
        .form-section {
            display: none;
            opacity: 0;
            transform: translateX(20px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        .form-section.active {
            display: block;
        }
        .form-section.visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* Input focus animations */
        .form-input {
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .form-input:focus {
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        /* File upload zone */
        .upload-zone {
            transition: border-color 0.2s ease, background 0.2s ease;
        }
        .upload-zone:hover, .upload-zone.drag-over {
            border-color: #0d9488;
            background: rgba(13, 148, 136, 0.03);
        }

        /* Progress bar */
        .progress-fill {
            transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Floating label effect */
        .form-group label {
            transition: color 0.2s ease;
        }
        .form-group:focus-within label {
            color: #0d9488;
        }

        /* Shake animation for validation errors */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-6px); }
            40% { transform: translateX(6px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        /* Error field transitions */
        .field-error {
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Modal backdrop */
        .logout-backdrop {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .logout-backdrop.active {
            opacity: 1;
            pointer-events: auto;
        }
        .logout-panel {
            transform: scale(0.95) translateY(10px);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .logout-backdrop.active .logout-panel {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen text-gray-900 antialiased">

<section class="flex min-h-screen bg-gray-50 font-sans">

    {{-- Sidebar --}}
    <aside class="w-56 min-h-screen bg-white border-r border-gray-200 flex flex-col py-6 px-4 fixed left-0 top-0 z-10">

        {{-- Logo --}}
        <div class="flex items-center gap-2 mb-10 px-2">
            <img src="{{ asset('images/Logos/TLM.png') }}" alt="TLM Logo" class="h-10 w-auto">
        </div>

        {{-- Nav Items --}}
        <nav class="flex flex-col gap-1 flex-1">
            @php
                $navItems = [
                    ['icon' => 'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z', 'label' => 'Dashboard', 'active' => false, 'route' => 'home'],
                    ['icon' => 'M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z', 'label' => 'Opportunities', 'active' => false, 'route' => 'intern.opportunities'],
                    ['icon' => 'M9 12h6M9 16h6M9 8h6M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z', 'label' => 'Applications', 'active' => true, 'route' => '#'],
                    ['icon' => 'M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z', 'label' => 'Profile', 'active' => false, 'route' => '#'],
                    ['icon' => 'M9 17v-6h13M9 11V5H3v6M3 17h6M15 5v6', 'label' => 'Placement Tracker', 'active' => false, 'route' => '#'],
                    ['icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'label' => 'Manage Internships', 'active' => false, 'route' => '#'],
                    ['icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1', 'label' => 'CareerBridge', 'active' => false, 'route' => '#'],
                    ['icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'label' => 'Interview Availability', 'active' => false, 'route' => '#'],
                    ['icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Settings', 'active' => false, 'route' => '#'],
                    ['icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z', 'label' => 'Refer a Friend', 'active' => false, 'route' => '#'],
                ];
            @endphp

            @foreach ($navItems as $item)
                @if($item['label'] === 'Applications' || $item['label'] === 'Opportunities')
                    <a href="{{ $item['route'] !== '#' ? route($item['route']) : '#' }}"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors
                              {{ $item['active']
                                  ? 'bg-gray-100 font-semibold border-l-4 border-teal-500'
                                  : 'hover:bg-gray-50' }}"
                       style="color: {{ $item['active'] ? '#444444' : '#7b7b7b' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                        </svg>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @else
                    <div class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm cursor-not-allowed select-none" style="color: #7b7b7b; opacity: 0.6">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                        </svg>
                        <span>{{ $item['label'] }}</span>
                    </div>
                @endif
            @endforeach
        </nav>

        {{-- Logout --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); openLogoutModal();" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-500 hover:text-red-500 hover:bg-red-50 transition-colors mt-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            Logout
        </a>
    </aside>

    {{-- Main Content --}}
    <div class="ml-56 flex-1 p-6 min-h-screen">

        {{-- Back button --}}
        <a href="{{ route('intern.opportunities') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-800 transition-colors mb-6 group">
            <svg class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Opportunities
        </a>

        {{-- 3 Steps Away Banner --}}
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 rounded-xl bg-gray-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold" style="color: #444444">You're 3 steps away from applying</h2>
                </div>

                <div class="flex flex-col gap-0 ml-2">
                    {{-- Step 1 --}}
                    <div class="relative flex items-start gap-4 pb-5">
                        <div style="position: absolute; left: 15px; top: 32px; bottom: -8px; width: 2px; background: #e5e7eb;"></div>
                        <div class="relative z-10 w-8 h-8 rounded-full border-2 border-teal-500 bg-teal-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="pt-1">
                            <p class="text-[10px] font-bold uppercase tracking-wider" style="color: #7b7b7b">Step 1</p>
                            <p class="text-sm font-semibold mt-0.5" style="color: #444444">Complete your application & profile</p>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="relative flex items-start gap-4 pb-5">
                        <div style="position: absolute; left: 15px; top: 32px; bottom: -8px; width: 2px; background: #e5e7eb;"></div>
                        <div class="relative z-10 w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center flex-shrink-0"></div>
                        <div class="pt-1">
                            <p class="text-[10px] font-bold uppercase tracking-wider" style="color: #7b7b7b">Step 2</p>
                            <p class="text-sm font-semibold mt-0.5" style="color: #444444">We'll review & approve your application</p>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="relative flex items-start gap-4 pb-5">
                        <div class="relative z-10 w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center flex-shrink-0"></div>
                        <div class="pt-1">
                            <p class="text-[10px] font-bold uppercase tracking-wider" style="color: #7b7b7b">Step 3</p>
                            <p class="text-sm font-semibold mt-0.5" style="color: #444444">Confirm enrollment</p>
                        </div>
                    </div>
                </div>

                {{-- Trophy unlock --}}
                <div class="flex items-center gap-3 mt-2 ml-2">
                    <div class="text-2xl">🏆</div>
                    <div>
                        <p class="text-xs font-medium" style="color: #7b7b7b">You unlock</p>
                        <p class="text-sm font-semibold text-teal-600">Show interest in any opportunity</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Header --}}
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <h1 class="text-2xl font-bold mb-1" style="color: #444444">Internship Application</h1>
                <p class="text-sm text-gray-400">Complete all the sections below to submit your application</p>
            </div>

            {{-- Progress Bar --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-400">Application Progress</p>
                    <span id="progressLabel" class="text-xs font-semibold text-teal-600">Step 1 of 4</span>
                </div>
                <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div id="progressBar" class="progress-fill h-full bg-gradient-to-r from-teal-400 to-teal-600 rounded-full" style="width: 25%"></div>
                </div>

                {{-- Step indicators --}}
                <div class="flex items-center justify-between mt-5">
                    <button onclick="goToStep(0)" class="flex flex-col items-center gap-1.5 group cursor-pointer">
                        <div class="step-dot w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center text-xs font-bold text-gray-400 active" data-step="0">
                            <svg class="w-4 h-4 hidden" fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>1</span>
                        </div>
                        <span class="text-[10px] font-semibold text-gray-500 group-hover:text-teal-600 transition-colors">Personal</span>
                    </button>
                    <div class="flex-1 h-0.5 bg-gray-100 mx-2 step-connector" data-connector="0"></div>
                    <button onclick="goToStep(1)" class="flex flex-col items-center gap-1.5 group cursor-pointer">
                        <div class="step-dot w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center text-xs font-bold text-gray-400" data-step="1">
                            <svg class="w-4 h-4 hidden" fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>2</span>
                        </div>
                        <span class="text-[10px] font-semibold text-gray-500 group-hover:text-teal-600 transition-colors">Education</span>
                    </button>
                    <div class="flex-1 h-0.5 bg-gray-100 mx-2 step-connector" data-connector="1"></div>
                    <button onclick="goToStep(2)" class="flex flex-col items-center gap-1.5 group cursor-pointer">
                        <div class="step-dot w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center text-xs font-bold text-gray-400" data-step="2">
                            <svg class="w-4 h-4 hidden" fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>3</span>
                        </div>
                        <span class="text-[10px] font-semibold text-gray-500 group-hover:text-teal-600 transition-colors">Experience</span>
                    </button>
                    <div class="flex-1 h-0.5 bg-gray-100 mx-2 step-connector" data-connector="2"></div>
                    <button onclick="goToStep(3)" class="flex flex-col items-center gap-1.5 group cursor-pointer">
                        <div class="step-dot w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center text-xs font-bold text-gray-400" data-step="3">
                            <svg class="w-4 h-4 hidden" fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>4</span>
                        </div>
                        <span class="text-[10px] font-semibold text-gray-500 group-hover:text-teal-600 transition-colors">Motivation</span>
                    </button>
                </div>
            </div>

            {{-- Form --}}
            <form id="internForm" action="{{ route('intern.application.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ===================== STEP 1: Personal Info ===================== --}}
                <div class="form-section active visible" data-section="0">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-bold text-gray-900">Personal Information</h2>
                                <p class="text-xs text-gray-400">Tell us a bit about yourself</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">First Name <span class="text-red-400">*</span></label>
                                <input type="text" name="first_name" value="{{ old('first_name', explode(' ', auth()->user()->name)[0] ?? '') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="John">
                            </div>
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Last Name <span class="text-red-400">*</span></label>
                                <input type="text" name="last_name" value="{{ old('last_name', explode(' ', auth()->user()->name)[1] ?? '') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="Doe">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Email Address</label>
                                <input type="email" value="{{ auth()->user()->email }}" readonly
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-100 bg-gray-50 text-sm text-gray-500 outline-none cursor-not-allowed">
                            </div>
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Phone Number <span class="text-red-400">*</span></label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="+1 (555) 000-0000">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Date of Birth <span class="text-red-400">*</span></label>
                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 outline-none">
                            </div>
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Gender</label>
                                <select name="gender" class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 outline-none bg-white">
                                    <option value="">Select…</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    <option value="prefer_not_to_say" {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Country <span class="text-red-400">*</span></label>
                                <input type="text" name="country" value="{{ old('country') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="United States">
                            </div>
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">City <span class="text-red-400">*</span></label>
                                <input type="text" name="city" value="{{ old('city') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="New York">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===================== STEP 2: Education ===================== --}}
                <div class="form-section" data-section="1">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-bold text-gray-900">Education</h2>
                                <p class="text-xs text-gray-400">Your academic background</p>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">University / Institution <span class="text-red-400">*</span></label>
                            <input type="text" name="university" value="{{ old('university') }}" required
                                   class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                   placeholder="Harvard University">
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Degree <span class="text-red-400">*</span></label>
                                <select name="degree" required class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 outline-none bg-white">
                                    <option value="">Select…</option>
                                    <option value="high_school" {{ old('degree') == 'high_school' ? 'selected' : '' }}>High School Diploma</option>
                                    <option value="associate" {{ old('degree') == 'associate' ? 'selected' : '' }}>Associate's Degree</option>
                                    <option value="bachelor" {{ old('degree') == 'bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                                    <option value="master" {{ old('degree') == 'master' ? 'selected' : '' }}>Master's Degree</option>
                                    <option value="phd" {{ old('degree') == 'phd' ? 'selected' : '' }}>PhD</option>
                                    <option value="other" {{ old('degree') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Field of Study <span class="text-red-400">*</span></label>
                                <input type="text" name="field_of_study" value="{{ old('field_of_study', auth()->user()->career_field ?? '') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="Computer Science">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Start Year <span class="text-red-400">*</span></label>
                                <input type="number" name="education_start_year" value="{{ old('education_start_year') }}" min="2000" max="2030" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="2022">
                            </div>
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Expected Graduation</label>
                                <input type="number" name="education_end_year" value="{{ old('education_end_year') }}" min="2000" max="2035"
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                       placeholder="2026">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">GPA (Optional)</label>
                            <input type="text" name="gpa" value="{{ old('gpa') }}"
                                   class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                   placeholder="3.8 / 4.0">
                        </div>
                    </div>
                </div>

                {{-- ===================== STEP 3: Experience & Skills ===================== --}}
                <div class="form-section" data-section="2">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-bold text-gray-900">Experience & Skills</h2>
                                <p class="text-xs text-gray-400">Your professional background and key skills</p>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Previous Experience</label>
                            <textarea name="experience" rows="3"
                                      class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none resize-none"
                                      placeholder="Briefly describe any relevant work experience, internships, or projects...">{{ old('experience') }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Key Skills <span class="text-red-400">*</span></label>
                            <input type="text" name="skills" value="{{ old('skills') }}" required
                                   class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                   placeholder="e.g. JavaScript, Python, Project Management, Figma">
                            <p class="text-[10px] text-gray-400 mt-1">Separate skills with commas</p>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">LinkedIn Profile</label>
                            <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}"
                                   class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                   placeholder="https://linkedin.com/in/yourprofile">
                        </div>

                        <div class="form-group mb-4">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Portfolio / Website</label>
                            <input type="url" name="portfolio_url" value="{{ old('portfolio_url') }}"
                                   class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none"
                                   placeholder="https://yourportfolio.com">
                        </div>

                        {{-- Resume Upload --}}
                        <div class="form-group">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Upload Resume / CV <span class="text-gray-400 font-normal">(Optional)</span></label>
                            <div id="uploadZone" class="upload-zone border-2 border-dashed border-gray-200 rounded-xl p-6 text-center cursor-pointer" onclick="document.getElementById('resumeInput').click()">
                                <input type="file" name="resume" id="resumeInput" class="hidden" accept=".pdf,.doc,.docx">
                                <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/>
                                </svg>
                                <p id="uploadText" class="text-xs text-gray-400">
                                    <span class="text-teal-600 font-semibold">Click to upload</span> or drag and drop
                                </p>
                                <p class="text-[10px] text-gray-300 mt-1">PDF, DOC up to 5MB</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===================== STEP 4: Motivation ===================== --}}
                <div class="form-section" data-section="3">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-bold text-gray-900">Motivation & Availability</h2>
                                <p class="text-xs text-gray-400">Help us understand your goals</p>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Why do you want this internship? <span class="text-red-400">*</span></label>
                            <textarea name="motivation" rows="4" required
                                      class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 placeholder-gray-300 outline-none resize-none"
                                      placeholder="Tell us what excites you about this opportunity and what you hope to gain from it...">{{ old('motivation') }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Preferred Start Date <span class="text-red-400">*</span></label>
                                <input type="date" name="preferred_start_date" value="{{ old('preferred_start_date') }}" required
                                       class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 outline-none">
                            </div>
                            <div class="form-group">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Availability <span class="text-red-400">*</span></label>
                                <select name="availability" required class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 outline-none bg-white">
                                    <option value="">Select…</option>
                                    <option value="full_time" {{ old('availability') == 'full_time' ? 'selected' : '' }}>Full-time (40h/week)</option>
                                    <option value="part_time" {{ old('availability') == 'part_time' ? 'selected' : '' }}>Part-time (20h/week)</option>
                                    <option value="flexible" {{ old('availability') == 'flexible' ? 'selected' : '' }}>Flexible</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">How did you hear about us?</label>
                            <select name="referral_source" class="form-input w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 outline-none bg-white">
                                <option value="">Select…</option>
                                <option value="social_media" {{ old('referral_source') == 'social_media' ? 'selected' : '' }}>Social Media</option>
                                <option value="university" {{ old('referral_source') == 'university' ? 'selected' : '' }}>University / Career Center</option>
                                <option value="friend" {{ old('referral_source') == 'friend' ? 'selected' : '' }}>Friend / Referral</option>
                                <option value="search_engine" {{ old('referral_source') == 'search_engine' ? 'selected' : '' }}>Search Engine</option>
                                <option value="other" {{ old('referral_source') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        {{-- Terms --}}
                        <div class="flex items-start gap-3 mt-6 p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <input type="checkbox" name="agree_terms" id="agreeTerms" required class="mt-0.5 w-4 h-4 accent-teal-600 rounded">
                            <label for="agreeTerms" class="text-xs text-gray-500 leading-relaxed">
                                I confirm that the information provided is accurate and I agree to the
                                <a href="#" class="text-teal-600 hover:text-teal-700 font-semibold">Terms of Service</a> and
                                <a href="#" class="text-teal-600 hover:text-teal-700 font-semibold">Privacy Policy</a>.
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Navigation Buttons --}}
                <div class="flex items-center justify-between mb-10">
                    <button type="button" id="prevBtn" onclick="changeStep(-1)" class="hidden items-center gap-2 px-5 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Previous
                    </button>
                    <div></div>
                    <button type="button" id="nextBtn" onclick="changeStep(1)" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold transition-colors shadow-sm">
                        Continue
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <button type="submit" id="submitBtn" class="hidden items-center gap-2 px-6 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Submit Application
                    </button>
                </div>
            </form>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                    <p class="text-xs font-bold text-red-600 mb-2">Please fix the following errors:</p>
                    <ul class="list-disc list-inside text-xs text-red-500 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

</section>

<script>
    let currentStep = 0;
    const totalSteps = 4;

    // Define required fields per step (name attribute → user-friendly label)
    const requiredFields = {
        0: [
            { name: 'first_name', label: 'First Name' },
            { name: 'last_name', label: 'Last Name' },
            { name: 'phone', label: 'Phone Number' },
            { name: 'date_of_birth', label: 'Date of Birth' },
            // gender is optional
            { name: 'country', label: 'Country' },
            { name: 'city', label: 'City' },
        ],
        1: [
            { name: 'university', label: 'University / Institution' },
            { name: 'degree', label: 'Degree' },
            { name: 'field_of_study', label: 'Field of Study' },
            { name: 'education_start_year', label: 'Start Year' },
            // education_end_year is optional
            // gpa is optional
        ],
        2: [
            // experience is optional
            { name: 'skills', label: 'Key Skills' },
            // linkedin_url is optional
            // portfolio_url is optional
            // resume is optional
        ],
        3: [
            { name: 'motivation', label: 'Motivation' },
            { name: 'preferred_start_date', label: 'Preferred Start Date' },
            { name: 'availability', label: 'Availability' },
            // referral_source is optional
            { name: 'agree_terms', label: 'Terms Agreement', type: 'checkbox' },
        ],
    };

    /**
     * Validate a single step. Returns true if valid.
     * Shows inline errors and red borders on invalid fields.
     */
    function validateStep(step) {
        const fields = requiredFields[step] || [];
        let isValid = true;

        // Clear previous errors for this step
        const section = document.querySelector(`.form-section[data-section="${step}"]`);
        section.querySelectorAll('.field-error').forEach(el => el.remove());
        section.querySelectorAll('.border-red-400').forEach(el => {
            el.classList.remove('border-red-400', 'ring-2', 'ring-red-100');
        });

        fields.forEach(field => {
            const el = document.querySelector(`[name="${field.name}"]`);
            if (!el) return;

            let empty = false;

            if (field.type === 'checkbox') {
                empty = !el.checked;
            } else if (field.type === 'file') {
                empty = !el.files || el.files.length === 0;
            } else if (el.tagName === 'SELECT') {
                empty = !el.value || el.value === '';
            } else {
                empty = !el.value.trim();
            }

            if (empty) {
                isValid = false;

                // Highlight the field
                if (field.type === 'file') {
                    const zone = document.getElementById('uploadZone');
                    zone.classList.add('border-red-400');
                    zone.classList.remove('border-gray-200');
                    // Add error below zone
                    if (!zone.parentElement.querySelector('.field-error')) {
                        const err = document.createElement('p');
                        err.className = 'field-error text-xs text-red-500 mt-1.5 flex items-center gap-1';
                        err.innerHTML = `<svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg> ${field.label} is required`;
                        zone.parentElement.appendChild(err);
                    }
                } else if (field.type === 'checkbox') {
                    const wrapper = el.closest('.flex');
                    if (wrapper && !wrapper.querySelector('.field-error')) {
                        wrapper.classList.add('ring-2', 'ring-red-100');
                        const err = document.createElement('p');
                        err.className = 'field-error text-xs text-red-500 mt-1.5 flex items-center gap-1 w-full';
                        err.innerHTML = `<svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg> You must accept the terms`;
                        wrapper.parentElement.appendChild(err);
                    }
                } else {
                    el.classList.add('border-red-400', 'ring-2', 'ring-red-100');
                    // Add error message below input
                    const parent = el.closest('.form-group');
                    if (parent && !parent.querySelector('.field-error')) {
                        const err = document.createElement('p');
                        err.className = 'field-error text-xs text-red-500 mt-1.5 flex items-center gap-1';
                        err.innerHTML = `<svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg> ${field.label} is required`;
                        parent.appendChild(err);
                    }
                }
            }
        });

        // Shake the section if invalid
        if (!isValid) {
            const card = section.querySelector('.bg-white');
            if (card) {
                card.style.animation = 'shake 0.4s ease';
                setTimeout(() => card.style.animation = '', 400);
            }
        }

        return isValid;
    }

    /**
     * Clear errors on a field when user starts typing / interacting
     */
    document.addEventListener('input', function(e) {
        const el = e.target;
        el.classList.remove('border-red-400', 'ring-2', 'ring-red-100');
        const parent = el.closest('.form-group');
        if (parent) {
            const err = parent.querySelector('.field-error');
            if (err) err.remove();
        }
    });

    document.addEventListener('change', function(e) {
        const el = e.target;
        // Handle file input
        if (el.type === 'file' && el.name === 'resume') {
            const zone = document.getElementById('uploadZone');
            zone.classList.remove('border-red-400');
            zone.classList.add('border-gray-200');
            const err = zone.parentElement.querySelector('.field-error');
            if (err) err.remove();
        }
        // Handle checkbox
        if (el.type === 'checkbox') {
            const wrapper = el.closest('.flex');
            if (wrapper) {
                wrapper.classList.remove('ring-2', 'ring-red-100');
                const parent = wrapper.parentElement;
                if (parent) {
                    const err = parent.querySelector('.field-error');
                    if (err) err.remove();
                }
            }
        }
        // Handle select
        if (el.tagName === 'SELECT') {
            el.classList.remove('border-red-400', 'ring-2', 'ring-red-100');
            const parent = el.closest('.form-group');
            if (parent) {
                const err = parent.querySelector('.field-error');
                if (err) err.remove();
            }
        }
    });

    function changeStep(direction) {
        const next = currentStep + direction;
        if (next < 0 || next >= totalSteps) return;

        // Only validate when moving FORWARD
        if (direction > 0) {
            if (!validateStep(currentStep)) return;
        }

        performStepTransition(next);
    }

    function goToStep(step) {
        if (step < 0 || step >= totalSteps) return;

        // If jumping forward, validate all steps up to (but not including) target
        if (step > currentStep) {
            for (let i = currentStep; i < step; i++) {
                if (!validateStep(i)) {
                    // Jump to the first failing step instead
                    if (i !== currentStep) {
                        performStepTransition(i);
                    }
                    return;
                }
            }
        }

        performStepTransition(step);
    }

    function performStepTransition(step) {
        // Hide current section
        const currentSection = document.querySelector(`.form-section[data-section="${currentStep}"]`);
        currentSection.classList.remove('visible');
        setTimeout(() => {
            currentSection.classList.remove('active');

            // Show new section
            currentStep = step;
            const newSection = document.querySelector(`.form-section[data-section="${currentStep}"]`);
            newSection.classList.add('active');
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    newSection.classList.add('visible');
                });
            });

            updateUI();
        }, 200);
    }

    function updateUI() {
        // Progress bar
        const progress = ((currentStep + 1) / totalSteps) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
        document.getElementById('progressLabel').textContent = `Step ${currentStep + 1} of ${totalSteps}`;

        // Step dots
        document.querySelectorAll('.step-dot').forEach((dot, i) => {
            const number = dot.querySelector('span');
            const check = dot.querySelector('svg');

            dot.classList.remove('active', 'completed');
            if (i < currentStep) {
                dot.classList.add('completed');
                number.classList.add('hidden');
                check.classList.remove('hidden');
            } else if (i === currentStep) {
                dot.classList.add('active');
                number.classList.remove('hidden');
                check.classList.add('hidden');
                number.style.color = 'white';
            } else {
                number.classList.remove('hidden');
                check.classList.add('hidden');
                number.style.color = '';
            }
        });

        // Step connectors
        document.querySelectorAll('.step-connector').forEach((conn, i) => {
            conn.style.background = i < currentStep ? '#0d9488' : '#e5e7eb';
        });

        // Buttons
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        if (currentStep === 0) {
            prevBtn.classList.add('hidden');
            prevBtn.classList.remove('inline-flex');
        } else {
            prevBtn.classList.remove('hidden');
            prevBtn.classList.add('inline-flex');
        }

        if (currentStep === totalSteps - 1) {
            nextBtn.classList.add('hidden');
            nextBtn.classList.remove('inline-flex');
            submitBtn.classList.remove('hidden');
            submitBtn.classList.add('inline-flex');
        } else {
            nextBtn.classList.remove('hidden');
            nextBtn.classList.add('inline-flex');
            submitBtn.classList.add('hidden');
            submitBtn.classList.remove('inline-flex');
        }

        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Final submit validation — make sure all 4 steps are valid
    document.getElementById('internForm').addEventListener('submit', function(e) {
        for (let i = 0; i < totalSteps; i++) {
            if (!validateStep(i)) {
                e.preventDefault();
                if (i !== currentStep) {
                    performStepTransition(i);
                }
                return;
            }
        }
    });

    // File upload label update
    document.getElementById('resumeInput').addEventListener('change', function() {
        const text = document.getElementById('uploadText');
        if (this.files.length > 0) {
            text.innerHTML = `<span class="text-teal-600 font-semibold">${this.files[0].name}</span>`;
            document.getElementById('uploadZone').classList.add('border-teal-300', 'bg-teal-50/30');
        }
    });

    // Drag & drop
    const zone = document.getElementById('uploadZone');
    zone.addEventListener('dragover', (e) => { e.preventDefault(); zone.classList.add('drag-over'); });
    zone.addEventListener('dragleave', () => { zone.classList.remove('drag-over'); });
    zone.addEventListener('drop', (e) => {
        e.preventDefault();
        zone.classList.remove('drag-over');
        const input = document.getElementById('resumeInput');
        input.files = e.dataTransfer.files;
        input.dispatchEvent(new Event('change'));
    });
</script>

{{-- Logout Confirmation Modal --}}
<div id="logoutModal" class="logout-backdrop fixed inset-0 z-[60] flex items-center justify-center bg-black/40">
    <div class="logout-panel bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-0 overflow-hidden">
        <div class="flex items-center justify-between px-6 pt-6 pb-1">
            <h3 class="text-base font-bold" style="color: #444444">Log out</h3>
            <button onclick="closeLogoutModal()" class="w-7 h-7 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="px-6 pb-6 pt-3">
            <p class="text-sm text-gray-500 leading-relaxed">You are currently signing up, you could lose your progress.</p>
        </div>
        <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100">
            <button onclick="closeLogoutModal()" class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors text-center">
                Cancel
            </button>
            <button onclick="document.getElementById('logout-form').submit();" class="flex-1 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition-colors text-center">
                Log out
            </button>
        </div>
    </div>
</div>

<script>
    function openLogoutModal() {
        document.getElementById('logoutModal').classList.add('active');
    }
    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.remove('active');
    }
    document.getElementById('logoutModal').addEventListener('click', function(e) {
        if (e.target === this) closeLogoutModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLogoutModal();
    });
</script>

</body>
</html>
