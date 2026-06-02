@extends('layouts.public')

@section('title', 'Hybrid Internships — Interlink')
@section('meta_description', 'Discover hybrid internships balancing remote flexibility with in-office collaboration. Filter by office attendance models.')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5 mb-8">
        <h1 class="text-3xl font-bold leading-7 text-zinc-900 sm:truncate sm:text-4xl">{{ __('Hybrid Placements') }}</h1>
        <p class="mt-2 text-sm text-zinc-500 font-medium">{{ __('The best of both worlds. Collaborate face-to-face during key days, and enjoy remote flexibility for head-down coding.') }}</p>
    </div>

    <!-- Hybrid Policies Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 text-sm">
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <h3 class="font-bold text-zinc-900"><i class="fa-solid fa-calendar-week text-[#00B1AA] mr-1.5"></i>{{ __('Typical Hybrid Models') }}</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Most partners operate on a **3-day office, 2-day remote** schedule, with collaborative team syncs occurring on Tuesdays and Thursdays.') }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <h3 class="font-bold text-zinc-900"><i class="fa-solid fa-train text-[#00B1AA] mr-1.5"></i>{{ __('Transit Commuter Stipends') }}</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Our partner companies offer monthly transit subsidies covering public trains, buses, or regional parking for office days.') }}</p>
        </div>
    </div>

    <!-- Hybrid Listings -->
    <div class="space-y-6">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Active Hybrid Positions') }}</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#635bff] text-white font-bold rounded-lg flex items-center justify-center">{{ __('S') }}</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">{{ __('API Core Developer Intern') }}</h3>
                                <p class="text-xs text-zinc-500 font-semibold">{{ __('Stripe &middot; Payments Core') }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-md bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-800">{{ __('3 Days Office') }}</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Join the core engineering crew in San Francisco. Office presence Tuesday, Wednesday, Thursday.') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">{{ __('$62.50 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Review & Apply &rarr;') }}</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#f24e1e] text-white font-bold rounded-lg flex items-center justify-center">{{ __('F') }}</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">{{ __('Editor Canvas Intern') }}</h3>
                                <p class="text-xs text-zinc-500 font-semibold">{{ __('Figma &middot; Editor Design') }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-md bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-800">{{ __('2 Days Office') }}</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Collaborate with the NYC design group on canvas interactions. Office presence Monday and Tuesday.') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">{{ __('$48.00 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Review & Apply &rarr;') }}</a>
                </div>
            </div>

            <!-- Card 3 (Retool) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#2563EB] text-white font-bold rounded-lg flex items-center justify-center">{{ __('R') }}</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">{{ __('Full-Stack Engineer Intern') }}</h3>
                                <p class="text-xs text-zinc-500 font-semibold">{{ __('Retool &middot; Component Studio') }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-md bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-800">{{ __('3 Days Office') }}</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Develop component frameworks on-site in SF Tuesday-Thursday. Remote flexibility on Monday/Friday.') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">{{ __('$58.00 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Review & Apply &rarr;') }}</a>
                </div>
            </div>

            <!-- Card 4 (AWS) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#ff9900] text-white font-bold rounded-lg flex items-center justify-center">{{ __('A') }}</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">{{ __('Solutions Architect Intern') }}</h3>
                                <p class="text-xs text-zinc-500 font-semibold">{{ __('AWS &middot; Enterprise Cloud') }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-md bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-800">{{ __('3 Days Office') }}</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">{{ __('Present cloud architectures to enterprise clients in Seattle. Office presence Tuesday to Thursday.') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">{{ __('$52.50 / hour') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Review & Apply &rarr;') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Hybrid Success Metrics (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Hybrid Match Performance') }}</h2>
        <p class="text-xs text-zinc-500 max-w-xl leading-relaxed">{{ __('Our statistical evaluations indicate that hybrid interns establish stronger team connections, leading to higher full-time retention offers compared to fully remote cohorts.') }}</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center text-xs">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="block text-2xl font-bold text-zinc-900">92.4%</span>
                <h4 class="font-bold text-zinc-500 uppercase tracking-wider text-[10px]">{{ __('Return Offer Rate') }}</h4>
                <p class="text-zinc-400">{{ __('Hybrid placements leading to official full-time career contracts.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="block text-2xl font-bold text-zinc-900">96.8%</span>
                <h4 class="font-bold text-zinc-500 uppercase tracking-wider text-[10px]">{{ __('Manager Satisfaction') }}</h4>
                <p class="text-zinc-400">{{ __('Hiring managers reporting high satisfaction with hybrid onboarding speeds.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="block text-2xl font-bold text-zinc-900">{{ __('$120/mo') }}</span>
                <h4 class="font-bold text-zinc-500 uppercase tracking-wider text-[10px]">{{ __('Avg. Transit Allowance') }}</h4>
                <p class="text-zinc-400">{{ __('Monthly public transport/commute subsidies provided by host employers.') }}</p>
            </div>
        </div>
    </div>

    <!-- Hybrid Compliance Checklist (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Hybrid Onboarding Guidelines') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs text-zinc-500 leading-relaxed">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">{{ __('1. Coordinate Office Schedule') }}</h3>
                <p>{{ __('Ensure your DSO or university advisor signs off on your hybrid schedule logs. Work-from-office days must be clearly outlined in your training agreements to remain CPT compliant.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">{{ __('2. Request Hardware Duplication') }}</h3>
                <p>{{ __('Many partner companies provide duplicate accessories (such as secondary chargers, power blocks, or laptops) to avoid students hauling heavy hardware back and forth.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">{{ __('3. Transit Reimbursements') }}</h3>
                <p>{{ __('Register your regional transit card (Caltrain, MTA Metrocard, ORCA) with the host company\'s expense portal. Commute expense logs can be submitted bi-weekly for reimbursement.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">{{ __('4. Asynchronous Tool Setup') }}</h3>
                <p>{{ __('Set up Slack, Linear, and Loom timezone alerts. Even on in-office days, teams utilize documented asynchronous systems to preserve work transparency.') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection


