<x-layouts::student title="Student Dashboard">
@php $slug = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp

<style>
  /* ── Welcome Banner ── */
  .welcome-banner {
    background: var(--primary) !important;
    border-radius: 20px; padding: 32px; color: #fff;
    margin-bottom: 28px; display: flex; align-items: center; justify-content: space-between;
    position: relative; overflow: hidden;
    box-shadow: 0 10px 25px -5px var(--primary-bg) !important;
  }
  .welcome-banner::before {
    content: ''; position: absolute; inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='0.05'%3E%3Cpath d='M30 0l30 30-30 30L0 30z'/%3E%3C/g%3E%3C/svg%3E");
    background-size: 50px 50px;
  }
  .welcome-banner-content { position: relative; z-index: 2; }
  .welcome-banner h2 { font-size: 1.65rem; font-weight: 800; margin: 0 0 8px; color: #fff !important; letter-spacing: -0.02em; }
  .welcome-banner p  { margin: 0; opacity: .9; font-size: .95rem; color: #fff !important; font-weight: 500; }
  .welcome-banner-illustration { font-size: 4.5rem; opacity: .15; color: #fff !important; position: relative; z-index: 1; transform: rotate(15deg); transition: transform 0.3s; }
  .welcome-banner:hover .welcome-banner-illustration { transform: rotate(5deg) scale(1.05); }
  .welcome-banner-actions { display: flex; gap: 12px; margin-top: 18px; flex-wrap: wrap; }
  .welcome-banner-btn {
    display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px;
    background: rgba(255,255,255,0.18); backdrop-filter: blur(6px);
    border: 1px solid rgba(255,255,255,0.3); border-radius: 10px;
    color: white; font-size: 13px; font-weight: 600; transition: all 0.2s cubic-bezier(.4,0,.2,1);
    cursor: pointer; text-decoration: none;
  }
  .welcome-banner-btn:hover {
    background: rgba(255,255,255,0.28); border-color: rgba(255,255,255,0.45); transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  /* ── Stats ── */
  .stats-row {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 20px; margin-bottom: 28px;
  }
  .stat-card {
    background: var(--white); border-radius: 16px; padding: 22px 20px;
    box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 16px;
    border: 1px solid var(--border); transition: all 0.3s cubic-bezier(.4,0,.2,1);
    cursor: default; position: relative; overflow: hidden;
  }
  .stat-card::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%); opacity: 0; transition: opacity 0.3s;
  }
  .stat-card:hover { box-shadow: var(--shadow); transform: translateY(-4px); border-color: var(--primary); }
  .stat-card:hover::after { opacity: 1; }
  .stat-icon {
    width: 50px; height: 50px; border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem; flex-shrink: 0; transition: transform 0.3s;
  }
  .stat-card:hover .stat-icon { transform: scale(1.1); }
  .stat-icon.blue   { background: var(--primary-bg); color: var(--primary); }
  .stat-icon.green  { background: var(--green-bg); color: var(--green); }
  .stat-icon.warning { background: var(--warning-bg); color: var(--warning); }
  .stat-icon.purple { background: rgba(139,92,246,.12); color: #8B5CF6; }
  .stat-value { font-size: 1.85rem; font-weight: 800; line-height: 1.1; color: var(--gray-900); }
  .stat-label { font-size: .85rem; color: var(--text-muted); margin-top: 5px; font-weight: 600; }

  /* ── Layout Grid ── */
  .dashboard-grid { display: grid; grid-template-columns: 1fr 340px; gap: 24px; }
  .card {
    background: var(--white); border-radius: 16px; padding: 24px;
    box-shadow: var(--shadow-sm); border: 1px solid var(--border); transition: all 0.3s cubic-bezier(.4,0,.2,1);
  }
  .card:hover { box-shadow: var(--shadow); }
  .card-header {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 20px; padding-bottom: 14px; border-bottom: 1px solid var(--gray-100);
  }
  .card-title { font-size: 1.05rem; font-weight: 700; color: var(--gray-900); }
  .card-subtitle { font-size: .78rem; color: var(--text-muted); margin-top: 3px; }
  .card-link { color: var(--primary) !important; font-size: .82rem; font-weight: 600; text-decoration: none; transition: transform 0.2s; display: inline-block; }
  .card-link:hover { transform: translateX(3px); }

  /* ── Application items ── */
  .application-item {
    padding: 18px; border-radius: 14px; border: 1px solid var(--border);
    background: var(--white); margin-bottom: 16px; transition: all 0.2s;
  }
  .application-item:hover { border-color: var(--primary-light); background: var(--gray-50); }
  .application-item:last-child { margin-bottom: 0; }
  .application-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; margin-bottom: 12px; }
  .application-info { display: flex; gap: 14px; align-items: center; min-width: 0; }
  .application-company-logo {
    width: 42px; height: 42px; border-radius: 10px; color: #fff;
    display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: .95rem; flex-shrink: 0;
  }
  .application-title { font-weight: 700; font-size: .92rem; color: var(--gray-900); }
  .application-meta { font-size: .78rem; color: var(--text-muted); margin-top: 3px; display: flex; align-items: center; gap: 6px; }
  .status-badge {
    display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: .72rem; font-weight: 700;
  }
  .status-badge.pending { background: var(--warning-bg); color: var(--warning); }
  .status-badge.interview { background: var(--green-bg); color: var(--green); }
  .status-badge.accepted { background: var(--green-bg); color: var(--green); }
  .status-badge.rejected { background: var(--danger-bg); color: var(--danger); }

  .progress-bar-wrapper { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; }
  .progress-bar { height: 8px; background: var(--gray-100); border-radius: 20px; overflow: hidden; flex: 1; }
  .progress-fill { height: 100%; border-radius: 20px; transition: width 1.2s cubic-bezier(.4,0,.2,1); }
  .progress-fill.green { background: var(--green); }
  .progress-fill.warning { background: var(--warning); }
  
  .application-actions { display: flex; gap: 8px; justify-content: flex-end; }
  .btn-sm {
    padding: 6px 14px; border-radius: 8px; font-size: .78rem; font-weight: 600; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 6px;
  }
  .btn-outline { border: 1.5px solid var(--border); background: transparent; color: var(--gray-700); }
  .btn-outline:hover { background: var(--gray-100); border-color: var(--gray-300); }
  .btn-primary { background: var(--primary); color: white; border: none; }
  .btn-primary:hover { opacity: 0.95; transform: translateY(-1px); }

  /* ── Recommended Row ── */
  .recommended-row {
    display: flex; align-items: center; gap: 14px; padding: 14px 10px;
    border-bottom: 1px solid var(--gray-100); transition: all 0.25s cubic-bezier(.4,0,.2,1);
    cursor: pointer; border-radius: 12px; margin: 0 -8px;
  }
  .recommended-row:hover { background: var(--gray-50); transform: translateX(4px); padding-left: 14px; }
  .recommended-row:last-child { border-bottom: none; }

  /* ── Sidebar widgets ── */
  .journey-item { margin-bottom: 14px; }
  .journey-item:last-child { margin-bottom: 0; }
  .journey-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px; }

  .document-item {
    display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 10px;
    transition: all .2s; border: 1px solid transparent;
  }
  .document-item:hover { background: var(--gray-50); border-color: var(--gray-100); }
  .document-icon {
    width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;
  }
  .document-info { flex: 1; min-width: 0; }
  .document-name { font-size: 13px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .document-size { font-size: 11px; color: var(--text-muted); margin-top: 1px; }
  .icon-btn {
    width: 28px; height: 28px; border-radius: 6px; border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; background: transparent; color: var(--gray-500);
  }
  .icon-btn:hover { background: var(--primary-bg); color: var(--primary); border-color: var(--primary-light); }

  .notification-item {
    display: flex; gap: 12px; padding: 10px; border-radius: 10px; transition: all .2s;
  }
  .notification-item.unread { background: var(--primary-bg); }
  .notification-icon {
    width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; flex-shrink: 0; margin-top: 2px;
  }
  .notification-icon.green  { background: var(--green-bg); color: var(--green); }
  .notification-icon.blue   { background: var(--primary-bg); color: var(--primary); }
  .notification-icon.warning { background: var(--warning-bg); color: var(--warning); }
  .notification-text { font-size: 12.5px; color: var(--gray-800); line-height: 1.4; }
  .notification-time { font-size: 11px; color: var(--text-muted); margin-top: 4px; font-weight: 500; }

  /* ── Interactive Checklist Widget ── */
  .checklist-item {
    display: flex; align-items: flex-start; gap: 10px; padding: 8px 6px; cursor: pointer;
  }
  .checklist-checkbox {
    width: 17px; height: 17px; border-radius: 4px; border: 1.5px solid var(--border);
    display: flex; align-items: center; justify-content: center; margin-top: 2px;
    transition: all 0.2s; color: transparent; flex-shrink: 0; font-size: 10px;
  }
  .checklist-item.checked .checklist-checkbox {
    background: var(--primary); border-color: var(--primary); color: #fff;
  }
  .checklist-item.checked .checklist-text {
    color: var(--gray-400); text-decoration: line-through;
  }
  .checklist-text { font-size: 13px; color: var(--gray-700); font-weight: 500; transition: all 0.2s; line-height: 1.35; }

  /* ── Skills Analysis Widget ── */
  .skills-match-item {
    margin-bottom: 12px;
  }
  .skills-match-item:last-child { margin-bottom: 0; }
  .skills-match-info {
    display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px; font-size: 12px; font-weight: 600;
  }

  /* Responsive styling */
  @media (max-width: 1150px) {
    .stats-row { grid-template-columns: repeat(2, 1fr); }
    .dashboard-grid { grid-template-columns: 1fr; }
  }
  @media (max-width: 640px) {
    .stats-row { grid-template-columns: 1fr; }
    .welcome-banner { padding: 24px 20px; }
    .welcome-banner h2 { font-size: 1.35rem; }
    .welcome-banner-illustration { display: none; }
  }
</style>

<!-- Welcome Banner -->
{{--
<div class="welcome-banner anim-up" data-delay="0">
  <div class="welcome-banner-content">
    <h2>
      @php
        $hour = now()->hour;
        $greeting = $hour < 12 ? 'Good Morning' : ($hour < 17 ? 'Good Afternoon' : 'Good Evening');
      @endphp
      {{ $greeting }}, {{ auth()->user()->name }}
    </h2>
    <p>Here's your internship journey overview · {{ now()->format('l, d M Y') }}</p>
    <div class="welcome-banner-actions">
      <a href="{{ route('student.listings', ['company'=>$slug]) }}" class="welcome-banner-btn">
        <i class="fas fa-search"></i> Browse Internships
      </a>
      <a href="{{ route('student.applications', ['company'=>$slug]) }}" class="welcome-banner-btn" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2);">
        <i class="fas fa-file-signature"></i> My Applications
      </a>
    </div>
  </div>
  <div class="welcome-banner-illustration"><i class="fas fa-graduation-cap"></i></div>
</div>
--}}

<!-- Stats -->
<div class="stats-row">
  @foreach([
    ['2',  'Active Applications',  'fa-file-circle-check','green',  'Applied recently',        '0'],
    ['1',  'Under Review',         'fa-clock',            'warning','Awaiting decision',        '80'],
    ['0',  'Interviews Scheduled', 'fa-calendar-check',   'blue',   'Check your schedule',     '160'],
    ['3',  'Documents Uploaded',   'fa-folder-open',      'purple', 'All verified',            '240'],
  ] as [$val,$label,$icon,$type,$sub,$delay])
  <div class="stat-card hover-lift anim-scale" data-delay="{{ $delay }}">
    <div class="stat-icon {{ $type }}"><i class="fas {{ $icon }}"></i></div>
    <div class="stat-info">
      <div class="stat-value">{{ $val }}</div>
      <div class="stat-label">{{ $label }}</div>
      <div style="font-size:11px;color:var(--gray-400);margin-top:4px;font-weight:500;">{{ $sub }}</div>
    </div>
  </div>
  @endforeach
</div>

<!-- Dashboard Content Grid -->
<div class="dashboard-grid">

  <!-- LEFT COLUMN -->
  <div>
    <!-- Applications -->
    <div class="card anim-up" data-delay="100">
      <div class="card-header">
        <div>
          <div class="card-title">Your Applications</div>
          <div class="card-subtitle">Track your progress across all submissions</div>
        </div>
        <a href="{{ route('student.applications', ['company'=>$slug]) }}" class="card-link">View All →</a>
      </div>
      <div class="card-body" style="padding-top:4px;">

        @forelse($applications as $app)
          @php
              $internship = $app->internship;
              $company = $internship?->company;
              $title = $internship?->title ?? 'Position';
              $companyName = $company?->company_name ?? 'Company';
              $init = substr($companyName, 0, 2);
              $location = trim(implode(', ', array_filter([$internship?->city, $internship?->country]))) ?: ($internship?->location ?? 'Remote');
              
              $statusRaw = strtolower($app->status);
              $status = ucfirst($app->status);
              $statusClass = match($statusRaw) {
                  'interview scheduled', 'interview' => 'interview',
                  'accepted' => 'accepted',
                  'rejected' => 'rejected',
                  default => 'pending',
              };
              $fillClass = match($statusRaw) {
                  'interview scheduled', 'interview', 'accepted' => 'green',
                  'rejected' => 'gray',
                  default => 'warning',
              };
              $pct = match($statusRaw) {
                  'accepted' => 100,
                  'interview scheduled', 'interview' => 75,
                  'rejected' => 100,
                  default => 40,
              };
              $note = match($statusRaw) {
                  'accepted' => 'Offer Accepted',
                  'interview scheduled', 'interview' => 'Interview Scheduled',
                  'rejected' => 'Application Rejected',
                  default => 'Application under review',
              };
          @endphp
        <div class="application-item">
          <div class="application-header">
            <div class="application-info">
              <div class="application-company-logo"
                   style="background:{{ $statusClass==='interview' ? 'var(--green)' : 'var(--primary)' }};">
                {{ strtoupper($init) }}
              </div>
              <div>
                <div class="application-title">{{ $title }}</div>
                <div class="application-meta">
                  <i class="fas fa-building" style="font-size:10px;"></i> {{ $companyName }}
                  &nbsp;·&nbsp;
                  <i class="fas fa-location-dot" style="font-size:10px;"></i> {{ $location }}
                </div>
              </div>
            </div>
            <span class="status-badge {{ $statusClass }}">{{ $status }}</span>
          </div>
          <div style="font-size:11px;color:var(--gray-500);margin-bottom:12px;display:flex;align-items:center;gap:6px;font-weight:500;">
            <i class="fas fa-circle-info" style="font-size:10px;color:var(--primary);"></i> {{ $note }}
          </div>
          <div class="progress-bar-wrapper">
            <div class="progress-bar">
              <div class="progress-fill {{ $fillClass }}"
                   style="width:{{ $pct }}%;transition:width 1.2s cubic-bezier(.4,0,.2,1);"></div>
            </div>
            <span class="progress-label" style="color:var(--gray-700);font-size:12px;font-weight:700;">{{ $pct }}%</span>
          </div>
          <div class="application-actions">
            <button class="btn btn-sm btn-outline" onclick="viewApplication('{{ addslashes($companyName) }}','{{ addslashes($title) }}')">
              <i class="fas fa-eye"></i> View
            </button>
            @if($statusClass === 'interview')
            <button class="btn btn-sm btn-primary" onclick="confirmInterview('{{ addslashes($companyName) }}')">  
              <i class="fas fa-calendar-check"></i> Confirm
            </button>
            @else
            <button class="btn btn-sm" style="background:var(--danger-bg);color:var(--danger);border:none;border-radius:8px;padding:6px 14px;font-size:12px;font-weight:600;cursor:pointer;" onclick="withdrawApp('{{ addslashes($companyName) }}')">
              <i class="fas fa-rotate-left"></i> Withdraw
            </button>
            @endif
          </div>
        </div>
        @empty
        <div style="padding: 30px; text-align: center; color: var(--gray-500);">
            <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 10px; color: var(--gray-300);"></i>
            <p style="margin: 0;">You haven't applied to any internships yet.</p>
        </div>
        @endforelse

      </div>
    </div>

    <!-- Skills Match Analysis (Premium Detail) -->
    <div class="card anim-up" data-delay="150" style="margin-top:24px;">
      <div class="card-header">
        <div>
          <div class="card-title">Profile Skills Match</div>
          <div class="card-subtitle">How well your skills align with open positions</div>
        </div>
      </div>
      <div class="card-body" style="padding-top:4px;">
        <div class="skills-match-item">
          <div class="skills-match-info">
            <span style="color:var(--gray-800);">Python / Backend Development</span>
            <span style="color:var(--primary);">95% Match</span>
          </div>
          <div class="progress-bar"><div class="progress-fill" style="width:95%;background:var(--primary);"></div></div>
        </div>
        <div class="skills-match-item" style="margin-top: 14px;">
          <div class="skills-match-info">
            <span style="color:var(--gray-800);">JavaScript / React Frontend</span>
            <span style="color:var(--primary);">90% Match</span>
          </div>
          <div class="progress-bar"><div class="progress-fill" style="width:90%;background:var(--primary);"></div></div>
        </div>
        <div class="skills-match-item" style="margin-top: 14px;">
          <div class="skills-match-info">
            <span style="color:var(--gray-800);">SQL / Databases</span>
            <span style="color:var(--primary);">85% Match</span>
          </div>
          <div class="progress-bar"><div class="progress-fill" style="width:85%;background:var(--primary);"></div></div>
        </div>
        <div class="skills-match-item" style="margin-top: 14px;">
          <div class="skills-match-info">
            <span style="color:var(--gray-800);">UI/UX Design Concepts</span>
            <span style="color:var(--warning);">70% Match</span>
          </div>
          <div class="progress-bar"><div class="progress-fill" style="width:70%;background:var(--warning);"></div></div>
        </div>
      </div>
    </div>

    <!-- Recommended Listings -->
    <div class="card anim-up" data-delay="200" style="margin-top:24px;">
      <div class="card-header">
        <div>
          <div class="card-title">Recommended for You</div>
          <div class="card-subtitle">Based on your profile, interests and university</div>
        </div>
        <a href="{{ route('student.listings', ['company'=>$slug]) }}" class="card-link">Explore All →</a>
      </div>
      <div class="card-body" style="padding-top:4px;">
        @forelse($recommendedInternships as $intern)
          @php
              $companyName = $intern->company?->company_name ?? 'Company';
              $init = strtoupper(substr($companyName, 0, 2)) ?: 'C';
              $colors = ['#00b1aa', '#8B5CF6', '#3B82F6', '#F59E0B', '#10B981'];
              $color = $colors[$loop->index % 5];
              $title = $intern->title ?? 'Position';
              $location = trim(implode(', ', array_filter([$intern->city, $intern->country]))) ?: ($intern->location ?? 'Remote');
              $duration = $intern->duration ?? '3 months';
              $meta = $location . ' · ' . $duration;
              $dept = $intern->field ?? 'General';
              $deadline = $intern->deadline ? \Carbon\Carbon::parse($intern->deadline)->format('M d, Y') : 'Open';
              $count = $intern->applications->count();
          @endphp
        <div class="recommended-row" onclick="applyToListing('{{ addslashes($title) }}','{{ addslashes($companyName) }}')" title="Click to apply">
          <div style="width:40px;height:40px;border-radius:10px;background:{{ $color }};color:white;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;">{{ $init }}</div>
          <div style="flex:1;min-width:0;">
            <div style="font-size:13.5px;font-weight:700;color:var(--gray-900);">{{ $title }}</div>
            <div style="font-size:11.5px;color:var(--gray-500);margin-top:3px;">
              {{ $companyName }} &nbsp;·&nbsp; {{ $meta }}
            </div>
          </div>
          <div style="text-align:right;flex-shrink:0;padding-left:10px;">
            <span style="font-size:10px;font-weight:700;padding:3px 8px;border-radius:20px;background:{{ $color }}15;color:{{ $color }};">{{ $dept }}</span>
            <div style="font-size:10px;color:var(--gray-400);margin-top:6px;font-weight:500;"><i class="fas fa-calendar" style="font-size:9px;margin-right:2px;"></i> {{ $deadline }}</div>
            <div style="font-size:10px;color:var(--gray-400);margin-top:3px;font-weight:500;"><i class="fas fa-users" style="font-size:9px;margin-right:2px;"></i> {{ $count }} applicants</div>
          </div>
        </div>
        @empty
        <div style="padding: 20px; text-align: center; color: var(--gray-500); font-size: 13px;">
            No recommended internships found at the moment.
        </div>
        @endforelse
      </div>
    </div>
  </div>

  <!-- RIGHT SIDEBAR -->
  <div style="display:flex;flex-direction:column;gap:24px;">

    <!-- Journey Progress -->
    <div class="card anim-left" data-delay="150">
      <div class="card-header">
        <div class="card-title" style="font-size:14px;">Journey Progress</div>
        <span style="font-size:11px;font-weight:700;color:var(--primary);background:var(--primary-bg);padding:3px 10px;border-radius:20px;">On Track</span>
      </div>
      <div class="card-body" style="padding-top:4px;">
        @foreach([
          ['Profile Complete',  90, 'var(--primary)'],
          ['Documents Verified',75, 'var(--primary)'],
          ['Applications Sent', 40, 'var(--warning)'],
          ['Interviews Done',    0, 'var(--gray-300)'],
        ] as [$step,$pct,$color])
        <div class="journey-item">
          <div class="journey-header">
            <span style="font-size:12px;font-weight:600;color:var(--gray-700);">{{ $step }}</span>
            <span style="font-size:11px;font-weight:700;color:{{ $color }};">{{ $pct }}%</span>
          </div>
          <div class="progress-bar">
            <div style="height:100%;border-radius:20px;background:{{ $color }};width:{{ $pct }}%;transition:width 1.3s cubic-bezier(.4,0,.2,1);"></div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- Interview Preparation Checklist (Premium Detail) -->
    <div class="card anim-left" data-delay="180">
      <div class="card-header">
        <div class="card-title" style="font-size:14px;">Interview Prep Checklist</div>
        <span style="font-size:11px;color:var(--text-muted);font-weight:600;" id="checklistProgress">0%</span>
      </div>
      <div class="card-body" style="padding-top:4px;">
        <div id="prepChecklist">
          <div class="checklist-item" onclick="toggleChecklist(0)">
            <div class="checklist-checkbox" id="chk-0"><i class="fas fa-check"></i></div>
            <span class="checklist-text">Review resume and project details</span>
          </div>
          <div class="checklist-item" onclick="toggleChecklist(1)">
            <div class="checklist-checkbox" id="chk-1"><i class="fas fa-check"></i></div>
            <span class="checklist-text">Research target company background</span>
          </div>
          <div class="checklist-item" onclick="toggleChecklist(2)">
            <div class="checklist-checkbox" id="chk-2"><i class="fas fa-check"></i></div>
            <span class="checklist-text">Prepare standard introduction & FAQ answers</span>
          </div>
          <div class="checklist-item" onclick="toggleChecklist(3)">
            <div class="checklist-checkbox" id="chk-3"><i class="fas fa-check"></i></div>
            <span class="checklist-text">Test mic, camera and video link settings</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Standard Documents -->
    <div class="card anim-left" data-delay="220">
      <div class="card-header">
        <div class="card-title" style="font-size:14px;">Standard Documents</div>
        <span style="font-size:11px;font-weight:700;color:var(--primary);">{{ $documents->count() }}</span>
      </div>
      <div class="card-body" style="padding-top:4px;">
        @forelse($documents as $doc)
        <div class="document-item">
          <div class="document-icon" style="background:var(--primary-bg);color:var(--primary);">
            <i class="fas fa-file-pdf"></i>
          </div>
          <div class="document-info">
            <div class="document-name" style="color:var(--gray-800);">{{ $doc->name }}</div>
            <div class="document-size">{{ $doc->size ? number_format($doc->size / 1024, 2) . ' KB' : 'Unknown Size' }} · Uploaded</div>
          </div>
          <a href="{{ Storage::url($doc->path) }}" target="_blank" class="icon-btn" title="Download"><i class="fas fa-download"></i></a>
        </div>
        @empty
        <div style="padding: 20px; text-align: center; color: var(--gray-500); font-size: 13px;">
          No documents uploaded yet.
        </div>
        @endforelse
        <div style="margin-top:16px;">
          <a href="{{ route('student.documents', ['company'=>$slug]) }}" class="btn btn-outline" style="border-color:var(--primary);color:var(--primary);width:100%;justify-content:center;">
            <i class="fas fa-upload"></i> Upload Documents
          </a>
        </div>
      </div>
    </div>

    <!-- Notifications -->
    <div class="card anim-left" data-delay="290">
      <div class="card-header">
        <div class="card-title" style="font-size:14px;">Notifications</div>
        <a href="#" class="card-link" style="font-size:12px;" onclick="markAllRead(event)">Mark all read</a>
      </div>
      <div class="card-body" style="padding-top:4px;">
        @php
            $notifications = auth()->user()->notifications()->take(5)->get();
        @endphp
        @forelse($notifications as $notification)
          @php
              $data = $notification->data;
              $unread = is_null($notification->read_at);
              $text = $data['message'] ?? 'New notification';
              $icon = $data['icon'] ?? 'fa-bell';
              $type = $data['color'] ?? 'blue';
              $time = $notification->created_at->diffForHumans();
          @endphp
        <div class="notification-item {{ $unread ? 'unread' : '' }}">
          <div class="notification-icon {{ $type }}"><i class="fas {{ $icon }}"></i></div>
          <div class="notification-content">
            <div class="notification-text">{{ $text }}</div>
            <div class="notification-time">{{ $time }}</div>
          </div>
        </div>
        @empty
        <div style="padding: 20px; text-align: center; color: var(--gray-500); font-size: 13px;">
          No notifications yet.
        </div>
        @endforelse
      </div>
    </div>

  </div>
</div>

<script>
function showToast(msg, type) { if (window.showGlobalToast) showGlobalToast(msg, type); }

function viewApplication(company, title) {
  showToast('Opening application details for ' + company + '...', 'info');
}
function confirmInterview(company) {
  showToast('Interview with ' + company + ' confirmed', 'success');
}
function withdrawApp(company) {
  if (!confirm('Withdraw your application to ' + company + '?')) return;
  showToast('Application to ' + company + ' withdrawn.', 'warning');
}
function applyToListing(title, company) {
  showToast('Opening application for ' + title + ' at ' + company + '...', 'info');
}
function downloadDoc(name) {
  showToast('Downloading ' + name + '...', 'success');
}
function uploadDoc(name) {
  var input = document.createElement('input');
  input.type = 'file'; input.accept = '.pdf,.doc,.docx';
  input.onchange = function() { showToast(name + ' uploaded successfully', 'success'); };
  input.click();
}
function markAllRead(e) {
  e.preventDefault();
  document.querySelectorAll('.notification-item.unread').forEach(function(el) { el.classList.remove('unread'); });
  showToast('All notifications marked as read', 'info');
}

// Interactive checklist system
let checklistStates = JSON.parse(localStorage.getItem('studentPrepChecklist') || '[false, false, false, false]');

function renderChecklist() {
  let checkedCount = 0;
  checklistStates.forEach((state, idx) => {
    const el = document.getElementById('chk-' + idx);
    if (!el) return;
    const parent = el.closest('.checklist-item');
    if (state) {
      parent.classList.add('checked');
      checkedCount++;
    } else {
      parent.classList.remove('checked');
    }
  });
  
  const progressText = document.getElementById('checklistProgress');
  if (progressText) {
    const pct = Math.round((checkedCount / checklistStates.length) * 100);
    progressText.textContent = pct + '%';
  }
}

function toggleChecklist(idx) {
  checklistStates[idx] = !checklistStates[idx];
  localStorage.setItem('studentPrepChecklist', JSON.stringify(checklistStates));
  renderChecklist();
  if (checklistStates[idx]) {
    showToast('Task marked as complete.', 'success');
  }
}

document.addEventListener('DOMContentLoaded', function() {
  renderChecklist();
});
</script>
</x-layouts::student>
