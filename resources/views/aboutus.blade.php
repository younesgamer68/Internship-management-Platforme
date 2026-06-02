@extends('layouts.app')

@section('title', 'About Us – InterLink')

@section('content')

{{-- ============================================================
     HERO SECTION
     ============================================================ --}}
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 py-28 px-6">
    {{-- Background decorative rings --}}
    <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
        <div class="h-[600px] w-[600px] rounded-full border border-blue-800/20"></div>
        <div class="absolute h-[400px] w-[400px] rounded-full border border-blue-700/20"></div>
        <div class="absolute h-[200px] w-[200px] rounded-full border border-blue-600/20"></div>
    </div>

    <div class="relative mx-auto max-w-4xl text-center">
        <span class="mb-4 inline-block rounded-full bg-blue-600/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-blue-400">
            About InterLink
        </span>
        <h1 class="mt-4 text-4xl font-extrabold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
            Connecting Talent <br class="hidden sm:block">
            <span class="text-blue-400">with Opportunity</span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
            InterLink is the all-in-one internship management platform that bridges the gap between
            students, universities, and companies — making every internship journey seamless,
            transparent, and impactful.
        </p>
        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('internships.index') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-900/40 transition hover:bg-blue-500 hover:shadow-blue-700/50">
                Browse Internships
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-slate-600 px-7 py-3.5 text-sm font-semibold text-slate-300 transition hover:border-blue-500 hover:text-white">
                Get in Touch
            </a>
        </div>
    </div>
</section>

{{-- ============================================================
     STATS SECTION
     ============================================================ --}}
<section class="bg-white py-16 px-6">
    <div class="mx-auto max-w-6xl">
        <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
            @foreach([
                ['value' => '500+',  'label' => 'Partner Companies'],
                ['value' => '120+',  'label' => 'Universities'],
                ['value' => '8,000+','label' => 'Internships Placed'],
                ['value' => '98%',   'label' => 'Satisfaction Rate'],
            ] as $stat)
            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-8 shadow-sm">
                <p class="text-4xl font-extrabold text-blue-600">{{ $stat['value'] }}</p>
                <p class="mt-2 text-sm font-medium text-slate-500">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     OUR STORY SECTION
     ============================================================ --}}
<section class="bg-slate-50 py-24 px-6">
    <div class="mx-auto max-w-6xl">
        <div class="grid items-center gap-16 lg:grid-cols-2">
            {{-- Text --}}
            <div>
                <span class="mb-3 inline-block text-xs font-semibold uppercase tracking-widest text-blue-600">
                    Our Story
                </span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Built to Simplify Internship Management
                </h2>
                <div class="mt-6 space-y-4 text-base leading-relaxed text-slate-600">
                    <p>
                        InterLink was founded with a simple but powerful idea: the internship process
                        shouldn't be a bureaucratic maze. We saw students struggling to find the right
                        opportunities, universities drowning in paperwork, and companies unable to find
                        the talent they needed.
                    </p>
                    <p>
                        We built a platform that brings all three parties together under one roof —
                        offering smart matching, real-time tracking, digital document management, and
                        transparent communication throughout every stage of the internship lifecycle.
                    </p>
                    <p>
                        Today, InterLink powers internship programs across dozens of institutions and
                        hundreds of companies, helping thousands of students launch their careers every year.
                    </p>
                </div>
            </div>

            {{-- Visual card --}}
            <div class="relative">
                <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 to-blue-800 p-10 text-white shadow-2xl shadow-blue-200">
                    <p class="text-lg font-medium italic leading-relaxed text-blue-100">
                        "We believe that every student deserves access to meaningful professional
                        experience — and every company deserves to find the talent that will shape
                        their future."
                    </p>
                    <div class="mt-8 flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/20 text-xl font-bold">
                            IL
                        </div>
                        <div>
                            <p class="font-semibold">The InterLink Team</p>
                            <p class="text-sm text-blue-200">Founders & Leadership</p>
                        </div>
                    </div>
                </div>
                {{-- Floating accent --}}
                <div class="absolute -bottom-4 -right-4 -z-10 h-full w-full rounded-3xl bg-blue-100"></div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     HOW IT WORKS SECTION
     ============================================================ --}}
<section class="bg-white py-24 px-6">
    <div class="mx-auto max-w-6xl">
        <div class="text-center">
            <span class="mb-3 inline-block text-xs font-semibold uppercase tracking-widest text-blue-600">
                How It Works
            </span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                One Platform. Three Perspectives.
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-slate-500">
                InterLink serves students, universities, and companies — each with a tailored experience.
            </p>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-3">
            @foreach([
                [
                    'icon'  => '🎓',
                    'role'  => 'Students',
                    'color' => 'blue',
                    'steps' => [
                        'Create your profile & upload your CV',
                        'Browse and apply to curated internships',
                        'Track your application status in real-time',
                        'Submit reports and get supervisor feedback',
                    ],
                ],
                [
                    'icon'  => '🏛️',
                    'role'  => 'Universities',
                    'color' => 'indigo',
                    'steps' => [
                        'Manage student cohorts and internship quotas',
                        'Approve or reject company partnerships',
                        'Monitor student progress and compliance',
                        'Generate automated internship reports',
                    ],
                ],
                [
                    'icon'  => '🏢',
                    'role'  => 'Companies',
                    'color' => 'sky',
                    'steps' => [
                        'Post internship offers with detailed requirements',
                        'Review and shortlist candidate profiles',
                        'Manage offer letters and onboarding docs',
                        'Evaluate interns and provide certifications',
                    ],
                ],
            ] as $card)
            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-8 shadow-sm hover:shadow-md transition-shadow">
                <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-{{ $card['color'] }}-100 text-3xl">
                    {{ $card['icon'] }}
                </div>
                <h3 class="text-xl font-bold text-slate-900">{{ $card['role'] }}</h3>
                <ul class="mt-5 space-y-3">
                    @foreach($card['steps'] as $i => $step)
                    <li class="flex items-start gap-3 text-sm text-slate-600">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-{{ $card['color'] }}-600 text-xs font-bold text-white">
                            {{ $i + 1 }}
                        </span>
                        {{ $step }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     TEAM SECTION
     ============================================================ --}}
