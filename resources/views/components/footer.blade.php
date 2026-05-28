<footer class="bg-[#0d0d0f] pt-14 pb-50 pb-8 px-8 md:px-16 relative overflow-hidden" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    {{-- ===================== --}}
    {{-- Background Decorations --}}
    {{-- ===================== --}}
    
    {{-- Large background grid pattern --}}
    <div class="absolute inset-0 z-0 opacity-10" style="background-image: 
        linear-gradient(to right, #374151 1px, transparent 1px),
        linear-gradient(to bottom, #374151 1px, transparent 1px);
        background-size: 50px 50px;">
    </div>
    
    {{-- Glowing light spots --}}
    <div class="absolute -top-40 -left-40 w-80 h-80 bg-indigo-500 rounded-full opacity-20 blur-3xl z-0"></div>
    <div class="absolute -top-20 -right-20 w-96 h-96 bg-purple-500 rounded-full opacity-15 blur-3xl z-0"></div>
    <div class="absolute -bottom-40 -left-20 w-80 h-80 bg-cyan-500 rounded-full opacity-10 blur-3xl z-0"></div>
    <div class="absolute -bottom-20 -right-40 w-96 h-96 bg-emerald-500 rounded-full opacity-10 blur-3xl z-0"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-blue-500 rounded-full opacity-5 blur-3xl z-0"></div>

    {{-- ===================== --}}
    {{-- Watermark/Brand Element at Bottom (from footer 1) --}}
    {{-- ===================== --}}
    <div class="pointer-events-none absolute bottom-[400px] left-[265px] z-0 flex w-full select-none items-center justify-start gap-[8px] whitespace-nowrap px-[12px] sm:gap-[12px] md:bottom-[-8px] md:gap-[16px] lg:bottom-[-10px] lg:gap-[24px] lg:px-[24px]">
        <img class="h-auto w-[clamp(28px,9vw,56px)] opacity-[0.13] sm:w-[clamp(34px,8vw,78px)] lg:w-[clamp(180px,6.4vw,140px)]"
            src="{{ asset('images/Logos/Logo.png') }}" alt="Logo" />
        <div class="font-[Inter,sans-serif] text-[clamp(30px,11.5vw,64px)] font-semibold leading-none tracking-[clamp(-1px,-0.25vw,-4px)] text-white/1 [text-shadow:0_0_0_rgba(0,0,0,0)] [-webkit-text-stroke:0.8px_rgba(255,255,255,0.06)] sm:text-[clamp(42px,11vw,110px)] lg:text-[clamp(52px,10vw,220px)] lg:[-webkit-text-stroke:1px_rgba(255,255,255,0.06)]">
            InterLink
        </div>
    </div>

    {{-- ===================== --}}
    {{-- Dot Decorations --}}
    {{-- ===================== --}}
    
    {{-- Dot grid top left --}}
    <div class="absolute top-8 left-8 grid gap-2 z-10" style="grid-template-columns: repeat(8, 1fr);">
        @for($i = 0; $i < 24; $i++)
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-40"></div>
        @endfor
    </div>

    {{-- Dot grid top right --}}
    <div class="absolute top-8 right-8 grid gap-2 z-10" style="grid-template-columns: repeat(6, 1fr);">
        @for($i = 0; $i < 18; $i++)
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-30"></div>
        @endfor
    </div>

    {{-- Dot grid bottom left --}}
    <div class="absolute bottom-8 left-8 grid gap-2 z-10" style="grid-template-columns: repeat(6, 1fr);">
        @for($i = 0; $i < 12; $i++)
            <div class="w-1 h-1 rounded-full bg-gray-600 opacity-30"></div>
        @endfor
    </div>

    {{-- Vertical dot line right side --}}
    <div class="absolute right-6 top-1/3 grid gap-2.5 z-10" style="grid-template-columns: repeat(1, 1fr);">
        @for($i = 0; $i < 12; $i++)
            <div class="w-1.5 h-1.5 rounded-full bg-gray-600 opacity-40"></div>
        @endfor
    </div>

    {{-- ===================== --}}
    {{-- Small Decorative Elements --}}
    {{-- ===================== --}}
    
    {{-- Small diamonds --}}
    <div class="absolute top-20 right-32 w-2 h-2 bg-indigo-400 rotate-45 z-10 opacity-60"></div>
    <div class="absolute bottom-32 left-24 w-2.5 h-2.5 bg-purple-400 rotate-45 z-10 opacity-50"></div>
    <div class="absolute top-1/2 right-48 w-1.5 h-1.5 bg-cyan-400 rotate-45 z-10 opacity-40"></div>
    <div class="absolute bottom-1/3 left-40 w-2 h-2 bg-pink-400 rotate-45 z-10 opacity-50"></div>
    <div class="absolute top-40 right-64 w-1 h-1 bg-emerald-400 rotate-45 z-10 opacity-60"></div>
    
    {{-- Small circles --}}
    <div class="absolute top-32 left-1/4 w-1.5 h-1.5 rounded-full bg-cyan-400 z-10 opacity-50"></div>
    <div class="absolute bottom-40 right-1/3 w-2 h-2 rounded-full bg-yellow-400 z-10 opacity-40"></div>
    <div class="absolute top-1/2 left-20 w-1 h-1 rounded-full bg-emerald-400 z-10 opacity-60"></div>
    <div class="absolute bottom-20 right-32 w-1.5 h-1.5 rounded-full bg-red-400 z-10 opacity-40"></div>
    <div class="absolute top-24 right-1/2 w-1 h-1 rounded-full bg-blue-400 z-10 opacity-50"></div>
    
    {{-- Small stars --}}
    <div class="absolute top-16 right-40 text-white opacity-15 z-10" style="font-size: 14px;">✦</div>
    <div class="absolute bottom-24 left-48 text-white opacity-10 z-10" style="font-size: 10px;">✦</div>
    <div class="absolute top-1/3 right-20 text-white opacity-12 z-10" style="font-size: 8px;">✦</div>
    
    {{-- Plus shapes --}}
    <div class="absolute top-48 left-32 text-indigo-400 opacity-30 z-10" style="font-size: 10px;">+</div>
    <div class="absolute bottom-48 right-28 text-purple-400 opacity-25 z-10" style="font-size: 8px;">+</div>
    <div class="absolute top-2/3 left-56 text-cyan-400 opacity-20 z-10" style="font-size: 7px;">+</div>
    
    {{-- Small gradient lines --}}
    <div class="absolute top-56 right-36 w-12 h-px bg-gradient-to-r from-transparent to-indigo-500 opacity-20 z-10"></div>
    <div class="absolute bottom-36 left-44 w-16 h-px bg-gradient-to-l from-transparent to-purple-500 opacity-20 z-10"></div>
    <div class="absolute top-1/2 right-24 w-8 h-px bg-gradient-to-l from-transparent to-cyan-500 opacity-15 z-10"></div>

    {{-- Top border --}}
    <div class="border-t border-gray-800 mb-12 relative z-20"></div>

    <div class="max-w-6xl mx-auto relative z-20">

        {{-- Nav Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-6 gap-8 mb-16">

            {{-- Col 1: Platform --}}
            <div>
                <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Platform</h5>
                <ul class="flex flex-col gap-2.5">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">CRM</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Marketing</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Engagement</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Automation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Forms</a></li>
                </ul>
            </div>

            {{-- Col 2: (no heading - continuation) --}}
            <div class="mt-7">
                <ul class="flex flex-col gap-2.5">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">SMS</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Email</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Whatsapp</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Email Validation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Email Finder</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Inbox</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Zixflow AI</a></li>
                </ul>
            </div>

            {{-- Col 3: (no heading - continuation) --}}
            <div class="mt-7">
                <ul class="flex flex-col gap-2.5">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Templates</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Outbound Sales</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Inbound Sales</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Lead generation</a></li>
                </ul>
            </div>

            {{-- Col 4: empty spacer on desktop --}}
            <div class="hidden md:block"></div>

            {{-- Col 5: Company --}}
            <div>
                <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Company</h5>
                <ul class="flex flex-col gap-2.5">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">About us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Careers</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Contact us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Write Review</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Security</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Partners</a></li>
                </ul>
            </div>

            {{-- Col 6: Resources --}}
            <div>
                <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Resources</h5>
                <ul class="flex flex-col gap-2.5">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Integrations</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Video Tutorials</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Help center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Developers</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">Community</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">For startups</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-150">For enterprises</a></li>
                </ul>
            </div>

        </div>

    
    </div>



</footer>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes glow {
        0%, 100% { opacity: 0.1; }
        50% { opacity: 0.2; }
    }
    
    .glowing-orb {
        animation: glow 8s ease-in-out infinite;
    }
</style>