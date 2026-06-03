import re

path = 'resources/views/app/admin/internships.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Stats Replacements
content = re.sub(r'<div class="stat-card-value">365</div>', r'<div class="stat-card-value">{{ $totalInternships ?? 0 }}</div>', content)
content = re.sub(r'<div class="stat-card-value">320</div>', r'<div class="stat-card-value">{{ $activeInternships ?? 0 }}</div>', content)
content = re.sub(r'<div class="stat-card-value">45</div>', r'<div class="stat-card-value">{{ $pendingInternships ?? 0 }}</div>', content)
content = re.sub(r'<div class="stat-card-value">275</div>', r'<div class="stat-card-value">{{ $completedInternships ?? 0 }}</div>', content)

# 2. Filter Bar: Keep only search and status
filter_selects_replacement = """          <div class="filter-selects">
            <select class="filter-select" id="statusFilter" onchange="applyFilters()">
              <option value="">All Statuses</option>
              <option value="Active">Active</option>
              <option value="Pending">Pending</option>
              <option value="Completed">Completed</option>
              <option value="Expired">Expired</option>
            </select>
          </div>"""
content = re.sub(r'<div class="filter-selects">.*?</div>\s*</div>\s*</div>', filter_selects_replacement + '\n        </div>\n      </div>', content, flags=re.DOTALL)

# 3. Table Header
table_head_replacement = """            <thead>
              <tr>
                <th>Title & Field</th>
                <th>Company</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>"""
content = re.sub(r'<thead>.*?</thead>', table_head_replacement, content, flags=re.DOTALL)

# 4. Table Body
table_body_replacement = """            <tbody>
              @foreach($internships as $internship)
              @php
                  $initials = substr(strtoupper($internship->company->name ?? 'NA'), 0, 2);
                  $typeClass = match($internship->internship_type) {
                      'Part-time' => 'type-parttime',
                      'Remote' => 'type-remote',
                      default => 'type-fulltime'
                  };
                  $sClass = match($internship->status) {
                      'Pending' => 'badge-pending',
                      'Completed' => 'badge-completed',
                      'Expired' => 'badge-expired',
                      default => 'badge-active'
                  };
                  $deadline = $internship->deadline ? $internship->deadline->format('M Y') : '—';
              @endphp
              <tr data-id="{{ $internship->id }}">
                <td>
                  <div class="cell-with-logo">
                    <div class="company-logo" style="background: rgba(37,99,235,0.12); color: var(--primary);">{{ $initials }}</div>
                    <div>
                      <div class="cell-title">{{ $internship->title }}</div>
                      <div class="cell-subtitle">{{ $internship->field ?? '—' }}</div>
                    </div>
                  </div>
                </td>
                <td class="cell-company" data-company-id="{{ $internship->company_id }}">{{ $internship->company->name ?? '—' }}</td>
                <td><span class="type-badge {{ $typeClass }}">{{ $internship->internship_type ?? 'Full-time' }}</span></td>
                <td><span class="duration-badge">{{ $internship->duration }}</span></td>
                <td>{{ $deadline }}</td>
                <td><span class="badge-status {{ $sClass }}">{{ $internship->status }}</span></td>
                <td>
                  <div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>"""
content = re.sub(r'<tbody>.*?</tbody>', table_body_replacement, content, flags=re.DOTALL)

