<x-layouts::admin title="Universities">
<!-- Page Header -->
      <div class="page-header">
        <div class="page-header-left">
          <h2>Universities</h2>
          <p>Manage all partner universities on the platform</p>
        </div>
        <div class="page-header-actions">
          <button class="btn btn-outline" onclick="exportUniversities()"><i class="fas fa-download"></i> Export</button>
          <button class="btn btn-primary" onclick="openUnivAdd()"><i class="fas fa-plus"></i> Add University</button>
        </div>
      </div>

      <!-- Stats Row -->
      <div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:28px;">
        <div class="stat-card">
          <div class="stat-icon blue"><i class="fas fa-university"></i></div>
          <div class="stat-info">
            <div class="stat-value">{{ $totalUniversities ?? 0 }}</div>
            <div class="stat-label">Universities</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> {{ $newUniversities ?? 0 }} this month</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green"><i class="fas fa-user-graduate"></i></div>
          <div class="stat-info">
            <div class="stat-value">{{ is_numeric($totalStudents) ? number_format($totalStudents) : ($totalStudents ?? 0) }}</div>
            <div class="stat-label">Students</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> {{ $newStudents ?? 0 }} new</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon warning"><i class="fas fa-chalkboard-teacher"></i></div>
          <div class="stat-info">
            <div class="stat-value">{{ $totalFaculties ?? 0 }}</div>
            <div class="stat-label">Faculties</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> {{ $newFaculties ?? 0 }} this month</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon danger"><i class="fas fa-building"></i></div>
          <div class="stat-info">
            <div class="stat-value">{{ $totalCompanies ?? 0 }}</div>
            <div class="stat-label">Companies</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> {{ $newCompanies ?? 0 }} new</div>
          </div>
        </div>
      </div>

      <!-- Filter Bar -->
      <div class="filter-bar card" style="margin-bottom:24px;">
        <div class="filter-bar-inner">
          <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search universities..." id="univSearch" oninput="filterUnivCards()" />
          </div>
          <div class="filter-selects">
            <select class="filter-select" id="univStatusFilter" onchange="filterUnivCards()">
              <option value="">All Statuses</option>
              <option value="Active">Active</option>
              <option value="Pending">Pending</option>
              <option value="Inactive">Inactive</option>
            </select>
            <select class="filter-select" id="univCityFilter" onchange="filterUnivCards()">
              <option value="">All Cities</option>
              <option value="Tirana">Tirana</option>
              <option value="Durres">Durres</option>
              <option value="Shkoder">Shkoder</option>
            </select>
          </div>
        </div>
      </div>

      <!-- University Cards Grid -->
      <div class="univ-cards-grid" id="univCardsGrid">

        @foreach($universities as $univ)
        @php 
            $stsClass = ['Active'=>'active', 'Pending'=>'pending', 'Inactive'=>'inactive'][$univ->status] ?? 'active';
            $city = $univ->city ?? 'Tirana';
            $website = $univ->website ?? '—';
        @endphp
        <div class="univ-card" data-id="{{ $univ->id }}" data-status="{{ $univ->status }}" data-city="{{ $city }}" data-name="{{ strtolower($univ->name) }}">
          <div class="univ-card-header">
            <div class="univ-card-icon" style="background:{{ $univ->color }};color:{{ $univ->icon }}">
              <i class="fas fa-university"></i>
            </div>
            <div class="univ-card-info">
              <h4>{{ $univ->name }}</h4>
              <div class="univ-card-location"><i class="fas fa-location-dot"></i> {{ $city }}, Albania</div>
              <div class="univ-card-website"><i class="fas fa-globe"></i> {{ $website }}</div>
            </div>
            <span class="status-badge {{ $stsClass }}" style="align-self:flex-start">{{ $univ->status }}</span>
          </div>
          <div class="univ-card-stats">
            <div class="univ-stat"><div class="univ-stat-value">{{ $univ->students_count }}</div><div class="univ-stat-label">Students</div></div>
            <div class="univ-stat-sep"></div>
            <div class="univ-stat"><div class="univ-stat-value">{{ $univ->faculties_count }}</div><div class="univ-stat-label">Faculties</div></div>
            <div class="univ-stat-sep"></div>
            <div class="univ-stat"><div class="univ-stat-value" style="color:var(--green)">{{ $univ->internships_count }}</div><div class="univ-stat-label">Internships</div></div>
            <div class="univ-stat-sep"></div>
            <div class="univ-stat"><div class="univ-stat-value">{{ $univ->departments_count }}</div><div class="univ-stat-label">Departments</div></div>
          </div>
          <div class="univ-card-actions">
            <button class="btn btn-sm btn-icon-outline" onclick="viewUniv(this)" title="View Details"><i class="fas fa-eye"></i></button>
            <button class="btn btn-sm btn-outline flex-1" onclick="editUniv(this)"><i class="fas fa-pen"></i> Edit</button>
            <button class="btn btn-sm btn-icon-danger" onclick="deleteUniv(this)" title="Delete"><i class="fas fa-trash"></i></button>
          </div>
        </div>
        @endforeach
      </div>

