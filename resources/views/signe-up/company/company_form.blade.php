<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Setup — InternLink</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green:      #0ea57a;
            --green-soft: #0d9970;
            --green-dim:  rgba(14,165,122,0.12);
            --bg:         #07100d;
            --surface:    #0c1a14;
            --surface-2:  #0f2018;
            --border:     #182e22;
            --border-2:   #1e3a2a;
            --text:       #dff0e7;
            --text-mid:   #6fa f8b;
            --text-dim:   #3d5e4a;
            --danger:     #f87171;
        }

        html, body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        /* Dotted grid */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image: radial-gradient(circle, rgba(14,165,122,0.14) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none; z-index: 0;
        }

        /* Glow blobs */
        body::after {
            content: '';
            position: fixed;
            width: 520px; height: 520px;
            background: radial-gradient(circle, rgba(14,165,122,0.07) 0%, transparent 70%);
            top: -100px; left: 50%;
            transform: translateX(-50%);
            pointer-events: none; z-index: 0;
        }

        /* ─── Layout ──────────────────────────── */
        .page {
            position: relative; z-index: 1;
            min-height: 100vh;
            display: flex; align-items: flex-start; justify-content: center;
            padding: 48px 16px 72px;
        }

        .shell {
            width: 100%; max-width: 640px;
            animation: rise 0.4s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes rise {
            from { opacity:0; transform:translateY(18px); }
            to   { opacity:1; transform:translateY(0); }
        }

        /* ─── Logo ────────────────────────────── */
        .logo-row {
            display: flex; align-items: center; justify-content: center;
            gap: 10px;
            margin-bottom: 36px;
        }

        .logo-img {
            height: 38px;
            width: auto;
            object-fit: contain;
            /* invert white bg → transparent on dark */
            filter: brightness(0) invert(1) sepia(1) saturate(5) hue-rotate(130deg);
        }

        /* ─── Stepper ─────────────────────────── */
        .stepper {
            display: flex; align-items: center;
            gap: 0;
            margin-bottom: 40px;
        }

        .step-item {
            display: flex; align-items: center; gap: 10px;
            flex: 1;
        }

        .step-item:last-child { flex: 0; }

        .step-bubble {
            width: 34px; height: 34px; border-radius: 50%;
            border: 2px solid var(--border-2);
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700;
            color: var(--text-dim);
            background: var(--surface);
            flex-shrink: 0;
            transition: all 0.25s;
            position: relative;
        }

        .step-bubble.active {
            border-color: var(--green);
            color: var(--green);
            background: var(--green-dim);
            box-shadow: 0 0 0 4px rgba(14,165,122,0.1);
        }

        .step-bubble.done {
            border-color: var(--green);
            background: var(--green);
            color: #fff;
        }

        .step-bubble.done::after {
            content: '';
            display: block;
            width: 10px; height: 6px;
            border-left: 2px solid #fff;
            border-bottom: 2px solid #fff;
            transform: rotate(-45deg) translateY(-1px);
        }

        .step-label {
            font-size: 11.5px; font-weight: 600;
            letter-spacing: 0.01em;
            color: var(--text-dim);
            white-space: nowrap;
            transition: color 0.25s;
        }

        .step-label.active { color: var(--green); }
        .step-label.done   { color: #4d9a74; }

        .step-line {
            flex: 1;
            height: 2px;
            background: var(--border-2);
            margin: 0 8px;
            border-radius: 2px;
            transition: background 0.4s;
        }

        .step-line.done { background: var(--green); }

        /* ─── Card ────────────────────────────── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 44px 48px 42px;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--green) 0%, #05c792 100%);
            border-radius: 22px 22px 0 0;
        }

        .card-badge {
            display: inline-flex; align-items: center; gap: 7px;
            font-size: 10px; font-weight: 700; letter-spacing: 0.16em;
            text-transform: uppercase; color: var(--green);
            margin-bottom: 12px;
        }

        .card-badge::before {
            content: '';
            width: 20px; height: 2px;
            background: var(--green); border-radius: 2px;
        }

        .card-title {
            font-size: 24px; font-weight: 800;
            color: #edf7f2;
            letter-spacing: -0.4px;
            line-height: 1.25;
            margin-bottom: 6px;
        }

        .card-sub {
            font-size: 13.5px;
            color: #4a7a5e;
            line-height: 1.65;
            margin-bottom: 32px;
        }

        /* ─── Form fields ─────────────────────── */
        .fields { display: flex; flex-direction: column; gap: 18px; }
        .fields-row { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }

        .field { display: flex; flex-direction: column; gap: 7px; }

        .field label {
            font-size: 11px; font-weight: 700;
            letter-spacing: 0.12em; text-transform: uppercase;
            color: #4a7a5e;
        }

        .field label span { color: #f87171; margin-left: 2px; }

        input[type="text"],
        input[type="url"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            background: #091510;
            border: 1.5px solid var(--border-2);
            border-radius: 10px;
            padding: 11px 14px;
            font-family: 'Inter', sans-serif;
            font-size: 13.5px;
            color: var(--text);
            outline: none;
            transition: border-color 0.18s, box-shadow 0.18s, background 0.18s;
            -webkit-appearance: none;
        }

        input::placeholder, textarea::placeholder { color: #243d2d; }

        input:focus, select:focus, textarea:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(14,165,122,0.1);
            background: #0a1a11;
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 24 24' fill='none' stroke='%234a7a5e' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            padding-right: 38px;
            cursor: pointer;
        }

        select option { background: #0d1a11; color: var(--text); }

        textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.65;
        }

        .err {
            font-size: 11.5px; color: var(--danger); margin-top: 2px;
        }

        /* Hint text under field */
        .hint {
            font-size: 11.5px; color: #3d5e4a; margin-top: 2px;
        }

        /* ─── Buttons ─────────────────────────── */
        .btn-row {
            display: flex; align-items: center; gap: 12px;
            margin-top: 32px;
        }

        .btn-back {
            flex: 0 0 auto;
            height: 48px; padding: 0 22px;
            background: transparent;
            border: 1.5px solid var(--border-2);
            border-radius: 10px;
            color: #4d7a60;
            font-family: 'Inter', sans-serif;
            font-size: 13.5px; font-weight: 600;
            cursor: pointer;
            transition: border-color 0.15s, color 0.15s;
            display: flex; align-items: center; gap: 7px;
        }

        .btn-back:hover { border-color: var(--green); color: var(--green); }

        .btn-next, .btn-submit {
            flex: 1;
            height: 48px;
            background: var(--green);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 13.5px; font-weight: 700;
            letter-spacing: 0.02em;
            cursor: pointer;
            transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
            display: flex; align-items: center; justify-content: center; gap: 7px;
        }

        .btn-next:hover, .btn-submit:hover {
            background: var(--green-soft);
            box-shadow: 0 4px 20px rgba(14,165,122,0.22);
        }

        .btn-next:active, .btn-submit:active { transform: scale(0.985); }

        /* ─── Step panels ─────────────────────── */
        .step-panel { display: none; }
        .step-panel.active { display: block; animation: fadein 0.28s ease both; }

        @keyframes fadein {
            from { opacity:0; transform:translateX(10px); }
            to   { opacity:1; transform:translateX(0); }
        }

        /* ─── Footer note ─────────────────────── */
        .foot {
            text-align: center;
            font-size: 12px;
            color: #283f30;
            margin-top: 20px;
            line-height: 1.7;
        }

        /* ─── Responsive ──────────────────────── */
        @media (max-width: 580px) {
            .card { padding: 30px 22px 28px; }
            .fields-row { grid-template-columns: 1fr; }
            .step-label { display: none; }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="shell">

        {{-- Logo --}}
        <div class="logo-row">
            @php
                $smallLogoPath = public_path('images/Logos/Small Logo.png');
                $tlmLogoPath   = public_path('images/Logos/TLM.png');
            @endphp
            {{-- Use the icon mark with mix-blend-mode:screen so the white bg vanishes on dark --}}
            @if(file_exists($smallLogoPath))
                <img src="{{ asset('images/Logos/Small Logo.png') }}"
                     alt="InternLink icon"
                     style="height:34px; width:auto; mix-blend-mode:screen; image-rendering:crisp-edges;">
            @endif
            <span style="font-size:21px;font-weight:800;letter-spacing:-0.5px;color:#0ea57a;">Intern<span style="color:#8a9fa8;">Link</span></span>
        </div>

        {{-- Stepper --}}
        <div class="stepper" id="stepper">
            <div class="step-item">
                <div class="step-bubble active" id="bubble-1">1</div>
                <span class="step-label active" id="label-1">Company Info</span>
            </div>
            <div class="step-line" id="line-1"></div>
            <div class="step-item">
                <div class="step-bubble" id="bubble-2">2</div>
                <span class="step-label" id="label-2">Location & Size</span>
            </div>
            <div class="step-line" id="line-2"></div>
            <div class="step-item">
                <div class="step-bubble" id="bubble-3">3</div>
                <span class="step-label" id="label-3">About Company</span>
            </div>
        </div>

        {{-- Card --}}
        <form action="{{ route('company.setup.store') }}" method="POST" id="setupForm" novalidate>
            @csrf
            <div class="card">

                {{-- Step 1 --}}
                <div class="step-panel active" id="panel-1">
                    <div class="card-badge">Step 1 of 3</div>
                    <h2 class="card-title">Your company basics</h2>
                    <p class="card-sub">Let's start with the essentials. This is how interns will find you.</p>
                    <div class="fields">
                        <div class="field">
                            <label for="company_name">Company Name <span>*</span></label>
                            <input type="text" id="company_name" name="company_name"
                                   placeholder="e.g. Acme Corporation"
                                   value="{{ old('company_name') }}" required>
                            @error('company_name')<p class="err">{{ $message }}</p>@enderror
                        </div>
                        <div class="fields-row">
                            <div class="field">
                                <label for="industry">Industry</label>
                                <select id="industry" name="industry">
                                    <option value="">Select industry…</option>
                                    <option value="Technology" {{ old('industry')=='Technology'?'selected':'' }}>Technology</option>
                                    <option value="Finance" {{ old('industry')=='Finance'?'selected':'' }}>Finance</option>
                                    <option value="Healthcare" {{ old('industry')=='Healthcare'?'selected':'' }}>Healthcare</option>
                                    <option value="Education" {{ old('industry')=='Education'?'selected':'' }}>Education</option>
                                    <option value="Marketing" {{ old('industry')=='Marketing'?'selected':'' }}>Marketing</option>
                                    <option value="Manufacturing" {{ old('industry')=='Manufacturing'?'selected':'' }}>Manufacturing</option>
                                    <option value="Retail" {{ old('industry')=='Retail'?'selected':'' }}>Retail</option>
                                    <option value="Consulting" {{ old('industry')=='Consulting'?'selected':'' }}>Consulting</option>
                                    <option value="Media" {{ old('industry')=='Media'?'selected':'' }}>Media & Communications</option>
                                    <option value="NGO" {{ old('industry')=='NGO'?'selected':'' }}>NGO / Non-profit</option>
                                    <option value="Other" {{ old('industry')=='Other'?'selected':'' }}>Other</option>
                                </select>
                                @error('industry')<p class="err">{{ $message }}</p>@enderror
                            </div>
                            <div class="field">
                                <label for="website">Website URL</label>
                                <input type="url" id="website" name="website"
                                       placeholder="https://yourcompany.com"
                                       value="{{ old('website') }}">
                                @error('website')<p class="err">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="btn-row">
                        <button type="button" class="btn-next" onclick="goStep(2)">
                            Continue
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="step-panel" id="panel-2">
                    <div class="card-badge">Step 2 of 3</div>
                    <h2 class="card-title">Location & team size</h2>
                    <p class="card-sub">Help interns understand where you're based and how big your team is.</p>
                    <div class="fields">
                        <div class="fields-row">
                            <div class="field">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country"
                                       placeholder="e.g. Morocco"
                                       value="{{ old('country') }}">
                                @error('country')<p class="err">{{ $message }}</p>@enderror
                            </div>
                            <div class="field">
                                <label for="city">City / Headquarters</label>
                                <input type="text" id="city" name="city"
                                       placeholder="e.g. Casablanca"
                                       value="{{ old('city') }}">
                                @error('city')<p class="err">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="field">
                            <label for="company_size">Company Size</label>
                            <select id="company_size" name="company_size">
                                <option value="">Select team size…</option>
                                <option value="1-10"    {{ old('company_size')=='1-10'   ?'selected':'' }}>1–10 employees (Startup)</option>
                                <option value="11-50"   {{ old('company_size')=='11-50'  ?'selected':'' }}>11–50 employees (Small)</option>
                                <option value="51-200"  {{ old('company_size')=='51-200' ?'selected':'' }}>51–200 employees (Mid-size)</option>
                                <option value="201-500" {{ old('company_size')=='201-500'?'selected':'' }}>201–500 employees (Growing)</option>
                                <option value="500+"    {{ old('company_size')=='500+'   ?'selected':'' }}>500+ employees (Enterprise)</option>
                            </select>
                            @error('company_size')<p class="err">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="btn-row">
                        <button type="button" class="btn-back" onclick="goStep(1)">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                            Back
                        </button>
                        <button type="button" class="btn-next" onclick="goStep(3)">
                            Continue
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="step-panel" id="panel-3">
                    <div class="card-badge">Step 3 of 3</div>
                    <h2 class="card-title">Tell your story</h2>
                    <p class="card-sub">A short description helps interns understand your mission and culture.</p>
                    <div class="fields">
                        <div class="field">
                            <label for="description">Company Description</label>
                            <textarea id="description" name="description"
                                      placeholder="What does your company do? What's the culture like? What kind of interns are you looking for?">{{ old('description') }}</textarea>
                            <span class="hint">Aim for 2–4 sentences. Keep it honest and welcoming.</span>
                            @error('description')<p class="err">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="btn-row">
                        <button type="button" class="btn-back" onclick="goStep(2)">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                            Back
                        </button>
                        <button type="submit" class="btn-submit" id="submitBtn">
                            Launch My Profile
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </button>
                    </div>
                </div>

            </div>{{-- /card --}}
        </form>

        <p class="foot">Your information is kept private and used only to match you with the right interns.<br>You can edit your profile any time from your dashboard.</p>

    </div>
</div>

<script>
    let current = 1;

    // If server returned validation errors, show which step has errors
    @if($errors->any())
        const errorFields = @json($errors->keys());
        const step1Fields = ['company_name', 'industry', 'website'];
        const step2Fields = ['country', 'city', 'company_size'];
        const step3Fields = ['description'];

        if (errorFields.some(f => step3Fields.includes(f))) {
            current = 3;
        } else if (errorFields.some(f => step2Fields.includes(f))) {
            current = 2;
        }
    @endif

    function goStep(n) {
        if (n > current) {
            // Validate current step before advancing
            const panel = document.getElementById('panel-' + current);
            const inputs = panel.querySelectorAll('input[required], select[required]');
            let valid = true;
            inputs.forEach(inp => {
                if (!inp.value.trim()) { inp.focus(); valid = false; }
            });
            // Special: step 1 must have company_name
            if (current === 1) {
                const cn = document.getElementById('company_name');
                if (!cn.value.trim()) { cn.focus(); cn.style.borderColor = '#f87171'; return; }
                else cn.style.borderColor = '';
            }
        }

        // Mark old as done
        const oldBubble = document.getElementById('bubble-' + current);
        const oldLabel  = document.getElementById('label-'  + current);
        oldBubble.classList.remove('active');
        oldBubble.classList.add('done');
        oldBubble.textContent = '';
        oldLabel.classList.remove('active');
        oldLabel.classList.add('done');

        if (n < current) {
            // Going back – un-done the current
            oldBubble.classList.remove('done');
            oldBubble.textContent = current;
        }

        // Hide old panel
        document.getElementById('panel-' + current).classList.remove('active');

        // Activate lines
        for (let i = 1; i < 3; i++) {
            const line = document.getElementById('line-' + i);
            line.classList.toggle('done', i < n);
        }

        current = n;

        // Activate new bubble + label
        const newBubble = document.getElementById('bubble-' + current);
        const newLabel  = document.getElementById('label-'  + current);
        newBubble.classList.remove('done');
        newBubble.classList.add('active');
        newBubble.textContent = current;
        newLabel.classList.add('active');
        newLabel.classList.remove('done');

        // Show new panel
        document.getElementById('panel-' + current).classList.add('active');

        // Scroll to top of card
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Init to correct step if server errors
    if (current !== 1) {
        for (let i = 1; i < current; i++) {
            const b = document.getElementById('bubble-' + i);
            const l = document.getElementById('label-' + i);
            b.classList.remove('active'); b.classList.add('done'); b.textContent = '';
            l.classList.remove('active'); l.classList.add('done');
            const line = document.getElementById('line-' + i);
            if (line) line.classList.add('done');
        }
        document.querySelectorAll('.step-panel').forEach(p => p.classList.remove('active'));
        const nb = document.getElementById('bubble-' + current);
        const nl = document.getElementById('label-' + current);
        nb.classList.add('active'); nb.textContent = current;
        nl.classList.add('active');
        document.getElementById('panel-' + current).classList.add('active');
    }

    // Submit loading state
    document.getElementById('setupForm').addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="animation:spin 0.8s linear infinite"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg> Setting up…';
    });
</script>
<style>
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>
</body>
</html>