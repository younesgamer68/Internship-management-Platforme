<!DOCTYPE html>
<html lang="en" x-data="cvBuilder()" x-init="init()" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="InterLinkCv — Professional resume builder for developers, designers, and professionals." />
    <title>{{ __('cv_builder.page_title') }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Geist + Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
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

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        inter: ['Inter', 'system-ui', 'sans-serif'],
                        playfair: ['Playfair Display', 'Georgia', 'serif'],
                        grotesk: ['Space Grotesk', 'sans-serif'],
                        mono: ['JetBrains Mono', 'Menlo', 'monospace'],
                        dm: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        /* Zinc neutral scale — warm, sophisticated */
                        z: {
                            0: '#ffffff', 50: '#fafafa', 100: '#f4f4f5',
                            150: '#ebebec', 200: '#e4e4e7', 300: '#d4d4d8',
                            400: '#a1a1aa', 500: '#71717a', 600: '#52525b',
                            700: '#3f3f46', 800: '#27272a', 850: '#1c1c1f',
                            900: '#18181b', 950: '#09090b',
                        },
                        /* Single accent — blue-600, professional */
                        accent: {
                            DEFAULT: '#2563eb',
                            light: '#3b82f6',
                            subtle: 'rgba(37,99,235,.06)',
                            border: 'rgba(37,99,235,.2)',
                            ring: 'rgba(37,99,235,.12)',
                        },
                    },
                    fontSize: {
                        '2xs': ['0.65rem', { lineHeight: '1rem' }],
                        'xs': ['0.75rem', { lineHeight: '1.125rem' }],
                        'sm': ['0.8125rem', { lineHeight: '1.25rem' }],
                        'base': ['0.9375rem', { lineHeight: '1.5rem' }],
                    },
                    boxShadow: {
                        'card': '0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04)',
                        'card-md': '0 4px 12px rgba(0,0,0,.08), 0 1px 3px rgba(0,0,0,.05)',
                        'modal': '0 20px 60px rgba(0,0,0,.18), 0 4px 16px rgba(0,0,0,.1)',
                        'input': '0 1px 2px rgba(0,0,0,.04)',
                        'btn': '0 1px 2px rgba(0,0,0,.08)',
                        'a4': '0 4px 24px rgba(0,0,0,.12), 0 1px 4px rgba(0,0,0,.06)',
                    },
                }
            }
        }
    </script>

    <style>
        /* ── Reset ─────────────────────────────────────────────────── */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            height: 100%;
        }

        body {
            height: 100%;
            font-family: 'Inter', system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
            overflow: hidden;
        }

        [x-cloak] {
            display: none !important;
        }

        /* ── Scrollbar — minimal ────────────────────────────────────── */
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d4d4d8;
            border-radius: 2px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #3f3f46;
        }

        /* ── Design Tokens ──────────────────────────────────────────── */
        :root {
            --accent: #2563eb;
            --accent-ring: rgba(37, 99, 235, .12);
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 10px;
            --radius-xl: 12px;
        }

        /* ── Light mode surfaces ────────────────────────────────────── */
        body {
            background: #f4f4f5;
            color: #18181b;
        }

        .dark body {
            background: #0a0a0a;
            color: #f4f4f5;
        }

        .surface-app {
            background: #f4f4f5;
        }

        .dark .surface-app {
            background: #0a0a0a;
        }

        .surface-base {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
        }

        .dark .surface-base {
            background: #111111;
            border-color: #222222;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
        }

        .surface-card {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
        }

        .dark .surface-card {
            background: #161616;
            border-color: #222222;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .3);
        }

        .surface-sidebar {
            background: #ffffff;
            border-right: 1px solid #e4e4e7;
        }

        .dark .surface-sidebar {
            background: #111111;
            border-color: #1e1e1e;
        }

        .surface-topbar {
            background: rgba(255, 255, 255, .95);
            border-bottom: 1px solid #e4e4e7;
            backdrop-filter: blur(8px);
        }

        .dark .surface-topbar {
            background: rgba(17, 17, 17, .95);
            border-color: #1e1e1e;
        }

        .surface-preview {
            background: #e8e8ea;
        }

        .dark .surface-preview {
            background: #0d0d0d;
        }

        /* ── Typography system ──────────────────────────────────────── */
        .t-label {
            font-size: .6875rem;
            font-weight: 500;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: #a1a1aa;
        }

        .dark .t-label {
            color: #52525b;
        }

        .t-body {
            font-size: .8125rem;
            color: #3f3f46;
            line-height: 1.6;
        }

        .dark .t-body {
            color: #a1a1aa;
        }

        .t-caption {
            font-size: .75rem;
            color: #71717a;
        }

        .dark .t-caption {
            color: #52525b;
        }

        .t-section-title {
            font-size: .8125rem;
            font-weight: 600;
            color: #18181b;
            letter-spacing: -.01em;
        }

        .dark .t-section-title {
            color: #f4f4f5;
        }

        /* ── Input system ───────────────────────────────────────────── */
        .field-input {
            display: block;
            width: 100%;
            padding: .4375rem .625rem;
            font-size: .8125rem;
            font-family: inherit;
            color: #18181b;
            background: #ffffff;
            border: 1px solid #d4d4d8;
            border-radius: var(--radius-md);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
            transition: border-color .15s ease, box-shadow .15s ease;
            outline: none;
            appearance: none;
        }

        .dark .field-input {
            background: #111111;
            color: #f4f4f5;
            border-color: #2a2a2a;
            box-shadow: none;
        }

        .field-input::placeholder {
            color: #a1a1aa;
        }

        .dark .field-input::placeholder {
            color: #3f3f46;
        }

        .field-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-ring), 0 1px 2px rgba(0, 0, 0, .04);
        }

        .dark .field-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .15);
        }

        .field-label {
            display: block;
            margin-bottom: .3125rem;
            font-size: .6875rem;
            font-weight: 500;
            color: #71717a;
            letter-spacing: .01em;
        }

        .dark .field-label {
            color: #52525b;
        }

        /* ── Button system ──────────────────────────────────────────── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .375rem;
            padding: .4375rem .75rem;
            font-size: .8125rem;
            font-weight: 500;
            font-family: inherit;
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: background .12s ease, color .12s ease, border-color .12s ease, box-shadow .12s ease;
            border: 1px solid transparent;
            outline: none;
            white-space: nowrap;
            text-decoration: none;
            line-height: 1;
        }

        .btn:focus-visible {
            box-shadow: 0 0 0 3px var(--accent-ring);
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }

        /* Primary — solid dark */
        .btn-primary {
            background: #18181b;
            color: #fafafa;
            border-color: #18181b;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .12);
        }

        .btn-primary:hover {
            background: #09090b;
            border-color: #09090b;
        }

        .btn-primary:active {
            background: #18181b;
        }

        .dark .btn-primary {
            background: #f4f4f5;
            color: #18181b;
            border-color: #f4f4f5;
        }

        .dark .btn-primary:hover {
            background: #e4e4e7;
            border-color: #e4e4e7;
        }

        /* Secondary — outlined */
        .btn-secondary {
            background: #ffffff;
            color: #3f3f46;
            border-color: #d4d4d8;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
        }

        .btn-secondary:hover {
            background: #f4f4f5;
            border-color: #a1a1aa;
            color: #18181b;
        }

        .dark .btn-secondary {
            background: #161616;
            color: #a1a1aa;
            border-color: #2a2a2a;
        }

        .dark .btn-secondary:hover {
            background: #1e1e1e;
            border-color: #3f3f46;
            color: #f4f4f5;
        }

        /* Ghost — no border */
        .btn-ghost {
            background: transparent;
            color: #71717a;
            border-color: transparent;
        }

        .btn-ghost:hover {
            background: #f4f4f5;
            color: #18181b;
        }

        .dark .btn-ghost:hover {
            background: #1e1e1e;
            color: #f4f4f5;
        }

        /* Accent — blue for key CTAs */
        .btn-accent {
            background: var(--accent);
            color: #ffffff;
            border-color: var(--accent);
            box-shadow: 0 1px 2px rgba(37, 99, 235, .15);
        }

        .btn-accent:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .btn-accent:active {
            background: #1e40af;
        }

        /* Danger */
        .btn-danger {
            background: transparent;
            color: #dc2626;
            border-color: transparent;
        }

        .btn-danger:hover {
            background: #fef2f2;
            color: #b91c1c;
        }

        .dark .btn-danger:hover {
            background: rgba(220, 38, 38, .1);
        }

        /* Icon button */
        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .375rem;
            border-radius: var(--radius-md);
            background: transparent;
            color: #71717a;
            border: none;
            cursor: pointer;
            transition: background .12s ease, color .12s ease;
        }

        .btn-icon:hover {
            background: #f4f4f5;
            color: #18181b;
        }

        .dark .btn-icon:hover {
            background: #1e1e1e;
            color: #f4f4f5;
        }

        /* ── Toggle ─────────────────────────────────────────────────── */
        .toggle-wrap {
            position: relative;
            display: inline-flex;
            width: 36px;
            height: 20px;
            cursor: pointer;
        }

        .toggle-wrap input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }

        .toggle-track {
            position: absolute;
            inset: 0;
            background: #d4d4d8;
            border-radius: 999px;
            transition: background .15s ease;
        }

        .dark .toggle-track {
            background: #3f3f46;
        }

        input:checked+.toggle-track {
            background: var(--accent);
        }

        .dark input:checked+.toggle-track {
            background: #3b82f6;
        }

        .toggle-knob {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 16px;
            height: 16px;
            background: #ffffff;
            border-radius: 50%;
            transition: transform .15s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .15);
        }

        input:checked~.toggle-knob {
            transform: translateX(16px);
        }

        /* ── Range slider ───────────────────────────────────────────── */
        input[type=range] {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 3px;
            border-radius: 2px;
            background: #d4d4d8;
            outline: none;
            cursor: pointer;
        }

        .dark input[type=range] {
            background: #3f3f46;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--accent);
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .15);
            transition: transform .1s ease;
        }

        input[type=range]::-webkit-slider-thumb:hover {
            transform: scale(1.15);
        }

        /* ── Section card ───────────────────────────────────────────── */
        .section-card {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: var(--radius-xl);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
            overflow: hidden;
        }

        .dark .section-card {
            background: #161616;
            border-color: #222222;
        }

        .section-card-header {
            display: flex;
            align-items: center;
            gap: .625rem;
            padding: .875rem 1.125rem;
            cursor: pointer;
            transition: background .12s ease;
        }

        .section-card-header:hover {
            background: #fafafa;
        }

        .dark .section-card-header:hover {
            background: rgba(255, 255, 255, .02);
        }

        .section-icon {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* ── Entry row ──────────────────────────────────────────────── */
        .entry-card {
            background: #fafafa;
            border: 1px solid #e4e4e7;
            border-radius: 8px;
            padding: 14px;
            position: relative;
            transition: border-color .15s ease;
        }

        .dark .entry-card {
            background: #111111;
            border-color: #222222;
        }

        .entry-card:hover {
            border-color: #a1a1aa;
        }

        .dark .entry-card:hover {
            border-color: #3f3f46;
        }

        .entry-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 2px;
            opacity: 0;
            transition: opacity .15s ease;
        }

        .entry-card:hover .entry-actions {
            opacity: 1;
        }

        /* ── Add row button ─────────────────────────────────────────── */
        .add-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .375rem;
            width: 100%;
            padding: .5rem;
            font-size: .75rem;
            color: #a1a1aa;
            border: 1px dashed #d4d4d8;
            border-radius: 8px;
            background: transparent;
            cursor: pointer;
            transition: all .15s ease;
        }

        .dark .add-btn {
            border-color: #2a2a2a;
            color: #52525b;
        }

        .add-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(37, 99, 235, .03);
        }

        .dark .add-btn:hover {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        /* ── Color swatch ───────────────────────────────────────────── */
        .swatch {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
            transition: transform .12s ease, box-shadow .12s ease;
        }

        .swatch:hover {
            transform: scale(1.2);
        }

        .swatch.active {
            box-shadow: 0 0 0 1.5px #ffffff, 0 0 0 3px currentColor;
            transform: scale(1.1);
        }

        .dark .swatch.active {
            box-shadow: 0 0 0 1.5px #111111, 0 0 0 3px currentColor;
        }

        /* ── Template card ──────────────────────────────────────────── */
        .tpl-card {
            border-radius: 7px;
            border: 1.5px solid #e4e4e7;
            cursor: pointer;
            overflow: hidden;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        .dark .tpl-card {
            border-color: #2a2a2a;
        }

        .tpl-card:hover {
            border-color: #a1a1aa;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
        }

        .dark .tpl-card:hover {
            border-color: #52525b;
        }

        .tpl-card.active {
            border-color: var(--accent);
        }

        .dark .tpl-card.active {
            border-color: #3b82f6;
        }

        /* ── Command palette ────────────────────────────────────────── */
        .cmd-overlay {
            background: rgba(0, 0, 0, .4);
        }

        .dark .cmd-overlay {
            background: rgba(0, 0, 0, .7);
        }

        .cmd-box {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .18), 0 4px 16px rgba(0, 0, 0, .1);
            border-radius: 10px;
            overflow: hidden;
        }

        .dark .cmd-box {
            background: #161616;
            border-color: #2a2a2a;
        }

        .cmd-item {
            transition: background .08s ease;
        }

        .cmd-item.active {
            background: #f4f4f5;
        }

        .dark .cmd-item.active {
            background: #1e1e1e;
        }

        /* ── ATS gauge ──────────────────────────────────────────────── */
        .ats-progress {
            transition: stroke-dashoffset .8s ease;
            stroke-linecap: round;
        }

        /* ── Animations — restrained ────────────────────────────────── */
        .fade-in {
            animation: fadeIn .2s ease;
        }

        .fade-up {
            animation: fadeUp .25s ease;
        }

        .scale-in {
            animation: scaleIn .2s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(.97);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* ── A4 paper ───────────────────────────────────────────────── */
        .a4-paper {
            width: 210mm;
            min-height: 297mm;
            background: #ffffff;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .12), 0 1px 4px rgba(0, 0, 0, .06);
            transform-origin: top center;
            display: flex;
            flex-direction: column;
        }

        .a4-paper>div {
            flex-grow: 1;
        }

        /* ── Empty state ────────────────────────────────────────────── */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 1rem;
            text-align: center;
            color: #a1a1aa;
        }

        .dark .empty-state {
            color: #3f3f46;
        }

        /* ── Skill chip ─────────────────────────────────────────────── */
        .skill-chip {
            display: inline-flex;
            align-items: center;
            padding: .1875rem .5rem;
            border-radius: 4px;
            font-size: .6875rem;
            font-weight: 500;
            background: #f4f4f5;
            color: #52525b;
            border: 1px solid #e4e4e7;
            cursor: pointer;
            transition: all .12s ease;
        }

        .dark .skill-chip {
            background: #1e1e1e;
            color: #71717a;
            border-color: #2a2a2a;
        }

        .skill-chip:hover {
            background: rgba(37, 99, 235, .06);
            color: var(--accent);
            border-color: rgba(37, 99, 235, .2);
        }

        /* ── Toast ──────────────────────────────────────────────────── */
        .toast {
            animation: fadeUp .2s ease;
        }

        /* ── Drag handle ────────────────────────────────────────────── */
        .drag-h {
            cursor: grab;
            color: #d4d4d8;
            transition: color .12s ease;
        }

        .drag-h:hover {
            color: #71717a;
        }

        .drag-h:active {
            cursor: grabbing;
        }

        /* ── Scrollbar thin ─────────────────────────────────────────── */
        .scrollable {
            overflow-y: auto;
        }

        /* ── Print ──────────────────────────────────────────────────── */
        @media print {
            body>*:not(#print-root) {
                display: none !important;
            }

            #print-root {
                display: block !important;
                position: fixed;
                inset: 0;
                background: white;
                z-index: 9999;
            }

            .a4-paper {
                box-shadow: none !important;
                width: 100% !important;
            }

            @page {
                margin: 0;
                size: A4;
            }
        }

        /* ── Responsive ─────────────────────────────────────────────── */
        @media (max-width: 768px) {
            .a4-paper {
                width: 100%;
                min-height: auto;
            }
        }

        /* ── Modal overlay ──────────────────────────────────────────── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 60;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(0, 0, 0, .4);
            backdrop-filter: blur(3px);
        }

        .dark .modal-overlay {
            background: rgba(0, 0, 0, .7);
        }

        .modal-box {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 12px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .18), 0 4px 16px rgba(0, 0, 0, .1);
        }

        .dark .modal-box {
            background: #161616;
            border-color: #222222;
        }

        /* ── AI chip ────────────────────────────────────────────────── */
        .ai-chip {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            padding: .1875rem .5rem;
            border-radius: 4px;
            font-size: .6875rem;
            font-weight: 500;
            cursor: pointer;
            background: rgba(37, 99, 235, .06);
            color: #2563eb;
            border: 1px solid rgba(37, 99, 235, .15);
            transition: all .12s ease;
        }

        .ai-chip:hover {
            background: rgba(37, 99, 235, .1);
        }

        .dark .ai-chip {
            background: rgba(59, 130, 246, .08);
            color: #60a5fa;
            border-color: rgba(59, 130, 246, .15);
        }

        /* ── Strength bar ───────────────────────────────────────────── */
        .strength-bar-fill {
            height: 100%;
            border-radius: 2px;
            background: var(--accent);
            transition: width .6s ease;
        }
    </style>
