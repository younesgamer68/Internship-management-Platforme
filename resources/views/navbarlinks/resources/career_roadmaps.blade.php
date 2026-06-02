@extends('layouts.public')

@section('title', 'Career Roadmaps — Interlink')
@section('meta_description', 'Explore structured career roadmaps for Frontend, Backend, Mobile, Data Analyst, UI/UX Designer, and AI Engineer. See learning paths and skills.')

@section('content')
<div x-data="{
    activeRoadmap: 'frontend',
    userSkills: [],
    roadmaps: {
        frontend: {
            title: 'Frontend Engineer Roadmap',
            skills: ['HTML/CSS/JS', 'TypeScript', 'React & Next.js', 'State Management', 'TailwindCSS', 'Testing (Jest/Cypress)'],
            steps: [
                'Learn semantic HTML5 elements and responsive CSS layouts (Flexbox, CSS Grid, custom queries).',
                'Master modern JavaScript syntax, async/await constructs, promises, and JSON data transformations.',
                'Understand TypeScript type-safety constraints, interfaces, generics, and compiler configurations.',
                'Learn React component rendering lifecycles, state hooks (useState, useEffect, useMemo, useCallback), and Next.js page/app routing mechanics.',
                'Master client-side state libraries (Zustand, Redux Toolkit) and local persistent browser storage integrations.',
                'Profile rendering performances utilizing Chrome DevTools, resolving layout shifts and core web vital leaks.'
            ],
            projects: [
                'Pixel-perfect clone of a complex SaaS dashboard (e.g. Stripe or Linear) with full keyboard shortcuts.',
                'Asynchronous dashboard interface mapping WebSocket connections to update charting tables in real time.',
                'Component UI library built with TailwindCSS and TypeScript, packaged and distributed via public npm registries.'
            ],
            certs: ['AWS Certified Developer Associate', 'Google UX Design Professional']
        },
        backend: {
            title: 'Backend Systems Engineer Roadmap',
            skills: ['Go / Rust / Python', 'PostgreSQL & Query Optimization', 'gRPC & REST API Design', 'Docker & Kubernetes', 'Redis Caching'],
            steps: [
                'Gain absolute fluency in Go or Rust compile rules, memory safety patterns, pointers, and concurrent worker channels.',
                'Study relational database models, transaction isolation states (ACID), indexes, and query analyzer logs.',
                'Build secure API gateways implementing OAuth authorization models, JWT signing, and token-bucket rate limiters.',
                'Learn containerization using Docker files, container network layouts, and database setup scripting.',
                'Master in-memory database setups (Redis caching) and asynchronous messaging queues (RabbitMQ, Kafka).',
                'Analyze systems bottleneck logs using profiling tools (pprof) to audit heap allocations and thread locks.'
            ],
            projects: [
                'High-performance transactional payment ledger processing mock credit accounts in Go.',
                'Low-level custom key-value database cache compiled in Rust, communicating over TCP channels.',
                'Distributed cron scheduler executing dockerized task containers according to registry parameters.'
            ],
            certs: ['Google Cloud Associate Cloud Engineer', 'CKA: Certified Kubernetes Administrator']
        },
        ai: {
            title: 'AI & Vector Systems Engineer Roadmap',
            skills: ['Python (PyTorch/NumPy)', 'Vector DBs (Pinecone)', 'Embeddings & RAG Systems', 'LLM Fine-tuning', 'Hugging Face API'],
            steps: [
                'Master Python data pipelines, matrix computations (NumPy), and data exploration structures (Pandas).',
                'Understand neural network concepts, backpropagation, activation equations, and basic optimizer paths.',
                'Build semantic search systems using text embedding models and vector database indexing (Pinecone).',
                'Implement Retrieval-Augmented Generation (RAG) loops linking private documents to LLM chat completions.',
                'Fine-tune pre-trained models on localized training datasets to adjust style and semantic structures.',
                'Deploy scalable machine learning inference endpoints using Docker, FastAPI, and Kubernetes clusters.'
            ],
            projects: [
                'Semantic search engine parsing academic PDF files using Pinecone vector databases and embeddings.',
                'Custom fine-tuned coding assistant chatbot utilizing RAG to answer registrar syllabus guidelines.',
                'High-throughput image classifier pipeline deployed on AWS SageMaker with automated GPU auto-scaling.'
            ],
            certs: ['TensorFlow Developer Certificate', 'AWS Certified Machine Learning Specialty']
        },
        mobile: {
            title: 'Mobile Application Engineer Roadmap',
            skills: ['Swift / Swift UI', 'Kotlin / Jetpack Compose', 'React Native / Flutter', 'SQLite / CoreData', 'App Store Guidelines'],
            steps: [
                'Learn native mobile languages: Swift for iOS platforms or Kotlin for Android devices.',
                'Master modern declarative UI engines: SwiftUI for Apple ecosystems or Jetpack Compose for Android builds.',
                'Understand local mobile storage engines, SQLite databases, and offline-first state synchronizations.',
                'Master rendering layouts, mobile view hierarchies, fluid animations, and device battery optimization.',
                'Implement native phone integrations: camera modules, geographical location tracking, and push notifications.',
                'Coordinate testing structures and release pipelines for Apple App Store and Google Play reviews.'
            ],
            projects: [
                'Offline-first student progress logger caching database milestones in local SQLite structures.',
                'Real-time geographical tracking application showing corporate headquarters coordinates on MapKit.',
                'Collaborative whiteboard canvas synchronized over WebSockets with native gesture handlers.'
            ],
            certs: ['Meta Android Developer Professional', 'Apple Swift App Development Associate']
        },
        data: {
            title: 'Data Analyst & Systems Roadmap',
            skills: ['Python (Pandas/NumPy)', 'SQL Window Functions', 'Tableau / BI Tools', 'Statistical Modeling', 'ETL Data Pipelines'],
            steps: [
                'Master advanced relational database query filters, aggregations, window partition logic, and index audits.',
                'Learn Python data frameworks (Pandas, NumPy) to execute clean extraction and data-wrangling loops.',
                'Design business intelligence visualizations (Tableau, PowerBI) communicating corporate KPIs.',
                'Understand statistical concepts: regression math, hypothesis testing, A/B validation, and data anomalies.',
                'Construct Extract-Transform-Load (ETL) data pipelines syncing staging databases to data warehouses.',
                'Document data dictionary metadata tables to ensure compliance across university registry databases.'
            ],
            projects: [
                'Sales funnel dashboard tracking candidate application-to-hire conversions over 12 months.',
                'ETL pipeline parsing hourly logging records and loading compiled statistics into Google BigQuery.',
                'Statistical analysis model forecasting cohort enrollment densities using historical trends.'
            ],
            certs: ['Google Data Analytics Professional Certificate', 'Microsoft Certified: Power BI Data Analyst Associate']
        },
        ux: {
            title: 'UI/UX Product Designer Roadmap',
            skills: ['Figma Design Tools', 'Interaction Design Systems', 'User Research Protocols', 'HTML/CSS structures', 'Prototyping'],
            steps: [
                'Master Figma nested component layouts, auto-layout constraints, local variables, and interactive prototyping.',
                'Conduct user research loops: design surveys, draft wireframes, compile behavior logs, and analyze interviews.',
                'Study product design principles: vertical grids, micro-animations, color theory, and type scaling hierarchies.',
                'Understand front-end constraints (Flexbox, CSS Grid layouts) to simplify design-to-development handoffs.',
                'Document accessibility compliance metrics (WCAG contrast parameters, screen-reader requirements).',
                'Design cohesive design system libraries managing core icons, buttons, input fields, and layouts.'
            ],
            projects: [
                'Complete interactive prototype of a collaboration software workspace with dark mode layouts.',
                'Design system documentation auditing accessibility contrast standards across active pages.',
                'Mobile app design concept mapping student CV building tools to responsive view layouts.'
            ],
            certs: ['NN/g UX Certification', 'Google UX Design Professional Certificate']
        }
    },
    get checkableSkills() {
        return this.roadmaps[this.activeRoadmap].skills;
    },
    get matchProbability() {
        const total = this.checkableSkills.length;
        const owned = this.checkableSkills.filter(s => this.userSkills.includes(s)).length;
        if (total === 0) return 0;
        return Math.round((owned / total) * 100);
    },
    get matchStatus() {
        if (this.matchProbability < 30) return { text: 'Developing Profile', color: 'text-rose-700 bg-rose-50 ring-rose-600/10' };
        if (this.matchProbability < 70) return { text: 'Competitive Match', color: 'text-amber-800 bg-amber-50 ring-amber-600/10' };
        return { text: 'Elite Placement Tier!', color: 'text-emerald-800 bg-emerald-50 ring-emerald-600/10' };
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <h1 class="text-3xl font-bold tracking-tight text-[#444444] sm:truncate sm:text-4xl">{{ __('Career Roadmaps') }}</h1>
        <p class="text-sm text-[#7B7B7B] font-medium leading-relaxed">
            {{ __('Step-by-step technical blueprints outlining core stacks, recommended projects, and certifications. Check off your skills to calculate your matching status.') }}
        </p>
    </div>

    <!-- Layout: Tabs + Active Roadmap Details -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Navigation Tabs (Left, 3 cols) -->
        <nav class="lg:col-span-3 space-y-2">
            <template x-for="(roadmap, key) in roadmaps" :key="key">
                <button 
                    @click="activeRoadmap = key; userSkills = []" 
                    :class="activeRoadmap === key ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'"
                    class="w-full text-left px-3 py-2.5 rounded text-xs transition-colors block shadow-soft"
                    x-text="roadmap.title.split(' ')[0] + ' ' + (roadmap.title.split(' ')[1] || '')"
                ></button>
            </template>
        </nav>

        <!-- Detailed Panel (Right, 9 cols) -->
        <div class="lg:col-span-9 space-y-6">
            
            <section class="bg-white border border-zinc-200 rounded-xl p-6 sm:p-8 shadow-soft space-y-6">
                <div>
                    <h2 class="text-xl font-extrabold text-[#444444]" x-text="roadmaps[activeRoadmap].title"></h2>
                    <p class="text-xs text-zinc-400 mt-1 font-semibold uppercase">{{ __('Technical Blueprint') }}</p>
                </div>

                <!-- Required Skills Checklist Widget -->
                <div class="space-y-3 bg-[#F8FAFA] border border-[#E5E7EB] rounded p-5">
                    <div class="flex justify-between items-center border-b border-zinc-200 pb-2">
                        <span class="text-xs font-bold text-[#444444] uppercase tracking-wider">{{ __('Required Skills Audit') }}</span>
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] text-[#7B7B7B]">{{ __('Match Probability:') }}</span>
                            <span class="font-bold text-[#00B1AA]" x-text="`${matchProbability}%`"></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-xs text-[#7B7B7B] pt-1">
                        <template x-for="skill in checkableSkills" :key="skill">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" :value="skill" x-model="userSkills" :id="`skill_${skill}`" class="h-4 w-4 rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA]">
                                <label :for="`skill_${skill}`" class="font-medium select-none cursor-pointer" x-text="skill"></label>
                            </div>
                        </template>
                    </div>
                    <div class="border-t border-zinc-200 pt-2 flex justify-between items-center text-[10px]">
                        <span class="text-zinc-500">{{ __('Matching Probability Status:') }}</span>
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 font-bold ring-1 ring-inset" :class="matchStatus.color" x-text="matchStatus.text"></span>
                    </div>
                </div>

                <!-- Learning Steps -->
                <div class="space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#00B1AA]">{{ __('Learning Path Steps') }}</h3>
                    <ol class="space-y-3.5 text-xs text-[#7B7B7B] leading-relaxed list-decimal pl-4">
                        <template x-for="step in roadmaps[activeRoadmap].steps" :key="step">
                            <li x-text="step"></li>
                        </template>
                    </ol>
                </div>

                <!-- Recommended Projects -->
                <div class="space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#00B1AA]">{{ __('Recommended Portfolio Projects') }}</h3>
                    <ul class="list-disc pl-4 space-y-2.5 text-xs text-[#7B7B7B]">
                        <template x-for="proj in roadmaps[activeRoadmap].projects" :key="proj">
                            <li class="leading-relaxed" x-text="proj"></li>
                        </template>
                    </ul>
                </div>

                <!-- Certifications -->
                <div class="space-y-2 border-t border-zinc-100 pt-5">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">{{ __('Recommended Industry Certifications') }}</h3>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <template x-for="cert in roadmaps[activeRoadmap].certs" :key="cert">
                            <span class="bg-zinc-50 border border-zinc-200 text-zinc-700 text-[9px] font-bold px-2 py-0.5 rounded animate-pulse" x-text="cert"></span>
                        </template>
                    </div>
                </div>
            </section>

            <!-- Roadmap FAQs -->
            <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
                <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">{{ __('Roadmaps FAQs') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B] leading-relaxed">
                    <div class="space-y-2">
                        <h4 class="font-bold text-zinc-800 text-sm">{{ __('How often are these career roadmaps updated?') }}</h4>
                        <p>{{ __('Our academic advisors and corporate partners review course syllabuses and technology stack trends semi-annually. This guarantees that matching parameters align with production engineering standards.') }}</p>
                    </div>
                    <div class="space-y-2">
                        <h4 class="font-bold text-zinc-800 text-sm">{{ __('Do companies strictly require these certifications?') }}</h4>
                        <p>{{ __('No. While certifications (like CKA or AWS Associate) add verified score weights to matching algorithms, building the listed portfolio projects and keeping high commit rates on GitHub remains the primary evaluation criteria.') }}</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

