<x-layouts::app :title="__('Internship Listings')">
<!-- Filter Bar -->
<div class="filter-bar card">
  <div class="filter-search">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search internships..." />
  </div>
  <div class="filter-controls">
    <select>
      <option value="">All Locations</option>
      <option>San Francisco, CA</option>
      <option>New York, NY</option>
      <option>Boston, MA</option>
      <option>Chicago, IL</option>
      <option>Seattle, WA</option>
      <option>Miami, FL</option>
    </select>
    <select>
      <option value="">All Fields</option>
      <option>Software</option>
      <option>Marketing</option>
      <option>Data Science</option>
      <option>Product</option>
      <option>Design</option>
      <option>Finance</option>
    </select>
    <select>
      <option value="">Any Duration</option>
      <option>2 months</option>
      <option>3 months</option>
      <option>4 months</option>
    </select>
  </div>
</div>

<!-- Results Count -->
<div class="results-info">
  <span>Showing <strong>6</strong> internships</span>
</div>

<!-- Internship Grid -->
<div class="internship-grid">

  <!-- Card 1 -->
  <div class="internship-card">
    <div class="internship-card-header">
      <div class="company-logo-lg" style="background: #2563EB;">T</div>
      <div class="internship-bookmark"><i class="far fa-bookmark"></i></div>
    </div>
    <div class="internship-card-body">
      <div class="internship-title">Software Development Internship</div>
      <div class="internship-company"><i class="fas fa-building"></i> TechSolutions</div>
      <div class="internship-location"><i class="fas fa-location-dot"></i> San Francisco, CA</div>
      <div class="internship-tags">
        <span class="tag tag-blue">Software</span>
        <span class="tag tag-green">3 months</span>
      </div>
    </div>
    <div class="internship-card-footer">
      <div class="internship-deadline"><i class="fas fa-calendar-alt"></i> Deadline: Jun 30</div>
      <button class="btn btn-sm btn-primary">Apply Now</button>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="internship-card">
    <div class="internship-card-header">
      <div class="company-logo-lg" style="background: #F59E0B;">M</div>
      <div class="internship-bookmark"><i class="far fa-bookmark"></i></div>
    </div>
    <div class="internship-card-body">
      <div class="internship-title">Marketing Coordinator</div>
      <div class="internship-company"><i class="fas fa-building"></i> MediaCorp</div>
      <div class="internship-location"><i class="fas fa-location-dot"></i> New York, NY</div>
      <div class="internship-tags">
        <span class="tag tag-blue">Marketing</span>
        <span class="tag tag-green">2 months</span>
      </div>
    </div>
    <div class="internship-card-footer">
      <div class="internship-deadline"><i class="fas fa-calendar-alt"></i> Deadline: Jul 15</div>
      <button class="btn btn-sm btn-primary">Apply Now</button>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="internship-card">
    <div class="internship-card-header">
      <div class="company-logo-lg" style="background: #8B5CF6;">D</div>
      <div class="internship-bookmark"><i class="far fa-bookmark"></i></div>
    </div>
    <div class="internship-card-body">
      <div class="internship-title">Data Science Intern</div>
      <div class="internship-company"><i class="fas fa-building"></i> DataSpark</div>
      <div class="internship-location"><i class="fas fa-location-dot"></i> Boston, MA</div>
      <div class="internship-tags">
        <span class="tag tag-blue">Data</span>
        <span class="tag tag-green">4 months</span>
      </div>
    </div>
    <div class="internship-card-footer">
      <div class="internship-deadline"><i class="fas fa-calendar-alt"></i> Deadline: Jul 1</div>
      <button class="btn btn-sm btn-primary">Apply Now</button>
    </div>
  </div>

  <!-- Card 4 -->
  <div class="internship-card">
    <div class="internship-card-header">
      <div class="company-logo-lg" style="background: var(--primary);">G</div>
      <div class="internship-bookmark"><i class="far fa-bookmark"></i></div>
    </div>
    <div class="internship-card-body">
      <div class="internship-title">Product Management Intern</div>
      <div class="internship-company"><i class="fas fa-building"></i> GrowthCo</div>
      <div class="internship-location"><i class="fas fa-location-dot"></i> Chicago, IL</div>
      <div class="internship-tags">
        <span class="tag tag-blue">Product</span>
        <span class="tag tag-green">3 months</span>
      </div>
    </div>
    <div class="internship-card-footer">
      <div class="internship-deadline"><i class="fas fa-calendar-alt"></i> Deadline: Aug 1</div>
      <button class="btn btn-sm btn-primary">Apply Now</button>
    </div>
  </div>

  <!-- Card 5 -->
  <div class="internship-card">
    <div class="internship-card-header">
      <div class="company-logo-lg" style="background: #EC4899;">D</div>
      <div class="internship-bookmark"><i class="far fa-bookmark"></i></div>
    </div>
    <div class="internship-card-body">
      <div class="internship-title">UI/UX Design Intern</div>
      <div class="internship-company"><i class="fas fa-building"></i> DesignHub</div>
      <div class="internship-location"><i class="fas fa-location-dot"></i> Seattle, WA</div>
      <div class="internship-tags">
        <span class="tag tag-blue">Design</span>
        <span class="tag tag-green">3 months</span>
      </div>
    </div>
    <div class="internship-card-footer">
      <div class="internship-deadline"><i class="fas fa-calendar-alt"></i> Deadline: Jul 20</div>
      <button class="btn btn-sm btn-primary">Apply Now</button>
    </div>
  </div>

  <!-- Card 6 -->
  <div class="internship-card">
    <div class="internship-card-header">
      <div class="company-logo-lg" style="background: #0EA5E9;">F</div>
      <div class="internship-bookmark"><i class="far fa-bookmark"></i></div>
    </div>
    <div class="internship-card-body">
      <div class="internship-title">Financial Analyst Intern</div>
      <div class="internship-company"><i class="fas fa-building"></i> FinGroup</div>
      <div class="internship-location"><i class="fas fa-location-dot"></i> Miami, FL</div>
      <div class="internship-tags">
        <span class="tag tag-blue">Finance</span>
        <span class="tag tag-green">2 months</span>
      </div>
    </div>
    <div class="internship-card-footer">
      <div class="internship-deadline"><i class="fas fa-calendar-alt"></i> Deadline: Jun 25</div>
      <button class="btn btn-sm btn-primary">Apply Now</button>
    </div>
  </div>

</div><!-- /.internship-grid -->

<!-- Load More -->
<div class="load-more-wrapper">
  <button class="btn btn-outline" id="loadMoreBtn" onclick="loadMore(this)"><i class="fas fa-rotate"></i> Load More</button>
</div>

<!-- Apply Modal -->
<div id="applyModal" style="display:flex;visibility:hidden;pointer-events:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:9990;align-items:center;justify-content:center;padding:20px;backdrop-filter:blur(4px);" onclick="if(event.target===this)closeApplyModal()">
  <div style="background:var(--white);border-radius:20px;padding:32px;width:100%;max-width:480px;box-shadow:0 24px 64px rgba(0,0,0,.2);position:relative;animation:slideUpApp .25s cubic-bezier(.16,1,.3,1);">
    <button onclick="closeApplyModal()" style="position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;color:var(--gray-600);font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
    <div style="font-size:1.15rem;font-weight:800;color:var(--gray-900);margin-bottom:4px;" id="applyModalTitle"></div>
    <div style="font-size:.85rem;color:var(--text-muted);margin-bottom:22px;" id="applyModalCompany"></div>
    <div style="margin-bottom:14px;">
      <label style="display:block;font-size:.78rem;font-weight:700;color:var(--gray-700);margin-bottom:6px;">Cover Letter (optional)</label>
      <textarea id="applyCoverLetter" style="width:100%;padding:10px 14px;border:1.5px solid var(--border);border-radius:9px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;resize:vertical;font-family:inherit;box-sizing:border-box;" rows="4" placeholder="Tell the company why you'd be a great fit..."></textarea>
    </div>
    <div style="margin-bottom:20px;">
      <label style="display:block;font-size:.78rem;font-weight:700;color:var(--gray-700);margin-bottom:6px;">Attach Resume</label>
      <div style="background:var(--gray-50);border:2px dashed var(--border);border-radius:10px;padding:16px;text-align:center;cursor:pointer;" onclick="document.getElementById('resumeInput').click()">
        <i class="fas fa-upload" style="color:var(--primary);font-size:1.2rem;margin-bottom:6px;"></i>
        <div style="font-size:.82rem;color:var(--text-muted);" id="resumeLabel">Click to select your resume (PDF)</div>
      </div>
      <input type="file" id="resumeInput" accept=".pdf" style="display:none;" onchange="document.getElementById('resumeLabel').textContent=this.files[0]?.name||'No file selected'">
    </div>
    <button onclick="submitApplication()" style="width:100%;padding:13px;border-radius:10px;background:var(--primary);color:#fff;border:none;font-size:.88rem;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:all .2s;" id="submitAppBtn">
      <i class="fas fa-paper-plane"></i> Submit Application
    </button>
  </div>
