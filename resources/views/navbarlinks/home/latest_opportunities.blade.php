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
    <x-nav-bar />
    <x-loading-overlay />

    {{-- ============================================================
    InterLink — Latest Opportunities Page
    Laravel Blade · Tailwind CSS ONLY · No custom CSS
    ============================================================ --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <div class="font-[Poppins] bg-[#F7F9FA] text-[#444444] antialiased">


        {{-- ============================================================
        1. HERO SECTION
        ============================================================ --}}
        <section class="bg-white relative overflow-hidden">

            {{-- Background image (leave src empty — fill later) --}}
            <div class="absolute inset-0 z-0">
                <img src="" alt="" class="w-full h-full object-cover opacity-[0.06]">
            </div>

            {{-- Soft aqua blobs --}}
            <div class="absolute top-0 left-0 w-96 h-96 rounded-full -translate-x-1/2 -translate-y-1/2 z-0"
                style="background:rgba(0,177,170,.07)"></div>
            <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full translate-x-1/3 translate-y-1/3 z-0"
                style="background:rgba(221,247,246,.6)"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full z-0"
                style="background:rgba(221,247,246,.2)"></div>

            <div class="relative z-10 max-w-5xl mx-auto px-6 lg:px-8 pt-20 pb-16 text-center">

                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 bg-[#DDF7F6] border border-[#00B1AA]/20 rounded-full px-4 py-2 mb-8">
                    <span class="w-2 h-2 rounded-full bg-[#00B1AA] animate-pulse inline-block"></span>
                    <span class="text-[#008A84] text-xs font-semibold uppercase tracking-widest">Live Internship Board —
                        Updated Daily</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-[#444444] leading-[1.08] mb-6">
                    Discover the Latest<br>
                    <span class="text-[#00B1AA]">Internship Opportunities</span>
                </h1>

                <p class="text-[#666666] text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
                    InterLink bridges the gap between ambitious students and forward-thinking companies. Browse hundreds
                    of verified internships across every industry and location.
                </p>

                {{-- Search bar --}}
                <div
                    class="bg-white rounded-2xl shadow-xl border border-[#E5E7EB] p-3 flex flex-col sm:flex-row gap-3 max-w-2xl mx-auto mb-12">
                    <input type="text" placeholder="Search internship title, skill, or keyword..."
                        class="flex-1 px-4 py-3 rounded-xl bg-[#F7F9FA] border border-[#E5E7EB] text-sm text-[#444444] placeholder-[#666666]/50 focus:outline-none focus:border-[#00B1AA] transition-colors duration-200">
                    <input type="text" placeholder="City or remote..."
                        class="w-full sm:w-44 px-4 py-3 rounded-xl bg-[#F7F9FA] border border-[#E5E7EB] text-sm text-[#444444] placeholder-[#666666]/50 focus:outline-none focus:border-[#00B1AA] transition-colors duration-200">
                    <button
                        class="bg-[#00B1AA] hover:bg-[#008A84] text-white font-bold px-7 py-3 rounded-xl transition-colors duration-200 text-sm whitespace-nowrap">
                        Search Now
                    </button>
                </div>

                {{-- Stats row --}}
                <div class="flex flex-wrap justify-center gap-8 sm:gap-16">
                    @php
                        $stats = [
                            ['v' => '5,000+', 'l' => 'Opportunities'],
                            ['v' => '800+', 'l' => 'Companies'],
                            ['v' => '12,000+', 'l' => 'Students'],
                        ];
                    @endphp
                    @foreach ($stats as $st)
                        <div class="text-center">
                            <p class="text-3xl font-black text-[#00B1AA]">{{ $st['v'] }}</p>
                            <p class="text-xs text-[#666666] font-medium mt-0.5 uppercase tracking-wide">{{ $st['l'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Bottom wave --}}
            <svg class="relative z-10 w-full block" viewBox="0 0 1440 48" preserveAspectRatio="none"
                style="height:48px">
                <path d="M0,32 C360,56 1080,8 1440,32 L1440,48 L0,48 Z" fill="#F7F9FA" />
            </svg>
        </section>


        {{-- ============================================================
        2. SEARCH & FILTER SECTION
        ============================================================ --}}
        <section class="bg-[#F7F9FA] py-8 sticky top-0 z-30 border-b border-[#E5E7EB]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-md p-4">
                    <div class="flex flex-wrap gap-3 items-center">

                        {{-- Search --}}
                        <div class="flex-1 min-w-[180px]">
                            <input type="text" placeholder="Search role or keyword..."
                                class="w-full px-4 py-2.5 rounded-xl bg-[#F7F9FA] border border-[#E5E7EB] text-sm text-[#444444] placeholder-[#666666]/50 focus:outline-none focus:border-[#00B1AA] transition-colors duration-200">
                        </div>

                        {{-- Location --}}
                        <select
                            class="px-4 py-2.5 rounded-xl bg-[#F7F9FA] border border-[#E5E7EB] text-sm text-[#666666] focus:outline-none focus:border-[#00B1AA] transition-colors duration-200 min-w-[140px]">
                            <option value="">All Locations</option>
                            <option>Casablanca</option>
                            <option>Rabat</option>
                            <option>Marrakech</option>
                            <option>Paris</option>
                            <option>Dubai</option>
                        </select>

                        {{-- Work type --}}
                        <select
                            class="px-4 py-2.5 rounded-xl bg-[#F7F9FA] border border-[#E5E7EB] text-sm text-[#666666] focus:outline-none focus:border-[#00B1AA] transition-colors duration-200 min-w-[140px]">
                            <option value="">Work Type</option>
                            <option>Remote</option>
                            <option>Hybrid</option>
                            <option>On-site</option>
                        </select>

                        {{-- Category --}}
                        <select
                            class="px-4 py-2.5 rounded-xl bg-[#F7F9FA] border border-[#E5E7EB] text-sm text-[#666666] focus:outline-none focus:border-[#00B1AA] transition-colors duration-200 min-w-[150px]">
                            <option value="">All Categories</option>
                            <option>Web Development</option>
                            <option>Design</option>
                            <option>Marketing</option>
                            <option>Data Science</option>
                            <option>Cybersecurity</option>
                            <option>Business</option>
                        </select>

                        {{-- Paid / Unpaid --}}
                        <select
                            class="px-4 py-2.5 rounded-xl bg-[#F7F9FA] border border-[#E5E7EB] text-sm text-[#666666] focus:outline-none focus:border-[#00B1AA] transition-colors duration-200 min-w-[130px]">
                            <option value="">Compensation</option>
                            <option>Paid</option>
                            <option>Unpaid</option>
                            <option>Stipend</option>
                        </select>

                        {{-- Button --}}
                        <button
                            class="bg-[#00B1AA] hover:bg-[#008A84] text-white font-bold px-6 py-2.5 rounded-xl transition-colors duration-200 text-sm whitespace-nowrap">
                            Apply Filters
                        </button>

                        {{-- Reset --}}
                        <button
                            class="text-[#666666] hover:text-[#00B1AA] text-sm font-medium transition-colors duration-200 whitespace-nowrap">
                            Reset
                        </button>

                    </div>
                </div>
            </div>
        </section>


        {{-- ============================================================
        3. MAIN CONTENT — Listings + Sidebar
        ============================================================ --}}
        <section class="bg-[#F7F9FA] py-12">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                {{-- Results meta --}}
                <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-xl font-black text-[#444444]">Showing <span class="text-[#00B1AA]">248</span>
                            Internships</h2>
                        <p class="text-xs text-[#666666] mt-0.5">Sorted by: Most Recent</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="px-4 py-2 rounded-xl border border-[#E5E7EB] bg-white text-xs font-semibold text-[#444444] hover:border-[#00B1AA] hover:text-[#00B1AA] transition-all duration-200">Most
                            Recent</button>
                        <button
                            class="px-4 py-2 rounded-xl border border-[#E5E7EB] bg-white text-xs font-semibold text-[#444444] hover:border-[#00B1AA] hover:text-[#00B1AA] transition-all duration-200">Best
                            Match</button>
                        <button
                            class="px-4 py-2 rounded-xl border border-[#E5E7EB] bg-white text-xs font-semibold text-[#444444] hover:border-[#00B1AA] hover:text-[#00B1AA] transition-all duration-200">Highest
                            Paid</button>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-8">

                    {{-- ======================================================
                    4. INTERNSHIP CARDS — Left (70%)
                    ====================================================== --}}
                    <div class="w-full lg:w-[70%]">

                        @php
                            $internships = [
                                [
                                    'title' => 'Front-End Developer Intern',
                                    'company' => 'TechNova Solutions',
                                    'location' => 'Casablanca — Hybrid',
                                    'salary' => '2,500 MAD / month',
                                    'duration' => '3 months',
                                    'type' => 'Paid',
                                    'work' => 'Hybrid',
                                    'posted' => '2 hours ago',
                                    'skills' => ['React', 'Tailwind CSS', 'JavaScript', 'Git'],
                                    'desc' => 'Join our front-end team to build responsive, high-performance web interfaces for enterprise clients. You will work directly with senior engineers in an agile environment, contributing to real product features from day one.',
                                    'badge_color' => 'bg-[#DDF7F6] text-[#008A84]',
                                    'type_color' => 'bg-emerald-50 text-emerald-600',
                                ],
                                [
                                    'title' => 'UI/UX Design Intern',
                                    'company' => 'Pixel & Co Studio',
                                    'location' => 'Remote',
                                    'salary' => '1,800 MAD / month',
                                    'duration' => '2 months',
                                    'type' => 'Paid',
                                    'work' => 'Remote',
                                    'posted' => '5 hours ago',
                                    'skills' => ['Figma', 'Prototyping', 'User Research', 'Design Systems'],
                                    'desc' => 'We are looking for a creative UI/UX intern to help us design beautiful digital experiences. You will participate in user research, wireframing, and high-fidelity prototyping for our SaaS product suite.',
                                    'badge_color' => 'bg-[#DDF7F6] text-[#008A84]',
                                    'type_color' => 'bg-emerald-50 text-emerald-600',
                                ],
                                [
                                    'title' => 'Marketing Intern',
                                    'company' => 'BrandWave Agency',
                                    'location' => 'Rabat — On-site',
                                    'salary' => 'Stipend Provided',
                                    'duration' => '4 months',
                                    'type' => 'Stipend',
                                    'work' => 'On-site',
                                    'posted' => '1 day ago',
                                    'skills' => ['Social Media', 'Copywriting', 'SEO', 'Analytics'],
                                    'desc' => 'Support our marketing team in executing digital campaigns for a diverse portfolio of clients. You will gain hands-on experience in content creation, social media management, and performance reporting.',
                                    'badge_color' => 'bg-orange-50 text-orange-500',
                                    'type_color' => 'bg-orange-50 text-orange-500',
                                ],
                                [
                                    'title' => 'Data Analyst Intern',
                                    'company' => 'DataStream Insights',
                                    'location' => 'Casablanca — Remote',
                                    'salary' => '3,000 MAD / month',
                                    'duration' => '6 months',
                                    'type' => 'Paid',
                                    'work' => 'Remote',
                                    'posted' => '1 day ago',
                                    'skills' => ['Python', 'SQL', 'Power BI', 'Excel'],
                                    'desc' => 'Dive into real data challenges alongside our analytics team. You will clean datasets, build dashboards, and deliver insights that directly influence product and business decisions at a fast-growing startup.',
                                    'badge_color' => 'bg-[#DDF7F6] text-[#008A84]',
                                    'type_color' => 'bg-emerald-50 text-emerald-600',
                                ],
                                [
                                    'title' => 'Cybersecurity Intern',
                                    'company' => 'SecureNet Systems',
                                    'location' => 'Marrakech — Hybrid',
                                    'salary' => '2,800 MAD / month',
                                    'duration' => '3 months',
                                    'type' => 'Paid',
                                    'work' => 'Hybrid',
                                    'posted' => '2 days ago',
                                    'skills' => ['Network Security', 'Linux', 'Python', 'Ethical Hacking'],
                                    'desc' => 'Work alongside certified security engineers to assess vulnerabilities, run penetration tests, and strengthen the security posture of our clients. A great opportunity for students passionate about ethical hacking.',
                                    'badge_color' => 'bg-[#DDF7F6] text-[#008A84]',
                                    'type_color' => 'bg-emerald-50 text-emerald-600',
                                ],
                                [
                                    'title' => 'Business Development Intern',
                                    'company' => 'VentureAxis Corp',
                                    'location' => 'Remote',
                                    'salary' => 'Unpaid + Certificate',
                                    'duration' => '2 months',
                                    'type' => 'Unpaid',
                                    'work' => 'Remote',
                                    'posted' => '3 days ago',
                                    'skills' => ['Research', 'Communication', 'CRM', 'Excel'],
                                    'desc' => 'Support our BD team in identifying new market opportunities, qualifying leads, and preparing pitch decks. You will gain exposure to the full B2B sales cycle and leave with a portfolio-ready project.',
                                    'badge_color' => 'bg-slate-100 text-slate-500',
                                    'type_color' => 'bg-slate-100 text-slate-500',
                                ],
                            ];
                          @endphp

                        <div class="flex flex-col gap-5">
                            @foreach ($internships as $idx => $job)
                                <div
                                    class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden group">

                                    {{-- Card image --}}
                                    <div class="relative h-40 overflow-hidden">
                                        <img src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642d90c73077e2ced7d76141_Adult%20Learner%201%20(1).webp"
                                            alt="{{ $job['title'] }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0"
                                            style="background:linear-gradient(to bottom, transparent 40%, rgba(68,68,68,.55))">
                                        </div>
                                        {{-- Work type badge --}}
                                        <span
                                            class="absolute top-3 left-3 text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full border border-white/30 text-white"
                                            style="background:rgba(0,177,170,.7)">
                                            {{ $job['work'] }}
                                        </span>
                                        {{-- Save button --}}
                                        <button
                                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white flex items-center justify-center text-[#444444] text-xs font-bold transition-colors duration-200">
                                            Save
                                        </button>
                                        {{-- Posted --}}
                                        <span
                                            class="absolute bottom-3 right-3 text-[10px] text-white/80 font-medium">{{ $job['posted'] }}</span>
                                    </div>

                                    {{-- Card body --}}
                                    <div class="p-6">
                                        <div class="flex items-start justify-between gap-4 mb-3">
                                            <div>
                                                <h3
                                                    class="text-base font-black text-[#444444] group-hover:text-[#00B1AA] transition-colors duration-200">
                                                    {{ $job['title'] }}</h3>
                                                <p class="text-sm font-semibold text-[#00B1AA] mt-0.5">{{ $job['company'] }}
                                                </p>
                                            </div>
                                            <span
                                                class="text-[10px] font-bold uppercase tracking-wide px-3 py-1 rounded-full flex-shrink-0 {{ $job['type_color'] }}">
                                                {{ $job['type'] }}
                                            </span>
                                        </div>

                                        {{-- Meta row --}}
                                        <div class="flex flex-wrap gap-x-5 gap-y-1 mb-4 text-xs text-[#666666]">
                                            <span class="font-medium">{{ $job['location'] }}</span>
                                            <span class="font-semibold text-[#444444]">{{ $job['salary'] }}</span>
                                            <span>{{ $job['duration'] }}</span>
                                        </div>

                                        {{-- Description --}}
                                        <p class="text-sm text-[#666666] leading-relaxed mb-4 line-clamp-2">
                                            {{ $job['desc'] }}</p>

                                        {{-- Skills --}}
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            @foreach ($job['skills'] as $skill)
                                                <span
                                                    class="text-[10px] font-semibold px-2.5 py-1 rounded-lg bg-[#F7F9FA] border border-[#E5E7EB] text-[#444444]">{{ $skill }}</span>
                                            @endforeach
                                        </div>

                                        {{-- Actions --}}
                                        <div class="flex items-center gap-3 pt-4 border-t border-[#E5E7EB]">
                                            <a href="#"
                                                class="flex-1 text-center bg-[#00B1AA] hover:bg-[#008A84] text-white font-bold py-2.5 rounded-xl transition-colors duration-200 text-sm">
                                                Apply Now
                                            </a>
                                            <a href="#"
                                                class="px-5 py-2.5 rounded-xl border border-[#E5E7EB] hover:border-[#00B1AA] hover:text-[#00B1AA] text-[#444444] font-semibold text-sm transition-all duration-200">
                                                Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        {{-- ======================================================
                        9. PAGINATION
                        ====================================================== --}}
                        <div class="flex justify-center items-center gap-2 mt-12">
                            <button
                                class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] bg-white text-sm font-semibold text-[#666666] hover:border-[#00B1AA] hover:text-[#00B1AA] transition-all duration-200">
                                Previous
                            </button>
                            @php $pages = [1, 2, 3, '...', 8, 9, 10]; @endphp
                            @foreach ($pages as $p)
                                @if ($p === '...')
                                    <span class="px-2 text-[#666666] text-sm select-none">...</span>
                                @elseif ($p === 1)
                                    <button
                                        class="w-10 h-10 rounded-xl text-sm font-bold text-white transition-all duration-200"
                                        style="background:#00B1AA">{{ $p }}</button>
                                @else
                                    <button
                                        class="w-10 h-10 rounded-xl border border-[#E5E7EB] bg-white text-sm font-semibold text-[#444444] hover:border-[#00B1AA] hover:text-[#00B1AA] transition-all duration-200">{{ $p }}</button>
                                @endif
                            @endforeach
                            <button
                                class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] bg-white text-sm font-semibold text-[#666666] hover:border-[#00B1AA] hover:text-[#00B1AA] transition-all duration-200">
                                Next
                            </button>
                        </div>

                    </div>{{-- end listings --}}


                    {{-- ======================================================
                    5. SIDEBAR — Right (30%)
                    ====================================================== --}}
                    <aside class="w-full lg:w-[30%]">
                        <div class="flex flex-col gap-6 lg:sticky lg:top-28">

                            {{-- A) Trending Categories --}}
                            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6">
                                <h3 class="text-sm font-black text-[#444444] mb-4 uppercase tracking-wider">Trending
                                    Categories</h3>
                                @php
                                    $cats = [
                                        ['name' => 'Web Development', 'count' => '1,840'],
                                        ['name' => 'UI/UX Design', 'count' => '980'],
                                        ['name' => 'Marketing', 'count' => '760'],
                                        ['name' => 'AI & Data Science', 'count' => '1,120'],
                                        ['name' => 'Business', 'count' => '680'],
                                        ['name' => 'Cybersecurity', 'count' => '540'],
                                    ];
                                  @endphp
                                <div class="flex flex-col gap-2">
                                    @foreach ($cats as $cat)
                                        <a href="#"
                                            class="flex items-center justify-between px-4 py-3 rounded-xl bg-[#F7F9FA] hover:bg-[#DDF7F6] border border-[#E5E7EB] hover:border-[#00B1AA]/30 transition-all duration-200 group">
                                            <span
                                                class="text-sm font-semibold text-[#444444] group-hover:text-[#00B1AA] transition-colors duration-200">{{ $cat['name'] }}</span>
                                            <span
                                                class="text-xs font-bold text-[#00B1AA] bg-white px-2 py-0.5 rounded-lg border border-[#E5E7EB]">{{ $cat['count'] }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            {{-- B) Recently Viewed --}}
                            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6">
                                <h3 class="text-sm font-black text-[#444444] mb-4 uppercase tracking-wider">Recently
                                    Viewed</h3>
                                @php
                                    $recent = [
                                        ['title' => 'Full-Stack Dev Intern', 'company' => 'CloudBridge', 'loc' => 'Remote', 'pay' => '3,200 MAD'],
                                        ['title' => 'Mobile Dev Intern', 'company' => 'AppFactory', 'loc' => 'Casablanca', 'pay' => '2,500 MAD'],
                                        ['title' => 'Product Design Intern', 'company' => 'DesignForge', 'loc' => 'Hybrid', 'pay' => '1,500 MAD'],
                                    ];
                                  @endphp
                                <div class="flex flex-col gap-3">
                                    @foreach ($recent as $r)
                                        <a href="#"
                                            class="flex gap-3 items-center p-3 rounded-xl border border-[#E5E7EB] hover:border-[#00B1AA]/30 hover:bg-[#F7F9FA] transition-all duration-200 group">
                                            <img src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642d90c73077e2ced7d76141_Adult%20Learner%201%20(1).webp"
                                                alt="{{ $r['title'] }}"
                                                class="w-12 h-12 rounded-xl object-cover flex-shrink-0">
                                            <div class="min-w-0">
                                                <p
                                                    class="text-xs font-bold text-[#444444] group-hover:text-[#00B1AA] transition-colors duration-200 truncate">
                                                    {{ $r['title'] }}</p>
                                                <p class="text-[10px] text-[#666666] truncate">{{ $r['company'] }} ·
                                                    {{ $r['loc'] }}</p>
                                                <p class="text-[10px] font-semibold text-[#00B1AA] mt-0.5">{{ $r['pay'] }}
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            {{-- C) Recommended --}}
                            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6">
                                <h3 class="text-sm font-black text-[#444444] mb-4 uppercase tracking-wider">Recommended
                                    for You</h3>
                                @php
                                    $recs = [
                                        ['title' => 'React Developer Intern', 'company' => 'WebNova', 'match' => 97],
                                        ['title' => 'Motion Design Intern', 'company' => 'CreativeHub', 'match' => 91],
                                        ['title' => 'Growth Hacking Intern', 'company' => 'ScaleUp', 'match' => 85],
                                    ];
                                  @endphp
                                <div class="flex flex-col gap-4">
                                    @foreach ($recs as $rec)
                                        <div
                                            class="border border-[#E5E7EB] rounded-xl p-4 hover:border-[#00B1AA]/30 hover:shadow-md transition-all duration-200">
                                            <div class="flex items-start justify-between gap-2 mb-2">
                                                <div>
                                                    <p class="text-xs font-bold text-[#444444]">{{ $rec['title'] }}</p>
                                                    <p class="text-[10px] text-[#666666]">{{ $rec['company'] }}</p>
                                                </div>
                                                <span class="text-[10px] font-black px-2 py-1 rounded-lg flex-shrink-0"
                                                    style="background:#DDF7F6;color:#008A84">
                                                    {{ $rec['match'] }}% match
                                                </span>
                                            </div>
                                            <div class="h-1.5 w-full rounded-full mb-3" style="background:#E5E7EB">
                                                <div class="h-full rounded-full"
                                                    style="width:{{ $rec['match'] }}%; background:#00B1AA"></div>
                                            </div>
                                            <a href="#"
                                                class="block w-full text-center text-xs font-bold py-2 rounded-lg border-2 text-[#00B1AA] border-[#00B1AA] hover:bg-[#00B1AA] hover:text-white transition-all duration-200">
                                                Quick Apply
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Profile completion nudge --}}
                            <div class="rounded-2xl p-6 border border-[#00B1AA]/20"
                                style="background:linear-gradient(135deg,#DDF7F6 0%,#FFFFFF 100%)">
                                <p class="text-sm font-black text-[#444444] mb-1">Complete Your Profile</p>
                                <p class="text-xs text-[#666666] mb-4 leading-relaxed">A complete profile gets 4x more
                                    recruiter views. Add your skills and CV now.</p>
                                <div class="h-2 w-full rounded-full mb-3" style="background:#E5E7EB">
                                    <div class="h-full rounded-full" style="width:65%;background:#00B1AA"></div>
                                </div>
                                <div class="flex justify-between text-xs text-[#666666] mb-4">
                                    <span>Profile strength</span>
                                    <span class="font-bold text-[#00B1AA]">65%</span>
                                </div>
                                <a href="#"
                                    class="block text-center bg-[#00B1AA] hover:bg-[#008A84] text-white font-bold py-2.5 rounded-xl text-xs transition-colors duration-200">
                                    Complete Profile
                                </a>
                            </div>

                        </div>
                    </aside>

                </div>
            </div>
        </section>


        {{-- ============================================================
        6. FEATURED OPPORTUNITIES SECTION
        ============================================================ --}}
        <section class="py-20" style="background:#DDF7F6">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-12">
                    <span class="text-[#008A84] text-xs font-semibold uppercase tracking-widest">Hand-Picked</span>
                    <h2 class="text-3xl lg:text-4xl font-black text-[#444444] mt-2">Featured Opportunities</h2>
                    <p class="text-[#666666] mt-3 max-w-lg mx-auto text-sm">Top-tier internships selected by our team
                        for exceptional career growth potential.</p>
                </div>

                @php
                    $featured = [
                        [
                            'title' => 'Senior Front-End Developer Intern',
                            'company' => 'TechNova Solutions',
                            'loc' => 'Casablanca · Hybrid',
                            'pay' => '4,500 MAD / month',
                            'duration' => '6 months',
                            'benefits' => ['Mentorship Program', 'Certification Budget', 'Flexible Hours', 'Full-time Offer Possible'],
                            'desc' => 'An exceptional opportunity to join one of Morocco\'s top tech companies. Work on enterprise-scale React applications with a dedicated mentor and structured learning path.',
                        ],
                        [
                            'title' => 'Data Science Intern',
                            'company' => 'DataStream Insights',
                            'loc' => 'Remote · Full-time',
                            'pay' => '3,800 MAD / month',
                            'duration' => '4 months',
                            'benefits' => ['Remote Work', 'ML Lab Access', 'Conference Pass', 'Portfolio Projects'],
                            'desc' => 'Work on cutting-edge machine learning projects with a team of PhDs. You will build models that are shipped to production and used by thousands of real customers daily.',
                        ],
                        [
                            'title' => 'Product Design Intern',
                            'company' => 'Pixel & Co Studio',
                            'loc' => 'Marrakech · On-site',
                            'pay' => '3,200 MAD / month',
                            'duration' => '3 months',
                            'benefits' => ['Design Toolkit', 'Agency Exposure', 'Client Presentations', 'Creative Freedom'],
                            'desc' => 'Craft stunning digital products for a portfolio of international clients. You will own full design cycles — from user research to final handoff — under the guidance of award-winning designers.',
                        ],
                    ];
                  @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($featured as $f)
                        <div
                            class="bg-white rounded-3xl border border-[#E5E7EB] shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden group">

                            {{-- Image --}}
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642d90c73077e2ced7d76141_Adult%20Learner%201%20(1).webp"
                                    alt="{{ $f['title'] }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0"
                                    style="background:linear-gradient(to bottom, transparent 30%, rgba(0,177,170,.7))">
                                </div>
                                <div class="absolute bottom-4 left-4 text-white">
                                    <p class="font-black text-base leading-tight">{{ $f['title'] }}</p>
                                    <p class="text-xs text-white/80 mt-0.5">{{ $f['company'] }}</p>
                                </div>
                                <span
                                    class="absolute top-3 right-3 text-[10px] font-bold text-[#008A84] bg-white/90 px-3 py-1 rounded-full">
                                    Featured
                                </span>
                            </div>

                            <div class="p-6">
                                {{-- Meta --}}
                                <div class="flex flex-wrap gap-3 text-xs text-[#666666] mb-4">
                                    <span class="font-medium">{{ $f['loc'] }}</span>
                                    <span class="font-black text-[#00B1AA]">{{ $f['pay'] }}</span>
                                    <span>{{ $f['duration'] }}</span>
                                </div>

                                {{-- Description --}}
                                <p class="text-xs text-[#666666] leading-relaxed mb-4">{{ $f['desc'] }}</p>

                                {{-- Benefits --}}
                                <div class="flex flex-wrap gap-2 mb-5">
                                    @foreach ($f['benefits'] as $b)
                                        <span class="text-[10px] font-semibold px-2.5 py-1 rounded-lg text-[#008A84]"
                                            style="background:#DDF7F6">{{ $b }}</span>
                                    @endforeach
                                </div>

                                <a href="#"
                                    class="block text-center bg-[#00B1AA] hover:bg-[#008A84] text-white font-bold py-3 rounded-xl text-sm transition-colors duration-200">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        {{-- ============================================================
        7. TOP COMPANIES SECTION
        ============================================================ --}}
        <section class="bg-white py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-12">
                    <span class="text-[#00B1AA] text-xs font-semibold uppercase tracking-widest">Top Employers</span>
                    <h2 class="text-3xl lg:text-4xl font-black text-[#444444] mt-2">Companies Actively Hiring</h2>
                    <p class="text-[#666666] mt-3 max-w-lg mx-auto text-sm">Explore our verified partner companies with
                        open internship positions right now.</p>
                </div>

                @php
                    $companies = [
                        ['name' => 'TechNova Solutions', 'open' => 14, 'desc' => 'Morocco\'s fastest-growing SaaS company building enterprise tools for the MENA region.'],
                        ['name' => 'DataStream Insights', 'open' => 8, 'desc' => 'Data intelligence firm powering decisions for 200+ businesses with AI-driven analytics.'],
                        ['name' => 'Pixel & Co Studio', 'open' => 6, 'desc' => 'Award-winning creative agency specialising in branding and digital product design.'],
                        ['name' => 'BrandWave Agency', 'open' => 9, 'desc' => 'Full-service digital marketing agency with clients across Europe and Africa.'],
                        ['name' => 'SecureNet Systems', 'open' => 5, 'desc' => 'Leading cybersecurity consultancy protecting critical infrastructure since 2015.'],
                        ['name' => 'VentureAxis Corp', 'open' => 7, 'desc' => 'Pan-African business development firm accelerating startups from idea to scale.'],
                        ['name' => 'CloudBridge Tech', 'open' => 11, 'desc' => 'Cloud infrastructure specialists offering managed services to enterprise clients.'],
                        ['name' => 'AppFactory Studio', 'open' => 4, 'desc' => 'Mobile-first studio that has shipped over 50 apps with 10M+ combined downloads.'],
                    ];
                  @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @foreach ($companies as $co)
                        <div
                            class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                            <div class="flex items-center gap-3 mb-4">
                                <img src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642d90c73077e2ced7d76141_Adult%20Learner%201%20(1).webp"
                                    alt="{{ $co['name'] }}"
                                    class="w-12 h-12 rounded-xl object-cover border border-[#E5E7EB]">
                                <div>
                                    <p
                                        class="text-sm font-black text-[#444444] group-hover:text-[#00B1AA] transition-colors duration-200 leading-tight">
                                        {{ $co['name'] }}</p>
                                    <span class="text-[10px] font-bold text-[#00B1AA]"
                                        style="background:#DDF7F6; padding:2px 8px; border-radius:9999px;">
                                        {{ $co['open'] }} open roles
                                    </span>
                                </div>
                            </div>
                            <p class="text-xs text-[#666666] leading-relaxed mb-4">{{ $co['desc'] }}</p>
                            <a href="#"
                                class="block text-center text-xs font-bold py-2 rounded-xl border border-[#E5E7EB] hover:border-[#00B1AA] hover:text-[#00B1AA] text-[#444444] transition-all duration-200">
                                View Positions
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        {{-- ============================================================
        8. STUDENT SUCCESS SECTION
        ============================================================ --}}
        <section class="py-20" style="background:#F7F9FA">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-12">
                    <span class="text-[#00B1AA] text-xs font-semibold uppercase tracking-widest">Student Stories</span>
                    <h2 class="text-3xl lg:text-4xl font-black text-[#444444] mt-2">Success Through InterLink</h2>
                    <p class="text-[#666666] mt-3 max-w-lg mx-auto text-sm">Real students. Real results. Hear how
                        InterLink helped them land their first career opportunity.</p>
                </div>

                @php
                    $testimonials = [
                        [
                            'name' => 'Amina Benhaddou',
                            'role' => 'Front-End Dev Intern — TechNova',
                            'quote' => 'InterLink made the entire application process seamless. Within a week I had three interview requests from companies I genuinely admired. I landed my dream internship and have now been offered a full-time role.',
                            'stars' => 5,
                        ],
                        [
                            'name' => 'Youssef Tazi',
                            'role' => 'Data Analyst Intern — DataStream',
                            'quote' => 'The recommendation engine matched me to a role I would never have found on my own. The platform is intuitive and the support team was incredibly responsive whenever I had questions.',
                            'stars' => 5,
                        ],
                        [
                            'name' => 'Nour Alami',
                            'role' => 'Marketing Intern — BrandWave',
                            'quote' => 'I applied to six internships in under an hour. The smart filters helped me find exactly what I was looking for. I started my internship two weeks after signing up on InterLink.',
                            'stars' => 5,
                        ],
                        [
                            'name' => 'Fatima Zahra Idrissi',
                            'role' => 'UI/UX Design Intern — Pixel & Co',
                            'quote' => 'The profile skill-tagging feature made recruiters reach out to me proactively. I received an offer before I even finished applying elsewhere. InterLink is genuinely transformative for students.',
                            'stars' => 5,
                        ],
                    ];
                  @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($testimonials as $t)
                        <div
                            class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                            {{-- Stars --}}
                            <div class="flex gap-0.5 mb-4">
                                @for ($s = 0; $s < $t['stars']; $s++)
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="#F89122">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>

                            <p class="text-sm text-[#666666] leading-relaxed mb-6 italic">"{{ $t['quote'] }}"</p>

                            <div class="flex items-center gap-3 pt-4 border-t border-[#E5E7EB]">
                                <img src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642d90c73077e2ced7d76141_Adult%20Learner%201%20(1).webp"
                                    alt="{{ $t['name'] }}"
                                    class="w-10 h-10 rounded-full object-cover border-2 border-[#DDF7F6]">
                                <div>
                                    <p class="text-xs font-black text-[#444444]">{{ $t['name'] }}</p>
                                    <p class="text-[10px] text-[#00B1AA] font-semibold">{{ $t['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        {{-- ============================================================
        10. FINAL CTA SECTION
        ============================================================ --}}
        <section class="py-20 relative overflow-hidden"
            style="background:linear-gradient(135deg,#DDF7F6 0%,#FFFFFF 50%,#DDF7F6 100%)">

            {{-- Background image (leave src empty — fill later) --}}
            <div class="absolute inset-0 z-0 opacity-[0.04]">
                <img src="" alt="" class="w-full h-full object-cover">
            </div>

            {{-- Blobs --}}
            <div class="absolute -top-20 -left-20 w-80 h-80 rounded-full z-0"
                style="background:rgba(0,177,170,.1);filter:blur(60px)"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full z-0"
                style="background:rgba(0,138,132,.08);filter:blur(60px)"></div>

            <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

                <span
                    class="inline-flex items-center gap-2 bg-white border border-[#E5E7EB] rounded-full px-4 py-2 mb-8 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#00B1AA] animate-pulse inline-block"></span>
                    <span class="text-[#008A84] text-xs font-semibold uppercase tracking-widest">Join 12,000+
                        Students</span>
                </span>

                <h2 class="text-4xl lg:text-5xl font-black text-[#444444] leading-tight mb-5">
                    Start Your Career Journey<br>
                    <span class="text-[#00B1AA]">with InterLink</span>
                </h2>

                <p class="text-[#666666] text-base max-w-xl mx-auto mb-10 leading-relaxed">
                    Create your free profile today, get matched with verified internships, and take the first step
                    toward the career you have always wanted.
                </p>

                <div class="flex flex-wrap gap-4 justify-center mb-12">
                    <a href="#"
                        class="inline-flex items-center gap-2 bg-[#00B1AA] hover:bg-[#008A84] text-white font-bold px-8 py-4 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-sm">
                        Explore Internships
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <a href="#"
                        class="inline-flex items-center gap-2 bg-white hover:bg-[#F7F9FA] text-[#00B1AA] font-bold px-8 py-4 rounded-2xl shadow-lg hover:shadow-xl border-2 border-[#00B1AA] transition-all duration-300 text-sm">
                        Create Profile
                    </a>
                </div>

                {{-- Trust strip --}}
                <div
                    class="bg-white rounded-2xl border border-[#E5E7EB] shadow-md px-8 py-5 inline-flex flex-wrap justify-center gap-8">
                    @php
                        $trust = [
                            ['v' => 'Free', 'l' => 'Always free for students'],
                            ['v' => '24h', 'l' => 'Average response time'],
                            ['v' => '98%', 'l' => 'Satisfaction rate'],
                        ];
                    @endphp
                    @foreach ($trust as $tr)
                        <div class="text-center">
                            <p class="text-lg font-black text-[#00B1AA]">{{ $tr['v'] }}</p>
                            <p class="text-[10px] text-[#666666] font-medium mt-0.5">{{ $tr['l'] }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>


    </div>
    <x-footer />

</body>

</html>