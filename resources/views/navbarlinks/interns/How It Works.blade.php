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

    <x-nav-bar blueBg :value="true" />

    <x-loading-overlay />

    {{-- ═══════════════════════════════════════════════════════════════════
    HERO
    ═══════════════════════════════════════════════════════════════════ --}}
    <section id="hero-section" class="relative z-0 overflow-hidden bg-no-repeat bg-cover bg-center h-90 mt-12" style="opacity: 1;  
    background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/our-story-header.png');
         background-size: 100% auto;">

        <div class="mx-auto w-full max-w-[1100px] px-4 md:px-8">
            <!-- Logo Image on Top -->
            <div class="mb-8 flex justify-center mt-5 ">
                <img src="{{ asset('images/Logos/logo-orange.png') }}" alt="Logo"
                    class="h-auto w-20 md:w-40 lg:w-28 object-contain">
            </div>

            <div class="animate-[fadeUp_0.65s_ease_both] text-center">
                <h1
                    class="max-w-4xl mx-auto font-[Poppins] text-[clamp(1.6rem,3vw,2.4rem)] font-extrabold leading-[1.5] tracking-[-0.03em] text-[#ffffff]">
                    How Virtual Internships Work

                </h1>

                <p class="mt-4 mx-auto max-w-md font-[Nunito] text-base font-semibold text-[#ffffff]">
                    Access thousands of talent-seeking companies
                    worldwide for an internship placement that suits yo </p>

                <div class="mt-7 flex flex-wrap mb-6 items-center justify-center gap-3">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">

                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════════
    Leverage Remote Interns
    ═══════════════════════════════════════════════════════════════════ --}}
    <section class="w-full flex items-center justify-center py-16 px-8 bg-[#f4f4f4] font-[Poppins]" style=" opacity: 1; background-image:
        url('https://www.virtualinternships.com/wp-content/uploads/2023/04/Group-137-1.png'); background-size: 100%
        auto; background-position: center;"">
        <div class=" w-full max-w-[1100px] grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-14 items-center">

        <!-- LEFT -->
        <div class="left">
            <h2 class="text-[clamp(1.6rem,3vw,2.2rem)] font-extrabold text-[#1e1e1e] leading-[1.2] mb-9 tracking-tight">
                Why Choose a<br>
                <span class="text-[#00b1aa]">Virtual Internship?</span>

            </h2>

            <div class="flex flex-col gap-7">
                <div class="grid grid-cols-[44px_1fr] gap-x-3.5 items-start">
                    <div
                        class="w-10 h-10 border-2 border-[#00b5ad] rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                        <svg viewBox="0 0 24 24"
                            class="w-5 h-5 stroke-[#00b5ad] fill-none stroke-[1.8px] stroke-linecap-round stroke-linejoin-round">
                            <rect x="2" y="4" width="20" height="13" rx="2" />
                            <path d="M0 20h24" />
                            <path d="M9 17v3M15 17v3" />
                        </svg>
                    </div>
                    <p class="text-[0.88rem] text-[#555] leading-[1.7]">
                        Gain real-world work experience in your chosen industry and region.
                    </p>
                </div>

                <div class="grid grid-cols-[44px_1fr] gap-x-3.5 items-start">
                    <div
                        class="w-10 h-10 border-2 border-[#00b5ad] rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                        <svg viewBox="0 0 24 24"
                            class="w-5 h-5 stroke-[#00b5ad] fill-none stroke-[1.8px] stroke-linecap-round stroke-linejoin-round">
                            <path d="M12 2a7 7 0 0 1 4 12.74V17a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2.26A7 7 0 0 1 12 2z" />
                            <path d="M9 21h6M10 18v1M14 18v1" />
                        </svg>
                    </div>
                    <p class="text-[0.88rem] text-[#555] leading-[1.7]">
                        Access expert coaching, support, and award-winning courses to enhance your skills and boost your
                        career prospects.
                    </p>
                </div>

                <div class="grid grid-cols-[44px_1fr] gap-x-3.5 items-start">
                    <div
                        class="w-10 h-10 border-2 border-[#00b5ad] rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                        <svg viewBox="0 0 24 24"
                            class="w-5 h-5 stroke-[#00b5ad] fill-none stroke-[1.8px] stroke-linecap-round stroke-linejoin-round">
                            <circle cx="12" cy="7" r="4" />
                            <path d="M5.5 21a7 7 0 0 1 13 0" />
                            <path d="M19 11c1.1 0 2 .9 2 2s-.9 2-2 2" />
                            <path d="M5 11c-1.1 0-2 .9-2 2s.9 2 2 2" />
                        </svg>
                    </div>
                    <p class="text-[0.88rem] text-[#555] leading-[1.7]">
                        Put your learning into practice with hands-on experience. College credit is also available.
                    </p>
                </div>

            </div>
        </div>

        <!-- RIGHT — Video -->
        <div class="relative w-full aspect-[4/3] rounded-[14px] overflow-hidden bg-black shadow-[0_16px_48px_rgba(0,0,0,0.2)] md:w-[110%] justify-self-center md:justify-self-start z-10"
            id="leverageVideoWrap">

            <!-- YouTube iframe -->
            <iframe id="leverageYtPlayer" class="absolute inset-0 w-full h-full border-none block"
                src="https://www.youtube.com/embed/dQw4w9WgXcQ?enablejsapi=1&rel=0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>

            <!-- Thumbnail overlay -->
            <div class="absolute inset-0 z-10 cursor-pointer overflow-hidden transition-opacity duration-400 ease-in-out group"
                id="leverageThumb" role="button" aria-label="Play video" tabindex="0">

                <!-- Thumbnail image -->
                <img class="w-full h-full object-cover block transition-all duration-400 ease-in-out bg-[#1a1a2e] group-hover:scale-105 group-hover:brightness-75"
                    src="https://i.ytimg.com/vi/2MqLtmikbwY/maxresdefault.jpg" alt="Video thumbnail"
                    id="leverageThumbImg" />

                <!-- Play button -->
                <div
                    class="absolute inset-0 flex items-center justify-center z-20 opacity-0 scale-90 transition-all duration-250 ease-in-out group-hover:opacity-100 group-hover:scale-100">
                    <div
                        class="w-[72px] h-[72px] rounded-full bg-[#444] flex items-center justify-center shadow-[0_8px_32px_rgba(0,0,0,0.35)] transition-all duration-200 group-hover:bg-white group-hover:scale-[1.08] [&>svg]:group-hover:fill-[#00b1aa]">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 fill-[#00b1aa] ml-1 transition-colors duration-200">
                            <polygon points="5,3 19,12 5,21" />
                        </svg>
                    </div>
                </div>

            </div>

        </div>

        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const thumb = document.getElementById('leverageThumb');
                const ytPlayer = document.getElementById('leverageYtPlayer');

                function startVideo() {
                    if (!thumb) return;
                    thumb.classList.add('opacity-0', 'pointer-events-none');

                    if (ytPlayer) {
                        const src = ytPlayer.src;
                        if (!src.includes('autoplay=1')) {
                            ytPlayer.src = src + '&autoplay=1';
                        }
                    }
                }

                if (thumb) {
                    thumb.addEventListener('click', startVideo);
                    thumb.addEventListener('keydown', e => {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            startVideo();
                        }
                    });
                }
            });
        </script>
    </section>



    <section class="relative w-full overflow-hidden bg-[#0c2c2c] pt-[70px] pb-[56px]">
        <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/light-bg-with-vector.jpg" alt=""
            class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0" />

        <div class="relative z-[2] text-center px-5 pb-12">
            <h1 class="text-[clamp(3.4rem,5vw,2.4rem)] font-extrabold text-[#444444] tracking-[-0.01em] mb-[14px]">
                Find Your Work Experience<br>
                <span class="text-[#00b1aa]">in Three Steps
                </span>
            </h1>

            <p class="section-sub mx-auto  max-w-2xl  text-sm text-[#7b7b7b] sm:text-base">
                It’s never been easier to gain global work experience that will give you an unbeatable advantage for
                your career.
            </p>
        </div>

        <div class="relative z-[2] w-full flex items-center justify-center">
            <div id="uniAnswerViewport" class="w-full max-w-[1200px] overflow-hidden ">
                <div id="uniAnswerTrack"
                    class="flex items-stretch justify-center gap-5 pt-[10px] pb-4 transition-transform duration-500 ease-[cubic-bezier(.4,0,.2,1)] will-change-transform">

                    {{-- Step 1 - Purple --}}
                    <div
                        class="feature-card flex-none w-[320px] h-[330px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.08)] bg-white p-[28px_24px_24px]">
                        <img src="https://prod-vi-wordpress.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2023/09/04045323/how-it-works-1.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover z-0" />

                        <div class="relative z-[1] flex flex-col gap-[18px]">

                            <div class="flex flex-col gap-2">
                                <p class="text-[30px] text font-extrabold text-center  text-[#7F77DD] leading-none">Step
                                    1</p>
                                <p class="text-[16px] text-center  text-gray-400 leading-[1.6]">Enroll now and complete
                                    the online
                                    application</p>
                            </div>
                        </div>
                    </div>

                    {{-- Step 2 - Pink --}}
                    <div
                        class="feature-card flex-none w-[320px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.08)] bg-white p-[28px_24px_24px]">
                        <img src="https://prod-vi-wordpress.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2023/09/04045320/how-it-works-3.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover z-0" />

                        <div class="relative z-[1] flex flex-col gap-[18px]">

                            <div class="flex flex-col gap-2">
                                <p class="text-[30px] text font-extrabold text-center  text-[#D4537E] leading-none">Step
                                    2</p>
                                <p class="text-[16px] text-center  text-gray-400 leading-[1.6]">Tell us what you're
                                    looking for so we
                                    can find the perfect match</p>
                            </div>
                        </div>
                    </div>

                    {{-- Step 3 - Amber --}}
                    <div
                        class="feature-card flex-none w-[320px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.08)] bg-white p-[28px_24px_24px]">
                        <img src="https://prod-vi-wordpress.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2023/09/04045327/how-it-works-2.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover z-0" />

                        <div class="relative z-[1] flex flex-col gap-[18px]">

                            <div class="flex flex-col gap-2">
                                <p class="text-[30px] text font-extrabold text-center  text-[#EF9F27] leading-none">Step
                                    3</p>
                                <p class="text-[16px] text-center  text-gray-400 leading-[1.6]">Start your Virtual
                                    Internship and
                                    gain a career advantage</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="uniAnswerDots" class="relative z-[2] flex justify-center gap-2 mt-7"></div>
    </section>

    <section class="mx-auto w-full max-w-[1100px] px-4 md:px-8 py-12">

        <h2 class="font-[Poppins] text-[clamp(1.3rem,2.5vw,1.8rem)] font-extrabold text-[#00b1aa] mb-8">
            Learn More About How Virtual Internships Work
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-10">

            {{-- Video 1 --}}
            <div class="flex flex-col gap-3">
                <div class="relative w-full overflow-hidden rounded-xl shadow-[0_8px_24px_rgba(0,0,0,0.12)]"
                    style="aspect-ratio:16/9; background:#000;">
                    <iframe src="https://www.youtube.com/embed/VIDEO_ID_1?enablejsapi=1&rel=0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen class="absolute inset-0 h-full w-full border-0"></iframe>
                    <div class="yt-thumb group absolute inset-0 z-10 cursor-pointer transition-opacity duration-500"
                        role="button" aria-label="Play video" tabindex="0">
                        <img src="https://i.ytimg.com/vi/0IUMZBwlmWA/maxresdefault.jpg"
                            alt="What is a Virtual Internship?"
                            class="absolute inset-0 h-full w-full object-cover brightness-100 transition-all duration-500 group-hover:scale-105 group-hover:brightness-75" />
                        <div
                            class="absolute inset-0 bg-black/20 transition-opacity duration-300 group-hover:bg-black/35">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-full bg-white/90 shadow-[0_8px_32px_rgba(0,0,0,0.35)] scale-75 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-[#00b1aa] ml-1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="5,3 19,12 5,21" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-[Poppins] text-sm font-bold text-[#00b1aa]">What is a Virtual Internship?</p>
                    <p class="mt-1 font-[Nunito] text-sm text-gray-400 leading-[1.6]">Find out everything you need to
                        know about how Virtual Internships work.</p>
                </div>
            </div>

            {{-- Video 2 --}}
            <div class="flex flex-col gap-3">
                <div class="relative w-full overflow-hidden rounded-xl shadow-[0_8px_24px_rgba(0,0,0,0.12)]"
                    style="aspect-ratio:16/9; background:#000;">
                    <iframe src="https://www.youtube.com/embed/VIDEO_ID_2?enablejsapi=1&rel=0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen class="absolute inset-0 h-full w-full border-0"></iframe>
                    <div class="yt-thumb group absolute inset-0 z-10 cursor-pointer transition-opacity duration-500"
                        role="button" aria-label="Play video" tabindex="0">
                        <img src="https://www.mindsumo.com/assets/partnerships_landing/virtual_internships/vi_banner-d6cf87e14bcd0f55db542a17b36214e53d805a0680f422c01eded1ff5a359f89.png"
                            alt="What's included in a Virtual Internship?"
                            class="absolute inset-0 h-full w-full object-cover brightness-100 transition-all duration-500 group-hover:scale-105 group-hover:brightness-75" />
                        <div
                            class="absolute inset-0 bg-black/20 transition-opacity duration-300 group-hover:bg-black/35">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-full bg-white/90 shadow-[0_8px_32px_rgba(0,0,0,0.35)] scale-75 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-[#00b1aa] ml-1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="5,3 19,12 5,21" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-[Poppins] text-sm font-bold text-[#00b1aa]">What's included in a Virtual Internship?
                    </p>
                    <p class="mt-1 font-[Nunito] text-sm text-gray-400 leading-[1.6]">Discover what you can expect to be
                        included in a Virtual Internship program.</p>
                </div>
            </div>

            {{-- Video 3 --}}
            <div class="flex flex-col gap-3">
                <div class="relative w-full overflow-hidden rounded-xl shadow-[0_8px_24px_rgba(0,0,0,0.12)]"
                    style="aspect-ratio:16/9; background:#000;">
                    <iframe src="https://www.youtube.com/embed/VIDEO_ID_3?enablejsapi=1&rel=0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen class="absolute inset-0 h-full w-full border-0"></iframe>
                    <div class="yt-thumb group absolute inset-0 z-10 cursor-pointer transition-opacity duration-500"
                        role="button" aria-label="Play video" tabindex="0">
                        <img src="https://www.virtualinternships.com/wp-content/uploads/2023/05/how-it-works-1.jpg"
                            alt="Why you should do a Virtual Internship"
                            class="absolute inset-0 h-full w-full object-cover brightness-100 transition-all duration-500 group-hover:scale-105 group-hover:brightness-75" />
                        <div
                            class="absolute inset-0 bg-black/20 transition-opacity duration-300 group-hover:bg-black/35">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-full bg-white/90 shadow-[0_8px_32px_rgba(0,0,0,0.35)] scale-75 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-[#00b1aa] ml-1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="5,3 19,12 5,21" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-[Poppins] text-sm font-bold text-[#00b1aa]">Why you should do a Virtual Internship
                    </p>
                    <p class="mt-1 font-[Nunito] text-sm text-gray-400 leading-[1.6]">Alumni from the Virtual
                        Internships program share their experiences and what it was like to do an internship remotely.
                    </p>
                </div>
            </div>

            {{-- Video 4 --}}
            <div class="flex flex-col gap-3">
                <div class="relative w-full overflow-hidden rounded-xl shadow-[0_8px_24px_rgba(0,0,0,0.12)]"
                    style="aspect-ratio:16/9; background:#000;">
                    <iframe src="https://www.youtube.com/embed/VIDEO_ID_4?enablejsapi=1&rel=0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen class="absolute inset-0 h-full w-full border-0"></iframe>
                    <div class="yt-thumb group absolute inset-0 z-10 cursor-pointer transition-opacity duration-500"
                        role="button" aria-label="Play video" tabindex="0">
                        <img src="https://i.ytimg.com/vi/151o3mv54ns/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBINkmE9TJBY8LKFwQPbx792vfgoQ"
                            alt="How to apply for a Virtual Internship"
                            class="absolute inset-0 h-full w-full object-cover brightness-100 transition-all duration-500 group-hover:scale-105 group-hover:brightness-75" />
                        <div
                            class="absolute inset-0 bg-black/20 transition-opacity duration-300 group-hover:bg-black/35">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-full bg-white/90 shadow-[0_8px_32px_rgba(0,0,0,0.35)] scale-75 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-[#00b1aa] ml-1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="5,3 19,12 5,21" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-[Poppins] text-sm font-bold text-[#00b1aa]">How to apply for a Virtual Internship</p>
                    <p class="mt-1 font-[Nunito] text-sm text-gray-400 leading-[1.6]">Find out how to apply for a
                        Virtual Internship and gain real-world work experience in a matter of a few steps.</p>
                </div>
            </div>

        </div>
        <script>
            document.querySelectorAll('.yt-thumb').forEach(function (thumb) {
                var iframe = thumb.closest('div[style]').querySelector('iframe');
                function startVideo() {
                    thumb.style.opacity = '0';
                    thumb.style.pointerEvents = 'none';
                    if (!iframe.src.includes('autoplay=1')) {
                        iframe.src += '&autoplay=1';
                    }
                }
                thumb.addEventListener('click', startVideo);
                thumb.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); startVideo(); }
                });
            });
        </script>

    </section>

    <section id="hero-section" class="relative z-0 pt-20 overflow-hidden bg-no-repeat bg-cover bg-center" style="opacity: 1; background-color : #ffffff; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/Frame-47.png'); 
    background-size: 100% auto; background-position: right;">
        <div
            class="mx-auto grid w-full max-w-[1100px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1 class="text-[clamp(2.4rem,2vw,5.4rem)] font-extrabold text-[#444444] tracking-[-0.01em] mb-[14px]">
                    Start Your Career Journey<br>
                    <span class="text-[#00b1aa]">with Virtual Internships!</span>
                </h1>

             

                <div class="mt-7 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        Enroll Now 
                    </a>

                </div>
            </div>

            <div class="animate-[fadeRight_0.7s_0.1s_ease_both]  translate-y-8 justify-self-center md:justify-self-end md:w-full md:max-w-[400px]"
                -mt-100 -mb-10>
                <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/vi-users.png"
                    alt="Student with laptop and headphones" class="h-auto w-full object-contain" />
            </div>
        </div>
    </section>


    <x-footer />

</body>

</html>