@extends('layouts.public')

@section('title', 'On-site Internships — Interlink')
@section('meta_description', 'Explore on-site technical internships featuring corporate campus access, face-to-face mentorship, and verified relocation/housing stipends.')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    
    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5 md:flex md:items-center md:justify-between mb-8">
        <div class="min-w-0 flex-1">
            <span class="inline-flex items-center rounded bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-800 mb-2">{{ __('Office Campus Roles') }}</span>
            <h1 class="text-3xl font-bold leading-7 text-zinc-900 sm:truncate sm:text-4xl">{{ __('On-site Placements') }}</h1>
            <p class="mt-2 text-sm text-zinc-500 font-medium">{{ __('Immersive face-to-face mentorship at premier corporate headquarters. Verify relocation support packages directly.') }}</p>
        </div>
    </div>

    <!-- Onsite Perks Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10 text-sm">
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-house-chimney"></i></span>
            <h3 class="font-bold text-zinc-900">{{ __('Housing Assistance') }}</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Companies on this list provide dedicated housing allowances or corporate apartments during summer blocks.') }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-plane-departure"></i></span>
            <h3 class="font-bold text-zinc-900">{{ __('Travel Stipends') }}</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Round-trip flights to and from university locations are covered by the host employer\'s relocation package.') }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-chalkboard-user"></i></span>
            <h3 class="font-bold text-zinc-900">{{ __('Direct Mentorship') }}</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Guaranteed physical desk proximity to your senior host developer or designer for accelerated feedback.') }}</p>
        </div>
    </div>

    <!-- Listings Stream -->
    <div class="space-y-6">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Active Office Internships') }}</h2>

        <div class="space-y-4">
            <!-- Row 1 -->
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:border-zinc-300 transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-12 w-12 bg-[#635bff] text-white font-extrabold rounded-lg flex items-center justify-center text-lg">{{ __('S') }}</span>
                    <div>
                        <h3 class="font-bold text-base text-zinc-900">{{ __('Backend Systems Intern') }}</h3>
                        <p class="text-xs text-zinc-500 font-semibold">{{ __('Stripe &bull; San Francisco HQ (Townsend St)') }}</p>
                        
                        <div class="flex gap-2 mt-2">
                            <span class="bg-zinc-100 text-zinc-700 text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('San Francisco') }}</span>
                            <span class="bg-[#00B1AA]/5 text-[#00B1AA] text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('Relocation & Housing Provided') }}</span>
                            <span class="bg-zinc-50 text-zinc-500 text-[10px] px-2 py-0.5 rounded border border-zinc-200">{{ __('5 min walk from Caltrain') }}</span>
                        </div>
                    </div>
                </div>

                <div class="text-right flex md:flex-col items-center justify-between w-full md:w-auto mt-4 md:mt-0 border-t border-zinc-100 md:border-t-0 pt-3 md:pt-0">
                    <span class="font-bold text-emerald-600 text-sm md:text-base">{{ __('$62.50 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA] text-xs mt-1">{{ __('Apply Now &rarr;') }}</a>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:border-zinc-300 transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-12 w-12 bg-[#f24e1e] text-white font-extrabold rounded-lg flex items-center justify-center text-lg">{{ __('F') }}</span>
                    <div>
                        <h3 class="font-bold text-base text-zinc-900">{{ __('Product Design Intern') }}</h3>
                        <p class="text-xs text-zinc-500 font-semibold">{{ __('Figma &bull; New York City Campus (Hudson St)') }}</p>
                        
                        <div class="flex gap-2 mt-2">
                            <span class="bg-zinc-100 text-zinc-700 text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('New York City') }}</span>
                            <span class="bg-[#00B1AA]/5 text-[#00B1AA] text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('$2k/mo Housing Subsidy') }}</span>
                            <span class="bg-zinc-50 text-zinc-500 text-[10px] px-2 py-0.5 rounded border border-zinc-200">{{ __('MTA Metrocard Covered') }}</span>
                        </div>
                    </div>
                </div>

                <div class="text-right flex md:flex-col items-center justify-between w-full md:w-auto mt-4 md:mt-0 border-t border-zinc-100 md:border-t-0 pt-3 md:pt-0">
                    <span class="font-bold text-emerald-600 text-sm md:text-base">{{ __('$48.00 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA] text-xs mt-1">{{ __('Apply Now &rarr;') }}</a>
                </div>
            </div>

            <!-- Row 3 (Retool) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:border-zinc-300 transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-12 w-12 bg-[#2563EB] text-white font-extrabold rounded-lg flex items-center justify-center text-lg">{{ __('R') }}</span>
                    <div>
                        <h3 class="font-bold text-base text-zinc-900">{{ __('Full-Stack Engineer Intern') }}</h3>
                        <p class="text-xs text-zinc-500 font-semibold">{{ __('Retool &bull; San Francisco HQ (Mission St)') }}</p>
                        
                        <div class="flex gap-2 mt-2">
                            <span class="bg-zinc-100 text-zinc-700 text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('San Francisco') }}</span>
                            <span class="bg-[#00B1AA]/5 text-[#00B1AA] text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('Catered Lunches & Gym') }}</span>
                            <span class="bg-zinc-50 text-zinc-500 text-[10px] px-2 py-0.5 rounded border border-zinc-200">{{ __('BART Shuttle Access') }}</span>
                        </div>
                    </div>
                </div>

                <div class="text-right flex md:flex-col items-center justify-between w-full md:w-auto mt-4 md:mt-0 border-t border-zinc-100 md:border-t-0 pt-3 md:pt-0">
                    <span class="font-bold text-emerald-600 text-sm md:text-base">{{ __('$58.00 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA] text-xs mt-1">{{ __('Apply Now &rarr;') }}</a>
                </div>
            </div>

            <!-- Row 4 (Cloudflare) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:border-zinc-300 transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-12 w-12 bg-[#f38020] text-white font-extrabold rounded-lg flex items-center justify-center text-lg">{{ __('C') }}</span>
                    <div>
                        <h3 class="font-bold text-base text-zinc-900">{{ __('Security Operations Intern') }}</h3>
                        <p class="text-xs text-zinc-500 font-semibold">{{ __('Cloudflare &bull; Austin HQ (Congress Ave)') }}</p>
                        
                        <div class="flex gap-2 mt-2">
                            <span class="bg-zinc-100 text-zinc-700 text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('Austin') }}</span>
                            <span class="bg-[#00B1AA]/5 text-[#00B1AA] text-[10px] font-semibold px-2 py-0.5 rounded">{{ __('$1,500 Relocation Allowance') }}</span>
                            <span class="bg-zinc-50 text-zinc-500 text-[10px] px-2 py-0.5 rounded border border-zinc-200">{{ __('Downtown Parking Paid') }}</span>
                        </div>
                    </div>
                </div>

                <div class="text-right flex md:flex-col items-center justify-between w-full md:w-auto mt-4 md:mt-0 border-t border-zinc-100 md:border-t-0 pt-3 md:pt-0">
                    <span class="font-bold text-emerald-600 text-sm md:text-base">{{ __('$56.00 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA] text-xs mt-1">{{ __('Apply Now &rarr;') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Corporate Housing Partners (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Verified Corporate Housing Networks') }}</h2>
        <p class="text-xs text-zinc-500 max-w-xl leading-relaxed">{{ __('Interlink integrates with leading short-term rental platforms to provide pre-approved corporate apartments. Students can check availability directly upon receiving an offer sheet.') }}</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-hotel"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Landing Corporate') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Flexible furnished apartments in major tech corridors. Includes utilities, workspace Wi-Fi, and 24/7 building security. No security deposits required.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-building"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Blueground Internships') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Premium downtown apartments with vetted commutes. Pre-negotiated 3-month leasing terms configured to sync with summer cohort calendar blocks.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-city"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Kasa Living') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Tech-enabled short-term stays in SF, Seattle, and Austin. Keyless entry, on-site co-working lounges, and fully equipped kitchens.') }}</p>
            </div>
        </div>
    </div>

    <!-- Relocation Roadmap Timeline (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Relocation & Onboarding Checklist') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-xs">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="font-bold text-[#00B1AA]">{{ __('Week 1: Offer & Housing') }}</span>
                <p class="text-zinc-500 leading-relaxed">{{ __('Review housing options on Interlink. Secure corporate lease or approve company housing allowances. Complete state taxation W-4 details.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="font-bold text-[#00B1AA]">{{ __('Week 2: Travel & Logistics') }}</span>
                <p class="text-zinc-500 leading-relaxed">{{ __('Book round-trip flights through corporate portals. Schedule moving deliveries. Generate transit card credentials.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="font-bold text-[#00B1AA]">{{ __('Week 3: Hardware Delivery') }}</span>
                <p class="text-zinc-500 leading-relaxed">{{ __('Confirm laptop shipping configurations. Receive secure software tokens and security badge instructions from internal IT.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="font-bold text-[#00B1AA]">{{ __('Day 1: Desk Setup') }}</span>
                <p class="text-zinc-500 leading-relaxed">{{ __('Arrive at HQ campus. Receive physical credentials badge. Synchronize with your designated senior manager mentor.') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection



