@extends('layouts.public')

@section('title', 'Become a Corporate Partner — Interlink')
@section('meta_description', 'Partner with Interlink to access verified student candidates, automate credit mapping, and streamline university internship compliance.')

@section('content')
<div x-data="{
    numInterns: 5,
    selectedPlan: 'pro',
    formSubmitted: false,
    calcMatches() {
        return Math.round(this.numInterns * 12.5);
    },
    calcEstTime() {
        return this.numInterns > 10 ? '7-10 days' : '3-5 days';
    }
}" class="space-y-16 py-8">

    <!-- Hero -->
    <section class="bg-white border-b border-zinc-200 pb-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center rounded-full bg-[#00B1AA]/5 px-3 py-1 text-xs font-semibold text-[#00B1AA] ring-1 ring-inset ring-[#00B1AA]/10">
                B2B Onboarding
            </span>
            <h1 class="text-4xl font-extrabold tracking-tight text-[#444444] sm:text-5xl md:text-6xl max-w-3xl mx-auto leading-tight">
                Vetted junior talent, automated compliance.
            </h1>
            <p class="text-base text-[#7B7B7B] max-w-2xl mx-auto leading-relaxed">
                Interlink connects your engineering and design loops directly with verified department programs at leading universities. Access pre-audited GPA records and GitHub stack histories.
            </p>
        </div>
    </section>

    <!-- Key Statistics & Impact Dashboard -->
    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft text-center space-y-1">
                <span class="text-xs text-[#7B7B7B] font-bold uppercase block">Partner Network</span>
                <p class="text-3xl font-extrabold text-[#444444]">120+ Startups</p>
                <p class="text-[10px] text-[#7B7B7B]">Including Stripe, Vercel, Supabase</p>
            </div>
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft text-center space-y-1">
                <span class="text-xs text-[#7B7B7B] font-bold uppercase block">Compliance Speed</span>
                <p class="text-3xl font-extrabold text-[#00B1AA]">24 Hour CPT</p>
                <p class="text-[10px] text-[#7B7B7B]">Automated legal course alignment</p>
            </div>
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft text-center space-y-1">
                <span class="text-xs text-[#7B7B7B] font-bold uppercase block">Conversion Rate</span>
                <p class="text-3xl font-extrabold text-[#444444]">89.4%</p>
                <p class="text-[10px] text-[#7B7B7B]">Intern-to-Fulltime conversion</p>
            </div>
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft text-center space-y-1">
                <span class="text-xs text-[#7B7B7B] font-bold uppercase block">Verification Accuracy</span>
                <p class="text-3xl font-extrabold text-emerald-600">100%</p>
                <p class="text-[10px] text-[#7B7B7B]">No fraudulent transcripts or profiles</p>
            </div>
        </div>
    </section>

    <!-- Detailed Value Propositions -->
    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center max-w-xl mx-auto">
            <h2 class="text-2xl font-bold text-[#444444]">Why Top Startups Hire Via Interlink</h2>
            <p class="text-xs text-[#7B7B7B] mt-1">We bypass traditional academic red tape and manual application screening loops.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs text-[#7B7B7B]">
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft space-y-3">
                <span class="text-[#00B1AA] text-2xl"><i class="fa-solid fa-code-fork"></i></span>
                <h3 class="font-bold text-[#444444] text-sm">Verified GitHub & Skills Analysis</h3>
                <p class="leading-relaxed">Forget parsing bloated resumes. Interlink integrates directly with candidate GitHub repositories, measuring active commit volumes, pull requests, and language familiarity stats dynamically.</p>
            </div>
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft space-y-3">
                <span class="text-[#00B1AA] text-2xl"><i class="fa-solid fa-graduation-cap"></i></span>
                <h3 class="font-bold text-[#444444] text-sm">Direct Registrar Integrations</h3>
                <p class="leading-relaxed">All candidates connect their official university single-sign-on credentials. Grades, enrolled courses, and enrollment eligibility are auto-imported and legally signed by our academic partners.</p>
            </div>
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft space-y-3">
                <span class="text-[#00B1AA] text-2xl"><i class="fa-solid fa-building-shield"></i></span>
                <h3 class="font-bold text-[#444444] text-sm">Zero-friction Compliance & Visas</h3>
                <p class="leading-relaxed">Interlink automatically generates CPT/OPT training agreements, standard non-disclosure templates, and internship syllabus mappings, which are auto-approved by university registrars.</p>
            </div>
        </div>
    </section>

    <!-- Onboarding Process Steps -->
    <section class="py-12 bg-[#F8FAFA] border-y border-zinc-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto text-center mb-12">
                <h2 class="text-2xl font-bold text-[#444444]">Partner Setup Sequence</h2>
                <p class="text-xs text-[#7B7B7B] mt-1 font-medium">Get verified and hire target students in 4 simple steps.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-sm">
                <div class="bg-white border border-zinc-200 rounded p-5 shadow-soft space-y-2">
                    <span class="text-xs font-bold text-[#00B1AA] font-mono">STEP 01</span>
                    <h3 class="font-bold text-[#444444]">Entity Audit</h3>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed">Verify corporate tax records (EIN/W-9) and confirm general business general liability guidelines.</p>
                </div>
                <div class="bg-white border border-zinc-200 rounded p-5 shadow-soft space-y-2">
                    <span class="text-xs font-bold text-[#00B1AA] font-mono">STEP 02</span>
                    <h3 class="font-bold text-[#444444]">Mentor Sync</h3>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed">Assign senior host team developers to complete brief monthly evaluations for student credit hours.</p>
                </div>
                <div class="bg-white border border-zinc-200 rounded p-5 shadow-soft space-y-2">
                    <span class="text-xs font-bold text-[#00B1AA] font-mono">STEP 03</span>
                    <h3 class="font-bold text-[#444444]">Department Alignment</h3>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed">Map roles to target university department syllabus constraints to guarantee course credit allocations.</p>
                </div>
                <div class="bg-white border border-zinc-200 rounded p-5 shadow-soft space-y-2">
                    <span class="text-xs font-bold text-[#00B1AA] font-mono">STEP 04</span>
                    <h3 class="font-bold text-[#444444]">Launch Postings</h3>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed">Publish listings and instantly receive stack-verified match candidates straight to your inbox.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Tiers & Calculator Section -->
    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center max-w-xl mx-auto">
            <h2 class="text-2xl font-bold text-[#444444]">Transparent Partnership Plans</h2>
            <p class="text-xs text-[#7B7B7B] mt-1">Choose the workspace model that fits your recruiting frequency.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft flex flex-col justify-between" :class="selectedPlan === 'basic' && 'ring-2 ring-[#00B1AA]'">
                <div class="space-y-4">
                    <div>
                        <span class="text-xs font-bold text-[#7B7B7B] uppercase tracking-wider">Academic Entry</span>
                        <h3 class="text-lg font-bold text-[#444444] mt-1">Standard Board</h3>
                    </div>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed">Best for startups looking to list basic internship roles and handle verification manually.</p>
                    <div class="text-2xl font-black text-[#444444]">$0 <span class="text-xs font-normal text-[#7B7B7B]">/ forever</span></div>
                    <ul class="text-xs text-[#7B7B7B] space-y-2.5 pt-4 border-t border-zinc-100">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> 3 active postings</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Manual application routing</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Standard school dashboards</li>
                        <li class="flex items-center gap-2 text-zinc-300"><i class="fa-solid fa-xmark"></i> Direct registrar compliance</li>
                        <li class="flex items-center gap-2 text-zinc-300"><i class="fa-solid fa-xmark"></i> GitHub verification audits</li>
                    </ul>
                </div>
                <button @click="selectedPlan = 'basic'" class="w-full text-center py-2.5 mt-8 font-bold text-xs rounded border border-[#E5E7EB] hover:bg-zinc-50 transition-colors" x-text="selectedPlan === 'basic' ? 'Selected' : 'Choose Plan'"></button>
            </div>

            <!-- Pro Plan (Recommended) -->
            <div class="bg-white border-2 border-[#00B1AA] rounded-xl p-6 shadow-soft flex flex-col justify-between relative" :class="selectedPlan === 'pro' && 'ring-2 ring-[#00B1AA]'">
                <span class="absolute top-0 right-6 transform -translate-y-1/2 bg-[#00B1AA] text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">Recommended</span>
                <div class="space-y-4">
                    <div>
                        <span class="text-xs font-bold text-[#00B1AA] uppercase tracking-wider">Fast-growth Startups</span>
                        <h3 class="text-lg font-bold text-[#444444] mt-1">Growth Matching</h3>
                    </div>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed">Best for active teams seeking pre-vetted candidates and hands-free visa/CPT legal mappings.</p>
                    <div class="text-2xl font-black text-[#444444]">$199 <span class="text-xs font-normal text-[#7B7B7B]">/ month</span></div>
                    <ul class="text-xs text-[#7B7B7B] space-y-2.5 pt-4 border-t border-zinc-100">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Unlimited active postings</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Direct GitHub stack verification</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Automated CPT university mappings</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Direct message channels with leads</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Tracker application sync integrations</li>
                    </ul>
                </div>
                <button @click="selectedPlan = 'pro'" class="w-full text-center py-2.5 mt-8 font-bold text-xs rounded bg-[#00B1AA] hover:bg-[#009c95] text-white transition-colors shadow-soft" x-text="selectedPlan === 'pro' ? 'Selected' : 'Choose Plan'"></button>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft flex flex-col justify-between" :class="selectedPlan === 'enterprise' && 'ring-2 ring-[#00B1AA]'">
                <div class="space-y-4">
                    <div>
                        <span class="text-xs font-bold text-[#7B7B7B] uppercase tracking-wider">Enterprise Scale</span>
                        <h3 class="text-lg font-bold text-[#444444] mt-1">University Console</h3>
                    </div>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed">Custom recruiting structures, private career pipelines, and direct academic sponsorships.</p>
                    <div class="text-2xl font-black text-[#444444]">Custom <span class="text-xs font-normal text-[#7B7B7B]">/ annual contract</span></div>
                    <ul class="text-xs text-[#7B7B7B] space-y-2.5 pt-4 border-t border-zinc-100">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Dedicated academic relations advisor</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Direct classroom sponsorship links</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Custom sandbox security evaluations</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Multi-seat recruiter tracking desks</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#00B1AA]"></i> Full platform API custom endpoints</li>
                    </ul>
                </div>
                <button @click="selectedPlan = 'enterprise'" class="w-full text-center py-2.5 mt-8 font-bold text-xs rounded border border-[#E5E7EB] hover:bg-zinc-50 transition-colors" x-text="selectedPlan === 'enterprise' ? 'Selected' : 'Choose Plan'"></button>
            </div>
        </div>

        <!-- Interactive Calculator Widget -->
        <div class="bg-[#F8FAFA] border border-[#E5E7EB] rounded p-6 max-w-xl mx-auto space-y-4 text-xs">
            <h4 class="font-bold text-[#444444] text-sm text-center">Interactive Match Yield Calculator</h4>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-[#7B7B7B] font-medium">Desired Intern Hires:</span>
                    <span class="font-bold text-[#00B1AA]" x-text="numInterns"></span>
                </div>
                <input type="range" x-model="numInterns" min="1" max="25" class="w-full h-1.5 bg-zinc-200 rounded-lg appearance-none cursor-pointer accent-[#00B1AA]">
                <div class="border-t border-zinc-200 pt-3 grid grid-cols-2 gap-4 text-center">
                    <div>
                        <span class="text-[#7B7B7B] block">Pre-Vetted Candidate Matches:</span>
                        <strong class="text-sm text-[#444444]" x-text="calcMatches()"></strong>
                    </div>
                    <div>
                        <span class="text-[#7B7B7B] block">Est. Placement Loop Duration:</span>
                        <strong class="text-sm text-[#444444]" x-text="calcEstTime()"></strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft">
            <h3 class="text-sm font-bold text-[#444444] mb-6 text-center uppercase tracking-wider">Partner Success Stories</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B]">
                <div class="space-y-3">
                    <div class="flex gap-1 text-amber-400"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    <p class="leading-relaxed font-medium">"Interlink has shaved off weeks from our engineering hiring cycles. Being able to review candidate GitHub metrics and university-authenticated course completions in one layout is incredibly high-leverage. Highly recommended."</p>
                    <div>
                        <strong class="text-[#444444] block">Alexius K.</strong>
                        <span class="text-[10px]">Head of Engineering, Vercel</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex gap-1 text-amber-400"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    <p class="leading-relaxed font-medium">"Setting up CPT agreements for international interns used to involve multiple registrar loops and legal audits. With Interlink, the agreements are auto-assembled and approved in under 24 hours. A game-changer."</p>
                    <div>
                        <strong class="text-[#444444] block">Miranda Cole</strong>
                        <span class="text-[10px]">VP of People, Supabase</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-[#444444]">Register Your Organization</h2>
                <p class="text-xs text-[#7B7B7B] mt-1">Submit details to schedule your program mapping assessment.</p>
            </div>

            <div x-show="formSubmitted" class="p-4 bg-emerald-50 border border-emerald-100 rounded text-emerald-800 text-xs space-y-1">
                <h4 class="font-bold">Inquiry Submitted Successfully!</h4>
                <p>We've logged your organization details and routed your inquiry to our academic mapping desks. A university program coordinator will contact you at your listed corporate email within 24 hours.</p>
            </div>

            <form x-show="!formSubmitted" @submit.prevent="formSubmitted = true" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Company Legal Name</label>
                        <input type="text" required placeholder="e.g. Stripe Technologies" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Website URL</label>
                        <input type="url" required placeholder="https://" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Contact Email</label>
                        <input type="email" required placeholder="name@company.com" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Selected Plan Tier</label>
                        <select x-model="selectedPlan" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                            <option value="basic">Standard Board ($0)</option>
                            <option value="pro">Growth Matching ($199/mo)</option>
                            <option value="enterprise">University Console (Custom)</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Target University Programs</label>
                    <select class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                        <option>Computer Science (Engineering)</option>
                        <option>Product Design (UX/UI)</option>
                        <option>Product Management & Operations</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Partnership Context & Notes</label>
                    <textarea rows="3" placeholder="Tell us about your target engineering stacks or specific university locations..." class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors resize-none"></textarea>
                </div>
                <button type="submit" class="w-full rounded bg-[#00B1AA] hover:bg-[#009c95] text-white font-bold text-xs py-2.5 transition-colors shadow-soft">
                    Submit Partnership Inquiry
                </button>
            </form>
        </div>
    </section>

</div>
@endsection

