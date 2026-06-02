<x-layouts::auth>
    <div class="min-h-screen bg-[#0A170F] flex items-center justify-center px-4">
        <!-- ====== HEADER ====== -->
        <div class="absolute top-0 left-0 right-0 px-6 py-4 flex justify-between items-center border-b border-white">
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-1 hover:opacity-80 transition">
                <img src="{{ asset('images/Logos/LWDM.png') }}" alt="InterLink Logo" class="w-10 h-10 object-contain">
                <span class="text-white font-semibold text-sm">InterLink</span>
            </a>
            <a href="{{ route('choose_path') }}"
                class="bg-white text-slate-900 px-6 py-2 rounded font-semibold text-sm hover:bg-gray-100 transition">
                Log in
            </a>
        </div>

        <!-- ====== MAIN CONTENT ====== -->
        <div class="w-full max-w-md text-center">
            <div class="mb-8">
                <svg class="w-16 h-16 mx-auto text-red-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <h1 class="text-3xl font-bold text-white mb-2">Registration Error</h1>
                <p class="text-gray-300">
                    We're sorry, but this email is already registered as a company or intern on our platform. 
                </p>
                <p class="text-gray-400 mt-2 text-sm">
                    Please use a different email address or log in with your existing account.
                </p>
            </div>

            <div class="flex flex-col gap-3">
                <a href="{{ route('choose_path') }}" class="w-full bg-[#0F766E] hover:bg-[#0d6963] text-white font-semibold py-3 px-4 rounded-lg transition">
                    Go to Login
                </a>
                <a href="javascript:history.back()" class="w-full bg-transparent border border-white/30 text-white font-semibold py-3 px-4 rounded-lg hover:bg-white/10 transition">
                    Go Back
                </a>
            </div>
        </div>
    </div>
</x-layouts::auth>
