@extends('layouts.public')

@section('title', 'Premium Paid Internships — Interlink')
@section('meta_description', 'Browse top-tier paid technical internships. Filter and view roles with premium hourly stipends ranging from $45 to $80 per hour.')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5 mb-8">
        <h1 class="text-3xl font-bold leading-7 text-zinc-900 sm:truncate sm:text-4xl">{{ __('Premium Paid Internships') }}</h1>
        <p class="mt-2 text-sm text-zinc-500 font-medium">{{ __('Interlink hosts only paid roles. Below are our highest-paying placements across software engineering, systems infrastructure, and UX design.') }}</p>
    </div>

    <!-- Compensation Statistics Section -->
    <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft mb-10">
        <h3 class="font-bold text-zinc-900 text-sm mb-4">{{ __('Average Hourly Stipend by Field (Summer 2026)') }}</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
            <div class="border-r border-zinc-100 pr-4">
                <span class="text-xs text-zinc-400 font-semibold uppercase">{{ __('Systems & Infra') }}</span>
                <p class="text-2xl font-bold text-zinc-900 mt-1">{{ __('$62.50 / hr') }}</p>
                <span class="text-[10px] text-zinc-400 font-medium block mt-1">{{ __('Typical roles: Core DB, API gateway, compiler design.') }}</span>
            </div>
            <div class="border-r border-zinc-100 pr-4">
                <span class="text-xs text-zinc-400 font-semibold uppercase">{{ __('Frontend & App Core') }}</span>
                <p class="text-2xl font-bold text-zinc-900 mt-1">{{ __('$55.00 / hr') }}</p>
                <span class="text-[10px] text-zinc-400 font-medium block mt-1">{{ __('Typical roles: React development, UI libraries, canvas work.') }}</span>
            </div>
            <div>
                <span class="text-xs text-zinc-400 font-semibold uppercase">{{ __('Product Design') }}</span>
                <p class="text-2xl font-bold text-zinc-900 mt-1">{{ __('$48.00 / hr') }}</p>
                <span class="text-[10px] text-zinc-400 font-medium block mt-1">{{ __('Typical roles: Interaction mockups, user research labs.') }}</span>
            </div>
        </div>
    </div>

    <!-- Paid Listings Grid -->
    <div class="space-y-6">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Highest Compensated Active Listings') }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- stripe -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <span class="h-10 w-10 bg-[#635bff] text-white font-bold rounded-lg flex items-center justify-center">{{ __('S') }}</span>
                        <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded font-bold">{{ __('$62.50 / hr') }}</span>
                    </div>
                    <h3 class="font-bold text-base text-zinc-900 mt-4">{{ __('Backend Systems Intern (API Core)') }}</h3>
                    <p class="text-xs text-zinc-500 font-semibold mt-1">{{ __('Stripe &middot; San Francisco (Hybrid)') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="text-zinc-400 font-medium">{{ __('12-week contract') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Quick Apply &rarr;') }}</a>
                </div>
            </div>

            <!-- vercel -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <span class="h-10 w-10 bg-black text-white font-bold rounded-lg flex items-center justify-center">{{ __('V') }}</span>
                        <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded font-bold">{{ __('$55.00 / hr') }}</span>
                    </div>
                    <h3 class="font-bold text-base text-zinc-900 mt-4">{{ __('Frontend Developer Intern') }}</h3>
                    <p class="text-xs text-zinc-500 font-semibold mt-1">{{ __('Vercel &middot; Next.js Core (Remote)') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="text-zinc-400 font-medium">{{ __('6-month contract') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Quick Apply &rarr;') }}</a>
                </div>
            </div>

            <!-- pinecone -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <span class="h-10 w-10 bg-[#2b1b54] text-white font-bold rounded-lg flex items-center justify-center">{{ __('P') }}</span>
                        <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded font-bold">{{ __('$65.00 / hr') }}</span>
                    </div>
                    <h3 class="font-bold text-base text-zinc-900 mt-4">{{ __('ML Research Intern') }}</h3>
                    <p class="text-xs text-zinc-500 font-semibold mt-1">{{ __('Pinecone &middot; Vector Database Core (Remote)') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="text-zinc-400 font-medium">{{ __('6-month contract') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Quick Apply &rarr;') }}</a>
                </div>
            </div>

            <!-- retool -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <span class="h-10 w-10 bg-[#2563EB] text-white font-bold rounded-lg flex items-center justify-center">{{ __('R') }}</span>
                        <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded font-bold">{{ __('$58.00 / hr') }}</span>
                    </div>
                    <h3 class="font-bold text-base text-zinc-900 mt-4">{{ __('Full-Stack Engineer Intern') }}</h3>
                    <p class="text-xs text-zinc-500 font-semibold mt-1">{{ __('Retool &middot; Core Component Studio (SF)') }}</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="text-zinc-400 font-medium">{{ __('6-month contract') }}</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Quick Apply &rarr;') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stipend Escrow & Protections (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Stipend Security & Escrow Guarantee') }}</h2>
        <p class="text-xs text-zinc-500 max-w-2xl leading-relaxed">{{ __('Interlink protects student placement agreements through an integrated stipend escrow bank vault. Host companies are required to fund the entire 12-week or 6-month stipend budget prior to contract start dates, guaranteeing immediate payouts.') }}</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-vault"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Pre-Funded Contracts') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Stipend reserves are deposited securely in escrow. This eliminates typical payment failures, late payroll issues, or corporate liquidity disputes.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-credit-card"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Bi-Weekly Releases') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Payments are auto-calculated on logged hours and sent directly to student US bank accounts every other Friday. No manual invoicing is needed.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('W-2 Compliance Routing') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Interlink automates tax payroll calculations. Federal W-4 allocations and tax filings are calculated dynamically to avoid post-internship tax audits.') }}</p>
            </div>
        </div>
    </div>

    <!-- Student Stipend Analytics (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Paid Placements ROI Analytics') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center text-xs">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="block text-2xl font-bold text-zinc-900">$26,400</span>
                <h4 class="font-bold text-zinc-500 uppercase tracking-wider text-[10px]">{{ __('Avg. Summer Compensation') }}</h4>
                <p class="text-zinc-400">{{ __('Total gross earnings during a standard 12-week developer internship block.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="block text-2xl font-bold text-zinc-900">$5,000</span>
                <h4 class="font-bold text-zinc-500 uppercase tracking-wider text-[10px]">{{ __('Avg. Housing Allowance') }}</h4>
                <p class="text-zinc-400">{{ __('Relocation support provided to students placed outside their university states.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="block text-2xl font-bold text-zinc-900">100%</span>
                <h4 class="font-bold text-zinc-500 uppercase tracking-wider text-[10px]">{{ __('Compensation Guarantee') }}</h4>
                <p class="text-zinc-400">{{ __('Every single position posted on the Interlink match board is paid hourly.') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection



