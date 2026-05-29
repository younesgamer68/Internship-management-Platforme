<x-layouts::app :title="__('Internships Management')">
<!-- PAGE HEADER -->
      <div class="page-header">
        <div>
          <h2 class="page-title">All Internships</h2>
          <p class="page-subtitle">Manage and monitor all internship listings across universities</p>
        </div>
        <button class="btn btn-primary" onclick="openAddModal()"><i class="fas fa-plus"></i> Add Internship</button>
      </div>

      <!-- STATS CARDS -->
      <div class="stats-grid stats-grid-4">
        <div class="stat-card">
          <div class="stat-card-icon" style="background: rgba(37,99,235,0.1); color: var(--primary);">
            <i class="fas fa-briefcase"></i>
          </div>
          <div class="stat-card-body">
            <div class="stat-card-value">365</div>
            <div class="stat-card-label">Total Internships</div>
            <div class="stat-card-change positive"><i class="fas fa-arrow-up"></i> 8% from last month</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon" style="background: rgba(16,185,129,0.1); color: var(--green);">
            <i class="fas fa-circle-check"></i>
          </div>
          <div class="stat-card-body">
            <div class="stat-card-value">320</div>
            <div class="stat-card-label">Active Internships</div>
            <div class="stat-card-change positive"><i class="fas fa-arrow-up"></i> 5% from last month</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon" style="background: rgba(245,158,11,0.1); color: var(--warning);">
            <i class="fas fa-clock"></i>
          </div>
          <div class="stat-card-body">
            <div class="stat-card-value">45</div>
            <div class="stat-card-label">Pending Review</div>
            <div class="stat-card-change negative"><i class="fas fa-arrow-up"></i> 3 new today</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon" style="background: rgba(99,102,241,0.1); color: #6366F1;">
            <i class="fas fa-flag-checkered"></i>
          </div>
          <div class="stat-card-body">
            <div class="stat-card-value">275</div>
            <div class="stat-card-label">Completed</div>
            <div class="stat-card-change positive"><i class="fas fa-arrow-up"></i> 12% from last month</div>
          </div>
        </div>
      </div>

      <!-- FILTER BAR -->
      <div class="filter-bar card">
        <div class="filter-bar-inner">
          <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search internships by title or company..." />
          </div>
          <div class="filter-selects">
            <select class="filter-select">
              <option value="">All Universities</option>
              <option>Epoka University</option>
              <option>Albanian University</option>
              <option>University of Tirana</option>
              <option>Polytechnic University</option>
              <option>Beder University</option>
              <option>UET</option>
            </select>
            <select class="filter-select">
              <option value="">All Departments</option>
              <option>Software Engineering</option>
              <option>Computer Networks</option>
              <option>Finance & Accounting</option>
              <option>Marketing & Commerce</option>
              <option>Civil Engineering</option>
              <option>Electrical Engineering</option>
              <option>Physics & Mathematics</option>
              <option>Public Health</option>
            </select>
            <select class="filter-select">
              <option value="">All Statuses</option>
              <option>Active</option>
              <option>Pending</option>
              <option>Completed</option>
              <option>Expired</option>
            </select>
          </div>
        </div>
      </div>

      <!-- TABLE CARD -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Internship Listings</h3>
          <div class="card-actions">
            <button class="btn btn-sm btn-outline"><i class="fas fa-download"></i> Export</button>
            <button class="btn btn-sm btn-outline"><i class="fas fa-filter"></i> Filter</button>
          </div>
        </div>
        <div class="table-wrapper">
          <table class="data-table">
            <thead>
              <tr>
                <th>Title & Company</th>
                <th>Company</th>
                <th>University</th>
                <th>Department</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="cell-with-logo">
                    <div class="company-logo" style="background: rgba(37,99,235,0.12); color: var(--primary);">TS</div>
                    <div>
                      <div class="cell-title">Software Development</div>
                      <div class="cell-subtitle">Full Stack Position</div>
                    </div>
                  </div>
                </td>
                <td>TechSolutions</td>
                <td>Epoka University</td>
                <td><span class="dept-tag">Software Eng.</span></td>
                <td><span class="type-badge type-fulltime">Full-time</span></td>
                <td><span class="duration-badge">3 months</span></td>
                <td>Jul 2024</td>
                <td><span class="badge-status badge-active">Active</span></td>
                <td>
                  <div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-logo">
                    <div class="company-logo" style="background: rgba(245,158,11,0.12); color: var(--warning);">MC</div>
                    <div>
                      <div class="cell-title">Marketing Internship</div>
                      <div class="cell-subtitle">Digital Marketing</div>
                    </div>
                  </div>
                </td>
                <td>MediaCorp</td>
                <td>Albanian University</td>
                <td><span class="dept-tag">Marketing</span></td>
                <td><span class="type-badge type-parttime">Part-time</span></td>
                <td><span class="duration-badge">2 months</span></td>
                <td>Jun 2024</td>
                <td><span class="badge-status badge-pending">Pending</span></td>
                <td>
                  <div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-logo">
                    <div class="company-logo" style="background: rgba(16,185,129,0.12); color: var(--green);">DS</div>
                    <div>
                      <div class="cell-title">Data Analysis</div>
                      <div class="cell-subtitle">Business Intelligence</div>
                    </div>
                  </div>
                </td>
                <td>DataSpark</td>
                <td>University of Tirana</td>
                <td><span class="dept-tag">Comp. Networks</span></td>
                <td><span class="type-badge type-remote">Remote</span></td>
                <td><span class="duration-badge">4 months</span></td>
                <td>Aug 2024</td>
                <td><span class="badge-status badge-active">Active</span></td>
                <td>
                  <div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-logo">
                    <div class="company-logo" style="background: rgba(139,92,246,0.12); color: #8B5CF6;">DH</div>
                    <div>
                      <div class="cell-title">UI/UX Design</div>
                      <div class="cell-subtitle">Product Design</div>
                    </div>
                  </div>
                </td>
                <td>DesignHub</td>
                <td>Polytechnic University</td>
                <td><span class="dept-tag">Electrical Eng.</span></td>
                <td><span class="type-badge type-fulltime">Full-time</span></td>
                <td><span class="duration-badge">3 months</span></td>
                <td>May 2024</td>
                <td><span class="badge-status badge-completed">Completed</span></td>
                <td>
                  <div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-logo">
                    <div class="company-logo" style="background: rgba(245,158,11,0.12); color: var(--warning);">FG</div>
                    <div>
                      <div class="cell-title">Financial Analysis</div>
                      <div class="cell-subtitle">Corporate Finance</div>
                    </div>
                  </div>
                </td>
                <td>FinGroup</td>
                <td>Beder University</td>
                <td><span class="dept-tag">Finance & Acct.</span></td>
                <td><span class="type-badge type-parttime">Part-time</span></td>
                <td><span class="duration-badge">2 months</span></td>
                <td>Jul 2024</td>
                <td><span class="badge-status badge-pending">Pending</span></td>
                <td>
                  <div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-logo">
                    <div class="company-logo" style="background: rgba(37,99,235,0.12); color: var(--primary);">CB</div>
                    <div>
                      <div class="cell-title">Backend Development</div>
                      <div class="cell-subtitle">API & Server Engineering</div>
                    </div>
                  </div>
                </td>
                <td>CodeBase</td>
                <td>UET</td>
                <td><span class="dept-tag">Software Eng.</span></td>
                <td><span class="type-badge type-remote">Remote</span></td>
                <td><span class="duration-badge">4 months</span></td>
                <td>Sep 2024</td>
                <td><span class="badge-status badge-active">Active</span></td>
                <td>
                  <div class="flex gap-8">
                    <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- PAGINATION -->
        <div class="pagination" style="display: flex; justify-content: space-between; align-items: center; width: 100%; border-top: 1px solid rgba(229, 231, 235, 0.6); padding-top: 20px; margin-top: 20px; flex-wrap: wrap; gap: 16px;">
          <div class="pagination-info" style="color: var(--gray-500); font-size: 13px;" id="paginationInfo">Showing 1–10 of 365 internships</div>
          <div class="pagination-controls" style="display: flex; gap: 6px; align-items: center;" id="paginationControls">
            <button class="page-btn" disabled><i class="fas fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <span style="color: var(--gray-400); margin: 0 4px;">...</span>
            <button class="page-btn">37</button>
            <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
          </div>
        </div>
      </div>

