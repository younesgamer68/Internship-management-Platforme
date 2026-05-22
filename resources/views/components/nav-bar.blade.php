{{-- =====================================================================
Navbar — local state only; $store.ui.darkMode / lang / t() from $store.ui
===================================================================== --}}

@props(['blueBg' => false])
@props(['blackBg' => false])

{{-- Utility bar is always pinned to the very top --}}

<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-100%);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slide-down {
        animation: slideDown 0.6s ease-out;
    }
</style>
<div class="absolute inset-x-0 z-50 transition-[top] duration-300 ease-out motion-reduce:transition-none">
    <div class="backdrop-blur-sm w-full transition-colors duration-300 animate-slide-down"
        :style="@if($blueBg) 'background-color: #3ab0aa;' @elseif($blackBg) 'background-color: #061d21;' @else ($store.ui.darkMode ? 'background-color: rgba(0,0,0,0.3);' : 'background-color: rgba(255,255,255,0.4);') @endif"
        style="font-family: 'Poppins', sans-serif;">
        <div class="mx-auto flex h-8 max-w-6xl items-center justify-end gap-5 px-4 text-[11px]">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="cursor-pointer rounded-lg text-xs font-medium transition-colors duration-200"
                        :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]') @endif"
                        x-text="$store.ui.t('utilityLogout')"></button>
                </form>
            @else
                <a href="{{ route('choose_path') }}" class="text-xs font-medium transition-colors duration-200"
                    :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]') @endif"
                    x-text="$store.ui.t('utilitySignIn')"></a>
            @endauth
            <a href="{{ route('help-center') }}" class="text-xs font-medium transition-colors duration-200"
                :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]') @endif"
                x-text="$store.ui.t('utilityHelpCenter')"></a>
            <a href="{{ route('about') }}" class="text-xs font-medium transition-colors duration-200"
                :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]') @endif">About
                us</a>
            <a href="{{ route('contact') }}" class="text-xs font-medium transition-colors duration-200"
                :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]') @endif"
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

            if (this.navHidden) {
                this.activeDropdown = null;
            }

            this.lastScrollY = currentScrollY;
            this.ticking = false;
        },
        init() {
            this.lastScrollY = window.scrollY || 0;

            // Initialize state based on current scroll position so the bar
            // is hidden immediately when the page is loaded scrolled down.
            const current = this.lastScrollY;
            this.isAtTop = current <= 28;
            // If page is not at top, hide the navbar utility bar immediately
            this.navHidden = current > 0;

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

        <nav class="w-full transition-colors duration-300 backdrop-blur-sm animate-slide-down"
            :style="@if($blueBg) 'background-color: #3ab0aa;' @elseif($blackBg) 'background-color: #061d21;' @else ($store.ui.darkMode ? 'background-color: rgba(0,0,0,0.3);' : 'background-color: rgba(255,255,255,0.4);') @endif"
            style="font-family: 'Poppins', sans-serif;">

            {{-- Main bar (h-[72px] taller) --}}
            <div class="mx-auto flex h-14 max-w-6xl items-center justify-between px-4">

                {{-- LEFT Logo --}}
                <x-logo variant="landing" size="lg" href="/"
                    small="{{ $blueBg ? 'images/Small Logo White.png' : 'images/Small Logo.png' }}" />

                {{-- CENTER Desktop nav links --}}
                <div class="hidden flex-1 items-center justify-center gap-6 md:flex">
                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('companies')"
                        @mouseleave="closeDropdown()">
                        <button type="button" :class="[
            @if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif,
            activeDropdown === 'companies' ? (@if($blueBg || $blackBg) 'text-white' @else ($store.ui.darkMode ? 'text-white' : 'text-[#00b1aa]') @endif) : ''
        ]" class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-medium transition-colors duration-200">
                            Companies
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'companies' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[
                    activeDropdown === 'companies' ? 'w-[calc(100%-1rem)]' : '',
                    @if($blueBg || $blackBg) 'bg-white' @else ($store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]') @endif
                ]"></span>
                        </button>

                        <div x-show="activeDropdown === 'companies'" @mouseenter="openDropdown('companies')"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2" x-cloak
                            class="absolute left-1/2 top-7 z-40 mt-4 -translate-x-1/2" style="display:none">
                            <div class="w-50 rounded-none border border-t-2 border-t-[#00b1aa] p-2 shadow-[0_12px_32px_rgba(0,0,0,.10)]"
                                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                                <div class="space-y-0.5">
                                    <a href="{{ route('navbarlink.companies.host-an-intern') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.host-an-intern') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Host
                                        an Intern</a>
                                    <a href="{{ route('navbarlink.companies.how-it-works') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.how-it-works') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">How
                                        It Works</a>
                                    <a href="{{ route('navbarlink.companies.faqs') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.faqs') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">FAQs</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('educators')"
                        @mouseleave="closeDropdown()">
                        <button type="button" :class="[
            @if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif,
            activeDropdown === 'educators' ? (@if($blueBg || $blackBg) 'text-white' @else ($store.ui.darkMode ? 'text-white' : 'text-[#00b1aa]') @endif) : ''
        ]" class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-medium transition-colors duration-200">
                            Educators
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'educators' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[
                    activeDropdown === 'educators' ? 'w-[calc(100%-1rem)]' : '',
                    @if($blueBg || $blackBg) 'bg-white' @else ($store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]') @endif
                ]"></span>
                        </button>

                        <div x-show="activeDropdown === 'educators'" @mouseenter="openDropdown('educators')"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2" x-cloak
                            class="absolute left-1/2 top-7 z-40 mt-4 -translate-x-1/2" style="display:none">
                            <div class="w-50 rounded-none border border-t-2 border-t-[#00b1aa] p-2 shadow-[0_12px_32px_rgba(0,0,0,.10)]"
                                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                                <div class="space-y-0.5">
                                    <a href="{{ route('navbarlink.educators.universities') }}"
                                        :class="[{{ request()->routeIs('navbarlink.educators.universities') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Universities</a>
                                    <a href="{{ route('navbarlink.educators.bootcamps') }}"
                                        :class="[{{ request()->routeIs('navbarlink.educators.bootcamps') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Bootcamps</a>
                                    <a href="{{ route('navbarlink.educators.governments') }}"
                                        :class="[{{ request()->routeIs('navbarlink.educators.governments') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Governments</a>
                                    <a href="{{ route('navbarlink.educators.affiliates') }}"
                                        :class="[{{ request()->routeIs('navbarlink.educators.affiliates') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Affiliates</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('interns')"
                        @mouseleave="closeDropdown()">
                        <button type="button" :class="[
            @if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif,
            activeDropdown === 'interns' ? (@if($blueBg || $blackBg) 'text-white' @else ($store.ui.darkMode ? 'text-white' : 'text-[#00b1aa]') @endif) : ''
        ]" class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-medium transition-colors duration-200">
                            Internships
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'interns' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[
                    activeDropdown === 'interns' ? 'w-[calc(100%-1rem)]' : '',
                    @if($blueBg || $blackBg) 'bg-white' @else ($store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]') @endif
                ]"></span>
                        </button>

                        <div x-show="activeDropdown === 'interns'" @mouseenter="openDropdown('interns')"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2" x-cloak
                            class="absolute left-1/2 top-7 z-40 mt-4 -translate-x-1/2" style="display:none">
                            <div class="w-50 rounded-none border border-t-2 border-t-[#00b1aa] p-2 shadow-[0_12px_32px_rgba(0,0,0,.10)]"
                                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                                <div class="space-y-0.5">
                                    <a href="{{ route('navbarlink.interns.apply-for-internships') }}"
                                        :class="[{{ request()->routeIs('navbarlink.interns.apply-for-internships') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Apply
                                        for Internships</a>
                                    <a href="{{ route('navbarlink.interns.how-it-works') }}"
                                        :class="[{{ request()->routeIs('navbarlink.interns.how-it-works') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">How
                                        It Works</a>
                                    <a href="{{ route('navbarlink.interns.career-fields') }}"
                                        :class="[{{ request()->routeIs('navbarlink.interns.career-fields') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Career
                                        Fields</a>
                                    <a href="{{ route('navbarlink.interns.experiences') }}"
                                        :class="[{{ request()->routeIs('navbarlink.interns.experiences') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Experiences</a>
                                    <a href="{{ route('navbarlink.interns.faqs') }}"
                                        :class="[{{ request()->routeIs('navbarlink.interns.faqs') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">FAQs</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('resources')"
                        @mouseleave="closeDropdown()">
                        <button type="button" :class="[
            @if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif,
            activeDropdown === 'resources' ? (@if($blueBg || $blackBg) 'text-white' @else ($store.ui.darkMode ? 'text-white' : 'text-[#00b1aa]') @endif) : ''
        ]" class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-medium transition-colors duration-200">
                            Resources
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'resources' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[
                    activeDropdown === 'resources' ? 'w-[calc(100%-1rem)]' : '',
                    @if($blueBg || $blackBg) 'bg-white' @else ($store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]') @endif
                ]"></span>
                        </button>

                        <div x-show="activeDropdown === 'resources'" @mouseenter="openDropdown('resources')"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2" x-cloak
                            class="absolute left-1/2 top-7 z-40 mt-4 -translate-x-1/2" style="display:none">
                            <div class="w-50 rounded-none border border-t-2 border-t-[#00b1aa] p-2 shadow-[0_12px_32px_rgba(0,0,0,.10)]"
                                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                                <div class="space-y-0.5">
                                    <a href="{{ route('navbarlink.resources.blog') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.blog') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Blog</a>
                                    <div :class="$store.ui.darkMode ? 'bg-gray-700' : 'bg-[#e8e8e8]'"
                                        class="mx-4 my-1 h-px"></div>
                                    <a href="{{ route('navbarlink.resources.help-center') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.help-center') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Help
                                        Center</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('about_us')"
                        @mouseleave="closeDropdown()">
                        <button type="button" :class="[
            @if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif,
            activeDropdown === 'about_us' ? (@if($blueBg || $blackBg) 'text-white' @else ($store.ui.darkMode ? 'text-white' : 'text-[#00b1aa]') @endif) : ''
        ]" class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-medium transition-colors duration-200">
                            About Us
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'about_us' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[
                    activeDropdown === 'about_us' ? 'w-[calc(100%-1rem)]' : '',
                    @if($blueBg || $blackBg) 'bg-white' @else ($store.ui.darkMode ? 'bg-white' : 'bg-[#17494D]') @endif
                ]"></span>
                        </button>

                        <div x-show="activeDropdown === 'about_us'" @mouseenter="openDropdown('about_us')"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2" x-cloak
                            class="absolute left-1/2 top-7 z-40 mt-4 -translate-x-1/2" style="display:none">
                            <div class="w-50 rounded-none border border-t-2 border-t-[#00b1aa] p-2 shadow-[0_12px_32px_rgba(0,0,0,.10)]"
                                :class="$store.ui.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                                <div class="space-y-0.5">
                                    <a href="{{ route('navbarlink.about-us.our-mission') }}"
                                        :class="[{{ request()->routeIs('navbarlink.about-us.our-mission') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Our
                                        Mission</a>
                                    <a href="{{ route('navbarlink.about-us.our-team') }}"
                                        :class="[{{ request()->routeIs('navbarlink.about-us.our-team') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Our
                                        Team</a>
                                    <a href="{{ route('navbarlink.about-us.join-us') }}"
                                        :class="[{{ request()->routeIs('navbarlink.about-us.join-us') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Join
                                        Us</a>
                                    <a href="{{ route('navbarlink.about-us.press') }}"
                                        :class="[{{ request()->routeIs('navbarlink.about-us.press') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Press</a>
                                    <a href="{{ route('navbarlink.about-us.contact-us') }}"
                                        :class="[{{ request()->routeIs('navbarlink.about-us.contact-us') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">Contact
                                        Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT Controls --}}
                <div class="flex items-center gap-2.5">
                    {{-- Dark mode toggle — clean fade --}}
                    <button type="button"
                        @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150)"
                        class="relative flex h-8 w-8 items-center justify-center rounded-full transition-colors duration-200"
                        :class="@if($blueBg || $blackBg) 'text-white hover:bg-white/10' @else ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-[#1F1F1F] hover:bg-gray-100') @endif"
                        title="Toggle dark mode">
                        {{-- Moon icon (shown in light mode) --}}
                        <svg x-show="!$store.ui.darkMode" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="absolute" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path d="M15.5 11.5A7 7 0 016.5 2.5a7 7 0 109 9z" fill="none" stroke="currentColor"
                                stroke-width="1.4" stroke-linecap="round" />
                        </svg>
                        {{-- Sun icon (shown in dark mode) — outline only, no yellow --}}
                        <svg x-show="$store.ui.darkMode" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="absolute" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <circle cx="12" cy="12" r="4" />
                            <path
                                d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41m11.32-11.32l1.41-1.41" />
                        </svg>
                    </button>

                    {{-- Language dropdown — globe icon only, flags in menu --}}
                    <div class="relative" @click.outside="langOpen = false">
                        <button type="button" @click="langOpen = !langOpen"
                            :class="@if($blueBg || $blackBg) 'text-white hover:bg-white/10' @else ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-[#1F1F1F] hover:bg-gray-100') @endif"
                            class="flex h-8 w-8 items-center justify-center rounded-full transition-colors duration-200"
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
                            class="absolute right-0 z-50 mt-2 w-40 overflow-hidden rounded-xl border shadow-xl drop-shadow-lg"
                            style="display:none">
                            <button
                                @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.lang = 'English'; langOpen = false }, 150)"
                                :class="[
                            $store.ui.lang === 'English' ? 'font-bold' : 'font-normal',
                            @if($blueBg || $blackBg) 'text-white hover:bg-white/10' @else ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-700 hover:bg-gray-50') @endif
                        ]" class="flex w-full items-center gap-2 rounded-lg px-4 py-2.5 text-left text-sm transition-colors duration-150">
                                <span class="text-lg leading-none">&#127468;&#127463;</span>
                                English
                            </button>
                            <div :class="$store.ui.darkMode ? 'border-gray-700' : 'border-gray-200'" class="border-t">
                            </div>
                            <button
                                @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.lang = 'French'; langOpen = false }, 150)"
                                :class="[
                            $store.ui.lang === 'French' ? 'font-bold' : 'font-normal',
                            @if($blueBg || $blackBg) 'text-white hover:bg-white/10' @else ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-700 hover:bg-gray-50') @endif
                        ]" class="flex w-full items-center gap-2 rounded-lg px-4 py-2.5 text-left text-sm transition-colors duration-150">
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
                                    class="rounded-xl bg-[#f79123] px-5 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
                                    <span x-text="$store.ui.t('dashboard')"></span>
                                </a>
                            @else
                                <a href="{{ route('choose_path') }}"
                                    :class="@if($blueBg || $blackBg) 'border-white text-white hover:bg-white/10 hover:border-white' @else ($store.ui.darkMode ? 'border-gray-500 text-gray-200 hover:bg-white/10 hover:border-gray-300' : 'border-[#1F1F1F] text-[#1F1F1F] hover:bg-gray-50') @endif"
                                    class="rounded-xl border px-5 py-2 text-sm font-semibold transition-all duration-200 hover:shadow-md">
                                    <span x-text="$store.ui.t('viewDemo')"></span>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('choose_path') }}"
                                        class="rounded-xl bg-[#f79123] px-5 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
                                        <span x-text="$store.ui.t('tryFree')"></span>
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>

                    {{-- Hamburger (mobile) --}}
                    <button type="button" @click="mobileOpen = !mobileOpen"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                        class="flex h-9 w-9 items-center justify-center rounded-lg transition-colors duration-200 md:hidden">
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

            {{-- Mobile slide-down menu --}}
            <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
                x-cloak :class="$store.ui.darkMode ? 'bg-gray-950 border-gray-800' : 'bg-white border-gray-200'"
                class="border-b md:hidden" style="display:none">
                <div class="mx-auto max-w-6xl space-y-1 px-4 py-3">
                    {{-- Mobile: Companies --}}
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-medium transition-colors duration-200">
                            Companies
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.companies.host-an-intern') }}"
                                :class="[{{ request()->routeIs('navbarlink.companies.host-an-intern') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Host
                                an Intern</a>
                            <a href="{{ route('navbarlink.companies.how-it-works') }}"
                                :class="[{{ request()->routeIs('navbarlink.companies.how-it-works') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">How
                                It Works</a>
                            <a href="{{ route('navbarlink.companies.faqs') }}"
                                :class="[{{ request()->routeIs('navbarlink.companies.faqs') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">FAQs</a>
                        </div>
                    </div>
                    {{-- Mobile: Educators --}}
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-medium transition-colors duration-200">
                            Educators
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.educators.universities') }}"
                                :class="[{{ request()->routeIs('navbarlink.educators.universities') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Universities</a>
                            <a href="{{ route('navbarlink.educators.bootcamps') }}"
                                :class="[{{ request()->routeIs('navbarlink.educators.bootcamps') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Bootcamps</a>
                            <a href="{{ route('navbarlink.educators.governments') }}"
                                :class="[{{ request()->routeIs('navbarlink.educators.governments') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Governments</a>
                            <a href="{{ route('navbarlink.educators.affiliates') }}"
                                :class="[{{ request()->routeIs('navbarlink.educators.affiliates') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Affiliates</a>
                        </div>
                    </div>
                    {{-- Mobile: Interns --}}
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-medium transition-colors duration-200">
                            Interns
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.interns.apply-for-internships') }}"
                                :class="[{{ request()->routeIs('navbarlink.interns.apply-for-internships') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Apply
                                for Internships</a>
                            <a href="{{ route('navbarlink.interns.how-it-works') }}"
                                :class="[{{ request()->routeIs('navbarlink.interns.how-it-works') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">How
                                It Works</a>
                            <a href="{{ route('navbarlink.interns.career-fields') }}"
                                :class="[{{ request()->routeIs('navbarlink.interns.career-fields') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Career
                                Fields</a>
                            <a href="{{ route('navbarlink.interns.experiences') }}"
                                :class="[{{ request()->routeIs('navbarlink.interns.experiences') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Experiences</a>
                            <a href="{{ route('navbarlink.interns.faqs') }}"
                                :class="[{{ request()->routeIs('navbarlink.interns.faqs') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">FAQs</a>
                        </div>
                    </div>
                    {{-- Mobile: Resources --}}
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-medium transition-colors duration-200">
                            Resources
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.resources.blog') }}"
                                :class="[{{ request()->routeIs('navbarlink.resources.blog') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Blog</a>
                            <a href="{{ route('navbarlink.resources.help-center') }}"
                                :class="[{{ request()->routeIs('navbarlink.resources.help-center') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Help
                                Center</a>
                        </div>
                        <a href="{{ route('navbarlink.about-us.our-mission') }}"
                            :class="[{{ request()->routeIs('navbarlink.about-us.our-mission') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                            class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Our
                            Mission</a>
                        <a href="{{ route('navbarlink.about-us.our-team') }}"
                            :class="[{{ request()->routeIs('navbarlink.about-us.our-team') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                            class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Our
                            Team</a>
                        <a href="{{ route('navbarlink.about-us.join-us') }}"
                            :class="[{{ request()->routeIs('navbarlink.about-us.join-us') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                            class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Join
                            Us</a>
                        <a href="{{ route('navbarlink.about-us.press') }}"
                            :class="[{{ request()->routeIs('navbarlink.about-us.press') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                            class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Press</a>
                        <a href="{{ route('navbarlink.about-us.contact-us') }}"
                            :class="[{{ request()->routeIs('navbarlink.about-us.contact-us') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                            class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Contact
                            Us</a>
                    </div>
                    {{-- Mobile: About Us --}}
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-medium transition-colors duration-200">
                            About Us
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.about-us.our-mission') }}"
                                :class="[{{ request()->routeIs('navbarlink.about-us.our-mission') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Our
                                Mission</a>
                            <a href="{{ route('navbarlink.about-us.our-team') }}"
                                :class="[{{ request()->routeIs('navbarlink.about-us.our-team') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Our
                                Team</a>
                            <a href="{{ route('navbarlink.about-us.join-us') }}"
                                :class="[{{ request()->routeIs('navbarlink.about-us.join-us') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Join
                                Us</a>
                            <a href="{{ route('navbarlink.about-us.press') }}"
                                :class="[{{ request()->routeIs('navbarlink.about-us.press') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Press</a>
                            <a href="{{ route('navbarlink.about-us.contact-us') }}"
                                :class="[{{ request()->routeIs('navbarlink.about-us.contact-us') ? 'true' : 'false' }} ? 'bg-[#e6f7f7] text-[#00b1aa] font-semibold' : ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900')]"
                                class="block rounded-lg px-4 py-2.5 text-sm transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-800">Contact
                                Us</a>
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
                                    class="block rounded-xl bg-[#f79123] px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
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
                                        class="block rounded-xl bg-[#f79123] px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
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

    {{-- <div aria-hidden="true" class="h-16 transition-colors duration-300"
        :class="$store.ui.darkMode ? 'bg-black' : 'bg-white'"></div> --}}