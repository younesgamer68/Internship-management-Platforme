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
                    Guarantee Your Students an<br>
                    <span class="text-[#00b1aa]">Unbeatable Advantage</span>
                </h1>
                <p class="mt-4 font-[Nunito] text-base font-semibold text-[#b6b3b3]">
                    The only platform that guarantees 100% of your students real-world work experience with companies
                    across the globe
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
                The Challenge
            </h1>

            <p class="font-[Poppins] font-normal text-[#222] leading-[1.8] text-[clamp(0.95rem,0.5vw,1.15rem)]">
                Choosing a university that enhances employability is critical for students,
                yet <strong class="font-bold">only 35%*</strong> feel ready for the workforce.
                Employers favor graduates with practical experience, but providing such
                opportunities at scale poses a significant challenge. It’s time to address
                this issue and equip students with the skills they need to succeed in the workforce.
            </p>

            <div class="mt-3 text-xs text-[#666] font-[Poppins]">
                *Source: Higher Education Policy Institute
            </div>
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
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Real Results</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">Hear directly from our
                                students with life-changing internship opportunities that have launched meaningful
                                careers worldwide.</p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Time Efficient</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">Say goodbye to hours of
                                tedious searching and let us help your students achieve their career development goals.
                            </p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Guaranteed Placements</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">100% of your students are
                                guaranteed a project-based learning experience in their chosen career field, in less
                                than six weeks.</p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Global Scale</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">Partnerships range from 10
                                to 100,000 students, ensuring scalability at any level.</p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Increase Student
                                Employability</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">Guarantee work experience
                                with approved companies looking for diverse, ambitious talent.</p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Real-World Projects</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">Students work on live
                                company projects, gaining hands-on skills and a tangible portfolio they can showcase to
                                employers.</p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Dedicated Support</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">Our team provides full
                                onboarding, ongoing mentorship, and 24/7 assistance throughout every single internship
                                placement.</p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/themes/vi-theme/assets/img/dark-sliders.png"
                            alt="" class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <h3 class="text-[0.95rem] font-bold text-[#0bbfaa] leading-[1.3]">Seamless Onboarding</h3>
                            <p class="text-[0.82rem] text-white/65 leading-[1.7] font-normal">Quick and easy setup for
                                institutions of any size — get your students placed and productive in under two weeks.
                            </p>
                        </div>
                    </div>

                    <div
                        class="feature-card flex-none w-[400px] h-[200px] rounded-[18px] relative overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,.35)]">
                        <img src="https://www.virtualinternships.com/wp-content/uploads/2023/05/Content1.png" alt=""
                            class="absolute inset-0 w-full h-full object-cover rounded-[18px] z-0" />
                        <div class="relative z-[1] h-full p-[28px_24px] flex flex-col gap-2.5">
                            <p class="text-[0.82rem] text-white/90 font-normal leading-[1.55]">On average, universities
                                that partner with us gain</p>
                            <div
                                class="inline-flex items-center justify-center bg-black/25 rounded-[10px] px-5 py-2.5 my-1 self-start">
                                <span
                                    class="text-[2.2rem] font-black text-white tracking-[-0.02em] leading-none">10X</span>
                            </div>
                            <p class="text-[0.82rem] text-white/90 leading-[1.65] font-normal"><span
                                    class="font-bold text-white">the total number</span> of internship opportunities for
                                their students — <strong class="font-bold text-white">from day one</strong></p>
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
                Results that Count

            </h2>
            <p
                class="mt-3 text-center mb-15 text-[clamp(.88rem,1.4vw,1rem)] font-medium text-[#777] max-w-[900px] mx-auto">
                Increase your students’ employability with a platform customized to help them excel in the dynamic and
                highly competitive job market by providing the skills and expertise that employers demand through
                industry-led projects.
            </p>
            <div class="grid w-full grid-cols-1 gap-y-9 md:grid-cols-2 xl:grid-cols-4 xl:gap-y-0">
                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="0">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#00b5ad]"
                        data-target="250" data-suffix="k+">0k+</div>
                    <div class="mb-1 text-[0.88rem] font-bold text-[#454545]">Global Internships</div>
                    <div class="text-[0.78rem] font-normal text-[#888888]">Available now and growing</div>
                </div>

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out "
                    data-delay="80">
                    <div class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.06em] text-[#7c5cbf]"
                        data-target="80" data-suffix="%">0%</div>
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

                <div class="stat-card flex flex-col items-center px-5 text-center opacity-0 translate-y-[22px] transition-all duration-700 ease-out"
                    data-delay="240">
                    <div
                        class="stat-number mb-2.5 text-[clamp(2.4rem,5vw,3.4rem)] font-bold leading-none tracking-[-0.04em] text-[#f5a623]">
                        <span id="one-in-three">3 in 4</span>
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


    {{-- ═══════════════════════════════════════════════════════════════════
    PARTNER STORIES SLIDER (From Our Partners: Stories of Impact)
    ═══════════════════════════════════════════════════════════════════ --}}
    <section class="w-full bg-[#0d2b2b] overflow-hidden py-[60px] px-5 md:px-8 font-[Poppins]">
        <div class="mx-auto w-full max-w-[1200px]">
            <!-- Section Title -->
            <h2 class="text-center text-white text-4xl md:text-5xl font-black mb-12 tracking-tight">
                From Our Partners: Stories of Impact
            </h2>

            <!-- Slider Shell -->
            <div class="flex items-center gap-4 relative">
                <!-- Left Arrow -->
                <button id="partnerPrevBtn" aria-label="Previous slide"
                    class="flex-shrink-0 w-11 h-11 rounded-full border-2 border-white/25 bg-white/8 text-white text-lg flex items-center justify-center transition-all duration-200 hover:bg-white/18 hover:border-white/50 active:scale-90 disabled:opacity-30 disabled:cursor-not-allowed backdrop-blur-sm">
                    &#8249;
                </button>

                <!-- Viewport / Track -->
                <div class="flex-1 overflow-hidden rounded-3xl cursor-grab" id="partnerViewport">
                    <div class="flex transition-transform duration-500 will-change-transform" id="partnerTrack">
                        <!-- SLIDE 1 -->
                        <div
                            class="flex-shrink-0 w-full bg-[#ffff] rounded-3xl p-12 md:p-16 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 relative overflow-hidden">
                            <!-- Left Column -->
                            <div class="relative z-10">
                                <h3 class="text-2xl md:text-3xl font-bold text-[#0a9a8a] mb-2">Donovan</h3>
                                <p class="text-sm text-gray-600 font-normal leading-relaxed mb-5">
                                    Editor-in-Chief of The Daily Scrum News<br />USA-based news company
                                </p>
                                <p class="text-xs font-bold text-[#0a9a8a] mb-2 tracking-wider">Internship Opportunity:
                                    Marketing</p>
                                <p class="text-sm text-gray-700 leading-relaxed font-normal">
                                    The project involves working on the initial phase of our mobile app development:
                                    formulating a tailored strategy to transform our concept into a thriving
                                    application, encompassing tasks such as identifying users, researching competitors,
                                    setting goals, and choosing a mobile platform.
                                </p>
                            </div>
                            <!-- Right Column -->
                            <div class="flex flex-col gap-5 relative z-10">
                                <div
                                    class="inline-flex items-center gap-2 bg-[#1a1a2e] text-white px-3 py-2 rounded-md w-fit">
                                    <div
                                        class="w-6 h-6 rounded-full bg-[#c9a84c] flex items-center justify-center text-xs text-white font-bold">
                                        ●</div>
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs font-medium text-white/70">THE DAILY SCRUM</span>
                                        <span class="text-sm font-black text-white tracking-wide">NEWS</span>
                                    </div>
                                </div>
                                <p class="text-base font-semibold text-gray-900 leading-relaxed">
                                    "Virtual Internships have been the premiere agency for providing quality, high
                                    caliber interns, providing the needed expertise and resources that will help any
                                    organization free up time, personnel and resources."
                                </p>
                            </div>
                            <!-- Decorative Blobs -->
                            <div
                                class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-black/5 pointer-events-none -mb-20 -ml-20">
                            </div>
                            <div
                                class="absolute bottom-0 left-20 w-44 h-44 rounded-full bg-black/4 pointer-events-none -mb-5">
                            </div>
                        </div>

                        <!-- SLIDE 2 -->
                        <div
                            class="flex-shrink-0 w-full bg-[#f0f0ee] rounded-3xl p-12 md:p-16 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 relative overflow-hidden">
                            <div class="relative z-10">
                                <h3 class="text-2xl md:text-3xl font-bold text-[#0a9a8a] mb-2">Priya Sharma</h3>
                                <p class="text-sm text-gray-600 font-normal leading-relaxed mb-5">
                                    Head of Operations, BrightPath Analytics<br />UK-based data consultancy
                                </p>
                                <p class="text-xs font-bold text-[#0a9a8a] mb-2 tracking-wider">Internship Opportunity:
                                    Data Analysis</p>
                                <p class="text-sm text-gray-700 leading-relaxed font-normal">
                                    Interns will support our analytics team in building dashboards, cleaning large
                                    datasets, and generating actionable insights for clients across the fintech and
                                    retail sectors.
                                </p>
                            </div>
                            <div class="flex flex-col gap-5 relative z-10">
                                <div
                                    class="inline-flex items-center gap-2 bg-[#003087] text-white px-3 py-2 rounded-md w-fit">
                                    <div
                                        class="w-6 h-6 rounded-full bg-[#e8a020] flex items-center justify-center text-xs text-white font-black">
                                        B</div>
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs font-medium text-white/70">BRIGHTPATH</span>
                                        <span class="text-sm font-black text-white tracking-wide">ANALYTICS</span>
                                    </div>
                                </div>
                                <p class="text-base font-semibold text-gray-900 leading-relaxed">
                                    "The interns we've received consistently exceed our expectations. They arrive
                                    prepared and ready to contribute from day one."
                                </p>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-black/5 pointer-events-none -mb-20 -ml-20">
                            </div>
                            <div
                                class="absolute bottom-0 left-20 w-44 h-44 rounded-full bg-black/4 pointer-events-none -mb-5">
                            </div>
                        </div>

                        <!-- SLIDE 3 -->
                        <div
                            class="flex-shrink-0 w-full bg-[#f0f0ee] rounded-3xl p-12 md:p-16 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 relative overflow-hidden">
                            <div class="relative z-10">
                                <h3 class="text-2xl md:text-3xl font-bold text-[#0a9a8a] mb-2">Marcus Reynolds</h3>
                                <p class="text-sm text-gray-600 font-normal leading-relaxed mb-5">
                                    Co-Founder, GreenLoop Solutions<br />Australia-based sustainability startup
                                </p>
                                <p class="text-xs font-bold text-[#0a9a8a] mb-2 tracking-wider">Internship Opportunity:
                                    Environmental Research</p>
                                <p class="text-sm text-gray-700 leading-relaxed font-normal">
                                    This role involves researching sustainable supply chain practices and supporting our
                                    team in developing content for ESG presentations.
                                </p>
                            </div>
                            <div class="flex flex-col gap-5 relative z-10">
                                <div
                                    class="inline-flex items-center gap-2 bg-[#1a4731] text-white px-3 py-2 rounded-md w-fit">
                                    <div
                                        class="w-6 h-6 rounded-full bg-[#4caf50] flex items-center justify-center text-xs text-white font-black">
                                        G</div>
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs font-medium text-white/70">GREENLOOP</span>
                                        <span class="text-sm font-black text-white tracking-wide">SOLUTIONS</span>
                                    </div>
                                </div>
                                <p class="text-base font-semibold text-gray-900 leading-relaxed">
                                    "We were skeptical about remote interns, but this changed our minds entirely. Our
                                    interns delivered research we still reference today."
                                </p>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-black/5 pointer-events-none -mb-20 -ml-20">
                            </div>
                            <div
                                class="absolute bottom-0 left-20 w-44 h-44 rounded-full bg-black/4 pointer-events-none -mb-5">
                            </div>
                        </div>

                        <!-- SLIDE 4 -->
                        <div
                            class="flex-shrink-0 w-full bg-[#f0f0ee] rounded-3xl p-12 md:p-16 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 relative overflow-hidden">
                            <div class="relative z-10">
                                <h3 class="text-2xl md:text-3xl font-bold text-[#0a9a8a] mb-2">Sofia Mendes</h3>
                                <p class="text-sm text-gray-600 font-normal leading-relaxed mb-5">
                                    Creative Director, Studio Lumière<br />France-based design agency
                                </p>
                                <p class="text-xs font-bold text-[#0a9a8a] mb-2 tracking-wider">Internship Opportunity:
                                    Graphic Design</p>
                                <p class="text-sm text-gray-700 leading-relaxed font-normal">
                                    Interns will contribute to live client campaigns, creating visual assets for social
                                    media, brand identity kits, and digital advertising.
                                </p>
                            </div>
                            <div class="flex flex-col gap-5 relative z-10">
                                <div
                                    class="inline-flex items-center gap-2 bg-[#2c1654] text-white px-3 py-2 rounded-md w-fit">
                                    <div
                                        class="w-6 h-6 rounded-full bg-[#e040fb] flex items-center justify-center text-xs text-white font-black">
                                        SL</div>
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs font-medium text-white/70">STUDIO</span>
                                        <span class="text-sm font-black text-white tracking-wide">LUMIÈRE</span>
                                    </div>
                                </div>
                                <p class="text-base font-semibold text-gray-900 leading-relaxed">
                                    "Every intern has brought creativity and dedication that genuinely surprised us. The
                                    quality of talent is outstanding."
                                </p>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-black/5 pointer-events-none -mb-20 -ml-20">
                            </div>
                            <div
                                class="absolute bottom-0 left-20 w-44 h-44 rounded-full bg-black/4 pointer-events-none -mb-5">
                            </div>
                        </div>

                        <!-- SLIDE 5 -->
                        <div
                            class="flex-shrink-0 w-full bg-[#f0f0ee] rounded-3xl p-12 md:p-16 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 relative overflow-hidden">
                            <div class="relative z-10">
                                <h3 class="text-2xl md:text-3xl font-bold text-[#0a9a8a] mb-2">James Okafor</h3>
                                <p class="text-sm text-gray-600 font-normal leading-relaxed mb-5">
                                    CTO, NovaTech Labs<br />Canada-based software company
                                </p>
                                <p class="text-xs font-bold text-[#0a9a8a] mb-2 tracking-wider">Internship Opportunity:
                                    Software Development</p>
                                <p class="text-sm text-gray-700 leading-relaxed font-normal">
                                    Interns will join our engineering team to work on real product features, writing
                                    tested code and shipping to production.
                                </p>
                            </div>
                            <div class="flex flex-col gap-5 relative z-10">
                                <div
                                    class="inline-flex items-center gap-2 bg-[#0d1b3e] text-white px-3 py-2 rounded-md w-fit">
                                    <div
                                        class="w-6 h-6 rounded-full bg-[#1565c0] flex items-center justify-center text-xs text-white font-black">
                                        NT</div>
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs font-medium text-white/70">NOVATECH</span>
                                        <span class="text-sm font-black text-white tracking-wide">LABS</span>
                                    </div>
                                </div>
                                <p class="text-base font-semibold text-gray-900 leading-relaxed">
                                    "Virtual Internships has become our primary pipeline for junior developer talent.
                                    We've converted two interns into full-time hires."
                                </p>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-black/5 pointer-events-none -mb-20 -ml-20">
                            </div>
                            <div
                                class="absolute bottom-0 left-20 w-44 h-44 rounded-full bg-black/4 pointer-events-none -mb-5">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Arrow -->
                <button id="partnerNextBtn" aria-label="Next slide"
                    class="flex-shrink-0 w-11 h-11 rounded-full border-2 border-white/25 bg-white/8 text-white text-lg flex items-center justify-center transition-all duration-200 hover:bg-white/18 hover:border-white/50 active:scale-90 disabled:opacity-30 disabled:cursor-not-allowed backdrop-blur-sm">
                    &#8250;
                </button>
            </div>

            <!-- Dots -->
            <div id="partnerDotsRow" class="flex justify-center gap-2 mt-8"></div>
        </div>

        <script>
            (function () {
                const track = document.getElementById('partnerTrack');
                const viewport = document.getElementById('partnerViewport');
                const prevBtn = document.getElementById('partnerPrevBtn');
                const nextBtn = document.getElementById('partnerNextBtn');
                const dotsRow = document.getElementById('partnerDotsRow');

                const slides = track.querySelectorAll('.flex-shrink-0');
                const total = slides.length;
                let current = 0;

                // Build dots
                slides.forEach((_, i) => {
                    const dot = document.createElement('button');
                    dot.className = 'dot w-2 h-2 rounded-full bg-white/30 transition-all duration-200 cursor-pointer ' + (i === 0 ? 'active w-6 bg-[#0a9a8a]' : '');
                    dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                    dot.addEventListener('click', () => goTo(i));
                    dotsRow.appendChild(dot);
                });

                function updateDots() {
                    dotsRow.querySelectorAll('.dot').forEach((d, i) => {
                        if (i === current) {
                            d.classList.add('active', 'w-6', 'bg-[#0a9a8a]');
                            d.classList.remove('bg-white/30', 'w-2');
                        } else {
                            d.classList.remove('active', 'w-6', 'bg-[#0a9a8a]');
                            d.classList.add('bg-white/30', 'w-2');
                        }
                    });
                }

                function goTo(index) {
                    current = Math.max(0, Math.min(index, total - 1));
                    track.style.transform = `translateX(-${current * 100}%)`;
                    prevBtn.disabled = current === 0;
                    nextBtn.disabled = current === total - 1;
                    updateDots();
                }

                prevBtn.addEventListener('click', () => goTo(current - 1));
                nextBtn.addEventListener('click', () => goTo(current + 1));

                // Drag/swipe
                let startX = 0, startTranslate = 0, isDragging = false, currentTranslate = 0;

                function getX(e) {
                    return e.touches ? e.touches[0].clientX : e.clientX;
                }

                viewport.addEventListener('mousedown', dragStart, { passive: true });
                viewport.addEventListener('touchstart', dragStart, { passive: true });
                window.addEventListener('mousemove', dragMove, { passive: false });
                window.addEventListener('touchmove', dragMove, { passive: false });
                window.addEventListener('mouseup', dragEnd);
                window.addEventListener('touchend', dragEnd);

                function dragStart(e) {
                    isDragging = true;
                    startX = getX(e);
                    startTranslate = current * viewport.offsetWidth;
                    track.style.transition = 'none';
                    viewport.classList.add('is-dragging');
                }

                function dragMove(e) {
                    if (!isDragging) return;
                    const delta = getX(e) - startX;
                    currentTranslate = startTranslate - delta;
                    const clampedPx = Math.max(0, Math.min(currentTranslate, (total - 1) * viewport.offsetWidth));
                    track.style.transform = `translateX(-${clampedPx}px)`;
                }

                function dragEnd() {
                    if (!isDragging) return;
                    isDragging = false;
                    viewport.classList.remove('is-dragging');
                    track.style.transition = '';
                    const moved = currentTranslate - startTranslate;
                    const threshold = viewport.offsetWidth * 0.2;

                    if (moved > threshold && current < total - 1) {
                        goTo(current + 1);
                    } else if (moved < -threshold && current > 0) {
                        goTo(current - 1);
                    } else {
                        goTo(current);
                    }
                }

                goTo(0);
            })();
        </script>
    </section>



    <section class="w-full bg-white py-[60px] px-5">
        <div class="w-full max-w-[1160px] mx-auto font-[Poppins]">
            <h2 class="text-[2.2rem] font-extrabold text-[#0bbfaa] mb-10">Find Out More</h2>

            <div class="relative flex items-center">
                <button id="uniFindPrevBtn" aria-label="Previous"
                    class="flex-shrink-0 w-[42px] h-[42px] rounded-full border border-gray-300 bg-white text-[#555] text-xl flex items-center justify-center shadow-[0_2px_8px_rgba(0,0,0,.08)] transition hover:border-[#0bbfaa] hover:text-[#0bbfaa] hover:shadow-[0_4px_16px_rgba(11,191,170,.18)] active:scale-95 disabled:opacity-30 disabled:pointer-events-none">
                    &#8249;
                </button>

                <div id="uniFindViewport" class="flex-1 overflow-hidden cursor-grab mx-4">
                    <div id="uniFindTrack"
                        class="flex gap-0 transition-transform duration-[450ms] ease-[cubic-bezier(.4,0,.2,1)] will-change-transform">
                        <div class="uni-find-page flex-shrink-0 w-full grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="flex flex-col gap-4">
                                <div class="w-full aspect-video rounded-xl overflow-hidden bg-[#e8e8e8]">
                                    <img src="https://www.virtualinternships.com/wp-content/uploads/2023/04/Image-17.png"
                                        alt="Universities campus with cherry blossoms"
                                        class="w-full h-full object-cover block" />
                                </div>
                                <div class="flex flex-col gap-2.5">
                                    <h3 class="text-[1.05rem] font-bold text-[#111] leading-[1.4]">How Universities Can
                                        Strategically Combat Top Challenges in 2023</h3>
                                    <p class="text-[.84rem] text-[#555] leading-[1.7] font-normal">In 2023, higher
                                        education will face some significant challenges. Using insight from partners in
                                        the industry, here's how to overcome them.</p>
                                    <a href="#"
                                        class="text-[.84rem] font-bold text-[#0bbfaa] inline-block mt-0.5 hover:opacity-75 hover:underline">Read
                                        article</a>
                                </div>
                            </div>

                            <div class="flex flex-col gap-4">
                                <div class="w-full aspect-video rounded-xl overflow-hidden bg-[#e8e8e8]">
                                    <img src="https://www.virtualinternships.com/wp-content/uploads/2023/06/Image.png"
                                        alt="Challenges Facing State Universities and How to Solve Them"
                                        class="w-full h-full object-cover block" />
                                </div>
                                <div class="flex flex-col gap-2.5">
                                    <h3 class="text-[1.05rem] font-bold text-[#111] leading-[1.4]">The Challenges State
                                        Universities in the US Face and How Work-Integrated Learning Helps Solve Them
                                    </h3>
                                    <p class="text-[.84rem] text-[#555] leading-[1.7] font-normal">David Armstrong,
                                        international educator and former president of Broward College, USA, joined
                                        Virtual Internships to talk about the challenges facing higher education today
                                    </p>
                                    <a href="#"
                                        class="text-[.84rem] font-bold text-[#0bbfaa] inline-block mt-0.5 hover:opacity-75 hover:underline">Watch
                                        Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="uni-find-page flex-shrink-0 w-full grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="flex flex-col gap-4">
                                <div class="w-full aspect-video rounded-xl overflow-hidden bg-[#e8e8e8]">
                                    <img src="https://www.virtualinternships.com/wp-content/uploads/2024/05/website-blog-tiles.jpg"
                                        alt="Future of remote internships" class="w-full h-full object-cover block" />
                                </div>
                                <div class="flex flex-col gap-2.5">
                                    <h3 class="text-[1.05rem] font-bold text-[#111] leading-[1.4]">The Future of Remote
                                        Internships: Trends Shaping Higher Education in 2024</h3>
                                    <p class="text-[.84rem] text-[#555] leading-[1.7] font-normal">As remote work
                                        becomes the norm, universities are rethinking how they prepare students for the
                                        modern workforce through virtual experiential learning.</p>
                                    <a href="#"
                                        class="text-[.84rem] font-bold text-[#0bbfaa] inline-block mt-0.5 hover:opacity-75 hover:underline">Read
                                        article</a>
                                </div>
                            </div>

                            <div class="flex flex-col gap-4">
                                <div class="w-full aspect-video rounded-xl overflow-hidden bg-[#e8e8e8]">
                                    <img src="https://www.virtualinternships.com/wp-content/uploads/2023/04/Image-17.png"
                                        alt="Employability skills for graduates"
                                        class="w-full h-full object-cover block" />
                                </div>
                                <div class="flex flex-col gap-2.5">
                                    <h3 class="text-[1.05rem] font-bold text-[#111] leading-[1.4]">Building
                                        Employability Skills: Why Experiential Learning is the Key to Graduate Success
                                    </h3>
                                    <p class="text-[.84rem] text-[#555] leading-[1.7] font-normal">Graduates who
                                        complete work-integrated learning programs are 40% more likely to secure
                                        employment within three months of graduation, according to new research.</p>
                                    <a href="#"
                                        class="text-[.84rem] font-bold text-[#0bbfaa] inline-block mt-0.5 hover:opacity-75 hover:underline">Watch
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button id="uniFindNextBtn" aria-label="Next"
                    class="flex-shrink-0 w-[42px] h-[42px] rounded-full border border-gray-300 bg-white text-[#555] text-xl flex items-center justify-center shadow-[0_2px_8px_rgba(0,0,0,.08)] transition hover:border-[#0bbfaa] hover:text-[#0bbfaa] hover:shadow-[0_4px_16px_rgba(11,191,170,.18)] active:scale-95 disabled:opacity-30 disabled:pointer-events-none">
                    &#8250;
                </button>
            </div>

            <div id="uniFindDots" class="flex justify-center gap-2 mt-8"></div>
        </div>

        <script>
            (function () {
                const track = document.getElementById('uniFindTrack');
                const viewport = document.getElementById('uniFindViewport');
                const prevBtn = document.getElementById('uniFindPrevBtn');
                const nextBtn = document.getElementById('uniFindNextBtn');
                const dotsRow = document.getElementById('uniFindDots');

                if (!track || !viewport || !prevBtn || !nextBtn || !dotsRow) return;

                const pages = track.querySelectorAll('.uni-find-page');
                const total = pages.length;
                let current = 0;
                let dragging = false;
                let dragStartX = 0;
                let dragLastX = 0;

                pages.forEach((_, i) => {
                    const dot = document.createElement('button');
                    dot.className = 'w-[9px] h-[9px] rounded-full bg-[#ccc] border-0 p-0 cursor-pointer transition';
                    if (i === 0) dot.classList.add('bg-[#0bbfaa]', 'scale-125');
                    dot.setAttribute('aria-label', `Page ${i + 1}`);
                    dot.addEventListener('click', () => goTo(i));
                    dotsRow.appendChild(dot);
                });

                function syncDots() {
                    dotsRow.querySelectorAll('button').forEach((d, i) => {
                        d.classList.toggle('bg-[#0bbfaa]', i === current);
                        d.classList.toggle('scale-125', i === current);
                        d.classList.toggle('bg-[#ccc]', i !== current);
                    });
                }

                function syncArrows() {
                    prevBtn.disabled = current === 0;
                    nextBtn.disabled = current === total - 1;
                }

                function goTo(index) {
                    current = Math.max(0, Math.min(index, total - 1));
                    track.style.transition = 'transform .45s cubic-bezier(.4,0,.2,1)';
                    track.style.transform = `translateX(-${current * 100}%)`;
                    syncDots();
                    syncArrows();
                }

                prevBtn.addEventListener('click', () => goTo(current - 1));
                nextBtn.addEventListener('click', () => goTo(current + 1));

                function start(x) {
                    dragging = true;
                    dragStartX = x;
                    dragLastX = x;
                    viewport.classList.add('cursor-grabbing');
                }

                function move(x) {
                    if (!dragging) return;
                    dragLastX = x;
                    const delta = dragStartX - x;
                    const base = current * viewport.offsetWidth;
                    const maxX = (total - 1) * viewport.offsetWidth;
                    track.style.transition = 'none';
                    track.style.transform = `translateX(-${Math.max(0, Math.min(base + delta, maxX))}px)`;
                }

                function end() {
                    if (!dragging) return;
                    dragging = false;
                    viewport.classList.remove('cursor-grabbing');
                    const delta = dragStartX - dragLastX;
                    const threshold = viewport.offsetWidth * 0.2;
                    if (delta > threshold && current < total - 1) goTo(current + 1);
                    else if (delta < -threshold && current > 0) goTo(current - 1);
                    else goTo(current);
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

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') goTo(current - 1);
                    if (e.key === 'ArrowRight') goTo(current + 1);
                });

                goTo(0);
            })();
        </script>
    </section>




    <section id="hero-section" class="relative z-0 overflow-hidden bg-no-repeat bg-cover bg-center" style="opacity: 1; background-color : #ffffff; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/Frame-47.png'); 
    background-size: 100% auto; background-position: right;">
        <div
            class="mx-auto grid w-full max-w-[1100px] grid-cols-1 items-center gap-4 px-4 pb-6 pt-10 md:grid-cols-[minmax(0,1.05fr)_minmax(280px,0.95fr)] md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both]">
                <h1
                    class="max-w-4xl font-[Poppins] text-[clamp(1.6rem,3vw,2.4rem)] font-extrabold leading-[1.5] tracking-[-0.03em] text-[#444444]">
                    Let’s Chat and
                    <span class="text-[#00b1aa]">Increase Student Employability Today!</span>

                </h1>
                <p class="mt-4 font-[Nunito] text-base font-semibold text-[#7a7a7a]">
                    Schedule a call with us to discover how our platform can provide your students with invaluable
                    global work experience and increase student employability.
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