<!-- ═══════════════════════════════════════════════════════════
     ADD INTERNSHIP MODAL (slide-in panel)
════════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="addModal" onclick="closeModalOnOverlay(event,'addModal')">
  <div class="slide-panel">
    <div class="slide-panel-header">
      <div class="slide-panel-title">
        <div class="slide-panel-icon" style="background:rgba(37,99,235,0.12);color:var(--primary)"><i class="fas fa-plus"></i></div>
        <div>
          <h3>Add New Internship</h3>
          <p>Fill in the internship details below</p>
        </div>
      </div>
      <button class="panel-close-btn" onclick="closeModal('addModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="slide-panel-body">
      <form onsubmit="submitAddForm(event)">

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
            <label class="form-label">Position / Subtitle <span class="required">*</span></label>
            <input type="text" class="form-input" id="add-subtitle" placeholder="e.g. Full Stack Position" required />
          </div>
          <div class="form-group">
            <label class="form-label">Company Name <span class="required">*</span></label>
            <div class="input-with-icon">
              <i class="fas fa-building input-icon"></i>
              <input type="text" class="form-input" id="add-company" placeholder="e.g. TechSolutions" required />
            </div>
          </div>
        </div>

        <div class="panel-section-label">Academic Association</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">University <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-university input-icon"></i>
              <select class="form-input form-select" id="add-university" required>
                <option value="">Select University</option>
                <option>Epoka University</option>
                <option>Albanian University</option>
                <option>University of Tirana</option>
                <option>Polytechnic University</option>
                <option>Beder University</option>
                <option>UET</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Department <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-sitemap input-icon"></i>
              <select class="form-input form-select" id="add-department" required>
                <option value="">Select Department</option>
                <option>Software Engineering</option>
                <option>Computer Networks</option>
                <option>Finance & Accounting</option>
                <option>Marketing & Commerce</option>
                <option>Civil Engineering</option>
                <option>Electrical Engineering</option>
                <option>Physics & Mathematics</option>
                <option>Public Health</option>
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
                <option value="">Select Type</option>
                <option>Full-time</option>
                <option>Part-time</option>
                <option>Remote</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Duration <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-clock input-icon"></i>
              <select class="form-input form-select" id="add-duration" required>
                <option value="">Select Duration</option>
                <option>1 month</option>
                <option>2 months</option>
                <option>3 months</option>
                <option>4 months</option>
                <option>5 months</option>
                <option>6 months</option>
                <option>9 months</option>
                <option>12 months</option>
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

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Application Deadline <span class="required">*</span></label>
            <div class="input-with-icon">
              <i class="fas fa-calendar input-icon"></i>
              <input type="date" class="form-input" id="add-deadline" required />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Max Applicants</label>
            <div class="input-with-icon">
              <i class="fas fa-user-group input-icon"></i>
              <input type="number" class="form-input" id="add-maxapplicants" placeholder="e.g. 50" min="1" />
            </div>
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
      </form>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     VIEW INTERNSHIP MODAL
