@extends('layouts.public')

@section('title', 'Compliance & Platform FAQ — Interlink')
@section('meta_description', 'Get answers on credit mappings, stipend requirements, work authorization visas, and student transcript security.')

@section('content')
<div x-data="{
    searchQuery: '',
    selectedCategory: 'all',
    faqs: [
        { id: 1, category: 'students', question: 'How is student GPA record verification processed?', answer: 'Interlink matches records securely via student registry APIs. Only verified enrollment badges are shown to companies, protecting complete grade transcripts and compliance information.' },
        { id: 2, category: 'students', question: 'Can international students apply on F-1 visas?', answer: 'Yes. Interlink supplies structured offer documents listing exact start dates and stipends, simplifying CPT approvals with university Designated School Officials (DSOs).' },
        { id: 3, category: 'students', question: 'Are there any platform usage fees for students?', answer: 'No. Interlink is entirely free for students, graduates, and university academic coordinators. All infrastructure costs are billed to recruiting partner organizations.' },
        { id: 4, category: 'students', question: 'What happens if my college is not listed?', answer: 'You can register via the External Candidate loop. You will upload a verified copy of your university transcript, which our support coordinators will manually audit within 48 hours.' },
        { id: 5, category: 'students', question: 'How do I log weekly placement hours?', answer: 'Weekly journal logs are submitted via the Student Tracker dashboard. These logs require brief summaries of deliverables and are approved by your host mentor.' },
        { id: 6, category: 'students', question: 'Can I apply to multiple cohorts simultaneously?', answer: 'Yes. Students can apply to multiple active hiring cycles. However, once a compliance offer sheet is signed, other pending matching pipelines are automatically deactivated.' },
        
        { id: 7, category: 'employers', question: 'What are Interlink\'s minimum stipend mandates?', answer: 'Interlink requires paid placements. Engineering roles require a minimum of $25/hour and design roles a minimum of $22/hour. Unpaid internships violate our university registrar compliance agreements.' },
        { id: 8, category: 'employers', question: 'What credentials do company mentors need?', answer: 'Every internship must designate a full-time senior technical mentor who completes brief evaluations at weeks 4, 8, and 12.' },
        { id: 9, category: 'employers', question: 'How does the technical matching algorithm rank candidates?', answer: 'The algorithm checks candidate-linked GitHub repositories (measuring commit volume and code structure), verified course grades, and university program rankings.' },
        { id: 10, category: 'employers', question: 'How are intellectual property (IP) rights managed?', answer: 'Host employers retain full ownership of intellectual property (IP) and software code created during designated contract hours under standard platform NDA templates.' },
        { id: 11, category: 'employers', question: 'Can we hire candidates for permanent full-time roles?', answer: 'Absolutely. In fact, 89.4% of placements convert. Return offer options can be issued directly in the Employer Tracker dashboard.' },
        { id: 12, category: 'employers', question: 'Is there a limit to the number of listings we can post?', answer: 'Standard boards limit active listings to 3. Growth Matching subscriptions ($199/month) grant unlimited postings and automated registrar document processing.' },

        { id: 13, category: 'compliance', question: 'Who handles FERPA compliance audits?', answer: 'Interlink\'s data pipeline is audited for FERPA compliance. Candidate data is encrypted and shared only when explicit student authorization is provided during signup.' },
        { id: 14, category: 'compliance', question: 'How does university syllabus alignment work?', answer: 'We map employer roles directly to department course syllabus templates. If a role matches the necessary technical deliverables, the registrar auto-clears course credits.' },
        { id: 15, category: 'compliance', question: 'How are grades and credits mapped to official university transcripts?', answer: 'Standardized evaluations are synced directly to university registries. Advisors approve course credits directly inside Interlink, eliminating manual paper grading logs.' },
        { id: 16, category: 'compliance', question: 'Are standard NDA and CPT templates provided?', answer: 'Yes. Interlink generates pre-signed standard legal templates that satisfy federal CPT internship regulations and standard corporate protection needs.' },
        { id: 17, category: 'compliance', question: 'What happens if a placement terminates early?', answer: 'Interlink provides standardized early exit templates. Our registrar liaison desk coordinates credit modifications and notifies the university program lead.' },
        { id: 18, category: 'compliance', question: 'Do you support OPT STEM extension tracking?', answer: 'Yes. We support OPT employer reporting templates and track structural training milestones to comply with Department of Homeland Security audits.' }
    ],
    get filtered() {
        return this.faqs.filter(f => {
            if (this.selectedCategory !== 'all' && f.category !== this.selectedCategory) return false;
            if (this.searchQuery && !f.question.toLowerCase().includes(this.searchQuery.toLowerCase()) && !f.answer.toLowerCase().includes(this.searchQuery.toLowerCase())) return false;
            return true;
        });
    }
}" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">

    <!-- Header & Search -->
    <div class="text-center max-w-xl mx-auto mb-12 space-y-4">
        <h1 class="text-3xl font-extrabold text-[#444444]">Platform FAQ & Docs</h1>
        <p class="text-sm text-[#7B7B7B] font-medium">Find answers regarding compliance rules, stipend mandates, and registrar integrations.</p>
        
        <div class="mt-6 relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-[#7B7B7B] text-xs"></i>
            <input 
                x-model="searchQuery" 
                type="text" 
                placeholder="Search FAQ articles by question or answer..." 
                class="w-full pl-9 pr-4 py-2.5 rounded border border-[#E5E7EB] bg-white text-xs placeholder-[#7B7B7B] focus:bg-white shadow-soft transition-colors focus:outline-none focus:ring-1 focus:ring-[#00B1AA]"
            >
        </div>
    </div>

    <!-- Docs grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Category Sidebar (3 cols) -->
        <aside class="lg:col-span-3 space-y-2">
            <button @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="w-full text-left px-3 py-2.5 rounded text-xs transition-colors flex justify-between items-center shadow-soft">
                <span>All FAQ</span>
                <span class="bg-zinc-100 text-zinc-600 px-2 py-0.5 rounded font-mono text-[10px]" x-text="faqs.length"></span>
            </button>
            <button @click="selectedCategory = 'students'" :class="selectedCategory === 'students' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="w-full text-left px-3 py-2.5 rounded text-xs transition-colors flex justify-between items-center shadow-soft">
                <span>Students</span>
                <span class="bg-zinc-100 text-zinc-600 px-2 py-0.5 rounded font-mono text-[10px]" x-text="faqs.filter(f => f.category === 'students').length"></span>
            </button>
            <button @click="selectedCategory = 'employers'" :class="selectedCategory === 'employers' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="w-full text-left px-3 py-2.5 rounded text-xs transition-colors flex justify-between items-center shadow-soft">
                <span>Employers</span>
                <span class="bg-zinc-100 text-zinc-600 px-2 py-0.5 rounded font-mono text-[10px]" x-text="faqs.filter(f => f.category === 'employers').length"></span>
            </button>
            <button @click="selectedCategory = 'compliance'" :class="selectedCategory === 'compliance' ? 'bg-[#00B1AA] text-white font-bold' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 bg-white border border-[#E5E7EB]'" class="w-full text-left px-3 py-2.5 rounded text-xs transition-colors flex justify-between items-center shadow-soft">
                <span>Compliance</span>
                <span class="bg-zinc-100 text-zinc-600 px-2 py-0.5 rounded font-mono text-[10px]" x-text="faqs.filter(f => f.category === 'compliance').length"></span>
            </button>
        </aside>

        <!-- Accordions (9 cols) -->
        <section class="lg:col-span-9 space-y-4">
            <template x-for="f in filtered" :key="f.id">
                <div x-data="{ open: false }" class="bg-white border border-[#E5E7EB] rounded overflow-hidden shadow-soft">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-5 py-4 text-left font-bold text-xs text-[#444444] focus:outline-none">
                        <span x-text="f.question"></span>
                        <i class="fa-solid fa-chevron-down text-zinc-400 transition-transform duration-150" :class="open ? 'rotate-180 text-zinc-900' : ''"></i>
                    </button>
                    <div x-show="open" x-cloak class="px-5 pb-4 pt-0 border-t border-zinc-100 text-xs text-[#7B7B7B] leading-relaxed">
                        <p class="mt-3" x-text="f.answer"></p>
                    </div>
                </div>
            </template>
        </section>

    </div>

</div>
@endsection

