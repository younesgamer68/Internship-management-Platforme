<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Intern Link</title>

    <link rel="icon" href="{{ asset('images/Logos/Small%20Logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/Logos/Small%20Logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|righteous:400" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500;600;700&family=Raleway:wght@400;500;600&family=Poppins:wght@400;600;700;800&family=Nunito:wght@400;600;700&family=Sora:wght@600;700&family=DM+Sans:wght@500;700&family=Inter:wght@600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/welcome.css'])

    <!-- Alpine.js: plugin first, then core -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.14.8/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <x-ui-state />

</head>

<body x-data
    class="welcome-body flex min-h-screen flex-col bg-[#ffffff] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black text-white' : 'bg-[#ffffff] text-[#17494D]'">

    <!-- Navigation -->
    <x-nav-bar :blueBg="true" />

    <x-loading-overlay />
    
   
{{-- ============================================================
     INTERLINK — Full Landing Page
     Colors:
       Primary Brand    #00B1AA  (turquoise)
       Dark Titles      #444444  (charcoal gray)
       Secondary Accent #008A84  (deep teal)
       Light Accent     #DDF7F6  (soft aqua)
       Background       #F7F9FA  (light gray)
       Cards/Sections   #FFFFFF
       Body Text        #666666  (medium gray)
       Borders          #E5E7EB  (soft gray)
     ============================================================ --}}

