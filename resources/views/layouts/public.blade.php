<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="@yield('meta_description', 'Interlink is the leading career platform connecting top-tier student candidates with tech companies.')">
    <title>@yield('title', 'Interlink — Verified Internship Placements')</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('images/Logos/Small%20Logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/Logos/Small%20Logo.png') }}">



    @vite(['resources/css/welcome.css'])
    
    <!-- Alpine.js: plugin first, then core -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.14.8/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <x-ui-state />

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Brand Focus outlines */
        input:focus,
        select:focus,
        textarea:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            border-color: #00B1AA !important;
            box-shadow: 0 0 0 1px #00B1AA !important;
        }
    </style>
    @yield('styles')
</head>

<body x-data="{ pageDarkMode: false, init() { window.pageDarkModeToggle = () => { $store.ui.showLoading(400); setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150) }; Alpine.effect(() => { const isDark = $store.ui.darkMode; this.pageDarkMode = isDark; window.pageDarkModeActive = isDark; document.body.classList.toggle('page-dark', isDark); window.dispatchEvent(new CustomEvent('page-dark-mode-change', { detail: { active: isDark } })); }); } }"
    class="welcome-body flex min-h-screen flex-col bg-[#ffffff] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="pageDarkMode ? 'bg-black text-white' : 'bg-[#ffffff] text-[#17494D]'">

    <!-- Navigation -->
    <x-nav-bar />
    <x-loading-overlay />

    <!-- Main Content -->
    <main class="flex-grow mt-18">
        @yield('content')
    </main>

    <x-footer />

    @yield('scripts')
</body>

</html>