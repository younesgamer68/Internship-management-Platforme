import sys
import re

file_path = r'c:\Users\HADROC\Herd\Interhship_Plat\resources\views\app\admin\universities.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    lines = f.readlines()

new_lines = []
skip = False
for i, line in enumerate(lines):
    if '<!-- Epoka University -->' in line:
        skip = True
        new_lines.append(r'''        @foreach($universities as $univ)
        @php 
            $stsClass = ['Active'=>'active', 'Pending'=>'pending', 'Inactive'=>'inactive'][$univ->status] ?? 'active';
            $city = $univ->city ?? 'Tirana';
            $website = $univ->website ?? '—';
        @endphp
        <div class="univ-card" data-id="{{ $univ->id }}" data-status="{{ $univ->status }}" data-city="{{ $city }}" data-name="{{ strtolower($univ->name) }}">
          <div class="univ-card-header">
            <div class="univ-card-icon" style="background:{{ $univ->color }};color:{{ $univ->icon }}">
              <i class="fas fa-university"></i>
            </div>
            <div class="univ-card-info">
              <h4>{{ $univ->name }}</h4>
              <div class="univ-card-location"><i class="fas fa-location-dot"></i> {{ $city }}, Albania</div>
              <div class="univ-card-website"><i class="fas fa-globe"></i> {{ $website }}</div>
            </div>
            <span class="status-badge {{ $stsClass }}" style="align-self:flex-start">{{ $univ->status }}</span>
          </div>
          <div class="univ-card-stats">
            <div class="univ-stat"><div class="univ-stat-value">{{ $univ->students_count }}</div><div class="univ-stat-label">Students</div></div>
            <div class="univ-stat-sep"></div>
            <div class="univ-stat"><div class="univ-stat-value">{{ $univ->faculties_count }}</div><div class="univ-stat-label">Faculties</div></div>
            <div class="univ-stat-sep"></div>
            <div class="univ-stat"><div class="univ-stat-value" style="color:var(--green)">{{ $univ->internships_count }}</div><div class="univ-stat-label">Internships</div></div>
            <div class="univ-stat-sep"></div>
            <div class="univ-stat"><div class="univ-stat-value">{{ $univ->departments_count }}</div><div class="univ-stat-label">Departments</div></div>
          </div>
          <div class="univ-card-actions">
            <button class="btn btn-sm btn-icon-outline" onclick="viewUniv(this)" title="View Details"><i class="fas fa-eye"></i></button>
            <button class="btn btn-sm btn-outline flex-1" onclick="editUniv(this)"><i class="fas fa-pen"></i> Edit</button>
            <button class="btn btn-sm btn-icon-danger" onclick="deleteUniv(this)" title="Delete"><i class="fas fa-trash"></i></button>
          </div>
        </div>
        @endforeach
''')

    if '<!-- ═══════════════════════════════ ADD UNIVERSITY MODAL ═══════════════════════════════ -->' in line:
        skip = False
        new_lines.append('      </div>\n\n')
        
    if not skip:
        new_lines.append(line)

with open(file_path, 'w', encoding='utf-8') as f:
    f.writelines(new_lines)

print('File updated!')
