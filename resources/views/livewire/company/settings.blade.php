<div>
<!-- PREMIUM PAGE HEADER -->
<div class="settings-page-header">
  <div class="settings-header-bg"></div>
  <div class="settings-header-content">
    <div class="settings-header-icon"><i class="fas fa-gear"></i></div>
    <div>
      <h2 class="settings-h2">Company Settings</h2>
      <p class="settings-subtitle">Configure company profile, defaults, notifications, security, and appearance</p>
    </div>
    <div style="margin-left:auto;">
      <div class="settings-saved-badge" id="autosaveBadge" style="display:none;">
        <i class="fas fa-cloud-check"></i> Auto-saved
      </div>
    </div>
  </div>
</div>

<!-- TABBED LAYOUT -->
<div class="settings-layout">

  <!-- SIDEBAR NAV -->
  <div class="settings-sidebar">
    <div class="settings-nav-group">
      <div class="settings-nav-label">Settings Sections</div>
      <a href="javascript:void(0)" class="settings-nav-item active" onclick="switchTab('profile', this)" id="nav-profile">
        <div class="settings-nav-icon" style="background:rgba(37,99,235,0.12);color:var(--primary)"><i class="fas fa-building"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Company Profile</span>
          <span class="settings-nav-desc">Public company details</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
      <a href="javascript:void(0)" class="settings-nav-item" onclick="switchTab('defaults', this)" id="nav-defaults">
        <div class="settings-nav-icon" style="background:rgba(139,92,246,0.12);color:#8B5CF6"><i class="fas fa-briefcase"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Posting Defaults</span>
          <span class="settings-nav-desc">Pre-fill configuration</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
      <a href="javascript:void(0)" class="settings-nav-item" onclick="switchTab('notifications', this)" id="nav-notifications">
        <div class="settings-nav-icon" style="background:rgba(245,158,11,0.12);color:var(--warning)"><i class="fas fa-bell"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Notifications</span>
          <span class="settings-nav-desc">Email alerts & digests</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
      <a href="javascript:void(0)" class="settings-nav-item" onclick="switchTab('security', this)" id="nav-security">
        <div class="settings-nav-icon" style="background:rgba(16,185,129,0.12);color:var(--green)"><i class="fas fa-shield-halved"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Security & Account</span>
          <span class="settings-nav-desc">Access & authentication</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
      <a href="javascript:void(0)" class="settings-nav-item" onclick="switchTab('appearance', this)" id="nav-appearance">
        <div class="settings-nav-icon" style="background:rgba(99,102,241,0.12);color:#6366F1"><i class="fas fa-palette"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Appearance</span>
          <span class="settings-nav-desc">Theme & interface layout</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
    </div>
    <div class="settings-nav-divider"></div>
    <div class="settings-nav-group">
      <div class="settings-nav-label">Danger</div>
      <a href="javascript:void(0)" class="settings-nav-item danger-nav" onclick="switchTab('danger', this)" id="nav-danger">
        <div class="settings-nav-icon" style="background:rgba(239,68,68,0.12);color:var(--danger)"><i class="fas fa-triangle-exclamation"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Danger Zone</span>
          <span class="settings-nav-desc">Irreversible options</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
    </div>

    <!-- Info Card -->
    <div class="platform-info-card">
      <div class="platform-info-row"><i class="fas fa-tag"></i><span>Portal v2.4.1</span></div>
      <div class="platform-info-row"><i class="fas fa-circle" style="color:var(--green);font-size:8px"></i><span>Connected to Server</span></div>
    </div>
  </div>

  <!-- CONTENT AREA -->
  <div class="settings-content">

    <!-- ══════════════ COMPANY PROFILE ══════════════ -->
    <div id="tab-profile" class="settings-pane">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-building"></i></div>
          <div>
            <h3 class="settings-card-title">Company Profile</h3>
            <p class="settings-card-sub">Update your company's public information for candidates</p>
          </div>
        </div>

        <div class="settings-form">
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Company Name</div>
              <div class="settings-field-desc">Legal name shown on postings</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-building sf-icon"></i>
                <input type="text" class="sf-input" wire:model="company_name" placeholder="TechSolutions Inc." />
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Industry</div>
              <div class="settings-field-desc">Primary business domain</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-sliders sf-icon"></i>
                <select class="sf-input sf-select" wire:model="industry">
                  <option value="">Select Industry</option>
                  <option value="Technology">Technology</option>
                  <option value="Finance">Finance</option>
                  <option value="Healthcare">Healthcare</option>
                  <option value="Education">Education</option>
                  <option value="Retail">Retail</option>
                </select>
                <i class="fas fa-chevron-down sf-sel-arrow"></i>
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Company Website</div>
              <div class="settings-field-desc">Official web address</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-globe sf-icon"></i>
                <input type="url" class="sf-input" wire:model="website" placeholder="https://techsolutions.com" />
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Company Size</div>
              <div class="settings-field-desc">Number of active employees</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-users sf-icon"></i>
                <select class="sf-input sf-select" wire:model="company_size">
                  <option value="1–50">1–50</option>
                  <option value="51–100">51–100</option>
                  <option value="100–500">100–500</option>
                  <option value="500–1000">500–1000</option>
                  <option value="1000+">1000+</option>
                </select>
                <i class="fas fa-chevron-down sf-sel-arrow"></i>
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Founded Year</div>
              <div class="settings-field-desc">The year your organization was established</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-calendar sf-icon"></i>
                <input type="text" class="sf-input" wire:model="founded" placeholder="2012" />
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Headquarters</div>
              <div class="settings-field-desc">Main corporate office location</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-map-marker-alt sf-icon"></i>
                <input type="text" class="sf-input" wire:model="city" placeholder="New York" style="margin-bottom: 8px;" />
                <input type="text" class="sf-input" wire:model="country" placeholder="USA" />
              </div>
            </div>
          </div>
          <div class="settings-field-row" style="border-bottom:none;padding-bottom:0;">
            <div class="settings-field-info">
              <div class="settings-field-title">Company Description</div>
              <div class="settings-field-desc">Brief summary explaining your business and values</div>
            </div>
            <div class="settings-field-control" style="width:100%;margin-top:10px;">
              <textarea class="sf-input" wire:model="description" style="min-height:100px;resize:vertical;" placeholder="Enter company description..."></textarea>
            </div>
          </div>
        </div>

        <div class="settings-form-footer">
          <button type="button" class="btn btn-outline btn-sm" onclick="resetProfile()">Reset Defaults</button>
          <button type="button" class="btn btn-primary" wire:click="saveProfile"><i class="fas fa-floppy-disk"></i> Save Profile</button>
        </div>
      </div>
    </div>

    <!-- ══════════════ POSTING DEFAULTS ══════════════ -->
    <div id="tab-defaults" class="settings-pane" style="display:none;">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(139,92,246,0.1);color:#8B5CF6"><i class="fas fa-briefcase"></i></div>
          <div>
            <h3 class="settings-card-title">Internship Posting Defaults</h3>
            <p class="settings-card-sub">Pre-fill fields to save time when uploading new listings</p>
          </div>
        </div>

        <div class="settings-form">
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Default Duration</div>
              <div class="settings-field-desc">Default period for internship postings</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-clock sf-icon"></i>
                <select class="sf-input sf-select" id="d-duration">
                  <option>1 month</option>
                  <option>2 months</option>
                  <option selected>3 months</option>
                  <option>4 months</option>
                  <option>6 months</option>
                </select>
                <i class="fas fa-chevron-down sf-sel-arrow"></i>
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Default Location</div>
              <div class="settings-field-desc">Default office or remote location</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-map-marker-alt sf-icon"></i>
                <input type="text" class="sf-input" id="d-location" value="Remote" />
              </div>
            </div>
          </div>
          <div class="settings-field-row" style="border-bottom:none;padding-bottom:0;">
            <div class="settings-field-info">
              <div class="settings-field-title">Max Applicants per Posting</div>
              <div class="settings-field-desc">Automatic application cap (0 for unlimited)</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-user-plus sf-icon"></i>
                <input type="number" class="sf-input" id="d-max-applicants" value="50" />
              </div>
            </div>
          </div>
        </div>

        <div class="settings-form-footer">
          <button type="button" class="btn btn-outline btn-sm" onclick="resetDefaults()">Reset</button>
          <button type="button" class="btn btn-primary" onclick="saveDefaults()"><i class="fas fa-floppy-disk"></i> Save Defaults</button>
        </div>
      </div>
    </div>

    <!-- ══════════════ NOTIFICATIONS ══════════════ -->
    <div id="tab-notifications" class="settings-pane" style="display:none;">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-bell"></i></div>
          <div>
            <h3 class="settings-card-title">Notification Preferences</h3>
            <p class="settings-card-sub">Choose when you wish to get notified by email</p>
          </div>
        </div>

        <div class="toggle-list">
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-envelope"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Application Alerts</div>
              <div class="toggle-item-desc">Receive email when new candidates apply</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-application" checked onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-clock"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Interview Reminders</div>
              <div class="toggle-item-desc">Get notified 1 hour before scheduled interviews</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-interviews" checked onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(16,185,129,0.1);color:var(--green)"><i class="fas fa-chart-bar"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Weekly Summary</div>
              <div class="toggle-item-desc">Receive a weekly digest of hiring activity</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-weekly" checked onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item" style="border-bottom:none;">
            <div class="toggle-item-icon-wrap" style="background:rgba(99,102,241,0.1);color:#6366F1"><i class="fas fa-comments"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">New Messages</div>
              <div class="toggle-item-desc">Notify when applicants send you a message</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-messages" onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
        </div>

        <div class="settings-form-footer">
          <button class="btn btn-outline btn-sm" onclick="resetNotifications()">Reset</button>
          <button class="btn btn-primary" onclick="showSettingsToast('Notification preferences saved!')"><i class="fas fa-floppy-disk"></i> Save Preferences</button>
        </div>
      </div>
    </div>

    <!-- ══════════════ SECURITY & ACCOUNT ══════════════ -->
    <div id="tab-security" class="settings-pane" style="display:none;">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(16,185,129,0.1);color:var(--green)"><i class="fas fa-shield-halved"></i></div>
          <div>
            <h3 class="settings-card-title">Security &amp; Account</h3>
            <p class="settings-card-sub">Manage your access and credentials</p>
          </div>
        </div>

        <div class="toggle-list">
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-key"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Two-Factor Authentication</div>
              <div class="toggle-item-desc">Require extra login security codes</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="s-2fa" checked onchange="saveSecurityToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(99,102,241,0.1);color:#6366F1"><i class="fas fa-eye"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Public Company Profile</div>
              <div class="toggle-item-desc">Allow students to discover your company page</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="s-public" checked onchange="saveSecurityToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
        </div>

        <!-- Account details -->
        <div style="padding:0 26px 20px;">
          <div class="settings-divider" style="margin-bottom:16px;"></div>
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;background:var(--gray-50);padding:12px 16px;border-radius:10px;border:1px solid var(--border);">
            <div>
              <div style="font-size:13px;font-weight:600;color:var(--gray-800)">Email Address</div>
              <div style="font-size:12px;color:var(--text-muted);margin-top:2px;">contact@techsolutions.com</div>
            </div>
            <span class="status-badge" style="background:var(--green-bg);color:var(--green);font-size:11px;font-weight:700;"><i class="fas fa-circle-check" style="font-size:10px;margin-right:4px;"></i> Verified</span>
          </div>
          <button type="button" class="btn btn-outline" style="width:100%;justify-content:center;" onclick="openChangePasswordModal()"><i class="fas fa-key"></i> Change Password</button>
        </div>

        <div class="settings-form-footer">
          <button class="btn btn-outline btn-sm" onclick="resetSecurity()">Reset</button>
          <button class="btn btn-primary" onclick="showSettingsToast('Security settings saved!')"><i class="fas fa-floppy-disk"></i> Save Security Settings</button>
        </div>
      </div>
    </div>

    <!-- ══════════════ APPEARANCE ══════════════ -->
    <div id="tab-appearance" class="settings-pane" style="display:none;">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(99,102,241,0.1);color:#6366F1"><i class="fas fa-palette"></i></div>
          <div>
            <h3 class="settings-card-title">Appearance Customization</h3>
            <p class="settings-card-sub">Customize the look and layout feel of your company dashboard</p>
          </div>
        </div>

        <div class="settings-form">

          <!-- COLOR THEME -->
          <div class="settings-field-row" style="align-items:flex-start;padding-bottom:24px;">
            <div class="settings-field-info">
              <div class="settings-field-title">Accent Color Theme</div>
              <div class="settings-field-desc">Primary theme colors applied across your portal</div>
              <div class="theme-preview-label">Current: <strong id="currentThemeLabel">Teal</strong></div>
            </div>
            <div class="settings-field-control" style="width:auto;">
              <div class="theme-palette">
                <button type="button" class="theme-swatch" data-theme="teal"
                  style="background:linear-gradient(135deg,#00b1aa,#4cd1cc)" title="Teal (Default)"
                  onclick="applyTheme('teal',this,'Teal')">
                  <i class="fas fa-check theme-check-icon"></i>
                </button>
                <button type="button" class="theme-swatch" data-theme="blue"
                  style="background:linear-gradient(135deg,#2563EB,#60A5FA)" title="Blue"
                  onclick="applyTheme('blue',this,'Blue')">
                  <i class="fas fa-check theme-check-icon"></i>
                </button>
                <button type="button" class="theme-swatch" data-theme="green"
                  style="background:linear-gradient(135deg,#10B981,#34D399)" title="Green"
                  onclick="applyTheme('green',this,'Green')">
                  <i class="fas fa-check theme-check-icon"></i>
                </button>
                <button type="button" class="theme-swatch" data-theme="indigo"
                  style="background:linear-gradient(135deg,#6366F1,#A5B4FC)" title="Indigo"
                  onclick="applyTheme('indigo',this,'Indigo')">
                  <i class="fas fa-check theme-check-icon"></i>
                </button>
                <button type="button" class="theme-swatch" data-theme="amber"
                  style="background:linear-gradient(135deg,#F59E0B,#FCD34D)" title="Amber"
                  onclick="applyTheme('amber',this,'Amber')">
                  <i class="fas fa-check theme-check-icon"></i>
                </button>
                <button type="button" class="theme-swatch" data-theme="red"
                  style="background:linear-gradient(135deg,#EF4444,#FCA5A5)" title="Rose"
                  onclick="applyTheme('red',this,'Rose')">
                  <i class="fas fa-check theme-check-icon"></i>
                </button>
              </div>
              <!-- Live preview strip -->
              <div class="theme-live-preview" id="themePreviewStrip">
                <div class="tlp-btn" style="background:var(--primary);color:#fff;border-radius:6px;padding:6px 14px;font-size:12px;font-weight:600;">Button</div>
                <div class="tlp-badge" style="background:var(--primary-bg);color:var(--primary);border-radius:20px;padding:4px 12px;font-size:11px;font-weight:600;">Active</div>
                <div class="tlp-bar" style="height:6px;background:var(--primary);border-radius:3px;flex:1;"></div>
                <div class="tlp-link" style="color:var(--primary);font-size:12px;font-weight:600;">Link →</div>
              </div>
            </div>
          </div>

          <!-- DARK MODE -->
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Global Dark Mode</div>
              <div class="settings-field-desc">Render page content on dark slate backgrounds</div>
            </div>
            <div class="settings-field-control">
              <div class="dark-mode-toggle-wrap">
                <label class="premium-toggle">
                  <input type="checkbox" id="a-darkmode" onchange="applyDarkMode(this.checked)" />
                  <span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span>
                </label>
                <span class="dark-mode-label" id="darkModeLabel">Off</span>
              </div>
            </div>
          </div>

          <!-- DISPLAY DENSITY -->
          <div class="settings-field-row" style="border-bottom:none;padding-bottom:0;">
            <div class="settings-field-info">
              <div class="settings-field-title">Sidebar Density</div>
              <div class="settings-field-desc">Control how compact the navigation sidebar appears</div>
            </div>
            <div class="settings-field-control">
              <div class="density-selector">
                <button type="button" class="density-btn" id="density-comfortable" onclick="applyDensity('comfortable')">
                  <i class="fas fa-align-justify"></i> Comfortable
                </button>
                <button type="button" class="density-btn" id="density-compact" onclick="applyDensity('compact')">
                  <i class="fas fa-bars"></i> Compact
                </button>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-form-footer">
          <button class="btn btn-outline btn-sm" onclick="resetAppearance()">Reset to Defaults</button>
          <button class="btn btn-primary" onclick="showSettingsToast('Appearance settings saved!')"><i class="fas fa-floppy-disk"></i> Apply Appearance</button>
        </div>
      </div>
    </div>

    <!-- ══════════════ DANGER ZONE ══════════════ -->
    <div id="tab-danger" class="settings-pane" style="display:none;">
      <div class="settings-card danger-zone-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(239,68,68,0.1);color:var(--danger)"><i class="fas fa-triangle-exclamation"></i></div>
          <div>
            <h3 class="settings-card-title" style="color:var(--danger)">Danger Zone</h3>
            <p class="settings-card-sub">Destructive and irreversible account actions</p>
          </div>
        </div>
        <div class="danger-actions-list">
          <div class="danger-action-item">
            <div class="danger-action-icon"><i class="fas fa-rotate-left"></i></div>
            <div class="danger-action-info">
              <div class="danger-action-title">Reset Profile Defaults</div>
              <div class="danger-action-desc">Restore all company metadata fields back to initial values.</div>
            </div>
            <button class="btn-danger-outline" onclick="openDangerModal('Reset Profile Defaults','All profile modifications will be permanently deleted. This cannot be undone.','#EF4444','resetAllSettings')">Reset Profile</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ═══════════════ DANGER CONFIRM MODAL ═══════════════ -->
