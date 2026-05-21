<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>InternDesk</title>

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

    <x-nav-bar />

    <x-loading-overlay />

    {{-- ═══════════════════════════════════════════════════════════════════
    HERO
    ═══════════════════════════════════════════════════════════════════ --}}
    <section id="hero-section" class="relative z-0 mt-22 overflow-hidden bg-no-repeat bg-cover bg-center" style="opacity: 1; 
    background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/Vector.png'); 
    background-size: 40% auto; background-position: right;">
        <div
            class="mx-auto grid w-full max-w-[1100px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1
                    class="max-w-4xl font-[Poppins] text-[clamp(1.6rem,3vw,2.4rem)] font-extrabold leading-[1.5] tracking-[-0.03em] text-[#444444]">
                    Achieve More With<br>
                    <span class="text-[#00b1aa]">Ready-to-Work Interns</span>
                </h1>
                <p class="mt-4 font-[Nunito] text-base font-semibold text-[#7a7a7a]">
                    Connect with driven, pre-screened interns, allowing you to overcome project backlogs, boost
                    productivity, and make a real impact—all at zero cost to your business. </p>

                <div class="mt-7 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                            aria-hidden="true">
                            <path
                                d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-10-2h4v2h-4V5Zm10 15H4V9h16v11Z" />
                        </svg>
                        Hire Interns
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
                <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/vi-company-header.png.webp"
                    alt="Student with laptop and headphones" class="h-auto w-full object-contain" />
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════════════
    Future Readiness —
    ═══════════════════════════════════════════════════════════════════ --}}

    <section
        class="future-section relative flex items-center justify-center overflow-hidden bg-[#0a272b] px-6 py-[78px] md:py-[62px]">


        <div class="future-content relative z-10 mx-auto max-w-[700px] text-center">
            <h2
                class="future-title mb-5 font-[Poppins] text-[clamp(0.1rem,2vw,3rem)] font-extrabold leading-[1.18] tracking-[-1.6px] text-[#f54266] md:mb-[2px]">
                Tackle Your Talent Needs with Zero Overheads
            </h2>

            <p
                class="future-text mx-auto max-w-[820px] font-[Poppins] text-[clamp(0.82rem,0.4vw,1.15rem)] font-medium leading-[1.7] text-white/92">
                As we face a global skills gap, finding diverse talent and building talent pipelines is a priority for
                business leaders worldwide. Our platform provides the support you need to onboard the right interns
                quickly and get additional support, without hiring or recruitment overheads.
            </p>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════════
    The Solution
    ═══════════════════════════════════════════════════════════════════ --}}

    <section
        class="relative w-full overflow-hidden bg-[#f7f8f8] pt-[72px] px-[40px] pb-[80px] flex flex-col items-center font-[Poppins] bg-no-repeat bg-cover bg-center"
        style="opacity: 1; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/light-bg-with-vector.jpg'); background-size: 100% auto; background-position: center;">

        <div class="relative z-10 text-center mb-[2px]">
            <h2 class="font-[900] text-[clamp(1.8rem,3.5vw,2.6rem)] text-[#454545] leading-[1.15]">
                The Solution:
                <span class="text-[#00b5ad]">Virtual Internships</span>
            </h2>
            <p class="mt-3 text-[clamp(.88rem,1.4vw,1rem)] font-medium text-[#777] max-w-[900px] mx-auto">
                Connecting educators, companies, and interns to create lasting, meaningful impact.
            </p>
        </div>

        <div class="relative w-full max-w-[1900px] px-12 sm:px-0">
            <button id="solutionPrevBtn" type="button" aria-label="Previous solution card"
                class="absolute left-2 top-1/2 z-20 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white text-[#8a8a8a] shadow-lg transition duration-200 hover:-translate-y-1/2 hover:bg-[#00b5ad] hover:text-white sm:left-0">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
            </button>

            <div id="solutionSliderOuter" class="overflow-hidden">
                <div id="solutionSliderTrack"
                    class="flex select-none gap-4  py-20 transition-transform duration-500 ease-out will-change-transform">
                    <article
                        class="solution-card flex w-full h-55 shrink-0 flex-col rounded-[24px] bg-white px-6 py-10 text-center shadow-xl md:w-1/2 lg:w-1/3">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#00b5ad]/10 text-[#00b5ad]">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M3 21h18" />
                                <path d="M5 21V7l8-4v18" />
                                <path d="M19 21v-8l-6-3" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-[1.35rem] font-semibold text-[#00b5ad]">Companies</h3>
                        <p class="text-[.92rem] leading-[1.7] text-[#666] font-medium">
                            Access remote, pre-vetted interns to drive growth and strengthen your future talent
                            pipeline.
                        </p>
                    </article>

                    <article
                        class="solution-card flex w-full h-55 shrink-0 flex-col rounded-[24px] bg-white px-6 py-10 text-center shadow-xl md:w-1/2 lg:w-1/3">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#00b5ad]/10 text-[#00b5ad]">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 20v-6" />
                                <path d="M6 20V8" />
                                <path d="M18 20V4" />
                                <path d="M3 20h18" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-[1.35rem] font-semibold text-[#00b5ad]">Educators</h3>
                        <p class="text-[.92rem] leading-[1.7] text-[#666] font-medium">
                            Seamlessly embed internships into your curriculum, enhancing student employability and
                            practical skills.
                        </p>
                    </article>

                    <article
                        class="solution-card flex w-full h-55 shrink-0 flex-col rounded-[24px] bg-white px-6 py-10 text-center shadow-xl md:w-1/2 lg:w-1/3">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#00b5ad]/10 text-[#00b5ad]">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 12a5 5 0 1 0-5-5" />
                                <path d="M12 12l6 6" />
                                <path d="M9 9h.01" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-[1.35rem] font-semibold text-[#00b5ad]">Interns</h3>
                        <p class="text-[.92rem] leading-[1.7] text-[#666] font-medium">
                            Launch your career with global experience, valuable skills, and professional connections.
                        </p>
                    </article>

                    <article
                        class="solution-card flex w-full h-55 shrink-0 flex-col rounded-[24px] bg-white px-6 py-10 text-center shadow-xl md:w-1/2 lg:w-1/3">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#00b5ad]/10 text-[#00b5ad]">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 8v8" />
                                <path d="M8 12h8" />
                                <path d="M5 5h14v14H5z" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-[1.35rem] font-semibold text-[#00b5ad]">Ready-Made Projects</h3>
                        <p class="text-[.92rem] leading-[1.7] text-[#666] font-medium">
                            Start faster with structured project templates that make onboarding simple and productive.
                        </p>
                    </article>

                    <article
                        class="solution-card flex w-full h-55 shrink-0 flex-col rounded-[24px] bg-white px-6 py-10 text-center shadow-xl md:w-1/2 lg:w-1/3">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#00b5ad]/10 text-[#00b5ad]">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M4 19V5" />
                                <path d="M4 5h16" />
                                <path d="M8 9h8" />
                                <path d="M8 13h5" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-[1.35rem] font-semibold text-[#00b5ad]">Pre-Screened Talent</h3>
                        <p class="text-[.92rem] leading-[1.7] text-[#666] font-medium">
                            Get matched with motivated interns who are ready to contribute from day one.
                        </p>
                    </article>

                    <article
                        class="solution-card flex w-full h-55 shrink-0 flex-col rounded-[24px] bg-white px-6 py-10 text-center shadow-xl md:w-1/2 lg:w-1/3">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#00b5ad]/10 text-[#00b5ad]">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 2l3 7h7l-5.5 4.1L18.5 20 12 15.9 5.5 20l2-6.9L2 9h7z" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-[1.35rem] font-semibold text-[#00b5ad]">Zero Financial Cost</h3>
                        <p class="text-[.92rem] leading-[1.7] text-[#666] font-medium">
                            Benefit from fully funded internship support with no hiring or recruitment fees.
                        </p>
                    </article>

                    <article
                        class="solution-card flex w-full h-55 shrink-0 flex-col rounded-[24px] bg-white px-6 py-10 text-center shadow-xl md:w-1/2 lg:w-1/3">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#00b5ad]/10 text-[#00b5ad]">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 22s7-4 7-10V5l-7-3-7 3v7c0 6 7 10 7 10Z" />
                                <path d="M9.5 12.5 11 14l3.5-3.5" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-[1.35rem] font-semibold text-[#00b5ad]">Access Anywhere</h3>
                        <p class="text-[.92rem] leading-[1.7] text-[#666] font-medium">
                            Manage interns from anywhere with a flexible, remote-first internship experience.
                        </p>
                    </article>
                </div>
            </div>

            <button id="solutionNextBtn" type="button" aria-label="Next solution card"
                class="absolute right-2 top-1/2 z-20 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white text-[#8a8a8a] shadow-lg transition duration-200 hover:-translate-y-1/2 hover:bg-[#00b5ad] hover:text-white sm:right-0">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="9 6 15 12 9 18" />
                </svg>
            </button>
        </div>

        <div id="solutionDots" class="mt-8 flex items-center justify-center gap-2"></div>

        <script>
            (function () {
                const outer = document.getElementById('solutionSliderOuter');
                const track = document.getElementById('solutionSliderTrack');
                const prevBtn = document.getElementById('solutionPrevBtn');
                const nextBtn = document.getElementById('solutionNextBtn');
                const dotsWrap = document.getElementById('solutionDots');

                if (!outer || !track || !prevBtn || !nextBtn || !dotsWrap) {
                    return;
                }

                const cards = Array.from(track.querySelectorAll('.solution-card'));
                let currentIndex = 0;
                let autoplayTimer = null;

                function getVisibleCount() {
                    const width = window.innerWidth;

                    if (width < 768) {
                        return 1;
                    }

                    if (width < 1024) {
                        return 2;
                    }

                    return 3;
                }

                function getGap() {
                    const styles = window.getComputedStyle(track);
                    return parseFloat(styles.columnGap || styles.gap || '16') || 16;
                }

                function getCardStep() {
                    const card = cards[0];

                    if (!card) {
                        return 0;
                    }

                    return card.getBoundingClientRect().width + getGap();
                }

                function getMaxIndex() {
                    return Math.max(0, cards.length - getVisibleCount());
                }

                function updateDots() {
                    dotsWrap.innerHTML = '';
                    const total = getMaxIndex() + 1;

                    for (let index = 0; index < total; index += 1) {
                        const dot = document.createElement('button');
                        dot.type = 'button';
                        dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                        dot.className = 'solution-dot h-2 w-2 rounded-full bg-[#cfcfcf] transition-all duration-200';

                        if (index === currentIndex) {
                            dot.classList.add('w-6', 'bg-[#00b5ad]');
                        }

                        dot.addEventListener('click', function () {
                            goTo(index);
                            restartAutoplay();
                        });

                        dotsWrap.appendChild(dot);
                    }
                }

                function syncDots() {
                    const dots = dotsWrap.querySelectorAll('.solution-dot');

                    dots.forEach(function (dot, index) {
                        const active = index === currentIndex;
                        dot.className = 'solution-dot h-2 rounded-full bg-[#cfcfcf] transition-all duration-200';
                        dot.classList.add(active ? 'w-6' : 'w-2');

                        if (active) {
                            dot.classList.add('bg-[#00b5ad]');
                        }
                    });
                }

                function goTo(index) {
                    const maxIndex = getMaxIndex();
                    if (maxIndex === 0) {
                        currentIndex = 0;
                    } else {
                        currentIndex = ((index % (maxIndex + 1)) + (maxIndex + 1)) % (maxIndex + 1);
                    }

                    track.style.transform = 'translateX(-' + (currentIndex * getCardStep()) + 'px)';
                    syncDots();
                }

                function next() {
                    goTo(currentIndex + 1 > getMaxIndex() ? 0 : currentIndex + 1);
                }

                function startAutoplay() {
                    stopAutoplay();
                    autoplayTimer = window.setInterval(next, 2000);
                }

                function stopAutoplay() {
                    if (autoplayTimer) {
                        window.clearInterval(autoplayTimer);
                        autoplayTimer = null;
                    }
                }

                function restartAutoplay() {
                    startAutoplay();
                }

                prevBtn.addEventListener('click', function () {
                    goTo(currentIndex - 1);
                    restartAutoplay();
                });

                nextBtn.addEventListener('click', function () {
                    goTo(currentIndex + 1);
                    restartAutoplay();
                });

                window.addEventListener('resize', function () {
                    updateDots();
                    goTo(Math.min(currentIndex, getMaxIndex()));
                });

                updateDots();
                goTo(0);
                startAutoplay();
            })();
        </script>
    </section>



    {{-- ═══════════════════════════════════════════════════════════════════
    Proven Results
    ═══════════════════════════════════════════════════════════════════ --}}

    <section class="w-full bg-[#ebebeb] px-4 py-10 font-[Poppins] sm:px-8 sm:py-20 lg:px-10 lg:py-18">
        <div class="mx-auto flex w-full max-w-[1200px] flex-col items-center">
            <h2 id="proven-results-title"
                class="mb-5 text-center text-[clamp(2.8rem,50vw,2.1rem)] font-bold tracking-[-0.03em] text-[#454545] opacity-0 translate-y-[18px] transition-all duration-700 ease-out">
                Access a Pool of <span class="text-[#00b5ad]">Ambitious Talent</span>
            </h2>
            <p class="mt-3 mb-15 text-[clamp(.88rem,1.4vw,1rem)] font-medium text-[#777] max-w-[900px] mx-auto">
                Harness the power of dedicated interns to grow your business faster, with zero financial burden.
            </p>
            <div class="grid w-full grid-cols-1 gap-y-9 md:grid-cols-2 xl:grid-cols-4 xl:gap-y-0">
                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="0">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#00b5ad]"
                        data-target="88" data-suffix="%">0%</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Global Internships</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Available now and growing</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="80">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#7c5cbf]"
                        data-target="6000" data-suffix="$">$0</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Countries</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Offering real world experience</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out"
                    data-delay="240">
                    <div
                        class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.04em] text-[#e8415a]">
                        <span id="one-in-three">1 in 3</span>
                    </div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Interns Hired</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Post-program completion</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out"
                    data-delay="160">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#f5a623]"
                        data-target="500" data-suffix="+">0+</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Intern Satisfaction</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Developing essential career skills</div>
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

        <section id="realStories" class="mx-auto w-full max-w-[1000px] px-4 py-8 sm:px-6 sm:py-15 lg:px-8 lg:py-15">
            <div class="w-full text-center">
                <h2 class="section-title mb-10 text-3xl font-extrabold text-[#00b1aa] sm:text-4xl lg:text-5xl">“Virtual
                    Internships is an Extension of our HR Department”
                </h2>


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

    <!-- Trusted partners slider (Tailwindized) -->
    <section class="pt-14 pb-10 overflow-hidden bg-[#00b5ad]">

        <!-- Header -->
        <div id="trusted-header"
            class="text-center px-6 mb-10 opacity-0 translate-y-4 transition-opacity transition-transform duration-500">
            <h2 class="font-extrabold text-2xl md:text-3xl lg:text-4xl text-white mb-3">Trusted by Educators and
                Employers Worldwide</h2>
            <p class="max-w-[680px] mx-auto text-white/90 leading-relaxed">
                We connect educators and employers worldwide to provide ambitious interns with access to
                guaranteed remote internships. Our educational partners enable their students to boost their
                employability, whilst employers gain access to top-tier talent eager to contribute to their
                business to gain experience.
            </p>
        </div>

        <!-- Slider -->
        <div class="relative">

            <button id="prev" aria-label="Previous"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white/25 border border-white/50 flex items-center justify-center hover:bg-white/45 hover:scale-105 transition-transform duration-200 backdrop-blur-sm">
                <svg viewBox="0 0 24 24" class="w-4 h-4 stroke-white fill-none" xmlns="http://www.w3.org/2000/svg">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
            </button>

            <div id="trackWrap" class="overflow-hidden cursor-grab py-3">
                <div id="track" class="flex gap-5 px-[60px] transition-transform will-change-transform">

                    <!-- Card 1 – Dentons -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Dentons_Logo_Purple.svg/320px-Dentons_Logo_Purple.svg.png"
                            alt="Dentons"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-base text-center leading-tight text-[#6b2d8b] hidden">DENTONS ›
                        </div>
                    </div>

                    <!-- Card 2 – DePaul University -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/DePaul_University_Logo.svg/320px-DePaul_University_Logo.svg.png"
                            alt="DePaul University"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-sm text-center leading-tight text-[#00549a] hidden">
                            DePaul<br>UNIVERSITY</div>
                    </div>

                    <!-- Card 3 – USC -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/University_of_Southern_California_seal.svg/240px-University_of_Southern_California_seal.svg.png"
                            alt="USC" onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-sm text-center leading-tight text-[#990000] hidden">USC
                            University of<br>Southern California</div>
                    </div>

                    <!-- Card 4 – Lewis University -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Lewis_University_Logo.svg/320px-Lewis_University_Logo.svg.png"
                            alt="Lewis University"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-lg italic text-center leading-tight text-[#1a1a1a] hidden">
                            Lewis<br><span class="not-italic text-sm tracking-widest">UNIVERSITY</span></div>
                    </div>

                    <!-- Card 5 – Illinois Institute of Technology -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/IIT_logo.svg/240px-IIT_logo.svg.png"
                            alt="Illinois Institute of Technology"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-sm text-center leading-tight text-[#cc0000] hidden">Illinois
                            Institute<br>of Technology</div>
                    </div>

                    <!-- Card 6 – MedX -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/MedX_logo.png/320px-MedX_logo.png"
                            alt="MedX" onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-xl text-center leading-tight hidden"><span
                                class="text-[1.5rem] text-[#4caf50]">MED</span><span
                                class="text-[1.5rem] text-[#f44336]">X</span></div>
                    </div>

                    <!-- Card 7 – Kaplan -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Kaplan_logo.svg/320px-Kaplan_logo.svg.png"
                            alt="Kaplan"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-lg text-center leading-tight text-[#d62027] hidden">KAPLAN</div>
                    </div>

                    <!-- Card 8 – Coursera -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Coursera-Logo_600x600.svg/240px-Coursera-Logo_600x600.svg.png"
                            alt="Coursera"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-base text-center leading-tight text-[#0056d2] hidden">Coursera
                        </div>
                    </div>

                    <!-- Card 9 – PwC -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/PricewaterhouseCoopers_Logo.svg/320px-PricewaterhouseCoopers_Logo.svg.png"
                            alt="PwC" onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-xl text-center leading-tight text-[#d04a02] hidden">PwC</div>
                    </div>

                    <!-- Card 10 – KPMG -->
                    <div
                        class="flex-none w-[200px] h-[120px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/KPMG_logo.svg/320px-KPMG_logo.svg.png"
                            alt="KPMG" onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-xl text-center leading-tight text-[#00338d] hidden">KPMG</div>
                    </div>

                </div><!-- /track -->
            </div><!-- /trackWrap -->

            <button id="next" aria-label="Next"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white/25 border border-white/50 flex items-center justify-center hover:bg-white/45 hover:scale-105 transition-transform duration-200 backdrop-blur-sm">
                <svg viewBox="0 0 24 24" class="w-4 h-4 stroke-white fill-none" xmlns="http://www.w3.org/2000/svg">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </button>

        </div><!-- /slider-outer -->

        <!-- Dots -->
        <div id="dots" class="flex justify-center gap-2 mt-6 pb-2"></div>
        <script>
            (function () {

                const track = document.getElementById('track');
                const trackWrap = document.getElementById('trackWrap');
                const prevBtn = document.getElementById('prev');
                const nextBtn = document.getElementById('next');
                const dotsWrap = document.getElementById('dots');

                const cards = Array.from(track.querySelectorAll('[class*="flex-none"]'));
                const CARD_W = 200;
                const GAP = 20;
                const STEP = CARD_W + GAP;

                // How many cards visible at once (approx)
                const visibleCount = () => Math.round(trackWrap.clientWidth / STEP) || 3;
                const maxIndex = () => Math.max(0, cards.length - visibleCount());

                let currentIndex = 0;
                let autoTimer = null;

                // ── Build dots ──────────────────────────────────
                function buildDots() {
                    dotsWrap.innerHTML = '';
                    const total = maxIndex() + 1;
                    for (let i = 0; i < total; i++) {
                        const btn = document.createElement('button');
                        btn.className = 'dot';
                        btn.setAttribute('aria-label', `Go to slide ${i + 1}`);
                        // default dot styles (Tailwind-like via inline styles)
                        btn.style.width = i === 0 ? '24px' : '8px';
                        btn.style.height = '8px';
                        btn.style.borderRadius = i === 0 ? '4px' : '9999px';
                        btn.style.background = i === 0 ? 'rgba(255,255,255,1)' : 'rgba(255,255,255,0.4)';
                        btn.style.transition = 'all .25s';
                        btn.style.border = '0';
                        btn.style.padding = '0';
                        btn.addEventListener('click', () => goTo(i));
                        dotsWrap.appendChild(btn);
                    }
                }

                // ── Update dots & arrows ─────────────────────────
                function updateUI() {
                    Array.from(dotsWrap.children).forEach((d, i) => {
                        const active = i === currentIndex;
                        d.style.background = active ? 'rgba(255,255,255,1)' : 'rgba(255,255,255,0.4)';
                        d.style.width = active ? '24px' : '8px';
                        d.style.borderRadius = active ? '4px' : '9999px';
                    });
                    prevBtn.disabled = currentIndex === 0;
                    nextBtn.disabled = currentIndex >= maxIndex();
                }

                // ── Move to index ────────────────────────────────
                function goTo(index) {
                    currentIndex = Math.max(0, Math.min(index, maxIndex()));
                    track.style.transform = `translateX(-${currentIndex * STEP}px)`;
                    updateUI();
                }

                prevBtn.addEventListener('click', () => goTo(currentIndex - 1));
                nextBtn.addEventListener('click', () => goTo(currentIndex + 1));

                // ── Drag (mouse) ─────────────────────────────────
                let dragStart = null;
                let dragDelta = 0;

                trackWrap.addEventListener('mousedown', e => {
                    dragStart = e.clientX;
                    dragDelta = 0;
                    trackWrap.classList.add('is-dragging');
                    track.classList.add('no-transition');
                });

                window.addEventListener('mousemove', e => {
                    if (dragStart === null) return;
                    dragDelta = e.clientX - dragStart;
                    const base = currentIndex * STEP;
                    track.style.transform = `translateX(${-base + dragDelta}px)`;
                });

                window.addEventListener('mouseup', () => {
                    if (dragStart === null) return;
                    trackWrap.classList.remove('is-dragging');
                    track.classList.remove('no-transition');
                    if (dragDelta < -60) goTo(currentIndex + 1);
                    else if (dragDelta > 60) goTo(currentIndex - 1);
                    else goTo(currentIndex);
                    dragStart = null;
                });

                // ── Drag (touch) ─────────────────────────────────
                let touchStartX = null;

                trackWrap.addEventListener('touchstart', e => {
                    touchStartX = e.touches[0].clientX;
                    track.classList.add('no-transition');
                }, { passive: true });

                trackWrap.addEventListener('touchmove', e => {
                    if (touchStartX === null) return;
                    const delta = e.touches[0].clientX - touchStartX;
                    const base = currentIndex * STEP;
                    track.style.transform = `translateX(${-base + delta}px)`;
                }, { passive: true });

                trackWrap.addEventListener('touchend', e => {
                    if (touchStartX === null) return;
                    track.classList.remove('no-transition');
                    const delta = e.changedTouches[0].clientX - touchStartX;
                    if (delta < -60) goTo(currentIndex + 1);
                    else if (delta > 60) goTo(currentIndex - 1);
                    else goTo(currentIndex);
                    touchStartX = null;
                });

                // ── Keyboard ─────────────────────────────────────
                document.addEventListener('keydown', e => {
                    if (e.key === 'ArrowLeft') goTo(currentIndex - 1);
                    if (e.key === 'ArrowRight') goTo(currentIndex + 1);
                });

                // ── Init + resize ─────────────────────────────────
                function init() {
                    buildDots();
                    goTo(0);
                }

                window.addEventListener('resize', () => {
                    buildDots();
                    goTo(Math.min(currentIndex, maxIndex()));
                });

                init();

                // ── Autoplay (advance every 2000ms) ─────────────────
                function startAuto() {
                    stopAuto();
                    autoTimer = setInterval(() => {
                        if (currentIndex >= maxIndex()) goTo(0);
                        else goTo(currentIndex + 1);
                    }, 900);
                }

                function stopAuto() {
                    if (autoTimer) {
                        clearInterval(autoTimer);
                        autoTimer = null;
                    }
                }

                // pause on hover and when window is blurred, resume on leave/focus

                trackWrap.addEventListener('mouseleave', startAuto);
                prevBtn.addEventListener('click', startAuto);
                nextBtn.addEventListener('click', startAuto);
                window.addEventListener('blur', stopAuto);
                window.addEventListener('focus', startAuto);

                // start autoplay
                startAuto();

                // ── Scroll-in header ──────────────────────────────
                const header = document.getElementById('trusted-header');
                const obs = new IntersectionObserver(entries => {
                    if (entries[0].isIntersecting) {
                        header.classList.add('opacity-100');
                        header.classList.remove('opacity-0');
                        header.classList.remove('translate-y-4');
                        obs.disconnect();
                    }
                }, { threshold: .2 });
                obs.observe(header);
                const r = header.getBoundingClientRect();
                if (r.top < window.innerHeight) header.classList.add('opacity-100');

            })();
        </script>
    </section>


    <!-- Testimonials slider inserted from Things_to_add.html, converted to Tailwind -->
    <section class="mx-auto w-full max-w-6xl px-4 py-16" aria-labelledby="testimonials-title">
        <div class="mx-auto max-w-4xl">
            <h2 id="testimonials-title" class="text-center text-3xl font-extrabold text-gray-800 mb-6">This Could Be
                <span class="text-teal-500">Your Company</span>
            </h2>

            <div class="flex items-center gap-4">
                <button id="ti-prev" aria-label="Previous"
                    class="flex-shrink-0 w-11 h-11 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center hover:border-teal-400">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 stroke-current text-gray-600" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                </button>

                <div id="ti-viewport" class="flex-1 overflow-hidden rounded-2xl cursor-grab">
                    <div id="ti-strip" class="flex transition-transform duration-500 will-change-transform">

                        <!-- Card 1 -->
                        <div class="flex-none w-full bg-gray-100 rounded-2xl p-8 min-h-[20rem] flex flex-col gap-4">
                            <p class="text-center text-gray-700 leading-relaxed">"I have found Virtual Internships to be
                                unbureaucratic, fast, and transparent. As a founder and managing director, my day is
                                very intense. Therefore, I highly value fast and effective interactions. With Virtual
                                Internships, the administrative work of hiring a remote intern is minimal. I've always
                                received polished and serious candidates. I recommend Virtual Internships to anyone
                                looking for a stream of young talent, willing to put their hands on real work and learn
                                with it."</p>
                            <div class="text-center">
                                <div class="text-teal-500 font-semibold">Flavio Soriano, Founder and Managing Director
                                </div>
                                <div class="text-sm text-gray-500">Business Training Firm, Germany</div>
                            </div>
                            <div class="mt-auto flex items-end justify-start">
                                <img src="" alt="Company logo 1"
                                    class="w-16 h-16 object-contain rounded-md bg-gray-200 border-2 border-dashed border-gray-300" />
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="flex-none w-full bg-gray-100 rounded-2xl p-8 min-h-[20rem] flex flex-col gap-4">
                            <p class="text-center text-gray-700 leading-relaxed">"Virtual Internships has transformed
                                how we source talent. The platform is intuitive, the candidates are well-prepared, and
                                the entire process from application to onboarding took less than a week. It's been a
                                game-changer for our team's productivity and gave us access to motivated students we
                                would never have reached through traditional channels."</p>
                            <div class="text-center">
                                <div class="text-teal-500 font-semibold">Sarah Mitchell, Head of Operations</div>
                                <div class="text-sm text-gray-500">Tech Startup, United Kingdom</div>
                            </div>
                            <div class="mt-auto flex items-end justify-start">
                                <img src="" alt="Company logo 2"
                                    class="w-16 h-16 object-contain rounded-md bg-gray-200 border-2 border-dashed border-gray-300" />
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="flex-none w-full bg-gray-100 rounded-2xl p-8 min-h-[20rem] flex flex-col gap-4">
                            <p class="text-center text-gray-700 leading-relaxed">"We've hosted four interns through
                                Virtual Internships and every single one exceeded our expectations. The structured
                                projects made it easy to delegate meaningful work without micromanaging. The support
                                team is always responsive and genuinely cares about the experience on both sides. This
                                is the future of internships."</p>
                            <div class="text-center">
                                <div class="text-teal-500 font-semibold">James Okafor, CEO</div>
                                <div class="text-sm text-gray-500">Digital Marketing Agency, Nigeria</div>
                            </div>
                            <div class="mt-auto flex items-end justify-start">
                                <img src="" alt="Company logo 3"
                                    class="w-16 h-16 object-contain rounded-md bg-gray-200 border-2 border-dashed border-gray-300" />
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="flex-none w-full bg-gray-100 rounded-2xl p-8 min-h-[20rem] flex flex-col gap-4">
                            <p class="text-center text-gray-700 leading-relaxed">"As a small business owner, I was
                                skeptical at first—how could we benefit from an intern without the overhead of training?
                                Virtual Internships proved me wrong. The ready-made project templates meant our intern
                                was contributing from day one. The zero cost model made it entirely risk-free. I now
                                host an intern every quarter."</p>
                            <div class="text-center">
                                <div class="text-teal-500 font-semibold">Priya Nair, Founder</div>
                                <div class="text-sm text-gray-500">E-commerce Consultancy, India</div>
                            </div>
                            <div class="mt-auto flex items-end justify-start">
                                <img src="" alt="Company logo 4"
                                    class="w-16 h-16 object-contain rounded-md bg-gray-200 border-2 border-dashed border-gray-300" />
                            </div>
                        </div>

                        <!-- Card 5 -->
                        <div class="flex-none w-full bg-gray-100 rounded-2xl p-8 min-h-[20rem] flex flex-col gap-4">
                            <p class="text-center text-gray-700 leading-relaxed">"The quality of candidates we've
                                received through Virtual Internships has been outstanding. Every intern came with
                                verified skills and clear goals. The platform made communication effortless and tracking
                                progress simple. We've since hired two of our interns full-time—something we never
                                anticipated but are incredibly grateful for."</p>
                            <div class="text-center">
                                <div class="text-teal-500 font-semibold">Laura Becker, Talent Acquisition Manager</div>
                                <div class="text-sm text-gray-500">Financial Services Firm, Switzerland</div>
                            </div>
                            <div class="mt-auto flex items-end justify-start">
                                <img src="" alt="Company logo 5"
                                    class="w-16 h-16 object-contain rounded-md bg-gray-200 border-2 border-dashed border-gray-300" />
                            </div>
                        </div>

                        <!-- Card 6 -->
                        <div class="flex-none w-full bg-gray-100 rounded-2xl p-8 min-h-[20rem] flex flex-col gap-4">
                            <p class="text-center text-gray-700 leading-relaxed">"We were looking for a scalable way to
                                support students while getting real project work done. Virtual Internships delivered
                                exactly that. The matching process was fast and accurate, and the interns brought fresh
                                ideas and genuine enthusiasm. It's a win-win model we are proud to be part of."</p>
                            <div class="text-center">
                                <div class="text-teal-500 font-semibold">Carlos Mendes, Director of Strategy</div>
                                <div class="text-sm text-gray-500">Innovation Consultancy, Brazil</div>
                            </div>
                            <div class="mt-auto flex items-end justify-start">
                                <img src="" alt="Company logo 6"
                                    class="w-16 h-16 object-contain rounded-md bg-gray-200 border-2 border-dashed border-gray-300" />
                            </div>
                        </div>

                    </div>
                </div>

                <button id="ti-next" aria-label="Next"
                    class="flex-shrink-0 w-11 h-11 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center hover:border-teal-400">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 stroke-current text-gray-600" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </button>
            </div>

            <div id="ti-dots" class="flex justify-center gap-3 mt-8"></div>

            <!-- Slider script (kept within the section as requested) -->
            <script>
                (function () {
                    const strip = document.getElementById('ti-strip');
                    const viewport = document.getElementById('ti-viewport');
                    const prevBtn = document.getElementById('ti-prev');
                    const nextBtn = document.getElementById('ti-next');
                    const dotsEl = document.getElementById('ti-dots');
                    const total = strip.children.length;
                    let idx = 0;

                    function buildDots() {
                        dotsEl.innerHTML = '';
                        for (let i = 0; i < total; i++) {
                            const b = document.createElement('button');
                            b.className = 'h-2 w-2 rounded-full bg-gray-300';
                            if (i === 0) b.classList.add('ring-0', 'bg-teal-500', 'w-6', 'rounded-md');
                            b.setAttribute('aria-label', `Slide ${i + 1}`);
                            b.addEventListener('click', () => goTo(i));
                            dotsEl.appendChild(b);
                        }
                    }

                    function syncUI() {
                        Array.from(dotsEl.children).forEach((d, i) => {
                            d.className = 'h-2 w-2 rounded-full bg-gray-300 transition-all';
                            if (i === idx) d.className = 'h-2 w-6 rounded-md bg-teal-500 transition-all';
                        });
                        prevBtn.disabled = idx === 0;
                        nextBtn.disabled = idx === total - 1;
                    }

                    function goTo(i) {
                        idx = Math.max(0, Math.min(i, total - 1));
                        strip.style.transform = `translateX(-${idx * 100}%)`;
                        syncUI();
                    }

                    prevBtn.addEventListener('click', () => goTo(idx - 1));
                    nextBtn.addEventListener('click', () => goTo(idx + 1));

                    // mouse drag
                    let startX = null, delta = 0;
                    viewport.addEventListener('mousedown', e => {
                        startX = e.clientX; delta = 0; viewport.classList.add('grabbing'); strip.classList.add('!transition-none');
                    });
                    window.addEventListener('mousemove', e => {
                        if (startX === null) return; delta = e.clientX - startX; strip.style.transform = `translateX(calc(-${idx * 100}% + ${delta}px))`;
                    });
                    window.addEventListener('mouseup', () => {
                        if (startX === null) return; viewport.classList.remove('grabbing'); strip.classList.remove('!transition-none'); const threshold = viewport.clientWidth * 0.2; if (delta < -threshold) goTo(idx + 1); else if (delta > threshold) goTo(idx - 1); else goTo(idx); startX = null;
                    });

                    // touch
                    let touchStartX = null;
                    viewport.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; strip.classList.add('!transition-none'); }, { passive: true });
                    viewport.addEventListener('touchmove', e => { if (touchStartX === null) return; const d = e.touches[0].clientX - touchStartX; strip.style.transform = `translateX(calc(-${idx * 100}% + ${d}px))`; }, { passive: true });
                    viewport.addEventListener('touchend', e => { if (touchStartX === null) return; strip.classList.remove('!transition-none'); const d = e.changedTouches[0].clientX - touchStartX; const threshold = viewport.clientWidth * 0.2; if (d < -threshold) goTo(idx + 1); else if (d > threshold) goTo(idx - 1); else goTo(idx); touchStartX = null; });

                    document.addEventListener('keydown', e => { if (e.key === 'ArrowLeft') goTo(idx - 1); if (e.key === 'ArrowRight') goTo(idx + 1); });

                    buildDots(); goTo(0);
                })();
            </script>
        </div>
    </section>

    <section class="mx-auto w-full max-w-[860px] px-4 py-16 sm:py-20 lg:px-0" aria-labelledby="explore-further-title">
        <div class="text-center mb-11">
            <h2 id="explore-further-title"
                class="mb-3 font-[Poppins] text-[clamp(1.9rem,3.5vw,2.5rem)] font-extrabold tracking-[-0.03em] text-[#444444]">
                Explore Further
            </h2>
            <p class="mx-auto max-w-[520px] font-[Poppins] text-sm leading-[1.75] text-[#666666]">
                Dive into our comprehensive host company brochures to learn all about hosting and hiring remote
                interns. Download now and unlock a world of opportunities!
            </p>
        </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-9 md:grid-cols-2 md:gap-y-10">
            <article class="flex flex-col items-center text-center gap-4">
                <div class="w-full overflow-hidden rounded-[10px] bg-[#dddddd] aspect-[16/10]">
                    <img class="h-full w-full object-cover block"
                        src="https://www.virtualinternships.com/wp-content/uploads/2023/12/How-Our-Host-Company-Community-Works.png"
                        alt="How the Host Company Community Works" />
                </div>
                <h3 class="px-2 font-[Poppins] text-[0.97rem] font-bold leading-[1.45] text-[#00b5ad]">
                    How the Host Company Community Works
                </h3>
                <a href=""
                    class="inline-block rounded-[6px] bg-[#f89122] px-7 py-[11px] font-[Poppins] text-[0.78rem] font-bold tracking-[0.3px] text-white transition duration-200 hover:-translate-y-0.5 hover:bg-[#f38e40] hover:shadow-[0_6px_18px_rgba(244,122,31,0.35)]">
                    Download Brochure
                </a>
            </article>

            <article class="flex flex-col items-center text-center gap-4">
                <div class="w-full overflow-hidden rounded-[10px] bg-[#dddddd] aspect-[16/10]">
                    <img class="h-full w-full object-cover block"
                        src="https://www.virtualinternships.com/wp-content/uploads/2023/12/The-Benefits-of-Becoming-a-Host-Company.png"
                        alt="Why Join the Host Company Community" />
                </div>
                <h3 class="px-2 font-[Poppins] text-[0.97rem] font-bold leading-[1.45] text-[#00b5ad]">
                    Why Join the Host Company Community
                </h3>
                <a href=""
                    class="inline-block rounded-[6px] bg-[#f89122] px-7 py-[11px] font-[Poppins] text-[0.78rem] font-bold tracking-[0.3px] text-white transition duration-200 hover:-translate-y-0.5 hover:bg-[#f38e40] hover:shadow-[0_6px_18px_rgba(244,122,31,0.35)]">
                    Download Brochure
                </a>
            </article>

            <article class="flex flex-col items-center text-center gap-4">
                <div class="w-full overflow-hidden rounded-[10px] bg-[#dddddd] aspect-[16/10]">
                    <img class="h-full w-full object-cover block"
                        src="https://www.virtualinternships.com/wp-content/uploads/2024/05/website-blog-tiles-375-x-250-px-2.jpg"
                        alt="The Internship Equation Report 2024: Global Insights" />
                </div>
                <h3 class="px-2 font-[Poppins] text-[0.97rem] font-bold leading-[1.45] text-[#00b5ad]">
                    The Internship Equation Report 2024: Global Insights
                </h3>
                <a href=""
                    class="inline-block rounded-[6px] bg-[#f89122] px-7 py-[11px] font-[Poppins] text-[0.78rem] font-bold tracking-[0.3px] text-white transition duration-200 hover:-translate-y-0.5 hover:bg-[#f38e40] hover:shadow-[0_6px_18px_rgba(244,122,31,0.35)]">
                    Download Report
                </a>
            </article>

            <article class="flex flex-col items-center text-center gap-4">
                <div class="w-full overflow-hidden rounded-[10px] bg-[#dddddd] aspect-[16/10]">
                    <img class="h-full w-full object-cover block"
                        src="https://www.virtualinternships.com/wp-content/uploads/2024/05/website-blog-tiles-375-x-250-px-3.jpg"
                        alt="How to Navigate the Local Talent Shortage" />
                </div>
                <h3 class="px-2 font-[Poppins] text-[0.97rem] font-bold leading-[1.45] text-[#00b5ad]">
                    How to Navigate the Local Talent Shortage
                </h3>
                <a href=""
                    class="inline-block rounded-[6px] bg-[#f89122] px-7 py-[11px] font-[Poppins] text-[0.78rem] font-bold tracking-[0.3px] text-white transition duration-200 hover:-translate-y-0.5 hover:bg-[#f38e40] hover:shadow-[0_6px_18px_rgba(244,122,31,0.35)]">
                    Read Article
                </a>
            </article>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════════
    As Featured In (Marquee)
    ═══════════════════════════════════════════════════════════════════ --}}
    <section class="w-full overflow-hidden bg-[#ededed] py-14 px-0">
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


    <section id="hero-section" class="relative z-0 overflow-hidden bg-no-repeat bg-cover bg-center" style="opacity: 1; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/home-vector.png'); 
    background-size: 100% auto; background-position: right;">
        <div
            class="mx-auto grid w-full max-w-[1100px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1
                    class="max-w-4xl font-[Poppins] text-[clamp(1.6rem,3vw,2.4rem)] font-extrabold leading-[1.5] tracking-[-0.03em] text-[#444444]">
                    Find Top Talent and<br>
                    <span class="text-[#00b1aa]">Hire Remote Interns Today</span>

                </h1>


                <div class="mt-7 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                            aria-hidden="true">
                            <path
                                d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-10-2h4v2h-4V5Zm10 15H4V9h16v11Z" />
                        </svg>
                        Hire Interns
                    </a>

                </div>
            </div>

            <div class="animate-[fadeRight_0.7s_0.1s_ease_both]  translate-y-8 justify-self-center md:justify-self-end md:w-full md:max-w-[400px]"
                -mt-100 -mb-10>
                <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/company-bottom-banner.png"
                    alt="Student with laptop and headphones" class="h-auto w-full object-contain" />
            </div>
        </div>
    </section>

    <x-footer />

</body>

</html>