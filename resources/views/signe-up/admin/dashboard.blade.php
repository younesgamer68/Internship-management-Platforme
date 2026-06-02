<x-layouts::admin title="Admin Dashboard">

  @php $slug = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp

  <!-- Welcome Banner -->
  <div class="welcome-banner" style="margin-bottom:28px;">
    <div style="position:relative;z-index:1;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;">
      <div>
        <h2 style="font-size:22px;font-weight:800;color:white;margin-bottom:4px;">
           {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }}, {{ Auth::user()->name }}
        </h2>
        <p style="font-size:13px;opacity:0.85;color:rgba(255,255,255,0.9);">
          Here's what's happening on your platform today — {{ now()->format('l, F j, Y') }}
        </p>
      </div>
      <div style="display:flex;gap:10px;flex-wrap:wrap;">
        <a href="{{ route('admin.reports', ['company' => $slug]) }}" class="btn" style="background:rgba(255,255,255,0.15);color:white;border:1px solid rgba(255,255,255,0.3);backdrop-filter:blur(4px);">
          <i class="fas fa-chart-line"></i> Analytics
        </a>
        <button class="btn" style="background:white;color:var(--primary);font-weight:700;" onclick="document.getElementById('register-modal').style.display='flex'">
          <i class="fas fa-plus"></i> Register Profile
        </button>
      </div>
    </div>
  </div>

  <!-- KPI Cards -->
  <div class="stats-grid" style="grid-template-columns:repeat(4,1fr);margin-bottom:28px;">

    <!-- Universities -->
    <div class="stat-card" style="cursor:pointer;" onclick="window.location='{{ route('admin.universities', ['company'=>$slug]) }}'">
      <div class="stat-icon" style="background:rgba(245,158,11,0.12);color:#F59E0B;width:52px;height:52px;border-radius:12px;font-size:22px;">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">26</div>
        <div class="stat-label">Universities</div>
        <div style="font-size:11px;color:var(--green);margin-top:4px;font-weight:600;">
          <i class="fas fa-arrow-up" style="font-size:9px;"></i> +2 this month
        </div>
      </div>
    </div>

    <!-- Faculties -->
    <div class="stat-card" style="cursor:pointer;" onclick="window.location='{{ route('admin.departments', ['company'=>$slug]) }}'">
      <div class="stat-icon" style="background:var(--green-bg);color:var(--green);width:52px;height:52px;border-radius:12px;font-size:22px;">
        <i class="fas fa-university"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">38</div>
        <div class="stat-label">Departments</div>
        <div style="font-size:11px;color:var(--green);margin-top:4px;font-weight:600;">
          <i class="fas fa-arrow-up" style="font-size:9px;"></i> +5 this month
        </div>
      </div>
    </div>

    <!-- Active Internships -->
    <div class="stat-card" style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
      <div class="stat-icon" style="background:var(--primary-bg);color:var(--primary);width:52px;height:52px;border-radius:12px;font-size:22px;">
        <i class="fas fa-briefcase"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">320</div>
        <div class="stat-label">Active Internships</div>
        <div style="font-size:11px;color:var(--green);margin-top:4px;font-weight:600;">
          <i class="fas fa-arrow-up" style="font-size:9px;"></i> +18 this week
        </div>
      </div>
    </div>

    <!-- Students -->
    <div class="stat-card" style="cursor:pointer;" onclick="window.location='{{ route('admin.users', ['company'=>$slug]) }}'">
      <div class="stat-icon" style="background:rgba(139,92,246,0.12);color:#8B5CF6;width:52px;height:52px;border-radius:12px;font-size:22px;">
        <i class="fas fa-users"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">2,450</div>
        <div class="stat-label">Total Students</div>
        <div style="font-size:11px;color:var(--green);margin-top:4px;font-weight:600;">
          <i class="fas fa-arrow-up" style="font-size:9px;"></i> +34 this week
        </div>
      </div>
    </div>
  </div>

  <!-- Secondary Stats Row -->
  <div class="stats-grid" style="grid-template-columns:repeat(4,1fr);margin-bottom:28px;">
    <div class="stat-card" style="padding:16px 20px;gap:14px;">
      <div style="width:42px;height:42px;border-radius:10px;background:var(--danger-bg);display:flex;align-items:center;justify-content:center;color:var(--danger);font-size:18px;flex-shrink:0;">
        <i class="fas fa-clock"></i>
      </div>
      <div>
        <div style="font-size:20px;font-weight:700;color:var(--gray-800);">45</div>
        <div style="font-size:12px;color:var(--gray-500);font-weight:500;">Pending Approvals</div>
      </div>
    </div>
    <div class="stat-card" style="padding:16px 20px;gap:14px;">
      <div style="width:42px;height:42px;border-radius:10px;background:rgba(59,130,246,0.1);display:flex;align-items:center;justify-content:center;color:#3B82F6;font-size:18px;flex-shrink:0;">
        <i class="fas fa-file-alt"></i>
      </div>
      <div>
        <div style="font-size:20px;font-weight:700;color:var(--gray-800);">128</div>
        <div style="font-size:12px;color:var(--gray-500);font-weight:500;">Reports Submitted</div>
      </div>
    </div>
    <div class="stat-card" style="padding:16px 20px;gap:14px;">
      <div style="width:42px;height:42px;border-radius:10px;background:var(--green-bg);display:flex;align-items:center;justify-content:center;color:var(--green);font-size:18px;flex-shrink:0;">
        <i class="fas fa-check-circle"></i>
      </div>
      <div>
        <div style="font-size:20px;font-weight:700;color:var(--gray-800);">275</div>
        <div style="font-size:12px;color:var(--gray-500);font-weight:500;">Internships Completed</div>
      </div>
    </div>
    <div class="stat-card" style="padding:16px 20px;gap:14px;">
      <div style="width:42px;height:42px;border-radius:10px;background:var(--warning-bg);display:flex;align-items:center;justify-content:center;color:var(--warning);font-size:18px;flex-shrink:0;">
        <i class="fas fa-star"></i>
      </div>
      <div>
        <div style="font-size:20px;font-weight:700;color:var(--gray-800);">4.8</div>
        <div style="font-size:12px;color:var(--gray-500);font-weight:500;">Avg. Satisfaction</div>
      </div>
    </div>
  </div>

  <!-- Main Content Grid -->
  <div class="content-grid" style="grid-template-columns:2fr 1fr;margin-bottom:28px;">

    <!-- Internship Activity Table -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Recent Internship Activity</span>
        <a href="{{ route('admin.internships', ['company'=>$slug]) }}" class="card-link">View All &rsaquo;</a>
      </div>
      <div class="card-body" style="padding-top:16px;">
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>University</th>
                <th>Company</th>
                <th>Applicants</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Software Development</div>
                  <div style="font-size:11px;color:var(--gray-500);">Epoka University</div>
                </td>
                <td>Epoka University</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:var(--primary);color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">TS</div>
                    TechSolutions
                  </div>
                </td>
                <td><span style="font-weight:600;">34</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge active">Active</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Marketing & Growth</div>
                  <div style="font-size:11px;color:var(--gray-500);">Albanian University</div>
                </td>
                <td>Albanian University</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#8B5CF6;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">MC</div>
                    MediaCorp
                  </div>
                </td>
                <td><span style="font-weight:600;">21</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge pending">Pending</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Data Analytics</div>
                  <div style="font-size:11px;color:var(--gray-500);">UET Tirana</div>
                </td>
                <td>UET Tirana</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#3B82F6;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">DS</div>
                    DataSpark
                  </div>
                </td>
                <td><span style="font-weight:600;">17</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge active">Active</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">UI/UX Design</div>
                  <div style="font-size:11px;color:var(--gray-500);">Polytechnic University</div>
                </td>
                <td>Polytechnic University</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#F59E0B;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">CR</div>
                    CreativeRoom
                  </div>
                </td>
                <td><span style="font-weight:600;">9</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge completed">Completed</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Cloud Engineering</div>
                  <div style="font-size:11px;color:var(--gray-500);">University of Tirana</div>
                </td>
                <td>University of Tirana</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#10B981;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">IN</div>
                    Infosoft Network
                  </div>
                </td>
                <td><span style="font-weight:600;">42</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge active">Active</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">HR Assistant</div>
                  <div style="font-size:11px;color:var(--gray-500);">Luigj Gurakuqi</div>
                </td>
                <td>Luigj Gurakuqi Shkoder</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#EF4444;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">BC</div>
                    Balfin Group
                  </div>
                </td>
                <td><span style="font-weight:600;">28</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge pending">Pending</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Frontend Web Developer</div>
                  <div style="font-size:11px;color:var(--gray-500);">CIT Tirana</div>
                </td>
                <td>CIT Tirana</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#14B8A6;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">DM</div>
                    DigitalMind
                  </div>
                </td>
                <td><span style="font-weight:600;">19</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge active">Active</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Cybersecurity Intern</div>
                  <div style="font-size:11px;color:var(--gray-500);">Metropolitan University</div>
                </td>
                <td>Metropolitan University</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#6366F1;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">CD</div>
                    CyberDef
                  </div>
                </td>
                <td><span style="font-weight:600;">11</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge pending">Pending</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Mobile App Developer</div>
                  <div style="font-size:11px;color:var(--gray-500);">New York Univ Tirana</div>
                </td>
                <td>New York Univ Tirana</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#EC4899;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">AV</div>
                    AppVibe
                  </div>
                </td>
                <td><span style="font-weight:600;">15</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge completed">Completed</span></td>
              </tr>
              <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company'=>$slug]) }}'">
                <td>
                  <div style="font-weight:600;font-size:13px;">Product Management</div>
                  <div style="font-size:11px;color:var(--gray-500);">Canadian Institute</div>
                </td>
                <td>Canadian Institute</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:26px;height:26px;background:#f59e0b;color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">NG</div>
                    NextGen
                  </div>
                </td>
                <td><span style="font-weight:600;">8</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                <td><span class="status-badge active">Active</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- University Overview -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">University Overview</span>
        <a href="{{ route('admin.universities', ['company'=>$slug]) }}" class="card-link">View All &rsaquo;</a>
      </div>
      <div class="card-body">
        <div style="display:flex;flex-direction:column;gap:12px;">
          @foreach([
            ['Epoka University', 580, '#3B82F6', 'fa-shield-alt', 78],
            ['University of Tirana', 720, '#8B5CF6', 'fa-landmark', 95],
            ['Albanian University', 450, '#F59E0B', 'fa-university', 61],
            ['Polytechnic University', 670, '#10B981', 'fa-building-columns', 90],
            ['UET Tirana', 390, '#EF4444', 'fa-graduation-cap', 55],
            ['Luigj Gurakuqi Shkoder', 210, '#0ea5e9', 'fa-book-open', 42],
            ['New York University Tirana', 150, '#EC4899', 'fa-school', 31],
            ['Canadian Institute of Tech', 180, '#14B8A6', 'fa-laptop-code', 38],
            ['Metropolitan Univ. Tirana', 220, '#6366F1', 'fa-gears', 46],
          ] as [$name, $students, $color, $icon, $pct])
          <div style="padding:10px 8px;border-radius:8px;cursor:pointer;transition:background 0.15s;" onmouseover="this.style.background='var(--gray-50)'" onmouseout="this.style.background='transparent'" onclick="window.location='{{ route('admin.universities', ['company'=>$slug]) }}'">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
              <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:34px;height:34px;border-radius:8px;background:{{ $color }}1a;color:{{ $color }};display:flex;align-items:center;justify-content:center;font-size:15px;">
                  <i class="fas {{ $icon }}"></i>
                </div>
                <div>
                  <div style="font-weight:600;font-size:12.5px;color:var(--gray-800);">{{ $name }}</div>
                  <div style="font-size:11px;color:var(--gray-500);">{{ $students }} students</div>
                </div>
              </div>
              <span style="font-size:11px;font-weight:700;color:{{ $color }};">{{ $pct }}%</span>
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width:{{ $pct }}%;background:{{ $color }};"></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Grid: Recent Users + Activity Feed + Platform Stats -->
  <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;margin-bottom:28px;">

    <!-- Recent Registrations -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Recent Users</span>
        <a href="{{ route('admin.users', ['company'=>$slug]) }}" class="card-link">View All &rsaquo;</a>
      </div>
      <div class="card-body" style="padding-top:12px;">
        <div style="display:flex;flex-direction:column;gap:12px;">
          @foreach([
            ['JS','John Smith','Student','Epoka University','#00b1aa','May 30'],
            ['SJ','Sarah Johnson','Company','MediaCorp','#8B5CF6','May 29'],
            ['ED','Emily Davis','Student','UET Tirana','#F59E0B','May 28'],
            ['DB','David Brown','Company','TechSolutions','#3B82F6','May 28'],
            ['MC','Michael Chang','Student','Polytechnic Univ.','#10B981','May 27'],
            ['EH','Elena Hoxha','Student','Univ. of Tirana','#a855f7','May 27'],
            ['MV','Marcus Vance','Company','CloudStack Ltd','#0ea5e9','May 26'],
            ['FG','Fiona Gallagher','Student','Luigj Gurakuqi','#ec4899','May 25'],
          ] as [$init, $name, $role, $org, $color, $date])
          <div style="display:flex;align-items:center;gap:10px;padding:8px;border-radius:8px;cursor:pointer;transition:background 0.15s;" onmouseover="this.style.background='var(--gray-50)'" onmouseout="this.style.background='transparent'" onclick="window.location='{{ route('admin.users', ['company'=>$slug]) }}'">
            <div style="width:34px;height:34px;border-radius:50%;background:{{ $color }};color:white;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0;">{{ $init }}</div>
            <div style="flex:1;min-width:0;">
              <div style="font-size:13px;font-weight:600;color:var(--gray-800);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $name }}</div>
              <div style="font-size:11px;color:var(--gray-500);">{{ $org }}</div>
            </div>
            <div style="text-align:right;flex-shrink:0;">
              <span style="font-size:10px;padding:2px 7px;border-radius:20px;font-weight:600;background:{{ $role=='Student' ? 'rgba(59,130,246,0.1)' : 'rgba(16,185,129,0.1)' }};color:{{ $role=='Student' ? '#3B82F6' : '#059669' }};">{{ $role }}</span>
              <div style="font-size:10px;color:var(--gray-400);margin-top:3px;">{{ $date }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Activity Feed -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Activity Feed</span>
        <span style="font-size:11px;color:var(--gray-400);">Live</span>
      </div>
      <div class="card-body" style="padding-top:12px;">
        <div style="display:flex;flex-direction:column;gap:0;">
          @foreach([
            ['fa-user-plus','#00b1aa','New user registered','John Smith joined as Student','2 min ago'],
            ['fa-briefcase','#3B82F6','Internship submitted','Software Dev at TechSolutions','15 min ago'],
            ['fa-check-circle','#10B981','Report approved','Emily Davis – UI/UX Internship','1 hr ago'],
            ['fa-exclamation-triangle','#F59E0B','Approval pending','Marketing role at MediaCorp','2 hr ago'],
            ['fa-trash-alt','#EF4444','User removed','Inactive account cleaned up','3 hr ago'],
            ['fa-handshake','#6366F1','New Partnership','Signed with Epoka University','4 hr ago'],
            ['fa-circle-check','#14B8A6','Company Approved','CloudStack Ltd verification passed','5 hr ago'],
            ['fa-file-signature','#ec4899','Application Sent','Elena Hoxha applied to DataSpark','6 hr ago'],
            ['fa-user-tie','#8B5CF6','Coordinator Assigned','Dr. Arben Kola at Univ. of Tirana','7 hr ago'],
            ['fa-star','#F59E0B','Feedback Submitted','MediaCorp rated program 5 stars','8 hr ago'],
          ] as [$icon, $color, $title, $desc, $time])
          <div style="display:flex;gap:12px;padding:10px 0;border-bottom:1px solid var(--border);">
            <div style="width:32px;height:32px;border-radius:8px;background:{{ $color }}1a;color:{{ $color }};display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">
              <i class="fas {{ $icon }}"></i>
            </div>
            <div style="flex:1;min-width:0;">
              <div style="font-size:12.5px;font-weight:600;color:var(--gray-800);">{{ $title }}</div>
              <div style="font-size:11px;color:var(--gray-500);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $desc }}</div>
            </div>
            <div style="font-size:10px;color:var(--gray-400);white-space:nowrap;flex-shrink:0;">{{ $time }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Platform Health -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Platform Health</span>
        <span style="font-size:11px;padding:3px 8px;background:var(--green-bg);color:var(--green-dark);border-radius:12px;font-weight:600;">All Systems Go</span>
      </div>
      <div class="card-body" style="padding-top:16px;">
        <div style="display:flex;flex-direction:column;gap:16px;">
          @foreach([
            ['Internship Approvals','78%','#00b1aa'],
            ['Report Compliance','91%','#10B981'],
            ['Student Engagement','65%','#8B5CF6'],
            ['University Sync','99%','#3B82F6'],
          ] as [$label, $val, $color])
          <div>
            <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
              <span style="font-size:12px;font-weight:500;color:var(--gray-700);">{{ $label }}</span>
              <span style="font-size:12px;font-weight:700;color:{{ $color }};">{{ $val }}</span>
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width:{{ $val }};background:{{ $color }};"></div>
            </div>
          </div>
          @endforeach
        </div>

        <div style="margin-top:20px;padding-top:16px;border-top:1px solid var(--border);">
          <div style="font-size:12px;font-weight:600;color:var(--gray-700);margin-bottom:10px;">System Notifications</div>
          <div style="display:flex;flex-direction:column;gap:8px;">
            <div style="display:flex;align-items:flex-start;gap:8px;padding:8px;border-radius:8px;background:var(--warning-bg);">
              <i class="fas fa-triangle-exclamation" style="color:var(--warning);font-size:12px;margin-top:2px;"></i>
              <span style="font-size:11px;color:#92400E;">45 internships awaiting approval</span>
            </div>
            <div style="display:flex;align-items:flex-start;gap:8px;padding:8px;border-radius:8px;background:var(--primary-bg);">
              <i class="fas fa-circle-info" style="color:var(--primary);font-size:12px;margin-top:2px;"></i>
              <span style="font-size:11px;color:var(--primary-dark);">System backup scheduled tonight at 02:00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Compliance / Reports – Rich Section -->
  <div class="card" style="margin-bottom:0;">
    <div class="card-header" style="padding-bottom:16px;">
      <div>
        <span class="card-title" style="font-size:16px;">Compliance &amp; Reports Overview</span>
        <div style="font-size:12px;color:var(--gray-500);margin-top:3px;">Internship lifecycle tracking across all universities · Updated just now</div>
      </div>
      <div style="display:flex;gap:10px;align-items:center;">
        <span style="font-size:11px;padding:4px 10px;border-radius:20px;background:var(--green-bg);color:var(--green-dark);font-weight:600;"><i class="fas fa-circle" style="font-size:7px;margin-right:4px;"></i>Live</span>
        <a href="{{ route('admin.reports', ['company'=>$slug]) }}" class="btn btn-outline btn-sm">
          <i class="fas fa-arrow-up-right-from-square" style="font-size:11px;"></i> Full Analytics
        </a>
      </div>
    </div>

    <div class="card-body" style="padding-top:8px;">

      <!-- Top Row: 4 SVG Donut Charts -->
      <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-bottom:28px;">
        @php
        $donuts = [
          ['Completed',   275, 652, '#3B82F6', 42, '+12 this month',  'fa-check-circle'],
          ['Active',      320, 652, '#00b1aa', 49, '+18 this week',   'fa-briefcase'],
          ['Pending',      45, 652, '#F59E0B',  7, '↓ 5 from last wk','fa-clock'],
          ['Rejected',     12, 652, '#EF4444',  2, 'Review required', 'fa-times-circle'],
        ];
        // SVG donut: circumference = 2π×34 ≈ 213.6
        $circ = 213.6;
        @endphp

        @foreach($donuts as [$label, $num, $total, $color, $pct, $trend, $icon])
        @php $dash = round(($pct / 100) * $circ, 1); @endphp
        <div style="background:var(--gray-50);border-radius:14px;padding:20px 16px;text-align:center;border:1px solid var(--border);position:relative;overflow:hidden;transition:all 0.2s;" onmouseover="this.style.borderColor='{{ $color }}';this.style.boxShadow='0 4px 16px {{ $color }}22'" onmouseout="this.style.borderColor='var(--border)';this.style.boxShadow='none'">
          <!-- Top label -->
          <div style="display:flex;align-items:center;justify-content:center;gap:6px;margin-bottom:14px;">
            <i class="fas {{ $icon }}" style="font-size:12px;color:{{ $color }};"></i>
            <span style="font-size:12px;font-weight:600;color:var(--gray-600);">{{ $label }}</span>
          </div>

          <!-- SVG Donut -->
          <div style="position:relative;width:96px;height:96px;margin:0 auto 14px;">
            <svg width="96" height="96" viewBox="0 0 96 96" style="transform:rotate(-90deg);">
              <!-- Track -->
              <circle cx="48" cy="48" r="34" fill="none" stroke="#E2E8F0" stroke-width="9"/>
              <!-- Fill -->
              <circle cx="48" cy="48" r="34" fill="none"
                stroke="{{ $color }}" stroke-width="9"
                stroke-linecap="round"
                stroke-dasharray="{{ $dash }} {{ $circ }}"
                stroke-dashoffset="0"
                style="transition:stroke-dasharray 1s ease;"/>
            </svg>
            <!-- Center text -->
            <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;">
              <span style="font-size:22px;font-weight:800;color:var(--gray-800);line-height:1;">{{ $num }}</span>
              <span style="font-size:10px;color:var(--gray-400);font-weight:500;margin-top:1px;">{{ $pct }}%</span>
            </div>
          </div>

          <!-- Trend -->
          <div style="font-size:11px;color:{{ str_starts_with($trend,'↓') ? '#F59E0B' : ($label=='Rejected' ? '#EF4444' : '#059669') }};font-weight:600;">
            @if(!str_starts_with($trend,'↓') && !str_starts_with($trend,'Review'))
              <i class="fas fa-arrow-trend-up" style="font-size:10px;margin-right:3px;color:#10B981;"></i>
            @endif
            {{ $trend }}
          </div>
        </div>
        @endforeach
      </div>

      <!-- Middle Row: Monthly Bar Chart + Breakdown Table -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:24px;">

        <!-- Monthly Bar Chart -->
        <div style="background:var(--gray-50);border-radius:14px;padding:20px;border:1px solid var(--border);">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <div>
              <div style="font-size:13px;font-weight:700;color:var(--gray-800);">Monthly Internship Trends</div>
              <div style="font-size:11px;color:var(--gray-500);margin-top:2px;">Jan – Jun 2025</div>
            </div>
            <div style="display:flex;gap:12px;">
              @foreach([['#3B82F6','Completed'],['#00b1aa','Active'],['#F59E0B','Pending']] as [$c,$l])
              <div style="display:flex;align-items:center;gap:4px;">
                <span style="width:8px;height:8px;border-radius:2px;background:{{ $c }};display:inline-block;"></span>
                <span style="font-size:10px;color:var(--gray-500);font-weight:500;">{{ $l }}</span>
              </div>
              @endforeach
            </div>
          </div>

          @php
          $months = [
            ['Jan', 38, 52, 8],
            ['Feb', 45, 60, 11],
            ['Mar', 55, 72, 9],
            ['Apr', 62, 85, 6],
            ['May', 58, 78, 7],
            ['Jun', 17, 45, 4],
          ];
          $maxVal = 90;
          @endphp

          <div style="display:flex;align-items:flex-end;gap:8px;height:110px;">
            @foreach($months as [$m, $comp, $act, $pend])
            <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;">
              <div style="display:flex;align-items:flex-end;gap:2px;width:100%;">
                <div style="flex:1;background:#3B82F6;border-radius:3px 3px 0 0;height:{{ round(($comp/$maxVal)*100) }}px;min-height:4px;"></div>
                <div style="flex:1;background:#00b1aa;border-radius:3px 3px 0 0;height:{{ round(($act/$maxVal)*100) }}px;min-height:4px;"></div>
                <div style="flex:1;background:#F59E0B;border-radius:3px 3px 0 0;height:{{ round(($pend/$maxVal)*100) }}px;min-height:4px;"></div>
              </div>
              <span style="font-size:10px;color:var(--gray-400);font-weight:500;">{{ $m }}</span>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Breakdown Table -->
        <div style="background:var(--gray-50);border-radius:14px;padding:20px;border:1px solid var(--border);">
          <div style="font-size:13px;font-weight:700;color:var(--gray-800);margin-bottom:16px;">Status Breakdown by University</div>
          <table style="width:100%;border-collapse:collapse;">
            <thead>
              <tr>
                <th style="font-size:10px;color:var(--gray-400);font-weight:700;text-transform:uppercase;letter-spacing:0.05em;padding:0 0 10px;text-align:left;">University</th>
                <th style="font-size:10px;color:#3B82F6;font-weight:700;text-align:center;padding:0 0 10px;">Done</th>
                <th style="font-size:10px;color:#00b1aa;font-weight:700;text-align:center;padding:0 0 10px;">Active</th>
                <th style="font-size:10px;color:#F59E0B;font-weight:700;text-align:center;padding:0 0 10px;">Pending</th>
                <th style="font-size:10px;color:var(--gray-400);font-weight:700;text-align:right;padding:0 0 10px;">Rate</th>
              </tr>
            </thead>
            <tbody>
              @foreach([
                ['Epoka Univ.',       88, 112, 14, 91],
                ['Univ. of Tirana',   74,  98,  9, 88],
                ['Albanian Univ.',    55,  62, 12, 82],
                ['Polytechnic Univ.', 58,  48, 10, 85],
                ['UET Tirana',        42,  36,  8, 80],
                ['Luigj Gurakuqi',    30,  24,  5, 76],
                ['CIT Tirana',        25,  20,  4, 78],
              ] as [$uni, $done, $act, $pend, $rate])
              <tr style="border-top:1px solid var(--border);">
                <td style="padding:10px 0;font-size:12px;font-weight:500;color:var(--gray-700);">{{ $uni }}</td>
                <td style="padding:10px 0;text-align:center;font-size:12px;font-weight:600;color:#3B82F6;">{{ $done }}</td>
                <td style="padding:10px 0;text-align:center;font-size:12px;font-weight:600;color:#00b1aa;">{{ $act }}</td>
                <td style="padding:10px 0;text-align:center;font-size:12px;font-weight:600;color:#F59E0B;">{{ $pend }}</td>
                <td style="padding:10px 0;text-align:right;">
                  <span style="font-size:11px;font-weight:700;padding:2px 8px;border-radius:20px;background:{{ $rate>=90 ? 'rgba(16,185,129,0.1)' : ($rate>=85 ? 'rgba(59,130,246,0.1)' : 'rgba(245,158,11,0.1)') }};color:{{ $rate>=90 ? '#065F46' : ($rate>=85 ? '#1D4ED8' : '#92400E') }};">{{ $rate }}%</span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Bottom Row: KPI Metric Chips + CTA -->
      <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;padding-top:16px;border-top:1px solid var(--border);">
        <div style="display:flex;flex-wrap:wrap;gap:10px;">
          @foreach([
            ['652','Total Internships','#3B82F6','fa-list-check'],
            ['42%','Completion Rate','#10B981','fa-trophy'],
            ['8.3 days','Avg. Review Time','#F59E0B','fa-hourglass-half'],
            ['4.8 / 5','Satisfaction Score','#8B5CF6','fa-star'],
            ['96%','Document Compliance','#00b1aa','fa-file-circle-check'],
          ] as [$val, $lbl, $color, $icon])
          <div style="display:flex;align-items:center;gap:8px;padding:8px 14px;border-radius:10px;background:white;border:1px solid var(--border);">
            <div style="width:28px;height:28px;border-radius:7px;background:{{ $color }}1a;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <i class="fas {{ $icon }}" style="font-size:11px;color:{{ $color }};"></i>
            </div>
            <div>
              <div style="font-size:13px;font-weight:700;color:var(--gray-800);line-height:1.1;">{{ $val }}</div>
              <div style="font-size:10px;color:var(--gray-500);font-weight:500;margin-top:1px;">{{ $lbl }}</div>
            </div>
          </div>
          @endforeach
        </div>

        <a href="{{ route('admin.reports', ['company'=>$slug]) }}" class="btn btn-primary" style="white-space:nowrap;">
          <i class="fas fa-chart-line"></i> View Full Analytics
        </a>
      </div>
    </div>
  </div>

  @push('modals')
  <!-- Register Modal -->
  <div id="register-modal" class="modal-overlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.4);backdrop-filter:blur(4px);z-index:9999;overflow-y:auto;padding:5vh 20px;" onclick="if(event.target===this)this.style.display='none'">
    <div style="min-height: calc(100% - 10vh); display: flex; align-items: center; justify-content: center;">
      <div class="card" style="width:100%;max-width:900px;position:relative;margin:auto;box-shadow: 0 20px 60px rgba(0,0,0,0.18);" onclick="event.stopPropagation()">
        <button class="btn btn-ghost" style="position:absolute;right:16px;top:16px;font-size:18px;width:36px;height:36px;padding:0;display:flex;align-items:center;justify-content:center;z-index:10;" onclick="document.getElementById('register-modal').style.display='none'">
          <i class="fas fa-xmark"></i>
        </button>
        <div style="padding:28px 24px;">
          @livewire('admin.management')
        </div>
      </div>
    </div>
  </div>
  @endpush

</x-layouts::admin>
