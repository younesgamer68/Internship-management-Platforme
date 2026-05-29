<x-layouts::app :title="__('Departments')">
<!-- Page Header -->
      <div class="page-header">
        <div class="page-header-left">
          <h2>Departments</h2>
          <p>Manage departments within all faculties and universities</p>
        </div>
        <div class="page-header-actions">
          <button class="btn btn-primary" onclick="openDeptAdd()"><i class="fas fa-plus"></i> Add Department</button>
        </div>
      </div>

      <!-- Stats Row -->
      <div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr));margin-bottom:28px;">
        <div class="stat-card">
          <div class="stat-icon blue"><i class="fas fa-sitemap"></i></div>
          <div class="stat-info">
            <div class="stat-value">94</div>
            <div class="stat-label">Total Departments</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 3 this semester</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green"><i class="fas fa-circle-check"></i></div>
          <div class="stat-info">
            <div class="stat-value">81</div>
            <div class="stat-label">Active</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 2 this month</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon warning"><i class="fas fa-clock"></i></div>
          <div class="stat-info">
            <div class="stat-value">13</div>
            <div class="stat-label">Pending / Inactive</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon purple"><i class="fas fa-briefcase"></i></div>
          <div class="stat-info">
            <div class="stat-value">98</div>
            <div class="stat-label">Active Internships</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 12 new</div>
          </div>
        </div>
      </div>

      <!-- Filter Bar -->
      <div class="filter-bar card" style="margin-bottom:24px;">
        <div class="filter-bar-inner">
          <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search departments..." id="deptSearchInput" oninput="filterDeptRows()" />
          </div>
          <div class="filter-selects">
            <select class="filter-select" id="deptUnivFilter" onchange="filterDeptRows()">
              <option value="">All Universities</option>
              <option value="Epoka University">Epoka University</option>
              <option value="Albanian University">Albanian University</option>
              <option value="University of Tirana">University of Tirana</option>
              <option value="Polytechnic University">Polytechnic University</option>
              <option value="Beder University">Beder University</option>
              <option value="UET Tirana">UET Tirana</option>
            </select>
            <select class="filter-select" id="deptFacultyFilter" onchange="filterDeptRows()">
              <option value="">All Faculties</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Economics">Economics</option>
              <option value="Law">Law</option>
              <option value="Engineering">Engineering</option>
              <option value="Natural Sciences">Natural Sciences</option>
              <option value="Health Sciences">Health Sciences</option>
            </select>
            <select class="filter-select" id="deptStatusFilter" onchange="filterDeptRows()">
              <option value="">All Statuses</option>
              <option value="active">Active</option>
              <option value="pending">Pending</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Departments Table -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">All Departments <span class="count-badge" id="deptCount">(8 shown)</span></span>
          <button class="btn btn-outline btn-sm" onclick="exportDepts()"><i class="fas fa-download"></i> Export</button>
        </div>
        <div class="card-body" style="padding-top:16px;">
          <div class="table-wrapper">
            <table id="deptTable">
              <thead>
                <tr>
                  <th>Department Name</th>
                  <th>Faculty</th>
                  <th>University</th>
                  <th>Head</th>
                  <th>Students</th>
                  <th>Active Internships</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr data-univ="Epoka University" data-faculty="Computer Science" data-status="active">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-code"></i></div><span>Software Engineering</span></div></td>
                  <td><span class="faculty-tag">Computer Science</span></td>
                  <td>Epoka University</td>
                  <td><div class="head-cell"><div class="head-avatar">GS</div>Dr. Gent Sula</div></td>
                  <td><strong>94</strong></td>
                  <td><span class="intern-count green">18</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
                <tr data-univ="Epoka University" data-faculty="Computer Science" data-status="active">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-network-wired"></i></div><span>Computer Networks</span></div></td>
                  <td><span class="faculty-tag">Computer Science</span></td>
                  <td>Epoka University</td>
                  <td><div class="head-cell"><div class="head-avatar">IM</div>Dr. Ina Mema</div></td>
                  <td><strong>72</strong></td>
                  <td><span class="intern-count green">12</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
                <tr data-univ="Albanian University" data-faculty="Economics" data-status="active">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-money-bill-trend-up"></i></div><span>Finance &amp; Accounting</span></div></td>
                  <td><span class="faculty-tag">Economics</span></td>
                  <td>Albanian University</td>
                  <td><div class="head-cell"><div class="head-avatar">RK</div>Dr. Rrita Kola</div></td>
                  <td><strong>108</strong></td>
                  <td><span class="intern-count green">9</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
                <tr data-univ="Albanian University" data-faculty="Economics" data-status="active">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-bullhorn"></i></div><span>Marketing &amp; Commerce</span></div></td>
                  <td><span class="faculty-tag">Economics</span></td>
                  <td>Albanian University</td>
                  <td><div class="head-cell"><div class="head-avatar">AT</div>Dr. Arlind Tafa</div></td>
                  <td><strong>86</strong></td>
                  <td><span class="intern-count green">14</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
                <tr data-univ="Polytechnic University" data-faculty="Engineering" data-status="active">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(16,185,129,0.1);color:var(--green)"><i class="fas fa-hammer"></i></div><span>Civil Engineering</span></div></td>
                  <td><span class="faculty-tag">Engineering</span></td>
                  <td>Polytechnic University</td>
                  <td><div class="head-cell"><div class="head-avatar">PG</div>Dr. Pjeter Gjini</div></td>
                  <td><strong>132</strong></td>
                  <td><span class="intern-count green">22</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
                <tr data-univ="Polytechnic University" data-faculty="Engineering" data-status="pending">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-microchip"></i></div><span>Electrical Engineering</span></div></td>
                  <td><span class="faculty-tag">Engineering</span></td>
                  <td>Polytechnic University</td>
                  <td><div class="head-cell"><div class="head-avatar">FH</div>Dr. Fatbardha Hoti</div></td>
                  <td><strong>97</strong></td>
                  <td><span class="intern-count warning">6</span></td>
                  <td><span class="status-badge pending">Pending</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
                <tr data-univ="University of Tirana" data-faculty="Natural Sciences" data-status="active">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(99,102,241,0.1);color:#6366F1"><i class="fas fa-atom"></i></div><span>Physics &amp; Mathematics</span></div></td>
                  <td><span class="faculty-tag">Natural Sciences</span></td>
                  <td>University of Tirana</td>
                  <td><div class="head-cell"><div class="head-avatar">EZ</div>Dr. Elton Zhuli</div></td>
                  <td><strong>115</strong></td>
                  <td><span class="intern-count green">10</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
                <tr data-univ="Albanian University" data-faculty="Health Sciences" data-status="active">
                  <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(239,68,68,0.1);color:var(--danger)"><i class="fas fa-briefcase-medical"></i></div><span>Public Health</span></div></td>
                  <td><span class="faculty-tag">Health Sciences</span></td>
                  <td>Albanian University</td>
                  <td><div class="head-cell"><div class="head-avatar">MC</div>Dr. Majlinda Cara</div></td>
                  <td><strong>88</strong></td>
                  <td><span class="intern-count green">7</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div class="pagination" style="margin-top:20px;padding-top:16px;border-top:1px solid var(--gray-100);">
            <button class="page-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
          </div>
        </div>
      </div>