<div class="font-poppins bg-white text-[#444444] overflow-x-hidden">

    {{-- ============================================================
         1. HERO SECTION
         ============================================================ --}}
    <section class="relative h-auto min-h-[550px] mt-10 flex items-center overflow-visible" style="background-color:#00B1AA">

        {{-- Scattered decorative dots --}}
        <span class="absolute top-10 left-[38%] w-3 h-3 rounded-full bg-yellow-400 opacity-90"></span>
        <span class="absolute top-28 left-[55%] w-2 h-2 rounded-full bg-orange-400 opacity-80"></span>
        <span class="absolute bottom-28 left-[42%] w-4 h-4 rounded-full bg-orange-500 opacity-90"></span>
        <span class="absolute top-16 right-12 w-3 h-3 rounded-full bg-yellow-300 opacity-80"></span>
        <span class="absolute bottom-20 right-20 w-2.5 h-2.5 rounded-full bg-[#DDF7F6] opacity-70"></span>
        <span class="absolute top-1/2 left-6 w-4 h-4 rounded-full bg-[#DDF7F6] opacity-80"></span>
        <span class="absolute bottom-16 left-16 w-2 h-2 rounded-full bg-yellow-300 opacity-70"></span>

        {{-- Main content --}}
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-20 flex flex-col lg:flex-row items-center gap-8 py-16 lg:py-20">

            {{-- Left: Text --}}
            <div class="flex-1 max-w-xl text-center lg:text-left">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-5">
                    Big ideas. Amazing talent. The recruiting software that brings them together.
                </h1>
                <p class="text-white/80 text-base leading-relaxed mb-8">
                    Find, hire, onboard, and manage the right person for every job.
                </p>
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
                    <a href="#"
                       class="border border-white text-white text-sm font-semibold px-6 py-2.5 rounded hover:bg-white hover:text-[#00B1AA] transition-all duration-200 flex items-center gap-1">
                        GET STARTED
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Right: Blob images --}}
            <div class="flex-1 flex items-center justify-center relative h-80 sm:h-[420px] w-full">

                {{-- Blob 1 — top left --}}
                <div class="absolute top-0 left-[5%] w-52 h-52 sm:w-64 sm:h-64">
                    <div class="absolute inset-0 rounded-full shadow-xl" style="background-color:#DDF7F6"></div>
                    <div class="absolute -top-10 sm:-top-12 inset-x-0 h-[calc(100%+2.5rem)] sm:h-[calc(100%+3rem)] rounded-full overflow-visible">
                        <img src="https://picsum.photos/seed/hero1/400/500"
                             alt="Talent 1"
                             class="w-full h-full object-cover object-top rounded-full"
                             style="clip-path:inset(0 0 0 0 round 50%)"/>
                    </div>
                </div>

                {{-- Blob 2 — bottom right --}}
                <div class="absolute bottom-0 right-[5%] w-44 h-44 sm:w-56 sm:h-56">
                    <div class="absolute inset-0 rounded-full shadow-xl" style="background-color:#DDF7F6"></div>
                    <div class="absolute -top-8 sm:-top-10 inset-x-0 h-[calc(100%+2rem)] sm:h-[calc(100%+2.5rem)] rounded-full overflow-visible">
                        <img src="https://picsum.photos/seed/hero2/400/500"
                             alt="Talent 2"
                             class="w-full h-full object-cover object-top rounded-full"
                             style="clip-path:inset(0 0 0 0 round 50%)"/>
                    </div>
                </div>

                {{-- Accent dot --}}
                <span class="absolute top-[45%] left-[44%] w-3 h-3 rounded-full bg-orange-400 z-10"></span>
            </div>
        </div>
    </section>

    {{-- Wave divider --}}
    <div class="relative -mt-1 z-0 w-full overflow-hidden leading-none">
        <svg viewBox="0 0 1000 520" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
             class="w-full h-[80px] sm:h-[120px] block rotate-180">
            <path d="M0,100 C100,200 200,50 350,120 C500,190 600,30 750,110 C850,160 920,70 1000,20 L1000,520 L0,520 Z"
                  fill="#00B1AA"/>
        </svg>
    </div>


    {{-- ============================================================
         2. STUDENT FEATURES
         ============================================================ --}}
    <section id="students" class="py-20 sm:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="mb-12 sm:mb-14">
                <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-3" style="color:#00B1AA">
                    For Students
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] max-w-2xl leading-tight">
                    Everything You Need to Land Your Dream Internship
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-10 lg:gap-12 items-start" x-data="{ active: 0 }">

                {{-- Left: Feature accordion --}}
                <div class="space-y-2">
                    @foreach([
                        ['Search Internships',        'Discover thousands of internship listings filtered by field, location, duration, and company size. Our smart search returns the most relevant results first.'],
                        ['Save Offers',               'Bookmark your favourite listings and revisit them at any time. Build your personal shortlist with a single click and never lose track of a great opportunity.'],
                        ['Track Applications',        'Stay on top of every application with a real-time status board. Know exactly where you stand at every stage — from submitted to offer received.'],
                        ['Upload CV',                 'Upload your CV once and apply to hundreds of internships instantly. Maintain multiple CV versions and choose the right one per application.'],
                        ['Personalized Recommendations','Our AI engine analyses your profile, skills, and preferences to surface the internships most likely to match your career goals — automatically.'],
                        ['Internship Alerts',         'Set up smart keyword alerts and get notified the moment a new internship matching your criteria is posted. Never miss the right opportunity.'],
                    ] as $i => [$title, $desc])
                    <div class="rounded-2xl border transition-all duration-300 overflow-hidden cursor-pointer"
                         :class="active === {{ $i }} ? 'border-[#444444] bg-white shadow-md' : 'border-[#E5E7EB] bg-[#F7F9FA] hover:border-[#00B1AA]/30'"
                         x-on:click="active = {{ $i }}">
                        <div class="flex items-center justify-between px-5 sm:px-6 py-4 sm:py-5">
                            <h3 class="font-bold text-sm sm:text-base"
                                :class="active === {{ $i }} ? 'text-[#444444]' : 'text-[#666666]'">
                                {{ $title }}
                            </h3>
                            <div class="w-6 h-6 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0 ml-3 transition-all"
                                 :class="active === {{ $i }} ? 'text-white' : 'text-[#666666] bg-[#E5E7EB]'"
                                 :style="active === {{ $i }} ? 'background-color:#00B1AA' : ''">
                                <span x-text="active === {{ $i }} ? '−' : '+'"></span>
                            </div>
                        </div>
                        <div x-show="active === {{ $i }}" x-collapse class="px-5 sm:px-6 pb-5">
                            <p class="text-sm text-[#666666] leading-relaxed mb-4">{{ $desc }}</p>
                            <img src="https://picsum.photos/seed/student{{ $i }}/800/300"
                                 alt="{{ $title }}"
                                 class="w-full h-40 object-cover rounded-xl"/>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Right: App preview card --}}
                <div class="sticky top-24">
                    <div class="rounded-3xl overflow-hidden shadow-2xl" style="background-color:#444444">
                        <div class="p-5 sm:p-6 pb-0">
                            {{-- Fake browser bar --}}
                            <div class="bg-white/20 rounded-xl px-4 py-2 mb-4 flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-white/50"></div>
                                <div class="w-2 h-2 rounded-full bg-white/50"></div>
                                <div class="w-2 h-2 rounded-full bg-white/50"></div>
                                <div class="flex-1 text-center text-xs text-white/70 font-medium">interlink.io/dashboard</div>
                            </div>
                            {{-- App UI mockup --}}
                            <div class="rounded-t-2xl overflow-hidden shadow-xl">
                                <img src="https://picsum.photos/seed/dashboard/800/400"
                                     alt="App preview"
                                     class="w-full h-48 sm:h-64 object-cover"/>
                            </div>
                        </div>
                        {{-- Bottom info cards --}}
                        <div class="p-5 sm:p-6 pt-4">
                            <div class="bg-white rounded-2xl p-4 flex items-center gap-4">
                                <img src="https://i.pravatar.cc/80?img=5"
                                     alt="Student"
                                     class="w-10 h-10 rounded-full object-cover flex-shrink-0"/>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-[#444444]">Application Sent</p>
                                    <p class="text-xs text-[#666666] truncate">Google · Software Engineer Intern</p>
                                </div>
                                <span class="text-xs font-bold px-3 py-1 rounded-full text-white flex-shrink-0" style="background-color:#00B1AA">
                                    Active
                                </span>
                            </div>
                            <div class="bg-white/10 rounded-2xl p-4 mt-3">
                                <p class="text-xs font-semibold text-white mb-2">Suggested for you</p>
                                <div class="space-y-2">
                                    @foreach([
                                        ['https://i.pravatar.cc/40?img=10', 'Data Analyst · Microsoft'],
                                        ['https://i.pravatar.cc/40?img=11', 'UX Designer · Airbnb'],
                                        ['https://i.pravatar.cc/40?img=12', 'Backend Dev · Stripe'],
                                    ] as [$avatar, $suggestion])
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $avatar }}" alt="co" class="w-7 h-7 rounded-lg object-cover flex-shrink-0"/>
                                        <p class="text-xs text-white/80">{{ $suggestion }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ============================================================
         3. COMPANY FEATURES
         ============================================================ --}}
    <section id="companies" class="py-20 sm:py-28" style="background-color:#F7F9FA">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            {{-- Section heading --}}
            <div class="relative text-center mb-14 sm:mb-16">
                <div class="absolute top-0 left-1/4 w-2 h-2 rounded-full opacity-50" style="background-color:#00B1AA"></div>
                <div class="absolute top-4 right-1/4 w-3 h-3 rotate-45 border-2 border-orange-300 opacity-60"></div>
                <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-4"
                      style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                    For Companies
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] max-w-3xl mx-auto leading-tight">
                    Manage your entire hiring process,<br class="hidden sm:block"/>from sourcing to onboarding
                </h2>
            </div>

            {{-- Two-column feature cards --}}
            <div class="grid md:grid-cols-2 gap-6 sm:gap-8 mb-10 sm:mb-16">

                {{-- Card 1: Post & Attract --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-[#E5E7EB] hover:shadow-lg transition-shadow">
                    <div class="rounded-2xl overflow-hidden shadow-md bg-[#F7F9FA] p-4 mb-6">
                        <div class="bg-white rounded-xl shadow-sm p-4 mb-3">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://picsum.photos/seed/comp1/80/80" alt="co" class="w-8 h-8 rounded-lg object-cover"/>
                                <div>
                                    <p class="text-xs font-bold text-[#444444]">New Internship Listing</p>
                                    <p class="text-xs text-[#666666]">Backend Developer · Remote</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-2 bg-[#E5E7EB] rounded-full w-full"></div>
                                <div class="h-2 bg-[#E5E7EB] rounded-full w-3/4"></div>
                                <div class="h-2 bg-[#E5E7EB] rounded-full w-5/6"></div>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <div class="h-7 rounded-lg px-3 text-xs font-bold text-white flex items-center" style="background-color:#00B1AA">
                                    Publish Now
                                </div>
                                <div class="h-7 rounded-lg px-3 text-xs font-medium text-[#666666] bg-[#F7F9FA] flex items-center border border-[#E5E7EB]">
                                    Save Draft
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <img src="https://picsum.photos/seed/comp2/400/200" alt="platform" class="rounded-xl h-20 w-full object-cover"/>
                            <img src="https://picsum.photos/seed/comp3/400/200" alt="platform" class="rounded-xl h-20 w-full object-cover"/>
                        </div>
                    </div>
                    <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#00B1AA">Source &amp; Attract</p>
                    <h3 class="text-xl sm:text-2xl font-black text-[#444444] mb-3">Post and attract top student talent</h3>
                    <p class="text-[#666666] text-sm leading-relaxed mb-5">
                        Create rich listings in minutes. Set requirements, duration, stipend, and deadlines.
                        Instantly reach thousands of qualified students.
                    </p>
                    <a href="#" class="text-xs font-bold uppercase tracking-widest hover:text-[#008A84] transition-colors" style="color:#00B1AA">
                        Learn More &rarr;
                    </a>
                </div>

                {{-- Card 2: Evaluate & Collaborate --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-[#E5E7EB] hover:shadow-lg transition-shadow">
                    <div class="rounded-2xl overflow-hidden shadow-md bg-[#F7F9FA] p-4 mb-6">
                        <div class="space-y-2 mb-3">
                            @foreach([
                                ['Sara K.',  'UX Design',    '95%', 5],
                                ['Ahmed R.', 'Backend Dev',  '88%', 6],
                                ['Nadia B.', 'Data Science', '82%', 7],
                            ] as [$cname, $crole, $score, $img])
                            <div class="bg-white rounded-xl p-3 flex items-center gap-3 shadow-sm">
                                <img src="https://i.pravatar.cc/60?img={{ $img }}" alt="candidate" class="w-8 h-8 rounded-full object-cover flex-shrink-0"/>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-bold text-[#444444]">{{ $cname }}</p>
                                    <p class="text-xs text-[#666666]">{{ $crole }}</p>
                                </div>
                                <span class="text-xs font-bold flex-shrink-0" style="color:#00B1AA">{{ $score }}</span>
                            </div>
                            @endforeach
                        </div>
                        <img src="https://picsum.photos/seed/interview/800/300" alt="Interview UI" class="rounded-xl h-24 w-full object-cover"/>
                    </div>
                    <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#00B1AA">Evaluate &amp; Collaborate</p>
                    <h3 class="text-xl sm:text-2xl font-black text-[#444444] mb-3">Move the right applicants forward</h3>
                    <p class="text-[#666666] text-sm leading-relaxed mb-5">
                        Compare candidates side by side, use AI ranking, schedule interviews, and collaborate
                        with your team — all in one dashboard.
                    </p>
                    <a href="#" class="text-xs font-bold uppercase tracking-widest hover:text-[#008A84] transition-colors" style="color:#00B1AA">
                        Learn More &rarr;
                    </a>
                </div>
            </div>

            {{-- Three-column secondary features --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                @foreach([
                    ['Interview Scheduling',        'Source &amp; Schedule', 'Automated interview invitations with calendar sync. Coordinate availability between your team and candidates without email back-and-forth.', 'sched'],
                    ['Analytics Dashboard',         'Insights &amp; Data',   'Track listing performance, application rates, and conversion metrics. Make data-driven decisions to sharpen your hiring strategy.',         'analytics'],
                    ['Company Profile Management',  'Build Your Brand',       'Showcase your culture, values, and benefits. A compelling employer page helps attract students who are the right cultural fit.',            'brand'],
                ] as [$ftitle, $flabel, $fdesc, $seed])
                <div class="bg-white rounded-2xl p-6 border border-[#E5E7EB] hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                    <img src="https://picsum.photos/seed/{{ $seed }}/800/400"
                         alt="{{ $ftitle }}"
                         class="w-full h-36 object-cover rounded-xl mb-5 group-hover:scale-105 transition-transform duration-300"/>
                    <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#00B1AA">{!! $flabel !!}</p>
                    <h4 class="font-black text-[#444444] mb-2">{{ $ftitle }}</h4>
                    <p class="text-sm text-[#666666] leading-relaxed">{{ $fdesc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================================================
         4. ADMIN FEATURES
         ============================================================ --}}
    <section id="admin" class="py-20 sm:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">

                {{-- Left: Copy + stat cards --}}
                <div>
                    <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-6"
                          style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                        Admin Panel
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-5 leading-tight">
                        Full Platform Control at Your Fingertips
                    </h2>
                    <p class="text-[#666666] text-base sm:text-lg leading-relaxed mb-10">
                        Administrators get a powerful command centre to oversee every aspect of the
                        InterLink ecosystem — users, companies, content, and analytics.
                    </p>

                    {{-- Stat cards --}}
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        @foreach([
                            ['12,450', 'Total Users'],
                            ['584',    'Companies'],
                            ['2,310',  'Internships Posted'],
                            ['98',     'Open Tickets'],
                        ] as [$val, $label])
                        <div class="rounded-2xl p-5 border border-[#E5E7EB] bg-[#F7F9FA] hover:shadow-md transition-shadow">
                            <p class="text-2xl sm:text-3xl font-black text-[#444444]">{{ $val }}</p>
                            <p class="text-sm text-[#666666] font-medium mt-1">{{ $label }}</p>
                            <div class="h-1 rounded-full mt-3 w-12" style="background-color:#00B1AA"></div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Feature list --}}
                    <div class="space-y-2 sm:space-y-3">
                        @foreach(['User Moderation','Reports Management','Ticket Management','Platform Analytics','Role Permissions','Security Monitoring'] as $feat)
                        <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-[#E5E7EB] bg-[#F7F9FA] hover:border-[#00B1AA]/50 transition-colors">
                            <div class="w-2 h-2 rounded-full flex-shrink-0" style="background-color:#00B1AA"></div>
                            <span class="text-sm font-semibold text-[#444444]">{{ $feat }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Right: Table + images --}}
                <div class="space-y-4">
                    {{-- Activity table --}}
                    <div class="rounded-2xl border border-[#E5E7EB] overflow-hidden shadow-sm bg-white">
                        <div class="px-5 sm:px-6 py-4 border-b border-[#E5E7EB] flex items-center justify-between bg-[#F7F9FA]">
                            <p class="font-bold text-[#444444] text-sm">Recent Platform Activity</p>
                            <span class="text-xs font-bold px-3 py-1 rounded-full text-white" style="background-color:#00B1AA">Live</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[420px]">
                                <thead>
                                    <tr class="border-b border-[#E5E7EB]">
                                        <th class="px-4 sm:px-5 py-3 text-left text-xs font-semibold text-[#666666] uppercase tracking-wide">User</th>
                                        <th class="px-4 sm:px-5 py-3 text-left text-xs font-semibold text-[#666666] uppercase tracking-wide">Action</th>
                                        <th class="px-4 sm:px-5 py-3 text-left text-xs font-semibold text-[#666666] uppercase tracking-wide">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#F7F9FA]">
                                    @foreach([
                                        ['Sara K.',    'Applied to Internship',   'Active',   8],
                                        ['TechCorp',   'Posted New Listing',       'Verified', 9],
                                        ['Ahmed R.',   'Updated CV',               'Active',   10],
                                        ['StartupX',   'Scheduled Interview',      'Pending',  11],
                                        ['Admin',      'Reviewed Report #44',      'Resolved', 12],
                                    ] as [$uname, $uaction, $ustatus, $img])
                                    <tr class="hover:bg-[#F7F9FA] transition-colors">
                                        <td class="px-4 sm:px-5 py-3">
                                            <div class="flex items-center gap-2">
                                                <img src="https://i.pravatar.cc/60?img={{ $img }}"
                                                     alt="avatar"
                                                     class="w-7 h-7 rounded-full object-cover flex-shrink-0"/>
                                                <span class="text-sm font-medium text-[#444444]">{{ $uname }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 sm:px-5 py-3 text-xs text-[#666666]">{{ $uaction }}</td>
                                        <td class="px-4 sm:px-5 py-3">
                                            @if($ustatus === 'Active')
                                                <span class="text-xs font-semibold px-2 py-1 rounded-full bg-green-50 text-green-600">{{ $ustatus }}</span>
                                            @elseif($ustatus === 'Pending')
                                                <span class="text-xs font-semibold px-2 py-1 rounded-full bg-yellow-50 text-yellow-600">{{ $ustatus }}</span>
                                            @elseif($ustatus === 'Verified')
                                                <span class="text-xs font-semibold px-2 py-1 rounded-full text-white" style="background-color:#00B1AA">{{ $ustatus }}</span>
                                            @else
                                                <span class="text-xs font-semibold px-2 py-1 rounded-full bg-[#DDF7F6] text-[#008A84]">{{ $ustatus }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Image row --}}
                    <div class="grid grid-cols-3 gap-3">
                        @foreach(['admin1','admin2','admin3'] as $seed)
                        <div class="rounded-xl overflow-hidden shadow-sm">
                            <img src="https://picsum.photos/seed/{{ $seed }}/400/250"
                                 alt="Admin"
                                 class="w-full h-24 object-cover hover:scale-105 transition-transform duration-300"/>
                        </div>
                        @endforeach
                    </div>

                    {{-- Wide image --}}
                    <div class="rounded-2xl overflow-hidden shadow-sm">
                        <img src="https://picsum.photos/seed/adminwide/1200/400"
                             alt="Admin wide"
                             class="w-full h-36 object-cover"/>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ============================================================
         5. PLATFORM FEATURES
         ============================================================ --}}
    <section class="py-20 sm:py-28" style="background-color:#F7F9FA">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-16 sm:mb-20">

                {{-- Left --}}
                <div class="relative">
                    <div class="absolute -top-6 -left-4 w-8 h-8">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="20" y1="0"  x2="20" y2="40" stroke="#00B1AA" stroke-width="3"/>
                            <line x1="0"  y1="20" x2="40" y2="20" stroke="#00B1AA" stroke-width="3"/>
                            <line x1="6"  y1="6"  x2="34" y2="34" stroke="#DDF7F6" stroke-width="3"/>
                            <line x1="34" y1="6"  x2="6"  y2="34" stroke="#DDF7F6" stroke-width="3"/>
                        </svg>
                    </div>
                    <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-6"
                          style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                        Platform-Wide Features
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-5 leading-tight">
                        Built for the Modern World
                    </h2>
                    <p class="text-[#666666] text-base sm:text-lg leading-relaxed mb-4">
                        Every feature on InterLink is designed with simplicity, speed, and security in
                        mind — so everyone can focus on what matters most.
                    </p>
                    <p class="text-[#666666] text-base leading-relaxed mb-10">
                        From real-time notifications to AI-powered matching, our platform is continuously
                        updated with the tools professionals expect.
                    </p>
                    <a href="#"
                       class="inline-block text-sm font-bold text-white px-8 py-4 rounded-full hover:shadow-xl hover:-translate-y-0.5 transition-all"
                       style="background-color:#00B1AA">
                        Explore the Platform
                    </a>
                </div>

                {{-- Right: image with floating cards --}}
                <div class="relative mt-8 lg:mt-0">
                    <div class="rounded-3xl overflow-hidden shadow-xl">
                        <img src="https://picsum.photos/seed/platform/900/600"
                             alt="Platform"
                             class="w-full h-72 sm:h-96 object-cover"/>
                    </div>
                    {{-- AI Match card --}}
                    <div class="absolute top-6 -left-4 sm:-left-6 bg-white rounded-2xl shadow-xl border border-[#E5E7EB] p-4 w-40 sm:w-44">
                        <p class="text-xs text-[#666666] mb-1">AI Match Score</p>
                        <p class="text-2xl font-black" style="color:#00B1AA">94%</p>
                        <img src="https://picsum.photos/seed/match/300/120"
                             alt="match"
                             class="w-full h-14 object-cover rounded-xl mt-2"/>
                    </div>
                    {{-- Message card --}}
                    <div class="absolute -bottom-5 -right-4 sm:-right-5 bg-white rounded-2xl shadow-xl border border-[#E5E7EB] p-4">
                        <p class="text-xs text-[#666666] mb-1">New Message</p>
                        <div class="flex items-center gap-2">
                            <img src="https://i.pravatar.cc/60?img=15"
                                 alt="msg"
                                 class="w-8 h-8 rounded-full object-cover flex-shrink-0"/>
                            <div>
                                <p class="text-xs font-bold text-[#444444]">TechCorp replied</p>
                                <p class="text-xs text-[#666666]">Interview confirmed</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- 6-feature grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                    ['Real-time Notifications', 'notif',  'Instant alerts for new applications, messages, status updates, and deadlines — delivered across all devices the moment they happen.'],
                    ['Messaging System',         'msg',    'A built-in chat interface so students and recruiters can communicate without ever leaving the platform. Full message history included.'],
                    ['AI Recommendations',       'ai',     'Machine learning models continuously improve suggestions for both students and companies based on behaviour and outcomes.'],
                    ['Secure Authentication',    'secure', 'Two-factor authentication, OAuth login, and session management to protect every account on the platform.'],
                    ['Responsive Interface',     'resp',   'Optimised for all screen sizes. Use InterLink seamlessly on mobile, tablet, or desktop with a consistent experience.'],
                    ['Multi-role Access',        'roles',  'One platform, three distinct experiences — Student, Company, and Admin — each tailored to the exact needs of that role.'],
                ] as [$ftitle, $seed, $fdesc])
                <div class="bg-white rounded-2xl p-6 border border-[#E5E7EB] hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <img src="https://picsum.photos/seed/{{ $seed }}/800/400"
                         alt="{{ $ftitle }}"
                         class="w-full h-32 object-cover rounded-xl mb-5 group-hover:scale-105 transition-transform duration-300"/>
                    <h4 class="font-black text-[#444444] mb-2">{{ $ftitle }}</h4>
                    <p class="text-sm text-[#666666] leading-relaxed">{{ $fdesc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================================================
         6. UI SHOWCASE
         ============================================================ --}}
    <section class="py-20 sm:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-14 sm:mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-4"
                      style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                    Beautiful by Design
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-4">See It in Action</h2>
                <p class="text-[#666666] max-w-xl mx-auto">
                    A platform that looks as good as it performs — across every device and screen size.
                </p>
            </div>

            {{-- Desktop browser frame --}}
            <div class="mb-8 shadow-2xl rounded-2xl overflow-hidden border border-[#E5E7EB]">
                <div class="bg-[#F7F9FA] px-5 py-3 flex items-center gap-2 border-b border-[#E5E7EB]">
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="flex-1 mx-4 bg-white rounded-lg px-3 py-1 text-xs text-[#666666] text-center border border-[#E5E7EB]">
                        interlink.io/dashboard
                    </div>
                </div>
                <img src="https://picsum.photos/seed/desktop/1400/600"
                     alt="Desktop Dashboard"
                     class="w-full h-56 sm:h-80 object-cover"/>
            </div>

            {{-- Tablet + Mobile row --}}
            <div class="grid md:grid-cols-5 gap-6 items-end mb-10 sm:mb-12">
                {{-- Tablet --}}
                <div class="md:col-span-3">
                    <div class="rounded-3xl p-3 shadow-2xl" style="background-color:#444444">
                        <div class="rounded-2xl overflow-hidden">
                            <img src="https://picsum.photos/seed/tablet/900/500"
                                 alt="Tablet"
                                 class="w-full h-48 sm:h-60 object-cover"/>
                        </div>
                    </div>
                    <p class="text-center text-sm text-[#666666] font-medium mt-4">Tablet — Student Dashboard</p>
                </div>
                {{-- Mobile --}}
                <div class="md:col-span-2 flex flex-col items-center">
                    <div class="rounded-[2rem] p-2 shadow-2xl w-40 sm:w-44" style="background-color:#444444">
                        <div class="rounded-[1.5rem] overflow-hidden">
                            <img src="https://picsum.photos/seed/mobile/400/700"
                                 alt="Mobile"
                                 class="w-full h-60 sm:h-72 object-cover"/>
                        </div>
                    </div>
                    <p class="text-center text-sm text-[#666666] font-medium mt-4">Mobile — Job Search</p>
                </div>
            </div>

            {{-- Screenshot gallery --}}
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                @foreach(['Student Dashboard','Company Hub','Admin Panel'] as $i => $label)
                <div class="relative rounded-2xl overflow-hidden shadow-lg group">
                    <img src="https://picsum.photos/seed/screen{{ $i }}/800/500"
                         alt="{{ $label }}"
                         class="w-full h-44 sm:h-52 object-cover group-hover:scale-105 transition-transform duration-500"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent flex items-end p-5">
                        <div class="backdrop-blur-sm bg-white/10 rounded-xl px-4 py-2 border border-white/20">
                            <p class="text-white font-bold text-sm">{{ $label }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================================================
         7. HOW IT WORKS
         ============================================================ --}}
    <section id="how-it-works" class="py-20 sm:py-28" style="background-color:#F7F9FA">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-14 sm:mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-4"
                      style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                    Simple Process
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-4">How InterLink Works</h2>
                <p class="text-[#666666] max-w-xl mx-auto">
                    Three easy steps for students and companies to get started on InterLink.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">

                {{-- Students steps --}}
                <div>
                    <div class="flex items-center gap-3 mb-8 pb-5 border-b border-[#E5E7EB]">
                        <img src="https://i.pravatar.cc/80?img=20" alt="Student" class="w-10 h-10 rounded-full object-cover"/>
                        <h3 class="text-xl sm:text-2xl font-black text-[#444444]">For Students</h3>
                    </div>
                    @foreach([
                        ['Create Your Profile',   'Sign up, fill in your skills, education, and career goals. Upload your CV and let your profile do the talking.',                           'step1'],
                        ['Apply to Internships',  'Browse curated listings or follow AI recommendations. Apply in seconds using your saved profile — no forms to refill.',                    'step2'],
                        ['Get Hired',             'Track your applications, attend interviews, and receive your offer — all managed within InterLink.',                                        'step3'],
                    ] as $i => [$stitle, $sdesc, $seed])
                    <div class="flex gap-5 relative">
                        <div class="flex flex-col items-center">
                            <div class="w-10 sm:w-11 h-10 sm:h-11 rounded-full flex items-center justify-center font-black text-white text-sm flex-shrink-0 z-10"
                                 style="background-color:#00B1AA">
                                0{{ $i + 1 }}
                            </div>
                            @if($i < 2)
                            <div class="w-px flex-1 my-2" style="background-color:rgba(0,177,170,0.25)"></div>
                            @endif
                        </div>
                        <div class="pb-8 flex-1">
                            <h4 class="text-base sm:text-lg font-bold text-[#444444] mb-1">{{ $stitle }}</h4>
                            <p class="text-sm text-[#666666] leading-relaxed mb-3">{{ $sdesc }}</p>
                            <img src="https://picsum.photos/seed/{{ $seed }}/800/300"
                                 alt="{{ $stitle }}"
                                 class="w-full h-24 sm:h-28 object-cover rounded-xl shadow-sm"/>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Companies steps --}}
                <div>
                    <div class="flex items-center gap-3 mb-8 pb-5 border-b border-[#E5E7EB]">
                        <img src="https://i.pravatar.cc/80?img=25" alt="Company" class="w-10 h-10 rounded-full object-cover"/>
                        <h3 class="text-xl sm:text-2xl font-black text-[#444444]">For Companies</h3>
                    </div>
                    @foreach([
                        ['Post Opportunities', 'Create a company profile and publish internship listings in under five minutes. Reach thousands of qualified students instantly.',        'cstep1'],
                        ['Review Applicants',  'Use smart filters and AI ranking to identify the best candidates. Access CVs and portfolios side by side with your team.',             'cstep2'],
                        ['Hire Talent',        'Schedule interviews, send offer letters, and onboard your new interns — all from one central dashboard.',                              'cstep3'],
                    ] as $i => [$stitle, $sdesc, $seed])
                    <div class="flex gap-5 relative">
                        <div class="flex flex-col items-center">
                            <div class="w-10 sm:w-11 h-10 sm:h-11 rounded-full flex items-center justify-center font-black text-white text-sm flex-shrink-0 z-10"
                                 style="background-color:#00B1AA">
                                0{{ $i + 1 }}
                            </div>
                            @if($i < 2)
                            <div class="w-px flex-1 my-2" style="background-color:rgba(0,177,170,0.25)"></div>
                            @endif
                        </div>
                        <div class="pb-8 flex-1">
                            <h4 class="text-base sm:text-lg font-bold text-[#444444] mb-1">{{ $stitle }}</h4>
                            <p class="text-sm text-[#666666] leading-relaxed mb-3">{{ $sdesc }}</p>
                            <img src="https://picsum.photos/seed/{{ $seed }}/800/300"
                                 alt="{{ $stitle }}"
                                 class="w-full h-24 sm:h-28 object-cover rounded-xl shadow-sm"/>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>


    {{-- ============================================================
         8. SECURITY & TRUST
         ============================================================ --}}
    <section class="py-20 sm:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                {{-- Left --}}
                <div>
                    <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-6"
                          style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                        Security &amp; Trust
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-5 leading-tight">
                        Your Data is Safe With Us
                    </h2>
                    <p class="text-[#666666] text-base sm:text-lg leading-relaxed mb-10">
                        InterLink is built on enterprise-grade infrastructure with multiple layers of
                        protection — so students and companies can focus on connecting, not security.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach([
                            ['Secure Authentication',    'Multi-factor authentication and OAuth 2.0 login protect every account.'],
                            ['Data Protection',          'All personal data encrypted at rest and in transit using AES-256.'],
                            ['Encrypted Communication',  'End-to-end encrypted messaging keeps private conversations private.'],
                            ['Verified Companies',       'Every company goes through manual verification before going live.'],
                        ] as [$ftitle, $fdesc])
                        <div class="rounded-2xl p-5 border border-[#E5E7EB] bg-[#F7F9FA] hover:shadow-md transition-shadow">
                            <div class="w-8 h-8 rounded-lg mb-3" style="background-color:#DDF7F6"></div>
                            <h4 class="font-bold text-[#444444] mb-1 text-sm">{{ $ftitle }}</h4>
                            <p class="text-xs text-[#666666] leading-relaxed">{{ $fdesc }}</p>
                        </div>
                        @endforeach
                    </div>

                    {{-- Trust badges --}}
                    <div class="flex flex-wrap gap-3 mt-8">
                        @foreach(['GDPR Compliant','ISO 27001','SOC 2 Type II','256-bit SSL'] as $badge)
                        <span class="text-xs font-bold px-4 py-2 rounded-full border border-[#E5E7EB] text-[#444444] bg-white shadow-sm">
                            {{ $badge }}
                        </span>
                        @endforeach
                    </div>
                </div>

                {{-- Right --}}
                <div class="relative mt-8 lg:mt-0">
                    <div class="rounded-3xl overflow-hidden shadow-xl">
                        <img src="https://picsum.photos/seed/security/900/600"
                             alt="Security"
                             class="w-full h-64 sm:h-80 object-cover"/>
                    </div>
                    <div class="absolute bottom-6 left-4 sm:left-6 right-4 sm:right-6 bg-white/80 backdrop-blur rounded-2xl p-4 sm:p-5 border border-white shadow-lg">
                        <p class="font-black text-[#444444] mb-1 text-sm sm:text-base">Bank-grade encryption on every request</p>
                        <p class="text-xs sm:text-sm text-[#666666]">All data transmitted through InterLink is protected end-to-end.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-4">
                        <img src="https://picsum.photos/seed/trust1/600/300"
                             alt="Trust"
                             class="rounded-2xl h-24 sm:h-28 w-full object-cover shadow-sm"/>
                        <img src="https://picsum.photos/seed/trust2/600/300"
                             alt="Trust"
                             class="rounded-2xl h-24 sm:h-28 w-full object-cover shadow-sm"/>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ============================================================
         9. TESTIMONIALS
         ============================================================ --}}
    <section class="py-20 sm:py-28" style="background-color:#F7F9FA">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-14 sm:mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-4"
                      style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                    Testimonials
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-4">
                    Loved by Students, Recruiters &amp; Universities
                </h2>
                <p class="text-[#666666] max-w-xl mx-auto">Real stories from people who found success through InterLink.</p>
            </div>

            {{-- Featured testimonial --}}
            <div class="relative mb-10 sm:mb-12">
                <div class="absolute -top-4 left-4 w-16 h-20 rounded-xl border-2 border-dashed border-[#E5E7EB] opacity-40"></div>
                <div class="absolute -bottom-4 right-8 w-12 h-16 rounded-xl border-2 border-dashed border-[#E5E7EB] opacity-40"></div>

                <div class="flex flex-col lg:flex-row items-center lg:items-stretch">
                    {{-- Image --}}
                    <div class="relative z-10 lg:-mr-8 flex-shrink-0 w-full sm:w-72 lg:w-80 mb-6 lg:mb-0">
                        <div class="rounded-2xl overflow-hidden shadow-2xl">
                            <img src="https://picsum.photos/seed/testimony/600/700"
                                 alt="Testimonial"
                                 class="w-full h-56 sm:h-72 lg:h-full object-cover"/>
                        </div>
                    </div>
                    {{-- Dark card —using #444444 charcoal instead of navy --}}
                    <div class="rounded-2xl p-8 lg:pl-20 flex flex-col justify-center flex-1 shadow-xl" style="background-color:#444444">
                        <p class="text-white text-xl sm:text-2xl lg:text-3xl font-light leading-relaxed mb-8 italic">
                            "InterLink transformed the way I approach internship hunting. The AI recommendations
                            pointed me straight to companies that matched my skills. I landed my dream role within
                            three weeks and received an offer that exceeded my expectations."
                        </p>
                        <div>
                            <p class="text-white font-bold">Sara Amrani</p>
                            <p class="text-white/60 text-sm mt-1">Computer Science Student, Mohammed V University</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimonial card grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                    ['Youssef El Khadiri', 'Marketing Student, Hassan II University', 'The application tracking feature kept me completely organised during recruitment season. I always knew exactly where I stood with each company.', 30],
                    ['Thomas Bergmann',    'HR Lead, TechCorp GmbH',                  'We reduced time-to-hire by 60% after switching to InterLink. The candidate filtering is exceptional and the quality of applicants is noticeably higher.', 31],
                    ['Nadia Boussaid',     'Data Science Student, ENSIAS',            'I uploaded my CV once and applied to 12 internships in a single afternoon. The UI is so clean and everything just works perfectly.', 32],
                    ['Amina Tahir',        'Talent Acquisition, StartupX Morocco',    'Interview scheduling alone saved us hours every week. Our entire recruiting workflow is now centralised in InterLink and it has transformed how we hire.', 33],
                    ['Prof. Rachid Belkacem', 'Career Services, ENSA Casablanca',     'We partnered with InterLink to help our students access better opportunities. The analytics give us clear visibility into graduate placement.', 34],
                    ['Karim Mansouri',     'Full-Stack Developer Student, ENSA',       'From zero applications to three offers in 6 weeks. InterLink kept me focused and the alerts made sure I never missed a deadline.', 35],
                ] as [$tname, $trole, $treview, $img])
                <div class="bg-white rounded-2xl p-6 sm:p-7 border border-[#E5E7EB] hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <p class="text-[#666666] leading-relaxed mb-6 text-sm italic">"{{ $treview }}"</p>
                    <div class="flex items-center gap-3 pt-5 border-t border-[#E5E7EB]">
                        <img src="https://i.pravatar.cc/80?img={{ $img }}"
                             alt="{{ $tname }}"
                             class="w-10 h-10 rounded-full object-cover border-2 border-[#E5E7EB] flex-shrink-0"/>
                        <div>
                            <p class="font-bold text-[#444444] text-sm">{{ $tname }}</p>
                            <p class="text-xs text-[#666666]">{{ $trole }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Image strip --}}
            <div class="flex gap-2 sm:gap-3 mt-8 sm:mt-10 rounded-2xl overflow-hidden shadow-sm">
                @foreach(['strip1','strip2','strip3','strip4','strip5'] as $seed)
                <img src="https://picsum.photos/seed/{{ $seed }}/400/200"
                     alt="Team"
                     class="flex-1 h-20 sm:h-24 object-cover hover:scale-105 transition-transform duration-300"/>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================================================
         10. FAQ
         ============================================================ --}}
    <section id="faq" class="py-20 sm:py-28 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">

            <div class="grid lg:grid-cols-5 gap-12 lg:gap-16 items-start">

                {{-- Left sticky heading --}}
                <div class="lg:col-span-2 lg:sticky lg:top-28">
                    <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full border mb-4"
                          style="color:#00B1AA; border-color:rgba(0,177,170,0.3); background-color:#DDF7F6">
                        FAQ
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#444444] mb-4">Frequently Asked Questions</h2>
                    <p class="text-[#666666] text-sm leading-relaxed mb-6">
                        Can't find what you're looking for? Reach out to our support team anytime.
                    </p>
                    <a href="#"
                       class="inline-block text-sm font-bold text-white px-6 py-3 rounded-full hover:shadow-lg hover:opacity-90 transition-all"
                       style="background-color:#00B1AA">
                        Contact Support
                    </a>
                    <div class="mt-6 rounded-2xl overflow-hidden shadow-sm">
                        <img src="https://picsum.photos/seed/support/600/350"
                             alt="Support"
                             class="w-full h-36 sm:h-40 object-cover"/>
                    </div>
                </div>

                {{-- Right: accordion --}}
                <div class="lg:col-span-3 space-y-3" x-data="{ open: null }">
                    @foreach([
                        ['How do students apply for internships?',    'Students create a free profile, upload their CV, and browse available listings. With one click they submit an application using their saved profile. Our AI also surfaces relevant listings automatically based on skills and interests.'],
                        ['How do companies recruit through InterLink?','Companies register, verify their organisation, and post internship listings. They then review incoming applications through a candidate management dashboard, use filters to shortlist talent, and schedule interviews — all in one place.'],
                        ['Is InterLink free to use for students?',     'Yes — InterLink is completely free for students. Create a profile, search listings, apply to internships, and communicate with recruiters at no cost. Companies subscribe to a plan based on the number of listings and features they need.'],
                        ['How are interviews managed on the platform?','Once a recruiter shortlists a candidate, they send automated interview invitations through InterLink. The platform syncs with calendars, proposes available time slots, and sends reminders to both parties.'],
                        ['Can universities partner with InterLink?',   'Absolutely. Universities can partner with InterLink to connect their students with vetted listings, track placement rates, and access aggregated analytics on student success across industries.'],
                        ['How does InterLink verify companies?',       'All companies go through a manual verification process before their listings appear on the platform. We check business registration documents, website authenticity, and additional compliance checks.'],
                    ] as $qi => [$question, $answer])
                    <div class="rounded-2xl border border-[#E5E7EB] overflow-hidden bg-white shadow-sm" x-data="{ isOpen: false }">
                        <button class="w-full px-5 sm:px-6 py-4 sm:py-5 flex items-center justify-between text-left hover:bg-[#F7F9FA] transition-colors"
                                x-on:click="isOpen = !isOpen">
                            <span class="font-bold text-[#444444] pr-4 text-sm">{{ $question }}</span>
                            <span class="flex-shrink-0 w-7 h-7 rounded-full border border-[#E5E7EB] flex items-center justify-center text-sm font-bold transition-all"
                                  :style="isOpen ? 'background-color:#00B1AA; border-color:#00B1AA; color:white' : 'color:#666666'">
                                <span x-text="isOpen ? '−' : '+'"></span>
                            </span>
                        </button>
                        <div x-show="isOpen" x-collapse>
                            <div class="px-5 sm:px-6 pb-5">
                                <p class="text-sm text-[#666666] leading-relaxed">{{ $answer }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>


    {{-- ============================================================
         11. FINAL CTA
         ============================================================ --}}
    <section class="py-20 sm:py-28 relative overflow-hidden" style="background-color:#00B1AA">

        {{-- Background image mosaic --}}
        <div class="absolute inset-0 grid grid-cols-3 sm:grid-cols-6 opacity-[0.08] pointer-events-none">
            @for($i = 0; $i < 12; $i++)
            <img src="https://picsum.photos/seed/cta{{ $i }}/300/300" alt="" class="h-full w-full object-cover"/>
            @endfor
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 lg:px-8 text-center">

            {{-- Stacked avatars --}}
            <div class="flex justify-center mb-8 sm:mb-10">
                <div class="flex -space-x-3">
                    @for($i = 0; $i < 7; $i++)
                    <img src="https://i.pravatar.cc/80?img={{ 40 + $i }}"
                         alt="User"
                         class="w-10 sm:w-11 h-10 sm:h-11 rounded-full object-cover border-2 border-white shadow-md"/>
                    @endfor
                </div>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-6xl font-black text-white mb-5 sm:mb-6 leading-tight">
                Start Your Internship Journey Today
            </h2>
            <p class="text-white/80 text-base sm:text-xl mb-10 sm:mb-12 max-w-2xl mx-auto leading-relaxed">
                Join thousands of students and hundreds of companies already using InterLink to
                connect, collaborate, and grow together.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#"
                   class="inline-block bg-white font-bold text-sm px-8 sm:px-10 py-3.5 sm:py-4 rounded-full hover:shadow-2xl hover:-translate-y-0.5 transition-all"
                   style="color:#00B1AA">
                    Join as Student
                </a>
                <a href="#"
                   class="inline-block border-2 border-white text-white font-bold text-sm px-8 sm:px-10 py-3.5 sm:py-4 rounded-full hover:bg-white/10 hover:-translate-y-0.5 transition-all">
                    Register Company
                </a>
            </div>
        </div>
    </section>


    {{-- ============================================================
         12. FOOTER
         ============================================================ --}}
    <footer class="bg-[#333333] text-[#999999] pt-16 sm:pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-8 sm:gap-10 mb-14 sm:mb-16">

                {{-- Brand --}}
                <div class="sm:col-span-2 lg:col-span-2">
                    <a href="#" class="flex items-baseline gap-0 mb-5">
                        <span class="text-2xl font-black" style="color:#00B1AA">Inter</span>
                        <span class="text-2xl font-black text-white">Link</span>
                    </a>
                    <p class="text-sm leading-relaxed mb-6 max-w-xs">
                        The internship platform connecting talented students with world-class companies across every industry.
                    </p>
                    <div class="flex items-center gap-3">
                        @for($i = 0; $i < 4; $i++)
                        <img src="https://i.pravatar.cc/60?img={{ 50 + $i }}"
                             alt="Social"
                             class="w-9 h-9 rounded-full object-cover border border-[#555555] hover:border-[#888888] transition-colors cursor-pointer"/>
                        @endfor
                    </div>
                </div>

                <div>
                    <p class="text-white font-bold mb-5 text-xs uppercase tracking-wider">Platform</p>
                    <ul class="space-y-3 text-sm">
                        @foreach(['For Students','For Companies','Admin Tools','How It Works','Pricing'] as $link)
                        <li><a href="#" class="hover:text-white transition-colors">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="text-white font-bold mb-5 text-xs uppercase tracking-wider">Company</p>
                    <ul class="space-y-3 text-sm">
                        @foreach(['About Us','Blog','Careers','Press','Partners'] as $link)
                        <li><a href="#" class="hover:text-white transition-colors">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="text-white font-bold mb-5 text-xs uppercase tracking-wider">Contact</p>
                    <ul class="space-y-3 text-sm">
                        <li>hello@interlink.io</li>
                        <li>+212 600 000 000</li>
                        <li>Casablanca, Morocco</li>
                        <li class="pt-2"><a href="#" class="hover:text-white transition-colors">Support Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>

            {{-- Footer image strip --}}
            <div class="flex gap-2 sm:gap-3 mb-8 sm:mb-10 rounded-2xl overflow-hidden">
                @foreach(['footer1','footer2','footer3','footer4','footer5','footer6'] as $seed)
                <img src="https://picsum.photos/seed/{{ $seed }}/300/200"
                     alt="Team"
                     class="flex-1 h-16 sm:h-20 object-cover opacity-50 hover:opacity-90 transition-opacity"/>
                @endforeach
            </div>

            <div class="border-t border-[#444444] pt-7 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs">&copy; {{ date('Y') }} InterLink. All rights reserved.</p>
                <div class="flex gap-5 sm:gap-6 text-xs">
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                </div>
            </div>

        </div>
    </footer>

</div>


    <x-footer />

</body>

</html>