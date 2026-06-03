import re

path = 'resources/views/app/admin/universities.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace stats
content = re.sub(r'<div class="stat-value">124</div>', r'<div class="stat-value">{{ number_format($totalUniversities) }}</div>', content)
content = re.sub(r'<div class="stat-value">84</div>', r'<div class="stat-value">{{ number_format($totalCompanies) }}</div>', content)
content = re.sub(r'<div class="stat-value">12,450</div>', r'<div class="stat-value">{{ number_format($totalStudents) }}</div>', content)
content = re.sub(r'<div class="stat-value">3,240</div>', r'<div class="stat-value">{{ number_format($totalFaculties) }}</div>', content)

# Table body
table_body_replacement = """            <tbody>
              @foreach($universities as $uni)
              @php
                  $initials = substr(strtoupper($uni->name ?? 'NA'), 0, 2);
                  $sClass = match($uni->status) {
                      'Inactive' => 'badge-inactive',
                      default => 'badge-active'
                  };
                  $gradient = $uni->color ?? 'linear-gradient(135deg,rgba(37,99,235,0.15) 0%,rgba(37,99,235,0.05) 100%)';
                  $textColor = $uni->icon ?? '#3B82F6';
              @endphp
              <tr data-id="{{ $uni->id }}">
                <td>
                  <div class="user-cell">
                    <div class="dept-avatar" style="background: {{ $gradient }}; color: {{ $textColor }}; width:40px; height:40px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-weight:600; font-size:16px; border:1px solid rgba(0,0,0,0.05);">
                      {{ $initials }}
                    </div>
                    <div>
                      <div class="user-name">{{ $uni->name }}</div>
                      <div class="user-email" style="font-size:12px;">{{ $uni->city ?? 'N/A' }}</div>
                    </div>
                  </div>
                </td>
                <td><span class="badge-status {{ $sClass }}">{{ ucfirst($uni->status ?? 'Active') }}</span></td>
                <td>{{ $uni->faculties_count ?? 0 }}</td>
                <td>{{ $uni->students_count ?? 0 }}</td>
                <td>{{ $uni->internships_count ?? 0 }}</td>
                <td>
                  <div class="action-btns">
                    <button class="btn btn-icon-outline" onclick="editUniversity(this)" title="Edit"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-icon-outline" title="View"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-icon-danger" onclick="deleteUniversity(this)" title="Delete"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>"""

table_body_replacement = table_body_replacement.replace('\\', '\\\\')
content = re.sub(r'<tbody>.*?</tbody>', table_body_replacement, content, flags=re.DOTALL)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)

print('Universities updated')
