<x-layouts::student title="Internship Listings">
@php $slug = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp

<style>
/* ── Page Header ── */
.page-header-banner {
  background: var(--white);
  border-radius: 20px; padding: 28px 32px; margin-bottom: 28px;
  position: relative; overflow: hidden; color: var(--gray-900);
  box-shadow: 0 8px 24px -4px rgba(0,0,0,0.05);
  border: 1px solid var(--border);
}
.page-header-content { position: relative; z-index: 1; }
.page-header-content h1 { font-size: 1.55rem; font-weight: 800; margin: 0 0 6px; color: var(--gray-900); letter-spacing: -0.02em; }
.page-header-content p  { margin: 0; opacity: .85; font-size: .92rem; color: var(--gray-600); }

/* ── Filter Card ── */
.filter-card {
  background: var(--white); border-radius: 16px; padding: 20px 24px;
  box-shadow: var(--shadow-sm); border: 1px solid var(--border);
  margin-bottom: 24px; display: flex; gap: 16px; flex-wrap: wrap; align-items: center;
}
.filter-search-wrap {
  flex: 1; min-width: 220px; position: relative;
}
.filter-search-wrap i {
  position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
  color: var(--text-muted); font-size: .88rem; pointer-events: none;
}
.filter-search-wrap input {
  width: 100%; padding: 10px 14px 10px 40px; border: 1.5px solid var(--border);
  border-radius: 10px; font-size: .88rem; background: var(--gray-50); color: inherit;
  outline: none; transition: all .2s; box-sizing: border-box;
}
.filter-search-wrap input:focus { border-color: var(--primary); background: var(--white); box-shadow: 0 0 0 3px var(--primary-bg); }
.filter-selects { display: flex; gap: 10px; flex-wrap: wrap; }
.filter-select {
  padding: 10px 14px; border: 1.5px solid var(--border); border-radius: 10px;
  font-size: .85rem; background: var(--gray-50); color: inherit; outline: none;
  cursor: pointer; transition: all .2s; font-weight: 500;
}
.filter-select:focus { border-color: var(--primary); background: var(--white); }

/* ── Results + Sort Row ── */
.results-bar {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 20px; flex-wrap: wrap; gap: 10px;
}
.results-count { font-size: .88rem; color: var(--text-muted); font-weight: 500; }
.results-count strong { color: var(--gray-900); font-weight: 700; }
.sort-pills { display: flex; gap: 6px; }
.sort-pill {
  padding: 5px 14px; border-radius: 20px; font-size: .78rem; font-weight: 600;
  border: 1.5px solid var(--border); background: transparent; color: var(--gray-600);
  cursor: pointer; transition: all .2s;
}
.sort-pill.active, .sort-pill:hover { background: var(--primary-bg); color: var(--primary); border-color: var(--primary); }

