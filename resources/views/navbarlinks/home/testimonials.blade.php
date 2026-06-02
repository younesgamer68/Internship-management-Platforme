@extends('layouts.public')

@section('title', 'Success Stories — Interlink')
@section('meta_description', 'Read about how students from MIT, CMU, and Berkeley secured core internship positions at Stripe, Figma, and Vercel using Interlink.')
@section('nav_testimonials', 'text-zinc-950 font-semibold bg-zinc-50 border-b-2 border-zinc-900')

@section('content')
<!-- Hero Header -->
<section class="bg-white border-b border-zinc-200 py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center rounded-full bg-zinc-100 px-3 py-1 text-xs font-semibold text-zinc-800 ring-1 ring-inset ring-zinc-500/10 mb-4">
            Alumni Stories
        </span>
        <h1 class="text-4xl font-extrabold tracking-tight text-zinc-900 sm:text-5xl max-w-2xl mx-auto leading-tight">
            Launchpads, not just summer jobs.
        </h1>
        <p class="mt-4 text-lg text-zinc-500 max-w-xl mx-auto">
            Meet the students and mentors who used Interlink to bypass the noise and ship production code at leading tech companies.
        </p>
    </div>
</section>

<!-- Editorial Case Studies Grid -->
<section class="py-16 sm:py-24 bg-zinc-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-24">
        
        <!-- Case Study 1 -->
        <article class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft grid grid-cols-1 lg:grid-cols-12">
            <!-- Profile / Meta Panel -->
            <div class="lg:col-span-4 bg-zinc-900 p-8 text-white flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="text-xs font-mono uppercase tracking-wider text-[#00B1AA]">Class of 2026 return offer</span>
                    <h3 class="text-2xl font-bold">Liam Bennett</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Computer Science &middot; Massachusetts Institute of Technology
                    </p>
                </div>
                
                <div class="border-t border-zinc-800 pt-6 mt-8 lg:mt-0 space-y-4">
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Placed Role</span>
                        <span class="text-sm font-medium text-white flex items-center gap-2 mt-1">
                            <span class="h-5 w-5 bg-[#635bff] text-white text-[10px] font-bold rounded flex items-center justify-center">S</span>
                            API Infrastructure Intern, Stripe
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Stipend</span>
                        <span class="text-sm font-semibold text-emerald-400 mt-1">$62.50 / hour</span>
                    </div>
                </div>
            </div>
            
            <!-- Written Case Narrative -->
            <div class="lg:col-span-8 p-8 sm:p-10 space-y-6">
                <blockquote class="text-xl font-medium text-zinc-800 leading-relaxed italic">
                    "Interlink matched my GitHub repository history directly to Stripe's Scala and Ruby stack. Instead of a standard resume filter, I was invited straight to a technical panel."
                </blockquote>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-zinc-100">
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Challenge</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Liam had built extensive local database engines, but recruiters from standard career portals kept filtering him out due to lack of prior corporate experience.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Project</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Collaborated with Stripe API Core to write automated verification checks on ledger sharding engines, leading to a 12% improvement in checkout pipeline validation.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Outcome</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Following the 12-week program, Liam received an official full-time Software Engineer offer for Stripe's payments infrastructure team in San Francisco.
                        </p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Case Study 2 -->
        <article class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft grid grid-cols-1 lg:grid-cols-12">
            <!-- Profile / Meta Panel -->
            <div class="lg:col-span-4 bg-zinc-900 p-8 text-white flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="text-xs font-mono uppercase tracking-wider text-[#00B1AA]">Design placement</span>
                    <h3 class="text-2xl font-bold">Emily Chen</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Communication Design &middot; Carnegie Mellon University
                    </p>
                </div>
                
                <div class="border-t border-zinc-800 pt-6 mt-8 lg:mt-0 space-y-4">
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Placed Role</span>
                        <span class="text-sm font-medium text-white flex items-center gap-2 mt-1">
                            <span class="h-5 w-5 bg-[#f24e1e] text-white text-[10px] font-bold rounded flex items-center justify-center">F</span>
                            Product Design Intern, Figma
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Stipend</span>
                        <span class="text-sm font-semibold text-emerald-400 mt-1">$48.00 / hour</span>
                    </div>
                </div>
            </div>
            
            <!-- Written Case Narrative -->
            <div class="lg:col-span-8 p-8 sm:p-10 space-y-6">
                <blockquote class="text-xl font-medium text-zinc-800 leading-relaxed italic">
                    "I wanted real product experience, not pushing shapes on marketing assets. Figma embedded me straight into the Editor Canvas team. I presented to the VP of Design in week 8."
                </blockquote>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-zinc-100">
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Challenge</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Traditional recruiter job feeds rarely highlighted pure interactive design roles, blending them with marketing design requirements.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Project</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Conducted 14 customer research loops and mocked UI prototypes for nested layout tools, which were rolled out to Figma\'s public beta in July.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Outcome</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Emily successfully graduated CMU and has now relocated to New York City to join Figma as a full-time Interaction Product Designer.
                        </p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Case Study 3 (Supabase) -->
        <article class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-4 bg-zinc-900 p-8 text-white flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="text-xs font-mono uppercase tracking-wider text-[#00B1AA]">Systems placements</span>
                    <h3 class="text-2xl font-bold">Marcus Vance</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Electrical Engineering & CS &middot; UC Berkeley
                    </p>
                </div>
                
                <div class="border-t border-zinc-800 pt-6 mt-8 lg:mt-0 space-y-4">
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Placed Role</span>
                        <span class="text-sm font-medium text-white flex items-center gap-2 mt-1">
                            <span class="h-5 w-5 bg-[#3ecf8e] text-white text-[10px] font-bold rounded flex items-center justify-center">S</span>
                            Database Infrastructure Intern, Supabase
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Stipend</span>
                        <span class="text-sm font-semibold text-emerald-400 mt-1">$50.00 / hour</span>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-8 p-8 sm:p-10 space-y-6">
                <blockquote class="text-xl font-medium text-zinc-800 leading-relaxed italic">
                    "I wanted to contribute to pure open-source rather than building internal enterprise tools. Supabase mapped my pull request history directly to their PgBouncer connection pooling team."
                </blockquote>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-zinc-100">
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Challenge</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Marcus had extensive databases knowledge but found traditional recruiters favored generalist candidates over database systems specialists.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Project</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Optimized Connection Pooler logging pipelines in Go, which resolved open GitHub issues and boosted backup verification speeds.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Outcome</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Marcus signed a full-time return agreement to join the Supabase cloud infrastructure division following his graduation in 2026.
                        </p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Case Study 4 (Resend) -->
        <article class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-4 bg-zinc-900 p-8 text-white flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="text-xs font-mono uppercase tracking-wider text-[#00B1AA]">DevRel Placement</span>
                    <h3 class="text-2xl font-bold">Sophia Martinez</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Technical Writing & CS &middot; Stanford University
                    </p>
                </div>
                
                <div class="border-t border-zinc-800 pt-6 mt-8 lg:mt-0 space-y-4">
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Placed Role</span>
                        <span class="text-sm font-medium text-white flex items-center gap-2 mt-1">
                            <span class="h-5 w-5 bg-zinc-800 text-white text-[10px] font-bold rounded flex items-center justify-center">R</span>
                            Developer Relations Intern, Resend
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500">Stipend</span>
                        <span class="text-sm font-semibold text-emerald-400 mt-1">$45.00 / hour</span>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-8 p-8 sm:p-10 space-y-6">
                <blockquote class="text-xl font-medium text-zinc-800 leading-relaxed italic">
                    "Interlink highlighted my engineering blog and UI templates. I was placed in the Resend developer education loop within 5 days of signing up."
                </blockquote>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-zinc-100">
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Challenge</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Sophia had a split portfolio in engineering and writing, which standard ATS parsers struggled to match to developer advocate positions.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Project</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Created 12 open-source React Email responsive layouts and maintained helper SDK wrapper libraries in Python and Node.js.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">The Outcome</h4>
                        <p class="text-xs text-zinc-600 mt-1.5 leading-relaxed">
                            Now works 20h/week during school term as junior DevRel specialist at Resend, transitioning to a full-time lead role upon graduation.
                        </p>
                    </div>
                </div>
            </div>
        </article>
        
        <!-- Recruiter Testimonials Carousel Grid -->
        <div class="space-y-6 pt-8 border-t border-zinc-200">
            <h3 class="text-lg font-bold text-zinc-900">What Hiring Teams Say</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft space-y-4">
                    <p class="text-zinc-600 text-sm leading-relaxed">
                        "The caliber of applicant tracking and verification on Interlink is unmatched. We saved over 40 hours of engineering review time this season because student project files and transcripts were already pre-audited by university boards."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-full bg-zinc-100 flex items-center justify-center font-bold text-xs">TR</div>
                        <div>
                            <span class="block text-xs font-bold text-zinc-950">Thomas Ruck</span>
                            <span class="block text-[10px] text-zinc-500 font-medium">Head of Tech Recruiting, Vercel</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft space-y-4">
                    <p class="text-zinc-600 text-sm leading-relaxed">
                        "Interlink replaces the manual chaos of university career boards. It aggregates student files, automates NDAs, and lets us issue legal offer sheets directly. It has become our primary channel for junior hiring."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-full bg-zinc-100 flex items-center justify-center font-bold text-xs">SK</div>
                        <div>
                            <span class="block text-xs font-bold text-zinc-950">Sarah Keates</span>
                            <span class="block text-[10px] text-zinc-500 font-medium">University Program Manager, Stripe</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft space-y-4">
                    <p class="text-zinc-600 text-sm leading-relaxed">
                        "Standard portals send us hundreds of candidates who copy-paste resumes. Interlink gives us students with pre-vetted transcript status and verified GitHub contributions, making technical screening highly predictable."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-full bg-zinc-100 flex items-center justify-center font-bold text-xs">LH</div>
                        <div>
                            <span class="block text-xs font-bold text-zinc-950">Lars Halvorsen</span>
                            <span class="block text-[10px] text-zinc-500 font-medium">Engineering Director, Supabase</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft space-y-4">
                    <p class="text-zinc-600 text-sm leading-relaxed">
                        "Being able to link directly to academic advisors and DSO boards for CPT sign-offs saved our legal team days of back-and-forth email templates. The international placement flow is incredibly smooth."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-full bg-zinc-100 flex items-center justify-center font-bold text-xs">JD</div>
                        <div>
                            <span class="block text-xs font-bold text-zinc-950">Jane Doe</span>
                            <span class="block text-[10px] text-zinc-500 font-medium">Global Mobility Lead, Figma</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Advisor Endorsements (New Section) -->
        <div class="space-y-6 pt-12 border-t border-zinc-200">
            <h3 class="text-lg font-bold text-zinc-900">Endorsed by University Advisors</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-xs">
                <!-- Quote 1 -->
                <div class="bg-white border border-zinc-200 rounded-lg p-4 shadow-soft">
                    <p class="text-zinc-500 italic">"Interlink keeps our CPT approval logs clean, standardized, and compliant with DSO parameters."</p>
                    <span class="block font-bold text-zinc-800 mt-3">Dr. Robert Chen</span>
                    <span class="block text-[10px] text-[#7B7B7B]">CS Advisor, Stanford University</span>
                </div>
                <!-- Quote 2 -->
                <div class="bg-white border border-zinc-200 rounded-lg p-4 shadow-soft">
                    <p class="text-zinc-500 italic">"Students receive pre-approved credits automatically, reducing advising administrative loads by 80%."</p>
                    <span class="block font-bold text-zinc-800 mt-3">Prof. Emily Ross</span>
                    <span class="block text-[10px] text-[#7B7B7B]">Undergrad Director, MIT</span>
                </div>
                <!-- Quote 3 -->
                <div class="bg-white border border-zinc-200 rounded-lg p-4 shadow-soft">
                    <p class="text-zinc-500 italic">"The verified transcript status adds instantaneous trust for hiring managers. An excellent career bridge."</p>
                    <span class="block font-bold text-zinc-800 mt-3">Sarah Sterling</span>
                    <span class="block text-[10px] text-[#7B7B7B]">Career Director, UC Berkeley</span>
                </div>
                <!-- Quote 4 -->
                <div class="bg-white border border-zinc-200 rounded-lg p-4 shadow-soft">
                    <p class="text-zinc-500 italic">"We finally have real-time visibility into student placements, return offers, and hourly stipends."</p>
                    <span class="block font-bold text-zinc-800 mt-3">Jonathan Blake</span>
                    <span class="block text-[10px] text-[#7B7B7B]">Academic Coordinator, CMU</span>
                </div>
            </div>
        </div>

        <!-- Student Placement Video Gallery (New Section) -->
        <div class="space-y-6 pt-12 border-t border-zinc-200">
            <h3 class="text-lg font-bold text-zinc-900">Student Placement Vlogs</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Vlog 1 -->
                <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft flex flex-col justify-between">
                    <div class="aspect-video bg-zinc-900 flex items-center justify-center text-white relative">
                        <i class="fa-regular fa-circle-play text-4xl opacity-80 hover:opacity-100 cursor-pointer"></i>
                        <span class="absolute bottom-2 right-2 bg-black/60 px-1.5 py-0.5 rounded text-[10px] font-mono">4:12</span>
                    </div>
                    <div class="p-4 space-y-1">
                        <h4 class="font-bold text-zinc-950 text-sm">My First Week Interning at Stripe</h4>
                        <p class="text-xs text-zinc-500">Liam Bennett shares his onboarding and first system design code push.</p>
                    </div>
                </div>
                <!-- Vlog 2 -->
                <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft flex flex-col justify-between">
                    <div class="aspect-video bg-zinc-900 flex items-center justify-center text-white relative">
                        <i class="fa-regular fa-circle-play text-4xl opacity-80 hover:opacity-100 cursor-pointer"></i>
                        <span class="absolute bottom-2 right-2 bg-black/60 px-1.5 py-0.5 rounded text-[10px] font-mono">6:45</span>
                    </div>
                    <div class="p-4 space-y-1">
                        <h4 class="font-bold text-zinc-950 text-sm">How I Matched at Figma as a Designer</h4>
                        <p class="text-xs text-zinc-500">Emily Chen reviews her portfolio layout, case studies, and matching tips.</p>
                    </div>
                </div>
                <!-- Vlog 3 -->
                <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft flex flex-col justify-between">
                    <div class="aspect-video bg-zinc-900 flex items-center justify-center text-white relative">
                        <i class="fa-regular fa-circle-play text-4xl opacity-80 hover:opacity-100 cursor-pointer"></i>
                        <span class="absolute bottom-2 right-2 bg-black/60 px-1.5 py-0.5 rounded text-[10px] font-mono">5:30</span>
                    </div>
                    <div class="p-4 space-y-1">
                        <h4 class="font-bold text-zinc-950 text-sm">Open Source Contributions to Placements</h4>
                        <p class="text-xs text-zinc-500">Marcus Vance talks GitHub parser integration and landing a database role.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

