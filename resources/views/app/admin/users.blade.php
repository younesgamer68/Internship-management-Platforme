<x-layouts::admin title="Users Management">

<!-- ───────────── Page Header ───────────── -->
<div class="page-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:24px;">
  <div>
    <h2 style="font-size:20px;font-weight:700;color:var(--gray-800);">Users Management</h2>
    <p style="font-size:13px;color:var(--gray-500);margin-top:2px;">Manage all registered users across the platform</p>
  </div>
  <div style="display:flex;gap:10px;">
    <button class="btn btn-outline btn-sm" onclick="alert('Exporting...')"><i class="fas fa-download"></i> Export</button>
    <button class="btn btn-primary" onclick="openAddUser()"><i class="fas fa-plus"></i> Add User</button>
  </div>
</div>

<!-- ───────────── Quick Stats ───────────── -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px;">
  @foreach([
    ['128','Total Users','fa-users','var(--primary)','var(--primary-bg)'],
    ['94','Active','fa-circle-check','#10B981','rgba(16,185,129,0.1)'],
    ['21','Pending','fa-clock','#F59E0B','rgba(245,158,11,0.1)'],
    ['13','Inactive','fa-ban','#EF4444','rgba(239,68,68,0.1)'],
  ] as [$num,$label,$icon,$color,$bg])
  <div class="stat-card" style="padding:16px 20px;gap:14px;">
    <div style="width:42px;height:42px;border-radius:10px;background:{{ $bg }};display:flex;align-items:center;justify-content:center;color:{{ $color }};font-size:18px;flex-shrink:0;">
      <i class="fas {{ $icon }}"></i>
    </div>
    <div>
      <div style="font-size:22px;font-weight:700;color:var(--gray-800);">{{ $num }}</div>
      <div style="font-size:12px;color:var(--gray-500);font-weight:500;">{{ $label }}</div>
    </div>
  </div>
  @endforeach
</div>

<!-- ───────────── Filter Bar ───────────── -->
<div class="filter-bar" style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-bottom:20px;">
  <div class="search-input-wrapper">
    <i class="fas fa-search" style="color:var(--gray-400);font-size:13px;"></i>
    <input type="text" placeholder="Search users by name or email..." style="border:none;outline:none;font-size:13px;width:100%;color:var(--gray-800);background:transparent;" oninput="filterTable(this.value)"/>
  </div>
  <select class="filter-select-custom" id="roleFilter" onchange="filterTable()">
    <option value="">All Roles</option>
    <option value="Student">Student</option>
    <option value="Company">Company</option>
    <option value="Admin">Admin</option>
  </select>
  <select class="filter-select-custom" id="statusFilter" onchange="filterTable()">
    <option value="">All Statuses</option>
    <option value="Active">Active</option>
    <option value="Pending">Pending</option>
    <option value="Inactive">Inactive</option>
  </select>
</div>

<!-- ───────────── Users Table ───────────── -->
<div class="card">
  <div class="card-header">
    <span class="card-title">All Users <span style="font-size:13px;font-weight:400;color:var(--gray-400);" id="userCount">(128 total)</span></span>
  </div>
  <div class="card-body" style="padding-top:16px;">
    <div class="table-wrapper">
      <table id="usersTable">
        <thead>
          <tr>
            <th>User</th>
            <th>Email</th>
            <th>Role</th>
            <th>University / Company</th>
            <th>Joined Date</th>
            <th>Status</th>
            <th style="text-align:center;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @php
          $users = [
            ['JS','John Smith','john.smith@epoka.edu.al','Student','Epoka University','Jan 12, 2025','Active','#00b1aa','Student, Computer Science — Year 3. Applied to 4 internships.'],
            ['SJ','Sarah Johnson','sarah.j@mediacorp.al','Company','MediaCorp','Feb 03, 2025','Active','#8B5CF6','Company representative at MediaCorp. Manages 3 open internship listings.'],
            ['MW','Mike Williams','m.williams@admin.internlink.al','Admin','InternLink','Dec 18, 2024','Active','#444444','Platform administrator with full access. Created 12 reports.'],
            ['ED','Emily Davis','emily.davis@uet.edu.al','Student','UET Tirana','Mar 07, 2025','Pending','#00b1aa','Student, Business Administration — Year 2. Pending email verification.'],
            ['DB','David Brown','d.brown@techsolutions.al','Company','TechSolutions','Nov 29, 2024','Active','#3B82F6','HR Contact at TechSolutions. Posted 5 internship opportunities.'],
            ['LM','Lisa Martinez','lisa.m@beder.edu.al','Student','Beder University','Apr 15, 2025','Pending','#00b1aa','Student, Law — Year 1. Registration pending supervisor approval.'],
            ['CT','Chris Taylor','chris.taylor@dataspark.al','Company','DataSpark','Feb 22, 2025','Active','#F59E0B','Technical lead at DataSpark. Posted 2 internship roles.'],
            ['AW','Anna Wilson','anna.wilson@unitir.edu.al','Student','Univ. of Tirana','Jan 30, 2025','Active','#00b1aa','Student, Engineering — Year 4. Completed 1 internship successfully.'],
            ['RJ','Robert Jones','r.jones@admin.internlink.al','Admin','InternLink','Oct 05, 2024','Active','#444444','Co-administrator. Handles university onboarding and compliance.'],
            ['EG','Emma Garcia','emma.garcia@polytechnic.edu.al','Student','Polytechnic Univ.','May 01, 2025','Pending','#00b1aa','Student, Architecture — Year 2. Profile under review.'],
          ];
          @endphp

          @foreach($users as $i => [$init, $name, $email, $role, $org, $date, $status, $color, $bio])
          <tr data-name="{{ strtolower($name) }}" data-email="{{ strtolower($email) }}" data-role="{{ $role }}" data-status="{{ $status }}">
            <td>
              <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:36px;height:36px;border-radius:50%;background:{{ $color }};color:white;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">{{ $init }}</div>
                <span style="font-weight:600;color:var(--gray-800);">{{ $name }}</span>
              </div>
            </td>
            <td style="color:var(--gray-600);">{{ $email }}</td>
            <td>
              @if($role === 'Student')
                <span class="role-badge-student">Student</span>
              @elseif($role === 'Company')
                <span class="role-badge-company">Company</span>
              @else
                <span class="role-badge-admin">Admin</span>
              @endif
            </td>
            <td style="color:var(--gray-700);">{{ $org }}</td>
            <td style="color:var(--gray-500);font-size:12px;">{{ $date }}</td>
            <td>
              @if($status === 'Active')
                <span class="status-badge active">Active</span>
              @elseif($status === 'Pending')
                <span class="status-badge pending">Pending</span>
              @else
                <span class="status-badge rejected">Inactive</span>
              @endif
            </td>
            <td>
              <div style="display:flex;align-items:center;justify-content:center;gap:6px;">
                <!-- View -->
                <button
                  title="View User"
                  class="action-btn"
                  onclick="openViewModal('{{ $init }}','{{ $name }}','{{ $email }}','{{ $role }}','{{ $org }}','{{ $date }}','{{ $status }}','{{ $color }}','{{ addslashes($bio) }}')"
                ><i class="fas fa-eye"></i></button>

                <!-- Edit -->
                <button
                  title="Edit User"
                  class="action-btn action-btn-edit"
                  onclick="openEditModal('{{ $i }}','{{ $name }}','{{ $email }}','{{ $role }}','{{ $org }}','{{ $status }}')"
                ><i class="fas fa-pen"></i></button>

                <!-- Delete -->
                <button
                  title="Delete User"
                  class="action-btn action-btn-danger"
                  onclick="openDeleteModal('{{ $i }}','{{ $name }}','{{ $email }}')"
                ><i class="fas fa-trash"></i></button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:20px;padding-top:16px;border-top:1px solid var(--border);">
      <span style="font-size:12px;color:var(--gray-500);">Showing 1–10 of 128 users</span>
      <div style="display:flex;gap:6px;">
        <button class="pagination-btn"><i class="fas fa-chevron-left"></i></button>
        @foreach([1,2,3,'...',13] as $pg)
          <button class="pagination-btn {{ $pg==1 ? 'active' : '' }}">{{ $pg }}</button>
        @endforeach
        <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════
     VIEW MODAL