/* ── Internship Grid ── */
.internship-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 20px; margin-bottom: 28px;
}
.internship-card {
  background: var(--white); border-radius: 18px; border: 1px solid var(--border);
  box-shadow: var(--shadow-sm); overflow: hidden; display: flex; flex-direction: column;
  transition: all .3s cubic-bezier(.4,0,.2,1); position: relative;
}
.internship-card:hover { box-shadow: var(--shadow); transform: translateY(-5px); border-color: var(--primary-light); }
.internship-card-top {
  padding: 20px 20px 16px; display: flex; align-items: flex-start; justify-content: space-between; gap: 12px;
}
.company-logo-lg {
  width: 48px; height: 48px; border-radius: 13px; display: flex; align-items: center;
  justify-content: center; font-weight: 800; font-size: 1.1rem; color: #fff; flex-shrink: 0;
  box-shadow: 0 4px 8px rgba(0,0,0,0.12);
}
.internship-bookmark-btn {
  width: 34px; height: 34px; border-radius: 8px; background: var(--gray-50);
  border: 1.5px solid var(--border); display: flex; align-items: center; justify-content: center;
  cursor: pointer; transition: all .2s; color: var(--gray-400); flex-shrink: 0;
}
.internship-bookmark-btn:hover, .internship-bookmark-btn.saved {
  background: var(--primary-bg); border-color: var(--primary); color: var(--primary);
}
.internship-card-body { padding: 0 20px 16px; flex: 1; }
.internship-title {
  font-size: 1rem; font-weight: 700; color: var(--gray-900); margin-bottom: 6px; line-height: 1.35;
}
.internship-company {
  font-size: .82rem; color: var(--gray-600); display: flex; align-items: center; gap: 6px;
  margin-bottom: 4px; font-weight: 600;
}
.internship-location {
  font-size: .8rem; color: var(--text-muted); display: flex; align-items: center; gap: 6px;
  margin-bottom: 14px;
}
.internship-desc {
  font-size: .8rem; color: var(--gray-600); line-height: 1.55; margin-bottom: 14px;
}
.internship-tags { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 14px; }
.itag {
  padding: 3px 10px; border-radius: 6px; font-size: .72rem; font-weight: 700;
}
.itag-blue   { background: var(--primary-bg); color: var(--primary); }
.itag-green  { background: var(--green-bg); color: var(--green); }
.itag-purple { background: rgba(139,92,246,.1); color: #8B5CF6; }
.itag-orange { background: var(--warning-bg); color: var(--warning); }
.itag-pink   { background: rgba(236,72,153,.1); color: #EC4899; }
.internship-stats-row {
  display: flex; gap: 14px; font-size: .75rem; color: var(--text-muted); margin-bottom: 14px;
}
.internship-stats-row span { display: flex; align-items: center; gap: 4px; font-weight: 500; }
.internship-card-footer {
  padding: 16px 20px; border-top: 1px solid var(--gray-100);
  display: flex; align-items: center; justify-content: space-between; gap: 10px;
}
.internship-deadline {
  font-size: .77rem; color: var(--text-muted); display: flex; align-items: center; gap: 5px; font-weight: 600;
}
.internship-deadline.urgent { color: var(--danger); }
.apply-btn {
  padding: 9px 20px; border-radius: 10px; background: var(--primary); color: #fff;
  border: none; font-size: .82rem; font-weight: 700; cursor: pointer;
  display: flex; align-items: center; gap: 7px; transition: all .2s; white-space: nowrap;
}
.apply-btn:hover { opacity: .92; transform: translateY(-1px); box-shadow: 0 4px 14px rgba(0,177,170,.3); }
.apply-btn.applied { background: var(--green-bg); color: var(--green); border: 1.5px solid var(--green); }
.view-btn {
  padding: 9px 14px; border-radius: 10px; background: var(--gray-50); color: var(--gray-700);
  border: 1.5px solid var(--border); font-size: .82rem; font-weight: 600; cursor: pointer;
  display: flex; align-items: center; gap: 6px; transition: all .2s;
}
.view-btn:hover { background: var(--gray-100); border-color: var(--gray-300); }

/* ── Featured badge ── */
.internship-featured-badge {
  position: absolute; top: 0; left: 0;
  background: var(--primary);
  color: #fff; font-size: .65rem; font-weight: 800; padding: 4px 12px;
  border-radius: 0 0 10px 0; letter-spacing: 0.06em; text-transform: uppercase;
}

/* ── Load More ── */
.load-more-wrapper { text-align: center; padding: 8px 0; }
.load-more-btn {
  padding: 12px 32px; border-radius: 12px; border: 2px solid var(--border);
  background: var(--white); color: var(--gray-700); font-size: .88rem; font-weight: 700;
  cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 8px;
}
.load-more-btn:hover { background: var(--gray-50); border-color: var(--primary); color: var(--primary); }

/* ── Modals ── */
.modal-overlay {
  display: flex; visibility: hidden; pointer-events: none;
  position: fixed; inset: 0; background: rgba(0,0,0,.5);
  z-index: 9990; align-items: center; justify-content: center;
  padding: 20px; backdrop-filter: blur(5px);
}
.modal-overlay.open { visibility: visible; pointer-events: all; animation: fadeInOv .2s ease; }
@keyframes fadeInOv { from { opacity: 0; } to { opacity: 1; } }
.modal-box {
  background: var(--white); border-radius: 22px; padding: 32px;
  width: 100%; max-width: 520px; box-shadow: 0 28px 70px rgba(0,0,0,.2);
  animation: slideUpMod .3s cubic-bezier(.16,1,.3,1); position: relative;
  max-height: 90vh; overflow-y: auto;
}
@keyframes slideUpMod { from { opacity: 0; transform: translateY(28px) scale(.97); } to { opacity: 1; transform: none; } }
.modal-close-btn {
  position: absolute; top: 16px; right: 16px; width: 34px; height: 34px;
  border-radius: 9px; background: var(--gray-100); border: none; cursor: pointer;
  color: var(--gray-600); font-size: 15px; display: flex; align-items: center; justify-content: center;
  transition: all .2s;
}
.modal-close-btn:hover { background: var(--danger-bg); color: var(--danger); }
.modal-company-logo {
  width: 54px; height: 54px; border-radius: 14px; display: flex; align-items: center;
  justify-content: center; font-size: 1.2rem; font-weight: 800; color: #fff; margin-bottom: 16px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.12);
}
.modal-title { font-size: 1.2rem; font-weight: 800; color: var(--gray-900); margin-bottom: 4px; }
.modal-subtitle { font-size: .85rem; color: var(--text-muted); margin-bottom: 20px; font-weight: 500; }
.modal-detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; }
.modal-detail-item { background: var(--gray-50); border-radius: 10px; padding: 12px; border: 1px solid var(--border); }
.modal-detail-label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: var(--text-muted); }
.modal-detail-value { font-size: .9rem; font-weight: 600; color: var(--gray-800); margin-top: 4px; }
.modal-section-title { font-size: .82rem; font-weight: 700; color: var(--gray-800); margin-bottom: 8px; }
.form-group { margin-bottom: 16px; }
.form-label { display: block; font-size: .78rem; font-weight: 700; color: var(--gray-700); margin-bottom: 7px; }
.form-textarea {
  width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: 10px;
  font-size: .87rem; background: var(--gray-50); color: inherit; outline: none;
  resize: vertical; font-family: inherit; box-sizing: border-box; transition: all .2s;
}
.form-textarea:focus { border-color: var(--primary); background: var(--white); box-shadow: 0 0 0 3px var(--primary-bg); }
.upload-zone {
  background: var(--gray-50); border: 2px dashed var(--border); border-radius: 12px;
  padding: 18px; text-align: center; cursor: pointer; transition: all .2s;
}
.upload-zone:hover { border-color: var(--primary); background: var(--primary-bg); }
.upload-zone i { color: var(--primary); font-size: 1.4rem; display: block; margin-bottom: 7px; }
.upload-zone span { font-size: .8rem; color: var(--text-muted); font-weight: 500; }
.modal-footer-btns { display: flex; gap: 10px; margin-top: 20px; }
.btn-submit {
  flex: 1; padding: 13px; border-radius: 11px; background: var(--primary); color: #fff;
  border: none; font-size: .9rem; font-weight: 700; cursor: pointer; transition: all .2s;
  display: flex; align-items: center; justify-content: center; gap: 8px;
}
.btn-submit:hover { opacity: .92; }
.btn-cancel {
  padding: 13px 20px; border-radius: 11px; background: var(--gray-100); color: var(--gray-700);
  border: none; font-size: .9rem; font-weight: 700; cursor: pointer; transition: all .2s;
}
.btn-cancel:hover { background: var(--gray-200); }