<!-- ═══════════════════════════════ ADD UNIVERSITY MODAL ═══════════════════════════════ -->
@push('modals')
<div class="modal-overlay" id="univAddModal" onclick="closeUnivModalOnOverlay(event,'univAddModal')">
  <div class="slide-panel">
    <div class="slide-panel-header">
      <div class="slide-panel-title">
        <div class="slide-panel-icon" style="background:rgba(37,99,235,0.12);color:var(--primary)"><i class="fas fa-plus"></i></div>
        <div><h3>Add University</h3><p>Register a new partner university</p></div>
      </div>
      <button class="panel-close-btn" onclick="closeUnivModal('univAddModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="slide-panel-body">
      <form onsubmit="submitUnivAdd(event)">

        <div class="panel-section-label">University Information</div>

        <div class="form-group">
          <label class="form-label">University Name <span class="required">*</span></label>
          <div class="input-with-icon">
            <i class="fas fa-university input-icon"></i>
            <input type="text" class="form-input" id="uadd-name" placeholder="e.g. University of Shkodra" required />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">City <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-location-dot input-icon"></i>
              <select class="form-input form-select" id="uadd-city" required>
                <option value="">Select City</option>
                <option>Tirana</option>
                <option>Durres</option>
                <option>Shkoder</option>
                <option>Vlore</option>
                <option>Elbasan</option>
                <option>Korce</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Country</label>
            <div class="input-with-icon">
              <i class="fas fa-flag input-icon"></i>
              <input type="text" class="form-input" id="uadd-country" value="Albania" />
            </div>
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Website</label>
            <div class="input-with-icon">
              <i class="fas fa-globe input-icon"></i>
              <input type="text" class="form-input" id="uadd-website" placeholder="e.g. university.edu.al" />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Contact Email <span class="required">*</span></label>
            <div class="input-with-icon">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" class="form-input" id="uadd-email" placeholder="contact@university.edu.al" required />
            </div>
          </div>
        </div>

        <div class="panel-section-label">Academic Structure</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Number of Faculties</label>
            <div class="input-with-icon">
              <i class="fas fa-layer-group input-icon"></i>
              <input type="number" class="form-input" id="uadd-faculties" placeholder="e.g. 6" min="0" />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Number of Departments</label>
            <div class="input-with-icon">
              <i class="fas fa-sitemap input-icon"></i>
              <input type="number" class="form-input" id="uadd-departments" placeholder="e.g. 18" min="0" />
            </div>
          </div>
        </div>

        <div class="panel-section-label">Status & Accreditation</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Status</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-circle-half-stroke input-icon"></i>
              <select class="form-input form-select" id="uadd-status">
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Inactive">Inactive</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Accreditation</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-certificate input-icon"></i>
              <select class="form-input form-select" id="uadd-accreditation">
                <option>Fully Accredited</option>
                <option>Conditionally Accredited</option>
                <option>Pending Review</option>
                <option>Not Accredited</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Description</label>
          <textarea class="form-input form-textarea" id="uadd-desc" rows="3" placeholder="Brief description of the university..."></textarea>
        </div>

        <div class="slide-panel-footer">
          <button type="button" class="btn btn-outline" onclick="closeUnivModal('univAddModal')">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add University</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════ VIEW UNIVERSITY MODAL ═══════════════════════════════ -->
