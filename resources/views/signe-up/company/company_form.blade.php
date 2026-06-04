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
            --green:       #0ea57a;
            --green-soft:  #0d9970;
            --green-dim:   rgba(14,165,122,0.13);
            --bg:          #0b1418;
            --surface:     #111c22;
            --surface-2:   #142028;
            --border:      #1e3040;
            --border-2:    #263d50;
            --text:        #e8f4f0;
            --text-mid:    #7aacb5;
            --text-dim:    #3d6070;
            --danger:      #f87171;
        }

        html, body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        /* Snow-white dotted grid */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image: radial-gradient(circle, rgba(180,220,255,0.07) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none; z-index: 0;
        }

        /* Top snow glow blob */
        body::after {
            content: '';
            position: fixed;
            width: 700px; height: 700px;
            background: radial-gradient(ellipse at center,
                rgba(200,235,255,0.06) 0%,
                rgba(14,165,122,0.04) 40%,
                transparent 70%);
            top: -180px; left: 50%;
            transform: translateX(-50%);
            pointer-events: none; z-index: 0;
        }

        /* Extra ambient snow blobs */
        .snow-left {
            position: fixed; width: 380px; height: 380px;
            background: radial-gradient(circle, rgba(220,240,255,0.05) 0%, transparent 70%);
            bottom: 0; left: -80px;
            pointer-events: none; z-index: 0;
        }
        .snow-right {
            position: fixed; width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(180,220,255,0.04) 0%, transparent 70%);
            top: 30%; right: -60px;
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
            height: 34px; width: auto;
            mix-blend-mode: screen;
            image-rendering: crisp-edges;
        }

        /* ─── Stepper ─────────────────────────── */
        .stepper {
            display: flex; align-items: center;
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
        }

        .step-bubble.active {
            border-color: var(--green);
            color: var(--green);
            background: var(--green-dim);
            box-shadow: 0 0 0 4px rgba(14,165,122,0.1), 0 0 12px rgba(200,235,255,0.05);
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
            background: linear-gradient(145deg, rgba(255,255,255,0.035) 0%, var(--surface) 40%);
            border: 1px solid var(--border);
            border-top: 1px solid rgba(200,230,255,0.12);
            border-left: 1px solid rgba(200,230,255,0.08);
            border-radius: 22px;
            padding: 44px 48px 42px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 0 1px rgba(200,230,255,0.03) inset,
                        0 24px 60px rgba(0,0,0,0.35);
        }

        /* Green-to-snow gradient top bar */
        .card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--green) 0%, #3bd4a0 50%, rgba(180,230,255,0.8) 100%);
            border-radius: 22px 22px 0 0;
        }

        /* Snow inner glow */
        .card::after {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(ellipse at 50% 0%,
                rgba(200,235,255,0.04) 0%,
                transparent 60%);
            pointer-events: none;
            border-radius: 22px;
        }

        .card-inner { position: relative; z-index: 1; }

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
            color: #4a7a80;
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
            color: #4a8090;
        }

        .field label span { color: #f87171; margin-left: 2px; }

        input[type="text"],
        input[type="url"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            background: rgba(10,22,32,0.7);
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

        input::placeholder, textarea::placeholder { color: #243d50; }

        input:focus, select:focus, textarea:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(14,165,122,0.1),
                        0 0 0 6px rgba(180,225,255,0.03);
            background: rgba(10,22,30,0.9);
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 24 24' fill='none' stroke='%234a8090' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            padding-right: 38px;
            cursor: pointer;
        }

        select option { background: #0d1a22; color: var(--text); }

        textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.65;
        }

        .err  { font-size: 11.5px; color: var(--danger); margin-top: 2px; }
        .hint { font-size: 11.5px; color: #3d6075; margin-top: 2px; }

        /* ─── Buttons ─────────────────────────── */
        .btn-row {
            display: flex; align-items: center; gap: 12px;
            margin-top: 32px;
        }

        .btn-back {
            flex: 0 0 auto;
            height: 48px; padding: 0 22px;
            background: rgba(200,230,255,0.03);
            border: 1.5px solid var(--border-2);
            border-radius: 10px;
            color: #4d8090;
            font-family: 'Inter', sans-serif;
            font-size: 13.5px; font-weight: 600;
            cursor: pointer;
            transition: border-color 0.15s, color 0.15s, background 0.15s;
            display: flex; align-items: center; gap: 7px;
        }

        .btn-back:hover {
            border-color: var(--green);
            color: var(--green);
            background: rgba(14,165,122,0.05);
        }

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
            box-shadow: 0 4px 20px rgba(14,165,122,0.22),
                        0 0 30px rgba(180,230,255,0.05);
        }

        .btn-next:active, .btn-submit:active { transform: scale(0.985); }

        /* ─── Step panels ─────────────────────── */
        .step-panel { display: none; }
        .step-panel.active { display: block; animation: fadein 0.28s ease both; }

        @keyframes fadein {
            from { opacity:0; transform:translateX(10px); }
            to   { opacity:1; transform:translateX(0); }
        }

        /* ─── Footer ──────────────────────────── */
        .foot {
            text-align: center;
            font-size: 12px;
            color: #2a4555;
            margin-top: 20px;
            line-height: 1.7;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
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

<div class="snow-left"></div>
<div class="snow-right"></div>

<div class="page">
    <div class="shell">

        {{-- Logo --}}
        <div class="logo-row">
            @php
                $smallLogoPath = public_path('images/Logos/Small Logo.png');
            @endphp
            @if(file_exists($smallLogoPath))
                <img src="{{ asset('images/Logos/Small Logo.png') }}"
                     alt="InternLink icon"
                     class="logo-img">
            @else
                {{-- Fallback geometric icon mark --}}
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="34" height="34" rx="9" fill="rgba(14,165,122,0.15)"/>
                    <path d="M10 17 L17 10 L24 17 L17 24 Z" fill="none" stroke="#0ea57a" stroke-width="2.2" stroke-linejoin="round"/>
                    <circle cx="17" cy="17" r="3.5" fill="#0ea57a"/>
                </svg>
            @endif
            <span style="font-size:21px;font-weight:800;letter-spacing:-0.5px;color:#0ea57a;">
                Intern<span style="color:#8ab8c8;">Link</span>
            </span>
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

        {{-- Form --}}
        <form action="{{ route('company.setup.store') }}" method="POST" id="setupForm" novalidate>
            @csrf
            <div class="card">
                <div class="card-inner">

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
                                       value="{{ old('company_name', optional($company)->company_name) }}" required>
                                @error('company_name')<p class="err">{{ $message }}</p>@enderror
                            </div>
                            <div class="fields-row">
                                <div class="field">
                                    <label for="industry">Industry</label>
                                    <select id="industry" name="industry">
                                        <option value="">Select industry…</option>
                                        <option value="Technology"    {{ old('industry', optional($company)->industry)=='Technology'    ?'selected':'' }}>Technology</option>
                                        <option value="Finance"       {{ old('industry', optional($company)->industry)=='Finance'       ?'selected':'' }}>Finance</option>
                                        <option value="Healthcare"    {{ old('industry', optional($company)->industry)=='Healthcare'    ?'selected':'' }}>Healthcare</option>
                                        <option value="Education"     {{ old('industry', optional($company)->industry)=='Education'     ?'selected':'' }}>Education</option>
                                        <option value="Marketing"     {{ old('industry', optional($company)->industry)=='Marketing'     ?'selected':'' }}>Marketing</option>
                                        <option value="Manufacturing" {{ old('industry', optional($company)->industry)=='Manufacturing' ?'selected':'' }}>Manufacturing</option>
                                        <option value="Retail"        {{ old('industry', optional($company)->industry)=='Retail'        ?'selected':'' }}>Retail</option>
                                        <option value="Consulting"    {{ old('industry', optional($company)->industry)=='Consulting'    ?'selected':'' }}>Consulting</option>
                                        <option value="Media"         {{ old('industry', optional($company)->industry)=='Media'         ?'selected':'' }}>Media & Communications</option>
                                        <option value="NGO"           {{ old('industry', optional($company)->industry)=='NGO'           ?'selected':'' }}>NGO / Non-profit</option>
                                        <option value="Other"         {{ old('industry', optional($company)->industry)=='Other'         ?'selected':'' }}>Other</option>
                                    </select>
                                    @error('industry')<p class="err">{{ $message }}</p>@enderror
                                </div>
                                <div class="field">
                                    <label for="website">Website URL</label>
                                    <input type="url" id="website" name="website"
                                           placeholder="https://yourcompany.com"
                                           value="{{ old('website', optional($company)->website) }}">
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
                                    <label for="headquarters">Headquarters</label>
                                    <input type="text" id="headquarters" name="headquarters"
                                           placeholder="e.g. New York, USA"
                                           value="{{ old('headquarters', optional($company)->headquarters) }}">
                                    @error('headquarters')<p class="err">{{ $message }}</p>@enderror
                                </div>
                                <div class="field">
                                    <label for="founded_year">Founded Year</label>
                                    <input type="text" id="founded_year" name="founded_year"
                                           placeholder="e.g. 2012"
                                           value="{{ old('founded_year', optional($company)->founded_year) }}">
                                    @error('founded_year')<p class="err">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="company_size">Company Size</label>
                                <select id="company_size" name="company_size">
                                    <option value="">Select team size…</option>
                                    <option value="1-10"    {{ old('company_size', optional($company)->company_size)=='1-10'   ?'selected':'' }}>1–10 employees (Startup)</option>
                                    <option value="11-50"   {{ old('company_size', optional($company)->company_size)=='11-50'  ?'selected':'' }}>11–50 employees (Small)</option>
                                    <option value="51-200"  {{ old('company_size', optional($company)->company_size)=='51-200' ?'selected':'' }}>51–200 employees (Mid-size)</option>
                                    <option value="201-500" {{ old('company_size', optional($company)->company_size)=='201-500'?'selected':'' }}>201–500 employees (Growing)</option>
                                    <option value="500+"    {{ old('company_size', optional($company)->company_size)=='500+'   ?'selected':'' }}>500+ employees (Enterprise)</option>
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
                                          placeholder="What does your company do? What's the culture like? What kind of interns are you looking for?">{{ old('description', optional($company)->description) }}</textarea>
                                <span class="hint">Aim for 2–4 sentences. Keep it honest and welcoming.</span>
                                @error('description')<p class="err">{{ $message }}</p>@enderror
                            </div>
                            
                            <h3 style="font-size: 14px; font-weight: 700; color: #edf7f2; margin-top: 10px; border-bottom: 1px solid var(--border-2); padding-bottom: 8px;">Internship Posting Defaults</h3>
                            
                            <div class="fields-row">
                                <div class="field">
                                    <label for="default_duration">Default Duration</label>
                                    <select id="default_duration" name="default_duration">
                                        <option value="">Select duration…</option>
                                        <option value="1 month" {{ old('default_duration', optional($company)->default_duration)=='1 month' ?'selected':'' }}>1 month</option>
                                        <option value="2 months" {{ old('default_duration', optional($company)->default_duration)=='2 months' ?'selected':'' }}>2 months</option>
                                        <option value="3 months" {{ old('default_duration', optional($company)->default_duration)=='3 months' ?'selected':'' }}>3 months</option>
                                        <option value="6 months" {{ old('default_duration', optional($company)->default_duration)=='6 months' ?'selected':'' }}>6 months</option>
                                    </select>
                                    @error('default_duration')<p class="err">{{ $message }}</p>@enderror
                                </div>
                                <div class="field">
                                    <label for="default_location">Default Location</label>
                                    <input type="text" id="default_location" name="default_location"
                                           placeholder="e.g. Remote"
                                           value="{{ old('default_location', optional($company)->default_location) }}">
                                    @error('default_location')<p class="err">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="max_applicants">Max Applicants per Posting</label>
                                <input type="number" id="max_applicants" name="max_applicants"
                                       placeholder="e.g. 50"
                                       value="{{ old('max_applicants', optional($company)->max_applicants) }}" min="0">
                                @error('max_applicants')<p class="err">{{ $message }}</p>@enderror
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

                </div>{{-- /card-inner --}}
            </div>{{-- /card --}}
        </form>

        <p class="foot">
            Your information is kept private and used only to match you with the right interns.<br>
            You can edit your profile any time from your dashboard.
        </p>

    </div>
</div>

<script>
    let current = 1;

    // If server returned validation errors, restore the correct step
    @if($errors->any())
        const errorFields = @json($errors->keys());
        const step1Fields = ['company_name', 'industry', 'website'];
        const step2Fields = ['headquarters', 'founded_year', 'company_size'];
        const step3Fields = ['description', 'default_duration', 'default_location', 'max_applicants'];

        if (errorFields.some(f => step3Fields.includes(f))) {
            current = 3;
        } else if (errorFields.some(f => step2Fields.includes(f))) {
            current = 2;
        }
    @endif

    function goStep(n) {
        // Validate before advancing
        if (n > current && current === 1) {
            const cn = document.getElementById('company_name');
            if (!cn.value.trim()) {
                cn.focus();
                cn.style.borderColor = '#f87171';
                cn.style.boxShadow = '0 0 0 3px rgba(248,113,113,0.15)';
                setTimeout(() => { cn.style.borderColor = ''; cn.style.boxShadow = ''; }, 2000);
                return;
            }
        }

        const oldBubble = document.getElementById('bubble-' + current);
        const oldLabel  = document.getElementById('label-'  + current);

        oldBubble.classList.remove('active');
        if (n > current) {
            oldBubble.classList.add('done');
            oldBubble.textContent = '';
        } else {
            oldBubble.classList.remove('done');
            oldBubble.textContent = current;
        }
        oldLabel.classList.remove('active');
        if (n > current) oldLabel.classList.add('done');
        else             oldLabel.classList.remove('done');

        document.getElementById('panel-' + current).classList.remove('active');

        for (let i = 1; i < 3; i++) {
            document.getElementById('line-' + i).classList.toggle('done', i < n);
        }

        current = n;

        const newBubble = document.getElementById('bubble-' + current);
        const newLabel  = document.getElementById('label-'  + current);
        newBubble.classList.remove('done');
        newBubble.classList.add('active');
        newBubble.textContent = current;
        newLabel.classList.add('active');
        newLabel.classList.remove('done');

        document.getElementById('panel-' + current).classList.add('active');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Init correct step on page load if there are server-side errors
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
        btn.innerHTML = `
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                 style="animation:spin 0.8s linear infinite">
                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83
                         M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
            </svg> Setting up…`;
    });
</script>
</body>
</html>