/* ── View Detail Modal ── */
.internship-description { font-size: .85rem; color: var(--gray-700); line-height: 1.6; margin-bottom: 18px; }
.requirement-list { list-style: none; padding: 0; margin: 0 0 18px; }
.requirement-list li {
  display: flex; align-items: flex-start; gap: 10px; padding: 6px 0;
  font-size: .83rem; color: var(--gray-700); border-bottom: 1px solid var(--gray-100);
}
.requirement-list li:last-child { border-bottom: none; }
.requirement-list li::before {
  content: ''; width: 7px; height: 7px; border-radius: 50%;
  background: var(--primary); flex-shrink: 0; margin-top: 6px;
}

/* ── Responsive ── */
@media (max-width: 1100px) { .internship-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px) {
  .internship-grid { grid-template-columns: 1fr; }
  .filter-card { flex-direction: column; }
  .filter-selects { width: 100%; }
  .filter-select { flex: 1; }
  .modal-detail-grid { grid-template-columns: 1fr; }
}
</style>

<!-- Page Header -->
<div class="page-header-banner">
  <div class="page-header-content">
    <h1><i class="fas fa-briefcase" style="margin-right:10px;"></i>Internship Listings</h1>
    <p>Discover top internship opportunities matched to your skills and goals</p>
  </div>
