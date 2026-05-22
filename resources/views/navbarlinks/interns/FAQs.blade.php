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
        .faq-item.open .faq-answer {
            opacity: 1 !important;
            padding-bottom: 20px !important;
        }
    </style>

</head>

<body x-data
    class="welcome-body flex min-h-screen flex-col bg-[#f0f0f0] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black text-white' : 'bg-[#f0f0f0] text-[#17494D]'">

    <!-- Navigation -->
    <x-nav-bar />
    <x-loading-overlay />

    {{-- FAQ Section (Tailwindized from Things_to_add.html) --}}
    <section class="w-full bg-[#f0f0f0] py-20  px-5">
        <div class="mx-auto max-w-[700px]">

            {{-- Header --}}
            <div class="mb-12 text-center">
                <h1 class="text-4xl font-extrabold text-[#1a1a2e] leading-tight">
                    Frequently Asked Questions
                    <span class="block text-[#f0406a]">For Host Companies</span>
                </h1>
                <p class="mt-2 text-xs text-gray-500 font-normal">Everything you need to know about Virtual Internships
                </p>
            </div>

            {{-- Accordion --}}
            <div id="faqAccordion" class="flex flex-col">

                {{-- FAQ Item 1 --}}
                <div class="faq-item border-b border-gray-300 first:border-t first:border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">Do I have
                            to pay to host a remote intern?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">No — there is no cost to host a
                            remote intern through Virtual Internships. Our platform is completely free for host
                            companies. Interns are not paid employees; they join your team as part of a structured
                            learning programme, giving you access to global talent without any financial commitment.</p>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">What are
                            the intern backgrounds? Do they have experience and work-ready skills? How good is their
                            English proficiency?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">Our interns come from a wide range
                            of academic backgrounds — including business, engineering, computer science, marketing,
                            design, and more. Every intern on the platform has completed a rigorous vetting process that
                            assesses their work-readiness, professional skills, and English proficiency. You can review
                            intern profiles, certifications, and skill tags before accepting a match, ensuring you
                            always find the right fit for your team.</p>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">How does
                            the matching process work? Can I see and choose interns?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">Once you create a host company
                            profile and outline your internship requirements, our team will match you with a shortlist
                            of suitable candidates. You'll be able to view each intern's profile — including their
                            background, skills, certifications, and availability — before confirming the placement.
                            You're always in control of who joins your team.</p>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">What is
                            the maximum number of interns I can take?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">There is no hard cap on the number
                            of interns you can host simultaneously. Companies of all sizes — from early-stage startups
                            to large enterprises — can take on multiple interns at once. We recommend aligning the
                            number of interns with your team's capacity to provide meaningful tasks and regular
                            check-ins.</p>
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">What are
                            the logistics regarding start dates, duration, and hours?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">The logistics of hosting virtual
                            interns can be tailored to your company's needs through matching you with an intern with a
                            start date and duration that suits your timeline. Interns will have set start dates (always
                            starting on a Monday and ending on a Friday) for their internships, as well as a set
                            duration of 4 to 16 weeks and 10 to 30 hours per week. It's our role to match you with an
                            intern that best suits what you're both looking for. Our team will guide you through the
                            logistics to ensure a seamless and mutually beneficial internship experience.</p>
                    </div>
                </div>

                {{-- FAQ Item 6 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">How much
                            time do we need to dedicate as a Host Company and what's expected of us?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">We recommend dedicating at least 1–2
                            hours per week to your intern through brief check-ins, task assignments, and feedback. Host
                            companies are expected to provide a structured project or set of tasks, a point of contact
                            for the intern, and a mid-point and end-of-internship review. The more engaged you are, the
                            more value both parties get from the experience.</p>
                    </div>
                </div>

                {{-- FAQ Item 7 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">Do I
                            qualify as a company? Are there specific requirements or timezone/country
                            restrictions?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">Virtual Internships is open to
                            companies globally — there are no country or timezone restrictions. Whether you're a solo
                            founder, an SME, or a multinational, you're welcome to host an intern. The main requirement
                            is that you can provide a meaningful remote working experience with real tasks and a
                            dedicated point of contact for the intern throughout the programme.</p>
                    </div>
                </div>

                {{-- FAQ Item 8 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">What
                            support does Virtual Internships offer?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">We offer end-to-end support for host
                            companies, including onboarding guidance, a dedicated account manager, access to our host
                            portal, and ongoing check-ins throughout the internship. Our team is always available to
                            resolve any issues, answer questions, and ensure the experience runs smoothly for both you
                            and your intern.</p>
                    </div>
                </div>

                {{-- FAQ Item 9 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">What
                            happens when the internship starts?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">Once the internship kicks off, your
                            intern will receive an onboarding pack and begin working on agreed tasks from day one.
                            You'll be introduced via email and encouraged to schedule a welcome call in the first week.
                            Throughout the internship, both parties will complete regular check-in surveys, and our
                            support team remains available to assist if anything comes up.</p>
                    </div>
                </div>

                {{-- FAQ Item 10 --}}
                <div class="faq-item border-b border-gray-300">
                    <button
                        class="faq-question w-full flex items-center justify-between gap-4 px-1 py-[18px] bg-transparent border-none cursor-pointer text-left font-[Poppins]"
                        aria-expanded="false">
                        <span class="faq-question-text flex-1 text-sm font-bold text-[#00b1aa] leading-[1.45]">Still
                            have questions?</span>
                        <span
                            class="chevron flex-shrink-0 w-7 h-7 rounded-full bg-[#18c5a9] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-3.5 h-3.5 stroke-white fill-none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer overflow-hidden max-h-0 opacity-0 transition-[max-height,opacity] duration-300 px-1">
                        <p class="text-xs leading-7 text-gray-600 font-normal pb-5">Simply, <a
                                href="{{ route('contact') }}"
                                class="text-[#1a1a2e] underline hover:text-[#f0406a] transition-colors">sign-up to the
                                platform here</a> to connect with one of our advisors who can answer any of your
                            questions.</p>
                    </div>
                </div>

            </div>{{-- /accordion --}}
        </div>
        <script>
            (function () {
                const items = document.querySelectorAll('.faq-item');

                items.forEach(item => {
                    const btn = item.querySelector('.faq-question');
                    const answer = item.querySelector('.faq-answer');

                    btn.addEventListener('click', () => {
                        const isOpen = item.classList.contains('open');

                        // Close all
                        items.forEach(i => {
                            i.classList.remove('open');
                            i.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
                            const a = i.querySelector('.faq-answer');
                            a.style.maxHeight = '0';
                        });

                        // Open clicked (if it was closed)
                        if (!isOpen) {
                            item.classList.add('open');
                            btn.setAttribute('aria-expanded', 'true');
                            answer.style.maxHeight = answer.scrollHeight + 'px';
                        }
                    });
                });
            })();
        </script>
    </section>



    <x-footer />

</body>