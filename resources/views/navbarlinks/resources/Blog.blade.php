@extends('layouts.public')

@section('title', 'Interlink Career Blog — Interlink')
@section('meta_description', 'Read guides, interview prep, and recruiting insights written by technical founders and university leads.')

@section('content')
<div x-data="{
    selectedCategory: 'all',
    newsletterSubmitted: false,
    articles: [
        { id: 1, category: 'interviews', title: 'Cracking the Stripe API Screen: A Prep Guide', excerpt: 'Stripe system design loops focus on transaction safety, idempotent APIs, and double-entry ledger audits. Learn how to prepare clean database schemas and handle distributed transactions.', date: 'June 1, 2026', readTime: '6 min read', author: 'Sarah Keates' },
        { id: 2, category: 'growth', title: 'First Week Milestones: Establishing Mentor Syncs', excerpt: 'Setting up weekly check-ins with your assigned host developer dictates conversion offer success. Understand how to draft technical agendas and seek structural code feedback.', date: 'May 28, 2026', readTime: '5 min read', author: 'Liam Bennett' },
        { id: 3, category: 'design', title: 'Figma to React Production Constraints', excerpt: 'How product design interns build interfaces directly inside visual layout constraints. Bridging the gap between declarative auto-layouts and CSS flexbox grids.', date: 'May 14, 2026', readTime: '8 min read', author: 'Emily Chen' },
        { id: 4, category: 'interviews', title: 'Deep Dive: System Design of a Scalable Vector DB', excerpt: 'With vector searches scaling AI operations, learn how managed vector databases index high-dimensional embeddings and manage similarity search clusters.', date: 'May 10, 2026', readTime: '10 min read', author: 'Clara Oswald' },
        { id: 5, category: 'interviews', title: 'Navigating the Next.js Code Interview Sandbox', excerpt: 'Vercel’s core engineers evaluate your ability to handle async routing, server-side data fetching, and core web vital optimization under live panels.', date: 'May 04, 2026', readTime: '7 min read', author: 'Thomas Ruck' },
        { id: 6, category: 'growth', title: 'Remote vs On-site: Maximizing Autonomy as an Intern', excerpt: 'Tips for remote-first work layouts. How to establish async-first communication documentation, manage Slack checkins, and write detailed PR reviews.', date: 'Apr 28, 2026', readTime: '6 min read', author: 'Siddharth Patel' },
        { id: 7, category: 'growth', title: 'From Intern to Full-Time: Career Transition Stories', excerpt: 'A compiled review of Stripe and Figma cohort alumni. We audit their return-offer loops, salary negotiation details, and lessons learned during onboarding.', date: 'Apr 20, 2026', readTime: '9 min read', author: 'Elena Rostova' },
        { id: 8, category: 'design', title: 'Designing for Accessibility: WCAG Audits in Startups', excerpt: 'Why early-stage companies must test contrast limits and screen-reader accessibility. Build design systems that satisfy regulatory compliance guidelines.', date: 'Apr 12, 2026', readTime: '8 min read', author: 'Elena Rostova' },
        { id: 9, category: 'design', title: 'Auto-Layout & Design Tokens: Bridging the Figma-Code Gap', excerpt: 'A guide to translating design values directly into Tailwind configurations. Learn how variables accelerate layout engineering cycles.', date: 'Apr 02, 2026', readTime: '5 min read', author: 'Emily Chen' }
    ],
    get filtered() {
        if (this.selectedCategory === 'all') return this.articles;
        return this.articles.filter(a => {{ __('a.category === this.selectedCategory); } }" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 space-y-12">') }}

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5">
        <h1 class="text-3xl font-bold leading-7 text-[#444444] sm:truncate sm:text-4xl">{{ __('Interlink Blog') }}</h1>
        <p class="mt-2 text-sm text-[#7B7B7B] font-medium">{{ __('Strategic guidance on software engineering preparation, CPT guidelines, and design loops.') }}</p>
    </div>

    <!-- Featured Post -->
    <article class="bg-zinc-950 text-white rounded-xl p-8 sm:p-12 shadow-soft-lg flex flex-col justify-between min-h-[300px]">
        <div class="max-w-xl space-y-4">
            <span class="inline-flex items-center rounded-full bg-[#00B1AA]/20 px-3 py-1 text-xs font-semibold text-[#00B1AA] ring-1 ring-inset ring-[#00B1AA]/30">{{ __('Featured Cover') }}</span>
            <h2 class="text-2xl sm:text-3xl font-bold leading-tight">
                <a href="#" class="hover:text-[#00B1AA]/80 transition-colors">{{ __('The Art of the 12-Week Sprint: How to Land the Return Offer') }}</a>
            </h2>
            <p class="text-xs text-zinc-400 leading-relaxed">{{ __('How to negotiate roadmap objectives, show system ownership, and secure conversion offers before graduation. Study templates for weekly milestones and mentor reviews.') }}</p>
        </div>
        <div class="border-t border-zinc-800 pt-5 mt-6 flex justify-between items-center text-[10px] text-zinc-400">
            <span>{{ __('By Thomas Ruck &bull; Head of Tech Recruiting, Vercel') }}</span>
            <span>{{ __('June 4, 2026 &bull; 9 min read') }}</span>
        </div>
    </article>

    <!-- Categories -->
    <div class="flex flex-wrap gap-2 border-b border-zinc-200 pb-4 text-xs font-semibold">
        <button @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="px-3 py-1.5 rounded transition-colors shadow-soft">{{ __('All Articles') }}</button>
        <button @click="selectedCategory = 'interviews'" :class="selectedCategory === 'interviews' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="px-3 py-1.5 rounded transition-colors shadow-soft">{{ __('Interview Prep') }}</button>
        <button @click="selectedCategory = 'growth'" :class="selectedCategory === 'growth' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="px-3 py-1.5 rounded transition-colors shadow-soft">{{ __('Career Growth') }}</button>
        <button @click="selectedCategory = 'design'" :class="selectedCategory === 'design' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="px-3 py-1.5 rounded transition-colors shadow-soft">{{ __('UX Design') }}</button>
    </div>

    <!-- Article grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <template x-for="art in filtered" :key="art.id">
            <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft hover:border-[#00B1AA] transition-all flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="text-[10px] font-bold text-[#00B1AA] uppercase tracking-wide" x-text="art.category === 'interviews' ? 'Interview Prep' : art.category === 'growth' ? 'Career Growth' : 'UX Design'"></span>
                    <h3 class="font-bold text-sm text-[#444444]" x-text="art.title"></h3>
                    <p class="text-xs text-[#7B7B7B] leading-relaxed" x-text="art.excerpt"></p>
                </div>
                <div class="border-t border-zinc-100 pt-3 mt-5 flex justify-between items-center text-[10px] text-zinc-400">
                    <span x-text="`By ${art.author}`" class="font-semibold text-zinc-600"></span>
                    <span x-text="`${art.date} • ${art.readTime}`"></span>
                </div>
            </div>
        </template>
    </div>

    <!-- Newsletter -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 text-center max-w-md mx-auto shadow-soft space-y-4">
        <h4 class="font-bold text-sm text-[#444444]">{{ __('Subscribe to Technical Career Guides') }}</h4>
        <p class="text-xs text-[#7B7B7B]">{{ __('Join 8,000+ university scholars receiving interview checklists and partner recruiting schedules weekly.') }}</p>
        
        <div x-show="newsletterSubmitted" class="p-3 bg-emerald-50 text-emerald-800 border border-emerald-100 rounded text-xs">
            <span class="font-bold">{{ __('Subscription Confirmed!') }}</span> {{ __('Check your academic inbox for our pre-written resume templates.') }}
        </div>

        <form x-show="!newsletterSubmitted" @submit.prevent="newsletterSubmitted = true" class="flex gap-2 text-xs">
            <input type="email" required placeholder="name@university.edu" class="flex-grow text-xs rounded border border-zinc-200 px-3 py-2 bg-[#F8FAFA] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#00B1AA]">
            <button type="submit" class="rounded bg-[#00B1AA] hover:bg-[#009c95] text-white px-4 py-2 font-bold transition-colors shadow-soft">{{ __('Subscribe') }}</button>
        </form>
    </div>

</div>
@endsection

