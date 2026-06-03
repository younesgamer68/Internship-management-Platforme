<x-layouts::admin title="Reports & Analytics">

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<style>
/* ═══════════════════════════════════
   ANIMATION ENGINE
═══════════════════════════════════ */

/* Base hidden state – applied by JS so no flash without JS */
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
.kpi-chip { display:flex;align-items:center;gap:10px;padding:10px 16px;border-radius:12px;background:white;border:1px solid var(--border);cursor:default;transition:all 0.2s; }
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
.filter-select-sm{ padding:6px 10px;border:1.5px solid var(--gray-300);border-radius:7px;font-size:12px;color:var(--gray-700);background:white;cursor:pointer;outline:none; }
</style>

<!-- ══════════════════════════════════
     PAGE HEADER
══════════════════════════════════ -->
<div class="anim-block" id="section-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:24px;">
  <div>
    <h2 style="font-size:20px;font-weight:800;color:var(--gray-800);">Analytics &amp; Reports</h2>
    <p style="font-size:13px;color:var(--gray-500);margin-top:3px;">
      Platform-wide performance &nbsp;·&nbsp;
      <span style="color:#10B981;font-weight:600;"><i class="fas fa-circle" style="font-size:7px;vertical-align:middle;"></i> Live</span>
      &nbsp;·&nbsp; Updated {{ now()->format('d M Y, H:i') }}
    </p>
  </div>
  <div style="display:flex;gap:10px;">
    <button class="btn btn-outline" id="exportBtn" onclick="exportPDF()">
      <i class="fas fa-file-pdf"></i> Export PDF
    </button>
    <button class="btn btn-primary" id="generateBtn" onclick="generateReport()">
      <i class="fas fa-file-chart-column"></i> Generate Report
    </button>
  </div>
</div>

<!-- ══════════════════════════════════
     PRIMARY KPI CARDS (row 1)
══════════════════════════════════ -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:16px;">
  @foreach([
    [$totalStudents, number_format($totalStudents),'Total Students',     '+14% semester',  'fa-user-graduate','#3B82F6','rgba(59,130,246,.12)'],
    [$completedInternships, number_format($completedInternships),  'Completed',          '+12% this qtr',  'fa-flag-checkered','#10B981','rgba(16,185,129,.12)'],
    [$activeInternships, number_format($activeInternships),  'Active Internships', '+5% monthly',    'fa-briefcase','#00b1aa','rgba(0,177,170,.12)'],
    ['87',   '87%',  'Placement Rate',     '+3% vs last yr', 'fa-chart-line','#F59E0B','rgba(245,158,11,.12)'],
  ] as $idx => [$raw,$display,$lbl,$chg,$icon,$color,$bg])
  <div class="stat-card hover-lift anim-scale kpi-card" data-delay="{{ $idx * 70 }}"
       style="padding:20px;gap:14px;cursor:default;">
    <div style="width:48px;height:48px;border-radius:12px;background:{{ $bg }};display:flex;align-items:center;justify-content:center;color:{{ $color }};font-size:20px;flex-shrink:0;">
      <i class="fas {{ $icon }}"></i>
    </div>
    <div>
      <div class="counter-val" data-target="{{ $raw }}" data-suffix="{{ str_contains($display,'%') ? '%' : '' }}"
           data-prefix="{{ str_contains($display,',') ? '' : '' }}"
           style="font-size:26px;font-weight:800;color:var(--gray-800);">{{ $display }}</div>
      <div style="font-size:12px;color:var(--gray-500);font-weight:500;margin-top:2px;">{{ $lbl }}</div>
      <div style="font-size:11px;font-weight:600;margin-top:4px;color:#10B981;">
        <i class="fas fa-arrow-trend-up" style="font-size:9px;margin-right:3px;"></i>{{ $chg }}
      </div>
    </div>
  </div>
  @endforeach
</div>

