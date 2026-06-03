import re

path = 'resources/views/app/admin/reports.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace stats
content = re.sub(r'<div class="stat-value">42%</div>', r'<div class="stat-value">{{ $successRate }}</div>', content)
content = re.sub(r'<div class="stat-value">8,450</div>', r'<div class="stat-value">{{ number_format($totalApplications) }}</div>', content)
content = re.sub(r'<div class="stat-value">1,245</div>', r'<div class="stat-value">{{ number_format($totalReports) }}</div>', content)

# Table body
table_body_replacement = """            <tbody>
              @foreach($recentApplications as $app)
              @php
                  $sClass = match($app->status) {
                      'pending' => 'badge-pending',
                      'rejected' => 'badge-rejected',
                      'accepted' => 'badge-active',
                      default => 'badge-pending'
                  };
              @endphp
              <tr>
                <td>{{ $app->user->name ?? 'Unknown' }}</td>
                <td>{{ $app->internship->title ?? 'Unknown' }}</td>
                <td>{{ $app->created_at->format('M d, Y') }}</td>
                <td><span class="badge-status {{ $sClass }}">{{ ucfirst($app->status) }}</span></td>
                <td>
                  <button class="btn btn-sm btn-outline">View</button>
                </td>
              </tr>
              @endforeach
            </tbody>"""

table_body_replacement = table_body_replacement.replace('\\', '\\\\')
content = re.sub(r'<tbody>.*?</tbody>', table_body_replacement, content, flags=re.DOTALL)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)

print('Reports updated')