</div>

<!-- Filter Card -->
<div class="filter-card">
  <div class="filter-search-wrap">
    <i class="fas fa-search"></i>
    <input type="text" id="searchInput" placeholder="Search by title, company, or keyword..." oninput="filterListings()">
  </div>
  <div class="filter-selects">
    <select class="filter-select" id="filterLocation" onchange="filterListings()">
      <option value="">All Locations</option>
      @foreach($internships->map(fn($i) => trim(implode(', ', array_filter([$i->city, $i->country]))) ?: ($i->location ?? 'Remote'))->unique()->filter()->sort() as $loc)
        <option value="{{ $loc }}">{{ $loc }}</option>
      @endforeach
    </select>
    <select class="filter-select" id="filterField" onchange="filterListings()">
      <option value="">All Fields</option>
      @foreach($internships->pluck('field')->unique()->filter()->sort() as $field)
        <option value="{{ $field }}">{{ $field }}</option>
      @endforeach
    </select>
    <select class="filter-select" id="filterDuration" onchange="filterListings()">
      <option value="">Any Duration</option>
      @foreach($internships->pluck('duration')->unique()->filter()->sort() as $dur)
        <option value="{{ $dur }}">{{ $dur }}</option>
      @endforeach
    </select>
  </div>
</div>

<!-- Results Bar -->
<div class="results-bar">
  <div class="results-count">Showing <strong id="resultsCount">6</strong> internships</div>
  <div class="sort-pills">
    <button class="sort-pill active" data-sort="newest" onclick="setSortActive(this)">Newest</button>
    <button class="sort-pill" data-sort="applied" onclick="setSortActive(this)">Most Applied</button>
    <button class="sort-pill" data-sort="deadline" onclick="setSortActive(this)">Deadline Soon</button>
  </div>
</div>

<!-- Internship Cards -->
<div class="internship-grid" id="internshipGrid">

  @forelse($internships as $internship)
    @php
        $initial = substr($internship->company?->name ?? 'C', 0, 1);
        $color = ['#2563EB', '#F59E0B', '#8B5CF6', 'var(--primary)', '#EC4899', '#0EA5E9'][$loop->index % 6];
        $location = trim(implode(', ', array_filter([$internship->city, $internship->country])));
        $location = $location ?: ($internship->location ?? 'Remote');
        $skills = is_array($internship->skills_required) ? $internship->skills_required : [];
    @endphp
    <div class="internship-card" 
         data-text="{{ strtolower($internship->title . ' ' . $internship->company?->name . ' ' . $location . ' ' . $internship->field . ' ' . $internship->duration) }}"
         data-newest="{{ $internship->created_at ? $internship->created_at->timestamp : 0 }}"
         data-applied="{{ $internship->application_count ?? 0 }}"
         data-deadline="{{ $internship->deadline ? \Carbon\Carbon::parse($internship->deadline)->timestamp : 9999999999 }}">
      @if($internship->featured)
        <div class="internship-featured-badge">Featured</div>
      @endif
      <div class="internship-card-top">
        <div class="company-logo-lg" style="background:{{ $color }};">{{ $initial }}</div>
        <button class="internship-bookmark-btn" title="Save" onclick="toggleBookmark(this)"><i class="far fa-bookmark"></i></button>
      </div>
      <div class="internship-card-body">
        <div class="internship-title">{{ $internship->title }}</div>
        <div class="internship-company"><i class="fas fa-building"></i> {{ $internship->company?->name ?? 'Company' }}</div>
        <div class="internship-location"><i class="fas fa-location-dot"></i> {{ $location }}</div>
        <div class="internship-desc">{{ \Illuminate\Support\Str::limit($internship->description, 130) }}</div>
        <div class="internship-tags">
          <span class="itag itag-blue">{{ $internship->field }}</span>
          @if($internship->duration)
            <span class="itag itag-green">{{ $internship->duration }}</span>
          @endif
          @foreach(array_slice($skills, 0, 2) as $skill)
            <span class="itag itag-purple">{{ $skill }}</span>
          @endforeach
        </div>
        <div class="internship-stats-row">
          <span><i class="fas fa-users"></i> {{ $internship->application_count ?? rand(5, 50) }} applicants</span>
          @if($internship->is_paid)
            <span><i class="fas fa-dollar-sign"></i> {{ $internship->salary ?? 'Paid' }}</span>
          @endif
        </div>
      </div>
      <div class="internship-card-footer">
        @php
            $isUrgent = $internship->deadline && (\Carbon\Carbon::parse($internship->deadline)->isPast() || \Carbon\Carbon::parse($internship->deadline)->diffInDays(now()) < 7);
        @endphp
        <div class="internship-deadline {{ $isUrgent ? 'urgent' : '' }}">
          <i class="fas fa-{{ $isUrgent ? 'clock' : 'calendar-alt' }}"></i> Deadline: {{ $internship->deadline ? \Carbon\Carbon::parse($internship->deadline)->format('M d') : 'N/A' }}
        </div>
        <div style="display:flex;gap:8px;">
          <button class="view-btn" onclick="openViewModal('{{ addslashes($internship->title) }}','{{ addslashes($internship->company?->name ?? '') }}','{{ addslashes($location) }}','{{ addslashes($internship->duration ?? 'N/A') }}','{{ $internship->is_paid ? addslashes($internship->salary ?? 'Paid') : 'Unpaid' }}','{{ addslashes(implode(', ', $skills)) }}','{{ addslashes(preg_replace('/\s+/', ' ', $internship->description)) }}')"><i class="fas fa-eye"></i></button>
          <button class="apply-btn" onclick="openApplyModal('{{ addslashes($internship->title) }}','{{ addslashes($internship->company?->name ?? '') }}','{{ $color }}','{{ $initial }}')"><i class="fas fa-paper-plane"></i> Apply Now</button>
        </div>
      </div>
    </div>
  @empty
    <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--gray-500);">
        <i class="fas fa-folder-open" style="font-size: 3rem; margin-bottom: 10px; color: var(--gray-300);"></i>
        <p>No internships available at the moment.</p>
    </div>
  @endforelse

</div><!-- /.internship-grid -->

<!-- Load More -->
<div class="load-more-wrapper">
  <button class="load-more-btn" id="loadMoreBtn" onclick="loadMore()">
    <i class="fas fa-rotate"></i> Load More Internships
  </button>
</div>

<template id="listingModals">