<!-- ═══════════════════════════════ ADD DEPARTMENT MODAL ═══════════════════════════════ -->
<div class="modal-overlay" id="deptAddModal" onclick="closeDeptModalOnOverlay(event,'deptAddModal')">
  <div class="slide-panel">
    <div class="slide-panel-header">
      <div class="slide-panel-title">
        <div class="slide-panel-icon" style="background:rgba(37,99,235,0.12);color:var(--primary)"><i class="fas fa-plus"></i></div>
        <div><h3>Add New Department</h3><p>Fill in the department details below</p></div>
      </div>
      <button class="panel-close-btn" onclick="closeDeptModal('deptAddModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="slide-panel-body">
      <form onsubmit="submitDeptAdd(event)">

        <div class="panel-section-label">Department Information</div>

        <div class="form-group">
          <label class="form-label">Department Name <span class="required">*</span></label>
          <div class="input-with-icon">
            <i class="fas fa-sitemap input-icon"></i>
            <input type="text" class="form-input" id="dadd-name" placeholder="e.g. Software Engineering" required />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Faculty <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-layer-group input-icon"></i>
              <select class="form-input form-select" id="dadd-faculty" required>
                <option value="">Select Faculty</option>
                <option>Computer Science</option>
                <option>Economics</option>
                <option>Law</option>
                <option>Engineering</option>
                <option>Natural Sciences</option>
                <option>Health Sciences</option>
                <option>Social Sciences</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">University <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-university input-icon"></i>
              <select class="form-input form-select" id="dadd-univ" required>
                <option value="">Select University</option>
                <option>Epoka University</option>
                <option>Albanian University</option>
                <option>University of Tirana</option>
                <option>Polytechnic University</option>
                <option>Beder University</option>
                <option>UET Tirana</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="panel-section-label">Department Head</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Head Name <span class="required">*</span></label>
            <div class="input-with-icon">
              <i class="fas fa-user-tie input-icon"></i>
              <input type="text" class="form-input" id="dadd-head" placeholder="e.g. Dr. John Smith" required />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Head Email</label>
            <div class="input-with-icon">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" class="form-input" id="dadd-heademail" placeholder="head@university.edu" />
            </div>
          </div>
        </div>

        <div class="panel-section-label">Statistics & Status</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Number of Students</label>
            <div class="input-with-icon">
              <i class="fas fa-user-graduate input-icon"></i>
              <input type="number" class="form-input" id="dadd-students" placeholder="e.g. 120" min="0" />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Status</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-circle-half-stroke input-icon"></i>
              <select class="form-input form-select" id="dadd-status">
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                <option value="inactive">Inactive</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Description</label>
          <textarea class="form-input form-textarea" id="dadd-desc" rows="3" placeholder="Brief description of this department..."></textarea>
        </div>

        <div class="slide-panel-footer">
          <button type="button" class="btn btn-outline" onclick="closeDeptModal('deptAddModal')">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Department</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════ VIEW DEPARTMENT MODAL ═══════════════════════════════ -->
<div class="modal-overlay" id="deptViewModal" onclick="closeDeptModalOnOverlay(event,'deptViewModal')">
  <div class="center-modal" style="width:560px;max-width:94vw;">
    <div class="center-modal-header">
      <div class="dept-view-icon-wrap" id="dv-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)">
        <i class="fas fa-code" id="dv-icon"></i>
      </div>
      <div class="center-modal-title-wrap">
        <h3 id="dv-name">Department Name</h3>
        <p id="dv-faculty-univ">Faculty · University</p>
      </div>
      <button class="panel-close-btn" onclick="closeDeptModal('deptViewModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div style="padding:20px 24px;">
      <!-- Stats strip -->
      <div class="view-stats-strip">
        <div class="view-stat-item">
          <div class="view-stat-value" id="dv-students">—</div>
          <div class="view-stat-label">Students</div>
        </div>
        <div class="view-stat-sep"></div>
        <div class="view-stat-item">
          <div class="view-stat-value green" id="dv-internships">—</div>
          <div class="view-stat-label">Active Internships</div>
        </div>
        <div class="view-stat-sep"></div>
        <div class="view-stat-item">
          <div id="dv-status-badge" class="status-badge active">Active</div>
          <div class="view-stat-label">Status</div>
        </div>
      </div>
      <div class="view-info-grid" style="margin-top:16px;">
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-user-tie"></i> Department Head</span>
          <span class="view-info-value" id="dv-head">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-university"></i> University</span>
          <span class="view-info-value" id="dv-univ">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-layer-group"></i> Faculty</span>
          <span class="view-info-value" id="dv-faculty">—</span>
        </div>
      </div>
    </div>
    <div class="center-modal-footer">
      <button class="btn btn-outline" onclick="closeDeptModal('deptViewModal')">Close</button>
      <button class="btn btn-primary" onclick="closeDeptModal('deptViewModal');editDept(currentViewRow)"><i class="fas fa-pen"></i> Edit</button>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════ EDIT DEPARTMENT MODAL ═══════════════════════════════ -->
