@extends('layouts.public')

@section('title', 'Saved Internships — Interlink')
@section('meta_description', 'Review and apply to your saved internship positions. Track upcoming application deadlines and requirements.')

@section('content')
<div x-data="{
    savedItems: [
        { id: 1, title: 'Frontend Developer Intern', company: 'Vercel', location: 'Remote', stipend: '$55/hr', deadline: 'June 30, 2026', daysLeft: 4, logo: 'V', logoBg: 'bg-black' },
        { id: 2, title: 'Backend Systems Intern', company: 'Stripe', location: 'San Francisco, CA', stipend: '$62.50/hr', deadline: 'July 15, 2026', daysLeft: 16, logo: 'S', logoBg: 'bg-[#635bff]' },
        { id: 3, title: 'Product Design Intern', company: 'Figma', location: 'New York, NY', stipend: '$48/hr', deadline: 'July 10, 2026', daysLeft: 11, logo: 'F', logoBg: 'bg-[#f24e1e]' },
        { id: 4, title: 'Infrastructure & DB Intern', company: 'Supabase', location: 'Remote', stipend: '$50/hr', deadline: 'July 5, 2026', daysLeft: 9, logo: 'S', logoBg: 'bg-[#3ecf8e]' },
        { id: 5, title: 'ML Research Intern', company: 'Pinecone', location: 'Remote', stipend: '$65/hr', deadline: 'July 1, 2026', daysLeft: 5, logo: 'P', logoBg: 'bg-[#2b1b54]' }
    ],
    removeSaved(id) {
        this.savedItems = this.savedItems.filter(item => item.id !== id);
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5 mb-8">
        <h1 class="text-3xl font-bold leading-7 text-zinc-900 sm:truncate sm:text-4xl">Saved Opportunities</h1>
        <p class="mt-2 text-sm text-zinc-500 font-medium">Keep track of upcoming deadlines and requirements for roles you are preparing to apply for.</p>
    </div>

    <!-- Saved List Workspace -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Saved Listings Column (Left, 8 cols) -->
        <div class="lg:col-span-8 space-y-4">
            <template x-if="savedItems.length === 0">
                <div class="bg-white border border-zinc-200 rounded-xl p-12 text-center text-zinc-500 space-y-2">
                    <i class="fa-regular fa-bookmark text-3xl text-zinc-300"></i>
                    <p class="font-semibold text-sm">No saved opportunities yet.</p>
                    <p class="text-xs">Browse the internship feed and click bookmark tags to save roles here.</p>
                    <div class="pt-4">
                        <a href="/internships/browse" class="rounded-lg bg-zinc-900 px-4 py-2 text-xs font-semibold text-white hover:bg-zinc-800">Browse Jobs</a>
                    </div>
                </div>
            </template>

            <template x-for="item in savedItems" :key="item.id">
                <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft hover:border-zinc-300 transition-colors flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative">
                    <div class="flex items-center gap-4">
                        <div :class="item.logoBg" class="h-12 w-12 text-white font-bold rounded-lg flex items-center justify-center text-lg" x-text="item.logo"></div>
                        <div>
                            <h3 class="font-bold text-sm text-zinc-900" x-text="item.title"></h3>
                            <p class="text-xs text-zinc-500 font-semibold" x-text="item.company"></p>
                            
                            <div class="flex gap-2 mt-2 text-[10px] font-semibold text-zinc-400">
                                <span class="bg-zinc-100 text-zinc-700 px-2 py-0.5 rounded" x-text="item.location"></span>
                                <span class="bg-zinc-100 text-zinc-700 px-2 py-0.5 rounded" x-text="item.stipend"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Deadline / Actions -->
                    <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end border-t border-zinc-100 sm:border-t-0 pt-3 sm:pt-0">
                        <div class="text-left sm:text-right text-xs">
                            <span class="text-zinc-400 block font-medium">Apply deadline</span>
                            <strong class="text-zinc-800" x-text="item.deadline"></strong>
                            <span :class="item.daysLeft <= 7 ? 'text-red-600' : 'text-zinc-500'" class="block font-semibold mt-0.5 text-[10px]" x-text="`(${item.daysLeft} days remaining)`"></span>
                        </div>

                        <div class="flex gap-2">
                            <button @click="removeSaved(item.id)" class="text-zinc-400 hover:text-zinc-600 px-2 py-1.5 border border-zinc-200 rounded-lg hover:bg-zinc-50">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            <a href="/internships/browse" class="rounded-lg bg-zinc-900 px-3.5 py-1.5 text-xs font-semibold text-white hover:bg-zinc-800 shadow-soft">
                                Begin Application
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Compliance Sidebar Checklist (Right, 4 cols) -->
        <aside class="lg:col-span-4 space-y-6">
            <!-- Saved List Stats -->
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-4">
                <h3 class="font-bold text-zinc-900 text-xs uppercase tracking-wider border-b border-zinc-100 pb-1.5">Saved List Stats</h3>
                <div class="grid grid-cols-2 gap-4 text-xs font-medium text-zinc-600">
                    <div>
                        <span class="text-[10px] text-zinc-400 block uppercase">Saved Roles</span>
                        <span class="text-base font-bold text-zinc-900" x-text="savedItems.length"></span>
                    </div>
                    <div>
                        <span class="text-[10px] text-zinc-400 block uppercase">Avg. Stipend</span>
                        <span class="text-base font-bold text-emerald-600">$56.10/hr</span>
                    </div>
                </div>
            </div>

            <!-- Profile Checklist -->
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-4">
                <h3 class="font-bold text-zinc-900 text-xs uppercase tracking-wider border-b border-zinc-100 pb-1.5">Vetted Profile Completion</h3>
                <p class="text-[11px] text-zinc-500 leading-relaxed">Ensure your credentials are fully synced prior to submission to secure high-priority matching scores.</p>
                
                <div class="space-y-3.5 text-xs font-medium text-zinc-600">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600"></i>
                        <span>University GPA Transcript (Verified)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600"></i>
                        <span>GitHub Commit Sync completed</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-circle text-zinc-300"></i>
                        <span>Resume Build validation check</span>
                    </div>
                </div>
            </div>

            <!-- Recommended based on saved (New Sidebar Card) -->
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-4">
                <h3 class="font-bold text-zinc-900 text-xs uppercase tracking-wider border-b border-zinc-100 pb-1.5">Similar Opportunities</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-xs">
                        <div>
                            <span class="font-bold text-zinc-900 block">Full-Stack Dev Intern</span>
                            <span class="text-zinc-500">Retool &bull; San Francisco</span>
                        </div>
                        <span class="text-emerald-600 font-bold">$58/hr</span>
                    </div>
                    <div class="flex justify-between items-center text-xs border-t border-zinc-100 pt-3">
                        <div>
                            <span class="font-bold text-zinc-900 block">DevRel Advocate Intern</span>
                            <span class="text-zinc-500">Resend &bull; Remote</span>
                        </div>
                        <span class="text-emerald-600 font-bold">$45/hr</span>
                    </div>
                </div>
            </div>
        </aside>

    </div>

</div>
@endsection


