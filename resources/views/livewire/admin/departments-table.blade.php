<div>
  <!-- Page Header -->
  <div class="page-header">
    <div class="page-header-left">
      <h2>Departments</h2>
      <p>Manage departments within all faculties and universities</p>
    </div>
    <div class="page-header-actions">
      <button class="btn btn-primary" wire:click="openAddModal"><i class="fas fa-plus"></i> Add Department</button>
    </div>
  </div>

  <!-- Stats Row -->
  <div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr));margin-bottom:28px;">
    <div class="stat-card">
      <div class="stat-icon blue"><i class="fas fa-sitemap"></i></div>
      <div class="stat-info">
        <div class="stat-value">{{ $stats['total'] }}</div>
        <div class="stat-label">Total Departments</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon green"><i class="fas fa-circle-check"></i></div>
      <div class="stat-info">
        <div class="stat-value">{{ $stats['active'] }}</div>
        <div class="stat-label">Active</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon warning"><i class="fas fa-clock"></i></div>
      <div class="stat-info">
        <div class="stat-value">{{ $stats['pending_inactive'] }}</div>
        <div class="stat-label">Pending / Inactive</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon purple"><i class="fas fa-briefcase"></i></div>
      <div class="stat-info">
        <div class="stat-value">{{ $stats['internships'] }}</div>
        <div class="stat-label">Active Internships</div>
      </div>
    </div>
  </div>

  <!-- Filter Bar -->
  <div class="filter-bar card" style="margin-bottom:24px;">
    <div class="filter-bar-inner">
      <div class="search-wrapper">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" placeholder="Search departments..." wire:model.live.debounce.300ms="search" />
      </div>
      <div class="filter-selects">
        <select class="filter-select" wire:model.live="universityFilter">
          <option value="">All Universities</option>
          @foreach($universities as $univ)
            <option value="{{ $univ->name }}">{{ $univ->name }}</option>
          @endforeach
        </select>
        <select class="filter-select" wire:model.live="facultyFilter">
          <option value="">All Faculties</option>
          @foreach($faculties as $fac)
            <option value="{{ $fac }}">{{ $fac }}</option>
          @endforeach
        </select>
        <select class="filter-select" wire:model.live="statusFilter">
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
      <span class="card-title">All Departments <span class="count-badge">({{ $departments->total() }} total)</span></span>
    </div>
    <div class="card-body" style="padding-top:16px;">
      <div class="table-wrapper">
        <table>
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
            @forelse($departments as $dept)
            <tr>
              <td>
                <div class="dept-name-cell">
                  <div class="dept-icon-sm" style="background:rgba(37,99,235,0.1);color:var(--primary)">
                    <i class="fas fa-sitemap"></i>
                  </div>
                  <span>{{ $dept->name }}</span>
                </div>
              </td>
              <td><span class="faculty-tag">{{ $dept->faculty }}</span></td>
              <td>{{ $dept->university->name ?? '-' }}</td>
              <td>
                @if($dept->head_name)
                  <div class="head-cell">
                    <div class="head-avatar">{{ strtoupper(substr(str_replace('Dr. ', '', $dept->head_name), 0, 2)) }}</div>
                    {{ $dept->head_name }}
                  </div>
                @else
                  -
                @endif
              </td>
              <td><strong>{{ $dept->students_count }}</strong></td>
              <td><span class="intern-count green">{{ $dept->active_internships_count }}</span></td>
              <td>
                @if($dept->status === 'active')
                  <span class="status-badge active">Active</span>
                @elseif($dept->status === 'pending')
                  <span class="status-badge pending">Pending</span>
                @else
                  <span class="status-badge inactive">Inactive</span>
                @endif
              </td>
              <td>
                <div class="flex gap-8">
                  <button class="btn btn-sm btn-icon-outline" wire:click="openEditModal({{ $dept->id }})" title="Edit"><i class="fas fa-pen"></i></button>
                  <button class="btn btn-sm btn-icon-danger" wire:click="confirmDelete({{ $dept->id }})" title="Delete"><i class="fas fa-trash"></i></button>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="text-center py-4 text-gray-500">No departments found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-4">
        {{ $departments->links() }}
      </div>
    </div>
  </div>

  <!-- ADD MODAL -->
  @if($showAddModal)
  <div class="modal-overlay open" wire:click.self="closeAddModal">
    <div class="slide-panel">
      <div class="slide-panel-header">
        <div class="slide-panel-title">
          <div class="slide-panel-icon" style="background:rgba(37,99,235,0.12);color:var(--primary)"><i class="fas fa-plus"></i></div>
          <div><h3>Add New Department</h3><p>Fill in the department details below</p></div>
        </div>
        <button class="panel-close-btn" wire:click="closeAddModal"><i class="fas fa-xmark"></i></button>
      </div>
      <div class="slide-panel-body">
        <form wire:submit.prevent="saveDepartment">
          <div class="form-group">
            <label class="form-label">Department Name *</label>
            <input type="text" class="form-input" wire:model="name" required />
            @error('name') <span class="text-danger text-xs">{{ $message }}</span> @enderror
          </div>
          
          <div class="form-row-2">
            <div class="form-group">
              <label class="form-label">Faculty *</label>
              <input type="text" class="form-input" wire:model="faculty" list="faculty-list" required />
              <datalist id="faculty-list">
                @foreach($faculties as $fac)
                  <option value="{{ $fac }}">
                @endforeach
              </datalist>
            </div>
            <div class="form-group">
              <label class="form-label">University *</label>
              <select class="form-input" wire:model="university_id" required>
                <option value="">Select University</option>
                @foreach($universities as $univ)
                  <option value="{{ $univ->id }}">{{ $univ->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-row-2">
            <div class="form-group">
              <label class="form-label">Head Name</label>
              <input type="text" class="form-input" wire:model="head_name" />
            </div>
            <div class="form-group">
              <label class="form-label">Status</label>
              <select class="form-input" wire:model="status">
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
          </div>

          <div class="slide-panel-footer">
            <button type="button" class="btn btn-outline" wire:click="closeAddModal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Department</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endif

  <!-- EDIT MODAL -->
  @if($showEditModal)
  <div class="modal-overlay open" wire:click.self="closeEditModal">
    <div class="slide-panel">
      <div class="slide-panel-header">
        <div class="slide-panel-title">
          <div class="slide-panel-icon" style="background:rgba(245,158,11,0.12);color:var(--warning)"><i class="fas fa-pen"></i></div>
          <div><h3>Edit Department</h3><p>Update department details</p></div>
        </div>
        <button class="panel-close-btn" wire:click="closeEditModal"><i class="fas fa-xmark"></i></button>
      </div>
      <div class="slide-panel-body">
        <form wire:submit.prevent="updateDepartment">
          <div class="form-group">
            <label class="form-label">Department Name *</label>
            <input type="text" class="form-input" wire:model="name" required />
          </div>
          
          <div class="form-row-2">
            <div class="form-group">
              <label class="form-label">Faculty *</label>
              <input type="text" class="form-input" wire:model="faculty" list="faculty-list-edit" required />
              <datalist id="faculty-list-edit">
                @foreach($faculties as $fac)
                  <option value="{{ $fac }}">
                @endforeach
              </datalist>
            </div>
            <div class="form-group">
              <label class="form-label">University *</label>
              <select class="form-input" wire:model="university_id" required>
                <option value="">Select University</option>
                @foreach($universities as $univ)
                  <option value="{{ $univ->id }}">{{ $univ->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-row-2">
            <div class="form-group">
              <label class="form-label">Head Name</label>
              <input type="text" class="form-input" wire:model="head_name" />
            </div>
            <div class="form-group">
              <label class="form-label">Status</label>
              <select class="form-input" wire:model="status">
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
          </div>

          <div class="slide-panel-footer">
            <button type="button" class="btn btn-outline" wire:click="closeEditModal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endif

  <!-- DELETE MODAL -->
  @if($showDeleteModal)
  <div class="modal-overlay open" wire:click.self="closeDeleteModal">
    <div class="center-modal delete-modal-box">
      <div class="delete-modal-icon-wrap">
        <div class="delete-modal-icon"><i class="fas fa-trash-can"></i></div>
      </div>
      <h3 class="delete-modal-title">Delete Department</h3>
      <p class="delete-modal-desc">Are you sure you want to delete this department?</p>
      <div class="delete-modal-actions">
        <button class="btn btn-outline" wire:click="closeDeleteModal">Cancel</button>
        <button class="btn btn-danger" wire:click="deleteDepartment">Delete</button>
      </div>
    </div>
  </div>
  @endif

  @if (session()->has('message'))
  <div class="toast-notification show">
    <i class="fas fa-circle-check toast-icon"></i>
    <span>{{ session('message') }}</span>
  </div>
  <script>
    setTimeout(() => {
        let toast = document.querySelector('.toast-notification');
        if (toast) toast.classList.remove('show');
    }, 3000);
  </script>
  @endif

</div>
