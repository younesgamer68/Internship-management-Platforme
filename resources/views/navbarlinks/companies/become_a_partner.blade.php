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

    <main class="flex-1">
        <section class="mx-auto max-w-6xl px-6 py-16">
            <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#00b1aa]">Companies</p>
                    <h1 class="mt-4 text-4xl font-bold tracking-tight text-gray-900 md:text-5xl">Become a Partner</h1>
                    <p class="mt-4 max-w-2xl text-lg text-gray-600">Showcase the employer-facing side of the platform, from partner discovery to posting internships and reviewing recruiters.</p>
                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm"><p class="font-semibold text-gray-900">Partner</p><p class="mt-2 text-sm text-gray-600">Build relationships with trusted employers.</p></div>
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm"><p class="font-semibold text-gray-900">Promote</p><p class="mt-2 text-sm text-gray-600">Highlight openings to the right candidates.</p></div>
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm"><p class="font-semibold text-gray-900">Hire</p><p class="mt-2 text-sm text-gray-600">Turn internships into a reliable talent pipeline.</p></div>
                    </div>
                </div>
                <aside class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-gray-500">Employer tools</p>
                    <ul class="mt-4 space-y-3 text-sm text-gray-700">
                        <li>Browse partner companies and recruiters.</li>
                        <li>Compare reviews before posting.</li>
                        <li>Start a partnership or internship listing.</li>
                    </ul>
                </aside>
            </div>
        </section>
    </main>

    {{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
    footer
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}

    <x-footer />

</body>

</html>