</head>

<body class="surface-app font-inter">

    <!-- Print root -->
    <div id="print-root" style="display:none;"></div>

    <!-- ── Toasts ─────────────────────────────────────────────────── -->
    <div class="fixed top-4 right-4 z-50 space-y-2 pointer-events-none" aria-live="polite">
        <template x-for="t in toasts" :key="t.id">
            <div class="toast pointer-events-auto flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg surface-card min-w-60 shadow-card-md"
                :class="{
                'border-l-2 border-emerald-500': t.type==='success',
                'border-l-2 border-amber-500':   t.type==='warning',
                'border-l-2 border-red-500':     t.type==='error',
                'border-l-2 border-blue-500':    t.type==='info',
            }">
                <i class="ph text-base flex-shrink-0" :class="{
                    'ph-check-circle-fill text-emerald-500': t.type==='success',
                    'ph-warning-fill text-amber-500':        t.type==='warning',
                    'ph-x-circle-fill text-red-500':         t.type==='error',
                    'ph-info-fill text-blue-500':            t.type==='info',
                }"></i>
                <span class="text-sm font-medium text-z-800 dark:text-z-200" x-text="t.msg"></span>
            </div>
        </template>
    </div>

    <!-- ── Onboarding wizard ──────────────────────────────────────── -->
    <div x-show="showOnboarding" x-cloak class="modal-overlay" @keydown.escape.window="showOnboarding=false">
        <div class="modal-box max-w-md scale-in">
            <!-- Progress -->
            <div class="h-px bg-z-200 dark:bg-z-800">
                <div class="h-full bg-accent transition-all duration-300" :style="'width:'+((onboardStep/3)*100)+'%'">
                </div>
            </div>
            <div class="p-6">
                <!-- Step 1 -->
                <div x-show="onboardStep===1" class="fade-up space-y-5">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 rounded-lg bg-z-100 dark:bg-z-900 flex items-center justify-center">
                                <i class="ph ph-file-text text-z-600 dark:text-z-400"></i>
                            </div>
                            <h2 class="text-base font-semibold">{{ __('cv_builder.welcome_title') }}</h2>
                        </div>
                        <p class="text-sm text-z-500 dark:text-z-400 leading-relaxed">A clean, professional resume
                            builder. No fluff — just your career, presented well.</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div
                            class="p-3 rounded-lg bg-z-50 dark:bg-z-900 border border-z-200 dark:border-z-800 text-center">
                            <i class="ph ph-target text-blue-500 text-lg mb-1"></i>
                            <p class="text-xs font-medium text-z-600 dark:text-z-400">{{ __('cv_builder.ats_optimized') }}</p>
                        </div>
                        <div
                            class="p-3 rounded-lg bg-z-50 dark:bg-z-900 border border-z-200 dark:border-z-800 text-center">
                            <i class="ph ph-eye text-z-500 text-lg mb-1"></i>
                            <p class="text-xs font-medium text-z-600 dark:text-z-400">{{ __('cv_builder.live_preview') }}</p>
                        </div>
                        <div
                            class="p-3 rounded-lg bg-z-50 dark:bg-z-900 border border-z-200 dark:border-z-800 text-center">
                            <i class="ph ph-floppy-disk text-z-500 text-lg mb-1"></i>
                            <p class="text-xs font-medium text-z-600 dark:text-z-400">{{ __('cv_builder.auto_saved') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2 pt-1">
                        <button @click="showOnboarding=false" class="btn btn-ghost flex-1">{{ __('cv_builder.skip') }}</button>
                        <button @click="onboardStep=2" class="btn btn-primary flex-1">{{ __('cv_builder.get_started') }} <i
                                class="ph ph-arrow-right"></i></button>
                    </div>
                </div>
                <!-- Step 2 -->
                <div x-show="onboardStep===2" class="fade-up space-y-4">
                    <div>
                        <p class="t-label mb-1">{{ __('cv_builder.step_2') }}</p>
                        <h2 class="text-base font-semibold">{{ __('cv_builder.choose_template') }}</h2>
                        <p class="text-sm text-z-500 dark:text-z-400 mt-1">{{ __('cv_builder.change_any_time') }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <template x-for="tpl in templates" :key="tpl.id">
                            <button @click="activeTemplate=tpl.id" class="tpl-card"
                                :class="activeTemplate===tpl.id?'active':''">
                                <div class="h-16 flex items-center justify-center" :style="'background:'+tpl.preview">
                                    <div class="space-y-1 px-3 w-full">
                                        <div class="h-1 bg-white/60 rounded-sm w-3/4 mx-auto"></div>
                                        <div class="h-0.5 bg-white/40 rounded-sm w-1/2 mx-auto"></div>
                                        <div class="h-0.5 bg-white/30 rounded-sm w-full mx-auto"></div>
                                    </div>
                                </div>
                                <div class="py-1.5 px-2 bg-white dark:bg-z-900 border-t border-z-100 dark:border-z-800">
                                    <p class="text-xs font-medium text-center text-z-700 dark:text-z-300 truncate"
                                        x-text="tpl.name"></p>
                                </div>
                            </button>
                        </template>
                    </div>
                    <div class="flex gap-2 pt-1">
                        <button @click="onboardStep=1" class="btn btn-secondary flex-1"><i class="ph ph-arrow-left"></i>
                            {{ __('cv_builder.back') }}</button>
                        <button @click="onboardStep=3" class="btn btn-primary flex-1">{{ __('cv_builder.continue') }} <i
                                class="ph ph-arrow-right"></i></button>
                    </div>
                </div>
                <!-- Step 3 -->
                <div x-show="onboardStep===3" class="fade-up space-y-4">
                    <div>
                        <p class="t-label mb-1">{{ __('cv_builder.step_3') }}</p>
                        <h2 class="text-base font-semibold">{{ __('cv_builder.basic_info') }}</h2>
                        <p class="text-sm text-z-500 dark:text-z-400 mt-1">{{ __('cv_builder.fill_rest_later') }}</p>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="field-label">{{ __('cv_builder.full_name') }}</label>
                            <input type="text" x-model="cv.name" placeholder="Alexandra Chen" class="field-input">
                        </div>
                        <div>
                            <label class="field-label">{{ __('cv_builder.job_title') }}</label>
                            <input type="text" x-model="cv.title" placeholder="Senior Full-Stack Engineer"
                                class="field-input">
                        </div>
                        <div>
                            <label class="field-label">{{ __('cv_builder.email') }}</label>
                            <input type="email" x-model="cv.email" placeholder="you@example.com" class="field-input">
                        </div>
                    </div>
                    <div class="flex gap-2 pt-1">
                        <button @click="onboardStep=2" class="btn btn-secondary flex-1"><i class="ph ph-arrow-left"></i>
                            {{ __('cv_builder.back') }}</button>
                        <button @click="finishOnboarding()" class="btn btn-primary flex-1">{{ __('cv_builder.open_editor') }} <i
                                class="ph ph-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Command palette ──────────────────────────────────────────── -->
    <div x-show="showCmd" x-cloak class="fixed inset-0 z-50 cmd-overlay flex items-start justify-center pt-20 px-4"
        @keydown.escape.window="showCmd=false">
        <div @click.outside="showCmd=false" class="cmd-box w-full max-w-xl scale-in"
            @keydown.arrow-down.prevent="cmdIdx=Math.min(cmdIdx+1,filteredCmds.length-1)"
            @keydown.arrow-up.prevent="cmdIdx=Math.max(cmdIdx-1,0)"
            @keydown.enter.prevent="runCmd(filteredCmds[cmdIdx])">
            <div class="flex items-center gap-2.5 px-4 py-3 border-b border-z-100 dark:border-z-800">
                <i class="ph ph-magnifying-glass text-z-400 flex-shrink-0"></i>
                <input type="text" x-model="cmdQuery" x-ref="cmdInput" placeholder="{{ __('cv_builder.search_commands') }}"
                    class="flex-1 bg-transparent outline-none text-sm text-z-900 dark:text-z-100 placeholder-z-400 dark:placeholder-z-600">
                <kbd
                    class="px-1.5 py-0.5 text-xs bg-z-100 dark:bg-z-800 border border-z-200 dark:border-z-700 rounded text-z-500">Esc</kbd>
            </div>
            <div class="max-h-72 overflow-y-auto py-1.5">
                <template x-if="filteredCmds.length===0">
                    <div class="px-4 py-6 text-center text-sm text-z-400">{{ __('cv_builder.no_results_for') }} "<span
                            x-text="cmdQuery"></span>"</div>
                </template>
                <template x-for="(cmd,i) in filteredCmds" :key="cmd.id">
                    <button class="cmd-item w-full flex items-center gap-3 px-4 py-2.5 text-left"
                        :class="i===cmdIdx?'active':''" @click="runCmd(cmd)" @mouseenter="cmdIdx=i">
                        <span
                            class="w-6 h-6 rounded flex items-center justify-center bg-z-100 dark:bg-z-800 flex-shrink-0">
                            <i class="ph text-sm text-z-500 dark:text-z-400" :class="cmd.icon"></i>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-z-800 dark:text-z-200" x-text="cmd.label"></p>
                            <p x-show="cmd.desc" class="text-xs text-z-400 truncate" x-text="cmd.desc"></p>
                        </div>
                        <kbd x-show="cmd.shortcut" class="text-xs text-z-400 font-mono" x-text="cmd.shortcut"></kbd>
                    </button>
                </template>
            </div>
            <div class="px-4 py-2 border-t border-z-100 dark:border-z-800 flex items-center gap-4 text-xs text-z-400">
                <span class="flex items-center gap-1"><kbd
                        class="px-1 py-0.5 bg-z-100 dark:bg-z-800 rounded border border-z-200 dark:border-z-700">↑↓</kbd>
                    {{ __('cv_builder.navigate') }}</span>
                <span class="flex items-center gap-1"><kbd
                        class="px-1 py-0.5 bg-z-100 dark:bg-z-800 rounded border border-z-200 dark:border-z-700">↵</kbd>
                    {{ __('cv_builder.select') }}</span>
            </div>
        </div>
    </div>

    <!-- ── Export modal ─────────────────────────────────────────────── -->
    <div x-show="showExport" x-cloak class="modal-overlay" @keydown.escape.window="showExport=false">
        <div class="modal-box max-w-sm scale-in">
            <div class="flex items-center justify-between px-5 py-4 border-b border-z-100 dark:border-z-800">
                <h3 class="text-sm font-semibold">{{ __('cv_builder.export_resume') }}</h3>
                <button @click="showExport=false" class="btn-icon"><i class="ph ph-x text-sm"></i></button>
            </div>
            <div class="p-4 space-y-2">
                <button @click="printResume()"
                    class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-z-50 dark:hover:bg-z-900 border border-z-200 dark:border-z-800 transition-colors text-left">
                    <div
                        class="w-9 h-9 rounded-lg bg-z-100 dark:bg-z-800 flex items-center justify-center flex-shrink-0">
                        <i class="ph ph-printer text-z-600 dark:text-z-400"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">{{ __('cv_builder.print_pdf') }}</p>
                        <p class="text-xs text-z-400">{{ __('cv_builder.best_quality') }}</p>
                    </div>
                    <i class="ph ph-arrow-right text-z-300 ml-auto"></i>
                </button>
                <button @click="exportJSON(); showExport=false"
                    class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-z-50 dark:hover:bg-z-900 border border-z-200 dark:border-z-800 transition-colors text-left">
                    <div
                        class="w-9 h-9 rounded-lg bg-z-100 dark:bg-z-800 flex items-center justify-center flex-shrink-0">
                        <i class="ph ph-brackets-curly text-z-600 dark:text-z-400"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">{{ __('cv_builder.export_json') }}</p>
                        <p class="text-xs text-z-400">{{ __('cv_builder.portable_json') }}</p>
                    </div>
                    <i class="ph ph-arrow-right text-z-300 ml-auto"></i>
                </button>
                <button @click="shareResume(); showExport=false"
                    class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-z-50 dark:hover:bg-z-900 border border-z-200 dark:border-z-800 transition-colors text-left">
                    <div
                        class="w-9 h-9 rounded-lg bg-z-100 dark:bg-z-800 flex items-center justify-center flex-shrink-0">
                        <i class="ph ph-link text-z-600 dark:text-z-400"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">{{ __('cv_builder.copy_share_link') }}</p>
                        <p class="text-xs text-z-400">{{ __('cv_builder.link_to_resume') }}</p>
                    </div>
                    <i class="ph ph-arrow-right text-z-300 ml-auto"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- ── Import modal ─────────────────────────────────────────────── -->
    <div x-show="showImport" x-cloak class="modal-overlay" @keydown.escape.window="showImport=false">
        <div class="modal-box max-w-md scale-in">
            <div class="flex items-center justify-between px-5 py-4 border-b border-z-100 dark:border-z-800">
                <h3 class="text-sm font-semibold">{{ __('cv_builder.import_resume') }}</h3>
                <button @click="showImport=false" class="btn-icon"><i class="ph ph-x text-sm"></i></button>
            </div>
            <div class="p-5 space-y-4">
                <p class="text-sm text-z-500 dark:text-z-400">{{ __('cv_builder.paste_json') }}</p>
                <textarea x-model="importJSON" rows="6" placeholder='{"cv":{"name":"..."}}'
                    class="field-input font-mono text-xs resize-none"></textarea>
                <div class="flex gap-2">
                    <button @click="importData()" class="btn btn-primary flex-1">{{ __('cv_builder.import_btn') }}</button>
                    <label class="btn btn-secondary flex-1 cursor-pointer">
                        <i class="ph ph-file-arrow-up"></i> Upload file
                        <input type="file" accept=".json" class="hidden" @change="handleFileImport($event)">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Shortcuts modal ──────────────────────────────────────────── -->
    <div x-show="showShortcuts" x-cloak class="modal-overlay" @keydown.escape.window="showShortcuts=false">
        <div class="modal-box max-w-sm scale-in">
            <div class="flex items-center justify-between px-5 py-4 border-b border-z-100 dark:border-z-800">
                <h3 class="text-sm font-semibold">{{ __('cv_builder.keyboard_shortcuts') }}</h3>
                <button @click="showShortcuts=false" class="btn-icon"><i class="ph ph-x text-sm"></i></button>
            </div>
            <div class="p-2">
                <template x-for="s in shortcuts">
                    <div
                        class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-z-50 dark:hover:bg-z-900 transition-colors">
                        <span class="text-sm text-z-600 dark:text-z-400" x-text="s.label"></span>
                        <div class="flex gap-1">
                            <template x-for="k in s.keys">
                                <kbd class="px-1.5 py-0.5 text-xs font-mono bg-z-100 dark:bg-z-800 border border-z-200 dark:border-z-700 rounded text-z-500 dark:text-z-400"
                                    x-text="k"></kbd>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- ── Confirm dialog ───────────────────────────────────────────── -->
    <div x-show="confirmDialog.show" x-cloak class="modal-overlay">
        <div class="modal-box max-w-xs scale-in p-5 text-center space-y-4">
            <div class="w-10 h-10 rounded-lg bg-red-50 dark:bg-red-900/20 flex items-center justify-center mx-auto">
                <i class="ph ph-warning text-red-500"></i>
            </div>
            <div>
                <h3 class="text-sm font-semibold mb-1" x-text="confirmDialog.title"></h3>
                <p class="text-sm text-z-500 dark:text-z-400" x-text="confirmDialog.message"></p>
            </div>
            <div class="flex gap-2">
                <button @click="confirmDialog.show=false" class="btn btn-secondary flex-1">{{ __('cv_builder.cancel') }}</button>
                <button @click="confirmDialog.onConfirm();confirmDialog.show=false"
                    class="btn flex-1 bg-red-500 text-white border-red-500 hover:bg-red-600">
                    <span x-text="confirmDialog.confirmText||'Confirm'"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- APP SHELL -->
    <!-- ============================================================ -->
    <div class="flex flex-col h-screen overflow-hidden">

        <!-- ── Top bar ───────────────────────────────────────────────── -->
        <header class="flex-shrink-0 surface-topbar z-30 h-11 flex items-center px-3 gap-2">
            <!-- Sidebar toggle + logo -->
            <button @click="sidebarOpen=!sidebarOpen" class="btn-icon w-7 h-7 flex-shrink-0">
                <i class="ph ph-sidebar-simple text-sm"></i>
            </button>
            <div class="w-px h-4 bg-z-200 dark:bg-z-800 flex-shrink-0"></div>
            <span class="text-sm font-semibold tracking-tight select-none flex-shrink-0">
                InterLinkCv
            </span>
            <span class="text-z-300 dark:text-z-700 flex-shrink-0">/</span>
            <span class="text-sm text-z-500 dark:text-z-500 truncate max-w-xs" x-text="cv.name||"{{ __('cv_builder.untitled') }}""></span>

            <div class="flex-1"></div>

            <!-- ATS badge -->
            <button @click="aiPanelOpen=!aiPanelOpen"
                class="hidden sm:flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium transition-colors"
                :class="{
                'bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400':   atsScore<40,
                'bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400': atsScore>=40&&atsScore<70,
                'bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400': atsScore>=70,
            }">
                <i class="ph ph-target text-xs"></i>
                ATS <span x-text="atsScore"></span>/100
            </button>

            <!-- Completeness -->
            <div class="hidden md:flex items-center gap-2 px-2">
                <div class="w-16 h-1 bg-z-200 dark:bg-z-800 rounded-full overflow-hidden">
                    <div class="h-full bg-accent rounded-full transition-all duration-500"
                        :style="'width:'+completeness+'%'"></div>
                </div>
                <span class="text-xs text-z-400" x-text="completeness+'%'"></span>
            </div>

            <!-- View toggle -->
            <div class="flex items-center rounded-md border border-z-200 dark:border-z-800 bg-z-50 dark:bg-z-900 p-0.5">
                <template
                    x-for="m in [{id:'edit',icon:'ph-pencil-simple'},{id:'split',icon:'ph-columns'},{id:'preview',icon:'ph-eye'}]"
                    :key="m.id">
                    <button @click="viewMode=m.id"
                        class="px-2.5 py-1 rounded text-xs font-medium transition-all flex items-center gap-1" :class="viewMode===m.id
                        ? 'bg-white dark:bg-z-800 text-z-900 dark:text-z-100 shadow-card'
                        : 'text-z-400 hover:text-z-700 dark:hover:text-z-300'">
                        <i class="ph" :class="m.icon"></i>
                        <span class="hidden sm:inline capitalize" x-text="m.id"></span>
                    </button>
                </template>
            </div>

            <!-- Save indicator -->
            <div class="hidden sm:flex items-center gap-1.5">
                <div class="w-1.5 h-1.5 rounded-full transition-colors flex-shrink-0"
                    :class="autoSaved?'bg-emerald-400':'bg-amber-400'"></div>
                <span class="text-xs text-z-400" x-text="autoSaved?'Saved':'Saving…'"></span>
            </div>

            <!-- Right actions -->
            <button @click="showCmd=true;cmdQuery='';$nextTick(()=>$refs.cmdInput?.focus())" class="btn-icon w-7 h-7"
                title="⌘K">
                <i class="ph ph-command text-sm"></i>
            </button>
            <button @click="toggleDark()" class="btn-icon w-7 h-7">
                <i class="ph text-sm" :class="darkMode?'ph-sun':'ph-moon'"></i>
            </button>
            <button @click="showExport=true" class="btn btn-primary text-xs py-1.5 px-3">
                Export
            </button>
        </header>

        <!-- ── Content ───────────────────────────────────────────────── -->
        <div class="flex-1 flex overflow-hidden min-h-0">

            <!-- ── Left sidebar ──────────────────────────────────────── -->
            <aside class="flex-shrink-0 h-full overflow-hidden transition-all duration-200 ease-in-out"
                :class="sidebarOpen?'w-64':'w-0'">
                <div class="w-64 h-full surface-sidebar flex flex-col">

                    <!-- Profile -->
                    <div class="px-4 pt-4 pb-3 border-b border-z-100 dark:border-z-900">
                        <div class="flex items-center gap-3">
                            <label class="relative cursor-pointer flex-shrink-0 group">
                                <div class="w-11 h-11 rounded-lg overflow-hidden border border-z-200 dark:border-z-800">
                                    <img :src="cv.photo||getAvatarUrl()" class="w-full h-full object-cover"
                                        alt="Profile">
                                </div>
                                <div
                                    class="absolute inset-0 rounded-lg bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <i class="ph ph-camera text-white text-xs"></i>
                                </div>
                                <input type="file" accept="image/*" class="hidden" @change="handlePhotoUpload($event)">
                            </label>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium truncate text-z-900 dark:text-z-100"
                                    x-text="cv.name||"{{ __('cv_builder.your_name') }}""></p>
                                <p class="text-xs text-z-400 truncate mt-0.5" x-text="cv.title||"{{ __('cv_builder.your_title') }}""></p>
                                <div class="flex items-center gap-1.5 mt-1.5">
                                    <div class="flex-1 h-1 bg-z-200 dark:bg-z-800 rounded-full overflow-hidden">
                                        <div class="h-full bg-accent rounded-full transition-all duration-500"
                                            :style="'width:'+completeness+'%'"></div>
                                    </div>
                                    <span class="text-xs text-z-400" x-text="completeness+'%'"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Scrollable sidebar content -->
                    <div class="flex-1 overflow-y-auto py-3 px-3 space-y-4">

                        <!-- Templates -->
                        <div>
                            <p class="t-label mb-2">{{ __('cv_builder.template_label') }}</p>
                            <div class="grid grid-cols-3 gap-1.5">
                                <template x-for="tpl in templates" :key="tpl.id">
                                    <button @click="activeTemplate=tpl.id;notify("{{ __('cv_builder.template_label') }}: "+tpl.name,'success')"
                                        class="tpl-card" :class="activeTemplate===tpl.id?'active':''">
                                        <div class="h-12 flex items-center justify-center"
                                            :style="'background:'+tpl.preview">
                                            <div class="space-y-0.5 px-2 w-full">
                                                <div class="h-0.5 bg-white/60 rounded-sm w-3/4 mx-auto"></div>
                                                <div class="h-0.5 bg-white/35 rounded-sm w-full mx-auto"></div>
                                                <div class="h-0.5 bg-white/25 rounded-sm w-2/3 mx-auto"></div>
                                            </div>
                                        </div>
                                        <div
                                            class="py-1 bg-white dark:bg-z-900 border-t border-z-100 dark:border-z-800">
                                            <p class="text-2xs font-medium text-center text-z-600 dark:text-z-400 truncate px-1"
                                                x-text="tpl.name"></p>
                                        </div>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Accent color -->
                        <div>
                            <p class="t-label mb-2">{{ __('cv_builder.accent_label') }}</p>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="(c,i) in colorPalette" :key="i">
                                    <button class="swatch" :class="{active:accentColor===c}"
                                        :style="'background:'+c+';color:'+c" @click="setAccent(c)" :title="c"></button>
                                </template>
                                <label
                                    class="swatch border border-dashed border-z-300 dark:border-z-700 flex items-center justify-center cursor-pointer hover:border-z-500 transition-colors"
                                    title="Custom">
                                    <i class="ph ph-eyedropper text-z-400 text-xs"></i>
                                    <input type="color" class="hidden" @change="setAccent($event.target.value)">
                                </label>
                            </div>
                        </div>

                        <!-- Font -->
                        <div>
                            <p class="t-label mb-2">{{ __('cv_builder.font_label') }}</p>
                            <div class="space-y-0.5">
                                <template x-for="f in fonts" :key="f.id">
                                    <button @click="activeFont=f.id"
                                        class="w-full flex items-center justify-between px-2.5 py-1.5 rounded-md text-sm transition-colors"
                                        :class="activeFont===f.id
                                        ? 'bg-accent/6 text-accent dark:text-blue-400 border border-accent/20'
                                        : 'text-z-600 dark:text-z-400 hover:bg-z-50 dark:hover:bg-z-900'"
                                        :style="'font-family:'+f.family">
                                        <span x-text="f.name"></span>
                                        <i x-show="activeFont===f.id" class="ph ph-check text-xs"></i>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Sections -->
                        <div>
                            <p class="t-label mb-2">{{ __('cv_builder.sections_label') }}</p>
                            <div class="space-y-0.5">
                                <template x-for="(vis,sec) in sectionVisibility" :key="sec">
                                    <div class="flex items-center justify-between py-1.5 px-1">
                                        <span class="text-sm capitalize text-z-600 dark:text-z-400" x-text="sec"></span>
                                        <label class="toggle-wrap">
                                            <input type="checkbox" :checked="vis"
                                                @change="sectionVisibility[sec]=!sectionVisibility[sec];debouncedSave()">
                                            <span class="toggle-track"></span>
                                            <span class="toggle-knob"></span>
                                        </label>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Export -->
                        <div>
                            <p class="t-label mb-2">{{ __('cv_builder.export_label') }}</p>
                            <div class="space-y-1.5">
                                <button @click="showExport=true" class="btn btn-primary w-full text-xs py-2">Export
                                    resume</button>
                                <button @click="showImport=true" class="btn btn-secondary w-full text-xs py-2"><i
                                        class="ph ph-upload-simple"></i> Import JSON</button>
                            </div>
                        </div>

                        <!-- History -->
                        <div>
                            <p class="t-label mb-2">{{ __('cv_builder.history_label') }}</p>
                            <div class="flex gap-1.5">
                                <button @click="undo()" :disabled="histIdx<=0"
                                    class="btn btn-secondary flex-1 text-xs py-1.5 disabled:opacity-40">
                                    <i class="ph ph-arrow-counter-clockwise text-xs"></i> Undo
                                </button>
                                <button @click="redo()" :disabled="histIdx>=history.length-1"
                                    class="btn btn-secondary flex-1 text-xs py-1.5 disabled:opacity-40">
                                    <i class="ph ph-arrow-clockwise text-xs"></i> Redo
                                </button>
                            </div>
                            <p class="text-center text-xs text-z-400 mt-1.5"
                                x-text="histIdx+' / '+(history.length-1)+' steps'"></p>
                        </div>

                        <!-- Shortcuts -->
                        <button @click="showShortcuts=true"
                            class="btn btn-ghost w-full text-xs py-1.5 justify-start gap-2">
                            <i class="ph ph-keyboard text-sm"></i>
                            Keyboard shortcuts
                            <kbd
                                class="ml-auto px-1.5 py-0.5 bg-z-100 dark:bg-z-800 rounded border border-z-200 dark:border-z-700 text-z-500">?</kbd>
                        </button>

                        <!-- Clear data -->
                        <button @click="clearAll()" class="btn btn-danger w-full text-xs py-1.5 justify-start gap-2">
                            <i class="ph ph-trash text-sm"></i>
                            Clear all data
                        </button>

                    </div>

                    <!-- Sidebar footer -->
                    <div class="px-3 py-2 border-t border-z-100 dark:border-z-900 flex items-center gap-1.5">
                        <div class="w-1.5 h-1.5 rounded-full flex-shrink-0"
                            :class="autoSaved?'bg-emerald-400':'bg-amber-400'"></div>
                        <span class="text-xs text-z-400" x-text="autoSaved?'Auto-saved':'Unsaved changes'"></span>
                        <span class="text-xs text-z-300 dark:text-z-700 ml-auto" x-text="lastSaved"></span>
                    </div>

                </div>
            </aside>

            <!-- ── Editor panel ───────────────────────────────────────── -->
            <div id="editor-panel" class="overflow-y-auto transition-all duration-200 flex-shrink-0 min-h-0" :class="{
                'flex-1': viewMode==='edit'||viewMode==='split',
                'w-0 overflow-hidden': viewMode==='preview',
            }">
                <div class="max-w-2xl mx-auto px-4 py-5 space-y-2.5">

                    <!-- Personal information -->
                    <div class="section-card fade-in" x-data="{open:true}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-user text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.personal_info') }}</span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse class="px-4 pb-4 border-t border-z-100 dark:border-z-800">
                            <!-- Profile Photo Upload -->
                            <div class="pt-4 flex flex-col sm:flex-row items-center gap-4 border-b border-z-100 dark:border-z-900 pb-4"
                                x-data="{ isDragging: false }" @dragover.prevent="isDragging = true"
                                @dragleave.prevent="isDragging = false"
                                @drop.prevent="isDragging = false; handlePhotoDrop($event)">

                                <!-- Avatar Preview -->
                                <div
                                    class="relative w-14 h-14 rounded-full overflow-hidden border border-z-200 dark:border-z-800 flex-shrink-0 bg-z-50 dark:bg-z-900 group">
                                    <template x-if="cv.photo">
                                        <img :src="cv.photo" class="w-full h-full object-cover" alt="Profile avatar">
                                    </template>
                                    <template x-if="!cv.photo">
                                        <div
                                            class="w-full h-full flex items-center justify-center text-z-400 dark:text-z-600">
                                            <i class="ph ph-user-circle text-3xl"></i>
                                        </div>
                                    </template>
                                </div>

                                <!-- Upload Actions & Drag Zone -->
                                <div class="flex-1 min-w-0 text-center sm:text-left space-y-1">
                                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
                                        <label
                                            class="relative cursor-pointer text-xs font-medium px-2.5 py-1.5 rounded-md bg-white dark:bg-z-900 border border-z-200 dark:border-z-800 hover:bg-z-50 dark:hover:bg-z-850 focus-within:ring-1 focus-within:ring-accent transition-colors shadow-sm select-none">
                                            <span>{{ __('cv_builder.upload_photo') }}</span>
                                            <input type="file" accept="image/*" class="sr-only"
                                                @change="handlePhotoUpload($event)">
                                        </label>
                                        <button x-show="cv.photo"
                                            @click="cv.photo = ''; debouncedSave(); notify("{{ __('cv_builder.photo_removed') }}", 'info');"
                                            type="button"
                                            class="text-xs font-medium px-2.5 py-1.5 rounded-md text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/20 border border-transparent hover:border-red-100 dark:hover:border-red-900/30 transition-colors">
                                            Remove
                                        </button>
                                    </div>
                                    <p class="text-2xs text-z-400 dark:text-z-500"
                                        :class="isDragging ? 'text-accent font-medium' : ''">
                                        <span x-show="!isDragging">Drag and drop your image here, or click to upload
                                            (max 3MB).</span>
                                        <span x-show="isDragging">Drop your image here...</span>
                                    </p>
                                </div>
                            </div>

                            <div class="pt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div class="sm:col-span-2">
                                    <label class="field-label">{{ __('cv_builder.full_name') }} *</label>
                                    <input type="text" x-model="cv.name" @input="debouncedSave()"
                                        placeholder="Alexandra Chen" class="field-input">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="field-label">Professional title</label>
                                    <input type="text" x-model="cv.title" @input="debouncedSave()"
                                        placeholder="Senior Full-Stack Engineer" class="field-input">
                                </div>
                                <div>
                                    <label class="field-label">{{ __('cv_builder.email') }}</label>
                                    <input type="email" x-model="cv.email" @input="debouncedSave()"
                                        placeholder="you@example.com" class="field-input">
                                </div>
                                <div>
                                    <label class="field-label">{{ __('cv_builder.phone') }}</label>
                                    <input type="tel" x-model="cv.phone" @input="debouncedSave()"
                                        placeholder="+1 (555) 000-0000" class="field-input">
                                </div>
                                <div>
                                    <label class="field-label">{{ __('cv_builder.location') }}</label>
                                    <input type="text" x-model="cv.location" @input="debouncedSave()"
                                        placeholder="San Francisco, CA" class="field-input">
                                </div>
                                <div>
                                    <label class="field-label">{{ __('cv_builder.website') }}</label>
                                    <input type="url" x-model="cv.website" @input="debouncedSave()"
                                        placeholder="https://yoursite.com" class="field-input">
                                </div>
                                <!-- Social links -->
                                <div class="sm:col-span-2">
                                    <label class="field-label">{{ __('cv_builder.social_links') }}</label>
                                    <div class="space-y-2">
                                        <template x-for="(link,i) in cv.socials" :key="i">
                                            <div class="flex gap-2">
                                                <select x-model="link.platform"
                                                    class="field-input w-28 flex-shrink-0 py-1.5">
                                                    <option value="linkedin">LinkedIn</option>
                                                    <option value="github">{{ __('cv_builder.github') }}</option>
                                                    <option value="twitter">Twitter/X</option>
                                                    <option value="dribbble">Dribbble</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <input type="url" x-model="link.url" @input="debouncedSave()"
                                                    placeholder="https://…" class="field-input flex-1">
                                                <button @click="cv.socials.splice(i,1)"
                                                    class="btn-icon flex-shrink-0 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10">
                                                    <i class="ph ph-x text-xs"></i>
                                                </button>
                                            </div>
                                        </template>
                                        <button @click="cv.socials.push({platform:'linkedin',url:''})" class="add-btn">
                                            <i class="ph ph-plus text-xs"></i> Add link
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="section-card" x-show="sectionVisibility.summary" x-data="{open:true}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-text-align-left text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.summary') }}</span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse class="px-4 pb-4 border-t border-z-100 dark:border-z-800">
                            <div class="pt-4 space-y-2">
                                <div class="flex flex-wrap gap-1.5 mb-2">
                                    <span class="t-caption">{{ __('cv_builder.suggestions') }}</span>
                                    <button class="ai-chip"><i class="ph ph-sparkle text-xs"></i> {{ __('cv_builder.add_metrics') }}</button>
                                    <button class="ai-chip">{{ __('cv_builder.action_verbs') }}</button>
                                    <button class="ai-chip">{{ __('cv_builder.be_concise') }}</button>
                                </div>
                                <div class="relative">
                                    <textarea x-model="cv.summary" @input="autoResize($event);debouncedSave()"
                                        placeholder="Results-driven engineer with 5+ years experience building scalable products…"
                                        rows="4" class="field-input resize-none leading-relaxed"
                                        style="min-height:96px"></textarea>
                                    <span class="absolute bottom-2.5 right-3 text-xs text-z-300 font-mono"
                                        x-text="(cv.summary||'').length"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Experience -->
                    <div class="section-card" x-show="sectionVisibility.experience" x-data="{open:true}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-briefcase text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.work_experience') }}</span>
                            <span class="text-xs text-z-400 mr-2" x-text="cv.experiences.length"></span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse
                            class="px-4 pb-4 border-t border-z-100 dark:border-z-800 pt-4 space-y-2.5">
                            <template x-for="(exp,i) in cv.experiences" :key="exp.id">
                                <div class="entry-card fade-in">
                                    <div class="entry-actions">
                                        <button @click="duplicateEntry('experiences',i)" class="btn-icon w-6 h-6"
                                            title="Duplicate"><i class="ph ph-copy-simple text-xs"></i></button>
                                        <button @click="deleteEntry('experiences',i)"
                                            class="btn-icon w-6 h-6 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10"
                                            title="Delete"><i class="ph ph-trash-simple text-xs"></i></button>
                                    </div>
                                    <div class="flex items-start gap-2 mb-3">
                                        <div class="drag-h pt-0.5 flex-shrink-0"><i
                                                class="ph ph-dots-six-vertical text-base"></i></div>
                                        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                            <div>
                                                <label class="field-label">{{ __('cv_builder.job_title_field') }}</label>
                                                <input type="text" x-model="exp.title" @input="debouncedSave()"
                                                    placeholder="Senior Engineer" class="field-input">
                                            </div>
                                            <div>
                                                <label class="field-label">{{ __('cv_builder.company') }}</label>
                                                <input type="text" x-model="exp.company" @input="debouncedSave()"
                                                    placeholder="Acme Corp" class="field-input">
                                            </div>
                                            <div>
                                                <label class="field-label">{{ __('cv_builder.location') }}</label>
                                                <input type="text" x-model="exp.location" @input="debouncedSave()"
                                                    placeholder="Remote / New York" class="field-input">
                                            </div>
                                            <div class="grid grid-cols-2 gap-2">
                                                <div>
                                                    <label class="field-label">{{ __('cv_builder.start_date') }}</label>
                                                    <input type="month" x-model="exp.startDate" @input="debouncedSave()"
                                                        class="field-input">
                                                </div>
                                                <div>
                                                    <label class="field-label">{{ __('cv_builder.end_date') }}</label>
                                                    <input type="month" x-model="exp.endDate" @input="debouncedSave()"
                                                        :disabled="exp.current" class="field-input disabled:opacity-40">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="flex items-center gap-2 cursor-pointer mb-3 ml-6">
                                        <input type="checkbox" x-model="exp.current" @change="debouncedSave()"
                                            class="w-3.5 h-3.5 rounded border-z-300 accent-accent">
                                        <span class="text-xs text-z-500">{{ __('cv_builder.current_job') }}</span>
                                    </label>
                                    <div class="ml-6">
                                        <label class="field-label">{{ __('cv_builder.description_achievements') }}</label>
                                        <textarea x-model="exp.description" @input="autoResize($event);debouncedSave()"
                                            placeholder="• Led migration to microservices, reducing API latency by 65%&#10;• Mentored 4 engineers, improving team velocity by 30%"
                                            rows="3" class="field-input resize-none leading-relaxed"
                                            style="min-height:72px"></textarea>
                                    </div>
                                </div>
                            </template>
                            <div x-show="cv.experiences.length===0" class="empty-state">
                                <i class="ph ph-briefcase text-2xl mb-2 opacity-30"></i>
                                <p class="text-sm">{{ __('cv_builder.no_experience') }}</p>
                            </div>
                            <button
                                @click="addEntry('experiences',{id:uid(),title:'',company:'',location:'',startDate:'',endDate:'',current:false,description:''})"
                                class="add-btn">
                                <i class="ph ph-plus text-xs"></i> Add experience
                            </button>
                        </div>
                    </div>

                    <!-- Education -->
                    <div class="section-card" x-show="sectionVisibility.education" x-data="{open:true}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-graduation-cap text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.education') }}</span>
                            <span class="text-xs text-z-400 mr-2" x-text="cv.education.length"></span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse
                            class="px-4 pb-4 border-t border-z-100 dark:border-z-800 pt-4 space-y-2.5">
                            <template x-for="(edu,i) in cv.education" :key="edu.id">
                                <div class="entry-card fade-in">
                                    <div class="entry-actions">
                                        <button @click="duplicateEntry('education',i)" class="btn-icon w-6 h-6"><i
                                                class="ph ph-copy-simple text-xs"></i></button>
                                        <button @click="deleteEntry('education',i)"
                                            class="btn-icon w-6 h-6 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10"><i
                                                class="ph ph-trash-simple text-xs"></i></button>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-3">
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.degree') }}</label>
                                            <input type="text" x-model="edu.degree" @input="debouncedSave()"
                                                placeholder="B.Sc. Computer Science" class="field-input">
                                        </div>
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.institution') }}</label>
                                            <input type="text" x-model="edu.school" @input="debouncedSave()"
                                                placeholder="MIT" class="field-input">
                                        </div>
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.field_of_study') }}</label>
                                            <input type="text" x-model="edu.field" @input="debouncedSave()"
                                                placeholder="Computer Science" class="field-input">
                                        </div>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div>
                                                <label class="field-label">{{ __('cv_builder.start_year') }}</label>
                                                <input type="number" x-model="edu.startYear" @input="debouncedSave()"
                                                    placeholder="2018" min="1950" max="2030" class="field-input">
                                            </div>
                                            <div>
                                                <label class="field-label">{{ __('cv_builder.end_year') }}</label>
                                                <input type="number" x-model="edu.endYear" @input="debouncedSave()"
                                                    placeholder="2022" min="1950" max="2030" class="field-input">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.gpa') }}</label>
                                            <input type="text" x-model="edu.gpa" @input="debouncedSave()"
                                                placeholder="3.9 / 4.0" class="field-input">
                                        </div>
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.notes') }}</label>
                                            <input type="text" x-model="edu.notes" @input="debouncedSave()"
                                                placeholder="Dean's list, honors…" class="field-input">
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <div x-show="cv.education.length===0" class="empty-state">
                                <i class="ph ph-graduation-cap text-2xl mb-2 opacity-30"></i>
                                <p class="text-sm">{{ __('cv_builder.no_education') }}</p>
                            </div>
                            <button
                                @click="addEntry('education',{id:uid(),degree:'',school:'',field:'',startYear:'',endYear:'',gpa:'',notes:''})"
                                class="add-btn">
                                <i class="ph ph-plus text-xs"></i> Add education
                            </button>
                        </div>
                    </div>

                    <!-- Skills -->
                    <div class="section-card" x-show="sectionVisibility.skills" x-data="{open:true}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-lightning text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.skills') }}</span>
                            <span class="text-xs text-z-400 mr-2" x-text="cv.skills.filter(s=>s.name).length"></span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse
                            class="px-4 pb-4 border-t border-z-100 dark:border-z-800 pt-4 space-y-2.5">
                            <!-- Suggestions -->
                            <div>
                                <p class="field-label mb-1.5">{{ __('cv_builder.quick_add') }}</p>
                                <div class="flex flex-wrap gap-1.5">
                                    <template x-for="sk in suggestedSkills.slice(0,10)" :key="sk">
                                        <button @click="addSkillFromSuggestion(sk)" class="skill-chip"
                                            x-text="sk"></button>
                                    </template>
                                </div>
                            </div>
                            <template x-for="(skill,i) in cv.skills" :key="skill.id">
                                <div class="flex items-center gap-3 group fade-in">
                                    <div class="drag-h flex-shrink-0"><i class="ph ph-dots-six-vertical text-sm"></i>
                                    </div>
                                    <input type="text" x-model="skill.name" @input="debouncedSave()"
                                        placeholder="e.g. TypeScript, Figma…" class="field-input flex-1">
                                    <div class="flex items-center gap-2 w-36 flex-shrink-0">
                                        <input type="range" x-model="skill.level" @input="debouncedSave()" min="10"
                                            max="100" step="5" class="flex-1">
                                        <span class="text-xs font-mono text-z-400 w-8 text-right"
                                            x-text="skill.level+'%'"></span>
                                    </div>
                                    <button @click="cv.skills.splice(i,1);debouncedSave()"
                                        class="btn-icon w-6 h-6 opacity-0 group-hover:opacity-100 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10 flex-shrink-0">
                                        <i class="ph ph-x text-xs"></i>
                                    </button>
                                </div>
                            </template>
                            <button @click="addEntry('skills',{id:uid(),name:'',level:80})" class="add-btn">
                                <i class="ph ph-plus text-xs"></i> Add skill
                            </button>
                        </div>
                    </div>

                    <!-- Projects -->
                    <div class="section-card" x-show="sectionVisibility.projects" x-data="{open:false}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-code text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.projects') }}</span>
                            <span class="text-xs text-z-400 mr-2" x-text="cv.projects.length"></span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse
                            class="px-4 pb-4 border-t border-z-100 dark:border-z-800 pt-4 space-y-2.5">
                            <template x-for="(proj,i) in cv.projects" :key="proj.id">
                                <div class="entry-card fade-in">
                                    <div class="entry-actions">
                                        <button @click="duplicateEntry('projects',i)" class="btn-icon w-6 h-6"><i
                                                class="ph ph-copy-simple text-xs"></i></button>
                                        <button @click="deleteEntry('projects',i)"
                                            class="btn-icon w-6 h-6 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10"><i
                                                class="ph ph-trash-simple text-xs"></i></button>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-2.5">
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.project_name') }}</label>
                                            <input type="text" x-model="proj.name" @input="debouncedSave()"
                                                placeholder="OpenStream" class="field-input">
                                        </div>
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.technologies') }}</label>
                                            <input type="text" x-model="proj.tech" @input="debouncedSave()"
                                                placeholder="Next.js, Go, Redis" class="field-input">
                                        </div>
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.live_url') }}</label>
                                            <input type="url" x-model="proj.url" @input="debouncedSave()"
                                                placeholder="https://…" class="field-input">
                                        </div>
                                        <div>
                                            <label class="field-label">{{ __('cv_builder.github') }}</label>
                                            <input type="url" x-model="proj.github" @input="debouncedSave()"
                                                placeholder="https://github.com/…" class="field-input">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="field-label">{{ __('cv_builder.description') }}</label>
                                        <textarea x-model="proj.description" @input="autoResize($event);debouncedSave()"
                                            rows="2" placeholder="Open-source platform handling 10K concurrent users…"
                                            class="field-input resize-none leading-relaxed"
                                            style="min-height:56px"></textarea>
                                    </div>
                                </div>
                            </template>
                            <div x-show="cv.projects.length===0" class="empty-state">
                                <i class="ph ph-code text-2xl mb-2 opacity-30"></i>
                                <p class="text-sm">{{ __('cv_builder.no_projects') }}</p>
                            </div>
                            <button
                                @click="addEntry('projects',{id:uid(),name:'',tech:'',url:'',github:'',description:''})"
                                class="add-btn">
                                <i class="ph ph-plus text-xs"></i> Add project
                            </button>
                        </div>
                    </div>

                    <!-- Certifications -->
                    <div class="section-card" x-show="sectionVisibility.certifications" x-data="{open:false}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-certificate text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.certifications') }}</span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse
                            class="px-4 pb-4 border-t border-z-100 dark:border-z-800 pt-4 space-y-2">
                            <template x-for="(cert,i) in cv.certifications" :key="cert.id">
                                <div class="flex items-center gap-2 group fade-in">
                                    <div class="flex-1 grid grid-cols-1 sm:grid-cols-3 gap-2">
                                        <input type="text" x-model="cert.name" @input="debouncedSave()"
                                            placeholder="AWS Solutions Architect" class="field-input">
                                        <input type="text" x-model="cert.issuer" @input="debouncedSave()"
                                            placeholder="Amazon Web Services" class="field-input">
                                        <input type="month" x-model="cert.date" @input="debouncedSave()"
                                            class="field-input">
                                    </div>
                                    <button @click="cv.certifications.splice(i,1);debouncedSave()"
                                        class="btn-icon w-6 h-6 opacity-0 group-hover:opacity-100 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10 flex-shrink-0">
                                        <i class="ph ph-x text-xs"></i>
                                    </button>
                                </div>
                            </template>
                            <button @click="addEntry('certifications',{id:uid(),name:'',issuer:'',date:''})"
                                class="add-btn">
                                <i class="ph ph-plus text-xs"></i> Add certification
                            </button>
                        </div>
                    </div>

                    <!-- Languages -->
                    <div class="section-card" x-show="sectionVisibility.languages" x-data="{open:false}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-translate text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.languages') }}</span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse
                            class="px-4 pb-4 border-t border-z-100 dark:border-z-800 pt-4 space-y-2">
                            <template x-for="(lang,i) in cv.languages" :key="lang.id">
                                <div class="flex items-center gap-2 group fade-in">
                                    <input type="text" x-model="lang.name" @input="debouncedSave()"
                                        placeholder="English" class="field-input flex-1">
                                    <select x-model="lang.level" @change="debouncedSave()"
                                        class="field-input w-44 flex-shrink-0 py-1.5">
                                        <option value="native">Native</option>
                                        <option value="fluent">Fluent</option>
                                        <option value="advanced">Advanced (C1)</option>
                                        <option value="intermediate">Intermediate (B2)</option>
                                        <option value="basic">Basic (A2)</option>
                                    </select>
                                    <button @click="cv.languages.splice(i,1);debouncedSave()"
                                        class="btn-icon w-6 h-6 opacity-0 group-hover:opacity-100 hover:text-red-500 flex-shrink-0">
                                        <i class="ph ph-x text-xs"></i>
                                    </button>
                                </div>
                            </template>
                            <button @click="addEntry('languages',{id:uid(),name:'',level:'fluent'})" class="add-btn">
                                <i class="ph ph-plus text-xs"></i> Add language
                            </button>
                        </div>
                    </div>

                    <!-- Custom sections -->
                    <div class="section-card" x-data="{open:false}">
                        <div class="section-card-header" @click="open=!open">
                            <div class="section-icon bg-z-100 dark:bg-z-800">
                                <i class="ph ph-plus-circle text-z-500 dark:text-z-400 text-sm"></i>
                            </div>
                            <span class="t-section-title flex-1">{{ __('cv_builder.custom_sections') }}</span>
                            <span class="text-xs text-z-400 mr-2" x-text="cv.customSections.length"></span>
                            <i class="ph text-z-400 text-xs transition-transform duration-200"
                                :class="open?'ph-caret-up':'ph-caret-down'"></i>
                        </div>
                        <div x-show="open" x-collapse
                            class="px-4 pb-4 border-t border-z-100 dark:border-z-800 pt-4 space-y-2.5">
                            <template x-for="(sec,i) in cv.customSections" :key="sec.id">
                                <div class="entry-card fade-in">
                                    <div class="entry-actions">
                                        <button @click="cv.customSections.splice(i,1);debouncedSave()"
                                            class="btn-icon w-6 h-6 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10"><i
                                                class="ph ph-x text-xs"></i></button>
                                    </div>
                                    <input type="text" x-model="sec.title" @input="debouncedSave()"
                                        placeholder="Section title (e.g. Volunteering)"
                                        class="field-input mb-2.5 font-medium">
                                    <textarea x-model="sec.content" @input="autoResize($event);debouncedSave()" rows="3"
                                        placeholder="Your content here…" class="field-input resize-none leading-relaxed"
                                        style="min-height:64px"></textarea>
                                </div>
                            </template>
                            <button @click="addEntry('customSections',{id:uid(),title:'',content:''})" class="add-btn">
                                <i class="ph ph-plus text-xs"></i> Add section
                            </button>
                        </div>
                    </div>

                    <div class="h-16"></div>
                </div>
            </div>

            <!-- ── Preview panel ──────────────────────────────────────── -->
            <div id="preview-panel"
                class="overflow-y-auto transition-all duration-200 border-l border-z-200 dark:border-z-900 surface-preview flex-shrink-0"
                :class="{
                'w-0 overflow-hidden border-l-0': viewMode==='edit',
                'w-[42%] min-w-0': viewMode==='split',
                'flex-1 min-w-0': viewMode==='preview',
            }">

                <!-- Preview toolbar -->
                <div
                    class="sticky top-0 z-10 surface-topbar px-4 py-2 flex items-center justify-between border-b border-z-200 dark:border-z-900">
                    <div class="flex items-center gap-2.5">
                        <div class="flex gap-1.5">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-400/80"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-amber-400/80"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-400/80"></div>
                        </div>
                        <span class="text-xs text-z-400"
                            x-text="(templates.find(t=>t.id===activeTemplate)?.name||'Classic')+' · A4'"></span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <button @click="previewZoom=Math.max(50,previewZoom-10)" class="btn-icon w-6 h-6"><i
                                class="ph ph-minus text-xs"></i></button>
                        <span class="text-xs font-mono text-z-500 w-9 text-center" x-text="previewZoom+'%'"></span>
                        <button @click="previewZoom=Math.min(120,previewZoom+10)" class="btn-icon w-6 h-6"><i
                                class="ph ph-plus text-xs"></i></button>
                        <button @click="previewZoom=75" class="btn-icon w-6 h-6" title="Fit"><i
                                class="ph ph-arrows-out text-xs"></i></button>
                        <div class="w-px h-4 bg-z-200 dark:bg-z-800 mx-0.5"></div>
                        <button @click="printResume()" class="btn-icon w-6 h-6" title="Print"><i
                                class="ph ph-printer text-xs"></i></button>
                    </div>
                </div>

                <!-- A4 document -->
                <div class="p-8 flex justify-center min-h-full">
                    <div :style="'transform:scale('+previewZoom/100+');transform-origin:top center;width:210mm;'">
                        <div class="a4-paper" :style="'font-family:'+getCurrentFont()">

                            <!-- ═══ CLASSIC ═══ -->
                            <div x-show="activeTemplate==='classic'">
                                <div class="px-10 pt-9 pb-5 border-b-2" :style="'border-color:'+accentColor">
                                    <div class="flex items-start gap-5">
                                        <img x-show="cv.photo" :src="cv.photo"
                                            class="w-16 h-16 rounded-lg object-cover flex-shrink-0" alt="Profile">
                                        <div class="flex-1 min-w-0">
                                            <h1 class="text-2xl font-bold text-gray-900 tracking-tight leading-tight"
                                                x-text="cv.name||'Your Name'"></h1>
                                            <p class="text-sm font-medium mt-0.5" :style="'color:'+accentColor"
                                                x-text="cv.title"></p>
                                            <div class="flex flex-wrap gap-x-4 gap-y-0.5 mt-2 text-xs text-gray-500">
                                                <span x-show="cv.email" x-text="cv.email"></span>
                                                <span x-show="cv.phone" x-text="cv.phone"></span>
                                                <span x-show="cv.location" x-text="cv.location"></span>
                                                <span x-show="cv.website"
                                                    x-text="cv.website?.replace('https://','')"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-10 py-8 space-y-6">
                                    <template x-if="sectionVisibility.summary && cv.summary">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-2"
                                                :style="'color:'+accentColor">{{ __('cv_builder.summary') }}</h2>
                                            <p class="text-xs text-gray-700 leading-relaxed" x-text="cv.summary"></p>
                                        </div>
                                    </template>
                                    <template x-if="sectionVisibility.experience && cv.experiences.length">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-3"
                                                :style="'color:'+accentColor">Experience</h2>
                                            <div class="space-y-4">
                                                <template x-for="exp in cv.experiences" :key="exp.id">
                                                    <div>
                                                        <div class="flex items-start justify-between gap-4">
                                                            <div>
                                                                <p class="text-sm font-semibold text-gray-900 leading-snug"
                                                                    x-text="exp.title"></p>
                                                                <p class="text-xs text-gray-500 mt-0.5"
                                                                    x-text="exp.company+(exp.location?' · '+exp.location:'')">
                                                                </p>
                                                            </div>
                                                            <p class="text-xs text-gray-400 whitespace-nowrap flex-shrink-0"
                                                                x-text="fmtDateRange(exp.startDate,exp.endDate,exp.current)">
                                                            </p>
                                                        </div>
                                                        <p class="text-xs text-gray-600 mt-1.5 leading-relaxed whitespace-pre-line"
                                                            x-text="exp.description"></p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                    <template x-if="sectionVisibility.education && cv.education.length">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-3"
                                                :style="'color:'+accentColor">{{ __('cv_builder.education') }}</h2>
                                            <div class="space-y-3">
                                                <template x-for="edu in cv.education" :key="edu.id">
                                                    <div class="flex items-start justify-between gap-4">
                                                        <div>
                                                            <p class="text-sm font-semibold text-gray-900"
                                                                x-text="edu.degree+(edu.field?' in '+edu.field:'')"></p>
                                                            <p class="text-xs text-gray-500 mt-0.5"
                                                                x-text="edu.school+(edu.gpa?' · GPA '+edu.gpa:'')"></p>
                                                            <p x-show="edu.notes" class="text-xs text-gray-400 mt-0.5"
                                                                x-text="edu.notes"></p>
                                                        </div>
                                                        <p class="text-xs text-gray-400 whitespace-nowrap"
                                                            x-text="(edu.startYear||'')+(edu.endYear?' – '+edu.endYear:'')">
                                                        </p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                    <template x-if="sectionVisibility.skills && cv.skills.filter(s=>s.name).length">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-2.5"
                                                :style="'color:'+accentColor">{{ __('cv_builder.skills') }}</h2>
                                            <div class="space-y-1.5">
                                                <template x-for="s in cv.skills.filter(s=>s.name)" :key="s.id">
                                                    <div class="flex items-center gap-3">
                                                        <span class="text-xs text-gray-700 w-28 flex-shrink-0"
                                                            x-text="s.name"></span>
                                                        <div
                                                            class="flex-1 h-1 bg-gray-100 rounded-full overflow-hidden">
                                                            <div class="h-full rounded-full"
                                                                :style="'width:'+s.level+'%;background:'+accentColor">
                                                            </div>
                                                        </div>
                                                        <span class="text-xs text-gray-400 w-8 text-right"
                                                            x-text="s.level+'%'"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                    <template x-if="sectionVisibility.projects && cv.projects.filter(p=>p.name).length">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-3"
                                                :style="'color:'+accentColor">{{ __('cv_builder.projects') }}</h2>
                                            <div class="space-y-2.5">
                                                <template x-for="p in cv.projects.filter(p=>p.name)" :key="p.id">
                                                    <div>
                                                        <div class="flex items-center justify-between gap-2">
                                                            <p class="text-xs font-semibold text-gray-900"
                                                                x-text="p.name"></p>
                                                            <span x-show="p.tech"
                                                                class="text-xs text-gray-400 font-mono"
                                                                x-text="p.tech"></span>
                                                        </div>
                                                        <p class="text-xs text-gray-600 mt-0.5 leading-relaxed"
                                                            x-text="p.description"></p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                    <template
                                        x-if="sectionVisibility.certifications && cv.certifications.filter(c=>c.name).length">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-2"
                                                :style="'color:'+accentColor">{{ __('cv_builder.certifications') }}</h2>
                                            <div class="space-y-1">
                                                <template x-for="c in cv.certifications.filter(c=>c.name)" :key="c.id">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-xs text-gray-700"><span class="font-medium"
                                                                x-text="c.name"></span><span x-show="c.issuer"
                                                                class="text-gray-400 ml-2"
                                                                x-text="'· '+c.issuer"></span></span>
                                                        <span class="text-xs text-gray-400"
                                                            x-text="c.date?new Date(c.date).toLocaleDateString('en-US',{year:'numeric',month:'short'}):''"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                    <template
                                        x-if="sectionVisibility.languages && cv.languages.filter(l=>l.name).length">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-2"
                                                :style="'color:'+accentColor">{{ __('cv_builder.languages') }}</h2>
                                            <div class="flex flex-wrap gap-x-5 gap-y-1">
                                                <template x-for="l in cv.languages.filter(l=>l.name)" :key="l.id">
                                                    <span class="text-xs text-gray-700"><span class="font-medium"
                                                            x-text="l.name"></span><span
                                                            class="text-gray-400 ml-1.5 capitalize"
                                                            x-text="'· '+l.level"></span></span>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                    <template x-for="sec in cv.customSections.filter(s=>s.title)" :key="sec.id">
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-widest mb-2"
                                                :style="'color:'+accentColor" x-text="sec.title"></h2>
                                            <p class="text-xs text-gray-700 leading-relaxed whitespace-pre-line"
                                                x-text="sec.content"></p>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- ═══ MODERN ═══ -->
                            <div x-show="activeTemplate==='modern'" class="flex min-h-full">
                                <div class="w-[36%] flex-shrink-0 px-6 pt-8 pb-8 space-y-5"
                                    :style="'background:'+accentColor">
                                    <div class="text-center">
                                        <img :src="cv.photo||('https://ui-avatars.com/api/?name='+encodeURIComponent(cv.name||'Y')+'&background=ffffff&color='+accentColor.replace('#','')+'&size=128')"
                                            class="w-16 h-16 rounded-full mx-auto mb-2.5 object-cover ring-2 ring-white/30">
                                        <h1 class="text-sm font-bold text-white leading-snug"
                                            x-text="cv.name||'Your Name'"></h1>
                                        <p class="text-xs text-white/70 mt-0.5" x-text="cv.title"></p>
                                    </div>
                                    <div>
                                        <h3 class="text-2xs font-bold uppercase tracking-widest text-white/50 mb-2">
                                            Contact</h3>
                                        <div class="space-y-1 text-xs text-white/80">
                                            <p x-show="cv.email" x-text="cv.email" class="break-all"></p>
                                            <p x-show="cv.phone" x-text="cv.phone"></p>
                                            <p x-show="cv.location" x-text="cv.location"></p>
                                            <p x-show="cv.website" x-text="cv.website?.replace('https://','')"
                                                class="break-all"></p>
                                        </div>
                                    </div>
                                    <div x-show="sectionVisibility.skills && cv.skills.filter(s=>s.name).length">
                                        <h3 class="text-2xs font-bold uppercase tracking-widest text-white/50 mb-2">
                                            {{ __('cv_builder.skills') }}</h3>
                                        <div class="space-y-2">
                                            <template x-for="s in cv.skills.filter(s=>s.name)" :key="s.id">
                                                <div>
                                                    <p class="text-xs text-white/80 mb-0.5" x-text="s.name"></p>
                                                    <div class="h-0.5 bg-white/20 rounded-full overflow-hidden">
                                                        <div class="h-full bg-white rounded-full"
                                                            :style="'width:'+s.level+'%'"></div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    <div x-show="sectionVisibility.languages && cv.languages.filter(l=>l.name).length">
                                        <h3 class="text-2xs font-bold uppercase tracking-widest text-white/50 mb-2">
                                            {{ __('cv_builder.languages') }}</h3>
                                        <div class="space-y-0.5">
                                            <template x-for="l in cv.languages.filter(l=>l.name)" :key="l.id">
                                                <div class="flex justify-between text-xs text-white/80">
                                                    <span x-text="l.name"></span><span class="text-white/50 capitalize"
                                                        x-text="l.level"></span>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 px-7 pt-8 pb-8 space-y-5">
                                    <div x-show="sectionVisibility.summary && cv.summary">
                                        <h2 class="text-xs font-bold uppercase tracking-widest mb-1.5"
                                            :style="'color:'+accentColor">Profile</h2>
                                        <p class="text-xs text-gray-700 leading-relaxed" x-text="cv.summary"></p>
                                    </div>
                                    <div x-show="sectionVisibility.experience && cv.experiences.length">
                                        <h2 class="text-xs font-bold uppercase tracking-widest mb-2.5"
                                            :style="'color:'+accentColor">Experience</h2>
                                        <div class="space-y-3"><template x-for="exp in cv.experiences" :key="exp.id">
                                                <div>
                                                    <div class="flex justify-between items-start gap-2">
                                                        <p class="text-xs font-semibold text-gray-900"
                                                            x-text="exp.title+' · '+exp.company"></p>
                                                        <p class="text-xs text-gray-400 whitespace-nowrap"
                                                            x-text="fmtDateRange(exp.startDate,exp.endDate,exp.current)">
                                                        </p>
                                                    </div>
                                                    <p class="text-xs text-gray-600 mt-1 leading-relaxed whitespace-pre-line"
                                                        x-text="exp.description"></p>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.education && cv.education.length">
                                        <h2 class="text-xs font-bold uppercase tracking-widest mb-2.5"
                                            :style="'color:'+accentColor">{{ __('cv_builder.education') }}</h2>
                                        <div class="space-y-2"><template x-for="edu in cv.education" :key="edu.id">
                                                <div class="flex justify-between gap-2">
                                                    <div>
                                                        <p class="text-xs font-semibold text-gray-900"
                                                            x-text="edu.degree"></p>
                                                        <p class="text-xs text-gray-500" x-text="edu.school"></p>
                                                    </div>
                                                    <p class="text-xs text-gray-400 whitespace-nowrap"
                                                        x-text="(edu.startYear||'')+(edu.endYear?' – '+edu.endYear:'')">
                                                    </p>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.projects && cv.projects.filter(p=>p.name).length">
                                        <h2 class="text-xs font-bold uppercase tracking-widest mb-2.5"
                                            :style="'color:'+accentColor">{{ __('cv_builder.projects') }}</h2>
                                        <div class="space-y-2"><template x-for="p in cv.projects.filter(p=>p.name)"
                                                :key="p.id">
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-900" x-text="p.name"></p>
                                                    <p x-show="p.tech" class="text-xs text-gray-400 font-mono"
                                                        x-text="p.tech"></p>
                                                    <p class="text-xs text-gray-600 mt-0.5" x-text="p.description"></p>
                                                </div>
                                            </template></div>
                                    </div>
                                </div>
                            </div>

                            <!-- ═══ MINIMAL ═══ -->
                            <div x-show="activeTemplate==='minimal'" class="px-14 py-12 space-y-7">
                                <div class="pb-5 border-b border-gray-100">
                                    <h1 class="text-3xl font-light text-gray-900 tracking-tight"
                                        x-text="cv.name||'Your Name'"></h1>
                                    <p class="text-sm text-gray-500 mt-1" x-text="cv.title"></p>
                                    <div class="flex flex-wrap gap-4 mt-2.5 text-xs text-gray-400">
                                        <span x-show="cv.email" x-text="cv.email"></span>
                                        <span x-show="cv.phone" x-text="cv.phone"></span>
                                        <span x-show="cv.location" x-text="cv.location"></span>
                                    </div>
                                </div>
                                <div x-show="sectionVisibility.summary && cv.summary">
                                    <p class="text-sm text-gray-600 leading-relaxed" x-text="cv.summary"></p>
                                </div>
                                <div x-show="sectionVisibility.experience && cv.experiences.length">
                                    <h2 class="text-xs font-medium uppercase tracking-widest text-gray-400 mb-4">
                                        Experience</h2>
                                    <div class="space-y-5"><template x-for="exp in cv.experiences" :key="exp.id">
                                            <div class="grid grid-cols-4 gap-4">
                                                <div class="text-xs text-gray-400 pt-0.5 leading-relaxed"
                                                    x-text="fmtDateRange(exp.startDate,exp.endDate,exp.current)"></div>
                                                <div class="col-span-3">
                                                    <p class="text-sm font-medium text-gray-900" x-text="exp.title"></p>
                                                    <p class="text-xs text-gray-500 mt-0.5" x-text="exp.company"></p>
                                                    <p class="text-xs text-gray-600 mt-1.5 leading-relaxed whitespace-pre-line"
                                                        x-text="exp.description"></p>
                                                </div>
                                            </div>
                                        </template></div>
                                </div>
                                <div x-show="sectionVisibility.education && cv.education.length">
                                    <h2 class="text-xs font-medium uppercase tracking-widest text-gray-400 mb-4">
                                        {{ __('cv_builder.education') }}</h2>
                                    <div class="space-y-3"><template x-for="edu in cv.education" :key="edu.id">
                                            <div class="grid grid-cols-4 gap-4">
                                                <div class="text-xs text-gray-400"
                                                    x-text="(edu.startYear||'')+(edu.endYear?' – '+edu.endYear:'')">
                                                </div>
                                                <div class="col-span-3">
                                                    <p class="text-sm font-medium text-gray-900" x-text="edu.degree">
                                                    </p>
                                                    <p class="text-xs text-gray-500" x-text="edu.school"></p>
                                                </div>
                                            </div>
                                        </template></div>
                                </div>
                                <div x-show="sectionVisibility.skills && cv.skills.filter(s=>s.name).length">
                                    <h2 class="text-xs font-medium uppercase tracking-widest text-gray-400 mb-3">Skills
                                    </h2>
                                    <div class="flex flex-wrap gap-2"><template x-for="s in cv.skills.filter(s=>s.name)"
                                            :key="s.id"><span
                                                class="text-xs text-gray-600 border border-gray-200 rounded px-2.5 py-0.5"
                                                x-text="s.name"></span></template></div>
                                </div>
                            </div>

                            <!-- ═══ EXECUTIVE ═══ -->
                            <div x-show="activeTemplate==='executive'">
                                <div class="px-10 pt-9 pb-6 text-center border-b-2 border-gray-900">
                                    <h1 class="text-3xl font-playfair text-gray-900" x-text="cv.name||'Your Name'"></h1>
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] mt-2 text-gray-500"
                                        x-text="cv.title"></p>
                                    <div class="flex flex-wrap justify-center gap-4 mt-3 text-xs text-gray-400">
                                        <span x-show="cv.email" x-text="cv.email"></span>
                                        <span x-show="cv.phone" x-text="cv.phone"></span>
                                        <span x-show="cv.location" x-text="cv.location"></span>
                                    </div>
                                </div>
                                <div class="px-10 pt-7 pb-10 space-y-5">
                                    <div x-show="sectionVisibility.summary && cv.summary">
                                        <p class="text-sm text-gray-600 leading-relaxed text-center italic font-playfair"
                                            x-text="cv.summary"></p>
                                    </div>
                                    <div x-show="sectionVisibility.experience && cv.experiences.length">
                                        <h2
                                            class="text-xs font-bold uppercase tracking-[0.2em] text-center text-gray-400 mb-4">
                                            Professional Experience</h2>
                                        <div class="space-y-4"><template x-for="exp in cv.experiences" :key="exp.id">
                                                <div class="pl-4 border-l-2 border-gray-200">
                                                    <div class="flex justify-between items-start gap-4">
                                                        <div>
                                                            <p class="text-sm font-semibold text-gray-900"
                                                                x-text="exp.title"></p>
                                                            <p class="text-xs italic text-gray-500 mt-0.5"
                                                                x-text="exp.company+(exp.location?', '+exp.location:'')">
                                                            </p>
                                                        </div>
                                                        <p class="text-xs text-gray-400 whitespace-nowrap"
                                                            x-text="fmtDateRange(exp.startDate,exp.endDate,exp.current)">
                                                        </p>
                                                    </div>
                                                    <p class="text-xs text-gray-600 mt-1.5 leading-relaxed whitespace-pre-line"
                                                        x-text="exp.description"></p>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.education && cv.education.length">
                                        <h2
                                            class="text-xs font-bold uppercase tracking-[0.2em] text-center text-gray-400 mb-3">
                                            {{ __('cv_builder.education') }}</h2>
                                        <div class="space-y-2"><template x-for="edu in cv.education" :key="edu.id">
                                                <div class="flex justify-between gap-4">
                                                    <div>
                                                        <p class="text-sm font-semibold text-gray-900"
                                                            x-text="edu.degree"></p>
                                                        <p class="text-xs italic text-gray-500" x-text="edu.school"></p>
                                                    </div>
                                                    <p class="text-xs text-gray-400"
                                                        x-text="(edu.startYear||'')+(edu.endYear?' – '+edu.endYear:'')">
                                                    </p>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.skills && cv.skills.filter(s=>s.name).length">
                                        <h2
                                            class="text-xs font-bold uppercase tracking-[0.2em] text-center text-gray-400 mb-3">
                                            Core Competencies</h2>
                                        <div class="flex flex-wrap justify-center gap-2"><template
                                                x-for="s in cv.skills.filter(s=>s.name)" :key="s.id"><span
                                                    class="text-xs text-gray-600 border border-gray-300 rounded-sm px-3 py-0.5"
                                                    x-text="s.name"></span></template></div>
                                    </div>
                                </div>
                            </div>

                            <!-- ═══ DEVELOPER ═══ -->
                            <div x-show="activeTemplate==='developer'" class="font-mono">
                                <div class="px-8 pt-7 pb-5 bg-gray-950">
                                    <div class="flex items-center gap-1 text-xs text-gray-600 mb-3 font-mono">
                                        <span class="text-emerald-400">❯</span><span
                                            class="text-gray-500 ml-1">~/resume</span><span
                                            class="text-blue-400 ml-1.5">git:(main)</span>
                                    </div>
                                    <h1 class="text-xl font-bold text-white" x-text="cv.name||'dev.resume'"></h1>
                                    <p class="text-sm mt-0.5" :style="'color:'+accentColor" x-text="cv.title"></p>
                                    <div class="flex flex-wrap gap-4 mt-2.5 text-xs text-gray-500">
                                        <span x-show="cv.email" x-text="cv.email"></span>
                                        <span x-show="cv.location" x-text="cv.location"></span>
                                        <span x-show="cv.website" :style="'color:'+accentColor"
                                            x-text="cv.website?.replace('https://', '')"></span>
                                    </div>
                                </div>
                                <div class="px-8 pt-6 pb-8 bg-white space-y-5">
                                    <div x-show="sectionVisibility.summary && cv.summary">
                                        <p class="text-xs font-bold uppercase tracking-widest mb-1.5"
                                            :style="'color:'+accentColor">// about</p>
                                        <p class="text-xs text-gray-700 leading-relaxed" x-text="cv.summary"></p>
                                    </div>
                                    <div x-show="sectionVisibility.experience && cv.experiences.length">
                                        <p class="text-xs font-bold uppercase tracking-widest mb-3"
                                            :style="'color:'+accentColor">// experience</p>
                                        <div class="space-y-3.5"><template x-for="exp in cv.experiences" :key="exp.id">
                                                <div>
                                                    <div class="flex justify-between gap-2">
                                                        <p class="text-xs font-bold text-gray-900" x-text="exp.title">
                                                        </p><span class="text-xs text-gray-400 font-mono"
                                                            x-text="fmtDateRange(exp.startDate,exp.endDate,exp.current)"></span>
                                                    </div>
                                                    <p class="text-xs text-gray-400 mb-1"
                                                        x-text="exp.company+(exp.location?' · '+exp.location:'')"></p>
                                                    <p class="text-xs text-gray-600 leading-relaxed whitespace-pre-line"
                                                        x-text="exp.description"></p>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.skills && cv.skills.filter(s=>s.name).length">
                                        <p class="text-xs font-bold uppercase tracking-widest mb-2"
                                            :style="'color:'+accentColor">// stack</p>
                                        <div class="flex flex-wrap gap-1.5"><template
                                                x-for="s in cv.skills.filter(s=>s.name)" :key="s.id"><span
                                                    class="text-xs px-2 py-0.5 rounded font-mono"
                                                    :style="'background:'+accentColor+'12; color:'+accentColor"
                                                    x-text="s.name"></span></template></div>
                                    </div>
                                    <div x-show="sectionVisibility.projects && cv.projects.filter(p=>p.name).length">
                                        <p class="text-xs font-bold uppercase tracking-widest mb-3"
                                            :style="'color:'+accentColor">// projects</p>
                                        <div class="space-y-2.5"><template x-for="p in cv.projects.filter(p=>p.name)"
                                                :key="p.id">
                                                <div>
                                                    <p class="text-xs font-bold text-gray-900" x-text="p.name"></p>
                                                    <p x-show="p.tech" class="text-xs font-mono text-gray-400 mt-0.5"
                                                        x-text="'['+p.tech+']'"></p>
                                                    <p class="text-xs text-gray-600 mt-0.5" x-text="p.description"></p>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.education && cv.education.length">
                                        <p class="text-xs font-bold uppercase tracking-widest mb-2"
                                            :style="'color:'+accentColor">// education</p><template
                                            x-for="edu in cv.education" :key="edu.id">
                                            <div class="flex justify-between gap-2 mb-1.5">
                                                <div>
                                                    <p class="text-xs font-bold text-gray-900" x-text="edu.degree"></p>
                                                    <p class="text-xs text-gray-400" x-text="edu.school"></p>
                                                </div>
                                                <p class="text-xs text-gray-400"
                                                    x-text="(edu.startYear||'')+(edu.endYear?' – '+edu.endYear:'')"></p>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- ═══ CREATIVE ═══ -->
                            <div x-show="activeTemplate==='creative'" class="flex min-h-full">
                                <div class="w-1.5 flex-shrink-0" :style="'background:'+accentColor"></div>
                                <div class="flex-1 px-9 pt-9 pb-9 space-y-6">
                                    <div class="pb-5 border-b border-gray-100">
                                        <h1 class="text-3xl font-bold text-gray-900 tracking-tight leading-tight"
                                            x-text="cv.name||'Your Name'"></h1>
                                        <p class="text-sm font-semibold mt-1" :style="'color:'+accentColor"
                                            x-text="cv.title"></p>
                                        <div class="flex flex-wrap gap-4 mt-2 text-xs text-gray-400">
                                            <span x-show="cv.email" x-text="cv.email"></span>
                                            <span x-show="cv.phone" x-text="cv.phone"></span>
                                            <span x-show="cv.location" x-text="cv.location"></span>
                                        </div>
                                    </div>
                                    <div x-show="sectionVisibility.summary && cv.summary">
                                        <p class="text-sm text-gray-600 leading-relaxed" x-text="cv.summary"></p>
                                    </div>
                                    <div x-show="sectionVisibility.experience && cv.experiences.length">
                                        <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">
                                            Experience</h2>
                                        <div class="space-y-4"><template x-for="exp in cv.experiences" :key="exp.id">
                                                <div>
                                                    <div class="flex items-start justify-between gap-4">
                                                        <div>
                                                            <p class="text-sm font-semibold text-gray-900"
                                                                x-text="exp.title"></p>
                                                            <p class="text-xs mt-0.5 font-medium"
                                                                :style="'color:'+accentColor"
                                                                x-text="exp.company+(exp.location?' · '+exp.location:'')">
                                                            </p>
                                                        </div><span
                                                            class="text-xs text-gray-400 whitespace-nowrap bg-gray-100 px-2 py-0.5 rounded flex-shrink-0"
                                                            x-text="fmtDateRange(exp.startDate,exp.endDate,exp.current)"></span>
                                                    </div>
                                                    <p class="text-xs text-gray-600 mt-1.5 leading-relaxed whitespace-pre-line"
                                                        x-text="exp.description"></p>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.skills && cv.skills.filter(s=>s.name).length">
                                        <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2.5">
                                            {{ __('cv_builder.skills') }}</h2>
                                        <div class="space-y-1.5"><template x-for="s in cv.skills.filter(s=>s.name)"
                                                :key="s.id">
                                                <div class="flex items-center gap-3"><span
                                                        class="text-xs text-gray-700 w-24 flex-shrink-0"
                                                        x-text="s.name"></span>
                                                    <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                                        <div class="h-full rounded-full"
                                                            :style="'width:'+s.level+'%;background:'+accentColor"></div>
                                                    </div>
                                                </div>
                                            </template></div>
                                    </div>
                                    <div x-show="sectionVisibility.education && cv.education.length">
                                        <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2.5">
                                            {{ __('cv_builder.education') }}</h2>
                                        <div class="space-y-2"><template x-for="edu in cv.education" :key="edu.id">
                                                <div class="flex justify-between gap-4">
                                                    <div>
                                                        <p class="text-xs font-semibold text-gray-900"
                                                            x-text="edu.degree"></p>
                                                        <p class="text-xs text-gray-500" x-text="edu.school"></p>
                                                    </div>
                                                    <p class="text-xs text-gray-400"
                                                        x-text="(edu.startYear||'')+(edu.endYear?' – '+edu.endYear:'')">
                                                    </p>
                                                </div>
                                            </template></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- ── AI panel ───────────────────────────────────────────── -->
            <div class="flex-shrink-0 h-full overflow-y-auto transition-all duration-200 border-l border-z-200 dark:border-z-900"
                :class="aiPanelOpen?'w-64':'w-0 overflow-hidden border-l-0'">
                <div class="w-64 h-full surface-sidebar flex flex-col">
                    <div class="px-4 py-3 border-b border-z-100 dark:border-z-900 flex items-center justify-between">
                        <span class="text-sm font-semibold">Resume analysis</span>
                        <button @click="aiPanelOpen=false" class="btn-icon w-6 h-6"><i
                                class="ph ph-x text-xs"></i></button>
                    </div>
                    <div class="flex-1 overflow-y-auto px-4 py-4 space-y-4">

                        <!-- ATS gauge -->
                        <div class="surface-card rounded-lg p-4 text-center">
                            <p class="t-label mb-3">ATS Score</p>
                            <div class="relative inline-flex items-center justify-center">
                                <svg class="w-20 h-20 -rotate-90" viewBox="0 0 80 80">
                                    <circle cx="40" cy="40" r="30" fill="none" stroke="#e4e4e7" stroke-width="6"
                                        class="dark:stroke-z-800" />
                                    <circle cx="40" cy="40" r="30" fill="none"
                                        :stroke="atsScore>=70?'#22c55e':atsScore>=40?'#f59e0b':'#ef4444'"
                                        stroke-width="6" :stroke-dasharray="188.5"
                                        :stroke-dashoffset="188.5-(188.5*atsScore/100)" class="ats-progress" />
                                </svg>
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span class="text-xl font-bold"
                                        :class="atsScore>=70?'text-emerald-600':atsScore>=40?'text-amber-600':'text-red-600'"
                                        x-text="atsScore"></span>
                                    <span class="text-2xs text-z-400">/100</span>
                                </div>
                            </div>
                            <p class="text-xs font-medium mt-2"
                                :class="atsScore>=70?'text-emerald-600':atsScore>=40?'text-amber-600':'text-red-600'"
                                x-text="atsScore>=70?'Well optimized':atsScore>=40?'Needs improvement':'Low ATS score'">
                            </p>
                        </div>

                        <!-- Strength -->
                        <div class="surface-card rounded-lg p-4">
                            <p class="t-label mb-3">Profile completeness</p>
                            <div class="h-1.5 bg-z-200 dark:bg-z-800 rounded-full overflow-hidden mb-2">
                                <div class="strength-bar-fill" :style="'width:'+completeness+'%'"></div>
                            </div>
                            <div class="space-y-1.5 mt-3">
                                <template x-for="item in strengthBreakdown" :key="item.label">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-z-500 dark:text-z-400" x-text="item.label"></span>
                                        <i class="ph text-xs"
                                            :class="item.done?'ph-check-circle text-emerald-500':'ph-circle text-z-300 dark:text-z-700'"></i>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Missing -->
                        <div class="surface-card rounded-lg p-4" x-show="missingSections.length>0">
                            <p class="t-label text-amber-600 dark:text-amber-500 mb-2">Missing sections</p>
                            <div class="space-y-1.5">
                                <template x-for="ms in missingSections" :key="ms">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-z-500 capitalize" x-text="ms"></span>
                                        <button @click="sectionVisibility[ms]=true;aiPanelOpen=false"
                                            class="text-xs text-accent hover:underline">Add</button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Keyword tips -->
                        <div class="surface-card rounded-lg p-4">
                            <p class="t-label mb-2">Keyword suggestions</p>
                            <div class="flex flex-wrap gap-1.5">
                                <template x-for="kw in keywordSuggestions" :key="kw">
                                    <button class="ai-chip"
                                        @click="notify('Add \''+kw+'\' to your summary or experience','info')"
                                        x-text="kw"></button>
                                </template>
                            </div>
                        </div>

                        <!-- Tips -->
                        <div class="surface-card rounded-lg p-4 space-y-3">
                            <p class="t-label">Writing tips</p>
                            <div class="flex items-start gap-2">
                                <i class="ph ph-arrow-right text-z-400 text-xs mt-0.5 flex-shrink-0"></i>
                                <p class="text-xs text-z-500 leading-relaxed">{{ __('cv_builder.start_date') }} with strong action verbs: <em
                                        class="text-z-700 dark:text-z-300">Led, Built, Improved, Reduced, Shipped</em>
                                </p>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="ph ph-arrow-right text-z-400 text-xs mt-0.5 flex-shrink-0"></i>
                                <p class="text-xs text-z-500 leading-relaxed">Quantify every achievement with numbers
                                    and percentages.</p>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="ph ph-arrow-right text-z-400 text-xs mt-0.5 flex-shrink-0"></i>
                                <p class="text-xs text-z-500 leading-relaxed">Mirror keywords from the job description
                                    in your summary.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- ── Mobile bottom nav ──────────────────────────────────────── -->
        <div class="md:hidden flex-shrink-0 surface-topbar px-1 py-1.5 border-t border-z-200 dark:border-z-900">
            <div class="flex items-center justify-around">
                <template
                    x-for="m in [{id:'edit',icon:'ph-pencil-simple',label:'Edit'},{id:'preview',icon:'ph-eye',label:'Preview'}]"
                    :key="m.id">
                    <button @click="viewMode=m.id;sidebarOpen=false"
                        class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-lg transition-colors"
                        :class="viewMode===m.id?'text-accent dark:text-blue-400':'text-z-400'">
                        <i class="ph text-lg" :class="m.icon"></i>
                        <span class="text-xs font-medium" x-text="m.label"></span>
                    </button>
                </template>
                <button @click="showExport=true"
                    class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-lg text-z-400 transition-colors hover:text-z-700">
                    <i class="ph ph-export text-lg"></i>
                    <span class="text-xs font-medium">{{ __('cv_builder.export_label') }}</span>
                </button>
                <button @click="sidebarOpen=!sidebarOpen;viewMode='edit'"
                    class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-lg transition-colors"
                    :class="sidebarOpen?'text-accent dark:text-blue-400':'text-z-400'">
                    <i class="ph ph-sliders-horizontal text-lg"></i>
                    <span class="text-xs font-medium">Settings</span>
                </button>
                <button @click="aiPanelOpen=!aiPanelOpen"
                    class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-lg transition-colors"
                    :class="aiPanelOpen?'text-accent dark:text-blue-400':'text-z-400'">
                    <i class="ph ph-target text-lg"></i>
                    <span class="text-xs font-medium">ATS</span>
                </button>
            </div>
        </div>

    </div>

    <!-- ── Floating toolbar (desktop) ─────────────────────────────── -->
    <div class="hidden md:flex fixed bottom-5 left-1/2 -translate-x-1/2 z-40 items-center gap-1 px-2 py-1.5 rounded-xl surface-base shadow-card-md"
        x-show="!showOnboarding && !showCmd" x-cloak>
        <button @click="undo()" :disabled="histIdx<=0" class="btn-icon w-7 h-7 disabled:opacity-30" title="Undo (⌘Z)"><i
                class="ph ph-arrow-counter-clockwise text-sm"></i></button>
        <button @click="redo()" :disabled="histIdx>=history.length-1" class="btn-icon w-7 h-7 disabled:opacity-30"
            title="Redo (⌘⇧Z)"><i class="ph ph-arrow-clockwise text-sm"></i></button>
        <div class="w-px h-4 bg-z-200 dark:bg-z-800 mx-0.5"></div>
        <button @click="sidebarOpen=!sidebarOpen" class="btn-icon w-7 h-7" title="Sidebar (⌘\)"><i
                class="ph ph-sidebar-simple text-sm"></i></button>
        <button @click="aiPanelOpen=!aiPanelOpen" class="btn-icon w-7 h-7" title="Analysis panel"><i
                class="ph ph-target text-sm"></i></button>
        <div class="w-px h-4 bg-z-200 dark:bg-z-800 mx-0.5"></div>
        <button @click="showCmd=true;cmdQuery='';$nextTick(()=>$refs.cmdInput?.focus())"
            class="btn-icon h-7 px-2.5 flex items-center gap-1.5 text-xs" title="Command palette (⌘K)">
            <i class="ph ph-command text-sm"></i>
            <span class="text-z-400">K</span>
        </button>
    </div>

    <!-- ============================================================ -->
    <!-- ALPINE.JS -->
    <!-- ============================================================ -->
    <script>
        function cvBuilder() {
            return {
                darkMode: false, sidebarOpen: true, aiPanelOpen: false,
                viewMode: 'split', showOnboarding: false, showCmd: false,
                showExport: false, showImport: false, showShortcuts: false,
                onboardStep: 1, previewZoom: 75,
                toasts: [], importJSON: '',
                confirmDialog: { show: false, title: '', message: '', confirmText: '', onConfirm: () => { } },
                activeTemplate: 'classic', accentColor: '#2563eb', activeFont: 'inter',
                cmdQuery: '', cmdIdx: 0,

                commands: [
                    { id: 'edit', group: 'View', label: 'Edit mode', icon: 'ph-pencil-simple', shortcut: '⌘1', action: s => { s.viewMode = 'edit' } },
                    { id: 'split', group: 'View', label: 'Split view', icon: 'ph-columns', shortcut: '⌘2', action: s => { s.viewMode = 'split' } },
                    { id: 'preview', group: 'View', label: 'Preview mode', icon: 'ph-eye', shortcut: '⌘3', action: s => { s.viewMode = 'preview' } },
                    { id: 'sidebar', group: 'View', label: 'Toggle sidebar', icon: 'ph-sidebar-simple', shortcut: '⌘\\', action: s => { s.sidebarOpen = !s.sidebarOpen } },
                    { id: 'ai', group: 'View', label: 'Toggle analysis', icon: 'ph-target', action: s => { s.aiPanelOpen = !s.aiPanelOpen } },
                    { id: 'dark', group: 'View', label: 'Toggle dark mode', icon: 'ph-moon', shortcut: '⌘⇧D', action: s => { s.toggleDark() } },
                    { id: 'tpl-1', group: 'Templates', label: 'Template: Classic', icon: 'ph-file-text', action: s => { s.activeTemplate = 'classic' } },
                    { id: 'tpl-2', group: 'Templates', label: 'Template: Modern', icon: 'ph-columns', action: s => { s.activeTemplate = 'modern' } },
                    { id: 'tpl-3', group: 'Templates', label: 'Template: Minimal', icon: 'ph-minus-circle', action: s => { s.activeTemplate = 'minimal' } },
                    { id: 'tpl-4', group: 'Templates', label: 'Template: Executive', icon: 'ph-crown-simple', action: s => { s.activeTemplate = 'executive' } },
                    { id: 'tpl-5', group: 'Templates', label: 'Template: Developer', icon: 'ph-code', action: s => { s.activeTemplate = 'developer' } },
                    { id: 'tpl-6', group: 'Templates', label: 'Template: Creative', icon: 'ph-paint-brush', action: s => { s.activeTemplate = 'creative' } },
                    { id: 'export', group: 'Actions', label: 'Export resume', icon: 'ph-export', shortcut: '⌘E', action: s => { s.showExport = true } },
                    { id: 'print', group: 'Actions', label: 'Print / PDF', icon: 'ph-printer', shortcut: '⌘P', action: s => { s.printResume() } },
                    { id: 'import', group: 'Actions', label: 'Import JSON', icon: 'ph-upload-simple', shortcut: '⌘I', action: s => { s.showImport = true } },
                    { id: 'json', group: 'Actions', label: 'Export as JSON', icon: 'ph-brackets-curly', action: s => { s.exportJSON() } },
                    { id: 'share', group: 'Actions', label: 'Share link', icon: 'ph-link', action: s => { s.shareResume() } },
                    { id: 'undo', group: 'Actions', label: 'Undo', icon: 'ph-arrow-counter-clockwise', shortcut: '⌘Z', action: s => { s.undo() } },
                    { id: 'redo', group: 'Actions', label: 'Redo', icon: 'ph-arrow-clockwise', shortcut: '⌘⇧Z', action: s => { s.redo() } },
                    { id: 'clear', group: 'Actions', label: 'Clear all data', icon: 'ph-trash', action: s => { s.clearAll() } },
                    { id: 'keys', group: 'Actions', label: 'Keyboard shortcuts', icon: 'ph-keyboard', shortcut: '?', action: s => { s.showShortcuts = true } },
                ],

                get filteredCmds() {
                    if (!this.cmdQuery) return this.commands;
                    const q = this.cmdQuery.toLowerCase();
                    return this.commands.filter(c => c.label.toLowerCase().includes(q));
                },
                runCmd(cmd) { if (!cmd) return; cmd.action(this); this.showCmd = false; this.cmdQuery = ''; this.cmdIdx = 0; },

                templates: [
                    { id: 'classic', name: 'Classic', preview: 'linear-gradient(135deg,#334155,#475569)' },
                    { id: 'modern', name: 'Modern', preview: 'linear-gradient(135deg,#1e3a5f,#2563eb)' },
                    { id: 'minimal', name: 'Minimal', preview: 'linear-gradient(135deg,#d4d4d8,#e4e4e7)' },
                    { id: 'executive', name: 'Executive', preview: 'linear-gradient(135deg,#18181b,#3f3f46)' },
                    { id: 'developer', name: 'Dev', preview: 'linear-gradient(135deg,#020617,#0f172a)' },
                    { id: 'creative', name: 'Creative', preview: 'linear-gradient(135deg,#7c3aed,#2563eb)' },
                ],

                colorPalette: ['#2563eb', '#7c3aed', '#db2777', '#dc2626', '#ea580c', '#d97706', '#16a34a', '#0891b2', '#0f172a', '#374151', '#6b7280', '#57534e'],

                fonts: [
                    { id: 'inter', name: 'Inter', family: 'Inter, system-ui, sans-serif' },
                    { id: 'dm', name: 'DM Sans', family: 'DM Sans, sans-serif' },
                    { id: 'playfair', name: 'Playfair Display', family: 'Playfair Display, Georgia, serif' },
                    { id: 'grotesk', name: 'Space Grotesk', family: 'Space Grotesk, sans-serif' },
                    { id: 'mono', name: 'JetBrains Mono', family: 'JetBrains Mono, Menlo, monospace' },
                ],

                sectionVisibility: { summary: true, experience: true, education: true, skills: true, projects: true, certifications: true, languages: true },

                suggestedSkills: ['TypeScript', 'React', 'Next.js', 'Node.js', 'Python', 'AWS', 'Docker', 'PostgreSQL', 'GraphQL', 'Kubernetes', 'Figma', 'TailwindCSS'],
                keywordSuggestions: ['scalable', 'agile', 'cross-functional', 'performance', 'CI/CD', 'microservices', 'end-to-end', 'stakeholder'],

                cv: {
                    name: 'Alexandra Chen', title: 'Senior Full-Stack Engineer',
                    email: 'alex.chen@email.com', phone: '+1 (555) 234-5678',
                    location: 'San Francisco, CA', website: 'https://alexchen.dev',
                    photo: '', summary: 'Full-stack engineer with 6+ years building scalable web applications for startups and Fortune 500 companies. Expertise in React, Node.js, and cloud infrastructure. Led teams of up to 8 engineers, shipping products used by millions.',
                    socials: [{ platform: 'linkedin', url: 'https://linkedin.com/in/alexchen' }, { platform: 'github', url: 'https://github.com/alexchen' }],
                    experiences: [
                        { id: 1, title: 'Senior Software Engineer', company: 'Stripe', location: 'San Francisco, CA', startDate: '2022-03', endDate: '', current: true, description: '• Led migration from monolith to microservices, improving API response time by 65%\n• Built real-time payment dashboard serving 2M+ merchants globally\n• Mentored 4 engineers, driving 30% improvement in team velocity\n• Maintained 99.99% uptime for infrastructure processing $50B+ annually' },
                        { id: 2, title: 'Full-Stack Developer', company: 'Vercel', location: 'Remote', startDate: '2020-06', endDate: '2022-02', current: false, description: '• Shipped Next.js deployment features used by 500K+ developers\n• Reduced build times by 40% through intelligent caching\n• Contributed to open-source repositories with 10K+ GitHub stars' },
                        { id: 3, title: 'Frontend Engineer', company: 'Linear', location: 'San Francisco, CA', startDate: '2018-09', endDate: '2020-05', current: false, description: '• Architected design system adopted across 12 product teams\n• Improved Lighthouse score from 62 to 97\n• Redesigned mobile experience, increasing mobile DAU by 45%' },
                    ],
                    education: [{ id: 1, degree: 'B.Sc. Computer Science', school: 'UC Berkeley', field: 'Computer Science', startYear: '2014', endYear: '2018', gpa: '3.9 / 4.0', notes: "Dean's List, 6 semesters" }],
                    skills: [
                        { id: 1, name: 'TypeScript / JavaScript', level: 95 }, { id: 2, name: 'React / Next.js', level: 92 },
                        { id: 3, name: 'Node.js / Express', level: 88 }, { id: 4, name: 'PostgreSQL / Redis', level: 80 },
                        { id: 5, name: 'AWS / GCP / Docker', level: 78 }, { id: 6, name: 'System Design', level: 85 },
                    ],
                    projects: [
                        { id: 1, name: 'OpenStream', tech: 'Next.js, WebRTC, Redis, Go', url: 'https://openstream.dev', github: 'https://github.com/alexchen/openstream', description: 'Open-source live streaming platform handling 10K concurrent viewers with sub-100ms latency. 4.2K GitHub stars.' },
                        { id: 2, name: 'QueryKit', tech: 'TypeScript, PostgreSQL, Prisma', url: 'https://querykit.io', github: 'https://github.com/alexchen/querykit', description: 'Type-safe SQL query builder with automatic schema inference. 800+ weekly npm downloads.' },
                    ],
                    certifications: [
                        { id: 1, name: 'AWS Solutions Architect – Professional', issuer: 'Amazon Web Services', date: '2023-08' },
                        { id: 2, name: 'Google Cloud Professional Developer', issuer: 'Google', date: '2022-11' },
                    ],
                    languages: [{ id: 1, name: 'English', level: 'native' }, { id: 2, name: 'Mandarin', level: 'fluent' }, { id: 3, name: 'French', level: 'intermediate' }],
                    customSections: [],
                },

                history: [], histIdx: -1, autoSaved: true, lastSaved: '', _st: null, _ht: null,

                shortcuts: [
                    { label: 'Command palette', keys: ['⌘', 'K'] },
                    { label: 'Toggle dark mode', keys: ['⌘', '⇧', 'D'] },
                    { label: 'Toggle sidebar', keys: ['⌘', '\\'] },
                    { label: 'Edit mode', keys: ['⌘', '1'] },
                    { label: 'Split view', keys: ['⌘', '2'] },
                    { label: 'Preview mode', keys: ['⌘', '3'] },
                    { label: 'Undo', keys: ['⌘', 'Z'] },
                    { label: 'Redo', keys: ['⌘', '⇧', 'Z'] },
                    { label: 'Export', keys: ['⌘', 'E'] },
                    { label: 'Print / PDF', keys: ['⌘', 'P'] },
                    { label: 'Import', keys: ['⌘', 'I'] },
                    { label: 'Shortcuts', keys: ['?'] },
                ],

                get completeness() {
                    let s = 0;
                    if (this.cv.name) s += 15; if (this.cv.title) s += 8;
                    if (this.cv.email) s += 8; if (this.cv.phone) s += 5;
                    if (this.cv.location) s += 5; if (this.cv.website) s += 4;
                    if (this.cv.summary && this.cv.summary.length > 50) s += 15;
                    if (this.cv.experiences.length >= 1) s += 15;
                    if (this.cv.education.length >= 1) s += 10;
                    if (this.cv.skills.filter(sk => sk.name).length >= 3) s += 10;
                    if (this.cv.photo) s += 5;
                    return Math.min(s, 100);
                },

                get atsScore() {
                    let s = 0;
                    if (this.cv.name) s += 8; if (this.cv.title) s += 8; if (this.cv.email) s += 6;
                    if (this.cv.summary && this.cv.summary.length > 80) s += 15;
                    if (this.cv.experiences.length >= 1) s += 20; if (this.cv.education.length >= 1) s += 12;
                    if (this.cv.skills.filter(sk => sk.name).length >= 3) s += 16;
                    if (this.cv.certifications.filter(c => c.name).length) s += 8;
                    if (this.cv.phone && this.cv.location) s += 7;
                    return Math.min(Math.round(s), 100);
                },

                get strengthBreakdown() {
                    return [
                        { label: 'Name & title', done: !!(this.cv.name && this.cv.title) },
                        { label: 'Contact info', done: !!(this.cv.email && this.cv.phone) },
                        { label: 'Summary', done: !!(this.cv.summary && this.cv.summary.length > 50) },
                        { label: 'Work experience', done: this.cv.experiences.length >= 1 },
                        { label: 'Education', done: this.cv.education.length >= 1 },
                        { label: 'Skills (3+)', done: this.cv.skills.filter(s => s.name).length >= 3 },
                        { label: 'Profile photo', done: !!this.cv.photo },
                    ];
                },

                get missingSections() {
                    const m = [];
                    if (!this.sectionVisibility.summary) m.push('summary');
                    if (!this.sectionVisibility.skills) m.push('skills');
                    if (!this.sectionVisibility.certifications) m.push('certifications');
                    return m;
                },

                init() {
                    this.loadStorage(); this.pushHistory(); this.registerKeyboard();
                    if (window.innerWidth < 768) { this.sidebarOpen = false; this.viewMode = 'edit'; this.previewZoom = 100; }
                    else if (window.innerWidth < 1280) { this.previewZoom = 65; }
                    if (!localStorage.getItem('interlinkcv_visited')) { this.showOnboarding = true; localStorage.setItem('interlinkcv_visited', '1'); }
                    this.$watch('cv', () => { this.autoSaved = false; this.debouncedSave(); this.debouncedHistory(); }, { deep: true });
                },

                loadStorage() {
                    try {
                        const d = localStorage.getItem('interlinkcv_v3'); if (!d) return;
                        const p = JSON.parse(d);
                        if (p.cv) this.cv = { ...this.cv, ...p.cv };
                        if (p.accentColor) this.accentColor = p.accentColor;
                        if (p.activeFont) this.activeFont = p.activeFont;
                        if (p.activeTemplate) this.activeTemplate = p.activeTemplate;
                        if (p.darkMode !== undefined) this.darkMode = p.darkMode;
                        if (p.sectionVisibility) this.sectionVisibility = { ...this.sectionVisibility, ...p.sectionVisibility };
                        this.notify('Restored from last session', 'info');
                    } catch (e) { console.warn(e); }
                },

                saveStorage() {
                    try {
                        localStorage.setItem('interlinkcv_v3', JSON.stringify({ cv: this.cv, accentColor: this.accentColor, activeFont: this.activeFont, activeTemplate: this.activeTemplate, darkMode: this.darkMode, sectionVisibility: this.sectionVisibility, savedAt: new Date().toISOString() }));
                        this.autoSaved = true;
                        this.lastSaved = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    } catch (e) { this.notify('Auto-save failed', 'error'); }
                },

                debouncedSave() { clearTimeout(this._st); this._st = setTimeout(() => this.saveStorage(), 900); },
                debouncedHistory() { clearTimeout(this._ht); this._ht = setTimeout(() => this.pushHistory(), 1200); },

                pushHistory() {
                    const snap = JSON.stringify(this.cv);
                    if (this.history[this.histIdx] === snap) return;
                    this.history = this.history.slice(0, this.histIdx + 1);
                    this.history.push(snap);
                    if (this.history.length > 50) this.history.shift();
                    this.histIdx = this.history.length - 1;
                },
                undo() { if (this.histIdx > 0) { this.histIdx--; this.cv = JSON.parse(this.history[this.histIdx]); this.notify('Undone', 'info'); } },
                redo() { if (this.histIdx < this.history.length - 1) { this.histIdx++; this.cv = JSON.parse(this.history[this.histIdx]); this.notify('Redone', 'info'); } },

                toggleDark() { this.darkMode = !this.darkMode; this.debouncedSave(); },

                setAccent(c) {
                    this.accentColor = c;
                    document.documentElement.style.setProperty('--accent', c);
                    this.debouncedSave();
                },

                getCurrentFont() { return (this.fonts.find(f => f.id === this.activeFont) || this.fonts[0]).family; },

                uid() { return Date.now() + Math.random().toString(36).slice(2); },

                addEntry(section, obj) { this.cv[section].push(obj); this.debouncedSave(); },
                deleteEntry(section, idx) { this.cv[section].splice(idx, 1); this.debouncedSave(); this.notify('Entry removed', 'warning'); },
                duplicateEntry(section, idx) { const copy = { ...this.cv[section][idx], id: this.uid() }; this.cv[section].splice(idx + 1, 0, copy); this.debouncedSave(); this.notify('Duplicated', 'success'); },

                addSkillFromSuggestion(name) {
                    if (this.cv.skills.some(s => s.name.toLowerCase() === name.toLowerCase())) { this.notify(name + ' already added', 'warning'); return; }
                    this.cv.skills.push({ id: this.uid(), name, level: 80 }); this.debouncedSave(); this.notify(name + ' added', 'success');
                },

                getAvatarUrl() { const n = encodeURIComponent(this.cv.name || 'Y'); const c = this.accentColor.replace('#', ''); return `https://ui-avatars.com/api/?name=${n}&background=${c}&color=fff&size=128`; },

                fmtDateRange(start, end, current) {
                    const fmt = d => { if (!d) return ''; const [y, m] = d.split('-'); return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][+m - 1] + ' ' + y; };
                    const s = fmt(start), e = current ? 'Present' : fmt(end);
                    if (!s && !e) return ''; return s && e ? s + ' – ' + e : s || e;
                },

                autoResize(e) { const el = e.target; el.style.height = 'auto'; el.style.height = Math.max(56, el.scrollHeight) + 'px'; },

                skipOnboarding() { this.showOnboarding = false; },
                finishOnboarding() { this.showOnboarding = false; this.debouncedSave(); this.notify('Welcome to InterLinkCv', 'success'); },

                handlePhotoUpload(e) {
                    const f = e.target.files[0]; if (!f) return;
                    if (f.size > 3 * 1024 * 1024) { this.notify('Image must be < 3MB', 'error'); return; }
                    const r = new FileReader(); r.onload = ev => { this.cv.photo = ev.target.result; this.debouncedSave(); this.notify('Photo updated', 'success'); }; r.readAsDataURL(f);
                },

                handlePhotoDrop(e) {
                    const f = e.dataTransfer.files[0]; if (!f) return;
                    if (!f.type.startsWith('image/')) { this.notify('File must be an image', 'error'); return; }
                    if (f.size > 3 * 1024 * 1024) { this.notify('Image must be < 3MB', 'error'); return; }
                    const r = new FileReader(); r.onload = ev => { this.cv.photo = ev.target.result; this.debouncedSave(); this.notify('Photo updated', 'success'); }; r.readAsDataURL(f);
                },

                exportJSON() {
                    const a = Object.assign(document.createElement('a'), { href: URL.createObjectURL(new Blob([JSON.stringify({ version: '3.0', exportedAt: new Date().toISOString(), cv: this.cv }, null, 2)], { type: 'application/json' })), download: (this.cv.name || 'resume').replace(/\s+/g, '_').toLowerCase() + '_interlinkcv.json' });
                    a.click(); URL.revokeObjectURL(a.href); this.notify('Exported as JSON', 'success');
                },

                importData() {
                    try { const p = JSON.parse(this.importJSON); this.cv = { ...this.cv, ...(p.cv || p) }; this.showImport = false; this.importJSON = ''; this.pushHistory(); this.debouncedSave(); this.notify('Imported successfully', 'success'); }
                    catch { this.notify('Invalid JSON', 'error'); }
                },

                handleFileImport(e) { const f = e.target.files[0]; if (!f) return; const r = new FileReader(); r.onload = ev => { this.importJSON = ev.target.result; this.importData(); }; r.readAsText(f); },

                printResume() {
                    const printRoot = document.getElementById('print-root');
                    const paper = document.querySelector('.a4-paper');
                    if (paper && printRoot) {
                        printRoot.innerHTML = '';
                        printRoot.appendChild(paper.cloneNode(true));
                    }
                    window.print();
                    this.showExport = false;
                },

                shareResume() {
                    navigator.clipboard.writeText(window.location.href.split('?')[0] + '?share=1')
                        .then(() => this.notify('Link copied to clipboard', 'success'))
                        .catch(() => this.notify('Could not copy link', 'error'));
                },

                clearAll() {
                    this.confirmDialog = {
                        show: true, title: 'Clear all data?', message: 'This will permanently delete your resume and cannot be undone.', confirmText: 'Clear',
                        onConfirm: () => { localStorage.removeItem('interlinkcv_v3'); this.cv = { name: '', title: '', email: '', phone: '', location: '', website: '', photo: '', summary: '', socials: [], experiences: [], education: [], skills: [], projects: [], certifications: [], languages: [], customSections: [] }; this.pushHistory(); this.notify('Data cleared', 'warning'); }
                    };
                },

                notify(msg, type = 'info') {
                    const id = Date.now() + Math.random();
                    this.toasts.push({ id, msg, type });
                    setTimeout(() => { this.toasts = this.toasts.filter(t => t.id !== id); }, 3500);
                },

                registerKeyboard() {
                    document.addEventListener('keydown', e => {
                        const meta = e.metaKey || e.ctrlKey;
                        const typing = ['input', 'textarea', 'select'].includes(e.target.tagName?.toLowerCase());
                        if (e.key === '?' && !typing) { e.preventDefault(); this.showShortcuts = !this.showShortcuts; }
                        if (meta && e.key === 'k') { e.preventDefault(); this.showCmd = !this.showCmd; if (this.showCmd) this.$nextTick(() => this.$refs.cmdInput?.focus()); }
                        if (meta && e.shiftKey && e.key.toLowerCase() === 'd') { e.preventDefault(); this.toggleDark(); }
                        if (meta && e.key === '\\') { e.preventDefault(); this.sidebarOpen = !this.sidebarOpen; }
                        if (meta && e.key === '1') { e.preventDefault(); this.viewMode = 'edit'; }
                        if (meta && e.key === '2') { e.preventDefault(); this.viewMode = 'split'; }
                        if (meta && e.key === '3') { e.preventDefault(); this.viewMode = 'preview'; }
                        if (meta && !e.shiftKey && e.key === 'z') { e.preventDefault(); this.undo(); }
                        if (meta && e.shiftKey && e.key === 'z') { e.preventDefault(); this.redo(); }
                        if (meta && e.key === 'p') { e.preventDefault(); this.printResume(); }
                        if (meta && e.key === 'e') { e.preventDefault(); this.showExport = true; }
                        if (meta && e.key === 'i') { e.preventDefault(); this.showImport = true; }
                    });
                },
            };
        }
    </script>
</body>

</html>