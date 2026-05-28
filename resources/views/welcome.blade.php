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


    {{-- ═══════════════════════════════════════════════════════════════════
    Jeor section in ladding page
    ═══════════════════════════════════════════════════════════════════ --}}

    <section class="relative mt-12 overflow-hidden bg-white">

        {{-- Background Grid Pattern --}}
        <div class="absolute inset-0 z-0"
            style="background-image: linear-gradient(to right, #e5e7eb 1px, transparent 1px), linear-gradient(to bottom, #e5e7eb 1px, transparent 1px); background-size: 40px 40px;">
        </div>
        {{-- Grid fade overlay --}}
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-white/60 via-transparent to-white/80"></div>

        {{-- Corner Dot Decorations --}}
        {{-- Top Left dots --}}
        <div class="absolute top-6 left-6 z-10 grid grid-cols-4 gap-1.5">
            @foreach(range(1, 20) as $dot)
                <div class="w-1 h-1 rounded-full bg-gray-300"></div>
            @endforeach
        </div>
        {{-- Top Right dots --}}
        <div class="absolute top-6 right-6 z-10 grid grid-cols-4 gap-1.5">
            @foreach(range(1, 20) as $dot)
                <div class="w-1 h-1 rounded-full bg-gray-300"></div>
            @endforeach
        </div>
        {{-- Bottom Left dots --}}
        <div class="absolute bottom-24 left-6 z-10 grid grid-cols-4 gap-1.5">
            @foreach(range(1, 20) as $dot)
                <div class="w-1 h-1 rounded-full bg-gray-300"></div>
            @endforeach
        </div>
        {{-- Bottom Right dots --}}
        <div class="absolute bottom-24 right-6 z-10 grid grid-cols-4 gap-1.5">
            @foreach(range(1, 20) as $dot)
                <div class="w-1 h-1 rounded-full bg-gray-300"></div>
            @endforeach
        </div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 pt-20 pb-5">

            {{-- Headline --}}
            <div class="text-center mb-5">
                <h1 class="text-5xl font-extrabold text-gray-900 leading-tight tracking-tight">
                    Accelerate Growth with AI
                    <span class="inline-flex items-center gap-1">
                        <span class="text-yellow-400">✦</span>
                        <span class="text-yellow-300 text-3xl">✦</span>
                    </span>
                    <br>
                    Sales &amp; Marketing Automation
                </h1>
            </div>

            {{-- Subheadline --}}
            <p class="text-center text-gray-500 text-sm max-w-xl mx-auto mb-8 leading-relaxed">
                Leading brands grow cost-efficiently with Zixflow. Manage entire customer journey with
                Next generation CRM and Interactions over Email, SMS, and WhatsApp.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex items-center justify-center gap-4 mb-12">
                <a href="#"
                    class="inline-flex items-center gap-2 bg-gray-900 hover:bg-gray-700 text-white text-sm font-semibold px-6 py-3 rounded-full transition-all duration-200 shadow-sm">
                    Try it free
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-900 text-sm font-semibold px-6 py-3 rounded-full border border-gray-300 transition-all duration-200 shadow-sm">
                    Book Demo
                </a>



            </div>




            {{-- Browser / Dashboard Mockup --}}
            <div class="relative mb-15 flex justify-center">

                {{-- Green background surface --}}
                <div
                    class="absolute bottom-0 right-0 w-2/3 h-2/3 bg-black  rounded-3xl blur-3xl -translate-y-8 translate-x-8">
                </div>

                {{-- Alternative: More solid green surface --}}
                <div
                    class="absolute -bottom-18 right-14 w-[90%] h-[100%] bg-black rounded-2xl -translate-y-12 translate-x-12">
                </div>

                {{-- Browser Window --}}
                <div
                    class="relative w-full max-w-5xl bg-white rounded-t-xl shadow-2xl border border-gray-200 overflow-hidden z-10">

                    {{-- Browser Top Bar --}}
                    {{-- (Your browser top bar content here if any) --}}

                    {{-- Empty image placeholder --}}
                    <img src="https://cdn.dribbble.com/users/623441/screenshots/3733726/attachments/838325/3_elements.png"
                        alt="Dashboard preview" class="w-full object-cover object-top block"
                        style="min-height: 480px; background-color: #f9fafb;" />

                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════════════
    As Featured In (Marquee)
    ═══════════════════════════════════════════════════════════════════ --}}
    <section class="w-full  overflow-hidden bg-[#ededed] py-14 px-0">
        <style>
            @keyframes marquee-scroll {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }

            .marquee-track {
                animation: marquee-scroll 28s linear infinite;
            }
        </style>

        <h2
            class="mx-auto mb-11 text-center font-[Poppins] text-[clamp(1.5rem,3vw,2rem)] font-extrabold tracking-[-0.2px] text-[#00b5ad]">
            As Featured In
        </h2>

        <div class="w-full overflow-hidden"
            style="-webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%); mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div class="marquee-track flex max-w-max items-center pointer-events-none select-none" id="marquee-track">

                <!-- SET A -->
                <div class="flex items-center gap-20 px-10 flex-shrink-0">
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="110" height="40" viewBox="0 0 110 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="0" y="0" width="34" height="40" rx="2" fill="#888" />
                            <rect x="38" y="0" width="34" height="40" rx="2" fill="#888" />
                            <rect x="76" y="0" width="34" height="40" rx="2" fill="#888" /><text x="17" y="27"
                                text-anchor="middle" font-family="Arial Black,sans-serif" font-size="20"
                                font-weight="900" fill="#fff">B</text><text x="55" y="27" text-anchor="middle"
                                font-family="Arial Black,sans-serif" font-size="20" font-weight="900"
                                fill="#fff">B</text><text x="93" y="27" text-anchor="middle"
                                font-family="Arial Black,sans-serif" font-size="20" font-weight="900"
                                fill="#fff">C</text>
                        </svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="160" height="44" viewBox="0 0 160 44" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="18" font-family="Georgia,serif"
                                font-size="13" font-weight="400" fill="#888">Business</text><text x="0" y="40"
                                font-family="Georgia,serif" font-size="26" font-weight="700" font-style="italic"
                                fill="#888">Leader</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="130" height="36" viewBox="0 0 130 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="28" font-family="Arial,sans-serif"
                                font-size="26" font-weight="400" fill="#888">edtech</text><text x="92" y="28"
                                font-family="Arial Black,sans-serif" font-size="28" font-weight="900"
                                fill="#888">X</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="120" height="36" viewBox="0 0 120 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="30" font-family="Georgia,serif"
                                font-size="34" font-weight="700" font-style="italic" fill="#888">Forbes</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="140" height="44" viewBox="0 0 140 44" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="0" y="0" width="44" height="44" rx="4" fill="#888" /><text x="22" y="18"
                                text-anchor="middle" font-family="Arial,sans-serif" font-size="9" font-weight="700"
                                fill="#fff">IHE</text>
                            <line x1="6" y1="22" x2="38" y2="22" stroke="#fff" stroke-width="1.5" /><text x="22" y="32"
                                text-anchor="middle" font-family="Arial,sans-serif" font-size="7.5" font-weight="400"
                                fill="#fff">Inside</text><text x="22" y="40" text-anchor="middle"
                                font-family="Arial,sans-serif" font-size="7.5" font-weight="400" fill="#fff">Higher
                                Ed</text><text x="58" y="20" font-family="Arial,sans-serif" font-size="13"
                                font-weight="700" fill="#888">Inside</text><text x="58" y="34"
                                font-family="Arial,sans-serif" font-size="13" font-weight="700" fill="#888">Higher
                                Ed</text>
                        </svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="160" height="36" viewBox="0 0 160 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="28" font-family="Georgia,serif"
                                font-size="26" font-weight="700" fill="#888">The Guardian</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="60" height="44" viewBox="0 0 60 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0" y="0" width="60" height="44" rx="4" fill="#888" /><text x="30" y="18"
                                text-anchor="middle" font-family="Arial,sans-serif" font-size="11" font-weight="900"
                                fill="#fff">Times</text><text x="30" y="29" text-anchor="middle"
                                font-family="Arial,sans-serif" font-size="8" font-weight="400"
                                fill="#fff">Higher</text><text x="30" y="39" text-anchor="middle"
                                font-family="Arial,sans-serif" font-size="8" font-weight="400"
                                fill="#fff">Education</text>
                        </svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="100" height="36" viewBox="0 0 100 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="30" font-family="Arial Black,sans-serif"
                                font-size="32" font-weight="900" fill="#888">CNBC</text></svg>
                    </div>
                </div>

                <!-- SET B (Duplicate for seamless loop) -->
                <div class="flex items-center gap-20 px-10 flex-shrink-0">
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="110" height="40" viewBox="0 0 110 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="0" y="0" width="34" height="40" rx="2" fill="#888" />
                            <rect x="38" y="0" width="34" height="40" rx="2" fill="#888" />
                            <rect x="76" y="0" width="34" height="40" rx="2" fill="#888" /><text x="17" y="27"
                                text-anchor="middle" font-family="Arial Black,sans-serif" font-size="20"
                                font-weight="900" fill="#fff">B</text><text x="55" y="27" text-anchor="middle"
                                font-family="Arial Black,sans-serif" font-size="20" font-weight="900"
                                fill="#fff">B</text><text x="93" y="27" text-anchor="middle"
                                font-family="Arial Black,sans-serif" font-size="20" font-weight="900"
                                fill="#fff">C</text>
                        </svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="160" height="44" viewBox="0 0 160 44" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="18" font-family="Georgia,serif"
                                font-size="13" font-weight="400" fill="#888">Business</text><text x="0" y="40"
                                font-family="Georgia,serif" font-size="26" font-weight="700" font-style="italic"
                                fill="#888">Leader</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="130" height="36" viewBox="0 0 130 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="28" font-family="Arial,sans-serif"
                                font-size="26" font-weight="400" fill="#888">edtech</text><text x="92" y="28"
                                font-family="Arial Black,sans-serif" font-size="28" font-weight="900"
                                fill="#888">X</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="120" height="36" viewBox="0 0 120 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="30" font-family="Georgia,serif"
                                font-size="34" font-weight="700" font-style="italic" fill="#888">Forbes</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="140" height="44" viewBox="0 0 140 44" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="0" y="0" width="44" height="44" rx="4" fill="#888" /><text x="22" y="18"
                                text-anchor="middle" font-family="Arial,sans-serif" font-size="9" font-weight="700"
                                fill="#fff">IHE</text>
                            <line x1="6" y1="22" x2="38" y2="22" stroke="#fff" stroke-width="1.5" /><text x="22" y="32"
                                text-anchor="middle" font-family="Arial,sans-serif" font-size="7.5" font-weight="400"
                                fill="#fff">Inside</text><text x="22" y="40" text-anchor="middle"
                                font-family="Arial,sans-serif" font-size="7.5" font-weight="400" fill="#fff">Higher
                                Ed</text><text x="58" y="20" font-family="Arial,sans-serif" font-size="13"
                                font-weight="700" fill="#888">Inside</text><text x="58" y="34"
                                font-family="Arial,sans-serif" font-size="13" font-weight="700" fill="#888">Higher
                                Ed</text>
                        </svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="160" height="36" viewBox="0 0 160 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="28" font-family="Georgia,serif"
                                font-size="26" font-weight="700" fill="#888">The Guardian</text></svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="60" height="44" viewBox="0 0 60 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0" y="0" width="60" height="44" rx="4" fill="#888" /><text x="30" y="18"
                                text-anchor="middle" font-family="Arial,sans-serif" font-size="11" font-weight="900"
                                fill="#fff">Times</text><text x="30" y="29" text-anchor="middle"
                                font-family="Arial,sans-serif" font-size="8" font-weight="400"
                                fill="#fff">Higher</text><text x="30" y="39" text-anchor="middle"
                                font-family="Arial,sans-serif" font-size="8" font-weight="400"
                                fill="#fff">Education</text>
                        </svg>
                    </div>
                    <div class="flex items-center justify-center flex-shrink-0 opacity-55 grayscale">
                        <svg width="100" height="36" viewBox="0 0 100 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg"><text x="0" y="30" font-family="Arial Black,sans-serif"
                                font-size="32" font-weight="900" fill="#888">CNBC</text></svg>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <section class="discover-section-wrapper"
        style="transform: scale(0.85); transform-origin: center top; background-color: white; margin-bottom: -12%;">

        {{-- ═══════════════════════════════════════════════════════════════════
        DISCOVER — Tabbed image showcase (Vanilla JS Version)
        ═══════════════════════════════════════════════════════════════════ --}}
        <section id="discoverSection" class="w-full px-6 py-20" style="background-color: white;">
            <div class="mx-auto flex w-full max-w-6xl flex-col items-center">

                {{-- Title --}}
                <h2 class="mb-4 text-center text-4xl font-bold leading-[1.1] tracking-tight sm:text-5xl lg:text-[3.75rem]"
                    style="color: #111827;">
                    Discover powerful features
                </h2>

                <p class="mb-12 max-w-3xl text-center text-base leading-relaxed sm:text-lg" style="color: #6B7280;">
                    Explore powerful workflows, ticket views, and reports built to help your team move faster with
                    confidence.
                </p>

                {{-- Tabs --}}
                <div class="mb-12 w-full max-w-5xl">
                    <div class="grid grid-cols-2 gap-2 md:grid-cols-4">
                        <button type="button" data-tab="ticketList"
                            class="tab-button group relative cursor-pointer rounded-xl px-4 py-3 text-sm font-medium transition-all duration-300 bg-gray-900 text-white shadow-[0_10px_24px_-14px_rgba(0,0,0,0.5)]">
                            Ticket List
                        </button>
                        <button type="button" data-tab="ticketView"
                            class="tab-button group relative cursor-pointer rounded-xl px-4 py-3 text-sm font-medium transition-all duration-300 text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                            Ticket View
                        </button>
                        <button type="button" data-tab="automations"
                            class="tab-button group relative cursor-pointer rounded-xl px-4 py-3 text-sm font-medium transition-all duration-300 text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                            <span class="inline-flex items-center gap-2">
                                Automations
                                <span id="automationNotification" class="relative inline-flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75 animate-ping"></span>
                                    <span
                                        class="relative inline-flex h-2.5 w-2.5 rounded-full bg-red-500 animate-pulse"></span>
                                </span>
                            </span>
                        </button>
                        <button type="button" data-tab="reports"
                            class="tab-button group relative cursor-pointer rounded-xl px-4 py-3 text-sm font-medium transition-all duration-300 text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                            Reports
                        </button>
                    </div>
                </div>

                {{-- Image container --}}
                <div class="m-0 w-full max-w-[1800px] p-0">
                    <img id="discoverImage" src="https://placehold.co/1200x800/dbeafe/1e40af?text=Ticket+View"
                        alt="Ticket View"
                        class="m-0 block h-auto w-full rounded-lg shadow-lg p-0 transition-opacity duration-500" />
                </div>

                {{-- CTA --}}
                <a href="#register"
                    class="mt-14 inline-flex items-center gap-2 rounded-xl px-10 py-3.5 text-base font-bold text-white transition-all duration-300 hover:-translate-y-0.5 hover:scale-[1.01] bg-red-600 hover:bg-red-500">
                    <span>Get Started Today</span>
                    <span aria-hidden="true">→</span>
                </a>
            </div>
        </section>

        <script>
            (function () {
                // Tab configuration
                const tabs = ['ticketList', 'ticketView', 'automations', 'reports'];
                const imageMap = {
                    ticketList: 'https://placehold.co/1200x800/e2e8f0/64748b?text=Ticket+List',
                    ticketView: 'https://placehold.co/1200x800/dbeafe/1e40af?text=Ticket+View',
                    automations: 'https://placehold.co/1200x800/d1fae5/065f46?text=Automations',
                    reports: 'https://placehold.co/1200x800/fef3c7/854d0e?text=Reports'
                };

                const altTextMap = {
                    ticketList: 'Ticket List View',
                    ticketView: 'Ticket Detail View',
                    automations: 'Automations Dashboard',
                    reports: 'Reports Analytics'
                };

                let currentTab = 'ticketView';
                let isTransitioning = false;

                // Get elements
                const imageElement = document.getElementById('discoverImage');
                const buttons = document.querySelectorAll('.tab-button');
                const automationNotification = document.getElementById('automationNotification');

                // Function to switch tabs
                function switchTab(tab) {
                    if (isTransitioning || currentTab === tab) return;

                    // Handle automation notification
                    if (tab === 'automations' && automationNotification) {
                        automationNotification.style.display = 'none';
                    }

                    isTransitioning = true;

                    // Fade out
                    imageElement.style.opacity = '0';

                    // Change image after fade out
                    setTimeout(() => {
                        currentTab = tab;
                        imageElement.src = imageMap[tab];
                        imageElement.alt = altTextMap[tab];

                        // Fade in
                        setTimeout(() => {
                            imageElement.style.opacity = '1';
                            setTimeout(() => {
                                isTransitioning = false;
                            }, 100);
                        }, 50);
                    }, 300);

                    // Update button styles
                    updateButtonStyles(tab);
                }

                // Update button active styles
                function updateButtonStyles(activeTab) {
                    buttons.forEach(button => {
                        const tabName = button.getAttribute('data-tab');
                        if (tabName === activeTab) {
                            button.classList.remove('text-gray-600', 'hover:bg-gray-100', 'hover:text-gray-900');
                            button.classList.add('bg-gray-900', 'text-white', 'shadow-[0_10px_24px_-14px_rgba(0,0,0,0.5)]');
                        } else {
                            button.classList.remove('bg-gray-900', 'text-white', 'shadow-[0_10px_24px_-14px_rgba(0,0,0,0.5)]');
                            button.classList.add('text-gray-600', 'hover:bg-gray-100', 'hover:text-gray-900');
                        }
                    });
                }

                // Add click event listeners
                buttons.forEach(button => {
                    button.addEventListener('click', () => {
                        const tabName = button.getAttribute('data-tab');
                        if (tabName) switchTab(tabName);
                    });
                });

                // Intersection Observer for reveal animation
                const section = document.getElementById('discoverSection');
                if (section) {
                    section.style.opacity = '0';
                    section.style.transform = 'translateY(2rem)';
                    section.style.filter = 'blur(4px)';
                    section.style.transition = 'opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1), filter 0.7s cubic-bezier(0.16, 1, 0.3, 1)';

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                section.style.opacity = '1';
                                section.style.transform = 'translateY(0)';
                                section.style.filter = 'blur(0)';
                                observer.unobserve(section);
                            }
                        });
                    }, { threshold: 0.1 });

                    observer.observe(section);
                }

                // Set initial image opacity
                if (imageElement) {
                    imageElement.style.opacity = '1';
                    imageElement.style.transition = 'opacity 0.3s ease-in-out';
                }
            })();
        </script>
    </section>



    <section class="bg-white py-20 px-6 overflow-hidden" style="font-family: 'Plus Jakarta Sans', sans-serif;">

        <div class="max-w-6xl mx-auto">

            {{-- Section Headline --}}
            <h2
                class="text-4xl md:text-5xl font-extrabold text-gray-900 text-center leading-tight tracking-tight mb-16  mx-auto">
                Propel your business forward<br>
                with Zixflow's Unified Workspace
            </h2>

            {{-- Two Column Layout --}}
            <div class="flex flex-col md:flex-row items-center gap-12 md:gap-16">

                {{-- Left: Text Content --}}
                <div class="flex-1 max-w-sm">

                    {{-- Badge --}}
                    <span
                        class="inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1 rounded-full mb-5">
                        CRM platform
                    </span>

                    {{-- Heading --}}
                    <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug mb-4">
                        One hub for all<br>relationships
                    </h3>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500 leading-relaxed mb-6">
                        Manage sales, recruiting, partnerships, fundraising, &amp; more.
                        Accelerate prospecting with LinkedIn Extension. Easily find and
                        validate emails. Streamline your deal pipeline workflow and
                        outreach efforts all from a single platform.
                    </p>

                    {{-- CTA Link --}}
                    <a href="#"
                        class="inline-flex items-center gap-1.5 text-sm font-semibold text-gray-900 hover:gap-3 transition-all duration-200">
                        Explore
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>

                </div>

                {{-- Right: Stacked Card with decorative backgrounds --}}
                <div class="flex-1 relative flex items-center justify-center">

                    {{-- Decorative layer: Orange surface (furthest back) --}}
                    <div class="absolute bg-orange-400 rounded-2xl z-0"
                        style="width: calc(100% - 24px); height: calc(100% - 1px); bottom: 20px; right: 60px;">
                    </div>

                    {{-- Decorative layer: Green surface (middle) --}}
                    <div class="absolute bg-emerald-400 rounded-2xl z-10"
                        style="width: calc(100% - 12px); height: calc(100% - 8px); bottom: 1px; right:30px;">
                    </div>

                    {{-- Main Card: Browser mockup shell --}}
                    <div class="relative z-20  ">

                        {{-- Browser Top Bar --}}
                        <div class="flex items-center gap-2 px-4 py-3 bg-[#000000] ">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#b6b5b5]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#444444]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#444444]"></span>
                        </div>

                        {{-- Empty image — fill later --}}
                        <img src="https://camo.githubusercontent.com/3d004ee15396cac40d9fe6575c9054ea6b741ed2769badccc1ef1376766530e9/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f637265617469766574696d5f6275636b65742f6769746875622f6769662f626c61636b2d64617368626f6172642e676966"
                            alt="CRM platform preview" class="w-full block object-cover object-top" />

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="bg-white py-20 px-6 overflow-hidden" style="font-family: 'Plus Jakarta Sans', sans-serif;">

        <div class="max-w-6xl mx-auto">



            {{-- Two Column Layout --}}
            <div class="flex flex-col md:flex-row items-center gap-12 md:gap-16">

                {{-- Left: Text Content --}}
                <div class="flex-1 max-w-sm">

                    {{-- Badge --}}
                    <span
                        class="inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1 rounded-full mb-5">
                        CRM platform
                    </span>

                    {{-- Heading --}}
                    <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug mb-4">
                        One hub for all<br>relationships
                    </h3>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500 leading-relaxed mb-6">
                        Manage sales, recruiting, partnerships, fundraising, &amp; more.
                        Accelerate prospecting with LinkedIn Extension. Easily find and
                        validate emails. Streamline your deal pipeline workflow and
                        outreach efforts all from a single platform.
                    </p>

                    {{-- CTA Link --}}
                    <a href="#"
                        class="inline-flex items-center gap-1.5 text-sm font-semibold text-gray-900 hover:gap-3 transition-all duration-200">
                        Explore
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>

                </div>

                {{-- Right: Stacked Card with decorative backgrounds --}}
                <div class="flex-1 relative flex items-center justify-center">

                    {{-- Decorative layer: Orange surface (furthest back) --}}
                    <div class="absolute bg-orange-400 rounded-2xl z-0"
                        style="width: calc(100% - 24px); height: calc(100% - 1px); bottom: 20px; right: 60px;">
                    </div>

                    {{-- Decorative layer: Green surface (middle) --}}
                    <div class="absolute bg-emerald-400 rounded-2xl z-10"
                        style="width: calc(100% - 12px); height: calc(100% - 8px); bottom: 1px; right:30px;">
                    </div>

                    {{-- Main Card: Browser mockup shell --}}
                    <div class="relative z-20  ">

                        {{-- Browser Top Bar --}}
                        <div class="flex items-center gap-2 px-4 py-3 bg-[#000000] ">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#b6b5b5]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#444444]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#444444]"></span>
                        </div>

                        {{-- Empty image — fill later --}}
                        <img src="https://camo.githubusercontent.com/3d004ee15396cac40d9fe6575c9054ea6b741ed2769badccc1ef1376766530e9/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f637265617469766574696d5f6275636b65742f6769746875622f6769662f626c61636b2d64617368626f6172642e676966"
                            alt="CRM platform preview" class="w-full block object-cover object-top" />

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="bg-white py-20 px-6 overflow-hidden" style="font-family: 'Plus Jakarta Sans', sans-serif;">

        <div class="max-w-6xl mx-auto">



            {{-- Two Column Layout --}}
            <div class="flex flex-col md:flex-row items-center gap-12 md:gap-16">

                {{-- Left: Text Content --}}
                <div class="flex-1 max-w-sm">

                    {{-- Badge --}}
                    <span
                        class="inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1 rounded-full mb-5">
                        CRM platform
                    </span>

                    {{-- Heading --}}
                    <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug mb-4">
                        One hub for all<br>relationships
                    </h3>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500 leading-relaxed mb-6">
                        Manage sales, recruiting, partnerships, fundraising, &amp; more.
                        Accelerate prospecting with LinkedIn Extension. Easily find and
                        validate emails. Streamline your deal pipeline workflow and
                        outreach efforts all from a single platform.
                    </p>

                    {{-- CTA Link --}}
                    <a href="#"
                        class="inline-flex items-center gap-1.5 text-sm font-semibold text-gray-900 hover:gap-3 transition-all duration-200">
                        Explore
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>

                </div>

                {{-- Right: Stacked Card with decorative backgrounds --}}
                <div class="flex-1 relative flex items-center justify-center">

                    {{-- Decorative layer: Orange surface (furthest back) --}}
                    <div class="absolute bg-orange-400 rounded-2xl z-0"
                        style="width: calc(100% - 24px); height: calc(100% - 1px); bottom: 20px; right: 60px;">
                    </div>

                    {{-- Decorative layer: Green surface (middle) --}}
                    <div class="absolute bg-emerald-400 rounded-2xl z-10"
                        style="width: calc(100% - 12px); height: calc(100% - 8px); bottom: 1px; right:30px;">
                    </div>

                    {{-- Main Card: Browser mockup shell --}}
                    <div class="relative z-20  ">

                        {{-- Browser Top Bar --}}
                        <div class="flex items-center gap-2 px-4 py-3 bg-[#000000] ">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#b6b5b5]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#444444]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#444444]"></span>
                        </div>

                        {{-- Empty image — fill later --}}
                        <img src="https://camo.githubusercontent.com/3d004ee15396cac40d9fe6575c9054ea6b741ed2769badccc1ef1376766530e9/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f637265617469766574696d5f6275636b65742f6769746875622f6769662f626c61636b2d64617368626f6172642e676966"
                            alt="CRM platform preview" class="w-full block object-cover object-top" />

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="bg-white py-20 px-6 overflow-hidden relative" style="font-family: 'Plus Jakarta Sans', sans-serif;">

        {{-- Decorative scattered shapes --}}
        <div
            class="absolute top-8 left-16 w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-b-[10px] border-b-orange-400 rotate-180">
        </div>
        <div class="absolute top-20 left-1/3 w-2.5 h-2.5 rounded-full bg-blue-500"></div>
        <div class="absolute top-14 right-1/4 w-3 h-3 bg-emerald-400 rotate-45"></div>
        <div
            class="absolute top-36 right-12 w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[9px] border-b-orange-400 rotate-180">
        </div>
        <div
            class="absolute bottom-1/3 right-6 w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[9px] border-b-blue-500 rotate-180">
        </div>

        <div class="max-w-5xl mx-auto">

            {{-- Section Headline --}}
            <h2
                class="text-4xl md:text-5xl font-extrabold text-gray-900 text-center leading-tight tracking-tight mb-16 mx-auto">
                Manage your entire process<br>

                and management
            </h2>

            {{-- Two Columns --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-14">

                {{-- Column 1: Source & Attract --}}
                <div class="flex flex-col">

                    {{-- Image Placeholder --}}
                    <div class="w-full rounded-2xl overflow-hidden mb-8 bg-gray-50" style="min-height: 300px;">
                        <img src="https://webimages.zixflow.com/sendflow_b0f9ce3ee5.webp"
                            alt="Source and attract candidates" class="w-full h-full object-cover block"
                            style="min-height: 300px; background-color: #f9fafb;" />
                    </div>

                    {{-- Label --}}
                    <span class="text-orange-500 text-xs font-bold uppercase tracking-widest mb-3">
                        Source &amp; Attract
                    </span>

                    {{-- Heading --}}
                    <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-snug mb-3">
                        Find and attract<br>candidates
                    </h3>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500 leading-relaxed mb-5 max-w-sm">
                        Fill your pipeline quickly with one-click job posting to 200+ sites, AI-powered sourcing,
                        employee referrals and more.
                    </p>

                    {{-- CTA --}}
                    <a href="#"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 uppercase tracking-wider hover:gap-3 transition-all duration-200">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>

                </div>

                {{-- Column 2: Evaluate & Collaborate --}}
                <div class="flex flex-col">

                    {{-- Image Placeholder --}}
                    <div class="w-full rounded-2xl overflow-hidden mb-8 bg-gray-50" style="min-height: 300px;">
                        <img src="https://webimages.zixflow.com/engage_45f5571a0b.webp" alt="Evaluate and collaborate"
                            class="w-full h-full object-cover block"
                            style="min-height: 300px; background-color: #f9fafb;" />
                    </div>

                    {{-- Label --}}
                    <span class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-3">
                        Evaluate &amp; Collaborate
                    </span>

                    {{-- Heading --}}
                    <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-snug mb-3">
                        Move the right<br>applicants forward
                    </h3>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500 leading-relaxed mb-5 max-w-sm">
                        Collaborate with hiring teams to evaluate applicants, gather feedback and decide who's best,
                        all in one recruiting system.
                    </p>

                    {{-- CTA --}}
                    <a href="#"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 uppercase tracking-wider hover:gap-3 transition-all duration-200">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>

                </div>

            </div>

        </div>

    </section>


    <section class="bg-white overflow-hidden relative" style="font-family: 'Plus Jakarta Sans', sans-serif;">

        {{-- ===================== --}}
        {{-- Scattered Decorations (white area, top) --}}
        {{-- ===================== --}}

        {{-- Green small triangle top center-left --}}
        <div class="absolute z-10" style="top: 28px; left: 38%;">
            <div class="w-0 h-0"
                style="border-left: 5px solid transparent; border-right: 5px solid transparent; border-bottom: 9px solid #4ade80;">
            </div>
        </div>

        {{-- Orange small dot top right area --}}
        <div class="absolute w-2.5 h-2.5 rounded-full bg-orange-400 z-10" style="top: 22px; right: 22%;"></div>

        {{-- Blue/teal diamond center-left white area --}}
        <div class="absolute w-5 h-5 bg-cyan-400 rotate-45 z-10" style="top: 70px; left: 36%;"></div>

        {{-- Teal small dot --}}
        <div class="absolute w-2 h-2 rounded-full bg-emerald-400 z-10" style="top: 110px; left: 41%;"></div>

        {{-- Dark navy triangle top right (inside wave) --}}
        <div class="absolute z-20" style="top: 55px; right: 6%;">
            <div class="w-0 h-0"
                style="border-left: 14px solid transparent; border-right: 14px solid transparent; border-bottom: 22px solid #1e2a4a;">
            </div>
        </div>

        {{-- Blue dot mid left --}}
        <div class="absolute w-3 h-3 rounded-full bg-blue-500 z-10" style="top: 38%; left: 10%;"></div>

        {{-- Teal tiny dot mid left --}}
        <div class="absolute w-2 h-2 rounded-full bg-teal-400 z-10" style="top: 48%; left: 8%;"></div>

        {{-- Yellow circle overlapping wave bottom --}}
        <div class="absolute w-7 h-7 rounded-full bg-yellow-400 z-30" style="top: 62%; left: 14%;"></div>

        {{-- ===================== --}}
        {{-- ADDITIONAL DECORATIONS --}}
        {{-- ===================== --}}

        {{-- Purple diamond top right --}}
        <div class="absolute w-4 h-4 bg-purple-500 rotate-12 z-10" style="top: 45px; right: 28%;"></div>

        {{-- Pink small circle --}}
        <div class="absolute w-1.5 h-1.5 rounded-full bg-pink-500 z-10" style="top: 95px; left: 32%;"></div>

        {{-- Indigo triangle --}}
        <div class="absolute z-10" style="top: 140px; left: 28%;">
            <div class="w-0 h-0"
                style="border-left: 8px solid transparent; border-right: 8px solid transparent; border-top: 12px solid #6366f1;">
            </div>
        </div>

        {{-- Red micro dot --}}
        <div class="absolute w-1 h-1 rounded-full bg-red-500 z-10" style="top: 165px; left: 45%;"></div>

        {{-- Orange diamond --}}
        <div class="absolute w-3 h-3 bg-orange-500 rotate-45 z-10" style="top: 190px; right: 15%;"></div>

        {{-- Cyan circle --}}
        <div class="absolute w-6 h-6 rounded-full bg-cyan-400 opacity-60 z-10" style="top: 55%; right: 12%;"></div>

        {{-- Lime green triangle --}}
        <div class="absolute z-10" style="bottom: 28%; right: 18%;">
            <div class="w-0 h-0"
                style="border-left: 6px solid transparent; border-right: 6px solid transparent; border-bottom: 10px solid #84cc16;">
            </div>
        </div>

        {{-- Amber dot --}}
        <div class="absolute w-2 h-2 rounded-full bg-amber-500 z-10" style="bottom: 35%; left: 5%;"></div>

        {{-- Sky blue square --}}
        <div class="absolute w-4 h-4 bg-sky-400 z-10" style="bottom: 20%; left: 12%;"></div>

        {{-- Violet tiny dot --}}
        <div class="absolute w-1.5 h-1.5 rounded-full bg-violet-600 z-10" style="bottom: 42%; right: 25%;"></div>

        {{-- ===================== --}}
        {{-- Dark Navy Wave Background --}}
        {{-- ===================== --}}
        <div class="relative w-full" style="min-height: 520px;">

            {{-- Top SVG Wave Shape --}}
            <div class="absolute inset-0 z-0 w-full h-full overflow-hidden">
                <svg viewBox="0 0 1000 520" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-full h-full">
                    <path d="M0,100 C150,180 350,20 550,70 C700,110 850,10 1000,0 L1000,520 L0,520 Z" fill="#1e2a4a" />
                </svg>
            </div>

            {{-- Bottom SVG Wave Shape --}}
            <div class="absolute -bottom-50 left-0 z-0 w-full overflow-hidden leading-none rotate-180">
                <svg viewBox="0 0 1000 520" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-full h-[250px]">
                    <path d="M0,100 C150,180 350,20 550,70 C700,110 850,10 1000,0 L1000,520 L0,520 Z" fill="#1e2a4a" />
                </svg>
            </div>

            {{-- ===================== --}}
            {{-- Decorations inside dark area --}}
            {{-- ===================== --}}

            {{-- White star shape top right --}}
            <div class="absolute z-10 text-white opacity-20" style="top: 15%; right: 8%;">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 1l2.5 6.5L19 9l-5 4.5 1.5 7L10 15l-5.5 3.5L6 13.5 1 9l6.5-1.5L10 1z" />
                </svg>
            </div>

            {{-- White small circle --}}
            <div class="absolute w-1.5 h-1.5 rounded-full bg-white opacity-30 z-10" style="top: 22%; left: 15%;">
            </div>

            {{-- White medium circle --}}
            <div class="absolute w-3 h-3 rounded-full bg-white opacity-20 z-10" style="top: 45%; right: 20%;"></div>

            {{-- White diamond --}}
            <div class="absolute w-4 h-4 bg-white opacity-15 rotate-45 z-10" style="bottom: 30%; left: 10%;"></div>

            {{-- White tiny dot --}}
            <div class="absolute w-1 h-1 rounded-full bg-white opacity-40 z-10" style="bottom: 18%; right: 32%;">
            </div>

            {{-- Dotted World Map (left side of dark area) --}}
            <div class="absolute z-10 opacity-25" style="top: 250px; left: 6%; width: 42%;">
                <img src="https://static.vecteezy.com/system/resources/previews/001/198/050/non_2x/dotted-world-map-png.png"
                    alt="Dotted World Map" class="w-full h-full brightness-0 invert">
            </div>

            {{-- Right Content: Headline + Stats --}}
            <div class="relative z-20 flex flex-col items-start justify-center h-full"
                style="padding: 180px 6% 80px 52%;">

                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-snug mb-4">
                    Where great companies<br>hire great people
                </h2>

                <p class="text-sm text-indigo-200 leading-relaxed mb-10 max-w-xs">
                    Since 2012, the world's best companies have depended on this platform to find and hire the
                    people they depend on.
                </p>

                {{-- Stats --}}
                <div class="flex flex-col gap-6">

                    {{-- 27,000 Companies --}}
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-full border-2 border-indigo-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-3xl font-extrabold text-white leading-none">27,000</div>
                            <div class="text-xs font-bold text-indigo-300 uppercase tracking-widest mt-0.5">
                                Companies</div>
                        </div>
                    </div>

                    {{-- 1,500,000 Hires --}}
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-full border-2 border-indigo-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-3xl font-extrabold text-white leading-none">1,500,000</div>
                            <div class="text-xs font-bold text-indigo-300 uppercase tracking-widest mt-0.5">Hires
                            </div>
                        </div>
                    </div>

                    {{-- 160,000,000 Candidates --}}
                    <div class="flex items-center mb-10 gap-4">
                        <div
                            class="w-10 h-10 rounded-full border-2 border-indigo-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-3xl font-extrabold text-white leading-none">160,000,000</div>
                            <div class="text-xs font-bold text-indigo-300 uppercase tracking-widest mt-0.5">
                                Candidates</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- ===================== --}}
        {{-- White Testimonial Card (overlaps wave bottom) --}}
        {{-- ===================== --}}
        <div class="relative z-30 mx-auto -mt-24 mb-0" style="max-width: 680px;">
            <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">

                {{-- Subtle dot grid background inside card --}}
                <div class="absolute inset-0 opacity-30 rounded-2xl pointer-events-none"
                    style="background-image: radial-gradient(circle, #cbd5e1 1px, transparent 1px); background-size: 20px 20px;">
                </div>

                {{-- ===================== --}}
                {{-- Decorations inside card --}}
                {{-- ===================== --}}

                {{-- Tiny green dot inside card --}}
                <div class="absolute w-1.5 h-1.5 rounded-full bg-emerald-400 z-20" style="top: 15px; right: 20px;">
                </div>

                {{-- Tiny blue dot inside card --}}
                <div class="absolute w-1 h-1 rounded-full bg-blue-500 z-20" style="top: 25px; left: 30px;"></div>

                {{-- Dots nav --}}
                <div class="relative z-10 flex items-center justify-center gap-2.5 pt-6 pb-5">
                    <div class="w-3 h-3 rounded-full border-2 border-cyan-500 bg-transparent"></div>
                    <div class="w-3 h-3 rounded-full border-2 border-gray-300 bg-transparent"></div>
                    <div class="w-3 h-3 rounded-full border-2 border-gray-300 bg-transparent"></div>
                </div>

                {{-- Card Body: 2 columns --}}
                <div class="relative z-10 flex flex-col md:flex-row gap-6 px-10 pb-8">

                    {{-- Left: Company stat --}}
                    <div class="md:w-2/5 flex items-center justify-center md:justify-start">
                        <p
                            class="text-2xl md:text-3xl font-extrabold text-indigo-900 leading-snug text-center md:text-left">
                            Navarro<br>reduces time to<br>hire by 50%
                        </p>
                    </div>

                    {{-- Divider --}}
                    <div class="hidden md:block w-px bg-gray-200 self-stretch mx-2"></div>

                    {{-- Right: Quote --}}
                    <div class="md:w-3/5 flex flex-col justify-between">
                        <p class="text-sm text-gray-700 leading-relaxed mb-5 italic">
                            "We've been filling positions a lot faster because our managers are now involved in the
                            hiring process. So far we've made 150 hires in 6 months and we've reduced our time to
                            hire from 50 days to 26."
                        </p>

                        {{-- Person --}}
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                                <img src="" alt="Jason Lesher" class="w-full h-full object-cover"
                                    style="background-color: #e5e7eb;" />
                            </div>
                            <div>
                                <div class="text-xs font-bold text-gray-900">Jason Lesher</div>
                                <div class="text-xs text-gray-500">VP of Talent Acquisition, Navarro</div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- See More Link --}}
                <div class="relative z-10 border-t border-gray-100 px-10 py-4 flex justify-center">
                    <a href="#"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-cyan-600 uppercase tracking-widest hover:gap-3 transition-all duration-200">
                        See More Customer Stories
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                {{-- Logo Strip --}}
                <div
                    class="relative z-10 border-t border-gray-100 px-10 py-5 flex items-center justify-between gap-4 flex-wrap">
                    {{-- Square Enix --}}
                    <span class="text-xs font-extrabold text-gray-700 uppercase tracking-widest">Square Enix</span>
                    {{-- Lyst --}}
                    <span class="text-sm font-bold text-gray-700 uppercase tracking-wider">LYST</span>
                    {{-- Ryanair --}}
                    <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">✈ Ryanair</span>
                    {{-- Moodle --}}
                    <span class="text-sm font-bold text-orange-500 tracking-wide">moodle</span>
                    {{-- Dribbble --}}
                    <span class="text-sm font-bold text-pink-500 tracking-wide">dribbble</span>
                    {{-- Joey Restaurants --}}
                    <span class="text-xs font-bold text-gray-700 uppercase tracking-wide">Joey Restaurants</span>
                    {{-- Bevi --}}
                    <div class="flex items-center gap-1">
                        <div class="w-4 h-4 rounded-full bg-blue-500 flex items-center justify-center">
                            <div class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <span class="text-sm font-bold text-blue-600 tracking-wide">bevi</span>
                    </div>
                </div>

            </div>
        </div>

        {{-- ===================== --}}
        {{-- Bottom white area decorations --}}
        {{-- ===================== --}}

        {{-- Gray circle bottom left --}}
        <div class="absolute w-5 h-5 rounded-full bg-gray-300 opacity-50 z-10" style="bottom: 30px; left: 5%;">
        </div>

        {{-- Dark gray dot --}}
        <div class="absolute w-2 h-2 rounded-full bg-gray-400 z-10" style="bottom: 60px; right: 8%;"></div>

        {{-- Light gray diamond --}}
        <div class="absolute w-3 h-3 bg-gray-300 rotate-45 z-10" style="bottom: 100px; left: 15%;"></div>

        {{-- Bottom white spacing --}}
        <div class="h-16 bg-white"></div>

    </section>


    <section class="bg-white py-20 px-6" style="font-family: 'Plus Jakarta Sans', sans-serif;">

        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row gap-16 items-start">

                {{-- ===================== --}}
                {{-- Left: Text Content --}}
                {{-- ===================== --}}
                <div class="flex-1 max-w-lg">

                    {{-- Main Heading --}}
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                        Our take on HR software
                    </h2>

                    {{-- Intro --}}
                    <p class="text-sm text-gray-600 leading-relaxed mb-6">
                        At Workable, we believe HR software should work for you, not against you.
                    </p>

                    <p class="text-xs text-gray-500 mb-8">Here's what that means to us:</p>

                    {{-- Points --}}
                    <div class="flex flex-col gap-8">

                        {{-- 1 --}}
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-2">No smoke and mirrors</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Most HR software vendors hide their pricing.
                                <a href="#" class="text-teal-600 hover:underline">We don't. It's right there on our
                                    website.</a>
                                Our trial isn't a neutered demo — it's our full product. We figure if we're not
                                willing to be upfront before you buy, why would you trust us after?
                            </p>
                        </div>

                        {{-- 2 --}}
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-2">Simplicity isn't simple</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Our software feels easy because we've done the hard work. Under the hood, it's
                                complex and powerful. But you don't need to know that. You just need to know it
                                works.
                                <a href="#" class="text-teal-600 hover:underline">We use great design and AI to hide
                                    the complexity, not to dumb things down.</a>
                            </p>
                        </div>

                        {{-- 3 --}}
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-2">Software shouldn't be a second job</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                You've got enough on your plate. Your HR software shouldn't add to it. We've made
                                sure our platform plugs into your existing tools, comes with expert support, and
                                doesn't require a PhD to implement.
                                <a href="#" class="text-teal-600 hover:underline">Because your job is to run your
                                    business, not to become an expert in our software.</a>
                            </p>
                        </div>

                        {{-- 4 --}}
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-2">AI isn't the future, it's now</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                We're not just slapping an AI chatbot onto old software and calling it a day. We're
                                baking AI into every part of our platform. It's there when you need it, doing the
                                heavy lifting in the background.
                                <a href="#" class="text-teal-600 hover:underline">As AI evolves, so will our
                                    platform.</a>
                                We're committed to keeping you at the forefront of what's possible.
                            </p>
                        </div>

                        {{-- 5 --}}
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-2">We solve real problems</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Most HR software is full of features you'll never use. We focus on the stuff that
                                actually moves the needle. More candidates. Less busywork. Real productivity gains.
                                We're not here to give you a thousand buttons to push.
                                <a href="#" class="text-teal-600 hover:underline">We're here to solve your biggest
                                    HR headaches.</a>
                                The rest is just noise.
                            </p>
                        </div>

                    </div>
                </div>

                {{-- ===================== --}}
                {{-- Right: Image --}}
                {{-- ===================== --}}
                <div class="w-full md:w-[340px] flex-shrink-0 sticky top-10 self-start">
                    <img src="https://www.workable.com/static/images/home/letter/our-take_2x.webp?v=82beb40de575443c46bfb1ad9bfd026e"
                        alt="Our take on HR software illustration" class="w-full h-auto rounded-2xl object-cover" />
                </div>

            </div>
        </div>

    </section>


    <section class="relative bg-[#0d0d0f] overflow-hidden py-16 px-8 md:px-16 w-full"
        style="font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; border-radius: 0;">

        {{-- ===================== --}}
        {{-- Grid Decorations --}}
        {{-- ===================== --}}

        {{-- Large background grid pattern --}}
        <div class="absolute inset-0 z-0 opacity-20" style="background-image: 
        linear-gradient(to right, #374151 1px, transparent 1px),
        linear-gradient(to bottom, #374151 1px, transparent 1px);
        background-size: 40px 40px;">
        </div>

        {{-- Dot grid decoration top-left --}}
        <div class="absolute top-5 left-8 grid gap-2.5 z-10" style="grid-template-columns: repeat(6, 1fr);">
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
        </div>

        {{-- Dot grid decoration bottom-left --}}
        <div class="absolute bottom-5 left-8 grid gap-2.5 z-10" style="grid-template-columns: repeat(6, 1fr);">
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-60"></div>
        </div>

        {{-- Dot grid decoration top-right --}}
        <div class="absolute top-5 right-8 grid gap-2.5 z-10" style="grid-template-columns: repeat(6, 1fr);">
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
        </div>

        {{-- Dot grid decoration bottom-right --}}
        <div class="absolute bottom-5 right-8 grid gap-2.5 z-10" style="grid-template-columns: repeat(6, 1fr);">
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
        </div>

        {{-- ===================== --}}
        {{-- Additional Decorations --}}
        {{-- ===================== --}}

        {{-- Glowing orb top right --}}
        <div class="absolute top-20 right-20 w-64 h-64 bg-indigo-500 rounded-full opacity-10 blur-3xl z-0"></div>

        {{-- Glowing orb bottom left --}}
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-purple-500 rounded-full opacity-10 blur-3xl z-0"></div>

        {{-- Small diamond shapes --}}
        <div class="absolute top-32 right-32 w-2 h-2 bg-indigo-400 rotate-45 z-10"></div>
        <div class="absolute bottom-32 left-32 w-3 h-3 bg-purple-400 rotate-45 z-10"></div>
        <div class="absolute top-1/2 right-48 w-1.5 h-1.5 bg-cyan-400 rotate-45 z-10"></div>
        <div class="absolute bottom-1/3 left-40 w-2 h-2 bg-pink-400 rotate-45 z-10"></div>

        {{-- Small circles --}}
        <div class="absolute top-40 right-64 w-1 h-1 rounded-full bg-cyan-400 z-10"></div>
        <div class="absolute bottom-40 left-56 w-1.5 h-1.5 rounded-full bg-yellow-400 z-10"></div>
        <div class="absolute top-1/3 right-28 w-2 h-2 rounded-full bg-emerald-400 z-10"></div>
        <div class="absolute bottom-1/4 left-20 w-1 h-1 rounded-full bg-red-400 z-10"></div>

        {{-- Cross/plus shapes --}}
        <div class="absolute top-48 right-16 text-indigo-400 opacity-40 z-10" style="font-size: 12px;">+</div>
        <div class="absolute bottom-48 left-12 text-purple-400 opacity-40 z-10" style="font-size: 10px;">+</div>
        <div class="absolute top-1/2 right-72 text-cyan-400 opacity-30 z-10" style="font-size: 8px;">+</div>

        {{-- Small stars --}}
        <div class="absolute top-24 right-1/4 text-white opacity-20 z-10" style="font-size: 20px;">★</div>
        <div class="absolute bottom-28 left-1/3 text-white opacity-15 z-10" style="font-size: 16px;">★</div>

        {{-- Lines --}}
        <div class="absolute top-60 right-20 w-16 h-px bg-gradient-to-r from-transparent to-indigo-500 opacity-30 z-10">
        </div>
        <div
            class="absolute bottom-40 left-24 w-24 h-px bg-gradient-to-l from-transparent to-purple-500 opacity-30 z-10">
        </div>

        {{-- Content --}}
        <div class="relative z-20 flex flex-col md:flex-row items-center justify-between gap-10 max-w-5xl mx-auto">

            {{-- Headline --}}
            <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight tracking-tight">
                <span class="inline-block bg-indigo-300/30 text-indigo-200 px-2 py-0.5 rounded-md mr-2">Zixflow</span>is
                the only<br>
                platform you'll ever<br>
                need
            </h2>

            {{-- Buttons --}}
            <div class="flex items-center gap-4 flex-shrink-0">
                <a href="#"
                    class="inline-flex items-center gap-2 bg-white hover:bg-gray-100 text-gray-900 text-sm font-bold px-7 py-4 rounded-xl transition-all duration-200 shadow-lg whitespace-nowrap">
                    Get started
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex items-center gap-2 bg-transparent hover:bg-white/10 text-white text-sm font-bold px-7 py-4 rounded-xl border border-gray-600 hover:border-gray-400 transition-all duration-200 whitespace-nowrap">
                    Book a demo
                </a>
            </div>

        </div>

    </section>


    <x-footer />

</body>

</html>