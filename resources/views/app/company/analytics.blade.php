<x-layouts::company :title="__('Analytics')">

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<style>
/* ═══════════════════════════════════
   ANIMATION ENGINE
   ═══════════════════════════════════ */
.anim-block {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity 0.6s cubic-bezier(.4,0,.2,1),
              transform 0.6s cubic-bezier(.34,1.26,.64,1);
  will-change: transform, opacity;
}
.anim-block.anim-visible {
  opacity: 1 !important;
  transform: translateY(0) !important;
}

.anim-scale {
  opacity: 0;
  transform: scale(0.85);
  transition: opacity 0.5s ease, transform 0.55s cubic-bezier(.34,1.46,.64,1);
  will-change: transform, opacity;
}
.anim-scale.anim-visible {
  opacity: 1 !important;
  transform: scale(1) !important;
}

.anim-left {
  opacity: 0;
  transform: translateX(24px);
  transition: opacity 0.55s ease, transform 0.55s cubic-bezier(.4,0,.2,1);
  will-change: transform, opacity;
}
.anim-left.anim-visible {
  opacity: 1 !important;
  transform: translateX(0) !important;
}

/* Hover lift */
.hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease !important; }
.hover-lift:hover { transform: translateY(-3px) !important; box-shadow: 0 8px 28px rgba(0,0,0,0.10) !important; }

/* Progress bars */
.prog-row  { display:flex;align-items:center;gap:12px;margin-bottom:14px; }
.prog-label{ font-size:12px;font-weight:500;color:var(--gray-700);min-width:130px; }
.prog-bar-wrap{ flex:1;height:8px;background:var(--gray-200);border-radius:4px;overflow:hidden; }
.prog-fill { height:100%;border-radius:4px;width:0;transition:width 1.3s cubic-bezier(.4,0,.2,1); }
.prog-val  { font-size:12px;font-weight:700;min-width:36px;text-align:right; }

/* Ring SVG */
.ring-circle {
  transition: stroke-dasharray 1.4s cubic-bezier(.4,0,.2,1);
}

/* Counter span */
.counter-val { display:inline-block; }

/* KPI chip */
.kpi-chip { display:flex;align-items:center;gap:10px;padding:10px 16px;border-radius:12px;background:var(--white);border:1px solid var(--border);cursor:default;transition:all 0.2s; }
.kpi-chip:hover { border-color:var(--primary);box-shadow:0 4px 12px rgba(0,177,170,0.12);transform:translateY(-2px); }