════════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="viewModal" onclick="closeModalOnOverlay(event,'viewModal')">
  <div class="center-modal view-modal-box">
    <div class="center-modal-header">
      <div class="view-modal-badge" id="view-initials-badge">TS</div>
      <div class="center-modal-title-wrap">
        <h3 id="view-title">Software Development</h3>
        <p id="view-subtitle-company">Full Stack Position · TechSolutions</p>
      </div>
      <button class="panel-close-btn" onclick="closeModal('viewModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="view-modal-body">
      <div class="view-info-grid">
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-university"></i> University</span>
          <span class="view-info-value" id="view-university">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-sitemap"></i> Department</span>
          <span class="view-info-value" id="view-department">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-tag"></i> Type</span>
          <span class="view-info-value" id="view-type">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-clock"></i> Duration</span>
          <span class="view-info-value" id="view-duration">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-calendar"></i> Deadline</span>
          <span class="view-info-value" id="view-deadline">—</span>
        </div>
        <div class="view-info-item">
          <span class="view-info-label"><i class="fas fa-circle-half-stroke"></i> Status</span>
          <span class="view-info-value" id="view-status-badge">—</span>
        </div>
      </div>
      <div class="view-desc-block">
        <div class="view-info-label"><i class="fas fa-align-left"></i> Description</div>
        <p id="view-description" class="view-description-text">No description provided.</p>
      </div>
    </div>
    <div class="center-modal-footer">
      <button class="btn btn-outline" onclick="closeModal('viewModal')">Close</button>
      <button class="btn btn-primary" onclick="openEditFromView()"><i class="fas fa-pen"></i> Edit</button>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     EDIT INTERNSHIP MODAL (slide-in panel)