<div class="modal-overlay" id="deptEditModal" onclick="closeDeptModalOnOverlay(event,'deptEditModal')">
  <div class="slide-panel">
    <div class="slide-panel-header">
      <div class="slide-panel-title">
        <div class="slide-panel-icon" style="background:rgba(245,158,11,0.12);color:var(--warning)"><i class="fas fa-pen"></i></div>
        <div><h3>Edit Department</h3><p>Update the department details</p></div>
      </div>
      <button class="panel-close-btn" onclick="closeDeptModal('deptEditModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="slide-panel-body">
      <form onsubmit="submitDeptEdit(event)">

        <div class="panel-section-label">Department Information</div>

        <div class="form-group">
          <label class="form-label">Department Name <span class="required">*</span></label>
          <div class="input-with-icon">
            <i class="fas fa-sitemap input-icon"></i>
            <input type="text" class="form-input" id="dedit-name" required />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Faculty <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-layer-group input-icon"></i>
              <select class="form-input form-select" id="dedit-faculty" required>
                <option>Computer Science</option>
                <option>Economics</option>
                <option>Law</option>
                <option>Engineering</option>
                <option>Natural Sciences</option>
                <option>Health Sciences</option>
                <option>Social Sciences</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">University <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-university input-icon"></i>
              <select class="form-input form-select" id="dedit-univ" required>
                <option>Epoka University</option>
                <option>Albanian University</option>
                <option>University of Tirana</option>
                <option>Polytechnic University</option>
                <option>Beder University</option>
                <option>UET Tirana</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="panel-section-label">Department Head</div>

        <div class="form-group">
          <label class="form-label">Head Name <span class="required">*</span></label>
          <div class="input-with-icon">
            <i class="fas fa-user-tie input-icon"></i>
            <input type="text" class="form-input" id="dedit-head" required />
          </div>
        </div>

        <div class="panel-section-label">Status</div>

        <div class="form-group">
          <label class="form-label">Status</label>
          <div class="select-wrapper-panel">
            <i class="fas fa-circle-half-stroke input-icon"></i>
            <select class="form-input form-select" id="dedit-status">
              <option value="active">Active</option>
              <option value="pending">Pending</option>
              <option value="inactive">Inactive</option>
            </select>
            <i class="fas fa-chevron-down select-arrow"></i>
          </div>
        </div>

        <div class="slide-panel-footer">
          <button type="button" class="btn btn-outline" onclick="closeDeptModal('deptEditModal')">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════ DELETE DEPARTMENT MODAL ═══════════════════════════════ -->
<div class="modal-overlay" id="deptDeleteModal" onclick="closeDeptModalOnOverlay(event,'deptDeleteModal')">
  <div class="center-modal delete-modal-box">
    <div class="delete-modal-icon-wrap">
      <div class="delete-modal-icon"><i class="fas fa-trash-can"></i></div>
    </div>
    <h3 class="delete-modal-title">Delete Department</h3>
    <p class="delete-modal-desc">Are you sure you want to delete <strong id="dept-delete-name">this department</strong>? All associated data will be removed and cannot be recovered.</p>
    <div class="delete-modal-actions">
      <button class="btn btn-outline" onclick="closeDeptModal('deptDeleteModal')">Cancel</button>
      <button class="btn btn-danger" id="dept-delete-confirm-btn"><i class="fas fa-trash-can"></i> Delete</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast-notification" id="deptToast">
  <i class="fas fa-circle-check toast-icon"></i>
  <span id="dept-toast-msg">Action completed!</span>
</div>

<style>
.dept-name-cell { display:flex;align-items:center;gap:10px; }
.dept-icon-sm { width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0; }