════════════════════════════════════════ -->
<div id="view-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;" onclick="if(event.target===this)closeModal('view-modal')">
  <div class="modal-content-box" style="max-width:520px;">

    <!-- Modal Header Banner -->
    <div id="view-banner" style="padding:28px 28px 20px;position:relative;background:var(--primary);">
      <button onclick="closeModal('view-modal')" style="position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,0.2);border:none;color:white;cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
      <div style="display:flex;align-items:center;gap:16px;">
        <div id="view-avatar" style="width:60px;height:60px;border-radius:50%;background:white;color:var(--primary);display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:700;border:3px solid rgba(255,255,255,0.5);flex-shrink:0;"></div>
        <div>
          <div id="view-name" style="font-size:20px;font-weight:700;color:white;"></div>
          <div id="view-role-badge" style="margin-top:4px;"></div>
        </div>
      </div>
    </div>

    <!-- Modal Body -->
    <div style="padding:24px 28px;">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:20px;">
        <div>
          <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Email</div>
          <div id="view-email" style="font-size:13px;color:var(--gray-800);font-weight:500;word-break:break-all;"></div>
        </div>
        <div>
          <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Organization</div>
          <div id="view-org" style="font-size:13px;color:var(--gray-800);font-weight:500;"></div>
        </div>
        <div>
          <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Joined Date</div>
          <div id="view-date" style="font-size:13px;color:var(--gray-800);font-weight:500;"></div>
        </div>
        <div>
          <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px;">Status</div>
          <div id="view-status"></div>
        </div>
      </div>

      <div style="padding:14px;border-radius:10px;background:var(--gray-50);border:1px solid var(--border);margin-bottom:20px;">
        <div style="font-size:11px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:6px;">Notes</div>
        <div id="view-bio" style="font-size:13px;color:var(--gray-700);line-height:1.6;"></div>
      </div>

      <div style="display:flex;justify-content:flex-end;gap:10px;">
        <button onclick="closeModal('view-modal')" class="btn btn-outline">Close</button>
        <button onclick="closeModal('view-modal');setTimeout(()=>openEditFromView(),50)" id="view-edit-btn" class="btn btn-primary"><i class="fas fa-pen"></i> Edit User</button>
      </div>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════
     EDIT MODAL
════════════════════════════════════════ -->
<div id="edit-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;" onclick="if(event.target===this)closeModal('edit-modal')">
  <div class="modal-content-box" style="max-width:560px;">

    <!-- Edit Header -->
    <div style="padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
      <div>
        <div style="font-size:16px;font-weight:700;color:var(--gray-800);">Edit User</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Update user information and permissions</div>
      </div>
      <button onclick="closeModal('edit-modal')" style="width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;color:var(--gray-600);cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
    </div>

    <!-- Edit Body -->
    <div style="padding:24px;">
      <input type="hidden" id="edit-id">
      <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
        <div>
          <label class="form-label">Full Name</label>
          <input type="text" id="edit-name" class="form-control" placeholder="Full name">
        </div>
        <div>
          <label class="form-label">Email Address</label>
          <input type="email" id="edit-email" class="form-control" placeholder="Email address">
        </div>
      </div>
      <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
        <div>
          <label class="form-label">Role</label>
          <select id="edit-role" class="form-control">
            <option value="Student">Student</option>
            <option value="Company">Company</option>
            <option value="Admin">Admin</option>
          </select>
        </div>
        <div>
          <label class="form-label">Status</label>
          <select id="edit-status" class="form-control">
            <option value="Active">Active</option>
            <option value="Pending">Pending</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
      </div>
      <div style="margin-bottom:20px;">
        <label class="form-label">University / Company</label>
        <input type="text" id="edit-org" class="form-control" placeholder="Organization name">
      </div>
      <div style="padding:12px 16px;border-radius:8px;background:rgba(59,130,246,0.05);border:1px solid rgba(59,130,246,0.15);margin-bottom:20px;display:flex;align-items:center;gap:10px;">
        <i class="fas fa-info-circle" style="color:#3B82F6;font-size:14px;flex-shrink:0;"></i>
        <span style="font-size:12px;color:#1D4ED8;">Changes will be saved immediately and the user will be notified by email.</span>
      </div>
      <div style="display:flex;justify-content:flex-end;gap:10px;">
        <button onclick="closeModal('edit-modal')" class="btn btn-outline">Cancel</button>
        <button onclick="saveEdit()" class="btn btn-primary"><i class="fas fa-check"></i> Save Changes</button>
      </div>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════
     DELETE CONFIRMATION MODAL