════════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="editModal" onclick="closeModalOnOverlay(event,'editModal')">
  <div class="slide-panel">
    <div class="slide-panel-header">
      <div class="slide-panel-title">
        <div class="slide-panel-icon" style="background:rgba(245,158,11,0.12);color:var(--warning)"><i class="fas fa-pen"></i></div>
        <div>
          <h3>Edit Internship</h3>
          <p>Update the internship details</p>
        </div>
      </div>
      <button class="panel-close-btn" onclick="closeModal('editModal')"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="slide-panel-body">
      <form onsubmit="submitEditForm(event)">

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
            <label class="form-label">Position / Subtitle</label>
            <input type="text" class="form-input" id="edit-subtitle" />
          </div>
          <div class="form-group">
            <label class="form-label">Company Name <span class="required">*</span></label>
            <div class="input-with-icon">
              <i class="fas fa-building input-icon"></i>
              <input type="text" class="form-input" id="edit-company" required />
            </div>
          </div>
        </div>

        <div class="panel-section-label">Academic Association</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">University <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-university input-icon"></i>
              <select class="form-input form-select" id="edit-university" required>
                <option value="">Select University</option>
                <option>Epoka University</option>
                <option>Albanian University</option>
                <option>University of Tirana</option>
                <option>Polytechnic University</option>
                <option>Beder University</option>
                <option>UET</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Department <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-sitemap input-icon"></i>
              <select class="form-input form-select" id="edit-department" required>
                <option value="">Select Department</option>
                <option>Software Engineering</option>
                <option>Computer Networks</option>
                <option>Finance & Accounting</option>
                <option>Marketing & Commerce</option>
                <option>Civil Engineering</option>
                <option>Electrical Engineering</option>
                <option>Physics & Mathematics</option>
                <option>Public Health</option>
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
                <option>Full-time</option>
                <option>Part-time</option>
                <option>Remote</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Duration <span class="required">*</span></label>
            <div class="select-wrapper-panel">
              <i class="fas fa-clock input-icon"></i>
              <select class="form-input form-select" id="edit-duration" required>
                <option>1 month</option>
                <option>2 months</option>
                <option>3 months</option>
                <option>4 months</option>
                <option>5 months</option>
                <option>6 months</option>
                <option>9 months</option>
                <option>12 months</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Status</label>
            <div class="select-wrapper-panel">
              <i class="fas fa-circle-half-stroke input-icon"></i>
              <select class="form-input form-select" id="edit-status">
                <option>Active</option>
                <option>Pending</option>
                <option>Completed</option>
                <option>Expired</option>
              </select>
              <i class="fas fa-chevron-down select-arrow"></i>
            </div>
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">Application Deadline</label>
            <div class="input-with-icon">
              <i class="fas fa-calendar input-icon"></i>
              <input type="date" class="form-input" id="edit-deadline" />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Max Applicants</label>
            <div class="input-with-icon">
              <i class="fas fa-user-group input-icon"></i>
              <input type="number" class="form-input" id="edit-maxapplicants" min="1" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Description</label>
          <textarea class="form-input form-textarea" id="edit-description" rows="4"></textarea>
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
      </form>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     DELETE CONFIRM MODAL
════════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="deleteModal" onclick="closeModalOnOverlay(event,'deleteModal')">
  <div class="center-modal delete-modal-box">
    <div class="delete-modal-icon-wrap">
      <div class="delete-modal-icon"><i class="fas fa-trash-can"></i></div>
    </div>
    <h3 class="delete-modal-title">Delete Internship</h3>
    <p class="delete-modal-desc">Are you sure you want to delete <strong id="delete-name">this internship</strong>? This action cannot be undone.</p>
    <div class="delete-modal-actions">
      <button class="btn btn-outline" onclick="closeModal('deleteModal')">Cancel</button>
      <button class="btn btn-danger" id="delete-confirm-btn"><i class="fas fa-trash-can"></i> Delete</button>
    </div>
  </div>