<div class="modal-overlay" id="dangerModal" onclick="if(event.target===this)closeDangerModal()">
  <div class="danger-confirm-modal">
    <div class="danger-confirm-icon-wrap">
      <div class="danger-confirm-icon" id="dangerModalIconBg"><i class="fas fa-triangle-exclamation"></i></div>
    </div>
    <h3 id="dangerModalTitle">Confirm Action</h3>
    <p id="dangerModalDesc">This action is irreversible.</p>

    <!-- Confirmation Input -->
    <div class="danger-confirm-input-wrap">
      <label class="danger-confirm-input-label">Type <strong>CONFIRM</strong> to proceed:</label>
      <input type="text" class="danger-confirm-input" id="dangerConfirmInput" placeholder="CONFIRM" oninput="checkDangerConfirm()" />
    </div>

    <div class="danger-confirm-btns">
      <button class="btn btn-outline" onclick="closeDangerModal()">Cancel</button>
      <button class="btn btn-danger" id="dangerProceedBtn" disabled onclick="executeDangerAction()">
        <i class="fas fa-check"></i> Proceed
      </button>
    </div>
  </div>
</div>

<!-- ═══════════════ CHANGE PASSWORD MODAL ═══════════════ -->
<div class="modal-overlay" id="changePasswordModal" onclick="if(event.target===this)closeChangePasswordModal()">
  <div style="background:var(--white);border-radius:20px;padding:32px;width:100%;max-width:440px;box-shadow:0 24px 64px rgba(0,0,0,.2);position:relative;animation:slideUpProf .25s cubic-bezier(.16,1,.3,1);">
    <button onclick="closeChangePasswordModal()" style="position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;color:var(--gray-600);font-size:14px;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"><i class="fas fa-xmark"></i></button>
    
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

