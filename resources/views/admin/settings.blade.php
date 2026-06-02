<x-layouts::admin title="Platform Settings">

<!-- PREMIUM PAGE HEADER -->
<div class="settings-page-header">
  <div class="settings-header-bg"></div>
  <div class="settings-header-content">
    <div class="settings-header-icon"><i class="fas fa-gear"></i></div>
    <div>
      <h2 class="settings-h2">Platform Settings</h2>
      <p class="settings-subtitle">Configure system preferences, notifications, security, and appearance</p>
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
      <div class="settings-nav-label">Configuration</div>
      <a href="javascript:void(0)" class="settings-nav-item active" onclick="switchTab('general', this)" id="nav-general">
        <div class="settings-nav-icon" style="background:rgba(37,99,235,0.12);color:var(--primary)"><i class="fas fa-sliders"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">General</span>
          <span class="settings-nav-desc">Core platform config</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
      <a href="javascript:void(0)" class="settings-nav-item" onclick="switchTab('notifications', this)" id="nav-notifications">
        <div class="settings-nav-icon" style="background:rgba(245,158,11,0.12);color:var(--warning)"><i class="fas fa-bell"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Notifications</span>
          <span class="settings-nav-desc">Alerts & digests</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
      <a href="javascript:void(0)" class="settings-nav-item" onclick="switchTab('security', this)" id="nav-security">
        <div class="settings-nav-icon" style="background:rgba(239,68,68,0.12);color:var(--danger)"><i class="fas fa-shield-halved"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Security</span>
          <span class="settings-nav-desc">Auth & access control</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
      <a href="javascript:void(0)" class="settings-nav-item" onclick="switchTab('appearance', this)" id="nav-appearance">
        <div class="settings-nav-icon" style="background:rgba(99,102,241,0.12);color:#6366F1"><i class="fas fa-palette"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Appearance</span>
          <span class="settings-nav-desc">Theme & language</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
    </div>
    <div class="settings-nav-divider"></div>
    <div class="settings-nav-group">
      <div class="settings-nav-label">Advanced</div>
      <a href="javascript:void(0)" class="settings-nav-item danger-nav" onclick="switchTab('danger', this)" id="nav-danger">
        <div class="settings-nav-icon" style="background:rgba(239,68,68,0.12);color:var(--danger)"><i class="fas fa-triangle-exclamation"></i></div>
        <div class="settings-nav-text">
          <span class="settings-nav-title">Danger Zone</span>
          <span class="settings-nav-desc">Irreversible actions</span>
        </div>
        <i class="fas fa-chevron-right settings-nav-arrow"></i>
      </a>
    </div>

    <!-- Platform Info Card -->
    <div class="platform-info-card">
      <div class="platform-info-row"><i class="fas fa-tag"></i><span>Version 2.4.1</span></div>
      <div class="platform-info-row"><i class="fas fa-circle" style="color:var(--green);font-size:8px"></i><span>System Online</span></div>
      <div class="platform-info-row"><i class="fas fa-clock"></i><span>Uptime: 99.9%</span></div>
      <div class="platform-info-row"><i class="fas fa-database"></i><span>DB: Healthy</span></div>
    </div>
  </div>

  <!-- CONTENT AREA -->
  <div class="settings-content">

    <!-- ══════════════ GENERAL ══════════════ -->
    <div id="tab-general" class="settings-pane">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-sliders"></i></div>
          <div>
            <h3 class="settings-card-title">General Settings</h3>
            <p class="settings-card-sub">Core platform configuration and contact details</p>
          </div>
        </div>

        <div class="settings-form">
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Platform Name</div>
              <div class="settings-field-desc">Public name shown to users and in emails</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-globe sf-icon"></i>
                <input type="text" class="sf-input" id="g-platform-name" placeholder="InternLink Platform" />
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Contact Email</div>
              <div class="settings-field-desc">Primary support and notification email</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-envelope sf-icon"></i>
                <input type="email" class="sf-input" id="g-email" placeholder="admin@internlink.com" />
              </div>
            </div>
          </div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Support Phone</div>
              <div class="settings-field-desc">Displayed on the support page</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-phone sf-icon"></i>
                <input type="text" class="sf-input" id="g-phone" placeholder="+355 69 123 4567" />
              </div>
            </div>
          </div>
          <div class="settings-divider"></div>
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Max File Upload Size</div>
              <div class="settings-field-desc">Maximum size allowed for document uploads</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-suffix-wrap">
                <input type="number" class="sf-input" id="g-filesize" placeholder="10" min="1" max="100" style="padding-right:50px;" />
                <span class="sf-suffix">MB</span>
              </div>
            </div>
          </div>
          <div class="settings-field-row" style="border-bottom:none;padding-bottom:0;">
            <div class="settings-field-info">
              <div class="settings-field-title">Deadline Warning Period</div>
              <div class="settings-field-desc">Days before deadline to trigger warning alerts</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-suffix-wrap">
                <input type="number" class="sf-input" id="g-warning" placeholder="7" min="1" max="30" style="padding-right:58px;" />
                <span class="sf-suffix">days</span>
              </div>
            </div>
          </div>
        </div>

        <div class="settings-form-footer">
          <button type="button" class="btn btn-outline btn-sm" onclick="resetGeneral()">Reset Defaults</button>
          <button type="button" class="btn btn-primary" onclick="saveGeneral()"><i class="fas fa-floppy-disk"></i> Save Changes</button>
        </div>
      </div>
    </div>

    <!-- ══════════════ NOTIFICATIONS ══════════════ -->
    <div id="tab-notifications" class="settings-pane" style="display:none;">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-bell"></i></div>
          <div>
            <h3 class="settings-card-title">Notification Settings</h3>
            <p class="settings-card-sub">Control what alerts are sent and through which channels</p>
          </div>
        </div>

        <div class="toggle-list">
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-envelope"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Email Notifications</div>
              <div class="toggle-item-desc">Send system alerts and weekly summaries via email</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-email" onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(16,185,129,0.1);color:var(--green)"><i class="fas fa-mobile-screen"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">SMS Alerts</div>
              <div class="toggle-item-desc">Receive urgent notifications via SMS</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-sms" onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(99,102,241,0.1);color:#6366F1"><i class="fas fa-chart-bar"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Weekly Reports</div>
              <div class="toggle-item-desc">Automated weekly digest delivered every Monday</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-weekly" onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-user-plus"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">New User Alerts</div>
              <div class="toggle-item-desc">Notify admins when new users register</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-newuser" onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item" style="border-bottom:none;">
            <div class="toggle-item-icon-wrap" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-triangle-exclamation"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Internship Expiry Alerts</div>
              <div class="toggle-item-desc">Alert before internship listing deadlines expire</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="n-expiry" onchange="saveNotifToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
        </div>

        <div class="settings-form-footer">
          <button class="btn btn-outline btn-sm" onclick="resetNotifications()">Reset</button>
          <button class="btn btn-primary" onclick="showSettingsToast('Notification preferences saved!')"><i class="fas fa-floppy-disk"></i> Save Preferences</button>
        </div>
      </div>
    </div>

    <!-- ══════════════ SECURITY ══════════════ -->
    <div id="tab-security" class="settings-pane" style="display:none;">
      <div class="settings-card">
        <div class="settings-card-header">
          <div class="settings-card-icon-wrap" style="background:rgba(239,68,68,0.1);color:var(--danger)"><i class="fas fa-shield-halved"></i></div>
          <div>
            <h3 class="settings-card-title">Security Settings</h3>
            <p class="settings-card-sub">Protect your platform and user accounts</p>
          </div>
        </div>

        <div class="toggle-list">
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-key"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Two-Factor Authentication</div>
              <div class="toggle-item-desc">Require 2FA for all administrator accounts</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="s-2fa" onchange="saveSecurityToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-hourglass-half"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Session Timeout</div>
              <div class="toggle-item-desc">Auto-logout after 30 minutes of inactivity</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="s-timeout" onchange="saveSecurityToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item">
            <div class="toggle-item-icon-wrap" style="background:rgba(16,185,129,0.1);color:var(--green)"><i class="fas fa-list-check"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">IP Whitelist</div>
              <div class="toggle-item-desc">Restrict admin access to approved IPs only</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="s-ip" onchange="saveSecurityToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
          <div class="toggle-item" style="border-bottom:none;">
            <div class="toggle-item-icon-wrap" style="background:rgba(99,102,241,0.1);color:#6366F1"><i class="fas fa-scroll"></i></div>
            <div class="toggle-item-info">
              <div class="toggle-item-title">Audit Logs</div>
              <div class="toggle-item-desc">Track all admin actions and system events</div>
            </div>
            <label class="premium-toggle"><input type="checkbox" id="s-audit" onchange="saveSecurityToggle()" /><span class="premium-toggle-track"><span class="premium-toggle-thumb"></span></span></label>
          </div>
        </div>

        <!-- Password Policy -->
        <div style="padding:0 26px 20px;">
          <div class="settings-divider" style="margin-bottom:16px;"></div>
          <div class="settings-sub-section-title"><i class="fas fa-lock"></i> Password Policy</div>
          <div class="pwd-policy-grid">
            <label class="pwd-policy-toggle">
              <input type="checkbox" id="pp-min8" onchange="saveSecurityToggle()" />
              <span><i class="fas fa-circle-check"></i> Min 8 characters</span>
            </label>
            <label class="pwd-policy-toggle">
              <input type="checkbox" id="pp-upper" onchange="saveSecurityToggle()" />
              <span><i class="fas fa-circle-check"></i> Uppercase required</span>
            </label>
            <label class="pwd-policy-toggle">
              <input type="checkbox" id="pp-num" onchange="saveSecurityToggle()" />
              <span><i class="fas fa-circle-check"></i> Numbers required</span>
            </label>
            <label class="pwd-policy-toggle">
              <input type="checkbox" id="pp-special" onchange="saveSecurityToggle()" />
              <span><i class="fas fa-circle-check"></i> Special char required</span>
            </label>
          </div>
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
            <h3 class="settings-card-title">Appearance</h3>
            <p class="settings-card-sub">Customize the look and feel of the platform</p>
          </div>
        </div>

        <div class="settings-form">

          <!-- COLOR THEME -->
          <div class="settings-field-row" style="align-items:flex-start;padding-bottom:24px;">
            <div class="settings-field-info">
              <div class="settings-field-title">Color Theme</div>
              <div class="settings-field-desc">Primary accent color applied across the entire admin panel</div>
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
              <div class="settings-field-title">Dark Mode</div>
              <div class="settings-field-desc">Switch the admin panel to a dark background</div>
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

          <!-- LANGUAGE -->
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Display Language</div>
              <div class="settings-field-desc">Interface language for all admin users</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-globe sf-icon"></i>
                <select class="sf-input sf-select" id="a-lang" onchange="saveAppearance()">
                  <option value="en">English</option>
                  <option value="fr">French</option>
                </select>
                <i class="fas fa-chevron-down sf-sel-arrow"></i>
              </div>
            </div>
          </div>

          <!-- TIMEZONE -->
          <div class="settings-field-row">
            <div class="settings-field-info">
              <div class="settings-field-title">Timezone</div>
              <div class="settings-field-desc">System timezone for timestamps and scheduling</div>
            </div>
            <div class="settings-field-control">
              <div class="sf-input-wrap">
                <i class="fas fa-clock sf-icon"></i>
                <select class="sf-input sf-select" id="a-timezone" onchange="saveAppearance()">
                  <option value="UTC+1">UTC+1 – Tirana (CET)</option>
                  <option value="UTC+0">UTC+0 – London (GMT)</option>
                  <option value="UTC+2">UTC+2 – Athens (EET)</option>
                  <option value="UTC+3">UTC+3 – Moscow (MSK)</option>
                  <option value="UTC-5">UTC-5 – New York (EST)</option>
                </select>
                <i class="fas fa-chevron-down sf-sel-arrow"></i>
              </div>
            </div>
          </div>

          <!-- SIDEBAR DENSITY -->
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
            <p class="settings-card-sub">Irreversible and destructive actions — proceed with extreme caution</p>
          </div>
        </div>
        <div class="danger-actions-list">
          <div class="danger-action-item">
            <div class="danger-action-icon"><i class="fas fa-broom"></i></div>
            <div class="danger-action-info">
              <div class="danger-action-title">Clear All Cache</div>
              <div class="danger-action-desc">Purge all cached data and force fresh loads from the database</div>
            </div>
            <button class="btn-danger-outline" onclick="openDangerModal('Clear All Cache','All cached data will be permanently purged. Active sessions will not be affected.','#059669','clearCache')">Clear Cache</button>
          </div>
          <div class="danger-action-item">
            <div class="danger-action-icon"><i class="fas fa-rotate-left"></i></div>
            <div class="danger-action-info">
              <div class="danger-action-title">Reset Platform Settings</div>
              <div class="danger-action-desc">Restore all settings to factory defaults. Saved preferences in your browser will also be cleared.</div>
            </div>
            <button class="btn-danger-outline" onclick="openDangerModal('Reset Platform Settings','All settings will be restored to factory defaults. This cannot be undone.','#EF4444','resetAllSettings')">Reset All</button>
          </div>
          <div class="danger-action-item" style="border-bottom:none;">
            <div class="danger-action-icon"><i class="fas fa-database"></i></div>
            <div class="danger-action-info">
              <div class="danger-action-title">Flush Session Data</div>
              <div class="danger-action-desc">Log out all active users and clear all session tokens</div>
            </div>
            <button class="btn-danger-outline" onclick="openDangerModal('Flush Session Data','All active user sessions will be terminated. Users will need to log in again.','#EF4444','flushSessions')">Flush Sessions</button>
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
.settings-sidebar { width:260px;flex-shrink:0;background:#fff;border-radius:16px;border:1px solid var(--border);box-shadow:var(--shadow-sm);padding:16px;position:sticky;top:80px; }
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
.settings-card { background:#fff;border-radius:16px;border:1px solid var(--border);box-shadow:var(--shadow-sm);overflow:hidden; }
.settings-card-header { display:flex;align-items:center;gap:14px;padding:22px 26px;border-bottom:1px solid var(--gray-100);background:var(--gray-50); }
.settings-card-icon-wrap { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0; }
.settings-card-title { font-size:16px;font-weight:700;color:var(--gray-800);margin:0 0 2px; }
.settings-card-sub   { font-size:12px;color:var(--gray-400);margin:0; }

/* ══ FIELD ROWS ══ */
.settings-form { padding:0 26px 8px; }
.settings-field-row { display:flex;align-items:center;gap:24px;padding:18px 0;border-bottom:1px solid var(--gray-100); }
.settings-field-info { flex:1; }
.settings-field-title { font-size:13px;font-weight:600;color:var(--gray-800); }
.settings-field-desc  { font-size:12px;color:var(--gray-400);margin-top:2px; }
.settings-field-control { width:240px;flex-shrink:0; }
.settings-divider { height:1px;background:var(--gray-100);margin:4px 0; }

.sf-input-wrap,.sf-input-suffix-wrap { position:relative; }
.sf-icon { position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px;pointer-events:none; }
.sf-input { width:100%;padding:9px 14px;border:1.5px solid var(--gray-200);border-radius:8px;font-size:13px;color:var(--gray-800);background:#fff;outline:none;transition:var(--transition);font-family:inherit; }
.sf-input:focus { border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-bg); }
.sf-input::placeholder { color:var(--gray-400); }
.sf-input-wrap .sf-input { padding-left:32px; }
.sf-input-suffix-wrap .sf-input { padding-right:50px; }
.sf-suffix { position:absolute;right:12px;top:50%;transform:translateY(-50%);font-size:12px;font-weight:600;color:var(--gray-400);pointer-events:none; }
.sf-select { appearance:none;cursor:pointer;padding-right:30px; }
.sf-sel-arrow { position:absolute;right:10px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:10px;pointer-events:none; }

/* ══ TOGGLES ══ */
.toggle-list { padding:0 26px 8px; }
.toggle-item { display:flex;align-items:center;gap:14px;padding:16px 0;border-bottom:1px solid var(--gray-100); }
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
.theme-live-preview { display:flex;align-items:center;gap:10px;margin-top:4px;padding:10px 14px;background:var(--gray-50);border-radius:10px;border:1px solid var(--gray-100); }

/* Dark mode toggle */
.dark-mode-toggle-wrap { display:flex;align-items:center;gap:10px; }
.dark-mode-label { font-size:12px;font-weight:600;color:var(--gray-500);min-width:24px; }

/* Density */
.density-selector { display:flex;gap:8px; }
.density-btn { flex:1;padding:8px 12px;border:1.5px solid var(--gray-200);border-radius:8px;font-size:12px;font-weight:600;color:var(--gray-500);background:#fff;cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:6px;justify-content:center;font-family:inherit; }
.density-btn:hover { border-color:var(--primary);color:var(--primary);background:var(--primary-bg); }
.density-btn.active { border-color:var(--primary);color:var(--primary);background:var(--primary-bg); }

/* ══ SECURITY EXTRAS ══ */
.settings-sub-section-title { font-size:12px;font-weight:700;color:var(--gray-600);display:flex;align-items:center;gap:7px;margin-bottom:14px;text-transform:uppercase;letter-spacing:.05em; }
.pwd-policy-grid { display:grid;grid-template-columns:1fr 1fr;gap:10px; }
.pwd-policy-toggle { display:flex;align-items:center;gap:8px;cursor:pointer;background:var(--gray-50);border-radius:8px;padding:10px 12px;border:1.5px solid var(--gray-100);transition:var(--transition); }
.pwd-policy-toggle:hover { border-color:var(--primary); }
.pwd-policy-toggle input { display:none; }
.pwd-policy-toggle span { font-size:12px;color:var(--gray-400);display:flex;align-items:center;gap:7px; }
.pwd-policy-toggle input:checked ~ span { color:var(--green); }
.pwd-policy-toggle:has(input:checked) { background:rgba(16,185,129,0.06);border-color:rgba(16,185,129,0.25); }

/* ══ FORM FOOTER ══ */
.settings-form-footer { display:flex;gap:10px;justify-content:flex-end;padding:18px 26px;border-top:1px solid var(--gray-100);background:var(--gray-50);margin-top:8px; }

/* ══ DANGER ZONE ══ */
.danger-zone-card { border-color:rgba(239,68,68,0.2); }
.danger-zone-card .settings-card-header { background:rgba(239,68,68,0.04); }
.danger-actions-list { padding:0 26px; }
.danger-action-item { display:flex;align-items:center;gap:16px;padding:20px 0;border-bottom:1px solid var(--gray-100); }
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
.danger-confirm-modal { background:#fff;border-radius:18px;box-shadow:0 24px 64px rgba(0,0,0,.22);width:420px;max-width:94vw;padding:36px 30px;text-align:center;animation:popIn .25s cubic-bezier(.16,1,.3,1); }
@keyframes popIn { from{transform:scale(.9);opacity:0} to{transform:scale(1);opacity:1} }
.danger-confirm-icon-wrap { margin-bottom:18px; }
.danger-confirm-icon { width:72px;height:72px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:28px;background:rgba(239,68,68,0.1);color:var(--danger); }
.danger-confirm-modal h3 { font-size:19px;font-weight:700;color:var(--gray-800);margin:0 0 10px; }
.danger-confirm-modal p { font-size:13px;color:var(--gray-500);line-height:1.65;margin:0 0 22px; }
.danger-confirm-input-wrap { text-align:left;margin-bottom:22px; }
.danger-confirm-input-label { font-size:12px;font-weight:600;color:var(--gray-600);display:block;margin-bottom:8px; }
.danger-confirm-input { width:100%;padding:10px 14px;border:1.5px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:inherit;color:var(--gray-800);outline:none;transition:var(--transition);box-sizing:border-box; }
.danger-confirm-input:focus { border-color:var(--danger);box-shadow:0 0 0 3px rgba(239,68,68,0.1); }
.danger-confirm-btns { display:flex;gap:10px;justify-content:center; }
#dangerProceedBtn:not([disabled]) { animation:pulse-btn .6s ease; }
@keyframes pulse-btn { 0%,100%{transform:scale(1)} 50%{transform:scale(1.04)} }

/* ══ TOAST ══ */
.toast-notification { position:fixed;bottom:28px;right:28px;background:var(--gray-900);color:#fff;border-radius:12px;padding:13px 20px;font-size:13px;font-weight:500;display:flex;align-items:center;gap:10px;box-shadow:0 8px 24px rgba(0,0,0,.22);z-index:2000;transform:translateY(80px);opacity:0;transition:all .35s cubic-bezier(.16,1,.3,1);pointer-events:none; }
.toast-notification.show { transform:translateY(0);opacity:1; }
.toast-icon { color:var(--green);font-size:16px; }

/* ══ DARK MODE (admin-dark class) ══ */
.admin-dark .settings-card,
.admin-dark .settings-sidebar,
.admin-dark .platform-info-card { background:#1e293b;border-color:#334155; }
.admin-dark .settings-card-header,
.admin-dark .settings-form-footer,
.admin-dark .toggle-list { background:#0f172a; }
.admin-dark .settings-field-title,
.admin-dark .settings-card-title,
.admin-dark .settings-nav-title,
.admin-dark .toggle-item-title,
.admin-dark .danger-action-title { color:#f1f5f9; }
.admin-dark .settings-field-desc,
.admin-dark .settings-card-sub,
.admin-dark .settings-nav-desc,
.admin-dark .toggle-item-desc,
.admin-dark .danger-action-desc,
.admin-dark .platform-info-row { color:#64748b; }
.admin-dark .sf-input,
.admin-dark .density-btn,
.admin-dark .pwd-policy-toggle { background:#1e293b;border-color:#334155;color:#f1f5f9; }
.admin-dark .settings-field-row { border-color:#1e293b; }
.admin-dark .settings-nav-divider { background:#334155; }
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

  // 1. Set CSS variables on :root immediately
  const root = document.documentElement;
  root.style.setProperty('--primary',       t.primary);
  root.style.setProperty('--primary-light', t.light);
  root.style.setProperty('--primary-dark',  t.dark);
  root.style.setProperty('--primary-bg',    t.bg);

  // 2. Also update the <style> tag that was injected by the layout (persists across pages)
  let override = document.getElementById('admin-theme-override');
  if (!override) { override = document.createElement('style'); override.id='admin-theme-override'; document.head.appendChild(override); }
  override.textContent = `:root{--primary:${t.primary} !important;--primary-light:${t.light} !important;--primary-dark:${t.dark} !important;--primary-bg:${t.bg} !important;}`;

  // 3. Save to localStorage
  localStorage.setItem('adminTheme', key);

  // 4. Update swatch active state
  document.querySelectorAll('.theme-swatch').forEach(s => s.classList.remove('active'));
  if (el) el.classList.add('active');

  // 5. Update label
  const lbl = document.getElementById('currentThemeLabel');
  if (lbl) lbl.textContent = name || t.name;

  // 6. Update sidebar active indicators (they use var(--primary))
  document.querySelectorAll('.settings-nav-item.active .settings-nav-title').forEach(el => {
    el.style.color = t.primary;
  });

  showSettingsToast(`Theme changed to ${name || t.name}!`, 'check');
  triggerAutosaveBadge();
}

/* ═══════════════════════════════════════════════
   DARK MODE
═══════════════════════════════════════════════ */
function applyDarkMode(enabled) {
  document.documentElement.classList.toggle('dark', enabled);
  document.documentElement.classList.toggle('admin-dark', enabled);
  
  if (enabled) {
    document.body.style.background = '#0f172a';
    document.body.style.color = '#f1f5f9';
  } else {
    document.body.style.background = '';
    document.body.style.color = '';
  }
  
  localStorage.setItem('adminDarkMode', enabled ? 'true' : 'false');
  localStorage.setItem('theme', enabled ? 'dark' : 'light');
  
  const chk = document.getElementById('a-darkmode');
  if (chk) chk.checked = enabled;
  
  const lbl = document.getElementById('darkModeLabel');
  if (lbl) lbl.textContent = enabled ? 'On' : 'Off';
  
  var icons = document.querySelectorAll('#dark-mode-icon');
  icons.forEach(function(icon) {
    icon.className = enabled ? 'fas fa-sun' : 'fas fa-moon';
  });
  
  if (window.Alpine && Alpine.store('ui')) {
    Alpine.store('ui').darkMode = enabled;
  }
  
  showSettingsToast(enabled ? 'Dark mode enabled' : 'Dark mode disabled', 'check');
  triggerAutosaveBadge();
}

/* ═══════════════════════════════════════════════
   DENSITY
═══════════════════════════════════════════════ */
function applyDensity(mode) {
  let override = document.getElementById('admin-density-override');
  if (!override) { override = document.createElement('style'); override.id='admin-density-override'; document.head.appendChild(override); }

  if (mode === 'compact') {
    override.textContent = ':root{--sidebar-width:210px !important;}';
    document.documentElement.style.setProperty('--sidebar-width', '210px');
  } else {
    override.textContent = ':root{--sidebar-width:260px !important;}';
    document.documentElement.style.setProperty('--sidebar-width', '260px');
  }

  localStorage.setItem('adminDensity', mode);

  document.querySelectorAll('.density-btn').forEach(b => b.classList.remove('active'));
  const btn = document.getElementById('density-' + mode);
  if (btn) btn.classList.add('active');

  showSettingsToast('Sidebar density updated!', 'check');
  triggerAutosaveBadge();
}

/* ═══════════════════════════════════════════════
   GENERAL SETTINGS
═══════════════════════════════════════════════ */
const GENERAL_DEFAULTS = {
  platformName: 'InternLink Platform',
  email: 'admin@internlink.com',
  phone: '+355 69 123 4567',
  filesize: '10',
  warning: '7',
};

function loadGeneral() {
  const saved = JSON.parse(localStorage.getItem('adminGeneral') || '{}');
  const d = { ...GENERAL_DEFAULTS, ...saved };
  document.getElementById('g-platform-name').value = d.platformName;
  document.getElementById('g-email').value  = d.email;
  document.getElementById('g-phone').value  = d.phone;
  document.getElementById('g-filesize').value = d.filesize;
  document.getElementById('g-warning').value  = d.warning;
}

function saveGeneral() {
  const data = {
    platformName: document.getElementById('g-platform-name').value,
    email:    document.getElementById('g-email').value,
    phone:    document.getElementById('g-phone').value,
    filesize: document.getElementById('g-filesize').value,
    warning:  document.getElementById('g-warning').value,
  };
  localStorage.setItem('adminGeneral', JSON.stringify(data));
  showSettingsToast('General settings saved!');
  triggerAutosaveBadge();
}

function resetGeneral() {
  localStorage.removeItem('adminGeneral');
  loadGeneral();
  showSettingsToast('Reset to defaults.', 'info');
}

/* ═══════════════════════════════════════════════
   NOTIFICATIONS
═══════════════════════════════════════════════ */
const NOTIF_DEFAULTS = { email:true, sms:false, weekly:true, newuser:true, expiry:true };

function loadNotifications() {
  const saved = JSON.parse(localStorage.getItem('adminNotifications') || 'null') || NOTIF_DEFAULTS;
  document.getElementById('n-email').checked   = saved.email   ?? true;
  document.getElementById('n-sms').checked     = saved.sms     ?? false;
  document.getElementById('n-weekly').checked  = saved.weekly  ?? true;
  document.getElementById('n-newuser').checked = saved.newuser ?? true;
  document.getElementById('n-expiry').checked  = saved.expiry  ?? true;
}

function saveNotifToggle() {
  const data = {
    email:   document.getElementById('n-email').checked,
    sms:     document.getElementById('n-sms').checked,
    weekly:  document.getElementById('n-weekly').checked,
    newuser: document.getElementById('n-newuser').checked,
    expiry:  document.getElementById('n-expiry').checked,
  };
  localStorage.setItem('adminNotifications', JSON.stringify(data));
  triggerAutosaveBadge();
}

function resetNotifications() {
  localStorage.removeItem('adminNotifications');
  loadNotifications();
  showSettingsToast('Notifications reset to defaults.', 'info');
}

/* ═══════════════════════════════════════════════
   SECURITY
═══════════════════════════════════════════════ */
const SECURITY_DEFAULTS = { twofa:true, timeout:true, ip:false, audit:true, min8:true, upper:true, num:true, special:false };

function loadSecurity() {
  const saved = JSON.parse(localStorage.getItem('adminSecurity') || 'null') || SECURITY_DEFAULTS;
  document.getElementById('s-2fa').checked    = saved.twofa   ?? true;
  document.getElementById('s-timeout').checked= saved.timeout ?? true;
  document.getElementById('s-ip').checked     = saved.ip      ?? false;
  document.getElementById('s-audit').checked  = saved.audit   ?? true;
  document.getElementById('pp-min8').checked  = saved.min8    ?? true;
  document.getElementById('pp-upper').checked = saved.upper   ?? true;
  document.getElementById('pp-num').checked   = saved.num     ?? true;
  document.getElementById('pp-special').checked= saved.special?? false;
}

function saveSecurityToggle() {
  const data = {
    twofa:   document.getElementById('s-2fa').checked,
    timeout: document.getElementById('s-timeout').checked,
    ip:      document.getElementById('s-ip').checked,
    audit:   document.getElementById('s-audit').checked,
    min8:    document.getElementById('pp-min8').checked,
    upper:   document.getElementById('pp-upper').checked,
    num:     document.getElementById('pp-num').checked,
    special: document.getElementById('pp-special').checked,
  };
  localStorage.setItem('adminSecurity', JSON.stringify(data));
  triggerAutosaveBadge();
}

function resetSecurity() {
  localStorage.removeItem('adminSecurity');
  loadSecurity();
  showSettingsToast('Security settings reset.', 'info');
}

/* ═══════════════════════════════════════════════
   APPEARANCE (language, timezone)
═══════════════════════════════════════════════ */
function loadAppearance() {
  const saved = JSON.parse(localStorage.getItem('adminAppearance') || '{}');

  // Theme swatch
  const currentTheme = localStorage.getItem('adminTheme') || 'teal';
  document.querySelectorAll('.theme-swatch').forEach(s => {
    s.classList.toggle('active', s.dataset.theme === currentTheme);
  });
  const lbl = document.getElementById('currentThemeLabel');
  if (lbl && THEMES[currentTheme]) lbl.textContent = THEMES[currentTheme].name;

  // Dark mode
  const dm = localStorage.getItem('adminDarkMode') === 'true';
  document.getElementById('a-darkmode').checked = dm;
  const dmLbl = document.getElementById('darkModeLabel');
  if (dmLbl) dmLbl.textContent = dm ? 'On' : 'Off';

  // Language
  if (saved.lang) setSelectVal('a-lang', saved.lang);

  // Timezone
  if (saved.timezone) setSelectVal('a-timezone', saved.timezone);

  // Density buttons
  const density = localStorage.getItem('adminDensity') || 'comfortable';
  document.querySelectorAll('.density-btn').forEach(b => b.classList.remove('active'));
  const activeBtn = document.getElementById('density-' + density);
  if (activeBtn) activeBtn.classList.add('active');
}

function saveAppearance() {
  const langVal = document.getElementById('a-lang')?.value;
  const data = {
    lang:     langVal,
    timezone: document.getElementById('a-timezone')?.value,
  };
  localStorage.setItem('adminAppearance', JSON.stringify(data));
  if (window.Alpine && Alpine.store('ui')) {
    Alpine.store('ui').lang = (langVal === 'fr' ? 'French' : 'English');
  }
  triggerAutosaveBadge();
}

function resetAppearance() {
  localStorage.removeItem('adminTheme');
  localStorage.removeItem('adminDarkMode');
  localStorage.removeItem('adminDensity');
  localStorage.removeItem('adminAppearance');
  localStorage.removeItem('adminLanguage');

  // Re-apply teal defaults
  applyTheme('teal', document.querySelector('[data-theme="teal"]'), 'Teal');
  applyDarkMode(false);
  applyDensity('comfortable');

  if (window.Alpine && Alpine.store('ui')) {
    Alpine.store('ui').lang = 'English';
  }

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
  iconEl.style.background = (color === '#059669') ? 'rgba(5,150,105,0.1)' : 'rgba(239,68,68,0.1)';
  iconEl.style.color = color;
  iconEl.querySelector('i').className = (color === '#059669') ? 'fas fa-broom' : 'fas fa-triangle-exclamation';

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
  if (pendingDangerFn === 'clearCache') clearCache();
  else if (pendingDangerFn === 'resetAllSettings') resetAllSettings();
  else if (pendingDangerFn === 'flushSessions') flushSessions();
}

function clearCache() {
  const btn = document.querySelector('[onclick*="clearCache"]');
  if (btn) { btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Clearing...'; btn.disabled = true; }
  setTimeout(() => {
    if (btn) { btn.innerHTML = '<i class="fas fa-check"></i> Done'; btn.style.color = 'var(--green)'; btn.style.borderColor = 'rgba(16,185,129,0.4)'; }
    showSettingsToast('Cache cleared successfully!', 'success');
    setTimeout(() => { if (btn) { btn.innerHTML = 'Clear Cache'; btn.style.color=''; btn.style.borderColor=''; btn.disabled=false; } }, 3000);
  }, 1200);
}

function resetAllSettings() {
  const keys = ['adminTheme','adminDarkMode','adminDensity','adminGeneral','adminNotifications','adminSecurity','adminAppearance','adminLanguage'];
  keys.forEach(k => localStorage.removeItem(k));
  showSettingsToast('All settings reset. Reloading...', 'info');
  setTimeout(() => location.reload(), 1800);
}

function flushSessions() {
  const btn = document.querySelector('[onclick*="flushSessions"]');
  if (btn) { btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Flushing...'; btn.disabled = true; }
  setTimeout(() => {
    if (btn) { btn.innerHTML = '<i class="fas fa-check"></i> Done'; btn.style.color = 'var(--green)'; btn.style.borderColor = 'rgba(16,185,129,0.4)'; }
    showSettingsToast('All sessions flushed!', 'success');
    setTimeout(() => { if (btn) { btn.innerHTML = 'Flush Sessions'; btn.style.color=''; btn.style.borderColor=''; btn.disabled=false; } }, 3000);
  }, 1200);
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

/* ═══════════════════════════════════════════════
   HELPERS
═══════════════════════════════════════════════ */
function setSelectVal(id, val) {
  const sel = document.getElementById(id);
  if (!sel) return;
  for (let opt of sel.options) {
    if (opt.value === val || opt.textContent.trim() === val) { sel.value = opt.value; return; }
  }
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

/* ═══════════════════════════════════════════════
   PAGE INIT — restore all settings on load
═══════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', function () {
  loadGeneral();
  loadNotifications();
  loadSecurity();
  loadAppearance();

  // Escape closes danger modal
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeDangerModal();
  });
});
</script>

</x-layouts::admin>