</div>

<!-- SUCCESS TOAST -->
<div class="toast-notification" id="toastNotif">
  <i class="fas fa-circle-check toast-icon"></i>
  <span id="toast-msg">Action completed successfully!</span>
</div>

<style>
/* ── EXTRA INTERNSHIP PAGE STYLES ── */
.dept-tag {
  display: inline-block;
  background: rgba(99,102,241,0.1);
  color: #6366F1;
  font-size: 11px;
  font-weight: 600;
  padding: 3px 10px;
  border-radius: 20px;
  white-space: nowrap;
}

.type-badge {
  display: inline-block;
  font-size: 11px;
  font-weight: 600;
  padding: 3px 10px;
  border-radius: 20px;
  white-space: nowrap;
}
.type-fulltime { background: rgba(37,99,235,0.1); color: var(--primary); }
.type-parttime { background: rgba(245,158,11,0.1); color: var(--warning); }
.type-remote   { background: rgba(16,185,129,0.1); color: var(--green); }

.btn-icon-outline {
  display: inline-flex; align-items: center; justify-content: center;
  width: 32px; height: 32px; padding: 0;
  border-radius: 8px;
  background: transparent;
  border: 1.5px solid var(--gray-300);
  color: var(--gray-600);
  font-size: 13px;
  transition: var(--transition);
}
.btn-icon-outline:hover { background: var(--gray-50); border-color: var(--primary); color: var(--primary); }

.btn-icon-danger {
  display: inline-flex; align-items: center; justify-content: center;
  width: 32px; height: 32px; padding: 0;
  border-radius: 8px;
  background: transparent;
  border: 1.5px solid rgba(239,68,68,0.3);
  color: var(--danger);
  font-size: 13px;
  transition: var(--transition);
}
.btn-icon-danger:hover { background: rgba(239,68,68,0.08); border-color: var(--danger); }

/* ── MODAL OVERLAY ── */
.modal-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(15,23,42,0.55);
  backdrop-filter: blur(4px);
  z-index: 1000;
  align-items: center;
  justify-content: center;
}
.modal-overlay.open { display: flex; animation: fadeIn 0.2s ease; }

@keyframes fadeIn { from { opacity:0 } to { opacity:1 } }

/* SLIDE PANEL */
.slide-panel {
  position: fixed;
  right: 0; top: 0; bottom: 0;
  width: 540px;
  max-width: 96vw;
  background: #fff;
  box-shadow: -8px 0 40px rgba(0,0,0,0.12);
  display: flex; flex-direction: column;
  animation: slideInRight 0.3s cubic-bezier(0.16,1,0.3,1);
  border-radius: 16px 0 0 16px;
  overflow: hidden;
}
@keyframes slideInRight { from { transform: translateX(100%) } to { transform: translateX(0) } }

.slide-panel-header {
  display: flex; align-items: center; justify-content: space-between;
  padding: 22px 24px;
  border-bottom: 1px solid var(--gray-100);
  background: var(--gray-50);
  flex-shrink: 0;
}
.slide-panel-title { display: flex; align-items: center; gap: 14px; }
.slide-panel-icon {
  width: 42px; height: 42px; border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 16px; flex-shrink: 0;
}
.slide-panel-title h3 { font-size: 16px; font-weight: 700; color: var(--gray-800); margin: 0; }
.slide-panel-title p  { font-size: 12px; color: var(--gray-500); margin: 2px 0 0; }

.panel-close-btn {
  width: 34px; height: 34px; border-radius: 8px;
  background: var(--gray-100);
  border: none; cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  color: var(--gray-600); font-size: 15px;
  transition: var(--transition);
}
.panel-close-btn:hover { background: var(--gray-200); color: var(--gray-800); }

.slide-panel-body {
  flex: 1; overflow-y: auto; padding: 24px;
  scrollbar-width: thin;
  scrollbar-color: var(--gray-200) transparent;
}