<!-- TOAST -->
<div class="toast-notification" id="settingsToast">
  <i class="fas fa-circle-check toast-icon" id="toastIcon"></i>
  <span id="settings-toast-msg">Saved!</span>
</div>

<style>
/* ══ PAGE HEADER ══ */
.settings-page-header {
  position:relative;background:linear-gradient(135deg,var(--primary-dark) 0%,var(--primary) 50%,var(--primary-light) 100%);
  border-radius:16px;margin-bottom:28px;overflow:hidden;padding:28px 32px;
}
.settings-header-bg {
  position:absolute;inset:0;
  background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='20'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.settings-header-content { position:relative;z-index:1;display:flex;align-items:center;gap:20px; }
.settings-header-icon { width:56px;height:56px;border-radius:14px;background:rgba(255,255,255,0.15);backdrop-filter:blur(8px);display:flex;align-items:center;justify-content:center;font-size:24px;color:#fff;flex-shrink:0; }
.settings-h2 { font-size:22px;font-weight:800;color:#fff;margin:0 0 4px; }
.settings-subtitle { font-size:13px;color:rgba(255,255,255,0.8);margin:0; }
.settings-saved-badge { background:rgba(255,255,255,0.2);color:#fff;border-radius:20px;padding:6px 14px;font-size:12px;font-weight:600;display:flex;align-items:center;gap:7px;backdrop-filter:blur(8px);animation:fadeIn .3s ease; }
@keyframes fadeIn { from{opacity:0;transform:translateY(-4px)} to{opacity:1;transform:translateY(0)} }

/* ══ LAYOUT ══ */
.settings-layout { display:flex;gap:24px;align-items:flex-start; }

/* ══ SIDEBAR ══ */
.settings-sidebar { width:260px;flex-shrink:0;background:var(--white);border-radius:16px;border:1px solid var(--border);box-shadow:var(--shadow-sm);padding:16px;position:sticky;top:80px; }
.settings-nav-label { font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--gray-400);padding:4px 8px 10px; }
.settings-nav-item { display:flex;align-items:center;gap:12px;padding:10px;border-radius:10px;cursor:pointer;transition:var(--transition);margin-bottom:2px;text-decoration:none;color:inherit; }
.settings-nav-item:hover { background:var(--gray-50); }
.settings-nav-item.active { background:var(--primary-bg); }
.settings-nav-item.active .settings-nav-title { color:var(--primary); }
.settings-nav-item.active .settings-nav-arrow { color:var(--primary);opacity:1; }
.danger-nav.active { background:rgba(239,68,68,0.06); }
.danger-nav.active .settings-nav-title { color:var(--danger); }
.danger-nav.active .settings-nav-arrow { color:var(--danger);opacity:1; }
.settings-nav-icon { width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0; }
.settings-nav-text { flex:1; }
.settings-nav-title { display:block;font-size:13px;font-weight:600;color:var(--gray-800); }
.settings-nav-desc  { display:block;font-size:11px;color:var(--gray-400);margin-top:1px; }
.settings-nav-arrow { font-size:11px;color:var(--gray-300);opacity:0.5;transition:var(--transition); }
.settings-nav-divider { height:1px;background:var(--gray-100);margin:12px 0; }
.platform-info-card { margin-top:16px;padding:12px 14px;background:var(--gray-50);border-radius:10px;border:1px solid var(--gray-100); }
.platform-info-row { display:flex;align-items:center;gap:8px;font-size:12px;color:var(--gray-500);padding:3px 0; }
.platform-info-row i { width:14px;text-align:center; }

/* ══ CONTENT ══ */
.settings-content { flex:1; }
.settings-card { background:var(--white);border-radius:16px;border:1px solid var(--border);box-shadow:var(--shadow-sm);overflow:hidden; }
.settings-card-header { display:flex;align-items:center;gap:14px;padding:22px 26px;border-bottom:1px solid var(--border);background:var(--gray-50); }
.settings-card-icon-wrap { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0; }
.settings-card-title { font-size:16px;font-weight:700;color:var(--gray-800);margin:0 0 2px; }
.settings-card-sub   { font-size:12px;color:var(--gray-400);margin:0; }

/* ══ FIELD ROWS ══ */
.settings-form { padding:0 26px 8px; }
.settings-field-row { display:flex;align-items:center;gap:24px;padding:18px 0;border-bottom:1px solid var(--border); }
.settings-field-info { flex:1; }
.settings-field-title { font-size:13px;font-weight:600;color:var(--gray-800); }
.settings-field-desc  { font-size:12px;color:var(--gray-400);margin-top:2px; }
.settings-field-control { width:240px;flex-shrink:0; }
.settings-divider { height:1px;background:var(--border);margin:4px 0; }

.sf-input-wrap { position:relative; }
.sf-icon { position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px;pointer-events:none; }
.sf-input { width:100%;padding:9px 14px;border:1.5px solid var(--border);border-radius:8px;font-size:13px;color:var(--gray-800);background:var(--white);outline:none;transition:var(--transition);font-family:inherit; }
.sf-input:focus { border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-bg); }
.sf-input::placeholder { color:var(--gray-400); }
.sf-input-wrap .sf-input { padding-left:32px; }
.sf-select { appearance:none;cursor:pointer;padding-right:30px; }
.sf-sel-arrow { position:absolute;right:10px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:10px;pointer-events:none; }

/* ══ TOGGLES ══ */
.toggle-list { padding:0 26px 8px; }
.toggle-item { display:flex;align-items:center;gap:14px;padding:16px 0;border-bottom:1px solid var(--border); }
.toggle-item-icon-wrap { width:38px;height:38px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0; }
.toggle-item-info { flex:1; }
.toggle-item-title { font-size:13px;font-weight:600;color:var(--gray-800); }
.toggle-item-desc  { font-size:12px;color:var(--gray-400);margin-top:2px; }
.premium-toggle { position:relative;display:inline-block;flex-shrink:0; }
.premium-toggle input { opacity:0;width:0;height:0;position:absolute; }
.premium-toggle-track { display:block;width:44px;height:24px;background:var(--gray-200);border-radius:12px;cursor:pointer;transition:background .3s ease;position:relative; }
.premium-toggle input:checked + .premium-toggle-track { background:var(--primary); }
.premium-toggle-thumb { position:absolute;width:18px;height:18px;background:#fff;border-radius:50%;top:3px;left:3px;transition:transform .3s cubic-bezier(.34,1.56,.64,1);box-shadow:0 1px 4px rgba(0,0,0,.2); }
.premium-toggle input:checked ~ .premium-toggle-track .premium-toggle-thumb { transform:translateX(20px); }

/* ══ THEME PALETTE ══ */
.theme-palette { display:flex;gap:10px;flex-wrap:wrap;margin-bottom:14px; }
.theme-swatch { width:42px;height:42px;border-radius:50%;border:3px solid transparent;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .22s ease;outline:none;box-shadow:0 2px 8px rgba(0,0,0,0.15); }
.theme-swatch:hover { transform:scale(1.15);box-shadow:0 4px 16px rgba(0,0,0,0.25); }
.theme-swatch.active { border:3px solid #fff;box-shadow:0 0 0 3px var(--gray-800),0 4px 12px rgba(0,0,0,0.2); }
.theme-check-icon { color:transparent;font-size:14px;font-weight:900;filter:drop-shadow(0 1px 2px rgba(0,0,0,0.3)); }
.theme-swatch.active .theme-check-icon { color:#fff; }

.theme-preview-label { margin-top:8px;font-size:11px;color:var(--gray-400);font-weight:500; }
.theme-live-preview { display:flex;align-items:center;gap:10px;margin-top:4px;padding:10px 14px;background:var(--gray-50);border-radius:10px;border:1px solid var(--border); }

/* Dark mode toggle */
.dark-mode-toggle-wrap { display:flex;align-items:center;gap:10px; }
.dark-mode-label { font-size:12px;font-weight:600;color:var(--gray-500);min-width:24px; }

/* Density */
.density-selector { display:flex;gap:8px; }
.density-btn { flex:1;padding:8px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:12px;font-weight:600;color:var(--gray-500);background:var(--white);cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:6px;justify-content:center;font-family:inherit; }
.density-btn:hover { border-color:var(--primary);color:var(--primary);background:var(--primary-bg); }
.density-btn.active { border-color:var(--primary);color:var(--primary);background:var(--primary-bg); }

/* ══ FORM FOOTER ══ */
.settings-form-footer { display:flex;gap:10px;justify-content:flex-end;padding:18px 26px;border-top:1px solid var(--border);background:var(--gray-50);margin-top:8px; }

/* ══ DANGER ZONE ══ */
.danger-zone-card { border-color:rgba(239,68,68,0.2); }
.danger-zone-card .settings-card-header { background:rgba(239,68,68,0.04); }
.danger-actions-list { padding:0 26px; }
.danger-action-item { display:flex;align-items:center;gap:16px;padding:20px 0;border-bottom:1px solid var(--border); }
.danger-action-icon { width:42px;height:42px;border-radius:10px;background:rgba(239,68,68,0.1);color:var(--danger);display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
.danger-action-info { flex:1; }
.danger-action-title { font-size:14px;font-weight:600;color:var(--gray-800); }
.danger-action-desc  { font-size:12px;color:var(--gray-400);margin-top:3px; }
.btn-danger-outline { padding:8px 18px;border-radius:8px;border:1.5px solid rgba(239,68,68,0.35);background:transparent;color:var(--danger);font-size:13px;font-weight:600;cursor:pointer;transition:var(--transition);white-space:nowrap;font-family:inherit; }
.btn-danger-outline:hover { background:rgba(239,68,68,0.08);border-color:var(--danger); }

/* ══ DANGER MODAL ══ */
.modal-overlay { display:none;position:fixed;inset:0;background:rgba(15,23,42,.6);backdrop-filter:blur(6px);z-index:1000;align-items:center;justify-content:center; }
.modal-overlay.open { display:flex;animation:fadeInO .2s ease; }
@keyframes fadeInO { from{opacity:0} to{opacity:1} }
.danger-confirm-modal { background:var(--white);border-radius:18px;box-shadow:0 24px 64px rgba(0,0,0,.22);width:420px;max-width:94vw;padding:36px 30px;text-align:center;animation:popIn .25s cubic-bezier(.16,1,.3,1);border:1px solid var(--border); }
@keyframes popIn { from{transform:scale(.9);opacity:0} to{transform:scale(1);opacity:1} }
.danger-confirm-icon-wrap { margin-bottom:18px; }
.danger-confirm-icon { width:72px;height:72px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:28px;background:rgba(239,68,68,0.1);color:var(--danger); }
.danger-confirm-modal h3 { font-size:19px;font-weight:700;color:var(--gray-800);margin:0 0 10px; }
.danger-confirm-modal p { font-size:13px;color:var(--gray-500);line-height:1.65;margin:0 0 22px; }
.danger-confirm-input-wrap { text-align:left;margin-bottom:22px; }
.danger-confirm-input-label { font-size:12px;font-weight:600;color:var(--gray-600);display:block;margin-bottom:8px; }
.danger-confirm-input { width:100%;padding:10px 14px;border:1.5px solid var(--border);border-radius:8px;font-size:14px;font-family:inherit;color:var(--gray-800);outline:none;transition:var(--transition);box-sizing:border-box;background:var(--white); }
.danger-confirm-input:focus { border-color:var(--danger);box-shadow:0 0 0 3px rgba(239,68,68,0.1); }
.danger-confirm-btns { display:flex;gap:10px;justify-content:center; }
#dangerProceedBtn:not([disabled]) { animation:pulse-btn .6s ease; }
@keyframes pulse-btn { 0%,100%{transform:scale(1)} 50%{transform:scale(1.04)} }

/* ══ TOAST ══ */
.toast-notification { position:fixed;bottom:28px;right:28px;background:var(--gray-900);color:#fff;border-radius:12px;padding:13px 20px;font-size:13px;font-weight:500;display:flex;align-items:center;gap:10px;box-shadow:0 8px 24px rgba(0,0,0,.22);z-index:2000;transform:translateY(80px);opacity:0;transition:all .35s cubic-bezier(.16,1,.3,1);pointer-events:none; }
.toast-notification.show { transform:translateY(0);opacity:1; }
.toast-icon { color:var(--green);font-size:16px; }
</style>

<script>
/* ═══════════════════════════════════════════════
   THEME SYSTEM
   ═══════════════════════════════════════════════ */
const THEMES = {
  teal:   { primary:'#00b1aa', light:'#4cd1cc', dark:'#008a84', bg:'rgba(0,177,170,0.15)',   name:'Teal'   },
  blue:   { primary:'#2563EB', light:'#60A5FA', dark:'#1D4ED8', bg:'rgba(37,99,235,0.15)',   name:'Blue'   },
  green:  { primary:'#10B981', light:'#34D399', dark:'#059669', bg:'rgba(16,185,129,0.15)',  name:'Green'  },
  indigo: { primary:'#6366F1', light:'#A5B4FC', dark:'#4F46E5', bg:'rgba(99,102,241,0.15)',  name:'Indigo' },
  amber:  { primary:'#F59E0B', light:'#FCD34D', dark:'#D97706', bg:'rgba(245,158,11,0.15)',  name:'Amber'  },
  red:    { primary:'#EF4444', light:'#FCA5A5', dark:'#DC2626', bg:'rgba(239,68,68,0.15)',   name:'Rose'   },
};

function applyTheme(key, el, name) {
  const t = THEMES[key];
  if (!t) return;

  const root = document.documentElement;
  root.style.setProperty('--primary',       t.primary);
  root.style.setProperty('--primary-light', t.light);
  root.style.setProperty('--primary-dark',  t.dark);
  root.style.setProperty('--primary-bg',    t.bg);

  let override = document.getElementById('admin-theme-override');
  if (!override) {
    override = document.createElement('style');
    override.id = 'admin-theme-override';
    document.head.appendChild(override);
  }
  override.textContent = `:root{--primary:${t.primary} !important;--primary-light:${t.light} !important;--primary-dark:${t.dark} !important;--primary-bg:${t.bg} !important;}`;

  localStorage.setItem('adminTheme', key);

  document.querySelectorAll('.theme-swatch').forEach(s => s.classList.remove('active'));
  if (el) el.classList.add('active');
  
  const lbl = document.getElementById('currentThemeLabel');
  if (lbl) lbl.textContent = name;

  showSettingsToast('Theme updated to ' + name + '!');
  triggerAutosaveBadge();
}

function applyDarkMode(enabled) {
  document.documentElement.classList.toggle('dark', enabled);
  document.documentElement.classList.toggle('admin-dark', enabled);

  localStorage.setItem('adminDarkMode', enabled ? 'true' : 'false');
  localStorage.setItem('theme', enabled ? 'dark' : 'light');

  if (document.body) {
    if (enabled) {
      document.body.style.background = '#0f172a';
      document.body.style.color = '#f1f5f9';
    } else {
      document.body.style.background = '';
      document.body.style.color = '';
    }
  }

  const icons = document.querySelectorAll('#dark-mode-icon');
  icons.forEach(function(icon) {
    icon.className = enabled ? 'fas fa-sun' : 'fas fa-moon';
  });

  const lbl = document.getElementById('darkModeLabel');
  if (lbl) lbl.textContent = enabled ? 'On' : 'Off';

  const chk = document.getElementById('a-darkmode');
  if (chk) chk.checked = enabled;

  showSettingsToast('Appearance set to ' + (enabled ? 'Dark' : 'Light') + ' Mode.');
  triggerAutosaveBadge();
}

function applyDensity(mode) {
  let override = document.getElementById('admin-density-override');
  if (mode === 'compact') {
    if (!override) {
      override = document.createElement('style');
      override.id = 'admin-density-override';
      document.head.appendChild(override);
    }
    override.textContent = ':root{--sidebar-width:210px !important;}';
    document.documentElement.style.setProperty('--sidebar-width', '210px');
  } else {
    if (override) override.remove();
    document.documentElement.style.setProperty('--sidebar-width', '260px');
  }

  localStorage.setItem('adminDensity', mode);

  document.querySelectorAll('.density-btn').forEach(b => b.classList.remove('active'));
  const btn = document.getElementById('density-' + mode);
  if (btn) btn.classList.add('active');

  showSettingsToast('Sidebar density updated!');
  triggerAutosaveBadge();
}

/* ═══════════════════════════════════════════════
   PROFILE SETTINGS
   ═══════════════════════════════════════════════ */
/* ═══════════════════════════════════════════════
   POSTING DEFAULTS
   ═══════════════════════════════════════════════ */
const POSTING_DEFAULTS = {
  duration: '3 months',
  location: 'Remote',
  maxApplicants: '50',
};

function loadDefaults() {
  const saved = JSON.parse(localStorage.getItem('companyPostingDefaults') || '{}');
  const d = { ...POSTING_DEFAULTS, ...saved };
  document.getElementById('d-duration').value = d.duration;
  document.getElementById('d-location').value = d.location;
  document.getElementById('d-max-applicants').value = d.maxApplicants;
}

function saveDefaults() {
  const data = {
    duration: document.getElementById('d-duration').value,
    location: document.getElementById('d-location').value,
    maxApplicants: document.getElementById('d-max-applicants').value,
  };
  localStorage.setItem('companyPostingDefaults', JSON.stringify(data));
  showSettingsToast('Posting defaults saved!');
  triggerAutosaveBadge();
}

function resetDefaults() {
  localStorage.removeItem('companyPostingDefaults');
  loadDefaults();
  showSettingsToast('Defaults reset successfully.', 'info');
}

/* ═══════════════════════════════════════════════
   NOTIFICATIONS
   ═══════════════════════════════════════════════ */
const NOTIF_DEFAULTS = { application:true, interviews:true, weekly:true, messages:false };

function loadNotifications() {
  const saved = JSON.parse(localStorage.getItem('companyNotifications') || 'null') || NOTIF_DEFAULTS;
  document.getElementById('n-application').checked = saved.application ?? true;
  document.getElementById('n-interviews').checked  = saved.interviews  ?? true;
  document.getElementById('n-weekly').checked      = saved.weekly      ?? true;
  document.getElementById('n-messages').checked    = saved.messages    ?? false;
}

function saveNotifToggle() {
  const data = {
    application: document.getElementById('n-application').checked,
    interviews:  document.getElementById('n-interviews').checked,
    weekly:      document.getElementById('n-weekly').checked,
    messages:    document.getElementById('n-messages').checked,
  };
  localStorage.setItem('companyNotifications', JSON.stringify(data));
  triggerAutosaveBadge();
}

function resetNotifications() {
  localStorage.removeItem('companyNotifications');
  loadNotifications();
  showSettingsToast('Notifications reset to defaults.', 'info');
}

/* ═══════════════════════════════════════════════
   SECURITY & ACCOUNT
   ═══════════════════════════════════════════════ */
const SECURITY_DEFAULTS = { twofa:true, public:true };

function loadSecurity() {
  const saved = JSON.parse(localStorage.getItem('companySecurity') || 'null') || SECURITY_DEFAULTS;
  document.getElementById('s-2fa').checked    = saved.twofa    ?? true;
  document.getElementById('s-public').checked = saved.public   ?? true;
}

function saveSecurityToggle() {
  const data = {
    twofa:   document.getElementById('s-2fa').checked,
    public:  document.getElementById('s-public').checked,
  };
  localStorage.setItem('companySecurity', JSON.stringify(data));
  triggerAutosaveBadge();
}

function resetSecurity() {
  localStorage.removeItem('companySecurity');
  loadSecurity();
  showSettingsToast('Security settings reset.', 'info');
}

/* ═══════════════════════════════════════════════
   APPEARANCE
   ═══════════════════════════════════════════════ */
function loadAppearance() {
  const currentTheme = localStorage.getItem('adminTheme') || 'teal';
  document.querySelectorAll('.theme-swatch').forEach(s => {
    s.classList.toggle('active', s.dataset.theme === currentTheme);
  });
  const lbl = document.getElementById('currentThemeLabel');
  if (lbl && THEMES[currentTheme]) lbl.textContent = THEMES[currentTheme].name;

  const dm = localStorage.getItem('adminDarkMode') === 'true' || localStorage.getItem('theme') === 'dark';
  document.getElementById('a-darkmode').checked = dm;
  const dmLbl = document.getElementById('darkModeLabel');
  if (dmLbl) dmLbl.textContent = dm ? 'On' : 'Off';

  const density = localStorage.getItem('adminDensity') || 'comfortable';
  document.querySelectorAll('.density-btn').forEach(b => b.classList.remove('active'));
  const activeBtn = document.getElementById('density-' + density);
  if (activeBtn) activeBtn.classList.add('active');
}

function resetAppearance() {
  localStorage.removeItem('adminTheme');
  localStorage.removeItem('adminDarkMode');
  localStorage.removeItem('adminDensity');

  applyTheme('teal', document.querySelector('[data-theme="teal"]'), 'Teal');
  applyDarkMode(false);
  applyDensity('comfortable');

  showSettingsToast('Appearance reset to defaults.', 'info');
}

/* ═══════════════════════════════════════════════
   DANGER ZONE
   ═══════════════════════════════════════════════ */
let pendingDangerFn = null;

function openDangerModal(title, desc, color, fn) {
  pendingDangerFn = fn;
  document.getElementById('dangerModalTitle').textContent = title;
  document.getElementById('dangerModalDesc').textContent  = desc;
  document.getElementById('dangerConfirmInput').value = '';
  document.getElementById('dangerProceedBtn').disabled = true;

  const iconEl = document.getElementById('dangerModalIconBg');
  iconEl.style.background = 'rgba(239,68,68,0.1)';
  iconEl.style.color = color;

  document.getElementById('dangerModal').classList.add('open');
  document.body.style.overflow = 'hidden';
  setTimeout(() => document.getElementById('dangerConfirmInput').focus(), 200);
}

function closeDangerModal() {
  document.getElementById('dangerModal').classList.remove('open');
  document.body.style.overflow = '';
  pendingDangerFn = null;
}

function checkDangerConfirm() {
  const val = document.getElementById('dangerConfirmInput').value.trim();
  document.getElementById('dangerProceedBtn').disabled = (val !== 'CONFIRM');
}

function executeDangerAction() {
  closeDangerModal();
  if (pendingDangerFn === 'resetAllSettings') resetAllSettings();
}

function resetAllSettings() {
  const keys = ['adminTheme','adminDarkMode','adminDensity','companyProfile','companyPostingDefaults','companyNotifications','companySecurity'];
  keys.forEach(k => localStorage.removeItem(k));
  showSettingsToast('All settings reset. Reloading...', 'info');
  setTimeout(() => location.reload(), 1500);
}

/* ═══════════════════════════════════════════════
   TAB SWITCHING
   ═══════════════════════════════════════════════ */
function switchTab(tabId, el) {
  document.querySelectorAll('.settings-pane').forEach(p => p.style.display = 'none');
  document.querySelectorAll('.settings-nav-item').forEach(i => i.classList.remove('active'));
  document.getElementById('tab-' + tabId).style.display = '';
  el.classList.add('active');
}

let toastTimer = null;
function showSettingsToast(msg, type) {
  const t = document.getElementById('settingsToast');
  const icon = document.getElementById('toastIcon');
  document.getElementById('settings-toast-msg').textContent = msg;
  icon.className = 'toast-icon fas ' + (type === 'info' ? 'fa-circle-info' : 'fa-circle-check');
  icon.style.color = type === 'info' ? 'var(--warning)' : 'var(--green)';
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3000);
}

let autosaveTimer = null;
function triggerAutosaveBadge() {
  const badge = document.getElementById('autosaveBadge');
  badge.style.display = 'flex';
  clearTimeout(autosaveTimer);
  autosaveTimer = setTimeout(() => { badge.style.display = 'none'; }, 2500);
}

document.addEventListener('DOMContentLoaded', function () {
  loadDefaults();
  loadNotifications();
  loadSecurity();
  loadAppearance();

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      closeDangerModal();
      closeChangePasswordModal();
    }
  });
});

document.addEventListener('livewire:initialized', () => {
  Livewire.on('toast', (event) => {
    // Livewire v3 passes events differently, usually event[0].message
    const data = event[0] || event;
    showSettingsToast(data.message || 'Saved', data.type || 'success');
    triggerAutosaveBadge();
  });
});

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
    showSettingsToast('Please enter your current password.', 'info');
    return;
  }
  if (newPass.length < 6) {
    showSettingsToast('New password must be at least 6 characters long.', 'info');
    return;
  }
  if (newPass !== confirmPass) {
    showSettingsToast('Passwords do not match.', 'info');
    return;
  }
  
  closeChangePasswordModal();
  showSettingsToast('Password updated successfully.');
}
</script>
</div>
