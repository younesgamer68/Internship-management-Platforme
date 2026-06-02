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

<body x-data="{ pageDarkMode: false, init() { window.pageDarkModeToggle = () => { $store.ui.showLoading(400); setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150) }; Alpine.effect(() => { const isDark = $store.ui.darkMode; this.pageDarkMode = isDark; window.pageDarkModeActive = isDark; document.body.classList.toggle('page-dark', isDark); window.dispatchEvent(new CustomEvent('page-dark-mode-change', { detail: { active: isDark } })); }); } }"
    class="welcome-body flex min-h-screen flex-col bg-[#ffffff] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="pageDarkMode ? 'bg-black text-white' : 'bg-[#ffffff] text-[#17494D]'">

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
                        <img src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642dd6e4c16625e149a4cc16_6666%202%20(1).webp"
                             alt="Talent 1"
                             class="w-full h-full object-cover object-top rounded-full"
                             style="clip-path:inset(0 0 0 0 round 50%)"/>
                    </div>
                </div>

                {{-- Blob 2 — bottom right --}}
                <div class="absolute bottom-0 right-[5%] w-44 h-44 sm:w-56 sm:h-56">
                    <div class="absolute inset-0 rounded-full shadow-xl" style="background-color:#DDF7F6"></div>
                    <div class="absolute -top-8 sm:-top-10 inset-x-0 h-[calc(100%+2rem)] sm:h-[calc(100%+2.5rem)] rounded-full overflow-visible">
                        <img src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642dd721900ece4ec98f6876_676%203.webp"
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
        ['Search Internships',        'Discover thousands of internship listings filtered by field, location, duration, and company size. Our smart search returns the most relevant results first.', 'https://www.shutterstock.com/image-vector/internship-banner-web-icon-vector-260nw-2142982795.jpg'],
        ['Save Offers',               'Bookmark your favourite listings and revisit them at any time. Build your personal shortlist with a single click and never lose track of a great opportunity.', 'https://media.licdn.com/dms/image/v2/C4D12AQF3VZ8X4jkt8w/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1588045033207?e=2147483647&v=beta&t=q8QVtAWm0NWXXrZImEJbqKdrskcRmk2k25SOVkqzJY8'],
        ['Track Applications',        'Stay on top of every application with a real-time status board. Know exactly where you stand at every stage — from submitted to offer received.', 'https://www.notion.com/_next/image?url=https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fpublic.notion-static.com%2Ftemplate%2F3272d5e7-0c5f-4099-a345-957e19c40218%2F1756330456712%2Fdesktop.jpg&w=3840&q=75'],
        ['Upload CV',                 'Upload your CV once and apply to hundreds of internships instantly. Maintain multiple CV versions and choose the right one per application.', 'https://s3.resume.io/uploads/examples/resume/og_image/26007/persistent-resource/manager-cv-examples.png'],
        ['Personalized Recommendations','Our AI engine analyses your profile, skills, and preferences to surface the internships most likely to match your career goals — automatically.', 'https://blog.interviewpal.com/content/images/2026/04/internships.jpg'],
        ['Internship Alerts',         'Set up smart keyword alerts and get notified the moment a new internship matching your criteria is posted. Never miss the right opportunity.', 'https://arts.uj.ac.za/wp-content/uploads/2023/09/WEB-BANNER.png'],
    ] as $i => [$title, $desc, $imgSrc])
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
            <img src="{{ $imgSrc }}"
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
                                <img src="https://imageio.forbes.com/specials-images/imageserve/649123b3c9e2fb25293b363e/Computers/0x0.jpg?format=jpg&width=960"
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
    <section id="companies" class="py-20 sm:py-28 bg-[#F7F9FA]">
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
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTINlxOli_Zw5M3IA_yP8IgVMm0hLTafSscIQ&sseed/comp2/400/200" alt="platform" class="rounded-xl h-20 w-full object-cover"/>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT25Gs74GzFbHb6oMhObVZTWWRjZSNu77gxBA&s" alt="platform" class="rounded-xl h-20 w-full object-cover"/>
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
                    ['Interview Scheduling',        'Source &amp; Schedule', 'Automated interview invitations with calendar sync. Coordinate availability between your team and candidates without email back-and-forth.', 'https://www.barraiser.com/wp-content/uploads/2023/04/untitled-design-1536x864-1.jpg'],
                    ['Analytics Dashboard',         'Insights &amp; Data',   'Track listing performance, application rates, and conversion metrics. Make data-driven decisions to sharpen your hiring strategy.',         'https://assets.qlik.com/image/upload/w_1720/q_auto/qlik/glossary/dashboard-examples/seo-analytics-dashboards-tactical-dashboards_lbbcaf.png'],
                    ['Company Profile Management',  'Build Your Brand',       'Showcase your culture, values, and benefits. A compelling employer page helps attract students who are the right cultural fit.',            'https://powerslides.com/wp-content/uploads/2019/10/Management-Team-Profile-3.jpg'],
                ] as [$ftitle, $flabel, $fdesc, $seed])
                <div class="bg-white rounded-2xl p-6 border border-[#E5E7EB] hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                    <img src="{{ $seed }}"
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

              

                    {{-- Wide image --}}
                    <div class="rounded-2xl overflow-hidden shadow-sm">
                        <img src="https://img.freepik.com/free-photo/businesspeople-having-good-time-meeting_1098-1786.jpg?semt=ais_hybrid&w=740&q=80"
                             alt="Admin wide"
                             class="w-full h-100 object-cover"/>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ============================================================
         5. PLATFORM FEATURES
         ============================================================ --}}
    <section class="py-20 sm:py-28 bg-[#F7F9FA]">
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
                        <img src="https://img.freepik.com/free-photo/group-people-holding-hand-assemble-togetherness_53876-64954.jpg?semt=ais_hybrid&w=740&q=80"
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
                    ['Real-time Notifications', 'https://timesinternet.in/blog/wp-content/uploads/2020/07/real-time-personalized-push-notifications.jpg',  'Instant alerts for new applications, messages, status updates, and deadlines — delivered across all devices the moment they happen.'],
                    ['Messaging System',         'https://5.imimg.com/data5/JE/CT/QJ/GLADMIN-63163868/infobizzs-product-classpie-2-500x500.jpg',    'A built-in chat interface so students and recruiters can communicate without ever leaving the platform. Full message history included.'],
                    ['AI Recommendations',       'https://lh7-us.googleusercontent.com/c0Y_9vCPlaHCm8Nwrf8IwpQHYzeZyJKk5oH-H13VJMC7tRWouHvKKBeBhejFX2f-CkRW4_ZQBL8oynUHVp41XYq-p0Ez0ltEs8homDanov5uIR-VR-qZoBpKBfCZqRbjKct7enrwJbLpt7klARaD08E',     'Machine learning models continuously improve suggestions for both students and companies based on behaviour and outcomes.'],
                    ['Secure Authentication',    'https://informationage-production.s3.amazonaws.com/uploads/2022/10/what-to-know-about-user-authentication-cyber-security.jpeg', 'Two-factor authentication, OAuth login, and session management to protect every account on the platform.'],
                    ['Responsive Interface',     'https://studio.uxpincdn.com/studio/wp-content/uploads/2022/01/Responsive-design-best-practices-1024x512.png.webp',   'Optimised for all screen sizes. Use InterLink seamlessly on mobile, tablet, or desktop with a consistent experience.'],
                    ['Multi-role Access',        'https://t3.ftcdn.net/jpg/20/16/93/26/360_F_2016932689_A6OMjCe2WRWlJHJWTpUmE7VaBTfRBR7Q.jpg',  'One platform, three distinct experiences — Student, Company, and Admin — each tailored to the exact needs of that role.'],
                ] as [$ftitle, $seed, $fdesc])
                <div class="bg-white rounded-2xl p-6 border border-[#E5E7EB] hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <img src="{{ $seed }}"
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
                <img src="{{ asset('images/site photos/student-dash.png') }}"
                     alt="Desktop Dashboard"
                     class="w-full h-56 sm:h-80 object-cover"/>
            </div>

            {{-- Tablet + Mobile row --}}
            <div class="grid md:grid-cols-5 gap-6 items-end mb-10 sm:mb-12">
                {{-- Tablet --}}
                <div class="md:col-span-3">
                    <div class="rounded-3xl p-3 shadow-2xl" style="background-color:#444444">
                        <div class="rounded-2xl overflow-hidden">
                            <img src="{{ asset('images/site photos/student-dash.png') }}"
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
                            <img src="https://bytescale.mobbin.com/FW25bBB/image/mobbin.com/prod/file.webp?enc=1.BQnbdJK6.eZ9hqpHmqmA2HwK0._T10eVci97_OdKgpwwc7Vcg7jHwCTXyfzt0oxStQNVKS92U-g7tSKgVYcB7ZPU79VYAIyslIpdSjTH4ad-WDSkc1LmPvXbSqGlwIEM0b8BDOpvztkVEg8iyoBTTEvgN3t6oTFkblFL24QzaL5I6-xP55fdcePlCp6js9-vi-X2pgZmwf8va3WcM7i8SjGcPJoGcCTmUh3JNtXzpXW9e6u7pV3zJXfyscHIQ5Fkcje6LCeSnQoPAk6w-xao-kvCxF38CMhKa8EX6mlg4CsTmQMmcBK0qlfMgpivY7z0TBnn9agqm0Cbnqr224SiH6iz5cZMNq_ZJbG2bJtC_dkmaMMweC3NnCjAh_uVYZUBE28qI4fVg"
                                 alt="Mobile"
                                 class="w-full h-60 sm:h-72 object-cover"/>
                        </div>
                    </div>
                    <p class="text-center text-sm text-[#666666] font-medium mt-4">Mobile — Job Search</p>
                </div>
            </div>

      {{-- Screenshot gallery --}}
<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
    @foreach([
        ['Student Dashboard', 'images/site photos/student-dash.png'],
        ['Company Hub', 'images/site photos/company-dash.png'],
        ['Admin Panel', 'images/site photos/admin-dash.png']
    ] as [$label, $imgPath])
    <div class="relative rounded-2xl overflow-hidden shadow-lg group">
        <img src="{{ asset($imgPath) }}"
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
    <section id="how-it-works" class="py-20 sm:py-28 bg-[#F7F9FA]">
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
                        <img src="https://img.magnific.com/free-photo/young-student-woman-wearing-denim-jacket-eyeglasses-holding-colorful-folders-showing-thumb-up-pink_176532-13861.jpg?semt=ais_hybrid&w=740&q=80" alt="Student" class="w-10 h-10 rounded-full object-cover"/>
                        <h3 class="text-xl sm:text-2xl font-black text-[#444444]">For Students</h3>
                    </div>
                    @foreach([
                        ['Create Your Profile',   'Sign up, fill in your skills, education, and career goals. Upload your CV and let your profile do the talking.',                           'step1'],
                        ['Apply to Internships',  'Browse curated listings or follow AI recommendations. Apply in seconds using your saved profile — no forms to refill.',                    'step2'],
                        ['Get Hired',             'Track your applications, attend interviews, and receive your offer — all managed within InterLink.',                                        'step3'],
                    ] as $i => [$stitle, $sdesc, $seed])
                    <div class="flex gap-5 relative pt-10 ">
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
                
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Companies steps --}}
                <div>
                    <div class="flex items-center gap-3 mb-8 pb-5 border-b border-[#E5E7EB]">
                        <img src="https://img.freepik.com/free-photo/low-angle-view-skyscrapers_1359-1105.jpg?semt=ais_hybrid&w=740&q=80" alt="Company" class="w-10 h-10 rounded-full object-cover"/>
                        <h3 class="text-xl sm:text-2xl font-black text-[#444444]">For Companies</h3>
                    </div>
                    @foreach([
                        ['Post Opportunities', 'Create a company profile and publish internship listings in under five minutes. Reach thousands of qualified students instantly.',        'cstep1'],
                        ['Review Applicants',  'Use smart filters and AI ranking to identify the best candidates. Access CVs and portfolios side by side with your team.',             'cstep2'],
                        ['Hire Talent',        'Schedule interviews, send offer letters, and onboard your new interns — all from one central dashboard.',                              'cstep3'],
                    ] as $i => [$stitle, $sdesc, $seed])
                    <div class="flex gap-5 relative pt-10 ">
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
                        <img src="https://www.comstar.com.pk/assets/files/blog/data_security_managment.png"
                             alt="Security"
                             class="w-full h-64 sm:h-80 object-cover"/>
                    </div>
                    <div class="absolute bottom-6 left-4 sm:left-6 right-4 sm:right-6 bg-white/80 backdrop-blur rounded-2xl p-4 sm:p-5 border border-white shadow-lg">
                        <p class="font-black text-[#444444] mb-1 text-sm sm:text-base">Bank-grade encryption on every request</p>
                        <p class="text-xs sm:text-sm text-[#666666]">All data transmitted through InterLink is protected end-to-end.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-4">
                        <img src="data:image/jpeg;base64,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"
                             alt="Trust"
                             class="rounded-2xl h-24 sm:h-28 w-full object-cover shadow-sm"/>
                        <img src="data:image/jpeg;base64,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"
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
    <section class="py-20 sm:py-28 bg-[#F7F9FA]">
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
                        <img src="{{ asset('images/site photos/student-dash.png') }}"
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


   
</div>


    <x-footer />

</body>

</html>