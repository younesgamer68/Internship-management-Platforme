@extends('layouts.public')

@section('title', 'Browse Internships — Interlink')
@section('meta_description', 'Search and filter active engineering, design, and product internships. Sort by compensation, location type, and match alignment.')

@section('content')
    <div x-data="{
        searchQuery: '',
        selectedWorkplace: 'All',
        selectedType: 'All',
        sortBy: 'match',
        savedIds: [],
        currentPage: 1,
        pageSize: 3,

        // Vercel, Stripe, Figma, Supabase, Linear, Loom
        internships: [
            { id: 1, title: 'Frontend Developer Intern', company: 'Vercel', location: 'Remote', workplace: 'Remote', type: 'Engineering', stipend: '$55/hr', stipendVal: 55, match: 96, date: '2 hours ago', deadline: 'June 30, 2026', applicants: 48, skills: ['React', 'Next.js', 'TypeScript', 'TailwindCSS'], logo: 'V', logoBg: 'bg-black' },
            { id: 2, title: 'Backend Systems Intern', company: 'Stripe', location: 'San Francisco, CA', workplace: 'Hybrid', type: 'Engineering', stipend: '$62.50/hr', stipendVal: 62.5, match: 91, date: '1 day ago', deadline: 'July 15, 2026', applicants: 112, skills: ['Go', 'PostgreSQL', 'Redis', 'REST APIs'], logo: 'S', logoBg: 'bg-[#635bff]' },
            { id: 3, title: 'Product Design Intern', company: 'Figma', location: 'New York, NY', workplace: 'Hybrid', type: 'Design', stipend: '$48/hr', stipendVal: 48, match: 88, date: '3 days ago', deadline: 'July 10, 2026', applicants: 89, skills: ['Figma', 'Prototyping', 'Design Systems'], logo: 'F', logoBg: 'bg-[#f24e1e]' },
            { id: 4, title: 'Infrastructure Intern', company: 'Supabase', location: 'Remote', workplace: 'Remote', type: 'Engineering', stipend: '$50/hr', stipendVal: 50, match: 85, date: '4 days ago', deadline: 'July 5, 2026', applicants: 32, skills: ['PostgreSQL', 'Docker', 'Go', 'Kubernetes'], logo: 'S', logoBg: 'bg-[#3ecf8e]' },
            { id: 5, title: 'Growth Operations Intern', company: 'Loom', location: 'San Francisco, CA', workplace: 'On-site', type: 'Product', stipend: '$35/hr', stipendVal: 35, match: 79, date: '5 days ago', deadline: 'June 25, 2026', applicants: 24, skills: ['Data Queries', 'Tableau', 'Operations'], logo: 'L', logoBg: 'bg-[#625df5]' },
            { id: 6, title: 'Technical PM Intern', company: 'Linear', location: 'Remote', workplace: 'Remote', type: 'Product', stipend: '$45/hr', stipendVal: 45, match: 92, date: '6 days ago', deadline: 'July 20, 2026', applicants: 57, skills: ['Agile', 'Product Roadmaps', 'Git'], logo: 'L', logoBg: 'bg-zinc-900 border border-zinc-700' },
            { id: 7, title: 'DevRel Advocate Intern', company: 'Resend', location: 'Remote', workplace: 'Remote', type: 'Engineering', stipend: '$45/hr', stipendVal: 45, match: 93, date: '1 week ago', deadline: 'July 20, 2026', applicants: 19, skills: ['React Email', 'Node.js', 'Technical Writing'], logo: 'R', logoBg: 'bg-zinc-800' },
            { id: 8, title: 'Full-Stack Developer Intern', company: 'Retool', location: 'San Francisco, CA', workplace: 'On-site', type: 'Engineering', stipend: '$58/hr', stipendVal: 58, match: 89, date: '1 week ago', deadline: 'July 22, 2026', applicants: 65, skills: ['React', 'TypeScript', 'Node.js', 'SQL'], logo: 'R', logoBg: 'bg-[#2563EB]' },
            { id: 9, title: 'Solutions Architect Intern', company: 'AWS', location: 'Seattle, WA', workplace: 'Hybrid', type: 'Engineering', stipend: '$52.50/hr', stipendVal: 52.5, match: 81, date: '1 week ago', deadline: 'July 18, 2026', applicants: 142, skills: ['AWS', 'Terraform', 'Python'], logo: 'A', logoBg: 'bg-[#ff9900]' },
            { id: 10, title: 'Security Operations Intern', company: 'Cloudflare', location: 'Austin, TX', workplace: 'On-site', type: 'Engineering', stipend: '$56/hr', stipendVal: 56, match: 87, date: '2 weeks ago', deadline: 'July 25, 2026', applicants: 49, skills: ['Rust', 'Network Security', 'Linux'], logo: 'C', logoBg: 'bg-[#f38020]' },
            { id: 11, title: 'ML Research Intern', company: 'Pinecone', location: 'Remote', workplace: 'Remote', type: 'Engineering', stipend: '$65/hr', stipendVal: 65, match: 94, date: '2 weeks ago', deadline: 'July 1, 2026', applicants: 88, skills: ['Python', 'PyTorch', 'Vector Databases'], logo: 'P', logoBg: 'bg-[#2b1b54]' },
            { id: 12, title: 'Database Engineer Intern', company: 'Prisma', location: 'Remote', workplace: 'Remote', type: 'Engineering', stipend: '$49/hr', stipendVal: 49, match: 86, date: '2 weeks ago', deadline: 'July 28, 2026', applicants: 34, skills: ['TypeScript', 'Rust', 'PostgreSQL'], logo: 'P', logoBg: 'bg-[#0c344b]' }
        ],

        recentlyViewed: [
            { id: 1, title: 'Frontend Developer', company: 'Vercel', location: 'Remote' },
            { id: 3, title: 'Product Design', company: 'Figma', location: 'NYC' },
            { id: 8, title: 'Full-Stack Developer', company: 'Retool', location: 'San Francisco' },
            { id: 11, title: 'ML Research Intern', company: 'Pinecone', location: 'Remote' }
        ],

        recommended: [
            { id: 2, title: 'Backend Systems Intern', company: 'Stripe', stipend: '$62.50/hr' },
            { id: 7, title: 'DevRel Advocate Intern', company: 'Resend', stipend: '$45/hr' },
            { id: 12, title: 'Database Engineer Intern', company: 'Prisma', stipend: '$49/hr' }
        ],

        toggleSave(id) {
            if (this.savedIds.includes(id)) {
                this.savedIds = this.savedIds.filter(savedId => savedId !== id);
            } else {
                this.savedIds.push(id);
            }
        },
        get filteredList() {
            return this.internships.filter(item => {
                if (this.searchQuery && !item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) && !item.company.toLowerCase().includes(this.searchQuery.toLowerCase())) {
                    return false;
                }
                if (this.selectedWorkplace !== 'All' && item.workplace !== this.selectedWorkplace) {
                    return false;
                }
                if (this.selectedType !== 'All' && item.type !== this.selectedType) {
                    return false;
                }
                return true;
            });
        },
        get sortedList() {
            let results = [...this.filteredList];
            if (this.sortBy === 'match') {
                results.sort((a, b) => b.match - a.match);
            } else if (this.sortBy === 'stipend') {
                results.sort((a, b) => b.stipendVal - a.stipendVal);
            } else if (this.sortBy === 'date') {
                results.sort((a, b) => a.id - b.id);
            }
            return results;
        },
        get totalPages() {
            return Math.ceil(this.sortedList.length / this.pageSize) || 1;
        },
        get paginatedList() {
            // Adjust page range if filters change size
            if (this.currentPage > this.totalPages) {
                this.currentPage = this.totalPages;
            }
            const start = (this.currentPage - 1) * this.pageSize;
            return this.sortedList.slice(start, start + this.pageSize);
        }
    }" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        <!-- Top Banner Summary -->
        <div class="border-b border-[#E5E7EB] pb-5 mb-8">
            <h1 class="text-2xl font-bold tracking-tight text-[#444444] sm:text-3xl">{{ __('Search Opportunities') }}</h1>
            <p class="mt-1.5 text-xs text-[#7B7B7B] font-medium font-sans">
                {{ __('Find engineering, design, and product internships linked directly to university credit systems.') }}
            </p>
        </div>

        <!-- Filters & Sort Board -->
        <div class="flex flex-col md:flex-row gap-4 bg-white border border-[#E5E7EB] rounded p-4 shadow-soft mb-8">
            <div class="flex-grow relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-[#7B7B7B] text-xs"></i>
                <input x-model="searchQuery" @input="currentPage = 1" type="text"
                    placeholder="{{ __('Search position titles, skills, or companies...') }}"
                    class="w-full pl-9 pr-4 py-2 text-xs border border-[#E5E7EB] bg-[#F8FAFA] rounded placeholder-[#7B7B7B] focus:bg-white transition-colors">
            </div>
            <div class="flex flex-wrap gap-2.5">
                <select x-model="selectedWorkplace" @change="currentPage = 1"
                    class="text-xs bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium min-w-[130px]">
                    <option value="All">{{ __('All Locations') }}</option>
                    <option value="Remote">{{ __('Remote Only') }}</option>
                    <option value="Hybrid">{{ __('Hybrid') }}</option>
                    <option value="On-site">{{ __('On-site') }}</option>
                </select>
                <select x-model="selectedType" @change="currentPage = 1"
                    class="text-xs bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium min-w-[130px]">
                    <option value="All">{{ __('All Fields') }}</option>
                    <option value="Engineering">{{ __('Engineering') }}</option>
                    <option value="Design">{{ __('Product Design') }}</option>
                    <option value="Product">{{ __('Product PM') }}</option>
                </select>
                <select x-model="sortBy"
                    class="text-xs bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium min-w-[140px]">
                    <option value="match">{{ __('Sort by: Match Score') }}</option>
                    <option value="stipend">{{ __('Sort by: Stipend (High)') }}</option>
                    <option value="date">{{ __('Sort by: Date Posted') }}</option>
                </select>
            </div>
        </div>

        <!-- Main Content Layout Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Listings Area (Left, 8 cols) -->
            <div class="lg:col-span-8 space-y-6">

                <div
                    class="flex justify-between items-center text-[11px] text-[#7B7B7B] font-semibold uppercase tracking-wider px-1">
                    <span x-text="`${sortedList.length} total roles matching`"></span>
                    <span x-text="`Page ${currentPage} of ${totalPages}`"></span>
                </div>

                <!-- Empty State -->
                <template x-if="paginatedList.length === 0">
                    <div
                        class="bg-white border border-[#E5E7EB] rounded p-12 text-center text-[#7B7B7B] space-y-3 shadow-soft">
                        <i class="fa-regular fa-folder-open text-3xl text-zinc-300"></i>
                        <p class="font-bold text-sm text-[#444444]">{{ __('No internships found') }}</p>
                        <p class="text-xs text-[#7B7B7B]">
                            {{ __('Adjust your search query or clear location filters to see more results.') }}</p>
                    </div>
                </template>

                <!-- Card Loop -->
                <div class="space-y-4">
                    <template x-for="item in paginatedList" :key="item.id">
                        <div
                            class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft hover:border-[#00B1AA] transition-colors relative flex flex-col justify-between">

                            <!-- Header panel details -->
                            <div class="flex justify-between items-start gap-4">
                                <div class="flex items-start gap-4">
                                    <div :class="item.logoBg"
                                        class="h-12 w-12 rounded text-white font-extrabold flex items-center justify-center text-lg z-10 shrink-0"
                                        x-text="item.logo"></div>
                                    <div class="space-y-0.5">
                                        <h3
                                            class="font-bold text-base text-[#444444] hover:text-[#00B1AA] transition-colors">
                                            <a href="/internships/browse" x-text="item.title"></a>
                                        </h3>
                                        <p class="text-xs text-[#7B7B7B] font-semibold" x-text="item.company"></p>
                                    </div>
                                </div>

                                <button @click="toggleSave(item.id)"
                                    class="text-[#7B7B7B] hover:text-[#00B1AA] transition-colors p-1">
                                    <i
                                        :class="savedIds.includes(item.id) ? 'fa-solid fa-bookmark text-[#00B1AA]' : 'fa-regular fa-bookmark'"></i>
                                </button>
                            </div>

                            <!-- Card Specifications Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 text-xs border-y border-zinc-100 py-3.5">
                                <div>
                                    <span
                                        class="block text-[10px] font-bold text-[#7B7B7B] uppercase tracking-wider">{{ __('Salary / Stipend') }}</span>
                                    <strong class="text-emerald-600 block mt-0.5" x-text="item.stipend"></strong>
                                </div>
                                <div>
                                    <span
                                        class="block text-[10px] font-bold text-[#7B7B7B] uppercase tracking-wider">{{ __('Workplace') }}</span>
                                    <span class="text-[#444444] font-medium block mt-0.5" x-text="item.workplace"></span>
                                </div>
                                <div>
                                    <span
                                        class="block text-[10px] font-bold text-[#7B7B7B] uppercase tracking-wider">{{ __('Location') }}</span>
                                    <span class="text-[#444444] font-medium block mt-0.5 truncate"
                                        x-text="item.location"></span>
                                </div>
                                <div>
                                    <span
                                        class="block text-[10px] font-bold text-[#7B7B7B] uppercase tracking-wider">{{ __('Duration') }}</span>
                                    <span class="text-[#444444] font-medium block mt-0.5" x-text="item.duration"></span>
                                </div>
                            </div>

                            <!-- Skills block tag wrapper -->
                            <div class="flex flex-wrap gap-1.5 mt-4">
                                <template x-for="skill in item.skills" :key="skill">
                                    <span
                                        class="bg-[#F8FAFA] border border-[#E5E7EB] text-[#444444] text-[10px] font-semibold px-2 py-0.5 rounded"
                                        x-text="skill"></span>
                                </template>
                            </div>

                            <!-- Footer metadata details -->
                            <div
                                class="border-t border-[#E5E7EB] pt-4 mt-5 flex flex-wrap gap-y-2 justify-between items-center text-[10px] text-[#7B7B7B]">
                                <div class="flex gap-4 items-center">
                                    <span class="font-bold text-[#00B1AA]" x-text="`${item.match}% stack match`"></span>
                                    <span x-text="`Deadline: ${item.deadline}`"></span>
                                    <span x-text="`${item.applicants} applicants`"></span>
                                </div>

                                <div class="flex gap-2">
                                    <button @click="alert('Applied via Interlink Direct Match.')"
                                        class="rounded bg-[#00B1AA] hover:bg-[#009c95] text-white text-[11px] font-semibold px-3 py-1 shadow-soft transition-colors">
                                        {{ __('Quick Apply') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </template>
                </div>

                <!-- Functional Pagination Controls -->
                <div class="mt-8 flex justify-between items-center border-t border-[#E5E7EB] pt-6 text-xs font-semibold">
                    <button @click="if (currentPage > 1) currentPage--" :disabled="currentPage === 1"
                        :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-zinc-100'"
                        class="px-3.5 py-1.5 border border-[#E5E7EB] rounded text-[#444444] transition-colors">
                        &larr; {{ __('Previous') }}
                    </button>

                    <div class="flex gap-1.5">
                        <template x-for="p in totalPages" :key="p">
                            <button @click="currentPage = p"
                                :class="currentPage === p ? 'bg-[#00B1AA] text-white' : 'hover:bg-zinc-100 text-[#444444] border border-[#E5E7EB]'"
                                class="h-8 w-8 rounded flex items-center justify-center transition-colors"
                                x-text="p"></button>
                        </template>
                    </div>

                    <button @click="if (currentPage < totalPages) currentPage++" :disabled="currentPage === totalPages"
                        :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-zinc-100'"
                        class="px-3.5 py-1.5 border border-[#E5E7EB] rounded text-[#444444] transition-colors">
                        {{ __('Next') }} &rarr;
                    </button>
                </div>

            </div>

            <!-- Sidebar panels (Right, 4 cols) -->
            <aside class="lg:col-span-4 space-y-6">

                <!-- Recently viewed listings -->
                <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft space-y-3.5">
                    <h3 class="font-bold text-xs uppercase tracking-wider text-[#444444] border-b border-zinc-100 pb-1.5">
                        {{ __('Recently Viewed') }}</h3>
                    <div class="space-y-3">
                        <template x-for="r in recentlyViewed" :key="r.id">
                            <div class="flex justify-between items-center text-xs">
                                <div>
                                    <span class="font-bold text-[#444444] block" x-text="r.title"></span>
                                    <span class="text-[#7B7B7B]" x-text="`${r.company} &bull; ${r.location}`"></span>
                                </div>
                                <a href="/internships/browse" class="text-[#00B1AA] font-bold">{{ __('View') }}</a>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Recommended list -->
                <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft space-y-3.5">
                    <h3 class="font-bold text-xs uppercase tracking-wider text-[#444444] border-b border-zinc-100 pb-1.5">
                        {{ __('Recommended For You') }}</h3>
                    <div class="space-y-3">
                        <template x-for="rec in recommended" :key="rec.id">
                            <div class="text-xs">
                                <span class="font-bold text-[#444444] block" x-text="rec.title"></span>
                                <span class="text-[#7B7B7B]" x-text="rec.company"></span>
                                <div class="flex justify-between items-center mt-2.5">
                                    <span class="font-bold text-emerald-600" x-text="rec.stipend"></span>
                                    <a href="/internships/browse"
                                        class="bg-[#00B1AA] text-white text-[10px] font-bold px-2 py-0.5 rounded">{{ __('Apply') }}</a>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Application Guidelines & Tips (New Sidebar Card) -->
                <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft space-y-3.5">
                    <h3 class="font-bold text-xs uppercase tracking-wider text-[#444444] border-b border-zinc-100 pb-1.5">
                        {{ __('Placement Checklist') }}</h3>
                    <ul class="space-y-3 text-xs text-[#7B7B7B] font-medium leading-relaxed">
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-circle-check text-[#00B1AA] mt-0.5"></i>
                            <span><strong>{{ __('University Email Sync:') }}</strong>
                                {{ __('Must be completed to access credit audits.') }}</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-circle-check text-[#00B1AA] mt-0.5"></i>
                            <span><strong>{{ __('GitHub Parser Connected:') }}</strong>
                                {{ __('Reads repositories to match tech stacks.') }}</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-circle-check text-[#00B1AA] mt-0.5"></i>
                            <span><strong>{{ __('Official Transcript:') }}</strong>
                                {{ __('Must upload a verified PDF for grade match scores.') }}</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-circle-check text-zinc-300 mt-0.5"></i>
                            <span><strong>{{ __('CPT Syllabus Alignment:') }}</strong>
                                {{ __('Ensure syllabus is mapped by your DSO/faculty.') }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Quick Platform Help (New Sidebar Card) -->
                <div class="bg-gradient-to-br from-zinc-900 to-zinc-800 text-white rounded p-5 shadow-soft space-y-4">
                    <div class="space-y-1.5">
                        <h3 class="font-bold text-xs uppercase tracking-wider text-[#00B1AA]">
                            {{ __('Need Visa Sponsorship?') }}</h3>
                        <p class="text-[11px] text-zinc-400 leading-relaxed">
                            {{ __('Interlink hosts automated CPT offer matching to guarantee immediate university registrar validation. Contact DSO support through our guides portals.') }}
                        </p>
                    </div>
                    <a href="/how-it-works/faq"
                        class="block text-center text-xs font-bold bg-white text-zinc-900 rounded py-2 hover:bg-zinc-100 transition-colors">
                        {{ __('Read Compliance FAQ') }}
                    </a>
                </div>

            </aside>

        </div>

    </div>
@endsection