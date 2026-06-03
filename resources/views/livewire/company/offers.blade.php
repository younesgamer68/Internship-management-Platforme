<div>

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
    <button class="btn btn-primary" wire:click="openCreateModal">
      <i class="fas fa-plus"></i> Post New Internship
    </button>
  </div>
</div>

<!-- ══════════════════════════════════
     STAT CARDS
══════════════════════════════════ -->
<div class="stats-row">
  @php
    $activeCount = $internships->where('status', 'Open')->count();
    $draftCount = $internships->where('status', 'Draft')->count();
    $closedCount = $internships->where('status', 'Closed')->count();
    $appsCount = $internships->sum('applications_count');
  @endphp
  @foreach([
    [$activeCount,  'Active Listings',     'fa-circle-check',  'blue',   'Total currently active',   '0'],
    [$draftCount,  'Draft',               'fa-pen-to-square', 'warning','Saved for later','80'],
    [$closedCount,  'Closed',              'fa-ban',           'danger', 'Archived postings',        '160'],
    [$appsCount, 'Total Applications',  'fa-inbox',         'green',  'Across all offers',   '240'],
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
        @forelse($internships as $offer)
        <tr data-title="{{ strtolower($offer->title) }}" data-status="{{ $offer->status }}" data-location="{{ $offer->location }}"
            style="border-bottom:1px solid var(--border);transition:background 0.15s;"
            onmouseover="this.style.background='rgba(0,177,170,0.03)'"
            onmouseout="this.style.background=''">
          <td style="padding:15px 16px;">
            <div style="font-size:13px;font-weight:600;color:var(--gray-800);">{{ $offer->title }}</div>
            <div style="font-size:11px;color:var(--gray-400);margin-top:2px;">Posted {{ $offer->created_at->format('M j, Y') }}</div>
          </td>
          <td style="padding:15px 16px;">
            <span style="font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px;background:var(--primary-bg);color:var(--primary);">{{ $offer->field ?? 'General' }}</span>
          </td>
          <td style="padding:15px 16px;font-size:13px;color:var(--gray-700);">{{ $offer->duration ?? 'N/A' }}</td>
          <td style="padding:15px 16px;font-size:13px;color:var(--gray-700);">
            <span style="display:flex;align-items:center;gap:5px;">
              <i class="fas fa-map-marker-alt" style="font-size:11px;color:var(--gray-400);"></i>
              {{ $offer->location ?? 'Remote' }}
            </span>
          </td>
          <td style="padding:15px 16px;">
            <span style="display:flex;align-items:center;gap:5px;font-size:13px;">
              <i class="fas fa-users" style="font-size:11px;color:var(--gray-400);"></i>
              <strong>{{ $offer->applications_count }}</strong>
            </span>
          </td>
          <td style="padding:15px 16px;font-size:13px;color:var(--gray-600);">{{ $offer->deadline ? $offer->deadline->format('M j, Y') : 'Open' }}</td>
          <td style="padding:15px 16px;">
            @php
                $statusClass = $offer->status === 'Closed' ? 'closed' : ($offer->status === 'Draft' ? 'draft' : 'active');
            @endphp
            <span class="status-badge {{ $statusClass }}">{{ ucfirst($offer->status) }}</span>
          </td>
          <td style="padding:15px 16px;">
            <button class="action-btn view" onclick="alert('View functionality coming soon')" title="View">
              <i class="fas fa-eye"></i> View
            </button>
            @if($offer->status === 'Closed')
            <button class="action-btn" style="background:var(--primary-bg);color:var(--primary);border-color:rgba(0,177,170,0.3);" wire:click="reopenOffer({{ $offer->id }})">
              <i class="fas fa-rotate-right"></i> Reopen
            </button>
            @else
            <button class="action-btn close" wire:click="closeOffer({{ $offer->id }})" title="Close">
              <i class="fas fa-times"></i> Close
            </button>
            @endif
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align:center;padding:48px 24px;">
                <i class="fas fa-briefcase" style="font-size:32px;color:var(--gray-300);margin-bottom:12px;"></i>
                <div style="font-size:15px;font-weight:600;color:var(--gray-500);">No internships found</div>
                <div style="font-size:13px;color:var(--gray-400);margin-top:4px;">Post a new internship to get started</div>
            </td>
        </tr>
        @endforelse
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
@if($showCreateModal)
<div id="offerModal" style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,0.45);-webkit-backdrop-filter:blur(8px);backdrop-filter:blur(8px);z-index:9999;align-items:center;justify-content:center;padding:24px;">
  <div class="card" style="width:100%;max-width:680px;max-height:90vh;overflow-y:auto;transform:scale(1);opacity:1;margin:auto;">
    <div class="card-header" style="padding:24px 24px 0;">
      <div>
        <div class="card-title" id="modalTitle">Post New Internship</div>
        <div class="card-subtitle">Fill in the details below to publish your listing</div>
      </div>
      <button wire:click="closeModal" style="background:var(--gray-100);border:none;width:32px;height:32px;border-radius:8px;cursor:pointer;color:var(--gray-500);font-size:16px;display:flex;align-items:center;justify-content:center;transition:var(--transition);"
              onmouseover="this.style.background='var(--danger-bg)';this.style.color='var(--danger)'"
              onmouseout="this.style.background='var(--gray-100)';this.style.color='var(--gray-500)'">
        <i class="fas fa-xmark"></i>
      </button>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Internship Title *</label>
          <input type="text" class="form-control" wire:model="title" placeholder="e.g. Software Development Intern">
          @error('title') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
          <label class="form-label">Location *</label>
          <input type="text" class="form-control" wire:model="location" placeholder="e.g. Remote, New York">
          @error('location') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Internship Type *</label>
        <select class="form-control" wire:model="internship_type">
          <option value="Remote">Remote</option>
          <option value="Onsite">Onsite</option>
          <option value="Hybrid">Hybrid</option>
        </select>
        @error('internship_type') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
      </div>
      <div class="form-group">
        <label class="form-label">Description *</label>
        <textarea class="form-control" rows="4" wire:model="description" placeholder="Describe the internship role, responsibilities and requirements…" style="resize:vertical;"></textarea>
        @error('description') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:8px;">
        <button wire:click="closeModal" class="btn btn-ghost">Cancel</button>
        <button wire:click="saveOffer" class="btn btn-primary">
          <i class="fas fa-check" wire:loading.remove wire:target="saveOffer"></i>
          <i class="fas fa-spinner fa-spin" wire:loading wire:target="saveOffer"></i> 
          Save & Publish
        </button>
      </div>
    </div>
  </div>
</div>
@endif

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

</div>
