import re

path = 'resources/views/app/admin/internships.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Fix table body to include data attributes
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
                  $deadline = $internship->deadline ? $internship->deadline->format('Y-m-d') : '';
                  $skills_joined = is_array($internship->skills_required) ? implode(', ', $internship->skills_required) : $internship->skills_required;
              @endphp
              <tr data-id="{{ $internship->id }}" data-desc="{{ htmlspecialchars($internship->description ?? '') }}" data-skills="{{ htmlspecialchars($skills_joined ?? '') }}" data-deadline="{{ $deadline }}">
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
                <td>{{ $internship->deadline ? $internship->deadline->format('M Y') : '—' }}</td>
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

js_fix = """  const deadlineStr = row.getAttribute('data-deadline');
  document.getElementById('edit-deadline').value = deadlineStr;
  document.getElementById('edit-description').value = row.getAttribute('data-desc');
  document.getElementById('edit-skills').value = row.getAttribute('data-skills');"""

content = re.sub(r"document.getElementById\('edit-description'\).value = '-';", js_fix, content)

js_view_fix = """  const deadlineStr = row.getAttribute('data-deadline');
  document.getElementById('view-description').textContent = row.getAttribute('data-desc') || 'No description available for this listing.';"""

content = re.sub(r"document.getElementById\('view-description'\).textContent = 'No description available for this listing.';", js_view_fix, content)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)
print('Done!')