.panel-section-label {
  font-size: 11px; font-weight: 700; text-transform: uppercase;
  letter-spacing: 0.07em; color: var(--gray-400);
  margin: 20px 0 14px;
  padding-bottom: 8px;
  border-bottom: 1px solid var(--gray-100);
}
.panel-section-label:first-child { margin-top: 0; }

.slide-panel-footer {
  display: flex; gap: 10px; justify-content: flex-end;
  padding-top: 20px; margin-top: 8px;
  border-top: 1px solid var(--gray-100);
}

/* FORM ELEMENTS */
.form-input {
  width: 100%;
  padding: 10px 14px;
  border: 1.5px solid var(--gray-200);
  border-radius: 8px;
  font-size: 13px;
  color: var(--gray-800);
  background: #fff;
  transition: var(--transition);
  outline: none;
}
.form-input:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 3px var(--primary-bg);
}
.form-input::placeholder { color: var(--gray-400); }

.form-textarea { resize: vertical; min-height: 100px; }

.form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }

.input-with-icon { position: relative; }
.input-with-icon .input-icon {
  position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
  color: var(--gray-400); font-size: 13px; pointer-events: none;
}
.input-with-icon .form-input { padding-left: 34px; }

.select-wrapper-panel { position: relative; }
.select-wrapper-panel .input-icon {
  position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
  color: var(--gray-400); font-size: 13px; pointer-events: none; z-index: 1;
}
.select-wrapper-panel .select-arrow {
  position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
  color: var(--gray-400); font-size: 11px; pointer-events: none;
}
.select-wrapper-panel .form-select { padding-left: 34px; padding-right: 30px; appearance: none; }

/* CENTER MODAL */
.center-modal {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 20px 60px rgba(0,0,0,0.18);
  width: 580px; max-width: 94vw;
  animation: popIn 0.25s cubic-bezier(0.16,1,0.3,1);
  overflow: hidden;
}
@keyframes popIn { from { transform: scale(0.92); opacity: 0 } to { transform: scale(1); opacity: 1 } }

.center-modal-header {
  display: flex; align-items: center; gap: 14px;
  padding: 22px 24px;
  border-bottom: 1px solid var(--gray-100);
  background: var(--gray-50);
}
.center-modal-title-wrap { flex: 1; }
.center-modal-title-wrap h3 { font-size: 16px; font-weight: 700; color: var(--gray-800); margin: 0; }
.center-modal-title-wrap p  { font-size: 12px; color: var(--gray-500); margin: 3px 0 0; }

.center-modal-footer {
  display: flex; gap: 10px; justify-content: flex-end;
  padding: 16px 24px;
  border-top: 1px solid var(--gray-100);
}

/* VIEW MODAL */
.view-modal-box { width: 560px; }
.view-modal-badge {
  width: 48px; height: 48px; border-radius: 12px;
  background: rgba(37,99,235,0.12); color: var(--primary);
  display: flex; align-items: center; justify-content: center;
  font-weight: 700; font-size: 16px; flex-shrink: 0;
}
.view-modal-body { padding: 20px 24px; }
.view-info-grid {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 14px; margin-bottom: 18px;
}
.view-info-item { display: flex; flex-direction: column; gap: 4px; }
.view-info-label {
  font-size: 11px; font-weight: 600; text-transform: uppercase;
  letter-spacing: 0.06em; color: var(--gray-400);
  display: flex; align-items: center; gap: 5px;
}
.view-info-value { font-size: 14px; font-weight: 600; color: var(--gray-800); }
.view-desc-block { margin-top: 4px; padding-top: 16px; border-top: 1px solid var(--gray-100); }
.view-description-text { font-size: 13px; color: var(--gray-600); line-height: 1.65; margin-top: 8px; }

/* DELETE MODAL */
.delete-modal-box { width: 420px; text-align: center; padding: 32px 28px; }
.delete-modal-icon-wrap { margin-bottom: 16px; }
.delete-modal-icon {
  width: 64px; height: 64px; border-radius: 50%;
  background: rgba(239,68,68,0.1); color: var(--danger);
  display: inline-flex; align-items: center; justify-content: center;
  font-size: 26px;
}
.delete-modal-title { font-size: 18px; font-weight: 700; color: var(--gray-800); margin: 0 0 8px; }
.delete-modal-desc { font-size: 14px; color: var(--gray-500); line-height: 1.6; margin-bottom: 24px; }
.delete-modal-actions { display: flex; gap: 10px; justify-content: center; }

