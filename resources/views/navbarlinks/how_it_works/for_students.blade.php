@extends('layouts.public')

@section('title', 'How It Works for Students — Interlink')
@section('meta_description', 'Learn how students secure premium technical internships on Interlink. Read about academic verification, stack matching, and university credits.')

@section('content')
<div x-data="{
    studentTrack: 'engineering',
    hoursWeekly: 20,
    checklistItems: [
        { id: 1, name: 'Link University Email (.edu SSO)', completed: true },
        { id: 2, name: 'Connect GitHub Profile', completed: false },
        { id: 3, name: 'Upload Unofficial Transcript', completed: false },
        { id: 4, name: 'Add Faculty Advisor Details', completed: false },
        { id: 5, name: 'Add at least 3 Stack Skill tags', completed: true }
    ],
    get profileStrength() {
        const count = this.checklistItems.filter(item => {{ __('item.completed).length; if (count') }} <= 2) return { level: 'Bronze', color: 'text-amber-700 bg-amber-50 ring-amber-600/10' };
        if (count <= 4) return { level: 'Gold', color: 'text-yellow-800 bg-yellow-50 ring-yellow-600/10' };
        return { level: 'Platinum Elite', color: 'text-[#00B1AA] bg-[#00B1AA]/5 ring-[#00B1AA]/10' };
    },
    get estStipend() {
        let base = 35;
        if (this.studentTrack === 'engineering') base = 52;
        if (this.studentTrack === 'design') base = 44;
        if (this.studentTrack === 'pm') base = 48;
        return base * this.hoursWeekly;
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <span class="text-xs bg-[#00B1AA]/5 text-[#00B1AA] font-bold uppercase px-3 py-1 rounded-full">{{ __('For Students') }}</span>
        <h1 class="text-3xl font-extrabold tracking-tight text-[#444444] sm:text-4xl">{{ __('Your path to top engineering & design teams') }}</h1>
        <p class="text-sm text-[#7B7B7B] leading-relaxed">
            {{ __('No generic applications. No black holes. Interlink matches your validated university record and project history directly to active hiring budgets.') }}
        </p>
    </div>

    <!-- Onboarding Process Steps -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Step 1 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">01</div>
                <h3 class="text-base font-bold text-[#444444]">{{ __('Academic Verification') }}</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    {{ __('Verify enrollment and transcript details automatically by registering with your university email. This adds a verified badge to your profile, building immediate recruiter trust.') }}
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-[#00B1AA]"></i>
                <span>{{ __('Stanford, MIT, Berkeley, CMU, and 40+ registrar databases linked.') }}</span>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">02</div>
                <h3 class="text-base font-bold text-[#444444]">{{ __('GitHub Stack Parser') }}</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    {{ __('Connect your GitHub profile. Our parsing script indexes your public repositories and contributions. We extract verified frameworks and tools (e.g. React, Next.js, Rust, Go) to generate a match score.') }}
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-code-branch text-[#00B1AA]"></i>
                <span>{{ __('Parse repos, PR commits, and language ratios automatically.') }}</span>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">03</div>
                <h3 class="text-base font-bold text-[#444444]">{{ __('Audited Course Credit') }}</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    {{ __('All placements are pre-approved to satisfy department credit rules (e.g. CS-197). At weeks 4, 8, and 12, Interlink dispatches structural evaluations to your host manager, forwarding approvals to your advisor.') }}
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-file-signature text-[#00B1AA]"></i>
                <span>{{ __('Direct university registrar synchronization and credit logs.') }}</span>
            </div>
        </div>

    </div>

    <!-- Student Profile Vetting Readiness Checklist -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <!-- Interactive Verification Checklist -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-5">
            <div>
                <h3 class="font-bold text-sm text-[#444444]">{{ __('Interactive Application Readiness Checklist') }}</h3>
                <p class="text-xs text-[#7B7B7B] mt-0.5">{{ __('Toggle these items to see how complete your profile is and your matchmaking score status.') }}</p>
            </div>
            <div class="space-y-3 text-xs">
                <template x-for="item in checklistItems" :key="item.id">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" x-model="item.completed" :id="`item_${item.id}`" class="h-4 w-4 rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA]">
                        <label :for="`item_${item.id}`" class="font-medium text-[#444444] select-none" x-text="item.name"></label>
                    </div>
                </template>
                <div class="border-t border-zinc-100 pt-4 flex justify-between items-center">
                    <span class="text-zinc-500 font-semibold">{{ __('Estimated Match Level:') }}</span>
                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-[10px] font-bold ring-1 ring-inset" :class="profileStrength.color" x-text="profileStrength.level"></span>
                </div>
            </div>
        </div>

        <!-- Interactive Stipend Estimator -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-5">
            <div>
                <h3 class="font-bold text-sm text-[#444444]">{{ __('Average Internship Stipend Calculator') }}</h3>
                <p class="text-xs text-[#7B7B7B] mt-0.5">{{ __('Estimate weekly stipends based on current placement rates.') }}</p>
            </div>
            <div class="space-y-4 text-xs">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Discipline Track') }}</label>
                        <select x-model="studentTrack" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium">
                            <option value="engineering">{{ __('Engineering') }}</option>
                            <option value="design">{{ __('Product Design') }}</option>
                            <option value="pm">{{ __('Product Management') }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Weekly Commitment') }}</label>
                        <select x-model.number="hoursWeekly" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium">
                            <option value="20">{{ __('Part Time (20h)') }}</option>
                            <option value="40">{{ __('Full Time (40h)') }}</option>
                        </select>
                    </div>
                </div>
                <div class="border-t border-zinc-100 pt-4 text-center">
                    <span class="text-[#7B7B7B] block mb-1">{{ __('Estimated Weekly Stipend:') }}</span>
                    <strong class="text-2xl font-black text-[#00B1AA]" x-text="`$${estStipend.toFixed(2)}`"></strong>
                    <span class="text-[9px] text-[#7B7B7B] block mt-1">{{ __('Based on active corporate agreements listed in the Corporate Directory.') }}</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Student Placements Testimonials -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft">
        <h3 class="text-xs font-bold text-[#444444] mb-6 text-center uppercase tracking-wider">{{ __('Placement Success Stories') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs text-[#7B7B7B]">
            <div class="space-y-2">
                <h4 class="font-bold text-[#444444] text-sm">{{ __('"No resume filtering nonsense"') }}</h4>
                <p class="leading-relaxed">{{ __('"Traditional portals just auto-filtered my resume because I was a freshman. Interlink linked my GitHub repositories, parsed my Rust compiler projects, and matched me directly with the Linear engineering lead."') }}</p>
                <span class="block font-bold text-[#444444] mt-3">{{ __('Marcus Vance &middot; Linear Intern') }}</span>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-[#444444] text-sm">{{ __('"Credit mappings were seamless"') }}</h4>
                <p class="leading-relaxed">{{ __('"Getting Stanford CS department credits for external work used to require pages of advisor reviews. With Interlink, Vercel’s weekly evaluations synced automatically, and I received my grade without delay."') }}</p>
                <span class="block font-bold text-[#444444] mt-3">{{ __('Sasha Petrov &middot; Vercel Intern') }}</span>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-[#444444] text-sm">{{ __('"Transparent Stipends"') }}</h4>
                <p class="leading-relaxed">{{ __('"I knew exactly what every company was paying per hour before I even entered the chats. Being able to compare stipend structures for Stripe and Figma was incredibly helpful."') }}</p>
                <span class="block font-bold text-[#444444] mt-3">{{ __('Aisha Taylor &middot; Figma Intern') }}</span>
            </div>
        </div>
    </div>

    <!-- Detailed Student FAQs -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">{{ __('Student Frequently Asked Questions') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('Is there any fee for students to use Interlink?') }}</h4>
                <p>{{ __('No. Interlink is entirely free for university students and registrar affiliates. All infrastructure matching and credit automation costs are billed directly to B2B hiring partners.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('What if my university isn\'t in the verification database?') }}</h4>
                <p>{{ __('If your school isn\'t listed, choose "External Candidate Onboarding" in the signup step. You will upload a verified copy of your university transcript, which our verification coordinators will audit within 48 hours.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('How does CPT/OPT visa coordination work?') }}</h4>
                <p>{{ __('Interlink automatically generates pre-signed standard training agreements mapping directly to Department Homeland Security regulations. These agreements sync with your Designated School Official (DSO) for fast I-20 updates.') }}</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">{{ __('Do all placements offer full-time conversion paths?') }}</h4>
                <p>{{ __('While conversion paths are company-specific, 89.4% of partners offer direct return offer conversion paths. You can filter for companies with verified return-offer records in the Review Directory.') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection

