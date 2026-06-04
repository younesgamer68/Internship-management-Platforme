<div x-data="{ editOpen: false }" @open-edit-modal.window="editOpen = true">
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
      <label for="profilePhotoInput" class="profile-avatar-upload" title="Change photo" style="cursor:pointer; display:flex;">
        <i class="fas fa-camera"></i>
      </label>
      <input type="file" id="profilePhotoInput" wire:model.live="photo" accept="image/*" style="display:none;">
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
        <button class="btn-edit-section" @click="editOpen = true"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <div class="info-grid-2">
          <div class="info-field"><div class="info-label">Full Name</div><div class="info-value" id="infoName">{{ $name }}</div></div>
          <div class="info-field"><div class="info-label">Email</div><div class="info-value" id="infoEmail">{{ $email }}</div></div>
          <div class="info-field"><div class="info-label">Phone</div><div class="info-value" id="infoPhone">{{ $phone ?? 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">Date of Birth</div><div class="info-value" id="infoDob">{{ $date_of_birth ? \Carbon\Carbon::parse($date_of_birth)->format('F j, Y') : 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">Nationality</div><div class="info-value" id="infoNationality">{{ $country ?? 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">Location</div><div class="info-value" id="infoLocation">{{ $city ? $city . ', ' . $country : 'Not set' }}</div></div>
        </div>
      </div>
    </div>

    <!-- Academic Details -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-graduation-cap"></i> Academic Details</h3>
        <button class="btn-edit-section" @click="editOpen = true"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <div class="info-grid-2">
          <div class="info-field"><div class="info-label">University</div><div class="info-value" id="infoUniversity">{{ $university ?? 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">Field of Study</div><div class="info-value" id="infoFaculty">{{ $field_of_study ?? 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">Degree</div><div class="info-value" id="infoDept">{{ $degree ?? 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">Start Year</div><div class="info-value" id="infoAcYear">{{ $education_start_year ?? 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">GPA</div><div class="info-value" id="infoGpa">{{ $gpa ? $gpa . ' / 4.0' : 'Not set' }}</div></div>
          <div class="info-field"><div class="info-label">Student ID / Referral</div><div class="info-value" id="infoStudentId">{{ $student_id ?? 'Not set' }}</div></div>
        </div>
      </div>
    </div>

    <!-- Bio -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-align-left"></i> About Me</h3>
        <button class="btn-edit-section" @click="editOpen = true"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <p id="infoBio" style="font-size:.88rem;color:var(--gray-700);line-height:1.65;margin:0;white-space:pre-wrap;">
          {{ $experience ?? 'Final year student looking for internship opportunities where I can apply my skills and grow professionally.' }}
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
        <button class="btn-edit-section" @click="editOpen = true"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body">
        <div class="skill-tags-wrap" id="skillTagsDisplay">
          @if($skills)
              @foreach(explode(',', $skills) as $skill)
                  <span class="skill-tag">{{ trim($skill) }}</span>
              @endforeach
          @else
              <span style="font-size:.85rem;color:var(--gray-500);">No skills listed.</span>
          @endif
        </div>
      </div>
    </div>

    <!-- Languages -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-language"></i> Languages</h3>
        <button class="btn-edit-section" @click="editOpen = true"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body" id="languagesDisplay" style="padding-top:4px;">
          @if($languages)
              @foreach(explode(',', $languages) as $lang)
                  <div class="lang-item">
                      <div class="lang-left">
                          <div class="lang-icon"><i class="fas fa-globe"></i></div>
                          <div class="lang-name">{{ trim($lang) }}</div>
                      </div>
                  </div>
              @endforeach
          @else
              <span style="font-size:.85rem;color:var(--gray-500);">No languages listed.</span>
          @endif
      </div>
    </div>

    <!-- Social Links -->
    <div class="p-card">
      <div class="p-card-header">
        <h3 class="p-card-title"><i class="fas fa-link"></i> Social Links</h3>
        <button class="btn-edit-section" @click="editOpen = true"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="p-card-body" id="socialLinksDisplay" style="padding-top:4px;">
          @if($linkedin_url)
          <div class="social-item">
              <div class="social-icon-wrap linkedin"><i class="fab fa-linkedin-in"></i></div>
              <div class="social-info">
                  <div class="social-platform">LinkedIn</div>
                  <a href="{{ $linkedin_url }}" target="_blank" class="social-link">{{ $linkedin_url }}</a>
              </div>
          </div>
          @endif
          @if($portfolio_url)
          <div class="social-item">
              <div class="social-icon-wrap github"><i class="fas fa-globe"></i></div>
              <div class="social-info">
                  <div class="social-platform">Portfolio</div>
                  <a href="{{ $portfolio_url }}" target="_blank" class="social-link">{{ $portfolio_url }}</a>
              </div>
          </div>
          @endif
          @if(!$linkedin_url && !$portfolio_url)
              <span style="font-size:.85rem;color:var(--gray-500);">No social links added.</span>
          @endif
      </div>
    </div>
  </div>

</div>


<!-- ─── Modals ─── -->
@if(session()->has('message'))
    <div style="background: var(--green); color: white; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
        {{ session('message') }}
    </div>
@endif

  <div class="modal-overlay" :class="editOpen ? 'open' : ''" x-show="editOpen" style="display: flex;">
    <div class="modal-box" @click.outside="editOpen = false" style="max-height: 85vh; overflow-y: auto;">
      <button class="modal-close" @click="editOpen = false" type="button"><i class="fas fa-times"></i></button>
      <div class="modal-head">
        <div class="modal-icon"><i class="fas fa-user-edit"></i></div>
        <div>
          <div class="modal-head-title">Edit Profile</div>
          <div class="modal-head-sub">Update your information</div>
        </div>
      </div>
      
      <form wire:submit.prevent="saveProfile">
        @if ($errors->any())
          <div style="background: #FEF2F2; color: #DC2626; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; border: 1px solid #FCA5A5;">
            <ul style="margin: 0; padding-left: 20px;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="form-group">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-input" wire:model="name">
        </div>
        <div class="form-grid-2">
          <div class="form-group">
            <label class="form-label">Phone</label>
            <input type="text" class="form-input" wire:model="phone">
          </div>
          <div class="form-group">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-input" wire:model="date_of_birth">
          </div>
          <div class="form-group">
            <label class="form-label">Country</label>
            <input type="text" class="form-input" wire:model="country">
          </div>
          <div class="form-group">
            <label class="form-label">City</label>
            <input type="text" class="form-input" wire:model="city">
          </div>
          <div class="form-group">
            <label class="form-label">University</label>
            <input type="text" class="form-input" wire:model="university">
          </div>
          <div class="form-group">
            <label class="form-label">Field of Study</label>
            <input type="text" class="form-input" wire:model="field_of_study">
          </div>
          <div class="form-group">
            <label class="form-label">Degree</label>
            <input type="text" class="form-input" wire:model="degree">
          </div>
          <div class="form-group">
            <label class="form-label">GPA</label>
            <input type="text" class="form-input" wire:model="gpa">
          </div>
          <div class="form-group" style="grid-column: 1 / -1;">
            <label class="form-label">About Me / Bio</label>
            <textarea class="form-textarea" rows="3" wire:model="experience" placeholder="Tell us about yourself..."></textarea>
          </div>
          <div class="form-group">
            <label class="form-label">Skills (comma separated)</label>
            <input type="text" class="form-input" wire:model="skills" placeholder="e.g. PHP, Laravel, React">
          </div>
          <div class="form-group">
            <label class="form-label">Languages (comma separated)</label>
            <input type="text" class="form-input" wire:model="languages" placeholder="e.g. English, Albanian">
          </div>
          <div class="form-group">
            <label class="form-label">LinkedIn URL</label>
            <input type="text" class="form-input" wire:model="linkedin_url" placeholder="https://linkedin.com/in/...">
          </div>
          <div class="form-group">
            <label class="form-label">Portfolio URL</label>
            <input type="text" class="form-input" wire:model="portfolio_url" placeholder="https://...">
          </div>
        </div>

        <div class="modal-footer" style="position: sticky; bottom: -32px; background: white; padding: 16px 0; border-top: 1px solid var(--gray-100); margin-top: 24px;">
          <button type="button" class="btn-modal-cancel" @click="editOpen = false">Cancel</button>
          <button type="submit" class="btn-modal-save"><i class="fas fa-check"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
<script>
function openEditModal(type) {
    window.dispatchEvent(new CustomEvent('open-edit-modal'));
}
</script>
</div>