<div class="modal-overlay" id="univViewModal" onclick="closeUnivModalOnOverlay(event,'univViewModal')">
  <div class="center-modal" style="width:600px;max-width:94vw;">
    <div class="center-modal-header" style="background:linear-gradient(135deg,rgba(37,99,235,0.08) 0%,rgba(37,99,235,0.02) 100%);">
      <div class="univ-view-icon" id="uv-icon-wrap">
        <i class="fas fa-university"></i>
      </div>
      <div class="center-modal-title-wrap">
        <h3 id="uv-name">University Name</h3>
        <div id="uv-location" style="font-size:12px;color:var(--gray-500);margin-top:3px;display:flex;align-items:center;gap:5px;"><i class="fas fa-location-dot"></i>Location</div>
      </div>
      <div style="display:flex;flex-direction:column;gap:8px;align-items:flex-end;">
        <span id="uv-status-badge" class="status-badge active">Active</span>
        <button class="panel-close-btn" onclick="closeUnivModal('univViewModal')"><i class="fas fa-xmark"></i></button>
      </div>
    </div>
    <div style="padding:20px 24px;">
      <!-- Stats Strip -->
      <div class="univ-view-stats-strip">
        <div class="univ-view-stat"><div class="univ-view-stat-val" id="uv-students">—</div><div class="univ-view-stat-lbl">Students</div></div>
        <div class="univ-stat-sep"></div>
        <div class="univ-view-stat"><div class="univ-view-stat-val" id="uv-faculties">—</div><div class="univ-view-stat-lbl">Faculties</div></div>
        <div class="univ-stat-sep"></div>
        <div class="univ-view-stat"><div class="univ-view-stat-val" id="uv-departments">—</div><div class="univ-view-stat-lbl">Departments</div></div>
        <div class="univ-stat-sep"></div>
        <div class="univ-view-stat"><div class="univ-view-stat-val" style="color:var(--green)" id="uv-internships">—</div><div class="univ-view-stat-lbl">Internships</div></div>
      </div>
      <div class="view-info-grid" style="margin-top:16px;">
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-globe"></i> Website</span>
          <span class="view-info-value" id="uv-website">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-certificate"></i> Accreditation</span>
          <span class="view-info-value" id="uv-accreditation">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-location-dot"></i> City</span>
          <span class="view-info-value" id="uv-city">—</span>
        </div>
      </div>
    </div>
    <div class="center-modal-footer">
      <button class="btn btn-outline" onclick="closeUnivModal('univViewModal')">Close</button>
      <button class="btn btn-danger-sm" id="uv-delete-btn"><i class="fas fa-trash"></i> Delete</button>
      <button class="btn btn-primary" id="uv-edit-btn"><i class="fas fa-pen"></i> Edit</button>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════ EDIT UNIVERSITY MODAL ═══════════════════════════════ -->
