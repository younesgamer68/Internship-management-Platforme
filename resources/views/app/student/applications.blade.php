<x-layouts::student title="My Applications">
@php $slug = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp

<style>
/* ─── Page Header ─── */
.page-header-banner {
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 55%, #4f46e5 100%);
  border-radius: 20px; padding: 28px 32px; margin-bottom: 24px;
  position: relative; overflow: hidden; color: #fff;
  box-shadow: 0 8px 24px -4px rgba(0,177,170,0.25);
}
.page-header-banner::before {
  content: ''; position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='0.05'%3E%3Crect x='10' y='10' width='40' height='40'/%3E%3C/g%3E%3C/svg%3E");
}
.page-header-content { position: relative; z-index: 1; }
.page-header-content h1 { font-size: 1.55rem; font-weight: 800; margin: 0 0 6px; color: #fff; letter-spacing: -0.02em; }
.page-header-content p  { margin: 0; opacity: .85; font-size: .92rem; color: #fff; }

/* ─── Stats Row ─── */
.stats-row-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 24px; }
.stat-card-sm {
  background: var(--white); border-radius: 16px; padding: 18px 20px;
  box-shadow: var(--shadow-sm); border: 1px solid var(--border);
  display: flex; align-items: center; gap: 14px;
  transition: all .3s cubic-bezier(.4,0,.2,1);
}
.stat-card-sm:hover { box-shadow: var(--shadow); transform: translateY(-3px); }
.stat-ico { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; flex-shrink: 0; }
.stat-ico.blue   { background: var(--primary-bg); color: var(--primary); }
.stat-ico.orange { background: var(--warning-bg); color: var(--warning); }
.stat-ico.green  { background: var(--green-bg);   color: var(--green);   }
.stat-ico.purple { background: rgba(139,92,246,.1); color: #8B5CF6; }
.stat-ico.red    { background: var(--danger-bg);  color: var(--danger);  }
.stat-num { font-size: 1.5rem; font-weight: 800; color: var(--gray-900); line-height: 1; }
.stat-lbl { font-size: .76rem; color: var(--text-muted); font-weight: 600; margin-top: 3px; }

/* ─── Card + Tabs ─── */
.main-card { background: var(--white); border-radius: 18px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden; }
.tabs-header {
  display: flex; align-items: center; gap: 4px; padding: 16px 20px 0;
  border-bottom: 2px solid var(--gray-100); flex-wrap: wrap;
}
.tab-btn {
  padding: 9px 18px; border-radius: 8px 8px 0 0; border: none;
  background: transparent; color: var(--gray-500); font-size: .84rem; font-weight: 600;
  cursor: pointer; transition: all .2s; position: relative; bottom: -2px;
  border-bottom: 2px solid transparent;
}
.tab-btn.active { color: var(--primary); border-bottom-color: var(--primary); background: var(--primary-bg); }
.tab-btn:hover:not(.active) { background: var(--gray-50); color: var(--gray-700); }
.tab-count {
  display: inline-flex; align-items: center; justify-content: center;
  width: 18px; height: 18px; border-radius: 50%; background: var(--primary-bg);
  color: var(--primary); font-size: .65rem; font-weight: 800; margin-left: 5px;
}

/* ─── Table Styles ─── */
.table-wrapper { overflow-x: auto; }
.app-table { width: 100%; border-collapse: collapse; }
.app-table thead tr { background: var(--gray-50); }
.app-table th {
  padding: 12px 16px; text-align: left; font-size: .72rem; font-weight: 700;
  color: var(--text-muted); text-transform: uppercase; letter-spacing: .05em;
  white-space: nowrap; border-bottom: 1px solid var(--border);
}
.app-table td { padding: 14px 16px; border-bottom: 1px solid var(--gray-100); vertical-align: middle; }
.app-table tbody tr { transition: background .15s; }
.app-table tbody tr:hover { background: var(--gray-50); }
.app-table tbody tr:last-child td { border-bottom: none; }
.cell-title { font-size: .88rem; font-weight: 700; color: var(--gray-900); }
.cell-sub { font-size: .76rem; color: var(--text-muted); display: flex; align-items: center; gap: 4px; margin-top: 3px; }
.company-cell { display: flex; align-items: center; gap: 8px; }
.company-logo-sm {
  width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center;
  justify-content: center; font-size: .75rem; font-weight: 800; color: #fff; flex-shrink: 0;
}
.company-name { font-size: .85rem; font-weight: 600; color: var(--gray-800); }
.date-cell { font-size: .83rem; color: var(--gray-700); white-space: nowrap; font-weight: 500; }
.duration-badge { padding: 3px 9px; border-radius: 6px; font-size: .74rem; font-weight: 700; background: var(--gray-100); color: var(--gray-700); white-space: nowrap; }
/* Status Badges */
.s-badge { padding: 4px 11px; border-radius: 20px; font-size: .74rem; font-weight: 700; white-space: nowrap; }
.s-pending   { background: var(--warning-bg); color: var(--warning); }
.s-interview { background: var(--primary-bg); color: var(--primary); }
.s-accepted  { background: var(--green-bg);   color: var(--green);   }
.s-rejected  { background: var(--danger-bg);  color: var(--danger);  }
/* Progress */
.prog-wrap { display: flex; align-items: center; gap: 8px; min-width: 100px; }
.prog-bar { flex: 1; height: 6px; background: var(--gray-100); border-radius: 20px; overflow: hidden; }
.prog-fill { height: 100%; border-radius: 20px; }
.prog-pct { font-size: .73rem; font-weight: 700; color: var(--gray-600); white-space: nowrap; }
/* Action Buttons */
.action-cell { display: flex; align-items: center; gap: 6px; }
.btn-view {
  padding: 6px 12px; border-radius: 8px; background: var(--primary-bg); color: var(--primary);
  border: 1.5px solid var(--primary); font-size: .78rem; font-weight: 700; cursor: pointer;
  transition: all .2s; display: inline-flex; align-items: center; gap: 5px; white-space: nowrap;
}
.btn-view:hover { background: var(--primary); color: #fff; }
.btn-withdraw {
  padding: 6px 12px; border-radius: 8px; background: transparent; color: var(--danger);
  border: 1.5px solid var(--danger-bg); font-size: .78rem; font-weight: 700; cursor: pointer;
  transition: all .2s; display: inline-flex; align-items: center; gap: 5px; white-space: nowrap;
}
.btn-withdraw:hover { background: var(--danger-bg); border-color: var(--danger); }

/* ─── Empty State ─── */
.empty-state { text-align: center; padding: 60px 20px; }
.empty-state i { font-size: 2.5rem; color: var(--gray-300); margin-bottom: 14px; display: block; }
.empty-state p { color: var(--text-muted); font-size: .9rem; margin: 0; }

/* ─── Detail Modal ─── */
.modal-overlay {
  display: flex; visibility: hidden; pointer-events: none;
  position: fixed; inset: 0; background: rgba(0,0,0,.48); z-index: 9990;
  align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(5px);
}
.modal-overlay.open { visibility: visible; pointer-events: all; animation: fadeInOv .2s ease; }
@keyframes fadeInOv { from { opacity: 0; } to { opacity: 1; } }
.modal-box {
  background: var(--white); border-radius: 22px; padding: 32px; width: 100%; max-width: 500px;
  box-shadow: 0 28px 70px rgba(0,0,0,.2); animation: slideUpM .28s cubic-bezier(.16,1,.3,1);
  position: relative; max-height: 90vh; overflow-y: auto;
}
@keyframes slideUpM { from { opacity: 0; transform: translateY(28px) scale(.97); } to { opacity: 1; transform: none; } }
.modal-close {
  position: absolute; top: 16px; right: 16px; width: 34px; height: 34px;
  border-radius: 9px; background: var(--gray-100); border: none; cursor: pointer;
  color: var(--gray-600); font-size: 15px; display: flex; align-items: center; justify-content: center; transition: all .2s;
}
.modal-close:hover { background: var(--danger-bg); color: var(--danger); }
.modal-company-logo { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; font-weight: 800; color: #fff; margin-bottom: 14px; }
.modal-title { font-size: 1.15rem; font-weight: 800; color: var(--gray-900); margin-bottom: 3px; }
.modal-subtitle { font-size: .83rem; color: var(--text-muted); margin-bottom: 18px; }
.modal-detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px; }
.modal-detail-item { background: var(--gray-50); border-radius: 10px; padding: 11px; border: 1px solid var(--border); }
.modal-detail-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: var(--text-muted); }
.modal-detail-value { font-size: .88rem; font-weight: 600; color: var(--gray-800); margin-top: 4px; }
/* Timeline steps */
.timeline { margin-top: 6px; }
.timeline-step { display: flex; align-items: flex-start; gap: 12px; padding-bottom: 18px; position: relative; }
.timeline-step:last-child { padding-bottom: 0; }
.timeline-step::before {
  content: ''; position: absolute; left: 11px; top: 24px; bottom: 0; width: 2px;
  background: var(--gray-100);
}
.timeline-step:last-child::before { display: none; }
.ts-dot {
  width: 24px; height: 24px; border-radius: 50%; flex-shrink: 0; display: flex;
  align-items: center; justify-content: center; font-size: .65rem; position: relative; z-index: 1;
}
.ts-dot.done    { background: var(--green); color: #fff; }
.ts-dot.active  { background: var(--primary); color: #fff; }
.ts-dot.pending { background: var(--gray-200); color: var(--gray-400); }
.ts-info {}
.ts-label { font-size: .85rem; font-weight: 700; color: var(--gray-800); }
.ts-date  { font-size: .74rem; color: var(--text-muted); margin-top: 2px; }
.modal-footer-btns { display: flex; gap: 10px; margin-top: 22px; }
.btn-modal-close { flex: 1; padding: 12px; border-radius: 11px; background: var(--gray-100); color: var(--gray-700); border: none; font-size: .88rem; font-weight: 700; cursor: pointer; transition: background .2s; }
.btn-modal-close:hover { background: var(--gray-200); }
.btn-withdraw-modal { flex: 1; padding: 12px; border-radius: 11px; background: var(--danger-bg); color: var(--danger); border: 1.5px solid var(--danger); font-size: .88rem; font-weight: 700; cursor: pointer; transition: all .2s; }
.btn-withdraw-modal:hover { background: var(--danger); color: #fff; }

/* ─── Responsive ─── */
@media (max-width: 900px) {
  .stats-row-4 { grid-template-columns: repeat(2, 1fr); }
  .app-table { min-width: 640px; }
}
@media (max-width: 560px) {
  .stats-row-4 { grid-template-columns: 1fr 1fr; }
  .modal-detail-grid { grid-template-columns: 1fr; }
}
</style>

<!-- Page Header -->
<div class="page-header-banner">
  <div class="page-header-content">
    <h1><i class="fas fa-file-alt" style="margin-right:10px;"></i>My Applications</h1>
    <p>Track and manage all your internship applications in one place</p>
  </div>
</div>

<!-- Stats -->
<div class="stats-row-4">
  <div class="stat-card-sm">
    <div class="stat-ico blue"><i class="fas fa-file-alt"></i></div>
    <div><div class="stat-num">5</div><div class="stat-lbl">Total Applied</div></div>
  </div>
  <div class="stat-card-sm">
    <div class="stat-ico orange"><i class="fas fa-hourglass-half"></i></div>
    <div><div class="stat-num">2</div><div class="stat-lbl">Under Review</div></div>
  </div>
  <div class="stat-card-sm">
    <div class="stat-ico blue"><i class="fas fa-calendar-check"></i></div>
    <div><div class="stat-num">1</div><div class="stat-lbl">Interview Set</div></div>
  </div>
  <div class="stat-card-sm">
    <div class="stat-ico green"><i class="fas fa-trophy"></i></div>
    <div><div class="stat-num">1</div><div class="stat-lbl">Accepted</div></div>
  </div>
</div>

<!-- Main Card -->
<div class="main-card">
  <!-- Tabs -->
  <div class="tabs-header">
    <button class="tab-btn active" data-tab="all">All <span class="tab-count">5</span></button>
    <button class="tab-btn" data-tab="pending">Pending <span class="tab-count">2</span></button>
    <button class="tab-btn" data-tab="interview">Interview <span class="tab-count">1</span></button>
    <button class="tab-btn" data-tab="accepted">Accepted <span class="tab-count">1</span></button>
    <button class="tab-btn" data-tab="rejected">Rejected <span class="tab-count">1</span></button>
  </div>

  <!-- Table -->
  <div class="table-wrapper">
    <table class="app-table">
      <thead>
        <tr>
          <th>Internship</th>
          <th>Company</th>
          <th>Applied</th>
          <th>Duration</th>
          <th>Status</th>
          <th>Progress</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="appTableBody">

        <!-- Row 1 -->
        <tr data-status="pending">
          <td>
            <div class="cell-title">Software Development Internship</div>
            <div class="cell-sub"><i class="fas fa-location-dot"></i> San Francisco, CA</div>
          </td>
          <td>
            <div class="company-cell">
              <div class="company-logo-sm" style="background:#2563EB;">CT</div>
              <span class="company-name">ConnorTech</span>
            </div>
          </td>
          <td><div class="date-cell">May 10, 2025</div></td>
          <td><span class="duration-badge">3 months</span></td>
          <td><span class="s-badge s-pending">Pending</span></td>
          <td>
            <div class="prog-wrap">
              <div class="prog-bar"><div class="prog-fill" style="width:40%;background:var(--warning);"></div></div>
              <span class="prog-pct">40%</span>
            </div>
          </td>
          <td>
            <div class="action-cell">
              <button class="btn-view" onclick="openDetailModal('Software Development Internship','ConnorTech','San Francisco, CA','Pending','40%','3 months','#2563EB','CT','May 10, 2025')">
                <i class="fas fa-eye"></i> View
              </button>
              <button class="btn-withdraw" onclick="withdrawApp(this,'ConnorTech')">
                <i class="fas fa-xmark"></i>
              </button>
            </div>
          </td>
        </tr>

        <!-- Row 2 -->
        <tr data-status="interview">
          <td>
            <div class="cell-title">Product Management Internship</div>
            <div class="cell-sub"><i class="fas fa-location-dot"></i> New York, NY</div>
          </td>
          <td>
            <div class="company-cell">
              <div class="company-logo-sm" style="background:var(--primary);">SD</div>
              <span class="company-name">SierraDynamics</span>
            </div>
          </td>
          <td><div class="date-cell">May 15, 2025</div></td>
          <td><span class="duration-badge">2 months</span></td>
          <td><span class="s-badge s-interview">Interview Scheduled</span></td>
          <td>
            <div class="prog-wrap">
              <div class="prog-bar"><div class="prog-fill" style="width:75%;background:var(--primary);"></div></div>
              <span class="prog-pct">75%</span>
            </div>
          </td>
          <td>
            <div class="action-cell">
              <button class="btn-view" onclick="openDetailModal('Product Management Internship','SierraDynamics','New York, NY','Interview Scheduled','75%','2 months','var(--primary)','SD','May 15, 2025')">
                <i class="fas fa-eye"></i> View
              </button>
              <button class="btn-withdraw" onclick="withdrawApp(this,'SierraDynamics')">
                <i class="fas fa-xmark"></i>
              </button>
            </div>
          </td>
        </tr>

        <!-- Row 3 -->
        <tr data-status="pending">
          <td>
            <div class="cell-title">Marketing Internship</div>
            <div class="cell-sub"><i class="fas fa-location-dot"></i> Boston, MA</div>
          </td>
          <td>
            <div class="company-cell">
              <div class="company-logo-sm" style="background:#8B5CF6;">BG</div>
              <span class="company-name">Bayview Group</span>
            </div>
          </td>
          <td><div class="date-cell">May 18, 2025</div></td>
          <td><span class="duration-badge">2 months</span></td>
          <td><span class="s-badge s-pending">Pending</span></td>
          <td>
            <div class="prog-wrap">
              <div class="prog-bar"><div class="prog-fill" style="width:30%;background:var(--warning);"></div></div>
              <span class="prog-pct">30%</span>
            </div>
          </td>
          <td>
            <div class="action-cell">
              <button class="btn-view" onclick="openDetailModal('Marketing Internship','Bayview Group','Boston, MA','Pending','30%','2 months','#8B5CF6','BG','May 18, 2025')">
                <i class="fas fa-eye"></i> View
              </button>
              <button class="btn-withdraw" onclick="withdrawApp(this,'Bayview Group')">
                <i class="fas fa-xmark"></i>
              </button>
            </div>
          </td>
        </tr>

        <!-- Row 4 -->
        <tr data-status="rejected">
          <td>
            <div class="cell-title">Data Science Intern</div>
            <div class="cell-sub"><i class="fas fa-location-dot"></i> Boston, MA</div>
          </td>
          <td>
            <div class="company-cell">
              <div class="company-logo-sm" style="background:#8B5CF6;">DS</div>
              <span class="company-name">DataSpark</span>
            </div>
          </td>
          <td><div class="date-cell">Apr 28, 2025</div></td>
          <td><span class="duration-badge">4 months</span></td>
          <td><span class="s-badge s-rejected">Rejected</span></td>
          <td>
            <div class="prog-wrap">
              <div class="prog-bar"><div class="prog-fill" style="width:100%;background:var(--danger);"></div></div>
              <span class="prog-pct">100%</span>
            </div>
          </td>
          <td>
            <div class="action-cell">
              <button class="btn-view" onclick="openDetailModal('Data Science Intern','DataSpark','Boston, MA','Rejected','100%','4 months','#8B5CF6','DS','Apr 28, 2025')">
                <i class="fas fa-eye"></i> View
              </button>
            </div>
          </td>
        </tr>

        <!-- Row 5 -->
        <tr data-status="accepted">
          <td>
            <div class="cell-title">UI/UX Design Intern</div>
            <div class="cell-sub"><i class="fas fa-location-dot"></i> Seattle, WA</div>
          </td>
          <td>
            <div class="company-cell">
              <div class="company-logo-sm" style="background:#EC4899;">DH</div>
              <span class="company-name">DesignHub</span>
            </div>
          </td>
          <td><div class="date-cell">Apr 20, 2025</div></td>
          <td><span class="duration-badge">3 months</span></td>
          <td><span class="s-badge s-accepted">Accepted</span></td>
          <td>
            <div class="prog-wrap">
              <div class="prog-bar"><div class="prog-fill" style="width:100%;background:var(--green);"></div></div>
              <span class="prog-pct">100%</span>
            </div>
          </td>
          <td>
            <div class="action-cell">
              <button class="btn-view" onclick="openDetailModal('UI/UX Design Intern','DesignHub','Seattle, WA','Accepted','100%','3 months','#EC4899','DH','Apr 20, 2025')">
                <i class="fas fa-eye"></i> View
              </button>
            </div>
          </td>
        </tr>

      </tbody>
    </table>
    <!-- Empty state (hidden by default) -->
    <div class="empty-state" id="emptyState" style="display:none;">
      <i class="fas fa-inbox"></i>
      <p>No applications found for this filter.</p>
    </div>
  </div>
</div>

<template id="appModals">
<!-- ═══ Detail Modal ═══ -->
<div id="detailModal" class="modal-overlay" onclick="if(event.target===this)closeDetailModal()">
  <div class="modal-box">
    <button class="modal-close" onclick="closeDetailModal()"><i class="fas fa-xmark"></i></button>
    <div class="modal-company-logo" id="dmLogo"></div>
    <div class="modal-title" id="dmTitle">Position</div>
    <div class="modal-subtitle" id="dmSubtitle"></div>
    <div class="modal-detail-grid" id="dmGrid"></div>
    <!-- Timeline -->
    <div style="font-size:.78rem;font-weight:700;color:var(--gray-700);text-transform:uppercase;letter-spacing:.05em;margin-bottom:10px;">Application Timeline</div>
    <div class="timeline" id="dmTimeline"></div>
    <div class="modal-footer-btns">
      <button class="btn-modal-close" onclick="closeDetailModal()">Close</button>
      <button class="btn-withdraw-modal" id="dmWithdrawBtn" onclick="withdrawFromModal()">
        <i class="fas fa-xmark"></i> Withdraw
      </button>
    </div>
  </div>
</div>
</template>

<script>
/* Teleport modals to <body> to escape CSS transform stacking context */
(function() {
  var tpl = document.getElementById('appModals');
  if (tpl) document.body.appendChild(tpl.content.cloneNode(true));
})();

function showToast(msg, type) { if (window.showGlobalToast) showGlobalToast(msg, type); }

/* ─── Tab Filtering ─── */
document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    this.classList.add('active');
    const tab = this.dataset.tab;
    let visible = 0;
    document.querySelectorAll('#appTableBody tr').forEach(row => {
      const status = row.dataset.status;
      const show = tab === 'all' || status === tab;
      row.style.display = show ? '' : 'none';
      if (show) visible++;
    });
    document.getElementById('emptyState').style.display = visible === 0 ? '' : 'none';
  });
});

/* ─── Withdraw ─── */
let withdrawTarget = null;

function withdrawApp(btn, company) {
  if (!confirm('Withdraw your application to ' + company + '? This cannot be undone.')) return;
  const row = btn.closest('tr');
  row.style.transition = 'opacity 0.35s, transform 0.35s';
  row.style.opacity = '0';
  row.style.transform = 'translateX(20px)';
  setTimeout(() => { row.remove(); showToast('Application to ' + company + ' withdrawn', 'warning'); }, 350);
}

/* ─── Detail Modal ─── */
let dmCurrentCompany = '';
let dmCurrentRow = null;

function openDetailModal(title, company, location, status, progress, duration, color, initials, date) {
  dmCurrentCompany = company;
  const logo = document.getElementById('dmLogo');
  logo.textContent = initials;
  logo.style.background = color;
  document.getElementById('dmTitle').textContent = title;
  document.getElementById('dmSubtitle').textContent = company + ' · ' + location;

  const statusMap = {
    'Pending':             { cls: 's-pending',   icon: 'fas fa-hourglass-half' },
    'Interview Scheduled': { cls: 's-interview', icon: 'fas fa-calendar-check' },
    'Accepted':            { cls: 's-accepted',  icon: 'fas fa-check-circle' },
    'Rejected':            { cls: 's-rejected',  icon: 'fas fa-times-circle' },
  };
  const sm = statusMap[status] || { cls: 's-pending', icon: 'fas fa-circle' };

  document.getElementById('dmGrid').innerHTML = `
    <div class="modal-detail-item"><div class="modal-detail-label">Location</div><div class="modal-detail-value">${location}</div></div>
    <div class="modal-detail-item"><div class="modal-detail-label">Duration</div><div class="modal-detail-value">${duration}</div></div>
    <div class="modal-detail-item"><div class="modal-detail-label">Applied On</div><div class="modal-detail-value">${date}</div></div>
    <div class="modal-detail-item"><div class="modal-detail-label">Status</div><div class="modal-detail-value"><span class="s-badge ${sm.cls}">${status}</span></div></div>
  `;

  // Build timeline
  const steps = [
    { label: 'Application Submitted', date: date, done: true },
    { label: 'Under Review', date: status !== 'Pending' ? 'In progress' : 'Pending', done: status !== 'Pending', active: status === 'Pending' },
    { label: 'Interview', date: status === 'Interview Scheduled' || status === 'Accepted' ? 'Scheduled' : 'Pending', done: status === 'Accepted', active: status === 'Interview Scheduled' },
    { label: 'Final Decision', date: status === 'Accepted' ? 'Accepted' : status === 'Rejected' ? 'Rejected' : 'Pending', done: status === 'Accepted' || status === 'Rejected' },
  ];
  document.getElementById('dmTimeline').innerHTML = steps.map(s => `
    <div class="timeline-step">
      <div class="ts-dot ${s.done ? 'done' : s.active ? 'active' : 'pending'}">
        <i class="fas fa-${s.done ? 'check' : s.active ? 'circle' : 'clock'}"></i>
      </div>
      <div class="ts-info">
        <div class="ts-label">${s.label}</div>
        <div class="ts-date">${s.date}</div>
      </div>
    </div>`).join('');

  // Hide withdraw for accepted/rejected
  const wBtn = document.getElementById('dmWithdrawBtn');
  wBtn.style.display = (status === 'Accepted' || status === 'Rejected') ? 'none' : '';

  document.getElementById('detailModal').classList.add('open');
}

function closeDetailModal() { document.getElementById('detailModal').classList.remove('open'); }

function withdrawFromModal() {
  if (!confirm('Withdraw your application to ' + dmCurrentCompany + '? This cannot be undone.')) return;
  closeDetailModal();
  // Find the matching row and remove it
  document.querySelectorAll('#appTableBody tr').forEach(row => {
    if (row.textContent.includes(dmCurrentCompany)) {
      row.style.transition = 'opacity 0.35s';
      row.style.opacity = '0';
      setTimeout(() => { row.remove(); }, 350);
    }
  });
  showToast('Application to ' + dmCurrentCompany + ' withdrawn', 'warning');
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeDetailModal();
});
</script>
</x-layouts::student>
