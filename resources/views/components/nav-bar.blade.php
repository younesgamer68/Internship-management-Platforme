{{-- =====================================================================
Navbar — local state only; $store.ui.darkMode / lang / t() from $store.ui
===================================================================== --}}

{{-- Utility bar is always pinned to the very top --}}
<div class="relative z-50 w-full transition-colors duration-300" :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'">
    <div class="mx-auto flex h-7 max-w-7xl items-center justify-end gap-6 px-6">
        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="cursor-pointer rounded-lg text-xs font-medium transition-colors duration-200"
                    :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]'"
                    x-text="$store.ui.t('utilityLogout')"></button>
            </form>
        @else
            <a href="{{ route('choose_path') }}" class="text-xs font-medium transition-colors duration-200"
                :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]'"
                x-text="$store.ui.t('utilitySignIn')"></a>
        @endauth
        <a href="{{ route('help-center') }}" class="text-xs font-medium transition-colors duration-200"
            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]'"
            x-text="$store.ui.t('utilityHelpCenter')"></a>
        <a href="{{ route('about') }}" class="text-xs font-medium transition-colors duration-200"
            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]'">About
            us</a>
        <a href="{{ route('contact') }}" class="text-xs font-medium transition-colors duration-200"
            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]'"
            x-text="$store.ui.t('utilityContactUs')"></a>
    </div>
</div>

