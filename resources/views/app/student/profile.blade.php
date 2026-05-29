<x-layouts::app :title="__('My Profile')">
<!-- Profile Card -->
<div class="card profile-hero-card" style="margin-bottom: 24px;">
  <div class="profile-cover" style="height: 120px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); border-radius: 12px 12px 0 0;"></div>
  <div class="profile-avatar-wrapper" style="margin-top: -50px; padding-left: 24px; display: flex; align-items: flex-end; gap: 16px;">
    <div class="profile-avatar-lg" style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid var(--card-bg, #fff); background: var(--primary); color: white; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
      @if (auth()->user()->avatar)
          <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="w-full h-full rounded-full object-cover">
      @else
          {{ auth()->user()->initials() }}
      @endif
    </div>
  </div>
  <div class="profile-hero-body" style="padding: 20px 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
    <div class="profile-hero-info">
      <h2 class="profile-name" style="font-size: 1.5rem; font-weight: 700; margin: 0 0 4px;">{{ auth()->user()->name }}</h2>
      <p class="profile-role" style="margin: 0 0 10px; color: var(--text-muted, #666); font-size: 0.95rem;">Computer Science Student</p>
      <div class="profile-tags" style="display: flex; gap: 8px; flex-wrap: wrap;">
        <span class="tag tag-blue"><i class="fas fa-university"></i> Epoka University</span>
        <span class="tag tag-blue">3rd Year</span>
        <span class="tag tag-green"><i class="fas fa-star"></i> GPA 3.8</span>
      </div>
    </div>
    <div style="display: flex; gap: 8px;">
      <button class="btn btn-outline" onclick="openEditProfileModal()"><i class="fas fa-pen"></i> Edit Profile</button>
      <button class="btn btn-outline" onclick="openChangePasswordModal()"><i class="fas fa-key"></i> Change Password</button>
    </div>
  </div>
</div>

<!-- Two-Col Grid -->
<div class="two-col-grid" style="display: grid; grid-template-columns: 1fr 340px; gap: 24px;">

  <!-- LEFT Column -->
  <div class="col-main" style="display: flex; flex-direction: column; gap: 24px;">

    <!-- Personal Information -->
    <div class="card">
      <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Personal Information</h3>
        <button class="btn btn-sm btn-outline" onclick="openEditModal('Personal Information')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="card-body">
        <div class="info-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Full Name</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">{{ auth()->user()->name }}</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Email</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">{{ auth()->user()->email }}</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Phone</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">+355 69 456 7890</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Date of Birth</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">March 15, 2001</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Nationality</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">Albanian</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Academic Details -->
    <div class="card">
      <div class="card-header" style="margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Academic Details</h3>
      </div>
      <div class="card-body">
        <div class="info-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">University</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">Epoka University</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Faculty</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">Faculty of Engineering</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Department</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">Computer Science</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Year</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">3rd Year</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">GPA</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">3.8 / 4.0</div>
          </div>
          <div class="info-field">
            <div class="info-label" style="font-size: 0.8rem; color: var(--text-muted, #888); margin-bottom: 4px;">Student ID</div>
            <div class="info-value" style="font-weight: 600; font-size: 0.9rem;">CS-2021-0342</div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- RIGHT Column -->
  <div class="col-sidebar" style="display: flex; flex-direction: column; gap: 24px;">

    <!-- Skills & Interests -->
    <div class="card">
      <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Skills &amp; Interests</h3>
        <button class="btn btn-sm btn-outline" onclick="openEditModal('Skills & Interests')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="card-body">
        <div class="skill-tags" style="display: flex; gap: 6px; flex-wrap: wrap;">
          <span class="tag tag-blue">Python</span>
          <span class="tag tag-blue">JavaScript</span>
          <span class="tag tag-blue">React</span>
          <span class="tag tag-blue">SQL</span>
          <span class="tag tag-blue">Machine Learning</span>
          <span class="tag tag-blue">Data Analysis</span>
          <span class="tag tag-blue">UI/UX Design</span>
        </div>
      </div>
    </div>

    <!-- Languages -->
    <div class="card">
      <div class="card-header" style="margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Languages</h3>
      </div>
      <div class="card-body">
        <div class="language-item" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
          <div style="display: flex; align-items: center; gap: 8px;">
            <div class="language-flag" style="color: var(--text-muted, #888);"><i class="fas fa-globe"></i></div>
            <div class="language-info">
              <div class="language-name" style="font-weight: 600; font-size: 0.85rem;">English</div>
            </div>
          </div>
          <span class="tag tag-green">Fluent</span>
        </div>
        <div class="language-item" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
          <div style="display: flex; align-items: center; gap: 8px;">
            <div class="language-flag" style="color: var(--text-muted, #888);"><i class="fas fa-globe"></i></div>
            <div class="language-info">
              <div class="language-name" style="font-weight: 600; font-size: 0.85rem;">Albanian</div>
            </div>
          </div>
          <span class="tag tag-blue">Native</span>
        </div>
        <div class="language-item" style="display: flex; align-items: center; justify-content: space-between;">
          <div style="display: flex; align-items: center; gap: 8px;">
            <div class="language-flag" style="color: var(--text-muted, #888);"><i class="fas fa-globe"></i></div>
            <div class="language-info">
              <div class="language-name" style="font-weight: 600; font-size: 0.85rem;">Italian</div>
            </div>
          </div>
          <span class="tag tag-gray">Basic</span>
        </div>
      </div>
    </div>

    <!-- Social Links -->
    <div class="card">
      <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Social Links</h3>
        <button class="btn btn-sm btn-outline" onclick="openEditModal('Social Links')"><i class="fas fa-pen"></i> Edit</button>
      </div>
      <div class="card-body">
        <div class="social-link-item" style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
          <div class="social-icon linkedin" style="color: #0077b5; font-size: 1.25rem;"><i class="fab fa-linkedin"></i></div>
          <div class="social-info">
            <div class="social-platform" style="font-size: 0.8rem; color: var(--text-muted, #888);">LinkedIn</div>
            <a href="#" class="social-url" style="font-size: 0.8rem; color: var(--primary); text-decoration: none;">linkedin.com/in/wes-thompson</a>
          </div>
        </div>
        <div class="social-link-item" style="display: flex; align-items: center; gap: 10px;">
          <div class="social-icon github" style="color: #333; font-size: 1.25rem;"><i class="fab fa-github"></i></div>
          <div class="social-info">
            <div class="social-platform" style="font-size: 0.8rem; color: var(--text-muted, #888);">GitHub</div>
            <a href="#" class="social-url" style="font-size: 0.8rem; color: var(--primary); text-decoration: none;">github.com/wes-thompson</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Generic Edit Modal -->
<div id="editModal" style="display:flex;visibility:hidden;pointer-events:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:9990;align-items:center;justify-content:center;padding:20px;backdrop-filter:blur(4px);" onclick="if(event.target===this)closeEditModal()">
  <div style="background:var(--white);border-radius:20px;padding:32px;width:100%;max-width:440px;box-shadow:0 24px 64px rgba(0,0,0,.2);position:relative;animation:slideUpProf .25s cubic-bezier(.16,1,.3,1);">
    <button onclick="closeEditModal()" style="position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;color:var(--gray-600);font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
    <div style="font-size:1.05rem;font-weight:800;color:var(--gray-900);margin-bottom:20px;" id="editModalTitle">Edit Section</div>
    <div id="editModalBody" style="margin-bottom:20px;color:var(--gray-600);font-size:.87rem;">
      <!-- Content populated by JS -->
    </div>
    <div style="display:flex;gap:10px;">
      <button onclick="closeEditModal()" style="flex:1;padding:12px;border-radius:10px;background:var(--gray-100);color:var(--gray-700);border:none;font-size:.88rem;font-weight:700;cursor:pointer;">Cancel</button>
      <button onclick="saveEdit()" style="flex:1;padding:12px;border-radius:10px;background:var(--primary);color:#fff;border:none;font-size:.88rem;font-weight:700;cursor:pointer;"><i class="fas fa-check"></i> Save Changes</button>
    </div>
  </div>
</div>

<!-- Change Password Modal -->
<div id="changePasswordModal" style="display:flex;visibility:hidden;pointer-events:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:9990;align-items:center;justify-content:center;padding:20px;backdrop-filter:blur(4px);" onclick="if(event.target===this)closeChangePasswordModal()">
  <div style="background:var(--white);border-radius:20px;padding:32px;width:100%;max-width:440px;box-shadow:0 24px 64px rgba(0,0,0,.2);position:relative;animation:slideUpProf .25s cubic-bezier(.16,1,.3,1);">
    <button onclick="closeChangePasswordModal()" style="position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;color:var(--gray-600);font-size:14px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-xmark"></i></button>
    
    <div style="font-size:1.25rem;font-weight:800;color:var(--gray-900);margin-bottom:8px;display:flex;align-items:center;gap:10px;">
      <div style="width:36px;height:36px;border-radius:8px;background:var(--primary-bg);color:var(--primary);display:flex;align-items:center;justify-content:center;"><i class="fas fa-key"></i></div>
      Change Password
    </div>
    <p style="font-size:.82rem;color:var(--text-muted);margin:0 0 20px;">Update your password to secure your account. Make sure it is strong and unique.</p>
    
    <div style="display:flex;flex-direction:column;gap:16px;margin-bottom:24px;">
      <div>
        <label style="font-size:.78rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:6px;">Current Password</label>
        <input type="password" id="change-pass-current" style="width:100%;padding:10px 14px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;transition:all 0.2s;" placeholder="••••••••" onfocus="this.style.borderColor='var(--primary)';this.style.background='var(--white)';" onblur="this.style.borderColor='var(--border)';this.style.background='var(--gray-50)';">
      </div>
      <div>
        <label style="font-size:.78rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:6px;">New Password</label>
        <input type="password" id="change-pass-new" style="width:100%;padding:10px 14px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;transition:all 0.2s;" placeholder="At least 6 characters" onfocus="this.style.borderColor='var(--primary)';this.style.background='var(--white)';" onblur="this.style.borderColor='var(--border)';this.style.background='var(--gray-50)';">
      </div>
      <div>
        <label style="font-size:.78rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:6px;">Confirm New Password</label>
        <input type="password" id="change-pass-confirm" style="width:100%;padding:10px 14px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;transition:all 0.2s;" placeholder="Re-type new password" onfocus="this.style.borderColor='var(--primary)';this.style.background='var(--white)';" onblur="this.style.borderColor='var(--border)';this.style.background='var(--gray-50)';">
      </div>
    </div>
    
    <div style="display:flex;gap:12px;">
      <button onclick="closeChangePasswordModal()" style="flex:1;padding:12px;border-radius:10px;background:var(--gray-100);color:var(--gray-700);border:none;font-size:.88rem;font-weight:700;cursor:pointer;transition:all 0.2s;" onmouseover="this.style.background='var(--gray-200)'" onmouseout="this.style.background='var(--gray-100)'">Cancel</button>
      <button onclick="submitChangePassword()" style="flex:1;padding:12px;border-radius:10px;background:var(--primary);color:#fff;border:none;font-size:.88rem;font-weight:700;cursor:pointer;transition:all 0.2s;" onmouseover="this.style.opacity='0.95'" onmouseout="this.style.opacity='1'"><i class="fas fa-check"></i> Save Password</button>
    </div>
  </div>
</div>

<style>
  #editModal.open, #changePasswordModal.open { visibility: visible; pointer-events: all; }
  @keyframes slideUpProf { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:none; } }
</style>

<script>
function showToast(msg,type){ if(window.showGlobalToast) showGlobalToast(msg,type); }
let editSection = '';

function openEditProfileModal() {
  openEditModal('Edit Profile');
}

function openEditModal(section) {
  editSection = section;
  document.getElementById('editModalTitle').textContent = 'Edit ' + section;
  const bodies = {
    'Personal Information': `<div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
      <div><label style="font-size:.75rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:4px;">Full Name</label><input style="width:100%;padding:9px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;" value="{{ auth()->user()->name }}"></div>
      <div><label style="font-size:.75rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:4px;">Phone</label><input style="width:100%;padding:9px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;" value="+355 69 456 7890"></div>
      <div><label style="font-size:.75rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:4px;">Date of Birth</label><input type="date" style="width:100%;padding:9px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;" value="2001-03-15"></div>
      <div><label style="font-size:.75rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:4px;">Nationality</label><input style="width:100%;padding:9px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;" value="Albanian"></div>
    </div>`,
    'Edit Profile': `<p style="margin:0 0 12px;">Update your profile picture, name or headline.</p><div><label style="font-size:.75rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:4px;">Full Name</label><input style="width:100%;padding:9px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;" value="{{ auth()->user()->name }}"></div>`,
    'Skills & Interests': `<p style="margin:0 0 12px;">Add or remove skills (comma separated):</p><textarea style="width:100%;padding:10px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;resize:vertical;font-family:inherit;box-sizing:border-box;" rows="4">Python, JavaScript, React, SQL, Machine Learning, Data Analysis, UI/UX Design</textarea>`,
    'Social Links': `<div style="display:flex;flex-direction:column;gap:10px;">
      <div><label style="font-size:.75rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:4px;">LinkedIn</label><input style="width:100%;padding:9px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;" value="linkedin.com/in/wes-thompson"></div>
      <div><label style="font-size:.75rem;font-weight:700;color:var(--gray-700);display:block;margin-bottom:4px;">GitHub</label><input style="width:100%;padding:9px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:.87rem;background:var(--gray-50);color:inherit;outline:none;box-sizing:border-box;" value="github.com/wes-thompson"></div>
    </div>`,
  };
  document.getElementById('editModalBody').innerHTML = bodies[section] || '<p>Edit your ' + section + ' details below.</p>';
  document.getElementById('editModal').classList.add('open');
}

function closeEditModal() { document.getElementById('editModal').classList.remove('open'); }

function saveEdit() {
  closeEditModal();
  showToast(editSection + ' updated successfully', 'success');
}

function openChangePasswordModal() {
  document.getElementById('change-pass-current').value = '';
  document.getElementById('change-pass-new').value = '';
  document.getElementById('change-pass-confirm').value = '';
  document.getElementById('changePasswordModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeChangePasswordModal() {
  document.getElementById('changePasswordModal').classList.remove('open');
  document.body.style.overflow = '';
}

function submitChangePassword() {
  const current = document.getElementById('change-pass-current').value.trim();
  const newPass = document.getElementById('change-pass-new').value.trim();
  const confirmPass = document.getElementById('change-pass-confirm').value.trim();
  
  if (!current) {
    showToast('Please enter your current password.', 'info');
    return;
  }
  if (newPass.length < 6) {
    showToast('New password must be at least 6 characters long.', 'info');
    return;
  }
  if (newPass !== confirmPass) {
    showToast('Passwords do not match.', 'info');
    return;
  }
  
  closeChangePasswordModal();
  showToast('Password updated successfully', 'success');
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    closeEditModal();
    closeChangePasswordModal();
  }
});
</script>
</x-layouts::app>
