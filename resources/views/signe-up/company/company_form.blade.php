<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration - InterLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #080f0b;
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(16,185,129,0.18) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
            z-index: 0;
        }

        .wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 660px;
            animation: up 0.35s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes up {
            from { opacity:0; transform:translateY(14px); }
            to   { opacity:1; transform:translateY(0); }
        }

        .card {
            background: #0d1a11;
            border-radius: 20px;
            border: 1px solid #1a2e1f;
            padding: 48px 48px 44px;
        }

        .logo-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 32px;
        }

        /* SVG logo sizing */
        .logo-svg { height: 52px; width: auto; }

        .card-header { margin-bottom: 36px; }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #10b981;
            margin-bottom: 14px;
        }

        .tag-line {
            width: 18px;
            height: 1.5px;
            background: #10b981;
            border-radius: 2px;
        }

        h2 {
            font-size: 26px;
            font-weight: 800;
            color: #f0faf4;
            letter-spacing: -0.5px;
            line-height: 1.2;
            margin-bottom: 7px;
        }

        .card-sub {
            font-size: 13.5px;
            color: #3d6650;
            line-height: 1.6;
        }

        .rule {
            height: 1px;
            background: #1a2e1f;
            margin: 32px 0 28px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 20px;
        }

        .col-2 { grid-column: span 2; }

        .field { display: flex; flex-direction: column; }

        label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #4d8a6a;
            margin-bottom: 7px;
        }

        input[type="text"],
        input[type="url"],
        select,
        textarea {
            width: 100%;
            background: #0a1410;
            border: 1px solid #1e3327;
            border-radius: 10px;
            padding: 11px 13px;
            font-family: 'Inter', sans-serif;
            font-size: 13.5px;
            color: #e2f0e8;
            outline: none;
            transition: border-color 0.13s, box-shadow 0.13s;
            -webkit-appearance: none;
        }

        input::placeholder,
        textarea::placeholder { color: #243d2d; }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16,185,129,0.08);
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 24 24' fill='none' stroke='%234d8a6a' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            padding-right: 36px;
            cursor: pointer;
        }

        select option { background: #0d1a11; color: #e2f0e8; }

        textarea {
            resize: vertical;
            min-height: 104px;
            line-height: 1.65;
        }

        .err {
            font-size: 11.5px;
            color: #f87171;
            margin-top: 5px;
        }

        .btn-wrap { margin-top: 30px; }

        .btn-submit {
            width: 100%;
            height: 50px;
            background: #10b981;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 13.5px;
            font-weight: 700;
            letter-spacing: 0.02em;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.13s, transform 0.1s;
        }

        .btn-submit:hover  { background: #0ea572; }
        .btn-submit:active { transform: scale(0.99); }

        .foot-note {
            text-align: center;
            font-size: 12px;
            color: #2a4535;
            margin-top: 18px;
            line-height: 1.6;
        }

        @media (max-width: 580px) {
            .card { padding: 32px 22px 28px; }
            .form-grid { grid-template-columns: 1fr; }
            .col-2 { grid-column: span 1; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">

            <div class="logo-wrap">
                {{-- Use asset if available, fallback to inline SVG --}}
                @if(file_exists(public_path('images/Logos/LWDM.png')))
                    <img src="{{ asset('images/Logos/LWDM.png') }}" alt="InternLink" class="logo-svg">
                @else
                    {{-- Inline SVG replica of the InternLink logo --}}
                    <svg class="logo-svg" viewBox="0 0 180 72" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="InternLink">
                        <!-- Icon mark: stylised "IL" bracket -->
                        <rect x="0"  y="0"  width="10" height="44" fill="#10b981"/>
                        <rect x="0"  y="34" width="30" height="10" fill="#10b981"/>
                        <rect x="14" y="0"  width="10" height="24" fill="#10b981"/>
                        <rect x="14" y="0"  width="30" height="10" fill="#10b981"/>
                        <rect x="34" y="0"  width="10" height="10" fill="#10b981"/>
                        <!-- Small square top-right of mark -->
                        <rect x="38" y="0"  width="8"  height="8"  fill="#10b981"/>
                        <!-- Wordmark -->
                        <text x="58" y="38" font-family="Inter, sans-serif" font-size="30" font-weight="800" letter-spacing="-0.5" fill="#10b981">Intern</text>
                        <text x="138" y="38" font-family="Inter, sans-serif" font-size="30" font-weight="800" letter-spacing="-0.5" fill="#4b5563">Link</text>
                    </svg>
                @endif
            </div>

            <div class="card-header">
                <div class="tag"><span class="tag-line"></span> Company setup</div>
                <h2>Complete your company profile</h2>
                <p class="card-sub">Tell us a little bit more about your company to get started.</p>
            </div>

            <div class="rule"></div>

            <form action="{{ route('company.setup.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    <div class="field col-2">
                        <label for="company_name">Company Name *</label>
                        <input id="company_name" name="company_name" type="text" required placeholder="Acme Corp">
                        @error('company_name')<p class="err">{{ $message }}</p>@enderror
                    </div>

                    <div class="field">
                        <label for="website">Website URL</label>
                        <input id="website" name="website" type="url" placeholder="https://acme.com">
                        @error('website')<p class="err">{{ $message }}</p>@enderror
                    </div>

                    <div class="field">
                        <label for="industry">Industry</label>
                        <input id="industry" name="industry" type="text" placeholder="e.g. Technology, Finance">
                        @error('industry')<p class="err">{{ $message }}</p>@enderror
                    </div>

                    <div class="field">
                        <label for="company_size">Company Size</label>
                        <select id="company_size" name="company_size">
                            <option value="">   Select size </option>
                            <option value="1-10">1-10 employees</option>
                            <option value="11-50">11-50 employees</option>
                            <option value="51-200">51-200 employees</option>
                            <option value="201-500">201-500 employees</option>
                            <option value="500+">500+ employees</option>
                        </select>
                        @error('company_size')<p class="err">{{ $message }}</p>@enderror
                    </div>

                    <div class="field">
                        <label for="country">Country</label>
                        <input id="country" name="country" type="text" placeholder="Country">
                        @error('country')<p class="err">{{ $message }}</p>@enderror
                    </div>

                    <div class="field col-2">
                        <label for="city">City / Headquarters</label>
                        <input id="city" name="city" type="text" placeholder="City">
                        @error('city')<p class="err">{{ $message }}</p>@enderror
                    </div>

                    <div class="field col-2">
                        <label for="description">Company Description</label>
                        <textarea id="description" name="description" rows="4" placeholder="Tell us about what your company does..."></textarea>
                        @error('description')<p class="err">{{ $message }}</p>@enderror
                    </div>

                </div>

                <div class="btn-wrap">
                    <button type="submit" class="btn-submit">Complete Setup</button>
                </div>

            </form>

            <p class="foot-note">Your information is kept private and used only to match you with the right interns.</p>

        </div>
    </div>
</body>
</html>