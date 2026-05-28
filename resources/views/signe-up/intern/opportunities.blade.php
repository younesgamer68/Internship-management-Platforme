<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opportunities in {{ auth()->user()->career_field }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Hover overlay */
        .card-wrapper:hover .apply-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        .apply-overlay {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s ease;
        }

        /* Modal */
        .modal-backdrop {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .modal-backdrop.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-panel {
            transform: scale(0.95) translateY(10px);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .modal-backdrop.active .modal-panel {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        /* Step timeline */
        .step-line {
            position: absolute;
            left: 15px;
            top: 32px;
            bottom: -8px;
            width: 2px;
            background: #e5e7eb;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen text-gray-900 antialiased">

    <section class="flex min-h-screen bg-gray-50 font-sans">

        {{-- Sidebar --}}
        <aside
            class="w-56 min-h-screen bg-white border-r border-gray-200 flex flex-col py-6 px-4 fixed left-0 top-0 z-10">

            {{-- Logo --}}
            {{-- Logo --}}
            <div class="flex items-center justify-center mb-10 px-2">
                <img src="{{ asset('images/Logos/TLM.png') }}" alt="TLM Logo" class="h-auto w-20">
            </div>

            {{-- Nav Items --}}
            <nav class="flex flex-col gap-1 flex-1">
                @php
                    $navItems = [
                        ['icon' => 'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z', 'label' => 'Dashboard', 'active' => false, 'route' => '#'],
                        ['icon' => 'M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z', 'label' => 'Opportunities', 'active' => true, 'route' => 'intern.opportunities'],
                        ['icon' => 'M9 12h6M9 16h6M9 8h6M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z', 'label' => 'Applications', 'active' => false, 'route' => 'intern.application'],
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
                    @if($item['active'] || $item['label'] === 'Applications')
                            <a href="{{ $item['route'] !== '#' ? route($item['route']) : '#' }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors
                                                      {{ $item['active']
                        ? 'bg-gray-100 font-semibold border-l-4 border-teal-500'
                        : 'hover:bg-gray-50' }}" style="color: {{ $item['active'] ? '#444444' : '#7b7b7b' }}">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                                </svg>
                                <span>{{ $item['label'] }}</span>
                            </a>
                    @else
                        <div class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm cursor-not-allowed select-none"
                            style="color: #7b7b7b; opacity: 0.6">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
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
            <a href="#" onclick="event.preventDefault(); openLogoutModal();"
                class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-500 hover:text-red-500 hover:bg-red-50 transition-colors mt-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </a>
        </aside>

        {{-- Main Content --}}
        <div class="ml-56 flex-1 flex gap-5 p-6 min-h-screen">

            {{-- Center Column --}}
            <div class="flex-1 flex flex-col">

                {{-- Hero Header --}}
                <div class="text-center mb-8">
                    <span
                        class="inline-block bg-purple-100 text-purple-700 text-xs font-semibold px-4 py-1 rounded-full mb-4">
                        40k+ companies hiring now
                    </span>
                    <h1 class="text-3xl font-bold mb-1" style="color: #444444">
                        Find your first real role in
                        <span class="text-teal-500">{{ auth()->user()->career_field }}</span>
                    </h1>
                    <p class="text-gray-400 text-sm">Show interest in any opportunity you like here</p>
                </div>

                {{-- Showing count --}}
                <p class="text-xs text-gray-500 mb-4 font-medium uppercase tracking-wide">
                    Showing <span class="text-teal-600 font-bold">{{ $internships->count() }}</span> Opportunities
                </p>

                {{-- Opportunity Cards --}}
                <div class="flex flex-col gap-4">
                    @forelse ($internships as $internship)
                        @php
                            $words = explode(' ', $internship->company->name);
                            $initials = '';
                            foreach ($words as $w) {
                                $initials .= mb_strtoupper(mb_substr($w, 0, 1));
                            }
                            $initials = mb_substr($initials, 0, 2);
                            if (empty($initials)) {
                                $initials = 'IN';
                            }

                            $colors = [
                                'bg-yellow-100 text-yellow-700',
                                'bg-blue-100 text-blue-700',
                                'bg-green-100 text-green-700',
                                'bg-red-100 text-red-700',
                                'bg-purple-100 text-purple-700',
                                'bg-pink-100 text-pink-700',
                                'bg-indigo-100 text-indigo-700'
                            ];
                            $color = $colors[$internship->id % count($colors)];
                        @endphp
                        <div
                            class="card-wrapper relative bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow p-5">

                            {{-- Hover overlay: "Apply to unlock" --}}
                            <div
                                class="apply-overlay absolute inset-0 z-10 flex items-center justify-center rounded-2xl bg-white/60 backdrop-blur-[2px]">
                                <button onclick="openApplyModal()"
                                    class="flex items-center gap-2 bg-white border border-gray-200 shadow-lg text-gray-800 text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Apply to unlock
                                </button>
                            </div>

                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center gap-4">
                                    {{-- Avatar --}}
                                    <div
                                        class="w-11 h-11 rounded-xl flex items-center justify-center font-bold text-sm {{ $color }}">
                                        {{ $initials }}
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold" style="color: #444444">{{ $internship->title }}
                                        </h3>
                                        <div class="flex items-center gap-1 text-xs text-gray-400 mt-0.5">
                                            <span class="font-medium text-gray-700">{{ $internship->company->name }}</span>
                                            <span class="text-gray-300">•</span>
                                            <svg class="w-3 h-3 inline-block" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $internship->city }}, {{ $internship->country }}
                                        </div>
                                    </div>
                                </div>
                                @if ($internship->is_new)
                                    <span
                                        class="flex items-center gap-1 text-xs font-semibold text-orange-500 bg-orange-50 px-2.5 py-1 rounded-full">
                                        🔥 New
                                    </span>
                                @endif
                            </div>

                            {{-- Tags --}}
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs bg-teal-50 text-teal-700 px-3 py-1 rounded-full font-medium">{{ $internship->internship_type }}</span>
                                <span
                                    class="text-xs bg-purple-50 text-purple-700 px-3 py-1 rounded-full font-medium">{{ $internship->duration }}</span>
                                <span
                                    class="text-xs bg-blue-50 text-blue-700 px-3 py-1 rounded-full font-medium">{{ $internship->experience_level }}</span>
                                @if($internship->is_paid)
                                    <span
                                        class="text-xs bg-green-50 text-green-700 px-3 py-1 rounded-full font-medium">Paid</span>
                                @else
                                    <span
                                        class="text-xs bg-gray-50 text-gray-600 px-3 py-1 rounded-full font-medium">Unpaid</span>
                                @endif

                                @if(is_array($internship->skills_required))
                                    @foreach (array_slice($internship->skills_required, 0, 4) as $tag)
                                        <span class="text-xs bg-gray-100 text-gray-600 px-3 py-1 rounded-full">{{ $tag }}</span>
                                    @endforeach
                                @endif
                            </div>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-3 border-t border-gray-50">
                                <div class="flex items-center gap-1.5 text-xs text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                                    </svg>
                                    {{ $internship->students_viewed ?? 0 }} students viewed this role
                                </div>
                                <div class="flex items-center gap-1 text-xs text-gray-400">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $internship->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-2xl border border-gray-100 p-8 text-center text-gray-500 shadow-sm">
                            No opportunities found for this field yet. Check back later!
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Right Sidebar --}}
            <div class="w-64 flex flex-col gap-4 flex-shrink-0">

                {{-- Your Program --}}
                <div class="bg-gradient-to-br from-blue-50 to-teal-50 rounded-2xl border border-blue-100 p-5">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Your Program</p>
                    <p class="font-bold text-sm mb-4" style="color: #444444">Virtual Internships</p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm">
                            <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase tracking-wide font-semibold">Program Fee</p>
                            <p class="text-teal-600 font-bold text-sm">1,495 USD</p>
                        </div>
                    </div>
                </div>

                {{-- Recent Activity --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex-1">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-500">Recent Activity</p>
                        <span class="flex items-center gap-1 text-[10px] text-green-500 font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse inline-block"></span>
                            Live
                        </span>
                    </div>

                    @php
                        $activities = [
                            ['color' => 'bg-gray-200', 'initials' => '', 'text' => 'Interviews for a Entrepreneurship & Startups role', 'time' => '15h ago'],
                            ['color' => 'bg-orange-400', 'initials' => 'SF', 'text' => '8 students from São Paulo, Brazil applied to a Data Science role', 'time' => '16h ago'],
                            ['color' => 'bg-orange-500', 'initials' => 'SF', 'text' => '2 students from Cape Town, South Africa applied to a Real Estate role', 'time' => '18h ago'],
                            ['color' => 'bg-teal-500', 'initials' => '1S', 'text' => '10 students from Singapore, Singapore enrolled in a UI/UX Design role', 'time' => ''],
                        ];
                    @endphp

                    <div class="flex flex-col gap-4">
                        @foreach ($activities as $act)
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-7 h-7 rounded-full {{ $act['color'] }} flex items-center justify-center text-white text-[10px] font-bold flex-shrink-0 mt-0.5">
                                    {{ $act['initials'] }}
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600 leading-snug">{{ $act['text'] }}</p>
                                    @if ($act['time'])
                                        <p class="text-[10px] text-gray-400 mt-0.5">{{ $act['time'] }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom CTA --}}
        <div class="fixed bottom-6 right-6 z-20">
            <button onclick="openApplyModal()"
                class="inline-flex items-center gap-2 bg-gray-900 hover:bg-gray-700 text-white text-sm font-semibold px-6 py-3 rounded-xl shadow-lg transition-colors">
                Start application
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>



    </section>

    {{-- Apply Modal --}}
    <div id="applyModal" class="modal-backdrop fixed inset-0 z-50 flex items-center justify-center bg-black/40">
        <div class="modal-panel bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-0 overflow-hidden">

            {{-- Header --}}
            <div class="flex items-center justify-between px-6 pt-6 pb-2">
                <div class="w-11 h-11 rounded-xl bg-gray-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <button onclick="closeApplyModal()"
                    class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Title --}}
            <div class="px-6 pb-6">
                <h2 class="text-lg font-bold mt-2" style="color: #444444">You're 3 steps away from applying</h2>
            </div>

            {{-- Steps --}}
            <div class="px-6 pb-6">
                <div class="flex flex-col gap-0">

                    {{-- Step 1 --}}
                    <div class="relative flex items-start gap-4 pb-6">
                        <div class="step-line"></div>
                        <div
                            class="relative z-10 w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center flex-shrink-0">
                        </div>
                        <div class="pt-1">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Step 1</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5">Complete your application & profile
                            </p>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="relative flex items-start gap-4 pb-6">
                        <div class="step-line"></div>
                        <div
                            class="relative z-10 w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center flex-shrink-0">
                        </div>
                        <div class="pt-1">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Step 2</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5">We'll review & approve your
                                application</p>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="relative flex items-start gap-4 pb-6">
                        <div
                            class="relative z-10 w-8 h-8 rounded-full border-2 border-gray-200 bg-white flex items-center justify-center flex-shrink-0">
                        </div>
                        <div class="pt-1">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Step 3</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5">Confirm enrollment</p>
                        </div>
                    </div>
                </div>

                {{-- Trophy unlock --}}
                <div class="flex items-center gap-3 mt-2 mb-2">
                    <div class="text-2xl">🏆</div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">You unlock</p>
                        <a href="#"
                            class="text-sm font-semibold text-teal-600 hover:text-teal-700 transition-colors">Show
                            interest in any opportunity</a>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 px-6 py-5 border-t border-gray-100 bg-gray-50/50">
                <button onclick="closeApplyModal()"
                    class="flex-1 px-5 py-3 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors text-center">
                    Keep browsing
                </button>
                <a href="{{ route('intern.application') }}"
                    class="flex-1 px-5 py-3 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold transition-colors text-center">
                    Start application
                </a>
            </div>
        </div>
    </div>

    {{-- Logout Confirmation Modal --}}
    <div id="logoutModal" class="modal-backdrop fixed inset-0 z-[60] flex items-center justify-center bg-black/40">
        <div class="modal-panel bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-0 overflow-hidden">
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
        function openApplyModal() {
            document.getElementById('applyModal').classList.add('active');
        }
        function closeApplyModal() {
            document.getElementById('applyModal').classList.remove('active');
        }
        document.getElementById('applyModal').addEventListener('click', function (e) {
            if (e.target === this) closeApplyModal();
        });

        function openLogoutModal() {
            document.getElementById('logoutModal').classList.add('active');
        }
        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.remove('active');
        }
        document.getElementById('logoutModal').addEventListener('click', function (e) {
            if (e.target === this) closeLogoutModal();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeApplyModal();
                closeLogoutModal();
            }
        });
    </script>

</body>

</html>