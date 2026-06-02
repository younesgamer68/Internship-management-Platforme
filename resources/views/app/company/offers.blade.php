<x-layouts::app :title="__('Internship Offers')">

<!-- ══════════════════════════════════
     PAGE HEADER
══════════════════════════════════ -->
<div class="page-header anim-up" data-delay="0">
  <div>
    <h2 class="page-title">Internship Offers</h2>
    <p class="page-subtitle">Manage all your active, draft and closed internship postings</p>
  </div>
  <div class="page-header-actions">
    <button class="btn btn-ghost" id="exportBtn" onclick="exportOffers()">
      <i class="fas fa-file-export"></i> Export
    </button>
    <button class="btn btn-primary" onclick="openCreateModal()">
      <i class="fas fa-plus"></i> Post New Internship
    </button>
  </div>
</div>

<!-- ══════════════════════════════════
     STAT CARDS
══════════════════════════════════ -->
<div class="stats-row">
  @foreach([
    ['3',  'Active Listings',     'fa-circle-check',  'blue',   '+1 this week',   '0'],
    ['2',  'Draft',               'fa-pen-to-square', 'warning','Ready to publish','80'],
    ['1',  'Closed',              'fa-ban',           'danger', 'Archived',        '160'],
    ['47', 'Total Applications',  'fa-inbox',         'green',  '+12 this week',   '240'],
  ] as [$val,$label,$icon,$type,$sub,$delay])
  <div class="stat-card hover-lift anim-scale" data-delay="{{ $delay }}">
    <div class="stat-icon {{ $type }}"><i class="fas {{ $icon }}"></i></div>
    <div class="stat-info">
      <div class="stat-value">{{ $val }}</div>
      <div class="stat-label">{{ $label }}</div>
      <div style="font-size:11px;color:var(--gray-400);margin-top:3px;font-weight:500;">{{ $sub }}</div>
    </div>
  </div>
  @endforeach
</div>

<!-- ══════════════════════════════════
     FILTER BAR
══════════════════════════════════ -->
<div class="anim-up" data-delay="120" style="display:flex;gap:10px;align-items:center;margin-bottom:20px;flex-wrap:wrap;">
  <div style="position:relative;flex:1;min-width:220px;">
    <i class="fas fa-search" style="position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none;"></i>
    <input type="text" id="searchInput" placeholder="Search internships, departments…"
           oninput="filterTable()"
           style="width:100%;padding:9px 14px 9px 38px;border:1.5px solid var(--gray-300);border-radius:var(--radius-sm);font-size:13px;transition:var(--transition);background:white;"
           onfocus="this.style.borderColor='var(--primary)';this.style.boxShadow='0 0 0 3px rgba(0,177,170,0.1)'"
           onblur="this.style.borderColor='var(--gray-300)';this.style.boxShadow='none'">
  </div>
  <select id="deptFilter" onchange="filterTable()"
          style="padding:9px 14px;border:1.5px solid var(--gray-300);border-radius:var(--radius-sm);font-size:13px;background:white;cursor:pointer;min-width:150px;">
    <option value="">All Departments</option>
    <option>Engineering</option>
    <option>Marketing</option>
    <option>Data Science</option>
    <option>Design</option>
    <option>Finance</option>
  </select>
  <select id="statusFilter" onchange="filterTable()"
          style="padding:9px 14px;border:1.5px solid var(--gray-300);border-radius:var(--radius-sm);font-size:13px;background:white;cursor:pointer;min-width:130px;">
    <option value="">All Statuses</option>
    <option>Active</option>
    <option>Draft</option>
    <option>Closed</option>
  </select>
  <select id="locFilter" onchange="filterTable()"
          style="padding:9px 14px;border:1.5px solid var(--gray-300);border-radius:var(--radius-sm);font-size:13px;background:white;cursor:pointer;min-width:130px;">
    <option value="">All Locations</option>
    <option>Remote</option>
    <option>New York</option>
    <option>Boston</option>
    <option>Seattle</option>
    <option>Miami</option>
  </select>
</div>

<!-- ══════════════════════════════════
     TABLE
