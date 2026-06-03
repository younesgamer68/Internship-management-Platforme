<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>About Us — Intern Link</title>

    <link rel="icon" href="{{ asset('images/Logos/Small%20Logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/Logos/Small%20Logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|righteous:400" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/welcome.css'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.14.8/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <x-ui-state />
</head>

<body
    x-data="{
        pageDarkMode: false,
        init() {
            window.pageDarkModeToggle = () => {
                $store.ui.showLoading(400);
                setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150)
            };
            Alpine.effect(() => {
                const isDark = $store.ui.darkMode;
                this.pageDarkMode = isDark;
                window.pageDarkModeActive = isDark;
                document.body.classList.toggle('page-dark', isDark);
                window.dispatchEvent(new CustomEvent('page-dark-mode-change', { detail: { active: isDark } }));
            });
        }
    }"
    class="welcome-body flex min-h-screen flex-col bg-[#ffffff] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="pageDarkMode ? 'bg-black text-white' : 'bg-[#ffffff] text-[#17494D]'">

    <x-nav-bar :blueBg="true" />
    <x-loading-overlay />

    {{-- ============================================================
         ABOUT US PAGE
         Sections: Hero · Story/Timeline · Team · CTA
         Design system: Poppins, #00B1AA teal, full dark mode
    ============================================================ --}}

    <div class="about-page font-[Poppins] bg-[#FFFFFF] text-[#444444] antialiased overflow-x-hidden">

    <style>

        /* ── Animations ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes floatY {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }
        @keyframes shimmer {
            from { background-position: -200% center; }
            to   { background-position:  200% center; }
        }
        @keyframes pulseDot {
            0%, 100% { transform: scale(1);   opacity: 1; }
            50%       { transform: scale(1.6); opacity: .5; }
        }
        @keyframes drawLine {
            from { stroke-dashoffset: 600; }
            to   { stroke-dashoffset: 0; }
        }

        .fade-up     { animation: fadeUp  .7s ease both; }
        .float-card  { animation: floatY 5s ease-in-out infinite; }
        .pulse-dot   { animation: pulseDot 1.8s ease-in-out infinite; }

        .shimmer-text {
            background: linear-gradient(120deg, #00B1AA 0%, #22d3ee 40%, #F89122 60%, #00B1AA 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 4s linear infinite;
        }

        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity .7s ease, transform .7s ease;
        }
        .revealed { opacity: 1; transform: translateY(0); }

        /* ── Timeline connector line ── */
        .timeline-line {
            stroke-dasharray: 600;
            stroke-dashoffset: 600;
            transition: stroke-dashoffset 1.8s ease;
        }
        .timeline-line.drawn { stroke-dashoffset: 0; }

        /* ── Team card hover glow ── */
        .team-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 1.5rem;
            background: linear-gradient(135deg, rgba(0,177,170,.18), rgba(248,145,34,.10));
            opacity: 0;
            transition: opacity .4s ease;
        }
        .team-card:hover::before { opacity: 1; }

        /* ─────────────── DARK MODE ─────────────── */

        /* Page wrapper */
        .page-dark .about-page {
            background-color: #07111f !important;
            color: #ffffff !important;
        }

        /* Non-teal sections */
        .page-dark .about-page section:not([style*="00B1AA"]):not([style*="008A84"]) {
            background: #0b182c !important;
        }
        .page-dark .about-page section:nth-of-type(odd):not([style*="00B1AA"]):not([style*="008A84"]) {
            background: #07111f !important;
        }

        /* All text */
        .page-dark .about-page section:not([style*="00B1AA"]) h1,
        .page-dark .about-page section:not([style*="00B1AA"]) h2,
        .page-dark .about-page section:not([style*="00B1AA"]) h3,
        .page-dark .about-page section:not([style*="00B1AA"]) h4,
        .page-dark .about-page section:not([style*="00B1AA"]) p,
        .page-dark .about-page section:not([style*="00B1AA"]) span,
        .page-dark .about-page section:not([style*="00B1AA"]) li,
        .page-dark .about-page section:not([style*="00B1AA"]) a:not(.cta-btn) {
            color: #ffffff !important;
        }
        .page-dark .about-page .text-\[\#666666\]  { color: #b0c4d8 !important; }
        .page-dark .about-page .text-\[\#444444\]  { color: #ffffff !important; }

        /* Cards */
        .page-dark .about-page .bg-white,
        .page-dark .about-page [class*="bg-white"] {
            background-color: #10223b !important;
        }
        .page-dark .about-page .bg-white .bg-white,
        .page-dark .about-page .rounded-3xl .bg-white,
        .page-dark .about-page .rounded-2xl .bg-white {
            background-color: #152844 !important;
        }
        .page-dark .about-page .bg-\[\#F5FBFB\],
        .page-dark .about-page [style*="#F5FBFB"]:not(section) {
            background: #152844 !important;
        }

        /* Borders */
        .page-dark .about-page .border-\[\#E5E7EB\],
        .page-dark .about-page [class*="border-[#E5E7EB]"],
        .page-dark .about-page .border { border-color: #213a59 !important; }

        /* Hero decorative blobs */
        .page-dark .about-page .hero-blob { opacity: .35 !important; }

        /* Timeline track & nodes */
        .page-dark .about-page .timeline-track { background: #213a59 !important; }
        .page-dark .about-page .timeline-node  { border-color: #07111f !important; }
        .page-dark .about-page .timeline-card  {
            background-color: #10223b !important;
            border-color: #213a59 !important;
        }
        .page-dark .about-page .timeline-card p,
        .page-dark .about-page .timeline-card span,
        .page-dark .about-page .timeline-card h4 { color: #ffffff !important; }

        /* Team cards */
        .page-dark .about-page .team-card {
            background-color: #10223b !important;
            border-color: #213a59 !important;
        }
        .page-dark .about-page .team-role-badge {
            background: rgba(0,177,170,.18) !important;
        }
        .page-dark .about-page .team-social {
            background: #152844 !important;
            border-color: #213a59 !important;
        }
        .page-dark .about-page .team-social:hover {
            background: rgba(0,177,170,.25) !important;
        }

        /* Stat pills */
        .page-dark .about-page .stat-pill {
            background-color: #10223b !important;
            border-color: #213a59 !important;
        }

        /* Teal CTA stays teal */
        .page-dark .about-page section[style*="00B1AA"] .cta-btn-outline {
            border-color: rgba(255,255,255,.6) !important;
        }

        /* Scrollbar */
        .page-dark ::-webkit-scrollbar-track { background: #07111f; }
        .page-dark ::-webkit-scrollbar-thumb { background: #213a59; border-radius: 4px; }
        .page-dark ::-webkit-scrollbar-thumb:hover { background: #2e4e78; }

    </style>


    {{-- ================================================================
         1. HERO
    ================================================================ --}}
<section class="relative min-h-[92vh] flex items-center overflow-hidden"
         style="background: #00b1aa">

        {{-- Decorative blobs --}}
        <div class="hero-blob absolute -top-32 -right-32 w-[500px] h-[500px] rounded-full opacity-20"
             style="background: radial-gradient(circle, #ffffff 0%, transparent 70%)"></div>
        <div class="hero-blob absolute -bottom-40 -left-20 w-[400px] h-[400px] rounded-full opacity-15"
             style="background: radial-gradient(circle, #F89122 0%, transparent 70%)"></div>

        {{-- Grid texture overlay --}}
        <div class="absolute inset-0 pointer-events-none opacity-[0.04]"
             style="background-image: linear-gradient(rgba(255,255,255,1) 1px, transparent 1px),
                                      linear-gradient(90deg, rgba(255,255,255,1) 1px, transparent 1px);
                    background-size: 48px 48px;"></div>

        {{-- Scattered dots --}}
        <span class="absolute top-16 left-[30%] w-3 h-3 rounded-full bg-yellow-300 opacity-80"></span>
        <span class="absolute top-1/3 right-16  w-2 h-2 rounded-full bg-white opacity-60"></span>
        <span class="absolute bottom-24 left-[55%] w-4 h-4 rounded-full bg-orange-400 opacity-70"></span>
        <span class="absolute bottom-16 right-[35%] w-2.5 h-2.5 rounded-full bg-white opacity-50"></span>
        <span class="absolute top-1/2 left-12 w-3 h-3 rounded-full bg-yellow-200 opacity-60"></span>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 py-24 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Left: copy --}}
                <div class="fade-up">
                    <span class="inline-block text-xs font-bold uppercase tracking-[.22em] px-4 py-1.5 rounded-full mb-6 text-white"
                          style="background: rgba(255,255,255,.15)">Who We Are</span>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.08] mb-6">
                        Bridging Talent<br>
                        <span style="color:#F89122">with Opportunity</span>
                    </h1>

                    <p class="text-white/80 text-lg leading-relaxed mb-10 max-w-lg">
                        InterLink was born from a simple belief — every student deserves a fair shot at
                        a great internship, and every company deserves to find the right person, fast.
                    </p>

                    {{-- Quick stats row --}}
                    <div class="flex flex-wrap gap-4">
                        @foreach([
                            ['15K+', 'Students placed'],
                            ['800+', 'Partner companies'],
                            ['92%',  'Satisfaction rate'],
                        ] as [$val, $lbl])
                        <div class="stat-pill bg-white/10 border border-white/20 rounded-2xl px-5 py-3 text-center backdrop-blur-sm">
                            <p class="text-2xl font-black text-white">{{ $val }}</p>
                            <p class="text-xs text-white/70 font-medium mt-0.5">{{ $lbl }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Right: floating image collage --}}
                <div class="relative h-[420px] hidden lg:block">

                    {{-- Main image --}}
                    <div class="float-card absolute top-0 right-0 w-72 h-80 rounded-3xl overflow-hidden shadow-2xl border-4 border-white/30">
                        <img src="https://img.freepik.com/free-photo/group-people-holding-hand-assemble-togetherness_53876-64954.jpg?semt=ais_hybrid&w=740"
                             alt="Our team" class="w-full h-full object-cover">
                        <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(0,110,105,.5), transparent)"></div>
                    </div>

                    {{-- Secondary image --}}
                    <div class="float-card absolute bottom-0 left-0 w-52 h-60 rounded-3xl overflow-hidden shadow-xl border-4 border-white/20"
                         style="animation-delay: 1.5s">
                        <img src="https://img.freepik.com/free-photo/businesspeople-having-good-time-meeting_1098-1786.jpg?semt=ais_hybrid&w=740"
                             alt="Team collaboration" class="w-full h-full object-cover">
                    </div>

                    {{-- Founded badge --}}
                    <div class="float-card absolute top-12 left-10 bg-white rounded-2xl shadow-xl px-5 py-4 border border-white/20"
                         style="animation-delay: .8s">
                        <p class="text-xs text-[#666666] font-medium">Founded</p>
                        <p class="text-2xl font-black" style="color:#00B1AA">2022</p>
                        <p class="text-xs text-[#666666]">Casablanca, Morocco</p>
                    </div>

                    {{-- Live dot --}}
                    <div class="absolute bottom-24 right-12 bg-white rounded-xl shadow-lg px-4 py-2.5 flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 pulse-dot inline-block flex-shrink-0"></span>
                        <p class="text-xs font-bold text-[#444444]">Platform Live</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wave divider --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-16 sm:h-20 block">
                <path d="M0,40 C240,80 480,0 720,40 C960,80 1200,0 1440,40 L1440,80 L0,80 Z" fill="#FFFFFF"/>
            </svg>
        </div>
    </section>


    {{-- ================================================================
         2. STORY / TIMELINE
    ================================================================ --}}
    <section class="py-24 sm:py-32 bg-[#FFFFFF] relative overflow-hidden">

        <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-3xl pointer-events-none"
             style="background: rgba(0,177,170,.06)"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full blur-3xl pointer-events-none"
             style="background: rgba(248,145,34,.06)"></div>

        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            {{-- Section heading --}}
            <div class="text-center mb-20 reveal">
                <span class="text-[#00B1AA] text-xs font-bold uppercase tracking-[.2em]">Our Journey</span>
                <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3 leading-tight">
                    How InterLink
                    <span class="shimmer-text"> Came to Life</span>
                </h2>
                <p class="text-[#666666] mt-5 max-w-xl mx-auto leading-relaxed">
                    From a frustrating job-hunt experience to a platform trusted by thousands —
                    here's the story behind every decision we've made.
                </p>
            </div>

            {{-- ── Desktop timeline ── --}}
            <div class="hidden lg:block relative">

                {{-- Horizontal track --}}
                <div class="timeline-track absolute top-[2.2rem] left-[calc(12.5%-1px)] right-[calc(12.5%-1px)] h-0.5"
                     style="background: linear-gradient(to right, #00B1AA, #F89122, #008A84, #00B1AA)"></div>

                <div class="grid grid-cols-4 gap-8">
                    @php
                        $milestones = [
                            [
                                'year'  => '2021',
                                'tag'   => 'The Problem',
                                'title' => 'A Frustrating Search',
                                'desc'  => 'Our founders, themselves recent graduates, spent months sending CVs into the void. The internship market was opaque, slow, and unfair. That frustration became a mission.',
                                'color' => '#00B1AA',
                                'grad'  => '#00B1AA,#008A84',
                                'icon'  => '💡',
                            ],
                            [
                                'year'  => '2022',
                                'tag'   => 'The Idea',
                                'title' => 'InterLink is Founded',
                                'desc'  => 'We built the first prototype in 6 weeks in a Casablanca apartment. Three co-founders, one shared laptop, and a clear conviction: this problem is solvable.',
                                'color' => '#F89122',
                                'grad'  => '#F89122,#fbbf24',
                                'icon'  => '🚀',
                            ],
                            [
                                'year'  => '2023',
                                'tag'   => 'The Growth',
                                'title' => 'First 5,000 Students',
                                'desc'  => 'We onboarded our first 50 partner companies and helped 5,000 students land internships. Our AI matching engine reduced time-to-hire by 60%.',
                                'color' => '#008A84',
                                'grad'  => '#008A84,#00B1AA',
                                'icon'  => '📈',
                            ],
                            [
                                'year'  => '2024',
                                'tag'   => 'The Scale',
                                'title' => '15K+ Placements',
                                'desc'  => 'Expanded to 12 universities, 800+ companies, and launched admin tools for academic institutions. InterLink became Morocco\'s leading internship platform.',
                                'color' => '#00B1AA',
                                'grad'  => '#00B1AA,#22d3ee',
                                'icon'  => '🌍',
                            ],
                        ];
                    @endphp

                    @foreach($milestones as $idx => $m)
                    <div class="reveal flex flex-col items-center text-center" style="transition-delay: {{ $idx * 0.12 }}s">

                        {{-- Node --}}
                        <div class="timeline-node w-[4.5rem] h-[4.5rem] rounded-full flex items-center justify-center
                                    shadow-xl mb-6 relative z-10 border-[5px] border-white
                                    hover:scale-125 transition-transform duration-300 cursor-default"
                             style="background: linear-gradient(135deg, {{ $m['grad'] }})">
                            <span class="text-2xl">{{ $m['icon'] }}</span>
                        </div>

                        {{-- Card --}}
                        <div class="timeline-card bg-white rounded-2xl border border-[#E5E7EB] shadow-md p-5 w-full
                                    hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3 inline-block"
                                  style="color:{{ $m['color'] }}; background: rgba(0,177,170,.09)">{{ $m['tag'] }}</span>
                            <p class="text-xs font-black mb-1" style="color:{{ $m['color'] }}">{{ $m['year'] }}</p>
                            <h4 class="text-sm font-black text-[#444444] mb-2">{{ $m['title'] }}</h4>
                            <p class="text-xs text-[#666666] leading-relaxed">{{ $m['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- ── Mobile timeline ── --}}
            <div class="lg:hidden relative pl-10">

                {{-- Vertical track --}}
                <div class="absolute left-4 top-2 bottom-2 w-0.5"
                     style="background: linear-gradient(to bottom, #00B1AA, #F89122, #008A84, #00B1AA)"></div>

                @foreach($milestones as $idx => $m)
                <div class="relative mb-10 reveal" style="transition-delay: {{ $idx * 0.1 }}s">

                    {{-- Node --}}
                    <div class="absolute -left-6 top-1 w-10 h-10 rounded-full flex items-center justify-center
                                border-4 border-white shadow-lg z-10"
                         style="background: linear-gradient(135deg, {{ $m['grad'] }})">
                        <span class="text-base">{{ $m['icon'] }}</span>
                    </div>

                    {{-- Card --}}
                    <div class="timeline-card bg-white rounded-2xl p-5 shadow-md border border-[#E5E7EB]
                                hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-black" style="color:{{ $m['color'] }}">{{ $m['year'] }}</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest px-2 py-0.5 rounded-full"
                                  style="color:{{ $m['color'] }}; background: rgba(0,177,170,.09)">{{ $m['tag'] }}</span>
                        </div>
                        <h4 class="font-black text-[#444444] mb-1">{{ $m['title'] }}</h4>
                        <p class="text-sm text-[#666666] leading-relaxed">{{ $m['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Mission statement pull-quote --}}
            <div class="reveal mt-20 rounded-3xl p-10 sm:p-14 text-center relative overflow-hidden shadow-2xl"
                 style="background: linear-gradient(135deg, #00B1AA 0%, #008A84 100%)">
                <div class="absolute top-0 right-0 w-60 h-60 rounded-full opacity-10"
                     style="background:#ffffff; transform: translate(30%, -30%)"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 rounded-full opacity-10"
                     style="background:#F89122; transform: translate(-20%, 20%)"></div>
                <p class="relative z-10 text-white text-xl sm:text-2xl lg:text-3xl font-semibold leading-relaxed italic max-w-3xl mx-auto">
                    "Our mission is to make the path from classroom to career
                    as clear, fast, and fair as possible — for every student, everywhere."
                </p>
                <div class="mt-6 flex items-center justify-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                        <span class="text-white font-black text-sm">Y</span>
                    </div>
                    <div class="text-left">
                        <p class="text-white font-bold text-sm">Youssef El Idrissi</p>
                        <p class="text-white/60 text-xs">Co-founder & CEO</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ================================================================
         3. TEAM
    ================================================================ --}}
    <section class="py-24 sm:py-32 relative overflow-hidden"
             style="background: linear-gradient(135deg, #F5FBFB 0%, #FFFFFF 60%, #F5FBFB 100%)">

        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-[300px] rounded-full blur-3xl pointer-events-none"
             style="background: rgba(0,177,170,.05)"></div>

        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            {{-- Heading --}}
            <div class="grid lg:grid-cols-2 gap-12 items-end mb-16 reveal">
                <div>
                    <span class="text-[#00B1AA] text-xs font-bold uppercase tracking-[.2em]">The People</span>
                    <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3 leading-tight">
                        Meet the Founders
                    </h2>
                    <p class="text-[#666666] mt-5 leading-relaxed max-w-md">
                        A small, focused team obsessed with one thing — helping students and
                        companies find each other faster.
                    </p>
                </div>
                <div class="flex flex-wrap gap-3 lg:justify-end">
                    @foreach(['🎓 Student-First', '🤝 Partnership-Driven', '⚡ Move Fast'] as $pill)
                    <span class="text-xs font-bold px-4 py-2 rounded-full border border-[#E5E7EB] bg-white text-[#444444] shadow-sm">
                        {{ $pill }}
                    </span>
                    @endforeach
                </div>
            </div>

            {{-- Team grid --}}
            @php
                $team = [
                    [
                        'name'    => 'youness ben touttibt',
                        'role'    => 'Co-founder & CEO',
                        'bio'     => 'Computer Science graduate from ENSIAS. Previously built two ed-tech startups. Obsessed with product and growth.',
                        'avatar'  => 'https://i.pravatar.cc/400?img=11',
                        'color'   => '#00B1AA',
                        'grad'    => '#00B1AA,#008A84',
                        'linkedin'=> '#',
                        'twitter' => '#',
                        'tags'    => ['Product', 'Growth', 'Vision'],
                    ],
                    [
                        'name'    => 'Salma Benali',
                        'role'    => 'Co-founder & CTO',
                        'bio'     => 'Full-stack engineer & AI researcher. Built the matching engine that powers our platform. Former intern at Google.',
                        'avatar'  => 'https://i.pravatar.cc/400?img=5',
                        'color'   => '#008A84',
                        'grad'    => '#008A84,#22d3ee',
                        'linkedin'=> '#',
                        'twitter' => '#',
                        'tags'    => ['Engineering', 'AI/ML', 'Architecture'],
                    ],
                    [
                        'name'    => 'Adam Chraibi',
                        'role'    => 'Co-founder & COO',
                        'bio'     => 'Operations & partnerships lead. Signed our first 100 company partners. Background in business development and strategy.',
                        'avatar'  => 'https://i.pravatar.cc/400?img=8',
                        'color'   => '#F89122',
                        'grad'    => '#F89122,#fbbf24',
                        'linkedin'=> '#',
                        'twitter' => '#',
                        'tags'    => ['Operations', 'Partnerships', 'Strategy'],
                    ],
                ];
            @endphp

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($team as $idx => $person)
                <div class="team-card relative bg-white rounded-3xl border border-[#E5E7EB] shadow-xl overflow-hidden
                            hover:shadow-2xl hover:-translate-y-2 transition-all duration-400 reveal"
                     style="transition-delay: {{ $idx * 0.12 }}s">

                    {{-- Top gradient banner --}}
                    <div class="h-28 w-full relative overflow-hidden"
                         style="background: linear-gradient(135deg, {{ $person['grad'] }})">
                        <div class="absolute inset-0 opacity-10"
                             style="background-image: linear-gradient(rgba(255,255,255,1) 1px, transparent 1px),
                                                      linear-gradient(90deg,rgba(255,255,255,1) 1px, transparent 1px);
                                    background-size: 24px 24px;"></div>
                        {{-- Decorative circle --}}
                        <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full"
                             style="background: rgba(255,255,255,.15)"></div>
                    </div>

                    {{-- Avatar --}}
                    <div class="flex justify-center -mt-12 relative z-10 mb-4">
                        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-xl">
                            <img src="{{ $person['avatar'] }}"
                                 alt="{{ $person['name'] }}"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="px-7 pb-7 text-center">
                        <h3 class="text-lg font-black text-[#444444]">{{ $person['name'] }}</h3>
                        <span class="team-role-badge inline-block mt-1 text-xs font-bold px-3 py-1 rounded-full"
                              style="color:{{ $person['color'] }}; background: rgba(0,177,170,.08)">
                            {{ $person['role'] }}
                        </span>
                        <p class="text-sm text-[#666666] mt-4 leading-relaxed">{{ $person['bio'] }}</p>

                        {{-- Tags --}}
                        <div class="flex flex-wrap justify-center gap-2 mt-5">
                            @foreach($person['tags'] as $tag)
                            <span class="text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-lg border border-[#E5E7EB] text-[#666666]">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>

                        {{-- Social links --}}
                        <div class="flex justify-center gap-3 mt-6 pt-5 border-t border-[#E5E7EB]">
                            {{-- LinkedIn --}}
                            <a href="{{ $person['linkedin'] }}"
                               class="team-social w-9 h-9 rounded-xl border border-[#E5E7EB] bg-[#F5FBFB] flex items-center justify-center hover:scale-110 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" style="color:{{ $person['color'] }}">
                                    <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                                    <circle cx="4" cy="4" r="2"/>
                                </svg>
                            </a>
                            {{-- Twitter/X --}}
                            <a href="{{ $person['twitter'] }}"
                               class="team-social w-9 h-9 rounded-xl border border-[#E5E7EB] bg-[#F5FBFB] flex items-center justify-center hover:scale-110 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" style="color:{{ $person['color'] }}">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                            {{-- Email --}}
                            <a href="mailto:team@interlink.io"
                               class="team-social w-9 h-9 rounded-xl border border-[#E5E7EB] bg-[#F5FBFB] flex items-center justify-center hover:scale-110 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color:{{ $person['color'] }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Hiring nudge --}}
            <div class="reveal mt-12 rounded-2xl border border-[#E5E7EB] bg-white shadow-sm p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0"
                         style="background: rgba(0,177,170,.1)">
                        <svg class="w-6 h-6" fill="none" stroke="#00B1AA" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-black text-[#444444] text-sm">We're growing</p>
                        <p class="text-xs text-[#666666]">Interested in joining the team? We'd love to hear from you.</p>
                    </div>
                </div>
                <a href="mailto:careers@interlink.io"
                   class="flex-shrink-0 text-xs font-bold text-white px-6 py-2.5 rounded-full hover:shadow-lg hover:opacity-90 transition-all"
                   style="background-color:#00B1AA">
                    View Open Roles →
                </a>
            </div>

        </div>
    </section>


    {{-- ================================================================
         4. CTA
    ================================================================ --}}
    <section class="py-20 sm:py-28 relative overflow-hidden"
             style="background: linear-gradient(135deg, #00B1AA 0%, #008A84 60%, #00B1AA 100%)">

        {{-- Grid texture --}}
        <div class="absolute inset-0 pointer-events-none"
             style="background-image: linear-gradient(rgba(255,255,255,.05) 1px, transparent 1px),
                                      linear-gradient(90deg,rgba(255,255,255,.05) 1px, transparent 1px);
                    background-size: 48px 48px;"></div>

        {{-- Glow blobs --}}
        <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full pointer-events-none"
             style="background: rgba(248,145,34,.25); filter: blur(60px)"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full pointer-events-none"
             style="background: rgba(255,255,255,.10); filter: blur(60px)"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center reveal">

            {{-- Avatars --}}
            <div class="flex justify-center mb-8">
                <div class="flex -space-x-3">
                    @for($i = 0; $i < 7; $i++)
                    <img src="https://i.pravatar.cc/80?img={{ 40 + $i }}"
                         alt="User"
                         class="w-10 h-10 sm:w-11 sm:h-11 rounded-full object-cover border-2 border-white shadow-md">
                    @endfor
                </div>
            </div>

            <span class="inline-block text-xs font-bold uppercase tracking-[.2em] px-4 py-2 rounded-full mb-6 text-white"
                  style="background: rgba(255,255,255,.15)">Join Us Today</span>

            <h2 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white leading-tight mb-6">
                Ready to Start<br>Your Journey?
            </h2>

            <p class="text-white/80 text-base sm:text-lg max-w-xl mx-auto mb-10 leading-relaxed">
                Whether you're a student looking for your first break or a company
                searching for fresh talent — InterLink connects you in minutes.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#"
                   class="cta-btn inline-flex items-center gap-2 bg-white font-bold text-sm px-8 sm:px-10 py-3.5 sm:py-4 rounded-full shadow-xl hover:shadow-2xl hover:-translate-y-0.5 transition-all duration-300"
                   style="color:#00B1AA">
                    I'm a Student
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="#"
                   class="cta-btn cta-btn-outline inline-flex items-center gap-2 border-2 border-white/50 text-white font-bold text-sm px-8 sm:px-10 py-3.5 sm:py-4 rounded-full hover:bg-white/10 hover:border-white hover:-translate-y-0.5 transition-all duration-300">
                    I'm a Company
                </a>
            </div>
        </div>
    </section>

    </div>{{-- /about-page --}}

    {{-- Scroll reveal --}}
    <script>
        (function () {
            const els = document.querySelectorAll('.reveal');
            const io  = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('revealed');
                        io.unobserve(e.target);
                    }
                });
            }, { threshold: .1 });
            els.forEach(el => io.observe(el));
        })();
    </script>

    <x-footer />

</body>
</html>