/* TOAST */
.toast-notification {
  position: fixed; bottom: 28px; right: 28px;
  background: var(--gray-900);
  color: #fff;
  border-radius: 10px;
  padding: 12px 20px;
  font-size: 13px; font-weight: 500;
  display: flex; align-items: center; gap: 10px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.2);
  z-index: 2000;
  transform: translateY(80px); opacity: 0;
  transition: all 0.35s cubic-bezier(0.16,1,0.3,1);
  pointer-events: none;
}
.toast-notification.show { transform: translateY(0); opacity: 1; }
.toast-icon { color: var(--green); font-size: 16px; }
</style>

<script>
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
  const subtitle = document.getElementById('add-subtitle').value.trim();
  const company  = document.getElementById('add-company').value.trim();
  const univ     = document.getElementById('add-university').value;
  const dept     = document.getElementById('add-department').value;
  const type     = document.getElementById('add-type').value;
  const duration = document.getElementById('add-duration').value;
  const status   = document.getElementById('add-status').value;
  const deadline = document.getElementById('add-deadline').value;

  const initials  = company.split(' ').map(w => w[0]).join('').toUpperCase().slice(0,2);
  const deptShort = dept ? dept.replace(' Engineering','Eng.').replace(' & ',' & ').slice(0,14) : '—';
  const typeClass = { 'Full-time':'type-fulltime','Part-time':'type-parttime','Remote':'type-remote' }[type] || 'type-fulltime';
  const sClass    = { Active:'badge-active', Pending:'badge-pending', Completed:'badge-completed', Expired:'badge-expired' }[status] || 'badge-active';
  const deadlineDisplay = deadline ? new Date(deadline).toLocaleDateString('en-US',{month:'short',year:'numeric'}) : '—';

  const tbody = document.querySelector('.data-table tbody');
  const row   = document.createElement('tr');
  row.style.opacity = '0';
  row.style.transition = 'opacity 0.4s ease';
  row.innerHTML = `
    <td><div class="cell-with-logo">
      <div class="company-logo" style="background:rgba(37,99,235,0.12);color:var(--primary)">${initials}</div>
      <div><div class="cell-title">${title}</div><div class="cell-subtitle">${subtitle}</div></div>
    </div></td>
    <td>${company}</td>
    <td>${univ || '—'}</td>
    <td><span class="dept-tag">${deptShort}</span></td>
    <td><span class="type-badge ${typeClass}">${type}</span></td>
    <td><span class="duration-badge">${duration}</span></td>
    <td>${deadlineDisplay}</td>
    <td><span class="badge-status ${sClass}">${status}</span></td>
    <td><div class="flex gap-8">
      <button class="btn btn-sm btn-icon-outline" onclick="viewInternship(this)" title="View"><i class="fas fa-eye"></i></button>
      <button class="btn btn-sm btn-icon-outline" onclick="editInternship(this)" title="Edit"><i class="fas fa-pen"></i></button>
      <button class="btn btn-sm btn-icon-danger" onclick="deleteInternship(this)" title="Delete"><i class="fas fa-trash"></i></button>
    </div></td>`;
  tbody.insertBefore(row, tbody.firstChild);
  setTimeout(() => row.style.opacity = '1', 50);

  e.target.reset();
  closeModal('addModal');
  showToast('Internship added successfully!');
}