══════════════════════════════════ -->
<div class="card anim-up" data-delay="180">
  <div class="card-header" style="padding:20px 24px 16px;">
    <div>
      <div class="card-title">All Offers</div>
      <div class="card-subtitle" id="offerCount">Showing 6 internship postings</div>
    </div>
    <div style="display:flex;gap:8px;align-items:center;">
      <button class="btn btn-sm btn-ghost" onclick="refreshTable(this)">
        <i class="fas fa-rotate-right"></i> Refresh
      </button>
    </div>
  </div>
  <div class="table-wrap">
    <table id="offersTable" style="width:100%;border-collapse:collapse;">
      <thead>
        <tr>
          @foreach(['Title & Date','Department','Duration','Location','Applicants','Deadline','Status','Actions'] as $th)
          <th style="padding:12px 16px;font-size:11px;font-weight:700;color:var(--gray-500);text-transform:uppercase;letter-spacing:.06em;background:var(--gray-50);border-bottom:1px solid var(--border);white-space:nowrap;">{{ $th }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody id="offersBody">
        @php
        $offers = [
          ['Software Development Intern', 'Posted May 2, 2026',  'Engineering', '#3B82F6', '3 months', 'Remote',   34, 'Jun 30, 2026', 'active',  'Active'],
          ['Marketing Coordinator',       'Posted May 5, 2026',  'Marketing',   '#F59E0B', '2 months', 'New York', 21, 'Jul 15, 2026', 'active',  'Active'],
          ['Data Analyst Intern',         'Posted May 8, 2026',  'Data Science','#10B981', '4 months', 'Boston',   18, 'Jul 1, 2026',  'active',  'Active'],
          ['UI/UX Design Intern',         'Posted May 10, 2026', 'Design',      '#8B5CF6', '3 months', 'Seattle',  27, 'Jul 20, 2026', 'draft',   'Draft'],
          ['Financial Analyst Intern',    'Posted May 12, 2026', 'Finance',     '#EF4444', '2 months', 'Miami',     0, '—',            'draft',   'Draft'],
          ['Backend Developer Intern',    'Posted Jan 15, 2026', 'Engineering', '#3B82F6', '4 months', 'Remote',    8, 'Oct 1, 2026',  'closed',  'Closed'],
        ];
        @endphp
        @foreach($offers as $i => [$title,$posted,$dept,$deptColor,$duration,$location,$applicants,$deadline,$statusClass,$statusLabel])
        <tr data-title="{{ strtolower($title) }}" data-dept="{{ $dept }}" data-status="{{ $statusLabel }}" data-location="{{ $location }}"
            style="border-bottom:1px solid var(--border);transition:background 0.15s;"
            onmouseover="this.style.background='rgba(0,177,170,0.03)'"
            onmouseout="this.style.background=''">
          <td style="padding:15px 16px;">
            <div style="font-size:13px;font-weight:600;color:var(--gray-800);">{{ $title }}</div>
            <div style="font-size:11px;color:var(--gray-400);margin-top:2px;">{{ $posted }}</div>
          </td>
          <td style="padding:15px 16px;">
            <span style="font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px;background:{{ $deptColor }}1a;color:{{ $deptColor }};">{{ $dept }}</span>
          </td>
          <td style="padding:15px 16px;font-size:13px;color:var(--gray-700);">{{ $duration }}</td>
          <td style="padding:15px 16px;font-size:13px;color:var(--gray-700);">
            <span style="display:flex;align-items:center;gap:5px;">
              <i class="fas fa-map-marker-alt" style="font-size:11px;color:var(--gray-400);"></i>
              {{ $location }}
            </span>
          </td>
          <td style="padding:15px 16px;">
            <span style="display:flex;align-items:center;gap:5px;font-size:13px;">
              <i class="fas fa-users" style="font-size:11px;color:var(--gray-400);"></i>
              <strong>{{ $applicants }}</strong>
            </span>
          </td>
          <td style="padding:15px 16px;font-size:13px;color:var(--gray-600);">{{ $deadline }}</td>
          <td style="padding:15px 16px;">
            <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
          </td>
          <td style="padding:15px 16px;">
            <button class="action-btn edit" onclick="editOffer('{{ $title }}')" title="Edit">
              <i class="fas fa-pen"></i> Edit
            </button>
            <button class="action-btn view" onclick="viewOffer('{{ $title }}')" title="View">
              <i class="fas fa-eye"></i> View
            </button>
            @if($statusClass === 'closed')
            <button class="action-btn" style="background:var(--primary-bg);color:var(--primary);border-color:rgba(0,177,170,0.3);" onclick="reopenOffer('{{ $title }}')">
              <i class="fas fa-rotate-right"></i> Reopen
            </button>
            @else
            <button class="action-btn close" onclick="closeOffer(this,'{{ $title }}')" title="Close">
              <i class="fas fa-times"></i> Close
            </button>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- No results -->
  <div id="noResults" style="display:none;text-align:center;padding:48px 24px;">
    <i class="fas fa-search" style="font-size:32px;color:var(--gray-300);margin-bottom:12px;"></i>
    <div style="font-size:15px;font-weight:600;color:var(--gray-500);">No internships found</div>
    <div style="font-size:13px;color:var(--gray-400);margin-top:4px;">Try adjusting your filters</div>
  </div>
</div>

<!-- ══════════════════════════════════
     CREATE / EDIT MODAL
══════════════════════════════════ -->
<div id="offerModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(5px);z-index:9999;align-items:center;justify-content:center;padding:24px;" onclick="if(event.target===this)closeModal()">
  <div class="card" style="width:100%;max-width:680px;max-height:90vh;overflow-y:auto;">
    <div class="card-header" style="padding:24px 24px 0;">
      <div>
        <div class="card-title" id="modalTitle">Post New Internship</div>
        <div class="card-subtitle">Fill in the details below to publish your listing</div>
      </div>
      <button onclick="closeModal()" style="background:var(--gray-100);border:none;width:32px;height:32px;border-radius:8px;cursor:pointer;color:var(--gray-500);font-size:16px;display:flex;align-items:center;justify-content:center;transition:var(--transition);"
              onmouseover="this.style.background='var(--danger-bg)';this.style.color='var(--danger)'"
              onmouseout="this.style.background='var(--gray-100)';this.style.color='var(--gray-500)'">
        <i class="fas fa-xmark"></i>
      </button>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Internship Title *</label>
          <input type="text" class="form-control" id="offerTitle" placeholder="e.g. Software Development Intern">
        </div>
        <div class="form-group">
          <label class="form-label">Department *</label>
          <select class="form-control" id="offerDept">
            <option>Engineering</option><option>Marketing</option>
            <option>Data Science</option><option>Design</option><option>Finance</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Duration</label>
          <select class="form-control" id="offerDuration">
            <option>1 month</option><option>2 months</option>
            <option>3 months</option><option>4 months</option><option>6 months</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Location</label>
          <select class="form-control" id="offerLocation">
            <option>Remote</option><option>New York</option>
            <option>Boston</option><option>Seattle</option><option>Miami</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Application Deadline</label>
          <input type="date" class="form-control" id="offerDeadline">
        </div>
        <div class="form-group">
          <label class="form-label">Status</label>
          <select class="form-control" id="offerStatus">
            <option value="active">Active – Publish immediately</option>
            <option value="draft">Draft – Save for later</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Description</label>
        <textarea class="form-control" rows="4" placeholder="Describe the internship role, responsibilities and requirements…" style="resize:vertical;"></textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Requirements (one per line)</label>
        <textarea class="form-control" rows="3" placeholder="Bachelor's degree in progress&#10;Strong communication skills&#10;Proficiency in Python" style="resize:vertical;"></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:8px;">
        <button onclick="closeModal()" class="btn btn-ghost">Cancel</button>
        <button onclick="saveOffer()" class="btn btn-primary" id="saveOfferBtn">
          <i class="fas fa-check"></i> Save & Publish
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════
     TOAST
══════════════════════════════════ -->
<div id="toast" style="position:fixed;bottom:24px;right:24px;z-index:99999;transform:translateY(80px);opacity:0;transition:all 0.35s cubic-bezier(.4,0,.2,1);pointer-events:none;">
  <div style="display:flex;align-items:center;gap:12px;padding:13px 20px;border-radius:12px;background:white;box-shadow:0 10px 30px rgba(0,0,0,0.13);border:1px solid var(--border);min-width:250px;">
    <div id="toast-icon"></div>
    <span id="toast-msg" style="font-size:13px;font-weight:600;color:var(--gray-800);"></span>
  </div>
</div>

<script>
/* ── Filter ── */
function filterTable() {
  var search = document.getElementById('searchInput').value.toLowerCase();
  var dept   = document.getElementById('deptFilter').value;
  var status = document.getElementById('statusFilter').value;
  var loc    = document.getElementById('locFilter').value;
  var rows   = document.querySelectorAll('#offersBody tr');
  var visible = 0;

  rows.forEach(function(row) {
    var titleMatch  = !search || row.dataset.title.includes(search);
    var deptMatch   = !dept   || row.dataset.dept   === dept;
    var statusMatch = !status || row.dataset.status === status;
    var locMatch    = !loc    || row.dataset.location === loc;
    var show = titleMatch && deptMatch && statusMatch && locMatch;
    row.style.display = show ? '' : 'none';
    if (show) visible++;
  });

  document.getElementById('offerCount').textContent = 'Showing ' + visible + ' internship postings';
  document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
}

/* ── Modal ── */
function openCreateModal() {
  document.getElementById('modalTitle').textContent = 'Post New Internship';
  document.getElementById('offerTitle').value = '';
  var m = document.getElementById('offerModal');
  m.style.display = 'flex';
  requestAnimationFrame(function() {
    m.querySelector('.card').style.transform = 'scale(0.92)';
    m.querySelector('.card').style.opacity = '0';
    m.querySelector('.card').style.transition = 'all 0.3s cubic-bezier(.34,1.3,.64,1)';
    requestAnimationFrame(function() {
      m.querySelector('.card').style.transform = 'scale(1)';
      m.querySelector('.card').style.opacity = '1';
    });
  });
}
function closeModal() {
  var m = document.getElementById('offerModal');
  m.querySelector('.card').style.transform = 'scale(0.92)';
  m.querySelector('.card').style.opacity = '0';
  setTimeout(function() { m.style.display = 'none'; }, 250);
}
function editOffer(name) {
  document.getElementById('modalTitle').textContent = 'Edit: ' + name;
  document.getElementById('offerTitle').value = name;
  openCreateModal();
  document.getElementById('modalTitle').textContent = 'Edit: ' + name;
}
function viewOffer(name)   { showToast('Opening preview for "' + name + '"', 'info'); }
function closeOffer(btn, name) {
  var row = btn.closest('tr');
  row.style.opacity = '0'; row.style.transform = 'translateX(20px)';
  row.style.transition = 'all 0.4s ease';
  setTimeout(function() { row.remove(); updateCount(); }, 400);
  showToast('"' + name + '" has been closed.', 'warning');
}
function reopenOffer(name) { showToast('"' + name + '" is now active!', 'success'); }
function updateCount() {
  var visible = document.querySelectorAll('#offersBody tr:not([style*="display: none"])').length;
  document.getElementById('offerCount').textContent = 'Showing ' + visible + ' internship postings';
}
function saveOffer() {
  var title = document.getElementById('offerTitle').value.trim();
  if (!title) { document.getElementById('offerTitle').style.borderColor='var(--danger)'; return; }
  var btn = document.getElementById('saveOfferBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving…'; btn.disabled = true;
  setTimeout(function() {
    closeModal();
    showToast('Internship "' + title + '" published!', 'success');
    btn.innerHTML = '<i class="fas fa-check"></i> Save & Publish'; btn.disabled = false;
  }, 1200);
}

/* ── Export ── */
function exportOffers() {
  var btn = document.getElementById('exportBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Exporting…'; btn.disabled = true;
  setTimeout(function() {
    btn.innerHTML = '<i class="fas fa-check"></i> Done!';
    showToast('Offers exported successfully!', 'success');
    setTimeout(function() { btn.innerHTML = '<i class="fas fa-file-export"></i> Export'; btn.disabled = false; }, 2000);
  }, 1400);
}

/* ── Refresh ── */
function refreshTable(btn) {
  var icon = btn.querySelector('i'); icon.classList.add('fa-spin'); btn.disabled = true;
  setTimeout(function() { icon.classList.remove('fa-spin'); btn.disabled = false; showToast('Data refreshed!', 'info'); }, 1000);
}

/* ── Toast ── */
function showToast(msg, type) {
  if (window.showGlobalToast) { showGlobalToast(msg, type); return; }
  var icons = {
    success:'<i class="fas fa-circle-check" style="color:#10B981;font-size:16px;"></i>',
    info:   '<i class="fas fa-circle-info"  style="color:var(--primary);font-size:16px;"></i>',
    warning:'<i class="fas fa-triangle-exclamation" style="color:#F59E0B;font-size:16px;"></i>'
  };
  document.getElementById('toast-msg').textContent = msg;
  document.getElementById('toast-icon').innerHTML  = icons[type] || icons.info;
  var t = document.getElementById('toast');
  t.style.transform = 'translateY(0)'; t.style.opacity = '1';
  setTimeout(function() { t.style.transform = 'translateY(80px)'; t.style.opacity = '0'; }, 3200);
}

/* ── Responsive helpers ── */
document.addEventListener('DOMContentLoaded', function() {
  // Hide less important columns on small screens
  function applyResponsive() {
    var w = window.innerWidth;
    var cols = [3, 4]; // Duration, Location columns (1-indexed)
    document.querySelectorAll('#offersTable thead th, #offersTable tbody td').forEach(function(cell) {
      var idx = Array.from(cell.parentElement.children).indexOf(cell) + 1;
      if (w < 768 && (idx === 3 || idx === 4)) cell.style.display = 'none';
      else cell.style.display = '';
    });
  }
  applyResponsive();
  window.addEventListener('resize', applyResponsive);
});
</script>

</x-layouts::app>
