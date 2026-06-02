<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Intern Link</title>

  <link rel="icon" href="{{ asset('images/Logos/Small%20Logo.png') }}" type="image/png">
  <link rel="apple-touch-icon" href="{{ asset('images/Logos/Small%20Logo.png') }}">

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

<body x-data="{ pageDarkMode: false, init() { window.pageDarkModeToggle = () => { $store.ui.showLoading(400); setTimeout(() => { $store.ui.darkMode = !$store.ui.darkMode }, 150) }; Alpine.effect(() => { const isDark = $store.ui.darkMode; this.pageDarkMode = isDark; window.pageDarkModeActive = isDark; document.body.classList.toggle('page-dark', isDark); window.dispatchEvent(new CustomEvent('page-dark-mode-change', { detail: { active: isDark } })); }); } }"
  class="welcome-body flex min-h-screen flex-col bg-[#ffffff] text-[#17494D] font-[Instrument_Sans,ui-sans-serif,system-ui,sans-serif] antialiased transition-colors duration-300"
  :class="pageDarkMode ? 'bg-black text-white' : 'bg-[#ffffff] text-[#17494D]'">

  <!-- Navigation -->
  <x-nav-bar />
  <x-loading-overlay />

  {{-- ============================================================
  InterLink — Internship Management Platform
  Statistics Page · Laravel Blade · Tailwind CSS
  Updated Palette + Hero + Testimonials
  ============================================================ --}}

  {{-- Google Fonts: Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <style>
    :root {
      --brand: #00B1AA;
      --brand-hover: #008A84;
      --accent: #F89122;
      --title: #444444;
      --body: #666666;
      --bg-white: #FFFFFF;
      --bg-aqua: #F5FBFB;
      --bg-warm: #FFF7ED;
      --border: #E5E7EB;
    }

    /* Animated counter number */
    @keyframes countUp {
      from {
        opacity: 0;
        transform: translateY(12px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-count {
      animation: countUp .6s ease forwards;
    }

    /* Pulse dot */
    @keyframes pulseDot {

      0%,
      100% {
        transform: scale(1);
        opacity: 1;
      }

      50% {
        transform: scale(1.6);
        opacity: .5;
      }
    }

    .pulse-dot {
      animation: pulseDot 1.8s ease-in-out infinite;
    }

    /* Gradient text */
    .grad-text {
      background: linear-gradient(135deg, #00B1AA 0%, #008A84 60%, #F89122 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Hero floating card */
    @keyframes floatY {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }
    }

    .float-card {
      animation: floatY 4s ease-in-out infinite;
    }

    .float-card-slow {
      animation: floatY 6s ease-in-out infinite;
    }

    /* Ticker strip */
    @keyframes ticker {
      from {
        transform: translateX(0);
      }

      to {
        transform: translateX(-50%);
      }
    }

    .ticker-inner {
      animation: ticker 28s linear infinite;
    }

    .ticker-inner:hover {
      animation-play-state: paused;
    }

    /* Shimmer bar */
    @keyframes shimmer {
      from {
        background-position: -200% center;
      }

      to {
        background-position: 200% center;
      }
    }

    .shimmer-bar {
      background: linear-gradient(90deg, #00B1AA 30%, #F89122 50%, #00B1AA 70%);
      background-size: 200% auto;
      animation: shimmer 3s linear infinite;
    }

    /* Section fade-in on scroll (CSS only trick via animation-timeline where supported) */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity .7s ease, transform .7s ease;
    }

    .revealed {
      opacity: 1;
      transform: translateY(0);
    }
  </style>

  <div class="font-[Poppins] bg-[#FFFFFF] text-[#444444] antialiased overflow-x-hidden">





    {{-- ============================================================
    3. PLATFORM SUCCESS METRICS
    ============================================================ --}}
    <section class="py-24 relative overflow-hidden"
      style="background: linear-gradient(135deg, #F5FBFB 0%, #FFFFFF 100%)">

      <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full blur-3xl" style="background:rgba(0,177,170,.09)">
      </div>
      <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full blur-3xl" style="background:rgba(248,145,34,.07)">
      </div>

      <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
          <div>
            <span class="text-[#00B1AA] text-xs font-semibold uppercase tracking-widest">Success Metrics</span>
            <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3 leading-tight">
              Numbers That Speak<br>for Themselves
            </h2>
            <p class="text-[#666666] mt-5 leading-relaxed">
              Our platform is engineered for results. From the first application to a signed offer letter, InterLink
              supports students and companies every step of the way.
            </p>
            <div class="mt-8 grid grid-cols-2 gap-4">
              <div class="bg-white rounded-2xl p-5 shadow-md border border-[#E5E7EB]">
                <p class="text-3xl font-black text-[#00B1AA]">4.9</p>
                <p class="text-xs text-[#666666] mt-1 font-medium">Average App Rating</p>
              </div>
              <div class="rounded-2xl p-5 shadow-md text-white" style="background:#00B1AA">
                <p class="text-3xl font-black">3x</p>
                <p class="text-xs text-white/80 mt-1 font-medium">Faster Hiring Process</p>
              </div>
            </div>
          </div>
          <div class="relative">
            <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
              <img
                src="https://www.isixsigma.com/wp-content/uploads/2018/11/shutterstock_1687550977-scaled.jpg"
                alt="Success metrics visual" class="w-full h-80 object-cover">
            </div>
            <div class="absolute -bottom-5 left-8 bg-white rounded-2xl shadow-xl px-6 py-4 border border-[#E5E7EB]">
              <p class="font-black text-2xl" style="color:#F89122">92%</p>
              <p class="text-xs text-[#666666] font-medium">Overall Success Rate</p>
            </div>
          </div>
        </div>

        {{-- Metric Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          @php
            $metrics = [
              ['pct' => 92, 'label' => 'Success Rate', 'desc' => 'Students who complete their internship and receive a positive evaluation.', 'bar' => '#00B1AA'],
              ['pct' => 85, 'label' => 'Student Satisfaction', 'desc' => 'Students who rate their InterLink experience as excellent or very good.', 'bar' => '#008A84'],
              ['pct' => 78, 'label' => 'Internship-to-Job', 'desc' => 'Interns who received a full-time job offer from their host company.', 'bar' => '#F89122'],
              ['pct' => 95, 'label' => 'Company Retention', 'desc' => 'Partner companies who return to InterLink every season to hire new interns.', 'bar' => '#00B1AA'],
            ];
          @endphp
          @foreach ($metrics as $m)
            <div
              class="bg-white rounded-3xl shadow-xl border border-[#E5E7EB] p-7 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group relative overflow-hidden">
              <div class="absolute top-0 right-0 w-24 h-24 rounded-full -translate-x-4 -translate-y-4"
                style="background:rgba(0,177,170,.05)"></div>
              <div class="relative z-10">
                <p class="text-5xl font-black group-hover:scale-110 transition-transform duration-300 origin-left"
                  style="color:{{ $m['bar'] }}">
                  {{ $m['pct'] }}<span class="text-2xl">%</span>
                </p>
                <p class="text-sm font-bold text-[#444444] mt-2">{{ $m['label'] }}</p>
                <div class="my-4 h-2 w-full bg-[#E5E7EB] rounded-full overflow-hidden">
                  <div class="h-full rounded-full shimmer-bar transition-all duration-700"
                    style="width:{{ $m['pct'] }}%; background:{{ $m['bar'] }}"></div>
                </div>
                <p class="text-xs text-[#666666] leading-relaxed">{{ $m['desc'] }}</p>
              </div>
            </div>
          @endforeach
        </div>

  
      </div>
    </section>


    {{-- ============================================================
    4. CHARTS & ANALYTICS SECTION
    ============================================================ --}}
    <section class="bg-[#FFFFFF] py-24 relative overflow-hidden">

      <div class="absolute inset-0 pointer-events-none"
        style="background: radial-gradient(circle at 80% 20%, rgba(0,177,170,.05) 0%, transparent 60%)"></div>

      <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="text-center mb-16">
          <span class="text-[#00B1AA] text-xs font-semibold uppercase tracking-widest">Analytics Dashboard</span>
          <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3">Platform Performance Overview</h2>
          <p class="text-[#666666] mt-4 max-w-xl mx-auto">Deep-dive analytics from every corner of the platform, updated
            in real time.</p>
        </div>

        {{-- Top row: 2 large chart cards --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

          {{-- Applications Per Month --}}
          <div
            class="bg-white rounded-3xl shadow-xl border border-[#E5E7EB] p-8 hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-6">
              <div>
                <p class="text-xs text-[#666666] font-semibold uppercase tracking-wide">Monthly</p>
                <p class="text-lg font-bold text-[#444444]">Applications Per Month</p>
              </div>
              <span class="text-xs font-bold px-3 py-1 rounded-full"
                style="background:rgba(0,177,170,.1);color:#00B1AA">+18.3%</span>
            </div>
            <div class="flex items-end gap-2 h-36">
              @php $bars = [40, 60, 45, 80, 65, 90, 75, 100, 85, 95, 88, 100];
              $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; @endphp
              @foreach ($bars as $i => $h)
                <div class="flex flex-col items-center flex-1 gap-1">
                  <div class="w-full rounded-t-lg hover:opacity-100 transition-opacity duration-200"
                    style="height:{{ $h }}%; background: linear-gradient(to top, #00B1AA, #22d3ee); opacity:{{ $loop->index % 3 === 0 ? 1 : ($loop->index % 3 === 1 ? .65 : .35) }}">
                  </div>
                  <span class="text-[9px] text-[#666666]">{{ $labels[$i] }}</span>
                </div>
              @endforeach
            </div>
            <div class="mt-4 flex gap-5">
              <div>
                <p class="text-xl font-black text-[#444444]">41,200</p>
                <p class="text-xs text-[#666666]">This Month</p>
              </div>
              <div>
                <p class="text-xl font-black text-[#444444]">34,900</p>
                <p class="text-xs text-[#666666]">Last Month</p>
              </div>
            </div>
          </div>

          {{-- Student Growth --}}
          <div
            class="rounded-3xl shadow-xl p-8 hover:shadow-2xl transition-shadow duration-300 text-white relative overflow-hidden"
            style="background: linear-gradient(135deg, #00B1AA 0%, #008A84 100%)">
            <div class="absolute top-0 right-0 w-40 h-40 rounded-full -translate-x-8 -translate-y-8"
              style="background:rgba(255,255,255,.1)"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <div>
                  <p class="text-xs text-white/70 font-semibold uppercase tracking-wide">Growth</p>
                  <p class="text-lg font-bold">Student Growth</p>
                </div>
                <span class="text-xs font-bold px-3 py-1 rounded-full" style="background:rgba(255,255,255,.2)">+24.1%
                  YoY</span>
              </div>
              <div class="h-28 relative mb-4">
                <svg viewBox="0 0 300 100" class="w-full h-full" preserveAspectRatio="none">
                  <defs>
                    <linearGradient id="lineGrad" x1="0" x2="0" y1="0" y2="1">
                      <stop offset="0%" stop-color="white" stop-opacity=".4" />
                      <stop offset="100%" stop-color="white" stop-opacity="0" />
                    </linearGradient>
                  </defs>
                  <path d="M0,80 C30,70 50,60 80,45 C110,30 130,55 160,40 C190,25 220,35 250,20 C270,12 285,8 300,5"
                    fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                  <path
                    d="M0,80 C30,70 50,60 80,45 C110,30 130,55 160,40 C190,25 220,35 250,20 C270,12 285,8 300,5 L300,100 L0,100 Z"
                    fill="url(#lineGrad)" />
                </svg>
              </div>
              <div class="flex gap-6">
                <div>
                  <p class="text-2xl font-black">15,240</p>
                  <p class="text-xs text-white/70">Total Students</p>
                </div>
                <div>
                  <p class="text-2xl font-black">+3,100</p>
                  <p class="text-xs text-white/70">This Year</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Middle row: 3 medium chart cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

          {{-- Most Active Sectors --}}
          <div
            class="bg-white rounded-3xl shadow-xl border border-[#E5E7EB] p-7 hover:shadow-2xl transition-shadow duration-300">
            <p class="text-xs text-[#666666] font-semibold uppercase tracking-wide mb-1">Breakdown</p>
            <p class="text-base font-bold text-[#444444] mb-5">Most Active Sectors</p>
            @php
              $sectors_chart = [
                ['name' => 'Web Development', 'pct' => 82, 'c' => '#00B1AA'],
                ['name' => 'Data Science', 'pct' => 68, 'c' => '#008A84'],
                ['name' => 'Design', 'pct' => 54, 'c' => '#F89122'],
                ['name' => 'Marketing', 'pct' => 47, 'c' => '#00B1AA'],
                ['name' => 'Cybersecurity', 'pct' => 35, 'c' => '#008A84'],
              ];
            @endphp
            <div class="space-y-3">
              @foreach ($sectors_chart as $s)
                <div>
                  <div class="flex justify-between text-xs text-[#666666] mb-1">
                    <span>{{ $s['name'] }}</span>
                    <span class="font-bold">{{ $s['pct'] }}%</span>
                  </div>
                  <div class="h-2 rounded-full overflow-hidden" style="background:#E5E7EB">
                    <div class="h-full rounded-full" style="width:{{ $s['pct'] }}%; background:{{ $s['c'] }}"></div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          {{-- Hiring Trends --}}
          <div
            class="bg-white rounded-3xl shadow-xl border border-[#E5E7EB] p-7 hover:shadow-2xl transition-shadow duration-300">
            <p class="text-xs text-[#666666] font-semibold uppercase tracking-wide mb-1">Quarterly</p>
            <p class="text-base font-bold text-[#444444] mb-5">Hiring Trends</p>
            <div class="flex items-end gap-3 h-28">
              @php $hbars = [55, 70, 60, 90];
              $hlabels = ['Q1', 'Q2', 'Q3', 'Q4']; @endphp
              @foreach ($hbars as $i => $h)
                <div class="flex flex-col items-center flex-1 gap-1">
                  <span class="text-xs font-bold text-[#444444]">{{ $h }}%</span>
                  <div class="w-full rounded-t-xl transition-all duration-300"
                    style="height:{{ $h }}%; background:{{ $loop->last ? 'linear-gradient(to top,#00B1AA,#22d3ee)' : '#E5E7EB' }}">
                  </div>
                  <span class="text-xs text-[#666666]">{{ $hlabels[$i] }}</span>
                </div>
              @endforeach
            </div>
            <div class="mt-4 rounded-xl p-3 text-center" style="background:rgba(0,177,170,.08)">
              <p class="font-black text-xl" style="color:#00B1AA">+22%</p>
              <p class="text-xs text-[#666666]">Year-over-Year Growth</p>
            </div>
          </div>

          {{-- Company Engagement --}}
          <div
            class="bg-white rounded-3xl shadow-xl border border-[#E5E7EB] p-7 hover:shadow-2xl transition-shadow duration-300">
            <p class="text-xs text-[#666666] font-semibold uppercase tracking-wide mb-1">Engagement</p>
            <p class="text-base font-bold text-[#444444] mb-5">Company Engagement</p>
            <div class="flex justify-center mb-4">
              <div class="relative w-36 h-36">
                <svg viewBox="0 0 120 120" class="w-full h-full -rotate-90">
                  <circle cx="60" cy="60" r="50" fill="none" stroke="#E5E7EB" stroke-width="12" />
                  <circle cx="60" cy="60" r="50" fill="none" stroke="#00B1AA" stroke-width="12" stroke-linecap="round"
                    stroke-dasharray="282.7" stroke-dashoffset="45" />
                  <circle cx="60" cy="60" r="50" fill="none" stroke="#F89122" stroke-width="12" stroke-linecap="round"
                    stroke-dasharray="282.7" stroke-dashoffset="{{ 282.7 - 60 }}" opacity=".5" />
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                  <p class="text-2xl font-black text-[#444444]">84%</p>
                  <p class="text-[10px] text-[#666666]">Engaged</p>
                </div>
              </div>
            </div>
            <div class="space-y-2">
              <div class="flex justify-between text-xs">
                <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full inline-block"
                    style="background:#00B1AA"></span>Active Hiring</span>
                <span class="font-bold">84%</span>
              </div>
              <div class="flex justify-between text-xs">
                <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full inline-block"
                    style="background:#F89122"></span>Profile Complete</span>
                <span class="font-bold">71%</span>
              </div>
              <div class="flex justify-between text-xs">
                <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full inline-block"
                    style="background:#E5E7EB"></span>Inactive</span>
                <span class="font-bold">16%</span>
              </div>
            </div>
          </div>
        </div>

        {{-- Bottom row --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <div class="lg:col-span-2 rounded-3xl shadow-xl border border-[#E5E7EB] p-8"
            style="background:linear-gradient(135deg,#F5FBFB 0%,#FFFFFF 100%)">
            <div class="flex items-center justify-between mb-6">
              <div>
                <p class="text-xs text-[#666666] font-semibold uppercase tracking-wide mb-1">Performance</p>
                <p class="text-lg font-bold text-[#444444]">Internship Categories Performance</p>
              </div>
              <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-100 text-emerald-600">Live</span>
            </div>
            <div class="grid grid-cols-3 gap-4">
              @php
                $cats = [
                  ['n' => 'Technology', 'v' => '2,100', 'g' => '+32%', 'c' => '#00B1AA'],
                  ['n' => 'Business', 'v' => '940', 'g' => '+18%', 'c' => '#008A84'],
                  ['n' => 'Design', 'v' => '680', 'g' => '+24%', 'c' => '#F89122'],
                  ['n' => 'Marketing', 'v' => '510', 'g' => '+15%', 'c' => '#00B1AA'],
                  ['n' => 'Finance', 'v' => '430', 'g' => '+10%', 'c' => '#008A84'],
                  ['n' => 'Science', 'v' => '380', 'g' => '+12%', 'c' => '#F89122'],
                ];
              @endphp
              @foreach ($cats as $cat)
                <div
                  class="bg-white rounded-2xl p-4 shadow-sm border border-[#E5E7EB] hover:shadow-md hover:border-[#00B1AA]/30 transition-all duration-300">
                  <p class="text-xs text-[#666666] font-medium">{{ $cat['n'] }}</p>
                  <p class="text-2xl font-black mt-1" style="color:{{ $cat['c'] }}">{{ $cat['v'] }}</p>
                  <p class="text-xs font-bold text-emerald-500 mt-1">{{ $cat['g'] }}</p>
                </div>
              @endforeach
            </div>
          </div>

          <div class="rounded-3xl overflow-hidden shadow-xl border border-[#E5E7EB] relative group">
            <img
              src="https://img.freepik.com/free-photo/closeup-hands-using-computer-laptop-with-screen-showing-analysis-data_53876-23014.jpg"
              alt="Analytics visual"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 flex items-end p-6"
              style="background: linear-gradient(to top, rgba(0,177,170,.7), transparent)">
              <div class="text-white">
                <p class="font-black text-xl">Data-Driven</p>
                <p class="text-sm text-white/80">Every insight matters</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    {{-- ============================================================
    5. GROWTH TIMELINE SECTION
    ============================================================ --}}
    <section class="py-24 relative overflow-hidden"
      style="background: linear-gradient(135deg, #F5FBFB 0%, #FFFFFF 50%, #F5FBFB 100%)">

      <div class="absolute right-0 top-1/2 -translate-y-1/2 w-96 h-96 rounded-full blur-3xl"
        style="background:rgba(0,177,170,.05)"></div>

      <div class="max-w-6xl mx-auto px-6 lg:px-8">

        <div class="text-center mb-20">
          <span class="text-[#00B1AA] text-xs font-semibold uppercase tracking-widest">Our Journey</span>
          <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3">Platform Growth Timeline</h2>
          <p class="text-[#666666] mt-4 max-w-xl mx-auto">From a bold idea to an international platform — here is how
            InterLink grew.</p>
        </div>

        {{-- Desktop timeline --}}
        <div class="hidden lg:block relative mb-20">
          <div class="absolute top-8 left-0 right-0 h-0.5"
            style="background: linear-gradient(to right, #00B1AA, #F89122, #008A84)"></div>

          <div class="grid grid-cols-4 gap-8">
            @php
              $milestones = [
                ['year' => '2023', 'title' => 'Platform Launch', 'desc' => 'InterLink goes live with its first 200 students and 30 partner companies, laying the foundation for a new era.', 'tag' => 'Launch'],
                ['year' => '2024', 'title' => '5,000 Students', 'desc' => 'Student registrations hit 5,000. Monthly applications surpass 10,000 for the first time. 150+ companies onboarded.', 'tag' => 'Growth'],
                ['year' => '2025', 'title' => '500+ Partners', 'desc' => 'Over 500 partner companies joined. The placement success rate reaches 88% across all sectors.', 'tag' => 'Scale'],
                ['year' => '2026', 'title' => 'International Expansion', 'desc' => 'InterLink expands internationally, serving students and companies across multiple continents with 15,000+ active users.', 'tag' => 'Global'],
              ];
            @endphp
            @foreach ($milestones as $idx => $m)
              <div class="relative flex flex-col items-center text-center">
                <div
                  class="w-16 h-16 rounded-full flex items-center justify-center shadow-xl mb-6 relative z-10 border-4 border-white hover:scale-125 transition-transform duration-300"
                  style="background: linear-gradient(135deg, {{ $idx % 2 === 0 ? '#00B1AA,#008A84' : '#F89122,#00B1AA' }})">
                  <span class="text-white text-xs font-black">{{ $m['year'] }}</span>
                </div>
                <span class="text-xs font-bold px-3 py-1 rounded-full mb-3"
                  style="color:#00B1AA; background:rgba(0,177,170,.1)">{{ $m['tag'] }}</span>
                <p class="text-base font-black text-[#444444] mb-2">{{ $m['title'] }}</p>
                <p class="text-xs text-[#666666] leading-relaxed">{{ $m['desc'] }}</p>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Mobile timeline --}}
        <div class="lg:hidden relative pl-8 mb-16">
          <div class="absolute left-3 top-0 bottom-0 w-0.5"
            style="background: linear-gradient(to bottom, #00B1AA, #F89122)"></div>
          @foreach ($milestones as $idx => $m)
            <div class="relative mb-10">
              <div
                class="absolute -left-5 top-0 w-10 h-10 rounded-full flex items-center justify-center border-4 border-white shadow-lg"
                style="background: linear-gradient(135deg, {{ $idx % 2 === 0 ? '#00B1AA,#008A84' : '#F89122,#00B1AA' }})">
                <span class="text-white text-[8px] font-black leading-tight text-center">{{ $m['year'] }}</span>
              </div>
              <div class="bg-white rounded-2xl p-5 shadow-lg border border-[#E5E7EB] ml-4">
                <span class="text-xs font-bold px-2 py-0.5 rounded-full"
                  style="color:#00B1AA;background:rgba(0,177,170,.1)">{{ $m['tag'] }}</span>
                <p class="font-black text-[#444444] mt-2 mb-1">{{ $m['title'] }}</p>
                <p class="text-xs text-[#666666] leading-relaxed">{{ $m['desc'] }}</p>
              </div>
            </div>
          @endforeach
        </div>

   
      </div>
    </section>


    {{-- ============================================================
    6. MOST ACTIVE SECTORS SECTION
    ============================================================ --}}
    <section class="bg-[#FFFFFF] py-24 relative overflow-hidden">

      <div class="absolute top-0 left-0 w-72 h-72 rounded-full blur-3xl -translate-x-1/3 -translate-y-1/3"
        style="background:rgba(248,145,34,.07)"></div>

      <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-16">
          <div>
            <span class="text-[#00B1AA] text-xs font-semibold uppercase tracking-widest">Sectors</span>
            <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3 leading-tight">Most Active Internship Sectors
            </h2>
            <p class="text-[#666666] mt-5 leading-relaxed">The industries where InterLink is making the biggest impact —
              connecting talent with opportunity at scale.</p>
          </div>
     
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @php
            $sectors = [
              ['name' => 'Web Development', 'count' => '1,840', 'growth' => '+32%', 'bars' => [55, 70, 60, 85, 75, 100], 'c1' => '#00B1AA', 'c2' => '#22d3ee'],
              ['name' => 'UI / UX Design', 'count' => '980', 'growth' => '+24%', 'bars' => [40, 55, 48, 70, 65, 80], 'c1' => '#008A84', 'c2' => '#00B1AA'],
              ['name' => 'Marketing', 'count' => '760', 'growth' => '+18%', 'bars' => [35, 48, 42, 60, 55, 70], 'c1' => '#F89122', 'c2' => '#fbbf24'],
              ['name' => 'Data Science', 'count' => '1,120', 'growth' => '+41%', 'bars' => [50, 65, 58, 80, 72, 95], 'c1' => '#00B1AA', 'c2' => '#008A84'],
              ['name' => 'Cybersecurity', 'count' => '540', 'growth' => '+29%', 'bars' => [30, 45, 40, 58, 52, 68], 'c1' => '#008A84', 'c2' => '#22d3ee'],
              ['name' => 'Business Management', 'count' => '680', 'growth' => '+15%', 'bars' => [38, 50, 44, 62, 58, 72], 'c1' => '#F89122', 'c2' => '#00B1AA'],
            ];
          @endphp
          @foreach ($sectors as $s)
            <div
              class="bg-white rounded-3xl shadow-xl border border-[#E5E7EB] p-7 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
              <div class="flex justify-between items-start mb-5">
                <div>
                  <p class="font-black text-[#444444] text-base">{{ $s['name'] }}</p>
                  <p class="text-3xl font-black group-hover:opacity-80 transition-opacity duration-300 mt-1"
                    style="color:{{ $s['c1'] }}">{{ $s['count'] }}</p>
                  <p class="text-xs text-[#666666] mt-0.5">Internships placed</p>
                </div>
                <span
                  class="bg-emerald-50 text-emerald-600 text-xs font-black px-3 py-1 rounded-full">{{ $s['growth'] }}</span>
              </div>

              {{-- Mini bar chart --}}
              <div class="flex items-end gap-1 h-12">
                @foreach ($s['bars'] as $b)
                  <div class="flex-1 rounded-t-sm group-hover:opacity-100 transition-opacity duration-300"
                    style="height:{{ $b }}%; background:linear-gradient(to top, {{ $s['c1'] }}, {{ $s['c2'] }}); opacity:{{ $loop->last ? 1 : .35 }}">
                  </div>
                @endforeach
              </div>
              <div class="mt-4 h-1.5 rounded-full overflow-hidden" style="background:#E5E7EB">
                <div class="h-full rounded-full"
                  style="width:{{ intval(str_replace(',', '', $s['count'])) > 1000 ? '85' : (intval(str_replace(',', '', $s['count'])) > 700 ? '60' : '40') }}%; background:linear-gradient(to right, {{ $s['c1'] }}, {{ $s['c2'] }})">
                </div>
              </div>
            </div>
          @endforeach
        </div>

        {{-- Image row --}}
      
      </div>
    </section>


    {{-- ============================================================
    7. ENGAGEMENT SECTION
    ============================================================ --}}
    <section class="py-24 relative overflow-hidden"
      style="background: linear-gradient(135deg, #F5FBFB 0%, #FFFFFF 100%)">

      <div class="absolute top-1/2 right-0 w-80 h-80 rounded-full blur-3xl" style="background:rgba(0,177,170,.07)">
      </div>

      <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-16">

          {{-- Left image collage --}}
          <div class="">
            <div class="rounded-3xl overflow-hidden shadow-xl border border-[#E5E7EB]  relative group">
              <img
                src="https://stream-blog-v2.imgix.net/blog/wp-content/uploads/223f3a7e9d7b0fb499e07ca35cee98d2/Frame.jpg?auto=format&auto=compress"
                alt="Engagement visual 1"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
           
          </div>

          {{-- Right text --}}
          <div>
            <span class="text-[#00B1AA] text-xs font-semibold uppercase tracking-widest">Engagement</span>
            <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3 leading-tight">
              Live Platform Activity
            </h2>
            <p class="text-[#666666] mt-5 leading-relaxed">Our platform never sleeps. Thousands of students and
              companies interact every single day, creating a thriving community built around real career growth.</p>
            <div class="mt-8 bg-white rounded-2xl p-6 shadow-lg border border-[#E5E7EB]">
              <div class="flex items-center justify-between">
                <p class="font-bold text-[#444444]">Today's Activity</p>
                <span class="flex items-center gap-1.5 text-emerald-500 text-xs font-bold">
                  <span class="w-2 h-2 rounded-full bg-emerald-500 pulse-dot inline-block"></span>
                  Live
                </span>
              </div>
              <div class="mt-4 grid grid-cols-2 gap-3">
                <div class="rounded-xl p-3" style="background:rgba(0,177,170,.08)">
                  <p class="text-2xl font-black" style="color:#00B1AA">1,248</p>
                  <p class="text-xs text-[#666666]">Active Users</p>
                </div>
                <div class="rounded-xl p-3 bg-[#FFF7ED]">
                  <p class="text-2xl font-black" style="color:#F89122">342</p>
                  <p class="text-xs text-[#666666]">Applications Today</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Engagement analytics cards --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
          @php
            $eng = [
              ['label' => 'Daily Active Users', 'value' => '1,248', 'sub' => '+8.2% vs yesterday', 'bg' => '#00B1AA', 'vcolor' => '#FFFFFF', 'lcolor' => '#FFFFFF', 'scolor' => 'rgba(255,255,255,.7)'],
              ['label' => 'Applications Today', 'value' => '342', 'sub' => 'Submitted since 8am', 'bg' => '#FFFFFF', 'vcolor' => '#00B1AA', 'lcolor' => '#444444', 'scolor' => '#666666'],
              ['label' => 'Companies Hiring', 'value' => '94', 'sub' => 'This month', 'bg' => '#FFFFFF', 'vcolor' => '#008A84', 'lcolor' => '#444444', 'scolor' => '#666666'],
              ['label' => 'Interviews Scheduled', 'value' => '128', 'sub' => 'This week', 'bg' => '#FFFFFF', 'vcolor' => '#F89122', 'lcolor' => '#444444', 'scolor' => '#666666'],
              ['label' => 'Profile Completion', 'value' => '87%', 'sub' => 'Avg. student profiles', 'bg' => '#F5FBFB', 'vcolor' => '#008A84', 'lcolor' => '#444444', 'scolor' => '#666666'],
            ];
          @endphp
          @foreach ($eng as $e)
            <div
              class="rounded-3xl shadow-xl border border-[#E5E7EB] p-6 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group"
              style="background:{{ $e['bg'] }}">
              <p class="text-3xl font-black group-hover:scale-110 transition-transform duration-300 origin-left"
                style="color:{{ $e['vcolor'] }}">{{ $e['value'] }}</p>
              <p class="text-xs font-bold mt-2" style="color:{{ $e['lcolor'] }}">{{ $e['label'] }}</p>
              <p class="text-[11px] mt-1" style="color:{{ $e['scolor'] }}">{{ $e['sub'] }}</p>
            </div>
          @endforeach
        </div>

     
      </div>
    </section>


    {{-- ============================================================
    8. TESTIMONIALS SECTION ← NEW
    ============================================================ --}}
    <section class="bg-[#FFFFFF] py-24 relative overflow-hidden">

      {{-- Background accent --}}
      <div class="absolute top-0 left-0 right-0 h-px"
        style="background: linear-gradient(to right, transparent, #00B1AA, #F89122, transparent)"></div>
      <div class="absolute -bottom-32 left-1/2 -translate-x-1/2 w-[700px] h-[700px] rounded-full pointer-events-none"
        style="background: radial-gradient(circle, rgba(0,177,170,.05) 0%, transparent 70%)"></div>

      <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="text-center mb-16">
          <span class="text-[#F89122] text-xs font-semibold uppercase tracking-widest">What They Say</span>
          <h2 class="text-4xl lg:text-5xl font-black text-[#444444] mt-3">
            Voices of <span class="grad-text">Success</span>
          </h2>
          <p class="text-[#666666] mt-4 max-w-xl mx-auto">
            From students who landed their dream internship to companies who found exceptional talent — these are their
            stories.
          </p>
        </div>

        {{-- Featured testimonial --}}
        @php
          $featured = [
            'quote' => 'InterLink completely changed my career trajectory. Within two weeks of creating my profile, I had three interview requests from companies I genuinely admired. The platform is intuitive, fast, and the team behind it clearly cares about student success.',
            'name' => 'Amina Benhaddou',
            'role' => 'Computer Science Student — placed at TechCorp',
            'stars' => 5,
          ];
        @endphp

        <div class="relative rounded-3xl overflow-hidden mb-12 shadow-2xl border border-[#E5E7EB]"
          style="background: linear-gradient(135deg, #00B1AA 0%, #008A84 100%)">
          <div class="absolute top-0 right-0 w-80 h-80 rounded-full -translate-x-12 -translate-y-12 opacity-10"
            style="background:#FFFFFF"></div>
          <div class="absolute bottom-0 left-0 w-60 h-60 rounded-full translate-x-[-30%] translate-y-[30%] opacity-10"
            style="background:#F89122"></div>
          <div class="relative z-10 grid grid-cols-1 lg:grid-cols-5 gap-0">
            <div class="lg:col-span-3 p-10 lg:p-14">
              {{-- Stars --}}
              <div class="flex gap-1 mb-6">
                @for ($s = 0; $s < $featured['stars']; $s++)
                  <svg class="w-5 h-5" viewBox="0 0 20 20" fill="#F89122">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                @endfor
              </div>
              <p class="text-white text-xl lg:text-2xl font-semibold leading-relaxed mb-8">
                "{{ $featured['quote'] }}"
              </p>
              <div class="flex items-center gap-4">
                <div
                  class="w-12 h-12 rounded-full border-2 border-white/30 overflow-hidden bg-white/20 flex items-center justify-center">
                  <span class="text-white font-black text-lg">{{ substr($featured['name'], 0, 1) }}</span>
                </div>
                <div>
                  <p class="text-white font-bold">{{ $featured['name'] }}</p>
                  <p class="text-white/70 text-xs">{{ $featured['role'] }}</p>
                </div>
              </div>
            </div>
            <div class="lg:col-span-2 relative hidden lg:block">
              <img
                src="https://cdn.prod.website-files.com/63eb3eaf146906eaa999e318/642d90c73077e2ced7d76141_Adult%20Learner%201%20(1).webp"
                alt="Featured testimonial" class="w-full h-full object-cover opacity-60">
              <div class="absolute inset-0" style="background:linear-gradient(to right, #008A84, transparent)"></div>
            </div>
          </div>
        </div>

        {{-- Testimonial grid --}}
        @php
          $testimonials = [
            [
              'quote' => 'We have hired 12 interns through InterLink over the past year. The quality of candidates is outstanding — they arrive prepared, motivated, and ready to contribute from day one.',
              'name' => 'Karim El-Fassi',
              'role' => 'HR Director, Digitalys Morocco',
              'type' => 'Company',
              'stars' => 5,
            ],
            [
              'quote' => 'The dashboard gives us everything we need to track applications and communicate with students. It saved our recruiting team at least 8 hours a week.',
              'name' => 'Sarah Dupont',
              'role' => 'Talent Acquisition, Innova Group',
              'type' => 'Company',
              'stars' => 5,
            ],
            [
              'quote' => 'I was skeptical at first, but InterLink matched me with an internship that aligned perfectly with my skills. I got a full-time offer at the end!',
              'name' => 'Youssef Tazi',
              'role' => 'Business Analytics Student',
              'type' => 'Student',
              'stars' => 5,
            ],
            [
              'quote' => 'Compared to other platforms, InterLink is miles ahead in user experience. Applying takes minutes, not hours. I felt supported throughout the entire process.',
              'name' => 'Nour Alami',
              'role' => 'Marketing Student',
              'type' => 'Student',
              'stars' => 5,
            ],
            [
              'quote' => 'The reporting features are brilliant. We can see exactly how our listings are performing and optimize them in real time. It is like having a data analyst built into the platform.',
              'name' => 'Mehdi Benali',
              'role' => 'Operations Manager, CloudBridge',
              'type' => 'Company',
              'stars' => 5,
            ],
            [
              'quote' => 'InterLink does not just connect you to internships — it helps you grow. The profile feedback and skills tagging made me realize what I had to improve before applying.',
              'name' => 'Fatima Zahra Idrissi',
              'role' => 'Cybersecurity Student',
              'type' => 'Student',
              'stars' => 5,
            ],
          ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
          @foreach ($testimonials as $t)
                  <div
                    class="bg-white rounded-3xl shadow-xl border border-[#E5E7EB] p-7 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group relative overflow-hidden">

                    {{-- Corner accent --}}
                    <div
                      class="absolute top-0 right-0 w-20 h-20 rounded-full -translate-x-4 -translate-y-4 opacity-60 pointer-events-none"
                      style="background: {{ $t['type'] === 'Student' ? 'rgba(0,177,170,.08)' : 'rgba(248,145,34,.08)' }}"></div>

                    {{-- Type badge --}}
                    <span class="inline-block text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-4"
                      style="{{ $t['type'] === 'Student'
            ? 'background:rgba(0,177,170,.1);color:#00B1AA'
            : 'background:#FFF7ED;color:#F89122' }}">
                      {{ $t['type'] }}
                    </span>

                    {{-- Stars --}}
                    <div class="flex gap-0.5 mb-4">
                      @for ($s = 0; $s < $t['stars']; $s++)
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="#F89122">
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                      @endfor
                    </div>

                    {{-- Quote --}}
                    <p class="text-[#666666] text-sm leading-relaxed mb-6 relative">
                      <span class="text-4xl font-black absolute -top-2 -left-1 leading-none opacity-10"
                        style="color:#00B1AA">"</span>
                      {{ $t['quote'] }}
                    </p>

                    {{-- Author --}}
                    <div class="flex items-center gap-3 border-t border-[#E5E7EB] pt-5">
                      <div
                        class="w-10 h-10 rounded-full flex items-center justify-center font-black text-sm text-white flex-shrink-0"
                        style="background: {{ $t['type'] === 'Student' ? '#00B1AA' : '#F89122' }}">
                        {{ substr($t['name'], 0, 1) }}
                      </div>
                      <div>
                        <p class="text-sm font-bold text-[#444444]">{{ $t['name'] }}</p>
                        <p class="text-xs text-[#666666]">{{ $t['role'] }}</p>
                      </div>
                    </div>
                  </div>
          @endforeach
        </div>

        {{-- Trust bar --}}
        <div class="rounded-3xl border border-[#E5E7EB] p-8 shadow-md"
          style="background:linear-gradient(135deg,#F5FBFB 0%,#FFF7ED 100%)">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @php
              $trust = [
                ['v' => '4.9/5', 'l' => 'Average Rating', 'c' => '#F89122'],
                ['v' => '98%', 'l' => 'Would Recommend', 'c' => '#00B1AA'],
                ['v' => '3,200+', 'l' => 'Written Reviews', 'c' => '#008A84'],
                ['v' => '12K+', 'l' => 'Happy Placements', 'c' => '#F89122'],
              ];
            @endphp
            @foreach ($trust as $tr)
              <div>
                <p class="text-3xl font-black" style="color:{{ $tr['c'] }}">{{ $tr['v'] }}</p>
                <p class="text-xs text-[#666666] mt-1 font-medium">{{ $tr['l'] }}</p>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </section>


    {{-- ============================================================
    9. CTA BANNER ← NEW
    ============================================================ --}}
    <section class="py-20 relative overflow-hidden"
      style="background: linear-gradient(135deg, #00B1AA 0%, #008A84 60%, #00B1AA 100%)">

      <div class="absolute inset-0 pointer-events-none"
        style="background-image: linear-gradient(rgba(255,255,255,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.06) 1px,transparent 1px); background-size:48px 48px;">
      </div>
      <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full"
        style="background:rgba(248,145,34,.2); filter:blur(60px)"></div>
      <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full"
        style="background:rgba(255,255,255,.1); filter:blur(60px)"></div>

      <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <span class="inline-block text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-6 text-white"
          style="background:rgba(255,255,255,.15)">Get Started Today</span>
        <h2 class="text-4xl lg:text-6xl font-black text-white leading-tight mb-6">
          Ready to Connect<br>Talent with Opportunity?
        </h2>
        <p class="text-white/80 text-lg max-w-xl mx-auto mb-10">
          Join 15,000+ students and 800+ companies already using InterLink to build better careers and stronger teams.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="#"
            class="inline-flex items-center gap-3 bg-white font-bold px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 text-sm"
            style="color:#00B1AA">
            Start as a Student
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
          <a href="#"
            class="inline-flex items-center gap-3 font-bold px-8 py-4 rounded-2xl border-2 border-white/40 text-white hover:bg-white/10 hover:border-white transition-all duration-300 text-sm">
            Post an Internship
          </a>
        </div>
      </div>
    </section>

  </div>

  {{-- Scroll reveal script --}}
  <script>
    (function () {
      const els = document.querySelectorAll('.reveal');
      const io = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('revealed'); io.unobserve(e.target); } });
      }, { threshold: .12 });
      els.forEach(el => io.observe(el));
    })();
  </script>

  <x-footer />

</body>

</html>