════════════════════════════════════════ -->
<div id="delete-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;" onclick="if(event.target===this)closeModal('delete-modal')">
  <div class="modal-content-box" style="max-width:440px;">

    <!-- Delete Header -->
    <div style="padding:24px 24px 0;text-align:center;">
      <div style="width:64px;height:64px;border-radius:50%;background:rgba(239,68,68,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
        <i class="fas fa-trash-can" style="font-size:26px;color:#EF4444;"></i>
      </div>
      <div style="font-size:18px;font-weight:700;color:var(--gray-800);margin-bottom:8px;">Delete User?</div>
      <div style="font-size:13px;color:var(--gray-500);line-height:1.6;">
        Are you sure you want to delete <strong id="delete-name" style="color:var(--gray-800);"></strong>?
        <br>This action <strong style="color:#EF4444;">cannot be undone</strong> and will permanently remove all their data from the platform.
      </div>
    </div>

    <!-- User Preview -->
    <div style="margin:20px 24px;padding:14px 16px;border-radius:10px;background:var(--gray-50);border:1px solid var(--border);display:flex;align-items:center;gap:12px;">
      <div style="width:40px;height:40px;border-radius:50%;background:#EF4444;color:white;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;flex-shrink:0;" id="delete-avatar"></div>
      <div>
        <div id="delete-name-2" style="font-size:13px;font-weight:600;color:var(--gray-800);"></div>
        <div id="delete-email" style="font-size:12px;color:var(--gray-500);"></div>
      </div>
    </div>

    <!-- Confirmation Checkbox -->
    <div class="delete-warning-box">
      <label style="display:flex;align-items:flex-start;gap:10px;cursor:pointer;">
        <input type="checkbox" id="delete-confirm-check" style="margin-top:2px;accent-color:#EF4444;" onchange="document.getElementById('confirm-delete-btn').disabled=!this.checked;">
        <span class="delete-warning-text" style="font-size:12px;line-height:1.5;">I understand that this will permanently delete the user and all associated data.</span>
      </label>
    </div>

    <!-- Actions -->
    <div style="padding:0 24px 24px;display:flex;gap:10px;">
      <button onclick="closeModal('delete-modal')" class="btn btn-outline" style="flex:1;">Cancel</button>
      <button id="confirm-delete-btn" disabled onclick="confirmDelete()" class="btn btn-danger" style="flex:1;opacity:0.5;transition:opacity 0.2s;" onfocus="this.style.opacity=this.disabled?'0.5':'1'">
        <i class="fas fa-trash"></i> Delete User
      </button>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════
     ADD USER MODAL
