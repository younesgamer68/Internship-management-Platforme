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
    class="welcome-body flex min-h-screen flex-col bg-white text-[#17494D] font-[Poppins,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black text-white' : 'bg-white text-[#17494D]'">

    <!-- Navigation -->
    <x-nav-bar />
    <x-loading-overlay />

    @php
        $careerFields = [
            [
                'title' => 'Architecture',
                'label' => "Architecture\nInternships",
                'description' => 'Design buildings and spaces that shape how people live and work. Blend creativity with structural engineering.',
                'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=300&q=80',
                'alt' => 'Architecture',
                'text' => 'text-[#0a7c5c]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(13,110,82,0.92)_0%,rgba(13,90,65,0.88)_100%)]',
            ],
            [
                'title' => 'Business',
                'label' => "Business\nInternships",
                'description' => 'Learn strategy, operations, and management across industries. Build skills for leadership roles in any sector.',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=300&q=80',
                'alt' => 'Business',
                'text' => 'text-[#1461a8]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(20,85,165,0.92)_0%,rgba(12,60,130,0.88)_100%)]',
            ],
            [
                'title' => 'Computer Science',
                'label' => "Computer Science\nInternships",
                'description' => 'Build software, AI systems, and digital infrastructure. One of the most in-demand fields globally.',
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=300&q=80',
                'alt' => 'Computer Science',
                'text' => 'text-[#c24020]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(190,55,22,0.92)_0%,rgba(150,40,15,0.88)_100%)]',
            ],
            [
                'title' => 'Fashion & Design',
                'label' => "Fashion &amp; Design\nInternships",
                'description' => 'Express identity through garments and visual aesthetics. Covers fashion design, styling, and brand direction.',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&q=80',
                'alt' => 'Fashion and Design',
                'text' => 'text-[#c0395e]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(180,45,88,0.92)_0%,rgba(140,30,65,0.88)_100%)]',
            ],
            [
                'title' => 'Finance',
                'label' => "Finance\nInternships",
                'description' => 'Master markets, investment analysis, and financial modelling. A gateway to banking, fintech, and consulting.',
                'image' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=300&q=80',
                'alt' => 'Finance',
                'text' => 'text-[#b06a00]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(160,95,5,0.92)_0%,rgba(130,75,5,0.88)_100%)]',
            ],
            [
                'title' => 'Environment & Sustainability',
                'label' => "Environment &amp;\nSustainability\nInternships",
                'description' => 'Drive climate solutions, conservation, and green policy. One of the fastest growing career areas worldwide.',
                'image' => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?w=300&q=80',
                'alt' => 'Environment',
                'text' => 'text-[#0a7c5c]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(13,110,82,0.92)_0%,rgba(13,90,65,0.88)_100%)]',
            ],
            [
                'title' => 'Health, Wellness & Sports',
                'label' => "Health, Wellness &amp;\nSports Management\nInternships",
                'description' => 'Combine fitness, nutrition, and sport management to improve lives and build high-performance teams.',
                'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=300&q=80',
                'alt' => 'Health and Wellness',
                'text' => 'text-[#1461a8]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(20,85,165,0.92)_0%,rgba(12,60,130,0.88)_100%)]',
            ],
            [
                'title' => 'Healthcare & Pharma',
                'label' => "Healthcare &amp;\nPharmaceutical\nInternships",
                'description' => 'Develop life-saving drugs and healthcare systems. Combines science, research, and patient care.',
                'image' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=300&q=80',
                'alt' => 'Healthcare',
                'text' => 'text-[#5040b8]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(75,55,180,0.92)_0%,rgba(50,35,148,0.88)_100%)]',
            ],
            [
                'title' => 'Hospitality, Tourism & Events',
                'label' => "Hospitality, Tourism\n& Events\nInternships",
                'description' => 'Create unforgettable experiences in hotels, travel, and live events. A dynamic people-first industry.',
                'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=300&q=80',
                'alt' => 'Hospitality',
                'text' => 'text-[#c24020]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(190,55,22,0.92)_0%,rgba(150,40,15,0.88)_100%)]',
            ],
            [
                'title' => 'Human Resources',
                'label' => "HR\nInternships",
                'description' => 'Shape company culture, talent acquisition, and employee well-being. The heart of every great organisation.',
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=300&q=80',
                'alt' => 'Human Resources',
                'text' => 'text-[#c0395e]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(180,45,88,0.92)_0%,rgba(140,30,65,0.88)_100%)]',
            ],
            [
                'title' => 'Legal',
                'label' => "Legal\nInternships",
                'description' => 'Navigate law, contracts, and justice systems. From corporate law to human rights advocacy and beyond.',
                'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=300&q=80',
                'alt' => 'Legal',
                'text' => 'text-[#b06a00]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(160,95,5,0.92)_0%,rgba(130,75,5,0.88)_100%)]',
            ],
            [
                'title' => 'Supply Chain',
                'label' => "Supply Chain\nInternships",
                'description' => 'Coordinate global logistics, procurement, and operations. Critical to every product that reaches consumers.',
                'image' => 'https://images.unsplash.com/photo-1601598851547-4302969d0614?w=300&q=80',
                'alt' => 'Supply Chain',
                'text' => 'text-[#0a7c5c]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(13,110,82,0.92)_0%,rgba(13,90,65,0.88)_100%)]',
            ],
            [
                'title' => 'Marketing',
                'label' => "Marketing\nInternships",
                'description' => 'Build brands, run campaigns, and connect products to audiences. Spans digital, social, and traditional media.',
                'image' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?w=300&q=80',
                'alt' => 'Marketing',
                'text' => 'text-[#c24020]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(190,55,22,0.92)_0%,rgba(150,40,15,0.88)_100%)]',
            ],
            [
                'title' => 'Media & Communications',
                'label' => "Media &amp;\nCommunications\nInternships",
                'description' => 'Tell stories that matter across journalism, PR, broadcasting, and digital content creation.',
                'image' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?w=300&q=80',
                'alt' => 'Media',
                'text' => 'text-[#5040b8]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(75,55,180,0.92)_0%,rgba(50,35,148,0.88)_100%)]',
            ],
            [
                'title' => 'International Development',
                'label' => "International\nDevelopment\nInternships",
                'description' => 'Drive change in global health, poverty, and education. Work with NGOs, the UN, and development banks.',
                'image' => 'https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?w=300&q=80',
                'alt' => 'International Development',
                'text' => 'text-[#1461a8]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(20,85,165,0.92)_0%,rgba(12,60,130,0.88)_100%)]',
            ],
            [
                'title' => 'Real Estate',
                'label' => "Real Estate\nInternships",
                'description' => 'Manage property assets, investment portfolios, and urban development. A tangible and high-value industry.',
                'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=300&q=80',
                'alt' => 'Real Estate',
                'text' => 'text-[#b06a00]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(160,95,5,0.92)_0%,rgba(130,75,5,0.88)_100%)]',
            ],
            [
                'title' => 'Engineering',
                'label' => "Engineering\nInternships",
                'description' => 'Solve real-world problems through mechanical, civil, electrical, and chemical engineering disciplines.',
                'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=300&q=80',
                'alt' => 'Engineering',
                'text' => 'text-[#c0395e]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(180,45,88,0.92)_0%,rgba(140,30,65,0.88)_100%)]',
            ],
            [
                'title' => 'Startups',
                'label' => "Startup\nInternships",
                'description' => 'Join early-stage ventures and wear many hats. Learn how products are built from zero to launch at speed.',
                'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=300&q=80',
                'alt' => 'Startup',
                'text' => 'text-[#c24020]',
                'overlay' => 'bg-[linear-gradient(135deg,rgba(190,55,22,0.92)_0%,rgba(150,40,15,0.88)_100%)]',
            ],
        ];
    @endphp

    <section class="relative isolate my-16 bg-white px-5 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto mb-14 max-w-3xl text-center">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.32em] text-[#00b1aa]">Career Fields</p>
            <h1 class="text-[clamp(2.4rem,5vw,3.4rem)] font-semibold leading-[0.95] tracking-[-0.04em] text-[#00b1aa]">
                Discover Your Path
            </h1>
            <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-[#444444] sm:text-[1.05rem]">
                Explore a range of dynamic career fields with Virtual Internships.
            </p>
        </div>

        <div class="mx-auto grid max-w-6xl grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            @foreach ($careerFields as $field)
                <button type="button" data-career-card data-active="false" aria-label="{{ $field['title'] }} internships"
                    class="group relative h-27.5 overflow-hidden rounded-2xl bg-white text-left shadow-[0_2px_8px_rgba(0,0,0,0.06)] transition duration-300 ease-[cubic-bezier(.22,.68,0,1.2)] hover:-translate-y-1 hover:scale-[1.015] hover:shadow-[0_12px_32px_rgba(0,0,0,0.14)] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#17494D] focus-visible:ring-offset-2 motion-reduce:transform-none">
                    <img class="absolute right-0 top-0 h-full w-[42%] object-cover object-top transition duration-300 group-hover:brightness-[0.25] group-hover:saturate-[0.4] group-data-[active=true]:brightness-[0.25] group-data-[active=true]:saturate-[0.4]"
                        src="{{ $field['image'] }}" alt="{{ $field['alt'] }}">

                    <span
                        class="absolute inset-y-0 left-0 flex w-[62%] items-center px-4.5 transition-opacity duration-200 group-hover:opacity-0 group-hover:pointer-events-none group-data-[active=true]:opacity-0 group-data-[active=true]:pointer-events-none">
                        <span
                            class="block whitespace-pre-line text-[0.9rem] font-semibold leading-tight tracking-[-0.01em] {{ $field['text'] }}">
                            {!! $field['label'] !!}
                        </span>
                    </span>

                    <span
                        class="absolute inset-0 flex flex-col justify-center px-4.5 py-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100 group-data-[active=true]:opacity-100 {{ $field['overlay'] }}">
                        <span class="mb-1 text-[0.85rem] font-semibold tracking-[0.01em] text-white">
                            {{ $field['title'] }}
                        </span>
                        <span class="text-[0.78rem] leading-normal text-white/82">
                            {{ $field['description'] }}
                        </span>
                    </span>
                </button>
            @endforeach
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const cards = document.querySelectorAll('[data-career-card]');
                const isTouchDevice = window.matchMedia('(hover: none), (pointer: coarse)').matches;

                if (!isTouchDevice) {
                    return;
                }

                cards.forEach((card) => {
                    card.addEventListener('click', () => {
                        const isActive = card.dataset.active === 'true';

                        cards.forEach((otherCard) => {
                            otherCard.dataset.active = 'false';
                        });

                        card.dataset.active = isActive ? 'false' : 'true';
                    });
                });
            });
        </script>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════════
    footer
    ═══════════════════════════════════════════════════════════════════ --}}

    <x-footer />

</body>

</html>