<div x-data="{
        langOpen: false,
        mobileOpen: false,
        activeDropdown: null,
        navHidden: false,
        isAtTop: true,
        hideThreshold: 4,
        showThreshold: 6,
        lastScrollY: 0,
        ticking: false,
        openDropdown(name) { this.activeDropdown = name },
        closeDropdown() { this.activeDropdown = null },
        handleScroll() {
            const currentScrollY = window.scrollY || 0;
            const scrollDelta = currentScrollY - this.lastScrollY;
            this.isAtTop = currentScrollY <= 28;

            if (currentScrollY <= 12) {
                this.navHidden = false;
            } else if (scrollDelta > this.hideThreshold) {
                this.navHidden = true;
            } else if (scrollDelta < -this.showThreshold) {
                this.navHidden = false;
            }

            this.lastScrollY = currentScrollY;
            this.ticking = false;
        },
        init() {
            this.lastScrollY = window.scrollY || 0;

            window.addEventListener('scroll', () => {
                if (this.ticking) {
                    return;
                }

                this.ticking = true;

                window.requestAnimationFrame(() => {
                    this.handleScroll();
                });
            }, { passive: true });

            this.$watch('mobileOpen', (isOpen) => {
                if (isOpen) {
                    this.navHidden = false;
                }
            });
        },
    }" class="fixed inset-x-0 z-40 transition-[top] duration-300 ease-out motion-reduce:transition-none"
    :class="navHidden ? '-top-16' : (isAtTop ? 'top-7' : 'top-0')">

    <nav class="w-full transition-colors duration-300" :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'">

        {{-- Main bar (h-[72px] taller) --}}
        <div class="mx-auto flex h-17 max-w-7xl items-center justify-between px-6">

            {{-- LEFT Logo --}}
            <x-logo variant="landing" size="lg" href="/" />

            {{-- CENTER Desktop nav links --}}
            <div class="hidden flex-1 items-center justify-center gap-1 md:flex">
                <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('internships')"
                    @mouseleave="closeDropdown()">
                    <button type="button" :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#17494D]'"
                        class="navlink-btn group relative flex items-center gap-1 rounded-lg px-4 py-2.5 text-[15px] font-medium transition-colors duration-200">
                        Internships
                        <svg class="h-3.5 w-3.5 transition-transform duration-200"
                            :class="activeDropdown === 'internships' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="2.5 4.5 6 8 9.5 4.5" />
                        </svg>
                        <span
                            class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                            :class="$store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]'"></span>
                    </button>
                </div>

                <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('companies')" @mouseleave="closeDropdown()">
                    <button type="button" :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#17494D]'"
                        class="navlink-btn group relative flex items-center gap-1 rounded-lg px-4 py-2.5 text-[15px] font-medium transition-colors duration-200">
                        Companies
                        <svg class="h-3.5 w-3.5 transition-transform duration-200"
                            :class="activeDropdown === 'companies' ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="2.5 4.5 6 8 9.5 4.5" />
                        </svg>
                        <span
                            class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                            :class="$store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]'"></span>
                    </button>
                </div>

                <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('students')" @mouseleave="closeDropdown()">
                    <button type="button" :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#17494D]'"
                        class="navlink-btn group relative flex items-center gap-1 rounded-lg px-4 py-2.5 text-[15px] font-medium transition-colors duration-200">
                        For Students
                        <svg class="h-3.5 w-3.5 transition-transform duration-200"
                            :class="activeDropdown === 'students' ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="2.5 4.5 6 8 9.5 4.5" />
                        </svg>
                        <span
                            class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                            :class="$store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]'"></span>
                    </button>
                </div>

                <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('employers')" @mouseleave="closeDropdown()">
                    <button type="button" :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#17494D]'"
                        class="navlink-btn group relative flex items-center gap-1 rounded-lg px-4 py-2.5 text-[15px] font-medium transition-colors duration-200">
                        For Companies
                        <svg class="h-3.5 w-3.5 transition-transform duration-200"
                            :class="activeDropdown === 'employers' ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="2.5 4.5 6 8 9.5 4.5" />
                        </svg>
                        <span
                            class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                            :class="$store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]'"></span>
                    </button>
                </div>

                <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('about')" @mouseleave="closeDropdown()">
                    <button type="button" :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#17494D]'"
                        class="navlink-btn group relative flex items-center gap-1 rounded-lg px-4 py-2.5 text-[15px] font-medium transition-colors duration-200">
                        About
                        <svg class="h-3.5 w-3.5 transition-transform duration-200"
                            :class="activeDropdown === 'about' ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="2.5 4.5 6 8 9.5 4.5" />
                        </svg>
                        <span
                            class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                            :class="$store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]'"></span>
                    </button>
                </div>
            </div>

            {{-- RIGHT Controls --}}
            <div class="flex items-center gap-4">
                {{-- Dark mode toggle — clean fade --}}
                <button type="button"
                    @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150)"
                    class="relative flex h-9 w-9 items-center justify-center rounded-full transition-colors duration-200"
                    :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-[#1F1F1F] hover:bg-gray-100'"
                    title="Toggle dark mode">
                    {{-- Moon icon (shown in light mode) --}}
                    <svg x-show="!$store.ui.darkMode" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path d="M15.5 11.5A7 7 0 016.5 2.5a7 7 0 109 9z" fill="none" stroke="currentColor"
                            stroke-width="1.4" stroke-linecap="round" />
                    </svg>
                    {{-- Sun icon (shown in dark mode) — outline only, no yellow --}}
                    <svg x-show="$store.ui.darkMode" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" style="display:none">
                        <circle cx="12" cy="12" r="4" />
                        <path
                            d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41m11.32-11.32l1.41-1.41" />
                    </svg>
                </button>

                {{-- Language dropdown — globe icon only, flags in menu --}}
                <div class="relative" @click.outside="langOpen = false">
                    <button type="button" @click="langOpen = !langOpen"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-[#1F1F1F] hover:bg-gray-100'"
                        class="flex h-9 w-9 items-center justify-center rounded-full transition-colors duration-200"
                        title="Language">
                        {{-- Globe icon --}}
                        <svg width="18" height="18" viewBox="0 0 16 16" fill="none">
                            <circle cx="8" cy="8" r="6.5" stroke="currentColor" stroke-width="1.3" />
                            <ellipse cx="8" cy="8" rx="2.8" ry="6.5" stroke="currentColor" stroke-width="1.3" />
                            <line x1="1.5" y1="6" x2="14.5" y2="6" stroke="currentColor" stroke-width="1.3" />
                            <line x1="1.5" y1="10" x2="14.5" y2="10" stroke="currentColor" stroke-width="1.3" />
                        </svg>
                    </button>

                    <div x-show="langOpen" x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        :class="$store.ui.darkMode ? 'bg-gray-900 border-gray-700' : 'bg-white border-gray-200'"
                        class="absolute right-0 z-50 mt-2 w-44 overflow-hidden rounded-xl border shadow-xl drop-shadow-lg"
                        style="display:none">
                        <button
                            @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.lang = 'English'; langOpen = false }, 150)"
                            :class="[
                            $store.ui.lang === 'English' ? 'font-bold' : 'font-normal',
                            $store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-700 hover:bg-gray-50'
                        ]"
                            class="flex w-full items-center gap-2.5 rounded-lg px-6 py-3 text-left text-sm transition-colors duration-150">
                            <span class="text-lg leading-none">&#127468;&#127463;</span>
                            English
                        </button>
                        <div :class="$store.ui.darkMode ? 'border-gray-700' : 'border-gray-200'" class="border-t"></div>
                        <button
                            @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.lang = 'French'; langOpen = false }, 150)"
                            :class="[
                            $store.ui.lang === 'French' ? 'font-bold' : 'font-normal',
                            $store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-700 hover:bg-gray-50'
                        ]"
                            class="flex w-full items-center gap-2.5 rounded-lg px-6 py-3 text-left text-sm transition-colors duration-150">
                            <span class="text-lg leading-none">&#127467;&#127479;</span>
                            Fran&ccedil;ais
                        </button>
                    </div>
                </div>

                {{-- CTA buttons (desktop) --}}
                <div class="hidden items-center gap-3 md:flex">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-[12px] bg-[#f79123] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
                                <span x-text="$store.ui.t('dashboard')"></span>
                            </a>
                        @else
                            <a href="{{ route('choose_path') }}"
                                :class="$store.ui.darkMode ? 'border-gray-500 text-gray-200 hover:bg-white/10 hover:border-gray-300' : 'border-[#1F1F1F] text-[#1F1F1F] hover:bg-gray-50'"
                                class="rounded-[12px] border px-6 py-2.5 text-sm font-semibold transition-all duration-200 hover:shadow-md">
                                <span x-text="$store.ui.t('viewDemo')"></span>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('choose_path') }}"
                                    class="rounded-[12px] bg-[#f79123] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
                                    <span x-text="$store.ui.t('tryFree')"></span>
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                {{-- Hamburger (mobile) --}}
                <button type="button" @click="mobileOpen = !mobileOpen"
                    :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                    class="flex h-10 w-10 items-center justify-center rounded-lg transition-colors duration-200 md:hidden">
                    <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                    </svg>
                    <svg x-show="mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" style="display:none">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Dropdown: Internships --}}
        <div x-show="activeDropdown === 'internships'" @mouseenter="openDropdown('internships')"
            @mouseleave="closeDropdown()" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute inset-x-0 top-full z-40 flex justify-center px-6" style="display:none">
            <div class="w-full max-w-4xl rounded-b-2xl border p-4 shadow-xl drop-shadow-lg"
                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <a href="#" class="block rounded-lg px-3 py-2.5 text-center">
                            <p class="text-xs font-semibold"
                                :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'">Browse all internships</p>
                            <p class="mt-0.5 text-xs" :class="$store.ui.darkMode ? 'text-gray-400' : 'text-[#6b7280]'">
                                Main listing page</p>
                        </a>
                        <div class="mt-2 space-y-1">
                            <a href="#" class="block px-3 py-1 text-xs text-center">All Internships</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">Remote Internships</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">On-site Internships</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">Paid Internships</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">Internship Categories</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">Saved Internships</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-3 text-xs font-semibold"
                            :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'">Popular categories</p>
                        <div class="space-y-1">
                            <a href="#" class="block px-3 py-1 text-xs text-center">Universities</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">Bootcamps</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">Governments</a>
                            <a href="#" class="block px-3 py-1 text-xs text-center">Affiliates</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dropdowns for Companies, Students, Employers, About --}}
        <div x-show="activeDropdown === 'companies'" @mouseenter="openDropdown('companies')"
            @mouseleave="closeDropdown()" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute inset-x-0 top-full z-40 flex justify-center px-6" style="display:none">
            <div class="w-full max-w-md rounded-b-2xl border p-3 shadow-xl drop-shadow-lg"
                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <div class="space-y-1.5">
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center">
                        <p class="text-xs font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'">
                            All Companies</p>
                    </a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center">
                        <p class="text-xs font-semibold">Featured Companies</p>
                    </a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center">
                        <p class="text-xs font-semibold">Company Reviews</p>
                    </a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center">
                        <p class="text-xs font-semibold">Top Hiring Companies</p>
                    </a>
                </div>
            </div>
        </div>

        <div x-show="activeDropdown === 'students'" @mouseenter="openDropdown('students')" @mouseleave="closeDropdown()"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute inset-x-0 top-full z-40 flex justify-center px-6" style="display:none">
            <div class="w-full max-w-md rounded-b-2xl border p-3 shadow-xl drop-shadow-lg"
                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <div class="space-y-1.5">
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">How it works</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Create CV / Resume Builder</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Application Tracker</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Interview Tips / Resources</a>
                </div>
            </div>
        </div>

        <div x-show="activeDropdown === 'employers'" @mouseenter="openDropdown('employers')"
            @mouseleave="closeDropdown()" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute inset-x-0 top-full z-40 flex justify-center px-6" style="display:none">
            <div class="w-full max-w-md rounded-b-2xl border p-3 shadow-xl drop-shadow-lg"
                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <div class="space-y-1.5">
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Post an Internship</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Pricing Plans</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Employer Dashboard</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Hiring Guide</a>
                </div>
            </div>
        </div>

        <div x-show="activeDropdown === 'about'" @mouseenter="openDropdown('about')" @mouseleave="closeDropdown()"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute inset-x-0 top-full z-40 flex justify-center px-6" style="display:none">
            <div class="w-full max-w-md rounded-b-2xl border p-3 shadow-xl drop-shadow-lg"
                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <div class="space-y-1.5">
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">About the platform</a>
                    <a href="{{ route('contact') }}"
                        class="block rounded-lg px-3 py-2.5 text-center text-xs">Contact</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">Privacy Policy / Terms</a>
                    <a href="#" class="block rounded-lg px-3 py-2.5 text-center text-xs">FAQs</a>
                </div>
            </div>
        </div>

        {{-- MEGA DROPDOWN Resources (Learn + Connect) --}}
        <div x-show="activeDropdown === 'resources'" @mouseenter="openDropdown('resources')"
            @mouseleave="closeDropdown()" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute inset-x-0 top-full z-40 flex justify-center px-6" style="display:none">
            <div class="w-full max-w-7xl rounded-b-2xl border p-6 shadow-xl drop-shadow-lg"
                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-6">
                        <h3 class="mb-3 text-2xl font-bold tracking-tight"
                            :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'" x-text="$store.ui.t('learn')">
                        </h3>

                        <div class="grid grid-cols-[minmax(0,1fr)_200px] gap-4">
                            <a href="{{ route('help-center') }}" class="group block">
                                <div class="overflow-hidden rounded-2xl border"
                                    :class="$store.ui.darkMode ? 'border-gray-700 bg-gray-900' : 'border-gray-300 bg-white'">
                                    <img src="{{ asset('images/Personnes/ticketlist.png') }}" alt="Resources preview"
                                        class="h-44 w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
                                </div>

                                <div class="pt-3.5">
                                    <div class="flex items-center gap-2">
                                        <h4 class="text-xl font-semibold leading-tight"
                                            :class="$store.ui.darkMode ? 'text-gray-100' : 'text-[#111827]'"
                                            x-text="$store.ui.t('navResourceFeatureTitle')"></h4>
                                    </div>
                                    <p class="mt-1 text-sm leading-snug"
                                        :class="$store.ui.darkMode ? 'text-gray-300' : 'text-[#374151]'"
                                        x-text="$store.ui.t('navResourceFeatureDescription')"></p>
                                    <div
                                        class="mt-2.5 inline-flex items-center gap-2 text-sm font-semibold text-[#6d28d9]">
                                        <span x-text="$store.ui.t('navResourceFeatureCta')"></span>
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14m-6-6 6 6-6 6" />
                                        </svg>
                                    </div>
                                </div>
                            </a>

                            <div class="pt-1">
                                <div class="space-y-2.5">
                                    <a href="{{ route('help-center') }}"
                                        class="group flex items-center justify-center gap-2.5 rounded-lg px-1 py-1 text-xs"
                                        :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#111827]'"
                                        x-text="$store.ui.t('blog')"></a>
                                    <a href="{{ route('help-center') }}"
                                        class="group flex items-center justify-center gap-2.5 rounded-lg px-1 py-1 text-xs"
                                        :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#111827]'"
                                        x-text="$store.ui.t('documentation')"></a>
                                    <a href="{{ route('help-center') }}"
                                        class="group flex items-center justify-center gap-2.5 rounded-lg px-1 py-1 text-xs"
                                        :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#111827]'"
                                        x-text="$store.ui.t('webinars')"></a>
                                    <a href="{{ route('help-center') }}"
                                        class="group flex items-center justify-center gap-2.5 rounded-lg px-1 py-1 text-xs"
                                        :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#111827]'"
                                        x-text="$store.ui.t('academy')"></a>
                                    <a href="{{ route('help-center') }}"
                                        class="group flex items-center justify-center gap-2.5 rounded-lg px-1 py-1 text-xs"
                                        :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#111827]'"
                                        x-text="$store.ui.t('community')"></a>
                                    <a href="{{ route('help-center') }}"
                                        class="group flex items-center justify-center gap-2.5 rounded-lg px-1 py-1 text-xs"
                                        :class="$store.ui.darkMode ? 'text-gray-200' : 'text-[#111827]'"
                                        x-text="$store.ui.t('events')"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-6">
                        <h3 class="mb-4 text-2xl font-bold tracking-tight"
                            :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'"
                            x-text="$store.ui.t('trending')"></h3>

                        <div class="space-y-2.5">
                            <a href="{{ route('help-center') }}" class="group flex items-start gap-3.5 rounded-xl p-2">
                                <img src="{{ asset('images/Personnes/reports.png') }}" alt="Resource trending 1"
                                    class="h-16 w-16 rounded-xl object-cover" />
                                <div>
                                    <div class="text-xs font-semibold leading-snug"
                                        :class="$store.ui.darkMode ? 'text-gray-100' : 'text-[#1f2937]'"
                                        x-text="$store.ui.t('trendItem1')"></div>
                                    <p class="mt-0.5 text-xs leading-snug"
                                        :class="$store.ui.darkMode ? 'text-gray-400' : 'text-[#4b5563]'"
                                        x-text="$store.ui.t('trendDesc1')"></p>
                                </div>
                            </a>
                            <a href="{{ route('help-center') }}" class="group flex items-start gap-3.5 rounded-xl p-2">
                                <img src="{{ asset('images/Personnes/ticket view.png') }}" alt="Resource trending 2"
                                    class="h-16 w-16 rounded-xl object-cover" />
                                <div>
                                    <div class="text-xs font-semibold leading-snug"
                                        :class="$store.ui.darkMode ? 'text-gray-100' : 'text-[#1f2937]'"
                                        x-text="$store.ui.t('trendItem2')"></div>
                                    <p class="mt-0.5 text-xs leading-snug"
                                        :class="$store.ui.darkMode ? 'text-gray-400' : 'text-[#4b5563]'"
                                        x-text="$store.ui.t('trendDesc2')"></p>
                                </div>
                            </a>
                            <a href="{{ route('help-center') }}" class="group flex items-start gap-3.5 rounded-xl p-2">
                                <img src="{{ asset('images/Personnes/Automatin.png') }}" alt="Resource trending 3"
                                    class="h-16 w-16 rounded-xl object-cover" />
                                <div>
                                    <div class="text-xs font-semibold leading-snug"
                                        :class="$store.ui.darkMode ? 'text-gray-100' : 'text-[#1f2937]'"
                                        x-text="$store.ui.t('trendItem3')"></div>
                                    <p class="mt-0.5 text-xs leading-snug"
                                        :class="$store.ui.darkMode ? 'text-gray-400' : 'text-[#4b5563]'"
                                        x-text="$store.ui.t('trendDesc3')"></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- DROPDOWN Company (small menu) --}}
        <div x-show="activeDropdown === 'company'" @mouseenter="openDropdown('company')" @mouseleave="closeDropdown()"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute inset-x-0 top-full z-40 flex justify-center px-6" style="display:none">
            <div class="w-full max-w-md rounded-b-2xl border p-3 shadow-xl drop-shadow-lg"
                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <div class="space-y-1.5">
                    <a href="{{ route('about') }}" class="block rounded-lg px-3 py-2.5 text-center">
                        <p class="text-xs font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'"
                            x-text="$store.ui.t('companyAbout')"></p>
                        <p class="mt-0.5 text-xs" :class="$store.ui.darkMode ? 'text-gray-400' : 'text-[#6b7280]'"
                            x-text="$store.ui.t('companyAboutDesc')"></p>
                    </a>
                    <a href="{{ route('help-center') }}" class="block rounded-lg px-3 py-2.5 text-center">
                        <p class="text-xs font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'"
                            x-text="$store.ui.t('utilityHelpCenter')"></p>
                        <p class="mt-0.5 text-xs" :class="$store.ui.darkMode ? 'text-gray-400' : 'text-[#6b7280]'"
                            x-text="$store.ui.t('companyHelpCenterDesc')"></p>
                    </a>
                    <a href="{{ route('contact') }}" class="block rounded-lg px-3 py-2.5 text-center">
                        <p class="text-xs font-semibold" :class="$store.ui.darkMode ? 'text-white' : 'text-[#111827]'"
                            x-text="$store.ui.t('utilityContactUs')"></p>
                        <p class="mt-0.5 text-xs" :class="$store.ui.darkMode ? 'text-gray-400' : 'text-[#6b7280]'"
                            x-text="$store.ui.t('companyContactDesc')"></p>
                    </a>
                </div>
            </div>
        </div>

        {{-- Mobile slide-down menu --}}
        <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4" x-cloak
            :class="$store.ui.darkMode ? 'bg-gray-950 border-gray-800' : 'bg-white border-gray-200'"
            class="border-b md:hidden" style="display:none">
            <div class="mx-auto max-w-7xl space-y-1 px-6 py-4">
                {{-- Mobile: Internships --}}
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                        class="flex w-full items-center justify-between rounded-lg px-6 py-3 text-sm font-medium transition-colors duration-200">
                        Internships
                        <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="ml-4 space-y-1">
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">All
                            Internships</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Remote
                            Internships</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">On-site
                            Internships</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Paid
                            Internships</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Internship
                            Categories</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Saved
                            Internships</a>
                    </div>
                </div>
                {{-- Mobile: Companies --}}
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                        class="flex w-full items-center justify-between rounded-lg px-6 py-3 text-sm font-medium transition-colors duration-200">
                        Companies
                        <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="ml-4 space-y-1">
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">All Companies</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Featured
                            Companies</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Company
                            Reviews</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Top Hiring
                            Companies</a>
                    </div>
                </div>
                {{-- Mobile: For Students --}}
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                        class="flex w-full items-center justify-between rounded-lg px-6 py-3 text-sm font-medium transition-colors duration-200">
                        For Students
                        <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="ml-4 space-y-1">
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">How it works</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Create CV / Resume
                            Builder</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Application
                            Tracker</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Interview Tips /
                            Resources</a>
                    </div>
                </div>
                {{-- Mobile: For Companies --}}
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                        class="flex w-full items-center justify-between rounded-lg px-6 py-3 text-sm font-medium transition-colors duration-200">
                        For Companies
                        <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="ml-4 space-y-1">
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Post an
                            Internship</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Pricing Plans</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Employer
                            Dashboard</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Hiring Guide</a>
                    </div>
                </div>
                {{-- Mobile: About --}}
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                        class="flex w-full items-center justify-between rounded-lg px-6 py-3 text-sm font-medium transition-colors duration-200">
                        About
                        <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="ml-4 space-y-1">
                        <a href="{{ route('about') }}"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">About the
                            platform</a>
                        <a href="{{ route('contact') }}"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Contact</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">Privacy Policy /
                            Terms</a>
                        <a href="#"
                            :class="$store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'"
                            class="block rounded-lg px-6 py-3 text-sm transition-colors duration-150">FAQs</a>
                    </div>
                </div>
                <a href="{{ route('help-center') }}"
                    :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                    class="block rounded-lg px-6 py-3 text-sm font-medium transition-colors duration-200">
                    Help Center
                </a>
                <a href="{{ route('contact') }}"
                    :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                    class="block rounded-lg px-6 py-3 text-sm font-medium transition-colors duration-200">
                    Contact
                </a>
                {{-- Mobile: Auth --}}
                <div class="space-y-2 border-t pt-4"
                    :class="$store.ui.darkMode ? 'border-gray-800' : 'border-gray-200'">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="block rounded-[12px] bg-[#f79123] px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
                                <span x-text="$store.ui.t('dashboard')"></span>
                            </a>
                        @else
                            <a href="{{ route('choose_path') }}"
                                :class="$store.ui.darkMode ? 'border-gray-500 text-gray-200 hover:border-gray-300' : 'border-[#1F1F1F] text-[#1F1F1F] hover:bg-gray-50'"
                                class="block rounded-[10px] border px-5 py-2.5 text-center text-sm font-semibold shadow-sm transition-all duration-200 hover:shadow-md">
                                <span x-text="$store.ui.t('viewDemo')"></span>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('choose_path') }}"
                                    class="block rounded-[12px] bg-[#f79123] px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
                                    <span x-text="$store.ui.t('tryFree')"></span>
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>

<div aria-hidden="true" class="h-23 transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'"></div>