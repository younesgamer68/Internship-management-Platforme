@extends('layouts.public')

@section('title', 'Corporate Partners Directory — Interlink')
@section('meta_description', 'Discover verified tech companies hiring interns. Filter by headquarters, size, ratings, and open listings.')

@section('content')
<div x-data="{
    searchQuery: '',
    selectedSector: 'All',
    partners: [
        { id: 1, name: 'Stripe', logo: 'S', logoBg: 'bg-[#635bff]', description: 'Financial infrastructure for the internet. Millions of companies use Stripe to accept payments.', sector: 'Fintech', size: '5,000+ employees', headquarters: 'San Francisco, CA', roles: 3, speed: 'Fast responder (24h)', rating: 4.9 },
        { id: 2, name: 'Vercel', logo: 'V', logoBg: 'bg-black', description: 'Vercel provides developer experience and infrastructure to deploy and scale Next.js apps.', sector: 'DevTools', size: '200-500 employees', headquarters: 'Remote / NYC', roles: 2, speed: 'Responds in 2 days', rating: 4.8 },
        { id: 3, name: 'Figma', logo: 'F', logoBg: 'bg-[#f24e1e]', description: 'Figma is a collaborative interface design web application used by teams globally.', sector: 'Design', size: '1,000-2,000 employees', headquarters: 'San Francisco, CA', roles: 1, speed: 'Fast responder (48h)', rating: 4.7 },
        { id: 4, name: 'Linear', logo: 'L', logoBg: 'bg-zinc-900 border border-zinc-700', description: 'Linear helps software teams streamline project management, tasks, and roadmaps.', sector: 'Productivity', size: '50-100 employees', headquarters: 'Remote / London', roles: 1, speed: 'Fast responder (24h)', rating: 4.9 },
        { id: 5, name: 'Supabase', logo: 'S', logoBg: 'bg-[#3ecf8e]', description: 'Supabase is an open source Firebase alternative providing Postgres databases, auth, and storage.', sector: 'AI & Database', size: '100-200 employees', headquarters: 'Remote', roles: 2, speed: 'Fast responder (24h)', rating: 4.8 },
        { id: 6, name: 'Resend', logo: 'R', logoBg: 'bg-zinc-800', description: 'Resend is the email platform built for developers, enabling clean layout renders and easy integrations.', sector: 'Developer Communications', size: '20-50 employees', headquarters: 'Remote', roles: 1, speed: 'Fast responder (24h)', rating: 4.9 },
        { id: 7, name: 'Retool', logo: 'R', logoBg: 'bg-[#2563EB]', description: 'Retool makes it incredibly fast to build internal tools, database editors, and dashboards.', sector: 'DevTools', size: '500-1,000 employees', headquarters: 'San Francisco, CA', roles: 2, speed: 'Responds in 3 days', rating: 4.7 },
        { id: 8, name: 'Pinecone', logo: 'P', logoBg: 'bg-[#2b1b54]', description: 'Pinecone is a managed, easily scalable vector database designed to accelerate AI applications.', sector: 'AI & Database', size: '100-200 employees', headquarters: 'Remote', roles: 1, speed: 'Fast responder (48h)', rating: 4.9 }
    ],
    get filtered() {
        return this.partners.filter(p => {
            if (this.searchQuery && !p.name.toLowerCase().includes(this.searchQuery.toLowerCase()) && !p.description.toLowerCase().includes(this.searchQuery.toLowerCase())) {
                return false;
            }
            if (this.selectedSector !== 'All' && p.sector !== this.selectedSector) {
                return false;
            }
            return true;
        });
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="border-b border-[#E5E7EB] pb-5 mb-8">
        <h1 class="text-2xl font-bold tracking-tight text-[#444444] sm:text-3xl">{{ __('Corporate Directory') }}</h1>
        <p class="mt-1.5 text-xs text-[#7B7B7B] font-medium font-sans">{{ __('Verify active startup hiring cycles, average response durations, and verified stipend transparency metrics.') }}</p>
    </div>

    <!-- Filters -->
    <div class="flex flex-col md:flex-row gap-4 bg-white border border-[#E5E7EB] rounded p-4 shadow-soft mb-8">
        <div class="flex-grow relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-[#7B7B7B] text-xs"></i>
            <input 
                x-model="searchQuery" 
                type="text" 
                placeholder="{{ __('Search company profiles...') }}" 
                class="w-full pl-9 pr-4 py-2 text-xs border border-[#E5E7EB] bg-[#F8FAFA] rounded placeholder-[#7B7B7B] focus:bg-white transition-colors"
            >
        </div>
        <select x-model="selectedSector" class="text-xs bg-[#F8FAFA] border border-[#E5E7EB] rounded p-2.5 font-medium min-w-[150px]">
            <option value="All">{{ __('All Sectors') }}</option>
            <option value="Fintech">{{ __('Fintech') }}</option>
            <option value="DevTools">{{ __('Developer Tools') }}</option>
            <option value="Design">{{ __('Product Design') }}</option>
            <option value="Productivity">{{ __('Productivity / SaaS') }}</option>
            <option value="AI & Database">{{ __('AI & Databases') }}</option>
            <option value="Developer Communications">{{ __('Developer Communications') }}</option>
        </select>
    </div>

    <!-- Partner Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <template x-for="p in filtered" :key="p.id">
            <div class="bg-white border border-[#E5E7EB] rounded p-6 shadow-soft hover:border-[#00B1AA] transition-colors flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <div :class="p.logoBg" class="h-10 w-10 rounded flex items-center justify-center text-white font-extrabold text-lg" x-text="p.logo"></div>
                            <div>
                                <h3 class="font-bold text-sm text-[#444444]" x-text="p.name"></h3>
                                <span class="text-[10px] font-bold text-[#7B7B7B] uppercase tracking-wider" x-text="p.sector"></span>
                            </div>
                        </div>
                        <span class="text-xs font-semibold text-zinc-800 flex items-center gap-0.5"><i class="fa-solid fa-star text-amber-400"></i> <span x-text="p.rating"></span></span>
                    </div>
                    
                    <p class="text-xs text-[#7B7B7B] leading-relaxed" x-text="p.description"></p>
                    
                    <div class="border-y border-zinc-100 py-3 space-y-2 text-xs text-[#444444]">
                        <div class="flex justify-between">
                            <span class="text-[#7B7B7B]">{{ __('Headquarters:') }}</span>
                            <span class="font-semibold" x-text="p.headquarters"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#7B7B7B]">{{ __('Company Size:') }}</span>
                            <span class="font-semibold" x-text="p.size"></span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-[#E5E7EB] pt-4 mt-6 space-y-3 text-[11px] text-[#7B7B7B]">
                    <div class="flex justify-between items-center">
                        <span class="flex items-center gap-1.5"><i class="fa-solid fa-reply text-xs text-[#00B1AA]"></i> <span x-text="p.speed"></span></span>
                        <span class="font-bold text-[#00B1AA] bg-[#00B1AA]/5 px-2.5 py-0.5 rounded-full" x-text="`${p.roles} open internships`"></span>
                    </div>
                    <a href="/internships/browse" class="block w-full text-center font-bold text-white bg-[#00B1AA] hover:bg-[#009c95] rounded py-2 transition-colors text-xs shadow-soft">{{ __('View active postings') }}</a>
                </div>
            </div>
        </template>
    </div>

    <!-- Partner Program Info (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Partner Program Benefits') }}</h2>
        <p class="text-xs text-zinc-500 max-w-xl leading-relaxed">{{ __('Join Interlink\'s elite corporate matching network. Expand your university presence and automatically audit candidates.') }}</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-graduation-cap"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Target Campus Access') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Direct placements at elite CS departments (Stanford, MIT, CMU, Berkeley). Postings feed straight to academic registrar databases.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-handshake-angle"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Automated Legal CPT') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Generate pre-vetted visa work agreements and course mappings automatically, avoiding corporate immigration bottleneck loops.') }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft space-y-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-bolt"></i></span>
                <h3 class="font-bold text-zinc-900">{{ __('Vetted Match Pipelines') }}</h3>
                <p class="text-zinc-500 leading-relaxed">{{ __('Filters candidates automatically based on GitHub repo commits, verified GPA status, and Prof recommendations.') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection


