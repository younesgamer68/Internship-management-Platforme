import re

path = 'resources/views/app/admin/departments.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace stats
content = re.sub(r'<div class="stat-card-value">24</div>', r'<div class="stat-card-value">{{ number_format($totalDepartments) }}</div>', content)
content = re.sub(r'<div class="stat-value">142</div>', r'<div class="stat-value">{{ number_format($activePrograms) }}</div>', content)
content = re.sub(r'<div class="stat-value">8,450</div>', r'<div class="stat-value">{{ number_format($totalStudents) }}</div>', content)
content = re.sub(r'<div class="stat-value">345</div>', r'<div class="stat-value">{{ number_format($facultyMembers) }}</div>', content)

# Table body
table_body_replacement = """            <tbody>
              @foreach($departments as $dept)
              @php
                  $initials = substr(strtoupper($dept->name ?? 'NA'), 0, 2);
                  $sClass = match($dept->status) {
                      'Inactive' => 'badge-inactive',
                      default => 'badge-active'
                  };
              @endphp
              <tr data-id="{{ $dept->id }}">
                <td>
                  <div class="user-cell">
                    <div class="dept-avatar" style="background: rgba(16,185,129,0.1); color: #10b981; width:40px; height:40px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-weight:600;">
                      {{ $initials }}
                    </div>
                    <div>
                      <div class="user-name">{{ $dept->name }}</div>
                      <div class="user-email">{{ $dept->code ?? 'N/A' }}</div>
                    </div>
                  </div>
                </td>
                <td>{{ $dept->faculty ?? 'N/A' }}</td>
                <td>{{ $dept->students_count ?? 0 }}</td>
                <td>{{ $dept->programs_count ?? 0 }}</td>
                <td><span class="badge-status {{ $sClass }}">{{ ucfirst($dept->status ?? 'Active') }}</span></td>
                <td>
                  <div class="action-btns">
                    <button class="btn btn-icon-outline" onclick="editDepartment(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-icon-outline" title="Programs"><i class="fas fa-list"></i></button>
                    <button class="btn btn-icon-danger" onclick="deleteDepartment(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>"""

table_body_replacement = table_body_replacement.replace('\\', '\\\\')
content = re.sub(r'<tbody>.*?</tbody>', table_body_replacement, content, flags=re.DOTALL)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)

print('Departments updated')