/* Type badges */
.type-badge      { padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600; }
.type-monthly    { background:#EFF6FF;color:#1D4ED8; }
.type-quarterly  { background:#F3E8FF;color:#6B21A8; }
.type-compliance { background:#ECFDF5;color:#065F46; }
.type-performance{ background:#FEF3C7;color:#92400E; }
.type-partnership{ background:#FFF7ED;color:#C2410C; }

/* Table */
.reports-table tbody tr { transition:background 0.15s; border-bottom:1px solid var(--border); }
.reports-table tbody tr:nth-child(even) { background:var(--gray-50); }
.reports-table tbody tr:hover { background:rgba(0,177,170,0.04) !important; }

/* Card actions */
.card-actions    { display:flex;align-items:center;gap:8px; }
.filter-select-sm{ padding:6px 10px;border:1.5px solid var(--gray-300);border-radius:7px;font-size:12px;color:var(--gray-700);background:var(--white);cursor:pointer;outline:none; }
</style>

<!-- ══════════════════════════════════
     PAGE HEADER
     ══════════════════════════════════ -->
<div class="anim-block" id="section-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:24px;">
  <div>
    <h2 style="font-size:20px;font-weight:800;color:var(--gray-800);">Hiring Analytics</h2>
    <p style="font-size:13px;color:var(--gray-500);margin-top:3px;">
      Overview of your hiring performance and applicant data &nbsp;·&nbsp;
      <span style="color:#10B981;font-weight:600;"><i class="fas fa-circle" style="font-size:7px;vertical-align:middle;"></i> Live</span>
      &nbsp;·&nbsp; Updated {{ now()->format('d M Y, H:i') }}
    </p>
  </div>
  <div style="display:flex;gap:10px;">
    <button class="btn btn-outline" id="exportBtn" onclick="exportPDF()">
      <i class="fas fa-file-pdf"></i> Export PDF
    </button>
    <button class="btn btn-primary" id="generateBtn" onclick="downloadCSV()">
      <i class="fas fa-file-excel"></i> Export CSV
    </button>
  </div>
</div>

<!-- ══════════════════════════════════
     PRIMARY KPI CARDS (row 1)
     ══════════════════════════════════ -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:16px;">
  @foreach([
    ['1240', '1,240','Total Listing Views',  '+14% vs last mo', 'fa-eye','#3B82F6','rgba(59,130,246,.12)'],
    ['38',  '3.8%',  'Application Rate',     '+0.4% this wk',  'fa-percent','#10B981','rgba(16,185,129,.12)'],
    ['12',   '12d',   'Avg. Days to Hire',    '-2d vs last yr', 'fa-hourglass-half','#F59E0B','rgba(245,158,11,.12)'],
    ['72',   '72%',   'Offer Acceptance',     '+5% semester',   'fa-handshake','#8B5CF6','rgba(139,92,246,.12)'],
  ] as $idx => [$raw,$display,$lbl,$chg,$icon,$color,$bg])
  <div class="stat-card hover-lift anim-scale kpi-card" data-delay="{{ $idx * 70 }}"
       style="padding:20px;gap:14px;cursor:default;background:var(--white);border:1px solid var(--border);">
    <div style="width:48px;height:48px;border-radius:12px;background:{{ $bg }};display:flex;align-items:center;justify-content:center;color:{{ $color }};font-size:20px;flex-shrink:0;">
      <i class="fas {{ $icon }}"></i>
    </div>
    <div>
      <div class="counter-val" data-target="{{ $raw }}" data-suffix="{{ str_contains($display,'%') ? '%' : (str_contains($display,'d') ? 'd' : '') }}"
           data-decimal="{{ str_contains($display,'.') ? '1' : '0' }}"
           style="font-size:26px;font-weight:800;color:var(--gray-800);">{{ $display }}</div>
      <div style="font-size:12px;color:var(--gray-500);font-weight:500;margin-top:2px;">{{ $lbl }}</div>
      <div style="font-size:11px;font-weight:600;margin-top:4px;color:{{ str_contains($chg,'-')||str_contains($chg,'down') ? '#F59E0B' : '#10B981' }};">
        <i class="fas {{ str_contains($chg,'-') ? 'fa-arrow-trend-down' : 'fa-arrow-trend-up' }}" style="font-size:9px;margin-right:3px;"></i>{{ $chg }}
      </div>
    </div>
  </div>
  @endforeach
</div>

<!-- Secondary KPI row -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px;">
  @foreach([
    ['47', '47',  'Applications Received', '+12 this week', 'fa-inbox','var(--primary)','var(--primary-bg)', 280],
    ['28','28',  'Under Review',          'Active review',  'fa-user-clock','#F59E0B','rgba(245,158,11,.12)', 350],
    ['3',  '3',   'Active Placements',     'On track',       'fa-circle-check','#10B981','rgba(16,185,129,.12)', 420],
    ['12', '12',  'Interviews Scheduled',  'Next 7 days',    'fa-calendar-days','#6366F1','rgba(99,102,241,.12)', 490],
  ] as [$raw,$display,$lbl,$chg,$icon,$color,$bg,$delay])
  <div class="stat-card hover-lift anim-scale kpi-card" data-delay="{{ $delay }}"
       style="padding:16px;gap:12px;cursor:default;background:var(--white);border:1px solid var(--border);">
    <div style="width:40px;height:40px;border-radius:10px;background:{{ $bg }};display:flex;align-items:center;justify-content:center;color:{{ $color }};font-size:17px;flex-shrink:0;">
      <i class="fas {{ $icon }}"></i>
    </div>
    <div>
      <div class="counter-val" data-target="{{ $raw }}" data-suffix="" data-decimal="0"
           style="font-size:21px;font-weight:700;color:var(--gray-800);">{{ $display }}</div>
      <div style="font-size:11px;color:var(--gray-500);font-weight:500;margin-top:1px;">{{ $lbl }}</div>
      <div style="font-size:10px;font-weight:600;margin-top:3px;color:#10B981;">{{ $chg }}</div>
    </div>
  </div>
  @endforeach
</div>

<!-- ══════════════════════════════════
     CHARTS ROW 1: Bar + Doughnut
     ══════════════════════════════════ -->
<div class="two-col-grid anim-block" id="section-charts1" data-delay="100" style="margin-bottom:24px;">

  <div class="card hover-lift">
    <div class="card-header">
      <div>
        <div class="card-title">Applications Over Time</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Monthly submissions &amp; conversion metrics</div>
      </div>
      <div class="card-actions">
        <select class="filter-select-sm" onchange="updateBarChart(this.value)">
          <option value="2026">2026</option>
          <option value="2025">2025</option>
        </select>
      </div>
    </div>
    <div class="card-body">
      <canvas id="barChart" style="height:280px;max-height:280px;"></canvas>
    </div>
  </div>

  <div class="card hover-lift">
    <div class="card-header">
      <div>
        <div class="card-title">Applicant Sources</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Where candidates discover your listings</div>
      </div>
    </div>
    <div class="card-body" style="display:flex;align-items:center;justify-content:center;">
      <canvas id="doughnutChart" style="max-height:280px;"></canvas>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════
     CHARTS ROW 2: Line + Radar + Rings
     ══════════════════════════════════ -->
<div style="display:grid;grid-template-columns:2fr 1fr 1fr;gap:20px;margin-bottom:24px;">

  <div class="card hover-lift anim-block" id="section-line" data-delay="150">
    <div class="card-header">
      <div>
        <div class="card-title">Offer Acceptance Rate Over Time</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Monthly % · 2026 vs 2025</div>
      </div>
      <div class="card-actions">
        <span style="width:10px;height:10px;border-radius:3px;background:var(--primary);display:inline-block;"></span>
        <span style="font-size:11px;color:var(--gray-500);margin-right:10px;"> 2026</span>
        <span style="width:10px;height:10px;border-radius:3px;background:#CBD5E1;display:inline-block;"></span>
        <span style="font-size:11px;color:var(--gray-500);"> 2025</span>
      </div>
    </div>
    <div class="card-body">
      <canvas id="lineChart" style="height:220px;max-height:220px;"></canvas>
    </div>
  </div>

  <div class="card hover-lift anim-block" id="section-radar" data-delay="220">
    <div class="card-header">
      <div class="card-title" style="font-size:13px;">Department Breakdown</div>
      <div style="font-size:11px;color:var(--gray-400);">Hiring allocation metric</div>
    </div>
    <div class="card-body" style="display:flex;align-items:center;justify-content:center;padding-top:6px;">
      <canvas id="radarChart" style="max-height:220px;"></canvas>
    </div>
  </div>

  <div class="card hover-lift anim-left" id="section-rings" data-delay="300">
    <div class="card-header">
      <div class="card-title" style="font-size:13px;">Placement Universities</div>
    </div>
    <div class="card-body" style="display:flex;flex-direction:column;gap:18px;padding-top:8px;">
      @php
      $rings = [
        ['Epoka University',     34, '#3B82F6', 16],
        ['Univ. of Tirana',      28, '#10B981', 13],
        ['Polytechnic Univ.',    21, '#8B5CF6', 10],
        ['Albanian Univ.',       17, '#F59E0B',  8],
      ];
      $circ = 119.4; // 2π×19
      @endphp
      @foreach($rings as $ri => [$rlabel,$rpct,$rcolor,$rnum])
      @php $rdash = round(($rpct/100)*$circ,1); @endphp
      <div style="display:flex;align-items:center;gap:12px;">
        <div style="position:relative;width:48px;height:48px;flex-shrink:0;">
          <svg width="48" height="48" viewBox="0 0 48 48" style="transform:rotate(-90deg);">
            <circle cx="24" cy="24" r="19" fill="none" stroke="#E2E8F0" stroke-width="5"/>
            <circle cx="24" cy="24" r="19" fill="none"
              stroke="{{ $rcolor }}" stroke-width="5" stroke-linecap="round"
              class="ring-circle"
              stroke-dasharray="0 {{ $circ }}"
              data-filled="{{ $rdash }}" data-total="{{ $circ }}"
              data-delay="{{ 400 + $ri * 160 }}"/>
          </svg>
          <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;color:var(--gray-800);">{{ $rpct }}%</div>
        </div>
        <div style="flex:1;">
          <div style="font-size:12px;font-weight:600;color:var(--gray-800);">{{ $rlabel }}</div>
          <div style="font-size:11px;color:var(--gray-500);">{{ $rnum }} hired candidates</div>
        </div>
        <div style="font-size:18px;font-weight:700;color:{{ $rcolor }};">{{ $rnum }}</div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<!-- ══════════════════════════════════
     OFFERS PERFORMANCE TABLE
     ══════════════════════════════════ -->
<div class="card anim-block" id="section-table" data-delay="300">
  <div class="card-header">
    <div>
      <div class="card-title">Internship Postings Performance</div>
      <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Conversion and reach metrics per posting</div>
    </div>
    <div class="card-actions">
      <button class="btn btn-sm btn-outline" id="refreshBtn" onclick="refreshReports(this)">
        <i class="fas fa-rotate-right"></i> Refresh
      </button>
    </div>
  </div>
  <div style="overflow-x:auto;">
    <table class="reports-table" style="width:100%;border-collapse:collapse;">
      <thead>
        <tr>
          @foreach(['Posting Name','Department','Listing Views','Applicants','Conv. Rate','Status'] as $th)
          <th style="padding:12px 16px;font-size:11px;font-weight:700;color:var(--gray-500);text-transform:uppercase;letter-spacing:.06em;background:var(--gray-50);border-bottom:1px solid var(--border);">{{ $th }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody id="reportsTableBody">
        @foreach([
          ['Software Development Intern','Engineering','#3B82F6',1200,34,'2.8%','active','Active'],
          ['Marketing Coordinator',      'Marketing',  '#F59E0B', 680,21,'3.1%','active','Active'],
          ['Data Analyst Intern',        'Data Science','#10B981', 510,18,'3.5%','active','Active'],
          ['UI/UX Design Intern',        'Design',      '#8B5CF6', 720,27,'3.7%','draft', 'Draft'],
          ['Financial Analyst Intern',   'Finance',     '#EF4444',   0, 0,'0.0%','draft', 'Draft'],
          ['Backend Developer Intern',   'Engineering','#3B82F6', 340, 8,'2.4%','closed','Closed'],
        ] as [$title,$dept,$cc,$views,$applicants,$conv,$statusClass,$statusLabel])
        <tr>
          <td style="padding:14px 16px;">
            <div style="display:flex;align-items:center;gap:10px;">
              <div style="width:36px;height:36px;border-radius:9px;background:{{ $cc }}1a;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="fas fa-briefcase" style="color:{{ $cc }};font-size:15px;"></i>
              </div>
              <span style="font-size:13px;font-weight:600;color:var(--gray-800);">{{ $title }}</span>
            </div>
          </td>
          <td style="padding:14px 16px;">
            <span style="font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px;background:{{ $cc }}1a;color:{{ $cc }};">{{ $dept }}</span>
          </td>
          <td style="padding:14px 16px;font-size:12px;color:var(--gray-700);font-weight:600;">{{ number_format($views) }}</td>
          <td style="padding:14px 16px;font-size:12px;color:var(--gray-700);font-weight:600;">{{ $applicants }}</td>
          <td style="padding:14px 16px;font-size:12px;color:var(--gray-600);font-weight:600;">{{ $conv }}</td>
          <td style="padding:14px 16px;"><span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- TOAST -->
<div id="toast" style="position:fixed;bottom:24px;right:24px;z-index:99999;transform:translateY(80px);opacity:0;transition:all 0.35s cubic-bezier(.4,0,.2,1);pointer-events:none;">
  <div style="display:flex;align-items:center;gap:12px;padding:14px 20px;border-radius:12px;background:var(--white);box-shadow:0 12px 32px rgba(0,0,0,0.14);border:1px solid var(--border);min-width:260px;">
    <div id="toast-icon" style="font-size:16px;"></div>
    <span id="toast-msg" style="font-size:13px;font-weight:600;color:var(--gray-800);"></span>
  </div>
</div>

<!-- ══════════════════════════════════
     ANIMATION ENGINE + CHARTS
     ══════════════════════════════════ -->
<script>
/* ── STEP 1: Hide elements before animation ── */
document.querySelectorAll('.anim-block,.anim-scale,.anim-left,.kpi-card').forEach(el => {
  el.style.opacity = '0';
  if(el.classList.contains('anim-scale')) el.style.transform = 'scale(0.82)';
  else if(el.classList.contains('anim-left')) el.style.transform = 'translateX(24px)';
  else el.style.transform = 'translateY(28px)';
});

/* ── STEP 2: Trigger animations ── */
window.addEventListener('load', runAnimations);
document.addEventListener('livewire:navigated', runAnimations);

let animationsRan = false;

function runAnimations() {
  if(animationsRan) return;
  animationsRan = true;

  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      /* Stagger KPI cards */
      document.querySelectorAll('.kpi-card').forEach(el => {
        const delay = parseInt(el.dataset.delay || 0);
        setTimeout(() => {
          el.style.transition = 'opacity 0.5s cubic-bezier(.4,0,.2,1), transform 0.55s cubic-bezier(.34,1.26,.64,1)';
          el.style.opacity    = '1';
          el.style.transform  = 'scale(1)';
        }, delay);
      });

      /* Stagger Section blocks */
      document.querySelectorAll('.anim-block').forEach(el => {
        const delay = parseInt(el.dataset.delay || 100);
        setTimeout(() => {
          el.style.transition = 'opacity 0.6s cubic-bezier(.4,0,.2,1), transform 0.6s cubic-bezier(.34,1.26,.64,1)';
          el.style.opacity    = '1';
          el.style.transform  = 'translateY(0)';
        }, delay);
      });

      /* Left slide blocks */
      document.querySelectorAll('.anim-left').forEach(el => {
        const delay = parseInt(el.dataset.delay || 200);
        setTimeout(() => {
          el.style.transition = 'opacity 0.55s ease, transform 0.55s cubic-bezier(.4,0,.2,1)';
          el.style.opacity    = '1';
          el.style.transform  = 'translateX(0)';
        }, delay);
      });

      /* Counter animations */
      document.querySelectorAll('.counter-val[data-target]').forEach(el => {
        const raw     = parseFloat(el.dataset.target);
        const suffix  = el.dataset.suffix  || '';
        const decimals= parseInt(el.dataset.decimal || 0);
        const duration= 1400;
        const start   = performance.now();

        const tick = (now) => {
          const progress = Math.min((now - start) / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 4);
          const current = raw * eased;
          if(decimals > 0) {
            el.textContent = current.toFixed(decimals) + suffix;
          } else if(raw >= 1000) {
            el.textContent = Math.floor(current).toLocaleString() + suffix;
          } else {
            el.textContent = Math.floor(current) + suffix;
          }
          if(progress < 1) requestAnimationFrame(tick);
        };
        const delay = parseInt(el.closest('[data-delay]')?.dataset.delay || 0);
        setTimeout(() => requestAnimationFrame(tick), delay + 200);
      });

      /* SVG Rings */
      document.querySelectorAll('.ring-circle').forEach(el => {
        const filled = el.dataset.filled;
        const total  = el.dataset.total;
        const delay  = parseInt(el.dataset.delay || 400);
        setTimeout(() => {
          el.style.strokeDasharray = `${filled} ${total}`;
        }, delay);
      });

      /* Init Charts */
      setTimeout(initCharts, 120);
    });
  });
}

/* ── CHART.JS SETUP ── */
Chart.defaults.font.family = "'Inter', sans-serif";
Chart.defaults.color       = '#94a3b8';

const barData2026 = {
  submitted: [12, 18, 24, 31, 38, 47],
  views:     [240, 390, 480, 720, 980, 1240],
  hired:     [1, 2, 4, 3, 5, 8]
};
const barData2025 = {
  submitted: [8, 14, 19, 25, 30, 34],
  views:     [180, 290, 380, 520, 780, 920],
  hired:     [0, 1, 3, 2, 3, 5]
};

let barChartInstance = null;

function initCharts() {
  const rootStyle = getComputedStyle(document.documentElement);
  const primaryColor = rootStyle.getPropertyValue('--primary').trim() || '#00b1aa';
  const primaryLight = rootStyle.getPropertyValue('--primary-light').trim() || '#4cd1cc';
  const primaryBg    = rootStyle.getPropertyValue('--primary-bg').trim() || 'rgba(0,177,170,0.15)';

  /* ── 1. BAR CHART ── */
  const barCtx = document.getElementById('barChart').getContext('2d');
  barChartInstance = new Chart(barCtx, {
    type: 'bar',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun'],
      datasets: [
        { label:'Views (x10)', data: barData2026.views.map(v => Math.round(v/10)), backgroundColor:'#3B82F6', borderRadius:5, barPercentage:.6 },
        { label:'Applicants', data: barData2026.submitted, backgroundColor:primaryColor, borderRadius:5, barPercentage:.6 },
        { label:'Hired',  data: barData2026.hired,  backgroundColor:'#10B981', borderRadius:5, barPercentage:.6 },
      ]
    },
    options: {
      responsive:true, maintainAspectRatio:false,
      animation: {
        duration: 1000,
        easing: 'easeOutQuart',
        delay(ctx) { return ctx.dataIndex * 55 + ctx.datasetIndex * 120; }
      },
      plugins: {
        legend: { position:'top', labels:{ boxWidth:10, usePointStyle:true, pointStyle:'rect', padding:16, font:{size:11} }},
        tooltip: { backgroundColor:'white', titleColor:'#444', bodyColor:'#64748b', borderColor:'#e2e8f0', borderWidth:1, padding:10 }
      },
      scales: {
        y: { beginAtZero:true, grid:{ color:'rgba(0,0,0,0.04)' }, ticks:{ font:{size:11} }},
        x: { grid:{ display:false }, ticks:{ font:{size:11} }}
      }
    }
  });

  /* ── 2. DOUGHNUT CHART ── */
  const dCtx = document.getElementById('doughnutChart').getContext('2d');
  new Chart(dCtx, {
    type: 'doughnut',
    data: {
      labels:['University Portal','LinkedIn','Referrals','Other'],
      datasets:[{
        data:[45,28,18,9],
        backgroundColor:[primaryColor,'#0077b5','#F59E0B','#9e9e9e'],
        borderWidth:3, borderColor:rootStyle.getPropertyValue('--white').trim()||'#fff', hoverOffset:10,
      }]
    },
    options: {
      responsive:true, maintainAspectRatio:false,
      animation: { animateScale:true, animateRotate:true, duration:1200, easing:'easeOutBack' },
      plugins: {
        legend:{ position:'right', labels:{ boxWidth:10, usePointStyle:true, pointStyle:'circle', padding:12, font:{size:11} }},
        tooltip:{ backgroundColor:'white', titleColor:'#444', bodyColor:'#64748b', borderColor:'#e2e8f0', borderWidth:1, padding:10 }
      },
      cutout:'68%'
    }
  });

  /* ── 3. LINE CHART ── */
  const lCtx = document.getElementById('lineChart').getContext('2d');
  new Chart(lCtx, {
    type:'line',
    data:{
      labels:['Jan','Feb','Mar','Apr','May','Jun'],
      datasets:[
        { label:'2026', data:[65,68,70,72,71,72], borderColor:primaryColor, backgroundColor:primaryBg,
          tension:0.45, fill:true, pointRadius:5, pointBackgroundColor:primaryColor, pointHoverRadius:8, borderWidth:2.5 },
        { label:'2025', data:[60,62,65,68,69,70], borderColor:'#CBD5E1', backgroundColor:'rgba(203,213,225,0.05)',
          tension:0.45, fill:true, pointRadius:4, pointBackgroundColor:'#CBD5E1', pointHoverRadius:7, borderWidth:2, borderDash:[5,4] }
      ]
    },
    options:{
      responsive:true, maintainAspectRatio:false,
      animation:{ duration:1300, easing:'easeOutCubic' },
      plugins:{
        legend:{display:false},
        tooltip:{ mode:'index', intersect:false, backgroundColor:'white', titleColor:'#444', bodyColor:'#64748b', borderColor:'#e2e8f0', borderWidth:1, padding:10 }
      },
      scales:{
        y:{ beginAtZero:false, min:50, max:85, grid:{ color:'rgba(0,0,0,0.04)' }, ticks:{ font:{size:11}, callback:v=>v+'%' }},
        x:{ grid:{ display:false }, ticks:{ font:{size:11} }}
      }
    }
  });

  /* ── 4. RADAR CHART ── */
  const rCtx = document.getElementById('radarChart').getContext('2d');
  new Chart(rCtx, {
    type:'radar',
    data:{
      labels:['Engineering','Marketing','Design','Finance'],
      datasets:[
        { label:'Applicants Allocation', data:[52,22,15,11], borderColor:primaryColor, backgroundColor:primaryBg, pointBackgroundColor:primaryColor, borderWidth:2 },
      ]
    },
    options:{
      responsive:true, maintainAspectRatio:false,
      animation:{ duration:1100, easing:'easeOutQuart' },
      plugins:{ legend:{ display:false }},
      scales:{ r:{ ticks:{ display:false }, grid:{ color:'rgba(0,0,0,0.07)' }, pointLabels:{ font:{size:10} }, min:0, max:60 }}
    }
  });
}

function updateBarChart(year) {
  const d = year === '2025' ? barData2025 : barData2026;
  barChartInstance.data.datasets[0].data = d.views.map(v => Math.round(v/10));
  barChartInstance.data.datasets[1].data = d.submitted;
  barChartInstance.data.datasets[2].data = d.hired;
  barChartInstance.update();
}

/* ── UI ACTIONS ── */
function showToast(msg, type='success') {
  const icons = {
    success:'<i class="fas fa-circle-check" style="color:#10B981"></i>',
    info:'<i class="fas fa-circle-info" style="color:#3B82F6"></i>',
    warning:'<i class="fas fa-triangle-exclamation" style="color:#F59E0B"></i>'
  };
  document.getElementById('toast-msg').textContent = msg;
  document.getElementById('toast-icon').innerHTML  = icons[type]||icons.info;
  const t = document.getElementById('toast');
  t.style.transform='translateY(0)'; t.style.opacity='1';
  setTimeout(()=>{ t.style.transform='translateY(80px)'; t.style.opacity='0'; },3200);
}

function exportPDF() {
  const btn = document.getElementById('exportBtn');
  btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Exporting...'; btn.disabled=true;
  setTimeout(()=>{
    btn.innerHTML='<i class="fas fa-circle-check"></i> Done!';
    Object.assign(btn.style,{background:'#e6f4ea',color:'#2e7d32',borderColor:'#2e7d32'});
    showToast('Hiring Analytics Report PDF exported successfully!','success');
    const a=document.createElement('a'); a.href='data:text/plain;charset=utf-8,Hiring Analytics Report';
    a.download='Hiring_Analytics_Report.pdf'; a.click();
    setTimeout(()=>{ btn.innerHTML='<i class="fas fa-file-pdf"></i> Export PDF'; btn.style.cssText=''; btn.disabled=false; },2500);
  },1500);
}

function downloadCSV() {
  const btn = document.getElementById('generateBtn');
  const origText = btn.innerHTML;
  btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Exporting...'; btn.disabled=true;
  setTimeout(()=>{
    btn.innerHTML='<i class="fas fa-circle-check"></i> Done!';
    showToast('Hiring Analytics CSV exported successfully!','success');
    const a=document.createElement('a'); a.href='data:text/csv;charset=utf-8,Posting,Department,Views,Applicants,Conversion,Status\nSoftware Development,Engineering,1200,34,2.8%,Active\n';
    a.download='Hiring_Analytics.csv'; a.click();
    setTimeout(()=>{ btn.innerHTML=origText; btn.disabled=false; },2500);
  },1500);
}

function refreshReports(btn) {
  const icon=btn.querySelector('i'); icon.classList.add('fa-spin'); btn.disabled=true;
  setTimeout(()=>{
    /* Stagger lines fill reset */
    const base=barData2026;
    barChartInstance.data.datasets[0].data = base.views.map(v=>Math.round((v+Math.floor(Math.random()*120-60))/10));
    barChartInstance.data.datasets[1].data = base.submitted.map(v=>v+Math.floor(Math.random()*6-3));
    barChartInstance.data.datasets[2].data = base.hired.map(v=>Math.max(0,v+Math.floor(Math.random()*2-1)));
    barChartInstance.update();
    icon.classList.remove('fa-spin'); btn.disabled=false;
    showToast('Analytics data refreshed!','info');
  },1100);
}
</script>

</x-layouts::company>
