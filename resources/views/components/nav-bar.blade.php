{{-- =====================================================================
Navbar — local state only; $store.ui.darkMode / lang / t() from $store.ui
===================================================================== --}}

@props(['blueBg' => false])
@props(['blackBg' => false])

@php
    $homeActive = request()->routeIs('navbarlink.home.*');
    $companiesActive = request()->routeIs('navbarlink.companies.*');
    $internshipsActive = request()->routeIs('navbarlink.internships.*');
    $howItActive = request()->routeIs('navbarlink.howit.*');
    $resourcesActive = request()->routeIs('navbarlink.resources.*');
    $isFrenchLocale = app()->getLocale() === 'fr';
@endphp

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
        :style="@if($blueBg) 'background-color: #00b1aa;' @elseif($blackBg) 'background-color: #061d21;' @else ($store.ui.darkMode ? 'background-color: rgba(0,0,0,0.3);' : 'background-color: rgba(255,255,255,0.4);') @endif"
        style="font-family: 'Poppins', sans-serif;">
        <div
            class="mx-auto flex h-8 items-center justify-end gap-5 px-4 text-[11px] {{ $isFrenchLocale ? 'max-w-352' : 'max-w-6xl' }}">
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
            <a href="{{ route('about') }}" class="text-xs font-medium transition-colors duration-200"
                :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]') @endif">{{ __('nav.about_us') }}</a>
            <a href="{{ route('contact') }}" class="text-xs font-medium transition-colors duration-200"
                :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-400 hover:text-white' : 'text-[#68737D] hover:text-[#17494D]') @endif"
                x-text="$store.ui.t('utilityContactUs')">{{ __('nav.contact_us') }}</a>
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
            :style="@if($blueBg) 'background-color: #00b1aa;' @elseif($blackBg) 'background-color: #061d21;' @else ($store.ui.darkMode ? 'background-color: rgba(0,0,0,0.3);' : 'background-color: rgba(255,255,255,0.4);') @endif"
            style="font-family: 'Poppins', sans-serif;">

            {{-- Main bar (h-[72px] taller) --}}
            <div
                class="mx-auto flex h-14 items-center justify-between px-4 {{ $isFrenchLocale ? 'max-w-300' : 'max-w-6xl' }}">

                {{-- LEFT Logo --}}
                <x-logo variant="landing" size="lg" href="/"
                    logo="{{ $blueBg ? 'images/Logos/logo-orange.png' : '' }}" />

                {{-- CENTER Desktop nav links --}}
                <div
                    class="hidden flex-1 items-center justify-center {{ $isFrenchLocale ? 'gap-4' : 'gap-6' }} md:flex">
                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('home')" @mouseleave="closeDropdown()">
                        <button type="button"
                            :style="@if($blueBg || $blackBg) '' @elseif($homeActive) 'color: #00b1aa;' @endif"
                            :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif"
                            class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-semibold transition-colors duration-200">
                            {{ __('nav.home') }}
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'home' ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[activeDropdown === 'home' ? 'w-[calc(100%-1rem)]' : '', 'bg-current']"></span>
                        </button>
                        <div x-show="activeDropdown === 'home'" @mouseenter="openDropdown('home')"
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
                                    <a href="{{ route('navbarlink.home.features') }}"
                                        :class="[{{ request()->routeIs('navbarlink.home.features') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.home_features') }}</a>
                                    <a href="{{ route('navbarlink.home.statistics') }}"
                                        :class="[{{ request()->routeIs('navbarlink.home.statistics') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.home_statistics') }}</a>
                                    <a href="{{ route('navbarlink.home.opportunities') }}"
                                        :class="[{{ request()->routeIs('navbarlink.home.opportunities') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.home_latest_opportunities') }}</a>
                                    <a href="{{ route('navbarlink.home.testimonials') }}"
                                        :class="[{{ request()->routeIs('navbarlink.home.testimonials') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.home_testimonials') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('internships')"
                        @mouseleave="closeDropdown()">
                        <button type="button"
                            :style="@if($blueBg || $blackBg) '' @elseif($internshipsActive) 'color: #00b1aa;' @endif"
                            :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif"
                            class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-semibold transition-colors duration-200">
                            {{ __('nav.internships') }}
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'internships' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[activeDropdown === 'internships' ? 'w-[calc(100%-1rem)]' : '', 'bg-current']"></span>
                        </button>
                        <div x-show="activeDropdown === 'internships'" @mouseenter="openDropdown('internships')"
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
                                    <a href="{{ route('navbarlink.internships.browse') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.browse') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_browse') }}</a>
                                    <a href="{{ route('navbarlink.internships.remote') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.remote') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_remote') }}</a>
                                    <a href="{{ route('navbarlink.internships.on-site') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.on-site') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_onsite') }}</a>
                                    <a href="{{ route('navbarlink.internships.hybrid') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.hybrid') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_hybrid') }}</a>
                                    <a href="{{ route('navbarlink.internships.paid') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.paid') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_paid') }}</a>
                                    <a href="{{ route('navbarlink.internships.saved') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.saved') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_saved') }}</a>
                                    <a href="{{ route('navbarlink.internships.categories') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.categories') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_categories') }}</a>
                                    <a href="{{ route('navbarlink.internships.tracker') }}"
                                        :class="[{{ request()->routeIs('navbarlink.internships.tracker') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.internships_tracker') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('companies')"
                        @mouseleave="closeDropdown()">
                        <button type="button"
                            :style="@if($blueBg || $blackBg) '' @elseif($companiesActive) 'color: #00b1aa;' @endif"
                            :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif"
                            class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-semibold transition-colors duration-200">
                            {{ __('nav.companies') }}
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'companies' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[activeDropdown === 'companies' ? 'w-[calc(100%-1rem)]' : '', 'bg-current']"></span>
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
                                    <a href="{{ route('navbarlink.companies.partners') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.partners') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.companies_partners') }}</a>
                                    <a href="{{ route('navbarlink.companies.top-recruiters') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.top-recruiters') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.companies_top_recruiters') }}</a>
                                    <a href="{{ route('navbarlink.companies.reviews') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.reviews') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.companies_reviews') }}</a>
                                    <a href="{{ route('navbarlink.companies.become-a-partner') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.become-a-partner') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.companies_become_partner') }}</a>
                                    <a href="{{ route('navbarlink.companies.post-internship') }}"
                                        :class="[{{ request()->routeIs('navbarlink.companies.post-internship') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.companies_post_internship') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('howit')" @mouseleave="closeDropdown()">
                        <button type="button"
                            :style="@if($blueBg || $blackBg) '' @elseif($howItActive) 'color: #00b1aa;' @endif"
                            :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif"
                            class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-semibold transition-colors duration-200">
                            {{ __('nav.how_it_works') }}
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'howit' ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[activeDropdown === 'howit' ? 'w-[calc(100%-1rem)]' : '', 'bg-current']"></span>
                        </button>
                        <div x-show="activeDropdown === 'howit'" @mouseenter="openDropdown('howit')"
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
                                    <a href="{{ route('navbarlink.howit.students') }}"
                                        :class="[{{ request()->routeIs('navbarlink.howit.students') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.how_it_for_students') }}</a>
                                    <a href="{{ route('navbarlink.howit.companies') }}"
                                        :class="[{{ request()->routeIs('navbarlink.howit.companies') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.how_it_for_companies') }}</a>
                                    <a href="{{ route('navbarlink.howit.universities') }}"
                                        :class="[{{ request()->routeIs('navbarlink.howit.universities') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.how_it_for_universities') }}</a>
                                    <a href="{{ route('navbarlink.howit.recruitment') }}"
                                        :class="[{{ request()->routeIs('navbarlink.howit.recruitment') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.how_it_recruitment_process') }}</a>
                                    <a href="{{ route('navbarlink.howit.faq') }}"
                                        :class="[{{ request()->routeIs('navbarlink.howit.faq') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.how_it_faq') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative pb-8 -mb-8" @mouseenter="openDropdown('resources')"
                        @mouseleave="closeDropdown()">
                        <button type="button"
                            :style="@if($blueBg || $blackBg) '' @elseif($resourcesActive) 'color: #00b1aa;' @endif"
                            :class="@if($blueBg || $blackBg) 'text-white hover:text-white' @else ($store.ui.darkMode ? 'text-gray-200 hover:text-white' : 'text-[#17494D] hover:text-[#00b1aa]') @endif"
                            class="navlink-btn group relative flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-[13px] font-semibold transition-colors duration-200">
                            {{ __('nav.resources') }}
                            <svg class="h-3.5 w-3.5 transition-transform duration-200"
                                :class="activeDropdown === 'resources' ? 'rotate-180' : ''" viewBox="0 0 12 12"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 4.5 6 7.5 9 4.5" />
                            </svg>
                            <span
                                class="absolute bottom-0 left-2 h-[2.5px] w-0 origin-left rounded-full transition-all duration-300 ease-out group-hover:w-[calc(100%-1rem)]"
                                :class="[activeDropdown === 'resources' ? 'w-[calc(100%-1rem)]' : '', 'bg-current']"></span>
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
                                    <a href="{{ route('navbarlink.resources.cv-builder') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.cv-builder') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.resources_cv_builder') }}</a>
                                    <a href="{{ route('navbarlink.resources.resume-tips') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.resume-tips') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.resources_resume_tips') }}</a>
                                    <a href="{{ route('navbarlink.resources.interview-preparation') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.interview-preparation') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.resources_interview_preparation') }}</a>
                                    <a href="{{ route('navbarlink.resources.career-roadmaps') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.career-roadmaps') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.resources_career_roadmaps') }}</a>
                                    <a href="{{ route('navbarlink.resources.blog') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.blog') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.resources_blog') }}</a>
                                    <a href="{{ route('navbarlink.resources.guides-tutorials') }}"
                                        :class="[{{ request()->routeIs('navbarlink.resources.guides-tutorials') ? 'true' : 'false' }} ? 'border-[#00b1aa] bg-[#e6f7f7] text-[#00b1aa]' : ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10 hover:text-white hover:border-white/70' : 'text-[#2d2d2d] hover:bg-[#e6f7f7] hover:text-[#00b1aa] hover:border-[#00b1aa]')]"
                                        class="block border-l-4 border-transparent px-5 py-2.5 text-xs font-bold transition-all duration-150">{{ __('nav.resources_guides_tutorials') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT Controls --}}
                <div class="flex items-center gap-2.5">
                    {{-- Dark mode toggle — clean fade --}}
                    <button type="button"
                        @click="(window.pageDarkModeToggle ? (window.pageDarkModeToggle()) : ($store.ui.showLoading(400), setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150)))"
                        class="relative flex h-8 w-8 items-center justify-center rounded-full transition-colors duration-200"
                        :class="$store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-[#1F1F1F] hover:bg-gray-100'"
                        title="Toggle dark mode">
                        {{-- Moon icon (shown in light mode) --}}
                        <svg x-show="!$store.ui.darkMode" x-cloak x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="absolute" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path d="M15.5 11.5A7 7 0 016.5 2.5a7 7 0 109 9z" fill="none" stroke="currentColor"
                                stroke-width="1.4" stroke-linecap="round" />
                        </svg>
                        {{-- Sun icon (shown in dark mode) — outline only, no yellow --}}
                        <svg x-show="$store.ui.darkMode" x-cloak x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="absolute" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round">
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
                                @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.lang = 'English'; langOpen = false }, 150); window.location.href='{{ route('locale.switch', ['lang' => 'en']) }}'"
                                :class="[
                                $store.ui.lang === 'English' ? 'font-bold' : 'font-normal',
                                @if($blueBg || $blackBg) 'text-white hover:bg-white/10' @else ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-700 hover:bg-gray-50') @endif
                            ]"
                                class="flex w-full items-center gap-2 rounded-lg px-4 py-2.5 text-left text-sm transition-colors duration-150">
                                <span class="text-lg leading-none">&#127468;&#127463;</span>
                                English
                            </button>
                            <div :class="$store.ui.darkMode ? 'border-gray-700' : 'border-gray-200'" class="border-t">
                            </div>
                            <button
                                @click="$store.ui.showLoading(400); setTimeout(() => { $store.ui.lang = 'French'; langOpen = false }, 150); window.location.href='{{ route('locale.switch', ['lang' => 'fr']) }}'"
                                :class="[
                                $store.ui.lang === 'French' ? 'font-bold' : 'font-normal',
                                @if($blueBg || $blackBg) 'text-white hover:bg-white/10' @else ($store.ui.darkMode ? 'text-gray-200 hover:bg-white/10' : 'text-gray-700 hover:bg-gray-50') @endif
                            ]"
                                class="flex w-full items-center gap-2 rounded-lg px-4 py-2.5 text-left text-sm transition-colors duration-150">
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
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" :class="[
                                                            'rounded-xl border px-5 py-2 text-sm font-semibold transition-all duration-200',
                                                            @if($blueBg || $blackBg)
                                                                'border-white text-white hover:bg-white hover:text-black'
                                                            @else
                                                                $store.ui.darkMode 
                                                                    ? 'border-gray-500 text-gray-200 hover:bg-white hover:text-black'
                                                                    : 'border-[#1F1F1F] text-[#1F1F1F] hover:bg-[#1F1F1F] hover:text-white'
                                                            @endif
                                                        ]">
                                        {{ __('nav.logout') }}
                                    </button>
                                </form>
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
                    <a href="{{ url('/') }}"
                        class="block rounded-lg px-4 py-2.5 text-sm font-semibold">{{ __('nav.home') }}</a>
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-semibold">{{ __('nav.internships') }}
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg></button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.internships.browse') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_browse') }}</a>
                            <a href="{{ route('navbarlink.internships.remote') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_remote') }}</a>
                            <a href="{{ route('navbarlink.internships.on-site') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_onsite') }}</a>
                            <a href="{{ route('navbarlink.internships.hybrid') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_hybrid') }}</a>
                            <a href="{{ route('navbarlink.internships.paid') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_paid') }}</a>
                            <a href="{{ route('navbarlink.internships.saved') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_saved') }}</a>
                            <a href="{{ route('navbarlink.internships.categories') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_categories') }}</a>
                            <a href="{{ route('navbarlink.internships.tracker') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.internships_tracker') }}</a>
                        </div>
                    </div>
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-semibold">{{ __('nav.companies') }}
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg></button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.companies.partners') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.companies_partners') }}</a>
                            <a href="{{ route('navbarlink.companies.top-recruiters') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.companies_top_recruiters') }}</a>
                            <a href="{{ route('navbarlink.companies.reviews') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.companies_reviews') }}</a>
                            <a href="{{ route('navbarlink.companies.become-a-partner') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.companies_become_partner') }}</a>
                            <a href="{{ route('navbarlink.companies.post-internship') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.companies_post_internship') }}</a>
                        </div>
                    </div>
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-semibold">{{ __('nav.how_it_works') }}
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg></button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.howit.students') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.how_it_for_students') }}</a>
                            <a href="{{ route('navbarlink.howit.companies') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.how_it_for_companies') }}</a>
                            <a href="{{ route('navbarlink.howit.universities') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.how_it_for_universities') }}</a>
                            <a href="{{ route('navbarlink.howit.recruitment') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.how_it_recruitment_process') }}</a>
                            <a href="{{ route('navbarlink.howit.faq') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.how_it_faq') }}</a>
                        </div>
                    </div>
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-2.5 text-sm font-semibold">{{ __('nav.resources') }}
                            <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg></button>
                        <div x-show="open" x-collapse class="ml-4 space-y-1">
                            <a href="{{ route('navbarlink.resources.cv-builder') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.resources_cv_builder') }}</a>
                            <a href="{{ route('navbarlink.resources.resume-tips') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.resources_resume_tips') }}</a>
                            <a href="{{ route('navbarlink.resources.interview-preparation') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.resources_interview_preparation') }}</a>
                            <a href="{{ route('navbarlink.resources.career-roadmaps') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.resources_career_roadmaps') }}</a>
                            <a href="{{ route('navbarlink.resources.blog') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.resources_blog') }}</a>
                            <a href="{{ route('navbarlink.resources.guides-tutorials') }}"
                                class="block rounded-lg px-4 py-2.5 text-sm">{{ __('nav.resources_guides_tutorials') }}</a>
                        </div>
                    </div>
                    {{-- Mobile: Auth --}}
                    <div class="space-y-2 border-t pt-4"
                        :class="$store.ui.darkMode ? 'border-gray-800' : 'border-gray-200'">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="block rounded-xl bg-[#f79123] px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#e07d0e] hover:shadow-md">
                                    <span x-text="$store.ui.t('dashboard')"></span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="block w-full">
                                    @csrf
                                    <button type="submit"
                                        :class="$store.ui.darkMode ? 'border-gray-500 text-gray-200 hover:border-gray-300' : 'border-[#1F1F1F] text-[#1F1F1F] hover:bg-gray-50'"
                                        class="block w-full rounded-[10px] border px-5 py-2.5 text-center text-sm font-semibold shadow-sm transition-all duration-200 hover:shadow-md">
                                        {{ __('nav.logout') }}
                                    </button>
                                </form>
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