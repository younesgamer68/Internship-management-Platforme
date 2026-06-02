@extends('layouts.public')

@section('title', 'Application Tracker — Interlink')
@section('meta_description', 'Manage active internship loops, coordinate scheduler links, and reply to partner recruiter messages on Interlink.')

@section('content')
<div x-data="{
    activeTab: 'kanban',
    applications: [
        { id: 1, role: 'Frontend Developer Intern', company: 'Vercel', stipend: '$55/hr', status: 'offered', logo: 'V', logoBg: 'bg-black', date: 'Applied 10d ago', note: 'Offer sheet received. Approved by Stanford CS.' },
        { id: 2, role: 'Backend Systems Intern', company: 'Stripe', stipend: '$62.50/hr', status: 'interviewing', logo: 'S', logoBg: 'bg-[#635bff]', date: 'Updated 1d ago', note: 'System design loop booked for Thursday.' },
        { id: 3, role: 'Product Design Intern', company: 'Figma', stipend: '$48/hr', status: 'phone_screen', logo: 'F', logoBg: 'bg-[#f24e1e]', date: 'Updated 3d ago', note: 'Initial HR screen completed.' },
        { id: 4, role: 'Database Infrastructure Intern', company: 'Supabase', stipend: '$50/hr', status: 'applied', logo: 'S', logoBg: 'bg-[#3ecf8e]', date: 'Applied 4d ago', note: 'Awaiting initial repo parse review.' },
        { id: 5, role: 'Technical PM Intern', company: 'Linear', stipend: '$45/hr', status: 'interviewing', logo: 'L', logoBg: 'bg-zinc-900 border border-zinc-700', date: 'Updated 2d ago', note: 'Product loop scheduled for next Tuesday.' },
        { id: 6, role: 'DevRel Advocate Intern', company: 'Resend', stipend: '$45/hr', status: 'applied', logo: 'R', logoBg: 'bg-zinc-800', date: 'Applied 5d ago', note: 'Awaiting HR triage review.' },
        { id: 7, role: 'ML Research Intern', company: 'Pinecone', stipend: '$65/hr', status: 'phone_screen', logo: 'P', logoBg: 'bg-[#2b1b54]', date: 'Updated 1d ago', note: 'Introduction call scheduled.' },
        { id: 8, role: 'Full-Stack Developer Intern', company: 'Retool', stipend: '$58/hr', status: 'offered', logo: 'R', logoBg: 'bg-[#2563EB]', date: 'Applied 12d ago', note: 'Offer letter received. Approved by DSO.' }
    ],
    messages: [
        { id: 1, sender: 'Thomas Ruck', company: 'Vercel', avatar: 'TR', text: 'Hi Alexander, I have attached your credit compliance agreement. Please review and sign.', time: '2 hours ago' },
        { id: 2, sender: 'Sarah Keates', company: 'Stripe', avatar: 'SK', text: 'We have finalized the system design panel loops. See you on Thursday at 2 PM.', time: 'Yesterday' },
        { id: 3, sender: 'Lars Halvorsen', company: 'Supabase', avatar: 'LH', text: 'Hey Alexander, your database benchmarking scores are highly aligned. Let\'s talk next Monday.', time: '2 days ago' },
        { id: 4, sender: 'Karla Smith', company: 'Linear', avatar: 'KS', text: 'Can you schedule a 30-min intro chat on our portal? Link is in email.', time: '3 days ago' },
        { id: 5, sender: 'Dr. Vance', company: 'Pinecone', avatar: 'DV', text: 'We reviewed your similarity search proposal. Let\'s do a technical panel check-in.', time: '4 days ago' }
    ],
    updateStatus(appId, newStatus) {
        const app = this.applications.find(a => a.id === appId);
        if (app) {
            app.status = newStatus;
            app.date = 'Updated just now';
        }
    }
}" class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="border-b border-[#E5E7EB] pb-5 mb-8 md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h1 class="text-2xl font-bold tracking-tight text-[#444444] sm:text-3xl">Application Manager</h1>
            <p class="mt-1.5 text-xs text-[#7B7B7B] font-medium">Coordinate recruiter chats, checklist validations, and interviews in one place.</p>
        </div>
        
        <!-- Toggle Tabs -->
        <div class="mt-4 flex md:ml-4 md:mt-0 bg-zinc-200/80 p-0.5 rounded">
            <button @click="activeTab = 'kanban'" :class="activeTab === 'kanban' ? 'bg-white text-zinc-900 shadow-sm' : 'text-zinc-600'" class="px-3.5 py-1.5 rounded text-xs font-semibold transition-all">Pipeline Board</button>
            <button @click="activeTab = 'messages'" :class="activeTab === 'messages' ? 'bg-white text-zinc-900 shadow-sm' : 'text-zinc-600'" class="px-3.5 py-1.5 rounded text-xs font-semibold transition-all flex items-center gap-1">Recruiter Chat <span class="bg-[#00B1AA] text-white text-[9px] px-1.5 py-0.5 rounded-full font-bold">2</span></button>
        </div>
    </div>

    <!-- Tab 1: Kanban Pipeline Board -->
    <div x-show="activeTab === 'kanban'" x-cloak class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Kanban Columns (Left, 9 cols) -->
        <div class="lg:col-span-9 grid grid-cols-1 md:grid-cols-4 gap-4">
            
            <!-- Applied -->
            <div class="bg-zinc-100/70 border border-[#E5E7EB] rounded p-3 flex flex-col min-h-[450px]">
                <span class="text-xs font-bold text-[#444444] uppercase tracking-wider mb-3 px-1 block">Applied</span>
                <div class="space-y-3 flex-grow">
                    <template x-for="app in applications.filter(a => a.status === 'applied')" :key="app.id">
                        <div class="bg-white border border-[#E5E7EB] rounded p-3.5 shadow-soft space-y-3">
                            <div class="flex items-center gap-2">
                                <div :class="app.logoBg" class="h-7 w-7 text-white font-bold rounded flex items-center justify-center text-xs" x-text="app.logo"></div>
                                <h4 class="font-bold text-xs text-[#444444] truncate" x-text="app.role"></h4>
                            </div>
                            <div class="flex justify-between items-center text-[10px]">
                                <span class="text-zinc-400" x-text="app.date"></span>
                                <button @click="updateStatus(app.id, 'phone_screen')" class="text-[#00B1AA] font-bold hover:text-[#009c95]">Next &rarr;</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Phone Screen -->
            <div class="bg-zinc-100/70 border border-[#E5E7EB] rounded p-3 flex flex-col min-h-[450px]">
                <span class="text-xs font-bold text-[#444444] uppercase tracking-wider mb-3 px-1 block">Phone Screen</span>
                <div class="space-y-3 flex-grow">
                    <template x-for="app in applications.filter(a => a.status === 'phone_screen')" :key="app.id">
                        <div class="bg-white border border-[#E5E7EB] rounded p-3.5 shadow-soft space-y-3">
                            <div class="flex items-center gap-2">
                                <div :class="app.logoBg" class="h-7 w-7 text-white font-bold rounded flex items-center justify-center text-xs" x-text="app.logo"></div>
                                <h4 class="font-bold text-xs text-[#444444] truncate" x-text="app.role"></h4>
                            </div>
                            <div class="flex justify-between items-center text-[10px]">
                                <button @click="updateStatus(app.id, 'applied')" class="text-[#7B7B7B] font-bold">&larr; Back</button>
                                <button @click="updateStatus(app.id, 'interviewing')" class="text-[#00B1AA] font-bold hover:text-[#009c95]">Next &rarr;</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Interviewing -->
            <div class="bg-zinc-100/70 border border-[#E5E7EB] rounded p-3 flex flex-col min-h-[450px]">
                <span class="text-xs font-bold text-[#444444] uppercase tracking-wider mb-3 px-1 block">Interviewing</span>
                <div class="space-y-3 flex-grow">
                    <template x-for="app in applications.filter(a => a.status === 'interviewing')" :key="app.id">
                        <div class="bg-white border border-[#E5E7EB] rounded p-3.5 shadow-soft space-y-3">
                            <div class="flex items-center gap-2">
                                <div :class="app.logoBg" class="h-7 w-7 text-white font-bold rounded flex items-center justify-center text-xs" x-text="app.logo"></div>
                                <h4 class="font-bold text-[#444444] text-xs truncate" x-text="app.role"></h4>
                            </div>
                            <div class="flex justify-between items-center text-[10px]">
                                <button @click="updateStatus(app.id, 'phone_screen')" class="text-[#7B7B7B] font-bold">&larr; Back</button>
                                <button @click="updateStatus(app.id, 'offered')" class="text-[#00B1AA] font-bold hover:text-[#009c95]">Next &rarr;</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Offered -->
            <div class="bg-zinc-100/70 border border-[#E5E7EB] rounded p-3 flex flex-col min-h-[450px]">
                <span class="text-xs font-bold text-[#444444] uppercase tracking-wider mb-3 px-1 block">Offered</span>
                <div class="space-y-3 flex-grow">
                    <template x-for="app in applications.filter(a => a.status === 'offered')" :key="app.id">
                        <div class="bg-white border border-[#10B981]/20 rounded p-3.5 shadow-soft space-y-3">
                            <div class="flex items-center gap-2">
                                <div :class="app.logoBg" class="h-7 w-7 text-white font-bold rounded flex items-center justify-center text-xs" x-text="app.logo"></div>
                                <h4 class="font-bold text-[#444444] text-xs truncate" x-text="app.role"></h4>
                            </div>
                            <p class="text-[11px] text-[#444444] font-medium leading-normal bg-emerald-50 p-2 rounded" x-text="app.note"></p>
                            <div class="flex justify-between items-center text-[10px]">
                                <button @click="updateStatus(app.id, 'interviewing')" class="text-[#7B7B7B] font-bold">&larr; Back</button>
                                <span class="text-[#10B981] font-bold">Vetted Offer</span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

        </div>

        <!-- Reminders / Calendar Sidebar (Right, 3 cols) -->
        <aside class="lg:col-span-3 space-y-6">
            <!-- Reminders Box -->
            <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft space-y-4">
                <h3 class="font-bold text-xs uppercase tracking-wider text-[#444444] border-b border-zinc-100 pb-1.5">Upcoming Loops</h3>
                <div class="space-y-3 text-xs">
                    <div class="border-l-2 border-[#00B1AA] pl-3">
                        <span class="block font-bold text-[#444444]">Stripe Tech Panel</span>
                        <span class="block text-[#7B7B7B] font-medium mt-0.5">Thursday &bull; 2:00 PM EST</span>
                    </div>
                    <div class="border-l-2 border-zinc-250 pl-3">
                        <span class="block font-bold text-[#444444]">Vercel Contract Signature</span>
                        <span class="block text-[#7B7B7B] font-medium mt-0.5">July 1 Deadline</span>
                    </div>
                    <div class="border-l-2 border-zinc-200 pl-3">
                        <span class="block font-bold text-[#444444]">Supabase Intro Call</span>
                        <span class="block text-[#7B7B7B] font-medium mt-0.5">Next Monday &bull; 11:30 AM PST</span>
                    </div>
                    <div class="border-l-2 border-zinc-200 pl-3">
                        <span class="block font-bold text-[#444444]">Pinecone similarity sync</span>
                        <span class="block text-[#7B7B7B] font-medium mt-0.5">Next Wednesday &bull; 4:00 PM EST</span>
                    </div>
                </div>
            </div>

            <!-- Documents checklist (New Sidebar Card) -->
            <div class="bg-white border border-[#E5E7EB] rounded p-5 shadow-soft space-y-4">
                <h3 class="font-bold text-xs uppercase tracking-wider text-[#444444] border-b border-zinc-100 pb-1.5">Document Audit Checklist</h3>
                <div class="space-y-3.5 text-xs text-zinc-600 font-medium">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600"></i>
                        <span>Vercel Signed Offer (Escrow pending)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600"></i>
                        <span>Stanford CS CPT form generated</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-circle text-zinc-300"></i>
                        <span>Stripe NDA sign-off</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-circle text-zinc-300"></i>
                        <span>DSO authorization approval</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Tab 2: Recruiter Chat Messenger -->
    <div x-show="activeTab === 'messages'" x-cloak class="bg-white border border-[#E5E7EB] rounded overflow-hidden shadow-soft-lg grid grid-cols-1 md:grid-cols-12 min-h-[500px]">
        <!-- Conversations list -->
        <div class="md:col-span-4 border-r border-[#E5E7EB] divide-y divide-zinc-100">
            <template x-for="msg in messages" :key="msg.id">
                <div class="p-4 hover:bg-zinc-50 cursor-pointer transition-colors">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-xs text-[#444444]" x-text="msg.sender"></span>
                        <span class="text-[10px] text-[#7B7B7B]" x-text="msg.time"></span>
                    </div>
                    <p class="text-[11px] text-[#7B7B7B] font-semibold mt-1" x-text="msg.company"></p>
                    <p class="text-[11px] text-[#7B7B7B] truncate mt-1" x-text="msg.text"></p>
                </div>
            </template>
        </div>
        
        <!-- Active Chat Window -->
        <div class="md:col-span-8 flex flex-col justify-between p-6 bg-[#F8FAFA]">
            <div class="space-y-4 flex-grow">
                <div class="flex items-center gap-3 border-b border-[#E5E7EB] pb-3 mb-4">
                    <span class="h-9 w-9 bg-zinc-900 text-white rounded-full flex items-center justify-center font-bold text-xs">TR</span>
                    <div>
                        <span class="block text-xs font-bold text-[#444444]">Thomas Ruck</span>
                        <span class="block text-[10px] text-[#7B7B7B] font-medium">Vercel Core Hiring Lead</span>
                    </div>
                </div>
                
                <!-- Chat Bubbles -->
                <div class="space-y-3.5">
                    <div class="bg-white border border-[#E5E7EB] rounded p-3 max-w-md text-xs text-[#444444] leading-relaxed shadow-soft">
                        Hi Alexander, I have attached your credit compliance agreement. Please review and sign.
                    </div>
                    <div class="bg-[#00B1AA] text-white rounded p-3 max-w-md text-xs leading-relaxed ml-auto text-right">
                        Received, thank you Thomas. I will review it with my Stanford advisor this afternoon and submit via Interlink.
                    </div>
                </div>
            </div>
            
            <!-- Input area -->
            <form @submit.prevent="alert('Message dispatched to recruiter.')" class="mt-4 flex gap-2">
                <input type="text" placeholder="Type your reply..." class="flex-grow rounded border border-[#E5E7EB] px-4 py-2 text-xs bg-white">
                <button type="submit" class="rounded bg-[#00B1AA] hover:bg-[#009c95] text-white px-4 py-2 text-xs font-semibold">Send</button>
            </form>
        </div>
    </div>

</div>
@endsection


