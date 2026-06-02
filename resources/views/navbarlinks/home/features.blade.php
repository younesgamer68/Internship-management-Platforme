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

    @php
        $t = __('features');
    @endphp

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

<div class="features-page font-poppins bg-white text-[#444444] overflow-x-hidden transition-colors duration-300">

 {{-- ============================================================
     DARK MODE — Complete Fix
     Hierarchy palette:
       Page bg          #07111f  (deepest)
       Section bg       #0b182c  (sections)
       Card bg          #10223b  (cards / panels)
       Sub-card bg      #152844  (nested inner cards / table rows)
       Borders          #213a59  (all borders)
       Text primary     #ffffff
       Text secondary   #b0c4d8  (replaces #666666 grays)
       Accent           #00B1AA  (unchanged — brand teal)
     ============================================================ --}}

<style>

/* ─── PAGE BASE ──────────────────────────────────────────────────────── */
.page-dark .features-page {
    background-color: #07111f !important;
    color: #ffffff !important;
}

/* ─── SECTION BACKGROUNDS ────────────────────────────────────────────── */
/* Sections that use bg-white */
.page-dark .features-page section#students,
.page-dark .features-page section#admin,
.page-dark .features-page section.bg-white {
    background-color: #0b182c !important;
}

/* Sections that use bg-[#F7F9FA] */
.page-dark .features-page section#companies,
.page-dark .features-page section#how-it-works,
.page-dark .features-page section.bg-\[\#F7F9FA\] {
    background-color: #07111f !important;
}

/* All non-hero sections — catch-all */
.page-dark .features-page section:not(:first-of-type) {
    background-color: #0b182c !important;
}

/* Odd sections slightly darker for rhythm */
.page-dark .features-page section:nth-of-type(odd):not(:first-of-type) {
    background-color: #07111f !important;
}

/* ─── ALL TEXT ───────────────────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) h1,
.page-dark .features-page section:not(:first-of-type) h2,
.page-dark .features-page section:not(:first-of-type) h3,
.page-dark .features-page section:not(:first-of-type) h4,
.page-dark .features-page section:not(:first-of-type) p,
.page-dark .features-page section:not(:first-of-type) span:not(.badge-exempt),
.page-dark .features-page section:not(:first-of-type) li,
.page-dark .features-page section:not(:first-of-type) label,
.page-dark .features-page section:not(:first-of-type) th,
.page-dark .features-page section:not(:first-of-type) td {
    color: #ffffff !important;
}

/* Secondary / muted text (was #666666) */
.page-dark .features-page section:not(:first-of-type) .text-\[\#666666\],
.page-dark .features-page section:not(:first-of-type) p.text-\[\#666666\],
.page-dark .features-page section:not(:first-of-type) span.text-\[\#666666\] {
    color: #b0c4d8 !important;
}

/* Dark title text (was #444444) */
.page-dark .features-page section:not(:first-of-type) .text-\[\#444444\] {
    color: #ffffff !important;
}

/* ─── CARDS — bg-white ───────────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .bg-white,
.page-dark .features-page section:not(:first-of-type) [class*="bg-white"] {
    background-color: #10223b !important;
    border-color: #213a59 !important;
}

/* ─── CARDS — bg-[#F7F9FA] (light gray panels) ───────────────────────── */
.page-dark .features-page section:not(:first-of-type) .bg-\[\#F7F9FA\],
.page-dark .features-page section:not(:first-of-type) [class*="bg-[#F7F9FA]"] {
    background-color: #152844 !important;
    border-color: #213a59 !important;
}

/* ─── BORDERS ────────────────────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .border-\[\#E5E7EB\],
.page-dark .features-page section:not(:first-of-type) [class*="border-[#E5E7EB]"],
.page-dark .features-page section:not(:first-of-type) .border-b,
.page-dark .features-page section:not(:first-of-type) .divide-y > * {
    border-color: #213a59 !important;
}

/* ─── ACCORDION ITEMS ────────────────────────────────────────────────── */
/* Student features accordion */
.page-dark .features-page section:not(:first-of-type) .rounded-2xl.border,
.page-dark .features-page section:not(:first-of-type) .rounded-2xl.border.border-\[\#E5E7EB\] {
    background-color: #10223b !important;
    border-color: #213a59 !important;
}

/* Active accordion item (border-[#444444]) */
.page-dark .features-page section:not(:first-of-type) .border-\[\#444444\] {
    background-color: #152844 !important;
    border-color: #00B1AA !important;
}

/* Accordion header hover */
.page-dark .features-page section:not(:first-of-type) .hover\:border-\[\#00B1AA\]\/30:hover {
    border-color: rgba(0, 177, 170, 0.5) !important;
}

/* ─── STUDENT FEATURES — RIGHT SIDE DARK CARD (#444444) ─────────────── */
/* The dark preview card already uses #444444 — upgrade it for dark mode */
.page-dark .features-page section:not(:first-of-type) [style*="background-color:#444444"],
.page-dark .features-page section:not(:first-of-type) [style*="background-color: #444444"] {
    background-color: #0b182c !important;
    border: 1px solid #213a59;
}

/* Inner white card inside the dark preview card */
.page-dark .features-page section:not(:first-of-type) [style*="background-color:#444444"] .bg-white,
.page-dark .features-page section:not(:first-of-type) [style*="background-color: #444444"] .bg-white {
    background-color: #10223b !important;
}

/* ─── FAKE BROWSER BAR (App preview) ────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .bg-white\/20 {
    background-color: rgba(255, 255, 255, 0.07) !important;
}
.page-dark .features-page section:not(:first-of-type) .bg-white\/10 {
    background-color: rgba(255, 255, 255, 0.05) !important;
}
.page-dark .features-page section:not(:first-of-type) .bg-white\/80 {
    background-color: rgba(16, 34, 59, 0.92) !important;
}

/* ─── COMPANY FEATURES — CANDIDATE ROWS ─────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .space-y-2 .bg-white.rounded-xl,
.page-dark .features-page section:not(:first-of-type) .bg-white.rounded-xl.p-3 {
    background-color: #152844 !important;
    border: 1px solid #213a59;
}

/* ─── COMPANY FEATURES — TOP TWO LARGE CARDS ────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .rounded-3xl.p-6,
.page-dark .features-page section:not(:first-of-type) .rounded-3xl.p-8,
.page-dark .features-page section:not(:first-of-type) .rounded-3xl.p-6.sm\:p-8 {
    background-color: #10223b !important;
    border-color: #213a59 !important;
}

/* Inner #F7F9FA panels inside large cards */
.page-dark .features-page section:not(:first-of-type) .rounded-3xl .rounded-2xl.overflow-hidden.shadow-md,
.page-dark .features-page section:not(:first-of-type) .rounded-3xl .bg-\[\#F7F9FA\] {
    background-color: #152844 !important;
}

/* ─── ADMIN SECTION — ACTIVITY TABLE ────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) table {
    background-color: #10223b !important;
}
.page-dark .features-page section:not(:first-of-type) thead tr,
.page-dark .features-page section:not(:first-of-type) .bg-\[\#F7F9FA\].px-5.py-4,
.page-dark .features-page section:not(:first-of-type) .bg-\[\#F7F9FA\].px-6.py-4 {
    background-color: #152844 !important;
}
.page-dark .features-page section:not(:first-of-type) tbody tr:hover {
    background-color: #1a2f4a !important;
}
/* Table header text (was #666666 uppercase) */
.page-dark .features-page section:not(:first-of-type) th {
    color: #b0c4d8 !important;
}

/* ─── ADMIN — STAT CARDS ─────────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .rounded-2xl.p-5.border.border-\[\#E5E7EB\].bg-\[\#F7F9FA\],
.page-dark .features-page section:not(:first-of-type) .rounded-2xl.p-5.border {
    background-color: #152844 !important;
    border-color: #213a59 !important;
}

/* Stat value number (was #444444 black) */
.page-dark .features-page section:not(:first-of-type) .text-2xl.font-black,
.page-dark .features-page section:not(:first-of-type) .text-3xl.font-black {
    color: #ffffff !important;
}

/* ─── ADMIN — FEATURE LIST ROWS ─────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .flex.items-center.gap-3.px-4.py-3.rounded-xl {
    background-color: #152844 !important;
    border-color: #213a59 !important;
}
.page-dark .features-page section:not(:first-of-type) .hover\:border-\[\#00B1AA\]\/50:hover {
    border-color: rgba(0, 177, 170, 0.6) !important;
}

/* ─── PLATFORM SECTION — FLOATING CARDS ─────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .absolute.bg-white.rounded-2xl {
    background-color: #10223b !important;
    border-color: #213a59 !important;
}

/* ─── SHOWCASE — BROWSER FRAME ───────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .bg-\[\#F7F9FA\].px-5.py-3 {
    background-color: #152844 !important;
    border-color: #213a59 !important;
}
/* URL bar inside browser frame */
.page-dark .features-page section:not(:first-of-type) .bg-white.rounded-lg.px-3.py-1 {
    background-color: #0b182c !important;
    border-color: #213a59 !important;
    color: #b0c4d8 !important;
}

/* ─── SHOWCASE — TABLET / MOBILE FRAMES ─────────────────────────────── */
/* The rounded-3xl dark device frame (#444444) — upgrade */
.page-dark .features-page section:not(:first-of-type) .rounded-3xl.p-3[style*="background-color:#444444"],
.page-dark .features-page section:not(:first-of-type) .rounded-\[2rem\].p-2[style*="background-color:#444444"] {
    background-color: #07111f !important;
    border: 1px solid #213a59;
}

/* ─── FAQ ACCORDION ──────────────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) #faq .bg-white,
.page-dark .features-page section:not(:first-of-type) .space-y-3 .rounded-2xl.border {
    background-color: #10223b !important;
    border-color: #213a59 !important;
}

/* FAQ button hover */
.page-dark .features-page section:not(:first-of-type) button.hover\:bg-\[\#F7F9FA\]:hover {
    background-color: #152844 !important;
}

/* ─── TESTIMONIAL FEATURED DARK CARD ─────────────────────────────────── */
/* Already #444444 — make it deeper */
.page-dark .features-page .rounded-2xl[style*="background-color:#444444"] {
    background-color: #0b182c !important;
    border: 1px solid #213a59;
}

/* ─── TESTIMONIAL GRID CARDS ─────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .grid .bg-white.rounded-2xl {
    background-color: #10223b !important;
    border-color: #213a59 !important;
}

/* ─── BADGE PILLS (teal outlined badges) ─────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) span[style*="background-color:#DDF7F6"] {
    background-color: rgba(0, 177, 170, 0.15) !important;
    border-color: rgba(0, 177, 170, 0.4) !important;
}

/* Trust badge pills (border-[#E5E7EB] bg-white) */
.page-dark .features-page section:not(:first-of-type) span.border.border-\[\#E5E7EB\].bg-white {
    background-color: #152844 !important;
    border-color: #213a59 !important;
    color: #b0c4d8 !important;
}

/* ─── HOW IT WORKS — STEP DIVIDERS ──────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .border-b.border-\[\#E5E7EB\] {
    border-color: #213a59 !important;
}

/* Step connector lines */
.page-dark .features-page section:not(:first-of-type) .w-px[style*="background-color:rgba(0,177,170"] {
    background-color: rgba(0, 177, 170, 0.4) !important;
}

/* ─── SECURITY SECTION ───────────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .rounded-2xl.p-5.border.bg-\[\#F7F9FA\] {
    background-color: #152844 !important;
    border-color: #213a59 !important;
}
/* Small teal square icon inside security cards */
.page-dark .features-page section:not(:first-of-type) .w-8.h-8.rounded-lg[style*="background-color:#DDF7F6"],
.page-dark .features-page section:not(:first-of-type) .w-8.h-8.rounded-lg.mb-3 {
    background-color: rgba(0, 177, 170, 0.2) !important;
}

/* Trust box overlay on image */
.page-dark .features-page section:not(:first-of-type) .bg-white\/80.backdrop-blur {
    background-color: rgba(16, 34, 59, 0.92) !important;
    border-color: #213a59 !important;
}

/* ─── GREEN / YELLOW STATUS BADGES ──────────────────────────────────── */
/* Keep these readable but soften their backgrounds */
.page-dark .features-page section:not(:first-of-type) .bg-green-50 {
    background-color: rgba(22, 101, 52, 0.3) !important;
}
.page-dark .features-page section:not(:first-of-type) .bg-yellow-50 {
    background-color: rgba(113, 87, 0, 0.3) !important;
}
.page-dark .features-page section:not(:first-of-type) .bg-\[\#DDF7F6\] {
    background-color: rgba(0, 177, 170, 0.15) !important;
}

/* ─── PLATFORM 6-CARD GRID ───────────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .grid.sm\:grid-cols-2.lg\:grid-cols-3 .bg-white.rounded-2xl {
    background-color: #10223b !important;
    border-color: #213a59 !important;
}

/* ─── DECORATIVE DASHED BORDERS ─────────────────────────────────────── */
.page-dark .features-page section:not(:first-of-type) .border-dashed.border-\[\#E5E7EB\] {
    border-color: #213a59 !important;
    opacity: 0.5;
}

/* ─── SCROLLBAR (optional quality-of-life) ───────────────────────────── */
.page-dark ::-webkit-scrollbar-track { background: #07111f; }
.page-dark ::-webkit-scrollbar-thumb { background: #213a59; border-radius: 4px; }
.page-dark ::-webkit-scrollbar-thumb:hover { background: #2e4e78; }

</style>

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
                    {{ $t['hero']['title'] }}
                </h1>
                <p class="text-white/80 text-base leading-relaxed mb-8">
                    {{ $t['hero']['subtitle'] }}
                </p>
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
                    <a href="#"
                       class="border border-white text-white text-sm font-semibold px-6 py-2.5 rounded hover:bg-white hover:text-[#00B1AA] transition-all duration-200 flex items-center gap-1">
                        {{ $t['hero']['cta'] }}
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
                    {{ $t['students']['badge'] }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] max-w-2xl leading-tight">
                    {{ $t['students']['heading'] }}
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-10 lg:gap-12 items-start" x-data="{ active: 0 }">

{{-- Left: Feature accordion --}}
<div class="space-y-2">
    @foreach([
            ['title' => $t['students']['items'][0]['title'], 'desc' => $t['students']['items'][0]['desc'], 'imgSrc' => 'https://www.shutterstock.com/image-vector/internship-banner-web-icon-vector-260nw-2142982795.jpg'],
            ['title' => $t['students']['items'][1]['title'], 'desc' => $t['students']['items'][1]['desc'], 'imgSrc' => 'https://media.licdn.com/dms/image/v2/C4D12AQF3VZ8X4jkt8w/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1588045033207?e=2147483647&v=beta&t=q8QVtAWm0NWXXrZImEJbqKdrskcRmk2k25SOVkqzJY8'],
            ['title' => $t['students']['items'][2]['title'], 'desc' => $t['students']['items'][2]['desc'], 'imgSrc' => 'https://www.notion.com/_next/image?url=https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fpublic.notion-static.com%2Ftemplate%2F3272d5e7-0c5f-4099-a345-957e19c40218%2F1756330456712%2Fdesktop.jpg&w=3840&q=75'],
            ['title' => $t['students']['items'][3]['title'], 'desc' => $t['students']['items'][3]['desc'], 'imgSrc' => 'https://s3.resume.io/uploads/examples/resume/og_image/26007/persistent-resource/manager-cv-examples.png'],
            ['title' => $t['students']['items'][4]['title'], 'desc' => $t['students']['items'][4]['desc'], 'imgSrc' => 'https://blog.interviewpal.com/content/images/2026/04/internships.jpg'],
            ['title' => $t['students']['items'][5]['title'], 'desc' => $t['students']['items'][5]['desc'], 'imgSrc' => 'https://arts.uj.ac.za/wp-content/uploads/2023/09/WEB-BANNER.png'],
        ] as $i => $item)
            <div class="rounded-2xl border transition-all duration-300 overflow-hidden cursor-pointer"
                 :class="active === {{ $i }} ? 'border-[#444444] bg-white shadow-md' : 'border-[#E5E7EB] bg-[#F7F9FA] hover:border-[#00B1AA]/30'"
                 x-on:click="active = {{ $i }}">
                <div class="flex items-center justify-between px-5 sm:px-6 py-4 sm:py-5">
                    <h3 class="font-bold text-sm sm:text-base"
                        :class="active === {{ $i }} ? 'text-[#444444]' : 'text-[#666666]'">
                        {{ $item['title'] }}
                    </h3>
                    <div class="w-6 h-6 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0 ml-3 transition-all"
                         :class="active === {{ $i }} ? 'text-white' : 'text-[#666666] bg-[#E5E7EB]'"
                         :style="active === {{ $i }} ? 'background-color:#00B1AA' : ''">
                        <span x-text="active === {{ $i }} ? '−' : '+'"></span>
                    </div>
                </div>
                <div x-show="active === {{ $i }}" x-collapse class="px-5 sm:px-6 pb-5">
                    <p class="text-sm text-[#666666] leading-relaxed mb-4">{{ $item['desc'] }}</p>
                    <img src="{{ $item['imgSrc'] }}"
                         alt="{{ $item['title'] }}"
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
                                    <p class="text-sm font-bold text-[#444444]">{{ $t['students']['preview_label'] }}</p>
                                    <p class="text-xs text-[#666666] truncate">{{ $t['students']['preview_sub'] }}</p>
                                </div>
                                <span class="text-xs font-bold px-3 py-1 rounded-full text-white flex-shrink-0" style="background-color:#00B1AA">{{ $t['students']['preview_status'] }}</span>
                            </div>
                            <div class="bg-white/10 rounded-2xl p-4 mt-3">
                                <p class="text-xs font-semibold text-white mb-2">{{ $t['students']['suggested'] }}</p>
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
                    {{ $t['companies']['badge'] }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] max-w-3xl mx-auto leading-tight">
                    {{ $t['companies']['heading'] }}
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
                    <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#00B1AA">{{ $t['companies']['cards']['source_badge'] }}</p>
                    <h3 class="text-xl sm:text-2xl font-black text-[#444444] mb-3">{{ $t['companies']['cards']['source_title'] }}</h3>
                    <p class="text-[#666666] text-sm leading-relaxed mb-5">{{ $t['companies']['cards']['source_desc'] }}</p>
                    <a href="#" class="text-xs font-bold uppercase tracking-widest hover:text-[#008A84] transition-colors" style="color:#00B1AA">{{ $t['companies']['cards']['source_cta'] }}</a>
                </div>

                {{-- Card 2: Evaluate & Collaborate --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-[#E5E7EB] hover:shadow-lg transition-shadow">
                    <div class="rounded-2xl overflow-hidden shadow-md bg-[#F7F9FA] p-4 mb-6">
                        <div class="space-y-2 mb-3">
                            @foreach([
                                    ['Sara K.', 'UX Design', '95%', 5],
                                    ['Ahmed R.', 'Backend Dev', '88%', 6],
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
                    <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#00B1AA">{{ $t['companies']['cards']['evaluate_badge'] }}</p>
                    <h3 class="text-xl sm:text-2xl font-black text-[#444444] mb-3">{{ $t['companies']['cards']['evaluate_title'] }}</h3>
                    <p class="text-[#666666] text-sm leading-relaxed mb-5">{{ $t['companies']['cards']['evaluate_desc'] }}</p>
                    <a href="#" class="text-xs font-bold uppercase tracking-widest hover:text-[#008A84] transition-colors" style="color:#00B1AA">{{ $t['companies']['cards']['evaluate_cta'] }}</a>
                </div>
            </div>

            {{-- Three-column secondary features --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                @foreach([
                        ['title' => $t['companies']['secondary'][0]['title'], 'label' => $t['companies']['secondary'][0]['label'], 'desc' => $t['companies']['secondary'][0]['desc'], 'seed' => 'https://www.barraiser.com/wp-content/uploads/2023/04/untitled-design-1536x864-1.jpg'],
                        ['title' => $t['companies']['secondary'][1]['title'], 'label' => $t['companies']['secondary'][1]['label'], 'desc' => $t['companies']['secondary'][1]['desc'], 'seed' => 'https://assets.qlik.com/image/upload/w_1720/q_auto/qlik/glossary/dashboard-examples/seo-analytics-dashboards-tactical-dashboards_lbbcaf.png'],
                        ['title' => $t['companies']['secondary'][2]['title'], 'label' => $t['companies']['secondary'][2]['label'], 'desc' => $t['companies']['secondary'][2]['desc'], 'seed' => 'https://powerslides.com/wp-content/uploads/2019/10/Management-Team-Profile-3.jpg'],
                    ] as $item)
                        <div class="bg-white rounded-2xl p-6 border border-[#E5E7EB] hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <img src="{{ $item['seed'] }}"
                                 alt="{{ $item['title'] }}"
                                 class="w-full h-36 object-cover rounded-xl mb-5 group-hover:scale-105 transition-transform duration-300"/>
                            <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#00B1AA">{{ $item['label'] }}</p>
                            <h4 class="font-black text-[#444444] mb-2">{{ $item['title'] }}</h4>
                            <p class="text-sm text-[#666666] leading-relaxed">{{ $item['desc'] }}</p>
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
                        {{ $t['admin']['badge'] }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-5 leading-tight">
                        {{ $t['admin']['heading'] }}
                    </h2>
                    <p class="text-[#666666] text-base sm:text-lg leading-relaxed mb-10">
                        {{ $t['admin']['desc'] }}
                    </p>

                    {{-- Stat cards --}}
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        @foreach($t['admin']['stats'] as $stat)
                            <div class="rounded-2xl p-5 border border-[#E5E7EB] bg-[#F7F9FA] hover:shadow-md transition-shadow">
                                <p class="text-2xl sm:text-3xl font-black text-[#444444]">{{ $stat['value'] }}</p>
                                <p class="text-sm text-[#666666] font-medium mt-1">{{ $stat['label'] }}</p>
                                <div class="h-1 rounded-full mt-3 w-12" style="background-color:#00B1AA"></div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Feature list --}}
                    <div class="space-y-2 sm:space-y-3">
                        @foreach($t['admin']['features'] as $feat)
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
                            <p class="font-bold text-[#444444] text-sm">{{ $t['admin']['activity']['title'] }}</p>
                            <span class="text-xs font-bold px-3 py-1 rounded-full text-white" style="background-color:#00B1AA">{{ $t['admin']['activity']['live'] }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[420px]">
                                <thead>
                                    <tr class="border-b border-[#E5E7EB]">
                                        <th class="px-4 sm:px-5 py-3 text-left text-xs font-semibold text-[#666666] uppercase tracking-wide">{{ $t['admin']['activity']['headers'][0] }}</th>
                                        <th class="px-4 sm:px-5 py-3 text-left text-xs font-semibold text-[#666666] uppercase tracking-wide">{{ $t['admin']['activity']['headers'][1] }}</th>
                                        <th class="px-4 sm:px-5 py-3 text-left text-xs font-semibold text-[#666666] uppercase tracking-wide">{{ $t['admin']['activity']['headers'][2] }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#F7F9FA]">
                                    @foreach($t['admin']['activity']['rows'] as $row)
                                        <tr class="hover:bg-[#F7F9FA] transition-colors">
                                            <td class="px-4 sm:px-5 py-3">
                                                <div class="flex items-center gap-2">
                                                    <img src="https://i.pravatar.cc/60?img={{ $loop->index + 8 }}"
                                                         alt="avatar"
                                                         class="w-7 h-7 rounded-full object-cover flex-shrink-0"/>
                                                    <span class="text-sm font-medium text-[#444444]">{{ $row['name'] }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-5 py-3 text-xs text-[#666666]">{{ $row['action'] }}</td>
                                            <td class="px-4 sm:px-5 py-3">
                                                @if($row['status'] === 'Active')
                                                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-green-50 text-green-600">{{ $row['status'] }}</span>
                                                @elseif($row['status'] === 'Pending')
                                                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-yellow-50 text-yellow-600">{{ $row['status'] }}</span>
                                                @elseif($row['status'] === 'Verified')
                                                    <span class="text-xs font-semibold px-2 py-1 rounded-full text-white" style="background-color:#00B1AA">{{ $row['status'] }}</span>
                                                @else
                                                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-[#DDF7F6] text-[#008A84]">{{ $row['status'] }}</span>
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
                        {{ $t['platform']['badge'] }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-5 leading-tight">
                        {{ $t['platform']['heading'] }}
                    </h2>
                    <p class="text-[#666666] text-base sm:text-lg leading-relaxed mb-4">
                        {{ $t['platform']['desc1'] }}
                    </p>
                    <p class="text-[#666666] text-base leading-relaxed mb-10">
                        {{ $t['platform']['desc2'] }}
                    </p>
                    <a href="#"
                       class="inline-block text-sm font-bold text-white px-8 py-4 rounded-full hover:shadow-xl hover:-translate-y-0.5 transition-all"
                       style="background-color:#00B1AA">
                        {{ $t['platform']['cta'] }}
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
                        <p class="text-xs text-[#666666] mb-1">{{ $t['platform']['score'] }}</p>
                        <p class="text-2xl font-black" style="color:#00B1AA">{{ $t['platform']['score_value'] }}</p>
                        <img src="https://picsum.photos/seed/match/300/120"
                             alt="match"
                             class="w-full h-14 object-cover rounded-xl mt-2"/>
                    </div>
                    {{-- Message card --}}
                    <div class="absolute -bottom-5 -right-4 sm:-right-5 bg-white rounded-2xl shadow-xl border border-[#E5E7EB] p-4">
                        <p class="text-xs text-[#666666] mb-1">{{ $t['platform']['message'] }}</p>
                        <div class="flex items-center gap-2">
                            <img src="https://i.pravatar.cc/60?img=15"
                                 alt="msg"
                                 class="w-8 h-8 rounded-full object-cover flex-shrink-0"/>
                            <div>
                                <p class="text-xs font-bold text-[#444444]">{{ $t['platform']['reply'] }}</p>
                                <p class="text-xs text-[#666666]">{{ $t['platform']['confirm'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- 6-feature grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                        ['title' => $t['platform']['cards'][0]['title'], 'seed' => 'https://timesinternet.in/blog/wp-content/uploads/2020/07/real-time-personalized-push-notifications.jpg', 'desc' => $t['platform']['cards'][0]['desc']],
                        ['title' => $t['platform']['cards'][1]['title'], 'seed' => 'https://5.imimg.com/data5/JE/CT/QJ/GLADMIN-63163868/infobizzs-product-classpie-2-500x500.jpg', 'desc' => $t['platform']['cards'][1]['desc']],
                        ['title' => $t['platform']['cards'][2]['title'], 'seed' => 'https://lh7-us.googleusercontent.com/c0Y_9vCPlaHCm8Nwrf8IwpQHYzeZyJKk5oH-H13VJMC7tRWouHvKKBeBhejFX2f-CkRW4_ZQBL8oynUHVp41XYq-p0Ez0ltEs8homDanov5uIR-VR-qZoBpKBfCZqRbjKct7enrwJbLpt7klARaD08E', 'desc' => $t['platform']['cards'][2]['desc']],
                        ['title' => $t['platform']['cards'][3]['title'], 'seed' => 'https://informationage-production.s3.amazonaws.com/uploads/2022/10/what-to-know-about-user-authentication-cyber-security.jpeg', 'desc' => $t['platform']['cards'][3]['desc']],
                        ['title' => $t['platform']['cards'][4]['title'], 'seed' => 'https://studio.uxpincdn.com/studio/wp-content/uploads/2022/01/Responsive-design-best-practices-1024x512.png.webp', 'desc' => $t['platform']['cards'][4]['desc']],
                        ['title' => $t['platform']['cards'][5]['title'], 'seed' => 'https://t3.ftcdn.net/jpg/20/16/93/26/360_F_2016932689_A6OMjCe2WRWlJHJWTpUmE7VaBTfRBR7Q.jpg', 'desc' => $t['platform']['cards'][5]['desc']],
                    ] as $item)
                        <div class="bg-white rounded-2xl p-6 border border-[#E5E7EB] hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                            <img src="{{ $item['seed'] }}"
                                 alt="{{ $item['title'] }}"
                                 class="w-full h-32 object-cover rounded-xl mb-5 group-hover:scale-105 transition-transform duration-300"/>
                            <h4 class="font-black text-[#444444] mb-2">{{ $item['title'] }}</h4>
                            <p class="text-sm text-[#666666] leading-relaxed">{{ $item['desc'] }}</p>
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
                    {{ $t['showcase']['badge'] }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-4">{{ $t['showcase']['heading'] }}</h2>
                <p class="text-[#666666] max-w-xl mx-auto">{{ $t['showcase']['desc'] }}</p>
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
                    <p class="text-center text-sm text-[#666666] font-medium mt-4">{{ $t['showcase']['tablet'] }}</p>
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
                    <p class="text-center text-sm text-[#666666] font-medium mt-4">{{ $t['showcase']['mobile'] }}</p>
                </div>
            </div>

      {{-- Screenshot gallery --}}
<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
    @foreach([
            ['label' => $t['showcase']['gallery'][0], 'imgPath' => 'images/site photos/student-dash.png'],
            ['label' => $t['showcase']['gallery'][1], 'imgPath' => 'images/site photos/company-dash.png'],
            ['label' => $t['showcase']['gallery'][2], 'imgPath' => 'images/site photos/admin-dash.png'],
        ] as $item)
            <div class="relative rounded-2xl overflow-hidden shadow-lg group">
                <img src="{{ asset($item['imgPath']) }}"
                     alt="{{ $item['label'] }}"
                     class="w-full h-44 sm:h-52 object-cover group-hover:scale-105 transition-transform duration-500"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent flex items-end p-5">
                    <div class="backdrop-blur-sm bg-white/10 rounded-xl px-4 py-2 border border-white/20">
                        <p class="text-white font-bold text-sm">{{ $item['label'] }}</p>
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
                    {{ $t['how']['badge'] }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-4">{{ $t['how']['heading'] }}</h2>
                <p class="text-[#666666] max-w-xl mx-auto">{{ $t['how']['desc'] }}</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">

                {{-- Students steps --}}
                <div>
                    <div class="flex items-center gap-3 mb-8 pb-5 border-b border-[#E5E7EB]">
                        <img src="https://img.magnific.com/free-photo/young-student-woman-wearing-denim-jacket-eyeglasses-holding-colorful-folders-showing-thumb-up-pink_176532-13861.jpg?semt=ais_hybrid&w=740&q=80" alt="Student" class="w-10 h-10 rounded-full object-cover"/>
                        <h3 class="text-xl sm:text-2xl font-black text-[#444444]">{{ $t['how']['students'] }}</h3>
                    </div>
                    @foreach($t['how']['student_steps'] as $i => $step)
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
                                <h4 class="text-base sm:text-lg font-bold text-[#444444] mb-1">{{ $step['title'] }}</h4>
                                <p class="text-sm text-[#666666] leading-relaxed mb-3">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Companies steps --}}
                <div>
                    <div class="flex items-center gap-3 mb-8 pb-5 border-b border-[#E5E7EB]">
                        <img src="https://img.freepik.com/free-photo/low-angle-view-skyscrapers_1359-1105.jpg?semt=ais_hybrid&w=740&q=80" alt="Company" class="w-10 h-10 rounded-full object-cover"/>
                        <h3 class="text-xl sm:text-2xl font-black text-[#444444]">{{ $t['how']['companies'] }}</h3>
                    </div>
                    @foreach($t['how']['company_steps'] as $i => $step)
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
                                <h4 class="text-base sm:text-lg font-bold text-[#444444] mb-1">{{ $step['title'] }}</h4>
                                <p class="text-sm text-[#666666] leading-relaxed mb-3">{{ $step['desc'] }}</p>
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
                        {{ $t['security']['badge'] }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-5 leading-tight">
                        {{ $t['security']['heading'] }}
                    </h2>
                    <p class="text-[#666666] text-base sm:text-lg leading-relaxed mb-10">
                        {{ $t['security']['desc'] }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($t['security']['items'] as $item)
                            <div class="rounded-2xl p-5 border border-[#E5E7EB] bg-[#F7F9FA] hover:shadow-md transition-shadow">
                                <div class="w-8 h-8 rounded-lg mb-3" style="background-color:#DDF7F6"></div>
                                <h4 class="font-bold text-[#444444] mb-1 text-sm">{{ $item['title'] }}</h4>
                                <p class="text-xs text-[#666666] leading-relaxed">{{ $item['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{-- Trust badges --}}
                    <div class="flex flex-wrap gap-3 mt-8">
                        @foreach($t['security']['badges'] as $badge)
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
                        <p class="font-black text-[#444444] mb-1 text-sm sm:text-base">{{ $t['security']['trust_box']['title'] }}</p>
                        <p class="text-xs sm:text-sm text-[#666666]">{{ $t['security']['trust_box']['desc'] }}</p>
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
                    {{ $t['testimonials']['badge'] }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#444444] mb-4">
                    {{ $t['testimonials']['heading'] }}
                </h2>
                    <p class="text-[#666666] max-w-xl mx-auto">{{ $t['testimonials']['desc'] }}</p>
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
                            {{ $t['testimonials']['quote'] }}
                        </p>
                        <div>
                            <p class="text-white font-bold">{{ $t['testimonials']['author'] }}</p>
                            <p class="text-white/60 text-sm mt-1">{{ $t['testimonials']['role'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimonial card grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                        ['Youssef El Khadiri', 'Marketing Student, Hassan II University', 'The application tracking feature kept me completely organised during recruitment season. I always knew exactly where I stood with each company.', 30],
                        ['Thomas Bergmann', 'HR Lead, TechCorp GmbH', 'We reduced time-to-hire by 60% after switching to InterLink. The candidate filtering is exceptional and the quality of applicants is noticeably higher.', 31],
                        ['Nadia Boussaid', 'Data Science Student, ENSIAS', 'I uploaded my CV once and applied to 12 internships in a single afternoon. The UI is so clean and everything just works perfectly.', 32],
                        ['Amina Tahir', 'Talent Acquisition, StartupX Morocco', 'Interview scheduling alone saved us hours every week. Our entire recruiting workflow is now centralised in InterLink and it has transformed how we hire.', 33],
                        ['Prof. Rachid Belkacem', 'Career Services, ENSA Casablanca', 'We partnered with InterLink to help our students access better opportunities. The analytics give us clear visibility into graduate placement.', 34],
                        ['Karim Mansouri', 'Full-Stack Developer Student, ENSA', 'From zero applications to three offers in 6 weeks. InterLink kept me focused and the alerts made sure I never missed a deadline.', 35],
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
                        {{ $t['faq']['badge'] }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#444444] mb-4">{{ $t['faq']['heading'] }}</h2>
                    <p class="text-[#666666] text-sm leading-relaxed mb-6">{{ $t['faq']['desc'] }}</p>
                    <a href="#"
                       class="inline-block text-sm font-bold text-white px-6 py-3 rounded-full hover:shadow-lg hover:opacity-90 transition-all"
                       style="background-color:#00B1AA">
                        {{ $t['faq']['cta'] }}
                    </a>
                    <div class="mt-6 rounded-2xl overflow-hidden shadow-sm">
                        <img src="{{ asset('images/site photos/student-dash.png') }}"
                             alt="Support"
                             class="w-full h-36 sm:h-40 object-cover"/>
                    </div>
                </div>

                {{-- Right: accordion --}}
                <div class="lg:col-span-3 space-y-3" x-data="{ open: null }">
                    @foreach($t['faq']['items'] as $qi => $item)
                        <div class="rounded-2xl border border-[#E5E7EB] overflow-hidden bg-white shadow-sm" x-data="{ isOpen: false }">
                            <button class="w-full px-5 sm:px-6 py-4 sm:py-5 flex items-center justify-between text-left hover:bg-[#F7F9FA] transition-colors"
                                    x-on:click="isOpen = !isOpen">
                                <span class="font-bold text-[#444444] pr-4 text-sm">{{ $item['q'] }}</span>
                                <span class="flex-shrink-0 w-7 h-7 rounded-full border border-[#E5E7EB] flex items-center justify-center text-sm font-bold transition-all"
                                      :style="isOpen ? 'background-color:#00B1AA; border-color:#00B1AA; color:white' : 'color:#666666'">
                                    <span x-text="isOpen ? '−' : '+'"></span>
                                </span>
                            </button>
                            <div x-show="isOpen" x-collapse>
                                <div class="px-5 sm:px-6 pb-5">
                                    <p class="text-sm text-[#666666] leading-relaxed">{{ $item['a'] }}</p>
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
                {{ $t['final_cta']['title'] }}
            </h2>
            <p class="text-white/80 text-base sm:text-xl mb-10 sm:mb-12 max-w-2xl mx-auto leading-relaxed">
                {{ $t['final_cta']['desc'] }}
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#"
                   class="inline-block bg-white font-bold text-sm px-8 sm:px-10 py-3.5 sm:py-4 rounded-full hover:shadow-2xl hover:-translate-y-0.5 transition-all"
                   style="color:#00B1AA">
                    {{ $t['final_cta']['student'] }}
                </a>
                <a href="#"
                   class="inline-block border-2 border-white text-white font-bold text-sm px-8 sm:px-10 py-3.5 sm:py-4 rounded-full hover:bg-white/10 hover:-translate-y-0.5 transition-all">
                    {{ $t['final_cta']['company'] }}
                </a>
            </div>
        </div>
    </section>


   
</div>


    <x-footer />

</body>

</html>