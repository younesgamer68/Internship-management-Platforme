@extends('layouts.public')

@section('title', 'How It Works for Universities — Interlink')
@section('meta_description', 'Learn how university departments audit, monitor, and approve internship credits using Interlink. Read about FERPA compliance and registrar integrations.')

@section('content')
<div x-data="{
    selectedDept: 'CS',
    selectedCourse: 'CS-197',
    canvasLinked: false,
    formSubmitted: false,
    deptStats: {
        'CS': { course: 'CS-197: Senior Design Project', approvedPartners: '94 Companies', reqHours: '320 hours (12 Weeks)', evalFrequency: 'Bi-weekly logs' },
        'DSN': { course: 'UXD-300: UX Portfolio Placement', approvedPartners: '48 Companies', reqHours: '240 hours (10 Weeks)', evalFrequency: 'Midterm & Final' },
        'PM': { course: 'PM-202: Product Lifecycle Practice', approvedPartners: '32 Companies', reqHours: '300 hours (12 Weeks)', evalFrequency: 'Monthly logs' }
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <span class="text-xs bg-[#00B1AA]/5 text-[#00B1AA] font-bold uppercase px-3 py-1 rounded-full">For Universities</span>
        <h1 class="text-3xl font-extrabold tracking-tight text-[#444444] sm:text-4xl">Simplify credit compliance & student tracking</h1>
        <p class="text-sm text-[#7B7B7B] leading-relaxed">
            Interlink helps academic advisors and career services track student cohort placements, sign legal CPT structures, and audit employer evaluations in one dashboard.
        </p>
    </div>

    <!-- Onboarding Process Steps -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Step 1 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">01</div>
                <h3 class="text-base font-bold text-[#444444]">Secure Registrar Integrations</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    Link Interlink with your student record system (e.g. Banner, PeopleSoft, or Workday). This lets students verify their GPA and degree track in seconds, without sharing complete transcripts.
                </p>
            </div>
            <div class="bg-emerald-50 text-emerald-800 border border-emerald-100 rounded p-3 text-[10px] font-semibold">
                <i class="fa-solid fa-lock mr-1"></i> FERPA Compliant. Data is encrypted and shared only by student consent.
            </div>
        </div>

        <!-- Step 2 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">02</div>
                <h3 class="text-base font-bold text-[#444444]">Syllabus Blueprints</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    Input your course credit criteria (required engineering stack, project deliverables, and minimum hours). Interlink will automatically audit incoming employer postings to ensure they meet your department guidelines.
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-file-invoice text-[#00B1AA]"></i>
                <span>Map placement details to syllabus guidelines automatically.</span>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">03</div>
                <h3 class="text-base font-bold text-[#444444]">Audit Status Dashboard</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    View active student pipelines, pending employer evaluation forms, and signed offer agreements. Advisors approve course credits directly inside Interlink, eliminating manual paper loops.
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-gauge-high text-[#00B1AA]"></i>
                <span>Aggregate advisor dashboard for student cohorts.</span>
            </div>
        </div>

    </div>

    <!-- Interactive Course Syllabus Mapper Widget -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft max-w-xl mx-auto space-y-5">
        <div class="text-center">
            <h3 class="font-bold text-sm text-[#444444]">Interactive Course Blueprint Simulator</h3>
            <p class="text-xs text-[#7B7B7B] mt-0.5">Select a department program to see mapped registration rules and requirements.</p>
        </div>
        <div class="space-y-4 text-xs">
            <div class="flex justify-center gap-2">
                <button @click="selectedDept = 'CS'" :class="selectedDept === 'CS' ? 'bg-[#00B1AA] text-white' : 'bg-[#F8FAFA] text-zinc-600'" class="px-4 py-2 font-bold rounded transition-colors">Computer Science</button>
                <button @click="selectedDept = 'DSN'" :class="selectedDept === 'DSN' ? 'bg-[#00B1AA] text-white' : 'bg-[#F8FAFA] text-zinc-600'" class="px-4 py-2 font-bold rounded transition-colors">Product Design</button>
                <button @click="selectedDept = 'PM'" :class="selectedDept === 'PM' ? 'bg-[#00B1AA] text-white' : 'bg-[#F8FAFA] text-zinc-600'" class="px-4 py-2 font-bold rounded transition-colors">Product Management</button>
            </div>
            <div class="border-t border-zinc-100 pt-4 space-y-2 text-[#7B7B7B]">
                <div class="flex justify-between">
                    <span>Target Academic Course:</span>
                    <strong class="text-[#444444]" x-text="deptStats[selectedDept].course"></strong>
                </div>
                <div class="flex justify-between">
                    <span>Approved Corporate Partners:</span>
                    <strong class="text-[#444444]" x-text="deptStats[selectedDept].approvedPartners"></strong>
                </div>
                <div class="flex justify-between">
                    <span>Required Placement Hours:</span>
                    <strong class="text-[#444444]" x-text="deptStats[selectedDept].reqHours"></strong>
                </div>
                <div class="flex justify-between">
                    <span>Evaluation Frequency:</span>
                    <strong class="text-[#444444]" x-text="deptStats[selectedDept].evalFrequency"></strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Integrations & LMS compliance details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <!-- LMS Integration Details -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
            <h3 class="font-bold text-sm text-[#444444]">LMS & Canvas Sync</h3>
            <p class="text-xs text-[#7B7B7B] leading-relaxed">
                Connect placement milestones directly to your institution's Learning Management System (LMS). Track grade book submissions, weekly journal responses, and manager competency checklists in one database.
            </p>
            <div class="flex gap-4 items-center">
                <button @click="canvasLinked = !canvasLinked; alert(canvasLinked ? 'Sandbox Canvas link simulated.' : 'Canvas disconnected.')" :class="canvasLinked ? 'bg-zinc-100 text-zinc-500' : 'bg-[#444444] text-white hover:bg-zinc-800'" class="text-xs font-bold px-4 py-2 rounded transition-colors">
                    <span x-text="canvasLinked ? 'Disconnect Canvas LMS' : 'Simulate Canvas Link'"></span>
                </button>
                <span class="text-[10px] text-zinc-400 font-semibold" x-text="canvasLinked ? 'Canvas Status: Connected (API Read/Write)' : 'Canvas Status: Disconnected'"></span>
            </div>
        </div>

        <!-- Verification Partners -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4 text-xs text-[#7B7B7B]">
            <h3 class="font-bold text-sm text-[#444444]">Verified Registrar Networks</h3>
            <p class="leading-relaxed">We support single-sign-on (SSO) credential checking for major university networks, matching candidate profiles instantly against:</p>
            <div class="grid grid-cols-2 gap-2 text-[11px] font-bold text-zinc-700">
                <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-[#00B1AA]"></i> Stanford University</div>
                <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-[#00B1AA]"></i> MIT EECS</div>
                <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-[#00B1AA]"></i> UC Berkeley</div>
                <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-[#00B1AA]"></i> Carnegie Mellon</div>
            </div>
        </div>

    </div>

    <!-- Onboarding Form for Registrars -->
    <div class="mx-auto max-w-2xl">
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
            <div class="text-center">
                <h3 class="text-xl font-bold text-[#444444]">Register Your Institution</h3>
                <p class="text-xs text-[#7B7B7B] mt-1">Connect your career center or academic department to the Interlink matching network.</p>
            </div>

            <div x-show="formSubmitted" class="p-4 bg-emerald-50 border border-emerald-100 rounded text-emerald-800 text-xs space-y-1">
                <h4 class="font-bold">Institution Request Logged!</h4>
                <p>A university partnership coordinator will reach out to schedule your Banner/Workday API sandbox walkthrough.</p>
            </div>

            <form x-show="!formSubmitted" @submit.prevent="formSubmitted = true" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Institution Name</label>
                        <input type="text" required placeholder="e.g. Stanford University" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Department Domain</label>
                        <input type="text" required placeholder="e.g. cs.stanford.edu" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Coordinator Name</label>
                        <input type="text" required placeholder="Dr. Sarah Jenkins" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Coordinator Email</label>
                        <input type="email" required placeholder="s.jenkins@stanford.edu" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Primary Record System</label>
                    <select class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                        <option>Ellucian Banner</option>
                        <option>Workday Student</option>
                        <option>Oracle PeopleSoft</option>
                        <option>Custom Registries / CSV import</option>
                    </select>
                </div>
                <button type="submit" class="w-full rounded bg-[#00B1AA] hover:bg-[#009c95] text-white font-bold text-xs py-2.5 transition-colors shadow-soft">
                    Submit Institution Registry Request
                </button>
            </form>
        </div>
    </div>

    <!-- Academic FAQs -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">Academic Advisor FAQs</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">How is student privacy protected under FERPA?</h4>
                <p>Interlink utilizes a secure read-only verification query that does not share transcripts, birthdates, or sensitive ID numbers. Students have explicit granular consent controls over what fields are verified to employers.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">What is the cost for university registrars?</h4>
                <p>There is zero fee for departments, colleges, registrar offices, or academic advisors. All tooling and integration pipelines are fully funded by B2B hiring partner subscriptions.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">How do canvas integration assignments update?</h4>
                <p>Our Canvas LMS integration creates automatic assignment placeholders for weeks 4, 8, and 12 evaluations. Once managers submit reviews, grades and evaluation files sync straight to the Canvas gradebook.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">Can we export cohort performance statistics?</h4>
                <p>Yes. Advisors can download complete cohort rosters, aggregate hourly logs, stipend compliance audits, and full-time conversion rates in standard CSV or PDF formats at any time.</p>
            </div>
        </div>
    </div>

</div>
@endsection