════════════════════════════════════════ -->
<div id="add-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);backdrop-filter:blur(6px);z-index:9999;align-items:center;justify-content:center;padding:24px;" onclick="if(event.target===this)closeModal('add-modal')">
  <div class="modal-content-box" style="max-width:560px;">
    <div style="padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
      <div>
        <div style="font-size:16px;font-weight:700;color:var(--gray-800);">Add New User</div>
        <div style="font-size:12px;color:var(--gray-500);margin-top:2px;">Create a new user account on the platform</div>
      </div>
      <button onclick="closeModal('add-modal')" style="width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;color:var(--gray-600);cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
    </div>
    <div style="padding:24px;">
      <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
        <div><label class="form-label">Full Name</label><input type="text" class="form-control" placeholder="John Smith"></div>
        <div><label class="form-label">Email Address</label><input type="email" class="form-control" placeholder="john@example.com"></div>
      </div>
      <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
        <div>
          <label class="form-label">Role</label>
          <select class="form-control"><option>Student</option><option>Company</option><option>Admin</option></select>
        </div>
        <div>
          <label class="form-label">Organization</label>
          <input type="text" class="form-control" placeholder="University or Company">
        </div>
      </div>
      <div style="margin-bottom:20px;">
        <label class="form-label">Temporary Password</label>
        <input type="password" class="form-control" placeholder="Min. 8 characters">
      </div>
      <div style="display:flex;justify-content:flex-end;gap:10px;">
        <button onclick="closeModal('add-modal')" class="btn btn-outline">Cancel</button>
        <button class="btn btn-primary" onclick="closeModal('add-modal');showToast('User created successfully!','success')"><i class="fas fa-user-plus"></i> Create User</button>
      </div>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════
     TOAST NOTIFICATION
════════════════════════════════════════ -->
<div id="toast" style="position:fixed;bottom:24px;right:24px;z-index:99999;transform:translateY(80px);opacity:0;transition:all 0.35s cubic-bezier(0.4,0,0.2,1);pointer-events:none;">
  <div id="toast-inner" style="display:flex;align-items:center;gap:12px;padding:14px 20px;border-radius:12px;background:var(--white);box-shadow:0 10px 25px rgba(0,0,0,0.15);border:1px solid var(--border);min-width:280px;">
    <div id="toast-icon" style="font-size:16px;"></div>
    <span id="toast-msg" style="font-size:13px;font-weight:600;color:var(--gray-800);"></span>
  </div>
</div>


<!-- ═══════════════════════════════════════
     STYLES & SCRIPTS
