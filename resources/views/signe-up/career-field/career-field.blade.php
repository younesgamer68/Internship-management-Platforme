<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Intern Link</title>

    <link rel="icon" href="{{ asset('images/Logos/Small Logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/Logos/Small Logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|righteous:400" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500;600;700&family=Raleway:wght@400;500;600&family=Poppins:wght@400;600;700;800&family=Nunito:wght@400;600;700&family=Sora:wght@600;700&family=DM+Sans:wght@500;700&family=Inter:wght@600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/welcome.css'])

    <!-- Alpine.js: plugin first, then core -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.14.8/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <x-ui-state />

</head>

<body x-data
    class="welcome-body flex min-h-screen flex-col bg-[#ffffff] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
    :class="$store.ui.darkMode ? 'bg-black text-white' : 'bg-[#ffffff] text-[#17494D]'">

    <div class="relative min-h-screen overflow-hidden px-4 pb-10 pt-5 sm:px-6 lg:px-8">
        <div class="pointer-events-none absolute -bottom-16 -left-16 h-52 w-52 rounded-full bg-sky-300/35 blur-2xl">
        </div>
        <div class="pointer-events-none absolute -right-10 -top-10 h-48 w-48 rounded-full bg-violet-300/40 blur-2xl">
        </div>

        <div
            class="relative z-10 mx-auto flex w-full max-w-7xl items-center justify-between border-b border-[#17494D]/10 pb-4">
            <a href="{{ route('home') }}" class="inline-flex items-center" aria-label="InternLink home">
                <img src="{{ asset('images/Logos/Logo.png') }}" alt="InternLink" class="h-9 w-auto sm:h-10">
            </a>

            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
            <button type="button" onclick="openLogoutModal()"
                    class="rounded-xl border border-[#17494D]/15 bg-white px-4 py-2 text-sm font-semibold text-[#17494D] shadow-sm transition hover:-translate-y-0.5 hover:border-[#17494D]/30 hover:bg-[#f5fbfb]">
                    Logout
            </button>
        </div>

        <main
            class="relative z-10 mx-auto mt-8 w-full max-w-6xl rounded-3xl border border-white/80 bg-white/85 p-5 shadow-xl backdrop-blur sm:p-8 lg:p-10">
            <p class="text-center text-xs font-bold uppercase tracking-[0.22em] text-[#128b83]">Welcome</p>
            <h1
                class="mt-3 text-center font-['Space_Grotesk',ui-sans-serif,system-ui] text-3xl font-bold tracking-tight text-[#102a43] sm:text-4xl lg:text-5xl">
                Start your career journey
            </h1>
            <p class="mx-auto mt-5 max-w-3xl text-center text-sm leading-relaxed text-[#4c6272] sm:text-base">
                Select a career field that ensures you are matched with the right opportunity and company.
            </p>

            <form method="POST" action="{{ route('career_fields.store') }}" class="mt-8">
                @csrf

                <div class="grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-3 xl:grid-cols-5">
                    @foreach ($careerFields as $careerField)
                    @php($fieldId = 'career-field-' . \Illuminate\Support\Str::slug($careerField))
                    <div>
                        <input class="peer sr-only" type="radio" name="career_field" id="{{ $fieldId }}"
                            value="{{ $careerField }}" @checked(old('career_field') === $careerField || auth()->user()->career_field === $careerField)>
                        <label for="{{ $fieldId }}"
                            class="flex min-h-14 cursor-pointer items-center justify-center rounded-2xl border border-[#17494D]/10 bg-white px-3 py-3 text-center text-sm font-medium text-[#12344a] shadow-sm transition peer-checked:border-[#0f766e] peer-checked:bg-teal-50 peer-checked:font-semibold peer-checked:text-[#0f766e] hover:-translate-y-0.5 hover:border-[#0f766e]/45 hover:shadow-md sm:px-4 sm:text-[15px]">
                            {{ $careerField }}
                        </label>
                    </div>
                    @endforeach
                </div>

                @error('career_field')
                    <p class="mt-4 text-center text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-[#102a43] px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-[#0b2135] sm:w-auto sm:min-w-48 sm:text-base">
                        Find opportunities
                    </button>
                </div>
            </form>
        </main>
    </div>

{{-- Logout Confirmation Modal --}}
<div id="logoutModal" style="position:fixed;inset:0;z-index:60;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.4);opacity:0;pointer-events:none;transition:opacity 0.3s ease;">
    <div id="logoutPanel" style="background:#fff;border-radius:1rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);width:100%;max-width:24rem;margin:0 1rem;overflow:hidden;transform:scale(0.95) translateY(10px);opacity:0;transition:transform 0.3s ease, opacity 0.3s ease;">
        <div style="display:flex;align-items:center;justify-content:space-between;padding:1.5rem 1.5rem 0.25rem;">
            <h3 style="font-size:1rem;font-weight:700;color:#444444;margin:0;">Log out</h3>
            <button onclick="closeLogoutModal()" style="width:1.75rem;height:1.75rem;border-radius:0.5rem;border:none;background:transparent;cursor:pointer;display:flex;align-items:center;justify-content:center;">
                <svg width="16" height="16" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div style="padding:0.75rem 1.5rem 1.5rem;">
            <p style="font-size:0.875rem;color:#6b7280;line-height:1.6;margin:0;">You are currently signing up, you could lose your progress.</p>
        </div>
        <div style="display:flex;gap:0.75rem;padding:1rem 1.5rem;border-top:1px solid #f3f4f6;">
            <button onclick="closeLogoutModal()" style="flex:1;padding:0.625rem 1rem;border-radius:0.75rem;border:1px solid #e5e7eb;background:#fff;font-size:0.875rem;font-weight:600;color:#374151;cursor:pointer;text-align:center;">
                Cancel
            </button>
            <button onclick="document.getElementById('logout-form').submit();" style="flex:1;padding:0.625rem 1rem;border-radius:0.75rem;border:none;background:#dc2626;color:#fff;font-size:0.875rem;font-weight:600;cursor:pointer;text-align:center;">
                Log out
            </button>
        </div>
    </div>
</div>

<script>
    function openLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const panel = document.getElementById('logoutPanel');
        modal.style.opacity = '1';
        modal.style.pointerEvents = 'auto';
        panel.style.transform = 'scale(1) translateY(0)';
        panel.style.opacity = '1';
    }
    function closeLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const panel = document.getElementById('logoutPanel');
        modal.style.opacity = '0';
        modal.style.pointerEvents = 'none';
        panel.style.transform = 'scale(0.95) translateY(10px)';
        panel.style.opacity = '0';
    }
    document.getElementById('logoutModal').addEventListener('click', function(e) {
        if (e.target === this) closeLogoutModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLogoutModal();
    });
</script>

</body>

</html>