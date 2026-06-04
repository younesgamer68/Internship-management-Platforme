<div>
<style>
  /* ── Stats ── */
  .stats-row { display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; margin-bottom: 24px; }
  .stat-mini {
    background: var(--white); border-radius: 12px; padding: 16px 14px;
    box-shadow: var(--shadow-sm); text-align: center; border: 1px solid var(--border);
    transition: var(--transition); cursor: default;
  }
  .stat-mini:hover { box-shadow: var(--shadow); transform: translateY(-2px); }
  .stat-mini-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: .9rem; margin: 0 auto 8px; }
  .stat-mini-icon.blue   { background: var(--primary-bg); color: var(--primary); }
  .stat-mini-icon.green  { background: var(--green-bg); color: var(--green); }
  .stat-mini-icon.orange { background: var(--warning-bg); color: var(--warning); }
  .stat-mini-icon.purple { background: rgba(139,92,246,.12); color: #8B5CF6; }
  .stat-mini-icon.red    { background: var(--danger-bg); color: var(--danger); }
  .stat-mini-value { font-size: 1.5rem; font-weight: 800; }
  .stat-mini-label { font-size: .73rem; color: var(--text-muted); margin-top: 3px; font-weight: 500; }
  .stat-mini.total  .stat-mini-value { color: var(--primary); }
  .stat-mini.new    .stat-mini-value { color: var(--green); }
  .stat-mini.review .stat-mini-value { color: var(--warning); }
  .stat-mini.short  .stat-mini-value { color: #8B5CF6; }
  .stat-mini.other  .stat-mini-value { color: var(--danger); }

  /* ── Filter Bar ── */
  .filter-bar {
    display: flex; gap: 10px; align-items: center; margin-bottom: 20px;
    flex-wrap: wrap; background: var(--white); padding: 14px 18px;
    border-radius: 12px; border: 1px solid var(--border); box-shadow: var(--shadow-sm);
  }
  .filter-bar input, .filter-bar select {
    padding: 9px 14px; border: 1.5px solid var(--border); border-radius: 9px;
    font-size: .87rem; background: var(--gray-50); color: inherit; outline: none; transition: var(--transition);
  }
  .filter-bar input { flex: 1; min-width: 200px; }
  .filter-bar input:focus, .filter-bar select:focus { border-color: var(--primary); background: var(--white); }
  .filter-bar .filter-label { font-size: .8rem; color: var(--text-muted); font-weight: 600; white-space: nowrap; }

  /* ── Card ── */
  .card { background: var(--white); border-radius: 14px; padding: 22px; box-shadow: var(--shadow-sm); border: 1px solid var(--border); }
  .card-header-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; padding-bottom: 14px; border-bottom: 1px solid var(--gray-100); }
  .card-title { font-size: 1rem; font-weight: 700; margin: 0; color: var(--gray-900); display: flex; align-items: center; gap: 8px; }
  .card-title i { color: var(--primary); }
  .results-note { font-size: .8rem; color: var(--text-muted); }

  /* ── Table ── */
  .table-wrap { overflow-x: auto; }
  table { width: 100%; border-collapse: collapse; }
  thead th {
    text-align: left; font-size: .74rem; font-weight: 700; text-transform: uppercase;
    color: var(--text-muted); padding: 10px 14px; border-bottom: 2px solid var(--border);
    white-space: nowrap; letter-spacing: .04em;
  }
  tbody td { padding: 13px 14px; font-size: .87rem; border-bottom: 1px solid var(--border); vertical-align: middle; color: var(--gray-700); }
  tbody tr:last-child td { border-bottom: none; }
  tbody tr { transition: background .15s; }
  tbody tr:hover { background: var(--primary-bg); }
  tbody tr.hidden { display: none; }

  .applicant-cell { display: flex; align-items: center; gap: 12px; }
  .applicant-avatar {
    width: 40px; height: 40px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: .82rem; flex-shrink: 0;
  }
  .applicant-name  { font-weight: 700; font-size: .88rem; color: var(--gray-900); }
  .applicant-email { font-size: .73rem; color: var(--text-muted); margin-top: 2px; }

  .status-badge {
    display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px;
    border-radius: 20px; font-size: .71rem; font-weight: 700; white-space: nowrap;
  }
  .status-badge.new        { background: var(--primary-bg); color: var(--primary); }
  .status-badge.reviewing  { background: var(--warning-bg); color: var(--warning); }
  .status-badge.interview  { background: rgba(139,92,246,.12); color: #8B5CF6; }
  .status-badge.shortlisted{ background: rgba(59,130,246,.12); color: #3B82F6; }
  .status-badge.accepted   { background: var(--green-bg); color: var(--green); }
  .status-badge.rejected   { background: var(--danger-bg); color: var(--danger); }

  .gpa-cell { font-weight: 700; }
  .gpa-cell.high { color: var(--green); }
  .gpa-cell.mid  { color: var(--warning); }

  /* ── Action Buttons ── */
  .action-btn {
    padding: 6px 11px; border-radius: 7px; font-size: .75rem; font-weight: 600;
    border: 1.5px solid transparent; cursor: pointer; transition: all .2s;
    display: inline-flex; align-items: center; gap: 4px; white-space: nowrap;
  }
  .action-btn.view     { background: var(--primary-bg); color: var(--primary); border-color: rgba(0,177,170,.25); }
  .action-btn.accept   { background: var(--green-bg); color: var(--green); border-color: rgba(16,185,129,.25); }
  .action-btn.reject   { background: var(--danger-bg); color: var(--danger); border-color: rgba(239,68,68,.25); }
  .action-btn.interview{ background: rgba(139,92,246,.12); color: #8B5CF6; border-color: rgba(139,92,246,.25); }
  .action-btn.view:hover     { background: var(--primary); color: #fff; }
  .action-btn.accept:hover   { background: var(--green); color: #fff; }
  .action-btn.reject:hover   { background: var(--danger); color: #fff; }
  .action-btn.interview:hover{ background: #8B5CF6; color: #fff; }
  .action-btns-cell { display: flex; gap: 6px; flex-wrap: wrap; }

  /* ── Pagination ── */
  .pagination { display: flex; align-items: center; justify-content: space-between; margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--border); flex-wrap: wrap; gap: 12px; }
  .pagination-info { font-size: .82rem; color: var(--text-muted); }
  .pagination-btns { display: flex; gap: 6px; }
  .page-btn {
    min-width: 34px; height: 34px; border-radius: 8px; border: 1.5px solid var(--border);
    background: var(--white); cursor: pointer; font-size: .82rem; font-weight: 600;
    color: var(--gray-600); transition: all .2s; display: flex; align-items: center; justify-content: center;
  }
  .page-btn:hover, .page-btn.active { background: var(--primary); color: #fff; border-color: var(--primary); }

  /* ── Modal ── */
  .modal-overlay {
    display: none; position: fixed; inset: 0; background: rgba(0,0,0,.45);
    z-index: 9990; align-items: center; justify-content: center; padding: 20px;
    backdrop-filter: blur(4px);
  }
  .modal-overlay.open { display: flex; animation: fadeIn .2s ease; }
  @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
  .modal-box {
    background: var(--white); border-radius: 20px; padding: 32px;
    width: 100%; max-width: 520px; box-shadow: 0 24px 64px rgba(0,0,0,.2);
    animation: slideUp .25s cubic-bezier(.16,1,.3,1); position: relative;
    max-height: 90vh; overflow-y: auto;
  }
  @keyframes slideUp { from { opacity:0;transform:translateY(20px) scale(.97); } to { opacity:1;transform:none; } }
  .modal-close { position: absolute; top: 16px; right: 16px; width: 32px; height: 32px; border-radius: 8px; background: var(--gray-100); border: none; cursor: pointer; color: var(--gray-600); font-size: 14px; display: flex; align-items: center; justify-content: center; transition: all .2s; }
  .modal-close:hover { background: var(--danger-bg); color: var(--danger); }
  .modal-header { display: flex; align-items: center; gap: 16px; margin-bottom: 24px; }
  .modal-avatar-lg { width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; font-weight: 800; color: #fff; flex-shrink: 0; }
  .modal-info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; }
  .modal-field { background: var(--gray-50); border-radius: 10px; padding: 12px; }
  .modal-field-label { font-size: .7rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: .04em; }
  .modal-field-value { font-size: .9rem; font-weight: 600; color: var(--gray-800); margin-top: 4px; }
  .modal-actions { display: flex; gap: 10px; flex-wrap: wrap; }
  .modal-actions button { flex: 1; min-width: 100px; padding: 12px; border-radius: 10px; font-size: .87rem; font-weight: 700; border: none; cursor: pointer; transition: all .2s; display: flex; align-items: center; justify-content: center; gap: 6px; }
  .btn-accept  { background: var(--green-bg); color: var(--green); }
  .btn-accept:hover  { background: var(--green); color: #fff; }
  .btn-reject  { background: var(--danger-bg); color: var(--danger); }
  .btn-reject:hover  { background: var(--danger); color: #fff; }
  .btn-interview-modal { background: rgba(139,92,246,.12); color: #8B5CF6; }
  .btn-interview-modal:hover { background: #8B5CF6; color: #fff; }
  .modal-divider { height: 1px; background: var(--gray-100); margin: 18px 0; }
  .cover-letter-preview { background: var(--gray-50); border-radius: 10px; padding: 14px; font-size: .83rem; color: var(--gray-600); line-height: 1.6; max-height: 120px; overflow-y: auto; }

  /* ── Responsive ── */
  @media (max-width: 900px) {
    .stats-row { grid-template-columns: repeat(3, 1fr); }
  }
  @media (max-width: 600px) {
    .stats-row { grid-template-columns: repeat(2, 1fr); }
    .action-btn span { display: none; }
    .filter-bar input { min-width: 140px; }
    .modal-info-grid { grid-template-columns: 1fr; }
    thead th:nth-child(3), tbody td:nth-child(3),
    thead th:nth-child(4), tbody td:nth-child(4) { display: none; }
  }
</style>

<!-- Stats -->
<div class="stats-row">
  @php
    $total = $applications->count();
    $new = $applications->where('status', 'new')->count();
    $reviewing = $applications->where('status', 'reviewing')->count();
    $shortlisted = $applications->where('status', 'shortlisted')->count();
    $rejected = $applications->where('status', 'rejected')->count();
  @endphp
  <div class="stat-mini total">
    <div class="stat-mini-icon blue"><i class="fas fa-users"></i></div>
    <div class="stat-mini-value">{{ $total }}</div>
    <div class="stat-mini-label">Total</div>
  </div>
  <div class="stat-mini new">
    <div class="stat-mini-icon green"><i class="fas fa-user-plus"></i></div>
    <div class="stat-mini-value">{{ $new }}</div>
    <div class="stat-mini-label">New</div>
  </div>
  <div class="stat-mini review">
    <div class="stat-mini-icon orange"><i class="fas fa-hourglass-half"></i></div>
    <div class="stat-mini-value">{{ $reviewing }}</div>
    <div class="stat-mini-label">Reviewing</div>
  </div>
  <div class="stat-mini short">
    <div class="stat-mini-icon purple"><i class="fas fa-star"></i></div>
    <div class="stat-mini-value">{{ $shortlisted }}</div>
    <div class="stat-mini-label">Shortlisted</div>
  </div>
  <div class="stat-mini other">
    <div class="stat-mini-icon red"><i class="fas fa-times-circle"></i></div>
    <div class="stat-mini-value">{{ $rejected }}</div>
    <div class="stat-mini-label">Rejected</div>
  </div>
</div>


<!-- Filters -->
<div class="filter-bar">
  <input type="text" id="searchInput" placeholder="🔍  Search by name, email or role..." oninput="filterTable()" />
  <select id="statusFilter" onchange="filterTable()">
    <option value="">All Statuses</option>
    <option>New</option>
    <option>Reviewing</option>
    <option>Interview</option>
    <option>Shortlisted</option>
    <option>Accepted</option>
    <option>Rejected</option>
  </select>
  <select id="roleFilter" onchange="filterTable()">
    <option value="">All Roles</option>
    <option>Software Development Intern</option>
    <option>Marketing Coordinator</option>
    <option>Backend Developer Intern</option>
    <option>UI/UX Design Intern</option>
    <option>Data Analyst Intern</option>
  </select>
</div>

<!-- Table Card -->
<div class="card">
  <div class="card-header-row">
    <h2 class="card-title"><i class="fas fa-users"></i> Applicants</h2>
    <span class="results-note" id="resultsNote">Showing all applicants</span>
  </div>
  <div class="table-wrap">
    <table id="applicantsTable">
      <thead>
        <tr>
          <th>Applicant</th>
          <th>University</th>
          <th>Role</th>
          <th>Applied</th>
          <th>GPA</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
            <tbody id="applicantsBody">
        @forelse($applications as $app)
        @php
            $initials = strtoupper(substr($app->user->name, 0, 2));
            $s = ucfirst($app->status ?? 'new');
            $statusClass = [
                'New' => 'new',
                'Reviewing' => 'reviewing',
                'Interview' => 'interview',
                'Shortlisted' => 'shortlisted',
                'Accepted' => 'accepted',
                'Rejected' => 'rejected'
            ][$s] ?? 'new';
            $resolved = in_array($s, ['Accepted', 'Rejected']);
        @endphp
        <tr>
          <td>
            <div class="applicant-cell">
              <div class="applicant-avatar" style="background:var(--primary-bg);color:var(--primary);">{{ $initials }}</div>
              <div><div class="applicant-name">{{ $app->user->name }}</div><div class="applicant-email">{{ $app->user->email }}</div></div>
            </div>
          </td>
          <td>{{ $app->user->userInfo->university ?? 'N/A' }}</td>
          <td>{{ $app->internship->title }}</td>
          <td>{{ $app->created_at->format('M j, Y') }}</td>
          <td><span class="gpa-cell {{ ($app->user->userInfo->gpa ?? 0) >= 3.5 ? 'high' : 'mid' }}">{{ $app->user->userInfo->gpa ?? 'N/A' }}</span></td>
          <td><span class="status-badge {{ $statusClass }}">{{ $s }}</span></td>
          <td>
            <div class="action-btns-cell">
              <button class="action-btn view" wire:click="viewApplicant({{ $app->id }})"><i class="fas fa-eye"></i> <span>View</span></button>
              @if(!$resolved)
              <button class="action-btn accept" wire:click="updateStatus({{ $app->id }}, 'accepted')"><i class="fas fa-check"></i> <span>Accept</span></button>
              <button class="action-btn reject" wire:click="updateStatus({{ $app->id }}, 'rejected')"><i class="fas fa-times"></i> <span>Reject</span></button>
              @else
                @if($s === 'Accepted')
                <a href="{{ route('company.interviews', ['company' => auth()->user()->company->slug ?? 'internlink-demo']) }}" class="action-btn interview" style="text-decoration: none;">
                  <i class="fas fa-calendar"></i> <span>Interview</span>
                </a>
                <a href="{{ route('company.send-offer', ['company' => auth()->user()->company->slug ?? 'internlink-demo', 'intern' => $app->user_id]) }}" class="action-btn" style="background: var(--primary-bg); color: var(--primary); border: 1.5px solid rgba(0, 177, 170, 0.25); text-decoration: none;">
                  <i class="fas fa-gift"></i> <span>Offer</span>
                </a>
                @endif
              @endif
            </div>
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align:center;padding:48px 24px;">
                <div style="font-size:15px;font-weight:600;color:var(--gray-500);">No applicants found</div>
            </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="pagination">
    <div class="pagination-info" id="paginationInfo">Showing 1–8 of 47 applicants</div>
    <div class="pagination-btns">
      <button class="page-btn" onclick="showToast('Previous page','info')"><i class="fas fa-chevron-left" style="font-size:.7rem;"></i></button>
      <button class="page-btn active">1</button>
      <button class="page-btn" onclick="showToast('Loading page 2...','info')">2</button>
      <button class="page-btn" onclick="showToast('Loading page 3...','info')">3</button>
      <button class="page-btn" onclick="showToast('Next page','info')"><i class="fas fa-chevron-right" style="font-size:.7rem;"></i></button>
    </div>
  </div>
</div>

<!-- Applicant Detail Modal -->
@if($showApplicantModal && $selectedApplicant)
@php
    $app = $selectedApplicant;
    $initials = strtoupper(substr($app->user->name, 0, 2));
    $s = ucfirst($app->status ?? 'new');
    $statusClass = [
        'New' => 'new',
        'Reviewing' => 'reviewing',
        'Interview' => 'interview',
        'Shortlisted' => 'shortlisted',
        'Accepted' => 'accepted',
        'Rejected' => 'rejected'
    ][$s] ?? 'new';
    $resolved = in_array($s, ['Accepted', 'Rejected']);
@endphp
<template x-teleport="body">
<div class="modal-overlay open" style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:99999;align-items:center;justify-content:center;padding:20px;backdrop-filter:blur(5px);">
  <div class="modal-box" style="transform:none;opacity:1;">
    <button class="modal-close" wire:click="closeModal"><i class="fas fa-xmark"></i></button>
    <div class="modal-header">
      <div class="modal-avatar-lg" style="background:var(--primary-bg);color:var(--primary);">{{ $initials }}</div>
      <div>
        <div style="font-size:1.1rem;font-weight:800;color:var(--gray-900);">{{ $app->user->name }}</div>
        <div style="font-size:.83rem;color:var(--text-muted);margin-top:4px;">{{ $app->internship->title }}</div>
        <span class="status-badge {{ $statusClass }}" style="margin-top:8px;display:inline-flex;">{{ $s }}</span>
      </div>
    </div>
    <div class="modal-info-grid">
      <div class="modal-field"><div class="modal-field-label">University</div><div class="modal-field-value">{{ $app->user->userInfo->university ?? 'N/A' }}</div></div>
      <div class="modal-field"><div class="modal-field-label">GPA</div><div class="modal-field-value">{{ $app->user->userInfo->gpa ?? 'N/A' }}</div></div>
      <div class="modal-field"><div class="modal-field-label">Email</div><div class="modal-field-value">{{ $app->user->email }}</div></div>
      <div class="modal-field"><div class="modal-field-label">Applied Date</div><div class="modal-field-value">{{ $app->created_at->format('M j, Y') }}</div></div>
    </div>
    <div class="modal-divider"></div>
    <div style="font-size:.8rem;font-weight:700;color:var(--gray-700);margin-bottom:8px;text-transform:uppercase;letter-spacing:.04em;">Cover Letter Preview</div>
    <div class="cover-letter-preview">{{ $app->cover_letter ?? 'No cover letter provided.' }}</div>
    <div class="modal-divider"></div>
    <div class="modal-actions" style="display: flex; flex-direction: column; gap: 12px; width: 100%;">
        @if($resolved)
            <div style="color:var(--text-muted);font-size:.85rem;text-align:center;width:100%;padding:8px; display: flex; flex-direction: column; gap: 10px; align-items: center;">
                <div>This application has been <strong>{{ $s }}</strong>.</div>
                @if($s === 'Accepted')
                <div style="display: flex; gap: 10px; width: 100%; justify-content: center;">
                    <a href="{{ route('company.interviews', ['company' => auth()->user()->company->slug ?? 'internlink-demo']) }}" style="background: rgba(139, 92, 246, 0.1); color: #8B5CF6; border: 1.5px solid rgba(139, 92, 246, 0.2); padding: 8px 16px; border-radius: 8px; display: inline-flex; align-items: center; gap: 6px; font-weight: 700; cursor: pointer; text-decoration: none;">
                      <i class="fas fa-calendar"></i> <span>Schedule Interview</span>
                    </a>
                    <a href="{{ route('company.send-offer', ['company' => auth()->user()->company->slug ?? 'internlink-demo', 'intern' => $app->user_id]) }}" class="action-btn" style="background: var(--primary-bg); color: var(--primary); border: 1.5px solid rgba(0, 177, 170, 0.25); padding: 8px 16px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 700; cursor: pointer;">
                      <i class="fas fa-gift"></i> Send Offer
                    </a>
                </div>
                @endif
            </div>
        @else
            <div style="display: flex; gap: 10px; width: 100%;">
                <button class="btn-accept" wire:click="updateStatus({{ $app->id }}, 'accepted')" style="flex: 1;"><i class="fas fa-check"></i> Accept</button>
                <button class="btn-reject" wire:click="updateStatus({{ $app->id }}, 'rejected')" style="flex: 1;"><i class="fas fa-times"></i> Reject</button>
            </div>
        @endif
    </div>
  </div>
</div>
</template>
@endif

</div>
