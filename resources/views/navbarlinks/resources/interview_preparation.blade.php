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
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#00b1aa]">Resources</p>
                    <h1 class="mt-4 text-4xl font-bold tracking-tight text-gray-900 md:text-5xl">Interview Preparation</h1>
                    <p class="mt-4 max-w-2xl text-lg text-gray-600">Provide practical tools, guides, and advice that help candidates prepare stronger applications and interviews.</p>
                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm"><p class="font-semibold text-gray-900">Read</p><p class="mt-2 text-sm text-gray-600">Browse articles and guides in one place.</p></div>
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm"><p class="font-semibold text-gray-900">Build</p><p class="mt-2 text-sm text-gray-600">Use practical tools to improve your profile.</p></div>
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm"><p class="font-semibold text-gray-900">Prepare</p><p class="mt-2 text-sm text-gray-600">Turn advice into a stronger application plan.</p></div>
                    </div>
                </div>
                <aside class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-gray-500">Toolkit</p>
                    <ul class="mt-4 space-y-3 text-sm text-gray-700">
                        <li>CV and resume support.</li>
                        <li>Interview prep and roadmaps.</li>
                        <li>Blog posts and tutorial content.</li>
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