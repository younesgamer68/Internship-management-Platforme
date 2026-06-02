@extends('layouts.public')

@section('title', 'University Recruiters Directory — Interlink')
@section('meta_description', 'Connect with verified university program managers and recruiting leads at Stripe, Vercel, Figma, and Linear.')

@section('content')
<div x-data="{
    searchQuery: '',
    selectedFocus: 'All',
    recruiters: [
        { id: 1, name: 'Sarah Keates', initials: 'SK', company: 'Stripe', role: 'University Program Lead', focus: 'Summer Engineering', speed: 'Within 24 hours', email: 's.keates@stripe.com', active: true, imageBg: 'bg-indigo-100 text-indigo-700' },
        { id: 2, name: 'Thomas Ruck', initials: 'TR', company: 'Vercel', role: 'Head of Tech Recruiting', focus: 'Next.js Framework Core', speed: 'Within 2 days', email: 'ruck@vercel.com', active: true, imageBg: 'bg-zinc-100 text-zinc-800' },
        { id: 3, name: 'Elena Rostova', initials: 'ER', company: 'Figma', role: 'Design Education Recruiter', focus: 'Product Design', speed: 'Within 24 hours', email: 'elena@figma.com', active: true, imageBg: 'bg-orange-100 text-orange-700' },
        { id: 4, name: 'Marcus Aurelius', initials: 'MA', company: 'Linear', role: 'Talent Acquisition Partner', focus: 'Systems & Rust Dev', speed: 'Within 24 hours', email: 'marcus@linear.app', active: false, imageBg: 'bg-zinc-950 text-zinc-100' },
        { id: 5, name: 'Chloe Vance', initials: 'CV', company: 'Supabase', role: 'Lead Technical Recruiter', focus: 'AI & Databases', speed: 'Within 12 hours', email: 'chloe@supabase.io', active: true, imageBg: 'bg-emerald-100 text-emerald-700' },
        { id: 6, name: 'Kenji Sato', initials: 'KS', company: 'Resend', role: 'DevRel & Frontend Recruiter', focus: 'Frontend & DevRel', speed: 'Within 24 hours', email: 'kenji@resend.com', active: true, imageBg: 'bg-slate-100 text-slate-800' },
        { id: 7, name: 'Devansh Mehta', initials: 'DM', company: 'Retool', role: 'University Recruiting Coordinator', focus: 'Solutions Engineering', speed: 'Within 3 days', email: 'devansh@retool.com', active: true, imageBg: 'bg-blue-100 text-blue-700' },
        { id: 8, name: 'Clara Oswald', initials: 'CO', company: 'Pinecone', role: 'Technical Sourcing Lead', focus: 'Vector DB & AI Search', speed: 'Within 48 hours', email: 'clara.o@pinecone.io', active: true, imageBg: 'bg-purple-100 text-purple-700' }
    ],
    get filtered() {
        return this.recruiters.filter(r => {
            const matchesQuery = r.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                 r.company.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                 r.focus.toLowerCase().includes(this.searchQuery.toLowerCase());
            const matchesFocus = this.selectedFocus === 'All' || r.focus === this.selectedFocus;
            return matchesQuery && matchesFocus;
        });
    },
    rsvped: []
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5">
        <h1 class="text-3xl font-bold leading-7 text-[#444444] sm:truncate sm:text-4xl">University Program Leads</h1>
        <p class="mt-2 text-sm text-[#7B7B7B] font-medium">Meet the verified recruiting teams managing university cohorts. Direct match reviews are routed straight to their dashboards.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white border border-[#E5E7EB] rounded p-4 shadow-soft">
            <p class="text-xs text-[#7B7B7B] font-medium">Total Verified Leads</p>
            <p class="text-xl font-bold text-[#444444] mt-1">8 Active Leads</p>
        </div>
        <div class="bg-white border border-[#E5E7EB] rounded p-4 shadow-soft">
            <p class="text-xs text-[#7B7B7B] font-medium">Average Response</p>
            <p class="text-xl font-bold text-[#00B1AA] mt-1">24-48 Hours</p>
        </div>
        <div class="bg-white border border-[#E5E7EB] rounded p-4 shadow-soft">
            <p class="text-xs text-[#7B7B7B] font-medium">Summer Placements</p>
            <p class="text-xl font-bold text-[#444444] mt-1">450+ Spots</p>
        </div>
        <div class="bg-white border border-[#E5E7EB] rounded p-4 shadow-soft">
            <p class="text-xs text-[#7B7B7B] font-medium">AMA Match Rate</p>
            <p class="text-xl font-bold text-[#444444] mt-1">94.2%</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="flex flex-col md:flex-row gap-4 bg-white border border-[#E5E7EB] rounded p-4 shadow-soft">
        <div class="flex-grow relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-[#7B7B7B] text-xs"></i>
            <input 
                x-model="searchQuery" 
                type="text" 
                placeholder="Search recruiters by name, company, or focus..." 
                class="w-full pl-9 pr-4 py-2 text-xs border border-[#E5E7EB] bg-[#F8FAFA] rounded placeholder-[#7B7B7B] focus:bg-white transition-colors"
            >
        </div>
        <select x-model="selectedFocus" class="text-xs bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2.5 font-medium min-w-[180px]">
            <option value="All">All Cohorts</option>
            <option value="Summer Engineering">Summer Engineering</option>
            <option value="Next.js Framework Core">Next.js Framework Core</option>
            <option value="Product Design">Product Design</option>
            <option value="Systems & Rust Dev">Systems & Rust Dev</option>
            <option value="AI & Databases">AI & Databases</option>
            <option value="Frontend & DevRel">Frontend & DevRel</option>
            <option value="Solutions Engineering">Solutions Engineering</option>
            <option value="Vector DB & AI Search">Vector DB & AI Search</option>
        </select>
    </div>

    <!-- Recruiters Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <template x-for="r in filtered" :key="r.id">
            <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft flex flex-col justify-between hover:border-[#00B1AA] transition-colors">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3.5">
                            <span :class="r.imageBg" class="h-12 w-12 rounded-full flex items-center justify-center font-bold text-sm" x-text="r.initials"></span>
                            <div>
                                <h3 class="font-bold text-sm text-[#444444]" x-text="r.name"></h3>
                                <p class="text-xs text-[#7B7B7B] font-semibold" x-text="`${r.role} • ${r.company}`"></p>
                            </div>
                        </div>
                        <template x-if="r.active">
                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">Active</span>
                        </template>
                        <template x-if="!r.active">
                            <span class="inline-flex items-center rounded-full bg-amber-50 px-2 py-0.5 text-[10px] font-medium text-amber-700 ring-1 ring-inset ring-amber-600/20">Away</span>
                        </template>
                    </div>
                    
                    <div class="border-t border-[#E5E7EB] pt-4 mt-4 space-y-2 text-xs text-[#7B7B7B]">
                        <div class="flex justify-between">
                            <span>Cohort Focus</span>
                            <strong class="text-[#444444]" x-text="r.focus"></strong>
                        </div>
                        <div class="flex justify-between">
                            <span>Response Time</span>
                            <strong class="text-[#444444]" x-text="r.speed"></strong>
                        </div>
                        <div class="flex justify-between">
                            <span>Direct Email</span>
                            <code class="text-[10px] bg-zinc-50 px-1.5 py-0.5 rounded text-[#444444] font-mono" x-text="r.email"></code>
                        </div>
                    </div>
                </div>
                
                <a href="/internships/tracker" class="block w-full text-center text-xs font-semibold text-white bg-[#00B1AA] hover:bg-[#009c95] rounded py-2 mt-5 transition-colors shadow-soft">
                    <i class="fa-regular fa-comment mr-1.5"></i> Chat via Tracker
                </a>
            </div>
        </template>
    </div>

    <!-- Upcoming Ask-Me-Anything Calendar -->
    <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft space-y-6">
        <div>
            <h2 class="text-lg font-bold text-[#444444]">Upcoming Ask-Me-Anything (AMA) Virtual Chats</h2>
            <p class="text-xs text-[#7B7B7B] mt-1">Direct video sessions with program leads to learn about engineering standards, resume screening, and portfolio reviews.</p>
        </div>
        <div class="divide-y divide-[#E5E7EB]">
            <!-- Event 1 -->
            <div class="py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex gap-4 items-center">
                    <div class="h-12 w-12 rounded bg-[#00B1AA]/10 flex flex-col justify-center items-center text-[#00B1AA]">
                        <span class="text-xs font-bold leading-none">JUN</span>
                        <span class="text-lg font-black leading-tight">04</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#444444]">Cracking the Stripe Technical Screen</h4>
                        <p class="text-xs text-[#7B7B7B]">Hosted by Sarah Keates (Stripe) &bull; 2:00 PM EST (Virtual Zoom)</p>
                    </div>
                </div>
                <button 
                    @click="if(!rsvped.includes(1)) { rsvped.push(1); alert('RSVP successful! Zoom link sent to your registered academic email.') }" 
                    :class="rsvped.includes(1) ? 'bg-zinc-100 text-zinc-500 cursor-default' : 'bg-[#444444] text-white hover:bg-zinc-800'"
                    class="text-xs font-bold px-4 py-2 rounded transition-colors"
                    x-text="rsvped.includes(1) ? 'RSVP\'d' : 'Reserve Spot'"
                ></button>
            </div>
            <!-- Event 2 -->
            <div class="py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex gap-4 items-center">
                    <div class="h-12 w-12 rounded bg-[#00B1AA]/10 flex flex-col justify-center items-center text-[#00B1AA]">
                        <span class="text-xs font-bold leading-none">JUN</span>
                        <span class="text-lg font-black leading-tight">10</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#444444]">Figma Product Design Portfolio Walkthrough</h4>
                        <p class="text-xs text-[#7B7B7B]">Hosted by Elena Rostova (Figma) &bull; 1:00 PM PST (Virtual Zoom)</p>
                    </div>
                </div>
                <button 
                    @click="if(!rsvped.includes(2)) { rsvped.push(2); alert('RSVP successful! Zoom link sent to your registered academic email.') }" 
                    :class="rsvped.includes(2) ? 'bg-zinc-100 text-zinc-500 cursor-default' : 'bg-[#444444] text-white hover:bg-zinc-800'"
                    class="text-xs font-bold px-4 py-2 rounded transition-colors"
                    x-text="rsvped.includes(2) ? 'RSVP\'d' : 'Reserve Spot'"
                ></button>
            </div>
            <!-- Event 3 -->
            <div class="py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex gap-4 items-center">
                    <div class="h-12 w-12 rounded bg-[#00B1AA]/10 flex flex-col justify-center items-center text-[#00B1AA]">
                        <span class="text-xs font-bold leading-none">JUN</span>
                        <span class="text-lg font-black leading-tight">18</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#444444]">Supabase: Open Source Contributions as an Intern</h4>
                        <p class="text-xs text-[#7B7B7B]">Hosted by Chloe Vance (Supabase) &bull; 11:00 AM EST (Virtual Zoom)</p>
                    </div>
                </div>
                <button 
                    @click="if(!rsvped.includes(3)) { rsvped.push(3); alert('RSVP successful! Zoom link sent to your registered academic email.') }" 
                    :class="rsvped.includes(3) ? 'bg-zinc-100 text-zinc-500 cursor-default' : 'bg-[#444444] text-white hover:bg-zinc-800'"
                    class="text-xs font-bold px-4 py-2 rounded transition-colors"
                    x-text="rsvped.includes(3) ? 'RSVP\'d' : 'Reserve Spot'"
                ></button>
            </div>
        </div>
    </div>

    <!-- Recruiter FAQ and Advice -->
    <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft space-y-6">
        <h2 class="text-lg font-bold text-[#444444]">Recruiter FAQs & Guidance</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2">
                <h3 class="font-bold text-zinc-800 text-sm">How are matches evaluated by leads?</h3>
                <p>Leads screen profiles according to target skillset alignments, verified project links, and direct faculty reference check scores. We strongly discourage blind generic resumes; highlight project commits and specific stack competence instead.</p>
            </div>
            <div class="space-y-2">
                <h3 class="font-bold text-zinc-800 text-sm">Should I email recruiters directly?</h3>
                <p>While email addresses are listed for verified verification requests, recruiters prefer applications and messages routed directly via the Interlink Tracker. This aggregates code portfolios, academic transcripts, and interview notes in one workspace.</p>
            </div>
            <div class="space-y-2">
                <h3 class="font-bold text-zinc-800 text-sm">What is the significance of the Response Time?</h3>
                <p>Response times show historical metrics for average recruiter message read-and-reply states. Our platform mandates responsive cycles under 72 hours for active cohorts. If an lead fails to respond, system alerts ping alternative coordinators automatically.</p>
            </div>
            <div class="space-y-2">
                <h3 class="font-bold text-zinc-800 text-sm">Are non-local students eligible for remote cohorts?</h3>
                <p>Absolutely. Most partners (Vercel, Supabase, Linear, Resend) operate globally and handle CPT/OPT academic visa authorizations for eligible university students. Coordinate direct requirements with the corresponding university program lead.</p>
            </div>
        </div>
    </div>

</div>
@endsection