# 5. Add Modal Body
add_modal_replacement = """      <form onsubmit="submitAddForm(event)">

        <div class="panel-section-label">Basic Information</div>

        <div class="form-group">
          <label class="form-label">Internship Title <span class="required">*</span></label>
          <div class="input-with-icon">
            <i class="fas fa-briefcase input-icon"></i>
            <input type="text" class="form-input" id="add-title" placeholder="e.g. Software Development Intern" required />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Field <span class="required">*</span></label>
            <input type="text" class="form-input" id="add-field" placeholder="e.g. Software Engineering" required />
          </div>
          <div class="form-group">
            <label class="form-label">Company <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-building input-icon"></i>
              <select class="form-input form-select" id="add-company" required>
                <option value="">Select Company</option>
                @foreach($companies as $comp)
                  <option value="{{ $comp->id }}">{{ $comp->name }}</option>
                @endforeach
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="panel-section-label">Internship Details</div>

        <div class="form-row-3">
          <div class="form-group">
            <label class="form-label">Type <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-tag input-icon"></i>
              <select class="form-input form-select" id="add-type" required>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Remote">Remote</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Duration <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-clock input-icon"></i>
              <select class="form-input form-select" id="add-duration" required>
                <option value="1 month">1 month</option>
                <option value="2 months">2 months</option>
                <option value="3 months">3 months</option>
                <option value="4 months">4 months</option>
                <option value="5 months">5 months</option>
                <option value="6 months">6 months</option>
                <option value="9 months">9 months</option>
                <option value="12 months">12 months</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Status</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-circle-half-stroke input-icon"></i>
              <select class="form-input form-select" id="add-status">
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Expired">Expired</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="form-group" style="margin-top:14px;">
          <label class="form-label">Application Deadline <span class="required">*</span></label>
          <div class="input-with-icon">
            <i class="fas fa-calendar input-icon"></i>
            <input type="date" class="form-input" id="add-deadline" required />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Description <span class="required">*</span></label>
          <textarea class="form-input form-textarea" id="add-description" rows="4" placeholder="Describe the internship role, responsibilities, and requirements..." required></textarea>
        </div>

        <div class="form-group">
          <label class="form-label">Required Skills</label>
          <div class="input-with-icon">
            <i class="fas fa-code input-icon"></i>
            <input type="text" class="form-input" id="add-skills" placeholder="e.g. JavaScript, React, Node.js (comma-separated)" />
          </div>
        </div>

        <div class="slide-panel-footer">
          <button type="button" class="btn btn-outline" onclick="closeModal('addModal')">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Internship</button>
        </div>
      </form>"""
content = re.sub(r'<form onsubmit="submitAddForm\(event\)".*?</form>', add_modal_replacement, content, flags=re.DOTALL)

# 6. Edit Modal Body
edit_modal_replacement = """      <form onsubmit="submitEditForm(event)">

        <div class="panel-section-label">Basic Information</div>

        <div class="form-group">
          <label class="form-label">Internship Title <span class="required">*</span></label>
          <div class="input-with-icon">
            <i class="fas fa-briefcase input-icon"></i>
            <input type="text" class="form-input" id="edit-title" required />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Field</label>
            <input type="text" class="form-input" id="edit-field" />
          </div>
          <div class="form-group">
            <label class="form-label">Company <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-building input-icon"></i>
              <select class="form-input form-select" id="edit-company" required>
                @foreach($companies as $comp)
                  <option value="{{ $comp->id }}">{{ $comp->name }}</option>
                @endforeach
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="panel-section-label">Internship Details</div>

        <div class="form-row-3">
          <div class="form-group">
            <label class="form-label">Type <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-tag input-icon"></i>
              <select class="form-input form-select" id="edit-type" required>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Remote">Remote</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Duration <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-clock input-icon"></i>
              <select class="form-input form-select" id="edit-duration" required>
                <option value="1 month">1 month</option>
                <option value="2 months">2 months</option>
                <option value="3 months">3 months</option>
                <option value="4 months">4 months</option>
                <option value="5 months">5 months</option>
                <option value="6 months">6 months</option>
                <option value="9 months">9 months</option>
                <option value="12 months">12 months</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Status</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-circle-half-stroke input-icon"></i>
              <select class="form-input form-select" id="edit-status">
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Expired">Expired</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="form-group" style="margin-top:14px;">
          <label class="form-label">Application Deadline</label>
          <div class="input-with-icon">
            <i class="fas fa-calendar input-icon"></i>
            <input type="date" class="form-input" id="edit-deadline" />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Description <span class="required">*</span></label>
          <textarea class="form-input form-textarea" id="edit-description" rows="4" required></textarea>
        </div>

        <div class="form-group">
          <label class="form-label">Required Skills</label>
          <div class="input-with-icon">
            <i class="fas fa-code input-icon"></i>
            <input type="text" class="form-input" id="edit-skills" placeholder="e.g. JavaScript, React, Node.js" />
          </div>
        </div>

        <div class="slide-panel-footer">
          <button type="button" class="btn btn-outline" onclick="closeModal('editModal')">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Save Changes</button>
        </div>
      </form>"""
content = re.sub(r'<form onsubmit="submitEditForm\(event\)".*?</form>', edit_modal_replacement, content, flags=re.DOTALL)


