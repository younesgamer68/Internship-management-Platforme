<x-layouts::student title="My Profile">
@php $slug = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp

<style>
/* ─── Profile Hero ─── */
.profile-hero {
  background: var(--white); border-radius: 20px;
  border: 1px solid var(--border); box-shadow: var(--shadow-sm);
  overflow: hidden; margin-bottom: 24px;
}
.profile-cover {
  height: 130px;
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, #4f46e5 100%);
  position: relative;
}
.profile-cover-pattern {
  position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='0.06'%3E%3Cpath d='M30 0l30 30-30 30L0 30z'/%3E%3C/g%3E%3C/svg%3E");
}
.profile-hero-body { padding: 0 28px 24px; display: flex; align-items: flex-end; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-top: -50px; }
.profile-avatar {
  width: 100px; height: 100px; border-radius: 50%;
  border: 4px solid var(--white); background: var(--primary); color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-size: 2rem; font-weight: 800; box-shadow: 0 4px 16px rgba(0,0,0,0.14);
  flex-shrink: 0; position: relative;
}
.profile-avatar-upload {
  position: absolute; bottom: 0; right: 0; width: 28px; height: 28px;
  background: var(--primary); border: 2px solid var(--white); border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.65rem; color: #fff; cursor: pointer; transition: opacity 0.2s;
}
.profile-avatar-upload:hover { opacity: 0.85; }
.profile-identity { flex: 1; padding-top: 58px; min-width: 200px; }
.profile-identity h2 { font-size: 1.45rem; font-weight: 800; margin: 0 0 4px; color: var(--gray-900); letter-spacing: -0.02em; }
.profile-identity p { margin: 0 0 12px; color: var(--text-muted); font-size: .9rem; font-weight: 500; }
.profile-tags { display: flex; gap: 8px; flex-wrap: wrap; }
.ptag {
  display: inline-flex; align-items: center; gap: 5px; padding: 3px 10px;
  border-radius: 6px; font-size: .75rem; font-weight: 700;
}
.ptag-blue   { background: var(--primary-bg); color: var(--primary); }
.ptag-green  { background: var(--green-bg); color: var(--green); }
.ptag-purple { background: rgba(139,92,246,.1); color: #8B5CF6; }
.profile-actions { display: flex; gap: 10px; padding-top: 58px; flex-shrink: 0; flex-wrap: wrap; align-items: flex-start; }
.btn-edit-profile {
  padding: 9px 18px; border-radius: 10px; border: 1.5px solid var(--border);
  background: var(--white); color: var(--gray-700); font-size: .85rem; font-weight: 600;
  cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 7px;
}
.btn-edit-profile:hover { background: var(--gray-50); border-color: var(--gray-300); }
.btn-change-pass {
  padding: 9px 18px; border-radius: 10px; border: 1.5px solid var(--primary);
  background: var(--primary-bg); color: var(--primary); font-size: .85rem; font-weight: 600;
  cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 7px;
}
.btn-change-pass:hover { background: var(--primary); color: #fff; }

/* ─── Two-col layout ─── */
.profile-grid { display: grid; grid-template-columns: 1fr 320px; gap: 22px; }

/* ─── Cards ─── */
.p-card {
  background: var(--white); border-radius: 16px; border: 1px solid var(--border);
  box-shadow: var(--shadow-sm); overflow: hidden; margin-bottom: 22px; transition: box-shadow .2s;
}
.p-card:hover { box-shadow: var(--shadow); }
.p-card:last-child { margin-bottom: 0; }
.p-card-header {
  display: flex; align-items: center; justify-content: space-between;
  padding: 18px 22px 14px; border-bottom: 1px solid var(--gray-100);
}
.p-card-title { font-size: .95rem; font-weight: 700; color: var(--gray-900); display: flex; align-items: center; gap: 8px; margin: 0; }
.p-card-title i { color: var(--primary); }
.p-card-body { padding: 18px 22px; }
.btn-edit-section {
  padding: 6px 14px; border-radius: 8px; border: 1.5px solid var(--border);
  background: transparent; color: var(--gray-600); font-size: .78rem; font-weight: 600;
  cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 5px;
}
.btn-edit-section:hover { background: var(--primary-bg); border-color: var(--primary); color: var(--primary); }

/* ─── Info grid ─── */
.info-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.info-field {}
.info-label { font-size: .75rem; color: var(--text-muted); font-weight: 600; margin-bottom: 4px; text-transform: uppercase; letter-spacing: .04em; }
.info-value { font-size: .9rem; font-weight: 600; color: var(--gray-800); }

/* ─── Skill tags ─── */
.skill-tags-wrap { display: flex; gap: 8px; flex-wrap: wrap; }
.skill-tag {
  padding: 5px 12px; border-radius: 8px; background: var(--primary-bg);
  color: var(--primary); font-size: .78rem; font-weight: 700;
  display: inline-flex; align-items: center; gap: 5px;
}
.skill-tag .remove-skill {
  cursor: pointer; opacity: .6; font-size: .68rem; margin-left: 2px;
  transition: opacity .15s; border: none; background: none; color: inherit; padding: 0;
}
.skill-tag .remove-skill:hover { opacity: 1; }

/* ─── Language list ─── */
.lang-item { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--gray-100); }
.lang-item:last-child { border-bottom: none; }
.lang-left { display: flex; align-items: center; gap: 10px; }
.lang-icon { width: 30px; height: 30px; border-radius: 50%; background: var(--gray-100); color: var(--gray-500); display: flex; align-items: center; justify-content: center; font-size: .8rem; }
.lang-name { font-weight: 600; font-size: .88rem; color: var(--gray-800); }
.lang-badge { padding: 3px 10px; border-radius: 20px; font-size: .72rem; font-weight: 700; }
.lang-fluent  { background: var(--green-bg); color: var(--green); }
.lang-native  { background: var(--primary-bg); color: var(--primary); }
.lang-basic   { background: var(--gray-100); color: var(--gray-600); }

/* ─── Social links ─── */
.social-item { display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid var(--gray-100); }
.social-item:last-child { border-bottom: none; }
.social-icon-wrap { width: 36px; height: 36px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
.social-icon-wrap.linkedin { background: rgba(0,119,181,.1); color: #0077b5; }
.social-icon-wrap.github   { background: rgba(36,41,47,.1); color: #24292f; }
.social-icon-wrap.twitter  { background: rgba(29,155,240,.1); color: #1d9bf0; }
.social-info { flex: 1; min-width: 0; }
.social-platform { font-size: .72rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: .04em; }
.social-link { font-size: .85rem; color: var(--primary); font-weight: 600; text-decoration: none; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; }
.social-link:hover { text-decoration: underline; }
.social-link.empty { color: var(--gray-400); font-style: italic; font-weight: 400; }
.social-edit-btn { width: 28px; height: 28px; border-radius: 7px; border: 1.5px solid var(--border); background: transparent; color: var(--gray-400); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: .72rem; transition: all .2s; flex-shrink: 0; }
.social-edit-btn:hover { background: var(--primary-bg); border-color: var(--primary); color: var(--primary); }

/* ─── Completion meter ─── */
.completion-bar-wrap { background: var(--gray-100); border-radius: 20px; height: 8px; overflow: hidden; margin-top: 8px; }
.completion-bar { height: 100%; border-radius: 20px; background: linear-gradient(90deg, var(--primary), var(--primary-light)); transition: width 1s ease; }

/* ─── Modal shared ─── */
.modal-overlay {
  display: flex; visibility: hidden; pointer-events: none;
  position: fixed; inset: 0; background: rgba(0,0,0,.48);
  z-index: 9990; align-items: center; justify-content: center; padding: 20px;
  backdrop-filter: blur(5px);
}
.modal-overlay.open { visibility: visible; pointer-events: all; animation: fadeInOv .2s ease; }
@keyframes fadeInOv { from { opacity: 0; } to { opacity: 1; } }
.modal-box {
  background: var(--white); border-radius: 22px; padding: 32px;
  width: 100%; max-width: 480px; box-shadow: 0 28px 70px rgba(0,0,0,.2);
  animation: slideUpM .28s cubic-bezier(.16,1,.3,1); position: relative;
  max-height: 90vh; overflow-y: auto;
}
@keyframes slideUpM { from { opacity: 0; transform: translateY(26px) scale(.97); } to { opacity: 1; transform: none; } }
.modal-close {
  position: absolute; top: 16px; right: 16px; width: 34px; height: 34px;
  border-radius: 9px; background: var(--gray-100); border: none; cursor: pointer;
  color: var(--gray-600); font-size: 15px; display: flex; align-items: center; justify-content: center;
  transition: all .2s;
}
.modal-close:hover { background: var(--danger-bg); color: var(--danger); }
.modal-head { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
.modal-icon { width: 40px; height: 40px; border-radius: 10px; background: var(--primary-bg); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
.modal-head-title { font-size: 1.15rem; font-weight: 800; color: var(--gray-900); }
.modal-head-sub { font-size: .8rem; color: var(--text-muted); margin-top: 2px; }
.form-group { margin-bottom: 16px; }
.form-label { display: block; font-size: .78rem; font-weight: 700; color: var(--gray-700); margin-bottom: 7px; }
.form-input, .form-select, .form-textarea {
  width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: 10px;
  font-size: .87rem; background: var(--gray-50); color: inherit; outline: none;
  transition: all .2s; box-sizing: border-box; font-family: inherit;
}
.form-input:focus, .form-select:focus, .form-textarea:focus {
  border-color: var(--primary); background: var(--white); box-shadow: 0 0 0 3px var(--primary-bg);
}
.form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.modal-footer { display: flex; gap: 10px; margin-top: 22px; }
.btn-modal-cancel { flex: 0 0 auto; padding: 12px 20px; border-radius: 11px; background: var(--gray-100); color: var(--gray-700); border: none; font-size: .88rem; font-weight: 700; cursor: pointer; transition: background .2s; }
.btn-modal-cancel:hover { background: var(--gray-200); }
.btn-modal-save { flex: 1; padding: 12px; border-radius: 11px; background: var(--primary); color: #fff; border: none; font-size: .88rem; font-weight: 700; cursor: pointer; transition: opacity .2s; display: flex; align-items: center; justify-content: center; gap: 8px; }
.btn-modal-save:hover { opacity: .92; }
.social-input-row { display: flex; align-items: center; gap: 10px; }
.social-input-icon { width: 38px; height: 38px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }

/* ─── Responsive ─── */
@media (max-width: 1100px) { .profile-grid { grid-template-columns: 1fr; } }
@media (max-width: 640px) {
  .profile-hero-body { flex-direction: column; align-items: flex-start; }
  .profile-actions { padding-top: 0; }
  .info-grid-2 { grid-template-columns: 1fr; }
  .form-grid-2 { grid-template-columns: 1fr; }
}
</style>

<!-- ─── Profile Hero ─── -->
<div class="profile-hero">
  <div class="profile-cover"><div class="profile-cover-pattern"></div></div>
  <div class="profile-hero-body">
    <div class="profile-avatar">
      @if(auth()->user()->avatar)
        <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">
      @else
        {{ auth()->user()->initials() }}
      @endif
      <div class="profile-avatar-upload" onclick="showToast('Photo upload coming soon','info')" title="Change photo">
        <i class="fas fa-camera"></i>
      </div>
    </div>
    <div class="profile-identity">
      <h2 id="displayName">{{ auth()->user()->name }}</h2>
      <p id="displayHeadline">Computer Science Student</p>
      <div class="profile-tags">
        <span class="ptag ptag-blue"><i class="fas fa-university"></i> <span id="displayUniversity">Epoka University</span></span>
        <span class="ptag ptag-blue"><span id="displayYear">3rd Year</span></span>
        <span class="ptag ptag-green"><i class="fas fa-star"></i> GPA <span id="displayGpa">3.8</span></span>
      </div>
    </div>
    <div class="profile-actions">
      <button class="btn-edit-profile" onclick="openEditModal('profile')"><i class="fas fa-pen"></i> Edit Profile</button>
      <button class="btn-change-pass" onclick="openPasswordModal()"><i class="fas fa-key"></i> Change Password</button>
    </div>
  </div>
</div>

<!-- ─── Profile Completion ─── -->
<div class="p-card" style="margin-bottom:22px;">
  <div class="p-card-body" style="padding:22px 24px;">
    <div style="display:grid;grid-template-columns:1fr auto;gap:24px;align-items:center;flex-wrap:wrap;">
      <!-- Bar section -->
      <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
          <span style="font-size:.92rem;font-weight:700;color:var(--gray-900);">Profile Completion</span>
          <span style="font-size:1.1rem;font-weight:800;color:var(--primary);" id="completionPct">78%</span>
        </div>
        <div class="completion-bar-wrap"><div class="completion-bar" id="completionBar" style="width:78%;"></div></div>
        <p style="font-size:.78rem;color:var(--text-muted);margin:8px 0 0;">Add social links &amp; documents to reach 100%</p>
      </div>
      <!-- Stats section -->
      <div style="display:flex;gap:24px;">
        <div style="text-align:center;padding:12px 20px;background:var(--primary-bg);border-radius:12px;">
          <div style="font-size:1.5rem;font-weight:800;color:var(--primary);">2</div>
          <div style="font-size:.72rem;color:var(--primary);font-weight:600;margin-top:2px;">Active Apps</div>
        </div>
        <div style="text-align:center;padding:12px 20px;background:var(--green-bg);border-radius:12px;">
          <div style="font-size:1.5rem;font-weight:800;color:var(--green);">3</div>
          <div style="font-size:.72rem;color:var(--green);font-weight:600;margin-top:2px;">Docs Uploaded</div>
        </div>
        <div style="text-align:center;padding:12px 20px;background:var(--warning-bg);border-radius:12px;">
          <div style="font-size:1.5rem;font-weight:800;color:var(--warning);">0</div>
          <div style="font-size:.72rem;color:var(--warning);font-weight:600;margin-top:2px;">Interviews</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ─── Main Grid ─── -->
<div class="profile-grid">

  <!-- LEFT -->
  <div>
    <!-- Personal Information -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-id-card"></i> Personal Information</h3>
        <button class="btn-edit-section" onclick="openEditModal('personal')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <div class="info-grid-2">
          <div class="info-field"><div class="info-label">Full Name</div><div class="info-value" id="infoName">{{ auth()->user()->name }}</div></div>
          <div class="info-field"><div class="info-label">Email</div><div class="info-value" id="infoEmail">{{ auth()->user()->email }}</div></div>
          <div class="info-field"><div class="info-label">Phone</div><div class="info-value" id="infoPhone">+355 69 456 7890</div></div>
          <div class="info-field"><div class="info-label">Date of Birth</div><div class="info-value" id="infoDob">March 15, 2001</div></div>
          <div class="info-field"><div class="info-label">Nationality</div><div class="info-value" id="infoNationality">Albanian</div></div>
          <div class="info-field"><div class="info-label">Location</div><div class="info-value" id="infoLocation">Tirana, Albania</div></div>
        </div>
      </div>
    </div>

    <!-- Academic Details -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-graduation-cap"></i> Academic Details</h3>
        <button class="btn-edit-section" onclick="openEditModal('academic')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <div class="info-grid-2">
          <div class="info-field"><div class="info-label">University</div><div class="info-value" id="infoUniversity">Epoka University</div></div>
          <div class="info-field"><div class="info-label">Faculty</div><div class="info-value" id="infoFaculty">Faculty of Engineering</div></div>
          <div class="info-field"><div class="info-label">Department</div><div class="info-value" id="infoDept">Computer Science</div></div>
          <div class="info-field"><div class="info-label">Year</div><div class="info-value" id="infoAcYear">3rd Year</div></div>
          <div class="info-field"><div class="info-label">GPA</div><div class="info-value" id="infoGpa">3.8 / 4.0</div></div>
          <div class="info-field"><div class="info-label">Student ID</div><div class="info-value" id="infoStudentId">CS-2021-0342</div></div>
        </div>
      </div>
    </div>

    <!-- Bio -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-align-left"></i> About Me</h3>
        <button class="btn-edit-section" onclick="openEditModal('bio')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <p id="infoBio" style="font-size:.88rem;color:var(--gray-700);line-height:1.65;margin:0;">
          Final year Computer Science student at Epoka University with a passion for software engineering, machine learning, and building impactful applications. Looking for internship opportunities where I can apply my skills and grow professionally.
        </p>
      </div>
    </div>
  </div>

  <!-- RIGHT -->
  <div>
    <!-- Skills & Interests -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-code"></i> Skills</h3>
        <button class="btn-edit-section" onclick="openEditModal('skills')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <div class="skill-tags-wrap" id="skillTagsDisplay">
          <!-- Rendered by JS -->
        </div>
      </div>
    </div>

    <!-- Languages -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-language"></i> Languages</h3>
        <button class="btn-edit-section" onclick="openEditModal('languages')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body" id="languagesDisplay" style="padding-top:4px;">
        <!-- Rendered by JS -->
      </div>
    </div>

    <!-- Social Links -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-link"></i> Social Links</h3>
        <button class="btn-edit-section" onclick="openEditModal('social')"><i class="fas fa-pen"></i> Edit All</button>
      </div>
      <div class="p-card-body" id="socialLinksDisplay" style="padding-top:4px;">
        <!-- Rendered by JS -->
      </div>
    </div>
  </div>

</div>

<!-- ═══════════════ MODALS (teleported to body by JS to escape CSS transform stacking context) ═══════════════ -->
<template id="modalTemplates">

<!-- Generic Edit Modal -->
<div id="editModal" class="modal-overlay" onclick="if(event.target===this)closeEditModal()">
  <div class="modal-box">
    <button class="modal-close" onclick="closeEditModal()"><i class="fas fa-xmark"></i></button>
    <div class="modal-head">
      <div class="modal-icon" id="editModalIcon"><i class="fas fa-pen"></i></div>
      <div>
        <div class="modal-head-title" id="editModalTitle">Edit Section</div>
        <div class="modal-head-sub" id="editModalSub">Update your information</div>
      </div>
    </div>
    <div id="editModalBody"></div>
    <div class="modal-footer">
      <button class="btn-modal-cancel" onclick="closeEditModal()">Cancel</button>
      <button class="btn-modal-save" id="saveEditBtn" onclick="saveEdit()"><i class="fas fa-check"></i> Save Changes</button>
    </div>
  </div>
</div>

<!-- Change Password Modal -->
<div id="passwordModal" class="modal-overlay" onclick="if(event.target===this)closePasswordModal()">
  <div class="modal-box">
    <button class="modal-close" onclick="closePasswordModal()"><i class="fas fa-xmark"></i></button>
    <div class="modal-head">
      <div class="modal-icon" style="background:rgba(139,92,246,.1);color:#8B5CF6;"><i class="fas fa-key"></i></div>
      <div>
        <div class="modal-head-title">Change Password</div>
        <div class="modal-head-sub">Keep your account secure with a strong password</div>
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Current Password</label>
      <input type="password" class="form-input" id="pwCurrent" placeholder="••••••••">
    </div>
    <div class="form-group">
      <label class="form-label">New Password</label>
      <input type="password" class="form-input" id="pwNew" placeholder="At least 6 characters">
    </div>
    <div class="form-group">
      <label class="form-label">Confirm New Password</label>
      <input type="password" class="form-input" id="pwConfirm" placeholder="Re-enter new password">
    </div>
    <div class="modal-footer">
      <button class="btn-modal-cancel" onclick="closePasswordModal()">Cancel</button>
      <button class="btn-modal-save" onclick="submitPassword()"><i class="fas fa-shield-halved"></i> Update Password</button>
    </div>
  </div>
</div>

</template>

<script>
/* ─── TELEPORT modals to <body> to escape CSS transform stacking context ─── */
(function() {
  var tpl = document.getElementById('modalTemplates');
  if (tpl) {
    var clone = tpl.content.cloneNode(true);
    document.body.appendChild(clone);
  }
})();

function showToast(msg, type) { if (window.showGlobalToast) showGlobalToast(msg, type); }

/* ─── STATE (localStorage backed) ─── */
function load(key, def) {
  try { return JSON.parse(localStorage.getItem('profile_' + key)) || def; } catch(e) { return def; }
}
function save(key, val) { localStorage.setItem('profile_' + key, JSON.stringify(val)); }

const STATE = {
  personal: load('personal', { name: '{{ auth()->user()->name }}', phone: '+355 69 456 7890', dob: '2001-03-15', nationality: 'Albanian', location: 'Tirana, Albania' }),
  academic:  load('academic', { university: 'Epoka University', faculty: 'Faculty of Engineering', dept: 'Computer Science', year: '3rd Year', gpa: '3.8', studentId: 'CS-2021-0342' }),
  bio:       load('bio', { text: 'Final year Computer Science student at Epoka University with a passion for software engineering, machine learning, and building impactful applications. Looking for internship opportunities where I can apply my skills and grow professionally.' }),
  skills:    load('skills', ['Python', 'JavaScript', 'React', 'SQL', 'Machine Learning', 'Data Analysis', 'UI/UX Design']),
  languages: load('languages', [{ name: 'English', level: 'Fluent' }, { name: 'Albanian', level: 'Native' }, { name: 'Italian', level: 'Basic' }]),
  social:    load('social', { linkedin: 'linkedin.com/in/your-name', github: 'github.com/your-username', twitter: '' }),
};

let currentSection = '';

/* ─── RENDER functions ─── */
function renderAll() {
  renderPersonal();
  renderAcademic();
  renderBio();
  renderSkills();
  renderLanguages();
  renderSocial();
  renderHero();
}

function renderHero() {
  document.getElementById('displayName').textContent = STATE.personal.name;
  document.getElementById('displayUniversity').textContent = STATE.academic.university;
  document.getElementById('displayYear').textContent = STATE.academic.year;
  document.getElementById('displayGpa').textContent = STATE.academic.gpa;
  document.getElementById('infoName').textContent = STATE.personal.name;
}

function renderPersonal() {
  document.getElementById('infoName').textContent        = STATE.personal.name;
  document.getElementById('infoPhone').textContent       = STATE.personal.phone;
  document.getElementById('infoDob').textContent         = STATE.personal.dob;
  document.getElementById('infoNationality').textContent = STATE.personal.nationality;
  document.getElementById('infoLocation').textContent    = STATE.personal.location;
}

function renderAcademic() {
  document.getElementById('infoUniversity').textContent = STATE.academic.university;
  document.getElementById('infoFaculty').textContent    = STATE.academic.faculty;
  document.getElementById('infoDept').textContent       = STATE.academic.dept;
  document.getElementById('infoAcYear').textContent     = STATE.academic.year;
  document.getElementById('infoGpa').textContent        = STATE.academic.gpa + ' / 4.0';
  document.getElementById('infoStudentId').textContent  = STATE.academic.studentId;
  document.getElementById('displayGpa').textContent     = STATE.academic.gpa;
  document.getElementById('displayYear').textContent    = STATE.academic.year;
  document.getElementById('displayUniversity').textContent = STATE.academic.university;
}

function renderBio() {
  document.getElementById('infoBio').textContent = STATE.bio.text;
}

function renderSkills() {
  const wrap = document.getElementById('skillTagsDisplay');
  if (!STATE.skills.length) { wrap.innerHTML = '<span style="font-size:.82rem;color:var(--text-muted);">No skills added yet.</span>'; return; }
  wrap.innerHTML = STATE.skills.map((s, i) =>
    `<span class="skill-tag">${s}<button class="remove-skill" onclick="removeSkill(${i})" title="Remove"><i class="fas fa-xmark"></i></button></span>`
  ).join('');
}

function removeSkill(i) {
  STATE.skills.splice(i, 1); save('skills', STATE.skills); renderSkills();
  showToast('Skill removed', 'info');
}

function renderLanguages() {
  const d = document.getElementById('languagesDisplay');
  const map = { Fluent: 'lang-fluent', Native: 'lang-native', Basic: 'lang-basic' };
  d.innerHTML = STATE.languages.map(l =>
    `<div class="lang-item">
      <div class="lang-left">
        <div class="lang-icon"><i class="fas fa-globe"></i></div>
        <div class="lang-name">${l.name}</div>
      </div>
      <span class="lang-badge ${map[l.level] || 'lang-basic'}">${l.level}</span>
    </div>`
  ).join('');
}

function renderSocial() {
  const d = document.getElementById('socialLinksDisplay');
  const items = [
    { key: 'linkedin', icon: 'fab fa-linkedin', cls: 'linkedin', label: 'LinkedIn' },
    { key: 'github',   icon: 'fab fa-github',   cls: 'github',   label: 'GitHub'   },
    { key: 'twitter',  icon: 'fab fa-twitter',  cls: 'twitter',  label: 'Twitter'  },
  ];
  d.innerHTML = items.map(it => {
    const url = STATE.social[it.key] || '';
    const display = url || 'Not set';
    const isEmpty = !url;
    return `<div class="social-item">
      <div class="social-icon-wrap ${it.cls}"><i class="${it.icon}"></i></div>
      <div class="social-info">
        <div class="social-platform">${it.label}</div>
        <a href="${url ? 'https://' + url.replace(/^https?:\/\//, '') : '#'}"
           class="social-link ${isEmpty ? 'empty' : ''}" target="_blank">${display}</a>
      </div>
      <button class="social-edit-btn" onclick="openSocialSingleEdit('${it.key}','${it.label}')" title="Edit ${it.label}">
        <i class="fas fa-pen"></i>
      </button>
    </div>`;
  }).join('');
}

/* ─── OPEN MODAL helpers ─── */
function openEditModal(section) {
  currentSection = section;
  const modal = document.getElementById('editModal');
  const body  = document.getElementById('editModalBody');
  const title = document.getElementById('editModalTitle');
  const sub   = document.getElementById('editModalSub');
  const icon  = document.getElementById('editModalIcon');

  const configs = {
    profile: {
      title: 'Edit Profile', sub: 'Update your name, headline and year',
      icon: 'fas fa-user-circle', iconBg: 'var(--primary-bg)', iconColor: 'var(--primary)',
      html: `<div class="form-group"><label class="form-label">Full Name</label>
        <input class="form-input" id="f-name" value="${STATE.personal.name}"></div>
        <div class="form-group"><label class="form-label">Headline / Role</label>
        <input class="form-input" id="f-headline" value="${load('headline','Computer Science Student')}"></div>
        <div class="form-group"><label class="form-label">Location</label>
        <input class="form-input" id="f-location" value="${STATE.personal.location}"></div>`
    },
    personal: {
      title: 'Personal Information', sub: 'Update your contact and personal details',
      icon: 'fas fa-id-card', iconBg: 'var(--primary-bg)', iconColor: 'var(--primary)',
      html: `<div class="form-grid-2">
        <div class="form-group"><label class="form-label">Full Name</label><input class="form-input" id="f-name" value="${STATE.personal.name}"></div>
        <div class="form-group"><label class="form-label">Phone</label><input class="form-input" id="f-phone" value="${STATE.personal.phone}"></div>
        <div class="form-group"><label class="form-label">Date of Birth</label><input type="date" class="form-input" id="f-dob" value="${STATE.personal.dob}"></div>
        <div class="form-group"><label class="form-label">Nationality</label><input class="form-input" id="f-nationality" value="${STATE.personal.nationality}"></div>
        <div class="form-group" style="grid-column:1/-1;"><label class="form-label">Location</label><input class="form-input" id="f-location" value="${STATE.personal.location}"></div>
      </div>`
    },
    academic: {
      title: 'Academic Details', sub: 'Update your university and study information',
      icon: 'fas fa-graduation-cap', iconBg: 'var(--green-bg)', iconColor: 'var(--green)',
      html: `<div class="form-grid-2">
        <div class="form-group"><label class="form-label">University</label><input class="form-input" id="f-university" value="${STATE.academic.university}"></div>
        <div class="form-group"><label class="form-label">Faculty</label><input class="form-input" id="f-faculty" value="${STATE.academic.faculty}"></div>
        <div class="form-group"><label class="form-label">Department</label><input class="form-input" id="f-dept" value="${STATE.academic.dept}"></div>
        <div class="form-group"><label class="form-label">Year</label>
          <select class="form-select" id="f-year">
            ${['1st Year','2nd Year','3rd Year','4th Year','Graduate'].map(y =>
              `<option ${STATE.academic.year===y?'selected':''}>${y}</option>`).join('')}
          </select>
        </div>
        <div class="form-group"><label class="form-label">GPA</label><input class="form-input" id="f-gpa" value="${STATE.academic.gpa}" step="0.01" min="0" max="4" type="number"></div>
        <div class="form-group"><label class="form-label">Student ID</label><input class="form-input" id="f-studentId" value="${STATE.academic.studentId}"></div>
      </div>`
    },
    bio: {
      title: 'About Me', sub: 'Write a short professional bio',
      icon: 'fas fa-align-left', iconBg: 'rgba(139,92,246,.1)', iconColor: '#8B5CF6',
      html: `<div class="form-group"><label class="form-label">Bio</label>
        <textarea class="form-textarea" id="f-bio" rows="5" style="resize:vertical;">${STATE.bio.text}</textarea>
        <div style="font-size:.72rem;color:var(--text-muted);margin-top:4px;" id="bioCharCount"></div></div>`
    },
    skills: {
      title: 'Skills & Interests', sub: 'Add or remove your skills',
      icon: 'fas fa-code', iconBg: 'var(--primary-bg)', iconColor: 'var(--primary)',
      html: `<div class="form-group">
        <label class="form-label">Skills (one per line or comma-separated)</label>
        <textarea class="form-textarea" id="f-skills" rows="5" style="resize:vertical;">${STATE.skills.join(', ')}</textarea>
      </div>
      <div style="font-size:.78rem;color:var(--text-muted);">Current: <strong>${STATE.skills.length}</strong> skills</div>`
    },
    languages: {
      title: 'Languages', sub: 'Update your language proficiencies',
      icon: 'fas fa-language', iconBg: 'var(--warning-bg)', iconColor: 'var(--warning)',
      html: STATE.languages.map((l, i) => `
        <div class="form-grid-2" style="margin-bottom:12px;">
          <div class="form-group" style="margin-bottom:0;"><label class="form-label">Language</label>
            <input class="form-input lang-name-inp" data-idx="${i}" value="${l.name}"></div>
          <div class="form-group" style="margin-bottom:0;"><label class="form-label">Level</label>
            <select class="form-select lang-level-inp" data-idx="${i}">
              ${['Native','Fluent','Intermediate','Basic'].map(lv =>
                `<option ${l.level===lv?'selected':''}>${lv}</option>`).join('')}
            </select>
          </div>
        </div>`).join('')
        + `<div class="form-group" style="margin-top:4px;"><label class="form-label">Add New Language</label>
        <div class="form-grid-2">
          <input class="form-input" id="newLangName" placeholder="e.g. French">
          <select class="form-select" id="newLangLevel">
            <option>Native</option><option>Fluent</option><option>Intermediate</option><option>Basic</option>
          </select>
        </div></div>`
    },
    social: {
      title: 'Social Links', sub: 'Update all your social and professional links',
      icon: 'fas fa-link', iconBg: 'rgba(0,119,181,.1)', iconColor: '#0077b5',
      html: `
        <div class="form-group">
          <label class="form-label"><i class="fab fa-linkedin" style="color:#0077b5;margin-right:6px;"></i> LinkedIn URL</label>
          <input class="form-input" id="f-linkedin" value="${STATE.social.linkedin}" placeholder="linkedin.com/in/your-name">
        </div>
        <div class="form-group">
          <label class="form-label"><i class="fab fa-github" style="margin-right:6px;"></i> GitHub URL</label>
          <input class="form-input" id="f-github" value="${STATE.social.github}" placeholder="github.com/your-username">
        </div>
        <div class="form-group">
          <label class="form-label"><i class="fab fa-twitter" style="color:#1d9bf0;margin-right:6px;"></i> Twitter / X URL</label>
          <input class="form-input" id="f-twitter" value="${STATE.social.twitter}" placeholder="twitter.com/your-handle">
        </div>`
    },
  };

  const cfg = configs[section];
  if (!cfg) return;

  icon.style.background = cfg.iconBg;
  icon.style.color = cfg.iconColor;
  icon.innerHTML = `<i class="${cfg.icon}"></i>`;
  title.textContent = cfg.title;
  sub.textContent = cfg.sub;
  body.innerHTML = cfg.html;

  // bio char counter
  if (section === 'bio') {
    const ta = document.getElementById('f-bio');
    const cc = document.getElementById('bioCharCount');
    const update = () => { cc.textContent = ta.value.length + ' characters'; };
    ta.addEventListener('input', update);
    update();
  }

  modal.classList.add('open');
}

function openSocialSingleEdit(key, label) {
  currentSection = 'social_single';
  const modal = document.getElementById('editModal');
  const icons = { linkedin: 'fab fa-linkedin', github: 'fab fa-github', twitter: 'fab fa-twitter' };
  const colors = { linkedin: '#0077b5', github: '#24292f', twitter: '#1d9bf0' };
  document.getElementById('editModalIcon').innerHTML = `<i class="${icons[key]}"></i>`;
  document.getElementById('editModalIcon').style.background = 'rgba(0,0,0,.06)';
  document.getElementById('editModalIcon').style.color = colors[key];
  document.getElementById('editModalTitle').textContent = 'Edit ' + label;
  document.getElementById('editModalSub').textContent = 'Update your ' + label + ' profile URL';
  document.getElementById('editModalBody').innerHTML = `
    <div class="form-group">
      <label class="form-label">${label} URL</label>
      <input class="form-input" id="f-social-single" value="${STATE.social[key]}" placeholder="${key}.com/your-name" autofocus>
      <input type="hidden" id="f-social-key" value="${key}">
    </div>`;
  modal.classList.add('open');
  setTimeout(() => document.getElementById('f-social-single').focus(), 100);
}

function closeEditModal() { document.getElementById('editModal').classList.remove('open'); }

/* ─── SAVE ─── */
function saveEdit() {
  const btn = document.getElementById('saveEditBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
  btn.disabled = true;

  setTimeout(() => {
    try {
      switch (currentSection) {
        case 'profile':
          STATE.personal.name     = document.getElementById('f-name').value.trim() || STATE.personal.name;
          STATE.personal.location = document.getElementById('f-location').value.trim() || STATE.personal.location;
          const hl = document.getElementById('f-headline').value.trim();
          if (hl) { save('headline', hl); document.getElementById('displayHeadline').textContent = hl; }
          save('personal', STATE.personal);
          renderPersonal(); renderHero();
          break;

        case 'personal':
          STATE.personal.name        = document.getElementById('f-name').value.trim() || STATE.personal.name;
          STATE.personal.phone       = document.getElementById('f-phone').value.trim() || STATE.personal.phone;
          STATE.personal.dob         = document.getElementById('f-dob').value || STATE.personal.dob;
          STATE.personal.nationality = document.getElementById('f-nationality').value.trim() || STATE.personal.nationality;
          STATE.personal.location    = document.getElementById('f-location').value.trim() || STATE.personal.location;
          save('personal', STATE.personal);
          renderPersonal(); renderHero();
          break;

        case 'academic':
          STATE.academic.university = document.getElementById('f-university').value.trim() || STATE.academic.university;
          STATE.academic.faculty    = document.getElementById('f-faculty').value.trim() || STATE.academic.faculty;
          STATE.academic.dept       = document.getElementById('f-dept').value.trim() || STATE.academic.dept;
          STATE.academic.year       = document.getElementById('f-year').value;
          STATE.academic.gpa        = document.getElementById('f-gpa').value || STATE.academic.gpa;
          STATE.academic.studentId  = document.getElementById('f-studentId').value.trim() || STATE.academic.studentId;
          save('academic', STATE.academic);
          renderAcademic();
          break;

        case 'bio':
          STATE.bio.text = document.getElementById('f-bio').value.trim() || STATE.bio.text;
          save('bio', STATE.bio);
          renderBio();
          break;

        case 'skills':
          const raw = document.getElementById('f-skills').value;
          STATE.skills = raw.split(/[,\n]/).map(s => s.trim()).filter(Boolean);
          save('skills', STATE.skills);
          renderSkills();
          break;

        case 'languages':
          // Update existing
          document.querySelectorAll('.lang-name-inp').forEach(inp => {
            const i = parseInt(inp.dataset.idx);
            STATE.languages[i].name = inp.value.trim() || STATE.languages[i].name;
          });
          document.querySelectorAll('.lang-level-inp').forEach(sel => {
            const i = parseInt(sel.dataset.idx);
            STATE.languages[i].level = sel.value;
          });
          // Add new
          const newName = document.getElementById('newLangName').value.trim();
          const newLevel = document.getElementById('newLangLevel').value;
          if (newName) STATE.languages.push({ name: newName, level: newLevel });
          save('languages', STATE.languages);
          renderLanguages();
          break;

        case 'social':
          STATE.social.linkedin = document.getElementById('f-linkedin').value.trim().replace(/^https?:\/\//, '');
          STATE.social.github   = document.getElementById('f-github').value.trim().replace(/^https?:\/\//, '');
          STATE.social.twitter  = document.getElementById('f-twitter').value.trim().replace(/^https?:\/\//, '');
          save('social', STATE.social);
          renderSocial();
          break;

        case 'social_single':
          const key = document.getElementById('f-social-key').value;
          const val = document.getElementById('f-social-single').value.trim().replace(/^https?:\/\//, '');
          STATE.social[key] = val;
          save('social', STATE.social);
          renderSocial();
          break;
      }
      showToast('Changes saved successfully', 'success');
    } catch(e) {
      showToast('Something went wrong. Please try again.', 'danger');
    }

    btn.innerHTML = '<i class="fas fa-check"></i> Save Changes';
    btn.disabled = false;
    closeEditModal();
  }, 600);
}

/* ─── PASSWORD MODAL ─── */
function openPasswordModal() {
  document.getElementById('pwCurrent').value = '';
  document.getElementById('pwNew').value = '';
  document.getElementById('pwConfirm').value = '';
  document.getElementById('passwordModal').classList.add('open');
}
function closePasswordModal() { document.getElementById('passwordModal').classList.remove('open'); }
function submitPassword() {
  const c = document.getElementById('pwCurrent').value.trim();
  const n = document.getElementById('pwNew').value.trim();
  const cf = document.getElementById('pwConfirm').value.trim();
  if (!c) { showToast('Enter your current password', 'info'); return; }
  if (n.length < 6) { showToast('New password must be at least 6 characters', 'info'); return; }
  if (n !== cf) { showToast('Passwords do not match', 'info'); return; }
  closePasswordModal();
  showToast('Password updated successfully', 'success');
}

/* ─── ESC KEY ─── */
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') { closeEditModal(); closePasswordModal(); }
});

/* ─── INIT ─── */
document.addEventListener('DOMContentLoaded', renderAll);
</script>
</x-layouts::student>