// ── VIEW ──
function viewInternship(btn) {
  const row = btn.closest('tr');
  const title    = row.querySelector('.cell-title').textContent;
  const subtitle = row.querySelector('.cell-subtitle').textContent;
  const company  = row.cells[1].textContent;
  const univ     = row.cells[2].textContent;
  const dept     = row.querySelector('.dept-tag')?.textContent || '—';
  const type     = row.querySelector('.type-badge')?.textContent || '—';
  const duration = row.querySelector('.duration-badge')?.textContent || '—';
  const deadline = row.cells[6].textContent;
  const status   = row.querySelector('.badge-status');
  const initials = company.split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);

  document.getElementById('view-initials-badge').textContent = initials;
  document.getElementById('view-title').textContent = title;
  document.getElementById('view-subtitle-company').textContent = `${subtitle} · ${company}`;
  document.getElementById('view-university').textContent = univ;
  document.getElementById('view-department').textContent = dept;
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

  document.getElementById('edit-title').value    = row.querySelector('.cell-title').textContent;
  document.getElementById('edit-subtitle').value = row.querySelector('.cell-subtitle').textContent;
  document.getElementById('edit-company').value  = row.cells[1].textContent;

  setSelectVal('edit-university', row.cells[2].textContent);
  const deptText = row.querySelector('.dept-tag')?.textContent || '';
  // try to match full dept name
  const deptMap = {'Software Eng.':'Software Engineering','Comp. Networks':'Computer Networks','Finance & Acct.':'Finance & Accounting','Marketing':'Marketing & Commerce','Civil Eng.':'Civil Engineering','Electrical Eng.':'Electrical Engineering','Physics & Math.':'Physics & Mathematics'};
  setSelectVal('edit-department', deptMap[deptText] || deptText);

  const typeText = row.querySelector('.type-badge')?.textContent || 'Full-time';
  setSelectVal('edit-type', typeText);
  setSelectVal('edit-duration', row.querySelector('.duration-badge')?.textContent || '3 months');
  setSelectVal('edit-status', row.querySelector('.badge-status')?.textContent || 'Active');
  document.getElementById('edit-description').value = '';

  document.getElementById('editModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function openEditFromView() {
  closeModal('viewModal');
  if (rowBeingEdited) return;
  // fallback — pick first row
  const firstBtn = document.querySelector('.data-table tbody tr .btn-icon-outline:nth-child(2)');
  if (firstBtn) editInternship(firstBtn);
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

  const title    = document.getElementById('edit-title').value.trim();
  const subtitle = document.getElementById('edit-subtitle').value.trim();
  const company  = document.getElementById('edit-company').value.trim();
  const univ     = document.getElementById('edit-university').value;
  const dept     = document.getElementById('edit-department').value;
  const type     = document.getElementById('edit-type').value;
  const duration = document.getElementById('edit-duration').value;
  const status   = document.getElementById('edit-status').value;

  const deptShort = dept ? dept.replace(' Engineering','Eng.').replace(' & ',' & ').slice(0,14) : '—';
  const typeClass = { 'Full-time':'type-fulltime','Part-time':'type-parttime','Remote':'type-remote' }[type] || 'type-fulltime';
  const sClass    = { Active:'badge-active', Pending:'badge-pending', Completed:'badge-completed', Expired:'badge-expired' }[status] || 'badge-active';

  rowBeingEdited.querySelector('.cell-title').textContent    = title;
  rowBeingEdited.querySelector('.cell-subtitle').textContent = subtitle;
  rowBeingEdited.cells[1].textContent = company;
  rowBeingEdited.cells[2].textContent = univ;

  const deptSpan = rowBeingEdited.querySelector('.dept-tag');
  if (deptSpan) deptSpan.textContent = deptShort;

  const typeSpan = rowBeingEdited.querySelector('.type-badge');
  if (typeSpan) { typeSpan.textContent = type; typeSpan.className = `type-badge ${typeClass}`; }

  const durSpan = rowBeingEdited.querySelector('.duration-badge');
  if (durSpan) durSpan.textContent = duration;

  const statSpan = rowBeingEdited.querySelector('.badge-status');
  if (statSpan) { statSpan.textContent = status; statSpan.className = `badge-status ${sClass}`; }

  rowBeingEdited.style.background = 'rgba(0,177,170,0.06)';
  setTimeout(() => rowBeingEdited.style.background = '', 800);
  rowBeingEdited = null;
  closeModal('editModal');
  showToast('Internship updated successfully!');
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
  rowToDelete.style.opacity  = '0';
  rowToDelete.style.transform= 'translateY(-8px)';
  rowToDelete.style.transition = 'all 0.35s ease';
  setTimeout(() => { rowToDelete.remove(); rowToDelete = null; }, 360);
  closeModal('deleteModal');
  showToast('Internship deleted.');
}

// ── TOAST ──
function showToast(msg) {
  const t = document.getElementById('toastNotif');
  document.getElementById('toast-msg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}
</script>
</x-layouts::app>