# 7. JS Replacement
js_script = """<script>
let rowToDelete = null;
let rowBeingEdited = null;

// ── OPEN/CLOSE ──
function openAddModal() {
  document.getElementById('addModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeModal(id) {
  document.getElementById(id).classList.remove('open');
  document.body.style.overflow = '';
}

function closeModalOnOverlay(e, id) {
  if (e.target === document.getElementById(id)) closeModal(id);
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    ['addModal','editModal','viewModal','deleteModal'].forEach(closeModal);
  }
});

// ── ADD ──
function submitAddForm(e) {
  e.preventDefault();
  const title    = document.getElementById('add-title').value.trim();
  const field = document.getElementById('add-field').value.trim();
  const company_id  = document.getElementById('add-company').value;
  const type     = document.getElementById('add-type').value;
  const duration = document.getElementById('add-duration').value;
  const status   = document.getElementById('add-status').value;
  const deadline = document.getElementById('add-deadline').value;
  const description = document.getElementById('add-description').value.trim();
  const skills_required = document.getElementById('add-skills').value.trim();

  fetch(`/{{ $slug }}/admin/internships`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    },
    body: JSON.stringify({ 
      title, field, company_id, internship_type: type, 
      duration, status, deadline, description, skills_required 
    })
  }).then(res => res.json()).then(data => {
    if (data.success) {
      window.location.reload();
    }
  });
}

// ── VIEW ──
function viewInternship(btn) {
  const row = btn.closest('tr');
  const title    = row.querySelector('.cell-title').textContent;
  const subtitle = row.querySelector('.cell-subtitle').textContent;
  const company  = row.cells[1].textContent;
  const type     = row.querySelector('.type-badge')?.textContent || '—';
  const duration = row.querySelector('.duration-badge')?.textContent || '—';
  const deadline = row.cells[4].textContent;
  const status   = row.querySelector('.badge-status');
  const initials = company.split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);

  document.getElementById('view-initials-badge').textContent = initials;
  document.getElementById('view-title').textContent = title;
  document.getElementById('view-subtitle-company').textContent = `${subtitle} · ${company}`;
  
  // hide unused fields in view modal
  document.getElementById('view-university').parentElement.style.display = 'none';
  document.getElementById('view-department').parentElement.style.display = 'none';
  
  document.getElementById('view-type').textContent = type;
  document.getElementById('view-duration').textContent = duration;
  document.getElementById('view-deadline').textContent = deadline;
  document.getElementById('view-description').textContent = 'No description available for this listing.';

  const sb = document.getElementById('view-status-badge');
  sb.className = 'badge-status ' + (status ? status.className.replace('badge-status','').trim() : '');
  sb.textContent = status ? status.textContent : '—';

  document.getElementById('viewModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

// ── EDIT ──
function editInternship(btn) {
  rowBeingEdited = btn.closest('tr');
  const row = rowBeingEdited;

  document.getElementById('edit-title').value    = row.querySelector('.cell-title').textContent.trim();
  document.getElementById('edit-field').value = row.querySelector('.cell-subtitle').textContent.trim();
  
  const compId = row.querySelector('.cell-company').getAttribute('data-company-id');
  setSelectVal('edit-company', compId);

  const typeText = row.querySelector('.type-badge')?.textContent || 'Full-time';
  setSelectVal('edit-type', typeText);
  setSelectVal('edit-duration', row.querySelector('.duration-badge')?.textContent || '3 months');
  setSelectVal('edit-status', row.querySelector('.badge-status')?.textContent || 'Active');
  document.getElementById('edit-description').value = '-';

  document.getElementById('editModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function openEditFromView() {
  closeModal('viewModal');
  if (rowBeingEdited) return;
}

function setSelectVal(id, val) {
  const sel = document.getElementById(id);
  if (!sel) return;
  for (let opt of sel.options) {
    if (opt.value === val || opt.textContent.trim() === val) {
      sel.value = opt.value; return;
    }
  }
}

function submitEditForm(e) {
  e.preventDefault();
  if (!rowBeingEdited) { closeModal('editModal'); return; }

  const id = rowBeingEdited.getAttribute('data-id');
  const title    = document.getElementById('edit-title').value.trim();
  const field = document.getElementById('edit-field').value.trim();
  const company_id  = document.getElementById('edit-company').value;
  const type     = document.getElementById('edit-type').value;
  const duration = document.getElementById('edit-duration').value;
  const status   = document.getElementById('edit-status').value;
  const deadline = document.getElementById('edit-deadline').value;
  const description = document.getElementById('edit-description').value.trim();
  const skills_required = document.getElementById('edit-skills').value.trim();

  fetch(`/{{ $slug }}/admin/internships/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    },
    body: JSON.stringify({ 
      title, field, company_id, internship_type: type, 
      duration, status, deadline, description, skills_required 
    })
  }).then(res => res.json()).then(data => {
    if (data.success) {
      window.location.reload();
    }
  });
}

// ── DELETE ──
function deleteInternship(btn) {
  rowToDelete = btn.closest('tr');
  const title = rowToDelete.querySelector('.cell-title')?.textContent || 'this internship';
  document.getElementById('delete-name').textContent = `"${title}"`;
  document.getElementById('delete-confirm-btn').onclick = confirmDelete;
  document.getElementById('deleteModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function confirmDelete() {
  if (!rowToDelete) return;
  const id = rowToDelete.getAttribute('data-id');
  
  fetch(`/{{ $slug }}/admin/internships/${id}`, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    }
  }).then(res => res.json()).then(data => {
    if (data.success) {
      rowToDelete.style.opacity  = '0';
      rowToDelete.style.transform= 'translateY(-8px)';
      rowToDelete.style.transition = 'all 0.35s ease';
      setTimeout(() => { 
        rowToDelete.remove(); 
        rowToDelete = null; 
        applyFilters(); 
      }, 360);
      closeModal('deleteModal');
      showToast('Internship deleted.');
    }
  });
}

// ── TOAST ──
function showToast(msg) {
  const t = document.getElementById('toastNotif');
  document.getElementById('toast-msg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}

// ── FILTER & PAGINATION ──
let currentPage = 1;
const rowsPerPage = 10;

function applyFilters() {
  const searchInput = document.querySelector('.search-input').value.toLowerCase();
  const statusFilter = document.getElementById('statusFilter').value.toLowerCase();

  const tbody = document.querySelector('.data-table tbody');
  const rows = Array.from(tbody.querySelectorAll('tr'));
  
  let visibleRows = [];

  rows.forEach(row => {
    const titleCompany = row.cells[0].textContent.toLowerCase();
    const company = row.cells[1].textContent.toLowerCase();
    const status = row.querySelector('.badge-status')?.textContent.toLowerCase() || '';

    const matchesSearch = titleCompany.includes(searchInput) || company.includes(searchInput);
    const matchesStatus = !statusFilter || statusFilter.includes('all') || status === statusFilter;

    if (matchesSearch && matchesStatus) {
      visibleRows.push(row);
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });

  updatePagination(visibleRows);
}

function updatePagination(visibleRows) {
  const totalPages = Math.ceil(visibleRows.length / rowsPerPage) || 1;
  if (currentPage > totalPages) currentPage = totalPages;
  if (currentPage < 1) currentPage = 1;

  visibleRows.forEach((row, index) => {
    if (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });

  const start = visibleRows.length === 0 ? 0 : (currentPage - 1) * rowsPerPage + 1;
  const end = Math.min(currentPage * rowsPerPage, visibleRows.length);
  const infoEl = document.getElementById('paginationInfo');
  if(infoEl) infoEl.textContent = `Showing ${start}–${end} of ${visibleRows.length} internships`;

  const controls = document.getElementById('paginationControls');
  if(controls) {
    let html = `<button class="page-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})"><i class="fas fa-chevron-left"></i></button>`;
    for (let i = 1; i <= totalPages; i++) {
      html += `<button class="page-btn ${currentPage === i ? 'active' : ''}" onclick="goToPage(${i})">${i}</button>`;
    }
    html += `<button class="page-btn" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})"><i class="fas fa-chevron-right"></i></button>`;
    controls.innerHTML = html;
  }
}

function goToPage(page) {
  currentPage = page;
  applyFilters();
}

document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.querySelector('.search-input');
  if(searchInput) searchInput.addEventListener('input', () => { currentPage = 1; applyFilters(); });
  
  const statusFilter = document.getElementById('statusFilter');
  if(statusFilter) statusFilter.addEventListener('change', () => { currentPage = 1; applyFilters(); });

  applyFilters();
});
</script>"""

content = re.sub(r'<script>.*?</script>', js_script, content, flags=re.DOTALL)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)

print("Updated internships.blade.php successfully!")
