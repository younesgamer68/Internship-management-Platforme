@extends('layouts.public')

@section('title', 'Internship Categories Directory — Interlink')
@section('meta_description', 'Explore tech disciplines. Discover active listings, core stack parameters, and stipend averages across software engineering, UX, PM, and data.')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-5 mb-10">
        <h1 class="text-3xl font-bold leading-7 text-zinc-900 sm:truncate sm:text-4xl">{{ __('Internship Disciplines') }}</h1>
        <p class="mt-2 text-sm text-zinc-500 font-medium">{{ __('Explore specific sectors. Filter active postings, learn technical requirements, and view benchmark compensation details.') }}</p>
    </div>

    <!-- Categories Filter & Search -->
    <div class="mb-8 flex bg-white border border-zinc-200 rounded p-4 shadow-soft">
        <div class="flex-grow relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-zinc-400 text-xs"></i>
            <input 
                type="text" 
                placeholder="{{ __('Search disciplines or skills (e.g. PyTorch, Kubernetes, Figma)...') }}" 
                class="w-full pl-9 pr-4 py-2 text-xs border border-zinc-200 bg-[#F8FAFA] rounded placeholder-zinc-400 focus:bg-white transition-colors"
            >
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Category: Backend -->
        <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft flex flex-col justify-between hover:border-zinc-300 transition-colors">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="h-10 w-10 bg-[#00B1AA]/5 text-[#00B1AA] rounded-lg flex items-center justify-center text-lg"><i class="fa-solid fa-server"></i></span>
                    <span class="text-xs bg-[#00B1AA]/5 text-[#00B1AA] font-semibold px-2 py-0.5 rounded-full">{{ __('42 active roles') }}</span>
                </div>
                <div>
                    <h3 class="font-bold text-base text-zinc-900">{{ __('Backend & API Engineering') }}</h3>
                    <p class="text-xs text-zinc-500 mt-1 leading-relaxed">{{ __('Design relational schemas, optimize cache systems, and write transactional codebases.') }}</p>
                </div>
                <div class="space-y-1.5">
                    <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wide">{{ __('Core Stack Requirements') }}</span>
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Go') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('PostgreSQL') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Redis') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Kafka') }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                <span class="text-zinc-500">{{ __('Avg:') }} <strong class="text-zinc-900">{{ __('$58.00/hr') }}</strong></span>
                <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Browse category &rarr;') }}</a>
            </div>
        </div>

        <!-- Category: Frontend -->
        <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft flex flex-col justify-between hover:border-zinc-300 transition-colors">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="h-10 w-10 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center text-lg"><i class="fa-solid fa-code"></i></span>
                    <span class="text-xs bg-rose-50 text-rose-700 font-semibold px-2 py-0.5 rounded-full">{{ __('34 active roles') }}</span>
                </div>
                <div>
                    <h3 class="font-bold text-base text-zinc-900">{{ __('Frontend & Framework Core') }}</h3>
                    <p class="text-xs text-zinc-500 mt-1 leading-relaxed">{{ __('Build performant layouts, manage client rendering loops, and build design system components.') }}</p>
                </div>
                <div class="space-y-1.5">
                    <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wide">{{ __('Core Stack Requirements') }}</span>
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('React') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Next.js') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('TypeScript') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Tailwind') }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                <span class="text-zinc-500">{{ __('Avg:') }} <strong class="text-zinc-900">{{ __('$52.00/hr') }}</strong></span>
                <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Browse category &rarr;') }}</a>
            </div>
        </div>

        <!-- Category: Design -->
        <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft flex flex-col justify-between hover:border-zinc-300 transition-colors">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="h-10 w-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center text-lg"><i class="fa-solid fa-bezier-curve"></i></span>
                    <span class="text-xs bg-emerald-50 text-emerald-700 font-semibold px-2 py-0.5 rounded-full">{{ __('21 active roles') }}</span>
                </div>
                <div>
                    <h3 class="font-bold text-base text-zinc-900">{{ __('Product Design & UI/UX') }}</h3>
                    <p class="text-xs text-zinc-500 mt-1 leading-relaxed">{{ __('Map visual component properties, run usability surveys, and assemble high-fidelity prototypes.') }}</p>
                </div>
                <div class="space-y-1.5">
                    <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wide">{{ __('Core Stack Requirements') }}</span>
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Figma') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Prototyping') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Design Systems') }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                <span class="text-zinc-500">{{ __('Avg:') }} <strong class="text-zinc-900">{{ __('$45.00/hr') }}</strong></span>
                <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Browse category &rarr;') }}</a>
            </div>
        </div>

        <!-- Category: ML & AI (New) -->
        <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft flex flex-col justify-between hover:border-zinc-300 transition-colors">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="h-10 w-10 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-lg"><i class="fa-solid fa-brain"></i></span>
                    <span class="text-xs bg-purple-50 text-purple-700 font-semibold px-2 py-0.5 rounded-full">{{ __('18 active roles') }}</span>
                </div>
                <div>
                    <h3 class="font-bold text-base text-zinc-900">{{ __('Machine Learning & AI') }}</h3>
                    <p class="text-xs text-zinc-500 mt-1 leading-relaxed">{{ __('Train deep neural models, optimize embeddings search latency, and evaluate model recall rates.') }}</p>
                </div>
                <div class="space-y-1.5">
                    <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wide">{{ __('Core Stack Requirements') }}</span>
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Python') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('PyTorch') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Vector DBs') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('C++') }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                <span class="text-zinc-500">{{ __('Avg:') }} <strong class="text-zinc-900">{{ __('$65.00/hr') }}</strong></span>
                <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Browse category &rarr;') }}</a>
            </div>
        </div>

        <!-- Category: Infrastructure & DevOps (New) -->
        <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft flex flex-col justify-between hover:border-zinc-300 transition-colors">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="h-10 w-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-lg"><i class="fa-solid fa-network-wired"></i></span>
                    <span class="text-xs bg-blue-50 text-blue-700 font-semibold px-2 py-0.5 rounded-full">{{ __('15 active roles') }}</span>
                </div>
                <div>
                    <h3 class="font-bold text-base text-zinc-900">{{ __('Infrastructure & DevOps') }}</h3>
                    <p class="text-xs text-zinc-500 mt-1 leading-relaxed">{{ __('Configure virtual machines, orchestrate cluster environments, and improve CI/CD pipelines.') }}</p>
                </div>
                <div class="space-y-1.5">
                    <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wide">{{ __('Core Stack Requirements') }}</span>
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Docker') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Kubernetes') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Terraform') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('AWS/GCP') }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                <span class="text-zinc-500">{{ __('Avg:') }} <strong class="text-zinc-900">{{ __('$51.50/hr') }}</strong></span>
                <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Browse category &rarr;') }}</a>
            </div>
        </div>

        <!-- Category: DevRel & Docs (New) -->
        <div class="bg-white border border-zinc-200 rounded-xl p-6 shadow-soft flex flex-col justify-between hover:border-zinc-300 transition-colors">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="h-10 w-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center text-lg"><i class="fa-solid fa-bullhorn"></i></span>
                    <span class="text-xs bg-amber-50 text-amber-700 font-semibold px-2 py-0.5 rounded-full">{{ __('12 active roles') }}</span>
                </div>
                <div>
                    <h3 class="font-bold text-base text-zinc-900">{{ __('Developer Relations') }}</h3>
                    <p class="text-xs text-zinc-500 mt-1 leading-relaxed">{{ __('Compose educational API documentation, build template packages, and triage community reports.') }}</p>
                </div>
                <div class="space-y-1.5">
                    <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-wide">{{ __('Core Stack Requirements') }}</span>
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Node.js') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Technical Blog') }}</span>
                        <span class="bg-zinc-100 text-zinc-700 text-[9px] font-semibold px-1.5 py-0.5 rounded">{{ __('Git SDKs') }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-zinc-100 pt-4 mt-6 flex justify-between items-center text-xs">
                <span class="text-zinc-500">{{ __('Avg:') }} <strong class="text-zinc-900">{{ __('$45.00/hr') }}</strong></span>
                <a href="/internships/browse" class="text-[#00B1AA] font-bold hover:text-[#00B1AA]">{{ __('Browse category &rarr;') }}</a>
            </div>
        </div>

    </div>

    <!-- Custom Specializations Directory (New Section) -->
    <div class="space-y-6 mt-12 border-t border-zinc-200 pt-10">
        <h2 class="text-lg font-bold text-zinc-900">{{ __('Specialized Domain Tracks') }}</h2>
        <p class="text-xs text-zinc-500 max-w-xl leading-relaxed">{{ __('Beyond our primary engineering tracks, Interlink coordinates with registrar boards to support niche specialization approvals.') }}</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 text-xs pt-4">
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft">
                <h4 class="font-bold text-zinc-900">{{ __('Cybersecurity Analyst') }}</h4>
                <p class="text-zinc-500 mt-1">{{ __('Focus on log analysis, Pen Testing sandbox scripts, and WAF configuration reviews.') }} <span class="font-bold text-[#00B1AA] block mt-1.5">{{ __('Avg: $56/hr') }}</span></p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft">
                <h4 class="font-bold text-zinc-900">{{ __('Data Analytics') }}</h4>
                <p class="text-zinc-500 mt-1">{{ __('Focus on business intelligence models, SQL database query logs, and dashboard metrics.') }} <span class="font-bold text-[#00B1AA] block mt-1.5">{{ __('Avg: $38/hr') }}</span></p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft">
                <h4 class="font-bold text-zinc-900">{{ __('Systems Architecture') }}</h4>
                <p class="text-zinc-500 mt-1">{{ __('Focus on RPC protocols, sharding configurations, cache policies, and latency diagnostics.') }} <span class="font-bold text-[#00B1AA] block mt-1.5">{{ __('Avg: $62/hr') }}</span></p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5 shadow-soft">
                <h4 class="font-bold text-zinc-900">{{ __('Mobile Development') }}</h4>
                <p class="text-zinc-500 mt-1">{{ __('Focus on iOS/Android native structures, memory profiling, and SDK deployments.') }} <span class="font-bold text-[#00B1AA] block mt-1.5">{{ __('Avg: $48/hr') }}</span></p>
            </div>
        </div>
    </div>

</div>
@endsection


