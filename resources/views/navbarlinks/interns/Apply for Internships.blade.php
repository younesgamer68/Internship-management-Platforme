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
    <style>
        [x-cloak] {
            display: none !important;
        }

        @keyframes gs-wiggle-loop {

            0%,
            100% {
                transform: rotate(0deg) scale(1);
            }

            20% {
                transform: rotate(-2.5deg) scale(1.02);
            }

            40% {
                transform: rotate(2.5deg) scale(1.03);
            }

            60% {
                transform: rotate(-1.5deg) scale(1.02);
            }

            80% {
                transform: rotate(1.5deg) scale(1.01);
            }
        }

        @keyframes gs-red-pulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.42), 0 0 0 6px rgba(220, 38, 38, 0.12);
                filter: saturate(1);
            }

            50% {
                box-shadow: 0 0 0 5px rgba(220, 38, 38, 0.12), 0 0 0 12px rgba(220, 38, 38, 0.06);
                filter: saturate(1.12);
            }
        }



        /* Converted to Tailwind — removed long-form CSS for solution section.
           Styles are applied via utility classes directly in the markup. */
    </style>
</head>

<body x-data
    class="welcome-body flex min-h-screen flex-col bg-[#ffffff] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black text-white' : 'bg-[#ffffff] text-[#17494D]'">

    <!-- Navigation -->
    <x-nav-bar />
    <x-loading-overlay />

    {{-- ═══════════════════════════════════════════════════════════════════
    HERO
    ═══════════════════════════════════════════════════════════════════ --}}
    <section id="hero-section" class="relative z-0 mt-15 overflow-hidden bg-no-repeat bg-cover bg-center" style="opacity: 1; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2025/06/Virtual-Internships-Hero-BG.png.webp'); 
    background-size: 50% auto; background-position: right;">
        <div
            class="mx-auto grid w-full max-w-[1100px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1
                    class="max-w-4xl font-[Poppins] text-[clamp(1.6rem,3vw,2.4rem)] font-extrabold leading-[1.5] tracking-[-0.03em] text-[#444444]">
                    Give Yourself an<br>
                    <span class="text-[#00b1aa]">Unbeatable Advantage</span>

                </h1>
                <p class="mt-4 font-[Nunito] text-base font-semibold text-[#7a7a7a]">
                    The only platform that guarantees real-world work experience across the globe
                </p>

                <div class="mt-7 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                            aria-hidden="true">
                            <path
                                d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-10-2h4v2h-4V5Zm10 15H4V9h16v11Z" />
                        </svg>
                        Enroll Now
                    </a>

                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg border-2 border-[#d8d8d8] bg-transparent px-4 py-2.5 text-xs font-[Poppins] font-semibold text-[#444444] transition duration-200 hover:-translate-y-0.5 hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"
                            aria-hidden="true">
                            <path d="M2 9l10-5 10 5-10 5-10-5z" />
                            <path d="M6 11v4c0 1.5 2.7 3 6 3s6-1.5 6-3v-4" />
                            <path d="M22 9v6" />
                        </svg>
                        How It Works
                    </a>

                </div>
            </div>

            <div
                class="animate-[fadeRight_0.7s_0.1s_ease_both] justify-self-center md:justify-self-end md:w-full md:max-w-[400px]">
                <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/inturn-header.png"
                    alt="Student with laptop and headphones" class="h-auto w-full object-contain" />
            </div>
        </div>
    </section>




    {{-- ═══════════════════════════════════════════════════════════════════
    The Future —
    ═══════════════════════════════════════════════════════════════════ --}}

    <section
        class="future-section relative flex items-center justify-center overflow-hidden bg-[#01383a] px-6 py-[100px] md:py-[92px]">
        <div
            class="yellow-wave pointer-events-none absolute right-0 top-0 h-[260px] w-[430px] max-xl:h-[200px] max-xl:w-[330px] max-md:h-[140px] max-md:w-[220px]">
            <svg viewBox="0 0 500 300" preserveAspectRatio="none" class="h-full w-full">
                <path fill="#f0c34e"
                    d="M0,0 C40,120 140,140 240,120 C320,105 340,90 390,150 C430,200 460,240 500,260 L500,0 Z">
                </path>
            </svg>
        </div>

        <div
            class="yellow-wave yellow-wave--left pointer-events-none absolute left-0 top-[130px] h-[260px] w-[430px] rotate-180 max-md:h-[140px] max-md:w-[220px]">
            <svg viewBox="0 0 500 300" preserveAspectRatio="none" class="h-full w-full">
                <path fill="#00b1aa"
                    d="M0,0 C40,120 140,140 240,120 C320,105 340,90 390,150 C430,200 460,240 500,260 L500,0 Z">
                </path>
            </svg>
        </div>

        <div class="future-content relative z-10 mx-auto max-w-[900px] text-center">
            <h2
                class="future-title mb-5 font-[Poppins] text-[clamp(1.5rem,3vw,3rem)] font-extrabold leading-[1.18] tracking-[-1.6px] text-white md:mb-[2px]">
                The Reality of Starting Your <br>Career
            </h2>

            <p
                class="future-text mx-auto max-w-[820px] font-[Poppins] text-[clamp(0.82rem,1.4vw,1.15rem)] font-medium leading-[1.7] text-white/92">
                The need for work experience is essential, but getting a job can be tough. You need experience, but to
                gain experience, you need a job. Internships are competitive, with 80% of employers considering it a
                critical factor for recent graduates. So, what do you do?
            </p>
        </div>
    </section>

    <section class="relative w-full overflow-hidden bg-[#0c2c2c] pt-[70px] pb-[56px]">
        <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/light-bg-with-vector.jpg" alt=""
            class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0" />

        <div class="relative z-[2] text-center px-5 pb-12">
            <h2 class="text-[clamp(2.4rem,4vw,2.4rem)] font-extrabold text-[#444444] tracking-[-0.01em] mb-[14px]">
                The Answer?
                <span class="text-[#00b1aa]">Virtual Internships</span>
            </h2>
            <p class="mt-4 font-[Nunito] text-base font-semibold text-[#7a7a7a]">
                Find global work experience in any field or region with Virtual Internships, the <b>No. 1 platform</b>
                for remote internships. </p>
        </div>

        <div class="relative z-[2] w-full flex items-center">
            <button id="uniAnswerPrevBtn" aria-label="Previous"
                class="absolute left-[14px] top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full border border-white/30 bg-white/10 text-white text-2xl leading-none flex items-center justify-center backdrop-blur-sm transition hover:bg-white/20 hover:border-white/60 active:scale-95 select-none">
                &#8249;
            </button>

            <div id="uniAnswerViewport" class="w-full overflow-visible cursor-grab">
                <div id="uniAnswerTrack"
                    class="flex items-stretch gap-5 pt-[10px] pb-4 transition-transform duration-500 ease-[cubic-bezier(.4,0,.2,1)] will-change-transform">


                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Coaching & Support</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">You will be supported by a
                                team of expert coaches to guide you towards career success.</p>
                        </div>
                    </div>
                    <!-- Card 1 - Complete Flexibility -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Complete Flexibility</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">You have your start date,
                                internship length and weekly commitment of hours.</p>
                        </div>
                    </div>

                    <!-- Card 2 - Guaranteed Placement -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Guaranteed Placement</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">No matter your degree,
                                location, or experience – we'll find you the right internship.</p>
                        </div>
                    </div>

                    <!-- Card 3 - Real Experience -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Real Experience</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">Work remotely with one of
                                13,000 companies looking for ambitious talent like you.</p>
                        </div>
                    </div>

                    <!-- Card 4 - Coaching & Support -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Coaching & Support</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">You will be supported by a
                                team of expert coaches to guide you towards career success.</p>
                        </div>
                    </div>

                    <!-- Card 5 - Award-Winning Courses -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Award-Winning Courses</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">Complement your internship
                                with access to courses to build the skills that will set you apart.</p>
                        </div>
                    </div>

                    <!-- Card 6 - Save -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Save</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">Tell us what remote
                                internship you're looking for and save your preferences.</p>
                        </div>
                    </div>

                    <!-- Card 7 - Global Network (additional from context) -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Global Network</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">Connect with ambitious
                                talent and companies from around the world.</p>
                        </div>
                    </div>

                    <!-- Card 8 - Career Acceleration -->
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_32px_rgba(0,0,0,.10)] bg-white">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/box-bg.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[40px] z-0" />
                        <div
                            class="relative z-[1] h-full p-[50px_24px] flex flex-col items-center justify-center gap-2.5 text-center">
                            <h3 class="text-[1.3rem] font-bold text-[#0bbfaa] leading-[1.3]">Career Acceleration</h3>
                            <p class="text-[0.95rem] text-gray-500 leading-[1.7] font-normal">Build real-world skills
                                and experience that will fast-track your career goals.</p>
                        </div>
                    </div>




                </div>
            </div>

            <button id="uniAnswerNextBtn" aria-label="Next"
                class="absolute right-[14px] top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full border border-white/30 bg-white/10 text-white text-2xl leading-none flex items-center justify-center backdrop-blur-sm transition hover:bg-white/20 hover:border-white/60 active:scale-95 select-none">
                &#8250;
            </button>
        </div>

        <div id="uniAnswerDots" class="relative z-[2] flex justify-center gap-2 mt-7"></div>

        <script>
            (function () {
                const track = document.getElementById('uniAnswerTrack');
                const viewport = document.getElementById('uniAnswerViewport');
                const prevBtn = document.getElementById('uniAnswerPrevBtn');
                const nextBtn = document.getElementById('uniAnswerNextBtn');
                const dotsRow = document.getElementById('uniAnswerDots');

                if (!track || !viewport || !prevBtn || !nextBtn || !dotsRow) return;

                const GAP = 20;
                const CARD_W = 260;
                const C = 4;
                const DOT_COUNT = 3;

                const realCards = [...track.querySelectorAll('.feature-card')];
                const N = realCards.length;
                if (!N) return;

                [...realCards].slice(-C).reverse().forEach(card => {
                    track.insertBefore(card.cloneNode(true), track.firstChild);
                });
                [...realCards].slice(0, C).forEach(card => {
                    track.appendChild(card.cloneNode(true));
                });

                let pos = C + 2;
                let animating = false;
                let dragStartX = 0;
                let dragLastX = 0;
                let dragging = false;

                function getOffset() {
                    return pos * (CARD_W + GAP) - (viewport.offsetWidth - CARD_W) / 2;
                }

                function setTransition(enabled) {
                    track.style.transition = enabled
                        ? 'transform .48s cubic-bezier(.4,0,.2,1)'
                        : 'none';
                }

                function applyPos(instant) {
                    setTransition(!instant);
                    track.style.transform = `translateX(-${getOffset()}px)`;
                    syncDots();
                }

                const DOT_STEP = Math.ceil(N / DOT_COUNT);
                for (let i = 0; i < DOT_COUNT; i++) {
                    const d = document.createElement('button');
                    d.className = 'w-[9px] h-[9px] rounded-full bg-white/30 border-0 p-0 cursor-pointer transition';
                    d.setAttribute('aria-label', `Slide group ${i + 1}`);
                    d.addEventListener('click', () => {
                        const real = ((pos - C) % N + N) % N;
                        const target = i * DOT_STEP;
                        navigate(target - real);
                    });
                    dotsRow.appendChild(d);
                }

                function syncDots() {
                    const real = ((pos - C) % N + N) % N;
                    const dotIdx = Math.floor(real / DOT_STEP);
                    dotsRow.querySelectorAll('button').forEach((d, i) => {
                        d.classList.toggle('bg-white', i === dotIdx);
                        d.classList.toggle('scale-125', i === dotIdx);
                        d.classList.toggle('bg-white/30', i !== dotIdx);
                    });
                }

                function navigate(dir) {
                    if (animating) return;
                    animating = true;
                    pos += dir;
                    applyPos(false);
                }

                track.addEventListener('transitionend', (e) => {
                    if (e.propertyName !== 'transform') return;
                    animating = false;
                    let jumped = false;
                    if (pos < C) {
                        pos += N;
                        jumped = true;
                    } else if (pos >= C + N) {
                        pos -= N;
                        jumped = true;
                    }
                    if (jumped) applyPos(true);
                });

                prevBtn.addEventListener('click', () => navigate(-1));
                nextBtn.addEventListener('click', () => navigate(+1));

                function start(x) {
                    if (animating) return;
                    dragging = true;
                    dragStartX = x;
                    dragLastX = x;
                    viewport.classList.add('cursor-grabbing');
                }

                function move(x) {
                    if (!dragging) return;
                    dragLastX = x;
                    setTransition(false);
                    track.style.transform = `translateX(-${getOffset() + (dragStartX - x)}px)`;
                }

                function end() {
                    if (!dragging) return;
                    dragging = false;
                    viewport.classList.remove('cursor-grabbing');
                    const d = dragStartX - dragLastX;
                    if (d > CARD_W * 0.22) navigate(+1);
                    else if (d < -CARD_W * 0.22) navigate(-1);
                    else applyPos(false);
                }

                viewport.addEventListener('mousedown', (e) => start(e.clientX), { passive: true });
                viewport.addEventListener('touchstart', (e) => start(e.touches[0].clientX), { passive: true });
                window.addEventListener('mousemove', (e) => move(e.clientX), { passive: true });
                window.addEventListener('touchmove', (e) => move(e.touches[0].clientX), { passive: false });
                window.addEventListener('mouseup', end);
                window.addEventListener('touchend', end);

                viewport.addEventListener('click', (e) => {
                    if (Math.abs(dragStartX - dragLastX) > 8) e.stopPropagation();
                }, true);

                window.addEventListener('resize', () => applyPos(true));

                applyPos(true);
            })();
        </script>
    </section>



    {{-- ═══════════════════════════════════════════════════════════════════
    Proven Results
    ═══════════════════════════════════════════════════════════════════ --}}

    <section class="w-full bg-[#ebebeb] px-4 py-16 font-[Poppins] sm:px-8 sm:py-20 lg:px-10 lg:py-24">
        <div class="mx-auto flex w-full max-w-[1200px] flex-col items-center">
            <h2 id="proven-results-title"
                class="mb-5 text-center text-[clamp(2.8rem,50vw,2.1rem)] font-bold tracking-[-0.03em] text-[#454545] opacity-0 translate-y-[18px] transition-all duration-700 ease-out">
                Launch <span class="text-[#00b5ad]">Your Career</span>
            </h2>
            <p
                class="mt-3 mb-15 text-center text-[clamp(.88rem,1.4vw,1rem)] font-medium text-[#777] max-w-[900px] mx-auto">
                With Virtual Internships, you’ll gain valuable skills and knowledge from top companies worldwide, all
                from the comfort of your own home. Your Virtual Internship is like an extended interview, with major
                growth and learning outcomes and the potential for further opportunities upon completion.
            </p>
            <div class="grid w-full grid-cols-1 gap-y-9 md:grid-cols-2 xl:grid-cols-4 xl:gap-y-0">
                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="0">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#8164eb]"
                        data-target="250" data-suffix="k+">0k+</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Global Internships</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Available now and growing</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="80">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#3aafa9]"
                        data-target="80" data-suffix="+">0+</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Countries</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Internships Available Worldwide</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out"
                    data-delay="160">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#e8415a]"
                        data-target="2" data-suffix="">0</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">One to One</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Professional Career Coaching Calls</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out"
                    data-delay="240">
                    <div
                        class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.04em] text-[#f5a623]">
                        <span id="one-in-three">1 in 3</span>
                    </div>F
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Interns</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Offered Further Opportunities Immediately
                        Upon Completion</div>
                </div>
            </div>
        </div>

        <script>
            (function () {
                function easeOutExpo(t) {
                    return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
                }

                function animateCounter(el, target, suffix, duration) {
                    var start = performance.now();
                    var total = duration || 1600;

                    function step(now) {
                        var elapsed = now - start;
                        var progress = Math.min(elapsed / total, 1);
                        var eased = easeOutExpo(progress);
                        var current = Math.round(eased * target);

                        el.textContent = current + suffix;

                        if (progress < 1) {
                            requestAnimationFrame(step);
                        }
                    }

                    requestAnimationFrame(step);
                }

                var title = document.getElementById('proven-results-title');
                var stats = document.querySelectorAll('.stat-card');

                function revealTitle() {
                    if (title) {
                        title.classList.add('opacity-100', 'translate-y-0');
                    }
                }

                function revealStatCard(card) {
                    var delay = parseInt(card.dataset.delay, 10) || 0;

                    window.setTimeout(function () {
                        card.classList.add('opacity-100', 'translate-y-0');

                        var number = card.querySelector('.stat-number[data-target]');
                        if (number) {
                            animateCounter(number, parseInt(number.dataset.target, 10), number.dataset.suffix || '');
                        }
                    }, delay);
                }

                function revealVisibleItems() {
                    if (title) {
                        var titleRect = title.getBoundingClientRect();
                        if (titleRect.top < window.innerHeight) {
                            revealTitle();
                        }
                    }

                    stats.forEach(function (card) {
                        var rect = card.getBoundingClientRect();
                        if (rect.top < window.innerHeight) {
                            revealStatCard(card);
                        }
                    });
                }

                if (title && 'IntersectionObserver' in window) {
                    var titleObserver = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                                revealTitle();
                                titleObserver.unobserve(entry.target);
                            }
                        });
                    }, {
                        threshold: 0.3
                    });

                    titleObserver.observe(title);
                }

                if ('IntersectionObserver' in window) {
                    var statObserver = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                                revealStatCard(entry.target);
                                statObserver.unobserve(entry.target);
                            }
                        });
                    }, {
                        threshold: 0.2
                    });

                    stats.forEach(function (card) {
                        statObserver.observe(card);
                    });
                }

                window.addEventListener('load', revealVisibleItems);
            })();
        </script>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════════
    Real Stories
    ═══════════════════════════════════════════════════════════════════ --}}

    <section class="mx-auto w-full max-w-[1200px] px-1 py-1" aria-labelledby="realStories">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet" />
        <!-- Styles converted to Tailwind utilities — no inline CSS to avoid conflicts -->

        <section id="realStories" class="mx-auto  mb-20 w-full max-w-[1200px] px-4 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-12">
            <div class="w-full text-center">
                <h2 class="section-title mb-3 text-3xl font-extrabold text-[#00b1aa] sm:text-4xl lg:text-5xl">Real
                    Why Students Love Virtual Internships
                </h2>
                <p class="section-sub mx-auto mb-20 max-w-2xl  text-sm text-[#7b7b7b] sm:text-base">Success stories from
                    Join our global network of alumni who have landed prestigious jobs worldwide.

                </p>

                <div
                    class="slider-wrapper relative mx-auto flex w-full max-w-[1220px] flex-col items-center px-9 pb-10 sm:px-11 md:px-14">

                    <button
                        class="arrow-btn prev absolute -left-1 top-1/2 z-20 flex h-10 w-10 -translate-y-1/2 -translate-x-8 items-center justify-center rounded-full bg-white text-gray-700 transition-all duration-200 hover:bg-white hover:text-[#f79123] hover:shadow-lg md:-left-3 md:h-11 md:w-11"
                        id="prevBtn" aria-label="Previous">
                        <svg viewBox="0 0 24 24" class="h-5 w-5">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>

                    <div class="slider-outer w-290 overflow-hidden" id="sliderOuter">
                        <div class="slider-track flex select-none transition-transform will-change-transform"
                            id="sliderTrack">

                            <!-- 1 -->
                            <div class="card shrink-0 mx-2 flex w-full flex-col overflow-hidden rounded-[18px] bg-white sm:w-1/2 md:w-1/3"
                                style="max-width: min(100%, 370px);">
                                <div class="card-video group relative w-full overflow-hidden bg-gray-900 pt-[56.25%] cursor-pointer"
                                    data-vid="lZD3kn3Fss0">
                                    <img class="thumb-link absolute inset-0 w-full h-full object-cover"
                                        src="https://www.virtualinternships.com/wp-content/uploads/2025/06/The-only-platform-that-guarantees-real-world-work-experience-across-the-globe-.png.webp"
                                        alt="" />
                                    <div class="thumb-w absolute inset-0 opacity-0 transition-opacity duration-300"><img
                                            src="https://img.youtube.com/vi/lZD3kn3Fss0/hqdefault.jpg" alt="" /></div>
                                    <iframe allowfullscreen allow="autoplay; encrypted-media"
                                        class="absolute inset-0 hidden h-full w-full"></iframe>
                                    <div
                                        class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow-lg">
                                            <svg viewBox="0 0 24 24" class="h-5 w-5 translate-x-0.5 fill-current">
                                                <polygon points="5 3 19 12 5 21 5 3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body flex flex-1 flex-col justify-between p-4 text-left">
                                    <h3 class="card-title text-lg font-semibold text-gray-900">How to Get an Internship
                                        with No Experience</h3>
                                    <p class="card-desc mt-2 text-sm text-gray-600">A step-by-step guide on landing your
                                        first internship even when
                                        you're just starting out — from building your resume to acing the interview.</p>
                                </div>
                            </div>

                            <!-- 2 -->
                            <div class="card shrink-0 mx-2 flex w-full flex-col overflow-hidden rounded-[18px] bg-white sm:w-1/2 md:w-1/3"
                                style="max-width: min(100%, 370px);">
                                <div class="card-video group relative w-full overflow-hidden bg-gray-900 pt-[56.25%] cursor-pointer"
                                    data-vid="yXnlNM7coak">
                                    <img class="thumb-link absolute inset-0 w-full h-full object-cover"
                                        src="assets/avatar-1.svg" alt="" />
                                    <div class="thumb-w absolute inset-0 opacity-0 transition-opacity duration-300"><img
                                            src="https://img.youtube.com/vi/yXnlNM7coak/hqdefault.jpg" alt="" /></div>
                                    <iframe allowfullscreen allow="autoplay; encrypted-media"
                                        class="absolute inset-0 hidden h-full w-full"></iframe>
                                    <div
                                        class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow-lg">
                                            <svg viewBox="0 0 24 24" class="h-5 w-5 translate-x-0.5 fill-current">
                                                <polygon points="5 3 19 12 5 21 5 3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body flex flex-1 flex-col justify-between p-4 text-left">
                                    <h3 class="card-title text-lg font-semibold text-gray-900">How to Make the Most of a
                                        Remote Internship</h3>
                                    <p class="card-desc mt-2 text-sm text-gray-600">Practical advice from interns and
                                        managers on how to stay
                                        productive, build real relationships, and leave a lasting impression — all from
                                        home.</p>
                                </div>
                            </div>

                            <!-- 3 -->
                            <div class="card shrink-0 mx-2 flex w-full flex-col overflow-hidden rounded-[18px] bg-white sm:w-1/2 md:w-1/3"
                                style="max-width: min(100%, 370px);">
                                <div class="card-video group relative w-full overflow-hidden bg-gray-900 pt-[56.25%] cursor-pointer"
                                    data-vid="sQjJsJvRGcE">
                                    <img class="thumb-link absolute inset-0 w-full h-full object-cover"
                                        src="https://img.youtube.com/vi/sQjJsJvRGcE/hqdefault.jpg" alt="" />
                                    <div class="thumb-w absolute inset-0 opacity-0 transition-opacity duration-300"><img
                                            src="https://img.youtube.com/vi/sQjJsJvRGcE/hqdefault.jpg" alt="" /></div>
                                    <iframe allowfullscreen allow="autoplay; encrypted-media"
                                        class="absolute inset-0 hidden h-full w-full"></iframe>
                                    <div
                                        class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow-lg">
                                            <svg viewBox="0 0 24 24" class="h-5 w-5 translate-x-0.5 fill-current">
                                                <polygon points="5 3 19 12 5 21 5 3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body flex flex-1 flex-col justify-between p-4 text-left">
                                    <h3 class="card-title text-lg font-semibold text-gray-900">Top Internship Interview
                                        Questions & How to Answer Them</h3>
                                    <p class="card-desc mt-2 text-sm text-gray-600">Recruiters reveal the most common
                                        internship interview
                                        questions and the strategies top candidates use to stand out from the
                                        competition.</p>
                                </div>
                            </div>

                            <!-- 4 -->
                            <div class="card shrink-0 mx-2 flex w-full flex-col overflow-hidden rounded-[18px] bg-white sm:w-1/2 md:w-1/3"
                                style="max-width: min(100%, 370px);">
                                <div class="card-video group relative w-full overflow-hidden bg-gray-900 pt-[56.25%] cursor-pointer"
                                    data-vid="9no0lMkPGss">
                                    <img class="thumb-link absolute inset-0 w-full h-full object-cover"
                                        src="https://img.youtube.com/vi/9no0lMkPGss/hqdefault.jpg" alt="" />
                                    <div class="thumb-w absolute inset-0 opacity-0 transition-opacity duration-300"><img
                                            src="https://img.youtube.com/vi/9no0lMkPGss/hqdefault.jpg" alt="" /></div>
                                    <iframe allowfullscreen allow="autoplay; encrypted-media"
                                        class="absolute inset-0 hidden h-full w-full"></iframe>
                                    <div
                                        class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow-lg">
                                            <svg viewBox="0 0 24 24" class="h-5 w-5 translate-x-0.5 fill-current">
                                                <polygon points="5 3 19 12 5 21 5 3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body flex flex-1 flex-col justify-between p-4 text-left">
                                    <h3 class="card-title text-lg font-semibold text-gray-900">From Intern to Full-Time:
                                        Converting Your Internship into a
                                        Job Offer</h3>
                                    <p class="card-desc mt-2 text-sm text-gray-600">Real interns share how they
                                        impressed their employers and
                                        turned a summer internship into a full-time career opportunity at top companies.
                                    </p>
                                </div>
                            </div>

                            <!-- 5 -->
                            <div class="card shrink-0 mx-2 flex w-full flex-col overflow-hidden rounded-[18px] bg-white sm:w-1/2 md:w-1/3"
                                style="max-width: min(100%, 370px);">
                                <div class="card-video group relative w-full overflow-hidden bg-gray-900 pt-[56.25%] cursor-pointer"
                                    data-vid="Fkd9TWUtM3Y">
                                    <img class="thumb-link absolute inset-0 w-full h-full object-cover"
                                        src="https://img.youtube.com/vi/Fkd9TWUtM3Y/hqdefault.jpg" alt="" />
                                    <div class="thumb-w absolute inset-0 opacity-0 transition-opacity duration-300"><img
                                            src="https://img.youtube.com/vi/Fkd9TWUtM3Y/hqdefault.jpg" alt="" /></div>
                                    <iframe allowfullscreen allow="autoplay; encrypted-media"
                                        class="absolute inset-0 hidden h-full w-full"></iframe>
                                    <div
                                        class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow-lg">
                                            <svg viewBox="0 0 24 24" class="h-5 w-5 translate-x-0.5 fill-current">
                                                <polygon points="5 3 19 12 5 21 5 3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body flex flex-1 flex-col justify-between p-4 text-left">
                                    <h3 class="card-title text-lg font-semibold text-gray-900">A Day in the Life of a
                                        Software Engineering Intern at Google
                                    </h3>
                                    <p class="card-desc mt-2 text-sm text-gray-600">Follow along as a Google intern
                                        walks through their daily
                                        routine — from morning stand-ups to coding projects and team socials at one of
                                        the world's top companies.</p>
                                </div>
                            </div>

                            <!-- 6 -->
                            <div class="card shrink-0 mx-2 flex w-full flex-col overflow-hidden rounded-[18px] bg-white sm:w-1/2 md:w-1/3"
                                style="max-width: min(100%, 370px);">
                                <div class="card-video group relative w-full overflow-hidden bg-gray-900 pt-[56.25%] cursor-pointer"
                                    data-vid="3sLCiMaVDps">
                                    <img class="thumb-link absolute inset-0 w-full h-full object-cover"
                                        src="https://img.youtube.com/vi/3sLCiMaVDps/hqdefault.jpg" alt="" />
                                    <div class="thumb-w absolute inset-0 opacity-0 transition-opacity duration-300"><img
                                            src="https://img.youtube.com/vi/3sLCiMaVDps/hqdefault.jpg" alt="" /></div>
                                    <iframe allowfullscreen allow="autoplay; encrypted-media"
                                        class="absolute inset-0 hidden h-full w-full"></iframe>
                                    <div
                                        class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow-lg">
                                            <svg viewBox="0 0 24 24" class="h-5 w-5 translate-x-0.5 fill-current">
                                                <polygon points="5 3 19 12 5 21 5 3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body flex flex-1 flex-col justify-between p-4 text-left">
                                    <h3 class="card-title text-lg font-semibold text-gray-900">How to Build a Standout
                                        Internship Resume</h3>
                                    <p class="card-desc mt-2 text-sm text-gray-600">Tips for showcasing projects,
                                        relevant coursework, and soft skills — even
                                        when you don't have prior professional experience.</p>
                                </div>
                            </div>

                        </div>

                        <button
                            class="arrow-btn next absolute -right-1 top-1/2 z-20 flex h-10 w-10 -translate-y-1/2  translate-x-8 items-center justify-center rounded-full bg-white text-gray-700 transition-all duration-200 hover:bg-white hover:text-[#f79123] hover:shadow-lg md:-right-3 md:h-11 md:w-11"
                            id="nextBtn" aria-label="Next">
                            <svg viewBox="0 0 24 24" class="h-5 w-5">
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                        </button>

                    </div>

                    <div class="dots mt-8 flex items-center justify-center pb-2" id="dotsContainer"></div>
                </div>
        </section>

        <script>
            (function () {
                const outer = document.getElementById('sliderOuter');
                const track = document.getElementById('sliderTrack');
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const dotsCon = document.getElementById('dotsContainer');
                const cards = Array.from(track.querySelectorAll('.card'));
                let current = 0; let visible = (function () { const w = window.innerWidth; if (w <= 560) return 1; if (w <= 900) return 2; return 3 })();
                function maxIdx() { return Math.max(0, cards.length - visible) }
                function cardW() { return cards[0].offsetWidth + 14 }
                function setTransform(px, animate) { if (!animate) track.classList.add('no-anim'); track.style.transform = `translateX(-${px}px)`; if (!animate) requestAnimationFrame(() => requestAnimationFrame(() => track.classList.remove('no-anim'))) }
                function goTo(idx, animate = true) { current = Math.max(0, Math.min(idx, maxIdx())); setTransform(current * cardW(), animate); prevBtn.disabled = current === 0; nextBtn.disabled = current >= maxIdx(); updateDots() }
                function buildDots() {
                    dotsCon.innerHTML = ''; const count = maxIdx() + 1;
                    for (let i = 0; i < count; i++) {
                        const d = document.createElement('button');
                        d.className = 'dot mx-1 h-2 w-2 rounded-full bg-gray-300 transition-all duration-200' + (i === current ? ' active w-6 bg-teal-500' : '');
                        d.setAttribute('aria-label', `Slide ${i + 1}`);
                        d.addEventListener('click', () => goTo(i));
                        dotsCon.appendChild(d);
                    }
                }
                function updateDots() {
                    dotsCon.querySelectorAll('.dot').forEach((d, i) => {
                        d.className = 'dot mx-1 h-2 w-2 rounded-full bg-gray-300 transition-all duration-200' + (i === current ? ' active w-6 bg-teal-500' : '');
                    });
                }
                prevBtn.addEventListener('click', () => goTo(current - 1)); nextBtn.addEventListener('click', () => goTo(current + 1));
                let dragging = false, dragX0 = 0, dragDelta = 0, baseOffset = 0; outer.addEventListener('mousedown', e => { if (e.button !== 0) return; dragging = true; dragX0 = e.clientX; dragDelta = 0; baseOffset = current * cardW(); track.classList.add('no-anim'); outer.classList.add('dragging'); e.preventDefault() })
                window.addEventListener('mousemove', e => { if (!dragging) return; dragDelta = e.clientX - dragX0; track.style.transform = `translateX(-${baseOffset - dragDelta}px)` })
                window.addEventListener('mouseup', () => { if (!dragging) return; dragging = false; outer.classList.remove('dragging'); track.classList.remove('no-anim'); settle(dragDelta) })
                let touchX0 = 0, touchDelta = 0; outer.addEventListener('touchstart', e => { touchX0 = e.touches[0].clientX; touchDelta = 0; baseOffset = current * cardW(); track.classList.add('no-anim') }, { passive: true })
                outer.addEventListener('touchmove', e => { touchDelta = e.touches[0].clientX - touchX0; track.style.transform = `translateX(-${baseOffset - touchDelta}px)` }, { passive: true })
                outer.addEventListener('touchend', () => { track.classList.remove('no-anim'); settle(touchDelta); touchDelta = 0 })
                function settle(delta) { const threshold = cardW() * 0.22; if (delta < -threshold) goTo(current + 1); else if (delta > threshold) goTo(current - 1); else goTo(current) }
                outer.addEventListener('click', e => { if (Math.abs(dragDelta) > 6 || Math.abs(touchDelta) > 6) e.stopPropagation() }, true)
                document.querySelectorAll('.card-video').forEach(video => {
                    const thumb = video.querySelector('.thumb-link');
                    const overlay = video.querySelector('.thumb-w');
                    const iframe = video.querySelector('iframe');
                    const startVideo = (event) => {
                        event.preventDefault();
                        if (Math.abs(dragDelta) > 6 || !iframe) return;
                        if (thumb) thumb.classList.add('hidden');
                        if (overlay) overlay.classList.add('hidden');
                        iframe.classList.remove('hidden');
                        iframe.src = `https://www.youtube.com/embed/${video.dataset.vid}?autoplay=1&rel=0`;
                        video.classList.add('playing');
                    };

                    video.addEventListener('click', startVideo);
                })
                let resizeTimer; window.addEventListener('resize', () => { clearTimeout(resizeTimer); resizeTimer = setTimeout(() => { const nv = (function () { const w = window.innerWidth; if (w <= 560) return 1; if (w <= 900) return 2; return 3 })(); visible = nv; buildDots(); goTo(Math.min(current, maxIdx()), false) }, 150) })
                buildDots(); goTo(0, false)
            })();
        </script>
    </section>



    {{-- ═══════════════════════════════════════════════════════════════════
    HERO SECTION bottom
    ═══════════════════════════════════════════════════════════════════ --}}
    <section id="hero-section" class="relative z-0 overflow-hidden bg-no-repeat bg-cover bg-center" style="opacity: 1; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/home-vector.png'); 
    background-size: 100% auto; background-position: center;">
        <div
            class="mx-auto grid w-full max-w-[1200px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1
                    class="max-w-4xl font-[Poppins] text-[clamp(1.6rem,3vw,2.4rem)] font-extrabold leading-[1.5] tracking-[-0.03em] text-[#444444]">
                    Start Your Career Journey<br>
                    <span class="text-[#00b1aa]">with Virtual Internships!
</span>

                </h1>
        

                <div class="mt-7 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                            aria-hidden="true">
                            <path
                                d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-10-2h4v2h-4V5Zm10 15H4V9h16v11Z" />
                        </svg>
                        Enroll Now
                    </a>

         
                </div>
            </div>

            <div
                class="animate-[fadeRight_0.7s_0.1s_ease_both] justify-self-center md:justify-self-end md:w-full md:max-w-[400px]">
                <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/vi-users.png"
                    alt="Student with laptop and headphones" class="h-auto w-full object-contain" />
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════════════
    footer
    ═══════════════════════════════════════════════════════════════════ --}}

    <x-footer />

</body>

</html>