<section class="bg-slate-50 py-24 px-6">
    <div class="mx-auto max-w-6xl">
        <div class="text-center">
            <span class="mb-3 inline-block text-xs font-semibold uppercase tracking-widest text-blue-600">
                The Team
            </span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Meet the People Behind InterLink
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-slate-500">
                A passionate team of developers, educators, and industry experts working to make
                internships better for everyone.
            </p>
        </div>

        {{-- Replace with your actual team members from the database or hardcode below --}}
        <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $team = [
                    ['name' => 'Youssef El Amrani',  'role' => 'Co-Founder & CEO',       'initials' => 'YA'],
                    ['name' => 'Salma Benali',        'role' => 'Head of Product',         'initials' => 'SB'],
                    ['name' => 'Karim Ouazzani',      'role' => 'Lead Engineer',           'initials' => 'KO'],
                    ['name' => 'Nadia Tahiri',        'role' => 'University Relations',    'initials' => 'NT'],
                ];
            @endphp

            @foreach($team as $member)
            <div class="group rounded-2xl border border-slate-100 bg-white p-8 text-center shadow-sm transition hover:shadow-md">
                <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-blue-700 text-2xl font-extrabold text-white shadow-lg shadow-blue-100 transition group-hover:scale-105">
                    {{ $member['initials'] }}
                </div>
                <h3 class="text-base font-bold text-slate-900">{{ $member['name'] }}</h3>
                <p class="mt-1 text-sm text-slate-500">{{ $member['role'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     PARTNERS / UNIVERSITIES SECTION
     ============================================================ --}}
<section class="bg-white py-20 px-6">
    <div class="mx-auto max-w-6xl">
        <div class="text-center">
            <span class="mb-3 inline-block text-xs font-semibold uppercase tracking-widest text-blue-600">
                Partners & Universities
            </span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Trusted by Leading Institutions
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-slate-500">
                InterLink is proud to partner with top universities and companies across the region.
            </p>
        </div>

        {{-- Logo grid: Replace src with real partner logos --}}
        <div class="mt-14 grid grid-cols-2 items-center gap-8 sm:grid-cols-3 lg:grid-cols-5">
            @foreach(['ENCG', 'ENSA', 'FSJES', 'EST', 'EMSI', 'UIZ', 'UITM', 'HEM', 'IAV', 'INPT'] as $partner)
            <div class="flex h-16 items-center justify-center rounded-xl border border-slate-100 bg-slate-50 px-6 py-4 text-sm font-bold tracking-wider text-slate-400 transition hover:border-blue-200 hover:text-blue-500">
                {{ $partner }}
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     VALUES SECTION
     ============================================================ --}}
<section class="bg-gradient-to-br from-blue-600 to-blue-800 py-24 px-6">
    <div class="mx-auto max-w-6xl">
        <div class="text-center">
            <span class="mb-3 inline-block text-xs font-semibold uppercase tracking-widest text-blue-200">
                Our Values
            </span>
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                What Drives Us Every Day
            </h2>
        </div>
        <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach([
                ['icon' => '🤝', 'title' => 'Collaboration',  'desc' => 'We connect students, universities, and companies into one cohesive ecosystem.'],
                ['icon' => '🔍', 'title' => 'Transparency',   'desc' => 'Every step of the internship process is visible, trackable, and accountable.'],
                ['icon' => '⚡', 'title' => 'Efficiency',     'desc' => 'We automate the paperwork so everyone can focus on what actually matters.'],
                ['icon' => '🌱', 'title' => 'Growth',         'desc' => 'We are committed to fostering professional growth for every intern we serve.'],
                ['icon' => '🔒', 'title' => 'Trust',          'desc' => 'Data privacy and secure communication are at the core of our platform.'],
                ['icon' => '🌍', 'title' => 'Inclusion',      'desc' => 'We believe opportunity should be accessible to every student, everywhere.'],
            ] as $value)
            <div class="rounded-2xl bg-white/10 p-8 backdrop-blur-sm transition hover:bg-white/20">
                <div class="mb-4 text-4xl">{{ $value['icon'] }}</div>
                <h3 class="text-lg font-bold text-white">{{ $value['title'] }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-blue-100">{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     CTA / CONTACT SECTION
     ============================================================ --}}
<section class="bg-white py-24 px-6">
    <div class="mx-auto max-w-3xl text-center">
        <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
            Ready to Get Started?
        </h2>
        <p class="mx-auto mt-4 max-w-xl text-base text-slate-500">
            Whether you're a student looking for your first opportunity, a university wanting to
            modernize your internship program, or a company seeking top talent — InterLink is here for you.
        </p>
        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('register') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-8 py-4 text-sm font-semibold text-white shadow-lg shadow-blue-100 transition hover:bg-blue-500">
                Create Free Account
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-8 py-4 text-sm font-semibold text-slate-700 transition hover:border-blue-400 hover:text-blue-600">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection