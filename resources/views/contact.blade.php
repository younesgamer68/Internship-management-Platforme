<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>interlink</title>

    <link rel="icon" href="{{ asset('images/Logos/Small%20Logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/Logos/Small%20Logo.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|righteous:400" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500;600;700&family=Raleway:wght@400;500;600&family=Poppins:wght@600;700&family=Sora:wght@600;700&family=DM+Sans:wght@500;700&family=Inter:wght@600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/welcome.css'])

    @livewireStyles

    <x-ui-state />
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.14.8/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* ── Design tokens ── */
        :root {
            --teal-900: #00b1aa;
            --teal-700: #17494D;
            --teal-600: #1e6b70;
            --teal-500: #2a8f95;
            --teal-400: #4ea4a8;
            --teal-200: #b4e5e7;
            --teal-100: #d4ebec;
            --teal-50: #f0fafa;
            --green: #00b1aa;
            --green-lt: #00b1aa;
            --radius-card: 1.5rem;
            --shadow-card: 0 4px 24px rgba(23, 73, 77, .07), 0 1px 4px rgba(23, 73, 77, .04);
            --shadow-card-hover: 0 8px 40px rgba(23, 73, 77, .13), 0 2px 8px rgba(23, 73, 77, .07);
            --transition-base: 220ms cubic-bezier(.4, 0, .2, 1);
        }

        /* ── Scroll-reveal animations ── */
        .scroll-reveal,
        .scroll-stagger>* {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.55s cubic-bezier(.4, 0, .2, 1), transform 0.55s cubic-bezier(.4, 0, .2, 1);
        }

        .scroll-reveal.is-visible {
            opacity: 1;
            transform: none;
        }

        .scroll-stagger.is-visible>* {
            opacity: 1;
            transform: none;
        }

        /* ============================================================
   DARK MODE — contact page
   Fires when body.page-dark is set by Alpine x-init
============================================================ */

        /* ── Page & section backgrounds ── */
        body.page-dark,
        body.page-dark main {
            background-color: #07111f !important;
        }

        body.page-dark section {
            background-color: #07111f !important;
        }

        /* ── Main form card ── */
        body.page-dark .card {
            background: #0d1f2d !important;
            border-color: rgba(255, 255, 255, .07) !important;
            box-shadow: 0 4px 32px rgba(0, 0, 0, .5) !important;
        }

        body.page-dark .card:hover {
            box-shadow: 0 8px 48px rgba(0, 0, 0, .65) !important;
        }

        /* ── Contact sidebar cards ── */
        body.page-dark .contact-card {
            background: #0d1f2d !important;
            border-color: rgba(255, 255, 255, .07) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .45) !important;
        }

        body.page-dark .contact-card:hover {
            box-shadow: 0 8px 40px rgba(0, 0, 0, .6) !important;
        }

        /* ── Step cards (01 02 03) ── */
        body.page-dark .step-card {
            background: #0d1f2d !important;
            border-color: rgba(110, 231, 183, .12) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .4) !important;
        }

        body.page-dark .step-card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, .55) !important;
        }

        /* ── Form inputs, selects, textarea ── */
        body.page-dark .field-input,
        body.page-dark .field-select,
        body.page-dark .field-textarea {
            background: #091929 !important;
            border-color: rgba(255, 255, 255, .1) !important;
            color: #d4e8ec !important;
        }

        body.page-dark .field-input::placeholder,
        body.page-dark .field-textarea::placeholder {
            color: rgba(255, 255, 255, .25) !important;
        }

        body.page-dark .field-input:hover,
        body.page-dark .field-select:hover,
        body.page-dark .field-textarea:hover {
            border-color: rgba(78, 164, 168, .45) !important;
        }

        body.page-dark .field-input:focus,
        body.page-dark .field-select:focus,
        body.page-dark .field-textarea:focus {
            border-color: #00b1aa !important;
            background: #071522 !important;
            box-shadow: 0 0 0 3px rgba(0, 177, 170, .18) !important;
        }

        body.page-dark .field-label {
            color: rgba(255, 255, 255, .82) !important;
        }

        /* Select arrow icon */
        body.page-dark .field-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.4)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: right .875rem center !important;
            background-color: #091929 !important;
        }

        body.page-dark .field-select option {
            background-color: #0d1f2d;
            color: #d4e8ec;
        }

        /* ── Hero label pill ── */
        body.page-dark .hero-label {
            color: #4ea4a8 !important;
            background: rgba(78, 164, 168, .12) !important;
            border-color: rgba(78, 164, 168, .28) !important;
        }

        /* ── Contact card icons ── */
        body.page-dark .contact-card-icon {
            background: rgba(78, 164, 168, .15) !important;
        }

        body.page-dark .contact-card-icon svg {
            stroke: #4ea4a8 !important;
        }

        /* ── Contact email links ── */
        body.page-dark .contact-link {
            color: #6ee7b7 !important;
            background: rgba(110, 231, 183, .08) !important;
        }

        body.page-dark .contact-link:hover {
            background: rgba(110, 231, 183, .16) !important;
            color: #a7f3d0 !important;
        }

        /* ── Checklist items ── */
        body.page-dark .checklist-item {
            color: rgba(255, 255, 255, .58) !important;
        }

        /* ── Step number badges ── */
        body.page-dark .step-number {
            background: rgba(0, 177, 170, .15) !important;
            color: #00c9c1 !important;
        }

        /* ── Office cards ── */
        body.page-dark .office-card h3 {
            color: #d4e8ec !important;
        }

        body.page-dark .office-card p {
            color: rgba(255, 255, 255, .48) !important;
        }

        body.page-dark .office-card:hover {
            border-color: rgba(78, 164, 168, .2) !important;
            background: rgba(13, 31, 45, .8) !important;
            box-shadow: 0 2px 16px rgba(0, 0, 0, .3) !important;
        }

        body.page-dark .office-map-link {
            color: #5eead4 !important;
        }

        body.page-dark .office-map-link:hover {
            color: #99f6e4 !important;
        }

        /* ── Office section (light gray bg → dark) ── */
        body.page-dark section[aria-label] {
            background-color: #060f1a !important;
            border-color: rgba(110, 231, 183, .08) !important;
        }

        /* ── Success banner ── */
        body.page-dark .success-banner {
            background: linear-gradient(135deg, #0a2e1a, #0d3520) !important;
            border-color: rgba(110, 231, 183, .22) !important;
            color: #6ee7b7 !important;
        }

        /* ── Section divider ── */
        body.page-dark .section-divider {
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, .07) 30%, rgba(255, 255, 255, .07) 70%, transparent) !important;
        }

        /* ── Photo grid ── */
        body.page-dark .photo-grid img {
            opacity: 0.78;
            filter: brightness(0.82) saturate(0.85);
        }

        /* ── Submit button stays brand colored ── */
        body.page-dark .btn-submit {
            background: #00b1aa !important;
            color: #ffffff !important;
            box-shadow: 0 2px 18px rgba(0, 177, 170, .35) !important;
        }

        body.page-dark .btn-submit:hover {
            box-shadow: 0 4px 28px rgba(0, 177, 170, .5) !important;
        }

        .scroll-stagger.is-visible>*:nth-child(1) {
            transition-delay: .00s;
        }

        .scroll-stagger.is-visible>*:nth-child(2) {
            transition-delay: .08s;
        }

        .scroll-stagger.is-visible>*:nth-child(3) {
            transition-delay: .16s;
        }

        .scroll-stagger.is-visible>*:nth-child(4) {
            transition-delay: .24s;
        }

        .scroll-stagger.is-visible>*:nth-child(n+5) {
            transition-delay: .32s;
        }

        /* ── Typing cursor ── */
        .typing-cursor::after {
            content: '|';
            animation: blink .75s step-end infinite;
            margin-left: 1px;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: 0
            }
        }

        /* ── Floating particles ── */
        .particles-container {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(94, 219, 86, .55), transparent 70%);
            animation: float var(--dur, 6s) var(--delay, 0s) ease-in-out infinite alternate;
        }

        @keyframes float {
            from {
                transform: translateY(0) scale(1);
                opacity: .55;
            }

            to {
                transform: translateY(-18px) scale(1.15);
                opacity: .2;
            }
        }

        /* ── Hero label ── */
        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: var(--teal-600);
            padding: .3rem .75rem;
            border-radius: 99px;
            background: rgba(78, 164, 168, .10);
            border: 1px solid rgba(78, 164, 168, .22);
            margin-bottom: .25rem;
        }

        .hero-label::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
            flex-shrink: 0;
        }

        /* ── Card surface ── */
        .card {
            border-radius: var(--radius-card);
            border: 1px solid var(--teal-100);
            background: #f8ffff;
            box-shadow: var(--shadow-card);
            transition: box-shadow var(--transition-base), transform var(--transition-base);
        }

        .card:hover {
            box-shadow: var(--shadow-card-hover);
            transform: translateY(-2px);
        }

        /* ── Form inputs & selects ── */
        .field-group {
            display: flex;
            flex-direction: column;
            gap: .375rem;
        }

        .field-label {
            font-size: .8125rem;
            font-weight: 600;
            color: var(--teal-700);
            letter-spacing: .01em;
        }

        .field-input,
        .field-select,
        .field-textarea {
            width: 100%;
            border-radius: .75rem;
            border: 1.5px solid var(--teal-100);
            background: #fff;
            padding: .7rem 1rem;
            font-size: .875rem;
            color: #173f42;
            outline: none;
            transition: border-color var(--transition-base), box-shadow var(--transition-base), background var(--transition-base);
            appearance: none;
            -webkit-appearance: none;
        }

        .field-input::placeholder,
        .field-textarea::placeholder {
            color: #97bbbe;
        }

        .field-input:hover,
        .field-select:hover,
        .field-textarea:hover {
            border-color: var(--teal-400);
        }

        .field-input:focus,
        .field-select:focus,
        .field-textarea:focus {
            border-color: var(--teal-500);
            box-shadow: 0 0 0 3.5px rgba(78, 164, 168, .15);
            background: #fcfffe;
        }

        .field-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%232a8f95' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right .875rem center;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        .field-textarea {
            resize: vertical;
            min-height: 130px;
        }

        /* ── Submit button ── */
        .btn-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            border-radius: 99px;
            background: var(--green);
            padding: .72rem 1.75rem;
            font-size: .875rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: .01em;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background var(--transition-base), box-shadow var(--transition-base), transform var(--transition-base);
            box-shadow: 0 2px 10px rgba(33, 150, 83, .25);
        }

        .btn-submit:hover {
            background: var(--green-lt);
            box-shadow: 0 4px 18px rgba(33, 150, 83, .38);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: 0 1px 6px rgba(33, 150, 83, .22);
        }

        .btn-submit:focus-visible {
            outline: 2.5px solid var(--green);
            outline-offset: 3px;
        }

        .btn-submit svg {
            flex-shrink: 0;
        }

        /* ── Sidebar contact cards ── */
        .contact-card {
            border-radius: var(--radius-card);
            border: 1px solid var(--teal-100);
            background: #f8ffff;
            padding: 1.4rem 1.5rem;
            box-shadow: var(--shadow-card);
            transition: box-shadow var(--transition-base), transform var(--transition-base);
        }

        .contact-card:hover {
            box-shadow: var(--shadow-card-hover);
            transform: translateY(-2px);
        }

        .contact-card-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(78, 164, 168, .12);
            margin-bottom: .75rem;
            flex-shrink: 0;
        }

        .contact-card-icon svg {
            width: 18px;
            height: 18px;
            stroke: var(--teal-500);
        }

        .contact-link {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            font-size: .8125rem;
            font-weight: 700;
            color: #0f8d73;
            text-decoration: none;
            margin-top: .85rem;
            padding: .35rem .7rem;
            border-radius: 6px;
            background: rgba(15, 141, 115, .07);
            transition: background var(--transition-base), color var(--transition-base);
        }

        .contact-link:hover {
            background: rgba(15, 141, 115, .14);
            color: #0a7560;
        }

        /* ── Checklist items ── */
        .checklist-item {
            display: flex;
            align-items: flex-start;
            gap: .55rem;
            font-size: .8rem;
            color: #547d80;
            line-height: 1.5;
        }

        .checklist-item::before {
            content: '';
            display: block;
            flex-shrink: 0;
            width: 16px;
            height: 16px;
            margin-top: 1px;
            border-radius: 50%;
            background: rgba(33, 150, 83, .12);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='%23219653' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 10px;
        }

        /* ── Office grid articles ── */
        .office-card {
            padding: 1.1rem 1.25rem;
            border-radius: 1rem;
            border: 1px solid transparent;
            transition: border-color var(--transition-base), background var(--transition-base), box-shadow var(--transition-base);
        }

        .office-card:hover {
            border-color: var(--teal-100);
            background: #f5fafa;
            box-shadow: 0 2px 12px rgba(23, 73, 77, .06);
        }

        .office-card h3 {
            font-size: .825rem;
            font-weight: 700;
            color: #0f2230;
            margin-bottom: .3rem;
        }

        .office-card p {
            font-size: .78rem;
            color: #567d81;
            line-height: 1.55;
        }

        .office-map-link {
            display: inline-flex;
            align-items: center;
            gap: .25rem;
            margin-top: .5rem;
            font-size: .75rem;
            font-weight: 700;
            color: #2d8a56;
            text-decoration: none;
            letter-spacing: .01em;
        }

        .office-map-link:hover {
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        /* ── Success banner ── */
        .success-banner {
            border-radius: .875rem;
            border: 1.5px solid #a7f3c5;
            background: linear-gradient(135deg, #f0fdf6, #e6faf0);
            padding: .875rem 1.1rem;
            display: flex;
            align-items: flex-start;
            gap: .65rem;
            font-size: .875rem;
            color: #166534;
            font-weight: 500;
            box-shadow: 0 2px 10px rgba(33, 150, 83, .08);
        }

        .success-banner svg {
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* ── After-submit step cards ── */
        .step-card {
            border-radius: 1.1rem;
            border: 1px solid var(--teal-100);
            background: #fbffff;
            padding: 1.25rem 1.4rem;
            position: relative;
            transition: box-shadow var(--transition-base), transform var(--transition-base);
        }

        .step-card:hover {
            box-shadow: 0 6px 24px rgba(23, 73, 77, .1);
            transform: translateY(-2px);
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: rgba(33, 150, 83, .1);
            font-size: .7rem;
            font-weight: 800;
            color: var(--green);
            margin-bottom: .65rem;
            letter-spacing: .02em;
        }

        /* ── Why-us photo grid ── */
        .photo-grid img {
            border-radius: 1rem;
            object-fit: cover;
            width: 100%;
            height: 11rem;
            transition: transform 0.4s cubic-bezier(.4, 0, .2, 1), box-shadow 0.4s cubic-bezier(.4, 0, .2, 1);
            box-shadow: 0 4px 16px rgba(23, 73, 77, .1);
        }

        .photo-grid img:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 28px rgba(23, 73, 77, .18);
        }

        /* ── Section divider ── */
        .section-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, var(--teal-100) 30%, var(--teal-100) 70%, transparent);
            margin: 0 1.5rem;
        }

        /* ── Responsive tweaks ── */
        @media (max-width: 639px) {
            .hero-label {
                font-size: .65rem;
            }

            .photo-grid img {
                height: 8.5rem;
            }
        }
    </style>
</head>

<body x-data x-init="Alpine.effect(() => { document.body.classList.toggle('page-dark', $store.ui.darkMode) })"
    class="flex min-h-screen flex-col bg-white font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] text-[#17494D] antialiased transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black text-white' : 'bg-white text-[#17494D]'">



    <x-nav-bar />
    <x-loading-overlay />

    <main class="flex-1 mt-20 ">
        <section class="relative overflow-hidden px-6 pb-10 pt-10 sm:pt-14"
            :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'">
            <div class="particles-container" id="contact-hero-particles"></div>
            <div class="pointer-events-none absolute inset-0"
                :class="$store.ui.darkMode
                    ? 'bg-[radial-gradient(circle_at_15%_0%,rgba(94,219,86,0.22),transparent_34%),radial-gradient(circle_at_92%_85%,rgba(34,151,83,0.32),transparent_42%),radial-gradient(circle_at_55%_40%,rgba(120,255,170,0.14),transparent_40%)]'
                    : 'bg-[radial-gradient(circle_at_15%_0%,rgba(94,219,86,0.18),transparent_34%),radial-gradient(circle_at_92%_85%,rgba(24,136,141,0.14),transparent_42%)]'">
            </div>

            <div class="relative mx-auto max-w-6xl">
                <p id="contact-typewriter" class="hero-label"></p>
                <h1 class="mt-3 max-w-3xl text-4xl font-semibold leading-tight sm:text-5xl"
                    :class="$store.ui.darkMode ? 'text-white' : 'text-[#17494D]'"
                    x-text="$store.ui.t('contactHeroTitle')"></h1>
                <p class="mt-5 max-w-3xl text-base leading-relaxed sm:text-lg"
                    :class="$store.ui.darkMode ? 'text-white/70' : 'text-[#4e767a]'"
                    x-text="$store.ui.t('contactHeroDescription')">
                </p>
            </div>
        </section>

        <section class="relative overflow-hidden px-6 pb-18 pt-8" :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'"
            x-data="{ submitted: false }">
            <div class="pointer-events-none absolute inset-0"
                :class="$store.ui.darkMode
                    ? 'bg-[radial-gradient(circle_at_10%_18%,rgba(82,220,130,0.12),transparent_34%),radial-gradient(circle_at_85%_80%,rgba(64,198,111,0.16),transparent_40%)]'
                    : 'bg-[radial-gradient(circle_at_10%_18%,rgba(82,220,130,0.08),transparent_34%),radial-gradient(circle_at_85%_80%,rgba(64,198,111,0.08),transparent_40%)]'">
            </div>
            <div class="mx-auto grid max-w-6xl gap-7 lg:grid-cols-[1.05fr_0.95fr]">
                <div class="card scroll-reveal p-6 sm:p-8" :class="$store.ui.darkMode ? 'dark-fields' : ''">
                    <h2 class="text-2xl font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#17494D]'"
                        x-text="$store.ui.t('contactFormTitle')"></h2>
                    <p class="mt-2 text-sm" :class="$store.ui.darkMode ? 'text-white/65' : 'text-[#567d81]'"
                        x-text="$store.ui.t('contactFormRequiredNote')">
                    </p>

                    <div x-show="submitted" x-transition aria-live="polite" class="success-banner mt-4"
                        style="display:none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="9 12 11.5 14.5 15.5 9.5" />
                        </svg>
                        <span x-text="$store.ui.t('contactSuccessMessage')"></span>
                    </div>

                    <form class="mt-6 grid gap-4" @submit.prevent="submitted = true" novalidate>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="field-group">
                                <label for="contact_name" class="field-label"
                                    x-text="$store.ui.t('contactFieldName')"></label>
                                <input id="contact_name" name="name" type="text" required autocomplete="name"
                                    class="field-input" :placeholder="$store.ui.t('contactFieldNamePlaceholder')" />
                            </div>
                            <div class="field-group">
                                <label for="contact_email" class="field-label"
                                    x-text="$store.ui.t('contactFieldEmail')"></label>
                                <input id="contact_email" name="email" type="email" required autocomplete="email"
                                    class="field-input" :placeholder="$store.ui.t('contactFieldEmailPlaceholder')" />
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="field-group">
                                <label for="contact_company" class="field-label"
                                    x-text="$store.ui.t('contactFieldCompany')"></label>
                                <input id="contact_company" name="company" type="text" required
                                    autocomplete="organization" class="field-input"
                                    :placeholder="$store.ui.t('contactFieldCompanyPlaceholder')" />
                            </div>
                            <div class="field-group">
                                <label for="contact_team_size" class="field-label"
                                    x-text="$store.ui.t('contactFieldTeamSize')"></label>
                                <select id="contact_team_size" name="team_size" class="field-select">
                                    <option value="" x-text="$store.ui.t('contactTeamSizeOption0')"></option>
                                    <option value="1-5" x-text="$store.ui.t('contactTeamSizeOption1')"></option>
                                    <option value="6-20" x-text="$store.ui.t('contactTeamSizeOption2')"></option>
                                    <option value="21-50" x-text="$store.ui.t('contactTeamSizeOption3')"></option>
                                    <option value="50+" x-text="$store.ui.t('contactTeamSizeOption4')"></option>
                                </select>
                            </div>
                        </div>

                        <div class="field-group">
                            <label for="contact_topic" class="field-label"
                                x-text="$store.ui.t('contactFieldTopic')"></label>
                            <select id="contact_topic" name="topic" required class="field-select">
                                <option value="" x-text="$store.ui.t('contactTopicOption0')"></option>
                                <option value="demo" x-text="$store.ui.t('contactTopicOption1')"></option>
                                <option value="migration" x-text="$store.ui.t('contactTopicOption2')"></option>
                                <option value="pricing" x-text="$store.ui.t('contactTopicOption3')"></option>
                                <option value="technical" x-text="$store.ui.t('contactTopicOption4')"></option>
                            </select>
                        </div>

                        <div class="field-group">
                            <label for="contact_message" class="field-label"
                                x-text="$store.ui.t('contactFieldMessage')"></label>
                            <textarea id="contact_message" name="message" rows="5" required class="field-textarea"
                                :placeholder="$store.ui.t('contactFieldMessagePlaceholder')"></textarea>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
                            <p class="text-xs" :class="$store.ui.darkMode ? 'text-white/50' : 'text-[#638c90]'"
                                x-text="$store.ui.t('contactResponseNote')">
                            </p>
                            <button type="submit" class="btn-submit">
                                <span x-text="$store.ui.t('contactSubmit')"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                    <polyline points="12 5 19 12 12 19" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="scroll-stagger space-y-4">
                    <div class="contact-card" :class="$store.ui.darkMode ? 'border-white/10 bg-white/5' : ''">
                        <div class="contact-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold"
                            :class="$store.ui.darkMode ? 'text-white' : 'text-[#17494D]'"
                            x-text="$store.ui.t('contactSalesTitle')"></h3>
                        <p class="mt-1.5 text-sm leading-relaxed"
                            :class="$store.ui.darkMode ? 'text-white/65' : 'text-[#567d81]'"
                            x-text="$store.ui.t('contactSalesBody')">
                        </p>
                        <a href="mailto:sales@interlink-system.test" class="contact-link"
                            :class="$store.ui.darkMode ? 'text-emerald-300 bg-emerald-300/10 hover:bg-emerald-300/20' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            sales@interlink-system.test
                        </a>
                    </div>

                    <div class="contact-card" :class="$store.ui.darkMode ? 'border-white/10 bg-white/5' : ''">
                        <div class="contact-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold"
                            :class="$store.ui.darkMode ? 'text-white' : 'text-[#17494D]'"
                            x-text="$store.ui.t('contactSupportTitle')"></h3>
                        <p class="mt-1.5 text-sm leading-relaxed"
                            :class="$store.ui.darkMode ? 'text-white/65' : 'text-[#567d81]'"
                            x-text="$store.ui.t('contactSupportBody')">
                        </p>
                        <a href="mailto:support@interlink-system.test" class="contact-link"
                            :class="$store.ui.darkMode ? 'text-emerald-300 bg-emerald-300/10 hover:bg-emerald-300/20' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            support@interlink-system.test
                        </a>
                    </div>

                    <div class="contact-card" :class="$store.ui.darkMode ? 'border-white/10 bg-white/5' : ''">
                        <div class="contact-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold"
                            :class="$store.ui.darkMode ? 'text-white' : 'text-[#17494D]'"
                            x-text="$store.ui.t('contactChecklistTitle')"></h3>
                        <ul class="mt-3 space-y-2.5">
                            <li class="checklist-item" x-text="$store.ui.t('contactChecklist1')"></li>
                            <li class="checklist-item" x-text="$store.ui.t('contactChecklist2')"></li>
                            <li class="checklist-item" x-text="$store.ui.t('contactChecklist3')"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>



        <section class="scroll-reveal relative w-full overflow-hidden border-b px-6 py-12 sm:py-14"
            :class="$store.ui.darkMode ? 'border-emerald-300/15 bg-black' : 'border-[#e2ecee] bg-[#f9fcfc]'"
            aria-label="{{ __('InterLink office locations') }}">
            <div class="pointer-events-none absolute inset-0"
                :class="$store.ui.darkMode
                    ? 'bg-[radial-gradient(circle_at_20%_20%,rgba(84,219,129,0.12),transparent_36%),radial-gradient(circle_at_88%_82%,rgba(39,176,95,0.18),transparent_40%)]'
                    : 'bg-[radial-gradient(circle_at_20%_20%,rgba(84,219,129,0.06),transparent_36%),radial-gradient(circle_at_88%_82%,rgba(39,176,95,0.08),transparent_40%)]'">
            </div>
            <div class="mx-auto max-w-7xl">
                <h2 class="text-center text-4xl font-semibold tracking-tight"
                    :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'"
                    x-text="$store.ui.t('contactOfficesTitle')">
                </h2>

                <div class="scroll-stagger mt-10 grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Global HQ - MAP') }}
                        </h3>
                        <p>{{ __('181 Market Street') }}</p>
                        <p>{{ __('San Francisco, CA 94105') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Australia - MAP') }}
                        </h3>
                        <p>{{ __('Level 13, 550 Bourke Street') }}</p>
                        <p>{{ __('Melbourne, Victoria 3000') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/au') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Brazil - MAP') }}
                        </h3>
                        <p>{{ __('Av. Paulista 920, 14th floor') }}</p>
                        <p>{{ __('Sao Paulo, SP 04583-110') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com.br') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Canada - MAP') }}
                        </h3>
                        <p>{{ __('385 Av. Viger O') }}</p>
                        <p>{{ __('Montreal, QC H2Z 1M9') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/ca') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Denmark - MAP') }}
                        </h3>
                        <p>{{ __('Njalsgade 72C, 2') }}</p>
                        <p>{{ __('2300 Kobenhavn S') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/dk') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('France - MAP') }}
                        </h3>
                        <p>{{ __('32 Rue de Trevise') }}</p>
                        <p>{{ __('75009 Paris') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.fr') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Germany - MAP') }}
                        </h3>
                        <p>{{ __('Paul-Lincke-Ufer 39/40, Hof 4') }}</p>
                        <p>{{ __('10999 Berlin') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.de') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('India, Bangalore - MAP') }}
                        </h3>
                        <p>{{ __('62/53 Church Street') }}</p>
                        <p>{{ __('Bengaluru, Karnataka 560001') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/in') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('India, Pune - MAP') }}
                        </h3>
                        <p>{{ __('North Main Road, Koregaon Park') }}</p>
                        <p>{{ __('Pune, Maharashtra 411001') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/in') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Ireland - MAP') }}
                        </h3>
                        <p>{{ __('55 Charlemont Place') }}</p>
                        <p>{{ __('Dublin D02 F985') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.ie') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Italy - MAP') }}
                        </h3>
                        <p>{{ __('Via San Marco 21') }}</p>
                        <p>{{ __('20121 Milano') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/it') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Japan - MAP') }}
                        </h3>
                        <p>{{ __('1-2-1 Kyobashi, Chuo City') }}</p>
                        <p>{{ __('Tokyo 104-0031') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.co.jp') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Mexico - MAP') }}
                        </h3>
                        <p>{{ __('Paseo de la Reforma 250') }}</p>
                        <p>{{ __('Cuauhtemoc, CDMX 06600') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/mx') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Netherlands - MAP') }}
                        </h3>
                        <p>{{ __('Herengracht 420') }}</p>
                        <p>{{ __('1017 BZ Amsterdam') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.nl') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Nigeria - MAP') }}
                        </h3>
                        <p>{{ __('15A Ozumba Mbadiwe Road') }}</p>
                        <p>{{ __('Victoria Island, Lagos') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/ng') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Norway - MAP') }}
                        </h3>
                        <p>{{ __('Dronning Eufemias gate 16') }}</p>
                        <p>{{ __('0191 Oslo') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.no') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Poland - MAP') }}
                        </h3>
                        <p>{{ __('Rondo Daszynskiego 1') }}</p>
                        <p>{{ __('00-843 Warsaw') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.pl') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Portugal - MAP') }}
                        </h3>
                        <p>{{ __('Av. da Liberdade 245') }}</p>
                        <p>{{ __('1250-143 Lisbon') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.pt') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Singapore - MAP') }}
                        </h3>
                        <p>{{ __('80 Robinson Road') }}</p>
                        <p>{{ __('Singapore 068898') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.com/sg') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('South Africa - MAP') }}
                        </h3>
                        <p>{{ __('11 Alice Lane') }}</p>
                        <p>{{ __('Sandton, Johannesburg 2196') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.co.za') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('South Korea - MAP') }}
                        </h3>
                        <p>{{ __('152 Teheran-ro, Gangnam-gu') }}</p>
                        <p>{{ __('Seoul 06236') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.kr') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('Spain - MAP') }}
                        </h3>
                        <p>{{ __('Paseo de la Castellana 95') }}</p>
                        <p>{{ __('28046 Madrid') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.es') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('UAE - MAP') }}
                        </h3>
                        <p>{{ __('Sheikh Zayed Road, Index Tower') }}</p>
                        <p>{{ __('Dubai, UAE') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.ae') }}</a>
                    </article>

                    <article class="office-card">
                        <h3 class="font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#0f2230]'">
                            {{ __('United Kingdom - MAP') }}
                        </h3>
                        <p>{{ __('1 Canada Square, Canary Wharf') }}</p>
                        <p>{{ __('London E14 5AB') }}</p>
                        <a href="#" class="office-map-link">{{ __('helpdesk.co.uk') }}</a>
                    </article>
                </div>
            </div>
        </section>

        <section class="scroll-reveal relative overflow-hidden px-6 py-14"
            :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'">
            <div class="pointer-events-none absolute inset-0"
                :class="$store.ui.darkMode
                    ? 'bg-[radial-gradient(circle_at_12%_10%,rgba(90,233,139,0.14),transparent_36%),radial-gradient(circle_at_82%_82%,rgba(48,188,106,0.18),transparent_42%)]'
                    : 'bg-[radial-gradient(circle_at_12%_10%,rgba(90,233,139,0.08),transparent_36%),radial-gradient(circle_at_82%_82%,rgba(48,188,106,0.10),transparent_42%)]'">
            </div>

            <div class="relative mx-auto max-w-7xl">
                <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                    <article class="card p-6 sm:p-8"
                        :class="$store.ui.darkMode ? 'border-emerald-300/20 bg-emerald-500/5' : ''">
                        <h2 class="text-2xl font-semibold"
                            :class="$store.ui.darkMode ? 'text-emerald-100' : 'text-[#17494D]'"
                            x-text="$store.ui.t('contactWhyTitle')">
                        </h2>
                        <p class="mt-4 text-sm leading-relaxed sm:text-base"
                            :class="$store.ui.darkMode ? 'text-emerald-50/80' : 'text-[#547d80]'"
                            x-text="$store.ui.t('contactWhyBody1')">
                        </p>
                        <p class="mt-4 text-sm leading-relaxed sm:text-base"
                            :class="$store.ui.darkMode ? 'text-emerald-50/80' : 'text-[#547d80]'"
                            x-text="$store.ui.t('contactWhyBody2')">
                        </p>
                    </article>

                    <div class="photo-grid scroll-stagger grid grid-cols-2 gap-4">
                        <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=900&q=80"
                            alt="{{ __('Customer success onboarding session') }}" class="" loading="lazy" />
                        <img src="https://images.unsplash.com/photo-1553484771-371a605b060b?auto=format&fit=crop&w=900&q=80"
                            alt="{{ __('Team support strategy workshop') }}" class="" loading="lazy" />
                        <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=900&q=80"
                            alt="{{ __('Customer operations meeting table') }}" class="" loading="lazy" />
                        <img src="https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?auto=format&fit=crop&w=900&q=80"
                            alt="{{ __('Live support dashboard review') }}" class="" loading="lazy" />
                    </div>
                </div>
            </div>
        </section>

        <section class="scroll-reveal px-6 pb-16" :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'">
            <div class="card mx-auto max-w-7xl p-6 sm:p-8"
                :class="$store.ui.darkMode ? 'border-emerald-300/20 bg-emerald-500/5' : ''">
                <h2 class="text-2xl font-semibold" :class="$store.ui.darkMode ? 'text-emerald-100' : 'text-[#17494D]'"
                    x-text="$store.ui.t('contactAfterTitle')">
                </h2>
                <div class="scroll-stagger mt-6 grid gap-5 md:grid-cols-3">
                    <article class="step-card" :class="$store.ui.darkMode ? 'border-emerald-300/20 bg-black/25' : ''">
                        <div class="step-number">01</div>
                        <h3 class="text-base font-semibold"
                            :class="$store.ui.darkMode ? 'text-emerald-100' : 'text-[#17494D]'"
                            x-text="$store.ui.t('contactAfter1Title')"></h3>
                        <p class="mt-2 text-sm leading-relaxed"
                            :class="$store.ui.darkMode ? 'text-emerald-50/75' : 'text-[#547d80]'"
                            x-text="$store.ui.t('contactAfter1Body')">
                        </p>
                    </article>
                    <article class="step-card" :class="$store.ui.darkMode ? 'border-emerald-300/20 bg-black/25' : ''">
                        <div class="step-number">02</div>
                        <h3 class="text-base font-semibold"
                            :class="$store.ui.darkMode ? 'text-emerald-100' : 'text-[#17494D]'"
                            x-text="$store.ui.t('contactAfter2Title')"></h3>
                        <p class="mt-2 text-sm leading-relaxed"
                            :class="$store.ui.darkMode ? 'text-emerald-50/75' : 'text-[#547d80]'"
                            x-text="$store.ui.t('contactAfter2Body')">
                        </p>
                    </article>
                    <article class="step-card" :class="$store.ui.darkMode ? 'border-emerald-300/20 bg-black/25' : ''">
                        <div class="step-number">03</div>
                        <h3 class="text-base font-semibold"
                            :class="$store.ui.darkMode ? 'text-emerald-100' : 'text-[#17494D]'"
                            x-text="$store.ui.t('contactAfter3Title')"></h3>
                        <p class="mt-2 text-sm leading-relaxed"
                            :class="$store.ui.darkMode ? 'text-emerald-50/75' : 'text-[#547d80]'"
                            x-text="$store.ui.t('contactAfter3Body')">
                        </p>
                    </article>
                </div>
            </div>
        </section>


    </main>

    <x-footer />


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            /* ── Scroll-reveal via IntersectionObserver ── */
            var revealEls = document.querySelectorAll('.scroll-reveal, .scroll-stagger');
            var revealObs = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) { entry.target.classList.add('is-visible'); }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
            revealEls.forEach(function (el) { revealObs.observe(el); });

            /* ── Typewriter on hero label ── */
            var tw = document.getElementById('contact-typewriter');
            if (tw) {
                var text = Alpine.store('ui').t('contactTypewriter');
                var i = 0;
                tw.classList.add('typing-cursor');
                (function type() {
                    if (i < text.length) {
                        tw.textContent += text.charAt(i);
                        i++;
                        setTimeout(type, 80);
                    } else {
                        tw.classList.remove('typing-cursor');
                    }
                })();
            }

            /* ── Floating particles in hero ── */
            var pb = document.getElementById('contact-hero-particles');
            if (pb) {
                for (var p = 0; p < 16; p++) {
                    var d = document.createElement('span');
                    d.className = 'particle';
                    var s = Math.random() * 5 + 3;
                    d.style.width = s + 'px';
                    d.style.height = s + 'px';
                    d.style.left = Math.random() * 100 + '%';
                    d.style.top = Math.random() * 100 + '%';
                    d.style.setProperty('--dur', (Math.random() * 6 + 4) + 's');
                    d.style.setProperty('--delay', (Math.random() * 5) + 's');
                    pb.appendChild(d);
                }
            }


        });
    </script>

    @livewireScripts
</body>

</html>