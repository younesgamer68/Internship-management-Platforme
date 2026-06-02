@extends('layouts.public')

@section('title', 'How It Works for Companies — Interlink')
@section('meta_description', 'Learn how companies recruit, manage, and verify students using Interlink. View credit validation rules and legal compliance guides.')

@section('content')
<div x-data="{
    numInternships: 4,
    avgHours: 40,
    traditionalRecruitCost: 5000,
    get calculatedSavings() {
        // Traditional agency / job board overhead vs Interlink auto-pipeline
        return Math.round((this.traditionalRecruitCost * this.numInternships) - (this.numInternships * 199));
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <span class="text-xs bg-[#00B1AA]/5 text-[#00B1AA] font-bold uppercase px-3 py-1 rounded-full">For Employers</span>
        <h1 class="text-3xl font-extrabold tracking-tight text-[#444444] sm:text-4xl">Build your talent funnel automatically</h1>
        <p class="text-sm text-[#7B7B7B] leading-relaxed">
            Interlink helps tech teams source pre-vetted candidates and automate the legal audits required to hire junior engineers and designers.
        </p>
    </div>

    <!-- Onboarding Process Steps -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Step 1 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">01</div>
                <h3 class="text-base font-bold text-[#444444]">Configure Vetting Directives</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    Set minimum eligibility thresholds (GPAs, course year levels, or specific technical skills). Interlink matches these parameters against verified student records to filter out unqualified submissions.
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-sliders text-[#00B1AA]"></i>
                <span>Customize GPA limits, GitHub commits, and course alignments.</span>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">02</div>
                <h3 class="text-base font-bold text-[#444444]">Standardized Credit Reporting</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    Instead of filling out custom university evaluations for every student, managers complete three standardized competency surveys during the 12-week block. Interlink maps these logs directly to credit hours.
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-clock-rotate-left text-[#00B1AA]"></i>
                <span>Automated 3-step surveys map to target course credits.</span>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="h-10 w-10 rounded bg-[#00B1AA]/10 text-[#00B1AA] flex items-center justify-center font-bold text-sm">03</div>
                <h3 class="text-base font-bold text-[#444444]">Fair Labor Compliance</h3>
                <p class="text-xs text-[#7B7B7B] leading-relaxed">
                    Interlink requires all postings to offer professional financial compensation. Unpaid internships are rejected. This guarantees FLSA compliance and attracts top-tier technical students.
                </p>
            </div>
            <div class="bg-zinc-50 rounded border border-zinc-200 p-3 text-[10px] text-zinc-600 flex items-center gap-2">
                <i class="fa-solid fa-dollar-sign text-[#00B1AA]"></i>
                <span>Min Rate: $25/hr for Dev &bull; $22/hr for UX/UI.</span>
            </div>
        </div>

    </div>

    <!-- ROI Savings Calculator Widget -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft max-w-xl mx-auto space-y-6">
        <div class="text-center">
            <h3 class="font-bold text-sm text-[#444444]">Calculate Your Recruiting Overhead Savings</h3>
            <p class="text-xs text-[#7B7B7B] mt-0.5">See how much you save on traditional agency fees and placement pipelines.</p>
        </div>
        <div class="space-y-4 text-xs">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-zinc-500 mb-1">Target Hires per Year</label>
                    <input type="number" x-model.number="numInternships" min="1" max="50" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium">
                </div>
                <div>
                    <label class="block text-zinc-500 mb-1">Traditional Cost Per Hire ($)</label>
                    <input type="number" x-model.number="traditionalRecruitCost" min="1000" step="500" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium">
                </div>
            </div>
            <div class="border-t border-zinc-100 pt-4 text-center">
                <span class="text-[#7B7B7B] block mb-1">Estimated Annual Recruiting Budget Savings:</span>
                <strong class="text-2xl font-black text-[#00B1AA]" x-text="`$${calculatedSavings.toLocaleString()}`"></strong>
                <span class="text-[9px] text-[#7B7B7B] block mt-1">Based on Interlink's Growth Plan at $199/month, covering unlimited active job listings.</span>
            </div>
        </div>
    </div>

    <!-- Comparison Table: Traditional Portal vs Interlink -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
        <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">Comparison: Traditional Portals vs Interlink</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left text-[#7B7B7B]">
                <thead class="bg-[#F8FAFA] text-[#444444] font-bold uppercase border-b border-zinc-200">
                    <tr>
                        <th class="p-3">Feature</th>
                        <th class="p-3">Traditional Portals (Handshake/LinkedIn)</th>
                        <th class="p-3 text-[#00B1AA]">Interlink Channel</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    <tr>
                        <td class="p-3 font-semibold text-[#444444]">Candidate Profile Vetting</td>
                        <td class="p-3">Self-reported by candidates, prone to embellishment.</td>
                        <td class="p-3 font-medium text-[#444444]">Verified via .edu registrar credentials and SSO logs.</td>
                    </tr>
                    <tr>
                        <td class="p-3 font-semibold text-[#444444]">Technical Competency Vetting</td>
                        <td class="p-3">Keyword density matches on resumes.</td>
                        <td class="p-3 font-medium text-[#444444]">Automated GitHub commit parsers & repository metrics.</td>
                    </tr>
                    <tr>
                        <td class="p-3 font-semibold text-[#444444]">University Credit Compliance</td>
                        <td class="p-3">Manual PDF coordination loops with advisors.</td>
                        <td class="p-3 font-medium text-[#444444]">Standardized evaluations synced directly to university registries.</td>
                    </tr>
                    <tr>
                        <td class="p-3 font-semibold text-[#444444]">Immigration (CPT/OPT) Mappings</td>
                        <td class="p-3">Handled by legal counsel and internal HR delays.</td>
                        <td class="p-3 font-medium text-[#444444]">Auto-generated legal agreements approved in 24 hours.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Manager Placement Checklist/Timeline -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <div class="text-center">
            <h3 class="font-bold text-sm text-[#444444] uppercase tracking-wider">Timeline: Host Manager Program Checklist</h3>
            <p class="text-xs text-[#7B7B7B] mt-0.5">A standardized 12-week schedule for engineering and design supervisors.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2 border-l-2 border-zinc-200 pl-4 relative">
                <span class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1.5 h-2 w-2 rounded-full bg-[#00B1AA]"></span>
                <h4 class="font-bold text-zinc-800 text-sm">Week 1: Setup & Mentorship</h4>
                <p>Assign candidate to host developer. Sync GitHub permissions and establish core communication templates in Slack.</p>
            </div>
            <div class="space-y-2 border-l-2 border-zinc-200 pl-4 relative">
                <span class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1.5 h-2 w-2 rounded-full bg-[#00B1AA]"></span>
                <h4 class="font-bold text-zinc-800 text-sm">Week 4: Midterm Evaluation</h4>
                <p>Complete first 3-minute evaluation mapping candidate contribution velocity to academic registry fields.</p>
            </div>
            <div class="space-y-2 border-l-2 border-zinc-200 pl-4 relative">
                <span class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1.5 h-2 w-2 rounded-full bg-[#00B1AA]"></span>
                <h4 class="font-bold text-zinc-800 text-sm">Week 8: Milestone Review</h4>
                <p>Conduct technical review of code quality, architecture autonomy, and teamwork metrics.</p>
            </div>
            <div class="space-y-2 border-l-2 border-zinc-200 pl-4 relative">
                <span class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1.5 h-2 w-2 rounded-full bg-[#00B1AA]"></span>
                <h4 class="font-bold text-zinc-800 text-sm">Week 12: Final Recommendation</h4>
                <p>Complete final student review. Submit return offer decision to initiate conversion dashboard loops.</p>
            </div>
        </div>
    </div>

    <!-- Recruiter FAQs -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">Recruiter Frequently Asked Questions</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">How is candidate Intellectual Property (IP) managed?</h4>
                <p>All candidates sign standard B2B IP assignments and Non-Disclosure Agreements (NDAs) generated during onboarding. All candidate commits on private repositories remain strictly owned by the employer entity.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">What happens if an intern underperforms or exits early?</h4>
                <p>Interlink provides standard termination clauses in matching templates. If an placement terminates early, our coordinator desk assists with university administrative reporting and adjusts billing terms automatically.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">Are we obligated to extend full-time return offers?</h4>
                <p>No. While conversions are highly encouraged (yielding an 89.4% return rate across partners), there is no legal obligation. Placements complete at the end of the designated 3 or 6-month contract cycle.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">How are university credit audits authorized?</h4>
                <p>Registrars accept Interlink's standardized midterm and final competence surveys as equivalent grading logs, mapping evaluations directly to course credits without manager paperwork overhead.</p>
            </div>
        </div>
    </div>

</div>
@endsection

