@extends('layouts.public')

@section('title', 'Recruitment Process Timeline — Interlink')
@section('meta_description', 'View the step-by-step recruitment process on Interlink. Learn about automated matching, coding tests, and direct university placements.')

@section('content')
<div x-data="{
    activeStage: 1,
    stages: [
        { 
            id: 1, 
            title: 'Configuration & Credit Audit', 
            time: 'Day 1', 
            studentReq: 'Ensure .edu academic profile is active and verified.', 
            employerReq: 'Post listing indicating syllabus constraints & hourly stipend.', 
            description: 'Recruiters construct job specifications. Interlink\'s compliance engine audits the position against university syllabus requirements (stipend floor validation, learning deliverables) to guarantee placement eligibility.' 
        },
        { 
            id: 2, 
            title: 'Parsing & Vetting Check', 
            time: 'Days 2 - 3', 
            studentReq: 'Connect GitHub and sync repository commits.', 
            employerReq: 'Define minimum stack tags & GPA thresholds.', 
            description: 'Our background crawlers parser analyzes student code portfolios, evaluating commit frequency and language patterns. Pre-verified registrar data checks GPAs. Only matching candidates are forwarded.' 
        },
        { 
            id: 3, 
            title: 'Direct Matching Invites', 
            time: 'Days 4 - 5', 
            studentReq: 'Accept interview invitation via Student Tracker.', 
            employerReq: 'Send chat invitation through Recruiter Console.', 
            description: 'Top matched profiles are routed directly to the employer\'s dashboard. The coordinator triggers a direct interview invite, bypassing generic recruiters and HR filters entirely.' 
        },
        { 
            id: 4, 
            title: 'Structured Technical Assessment', 
            time: 'Days 6 - 12', 
            studentReq: 'Submit technical sandbox review or complete coding panel.', 
            employerReq: 'Review take-home code and coordinate panel calendar.', 
            description: 'Candidates enter the technical stage. Interlink supports clean integrations with shared workspaces for coding assessments, portfolio walkthroughs, or architectural code reviews.' 
        },
        { 
            id: 5, 
            title: 'Compliance Clearance & Signatures', 
            time: 'Days 13 - 15', 
            studentReq: 'Submit academic advisor details and request DSO CPT review.', 
            employerReq: 'Sign generated legal matching templates and tax files.', 
            description: 'Once selected, Interlink auto-generates legal CPT training agreements, compliance course mappings, and corporate NDA templates. Documents are digitally routed to all three parties for signature.' 
        },
        { 
            id: 6, 
            title: 'Placement Launch & Logging', 
            time: 'Day 16+', 
            studentReq: 'Log weekly work milestones and progress updates.', 
            employerReq: 'Approve bi-weekly journal entries and sign final evaluation.', 
            description: 'The student begins their placement. Monthly evaluations are sent automatically to managers. Upon completion, academic credit credits map directly to university grading registrars.' 
        }
    ]
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <h1 class="text-3xl font-bold tracking-tight text-[#444444] sm:text-4xl">{{ __('The Vetted Recruitment Lifecycle') }}</h1>
        <p class="text-sm text-[#7B7B7B] font-medium leading-relaxed">
            {{ __('How Interlink accelerates candidate matching and simplifies legal compliance for startup hires. Click any step below to see details.') }}
        </p>
    </div>

    <!-- Process Flow Interactive Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Side: Interactive Vertical Timeline (7 Columns) -->
        <div class="lg:col-span-7 space-y-6 relative">
            <div class="absolute left-6 top-6 bottom-6 w-0.5 bg-zinc-200 hidden md:block"></div>
            
            <template x-for="s in stages" :key="s.id">
                <div 
                    @click="activeStage = s.id" 
                    :class="activeStage === s.id ? 'border-[#00B1AA] bg-zinc-50' : 'border-zinc-200 hover:border-zinc-300'"
                    class="relative flex flex-col md:flex-row gap-6 border rounded-xl p-5 bg-white cursor-pointer transition-all shadow-soft"
                >
                    <!-- Step Indicator Bubble -->
                    <div 
                        :class="activeStage === s.id ? 'bg-[#00B1AA] text-white' : 'bg-zinc-900 text-white'"
                        class="h-12 w-12 rounded-full font-bold flex items-center justify-center text-sm shrink-0 z-10 shadow-soft transition-colors"
                        x-text="s.id"
                    ></div>
                    
                    <div class="flex-grow space-y-1">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-sm text-[#444444]" x-text="s.title"></h3>
                            <span :class="activeStage === s.id ? 'bg-[#00B1AA]/10 text-[#00B1AA]' : 'bg-zinc-100 text-zinc-500'" class="text-[10px] font-bold px-2.5 py-0.5 rounded-full" x-text="s.time"></span>
                        </div>
                        <p class="text-xs text-[#7B7B7B] leading-relaxed line-clamp-2" x-text="s.description"></p>
                    </div>
                </div>
            </template>
        </div>

        <!-- Right Side: Live Detail Card (5 Columns) -->
        <div class="lg:col-span-5 bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-6 sticky top-6">
            <div class="border-b border-zinc-100 pb-3">
                <span class="text-[10px] font-bold text-[#00B1AA] uppercase tracking-wider block" x-text="`Stage ${activeStage} details`"></span>
                <h3 class="text-base font-bold text-[#444444] mt-1" x-text="stages[activeStage - 1].title"></h3>
            </div>

            <p class="text-xs text-[#7B7B7B] leading-relaxed" x-text="stages[activeStage - 1].description"></p>

            <div class="space-y-4 pt-4 border-t border-zinc-100 text-xs">
                <div>
                    <span class="font-bold text-zinc-800 block"><i class="fa-solid fa-graduation-cap text-[#00B1AA] mr-1.5"></i> {{ __('Student Checklist') }}</span>
                    <p class="text-[#7B7B7B] mt-1 leading-relaxed" x-text="stages[activeStage - 1].studentReq"></p>
                </div>
                <div>
                    <span class="font-bold text-zinc-800 block"><i class="fa-solid fa-briefcase text-[#00B1AA] mr-1.5"></i> {{ __('Employer Checklist') }}</span>
                    <p class="text-[#7B7B7B] mt-1 leading-relaxed" x-text="stages[activeStage - 1].employerReq"></p>
                </div>
            </div>

            <div class="bg-zinc-50 rounded p-4 border border-zinc-200 text-[10px] text-zinc-500 flex items-start gap-2">
                <i class="fa-solid fa-circle-info text-[#00B1AA] mt-0.5"></i>
                <span>{{ __('All timeline stages are monitored by university advisors to guarantee CPT course compliance.') }}</span>
            </div>
        </div>

    </div>

    <!-- SLAs Dashboard -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <div class="text-center max-w-xl mx-auto">
            <h3 class="font-bold text-sm text-[#444444] uppercase tracking-wider">{{ __('Recruitment Platform Performance Standards (SLAs)') }}</h3>
            <p class="text-xs text-[#7B7B7B] mt-0.5">{{ __('Ensuring fast responses and legal certainty for students and startups.') }}</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center text-xs">
            <div class="space-y-1">
                <p class="text-[#7B7B7B]">{{ __('Resume Review') }}</p>
                <strong class="text-xl font-extrabold text-zinc-900">{{ __('&lt; 72 Hours') }}</strong>
                <p class="text-[9px] text-[#7B7B7B]">{{ __('Direct coordinator response rate') }}</p>
            </div>
            <div class="space-y-1">
                <p class="text-[#7B7B7B]">{{ __('Match Processing') }}</p>
                <strong class="text-xl font-extrabold text-[#00B1AA]">{{ __('24 Hours') }}</strong>
                <p class="text-[9px] text-[#7B7B7B]">{{ __('From configuration to list') }}</p>
            </div>
            <div class="space-y-1">
                <p class="text-[#7B7B7B]">{{ __('CPT Validation') }}</p>
                <strong class="text-xl font-extrabold text-zinc-900">{{ __('&lt; 24 Hours') }}</strong>
                <p class="text-[9px] text-[#7B7B7B]">{{ __('Legal agreement dispatch') }}</p>
            </div>
            <div class="space-y-1">
                <p class="text-[#7B7B7B]">{{ __('Stipend Floor Check') }}</p>
                <strong class="text-xl font-extrabold text-emerald-600">{{ __('Immediate') }}</strong>
                <p class="text-[9px] text-[#7B7B7B]">{{ __('Automatic payroll validation') }}</p>
            </div>
        </div>
    </div>

    <!-- Timeline FAQs -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">{{ __('Timeline Frequently Asked Questions') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('How fast do matches show up after posting?') }}</h4>
                <p>{{ __('Because Interlink indexes candidate databases continuously, initial candidate matches are delivered to recruiter boards within 24 hours of list publication.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('What coding frameworks are supported for take-home sandboxes?') }}</h4>
                <p>{{ __('We provide sandbox environments for React, Next.js, Rust, Go, Python, and PostgreSQL, compiling results automatically for recruiter dashboards.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('What happens if a student needs to delay their start date?') }}</h4>
                <p>{{ __('Standard matching agreements accommodate start date offsets. Any changes sync to university registrar databases automatically, keeping credit calculations accurate.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('Can companies expedite the compliance signature cycle?') }}</h4>
                <p>{{ __('Yes. By utilizing our DocuSign registrar APIs, agreements can be authorized and signed by the academic advisor within hours of candidate selection.') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection

