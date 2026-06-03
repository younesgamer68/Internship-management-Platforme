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

        /* ============================================================
   DARK MODE — public layout (page-dark class on body)
   Only fires when $store.ui.darkMode = true
   ─── ZERO white backgrounds policy ───
============================================================ */

        /* ── Page base ── */
        body.page-dark {
            background-color: #07111f !important;
            color: #d4e6ea !important;
        }

        /* ── Main content area ── */
        body.page-dark main {
            background-color: #07111f !important;
        }

        /* ── All sections & divs — nuclear override ── */
        body.page-dark section,
        body.page-dark article,
        body.page-dark aside {
            background-color: #07111f !important;
            background-image: none !important;
        }

        /* ── NUCLEAR: catch-all for ANY element with white/light background-color ── */
        body.page-dark .bg-white,
        body.page-dark [class*="bg-white"],
        body.page-dark .bg-\[#ffffff\],
        body.page-dark .bg-\[#FFFFFF\],
        body.page-dark .bg-\[#F5FBFB\],
        body.page-dark .bg-\[#FFF7ED\],
        body.page-dark .bg-\[#F7F9FA\],
        body.page-dark .bg-\[#f9fcfc\],
        body.page-dark .bg-\[#f8ffff\],
        body.page-dark .bg-\[#fbffff\],
        body.page-dark .bg-\[#ededed\],
        body.page-dark .bg-\[#F8FAFA\],
        body.page-dark .bg-gray-50,
        body.page-dark .bg-gray-100,
        body.page-dark .bg-zinc-50,
        body.page-dark .bg-zinc-100,
        body.page-dark .bg-slate-50,
        body.page-dark .bg-slate-100 {
            background-color: #0d1f2d !important;
        }

        /* ── Cards: any rounded surface ── */
        body.page-dark .rounded-2xl,
        body.page-dark .rounded-3xl,
        body.page-dark .rounded-xl {
            background-color: #0d1f2d !important;
            border-color: rgba(255, 255, 255, .07) !important;
        }

        /* ── Explicit card/panel/shadow classes ── */
        body.page-dark .card,
        body.page-dark .contact-card,
        body.page-dark .step-card,
        body.page-dark .statistics-page .rounded-3xl,
        body.page-dark [class*="shadow-2xl"],
        body.page-dark [class*="shadow-xl"],
        body.page-dark [class*="shadow-lg"],
        body.page-dark [class*="shadow-md"] {
            background-color: #0d1f2d !important;
            border-color: rgba(255, 255, 255, .07) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .45) !important;
        }

        /* ── Inline style backgrounds — exhaustive coverage ── */
        body.page-dark [style*="background: #fff"],
        body.page-dark [style*="background:#fff"],
        body.page-dark [style*="background: #FFF"],
        body.page-dark [style*="background:#FFF"],
        body.page-dark [style*="background: #FFFFFF"],
        body.page-dark [style*="background:#FFFFFF"],
        body.page-dark [style*="background: #ffffff"],
        body.page-dark [style*="background:#ffffff"],
        body.page-dark [style*="background: white"],
        body.page-dark [style*="background:white"],
        body.page-dark [style*="background-color: #fff"],
        body.page-dark [style*="background-color:#fff"],
        body.page-dark [style*="background-color: #FFF"],
        body.page-dark [style*="background-color:#FFF"],
        body.page-dark [style*="background-color: #FFFFFF"],
        body.page-dark [style*="background-color:#FFFFFF"],
        body.page-dark [style*="background-color: #ffffff"],
        body.page-dark [style*="background-color:#ffffff"],
        body.page-dark [style*="background-color: white"],
        body.page-dark [style*="background-color:white"],
        body.page-dark [style*="background: #f8ffff"],
        body.page-dark [style*="background:#f8ffff"],
        body.page-dark [style*="background: #fbffff"],
        body.page-dark [style*="background:#fbffff"],
        body.page-dark [style*="background: #F5FBFB"],
        body.page-dark [style*="background:#F5FBFB"],
        body.page-dark [style*="background: #FFF7ED"],
        body.page-dark [style*="background:#FFF7ED"],
        body.page-dark [style*="background: #F7F9FA"],
        body.page-dark [style*="background:#F7F9FA"],
        body.page-dark [style*="background: #f9fcfc"],
        body.page-dark [style*="background:#f9fcfc"],
        body.page-dark [style*="background: #ededed"],
        body.page-dark [style*="background:#ededed"],
        body.page-dark [style*="background: #F8FAFA"],
        body.page-dark [style*="background:#F8FAFA"],
        body.page-dark [style*="background: #fafbff"],
        body.page-dark [style*="background:#fafbff"],
        body.page-dark [style*="background: #f3f3f3"],
        body.page-dark [style*="background:#f3f3f3"],
        body.page-dark [style*="background: #f0f0f0"],
        body.page-dark [style*="background:#f0f0f0"],
        body.page-dark [style*="background: #f5f5f5"],
        body.page-dark [style*="background:#f5f5f5"],
        body.page-dark [style*="background: linear-gradient(135deg, #F5FBFB"],
        body.page-dark [style*="background:linear-gradient(135deg,#F5FBFB"],
        body.page-dark [style*="background: linear-gradient(135deg, #FFFFFF"],
        body.page-dark [style*="background:linear-gradient(135deg,#FFFFFF"],
        body.page-dark [style*="background: linear-gradient(135deg, #ffffff"],
        body.page-dark [style*="background:linear-gradient(135deg,#ffffff"],
        body.page-dark [style*="background: linear-gradient(135deg,#F5FBFB"],
        body.page-dark [style*="background:linear-gradient(135deg, #F5FBFB"] {
            background: #0d1f2d !important;
            background-image: none !important;
        }

        /* ── Borders ── */
        body.page-dark .border,
        body.page-dark [class*="border-[#E5E7EB]"],
        body.page-dark [class*="border-gray"],
        body.page-dark [class*="border-zinc"],
        body.page-dark [class*="border-slate"],
        body.page-dark .border-gray-100,
        body.page-dark .border-gray-200,
        body.page-dark .border-gray-300,
        body.page-dark [style*="border:1px solid #e5e7eb"],
        body.page-dark [style*="border: 1px solid #e5e7eb"] {
            border-color: rgba(255, 255, 255, .08) !important;
        }

        /* ── Dividers / hr ── */
        body.page-dark hr,
        body.page-dark .divide-y>*+* {
            border-color: rgba(255, 255, 255, .08) !important;
        }

        /* ── TEXT: headings ── */
        body.page-dark h1,
        body.page-dark h2,
        body.page-dark h3,
        body.page-dark h4,
        body.page-dark h5,
        body.page-dark h6 {
            color: #f0f8fa !important;
        }

        /* ── TEXT: body / muted ── */
        body.page-dark p,
        body.page-dark li,
        body.page-dark label,
        body.page-dark span:not([class*="text-[#00B1AA]"]):not([class*="text-[#F89122]"]):not([class*="text-emerald"]):not([class*="text-white"]) {
            color: #94b8c0 !important;
        }

        /* ── TEXT: specific dark classes → light ── */
        body.page-dark .text-\[#17494D\],
        body.page-dark .text-\[#444444\],
        body.page-dark .text-\[#2d2d2d\],
        body.page-dark .text-\[#0f2230\],
        body.page-dark .text-\[#222\],
        body.page-dark .text-\[#333\],
        body.page-dark .text-\[#111\],
        body.page-dark .text-black {
            color: #f0f8fa !important;
        }

        body.page-dark .text-\[#666666\],
        body.page-dark .text-\[#567d81\],
        body.page-dark .text-\[#547d80\],
        body.page-dark .text-\[#4e767a\],
        body.page-dark .text-\[#7B7B7B\],
        body.page-dark .text-gray-500,
        body.page-dark .text-gray-600,
        body.page-dark .text-gray-700,
        body.page-dark .text-zinc-500,
        body.page-dark .text-zinc-600 {
            color: #7aaab3 !important;
        }

        body.page-dark .text-gray-900,
        body.page-dark .text-gray-800,
        body.page-dark .text-zinc-900,
        body.page-dark .text-zinc-800 {
            color: #e2eaf2 !important;
        }

        /* ── Keep brand teal text ── */
        body.page-dark .text-\[#00B1AA\],
        body.page-dark .text-\[#00b1aa\],
        body.page-dark [style*="color:#00B1AA"],
        body.page-dark [style*="color: #00B1AA"],
        body.page-dark [style*="color:#008A84"],
        body.page-dark [style*="color: #008A84"] {
            color: #00c9c1 !important;
        }

        /* ── Keep brand orange/accent text ── */
        body.page-dark .text-\[#F89122\],
        body.page-dark [style*="color:#F89122"],
        body.page-dark [style*="color: #F89122"] {
            color: #f9a34e !important;
        }

        /* ── Keep white text white ── */
        body.page-dark .text-white,
        body.page-dark [class*="text-white"] {
            color: #ffffff !important;
        }

        /* ── Keep emerald/green text ── */
        body.page-dark .text-emerald-500,
        body.page-dark .text-emerald-600,
        body.page-dark [class*="text-emerald"] {
            color: #34d399 !important;
        }

        /* ── Links ── */
        body.page-dark a {
            color: #7dd3d8 !important;
        }

        body.page-dark a:hover {
            color: #a5e8ec !important;
        }

        /* ── Keep brand-colored links/buttons ── */
        body.page-dark a.btn-submit,
        body.page-dark a[class*="bg-[#00B1AA]"],
        body.page-dark button[class*="bg-[#00B1AA]"],
        body.page-dark a[class*="bg-[#00b1aa]"],
        body.page-dark button[class*="bg-[#00b1aa]"],
        body.page-dark .btn-submit {
            color: #ffffff !important;
            background-color: #00b1aa !important;
        }

        /* ── Nav links ── */
        body.page-dark nav a {
            color: #c8dfe3 !important;
        }

        body.page-dark nav a:hover {
            color: #ffffff !important;
        }

        /* ── Form inputs ── */
        body.page-dark input,
        body.page-dark select,
        body.page-dark textarea,
        body.page-dark .field-input,
        body.page-dark .field-select,
        body.page-dark .field-textarea {
            background-color: #0a1a27 !important;
            border-color: rgba(255, 255, 255, .12) !important;
            color: #e2eaf2 !important;
        }

        body.page-dark input::placeholder,
        body.page-dark textarea::placeholder,
        body.page-dark .field-input::placeholder,
        body.page-dark .field-textarea::placeholder {
            color: rgba(255, 255, 255, .28) !important;
        }

        body.page-dark input:focus,
        body.page-dark select:focus,
        body.page-dark textarea:focus {
            border-color: #00b1aa !important;
            box-shadow: 0 0 0 3px rgba(0, 177, 170, .18) !important;
            background-color: #071522 !important;
        }

        body.page-dark select option {
            background-color: #0d1f2d;
            color: #e2eaf2;
        }

        body.page-dark .field-label,
        body.page-dark label {
            color: rgba(255, 255, 255, .82) !important;
        }

        /* ── Tables ── */
        body.page-dark table {
            background-color: #0d1f2d !important;
        }

        body.page-dark thead,
        body.page-dark th {
            background-color: #091828 !important;
            color: #94b8c0 !important;
            border-color: rgba(255, 255, 255, .08) !important;
        }

        body.page-dark td {
            color: #c8dfe3 !important;
            border-color: rgba(255, 255, 255, .06) !important;
        }

        body.page-dark tbody tr:hover {
            background-color: rgba(255, 255, 255, .03) !important;
        }

        /* ── Badges / pills with light backgrounds ── */
        body.page-dark [class*="bg-gray-100"],
        body.page-dark [class*="bg-gray-50"],
        body.page-dark [class*="bg-zinc-100"],
        body.page-dark [class*="bg-zinc-50"],
        body.page-dark .bg-emerald-50,
        body.page-dark .bg-blue-50,
        body.page-dark .bg-blue-100,
        body.page-dark .bg-emerald-100,
        body.page-dark .bg-orange-50,
        body.page-dark .bg-red-50,
        body.page-dark .bg-yellow-50 {
            background-color: rgba(255, 255, 255, .06) !important;
        }

        /* ── Progress / track bars ── */
        body.page-dark [style*="background:#E5E7EB"],
        body.page-dark [style*="background: #E5E7EB"],
        body.page-dark .bg-\[#E5E7EB\] {
            background-color: #1e3a52 !important;
        }

        /* ── Teal brand section backgrounds ── */
        body.page-dark [style*="background: linear-gradient(135deg, #00B1AA"],
        body.page-dark [style*="background:linear-gradient(135deg,#00B1AA"],
        body.page-dark [style*="background: #00B1AA"],
        body.page-dark [style*="background:#00B1AA"] {
            /* keep teal sections teal — just slightly dim */
            filter: brightness(0.88);
        }

        /* ── Decorative blobs / glow overlays — tone down ── */
        body.page-dark [style*="background:rgba(0,177,170,.09)"],
        body.page-dark [style*="background:rgba(248,145,34,.07)"],
        body.page-dark [style*="background:rgba(0,177,170,.05)"] {
            opacity: 0.25 !important;
        }

        /* ── Footer ── */
        body.page-dark footer {
            background-color: #040e18 !important;
            border-color: rgba(255, 255, 255, .07) !important;
        }

        body.page-dark footer p,
        body.page-dark footer span,
        body.page-dark footer a {
            color: #6a96a1 !important;
        }

        body.page-dark footer a:hover {
            color: #a5e8ec !important;
        }

        /* ── Dropdown menus ── */
        body.page-dark [class*="dropdown"],
        body.page-dark [x-show][class*="absolute"] {
            background-color: #0d1f2d !important;
            border-color: rgba(255, 255, 255, .08) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, .5) !important;
        }

        /* ── Modals & Panels ── */
        body.page-dark .modal,
        body.page-dark [class*="modal"],
        body.page-dark .slide-panel,
        body.page-dark .center-modal,
        body.page-dark .danger-confirm-modal {
            background-color: #0d1f2d !important;
            border-color: rgba(255, 255, 255, .08) !important;
        }

        /* ── Scrollbar ── */
        body.page-dark ::-webkit-scrollbar {
            width: 6px;
        }

        body.page-dark ::-webkit-scrollbar-track {
            background: #07111f;
        }

        body.page-dark ::-webkit-scrollbar-thumb {
            background: #1e3a52;
            border-radius: 3px;
        }

        body.page-dark ::-webkit-scrollbar-thumb:hover {
            background: #2a5570;
        }

        /* ══════════════════════════════════════════════════════════════
           FINAL CATCH-ALL — No white backgrounds shall pass!
           Targets ANY div/section/article that still computes as white.
           Uses a broad selector with low specificity cost.
        ══════════════════════════════════════════════════════════════ */
        body.page-dark div[style*="background-color: #ffffff"],
        body.page-dark div[style*="background-color:#ffffff"],
        body.page-dark div[style*="background-color: white"],
        body.page-dark div[style*="background-color:white"],
        body.page-dark div[style*="background: #ffffff"],
        body.page-dark div[style*="background:#ffffff"],
        body.page-dark div[style*="background: white"],
        body.page-dark div[style*="background:white"],
        body.page-dark div[style*="background: #fff;"],
        body.page-dark div[style*="background:#fff;"],
        body.page-dark section[style*="background-color: white"],
        body.page-dark section[style*="background-color:white"],
        body.page-dark section[style*="background-color: #fff"],
        body.page-dark section[style*="background-color:#fff"] {
            background: #0d1f2d !important;
            background-image: none !important;
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

<body
    x-data="{ pageDarkMode: false, init() { window.pageDarkModeToggle = () => { $store.ui.showLoading(400); setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150) }; Alpine.effect(() => { const isDark = $store.ui.darkMode; this.pageDarkMode = isDark; window.pageDarkModeActive = isDark; document.body.classList.toggle('page-dark', isDark); window.dispatchEvent(new CustomEvent('page-dark-mode-change', { detail: { active: isDark } })); }); } }"
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