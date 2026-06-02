@extends('layouts.public')

@section('title', 'Remote Internships — Interlink')
@section('meta_description', 'Find and apply to fully remote technical internships. Vetted compensation, flexible hours, and home-office equipment allowances.')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    
    <!-- Hero / Intro -->
    <div class="bg-zinc-900 rounded-xl p-8 text-white relative overflow-hidden mb-10 shadow-soft-lg">
        <div class="max-w-xl space-y-4">
            <span class="inline-flex items-center rounded-full bg-[#00B1AA]/50/10 px-3 py-1 text-xs font-semibold text-indigo-300 ring-1 ring-inset ring-indigo-400/20">
                100% Distributed Positions
            </span>
            <h1 class="text-3xl font-extrabold sm:text-4xl">Work from anywhere.</h1>
            <p class="text-sm text-zinc-300 leading-relaxed">
                Connect with global engineering teams without relocating. Interlink ensures all remote internships include verified asynchronous communication loops and home office setups.
            </p>
        </div>
    </div>

    <!-- Info banners for Remote Work features -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 text-sm">
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-laptop-code"></i></span>
            <h3 class="font-bold text-zinc-900">Equipment Allowance</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">All approved remote employers provide up to $1,500 for computer and home-office setups.</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-clock-rotate-left"></i></span>
            <h3 class="font-bold text-zinc-900">Asynchronous Vetted</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">No calendar fatigue. Employers on this list commit to documented async review pipelines.</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
            <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-globe"></i></span>
            <h3 class="font-bold text-zinc-900">Timezone Agnostic</h3>
            <p class="text-xs text-zinc-500 leading-relaxed">Filter positions by required core overlap hours (e.g., Eastern or Pacific Standard timezones).</p>
        </div>
    </div>

    <!-- Active Remote Listings -->
    <div class="space-y-6">
        <h2 class="text-lg font-bold text-zinc-900">Active Remote Positions</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-black text-white font-bold rounded-lg flex items-center justify-center">V</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">Frontend Developer Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Vercel &middot; Core Frameworks</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">EST overlap</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Work on Next.js performance auditing. Setup includes Macbook Pro, monitor, and keyboard allowance.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$55.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#3ecf8e] text-white font-bold rounded-lg flex items-center justify-center">S</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">Database Orchestration Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Supabase &middot; Infrastructure</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">Any timezone</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Contribute to PostgreSQL database clustering tooling and connection pooler benchmarks.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$50.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-zinc-900 text-white rounded-lg flex items-center justify-center font-bold">L</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">Product Management Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Linear &middot; Roadmap Operations</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">PST / CET overlap</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Assist in detailing specifications for software task automations and bug integrations.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$45.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>

            <!-- Card 4 (Resend) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-zinc-800 text-white rounded-lg flex items-center justify-center font-bold">R</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">Developer Relations Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Resend &middot; Community SDKs</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">Any timezone</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Build open-source email template component examples and help maintain Node.js SDK libraries.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$45.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>

            <!-- Card 5 (Pinecone) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#2b1b54] text-white rounded-lg flex items-center justify-center font-bold">P</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">ML Research Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Pinecone &middot; AI Indexing Core</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">PST overlap</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Research similarity search indexing algorithms under strict memory constraints. Requires Python and C++.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$65.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>

            <!-- Card 6 (Railway) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-black text-white rounded-lg flex items-center justify-center font-bold">R</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">Infrastructure & SRE Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Railway &middot; Platform Core</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">EST overlap</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Work on container scaling, network load balancing, and Kubernetes configurations.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$50.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>

            <!-- Card 7 (Clerk) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#2563eb] text-white rounded-lg flex items-center justify-center font-bold">C</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">Auth Systems Developer Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Clerk &middot; Frontend Auth</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">Any timezone</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Develop and profile SDK integrations for Next.js and Remix auth modules. Focused on TypeScript.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$48.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>

            <!-- Card 8 (Prisma) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft hover:border-zinc-300 transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <span class="h-10 w-10 bg-[#0c344b] text-white rounded-lg flex items-center justify-center font-bold">P</span>
                            <div>
                                <h3 class="font-bold text-sm text-zinc-900">Database Engine Intern</h3>
                                <p class="text-xs text-zinc-500 font-semibold">Prisma &middot; Rust Query Core</p>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-400 font-mono">PST / EST overlap</span>
                    </div>
                    <p class="text-xs text-zinc-500 leading-relaxed">Help optimize Rust query generation scripts for PostgreSQL, MySQL, and MongoDB.</p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                    <span class="font-semibold text-emerald-600">$49.00 / hour</span>
                    <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">Quick Apply &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Distributed Teams Satisfaction Stats (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">Highly Rated Distributed Teams</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-3">
                <div class="flex items-center gap-2">
                    <span class="h-8 w-8 bg-black text-white font-bold rounded flex items-center justify-center">V</span>
                    <h3 class="font-bold text-zinc-900">Vercel</h3>
                </div>
                <div class="flex gap-1 text-yellow-500"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                <p class="text-zinc-500 leading-relaxed">"Vercel operates as a pure async first organization. The internal handbook is exceptional, and team communication is pre-vetted."</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-3">
                <div class="flex items-center gap-2">
                    <span class="h-8 w-8 bg-[#3ecf8e] text-white font-bold rounded flex items-center justify-center">S</span>
                    <h3 class="font-bold text-zinc-900">Supabase</h3>
                </div>
                <div class="flex gap-1 text-yellow-500"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i></div>
                <p class="text-zinc-500 leading-relaxed">"As open-source maintainers, almost all planning happens publicly on GitHub. Very direct mentoring loops with core developers."</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-3">
                <div class="flex items-center gap-2">
                    <span class="h-8 w-8 bg-zinc-900 text-white rounded flex items-center justify-center font-bold">L</span>
                    <h3 class="font-bold text-zinc-900">Linear</h3>
                </div>
                <div class="flex gap-1 text-yellow-500"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                <p class="text-zinc-500 leading-relaxed">"Incredibly structured sprints and task management. If you love clean, organized project lifecycles, Linear is the absolute peak."</p>
            </div>
        </div>
    </div>

    <!-- Remote Work FAQ (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">Remote Internship FAQs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs text-zinc-500 leading-relaxed">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">How is the equipment stipend processed?</h3>
                <p>Once you sign your placement contract, the employer creates an equipment allocation loop. You receive a company-managed laptop (typically Apple or Dell) or a $1,500 reimbursement allowance for pre-approved items (monitor, desk, keyboard).</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">What about tax compliance for remote work?</h3>
                <p>Interlink automatically audits regional labor and tax rules based on your residency address. If you are placed with a company operating in another state, our onboarding wizard coordinates tax forms (W-4 or state counterparts) dynamically.</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">Can international students work remotely under CPT?</h3>
                <p>Yes. However, US visa rules require your host employer to be enrolled in E-Verify, and the internship course code syllabus must specify remote work. Interlink automatically filters non-eligible roles for international students.</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <h3 class="font-bold text-zinc-900">How do weekly advisor check-ins work?</h3>
                <p>Every Friday, our platform sends a 2-minute check-in form to your host manager via email. They mark milestones achieved, confirming your hours directly to Interlink. This feed updates your university advisor portal automatically.</p>
            </div>
        </div>
    </div>

</div>
@endsection


