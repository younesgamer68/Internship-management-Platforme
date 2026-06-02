@extends('layouts.public')

@section('title', 'Technical Resume Tips & Guidelines — Interlink')
@section('meta_description', 'Learn how to write a high-impact technical resume. Discover formatting standards, quantitative milestone guidelines, and engineering action verbs.')

@section('content')
<div x-data="{
    scoreChecklist: [
        { id: 1, text: 'Exactly one page in length', value: false, weight: 15 },
        { id: 2, text: 'Quantified impact metrics listed (%, $, ms, GB)', value: false, weight: 20 },
        { id: 3, text: 'Action verbs at the start of every experience bullet', value: false, weight: 15 },
        { id: 4, text: 'Skills categorized (Languages, Frameworks, Tools)', value: false, weight: 15 },
        { id: 5, text: 'GitHub, LinkedIn, and academic email links included', value: false, weight: 15 },
        { id: 6, text: 'No progress bars or rating meters for programming languages', value: false, weight: 10 },
        { id: 7, text: 'Clean styling, neutral fonts, and no graphics/icons', value: false, weight: 10 }
    ],
    get resumeScore() {
        return this.scoreChecklist.reduce((acc, item) => acc + (item.value ? item.weight : 0), 0);
    },
    get scoreFeedback() {
        if (this.resumeScore < 40) return { label: 'Needs Improvement', color: 'text-rose-700 bg-rose-50 ring-rose-600/10' };
        if (this.resumeScore < 75) return { label: 'Good Progress', color: 'text-amber-800 bg-amber-50 ring-amber-600/10' };
        return { label: 'Recruiter Ready!', color: 'text-emerald-800 bg-emerald-50 ring-emerald-600/10' };
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <h1 class="text-3xl font-bold tracking-tight text-[#444444] sm:truncate sm:text-4xl">{{ __('Technical Resume Guidelines') }}</h1>
        <p class="text-sm text-[#7B7B7B] font-medium leading-relaxed">
            {{ __('Recruiter-approved layouts and writing strategies optimized for stack-matching filters and academic credits audits.') }}
        </p>
    </div>

    <!-- Interactive Resume Score Calculator -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
        
        <!-- Checklist Form (7 Cols) -->
        <div class="md:col-span-7 bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-5">
            <div>
                <h3 class="font-bold text-sm text-[#444444]">{{ __('Self-Audit Resume Scorecard') }}</h3>
                <p class="text-xs text-[#7B7B7B] mt-0.5">{{ __('Check off these guidelines to calculate your technical resume readiness score.') }}</p>
            </div>
            <div class="space-y-3.5 text-xs">
                <template x-for="item in scoreChecklist" :key="item.id">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" x-model="item.value" :id="`tip_${item.id}`" class="h-4 w-4 rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA]">
                        <label :for="`tip_${item.id}`" class="font-medium text-[#444444] select-none cursor-pointer" x-text="item.text"></label>
                    </div>
                </template>
            </div>
        </div>

        <!-- Live Score Feedback (5 Cols) -->
        <div class="md:col-span-5 bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4 text-center">
            <h3 class="font-bold text-xs text-[#7B7B7B] uppercase tracking-wider">{{ __('Self-Audit Score') }}</h3>
            <div class="inline-flex items-center justify-center p-6 rounded-full bg-[#00B1AA]/5 text-[#00B1AA] border-4 border-[#00B1AA]/10">
                <span class="text-4xl font-black" x-text="`${resumeScore}/100`"></span>
            </div>
            <div class="pt-2">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold ring-1 ring-inset" :class="scoreFeedback.color" x-text="scoreFeedback.label"></span>
            </div>
            <p class="text-[10px] text-[#7B7B7B] leading-relaxed max-w-xs mx-auto">
                {{ __('Startups in our Corporate Directory prioritize clean templates with high action density.') }}
            </p>
        </div>

    </div>

    <!-- STAR Method Before vs. After Breakdown -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-5">
        <div class="text-center max-w-xl mx-auto">
            <h3 class="font-bold text-sm text-[#444444] uppercase tracking-wider">{{ __('Writing Bullet Points: The STAR Method') }}</h3>
            <p class="text-xs text-[#7B7B7B] mt-0.5">{{ __('Structure every experience bullet as: **Situation, Task, Action, Result** (with metrics).') }}</p>
        </div>
        
        <div class="space-y-4">
            <!-- Bullet 1 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
                <div class="bg-rose-50/50 border border-rose-100 rounded-lg p-4 space-y-2">
                    <span class="text-[10px] font-bold text-rose-700 bg-rose-50 px-2 py-0.5 rounded-full uppercase tracking-wider">{{ __('Weak Bullet') }}</span>
                    <p class="text-zinc-600 font-medium">{{ __('"Worked on a web application in React and added features."') }}</p>
                    <p class="text-[10px] text-zinc-400">{{ __('Why it fails: Missing scale context, active action verbs, and quantitative outcome details.') }}</p>
                </div>
                <div class="bg-emerald-50/50 border border-emerald-100 rounded-lg p-4 space-y-2">
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full uppercase tracking-wider">{{ __('STAR Bullet') }}</span>
                    <p class="text-zinc-800 font-bold">{{ __('"Architected a real-time dashboard in React, reducing load times by 40% for 5,000+ users via memoization."') }}</p>
                    <p class="text-[10px] text-zinc-500">{{ __('Why it works: Clearly defines the active role (Architected), specific tech stack (React), and clear metrics (40%, 5k+ users).') }}</p>
                </div>
            </div>
            <!-- Bullet 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
                <div class="bg-rose-50/50 border border-rose-100 rounded-lg p-4 space-y-2">
                    <span class="text-[10px] font-bold text-rose-700 bg-rose-50 px-2 py-0.5 rounded-full uppercase tracking-wider">{{ __('Weak Bullet') }}</span>
                    <p class="text-zinc-600 font-medium">{{ __('"Responsible for database optimization on AWS."') }}</p>
                    <p class="text-[10px] text-zinc-400">{{ __('Why it fails: Uses passive term "Responsible for" and omits details about execution or metrics.') }}</p>
                </div>
                <div class="bg-emerald-50/50 border border-emerald-100 rounded-lg p-4 space-y-2">
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full uppercase tracking-wider">{{ __('STAR Bullet') }}</span>
                    <p class="text-zinc-800 font-bold">{{ __('"Provisioned AWS RDS PostgreSQL databases with read-replica partitions, securing 99.9% uptime compliance."') }}</p>
                    <p class="text-[10px] text-zinc-500">{{ __('Why it works: Employs active verb (Provisioned), indicates tools (PostgreSQL, AWS), and states concrete result metrics (99.9%).') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Categorized Action Verbs Dictionary -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-5">
        <div>
            <h3 class="font-bold text-sm text-[#444444] uppercase tracking-wider">{{ __('Technical Action Verbs Dictionary') }}</h3>
            <p class="text-xs text-[#7B7B7B] mt-0.5">{{ __('Use these categorized terms at the start of your experience descriptions.') }}</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-xs text-[#7B7B7B]">
            <div class="bg-[#F8FAFA] border border-[#E5E7EB] rounded p-4 space-y-2.5">
                <span class="font-bold text-[#444444] block border-b border-zinc-200 pb-1">{{ __('Development & Infra') }}</span>
                <ul class="space-y-1 font-mono text-[10px]">
                    <li>{{ __('&bull; Architected') }}</li>
                    <li>{{ __('&bull; Engineered') }}</li>
                    <li>{{ __('&bull; Implemented') }}</li>
                    <li>{{ __('&bull; Refactored') }}</li>
                    <li>{{ __('&bull; Provisioned') }}</li>
                </ul>
            </div>
            <div class="bg-[#F8FAFA] border border-[#E5E7EB] rounded p-4 space-y-2.5">
                <span class="font-bold text-[#444444] block border-b border-zinc-200 pb-1">{{ __('Optimization & Scale') }}</span>
                <ul class="space-y-1 font-mono text-[10px]">
                    <li>{{ __('&bull; Optimized') }}</li>
                    <li>{{ __('&bull; Scaled') }}</li>
                    <li>{{ __('&bull; Accelerated') }}</li>
                    <li>{{ __('&bull; Streamlined') }}</li>
                    <li>{{ __('&bull; Reduced') }}</li>
                </ul>
            </div>
            <div class="bg-[#F8FAFA] border border-[#E5E7EB] rounded p-4 space-y-2.5">
                <span class="font-bold text-[#444444] block border-b border-zinc-200 pb-1">{{ __('Leadership & Launch') }}</span>
                <ul class="space-y-1 font-mono text-[10px]">
                    <li>{{ __('&bull; Led') }}</li>
                    <li>{{ __('&bull; Spearheaded') }}</li>
                    <li>{{ __('&bull; Mentored') }}</li>
                    <li>{{ __('&bull; Orchestrated') }}</li>
                    <li>{{ __('&bull; Coordinated') }}</li>
                </ul>
            </div>
            <div class="bg-[#F8FAFA] border border-[#E5E7EB] rounded p-4 space-y-2.5">
                <span class="font-bold text-[#444444] block border-b border-zinc-200 pb-1">{{ __('Analytics & Data') }}</span>
                <ul class="space-y-1 font-mono text-[10px]">
                    <li>{{ __('&bull; Analyzed') }}</li>
                    <li>{{ __('&bull; Audited') }}</li>
                    <li>{{ __('&bull; Benchmarked') }}</li>
                    <li>{{ __('&bull; Modeled') }}</li>
                    <li>{{ __('&bull; Integrated') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Resume Tips FAQ -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">{{ __('Resume Formatting FAQs') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('Should I use rating bars to show my skill levels?') }}</h4>
                <p>{{ __('No. Progress bars or skill scales (e.g. "React - 4/5 stars") are highly discouraged. They confuse ATS parser algorithms and are highly subjective. Just category-list your skills neutrally in the Skills block.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('How far back should my history go?') }}</h4>
                <p>{{ __('Focus primarily on technical experiences completed within the last 2-3 years, prioritizing active software engineer roles, GitHub project metrics, and relevant academic research placements.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('Should I list my GPA if it is below 3.0?') }}</h4>
                <p>{{ __('If your GPA is below 3.0, it is recommended to exclude it from your resume to maximize recruiter consideration, unless the target role explicitly mandates verified GPA thresholds.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('Does the layout design affect parser scanning?') }}</h4>
                <p>{{ __('Yes. Complex multi-column layouts, fancy headers, images, or glowing icons frequently cause parser compilation errors. Use clean, single-column templates like the standard Interlink builder template.') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection

