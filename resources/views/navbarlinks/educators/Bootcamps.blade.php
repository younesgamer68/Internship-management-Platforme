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
    class="welcome-body flex min-h-screen flex-col bg-[#f0f0f0] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black text-white' : 'bg-[#f0f0f0] text-[#17494D]'">

    <!-- Navigation -->
    <x-nav-bar blackBg :value="true" />
    <x-loading-overlay />

    {{-- ═══════════════════════════════════════════════════════════════════
    HERO
    ═══════════════════════════════════════════════════════════════════ --}}
    <section id="hero-section" class="relative z-0 mt-10 pt-10 pb-10 overflow-hidden bg-no-repeat bg-cover bg-center"
        style="opacity: 1; background-color:#061d21; 
    background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/Vector-1.png'); 
    background-size: 100% auto; background-position: center;">
        <div
            class="mx-auto grid w-full max-w-[1100px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1
                    class="max-w-4xl font-[Poppins] text-[clamp(1.6rem,3vw,2.4rem)] font-extrabold leading-[1.5] tracking-[-0.03em] text-[#ffff]">
                    Guarantee 100% of Your Learners
                    <span class="text-[#00b1aa]">Real-World Experience</span>
                </h1>
                <p class="mt-4 font-[Nunito] text-base font-semibold text-[#b6b3b3]">
                    Give your learners access to structured, career-aligned remote internships that complement your
                    program, enhance employability, and drive real hiring outcomes.


                </p>

                <div class="mt-7 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                            aria-hidden="true">
                            <path
                                d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-10-2h4v2h-4V5Zm10 15H4V9h16v11Z" />
                        </svg>
                        Learn More
                    </a>


                </div>
            </div>

            <div
                class="animate-[fadeRight_0.7s_0.1s_ease_both] justify-self-center md:justify-self-end md:w-full md:max-w-[400px]">
                <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/uni-header.png"
                    alt="Student with laptop and headphones" class="h-auto w-full object-contain" />
            </div>
        </div>
    </section>




    <section
        class="relative w-full min-h-[420px] bg-[#ececec] flex items-center justify-center overflow-hidden px-5 py-10">
        <div aria-hidden="true" class="absolute inset-0 z-[1]">
            <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/vic.jpg" alt=""
                class="block w-full h-full object-cover object-center" />
        </div>

        <div aria-hidden="true"
            class="absolute z-0 w-[420px] h-[420px] rounded-full bg-[#f5f5f5] left-[-120px] top-[-90px]"></div>
        <div aria-hidden="true"
            class="absolute z-0 w-[500px] h-[500px] rounded-full bg-[#f5f5f5] right-[-180px] top-[-160px]"></div>

        <div class="relative z-[2] max-w-[760px] text-center">
            <h1
                class="mb-[18px] font-[Poppins] font-extrabold leading-none text-[#f7931e] text-[clamp(2.2rem,2vw,4rem)]">
                Fostering Stronger Links Between Education and Employment
            </h1>

            <p class="font-[Poppins] font-normal text-[#222] leading-[1.8] text-[clamp(0.95rem,0.5vw,1.15rem)]">
                Bootcamps provide cutting-edge digital skills—but accessing the workforce with these new skills remains
                a challenge without practical experience. Employers favor candidates with practical experience, but
                providing such opportunities poses a significant challenge. It’s time to address this issue and equip
                learners with the skills they need to succeed in the workforce.
            </p>


        </div>
    </section>



    <section class="relative w-full overflow-hidden bg-[#0c2c2c] pt-[70px] pb-[56px]">
        <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/dark-bg.jpg" alt=""
            class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0" />

        <div class="relative z-[2] text-center px-5 pb-12">
            <h2 class="text-[clamp(2.4rem,4vw,2.4rem)] font-extrabold text-white tracking-[-0.01em] mb-[14px]">
                The Answer?
            </h2>
            <p class="text-[0.92rem] font-bold text-white mb-2.5">Virtual Internships Supported Career Accelerator
                Program</p>
            <p class="text-[0.88rem] text-white/60 max-w-[560px] mx-auto leading-[1.7]">
                The no. 1 platform for universities and colleges to improve career readiness and increase
                student employability through experiential learning opportunities.
            </p>
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
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-row items-center gap-6">
                            <h3 class="text-[1rem] font-bold text-[#0bbfaa] leading-[1.35] w-[38%] flex-shrink-0">
                                Scalable Programming</h3>
                            <div class="w-[1px] self-stretch bg-white/15 flex-shrink-0"></div>
                            <p class="text-[0.82rem] text-white/80 leading-[1.75] font-normal">Partnerships range from
                                10 to 100,000 learners, ensuring global scalability at any level.</p>
                        </div>
                    </div>
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-row items-center gap-6">
                            <h3 class="text-[1rem] font-bold text-[#0bbfaa] leading-[1.35] w-[38%] flex-shrink-0">
                                Scalable Programming</h3>
                            <div class="w-[1px] self-stretch bg-white/15 flex-shrink-0"></div>
                            <p class="text-[0.82rem] text-white/80 leading-[1.75] font-normal">Partnerships range from
                                10 to 100,000 learners, ensuring global scalability at any level.</p>
                        </div>
                    </div>
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-row items-center gap-6">
                            <h3 class="text-[1rem] font-bold text-[#0bbfaa] leading-[1.35] w-[38%] flex-shrink-0">
                                Scalable Programming</h3>
                            <div class="w-[1px] self-stretch bg-white/15 flex-shrink-0"></div>
                            <p class="text-[0.82rem] text-white/80 leading-[1.75] font-normal">Partnerships range from
                                10 to 100,000 learners, ensuring global scalability at any level.</p>
                        </div>
                    </div>
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-row items-center gap-6">
                            <h3 class="text-[1rem] font-bold text-[#0bbfaa] leading-[1.35] w-[38%] flex-shrink-0">
                                Scalable Programming</h3>
                            <div class="w-[1px] self-stretch bg-white/15 flex-shrink-0"></div>
                            <p class="text-[0.82rem] text-white/80 leading-[1.75] font-normal">Partnerships range from
                                10 to 100,000 learners, ensuring global scalability at any level.</p>
                        </div>
                    </div>
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-row items-center gap-6">
                            <h3 class="text-[1rem] font-bold text-[#0bbfaa] leading-[1.35] w-[38%] flex-shrink-0">
                                Scalable Programming</h3>
                            <div class="w-[1px] self-stretch bg-white/15 flex-shrink-0"></div>
                            <p class="text-[0.82rem] text-white/80 leading-[1.75] font-normal">Partnerships range from
                                10 to 100,000 learners, ensuring global scalability at any level.</p>
                        </div>
                    </div>
                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-row items-center gap-6">
                            <h3 class="text-[1rem] font-bold text-[#0bbfaa] leading-[1.35] w-[38%] flex-shrink-0">
                                Scalable Programming</h3>
                            <div class="w-[1px] self-stretch bg-white/15 flex-shrink-0"></div>
                            <p class="text-[0.82rem] text-white/80 leading-[1.75] font-normal">Partnerships range from
                                10 to 100,000 learners, ensuring global scalability at any level.</p>
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

    <section class="w-full bg-[#ebebeb]  px-4 py-10 font-[Poppins] sm:px-8 sm:py-20 lg:px-5 lg:py-20">
        <div class="mx-auto flex w-full max-w-[1200px] flex-col items-center">
            <h2 id="proven-results-title"
                class="mb-5 text-center text-[clamp(2.8rem,50vw,2.1rem)] font-bold tracking-[-0.03em] text-[#454545] opacity-0 translate-y-[18px] transition-all duration-700 ease-out">
                Project-Based Solutions With Results


            </h2>
            <p
                class="mt-3 text-center mb-15 text-[clamp(.88rem,1.4vw,1rem)] font-medium text-[#777] max-w-[900px] mx-auto">
                Increase your learners’ employability and help them excel in the dynamic and highly competitive job
                market by providing the practical, skill-aligned experience employers demand through industry-led
                projects.


            </p>
            <div class="grid w-full grid-cols-1 gap-x-1 md:grid-cols-2 xl:grid-cols-3 xl:gap-y-0">
                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="0">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#00b5ad]"
                        data-target="100" data-suffix="%">0%</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Global Internships</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Available now and growing</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="80">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#7c5cbf]"
                        data-target="500" data-suffix="+">0+</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Countries</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Offering real world experience</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out"
                    data-delay="240">
                    <div
                        class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.04em] text-[#f52323]">
                        <span id="one-in-three">1 in 3</span>
                    </div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Interns Hired</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Post-program completion</div>
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


    <!-- Trusted partners slider (Tailwindized) -->
    <section class="pt-14 pb-10 overflow-hidden bg-[#00b5ad]">

        <!-- Header -->
        <div id="trusted-header"
            class="text-center px-6 mb-10 opacity-1 translate-y-4 transition-opacity transition-transform duration-500">
            <h2 class="font-extrabold text-2xl md:text-3xl lg:text-4xl text-white mb-3">
                Trusted by Bootcamps and Learning Providers Worldwide

            </h2>

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
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Dentons_Logo_Purple.svg/320px-Dentons_Logo_Purple.svg.png"
                            alt="Dentons"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-base text-center leading-tight text-[#6b2d8b] hidden">DENTONS ›
                        </div>
                    </div>

                    <!-- Card 2 – DePaul University -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/DePaul_University_Logo.svg/320px-DePaul_University_Logo.svg.png"
                            alt="DePaul University"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-sm text-center leading-tight text-[#00549a] hidden">
                            DePaul<br>UNIVERSITY</div>
                    </div>

                    <!-- Card 3 – USC -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/University_of_Southern_California_seal.svg/240px-University_of_Southern_California_seal.svg.png"
                            alt="USC" onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-sm text-center leading-tight text-[#990000] hidden">USC
                            University of<br>Southern California</div>
                    </div>

                    <!-- Card 4 – Lewis University -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Lewis_University_Logo.svg/320px-Lewis_University_Logo.svg.png"
                            alt="Lewis University"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-lg italic text-center leading-tight text-[#1a1a1a] hidden">
                            Lewis<br><span class="not-italic text-sm tracking-widest">UNIVERSITY</span></div>
                    </div>

                    <!-- Card 5 – Illinois Institute of Technology -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/IIT_logo.svg/240px-IIT_logo.svg.png"
                            alt="Illinois Institute of Technology"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-sm text-center leading-tight text-[#cc0000] hidden">Illinois
                            Institute<br>of Technology</div>
                    </div>

                    <!-- Card 6 – MedX -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/MedX_logo.png/320px-MedX_logo.png"
                            alt="MedX" onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-xl text-center leading-tight hidden"><span
                                class="text-[1.5rem] text-[#4caf50]">MED</span><span
                                class="text-[1.5rem] text-[#f44336]">X</span></div>
                    </div>

                    <!-- Card 7 – Kaplan -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Kaplan_logo.svg/320px-Kaplan_logo.svg.png"
                            alt="Kaplan"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-lg text-center leading-tight text-[#d62027] hidden">KAPLAN</div>
                    </div>

                    <!-- Card 8 – Coursera -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Coursera-Logo_600x600.svg/240px-Coursera-Logo_600x600.svg.png"
                            alt="Coursera"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-base text-center leading-tight text-[#0056d2] hidden">Coursera
                        </div>
                    </div>

                    <!-- Card 9 – PwC -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/PricewaterhouseCoopers_Logo.svg/320px-PricewaterhouseCoopers_Logo.svg.png"
                            alt="PwC" onerror="this.style.display='none';this.nextElementSibling.style.display='block'"
                            class="max-w-full max-h-full object-contain block" />
                        <div class="font-extrabold text-xl text-center leading-tight text-[#d04a02] hidden">PwC</div>
                    </div>

                    <!-- Card 10 – KPMG -->
                    <div
                        class="flex-none w-[200px] h-[160px] bg-white rounded-[18px] flex items-center justify-center p-6 shadow-md hover:-translate-y-1 hover:shadow-2xl transition-transform">
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






    <section id="hero-section" class="relative z-0 pt-20 overflow-hidden bg-no-repeat bg-cover bg-center" style="opacity: 1; background-color : #ffffff; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/Frame-47.png'); 
    background-size: 100% auto; background-position: right;">
        <div
            class="mx-auto grid w-full max-w-[1100px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1
                    class="max-w-4xl font-[Poppins] text-[clamp(1.6rem,2.5vw,2.4rem)] font-extrabold  tracking-[-0.03em] text-[#444444]">
                    Empower Your Learners wit<br>
                    <span class="text-[#00b1aa]">Work-Based Experience
                    </span>

                </h1>
                <p class="mt-4 font-[Nunito] text-base font-semibold text-[#7a7a7a]">
                    Schedule a call with us to discover how you can guarantee 100% of your learners access to global
                    work experience to complement the skills they’ve built and accelerate their career development.
                </p>

                <div class="mt-7 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">

                        Request a Demo
                    </a>

                </div>
            </div>

            <div class="animate-[fadeRight_0.7s_0.1s_ease_both]  translate-y-8 justify-self-center md:justify-self-end md:w-full md:max-w-[400px]"
                -mt-100 -mb-10>
                <img src="https://www.virtualinternships.com/wp-content/uploads/2023/03/image-37.png"
                    alt="Student with laptop and headphones" class="h-auto w-full object-contain" />
            </div>
        </div>
    </section>

    <x-footer />

</body>