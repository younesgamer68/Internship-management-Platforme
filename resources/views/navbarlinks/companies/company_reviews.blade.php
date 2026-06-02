@extends('layouts.public')

@section('title', 'Company Reviews & Ratings — Interlink')
@section('meta_description', 'Read verified reviews from students who completed internships at Stripe, Vercel, and Figma. View ratings on work culture and return offer rates.')

@section('content')
<div x-data="{
    searchCompany: 'All',
    selectedRating: 'All',
    draftCompany: 'Stripe',
    draftRole: 'Frontend Developer Intern',
    draftCohort: 'Summer 2026',
    draftRating: 5,
    draftContent: 'The mentorship here is second to none. I was deploying code to production on day two, and had dedicated 1:1 syncs with the team lead every morning.',
    draftStipend: '55.00',
    draftConversion: 'Conversion Offer Accepted',
    reviews: [
        { id: 1, company: 'Stripe', role: 'API Core Developer Intern', author: 'Liam Bennett', cohort: 'Summer Cohort 2025', rating: 5, content: 'Stripe has an incredibly rigorous engineering culture. The codebase layout is clean and the team is completely open to review feedback. I had weekly 1:1 checkins with my mentor. We migrated high-throughput transactional ledgers. Secured my full-time conversion.', stipend: '62.50', conversion: 'Conversion Offer Accepted' },
        { id: 2, company: 'Figma', role: 'Product Design Intern', author: 'Emily Chen', cohort: 'Summer Cohort 2025', rating: 4.7, content: 'Figma is very product-focused. Designers are expected to understand technical code constraints and communicate frequently with engineers. Mentors were accessible, although weekly deadlines were fast-paced.', stipend: '48.00', conversion: 'Conversion Offer Accepted' },
        { id: 3, company: 'Vercel', role: 'Next.js Framework Core Intern', author: 'Alex Rivera', cohort: 'Fall Cohort 2025', rating: 5, content: 'Working on core open-source frameworks like Next.js was a dream. The Vercel team has a high bar for code quality, and working alongside developers who literally wrote the framework is inspiring. Remote culture is very healthy, with async-first documentation workflows.', stipend: '58.00', conversion: 'Conversion Offer Accepted' },
        { id: 4, company: 'Linear', role: 'Systems & Rust Intern', author: 'Siddharth Patel', cohort: 'Summer Cohort 2025', rating: 4.9, content: 'Linear is tiny but insanely high leverage. The application speed and keyboard shortcut fidelity are treated as religious requirements. Got to write a low-level desktop client cache layer using Rust. Loved the extreme autonomy.', stipend: '50.00', conversion: 'Conversion Offer Pending' },
        { id: 5, company: 'Supabase', role: 'Database & Auth Intern', author: 'Sofia Alvarez', cohort: 'Winter Cohort 2025', rating: 4.8, content: 'Great culture, remote-first. Spent my internship writing custom PostgreSQL extensions and optimizing pg_graphql resolvers. If you love SQL and open-source infrastructure, there is no better company to learn from.', stipend: '52.00', conversion: 'Conversion Offer Accepted' },
        { id: 6, company: 'Resend', role: 'Frontend & Growth Intern', author: 'Jack Thornton', cohort: 'Summer Cohort 2025', rating: 4.6, content: 'Fast moving startup environment. I owned the email template editor redesign. Had to write high-fidelity React render modules. Very short loop from design to prod deployment. Got direct feedback from the CEO.', stipend: '45.00', conversion: 'No Offer / Went to Grad School' }
    ],
    get filteredReviews() {
        return this.reviews.filter(r => {
            const matchesCompany = this.searchCompany === 'All' || r.company === this.searchCompany;
            const matchesRating = this.selectedRating === 'All' || 
                                  (this.selectedRating === '5' && r.rating >= 4.9) ||
                                  (this.selectedRating === '4' && r.rating >= 3.9 && r.rating < 4.9);
            return matchesCompany && matchesRating;
        });
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-10">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5 mb-8 md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h1 class="text-3xl font-bold leading-7 text-[#444444] sm:truncate sm:text-4xl">{{ __('Student Reviews & Ratings') }}</h1>
            <p class="mt-2 text-sm text-[#7B7B7B] font-medium">{{ __('Read reviews from students who completed placements at partner startups. Vetted for authenticity.') }}</p>
        </div>
    </div>

    <!-- Overall Rating Metrics Dashboard -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-sm">
        <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft text-center space-y-1">
            <span class="text-xs text-[#7B7B7B] font-bold uppercase block">{{ __('Average Work Culture') }}</span>
            <p class="text-4xl font-extrabold text-[#00B1AA]">4.8 / 5.0</p>
            <span class="text-[10px] text-[#7B7B7B] block">{{ __('Based on 280+ post-internship logs') }}</span>
        </div>
        <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft text-center space-y-1">
            <span class="text-xs text-[#7B7B7B] font-bold uppercase block">{{ __('Return Offer Rate') }}</span>
            <p class="text-4xl font-extrabold text-zinc-900">89.4%</p>
            <span class="text-[10px] text-[#7B7B7B] block">{{ __('Full-time conversion loops signed') }}</span>
        </div>
        <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft text-center space-y-1">
            <span class="text-xs text-[#7B7B7B] font-bold uppercase block">{{ __('Stipend Compliance') }}</span>
            <p class="text-4xl font-extrabold text-emerald-600">{{ __('100% Verified') }}</p>
            <span class="text-[10px] text-[#7B7B7B] block">{{ __('Zero occurrences of sub-minimum rates') }}</span>
        </div>
        <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft text-center space-y-1">
            <span class="text-xs text-[#7B7B7B] font-bold uppercase block">{{ __('Net Promoter Score') }}</span>
            <p class="text-4xl font-extrabold text-[#00B1AA]">84.0</p>
            <span class="text-[10px] text-[#7B7B7B] block">{{ __('Strongly recommended by student alumni') }}</span>
        </div>
    </div>

    <!-- Rating Distribution & Breakdown -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white border border-[#E5E7EB] rounded p-6 shadow-soft">
        <div class="space-y-3 col-span-2">
            <h3 class="text-sm font-bold text-[#444444]">{{ __('Detailed Ratings Distribution') }}</h3>
            <!-- Row 5 Star -->
            <div class="flex items-center text-xs text-[#7B7B7B] gap-3">
                <span class="w-10 font-medium">{{ __('5 star') }}</span>
                <div class="flex-grow h-2.5 bg-zinc-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#00B1AA]" style="width: 78%"></div>
                </div>
                <span class="w-8 text-right font-bold text-[#444444]">78%</span>
            </div>
            <!-- Row 4 Star -->
            <div class="flex items-center text-xs text-[#7B7B7B] gap-3">
                <span class="w-10 font-medium">{{ __('4 star') }}</span>
                <div class="flex-grow h-2.5 bg-zinc-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#00B1AA]" style="width: 16%"></div>
                </div>
                <span class="w-8 text-right font-bold text-[#444444]">16%</span>
            </div>
            <!-- Row 3 Star -->
            <div class="flex items-center text-xs text-[#7B7B7B] gap-3">
                <span class="w-10 font-medium">{{ __('3 star') }}</span>
                <div class="flex-grow h-2.5 bg-zinc-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#00B1AA]" style="width: 4%"></div>
                </div>
                <span class="w-8 text-right font-bold text-[#444444]">4%</span>
            </div>
            <!-- Row 2 Star -->
            <div class="flex items-center text-xs text-[#7B7B7B] gap-3">
                <span class="w-10 font-medium">{{ __('2 star') }}</span>
                <div class="flex-grow h-2.5 bg-zinc-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#00B1AA]" style="width: 2%"></div>
                </div>
                <span class="w-8 text-right font-bold text-[#444444]">2%</span>
            </div>
            <!-- Row 1 Star -->
            <div class="flex items-center text-xs text-[#7B7B7B] gap-3">
                <span class="w-10 font-medium">{{ __('1 star') }}</span>
                <div class="flex-grow h-2.5 bg-zinc-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#00B1AA]" style="width: 0%"></div>
                </div>
                <span class="w-8 text-right font-bold text-[#444444]">0%</span>
            </div>
        </div>
        <div class="border-t md:border-t-0 md:border-l border-[#E5E7EB] pt-4 md:pt-0 md:pl-6 flex flex-col justify-center space-y-3">
            <h4 class="text-xs font-bold text-[#444444]">{{ __('Core Strengths Voted by Interns:') }}</h4>
            <ul class="text-xs text-[#7B7B7B] space-y-2">
                <li class="flex items-center gap-2"><i class="fa-solid fa-square-check text-[#00B1AA]"></i> {{ __('Direct Production Access') }}</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-square-check text-[#00B1AA]"></i> {{ __('Weekly Mentor 1:1s') }}</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-square-check text-[#00B1AA]"></i> {{ __('Flexible Working Hours') }}</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-square-check text-[#00B1AA]"></i> {{ __('Modern Technology Stacks') }}</li>
            </ul>
        </div>
    </div>

    <!-- Review System Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Side: Interactive Search Filters & Draft Review Form -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Filters -->
            <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft space-y-4">
                <h3 class="text-xs font-bold text-[#444444] uppercase tracking-wider">{{ __('Filter Reviews') }}</h3>
                <div class="space-y-3 text-xs">
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Company') }}</label>
                        <select x-model="searchCompany" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium">
                            <option value="All">{{ __('All Companies') }}</option>
                            <option value="Stripe">{{ __('Stripe') }}</option>
                            <option value="Figma">{{ __('Figma') }}</option>
                            <option value="Vercel">{{ __('Vercel') }}</option>
                            <option value="Linear">{{ __('Linear') }}</option>
                            <option value="Supabase">{{ __('Supabase') }}</option>
                            <option value="Resend">{{ __('Resend') }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Rating Rating') }}</label>
                        <select x-model="selectedRating" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2 font-medium">
                            <option value="All">{{ __('All Ratings') }}</option>
                            <option value="5">{{ __('Excellent (4.9 - 5.0)') }}</option>
                            <option value="4">{{ __('Very Good (3.9 - 4.8)') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Interactive Draft Review Form -->
            <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft space-y-4">
                <div>
                    <h3 class="text-xs font-bold text-[#444444] uppercase tracking-wider">{{ __('Leave a Review') }}</h3>
                    <p class="text-[10px] text-[#7B7B7B] mt-0.5">{{ __('Mock draft a review to see live UI preview updates.') }}</p>
                </div>
                <div class="space-y-3 text-xs">
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Company') }}</label>
                        <select x-model="draftCompany" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-1.5 font-medium">
                            <option value="Stripe">{{ __('Stripe') }}</option>
                            <option value="Figma">{{ __('Figma') }}</option>
                            <option value="Vercel">{{ __('Vercel') }}</option>
                            <option value="Linear">{{ __('Linear') }}</option>
                            <option value="Supabase">{{ __('Supabase') }}</option>
                            <option value="Resend">{{ __('Resend') }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Role Title') }}</label>
                        <input x-model="draftRole" type="text" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-1.5 font-medium">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-zinc-500 mb-1">{{ __('Stipend ($/hr)') }}</label>
                            <input x-model="draftStipend" type="text" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-1.5 font-medium">
                        </div>
                        <div>
                            <label class="block text-zinc-500 mb-1">{{ __('Rating (1-5)') }}</label>
                            <input x-model.number="draftRating" type="number" step="0.1" min="1" max="5" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-1.5 font-medium">
                        </div>
                    </div>
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Return Offer Status') }}</label>
                        <select x-model="draftConversion" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-1.5 font-medium">
                            <option value="Conversion Offer Accepted">{{ __('Accepted') }}</option>
                            <option value="Conversion Offer Pending">{{ __('Pending Decision') }}</option>
                            <option value="No Offer / Went to Grad School">{{ __('No Offer') }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-zinc-500 mb-1">{{ __('Feedback Description') }}</label>
                        <textarea x-model="draftContent" rows="3" class="w-full bg-[#F8FAFA] border border-[#E5E7EB] rounded p-1.5 font-medium leading-relaxed resize-none"></textarea>
                    </div>
                    <button @click="reviews.unshift({ id: Date.now(), company: draftCompany, role: draftRole, author: 'Anonymous Scholar', cohort: draftCohort, rating: draftRating, content: draftContent, stipend: draftStipend, conversion: draftConversion }); alert('Review draft inserted into live UI stream!')" class="w-full text-center bg-[#00B1AA] hover:bg-[#009c95] text-white font-bold py-2 rounded transition-colors shadow-soft">
                        {{ __('Inject Review Draft') }}
                    </button>
                </div>
            </div>

        </div>

        <!-- Right Side: Reviews Stream & FAQ Guidelines -->
        <div class="lg:col-span-2 space-y-6">
            
            <h2 class="text-lg font-bold text-[#444444]">{{ __('Vetted Placement Reviews') }}</h2>

            <!-- Review List Container -->
            <div class="space-y-4">
                <template x-for="r in filteredReviews" :key="r.id">
                    <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft space-y-4 hover:border-zinc-300 transition-colors">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-sm text-[#444444]" x-text="`${r.role} • ${r.company}`"></h3>
                                <p class="text-xs text-[#7B7B7B] font-semibold mt-0.5" x-text="`${r.author} · ${r.cohort}`"></p>
                            </div>
                            <div class="flex items-center gap-1 text-xs font-semibold text-zinc-800">
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <span x-text="Number(r.rating).toFixed(1)"></span>
                            </div>
                        </div>
                        <p class="text-xs text-[#7B7B7B] leading-relaxed" x-text="r.content"></p>
                        <div class="border-t border-zinc-100 pt-3 flex justify-between items-center text-[10px] text-zinc-400 font-semibold">
                            <span x-text="`Verified Stipend: $${r.stipend}/hr`"></span>
                            <span class="text-[#00B1AA]"><i class="fa-solid fa-circle-check"></i> <span x-text="r.conversion"></span></span>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Review Verification FAQ Section -->
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft space-y-5">
                <h3 class="text-sm font-bold text-[#444444]">{{ __('Review Moderation Policies & Trust FAQ') }}</h3>
                <div class="space-y-4 text-xs text-[#7B7B7B]">
                    <div>
                        <h4 class="font-bold text-zinc-800">{{ __('How do you ensure review authenticity?') }}</h4>
                        <p class="mt-1">{{ __('All internship reviews require university email verification or GitHub single-sign-on matching the student account listed in the internship agreement. Submissions are matched against verified corporate registrar records before publishing.') }}</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-zinc-800">{{ __('Are reviews fully anonymous?') }}</h4>
                        <p class="mt-1">{{ __('Yes, students can choose to publish reviews with their full name, initials, or as a completely anonymous verified scholar. Recruiter agencies cannot access student names unless consent is explicit.') }}</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-zinc-800">{{ __('Can a corporate partner ask for a bad review to be deleted?') }}</h4>
                        <p class="mt-1">{{ __('No. We maintain strict compliance records. While companies can post verified comments or responses to review threads, they cannot edit, delete, or alter any star metrics published by verified program alumni.') }}</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