.faculty-tag { display:inline-block;background:rgba(99,102,241,0.1);color:#6366F1;font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px; }

.head-cell { display:flex;align-items:center;gap:8px;font-size:13px;color:var(--gray-700); }
.head-avatar { width:26px;height:26px;border-radius:50%;background:var(--primary-bg);color:var(--primary);font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0; }

.intern-count { font-weight:700;font-size:14px; }
.intern-count.green { color:var(--green); }
.intern-count.warning { color:var(--warning); }

.count-badge { font-size:12px;font-weight:400;color:var(--gray-400);margin-left:4px; }

.view-stats-strip { display:flex;align-items:center;background:var(--gray-50);border-radius:12px;padding:16px 0; }
.view-stat-item { flex:1;text-align:center; }
.view-stat-value { font-size:22px;font-weight:700;color:var(--gray-800); }
.view-stat-value.green { color:var(--green); }
.view-stat-label { font-size:11px;color:var(--gray-400);font-weight:500;margin-top:2px; }
.view-stat-sep { width:1px;background:var(--gray-200);height:36px; }
.dept-view-icon-wrap { width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0; }

/* shared modal styles (copied) */
.modal-overlay { display:none;position:fixed;inset:0;background:rgba(15,23,42,.55);backdrop-filter:blur(4px);z-index:1000;align-items:center;justify-content:flex-end; }
.modal-overlay.open { display:flex;animation:fadeIn .2s ease; }
#deptViewModal,#deptDeleteModal { align-items:center;justify-content:center; }
@keyframes fadeIn { from{opacity:0} to{opacity:1} }
.slide-panel { position:fixed;right:0;top:0;bottom:0;width:520px;max-width:96vw;background:#fff;box-shadow:-8px 0 40px rgba(0,0,0,.12);display:flex;flex-direction:column;animation:slideInRight .3s cubic-bezier(.16,1,.3,1);border-radius:16px 0 0 16px;overflow:hidden; }
@keyframes slideInRight { from{transform:translateX(100%)} to{transform:translateX(0)} }
.slide-panel-header { display:flex;align-items:center;justify-content:space-between;padding:22px 24px;border-bottom:1px solid var(--gray-100);background:var(--gray-50);flex-shrink:0; }
.slide-panel-title { display:flex;align-items:center;gap:14px; }
.slide-panel-icon { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
.slide-panel-title h3 { font-size:16px;font-weight:700;color:var(--gray-800);margin:0; }
.slide-panel-title p  { font-size:12px;color:var(--gray-500);margin:2px 0 0; }
.panel-close-btn { width:34px;height:34px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--gray-600);font-size:15px;transition:var(--transition); }
.panel-close-btn:hover { background:var(--gray-200); }
.slide-panel-body { flex:1;overflow-y:auto;padding:24px;scrollbar-width:thin; }
.panel-section-label { font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--gray-400);margin:20px 0 14px;padding-bottom:8px;border-bottom:1px solid var(--gray-100); }
.panel-section-label:first-child { margin-top:0; }
.slide-panel-footer { display:flex;gap:10px;justify-content:flex-end;padding-top:20px;margin-top:8px;border-top:1px solid var(--gray-100); }
.form-input { width:100%;padding:10px 14px;border:1.5px solid var(--gray-200);border-radius:8px;font-size:13px;color:var(--gray-800);background:#fff;transition:var(--transition);outline:none; }
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
.center-modal { background:#fff;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.18);width:560px;max-width:94vw;animation:popIn .25s cubic-bezier(.16,1,.3,1);overflow:hidden; }
@keyframes popIn { from{transform:scale(.92);opacity:0} to{transform:scale(1);opacity:1} }
.center-modal-header { display:flex;align-items:center;gap:14px;padding:22px 24px;border-bottom:1px solid var(--gray-100);background:var(--gray-50); }
.center-modal-title-wrap { flex:1; }
.center-modal-title-wrap h3 { font-size:16px;font-weight:700;color:var(--gray-800);margin:0; }
.center-modal-title-wrap p  { font-size:12px;color:var(--gray-500);margin:3px 0 0; }
.center-modal-footer { display:flex;gap:10px;justify-content:flex-end;padding:16px 24px;border-top:1px solid var(--gray-100); }
.delete-modal-box { width:420px;text-align:center;padding:32px 28px; }
.delete-modal-icon-wrap { margin-bottom:16px; }
.delete-modal-icon { width:64px;height:64px;border-radius:50%;background:rgba(239,68,68,.1);color:var(--danger);display:inline-flex;align-items:center;justify-content:center;font-size:26px; }
.delete-modal-title { font-size:18px;font-weight:700;color:var(--gray-800);margin:0 0 8px; }
.delete-modal-desc { font-size:14px;color:var(--gray-500);line-height:1.6;margin-bottom:24px; }
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
</style>

<script>
let deptRowToDelete = null;
let deptRowBeingEdited = null;
let currentViewRow = null;

function openDeptAdd() {
  document.getElementById('deptAddModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeDeptModal(id) {
  document.getElementById(id).classList.remove('open');
  document.body.style.overflow = '';
}

function closeDeptModalOnOverlay(e, id) {
  if (e.target === document.getElementById(id)) closeDeptModal(id);
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') ['deptAddModal','deptEditModal','deptViewModal','deptDeleteModal'].forEach(closeDeptModal);
});

// ── VIEW ──
function viewDept(btn) {
  const row = btn.closest('tr');
  currentViewRow = btn;
  const name  = row.querySelector('.dept-name-cell span').textContent;
  const fac   = row.cells[1].querySelector('.faculty-tag').textContent;
  const univ  = row.cells[2].textContent.trim();
  const head  = row.querySelector('.head-cell').textContent.trim().replace(/^\S+\s/,'');
  const sts   = row.querySelector('.status-badge').textContent.trim();
  const stsCls= row.querySelector('.status-badge').classList[1];
  const students   = row.cells[4].textContent.trim();
  const internships= row.cells[5].textContent.trim();

  document.getElementById('dv-name').textContent = name;
  document.getElementById('dv-faculty-univ').textContent = `${fac} · ${univ}`;
  document.getElementById('dv-head').textContent = head;
  document.getElementById('dv-univ').textContent = univ;
  document.getElementById('dv-faculty').textContent = fac;
  document.getElementById('dv-students').textContent = students;
  document.getElementById('dv-internships').textContent = internships;

  const sb = document.getElementById('dv-status-badge');
  sb.className = 'status-badge ' + stsCls;
  sb.textContent = sts;

  document.getElementById('deptViewModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

// ── EDIT ──
function editDept(btn) {
  deptRowBeingEdited = btn.closest('tr');
  const row = deptRowBeingEdited;
  document.getElementById('dedit-name').value = row.querySelector('.dept-name-cell span').textContent;
  const fac = row.cells[1].querySelector('.faculty-tag').textContent;
  const univ= row.cells[2].textContent.trim();
  const head= row.querySelector('.head-cell').textContent.trim().replace(/^\S+\s/,'');
  const sts = row.querySelector('.status-badge').classList[1];
  setDeptSelectVal('dedit-faculty', fac);
  setDeptSelectVal('dedit-univ', univ);
  document.getElementById('dedit-head').value = head;
  setDeptSelectVal('dedit-status', sts);
  document.getElementById('deptEditModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function setDeptSelectVal(id, val) {
  const sel = document.getElementById(id);
  if (!sel) return;
  for (let opt of sel.options) {
    if (opt.value === val || opt.textContent.trim() === val) { sel.value = opt.value; return; }
  }
}

function submitDeptEdit(e) {
  e.preventDefault();
  if (!deptRowBeingEdited) { closeDeptModal('deptEditModal'); return; }
  const name = document.getElementById('dedit-name').value.trim();
  const fac  = document.getElementById('dedit-faculty').value;
  const univ = document.getElementById('dedit-univ').value;
  const head = document.getElementById('dedit-head').value.trim();
  const sts  = document.getElementById('dedit-status').value;

  deptRowBeingEdited.querySelector('.dept-name-cell span').textContent = name;
  deptRowBeingEdited.cells[1].querySelector('.faculty-tag').textContent = fac;
  deptRowBeingEdited.cells[2].textContent = univ;

  const headCell = deptRowBeingEdited.querySelector('.head-cell');
  const initials = head.split(' ').filter(w => /^[A-Z]/.test(w)).map(w=>w[0]).join('').slice(0,2);
  headCell.innerHTML = `<div class="head-avatar">${initials}</div>${head}`;

  const sb = deptRowBeingEdited.querySelector('.status-badge');
  sb.className = 'status-badge ' + sts;
  sb.textContent = sts.charAt(0).toUpperCase() + sts.slice(1);

  deptRowBeingEdited.style.background = 'rgba(0,177,170,0.06)';
  setTimeout(() => deptRowBeingEdited.style.background = '', 800);
  deptRowBeingEdited = null;
  closeDeptModal('deptEditModal');
  showDeptToast('Department updated successfully!');
}

// ── ADD ──
function submitDeptAdd(e) {
  e.preventDefault();
  const name  = document.getElementById('dadd-name').value.trim();
  const fac   = document.getElementById('dadd-faculty').value;
  const univ  = document.getElementById('dadd-univ').value;
  const head  = document.getElementById('dadd-head').value.trim();
  const students = document.getElementById('dadd-students').value || '0';
  const sts   = document.getElementById('dadd-status').value;

  const initials = head.split(' ').filter(w => /^[A-Z]/.test(w)).map(w=>w[0]).join('').slice(0,2);
  const stsCls = sts;
  const stsLabel = sts.charAt(0).toUpperCase() + sts.slice(1);

  const tbody = document.querySelector('#deptTable tbody');
  const row = document.createElement('tr');
  row.setAttribute('data-univ', univ);
  row.setAttribute('data-faculty', fac);
  row.setAttribute('data-status', sts);
  row.style.opacity = '0';
  row.style.transition = 'opacity 0.4s ease';
  row.innerHTML = `
    <td><div class="dept-name-cell"><div class="dept-icon-sm" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-sitemap"></i></div><span>${name}</span></div></td>
    <td><span class="faculty-tag">${fac}</span></td>
    <td>${univ}</td>
    <td><div class="head-cell"><div class="head-avatar">${initials}</div>${head}</div></td>
    <td><strong>${students}</strong></td>
    <td><span class="intern-count green">0</span></td>
    <td><span class="status-badge ${stsCls}">${stsLabel}</span></td>
    <td><div class="flex gap-8">
      <button class="btn btn-sm btn-icon-outline" onclick="viewDept(this)" title="View"><i class="fas fa-eye"></i></button>
      <button class="btn btn-sm btn-icon-outline" onclick="editDept(this)" title="Edit"><i class="fas fa-pen"></i></button>
      <button class="btn btn-sm btn-icon-danger" onclick="deleteDept(this)" title="Delete"><i class="fas fa-trash"></i></button>
    </div></td>`;
  tbody.insertBefore(row, tbody.firstChild);
  setTimeout(() => row.style.opacity = '1', 50);
  e.target.reset();
  closeDeptModal('deptAddModal');
  showDeptToast('Department added successfully!');
}

// ── DELETE ──
function deleteDept(btn) {
  deptRowToDelete = btn.closest('tr');
  const name = deptRowToDelete.querySelector('.dept-name-cell span').textContent;
  document.getElementById('dept-delete-name').textContent = `"${name}"`;
  document.getElementById('dept-delete-confirm-btn').onclick = confirmDeptDelete;
  document.getElementById('deptDeleteModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function confirmDeptDelete() {
  if (!deptRowToDelete) return;
  deptRowToDelete.style.opacity  = '0';
  deptRowToDelete.style.transform= 'translateY(-8px)';
  deptRowToDelete.style.transition = 'all .35s ease';
  setTimeout(() => { deptRowToDelete.remove(); deptRowToDelete = null; }, 360);
  closeDeptModal('deptDeleteModal');
  showDeptToast('Department deleted.');
}

// ── FILTER ──
function filterDeptRows() {
  const q     = document.getElementById('deptSearchInput').value.toLowerCase();
  const univ  = document.getElementById('deptUnivFilter').value;
  const fac   = document.getElementById('deptFacultyFilter').value;
  const sts   = document.getElementById('deptStatusFilter').value;
  let shown = 0;
  document.querySelectorAll('#deptTable tbody tr').forEach(row => {
    const name  = row.querySelector('.dept-name-cell span').textContent.toLowerCase();
    const rUniv = row.getAttribute('data-univ');
    const rFac  = row.getAttribute('data-faculty');
    const rSts  = row.getAttribute('data-status');
    const match = name.includes(q) &&
                  (!univ || rUniv === univ) &&
                  (!fac  || rFac === fac)  &&
                  (!sts  || rSts === sts);
    row.style.display = match ? '' : 'none';
    if (match) shown++;
  });
  document.getElementById('deptCount').textContent = `(${shown} shown)`;
}

function exportDepts() {
  showDeptToast('Exporting departments data...');
}

function showDeptToast(msg) {
  const t = document.getElementById('deptToast');
  document.getElementById('dept-toast-msg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}
</script>

</x-layouts::app>