<!-- ── Apply Now Modal ── -->
<div id="applyModal" class="modal-overlay" onclick="if(event.target===this)closeApplyModal()">
  <div class="modal-box">
    <button class="modal-close-btn" onclick="closeApplyModal()"><i class="fas fa-xmark"></i></button>
    <div class="modal-company-logo" id="applyModalLogo"></div>
    <div class="modal-title" id="applyModalTitle">Apply for Position</div>
    <div class="modal-subtitle" id="applyModalCompany"></div>
    <div class="form-group">
      <label class="form-label">Cover Letter <span style="color:var(--text-muted);font-weight:400;">(optional)</span></label>
      <textarea class="form-textarea" id="applyCoverLetter" rows="4" placeholder="Tell the company why you'd be a great fit for this role..."></textarea>
    </div>
    <div class="form-group">
      <label class="form-label">Resume / CV</label>
      <div class="upload-zone" onclick="document.getElementById('resumeInput').click()">
        <i class="fas fa-file-arrow-up"></i>
        <span id="resumeLabel">Click to attach your resume (PDF, DOC)</span>
      </div>
      <input type="file" id="resumeInput" accept=".pdf,.doc,.docx" style="display:none;" onchange="document.getElementById('resumeLabel').textContent=this.files[0]?.name||'No file selected'">
    </div>
    <div class="modal-footer-btns">
      <button class="btn-cancel" onclick="closeApplyModal()">Cancel</button>
      <button class="btn-submit" id="submitAppBtn" onclick="submitApplication()">
        <i class="fas fa-paper-plane"></i> Submit Application
      </button>
    </div>
  </div>
</div>

<!-- ── View Detail Modal ── -->
<div id="viewModal" class="modal-overlay" onclick="if(event.target===this)closeViewModal()">
  <div class="modal-box" style="max-width:560px;">
    <button class="modal-close-btn" onclick="closeViewModal()"><i class="fas fa-xmark"></i></button>
    <div class="modal-company-logo" id="viewModalLogo" style="background:#2563EB;">T</div>
    <div class="modal-title" id="viewModalTitle">Position Title</div>
    <div class="modal-subtitle" id="viewModalCompany"></div>
    <div class="modal-detail-grid" id="viewModalGrid"></div>
    <div>
      <div class="modal-section-title">About this Role</div>
      <div class="internship-description" id="viewModalDesc"></div>
    </div>
    <div>
      <div class="modal-section-title">Requirements</div>
      <ul class="requirement-list">
        <li>Currently enrolled in a relevant university degree program</li>
        <li>Strong analytical and communication skills</li>
        <li>Ability to work both independently and as part of a team</li>
        <li>Proficiency in relevant tools specific to the role</li>
      </ul>
    </div>
    <div class="modal-footer-btns">
      <button class="btn-cancel" onclick="closeViewModal()">Close</button>
      <button class="btn-submit" id="viewModalApplyBtn" onclick="closeViewModal()">
        <i class="fas fa-paper-plane"></i> Apply Now
      </button>
    </div>
  </div>
</div>

</template>

<script>
/* Teleport modals to <body> to escape CSS transform stacking context */
(function() {
  var tpl = document.getElementById('listingModals');
  if (tpl) document.body.appendChild(tpl.content.cloneNode(true));
})();

let currentApplyTitle = '';
let currentApplyCompany = '';
/* ── Apply Modal ── */
function openApplyModal(title, company, color, initial) {
  currentApplyTitle = title;
  currentApplyCompany = company;
  document.getElementById('applyModalTitle').textContent = title;
  document.getElementById('applyModalCompany').textContent = company;
  const logo = document.getElementById('applyModalLogo');
  logo.textContent = initial;
  logo.style.background = color;
  document.getElementById('applyCoverLetter').value = '';
  document.getElementById('resumeLabel').textContent = 'Click to attach your resume (PDF, DOC)';
  const btn = document.getElementById('submitAppBtn');
  btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Application';
  btn.disabled = false;
  document.getElementById('applyModal').classList.add('open');
}
function closeApplyModal() { document.getElementById('applyModal').classList.remove('open'); }

function submitApplication() {
  const btn = document.getElementById('submitAppBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
  btn.disabled = true;
  setTimeout(() => {
    closeApplyModal();
    showToast('Application submitted for ' + currentApplyTitle, 'success');
    btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Application';
    btn.disabled = false;
  }, 1400);
}

/* ── View Modal ── */
function openViewModal(title, company, location, duration, salary, skills, desc) {
  document.getElementById('viewModalTitle').textContent = title;
  document.getElementById('viewModalCompany').textContent = company + ' · ' + location;
  document.getElementById('viewModalDesc').textContent = desc;
  document.getElementById('viewModalGrid').innerHTML = `
    <div class="modal-detail-item"><div class="modal-detail-label">Location</div><div class="modal-detail-value">${location}</div></div>
    <div class="modal-detail-item"><div class="modal-detail-label">Duration</div><div class="modal-detail-value">${duration}</div></div>
    <div class="modal-detail-item"><div class="modal-detail-label">Stipend</div><div class="modal-detail-value">${salary}</div></div>
    <div class="modal-detail-item"><div class="modal-detail-label">Skills</div><div class="modal-detail-value">${skills}</div></div>
  `;
  document.getElementById('viewModalApplyBtn').onclick = () => { closeViewModal(); openApplyModal(title, company, '#2563EB', company[0]); };
  document.getElementById('viewModal').classList.add('open');
}
function closeViewModal() { document.getElementById('viewModal').classList.remove('open'); }

/* ── Bookmark Toggle ── */
function toggleBookmark(btn) {
  btn.classList.toggle('saved');
  const icon = btn.querySelector('i');
  const isSaved = btn.classList.contains('saved');
  icon.className = isSaved ? 'fas fa-bookmark' : 'far fa-bookmark';
  showToast(isSaved ? 'Saved to your list' : 'Removed from saved internships', isSaved ? 'success' : 'info');
}

/* ── Sort Pills ── */
function setSortActive(el) {
  document.querySelectorAll('.sort-pill').forEach(p => p.classList.remove('active'));
  el.classList.add('active');
  sortListings(el.dataset.sort);
}

function sortListings(sortType) {
  const grid = document.getElementById('internshipGrid');
  const cards = Array.from(grid.querySelectorAll('.internship-card'));
  
  cards.sort((a, b) => {
    if (sortType === 'newest') {
      return parseInt(b.dataset.newest) - parseInt(a.dataset.newest);
    } else if (sortType === 'applied') {
      return parseInt(b.dataset.applied) - parseInt(a.dataset.applied);
    } else if (sortType === 'deadline') {
      return parseInt(a.dataset.deadline) - parseInt(b.dataset.deadline);
    }
    return 0;
  });
  
  cards.forEach(card => grid.appendChild(card));
}

// Initial sort on load
document.addEventListener('DOMContentLoaded', () => {
  sortListings('newest');
});

/* ── Search + Filter ── */
function filterListings() {
  const q = document.getElementById('searchInput').value.toLowerCase();
  const loc = document.getElementById('filterLocation').value.toLowerCase();
  const field = document.getElementById('filterField').value.toLowerCase();
  const dur = document.getElementById('filterDuration').value.toLowerCase();
  let visible = 0;
  document.querySelectorAll('.internship-card').forEach(card => {
    const text = (card.dataset.text || card.textContent).toLowerCase();
    const show = (!q || text.includes(q)) &&
                 (!loc || text.includes(loc)) &&
                 (!field || text.includes(field)) &&
                 (!dur || text.includes(dur));
    card.style.display = show ? '' : 'none';
    if (show) visible++;
  });
  document.getElementById('resultsCount').textContent = visible;
}

/* ── Load More ── */
function loadMore() {
  const btn = document.getElementById('loadMoreBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
  btn.disabled = true;
  setTimeout(() => {
    btn.innerHTML = '<i class="fas fa-circle-check"></i> All listings loaded';
    showToast('All available internships are now showing', 'info');
  }, 1400);
}

function showToast(msg, type) { if (window.showGlobalToast) showGlobalToast(msg, type); }
</script>
</x-layouts::student>
