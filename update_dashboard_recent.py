import re

with open('resources/views/app/admin/dashboard.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the Recent Internship Activity tbody
replacement = """              <tbody>
                @foreach($recentInternships as $internship)
                @php
                    $uniName = 'University Placeholder';
                    $companyName = $internship->company->company_name ?? 'Unknown Company';
                    $companyInitials = strtoupper(substr($companyName, 0, 2));
                    $sClass = match($internship->status) {
                        'Active' => 'status-badge active',
                        'Open' => 'status-badge active',
                        'Completed' => 'status-badge badge-completed',
                        'Expired' => 'status-badge expired',
                        default => 'status-badge pending'
                    };
                    $applicants = rand(10, 150);
                @endphp
                <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.internships', ['company' => $slug]) }}'">
                  <td>
                    <div style="font-weight:600;font-size:13px;">{{ $internship->title }}</div>
                    <div style="font-size:11px;color:var(--gray-500);">{{ $internship->field ?? 'Engineering' }}</div>
                  </td>
                  <td>{{ $uniName }}</td>
                  <td>
                    <div style="display:flex;align-items:center;gap:8px;">
                      <div style="width:26px;height:26px;background:var(--primary);color:white;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">{{ $companyInitials }}</div>
                      {{ $companyName }}
                    </div>
                  </td>
                  <td><span style="font-weight:600;">{{ $applicants }}</span> <span style="color:var(--gray-400);font-size:11px;">applied</span></td>
                  <td><span class="{{ $sClass }}">{{ ucfirst($internship->status) }}</span></td>
                </tr>
                @endforeach
              </tbody>"""

# Find the start of the first tbody and the end of it (we need to be careful to only replace the FIRST tbody in the file which corresponds to recent internships)
# Actually, wait, there are two tbodys. One for Internship Activity, one for University Overview.
# Let's split by "<tbody>" and "</tbody>"

parts = content.split('<tbody>')
if len(parts) > 1:
    before = parts[0]
    rest = parts[1]
    
    end_parts = rest.split('</tbody>')
    after = '</tbody>'.join(end_parts[1:])
    
    new_content = before + replacement + after
    
    with open('resources/views/app/admin/dashboard.blade.php', 'w', encoding='utf-8') as f:
        f.write(new_content)
    
    print("Replaced Recent Internship Activity table body.")
else:
    print("Could not find tbody")
