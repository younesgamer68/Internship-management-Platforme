import re

with open('resources/views/livewire/student/profile.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace display values
content = content.replace('<h2 id="displayName">{{ auth()->user()->name }}</h2>', '<h2 id="displayName">{{ \ }}</h2>')
content = content.replace('<span id="displayUniversity">Epoka University</span>', '<span id="displayUniversity">{{ \ ?? \'Add University\' }}</span>')
content = content.replace('<span id="displayGpa">3.8</span>', '<span id="displayGpa">{{ \ ?? \'-\' }}</span>')
content = content.replace('<span id="displayDegree">Bachelor of Science in Computer Science</span>', '<span id="displayDegree">{{ \ ?? \'Add Degree\' }}</span>')

# Update phone in personal info
content = re.sub(r'<div class="info-value" id="displayPhone">.*?</div>', '<div class="info-value" id="displayPhone">{{ \ ?? \'Add Phone\' }}</div>', content)
content = re.sub(r'<div class="info-value" id="displayLocation">.*?</div>', '<div class="info-value" id="displayLocation">{{ \ ?? \'\' }} {{ \ ?? \'\' }}</div>', content)
content = re.sub(r'<div class="info-value" id="displayEmail">.*?</div>', '<div class="info-value" id="displayEmail">{{ \ }}</div>', content)

# Remove the script block since it's hardcoded and complex, we'll replace it with Livewire functionality
script_pattern = re.compile(r'<script>.*?</script>', re.DOTALL)
content = script_pattern.sub('', content)

# Change the edit modal to use wire:model and wire:submit.prevent
# We'll just replace the entire modal-overlay section with a unified Livewire modal
# Actually it's easier to just strip the existing modal and inject our own simple one
modal_pattern = re.compile(r'<!-- ─── Modals ─── -->.*', re.DOTALL)
content = modal_pattern.sub('', content)

# Add our Livewire modal and form
new_modal = '''
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
</div>
'''

content += new_modal

# Remove the old profile-actions so it's not duplicated
content = re.sub(r'<div class="profile-actions">.*?</div>', '', content, flags=re.DOTALL)

with open('resources/views/livewire/student/profile.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
