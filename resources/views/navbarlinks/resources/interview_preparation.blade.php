@extends('layouts.public')

@section('title', 'Technical Interview Prep Guides — Interlink')
@section('meta_description', 'Study blueprints for system design, data structure algorithms, and product mockup loops compiled by partner engineering managers.')

@section('content')
<div x-data="{
    activeQuestion: 1,
    readyChecklist: [
        { id: 1, text: 'Tested web camera and microphone', verified: false },
        { id: 2, text: 'Prepared three STAR behavioral stories', verified: false },
        { id: 3, text: 'Reviewed target company tech stack and GitHub projects', verified: false },
        { id: 4, text: 'Compiled three questions for the engineering leads', verified: false },
        { id: 5, text: 'Practiced writing code while speaking aloud', verified: false }
    ],
    codingQuestions: [
        { 
            id: 1, 
            title: 'LRU Cache Design', 
            difficulty: 'Medium', 
            prompt: 'Design a data structure that follows the constraints of a Least Recently Used (LRU) cache.', 
            hint: 'Use a doubly linked list combined with a hash map to achieve O(1) time complexity for both get and put operations.',
            recruiterNote: 'Recruiters want to see how you structure reference pointers and manage thread safety.' 
        },
        { 
            id: 2, 
            title: 'Merge K Sorted Lists', 
            difficulty: 'Hard', 
            prompt: 'Merge k sorted linked lists and return it as one sorted list.', 
            hint: 'Utilize a min-heap (priority queue) containing the head nodes of all lists. Push and pop elements to keep list sorting O(N log k).',
            recruiterNote: 'Engineering leads watch how you calculate and explain Big O space complexities during priority queue allocations.' 
        },
        { 
            id: 3, 
            title: 'Course Schedule (Cycle Detect)', 
            difficulty: 'Medium', 
            prompt: 'Determine if you can finish all courses given course prerequisites.', 
            hint: 'Represent prerequisites as a directed graph. Apply topological sort or DFS cycle detection algorithms.',
            recruiterNote: 'This test models real dependency-graph layouts used in compilers and router frameworks.' 
        }
    ]
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-12">

    <!-- Header -->
    <div class="border-b border-zinc-200 pb-8 text-center max-w-3xl mx-auto space-y-4">
        <h1 class="text-3xl font-bold tracking-tight text-[#444444] sm:truncate sm:text-4xl">Technical Interview Preparation</h1>
        <p class="text-sm text-[#7B7B7B] font-medium leading-relaxed">
            Curated study strategies, interactive coding blueprints, and checklist templates compiled by partner engineering managers.
        </p>
    </div>

    <!-- Prep Columns -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
        
        <!-- Section: Systems & Coding -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
            <div class="flex items-center gap-2 border-b border-zinc-100 pb-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-laptop-code"></i></span>
                <h3 class="font-bold text-[#444444] text-base">Coding & Algorithmic Prep</h3>
            </div>
            
            <div class="space-y-3.5 text-xs text-[#7B7B7B] leading-relaxed">
                <div>
                    <strong class="text-zinc-800 block">1. Focus on Core Data Structures</strong>
                    <span>Ensure absolute fluency in hash maps, trees, graph traversals (BFS/DFS), and sorting boundary rates.</span>
                </div>
                <div>
                    <strong class="text-zinc-800 block">2. Analyze Time & Space Complexities</strong>
                    <span>Be prepared to calculate Big O scales for both memory allocations and CPU loops instantly.</span>
                </div>
                <div>
                    <strong class="text-zinc-800 block">3. Practice Clean Code Communication</strong>
                    <span>During code panels, explain technical design structures before writing lines in the sandbox.</span>
                </div>
            </div>
        </div>

        <!-- Section: System Design -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
            <div class="flex items-center gap-2 border-b border-zinc-100 pb-2">
                <span class="text-[#00B1AA] font-bold text-lg"><i class="fa-solid fa-server"></i></span>
                <h3 class="font-bold text-[#444444] text-base">System Design & Databases</h3>
            </div>
            
            <div class="space-y-3.5 text-xs text-[#7B7B7B] leading-relaxed">
                <div>
                    <strong class="text-zinc-800 block">1. DB Scaling & Indexing</strong>
                    <span>Understand transactional limits (ACID rules), read vs write replica layouts, and indexes.</span>
                </div>
                <div>
                    <strong class="text-zinc-800 block">2. Caching & Message Queuing</strong>
                    <span>Study cache eviction methods (LRU) and asynchronous task processing using queues (Redis, RabbitMQ).</span>
                </div>
                <div>
                    <strong class="text-zinc-800 block">3. Load Balancing & CDN Routing</strong>
                    <span>Explain reverse-proxy layouts and regional caching mechanisms used by modern app engines.</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Coding Challenge Blueprints Widget -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Sidebar: Question Selector (5 cols) -->
        <div class="lg:col-span-5 bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
            <h3 class="font-bold text-sm text-[#444444] uppercase tracking-wider border-b border-zinc-100 pb-2">Common Board Questions</h3>
            <div class="space-y-2">
                <template x-for="q in codingQuestions" :key="q.id">
                    <button 
                        @click="activeQuestion = q.id"
                        :class="activeQuestion === q.id ? 'border-[#00B1AA] bg-zinc-50' : 'border-zinc-200'"
                        class="w-full text-left p-3.5 rounded border transition-colors flex flex-col gap-1.5 shadow-soft"
                    >
                        <div class="flex justify-between items-center w-full">
                            <span class="font-bold text-xs text-[#444444]" x-text="q.title"></span>
                            <span :class="q.difficulty === 'Hard' ? 'bg-rose-50 text-rose-700' : 'bg-amber-50 text-amber-700'" class="text-[9px] font-bold px-2 py-0.5 rounded-full" x-text="q.difficulty"></span>
                        </div>
                        <p class="text-[10px] text-[#7B7B7B] leading-relaxed line-clamp-1" x-text="q.prompt"></p>
                    </button>
                </template>
            </div>
        </div>

        <!-- Right Side: Details View (7 cols) -->
        <div class="lg:col-span-7 bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-5">
            <div class="border-b border-zinc-100 pb-3">
                <span class="text-[9px] font-bold text-[#00B1AA] uppercase tracking-wider block">Question Specs & Hints</span>
                <h4 class="text-base font-bold text-[#444444] mt-1" x-text="codingQuestions[activeQuestion - 1].title"></h4>
            </div>

            <div class="space-y-3.5 text-xs text-[#7B7B7B] leading-relaxed">
                <div>
                    <span class="font-bold text-zinc-800 block">Problem Statement</span>
                    <p class="mt-1" x-text="codingQuestions[activeQuestion - 1].prompt"></p>
                </div>
                <div class="bg-[#F8FAFA] border border-[#E5E7EB] rounded p-4">
                    <span class="font-bold text-zinc-800 block">Algorithmic Strategy Hint</span>
                    <p class="mt-1 text-[11px] leading-relaxed" x-text="codingQuestions[activeQuestion - 1].hint"></p>
                </div>
                <div class="bg-[#00B1AA]/5 border border-[#00B1AA]/10 rounded p-4 text-[#00B1AA]">
                    <span class="font-bold block text-zinc-800 text-[11px]"><i class="fa-solid fa-lightbulb"></i> Lead Recruiter Note:</span>
                    <p class="mt-1 text-[11px] leading-relaxed text-[#7B7B7B]" x-text="codingQuestions[activeQuestion - 1].recruiterNote"></p>
                </div>
            </div>
        </div>

    </div>

    <!-- Checklist & Behavioral Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <!-- Live Checklist -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
            <div>
                <h3 class="font-bold text-sm text-[#444444]">Interview Day Readiness Checklist</h3>
                <p class="text-xs text-[#7B7B7B] mt-0.5">Toggle these items to audit your interview environment preparation.</p>
            </div>
            <div class="space-y-3 text-xs">
                <template x-for="item in readyChecklist" :key="item.id">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" x-model="item.verified" :id="`ready_${item.id}`" class="h-4 w-4 rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA]">
                        <label :for="`ready_${item.id}`" class="font-medium text-[#444444] select-none cursor-pointer" x-text="item.text"></label>
                    </div>
                </template>
            </div>
        </div>

        <!-- Behavioral Guide (STAR) -->
        <div class="bg-white border border-[#E5E7EB] rounded-xl p-6 shadow-soft space-y-4">
            <h3 class="font-bold text-sm text-[#444444] border-b border-zinc-100 pb-2">Behavioral Interview Structure</h3>
            <p class="text-xs text-[#7B7B7B] leading-relaxed">
                Startups assess culture match through behavioral questions. Prepare three robust STAR structures for common prompts:
            </p>
            <ul class="text-xs text-[#7B7B7B] space-y-2.5">
                <li class="flex items-start gap-2">
                    <i class="fa-solid fa-circle-check text-[#00B1AA] mt-0.5 shrink-0"></i>
                    <span><strong>Handling Team Conflicts:</strong> Detail how you resolved architectural disagreements via code benchmarking instead of arguments.</span>
                </li>
                <li class="flex items-start gap-2">
                    <i class="fa-solid fa-circle-check text-[#00B1AA] mt-0.5 shrink-0"></i>
                    <span><strong>Technical Ownership:</strong> Describe a complex parser, system, or library you owned from design specs to production launch.</span>
                </li>
            </ul>
        </div>

    </div>

    <!-- Prep FAQs -->
    <div class="bg-white border border-[#E5E7EB] rounded-xl p-8 shadow-soft space-y-6">
        <h3 class="font-bold text-sm text-[#444444] text-center uppercase tracking-wider">Interview FAQs</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs text-[#7B7B7B] leading-relaxed">
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">Should I write pseudo-code or complete executable code?</h4>
                <p>Always write complete, syntactically clean code in the collaborative sandbox. If you get stuck, communicate your approach, write helper functions, and clarify variables rather than stopping.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">What kind of questions should I ask at the end?</h4>
                <p>Avoid generic queries. Ask about their deployment workflows, compile times, how branch conflicts are resolved, or how host managers evaluate junior contributions for university credit.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">Is syntax correctness heavily penalized?</h4>
                <p>Minor syntax lapses are tolerated, but logical bugs or incorrect Big O time-complexity assumptions are major warning indicators. Focus on modular structure and dry-run tests.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-bold text-zinc-800 text-sm">How should I handle getting completely stuck?</h4>
                <p>Be transparent. Talk aloud, explain what is blocking you, benchmark simple test inputs, and ask for clarifying parameters. Managers evaluate your logical troubleshooting path under stress.</p>
            </div>
        </div>
    </div>

</div>
@endsection

