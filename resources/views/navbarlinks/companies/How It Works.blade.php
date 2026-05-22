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
    <section id="hero-section" class="relative z-0 overflow-hidden bg-no-repeat bg-cover bg-center h-90 mt-12" style="opacity: 1;  background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/our-story-header.png');
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
                    Revolutionize Your Hiring Process
                </h1>

                <p class="mt-4 mx-auto max-w-md font-[Nunito] text-base font-semibold text-[#ffffff]">
                    Access diverse talent from around the globe eager to impact the future of your business.
                </p>

                <div class="mt-7 flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-4 py-2.5 text-xs font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                            aria-hidden="true">
                            <path
                                d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-10-2h4v2h-4V5Zm10 15H4V9h16v11Z" />
                        </svg>
                        Sign-Up Now
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
                Leverage the Power<br>of Remote Interns
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
                        <strong class="text-[#1e1e1e] font-bold">Digital Mastery:</strong> Born in the tech era, our
                        interns navigate and adopt new technologies effortlessly, positioning your business at the
                        forefront of innovation.
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
                        <strong class="text-[#1e1e1e] font-bold">Innovative Thinking:</strong> Remote interns bring
                        fresh and groundbreaking perspectives, often challenging the norm due to their diverse
                        backgrounds.
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
                        <strong class="text-[#1e1e1e] font-bold">Enthusiasm and Flexibility:</strong> Eager to learn
                        and versatile, remote interns readily adjust to a myriad of projects and tasks.
                    </p>
                </div>

                <div class="grid grid-cols-[44px_1fr] gap-x-3.5 items-start">
                    <div
                        class="w-10 h-10 border-2 border-[#00b5ad] rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                        <svg viewBox="0 0 24 24"
                            class="w-5 h-5 stroke-[#00b5ad] fill-none stroke-[1.8px] stroke-linecap-round stroke-linejoin-round">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                        </svg>
                    </div>
                    <p class="text-[0.88rem] text-[#555] leading-[1.7]">
                        <strong class="text-[#1e1e1e] font-bold">Nurturing Future Leaders:</strong> Remote interns
                        are already attuned to your digital work culture, allowing you to engage with future stars.
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
                    src="https://i.ytimg.com/vi/imL_BkR93qo/maxresdefault.jpg" alt="Video thumbnail"
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


    {{-- ═══════════════════════════════════════════════════════════════════
    Remote Intern Advantage
    ═══════════════════════════════════════════════════════════════════ --}}

    <section id="remote-intern-advantages" class="bg-white px-4 py-[60px] sm:px-6 lg:px-10">
        <div class="mx-auto max-w-[1100px] font-[Poppins]">
            <h2 class="text-[clamp(1.8rem,4vw,3rem)] font-extrabold leading-[1.2] text-[#444444]">
                The Remote Intern Advantage:
                <span class="block text-[#00b1aa]">Transforming Businesses</span>
            </h2>

            <p class="mt-3 max-w-[520px] text-[0.82rem] leading-[1.75] text-[#777777]">
                Our cutting-edge platform recommends remote intern matches based on your specific project needs,
                ensuring seamless integration. We provide unwavering support before and during the internship,
                guaranteeing a productive collaboration for all involved.
            </p>

            <div class="mt-9 grid grid-cols-1 gap-4 md:grid-cols-3">
                <article class="group relative aspect-[4/3] overflow-hidden rounded-[18px]">
                    <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=600&q=80"
                        alt="Rapid Talent Acquisition"
                        class="h-full w-full object-cover transition-transform duration-[4s] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.18]" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/5 transition-colors duration-500 group-hover:bg-black/60">
                    </div>
                    <div
                        class="absolute inset-0 flex items-center justify-center px-7 opacity-0 translate-y-[18px] transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-left text-[0.8rem] font-normal leading-[1.8] text-white">
                            Find the right intern fast. Our smart-matching system surfaces candidates tailored to your
                            project scope, saving you hours of screening time.
                        </p>
                    </div>
                    <div
                        class="absolute inset-x-0 bottom-0 flex items-end gap-2 px-[18px] py-[20px] transition-all duration-300 group-hover:pointer-events-none group-hover:translate-y-[10px] group-hover:opacity-0">
                        <span class="h-[36px] w-[3px] shrink-0 rounded-[3px] bg-[#00b49c]"></span>
                        <h3 class="text-[0.95rem] font-bold leading-[1.3] text-white">
                            Rapid Talent<br>Acquisition
                        </h3>
                    </div>
                </article>

                <article class="group relative aspect-[4/3] overflow-hidden rounded-[18px]">
                    <img src="https://img.freepik.com/free-photo/african-american-business-woman-working-computer_1303-9873.jpg?semt=ais_hybrid&w=740&q=80"
                        alt="Rapid Talent Acquisition"
                        class="h-full w-full object-cover transition-transform duration-[4s] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.18]" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/5 transition-colors duration-500 group-hover:bg-black/60">
                    </div>
                    <div
                        class="absolute inset-0 flex items-center justify-center px-7 opacity-0 translate-y-[18px] transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-left text-[0.8rem] font-normal leading-[1.8] text-white">

                            Dedicated Growth Potential
                            An impressive 60% of our remote interns are committed to dedicating 360 hours to your
                            business. Moreover, 76% of our remote interns consistently invest 30 hours weekly, ensuring
                            they're actively engaged and contributing to your brand's vision.
                        </p>
                    </div>
                    <div
                        class="absolute inset-x-0 bottom-0 flex items-end gap-2 px-[18px] py-[20px] transition-all duration-300 group-hover:pointer-events-none group-hover:translate-y-[10px] group-hover:opacity-0">
                        <span class="h-[36px] w-[3px] shrink-0 rounded-[3px] bg-[#00b49c]"></span>
                        <h3 class="text-[0.95rem] font-bold leading-[1.3] text-white">
                            Dedicated <br>Growth Potential

                        </h3>
                    </div>
                </article>

                <article class="group relative aspect-[4/3] overflow-hidden rounded-[18px]">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&q=80"
                        alt="Maximized Cost Efficiency"
                        class="h-full w-full object-cover transition-transform duration-[4s] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.18]" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/5 transition-colors duration-500 group-hover:bg-black/60">
                    </div>
                    <div
                        class="absolute inset-0 flex items-center justify-center px-7 opacity-0 translate-y-[18px] transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-left text-[0.8rem] font-normal leading-[1.8] text-white">
                            Cut hiring costs without cutting quality. Remote interns deliver real value at a fraction
                            of the cost of full-time hires, maximizing your ROI from day one.
                        </p>
                    </div>
                    <div
                        class="absolute inset-x-0 bottom-0 flex items-end gap-2 px-[18px] py-[20px] transition-all duration-300 group-hover:pointer-events-none group-hover:translate-y-[10px] group-hover:opacity-0">
                        <span class="h-[36px] w-[3px] shrink-0 rounded-[3px] bg-[#00b49c]"></span>
                        <h3 class="text-[0.95rem] font-bold leading-[1.3] text-white">
                            Maximized Cost<br>Efficiency
                        </h3>
                    </div>
                </article>

                <article class="group relative aspect-[4/3] overflow-hidden rounded-[18px]">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600&q=80"
                        alt="Strategize for Tomorrow"
                        class="h-full w-full object-cover transition-transform duration-[4s] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.18]" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/5 transition-colors duration-500 group-hover:bg-black/60">
                    </div>
                    <div
                        class="absolute inset-0 flex items-center justify-center px-7 opacity-0 translate-y-[18px] transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-left text-[0.8rem] font-normal leading-[1.8] text-white">
                            Build a pipeline of future talent now. By working with motivated interns today, you're
                            investing in the workforce leaders of tomorrow.
                        </p>
                    </div>
                    <div
                        class="absolute inset-x-0 bottom-0 flex items-end gap-2 px-[18px] py-[20px] transition-all duration-300 group-hover:pointer-events-none group-hover:translate-y-[10px] group-hover:opacity-0">
                        <span class="h-[36px] w-[3px] shrink-0 rounded-[3px] bg-[#00b49c]"></span>
                        <h3 class="text-[0.95rem] font-bold leading-[1.3] text-white">
                            Strategize for<br>Tomorrow
                        </h3>
                    </div>
                </article>

                <article class="group relative aspect-[4/3] overflow-hidden rounded-[18px]">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80"
                        alt="Quality Assured Pre-Screened Interns"
                        class="h-full w-full object-cover transition-transform duration-[4s] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.18]" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/5 transition-colors duration-500 group-hover:bg-black/60">
                    </div>
                    <div
                        class="absolute inset-0 flex items-center justify-center px-7 opacity-0 translate-y-[18px] transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-left text-[0.8rem] font-normal leading-[1.8] text-white">
                            Every intern on our platform is vetted and pre-screened. You get access only to candidates
                            who meet our high standards for skill and commitment.
                        </p>
                    </div>
                    <div
                        class="absolute inset-x-0 bottom-0 flex items-end gap-2 px-[18px] py-[20px] transition-all duration-300 group-hover:pointer-events-none group-hover:translate-y-[10px] group-hover:opacity-0">
                        <span class="h-[36px] w-[3px] shrink-0 rounded-[3px] bg-[#00b49c]"></span>
                        <h3 class="text-[0.95rem] font-bold leading-[1.3] text-white">
                            Quality Assured,<br>Pre-Screened Interns
                        </h3>
                    </div>
                </article>

                <article class="group relative aspect-[4/3] overflow-hidden rounded-[18px]">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&q=80"
                        alt="Seamless Integration"
                        class="h-full w-full object-cover transition-transform duration-[4s] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.18]" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/5 transition-colors duration-500 group-hover:bg-black/60">
                    </div>
                    <div
                        class="absolute inset-0 flex items-center justify-center px-7 opacity-0 translate-y-[18px] transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-left text-[0.8rem] font-normal leading-[1.8] text-white">
                            Onboarding a remote intern has never been easier. Our platform provides tools and guidance
                            to integrate interns into your workflows from day one.
                        </p>
                    </div>
                    <div
                        class="absolute inset-x-0 bottom-0 flex items-end gap-2 px-[18px] py-[20px] transition-all duration-300 group-hover:pointer-events-none group-hover:translate-y-[10px] group-hover:opacity-0">
                        <span class="h-[36px] w-[3px] shrink-0 rounded-[3px] bg-[#00b49c]"></span>
                        <h3 class="text-[0.95rem] font-bold leading-[1.3] text-white">
                            Seamless Integration
                        </h3>
                    </div>
                </article>
            </div>
        </div>
    </section>


    <!-- Inserted section converted from Things_to_add.html (Tailwind) - improved styling -->
    <section
        class="relative w-full overflow-hidden bg-[#f7f8f8] pt-[72px] px-[40px] pb-[80px] flex flex-col items-center font-[Poppins] bg-no-repeat bg-cover bg-center"
        style="opacity: 1; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/03/light-bg-with-vector.jpg'); background-size: 100% auto; background-position: center;">

        <h2 id="how-to-hire" class="text-3xl md:text-4xl font-extrabold text-[#1a1a2e] leading-tight text-center">
            How to Hire Talent
            <br>
            <span class="text-[#00b49c]">from Our Platform</span>
        </h2>
        <p class="mt-3 text-center text-sm md:text-base text-gray-500 max-w-[760px] mx-auto">Unlock your company's
            potential with the
            remote intern advantage in three easy steps.</p>

        <div class="mt-10 grid gap-8 md:grid-cols-3">
            <!-- Card 1 -->
            <article
                class="relative bg-white rounded-2xl p-8 md:p-10 min-h-[220px] text-center shadow-2xl overflow-hidden transition-transform duration-300 ">
                <svg class="absolute -right-16 -bottom-12 w-64 h-64 opacity-10" viewBox="0 0 200 200"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill="#f3f4f6"
                        d="M44.7,-11.2C58.9,8.4,72.9,29.6,67.8,36.6C62.7,43.6,38.5,36.4,21.1,30.6C3.6,24.8,-7.3,20.5,-20.1,13.9C-32.9,7.3,-47.6,-2.7,-45.6,-12.4C-43.6,-22.1,-24,-31.6,-4.7,-30.8C14.7,-30,29.4,-19.8,44.7,-11.2Z"
                        transform="translate(100 100)" />
                </svg>

                <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center text-white"
                    style="background-color: #7c5cbf;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path
                            d="M20 3H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h6v2H8v2h8v-2h-2v-2h6a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm0 13H4V5h16v11z" />
                    </svg>
                </div>

                <h3 class="text-lg md:text-xl font-semibold text-[#7c5cbf]">Access the Platform</h3>
                <p class="mt-3 text-sm md:text-[0.96rem] text-gray-500 leading-relaxed max-w-[34rem] mx-auto">Complete
                    your host company profile and add your Internship Opportunity.</p>
            </article>

            <!-- Card 2 -->
            <article
                class="relative bg-white rounded-2xl p-8 md:p-10 min-h-[220px] text-center shadow-2xl overflow-hidden transition-transform duration-300 ">
                <svg class="absolute -right-16 -bottom-12 w-64 h-64 opacity-10" viewBox="0 0 200 200"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill="#fef2f2"
                        d="M34.7,-8.6C47.3,6.1,59.8,20.7,58.6,27.5C57.4,34.3,42.6,33.3,28.2,31.6C13.8,29.8,0,27.3,-13.9,24.1C-27.9,21,-55.7,17.3,-58.7,8.2C-61.7,-0.8,-40.9,-14.6,-26.6,-22.5C-12.3,-30.4,-6.1,-32.4,6.8,-36.4C19.6,-40.4,22.1,-22.4,34.7,-8.6Z"
                        transform="translate(100 100)" />
                </svg>

                <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center text-white"
                    style="background-color: #e94f6b;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path
                            d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                    </svg>
                </div>

                <h3 class="text-lg md:text-xl font-semibold text-[#e94f6b]">View Intern Profiles</h3>
                <p class="mt-3 text-sm md:text-[0.96rem] text-gray-500 leading-relaxed max-w-[34rem] mx-auto">Upon
                    approval, browse our talented interns ready to contribute to your company's success.</p>
            </article>

            <!-- Card 3 -->
            <article
                class="relative bg-white rounded-2xl p-8 md:p-10 min-h-[220px] text-center shadow-2xl overflow-hidden transition-transform duration-300 ">
                <svg class="absolute -right-16 -bottom-12 w-64 h-64 opacity-10" viewBox="0 0 200 200"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill="#fff7ed"
                        d="M42.7,-9.8C56.5,3.6,68,21.9,62.6,30.7C57.2,39.5,34.8,38.7,16.8,36.9C-1.1,35.1,-14.6,32.4,-31.1,26.8C-47.6,21.2,-67.9,12.8,-68.9,2.9C-69.9,-7.1,-51.6,-18.9,-36.2,-28.4C-20.8,-37.9,-10.4,-45,1.9,-47.5C14.2,-50,28.3,-47.2,42.7,-9.8Z"
                        transform="translate(100 100)" />
                </svg>

                <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center text-white"
                    style="background-color: #f5a623;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path
                            d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                    </svg>
                </div>

                <h3 class="text-lg md:text-xl font-semibold text-[#f5a623]">Interview</h3>
                <p class="mt-3 text-sm md:text-[0.96rem] text-gray-500 leading-relaxed max-w-[34rem] mx-auto">Select the
                    interns that align with your project needs, proceed to interview, and begin the internship.</p>
            </article>
        </div>

        <!-- No extra JS required for this static section. If you had scripts in the original file, paste them below. -->
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
                            class="flex-shrink-0 w-full bg-[#f0f0ee] rounded-3xl p-12 md:p-16 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 relative overflow-hidden">
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

    {{-- Talent Spotlight (Tailwindized) — inserted from Things_to_add.html
    Converted CSS to Tailwind utilities and included JS below. --}}

    <section class="w-full bg-[#f0f0f0] py-10">
        <div class="max-w-[1260px] mx-auto px-4">
            <div class="mb-9 text-center">
                <h2 class="text-2xl font-extrabold text-[#18c5a9]">Talent Spotlight</h2>
                <p class="text-sm text-gray-600 mt-2">A glimpse into the caliber of remote interns to hire.</p>
            </div>

            <div class="flex items-center gap-4">
                <button id="talentPrev" aria-label="Previous"
                    class="flex-shrink-0 w-10 h-10 rounded-full border border-gray-300 bg-white flex items-center justify-center shadow-sm hover:border-[#18c5a9] transition-colors">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-4 h-4 text-gray-600">
                        <polyline points="15 18 9 12 15 6" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></polyline>
                    </svg>
                </button>

                <div id="talentViewport" class="flex-1 overflow-hidden mx-4 cursor-grab">
                    <div id="talentTrack" class="flex gap-6 transition-transform duration-300 will-change-transform">

                        <!-- Card 1 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#e8f9f6]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Abil&backgroundColor=b6e3f4"
                                    alt="Abil" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇺🇸</span>
                                        <span class="text-lg font-bold text-[#111]">Abil</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: JavaScript Mastery</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Energetic computer science student and Web
                                Development Fellow specializing in full-stack applications. Passionate about advancing
                                in web development and actively seeking internship opportunities to create impactful,
                                user-friendly web applications.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">JavaScript</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Data
                                    Visualization</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Full-Stack
                                    Web Development</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+10</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">8 Weeks</span></div>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#ffdce1]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Nancy&backgroundColor=ffd5dc"
                                    alt="Nancy" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇬🇧</span>
                                        <span class="text-lg font-bold text-[#111]">Nancy</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: BSc Mechanical Engineering</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Having pursued an engineering degree, this
                                graduate is looking to apply her academic knowledge to pursue a career in mechanical and
                                aerospace engineering, with a focus on research that addresses sustainability and social
                                justice problems.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Technical
                                    Knowledge</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Critical
                                    Thinking</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Innovation</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+10</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">12 Weeks</span></div>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#cdece1]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Carlos&backgroundColor=c0e8d5"
                                    alt="Carlos" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇪🇸</span>
                                        <span class="text-lg font-bold text-[#111]">Carlos</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: Data Science Professional</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Passionate data science graduate with a
                                strong foundation in machine learning and statistical analysis. Experienced in Python
                                and R, eager to apply predictive modeling skills to real-world business challenges
                                across multiple industries.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Python</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Machine
                                    Learning</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Data
                                    Analysis</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+8</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">6 Weeks</span></div>
                        </div>

                        <!-- Card 4 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#fff0d9]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Yuki&backgroundColor=ffecc7"
                                    alt="Yuki" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇯🇵</span>
                                        <span class="text-lg font-bold text-[#111]">Yuki</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: UX/UI Design Fundamentals</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Creative design student passionate about
                                crafting intuitive user experiences. Proficient in Figma and Adobe XD, with a portfolio
                                of mobile and web design projects focused on accessibility and delightful
                                micro-interactions.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Figma</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">UX
                                    Research</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Prototyping</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+7</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">10 Weeks</span></div>
                        </div>

                        <!-- Card 5 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#e6ddff]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Amara&backgroundColor=d4c5f9"
                                    alt="Amara" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇳🇬</span>
                                        <span class="text-lg font-bold text-[#111]">Amara</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: Cloud Computing AWS</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Ambitious cloud engineering student with
                                hands-on experience in AWS infrastructure, DevOps pipelines, and containerisation.
                                Seeking a role where she can contribute to scalable, resilient cloud architectures for
                                growing tech companies.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">AWS</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Docker</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">CI/CD</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+9</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">16 Weeks</span></div>
                        </div>

                        <!-- Additional cards (Luca, Sofia, Kofi) follow same structure -->
                        <!-- Card 6 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#b6e3f4]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Luca&backgroundColor=b6e3f4"
                                    alt="Luca" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇮🇹</span>
                                        <span class="text-lg font-bold text-[#111]">Luca</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: Mobile App Development</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Mobile developer specializing in React
                                Native and Flutter with a track record of shipping cross-platform apps to production.
                                Driven by clean architecture and performance optimisation, aiming to join a product team
                                building consumer mobile experiences.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">React
                                    Native</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Flutter</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Firebase</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+6</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">8 Weeks</span></div>
                        </div>

                        <!-- Card 7 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#ffd5dc]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Sofia&backgroundColor=ffd5dc"
                                    alt="Sofia" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇧🇷</span>
                                        <span class="text-lg font-bold text-[#111]">Sofia</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: Digital Marketing Analytics</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Marketing graduate with a quantitative
                                mindset, skilled in Google Analytics, SEO strategy, and paid social campaigns.
                                Passionate about bridging creative storytelling with data-driven decisions to grow brand
                                awareness and user acquisition.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">SEO</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Google
                                    Analytics</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Content
                                    Strategy</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+5</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">12 Weeks</span></div>
                        </div>

                        <!-- Card 8 -->
                        <div
                            class="bg-white rounded-[18px] p-7 min-w-[calc(50%-12px)] max-w-[calc(50%-12px)] flex-shrink-0 shadow-md">
                            <div class="flex items-center gap-4 mb-3">
                                <img class="w-14 h-14 rounded-full object-cover border-2 border-[#c0e8d5]"
                                    src="https://api.dicebear.com/7.x/personas/svg?seed=Kofi&backgroundColor=c0e8d5"
                                    alt="Kofi" />
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">🇬🇭</span>
                                        <span class="text-lg font-bold text-[#111]">Kofi</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">Certification: Cybersecurity Fundamentals</div>
                            <p class="text-sm text-gray-700 leading-6 mb-4">Cybersecurity enthusiast with practical
                                knowledge of network security, ethical hacking, and vulnerability assessment. Committed
                                to building safer digital environments and actively contributes to open-source security
                                tooling projects.</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Network
                                    Security</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Ethical
                                    Hacking</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">Linux</span>
                                <span
                                    class="text-xs font-medium text-gray-800 bg-gray-100 border border-gray-200 rounded-full px-3 py-1">+11</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">Availability: <span
                                    class="text-[#18c5a9] font-bold">20 Weeks</span></div>
                        </div>

                    </div><!-- /talentTrack -->
                </div><!-- /talentViewport -->

                <button id="talentNext" aria-label="Next"
                    class="flex-shrink-0 w-10 h-10 rounded-full border border-gray-300 bg-white flex items-center justify-center shadow-sm hover:border-[#18c5a9] transition-colors">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-4 h-4 text-gray-600">
                        <polyline points="9 18 15 12 9 6" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></polyline>
                    </svg>
                </button>
            </div>

            <!-- Dots -->
            <div id="talentDots" class="flex justify-center gap-2 mt-6"></div>

            <!-- CTA -->
            <div class="flex justify-center mt-8">
                <button
                    class="px-6 py-3 border-2 border-gray-900 rounded-md font-semibold hover:bg-gray-900 hover:text-white transition">Get
                    Matched</button>
            </div>
        </div>

        <script>
            (function () {
                const track = document.getElementById('talentTrack');
                const viewport = document.getElementById('talentViewport');
                const prevBtn = document.getElementById('talentPrev');
                const nextBtn = document.getElementById('talentNext');
                const dotsEl = document.getElementById('talentDots');

                const CARDS = track.querySelectorAll('.bg-white').length; // More reliable count
                const SHOW = 2;
                const STEPS = Math.max(1, CARDS - SHOW + 1);
                let current = 0;
                let cardWidth = 0;
                let gap = 24; // gap-6 = 24px

                function updateCardWidth() {
                    const firstCard = track.querySelector('.bg-white');
                    if (firstCard) {
                        cardWidth = firstCard.offsetWidth + gap;
                    }
                }

                // Create dots
                const dots = [];
                for (let i = 0; i < STEPS; i++) {
                    const d = document.createElement('div');
                    d.className = 'w-2.5 h-2.5 rounded-full bg-gray-300 cursor-pointer transition-transform';
                    if (i === 0) d.classList.add('scale-110', 'bg-[#18c5a9]');
                    d.addEventListener('click', () => goTo(i));
                    dotsEl.appendChild(d);
                    dots.push(d);
                }

                function goTo(index) {
                    updateCardWidth();
                    current = Math.max(0, Math.min(index, STEPS - 1));
                    track.style.transform = `translateX(-${current * cardWidth}px)`;
                    dots.forEach((d, i) => {
                        if (i === current) {
                            d.classList.add('bg-[#18c5a9]', 'scale-110');
                            d.classList.remove('bg-gray-300');
                        } else {
                            d.classList.add('bg-gray-300');
                            d.classList.remove('bg-[#18c5a9]', 'scale-110');
                        }
                    });
                }

                prevBtn.addEventListener('click', () => goTo(current - 1));
                nextBtn.addEventListener('click', () => goTo(current + 1));

                // Drag/swipe functionality
                let startX = 0, startIndex = 0, isDragging = false;
                let startTransform = 0;

                viewport.addEventListener('mousedown', (e) => {
                    e.preventDefault();
                    isDragging = true;
                    startX = e.clientX;
                    startIndex = current;
                    updateCardWidth();
                    track.style.transition = 'none';
                    viewport.style.cursor = 'grabbing';
                });

                window.addEventListener('mousemove', (e) => {
                    if (!isDragging) return;
                    const deltaX = e.clientX - startX;
                    const newTransform = -(startIndex * cardWidth) + deltaX;
                    track.style.transform = `translateX(${newTransform}px)`;
                });

                window.addEventListener('mouseup', (e) => {
                    if (!isDragging) return;
                    isDragging = false;
                    track.style.transition = '';
                    viewport.style.cursor = 'grab';

                    const deltaX = e.clientX - startX;
                    const threshold = 50; // pixels to trigger slide

                    if (Math.abs(deltaX) > threshold) {
                        if (deltaX < 0) {
                            goTo(startIndex + 1);
                        } else {
                            goTo(startIndex - 1);
                        }
                    } else {
                        goTo(startIndex);
                    }
                });

                // Touch events
                viewport.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                    startIndex = current;
                    updateCardWidth();
                    track.style.transition = 'none';
                }, { passive: true });

                viewport.addEventListener('touchmove', (e) => {
                    const deltaX = e.touches[0].clientX - startX;
                    const newTransform = -(startIndex * cardWidth) + deltaX;
                    track.style.transform = `translateX(${newTransform}px)`;
                }, { passive: true });

                viewport.addEventListener('touchend', (e) => {
                    track.style.transition = '';
                    const deltaX = e.changedTouches[0].clientX - startX;
                    const threshold = 50;

                    if (Math.abs(deltaX) > threshold) {
                        if (deltaX < 0) {
                            goTo(startIndex + 1);
                        } else {
                            goTo(startIndex - 1);
                        }
                    } else {
                        goTo(startIndex);
                    }
                });

                // Prevent drag image effect
                viewport.addEventListener('dragstart', (e) => e.preventDefault());

                // Handle window resize
                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        updateCardWidth();
                        goTo(current);
                    }, 150);
                });

                // Initialize
                updateCardWidth();
                goTo(0);
                viewport.style.cursor = 'grab';
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

        <section id="realStories" class="mx-auto w-full max-w-[1200px] px-4 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-12">
            <div class="w-full text-center">
                <h2 class="section-title mb-3 text-3xl font-extrabold text-[#00b1aa] sm:text-4xl lg:text-5xl">
                    Empower Your Hiring with

                </h2>
                <h3 class="section-title mb-3 text-3xl font-extrabold text-[#444444] sm:text-4xl lg:text-5xl">
                    Resources & Support
                </h3>


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
    HERO
    ═══════════════════════════════════════════════════════════════════ --}}
    <section id="hero-section" class="relative z-0 overflow-hidden bg-no-repeat bg-cover bg-center pt-12 pb-30"
        style="opacity: 1; background-image: url('https://www.virtualinternships.com/wp-content/uploads/2023/09/bg.jpg'); background-size: 100% auto;">

        <div class="mx-auto w-full max-w-[1100px] px-4 md:px-8">
            <div class="animate-[fadeUp_0.65s_ease_both] text-center">
                <p class="mt-8 mx-auto max-w-3xl font-[Nunito] text-2xl font-semibold text-[#ffffff] leading-relaxed">
                    By embracing Virtual Internships' innovative approach to building talent pipelines, you'll tap into
                    fresh perspectives, drive innovation, and enjoy a cost-effective, flexible solution to your
                    company's resourcing needs.
                </p>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg bg-[#f47d20] px-6 py-3 text-sm font-[Poppins] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:opacity-95 hover:shadow-lg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                            aria-hidden="true">
                            <path
                                d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-10-2h4v2h-4V5Zm10 15H4V9h16v11Z" />
                        </svg>
                        Sign up today to find your next hire!
                    </a>
                </div>
            </div>
        </div>
    </section>




    <x-footer />

</body>

</html>