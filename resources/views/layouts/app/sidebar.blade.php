<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <style>
        .sidebar-label {
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 500;
            white-space: nowrap;
            opacity: 1;
            transition: opacity 150ms ease 75ms;
        }

        @media (min-width: 1024px) {
            .sidebar-label {
                opacity: 0;
            }

            .sb-wide .sidebar-label {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-zinc-50 dark:bg-zinc-950">
    <div id="mobile-overlay" onclick="closeMobileSidebar()" class="fixed inset-0 z-40 bg-black/40 hidden lg:hidden">
    </div>

    <div
        class="mobile-header lg:hidden fixed top-0 inset-x-0 h-12 bg-black flex items-center px-4 z-40 gap-3 border-b border-zinc-800">
        <button onclick="openMobileSidebar()"
            class="p-1.5 rounded-lg bg-transparent border-none text-zinc-400 hover:bg-zinc-900 hover:text-zinc-100 transition-colors cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" viewBox="0 0 24 24">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </button>
        <a href="{{ route('app.home') }}" wire:navigate
            class="flex items-center gap-2 no-underline text-zinc-300 text-lg font-bold transition-colors hover:text-white">
            <img src="{{ asset('images/Logos/LWDM.png') }}" alt="InterLink" class="w-6 h-6">
            InterLink
        </a>
        <div class="flex-1"></div>
        <flux:dropdown position="top" align="end">
            <flux:button variant="ghost" icon-trailing="chevron-down" class="gap-2">
                @if (auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}"
                        class="h-7 w-7 rounded-full object-cover border border-zinc-700">
                @else
                    <flux:avatar :initials="auth()->user()->initials()" class="size-7" />
                @endif
                <span class="truncate max-w-28">{{ auth()->user()->name }}</span>
            </flux:button>
            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            @if (auth()->user()->avatar)
                                <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}"
                                    class="h-8 w-8 rounded-full object-cover border border-zinc-700">
                            @else
                                <flux:avatar :name="auth()->user()->name" :initials="auth()->user()->initials()" />
                            @endif
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                        class="w-full cursor-pointer">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </div>

    <div id="app-sidebar" x-data="{
        wide: false,
        init() {
            this.wide = window.__sidebarHovered === true;
        },
        enter() {
            this.wide = true;
            window.__sidebarHovered = true;
        },
        leave() {
            this.wide = false;
            window.__sidebarHovered = false;
        }
    }" @mouseenter="enter()" @mouseleave="leave()" :class="wide ? 'lg:w-56 lg:shadow-xl sb-wide' : 'lg:w-16'"
        class="fixed inset-y-0 left-0 z-50 flex flex-col w-56 bg-black border-r border-zinc-900 dark:border-r-2 dark:border-dashed dark:border-zinc-700 -translate-x-full lg:translate-x-0 transition-all duration-300 ease-in-out overflow-hidden">
        <div class="h-16 flex items-center shrink-0 px-3">
            <div class="w-10 flex items-center justify-center shrink-0">
                <img src="{{ asset('images/Logos/LWDM.png') }}" alt="InterLink" class="w-7 h-7">
            </div>
            <span
                class="sidebar-label ml-0.5 text-white font-bold !text-lg transition-colors hover:text-white">InterLink</span>
        </div>

        <nav class="flex-1 flex flex-col gap-1 py-3 overflow-y-auto overflow-x-hidden">
            @if (Auth::user()->isAdmin())
                <div class="px-3 pt-2 pb-1 text-xs font-semibold uppercase tracking-[0.2em] text-zinc-600 sidebar-label">
                    Admin</div>

                <a href="{{ route('app.home') }}" wire:navigate
                    class="mx-3 h-10 flex items-center rounded-lg transition-all duration-200 hover:translate-x-1 no-underline {{ request()->routeIs('app.home', 'dashboard', 'admin.dashboard', 'agent.dashboard') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}">
                    <div class="w-10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <rect x="14" y="14" width="7" height="7" rx="1" />
                        </svg>
                    </div>
                    <span class="sidebar-label">Dashboard</span>
                </a>

                <a href="{{ route('app.home') }}#companies" wire:navigate
                    class="mx-3 h-10 flex items-center rounded-lg transition-all duration-200 hover:translate-x-1 no-underline text-zinc-400 hover:bg-zinc-900 hover:text-white">
                    <div class="w-10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 7h18" />
                            <path d="M6 7v14" />
                            <path d="M18 7v14" />
                            <path d="M3 21h18" />
                        </svg>
                    </div>
                    <span class="sidebar-label">Companies</span>
                </a>

                <a href="{{ route('app.home') }}#interns" wire:navigate
                    class="mx-3 h-10 flex items-center rounded-lg transition-all duration-200 hover:translate-x-1 no-underline text-zinc-400 hover:bg-zinc-900 hover:text-white">
                    <div class="w-10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M20 8v6" />
                            <path d="M23 11h-6" />
                        </svg>
                    </div>
                    <span class="sidebar-label">Interns</span>
                </a>
            @else
                <div class="px-3 pt-2 pb-1 text-xs font-semibold uppercase tracking-[0.2em] text-zinc-600 sidebar-label">
                    Workspace</div>

                <a href="{{ route('app.home') }}" wire:navigate
                    class="mx-3 h-10 flex items-center rounded-lg transition-all duration-200 hover:translate-x-1 no-underline {{ request()->routeIs('app.home', 'dashboard', 'admin.dashboard', 'agent.dashboard') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}">
                    <div class="w-10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <rect x="14" y="14" width="7" height="7" rx="1" />
                        </svg>
                    </div>
                    <span class="sidebar-label">Dashboard</span>
                </a>
            @endif

            <div class="mt-auto px-3 pb-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="mx-3 h-10 w-[calc(100%-1.5rem)] flex items-center rounded-lg transition-all duration-200 hover:translate-x-1 no-underline text-zinc-400 hover:bg-zinc-900 hover:text-white cursor-pointer">
                        <div class="w-10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M10 17l5-5-5-5" />
                                <path d="M15 12H3" />
                                <path d="M21 3v18" />
                            </svg>
                        </div>
                        <span class="sidebar-label">Log out</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <div id="main-content" class="lg:ml-16">
        {{ $slot }}
    </div>

    @fluxScripts

    <script>
        function openMobileSidebar() {
            document.getElementById('app-sidebar').classList.remove('-translate-x-full');
            document.getElementById('mobile-overlay').classList.remove('hidden');
        }

        function closeMobileSidebar() {
            document.getElementById('app-sidebar').classList.add('-translate-x-full');
            document.getElementById('mobile-overlay').classList.add('hidden');
        }
    </script>
</body>

</html>