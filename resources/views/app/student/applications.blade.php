<x-layouts::app :title="__('My Applications')">
<!-- Stats Row -->
<div class="stats-row">
  <div class="stat-card">
    <div class="stat-icon primary"><i class="fas fa-file-alt"></i></div>
    <div class="stat-info">
      <div class="stat-value">5</div>
      <div class="stat-label">Total Applications</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon warning"><i class="fas fa-hourglass-half"></i></div>
    <div class="stat-info">
      <div class="stat-value">2</div>
      <div class="stat-label">Under Review</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green"><i class="fas fa-calendar-check"></i></div>
    <div class="stat-info">
      <div class="stat-value">1</div>
      <div class="stat-label">Interview Scheduled</div>
    </div>
  </div>
</div>

<!-- Tabs -->
<div class="tabs-row">
  <button class="tab-btn active" data-tab="all">All</button>
  <button class="tab-btn" data-tab="pending">Pending</button>
  <button class="tab-btn" data-tab="interview">Interview</button>
  <button class="tab-btn" data-tab="accepted">Accepted</button>
  <button class="tab-btn" data-tab="rejected">Rejected</button>
</div>

<!-- Applications Table -->
<div class="card">
  <div class="card-body no-padding">
    <div class="table-wrapper">
      <table class="data-table">
        <thead>
          <tr>
            <th>Internship</th>
            <th>Company</th>
            <th>Applied Date</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Progress</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <!-- Row 1 -->
          <tr>
            <td>
              <div class="table-cell-title">Software Development Internship</div>
              <div class="table-cell-sub"><i class="fas fa-location-dot"></i> San Francisco, CA</div>
            </td>
            <td>
              <div class="company-cell">
                <div class="company-logo-sm" style="background: #2563EB;">CT</div>
                <span>ConnorTech</span>
              </div>
            </td>
            <td>May 10, 2024</td>
            <td>3 months</td>
            <td><span class="status-badge status-pending">Pending</span></td>
            <td>
              <div class="progress-bar-wrapper">
                <div class="progress-bar">
                  <div class="progress-fill orange" style="width: 40%"></div>
                </div>
                <span class="progress-label">40%</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <button class="btn btn-sm btn-outline" onclick="viewApp('Software Development Internship','ConnorTech','San Francisco, CA','Pending','40%','3 months')">View</button>
                <button class="btn btn-sm btn-danger-outline" onclick="withdrawApp(this,'ConnorTech')">Withdraw</button>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td>
              <div class="table-cell-title">Product Management Internship</div>
              <div class="table-cell-sub"><i class="fas fa-location-dot"></i> New York, NY</div>
            </td>
            <td>
              <div class="company-cell">
                <div class="company-logo-sm" style="background: var(--primary);">SD</div>
                <span>SierraDynamics</span>
              </div>
            </td>
            <td>May 15, 2024</td>
            <td>2 months</td>
            <td><span class="status-badge status-interview">Interview Scheduled</span></td>
            <td>
              <div class="progress-bar-wrapper">
                <div class="progress-bar">
                  <div class="progress-fill green" style="width: 75%"></div>
                </div>
                <span class="progress-label">75%</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <button class="btn btn-sm btn-primary" onclick="viewApp('Product Management Internship','SierraDynamics','New York, NY','Interview Scheduled','75%','2 months')">View</button>
                <button class="btn btn-sm btn-danger-outline" onclick="withdrawApp(this,'SierraDynamics')">Withdraw</button>
              </div>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td>
              <div class="table-cell-title">Marketing Internship</div>
              <div class="table-cell-sub"><i class="fas fa-location-dot"></i> Boston, MA</div>
            </td>
            <td>
              <div class="company-cell">
                <div class="company-logo-sm" style="background: #8B5CF6;">BG</div>
                <span>Bayview Group</span>
              </div>
            </td>
            <td>May 18, 2024</td>
            <td>2 months</td>
            <td><span class="status-badge status-pending">Pending</span></td>
            <td>
              <div class="progress-bar-wrapper">
                <div class="progress-bar">
                  <div class="progress-fill orange" style="width: 30%"></div>
                </div>
                <span class="progress-label">30%</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <button class="btn btn-sm btn-outline" onclick="viewApp('Marketing Internship','Bayview Group','Boston, MA','Pending','30%','2 months')">View</button>
                <button class="btn btn-sm btn-danger-outline" onclick="withdrawApp(this,'Bayview Group')">Withdraw</button>
              </div>
            </td>
          </tr>

          <!-- Row 4 -->
          <tr>
            <td>
              <div class="table-cell-title">Data Science Intern</div>
              <div class="table-cell-sub"><i class="fas fa-location-dot"></i> Boston, MA</div>
            </td>
            <td>
              <div class="company-cell">
                <div class="company-logo-sm" style="background: #8B5CF6;">DS</div>
                <span>DataSpark</span>
              </div>
            </td>
            <td>Apr 28, 2024</td>
            <td>4 months</td>
            <td><span class="status-badge status-rejected">Rejected</span></td>
            <td>
              <div class="progress-bar-wrapper">
                <div class="progress-bar">
                  <div class="progress-fill red" style="width: 100%"></div>
                </div>
                <span class="progress-label">100%</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <button class="btn btn-sm btn-outline" onclick="viewApp('Data Science Intern','DataSpark','Boston, MA','Rejected','100%','4 months')">View</button>
              </div>
            </td>
          </tr>

          <!-- Row 5 -->
          <tr>
            <td>
              <div class="table-cell-title">UI/UX Design Intern</div>
              <div class="table-cell-sub"><i class="fas fa-location-dot"></i> Seattle, WA</div>
            </td>
            <td>
              <div class="company-cell">
                <div class="company-logo-sm" style="background: #EC4899;">DH</div>
                <span>DesignHub</span>
              </div>
            </td>
            <td>Apr 20, 2024</td>
            <td>3 months</td>
            <td><span class="status-badge status-accepted">Accepted</span></td>
            <td>
              <div class="progress-bar-wrapper">
                <div class="progress-bar">
                  <div class="progress-fill green" style="width: 100%"></div>
                </div>
                <span class="progress-label">100%</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <button class="btn btn-sm btn-primary" onclick="viewApp('UI/UX Design Intern','DesignHub','Seattle, WA','Accepted','100%','3 months')">View</button>
              </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  // Tab switching
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const tab = this.getAttribute('data-tab');
        document.querySelectorAll('.data-table tbody tr').forEach(row => {
          if (tab === 'all') { row.style.display = ''; return; }
          const statusBadge = row.querySelector('.status-badge');
          if (statusBadge) {
            const statusText = statusBadge.textContent.toLowerCase();
            const match = (tab === 'pending' && statusText.includes('pending')) ||
              (tab === 'interview' && statusText.includes('interview')) ||
              (tab === 'accepted' && statusText.includes('accepted')) ||
              (tab === 'rejected' && statusText.includes('rejected'));
            row.style.display = match ? '' : 'none';
          }
        });
      });
    });
  });

  function showToast(msg, type) { if (window.showGlobalToast) showGlobalToast(msg, type); }

  function viewApp(title, company, location, status, progress, duration) {
    document.getElementById('appModalTitle').textContent = title;
    document.getElementById('appModalCompany').textContent = company;
    document.getElementById('appModalLocation').textContent = location;
    document.getElementById('appModalStatus').textContent = status;
    document.getElementById('appModalProgress').textContent = progress;
    document.getElementById('appModalDuration').textContent = duration;
    document.getElementById('appDetailModal').classList.add('open');
  }

  function withdrawApp(btn, company) {
    if (!confirm('Withdraw your application to ' + company + '? This cannot be undone.')) return;
    const row = btn.closest('tr');
    row.style.opacity = '0'; row.style.transition = 'opacity 0.3s';
    setTimeout(() => row.remove(), 300);
    showToast('Application to ' + company + ' withdrawn.', 'warning');
  }

  document.addEventListener('click', function(e) {
    if (e.target.id === 'appDetailModal') e.target.classList.remove('open');
  });
