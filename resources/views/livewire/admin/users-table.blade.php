<div>
  <!-- ───────────── Page Header ───────────── -->
  <div class="page-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:24px;">
    <div>
      <h2 style="font-size:20px;font-weight:700;color:var(--gray-800);">Users Management</h2>
      <p style="font-size:13px;color:var(--gray-500);margin-top:2px;">Manage all registered users across the platform</p>
    </div>
    <div style="display:flex;gap:10px;">
      <button class="btn btn-outline btn-sm" wire:click="$refresh" wire:loading.attr="disabled"><i class="fas fa-rotate-right"></i> Refresh</button>
      <button class="btn btn-outline btn-sm" wire:click="export" wire:loading.attr="disabled"><i class="fas fa-download"></i> Export</button>
      <button class="btn btn-primary" wire:click="openAddModal"><i class="fas fa-plus"></i> Add User</button>
    </div>
  </div>

  <!-- ───────────── Filter Bar ───────────── -->
  <div class="filter-bar" style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-bottom:20px;">
    <div class="search-input-wrapper">
      <i class="fas fa-search" style="color:var(--gray-400);font-size:13px;"></i>
      <input type="text" placeholder="Search users by name, email or company..." style="border:none;outline:none;font-size:13px;width:100%;color:var(--gray-800);background:transparent;" wire:model.live.debounce.300ms="search"/>
    </div>
    <select class="filter-select-custom" id="roleFilter" wire:model.live="roleFilter">
      <option value="">All Roles</option>
      <option value="Student">Student</option>
      <option value="Company">Company</option>
      <option value="Admin">Admin</option>
      <option value="Operator">Operator</option>
    </select>
    <select class="filter-select-custom" id="statusFilter" wire:model.live="statusFilter">
      <option value="">All Statuses</option>
      <option value="Active">Active</option>
      <option value="Pending">Pending</option>
      <option value="Inactive">Inactive</option>
    </select>
    <select class="filter-select-custom" id="perPage" wire:model.live="perPage">
      <option value="5">5 per page</option>
      <option value="10">10 per page</option>
      <option value="25">25 per page</option>
      <option value="50">50 per page</option>
    </select>
    @if($this->hasActiveFilters)
      <button class="btn btn-outline btn-sm" wire:click="clearFilters"><i class="fas fa-times"></i> Clear Filters</button>
    @endif
  </div>

  <!-- ───────────── Users Table ───────────── -->
  <div class="card">
    <div class="card-header">
      <span class="card-title">All Users <span style="font-size:13px;font-weight:400;color:var(--gray-400);" id="userCount">({{ $usersList->total() }} total)</span></span>
    </div>
    <div class="card-body" style="padding-top:16px;">
      <div class="table-wrapper">
        <table id="usersTable">
          <thead>
            <tr>
              <th style="cursor:pointer;" wire:click="sortByColumn('name')">User <i class="fas fa-sort{{ $sortBy === 'name' ? ($sortDirection === 'asc' ? '-up' : '-down') : '' }}"></i></th>
              <th style="cursor:pointer;" wire:click="sortByColumn('email')">Email <i class="fas fa-sort{{ $sortBy === 'email' ? ($sortDirection === 'asc' ? '-up' : '-down') : '' }}"></i></th>
              <th style="cursor:pointer;" wire:click="sortByColumn('role')">Role <i class="fas fa-sort{{ $sortBy === 'role' ? ($sortDirection === 'asc' ? '-up' : '-down') : '' }}"></i></th>
              <th style="cursor:pointer;" wire:click="sortByColumn('company')">University / Company <i class="fas fa-sort{{ $sortBy === 'company' ? ($sortDirection === 'asc' ? '-up' : '-down') : '' }}"></i></th>
              <th>Department</th>
              <th style="cursor:pointer;" wire:click="sortByColumn('created_at')">Joined Date <i class="fas fa-sort{{ $sortBy === 'created_at' ? ($sortDirection === 'asc' ? '-up' : '-down') : '' }}"></i></th>
              <th style="cursor:pointer;" wire:click="sortByColumn('status')">Status <i class="fas fa-sort{{ $sortBy === 'status' ? ($sortDirection === 'asc' ? '-up' : '-down') : '' }}"></i></th>
              <th style="text-align:center;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($usersList as $user)
            <tr data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}" data-role="{{ $user->role }}" data-status="{{ $user->trashed() ? 'Inactive' : ($user->isPendingInvite() ? 'Pending' : 'Active') }}">
              <td>
                <div style="display:flex;align-items:center;gap:10px;">
                  @php
                    $colors = ['admin' => '#EF4444', 'company_manager' => '#8B5CF6', 'intern' => '#00b1aa', 'operator' => '#3B82F6'];
                    $avatarColor = $colors[$user->role] ?? '#444444';
                  @endphp
                  <div style="width:36px;height:36px;border-radius:50%;background:{{ $avatarColor }};color:white;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">{{ $user->initials() }}</div>
                  <span style="font-weight:600;color:var(--gray-800);">{{ $user->name }}</span>
                </div>
              </td>
              <td style="color:var(--gray-600);">{{ $user->email }}</td>
              <td>
                @if($user->role === 'intern')
                  <span class="role-badge-student">Student</span>
                @elseif($user->role === 'company_manager')
                  <span class="role-badge-company">Company</span>
                @elseif($user->role === 'admin')
                  <span class="role-badge-admin">Admin</span>
                @else
                  <span class="role-badge-student" style="background:rgba(59,130,246,0.1);color:#1D4ED8;">Operator</span>
                @endif
              </td>
              <td style="color:var(--gray-700);">{{ $user->company?->name ?? $user->university?->name ?? 'N/A' }}</td>
              <td style="color:var(--gray-700);">{{ $user->department?->name ?? '-' }}</td>
              <td style="color:var(--gray-500);font-size:12px;">{{ $user->created_at->format('M d, Y') }}</td>
              <td>
                @if($user->trashed())
                  <span class="status-badge rejected">Inactive</span>
                @elseif($user->isPendingInvite())
                  <span class="status-badge pending">Pending</span>
                @else
                  <span class="status-badge active">Active</span>
                @endif
              </td>
              <td>
                <div style="display:flex;align-items:center;justify-content:center;gap:6px;">
                  <!-- View -->
                  <button title="View User" class="action-btn" wire:click="openViewModal({{ $user->id }})"><i class="fas fa-eye"></i></button>

                  <!-- Edit -->
                  <button title="Edit User" class="action-btn action-btn-edit" wire:click="openEditModal({{ $user->id }})"><i class="fas fa-pen"></i></button>

                  <!-- Delete -->
                  @if($user->id !== auth()->id())
                    <button title="Delete User" class="action-btn action-btn-danger" wire:click="openDeleteModal({{ $user->id }})"><i class="fas fa-trash"></i></button>
                  @endif
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      @if ($usersList->hasPages())
        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:20px;padding-top:16px;border-top:1px solid var(--border);">
          <span style="font-size:12px;color:var(--gray-500);">Showing {{ $usersList->firstItem() }}–{{ $usersList->lastItem() }} of {{ $usersList->total() }} users</span>
          <div style="display:flex;gap:6px;">
            {{-- Previous Page Link --}}
            @if ($usersList->onFirstPage())
                <button class="pagination-btn" style="opacity: 0.5; cursor: not-allowed;" disabled><i class="fas fa-chevron-left"></i></button>
            @else
                <button class="pagination-btn" wire:click="previousPage" wire:loading.attr="disabled"><i class="fas fa-chevron-left"></i></button>
            @endif

            {{-- Page Numbers --}}
            @php
                $currentPage = $usersList->currentPage();
                $lastPage = $usersList->lastPage();
                $elements = collect([1, 2, 3, $currentPage, $lastPage])
                    ->filter(fn (int $page): bool => $page >= 1 && $page <= $lastPage)
                    ->unique()
                    ->sort()
                    ->values();
                $prevPage = null;
            @endphp

            @foreach ($elements as $page)
                @if ($prevPage !== null && $page - $prevPage > 1)
                    <button class="pagination-btn" style="cursor: default; pointer-events: none;">...</button>
                @endif

                @if ($page == $currentPage)
                    <button class="pagination-btn active">{{ $page }}</button>
                @else
                    <button class="pagination-btn" wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled">{{ $page }}</button>
                @endif

                @php $prevPage = $page; @endphp
            @endforeach

            {{-- Next Page Link --}}
            @if ($usersList->hasMorePages())
                <button class="pagination-btn" wire:click="nextPage" wire:loading.attr="disabled"><i class="fas fa-chevron-right"></i></button>
            @else
                <button class="pagination-btn" style="opacity: 0.5; cursor: not-allowed;" disabled><i class="fas fa-chevron-right"></i></button>
            @endif
          </div>
        </div>
      @endif
    </div>
  </div>

  <!-- ═══════════════════════════════════════
       VIEW MODAL
  ════════════════════════════════════════ -->
  @if($showViewModal && $viewUser)
  @teleport('body')
  <div id="view-modal" style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;">
    <div class="modal-content-box" style="max-width:520px;">
      <!-- Modal Header Banner -->
      <div id="view-banner" style="padding:28px 28px 20px;position:relative;background:{{ $viewUser['avatar_color'] }};">
        <button wire:click="$set('showViewModal', false)" style="position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,0.2);border:none;color:white;cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
        <div style="display:flex;align-items:center;gap:16px;">
          <div id="view-avatar" style="width:60px;height:60px;border-radius:50%;background:white;color:{{ $viewUser['avatar_color'] }};display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:700;border:3px solid rgba(255,255,255,0.5);flex-shrink:0;">{{ $viewUser['initials'] }}</div>
          <div>
            <div id="view-name" style="font-size:20px;font-weight:700;color:white;">{{ $viewUser['name'] }}</div>
            <div id="view-role-badge" style="margin-top:4px;">
              <span style="padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;background:rgba(255,255,255,0.2);color:white;">{{ ucfirst($viewUser['role'] === 'company_manager' ? 'Company' : ($viewUser['role'] === 'intern' ? 'Student' : $viewUser['role'])) }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Body -->
      <div style="padding:24px 28px;">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:20px;">
          <div>
            <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Email</div>
            <div id="view-email" style="font-size:13px;color:var(--gray-800);font-weight:500;word-break:break-all;">{{ $viewUser['email'] }}</div>
          </div>
          <div>
            <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Organization</div>
            <div id="view-org" style="font-size:13px;color:var(--gray-800);font-weight:500;">{{ $viewUser['company_name'] }}</div>
          </div>
          <div>
            <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Joined Date</div>
            <div id="view-date" style="font-size:13px;color:var(--gray-800);font-weight:500;">{{ $viewUser['joined_date'] }}</div>
          </div>
          <div>
            <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Status</div>
            <div id="view-status">
              @if($viewUser['status'] === 'Inactive')
                <span style="padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;background:rgba(239,68,68,0.1);color:#EF4444;">Inactive</span>
              @elseif($viewUser['status'] === 'Pending')
                <span style="padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;background:rgba(245,158,11,0.1);color:#F59E0B;">Pending</span>
              @else
                <span style="padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;background:rgba(16,185,129,0.1);color:#10B981;">Active</span>
              @endif
            </div>
          </div>
        </div>

        <div style="padding:14px;border-radius:10px;background:var(--gray-50);border:1px solid var(--border);margin-bottom:20px;">
          <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:6px;">Notes / Bio</div>
          <div id="view-bio" style="font-size:13px;color:var(--gray-700);line-height:1.6;">{{ $viewUser['bio'] }}</div>
        </div>

        <div style="display:flex;justify-content:flex-end;gap:10px;">
          <button wire:click="$set('showViewModal', false)" class="btn btn-outline">Close</button>
          <button wire:click="openEditModal({{ $viewUser['id'] }})" id="view-edit-btn" class="btn btn-primary"><i class="fas fa-pen"></i> Edit User</button>
        </div>
      </div>
    </div>
  </div>
  @endteleport
  @endif

  <!-- ═══════════════════════════════════════
       ADD MODAL
  ════════════════════════════════════════ -->
  @if($showAddModal)
  @teleport('body')
  <div id="add-modal" style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;">
    <div class="modal-content-box" style="max-width:560px;">
      <div style="padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
        <div>
          <div style="font-size:16px;font-weight:700;color:var(--gray-800);">Add New User</div>
          <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Create a new user account on the platform</div>
        </div>
        <button wire:click="$set('showAddModal', false)" style="width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;color:var(--gray-600);cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
      </div>
      <form wire:submit.prevent="createUser">
        <div style="padding:24px;">
          <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" placeholder="John Smith" wire:model="name">
              @error('name') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            <div>
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" placeholder="john@example.com" wire:model="email">
              @error('email') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label class="form-label">Role</label>
              <select class="form-control" wire:model="role">
                <option value="intern">Student</option>
                <option value="company_manager">Company</option>
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
              </select>
              @error('role') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            @if($role === 'intern')
            <div>
              <label class="form-label">University</label>
              <select class="form-control" wire:model="universityId">
                <option value="">Select University</option>
                @foreach($this->universities as $university)
                  <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
              </select>
              @error('universityId') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            @else
            <div>
              <label class="form-label">Organization Placement</label>
              <select class="form-control" wire:model="companyId">
                <option value="">Select Company</option>
                @foreach($this->companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
              @error('companyId') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            @endif
          </div>
          <div class="form-row" style="display:grid;grid-template-columns:1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label class="form-label">Temporary Password</label>
              <input type="password" class="form-control" placeholder="Min. 8 characters" wire:model="password">
              @error('password') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
          </div>
          @if($role === 'intern')
          <div class="form-row" style="display:grid;grid-template-columns:1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label class="form-label">Bio / Profile Notes</label>
              <textarea class="form-control" placeholder="Brief notes about the student..." wire:model="bio" rows="3" style="width:100%;resize:vertical;"></textarea>
              @error('bio') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
          </div>
          @endif
          <div style="display:flex;justify-content:flex-end;gap:10px;margin-top:20px;">
            <button type="button" wire:click="$set('showAddModal', false)" class="btn btn-outline">Cancel</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Create User</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endteleport
  @endif

  <!-- ═══════════════════════════════════════
       EDIT MODAL
  ════════════════════════════════════════ -->
  @if($showEditModal)
  @teleport('body')
  <div id="edit-modal" style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;">
    <div class="modal-content-box" style="max-width:560px;">
      <!-- Edit Header -->
      <div style="padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
        <div>
          <div style="font-size:16px;font-weight:700;color:var(--gray-800);">Edit User</div>
          <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Update user information and permissions</div>
        </div>
        <button wire:click="$set('showEditModal', false)" style="width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;color:var(--gray-600);cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
      </div>

      <!-- Edit Body -->
      <form wire:submit.prevent="updateUser">
        <div style="padding:24px;">
          <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" placeholder="Full name" wire:model="name">
              @error('name') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            <div>
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" placeholder="Email address" wire:model="email">
              @error('email') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label class="form-label">Role</label>
              <select class="form-control" wire:model="role" @if($userId === auth()->id()) disabled @endif>
                <option value="intern">Student</option>
                <option value="company_manager">Company</option>
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
              </select>
              @error('role') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            <div>
              <label class="form-label">Status</label>
              <select class="form-control" wire:model="status" @if($userId === auth()->id()) disabled @endif>
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Inactive">Inactive</option>
              </select>
              @error('status') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
            @if($role === 'intern')
            <div>
              <label class="form-label">University</label>
              <select class="form-control" wire:model="universityId">
                <option value="">Select University</option>
                @foreach($this->universities as $university)
                  <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
              </select>
              @error('universityId') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            @else
            <div>
              <label class="form-label">Organization Placement</label>
              <select class="form-control" wire:model="companyId">
                <option value="">Select Company</option>
                @foreach($this->companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
              @error('companyId') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
            @endif
            <div>
              <label class="form-label">Update Password <span style="font-size:10.5px;font-weight:400;color:var(--gray-400);">(leave blank to keep current)</span></label>
              <input type="password" class="form-control" placeholder="••••••••" wire:model="password">
              @error('password') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
          </div>
          @if($role === 'intern')
          <div class="form-row" style="display:grid;grid-template-columns:1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label class="form-label">Bio / Profile Notes</label>
              <textarea class="form-control" placeholder="Brief notes about the student..." wire:model="bio" rows="3" style="width:100%;resize:vertical;"></textarea>
              @error('bio') <span class="error text-danger" style="font-size:12.5px;margin-top:4px;display:block;">{{ $message }}</span> @enderror
            </div>
          </div>
          @endif
          <div style="padding:12px 16px;border-radius:8px;background:rgba(59,130,246,0.05);border:1px solid rgba(59,130,246,0.15);margin-bottom:20px;display:flex;align-items:center;gap:10px;">
            <i class="fas fa-info-circle" style="color:#3B82F6;font-size:14px;flex-shrink:0;"></i>
            <span style="font-size:12px;color:#1D4ED8;">Changes will take effect immediately. The user status can be adjusted as needed.</span>
          </div>
          <div style="display:flex;justify-content:flex-end;gap:10px;">
            <button type="button" wire:click="$set('showEditModal', false)" class="btn btn-outline">Cancel</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endteleport
  @endif

  <!-- ═══════════════════════════════════════
       DELETE CONFIRMATION MODAL
  ════════════════════════════════════════ -->
  @if($showDeleteModal)
  @teleport('body')
  <div id="delete-modal" style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;">
    <div class="modal-content-box" style="max-width:440px;">
      <!-- Delete Header -->
      <div style="padding:24px 24px 0;text-align:center;">
        <div style="width:64px;height:64px;border-radius:50%;background:rgba(239,68,68,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <i class="fas fa-trash-can" style="font-size:26px;color:#EF4444;"></i>
        </div>
        <div style="font-size:18px;font-weight:700;color:var(--gray-800);margin-bottom:8px;">Deactivate User?</div>
        <div style="font-size:13px;color:var(--gray-500);line-height:1.6;">
          Are you sure you want to deactivate <strong style="color:var(--gray-800);">{{ $deleteConfirmName }}</strong>?
          <br>This will soft-delete their record from active listings.
        </div>
      </div>

      <!-- User Preview -->
      <div style="margin:20px 24px;padding:14px 16px;border-radius:10px;background:var(--gray-50);border:1px solid var(--border);display:flex;align-items:center;gap:12px;">
        <div style="width:40px;height:40px;border-radius:50%;background:#EF4444;color:white;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;flex-shrink:0;">
          {{ collect(explode(' ', $deleteConfirmName))->take(2)->map(fn($w)=>substr($w,0,1))->implode('') }}
        </div>
        <div style="text-align:left;">
          <div style="font-size:13px;font-weight:600;color:var(--gray-800);">{{ $deleteConfirmName }}</div>
          <div style="font-size:12px;color:var(--gray-500);">{{ $deleteConfirmEmail }}</div>
        </div>
      </div>

      <!-- Confirmation Checkbox -->
      <div class="delete-warning-box">
        <label style="display:flex;align-items:flex-start;gap:10px;cursor:pointer;">
          <input type="checkbox" style="margin-top:2px;accent-color:#EF4444;" wire:model.live="deleteConfirmCheckbox">
          <span class="delete-warning-text" style="font-size:12px;line-height:1.5;text-align:left;">I understand that this will deactivate the user and place them in the Inactive tab.</span>
        </label>
      </div>

      <!-- Actions -->
      <div style="padding:0 24px 24px;display:flex;gap:10px;">
        <button type="button" wire:click="$set('showDeleteModal', false)" class="btn btn-outline" style="flex:1;">Cancel</button>
        <button type="button" @if(!$deleteConfirmCheckbox) disabled style="opacity:0.5;cursor:not-allowed;" @endif wire:click="deleteUser" class="btn btn-danger" style="flex:1;">
          <i class="fas fa-trash"></i> Deactivate
        </button>
      </div>
    </div>
  </div>
  @endteleport
  @endif

  <!-- Loading Indicator -->
  <div wire:loading style="position:fixed;top:16px;right:16px;background:rgba(0,0,0,0.8);color:white;padding:8px 16px;border-radius:20px;font-size:12px;z-index:99999;display:flex;align-items:center;gap:8px;">
    <i class="fas fa-spinner fa-spin"></i> Processing...
  </div>
</div>

<script>
  // Simple toast listener setup
  document.addEventListener('livewire:init', () => {
     Livewire.on('show-toast', (event) => {
         if (window.showGlobalToast) {
             window.showGlobalToast(event.message, event.type || 'success');
         } else {
             alert(event.message);
         }
     });
  });
</script>
