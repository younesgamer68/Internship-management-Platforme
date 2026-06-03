<div>
@php $slug = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp



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
      <h2 id="displayName">{{ $name }}</h2>
      <p id="displayHeadline">Computer Science Student</p>
      <div class="profile-tags">
        <span class="ptag ptag-blue"><i class="fas fa-university"></i> <span id="displayUniversity">{{ $university ?? 'Add University' }}</span></span>
        <span class="ptag ptag-blue"><span id="displayYear">3rd Year</span></span>
        <span class="ptag ptag-green"><i class="fas fa-star"></i> GPA <span id="displayGpa">{{ $gpa ?? '-' }}</span></span>
      </div>
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


</div>
<!-- ─── Modals ─── -->
@if(session()->has('message'))
    <div style="background: var(--green); color: white; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
        {{ session('message') }}
    </div>
@endif

<div x-data="{ editOpen: false }" @open-edit-modal.window="editOpen = true">
  <div class="profile-actions" style="margin-top:20px;">
    <button type="button" class="btn-edit-profile" @click="editOpen = true">
      <i class="fas fa-pen"></i> Edit Profile
    </button>
  </div>

  <div class="modal-overlay" :class="editOpen ? 'open' : ''" x-show="editOpen" style="display: flex;">
    <div class="modal-box" @click.outside="editOpen = false">
      <button class="modal-close" @click="editOpen = false"><i class="fas fa-times"></i></button>
      <div class="modal-head">
        <div class="modal-icon"><i class="fas fa-user-edit"></i></div>
        <div>
          <div class="modal-head-title">Edit Profile</div>
          <div class="modal-head-sub">Update your information</div>
        </div>
      </div>
      
      <form wire:submit.prevent="saveProfile">
        <div class="form-group">
          <label class="form-label">Name</label>
          <input type="text" class="form-input" wire:model="name">
        </div>
        <div class="form-grid-2">
          <div class="form-group">
            <label class="form-label">Phone</label>
            <input type="text" class="form-input" wire:model="phone">
          </div>
          <div class="form-group">
            <label class="form-label">University</label>
            <input type="text" class="form-input" wire:model="university">
          </div>
          <div class="form-group">
            <label class="form-label">Degree</label>
            <input type="text" class="form-input" wire:model="degree">
          </div>
          <div class="form-group">
            <label class="form-label">GPA</label>
            <input type="text" class="form-input" wire:model="gpa">
          </div>
          <div class="form-group">
            <label class="form-label">Country</label>
            <input type="text" class="form-input" wire:model="country">
          </div>
          <div class="form-group">
            <label class="form-label">City</label>
            <input type="text" class="form-input" wire:model="city">
          </div>
        </div>
        
        <div class="form-group" style="margin-top:10px;">
            <label class="form-label">Profile Photo</label>
            <input type="file" wire:model="photo" accept="image/*" class="form-input">
            <div wire:loading wire:target="photo">Uploading...</div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn-modal-cancel" @click="editOpen = false">Cancel</button>
          <button type="submit" class="btn-modal-save"><i class="fas fa-check"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
function openEditModal(type) {
    window.dispatchEvent(new CustomEvent('open-edit-modal'));
}
</script>
</div>