</script>

<!-- Application Detail Modal -->
<div id="appDetailModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:9990;align-items:center;justify-content:center;padding:20px;backdrop-filter:blur(4px);" class="" onclick="if(event.target===this)this.classList.remove('open')">
  <div style="background:var(--white);border-radius:20px;padding:32px;width:100%;max-width:460px;box-shadow:0 24px 64px rgba(0,0,0,.2);position:relative;animation:slideUpApp .25s cubic-bezier(.16,1,.3,1);">
    <button onclick="document.getElementById('appDetailModal').classList.remove('open')" style="position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;color:var(--gray-600);font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
    <div style="font-size:1.1rem;font-weight:800;color:var(--gray-900);margin-bottom:4px;" id="appModalTitle"></div>
    <div style="font-size:.85rem;color:var(--text-muted);margin-bottom:20px;" id="appModalCompany"></div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px;">
      <div style="background:var(--gray-50);border-radius:10px;padding:12px;"><div style="font-size:.7rem;color:var(--text-muted);font-weight:700;text-transform:uppercase;">Location</div><div style="font-size:.9rem;font-weight:600;color:var(--gray-800);margin-top:4px;" id="appModalLocation"></div></div>
      <div style="background:var(--gray-50);border-radius:10px;padding:12px;"><div style="font-size:.7rem;color:var(--text-muted);font-weight:700;text-transform:uppercase;">Status</div><div style="font-size:.9rem;font-weight:600;color:var(--gray-800);margin-top:4px;" id="appModalStatus"></div></div>
      <div style="background:var(--gray-50);border-radius:10px;padding:12px;"><div style="font-size:.7rem;color:var(--text-muted);font-weight:700;text-transform:uppercase;">Progress</div><div style="font-size:.9rem;font-weight:600;color:var(--gray-800);margin-top:4px;" id="appModalProgress"></div></div>
      <div style="background:var(--gray-50);border-radius:10px;padding:12px;"><div style="font-size:.7rem;color:var(--text-muted);font-weight:700;text-transform:uppercase;">Duration</div><div style="font-size:.9rem;font-weight:600;color:var(--gray-800);margin-top:4px;" id="appModalDuration"></div></div>
    </div>
    <button onclick="document.getElementById('appDetailModal').classList.remove('open')" style="width:100%;padding:12px;border-radius:10px;background:var(--primary);color:#fff;border:none;font-size:.88rem;font-weight:700;cursor:pointer;">Close</button>
  </div>
</div>
<style>
  #appDetailModal { display: flex !important; visibility: hidden; pointer-events: none; }
  #appDetailModal.open { visibility: visible; pointer-events: all; }
  @keyframes slideUpApp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:none; } }
</style>
</x-layouts::app>
