@extends('layouts.public')

@section('title', 'Post an Internship — Interlink')
@section('meta_description', 'Post an internship listing on Interlink. Select candidate vetting rules, required tech stacks, and partner university alignments.')

@section('content')
<div x-data="{
    step: 1,
    roleTitle: 'Systems Engineer Intern',
    companyName: 'Stripe',
    logoLetter: 'S',
    logoBg: 'bg-[#635bff]',
    department: 'Engineering',
    workplace: 'Remote',
    stipend: '55.00',
    duration: '6 Months',
    skills: 'React, TypeScript, Rust',
    targetSchool: 'All Partner Schools',
    gpaThreshold: 'None',
    githubCommits: '50+ yearly commits',
    academicEndorsement: false,
    description: 'We are seeking an engineering intern to help audit and scale our core payment orchestration ledgers. You will write high-throughput Rust APIs and assist with Next.js dashboards.',
    get complianceChecked() {
        return {
            title: this.roleTitle.length > 3,
            stipend: Number(this.stipend) >= 20.00,
            description: this.description.length > 20,
            skills: this.skills.length > 3
        };
    },
    submitForm() {
        alert('Internship posting published successfully! Synced to target university department boards.');
        window.location.href = '/internships/browse';
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Stepper indicator -->
    <div class="border-b border-zinc-200 pb-6">
        <h1 class="text-3xl font-bold text-[#444444] text-center">Create Internship Listing</h1>
        <p class="text-xs text-[#7B7B7B] text-center mt-1.5 font-medium">Provide clear specifications to configure automated stack-matching algorithms.</p>
        
        <div class="mt-6 max-w-xl mx-auto flex items-center justify-between text-xs font-semibold text-zinc-400">
            <span :class="step >= 1 ? 'text-[#00B1AA]' : ''" class="flex items-center gap-1.5"><span class="h-5 w-5 bg-zinc-200 text-zinc-700 rounded-full flex items-center justify-center font-mono font-bold" :class="step >= 1 ? 'bg-[#00B1AA] text-white' : ''">1</span> Details</span>
            <span class="flex-grow border-t border-zinc-200 mx-4"></span>
            <span :class="step >= 2 ? 'text-[#00B1AA]' : ''" class="flex items-center gap-1.5"><span class="h-5 w-5 bg-zinc-200 text-zinc-700 rounded-full flex items-center justify-center font-mono font-bold" :class="step >= 2 ? 'bg-[#00B1AA] text-white' : ''">2</span> Compensation</span>
            <span class="flex-grow border-t border-zinc-200 mx-4"></span>
            <span :class="step >= 3 ? 'text-[#00B1AA]' : ''" class="flex items-center gap-1.5"><span class="h-5 w-5 bg-zinc-200 text-zinc-700 rounded-full flex items-center justify-center font-mono font-bold" :class="step >= 3 ? 'bg-[#00B1AA] text-white' : ''">3</span> Vetting & School</span>
        </div>
    </div>

    <!-- Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Side: Form Details (8 Columns) -->
        <div class="lg:col-span-7 bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft">
            
            <!-- Step 1: Details -->
            <div x-show="step === 1" class="space-y-4">
                <h3 class="text-xs font-bold text-[#444444] uppercase tracking-wider border-b border-zinc-100 pb-2">Step 1: Role Details</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Company Name</label>
                        <select x-model="companyName" @change="logoLetter = companyName.charAt(0); logoBg = (companyName === 'Stripe' ? 'bg-[#635bff]' : companyName === 'Vercel' ? 'bg-black' : companyName === 'Figma' ? 'bg-[#f24e1e]' : companyName === 'Linear' ? 'bg-zinc-900 border border-zinc-700' : 'bg-emerald-600')" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                            <option value="Stripe">Stripe</option>
                            <option value="Vercel">Vercel</option>
                            <option value="Figma">Figma</option>
                            <option value="Linear">Linear</option>
                            <option value="Supabase">Supabase</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Discipline Category</label>
                        <select x-model="department" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                            <option>Engineering</option>
                            <option>Design</option>
                            <option>Product Management</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Internship Position Title</label>
                    <input type="text" x-model="roleTitle" required placeholder="e.g. Systems Engineer Intern" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Role Description Summary</label>
                    <textarea x-model="description" rows="5" required placeholder="Outline key deliverables, team scopes, and contribution expectations..." class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors resize-none leading-relaxed"></textarea>
                </div>
                <div class="pt-4 flex justify-end">
                    <button type="button" @click="step = 2" class="rounded bg-[#444444] hover:bg-zinc-800 text-white font-bold text-xs px-5 py-2.5 transition-colors">
                        Next Step &rarr;
                    </button>
                </div>
            </div>

            <!-- Step 2: Compensation & Workspace -->
            <div x-show="step === 2" x-cloak class="space-y-4">
                <h3 class="text-xs font-bold text-[#444444] uppercase tracking-wider border-b border-zinc-100 pb-2">Step 2: Compensation & Workplace</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Hourly Stipend ($ USD)</label>
                        <input type="number" x-model="stipend" min="1" step="0.50" required class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                        <span class="text-[9px] text-[#7B7B7B] mt-1 block">Minimum: $20.00/hr required for validation.</span>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Contract Duration</label>
                        <select x-model="duration" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                            <option>3 Months</option>
                            <option>6 Months</option>
                            <option>9 Months</option>
                            <option>12 Months</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Workplace Model</label>
                    <select x-model="workplace" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                        <option>Remote</option>
                        <option>Hybrid</option>
                        <option>On-site</option>
                    </select>
                </div>
                <div class="pt-4 flex justify-between">
                    <button type="button" @click="step = 1" class="rounded border border-[#E5E7EB] hover:bg-zinc-50 text-[#7B7B7B] font-bold text-xs px-4 py-2.5 transition-colors">
                        &larr; Back
                    </button>
                    <button type="button" @click="step = 3" class="rounded bg-[#444444] hover:bg-zinc-800 text-white font-bold text-xs px-5 py-2.5 transition-colors">
                        Next Step &rarr;
                    </button>
                </div>
            </div>

            <!-- Step 3: Vetting Criteria -->
            <div x-show="step === 3" x-cloak class="space-y-4">
                <h3 class="text-xs font-bold text-[#444444] uppercase tracking-wider border-b border-zinc-100 pb-2">Step 3: Vetting & School Targets</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Target Technical Stack</label>
                        <input type="text" x-model="skills" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                        <span class="text-[9px] text-[#7B7B7B] mt-1 block">Comma separated list.</span>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Target University</label>
                        <select x-model="targetSchool" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                            <option>All Partner Schools</option>
                            <option>Stanford University CS</option>
                            <option>MIT CS Only</option>
                            <option>Carnegie Mellon CS</option>
                            <option>UC Berkeley CS</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 border-t border-zinc-100 pt-4">
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Min GPA Threshold</label>
                        <select x-model="gpaThreshold" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                            <option>None</option>
                            <option>&gt; 3.0 GPA</option>
                            <option>&gt; 3.3 GPA</option>
                            <option>&gt; 3.5 GPA</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-wider">Required GitHub Activity</label>
                        <select x-model="githubCommits" class="mt-1.5 w-full text-xs border border-zinc-200 bg-[#F8FAFA] rounded px-3 py-2 font-medium focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA] transition-colors">
                            <option>No requirement</option>
                            <option>1+ public repos</option>
                            <option>50+ yearly commits</option>
                            <option>100+ yearly commits</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center gap-2 border-t border-zinc-100 pt-4">
                    <input type="checkbox" x-model="academicEndorsement" id="academic_endorsement" class="h-4 w-4 rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA]">
                    <label for="academic_endorsement" class="text-xs text-zinc-600 font-medium select-none">Require active faculty recommendation letter or advisor signature</label>
                </div>

                <div class="bg-zinc-50 rounded p-4 border border-zinc-200 text-[10px] text-zinc-500 space-y-1.5">
                    <span class="font-bold text-zinc-700 block">Vetting & Compliance Rules:</span>
                    <p class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-emerald-600"></i> No unpaid listings. Standard corporate stipends must clear FLSA guidelines.</p>
                    <p class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-emerald-600"></i> Host team leads must verify student progress reviews to authorize credit mappings.</p>
                </div>

                <div class="pt-4 flex justify-between">
                    <button type="button" @click="step = 2" class="rounded border border-[#E5E7EB] hover:bg-zinc-50 text-[#7B7B7B] font-bold text-xs px-4 py-2.5 transition-colors">
                        &larr; Back
                    </button>
                    <button type="button" @click="submitForm()" class="rounded bg-[#00B1AA] hover:bg-[#009c95] text-white font-bold text-xs px-5 py-2.5 transition-colors shadow-soft">
                        Publish Position
                    </button>
                </div>
            </div>

        </div>

        <!-- Right Side: Live Preview Sidebar (5 Columns) -->
        <div class="lg:col-span-5 space-y-6">
            
            <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
                <h3 class="text-xs font-bold text-[#444444] uppercase tracking-wider border-b border-zinc-100 pb-2">Live Board Preview</h3>
                
                <!-- Preview Card -->
                <div class="bg-white border border-zinc-200 rounded p-5 space-y-4 relative overflow-hidden">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <div :class="logoBg" class="h-10 w-10 rounded flex items-center justify-center text-white font-black text-lg transition-colors" x-text="logoLetter"></div>
                            <div>
                                <h4 class="font-bold text-xs text-[#444444]" x-text="roleTitle || 'Untitled Position'"></h4>
                                <p class="text-[10px] text-[#7B7B7B] font-semibold" x-text="companyName"></p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold text-white bg-[#00B1AA] px-2 py-0.5 rounded" x-text="workplace"></span>
                    </div>

                    <p class="text-[10px] text-[#7B7B7B] leading-relaxed line-clamp-3" x-text="description || 'Provide a brief summary on the left to populate the preview layout.'"></p>

                    <!-- Skill tags -->
                    <div class="flex flex-wrap gap-1">
                        <template x-for="skill in skills.split(',')" :key="skill">
                            <span x-show="skill.trim()" class="text-[9px] font-bold bg-zinc-50 border border-zinc-200 rounded px-2 py-0.5 text-zinc-600" x-text="skill.trim()"></span>
                        </template>
                    </div>

                    <div class="border-t border-zinc-100 pt-3 flex justify-between items-center text-[9px] text-[#7B7B7B] font-bold">
                        <span x-text="`Stipend: $${Number(stipend || 0).toFixed(2)}/hr`"></span>
                        <span x-text="`Duration: ${duration}`"></span>
                    </div>
                </div>

                <!-- Compliance Tracker -->
                <div class="space-y-2 text-[10px]">
                    <span class="font-bold text-[#444444] uppercase tracking-wider block">Compliance Audit Checklist</span>
                    
                    <div class="flex items-center justify-between py-1 border-b border-zinc-50">
                        <span class="text-zinc-500">Position Title Length Valid</span>
                        <i class="fa-solid" :class="complianceChecked.title ? 'fa-circle-check text-emerald-600' : 'fa-circle-exclamation text-amber-500'"></i>
                    </div>
                    <div class="flex items-center justify-between py-1 border-b border-zinc-50">
                        <span class="text-zinc-500">Hourly Rate &gt; $20.00/hr</span>
                        <i class="fa-solid" :class="complianceChecked.stipend ? 'fa-circle-check text-emerald-600' : 'fa-circle-exclamation text-amber-500'"></i>
                    </div>
                    <div class="flex items-center justify-between py-1 border-b border-zinc-50">
                        <span class="text-zinc-500">Role Description Wordcount</span>
                        <i class="fa-solid" :class="complianceChecked.description ? 'fa-circle-check text-emerald-600' : 'fa-circle-exclamation text-amber-500'"></i>
                    </div>
                    <div class="flex items-center justify-between py-1">
                        <span class="text-zinc-500">Core Tech Tags Assigned</span>
                        <i class="fa-solid" :class="complianceChecked.skills ? 'fa-circle-check text-emerald-600' : 'fa-circle-exclamation text-amber-500'"></i>
                    </div>
                </div>
            </div>

            <!-- Posting FAQs -->
            <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
                <h4 class="text-xs font-bold text-[#444444] uppercase tracking-wider">Recruiter FAQ</h4>
                <div class="space-y-3 text-[11px] text-[#7B7B7B] leading-relaxed">
                    <div>
                        <h5 class="font-bold text-zinc-800">How do the vetting filters work?</h5>
                        <p class="mt-0.5">Students who do not satisfy GPA thresholds or GitHub commit requirements are hidden from direct matchmaking listings, and their applications are queued separately under "Under Review" states.</p>
                    </div>
                    <div>
                        <h5 class="font-bold text-zinc-800">Can we coordinate university credits?</h5>
                        <p class="mt-0.5">Yes. When selecting specific CS target schools (e.g. Stanford CS), our department registry maps compliance requirements automatically and feeds evaluations straight to registrar databases.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