<div class="modal-overlay" id="univEditModal" onclick="closeUnivModalOnOverlay(event,'univEditModal')">
  <div class="slide-panel">
    <div class="slide-panel-header">
      <div class="slide-panel-title">
        <div class="slide-panel-icon" style="background:rgba(245,158,11,0.12);color:var(--warning)"><i class="fas fa-pen"></i></div>
        <div><h3>Edit University</h3><p>Update university information</p></div>
      </div>
      <button class="panel-close-btn" onclick="closeUnivModal('univEditModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="slide-panel-body">
      <form onsubmit="submitUnivEdit(event)">
        <div class="panel-section-label">University Information</div>
        <div class="form-group">
          <label class="form-label">University Name <span class="required">*</span></label>
          <div class="input-with-icon"><i class="fas fa-university input-icon"></i><input type="text" class="form-input" id="uedit-name" required /></div>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">City</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-location-dot input-icon"></i>
              <select class="form-input form-select" id="uedit-city">
                <option>Tirana</option><option>Durres</option><option>Shkoder</option><option>Vlore</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Website</label>
            <div class="input-with-icon"><i class="fas fa-globe input-icon"></i><input type="text" class="form-input" id="uedit-website" /></div>
          </div>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Contact Email</label>
            <div class="input-with-icon"><i class="fas fa-envelope input-icon"></i><input type="email" class="form-input" id="uedit-email" /></div>
          </div>
          <div class="form-group">
            <label class="form-label">Status</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-circle-half-stroke input-icon"></i>
              <select class="form-input form-select" id="uedit-status">
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Inactive">Inactive</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Number of Faculties</label>
            <div class="input-with-icon"><i class="fas fa-layer-group input-icon"></i><input type="number" class="form-input" id="uedit-faculties" min="0" /></div>
          </div>
          <div class="form-group">
            <label class="form-label">Accreditation</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-certificate input-icon"></i>
              <select class="form-input form-select" id="uedit-accreditation">
                <option>Fully Accredited</option><option>Conditionally Accredited</option><option>Pending Review</option><option>Not Accredited</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>
        <div class="slide-panel-footer">
          <button type="button" class="btn btn-outline" onclick="closeUnivModal('univEditModal')">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════ DELETE UNIVERSITY MODAL ═══════════════════════════════ -->
<div class="modal-overlay" id="univDeleteModal" onclick="closeUnivModalOnOverlay(event,'univDeleteModal')">
  <div class="center-modal delete-modal-box">
    <div class="delete-modal-icon-wrap">
      <div class="delete-modal-icon"><i class="fas fa-trash-can"></i></div>
    </div>
    <h3 class="delete-modal-title">Delete University</h3>
    <p class="delete-modal-desc">Are you sure you want to remove <strong id="univ-delete-name">this university</strong>? All associated departments, faculties, and internship records will be permanently removed.</p>
    <div class="delete-modal-actions">
      <button class="btn btn-outline" onclick="closeUnivModal('univDeleteModal')">Cancel</button>
      <button class="btn btn-danger" id="univ-delete-confirm-btn"><i class="fas fa-trash-can"></i> Delete University</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast-notification" id="univToast">
  <i class="fas fa-circle-check toast-icon"></i>
  <span id="univ-toast-msg">Done!</span>
</div>
@endpush

<style>
/* ── UNIVERSITY CARD GRID ── */
.univ-cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 20px;
  margin-bottom: 28px;
}

.univ-card {
  background: var(--white);
  border-radius: 16px;
  border: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
  overflow: hidden;
  transition: all 0.25s ease;
  display: flex;
  flex-direction: column;
}
.univ-card:hover {
  box-shadow: var(--shadow-md);
  transform: translateY(-3px);
  border-color: var(--gray-300);
}

.univ-card-header {
  padding: 20px 20px 0;
  display: flex;
  align-items: flex-start;
  gap: 14px;
}

.univ-card-icon {
  width: 52px; height: 52px;
  border-radius: 14px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  flex-shrink: 0;
}

.univ-card-info { flex: 1; }
.univ-card-info h4 { font-size: 15px; font-weight: 700; color: var(--gray-800); margin: 0 0 4px; }
.univ-card-location, .univ-card-website {
  font-size: 12px; color: var(--gray-500);
  display: flex; align-items: center; gap: 5px;
  margin-top: 2px;
}

.univ-card-stats {
  display: flex; align-items: center;
  margin: 16px 20px;
  padding: 14px 0;
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}
.univ-stat { flex: 1; text-align: center; }
.univ-stat-value { font-size: 18px; font-weight: 700; color: var(--gray-800); }
.univ-stat-label { font-size: 11px; color: var(--gray-400); font-weight: 500; margin-top: 2px; }
.univ-stat-sep { width: 1px; background: var(--gray-200); height: 32px; }

.univ-card-actions {
  padding: 0 20px 18px;
  display: flex; gap: 8px; align-items: center;
  margin-top: auto;
}
.flex-1 { flex: 1; justify-content: center; }

/* VIEW MODAL STYLES */
.univ-view-icon {
  width: 48px; height: 48px; border-radius: 12px;
  background: rgba(37,99,235,0.12); color: var(--primary);
  display: flex; align-items: center; justify-content: center;
  font-size: 20px; flex-shrink: 0;
}
.univ-view-stats-strip {
  display: flex; align-items: center;
  background: var(--gray-50); border-radius: 12px;
  padding: 16px 0;
}
.univ-view-stat { flex: 1; text-align: center; }
.univ-view-stat-val { font-size: 22px; font-weight: 700; color: var(--gray-800); }
.univ-view-stat-lbl { font-size: 11px; color: var(--gray-400); font-weight: 500; margin-top: 2px; }

/* SHARED STYLES */
.btn-danger-sm { background: rgba(239,68,68,0.1); color: var(--danger); border: 1.5px solid rgba(239,68,68,0.2); padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: var(--transition); }
.btn-danger-sm:hover { background: rgba(239,68,68,0.15); }

.modal-overlay { display:none;position:fixed;inset:0;background:rgba(15,23,42,.55);backdrop-filter:blur(4px);z-index:1000;align-items:center;justify-content:center; }
.modal-overlay.open { display:flex;animation:fadeIn .2s ease; }
@keyframes fadeIn { from{opacity:0} to{opacity:1} }
.slide-panel { background:var(--white);border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.18);width:600px;max-width:94vw;max-height:90vh;display:flex;flex-direction:column;animation:popIn .25s cubic-bezier(.16,1,.3,1);overflow:hidden; }
.slide-panel-header { display:flex;align-items:center;justify-content:space-between;padding:22px 24px;border-bottom:1px solid var(--border);background:var(--gray-50);flex-shrink:0; }
.slide-panel-title { display:flex;align-items:center;gap:14px; }
.slide-panel-icon { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
.slide-panel-title h3 { font-size:16px;font-weight:700;color:var(--gray-800);margin:0; }
.slide-panel-title p  { font-size:12px;color:var(--gray-500);margin:2px 0 0; }
.panel-close-btn { width:34px;height:34px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--gray-600);font-size:15px;transition:var(--transition); }
.panel-close-btn:hover { background:var(--gray-200); }
.slide-panel-body { flex:1;overflow-y:auto;padding:24px;scrollbar-width:thin; }
.panel-section-label { font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--gray-400);margin:20px 0 14px;padding-bottom:8px;border-bottom:1px solid var(--border); }
.panel-section-label:first-child { margin-top:0; }
.slide-panel-footer { display:flex;gap:10px;justify-content:flex-end;padding-top:20px;margin-top:8px;border-top:1px solid var(--border); }
.form-input { width:100%;padding:10px 14px;border:1.5px solid var(--gray-200);border-radius:8px;font-size:13px;color:var(--gray-800);background:var(--white);transition:var(--transition);outline:none; }
.form-input:focus { border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-bg); }
.form-input::placeholder { color:var(--gray-400); }
.form-textarea { resize:vertical;min-height:80px; }
.form-row-2 { display:grid;grid-template-columns:1fr 1fr;gap:14px; }
.input-with-icon { position:relative; }
.input-with-icon .input-icon { position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none; }
.input-with-icon .form-input { padding-left:34px; }
.select-wrapper-panel { position:relative; }
.select-wrapper-panel .input-icon { position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none;z-index:1; }
.select-wrapper-panel .select-arrow { position:absolute;right:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:11px;pointer-events:none; }
.select-wrapper-panel .form-select { padding-left:34px;padding-right:30px;appearance:none; }
.center-modal { background:var(--white);border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.18);max-width:94vw;animation:popIn .25s cubic-bezier(.16,1,.3,1);overflow:hidden; }
@keyframes popIn { from{transform:scale(.92);opacity:0} to{transform:scale(1);opacity:1} }
.center-modal-header { display:flex;align-items:center;gap:14px;padding:22px 24px;border-bottom:1px solid var(--border); }
.center-modal-title-wrap { flex:1; }
.center-modal-title-wrap h3 { font-size:16px;font-weight:700;color:var(--gray-800);margin:0; }
.center-modal-footer { display:flex;gap:10px;justify-content:flex-end;padding:16px 24px;border-top:1px solid var(--border); }
.delete-modal-box { width:440px;text-align:center;padding:36px 28px; }
.delete-modal-icon-wrap { margin-bottom:16px; }
.delete-modal-icon { width:68px;height:68px;border-radius:50%;background:rgba(239,68,68,.1);color:var(--danger);display:inline-flex;align-items:center;justify-content:center;font-size:28px; }
.delete-modal-title { font-size:19px;font-weight:700;color:var(--gray-800);margin:0 0 10px; }
.delete-modal-desc { font-size:14px;color:var(--gray-500);line-height:1.65;margin-bottom:26px; }
.delete-modal-actions { display:flex;gap:10px;justify-content:center; }
.btn-icon-outline { display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;padding:0;border-radius:8px;background:transparent;border:1.5px solid var(--gray-300);color:var(--gray-600);font-size:13px;transition:var(--transition); }
.btn-icon-outline:hover { background:var(--gray-50);border-color:var(--primary);color:var(--primary); }
.btn-icon-danger { display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;padding:0;border-radius:8px;background:transparent;border:1.5px solid rgba(239,68,68,.3);color:var(--danger);font-size:13px;transition:var(--transition); }
.btn-icon-danger:hover { background:rgba(239,68,68,.08); }
.toast-notification { position:fixed;bottom:28px;right:28px;background:var(--gray-900);color:#fff;border-radius:10px;padding:12px 20px;font-size:13px;font-weight:500;display:flex;align-items:center;gap:10px;box-shadow:0 8px 24px rgba(0,0,0,.2);z-index:2000;transform:translateY(80px);opacity:0;transition:all .35s cubic-bezier(.16,1,.3,1);pointer-events:none; }
.toast-notification.show { transform:translateY(0);opacity:1; }
.toast-icon { color:var(--green);font-size:16px; }
.view-info-grid { display:grid;grid-template-columns:1fr 1fr;gap:14px; }
.view-info-item { display:flex;flex-direction:column;gap:4px; }
.view-info-label { font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--gray-400);display:flex;align-items:center;gap:5px; }
.view-info-value { font-size:14px;font-weight:600;color:var(--gray-800); }
.required { color:var(--danger); }
.stat-change.up { color: var(--green); font-size: 12px; margin-top: 4px; }
.stat-change.up i { font-size: 10px; }
</style>

