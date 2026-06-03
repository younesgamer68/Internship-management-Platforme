<div>
<style>
  .page-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:24px; flex-wrap:wrap; gap:12px; }
  .page-header p { margin:0; color:var(--text-muted); font-size:.9rem; }
  .btn-primary { background:var(--primary); color:#fff; border:none; border-radius:10px; padding:10px 20px; font-size:.88rem; font-weight:700; cursor:pointer; display:inline-flex; align-items:center; gap:8px; transition:all .2s; }
  .btn-primary:hover { background:var(--primary-dark); transform:translateY(-1px); box-shadow:0 4px 12px rgba(0,177,170,.3); }

  .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; margin-bottom:24px; }
  .stat-mini { background:var(--white); border-radius:12px; padding:16px; box-shadow:var(--shadow-sm); border:1px solid var(--border); transition:var(--transition); }
  .stat-mini:hover { box-shadow:var(--shadow); transform:translateY(-2px); }
  .stat-mini-icon { width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:.9rem; margin-bottom:10px; }
  .stat-mini-icon.blue   { background:var(--primary-bg); color:var(--primary); }
  .stat-mini-icon.green  { background:var(--green-bg); color:var(--green); }
  .stat-mini-icon.orange { background:var(--warning-bg); color:var(--warning); }
  .stat-mini-icon.purple { background:rgba(139,92,246,.12); color:#8B5CF6; }
  .stat-mini-value { font-size:1.6rem; font-weight:800; color:var(--gray-900); }
  .stat-mini-label { font-size:.75rem; color:var(--text-muted); margin-top:4px; font-weight:500; }

  .card { background:var(--white); border-radius:14px; padding:24px; box-shadow:var(--shadow-sm); border:1px solid var(--border); margin-bottom:22px; transition:var(--transition); }
  .card:hover { box-shadow:var(--shadow); }
  .card-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; padding-bottom:14px; border-bottom:1px solid var(--gray-100); }
  .card-title { font-size:1rem; font-weight:700; margin:0; color:var(--gray-900); display:flex; align-items:center; gap:8px; }
  .card-title i { color:var(--primary); }

  /* Interview Slot */
  .interview-slot {
    display:flex; gap:16px; align-items:flex-start; padding:18px;
    border-radius:12px; border:1px solid var(--border); margin-bottom:12px;
    background:var(--white); transition:all .2s; position:relative; overflow:hidden;
  }
  .interview-slot::before { content:''; position:absolute; left:0; top:0; bottom:0; width:3px; background:var(--primary); border-radius:3px 0 0 3px; }
  .interview-slot:hover { box-shadow:var(--shadow); transform:translateY(-2px); border-color:var(--primary); }
  .interview-slot:last-child { margin-bottom:0; }
  .interview-date-box { background:var(--primary-bg); color:var(--primary); border-radius:12px; padding:10px 14px; text-align:center; flex-shrink:0; min-width:56px; }
  .interview-date-box .day { font-size:1.3rem; font-weight:800; line-height:1; }
  .interview-date-box .mon { font-size:.68rem; font-weight:700; text-transform:uppercase; margin-top:2px; opacity:.8; }
  .interview-info { flex:1; min-width:0; }
  .interview-name { font-weight:700; font-size:.95rem; color:var(--gray-900); }
  .interview-role { font-size:.78rem; color:var(--text-muted); margin-top:3px; }
  .interview-meta { display:flex; flex-wrap:wrap; gap:10px; margin-top:8px; }
  .interview-meta span { font-size:.76rem; color:var(--gray-600); display:inline-flex; align-items:center; gap:5px; }
  .interview-right { display:flex; flex-direction:column; align-items:flex-end; gap:8px; flex-shrink:0; }
  .interview-actions { display:flex; gap:6px; flex-wrap:wrap; justify-content:flex-end; }

  .type-badge { display:inline-flex; align-items:center; gap:4px; padding:4px 10px; border-radius:20px; font-size:.72rem; font-weight:700; }
  .type-badge.video     { background:var(--primary-bg); color:var(--primary); }
  .type-badge.in-person { background:rgba(139,92,246,.12); color:#8B5CF6; }
  .type-badge.phone     { background:var(--warning-bg); color:var(--warning); }

  .status-badge { display:inline-flex; align-items:center; gap:4px; padding:4px 10px; border-radius:20px; font-size:.71rem; font-weight:700; }
  .status-badge.confirmed  { background:var(--green-bg); color:var(--green); }
  .status-badge.scheduled  { background:var(--primary-bg); color:var(--primary); }
  .status-badge.pending    { background:var(--warning-bg); color:var(--warning); }
  .status-badge.completed  { background:var(--gray-100); color:var(--gray-600); }

  .action-btn { padding:6px 12px; border-radius:7px; font-size:.75rem; font-weight:600; border:1.5px solid transparent; cursor:pointer; transition:all .2s; display:inline-flex; align-items:center; gap:4px; white-space:nowrap; }
  .action-btn.edit    { background:var(--gray-100); color:var(--gray-700); }
  .action-btn.join    { background:var(--primary-bg); color:var(--primary); border-color:rgba(0,177,170,.25); }
  .action-btn.remind  { background:var(--warning-bg); color:var(--warning); border-color:rgba(245,158,11,.25); }
  .action-btn.edit:hover   { background:var(--gray-200); }
  .action-btn.join:hover   { background:var(--primary); color:#fff; }
  .action-btn.remind:hover { background:var(--warning); color:#fff; }

  /* Completed table */
  .table-wrap { overflow-x:auto; }
  table { width:100%; border-collapse:collapse; }
  thead th { text-align:left; font-size:.73rem; font-weight:700; text-transform:uppercase; color:var(--text-muted); padding:10px 14px; border-bottom:2px solid var(--border); letter-spacing:.04em; white-space:nowrap; }
  tbody td { padding:13px 14px; font-size:.87rem; border-bottom:1px solid var(--border); vertical-align:middle; color:var(--gray-700); }
  tbody tr:last-child td { border-bottom:none; }
  tbody tr { transition:background .15s; }
  tbody tr:hover { background:var(--primary-bg); }
  .applicant-cell { display:flex; align-items:center; gap:10px; }
  .applicant-avatar { width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:.78rem; flex-shrink:0; }
  .rating { color:var(--warning); font-size:.85rem; }

  /* Modal */
  .modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.45); z-index:9990; align-items:center; justify-content:center; padding:20px; -webkit-backdrop-filter:blur(8px); backdrop-filter:blur(8px); }
  .modal-overlay.open { display:flex; animation:fadeIn .2s ease; }
  @keyframes fadeIn { from{opacity:0} to{opacity:1} }
  .modal-box { background:var(--white); border-radius:20px; padding:32px; width:100%; max-width:500px; box-shadow:0 24px 64px rgba(0,0,0,.2); animation:slideUp .25s cubic-bezier(.16,1,.3,1); position:relative; max-height:90vh; overflow-y:auto; }
  @keyframes slideUp { from{opacity:0;transform:translateY(20px) scale(.97)} to{opacity:1;transform:none} }
  .modal-close { position:absolute; top:16px; right:16px; width:32px; height:32px; border-radius:8px; background:var(--gray-100); border:none; cursor:pointer; color:var(--gray-600); font-size:14px; display:flex; align-items:center; justify-content:center; transition:all .2s; }
  .modal-close:hover { background:var(--danger-bg); color:var(--danger); }
  .modal-title { font-size:1.1rem; font-weight:800; color:var(--gray-900); margin-bottom:20px; }
  .form-group { margin-bottom:16px; }
  .form-label { display:block; font-size:.8rem; font-weight:700; color:var(--gray-700); margin-bottom:6px; }
  .form-control { width:100%; padding:10px 14px; border:1.5px solid var(--border); border-radius:9px; font-size:.88rem; background:var(--gray-50); color:inherit; outline:none; transition:border-color .2s; font-family:inherit; box-sizing:border-box; }
  .form-control:focus { border-color:var(--primary); background:var(--white); }
  .form-row { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
  .modal-footer { display:flex; gap:10px; margin-top:22px; }
  .modal-footer button { flex:1; padding:12px; border-radius:10px; font-size:.88rem; font-weight:700; border:none; cursor:pointer; transition:all .2s; }
  .btn-save { background:var(--primary); color:#fff; }
  .btn-save:hover { background:var(--primary-dark); }
  .btn-cancel-modal { background:var(--gray-100); color:var(--gray-700); }
  .btn-cancel-modal:hover { background:var(--gray-200); }

  @media (max-width:900px) { .stats-row { grid-template-columns:repeat(2,1fr); } }
  @media (max-width:600px) {
    .interview-right { flex-direction:row; flex-wrap:wrap; justify-content:flex-start; }
    .interview-slot { flex-wrap:wrap; }
    .stats-row { grid-template-columns:repeat(2,1fr); }
    .form-row { grid-template-columns:1fr; }
    thead th:nth-child(4),tbody td:nth-child(4),
    thead th:nth-child(5),tbody td:nth-child(5) { display:none; }
  }
</style>

<!-- Header -->
<div class="page-header">
  <p>Manage and track all candidate interviews</p>
  <button class="btn-primary" onclick="openScheduleModal()"><i class="fas fa-plus"></i> Schedule Interview</button>
</div>

<!-- Stats -->
<div class="stats-row">
  <div class="stat-mini">
    <div class="stat-mini-icon blue"><i class="fas fa-calendar-check"></i></div>
    <div class="stat-mini-value" id="statTotal">{{ $interviews->count() }}</div>
    <div class="stat-mini-label">Upcoming</div>
  </div>
  <div class="stat-mini">
    <div class="stat-mini-icon green"><i class="fas fa-circle-check"></i></div>
    <div class="stat-mini-value">0</div>
    <div class="stat-mini-label">Completed</div>
  </div>
  <div class="stat-mini">
    <div class="stat-mini-icon orange"><i class="fas fa-hourglass-half"></i></div>
    <div class="stat-mini-value">0</div>
    <div class="stat-mini-label">Pending Confirm</div>
  </div>
  <div class="stat-mini">
    <div class="stat-mini-icon purple"><i class="fas fa-video"></i></div>
    <div class="stat-mini-value">{{ $interviews->count() }}</div>
    <div class="stat-mini-label">Video Calls</div>
  </div>
</div>


<!-- Upcoming Interviews -->
<div class="card">
  <div class="card-header">
    <h2 class="card-title"><i class="fas fa-calendar-alt"></i> Upcoming Interviews</h2>
  </div>
    <div id="upcomingContainer">
    @forelse($interviews as $iv)
    <div class="interview-slot">
      <div class="interview-date-box">
        <div class="day">{{ $iv->updated_at->format('d') }}</div>
        <div class="mon">{{ $iv->updated_at->format('M') }}</div>
      </div>
      <div class="interview-info">
        <div class="interview-name">{{ $iv->user->name }}</div>
        <div class="interview-role">{{ $iv->internship->title }}</div>
        <div class="interview-meta">
          <span><i class="fas fa-envelope"></i> {{ $iv->user->email }}</span>
          <span><i class="fas fa-layer-group"></i> Interview Round</span>
        </div>
      </div>
      <div class="interview-right">
        <span class="type-badge video"><i class="fas fa-video"></i> Video Call</span>
        <span class="status-badge scheduled">Scheduled</span>
        <div class="interview-actions">
          <button class="action-btn join" wire:click="viewInterview({{ $iv->id }})"><i class="fas fa-eye"></i> View Application</button>
          <button class="action-btn remind" wire:click="updateStatus({{ $iv->id }}, 'accepted')"><i class="fas fa-check"></i> Accept</button>
        </div>
      </div>
    </div>
    @empty
    <div style="text-align:center;padding:32px;color:var(--text-muted);">No upcoming interviews. Schedule one by reviewing your applicants.</div>
    @endforelse
  </div>
</div>

<!-- Completed Interviews -->
<div class="card">
  <div class="card-header">
    <h2 class="card-title"><i class="fas fa-circle-check" style="color:var(--green);"></i> Completed Interviews</h2>
    <span style="font-size:.82rem;color:var(--text-muted);">Last 30 days</span>
  </div>
  <div class="table-wrap">
    <table>
      <thead>
        <tr><th>Candidate</th><th>Role</th><th>Date</th><th>Type</th><th>Interviewer</th><th>Rating</th><th>Outcome</th></tr>
      </thead>
      <tbody>
        <tr>
          <td><div class="applicant-cell"><div class="applicant-avatar" style="background:var(--primary-bg);color:var(--primary);">RK</div><span style="font-weight:600;">Rachel Kim</span></div></td>
          <td>Software Development Intern</td><td>May 15, 2026</td>
          <td><span class="type-badge video"><i class="fas fa-video"></i> Video</span></td>
          <td>Sarah Mitchell</td>
          <td><div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div></td>
          <td><span class="status-badge confirmed">Advanced</span></td>
        </tr>
        <tr>
          <td><div class="applicant-cell"><div class="applicant-avatar" style="background:var(--warning-bg);color:var(--warning);">TP</div><span style="font-weight:600;">Tom Pierce</span></div></td>
          <td>Marketing Coordinator</td><td>May 12, 2026</td>
          <td><span class="type-badge in-person"><i class="fas fa-building"></i> In-Person</span></td>
          <td>Lisa Chen</td>
          <td><div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div></td>
          <td><span class="status-badge completed">On Hold</span></td>
        </tr>
        <tr>
          <td><div class="applicant-cell"><div class="applicant-avatar" style="background:var(--green-bg);color:var(--green);">VN</div><span style="font-weight:600;">Valentina Novak</span></div></td>
          <td>Data Analyst Intern</td><td>May 8, 2026</td>
          <td><span class="type-badge video"><i class="fas fa-video"></i> Video</span></td>
          <td>Janet Collins</td>
          <td><div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div></td>
          <td><span class="status-badge confirmed">Hired</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Applicant Detail Modal -->
@if($showInterviewModal && $selectedInterview)
@php
    $app = $selectedInterview;
    $initials = strtoupper(substr($app->user->name, 0, 2));
@endphp
<div class="modal-overlay open">
  <div class="modal-box" style="max-width:600px; margin:auto;">
    <button class="modal-close" wire:click="closeModal"><i class="fas fa-xmark"></i></button>
    <div style="font-size:1.1rem;font-weight:800;color:var(--gray-900);margin-bottom:20px;">Applicant Interview Details</div>
    
    <div style="display:flex;gap:16px;margin-bottom:20px;align-items:center;">
        <div style="width:60px;height:60px;border-radius:50%;background:var(--primary-bg);color:var(--primary);display:flex;align-items:center;justify-content:center;font-size:1.3rem;font-weight:800;">{{ $initials }}</div>
        <div>
            <div style="font-weight:700;font-size:1.1rem;">{{ $app->user->name }}</div>
            <div style="font-size:.85rem;color:var(--text-muted);">{{ $app->user->email }}</div>
            <div style="font-size:.85rem;color:var(--text-muted);">Applying for: {{ $app->internship->title }}</div>
        </div>
    </div>
    
    <div style="background:var(--gray-50);padding:16px;border-radius:12px;margin-bottom:20px;">
        <div style="font-size:.8rem;font-weight:700;color:var(--gray-700);margin-bottom:8px;text-transform:uppercase;letter-spacing:.04em;">Cover Letter</div>
        <div style="font-size:.85rem;color:var(--gray-600);line-height:1.5;">{{ $app->cover_letter ?? 'No cover letter provided.' }}</div>
    </div>

    <div style="display:flex;gap:10px;margin-top:22px;">
      <button wire:click="closeModal" style="flex:1;padding:12px;border-radius:10px;font-size:.88rem;font-weight:700;border:none;cursor:pointer;background:var(--gray-100);color:var(--gray-700);">Close</button>
      <button wire:click="updateStatus({{ $app->id }}, 'rejected')" style="flex:1;padding:12px;border-radius:10px;font-size:.88rem;font-weight:700;border:none;cursor:pointer;background:var(--danger-bg);color:var(--danger);">Reject</button>
      <button wire:click="updateStatus({{ $app->id }}, 'accepted')" style="flex:1;padding:12px;border-radius:10px;font-size:.88rem;font-weight:700;border:none;cursor:pointer;background:var(--primary);color:#fff;">Accept Candidate</button>
    </div>
  </div>
</div>
@endif


</div>