</div>

<style>
  #applyModal.open { visibility: visible; pointer-events: all; }
  @keyframes slideUpApp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:none; } }
</style>

<script>
  let currentApplyTarget = '';

  /* ----- Bookmark ----- */
  document.querySelectorAll('.internship-bookmark').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      const icon = this.querySelector('i');
      const saved = icon.classList.contains('fas');
      if (saved) { icon.classList.replace('fas', 'far'); showToast('Removed from saved internships', 'info'); }
      else { icon.classList.replace('far', 'fas'); showToast('Saved to your list', 'success'); }
    });
  });

  /* ----- Apply Now ----- */
  document.querySelectorAll('.internship-card-footer .btn-primary').forEach(function(btn) {
    btn.addEventListener('click', function() {
      const card = this.closest('.internship-card');
      const title = card.querySelector('.internship-title').textContent;
      const company = card.querySelector('.internship-company').textContent.trim();
      openApplyModal(title, company);
    });
  });

  function openApplyModal(title, company) {
    currentApplyTarget = title;
    document.getElementById('applyModalTitle').textContent = title;
    document.getElementById('applyModalCompany').textContent = company;
    document.getElementById('applyCoverLetter').value = '';
    document.getElementById('resumeLabel').textContent = 'Click to select your resume (PDF)';
    document.getElementById('applyModal').classList.add('open');
  }

  function closeApplyModal() { document.getElementById('applyModal').classList.remove('open'); }

  function submitApplication() {
    const btn = document.getElementById('submitAppBtn');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...'; btn.disabled = true;
    setTimeout(function() {
      closeApplyModal();
      showToast('Application submitted for ' + currentApplyTarget, 'success');
      btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Application'; btn.disabled = false;
    }, 1400);
  }

  /* ----- Search / Filter ----- */
  var searchInput = document.querySelector('.filter-search input');
  if (searchInput) {
    searchInput.addEventListener('input', filterListings);
  }
  document.querySelectorAll('.filter-controls select').forEach(function(sel) {
    sel.addEventListener('change', filterListings);
  });

  function filterListings() {
    var q = (searchInput ? searchInput.value : '').toLowerCase();
    var visible = 0;
    document.querySelectorAll('.internship-card').forEach(function(card) {
      var text = card.textContent.toLowerCase();
      var show = !q || text.includes(q);
      card.style.display = show ? '' : 'none';
      if (show) visible++;
    });
    var info = document.querySelector('.results-info span');
    if (info) info.innerHTML = 'Showing <strong>' + visible + '</strong> internships';
  }

  /* ----- Load More ----- */
  function loadMore(btn) {
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...'; btn.disabled = true;
    setTimeout(function() { btn.innerHTML = '<i class="fas fa-check"></i> All listings loaded'; }, 1500);
    showToast('All available internships are now showing', 'info');
  }

  function showToast(msg, type) { if (window.showGlobalToast) showGlobalToast(msg, type); }
</script>
</x-layouts::app>