<script>
let univCardToDelete = null;
let univCardBeingEdited = null;
let univViewCard = null;

function openUnivAdd() {
  document.getElementById('univAddModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeUnivModal(id) {
  document.getElementById(id).classList.remove('open');
  document.body.style.overflow = '';
}

function closeUnivModalOnOverlay(e, id) {
  if (e.target === document.getElementById(id)) closeUnivModal(id);
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') ['univAddModal','univEditModal','univViewModal','univDeleteModal'].forEach(closeUnivModal);
});

// ── VIEW ──
function viewUniv(btn) {
  univViewCard = btn.closest('.univ-card');
  const card = univViewCard;
  const name   = card.querySelector('.univ-card-info h4').textContent;
  const loc    = card.querySelector('.univ-card-location').textContent.trim();
  const site   = card.querySelector('.univ-card-website').textContent.trim();
  const stats  = card.querySelectorAll('.univ-stat-value');
  const sts    = card.querySelector('.status-badge');

  document.getElementById('uv-name').textContent = name;
  document.getElementById('uv-location').innerHTML = `<i class="fas fa-location-dot"></i>${loc}`;
  document.getElementById('uv-website').textContent  = site;
  document.getElementById('uv-students').textContent = stats[0]?.textContent || '—';
  document.getElementById('uv-faculties').textContent= stats[1]?.textContent || '—';
  document.getElementById('uv-internships').textContent = stats[2]?.textContent || '—';
  document.getElementById('uv-departments').textContent = stats[3]?.textContent || '—';
  document.getElementById('uv-city').textContent = loc.replace(', Albania','').replace(', ','');
  document.getElementById('uv-accreditation').textContent = 'Fully Accredited';

  const sb = document.getElementById('uv-status-badge');
  sb.className = 'status-badge ' + (sts ? sts.classList[1] : 'active');
  sb.textContent = sts ? sts.textContent : 'Active';

  document.getElementById('uv-edit-btn').onclick = () => { closeUnivModal('univViewModal'); editUniv(btn); };
  document.getElementById('uv-delete-btn').onclick = () => { closeUnivModal('univViewModal'); deleteUniv(btn); };

  document.getElementById('univViewModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

// ── EDIT ──
function editUniv(btn) {
  univCardBeingEdited = btn.closest('.univ-card');
  const card = univCardBeingEdited;
  const name = card.querySelector('.univ-card-info h4').textContent;
  const site = card.querySelector('.univ-card-website').textContent.trim();
  const loc  = card.querySelector('.univ-card-location').textContent.trim().replace(', Albania','').trim();
  const stats= card.querySelectorAll('.univ-stat-value');
  const sts  = card.querySelector('.status-badge').textContent.trim();

  document.getElementById('uedit-name').value = name;
  document.getElementById('uedit-website').value = site;
  document.getElementById('uedit-faculties').value = stats[1]?.textContent || '';
  setUnivSel('uedit-city', loc);
  setUnivSel('uedit-status', sts);

  document.getElementById('univEditModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function setUnivSel(id, val) {
  const sel = document.getElementById(id);
  if (!sel) return;
  for (let opt of sel.options) {
    if (opt.value === val || opt.textContent.trim() === val) { sel.value = opt.value; return; }
  }
}

function submitUnivEdit(e) {
  e.preventDefault();
  if (!univCardBeingEdited) { closeUnivModal('univEditModal'); return; }
  const id = univCardBeingEdited.getAttribute('data-id');
  const name = document.getElementById('uedit-name').value.trim();
  const city = document.getElementById('uedit-city').value;
  const site = document.getElementById('uedit-website').value.trim();
  const sts  = document.getElementById('uedit-status').value;
  const facs = document.getElementById('uedit-faculties').value;

  fetch(`/{{ $slug }}/admin/universities/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    },
    body: JSON.stringify({ name, city, website: site, status: sts, faculties_count: facs })
  }).then(res => res.json()).then(data => {
    if (data.success) {
      univCardBeingEdited.querySelector('.univ-card-info h4').textContent = name;
      univCardBeingEdited.querySelector('.univ-card-location').innerHTML = `<i class="fas fa-location-dot"></i> ${city}, Albania`;
      univCardBeingEdited.querySelector('.univ-card-website').innerHTML  = `<i class="fas fa-globe"></i> ${site}`;

      const statsVals = univCardBeingEdited.querySelectorAll('.univ-stat-value');
      if (statsVals[1] && facs) statsVals[1].textContent = facs;

      const sb = univCardBeingEdited.querySelector('.status-badge');
      const cls = { Active:'active', Pending:'pending', Inactive:'inactive' }[sts] || 'active';
      sb.className = 'status-badge ' + cls;
      sb.textContent = sts;

      univCardBeingEdited.setAttribute('data-status', sts);
      univCardBeingEdited.setAttribute('data-city', city);
      univCardBeingEdited.setAttribute('data-name', name.toLowerCase());

      univCardBeingEdited.style.outline = '2px solid var(--primary)';
      setTimeout(() => { if (univCardBeingEdited) univCardBeingEdited.style.outline = ''; }, 900);
      univCardBeingEdited = null;
      closeUnivModal('univEditModal');
      showUnivToast('University updated successfully!');
    }
  });
}

// ── ADD ──
function submitUnivAdd(e) {
  e.preventDefault();
  const name  = document.getElementById('uadd-name').value.trim();
  const city  = document.getElementById('uadd-city').value;
  const site  = document.getElementById('uadd-website').value.trim();
  const facs  = document.getElementById('uadd-faculties').value || '0';
  const depts = document.getElementById('uadd-departments').value || '0';
  const sts   = document.getElementById('uadd-status').value;

  fetch(`/{{ $slug }}/admin/universities`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    },
    body: JSON.stringify({ name, city, website: site, status: sts, faculties_count: facs, departments_count: depts })
  }).then(res => res.json()).then(data => {
    if (data.success) {
      window.location.reload(); // Reload to show the new card with proper DB ID
    }
  });
}

// ── DELETE ──
function deleteUniv(btn) {
  univCardToDelete = btn.closest('.univ-card');
  const name = univCardToDelete.querySelector('.univ-card-info h4').textContent;
  document.getElementById('univ-delete-name').textContent = `"${name}"`;
  document.getElementById('univ-delete-confirm-btn').onclick = confirmUnivDelete;
  document.getElementById('univDeleteModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function confirmUnivDelete() {
  if (!univCardToDelete) return;
  const id = univCardToDelete.getAttribute('data-id');
  fetch(`/{{ $slug }}/admin/universities/${id}`, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    }
  }).then(res => res.json()).then(data => {
    if (data.success) {
      univCardToDelete.style.opacity  = '0';
      univCardToDelete.style.transform= 'scale(0.93)';
      univCardToDelete.style.transition = 'all .35s ease';
      setTimeout(() => { univCardToDelete.remove(); univCardToDelete = null; }, 360);
      closeUnivModal('univDeleteModal');
      showUnivToast('University removed.');
    }
  });
}

// ── FILTER ──
function filterUnivCards() {
  const q    = document.getElementById('univSearch').value.toLowerCase();
  const sts  = document.getElementById('univStatusFilter').value;
  const city = document.getElementById('univCityFilter').value;
  document.querySelectorAll('.univ-card').forEach(card => {
    const name  = card.getAttribute('data-name') || '';
    const cSts  = card.getAttribute('data-status') || '';
    const cCity = card.getAttribute('data-city') || '';
    const match = name.includes(q) &&
                  (!sts  || cSts  === sts) &&
                  (!city || cCity === city);
    card.style.display = match ? '' : 'none';
  });
}

function showUnivToast(msg) {
  const t = document.getElementById('univToast');
  document.getElementById('univ-toast-msg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}

function exportUniversities() {
  const rows = [['Name', 'City', 'Website', 'Status', 'Students', 'Faculties', 'Internships', 'Departments']];
  
  document.querySelectorAll('.univ-card').forEach(card => {
    if (card.style.display === 'none') return;
    
    const name = card.querySelector('.univ-card-info h4').textContent.trim();
    const city = card.getAttribute('data-city');
    const status = card.getAttribute('data-status');
    const website = card.querySelector('.univ-card-website').textContent.trim();
    const stats = card.querySelectorAll('.univ-stat-value');
    
    rows.push([
      `"${name}"`,
      `"${city}"`,
      `"${website}"`,
      `"${status}"`,
      stats[0] ? stats[0].textContent.trim() : '0',
      stats[1] ? stats[1].textContent.trim() : '0',
      stats[2] ? stats[2].textContent.trim() : '0',
      stats[3] ? stats[3].textContent.trim() : '0'
    ]);
  });
  
  const csv = rows.map(r => r.join(',')).join('\n');
  const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
  const url = window.URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.setAttribute('href', url);
  a.setAttribute('download', 'universities_export.csv');
  a.click();
  
  showUnivToast('Export downloaded successfully!');
}
</script>

</x-layouts::admin>
