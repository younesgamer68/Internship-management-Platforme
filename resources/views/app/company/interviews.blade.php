<x-layouts::app :title="__('Interviews')">
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
  .modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.45); z-index:9990; align-items:center; justify-content:center; padding:20px; backdrop-filter:blur(4px); }
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
    <div class="stat-mini-value" id="statTotal">5</div>
    <div class="stat-mini-label">Upcoming</div>
  </div>
  <div class="stat-mini">
    <div class="stat-mini-icon green"><i class="fas fa-circle-check"></i></div>
    <div class="stat-mini-value">12</div>
    <div class="stat-mini-label">Completed</div>
  </div>
  <div class="stat-mini">
    <div class="stat-mini-icon orange"><i class="fas fa-hourglass-half"></i></div>
    <div class="stat-mini-value">3</div>
    <div class="stat-mini-label">Pending Confirm</div>
  </div>
  <div class="stat-mini">
    <div class="stat-mini-icon purple"><i class="fas fa-video"></i></div>
    <div class="stat-mini-value">3</div>
    <div class="stat-mini-label">Video Calls</div>
  </div>
</div>

<!-- Upcoming Interviews -->
<div class="card">
  <div class="card-header">
    <h2 class="card-title"><i class="fas fa-calendar-alt"></i> Upcoming Interviews</h2>
  </div>
  <div id="upcomingContainer">
    <!-- Rendered by JS -->
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

<!-- Schedule / Edit Modal -->
<div class="modal-overlay" id="scheduleModal">
  <div class="modal-box">
    <button class="modal-close" onclick="closeScheduleModal()"><i class="fas fa-xmark"></i></button>
    <div class="modal-title" id="scheduleModalTitle">Schedule Interview</div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Candidate Name</label>
        <input class="form-control" id="fCandidate" placeholder="e.g. Alex Johnson" />
      </div>
      <div class="form-group">
        <label class="form-label">Role</label>
        <input class="form-control" id="fRole" placeholder="e.g. Software Dev Intern" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Date</label>
        <input type="date" class="form-control" id="fDate" />
      </div>
      <div class="form-group">
        <label class="form-label">Time</label>
        <input type="time" class="form-control" id="fTime" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Interviewer</label>
        <input class="form-control" id="fInterviewer" placeholder="e.g. Sarah Mitchell" />
      </div>
      <div class="form-group">
        <label class="form-label">Type</label>
        <select class="form-control" id="fType">
          <option value="video">Video Call</option>
          <option value="in-person">In-Person</option>
          <option value="phone">Phone</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Round</label>
      <input class="form-control" id="fRound" placeholder="e.g. Round 1 – Technical" />
    </div>
    <div class="modal-footer">
      <button class="btn-cancel-modal" onclick="closeScheduleModal()">Cancel</button>
      <button class="btn-save" onclick="saveInterview()"><i class="fas fa-check"></i> Save Interview</button>
    </div>
  </div>
</div>

<script>
const TYPE_ICONS = { video: 'fa-video', 'in-person': 'fa-building', phone: 'fa-phone' };
const TYPE_CLASS = { video: 'video', 'in-person': 'in-person', phone: 'phone' };
const TYPE_LABELS = { video: 'Video Call', 'in-person': 'In-Person', phone: 'Phone' };

let interviews = JSON.parse(localStorage.getItem('interviews') || 'null') || [
  { id:1, candidate:'Alex Johnson',  role:'Software Development Intern', day:24, mon:'May', time:'10:00 AM – 11:00 AM', interviewer:'Sarah Mitchell', round:'Round 1 – Technical',  type:'video',     status:'confirmed' },
  { id:2, candidate:'Maria Garcia',  role:'Marketing Coordinator',        day:24, mon:'May', time:'1:00 PM – 1:45 PM',  interviewer:'Lisa Chen',      round:'Round 1 – HR Screen', type:'phone',     status:'scheduled' },
  { id:3, candidate:'James Wilson',  role:'Backend Developer Intern',     day:25, mon:'May', time:'2:30 PM – 3:30 PM',  interviewer:'Mark Reynolds',  round:'Round 2 – System Design', type:'video', status:'confirmed' },
  { id:4, candidate:'Priya Sharma',  role:'Data Analyst Intern',          day:27, mon:'May', time:'11:00 AM – 11:45 AM',interviewer:'Janet Collins',  round:'Round 1 – Case Study', type:'in-person', status:'pending' },
  { id:5, candidate:'Nina Kowalski', role:'Marketing Coordinator',        day:29, mon:'May', time:'3:00 PM – 3:45 PM',  interviewer:'Lisa Chen',      round:'Round 1 – HR Screen', type:'phone',     status:'pending' },
];
let editingId = null;

function saveInterviewsToStorage() { localStorage.setItem('interviews', JSON.stringify(interviews)); }

function renderUpcoming() {
  const container = document.getElementById('upcomingContainer');
  if (!interviews.length) { container.innerHTML = '<div style="text-align:center;padding:32px;color:var(--text-muted);">No upcoming interviews. Schedule one above.</div>'; return; }
  container.innerHTML = interviews.map(iv => {
    const typeIcon = TYPE_ICONS[iv.type] || 'fa-video';
    const typeClass = TYPE_CLASS[iv.type] || 'video';
    const typeLabel = TYPE_LABELS[iv.type] || 'Video Call';
    const statusClass = iv.status;
    const statusLabel = iv.status.charAt(0).toUpperCase() + iv.status.slice(1);
    const isJoin = iv.type === 'video' || iv.type === 'phone';
    return `
    <div class="interview-slot">
      <div class="interview-date-box"><div class="day">${iv.day}</div><div class="mon">${iv.mon}</div></div>
      <div class="interview-info">
        <div class="interview-name">${iv.candidate}</div>
        <div class="interview-role">${iv.role}</div>
        <div class="interview-meta">
          <span><i class="fas fa-clock"></i> ${iv.time}</span>
          <span><i class="fas fa-user-tie"></i> ${iv.interviewer}</span>
          <span><i class="fas fa-layer-group"></i> ${iv.round}</span>
        </div>
      </div>
      <div class="interview-right">
        <span class="type-badge ${typeClass}"><i class="fas ${typeIcon}"></i> ${typeLabel}</span>
        <span class="status-badge ${statusClass}">${statusLabel}</span>
        <div class="interview-actions">
          <button class="action-btn edit" onclick="openEditModal(${iv.id})"><i class="fas fa-pen"></i> Edit</button>
          ${isJoin
            ? `<button class="action-btn join" onclick="joinInterview('${iv.candidate}')"><i class="fas fa-link"></i> Join</button>`
            : `<button class="action-btn remind" onclick="sendReminder('${iv.candidate}')"><i class="fas fa-bell"></i> Remind</button>`}
        </div>
      </div>
    </div>`;
  }).join('');
  document.getElementById('statTotal').textContent = interviews.length;
}

function joinInterview(name) {
  showToast('Opening video call with ' + name, 'info');
}
function sendReminder(name) {
  showToast('Reminder sent to ' + name, 'success');
}

let nextId = 100;
function openScheduleModal() {
  editingId = null;
  document.getElementById('scheduleModalTitle').textContent = 'Schedule Interview';
  ['fCandidate','fRole','fInterviewer','fRound'].forEach(id => document.getElementById(id).value = '');
  document.getElementById('fDate').value = '';
  document.getElementById('fTime').value = '';
  document.getElementById('fType').value = 'video';
  document.getElementById('scheduleModal').classList.add('open');
}

function openEditModal(id) {
  const iv = interviews.find(i => i.id === id);
  if (!iv) return;
  editingId = id;
  document.getElementById('scheduleModalTitle').textContent = 'Edit Interview';
  document.getElementById('fCandidate').value = iv.candidate;
  document.getElementById('fRole').value = iv.role;
  document.getElementById('fInterviewer').value = iv.interviewer;
  document.getElementById('fRound').value = iv.round;
  document.getElementById('fType').value = iv.type;
  document.getElementById('scheduleModal').classList.add('open');
}

function closeScheduleModal() { document.getElementById('scheduleModal').classList.remove('open'); }

function saveInterview() {
  const candidate = document.getElementById('fCandidate').value.trim();
  const role = document.getElementById('fRole').value.trim();
  if (!candidate || !role) { showToast('Please fill in candidate name and role.','danger'); return; }
  const dateVal = document.getElementById('fDate').value;
  const timeVal = document.getElementById('fTime').value;
  const day = dateVal ? new Date(dateVal).getDate() : '—';
  const mon = dateVal ? new Date(dateVal).toLocaleString('en', {month:'short'}) : '—';
  const timeStr = timeVal ? timeVal : '—';
  const type = document.getElementById('fType').value;

  if (editingId) {
    const idx = interviews.findIndex(i => i.id === editingId);
    if (idx > -1) {
      interviews[idx] = { ...interviews[idx], candidate, role, day, mon, time: timeStr, interviewer: document.getElementById('fInterviewer').value || interviews[idx].interviewer, round: document.getElementById('fRound').value || interviews[idx].round, type };
      showToast('Interview for ' + candidate + ' updated', 'success');
    }
  } else {
    interviews.push({ id: nextId++, candidate, role, day, mon, time: timeStr, interviewer: document.getElementById('fInterviewer').value || 'TBD', round: document.getElementById('fRound').value || 'Round 1', type, status: 'scheduled' });
    showToast('Interview scheduled for ' + candidate, 'success');
  }
  saveInterviewsToStorage();
  closeScheduleModal();
  renderUpcoming();
}

function showToast(msg, type) { if (window.showGlobalToast) showGlobalToast(msg, type); }
document.getElementById('scheduleModal').addEventListener('click', function(e) { if (e.target === this) closeScheduleModal(); });

renderUpcoming();
</script>
</x-layouts::app>
