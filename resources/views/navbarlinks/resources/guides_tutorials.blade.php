@extends('layouts.public')

@section('title', 'Guides & Checklists — Interlink')
@section('meta_description', 'Access printable checklists and standard manuals covering F-1 visa CPT rules, internship evaluations, and credit tracking.')

@section('content')
<div x-data="{
    searchQuery: '',
    selectedCategory: 'all',
    guides: [
        { id: 1, category: 'legal', fileType: 'PDF', fileSize: '420 KB', title: 'F-1 Student CPT Checklist', description: 'A comprehensive timeline checklist for international students. Guides you on syncing with your DSO, formatting offer letter clauses, and submitting CPT parameters.' },
        { id: 2, category: 'credits', fileType: 'DOCX', fileSize: '180 KB', title: 'Advisor Credit Alignment Sheet', description: 'Ensure your placement matches course criteria. Contains template syllabus mappings, course code registration steps, and manager check-in timelines.' },
        { id: 3, category: 'credits', fileType: 'PDF', fileSize: '320 KB', title: 'Weekly Placement Log Logbook Template', description: 'A standardized logging structure to track engineering metrics, blockers, pull requests, and weekly mentor signs.' },
        { id: 4, category: 'recruiting', fileType: 'PDF', fileSize: '1.2 MB', title: 'Recruiter Cohort Onboarding Toolkit', description: 'Comprehensive documentation for managers setting up mentorship cycles, structuring standups, and filing evaluations.' },
        { id: 5, category: 'resumes', fileType: 'MD', fileSize: '12 KB', title: 'Resume Blueprint Markdown Template', description: 'Clean, ATS-compliant raw Markdown file optimized for technical parsers and registrar single sign-on mapping.' },
        { id: 6, category: 'interviews', fileType: 'PDF', fileSize: '850 KB', title: 'System Design Coding Cheat Sheet', description: 'Review sheet covering distributed transactions, ACID database limits, vector indexing, and reverse-proxy caches.' },
        { id: 7, category: 'legal', fileType: 'PDF', fileSize: '290 KB', title: 'OPT STEM Extension Compliance Checklist', description: 'Full compliance log guiding international graduates on employer reporting, Form I-983 reviews, and training plans.' }
    ],
    get filtered() {
        return this.guides.filter(g => {
            const matchesCategory = this.selectedCategory === 'all' || g.category === this.selectedCategory;
            const matchesQuery = !this.searchQuery || 
                                 g.title.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                 g.description.toLowerCase().includes(this.searchQuery.toLowerCase());
            return matchesCategory && matchesQuery;
        });
    }
}" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <h1 class="text-3xl font-bold tracking-tight text-[#444444] sm:truncate sm:text-4xl">Platform Guides & Checklists</h1>
        <p class="text-sm text-[#7B7B7B] font-medium leading-relaxed">Standard checklists and onboarding templates ready for download.</p>
        
        <div class="mt-6 relative max-w-lg mx-auto">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-[#7B7B7B] text-xs"></i>
            <input 
                x-model="searchQuery" 
                type="text" 
                placeholder="Search download files..." 
                class="w-full pl-9 pr-4 py-2 text-xs border border-[#E5E7EB] bg-white rounded placeholder-[#7B7B7B] focus:bg-white shadow-soft transition-colors focus:outline-none focus:ring-1 focus:ring-[#00B1AA]"
            >
        </div>
    </div>

    <!-- Category selector -->
    <div class="flex flex-wrap justify-center gap-2 text-xs font-semibold">
        <button @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 bg-white border border-[#E5E7EB]'" class="px-3.5 py-2 rounded transition-colors shadow-soft">All Resources</button>
        <button @click="selectedCategory = 'legal'" :class="selectedCategory === 'legal' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 bg-white border border-[#E5E7EB]'" class="px-3.5 py-2 rounded transition-colors shadow-soft">Legal & Visas</button>
        <button @click="selectedCategory = 'credits'" :class="selectedCategory === 'credits' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 bg-white border border-[#E5E7EB]'" class="px-3.5 py-2 rounded transition-colors shadow-soft">University Credits</button>
        <button @click="selectedCategory = 'recruiting'" :class="selectedCategory === 'recruiting' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 bg-white border border-[#E5E7EB]'" class="px-3.5 py-2 rounded transition-colors shadow-soft">Recruiter Toolkits</button>
        <button @click="selectedCategory = 'resumes'" :class="selectedCategory === 'resumes' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 bg-white border border-[#E5E7EB]'" class="px-3.5 py-2 rounded transition-colors shadow-soft">Resume Blueprints</button>
    </div>

    <!-- Guides list -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-sm">
        <template x-for="g in filtered" :key="g.id">
            <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft hover:border-[#00B1AA] transition-all flex flex-col justify-between">
                <div class="space-y-3">
                    <span :class="g.category === 'legal' ? 'bg-indigo-50 text-indigo-700 ring-indigo-600/10' : g.category === 'credits' ? 'bg-emerald-50 text-emerald-700 ring-emerald-600/10' : 'bg-zinc-50 text-zinc-700 ring-zinc-600/10'" class="text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider" x-text="g.category"></span>
                    <h3 class="font-bold text-sm text-[#444444]" x-text="g.title"></h3>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed" x-text="g.description"></p>
                </div>
                <div class="border-t border-zinc-100 pt-4 mt-5 flex justify-between items-center text-xs">
                    <span class="text-zinc-400 font-semibold" x-text="`${g.fileType} • ${g.fileSize}`"></span>
                    <a href="#" @click.prevent="alert(`Downloading ${g.title}...`)" class="text-[#00B1AA] font-bold hover:text-[#009c95] transition-colors"><i class="fa-solid fa-download mr-1"></i> Download</a>
                </div>
            </div>
        </template>
    </div>

    <!-- Request Custom Templates Help desk -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft text-center max-w-xl mx-auto space-y-4">
        <span class="text-[#00B1AA] text-2xl"><i class="fa-solid fa-circle-question"></i></span>
        <h4 class="font-bold text-sm text-[#444444]">Need institutional customizations?</h4>
        <p class="text-xs text-[#7B7B7B] leading-relaxed">
            If your university registrar requires specific evaluation variables, NDA templates, or hourly logs configurations, contact our academic operations desk to build custom compliance blueprints.
        </p>
        <a href="mailto:registrar@interlink.edu" class="inline-block bg-[#444444] hover:bg-zinc-800 text-white font-bold text-xs px-5 py-2.5 rounded transition-colors shadow-soft">
            Contact Registrar Support
        </a>
    </div>

</div>
@endsection

