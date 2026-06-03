import re

path = 'resources/views/app/admin/dashboard.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace hardcoded stats
content = re.sub(r'<div class="stat-value">2,450</div>', r'<div class="stat-value">{{ number_format($totalStudents) }}</div>', content)
content = re.sub(r'<div class="stat-value">320</div>', r'<div class="stat-value">{{ number_format($activeInternships) }}</div>', content)
content = re.sub(r'<div class="stat-value">45</div>', r'<div class="stat-value">{{ number_format($pendingApprovals) }}</div>', content)
content = re.sub(r'<div class="stat-value">4\.8</div>', r'<div class="stat-value">{{ $avgSatisfaction }}</div>', content)

# Replace recent activity hardcoded list
activity_replacement = """        <div class="timeline">
          @forelse($activities as $activity)
          <div class="timeline-item">
            <div class="timeline-icon" style="background: rgba(37,99,235,0.1); color: var(--primary);"><i class="fas fa-{{ $activity->icon ?? 'bell' }}"></i></div>
            <div class="timeline-content">
              <div class="timeline-title">{{ $activity->description }}</div>
              <div class="timeline-time">{{ $activity->created_at->diffForHumans() }}</div>
            </div>
          </div>
          @empty
          <div class="timeline-item">
            <div class="timeline-content">
              <div class="timeline-title">No recent activity</div>
            </div>
          </div>
          @endforelse
        </div>"""
        
content = re.sub(r'<div class="timeline">.*?</div>\s*</div>\s*</div>', activity_replacement + '\n      </div>\n    </div>', content, flags=re.DOTALL)

with open(path, 'w', encoding='utf-8') as f:
    f.write(content)

print('Dashboard updated')