<!-- Secondary KPI row -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px;">
  @foreach([
    ['45', '45',  'Pending Approvals',  '↓5 from last wk', 'fa-clock','#EF4444','rgba(239,68,68,.12)', 280],
    ['128','128', 'Reports Filed',      '+23 this month',  'fa-file-alt','#8B5CF6','rgba(139,92,246,.12)', 350],
    ['48', '4.8', 'Satisfaction Score', '▲ 0.2 from Q1',  'fa-star','#F59E0B','rgba(245,158,11,.12)', 420],
    ['96', '96%', 'Doc Compliance',     'On track',        'fa-file-circle-check','#10B981','rgba(16,185,129,.12)', 490],
  ] as [$raw,$display,$lbl,$chg,$icon,$color,$bg,$delay])
  <div class="stat-card hover-lift anim-scale kpi-card" data-delay="{{ $delay }}"
       style="padding:16px;gap:12px;cursor:default;">
    <div style="width:40px;height:40px;border-radius:10px;background:{{ $bg }};display:flex;align-items:center;justify-content:center;color:{{ $color }};font-size:17px;flex-shrink:0;">
      <i class="fas {{ $icon }}"></i>
    </div>
    <div>
      <div class="counter-val" data-target="{{ $raw }}" data-suffix="{{ str_contains($display,'%') ? '%' : (str_contains($display,'.') ? '' : '') }}" data-decimal="{{ str_contains($display,'.') ? '1' : '0' }}"
           style="font-size:21px;font-weight:700;color:var(--gray-800);">{{ $display }}</div>
      <div style="font-size:11px;color:var(--gray-500);font-weight:500;margin-top:1px;">{{ $lbl }}</div>
      <div style="font-size:10px;font-weight:600;margin-top:3px;color:{{ str_starts_with($chg,'↓') ? '#F59E0B' : '#10B981' }};">{{ $chg }}</div>
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
        <div class="card-title">Application Trends</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Monthly submissions, completions &amp; rejections</div>
      </div>
      <div class="card-actions">
        <select class="filter-select-sm" onchange="updateBarChart(this.value)">
          <option value="2025">2025</option>
          <option value="2024">2024</option>
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
        <div class="card-title">Internships by University</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Share of active placements per institution</div>
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
        <div class="card-title">Placement Rate Over Time</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Monthly % · 2025 vs 2024</div>
      </div>
      <div class="card-actions">
        <span style="width:10px;height:10px;border-radius:3px;background:#00b1aa;display:inline-block;"></span>
        <span style="font-size:11px;color:var(--gray-500);margin-right:10px;"> 2025</span>
        <span style="width:10px;height:10px;border-radius:3px;background:#CBD5E1;display:inline-block;"></span>
        <span style="font-size:11px;color:var(--gray-500);"> 2024</span>
      </div>
    </div>
    <div class="card-body">
      <canvas id="lineChart" style="height:220px;max-height:220px;"></canvas>
    </div>
  </div>

  <div class="card hover-lift anim-block" id="section-radar" data-delay="220">
    <div class="card-header">
      <div class="card-title" style="font-size:13px;">University Performance</div>
      <div style="font-size:11px;color:var(--gray-400);">Multi-metric radar</div>
    </div>
    <div class="card-body" style="display:flex;align-items:center;justify-content:center;padding-top:6px;">
      <canvas id="radarChart" style="max-height:220px;"></canvas>
    </div>
  </div>

  <div class="card hover-lift anim-left" id="section-rings" data-delay="300">
    <div class="card-header">
      <div class="card-title" style="font-size:13px;">Status Breakdown</div>
    </div>
    <div class="card-body" style="display:flex;flex-direction:column;gap:18px;padding-top:8px;">
      @php
      $rings = [
        ['Completed', 42, '#3B82F6', 275],
        ['Active',    49, '#00b1aa', 320],
        ['Pending',    7, '#F59E0B',  45],
        ['Rejected',   2, '#EF4444',  12],
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
          <div style="font-size:11px;color:var(--gray-500);">{{ $rnum }} internships</div>
        </div>
        <div style="font-size:18px;font-weight:700;color:{{ $rcolor }};">{{ $rnum }}</div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<!-- ══════════════════════════════════
     ROW 3: Progress bars + Companies
══════════════════════════════════ -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:24px;">

  <div class="card hover-lift anim-block" id="section-progress" data-delay="200">
    <div class="card-header">
      <div>
        <div class="card-title">Compliance by University</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Document &amp; reporting adherence rate</div>
      </div>
    </div>
    <div class="card-body" id="progressBars">
      @foreach([
        ['Epoka University',       95, '#3B82F6'],
        ['University of Tirana',   91, '#10B981'],
        ['Polytechnic University', 87, '#8B5CF6'],
        ['Albanian University',    82, '#F59E0B'],
        ['Beder University',       74, '#EF4444'],
        ['UET Tirana',             88, '#00b1aa'],
      ] as $pi => [$uni,$pct,$pc])
      <div class="prog-row">
        <span class="prog-label">{{ $uni }}</span>
        <div class="prog-bar-wrap">
          <div class="prog-fill" data-target="{{ $pct }}" data-pdelay="{{ 600 + $pi * 100 }}" style="background:{{ $pc }};"></div>
        </div>
        <span class="prog-val" style="color:{{ $pc }};">{{ $pct }}%</span>
      </div>
      @endforeach
    </div>
  </div>

  <div class="card hover-lift anim-left" id="section-companies" data-delay="260">
    <div class="card-header">
      <div>
        <div class="card-title">Top Partner Companies</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">By internship volume &amp; satisfaction score</div>
      </div>
    </div>
    <div class="card-body" style="padding-top:12px;">
      <table style="width:100%;border-collapse:collapse;">
        <thead>
          <tr>
            @foreach(['#','Company','Posts','Hired','Score'] as $th)
            <th style="font-size:10px;color:var(--gray-400);font-weight:700;text-transform:uppercase;letter-spacing:.05em;padding:0 0 10px;text-align:{{ $th==='Score'?'right':($th==='Posts'||$th==='Hired'?'center':'left') }};">{{ $th }}</th>
            @endforeach
          </tr>
        </thead>
                    <tbody>
              @foreach($recentApplications as $app)
              @php
                  $sClass = match($app->status) {
                      'pending' => 'badge-pending',
                      'rejected' => 'badge-rejected',
                      'accepted' => 'badge-active',
                      default => 'badge-pending'
                  };
              @endphp
              <tr>
                <td>{{ $app->user->name ?? 'Unknown' }}</td>
                <td>{{ $app->internship->title ?? 'Unknown' }}</td>
                <td>{{ $app->created_at->format('M d, Y') }}</td>
                <td><span class="badge-status {{ $sClass }}">{{ ucfirst($app->status) }}</span></td>
                <td>
                  <button class="btn btn-sm btn-outline">View</button>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════
     KPI CHIPS
══════════════════════════════════ -->
<div class="anim-block" id="section-chips" data-delay="250" style="display:flex;flex-wrap:wrap;gap:12px;margin-bottom:24px;">
  @foreach([
    ['652','Total Internships','#3B82F6','fa-list-check'],
    ['42%','Completion Rate','#10B981','fa-trophy'],
    ['8.3d','Avg. Approval Time','#F59E0B','fa-hourglass-half'],
    ['4.8/5','Satisfaction','#8B5CF6','fa-star'],
    ['96%','Doc Compliance','#00b1aa','fa-file-circle-check'],
    ['12','Universities','#F59E0B','fa-graduation-cap'],
    ['38','Departments','#3B82F6','fa-sitemap'],
    ['18','Companies','#10B981','fa-building'],
  ] as [$cv,$cl,$cc,$ci])
  <div class="kpi-chip">
    <div style="width:30px;height:30px;border-radius:8px;background:{{ $cc }}1a;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
      <i class="fas {{ $ci }}" style="font-size:12px;color:{{ $cc }};"></i>
    </div>
    <div>
      <div style="font-size:14px;font-weight:700;color:var(--gray-800);line-height:1.1;">{{ $cv }}</div>
      <div style="font-size:10px;color:var(--gray-500);font-weight:500;margin-top:1px;">{{ $cl }}</div>
    </div>
  </div>
  @endforeach
</div>

<!-- ══════════════════════════════════
     REPORTS TABLE
══════════════════════════════════ -->
<div class="card anim-block" id="section-table" data-delay="300">
  <div class="card-header">
    <div>
      <div class="card-title">Recent Reports</div>
      <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Generated and scheduled platform reports</div>
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
          @foreach(['#','Report Name','Generated By','Date','Type','Size','Actions'] as $th)
          <th style="padding:12px 16px;font-size:11px;font-weight:700;color:var(--gray-500);text-transform:uppercase;letter-spacing:.06em;background:var(--gray-50);border-bottom:1px solid var(--border);{{ $th==='Actions'?'text-align:center;':'' }}">{{ $th }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody id="reportsTableBody">
        @foreach([
          ['001','Monthly Summary – May 2025',    '#EF4444','Admin User','AU','May 31, 2025','type-monthly',   'Monthly',   '2.4 MB'],
          ['002','Q1 Internship Report 2025',     '#3B82F6','Admin User','AU','Apr 05, 2025','type-quarterly', 'Quarterly', '5.1 MB'],
          ['003','University Compliance Report',  '#10B981','Sys Admin', 'SA','Mar 20, 2025','type-compliance','Compliance','3.8 MB'],
          ['004','Student Performance Report',    '#8B5CF6','Admin User','AU','Feb 28, 2025','type-performance','Performance','4.2 MB'],
          ['005','Company Partnership Report',    '#F59E0B','Sys Admin', 'SA','Jan 15, 2025','type-partnership','Partnership','1.9 MB'],
          ['006','Annual Platform Summary 2024',  '#00b1aa','Admin User','AU','Jan 01, 2025','type-monthly',   'Annual',    '9.7 MB'],
        ] as [$rn,$rname,$rc,$rauthor,$ri,$rdate,$rbadge,$rtype,$rsize])
        <tr>
          <td style="padding:14px 16px;font-size:12px;color:var(--gray-400);font-weight:600;">{{ $rn }}</td>
          <td style="padding:14px 16px;">
            <div style="display:flex;align-items:center;gap:10px;">
              <div style="width:36px;height:36px;border-radius:9px;background:{{ $rc }}1a;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="fas fa-file-pdf" style="color:{{ $rc }};font-size:15px;"></i>
              </div>
              <div>
                <div style="font-size:13px;font-weight:600;color:var(--gray-800);">{{ $rname }}</div>
                <div style="font-size:11px;color:var(--gray-500);">{{ $rtype }} · {{ $rsize }}</div>
              </div>
            </div>
          </td>
          <td style="padding:14px 16px;">
            <div style="display:flex;align-items:center;gap:8px;">
              <div style="width:28px;height:28px;border-radius:50%;background:var(--primary);color:white;font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;">{{ $ri }}</div>
              <span style="font-size:12px;color:var(--gray-700);">{{ $rauthor }}</span>
            </div>
          </td>
          <td style="padding:14px 16px;font-size:12px;color:var(--gray-600);">{{ $rdate }}</td>
          <td style="padding:14px 16px;"><span class="type-badge {{ $rbadge }}">{{ $rtype }}</span></td>
          <td style="padding:14px 16px;font-size:12px;color:var(--gray-500);">{{ $rsize }}</td>
          <td style="padding:14px 16px;text-align:center;">
            <button class="btn btn-sm btn-outline" onclick="downloadReport('{{ $rname }}')" style="margin-right:4px;" title="Download">
              <i class="fas fa-download"></i>
            </button>
            <button class="btn btn-sm btn-outline" onclick="previewReport('{{ $rname }}')" title="Preview">
              <i class="fas fa-eye"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- TOAST -->
<div id="toast" style="position:fixed;bottom:24px;right:24px;z-index:99999;transform:translateY(80px);opacity:0;transition:all 0.35s cubic-bezier(.4,0,.2,1);pointer-events:none;">
  <div style="display:flex;align-items:center;gap:12px;padding:14px 20px;border-radius:12px;background:white;box-shadow:0 12px 32px rgba(0,0,0,0.14);border:1px solid var(--border);min-width:260px;">
    <div id="toast-icon" style="font-size:16px;"></div>
    <span id="toast-msg" style="font-size:13px;font-weight:600;color:var(--gray-800);"></span>
  </div>
</div>


<!-- ══════════════════════════════════
     ANIMATION ENGINE + CHARTS
══════════════════════════════════ -->
<script>
/* ═══════════════════════════════════════════
   STEP 1: Hide everything IMMEDIATELY
   (before paint, so user never sees un-animated state)
══════════════════════════════════════════════ */
document.querySelectorAll('.anim-block,.anim-scale,.anim-left,.kpi-card').forEach(el => {
  el.style.opacity = '0';
  if(el.classList.contains('anim-scale')) el.style.transform = 'scale(0.82)';
  else if(el.classList.contains('anim-left')) el.style.transform = 'translateX(24px)';
  else el.style.transform = 'translateY(28px)';
});

/* ═══════════════════════════════════════════
   STEP 2: After first paint, reveal with stagger
══════════════════════════════════════════════ */
window.addEventListener('load', runAnimations);
// Also handle Livewire SPA navigation if used
document.addEventListener('livewire:navigated', runAnimations);

let animationsRan = false;

function runAnimations() {
  if(animationsRan) return;
  animationsRan = true;

  // Use double RAF to ensure browser has painted before starting
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {

      /* ── KPI cards stagger ── */
      document.querySelectorAll('.kpi-card').forEach(el => {
        const delay = parseInt(el.dataset.delay || 0);
        setTimeout(() => {
          el.style.transition = 'opacity 0.5s cubic-bezier(.4,0,.2,1), transform 0.55s cubic-bezier(.34,1.26,.64,1)';
          el.style.opacity    = '1';
          el.style.transform  = 'scale(1)';
        }, delay);
      });

      /* ── Section blocks (fade-up) ── */
      document.querySelectorAll('.anim-block').forEach(el => {
        const delay = parseInt(el.dataset.delay || 100);
        setTimeout(() => {
          el.style.transition = 'opacity 0.6s cubic-bezier(.4,0,.2,1), transform 0.6s cubic-bezier(.34,1.26,.64,1)';
          el.style.opacity    = '1';
          el.style.transform  = 'translateY(0)';
        }, delay);
      });

      /* ── Left-slide blocks ── */
      document.querySelectorAll('.anim-left').forEach(el => {
        const delay = parseInt(el.dataset.delay || 200);
        setTimeout(() => {
          el.style.transition = 'opacity 0.55s ease, transform 0.55s cubic-bezier(.4,0,.2,1)';
          el.style.opacity    = '1';
          el.style.transform  = 'translateX(0)';
        }, delay);
      });

      /* ── Counter animations ── */
      document.querySelectorAll('.counter-val[data-target]').forEach(el => {
        const raw     = parseFloat(el.dataset.target);
        const suffix  = el.dataset.suffix  || '';
        const decimals= parseInt(el.dataset.decimal || 0);
        const duration= 1400;
        const start   = performance.now();

        const tick = (now) => {
          const progress = Math.min((now - start) / duration, 1);
          // easeOutQuart
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
        // start counter when card becomes visible
        const delay = parseInt(el.closest('[data-delay]')?.dataset.delay || 0);
        setTimeout(() => requestAnimationFrame(tick), delay + 200);
      });

      /* ── Progress bars ── */
      document.querySelectorAll('.prog-fill').forEach(el => {
        const target = el.dataset.target;
        const delay  = parseInt(el.dataset.pdelay || 600);
        setTimeout(() => { el.style.width = target + '%'; }, delay);
      });

      /* ── SVG Rings ── */
      document.querySelectorAll('.ring-circle').forEach(el => {
        const filled = el.dataset.filled;
        const total  = el.dataset.total;
        const delay  = parseInt(el.dataset.delay || 400);
        setTimeout(() => {
          el.style.strokeDasharray = `${filled} ${total}`;
        }, delay);
      });

      /* ── Init Charts ── */
      setTimeout(initCharts, 120);

    }); // end inner RAF
  }); // end outer RAF
}

/* ═══════════════════════════════════════════
   CHART.JS SETUP
══════════════════════════════════════════════ */
Chart.defaults.font.family = "'Inter', sans-serif";
Chart.defaults.color       = '#94a3b8';

const barData2025 = {
  submitted: [68, 85, 102, 115, 130, 98],
  completed: [38, 45,  55,  62,  58, 17],
  rejected:  [ 8, 11,   9,   6,   7,  4],
};
const barData2024 = {
  submitted: [45, 62, 78,  91, 110, 98],
  completed: [22, 33, 44,  55,  68, 52],
  rejected:  [12,  9, 14,   8,  10,  6],
};

let barChartInstance = null;

function initCharts() {

  /* ── 1. BAR ── */
  const barCtx = document.getElementById('barChart').getContext('2d');
  barChartInstance = new Chart(barCtx, {
    type: 'bar',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun'],
      datasets: [
        { label:'Submitted', data: barData2025.submitted, backgroundColor:'#00b1aa', borderRadius:5, barPercentage:.6 },
        { label:'Completed', data: barData2025.completed, backgroundColor:'#3B82F6', borderRadius:5, barPercentage:.6 },
        { label:'Rejected',  data: barData2025.rejected,  backgroundColor:'#EF4444', borderRadius:5, barPercentage:.6 },
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

  /* ── 2. DOUGHNUT ── */
  const dCtx = document.getElementById('doughnutChart').getContext('2d');
  new Chart(dCtx, {
    type: 'doughnut',
    data: {
      labels:['Univ. of Tirana','Epoka Univ.','Polytechnic','Albanian Univ.','Beder','UET Tirana'],
      datasets:[{
        data:[91,78,62,52,42,35],
        backgroundColor:['#00b1aa','#10B981','#6366F1','#F59E0B','#EF4444','#3B82F6'],
        borderWidth:3, borderColor:'#fff', hoverOffset:10,
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

  /* ── 3. LINE ── */
  const lCtx = document.getElementById('lineChart').getContext('2d');
  new Chart(lCtx, {
    type:'line',
    data:{
      labels:['Jan','Feb','Mar','Apr','May','Jun'],
      datasets:[
        { label:'2025', data:[79,82,84,86,87,89], borderColor:'#00b1aa', backgroundColor:'rgba(0,177,170,0.08)',
          tension:0.45, fill:true, pointRadius:5, pointBackgroundColor:'#00b1aa', pointHoverRadius:8, borderWidth:2.5 },
        { label:'2024', data:[71,73,75,77,79,81], borderColor:'#CBD5E1', backgroundColor:'rgba(203,213,225,0.05)',
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
        y:{ beginAtZero:false, min:65, max:95, grid:{ color:'rgba(0,0,0,0.04)' }, ticks:{ font:{size:11}, callback:v=>v+'%' }},
        x:{ grid:{ display:false }, ticks:{ font:{size:11} }}
      }
    }
  });

  /* ── 4. RADAR ── */
  const rCtx = document.getElementById('radarChart').getContext('2d');
  new Chart(rCtx, {
    type:'radar',
    data:{
      labels:['Compliance','Completion','Satisfaction','Engagement','Reporting'],
      datasets:[
        { label:'Epoka',     data:[95,85,92,88,90], borderColor:'#3B82F6', backgroundColor:'rgba(59,130,246,0.12)', pointBackgroundColor:'#3B82F6', borderWidth:2 },
        { label:'U. Tirana', data:[91,80,88,84,93], borderColor:'#10B981', backgroundColor:'rgba(16,185,129,0.10)', pointBackgroundColor:'#10B981', borderWidth:2 },
      ]
    },
    options:{
      responsive:true, maintainAspectRatio:false,
      animation:{ duration:1100, easing:'easeOutQuart' },
      plugins:{ legend:{ position:'bottom', labels:{ boxWidth:10, usePointStyle:true, font:{size:10}, padding:10 }}},
      scales:{ r:{ ticks:{ display:false }, grid:{ color:'rgba(0,0,0,0.07)' }, pointLabels:{ font:{size:10} }, min:50, max:100 }}
    }
  });
}

/* ── Update bar chart on year change ── */
function updateBarChart(year) {
  const d = year === '2024' ? barData2024 : barData2025;
  barChartInstance.data.datasets[0].data = d.submitted;
  barChartInstance.data.datasets[1].data = d.completed;
  barChartInstance.data.datasets[2].data = d.rejected;
  barChartInstance.update();
}

/* ═══════════════════════════════════════════
   BUTTON ACTIONS
══════════════════════════════════════════════ */
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
  btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Preparing...'; btn.disabled=true;
  
  // Hide UI elements not meant for printing
  const originalTitle = document.title;
  document.title = 'InternLink_Reports_Export';
  
  setTimeout(() => {
    window.print();
    btn.innerHTML='<i class="fas fa-file-pdf"></i> Export PDF'; 
    btn.disabled=false;
    document.title = originalTitle;
    showToast('PDF exported successfully!','success');
  }, 800);
}

function generateReport() {
  const btn = document.getElementById('generateBtn');
  btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Generating...'; btn.disabled=true;
  setTimeout(()=>{
    btn.innerHTML='<i class="fas fa-circle-check"></i> Ready!'; btn.style.background='#10B981';
    const tbody=document.getElementById('reportsTableBody');
    const n=tbody.rows.length+1; const num=String(n).padStart(3,'0');
    const date=new Date().toLocaleDateString('en-US',{month:'short',day:'numeric',year:'numeric'});
    const row=document.createElement('tr');
    row.style.cssText='opacity:0;transform:translateY(-10px);transition:all 0.5s ease;border-bottom:1px solid var(--border);';
    row.innerHTML=`
      <td style="padding:14px 16px;font-size:12px;color:var(--gray-400);font-weight:600;">${num}</td>
      <td style="padding:14px 16px;">
        <div style="display:flex;align-items:center;gap:10px;">
          <div style="width:36px;height:36px;border-radius:9px;background:rgba(99,102,241,0.12);display:flex;align-items:center;justify-content:center;">
            <i class="fas fa-file-pdf" style="color:#6366F1;font-size:15px;"></i>
          </div>
          <div>
            <div style="font-size:13px;font-weight:600;color:var(--gray-800);">Custom Report – ${num}</div>
            <div style="font-size:11px;color:var(--gray-500);">On-demand · 1.2 MB</div>
          </div>
        </div>
      </td>
      <td style="padding:14px 16px;"><div style="display:flex;align-items:center;gap:8px;"><div style="width:28px;height:28px;border-radius:50%;background:var(--primary);color:white;font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;">AU</div><span style="font-size:12px;color:var(--gray-700);">Admin User</span></div></td>
      <td style="padding:14px 16px;font-size:12px;color:var(--gray-600);">${date}</td>
      <td style="padding:14px 16px;"><span class="type-badge" style="background:#F3E8FF;color:#6B21A8;">Custom</span></td>
      <td style="padding:14px 16px;font-size:12px;color:var(--gray-500);">1.2 MB</td>
      <td style="padding:14px 16px;text-align:center;">
        <button class="btn btn-sm btn-outline" style="margin-right:4px;"><i class="fas fa-download"></i></button>
        <button class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></button>
      </td>`;
    tbody.insertBefore(row,tbody.firstChild);
    requestAnimationFrame(()=>requestAnimationFrame(()=>{ row.style.opacity='1'; row.style.transform='translateY(0)'; }));
    showToast('Report generated successfully!','success');
    setTimeout(()=>{ btn.innerHTML='<i class="fas fa-file-chart-column"></i> Generate Report'; btn.style.background=''; btn.disabled=false; },2200);
  },1800);
}

function refreshReports(btn) {
  const icon=btn.querySelector('i'); icon.classList.add('fa-spin'); btn.disabled=true;
  setTimeout(()=>{
    document.querySelectorAll('.prog-fill').forEach(el=>{ el.style.width='0'; });
    setTimeout(()=>{ document.querySelectorAll('.prog-fill').forEach(el=>{ el.style.width=el.dataset.target+'%'; }); },150);
    const base=barData2025; ['submitted','completed','rejected'].forEach((k,di)=>{
      barChartInstance.data.datasets[di].data=base[k].map(v=>v+Math.floor(Math.random()*12-6));
    });
    barChartInstance.update();
    icon.classList.remove('fa-spin'); btn.disabled=false;
    showToast('Data refreshed!','info');
  },1100);
}

function downloadReport(name) { showToast(`Downloading "${name}"...`,'info'); }
function previewReport(name)   { showToast(`Opening preview for "${name}"`,'info'); }
</script>

</x-layouts::admin>