════════════════════════════════════════ -->
<style>
  @keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to   { transform: translateY(0);    opacity: 1; }
  }
  #confirm-delete-btn:not(:disabled) { opacity: 1 !important; }

  /* ── SEARCH INPUT WRAPPER ── */
  .search-input-wrapper {
    display:flex;align-items:center;gap:8px;
    background:#fff;border:1.5px solid var(--gray-300);
    border-radius:8px;padding:8px 14px;flex:1;min-width:200px;
    transition: var(--transition);
  }
  html.admin-dark .search-input-wrapper, html.dark .search-input-wrapper {
    background: var(--white);
    border-color: var(--border);
  }

  /* ── FILTER SELECT CUSTOM ── */
  .filter-select-custom {
    padding:9px 14px;border:1.5px solid var(--gray-300);border-radius:8px;
    font-size:13px;color:var(--gray-700);background:#fff;cursor:pointer;
    transition: var(--transition);
  }
  html.admin-dark .filter-select-custom, html.dark .filter-select-custom {
    background: var(--white);
    border-color: var(--border);
    color: var(--gray-700);
  }

  /* ── ROLE BADGES ── */
  .role-badge-student {
    padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;
    background:rgba(59,130,246,0.1);color:#1D4ED8;
    white-space: nowrap;
  }
  .role-badge-company {
    padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;
    background:rgba(16,185,129,0.1);color:#065F46;
    white-space: nowrap;
  }
  .role-badge-admin {
    padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;
    background:rgba(239,68,68,0.1);color:#991B1B;
    white-space: nowrap;
  }
  html.admin-dark .role-badge-student, html.dark .role-badge-student {
    background: rgba(59,130,246,0.15);
    color: #60A5FA;
  }
  html.admin-dark .role-badge-company, html.dark .role-badge-company {
    background: rgba(16,185,129,0.15);
    color: #34D399;
  }
  html.admin-dark .role-badge-admin, html.dark .role-badge-admin {
    background: rgba(239,68,68,0.15);
    color: #F87171;
  }

  /* ── ACTION BUTTONS ── */
  .action-btn {
    width: 32px; height: 32px; border-radius: 8px;
    border: 1.5px solid var(--gray-300); background: #fff;
    color: var(--gray-600); cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; transition: all 0.2s;
  }
  .action-btn:hover {
    background: var(--primary-bg); color: var(--primary); border-color: var(--primary);
  }
  .action-btn-edit:hover {
    background: rgba(59,130,246,0.08); color: #3b82f6; border-color: #3b82f6;
  }
  .action-btn-danger:hover {
    background: rgba(239,68,68,0.08); color: #ef4444; border-color: #ef4444;
  }
  html.admin-dark .action-btn, html.dark .action-btn {
    background: var(--white);
    border-color: var(--border);
    color: var(--gray-400);
  }
  html.admin-dark .action-btn:hover, html.dark .action-btn:hover {
    background: var(--primary-bg);
    color: var(--primary);
    border-color: var(--primary);
  }
  html.admin-dark .action-btn-edit:hover, html.dark .action-btn-edit:hover {
    background: rgba(59,130,246,0.15);
    color: #60a5fa;
    border-color: #3b82f6;
  }
  html.admin-dark .action-btn-danger:hover, html.dark .action-btn-danger:hover {
    background: rgba(239,68,68,0.15);
    color: #f87171;
    border-color: #ef4444;
  }

  /* ── PAGINATION BUTTONS ── */
  .pagination-btn {
    width:32px;height:32px;border-radius:8px;
    border:1.5px solid var(--gray-300);background:#fff;
    color:var(--gray-600);cursor:pointer;font-size:12px;
    display:inline-flex;align-items:center;justify-content:center;
    transition: var(--transition);
  }
  .pagination-btn:hover {
    border-color: var(--primary); color: var(--primary); background: var(--gray-50);
  }
  .pagination-btn.active {
    border-color: var(--primary); background: var(--primary); color: #fff; font-weight: 600;
  }
  .pagination-btn.active:hover {
    background: var(--primary-dark); border-color: var(--primary-dark);
  }
  html.admin-dark .pagination-btn, html.dark .pagination-btn {
    background: var(--white);
    border-color: var(--border);
    color: var(--gray-400);
  }
  html.admin-dark .pagination-btn:hover, html.dark .pagination-btn:hover {
    background: var(--gray-100);
    color: var(--primary);
    border-color: var(--primary);
  }

  /* ── MODALS CONTENT BOX ── */
  .modal-content-box {
    background: #fff; border-radius: 16px;
    width: 100%; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
    overflow: hidden; animation: slideUp 0.25s ease;
  }
  html.admin-dark .modal-content-box, html.dark .modal-content-box {
    background: var(--white);
    border: 1px solid var(--border);
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
  }

  /* ── DELETE WARNING BOX ── */
  .delete-warning-box {
    margin: 0 24px 20px; padding: 12px 14px; border-radius: 8px;
    border: 1.5px solid #FECACA; background: #FEF2F2;
  }
  html.admin-dark .delete-warning-box, html.dark .delete-warning-box {
    border-color: rgba(239,68,68,0.3);
    background: rgba(239,68,68,0.1);
  }
  .delete-warning-text {
    color: #991B1B;
  }
  html.admin-dark .delete-warning-text, html.dark .delete-warning-text {
    color: #f87171;
  }
</style>

<script>
  /* ─── Current edit context ─── */
  let _currentView = {};

  /* ─── Open / Close Modals ─── */
  function openModal(id)  { document.getElementById(id).style.display = 'flex'; }
  function closeModal(id) {
    document.getElementById(id).style.display = 'none';
    if(id === 'delete-modal') {
      document.getElementById('delete-confirm-check').checked = false;
      document.getElementById('confirm-delete-btn').disabled = true;
    }
  }

  /* ─── View Modal ─── */
  function openViewModal(init, name, email, role, org, date, status, color, bio) {
    _currentView = {init,name,email,role,org,date,status,color,bio};

    document.getElementById('view-avatar').textContent = init;
    document.getElementById('view-avatar').style.color = color;

    document.getElementById('view-name').textContent  = name;
    document.getElementById('view-email').textContent = email;
    document.getElementById('view-org').textContent   = org;
    document.getElementById('view-date').textContent  = date;
    document.getElementById('view-bio').textContent   = bio;

    // Banner color
    const roleColors = { Student: '#3B82F6', Company: '#10B981', Admin: '#EF4444' };
    const bannerColor = roleColors[role] || 'var(--primary)';
    document.getElementById('view-banner').style.background = bannerColor;
    document.getElementById('view-avatar').style.color = bannerColor;

    // Role badge
    const roleBadge = document.getElementById('view-role-badge');
    roleBadge.innerHTML = `<span style="padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;background:rgba(255,255,255,0.2);color:white;">${role}</span>`;

    // Status
    const statusColors = { Active:'#10B981', Pending:'#F59E0B', Inactive:'#EF4444' };
    const statusBgs    = { Active:'rgba(16,185,129,0.1)', Pending:'rgba(245,158,11,0.1)', Inactive:'rgba(239,68,68,0.1)' };
    document.getElementById('view-status').innerHTML =
      `<span style="padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;background:${statusBgs[status]||'var(--gray-100)'};color:${statusColors[status]||'var(--gray-600)'};">${status}</span>`;

    openModal('view-modal');
  }

  function openEditFromView() {
    openEditModal('0', _currentView.name, _currentView.email, _currentView.role, _currentView.org, _currentView.status);
  }

  /* ─── Edit Modal ─── */
  function openEditModal(id, name, email, role, org, status) {
    document.getElementById('edit-id').value       = id;
    document.getElementById('edit-name').value     = name;
    document.getElementById('edit-email').value    = email;
    document.getElementById('edit-role').value     = role;
    document.getElementById('edit-org').value      = org;
    document.getElementById('edit-status').value   = status;
    openModal('edit-modal');
  }

  function saveEdit() {
    closeModal('edit-modal');
    showToast('User updated successfully!', 'success');
  }

  /* ─── Delete Modal ─── */
  function openDeleteModal(id, name, email) {
    document.getElementById('delete-name').textContent   = name;
    document.getElementById('delete-name-2').textContent = name;
    document.getElementById('delete-email').textContent  = email;
    document.getElementById('delete-avatar').textContent = name.split(' ').map(w=>w[0]).join('').slice(0,2);
    document.getElementById('delete-confirm-check').checked = false;
    document.getElementById('confirm-delete-btn').disabled = true;
    openModal('delete-modal');
  }

  function confirmDelete() {
    closeModal('delete-modal');
    showToast('User deleted successfully.', 'danger');
  }

  /* ─── Add User ─── */
  function openAddUser() { openModal('add-modal'); }

  /* ─── Toast ─── */
  function showToast(msg, type='success') {
    const toast = document.getElementById('toast');
    const icons  = { success:'<i class="fas fa-circle-check" style="color:#10B981"></i>', danger:'<i class="fas fa-circle-xmark" style="color:#EF4444"></i>', info:'<i class="fas fa-circle-info" style="color:#3B82F6"></i>' };
    document.getElementById('toast-msg').textContent  = msg;
    document.getElementById('toast-icon').innerHTML   = icons[type] || icons.info;
    toast.style.transform = 'translateY(0)';
    toast.style.opacity   = '1';
    setTimeout(() => { toast.style.transform = 'translateY(80px)'; toast.style.opacity = '0'; }, 3000);
  }

  /* ─── Table filter ─── */
  function filterTable(searchVal) {
    const search = (searchVal ?? document.querySelector('input[type="text"]').value).toLowerCase();
    const role   = document.getElementById('roleFilter').value;
    const status = document.getElementById('statusFilter').value;
    const rows   = document.querySelectorAll('#usersTable tbody tr');
    let visible  = 0;
    rows.forEach(row => {
      const matchSearch = !search || row.dataset.name.includes(search) || row.dataset.email.includes(search);
      const matchRole   = !role   || row.dataset.role   === role;
      const matchStatus = !status || row.dataset.status === status;
      const show = matchSearch && matchRole && matchStatus;
      row.style.display = show ? '' : 'none';
      if(show) visible++;
    });
    document.getElementById('userCount').textContent = `(${visible} shown)`;
  }
</script>

</x-layouts::admin>
