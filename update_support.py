import re

path = 'resources/views/app/admin/support.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace stats
content = re.sub(r'<div class="stat-value">42</div>', r'<div class="stat-value">{{ number_format($openTickets) }}</div>', content)
content = re.sub(r'<div class="stat-value">1,284</div>', r'<div class="stat-value">{{ number_format($resolvedTickets) }}</div>', content)
content = re.sub(r'<div class="stat-value">2\.4h</div>', r'<div class="stat-value">{{ $avgResponseTime }}</div>', content)
content = re.sub(r'<div class="stat-value">98%</div>', r'<div class="stat-value">{{ $csatScore }}</div>', content)

# Table body
table_body_replacement = """            <tbody>
              @foreach($tickets as $ticket)
              @php
                  $pClass = match(strtolower($ticket->priority ?? 'medium')) {
                      'high' => 'badge-high',
                      'low' => 'badge-low',
                      default => 'badge-medium'
                  };
                  $sClass = match(strtolower($ticket->status ?? 'open')) {
                      'resolved' => 'badge-resolved',
                      'closed' => 'badge-closed',
                      default => 'badge-open'
                  };
              @endphp
              <tr onclick="openTicketModal()" style="cursor: pointer;">
                <td><span style="color:var(--text-muted)">#{{ str_pad($ticket->id, 4, '0', STR_PAD_LEFT) }}</span></td>
                <td>{{ $ticket->user->name ?? 'User' }}</td>
                <td><div style="max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $ticket->subject ?? 'No Subject' }}</div></td>
                <td>{{ $ticket->category ?? 'General' }}</td>
                <td><span class="priority-badge {{ $pClass }}">{{ ucfirst($ticket->priority ?? 'Medium') }}</span></td>
                <td><span class="badge-status {{ $sClass }}">{{ ucfirst($ticket->status ?? 'Open') }}</span></td>
                <td>{{ $ticket->created_at->diffForHumans() }}</td>
              </tr>
              @endforeach
            </tbody>"""

table_body_replacement = table_body_replacement.replace('\\', '\\\\')
content = re.sub(r'<tbody>.*?</tbody>', table_body_replacement, content, flags=re.DOTALL)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)

print('Support updated')
