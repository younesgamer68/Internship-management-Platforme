import re

path = 'resources/views/app/admin/users.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace stats
content = re.sub(r'<div class="stat-card-value">1,248</div>', r'<div class="stat-card-value">{{ number_format($totalUsers) }}</div>', content)
content = re.sub(r'<div class="stat-value">942</div>', r'<div class="stat-value">{{ number_format($activeUsers) }}</div>', content)
content = re.sub(r'<div class="stat-value">15</div>', r'<div class="stat-value">{{ number_format($pendingVerifications) }}</div>', content)

# Table body
table_body_replacement = """            <tbody>
              @foreach($users as $user)
              @php
                  $initials = substr(strtoupper($user->name ?? 'NA'), 0, 2);
                  $roleClass = match($user->role) {
                      'admin' => 'role-admin',
                      'student' => 'role-student',
                      'recruiter' => 'role-recruiter',
                      default => 'role-student'
                  };
                  $sClass = match($user->status) {
                      'Pending' => 'badge-pending',
                      'Inactive' => 'badge-expired',
                      default => 'badge-active'
                  };
              @endphp
              <tr data-id="{{ $user->id }}" data-email="{{ $user->email }}" data-role="{{ $user->role }}" data-status="{{ $user->status }}" data-uni="{{ $user->university_id }}" data-dept="{{ $user->department_id }}">
                <td>
                  <div class="user-cell">
                    @if($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" class="user-avatar" alt="avatar" />
                    @else
                        <div class="user-avatar" style="background: rgba(37,99,235,0.1); color: var(--primary); display:flex; align-items:center; justify-content:center; font-weight:bold;">{{ $initials }}</div>
                    @endif
                    <div>
                      <div class="user-name">{{ $user->name }}</div>
                      <div class="user-email">{{ $user->email }}</div>
                    </div>
                  </div>
                </td>
                <td><span class="role-badge {{ $roleClass }}">{{ ucfirst($user->role) }}</span></td>
                <td>{{ $user->university->name ?? '—' }}</td>
                <td><span class="dept-tag">{{ $user->department->name ?? '—' }}</span></td>
                <td><span class="badge-status {{ $sClass }}">{{ ucfirst($user->status) }}</span></td>
                <td>{{ $user->last_activity ? \\Carbon\\Carbon::parse($user->last_activity)->diffForHumans() : 'Never' }}</td>
                <td>
                  <div class="action-btns">
                    <button class="btn btn-icon-outline" onclick="editUser(this)" title="Edit User"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-icon-outline" title="Send Message"><i class="fas fa-envelope"></i></button>
                    <button class="btn btn-icon-danger" onclick="deleteUser(this)" title="Delete User"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>"""

# Replace all occurrences of \\ in the replacement with \\\\ so re.sub works
table_body_replacement = table_body_replacement.replace('\\', '\\\\')
content = re.sub(r'<tbody>.*?</tbody>', table_body_replacement, content, flags=re.DOTALL)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)

print('Users updated')
