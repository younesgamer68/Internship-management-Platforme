<x-layouts::company :title="__('Support')">

<!-- ══════════════════════════════════
     ANIMATED HERO BANNER
══════════════════════════════════ -->
<div class="support-hero">
  <div class="support-hero-orb support-hero-orb-1"></div>
  <div class="support-hero-orb support-hero-orb-2"></div>
  <div class="support-hero-orb support-hero-orb-3"></div>
  <div class="support-hero-content">
    <div class="support-hero-left">
      <div class="support-hero-icon-wrap">
        <div class="support-hero-icon-ring"></div>
        <div class="support-hero-icon"><i class="fas fa-headset"></i></div>
      </div>
      <div class="support-hero-text">
        <h2 class="support-hero-title">How can we help?</h2>
        <p class="support-hero-desc">Browse our knowledge base articles, search FAQs, or submit a support ticket directly to our manager team.</p>
        <div class="support-hero-stats">
          <div class="support-hero-stat">
            <span class="support-hero-stat-val">24/7</span>
            <span class="support-hero-stat-lbl">Availability</span>
          </div>
          <div class="support-hero-stat-sep"></div>
          <div class="support-hero-stat">
            <span class="support-hero-stat-val">&lt;4h</span>
            <span class="support-hero-stat-lbl">Avg Response</span>
          </div>
          <div class="support-hero-stat-sep"></div>
          <div class="support-hero-stat">
            <span class="support-hero-stat-val">99%</span>
            <span class="support-hero-stat-lbl">Satisfaction</span>
          </div>
        </div>
      </div>
    </div>
    <div class="support-hero-cta-wrap">
      <button class="support-hero-btn" onclick="document.getElementById('ticketSubject').focus()">
        <i class="fas fa-paper-plane"></i> Submit a Ticket
      </button>
      <button class="support-hero-btn-ghost" onclick="document.getElementById('faqSearch').focus()">
        <i class="fas fa-search"></i> Search FAQs
      </button>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════
     TWO-COLUMN GRID
══════════════════════════════════ -->
<div class="support-two-col">

  <!-- ── LEFT COLUMN ── -->
  <div class="support-col">

    <!-- FAQ CARD -->
    <div class="support-card-box">
      <div class="support-card-header">
        <div class="support-card-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-circle-question"></i></div>
        <div>
          <h3 class="support-card-title">Frequently Asked Questions</h3>
          <p class="support-card-sub">Quick answers to common company questions</p>
        </div>
      </div>

      <!-- FAQ Search -->
      <div class="faq-search-wrap">
        <i class="fas fa-search faq-search-icon"></i>
        <input type="text" class="faq-search-input" id="faqSearch" placeholder="Search FAQs..." oninput="filterFaqs()" />
      </div>

      <div class="faq-list" id="faqList">

        <div class="faq-item" onclick="toggleFaq(this)" data-keywords="post new internship listings publish draft">
          <div class="faq-question">
            <div class="faq-q-icon"><i class="fas fa-briefcase"></i></div>
            <span>How do I post a new internship?</span>
            <i class="fas fa-chevron-down faq-arrow"></i>
          </div>
          <div class="faq-answer">
            Navigate to <strong>Internship Offers</strong> in the sidebar and click the <strong>"+ Post New Internship"</strong> button at the top right. Fill in the job title, department, duration, location, description, and deadline, then click "Publish" to make it live.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)" data-keywords="edit published listings changes update">
          <div class="faq-question">
            <div class="faq-q-icon"><i class="fas fa-pen-to-square"></i></div>
            <span>Can I edit a published internship listing?</span>
            <i class="fas fa-chevron-down faq-arrow"></i>
          </div>
          <div class="faq-answer">
            Yes. Go to <strong>Internship Offers</strong>, find the listing you want to modify, and click the <strong>"Edit"</strong> button. You can update any field except the original posting date. Changes take effect immediately.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)" data-keywords="schedule interviews calendar candidate round">
          <div class="faq-question">
            <div class="faq-q-icon"><i class="fas fa-calendar-check"></i></div>
            <span>How do I schedule an interview with a candidate?</span>
            <i class="fas fa-chevron-down faq-arrow"></i>
          </div>
          <div class="faq-answer">
            Go to the <strong>Applicants</strong> page and click "View" on the candidate you want to interview. From their profile, click <strong>"Schedule Interview"</strong>. You can choose the date, time, type (video/in-person), and assign an interviewer.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)" data-keywords="download cv resume applicants documents export">
          <div class="faq-question">
            <div class="faq-q-icon"><i class="fas fa-file-pdf"></i></div>
            <span>How do I download an applicant's CV?</span>
            <i class="fas fa-chevron-down faq-arrow"></i>
          </div>
          <div class="faq-answer">
            Open the <strong>Applicants</strong> page and click <strong>"View"</strong> on any candidate to access their full profile. On the profile page you will find a <strong>"Download CV"</strong> button in the documents section.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)" data-keywords="close deactivate reopen listings deadline">
          <div class="faq-question">
            <div class="faq-q-icon"><i class="fas fa-circle-xmark"></i></div>
            <span>How do I close an internship posting?</span>
            <i class="fas fa-chevron-down faq-arrow"></i>
          </div>
          <div class="faq-answer">
            Go to <strong>Internship Offers</strong> and click the <strong>"Close"</strong> button next to the listing. Once closed, the posting will no longer accept applications. You can reopen it at any time.
          </div>
        </div>

      </div>

      <div class="faq-empty" id="faqEmpty" style="display:none;">
        <i class="fas fa-circle-question"></i>
        <p>No matching FAQs found. Try searching for other keywords.</p>
      </div>
    </div><!-- /FAQ -->

    <!-- Contact Channels -->
    <div class="support-card-box">
      <div class="support-card-header">
        <div class="support-card-icon-wrap" style="background:rgba(16,185,129,0.1);color:var(--green)"><i class="fas fa-paper-plane"></i></div>
        <div>
          <h3 class="support-card-title">Contact Channels</h3>
          <p class="support-card-sub">Reach us directly through your preferred channel</p>
        </div>
      </div>

      <div class="contact-channels-list">
        <div class="contact-channel">
          <div class="contact-channel-icon" style="background:rgba(37,99,235,0.1);color:var(--primary);"><i class="fas fa-envelope"></i></div>
          <div class="contact-channel-info">
            <span class="contact-channel-label">Email Support</span>
            <a href="mailto:support@internlink.com" class="contact-channel-value">support@internlink.com</a>
            <span class="contact-channel-note"><i class="fas fa-clock"></i> Responds within 24 hours</span>
          </div>
          <button class="contact-channel-btn" onclick="copyToClipboard('support@internlink.com', this)"><i class="fas fa-copy"></i> Copy</button>
        </div>

        <div class="contact-channel">
          <div class="contact-channel-icon" style="background:rgba(16,185,129,0.1);color:var(--green);"><i class="fas fa-comments"></i></div>
          <div class="contact-channel-info">
            <span class="contact-channel-label">Live Chat</span>
            <span class="contact-channel-value">Available Mon–Fri</span>
            <span class="contact-channel-note"><i class="fas fa-circle" style="color:var(--green);font-size:7px"></i> Online now (9 AM – 6 PM EST)</span>
          </div>
          <button class="contact-channel-btn contact-channel-btn-primary"><i class="fas fa-comment-dots"></i> Chat</button>
        </div>

        <div class="contact-channel" style="border-bottom:none;">
          <div class="contact-channel-icon" style="background:rgba(245,158,11,0.1);color:var(--warning);"><i class="fas fa-phone"></i></div>
          <div class="contact-channel-info">
            <span class="contact-channel-label">Phone Support</span>
            <a href="tel:+18005550199" class="contact-channel-value">+1 (800) 555-0199</a>
            <span class="contact-channel-note"><i class="fas fa-clock"></i> Business hours only</span>
          </div>
          <button class="contact-channel-btn" onclick="location.href='tel:+18005550199'"><i class="fas fa-phone"></i> Call</button>
        </div>
      </div>
    </div>

  </div><!-- /left -->

  <!-- RIGHT COLUMN -->
  <div class="support-col">

    <!-- Submit Ticket -->
    <div class="support-card-box">
      <div class="support-card-header">
        <div class="support-card-icon-wrap" style="background:rgba(245,158,11,0.1);color:var(--warning)"><i class="fas fa-ticket"></i></div>
        <div>
          <h3 class="support-card-title">Submit a Support Ticket</h3>
          <p class="support-card-sub">We typically respond within 4–8 hours</p>
        </div>
      </div>

      <form id="ticketForm" onsubmit="submitTicket(event)">
        <div class="ticket-form-body">
          <div class="tf-row">
            <div class="tf-group">
              <label class="tf-label">Full Name <span class="tf-required">*</span></label>
              <div class="tf-input-wrap">
                <i class="fas fa-user tf-icon"></i>
                <input type="text" class="tf-input" required id="ticketName" value="TechSolutions Admin" />
              </div>
            </div>
            <div class="tf-group">
              <label class="tf-label">Email Address <span class="tf-required">*</span></label>
              <div class="tf-input-wrap">
                <i class="fas fa-envelope tf-icon"></i>
                <input type="email" class="tf-input" required id="ticketEmail" value="contact@techsolutions.com" />
              </div>
            </div>
          </div>

          <div class="tf-row">
            <div class="tf-group">
              <label class="tf-label">Category <span class="tf-required">*</span></label>
              <div class="tf-select-wrap">
                <i class="fas fa-sliders tf-icon"></i>
                <select class="tf-input tf-select" id="ticketCategory">
                  <option>Posting & Listings</option>
                  <option>Applicant Management</option>
                  <option>Interview Scheduling</option>
                  <option>Billing & Subscription</option>
                  <option>Account & Login</option>
                  <option>Technical Issue</option>
                  <option>Other</option>
                </select>
                <i class="fas fa-chevron-down tf-sel-arrow"></i>
              </div>
            </div>
            <div class="tf-group">
              <label class="tf-label">Priority <span class="tf-required">*</span></label>
              <div class="tf-priority-grid">
                <label class="tf-priority-opt">
                  <input type="radio" name="priority" value="Low" />
                  <span class="tf-priority-pill" style="--pb:rgba(16,185,129,0.12);--pc:var(--green)">Low</span>
                </label>
                <label class="tf-priority-opt">
                  <input type="radio" name="priority" value="Medium" checked />
                  <span class="tf-priority-pill" style="--pb:rgba(37,99,235,0.12);--pc:var(--primary)">Medium</span>
                </label>
                <label class="tf-priority-opt">
                  <input type="radio" name="priority" value="High" />
                  <span class="tf-priority-pill" style="--pb:rgba(245,158,11,0.12);--pc:var(--warning)">High</span>
                </label>
                <label class="tf-priority-opt">
                  <input type="radio" name="priority" value="Critical" />
                  <span class="tf-priority-pill" style="--pb:rgba(239,68,68,0.12);--pc:var(--danger)">Critical</span>
                </label>
              </div>
            </div>
          </div>

          <div class="tf-group">
            <label class="tf-label">Subject <span class="tf-required">*</span></label>
            <div class="tf-input-wrap">
              <i class="fas fa-heading tf-icon"></i>
              <input type="text" class="tf-input" required id="ticketSubject" placeholder="Brief description of your issue" />
            </div>
          </div>

          <div class="tf-group">
            <label class="tf-label">Description <span class="tf-required">*</span></label>
            <textarea class="tf-input tf-textarea" required id="ticketDesc" placeholder="Please describe your issue in detail, including steps to reproduce..."></textarea>
          </div>

          <div class="tf-group" style="margin-bottom:0;">
            <label class="tf-label">Attachments <span class="tf-optional">(Optional)</span></label>
            <div class="tf-dropzone" id="tfDropzone" ondragover="handleDragOver(event)" ondragleave="handleDragLeave()" ondrop="handleDrop(event)" onclick="document.getElementById('tfFileInput').click()">
              <i class="fas fa-cloud-arrow-up tf-drop-icon"></i>
              <span class="tf-drop-text">Drag and drop screenshots here or <span class="tf-drop-link">browse files</span></span>
              <span class="tf-drop-hint">Supports PDF, PNG, JPG up to 10MB</span>
              <input type="file" id="tfFileInput" multiple style="display:none" onchange="handleFileSelect(event)" />
            </div>
            <div class="tf-file-list" id="tfFileList"></div>
          </div>
        </div>

        <div class="ticket-form-footer">
          <button type="button" class="btn btn-outline btn-sm" onclick="resetTicketForm()">Clear</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit Ticket</button>
        </div>
      </form>

      <!-- Ticket Success View (hidden by default) -->
      <div class="ticket-success" id="ticketSuccess" style="display:none;">
        <div class="ticket-success-icon"><i class="fas fa-circle-check"></i></div>
        <h4>Ticket Submitted Successfully!</h4>
        <p>Your support ticket has been registered. Our agent team is working on it and will get back to you shortly.</p>
        <button class="btn btn-primary btn-sm" onclick="resetTicketSuccess()">Submit Another Ticket</button>
      </div>

    </div>

    <!-- Recent Tickets -->
    <div class="support-card-box">
      <div class="support-card-header">
        <div class="support-card-icon-wrap" style="background:rgba(37,99,235,0.1);color:var(--primary)"><i class="fas fa-clock-rotate-left"></i></div>
        <div>
          <h3 class="support-card-title">Recent Tickets</h3>
          <p class="support-card-sub">Your latest support requests</p>
        </div>
      </div>

      <div class="recent-tickets-list">
        <div class="recent-ticket-item">
          <span class="recent-ticket-id">#4821</span>
          <div class="recent-ticket-info">
            <div class="recent-ticket-subject">Unable to close expired internship listing</div>
            <div class="recent-ticket-meta">Opened May 18, 2026 <span class="dot">·</span> Technical Issue</div>
          </div>
          <span class="ticket-pill ticket-pill-progress">In Progress</span>
        </div>

        <div class="recent-ticket-item">
          <span class="recent-ticket-id">#4774</span>
          <div class="recent-ticket-info">
            <div class="recent-ticket-subject">How to export applicant data to CSV?</div>
            <div class="recent-ticket-meta">Opened May 10, 2026 <span class="dot">·</span> Applicant Management</div>
          </div>
          <span class="ticket-pill ticket-pill-resolved">Resolved</span>
        </div>

        <div class="recent-ticket-item" style="border-bottom:none;">
          <span class="recent-ticket-id">#4699</span>
          <div class="recent-ticket-info">
            <div class="recent-ticket-subject">Interview invite email not delivered to candidate</div>
            <div class="recent-ticket-meta">Opened Apr 29, 2026 <span class="dot">·</span> Interview Scheduling</div>
          </div>
          <span class="ticket-pill ticket-pill-resolved">Resolved</span>
        </div>
      </div>
    </div>

  </div><!-- /right -->
</div><!-- /support-two-col -->

<style>
/* ══ HERO BANNER ══ */
.support-hero {
  position: relative;
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, var(--primary-light) 100%);
  border-radius: 20px;
  padding: 36px 40px;
  margin-bottom: 28px;
  overflow: hidden;
  color: #fff;
}

.support-hero-orb {
  position: absolute;
  border-radius: 50%;
  pointer-events: none;
}
.support-hero-orb-1 { width:300px;height:300px;right:-80px;top:-80px;background:radial-gradient(circle,rgba(255,255,255,0.12) 0%,transparent 70%); }
.support-hero-orb-2 { width:200px;height:200px;right:120px;bottom:-60px;background:radial-gradient(circle,rgba(255,255,255,0.08) 0%,transparent 70%); }
.support-hero-orb-3 { width:150px;height:150px;left:30%;top:-40px;background:radial-gradient(circle,rgba(255,255,255,0.06) 0%,transparent 70%); }

.support-hero-content { position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;gap:28px;flex-wrap:wrap; }
.support-hero-left { display:flex;align-items:flex-start;gap:20px;flex:1; }

.support-hero-icon-wrap { position:relative;flex-shrink:0; }
.support-hero-icon-ring {
  position:absolute;inset:-6px;border-radius:50%;
  border:2px solid rgba(255,255,255,0.25);
  animation: ring-pulse 2.5s ease-in-out infinite;
}
@keyframes ring-pulse { 0%,100%{transform:scale(1);opacity:0.5} 50%{transform:scale(1.1);opacity:1} }
.support-hero-icon {
  width:56px;height:56px;border-radius:50%;
  background:rgba(255,255,255,0.2);backdrop-filter:blur(8px);
  display:flex;align-items:center;justify-content:center;
  font-size:24px;color:#fff;
}

.support-hero-title { font-size:24px;font-weight:800;margin:0 0 6px;color:#fff; }
.support-hero-desc  { font-size:13px;color:rgba(255,255,255,0.85);margin:0 0 18px;max-width:500px;line-height:1.65; }

.support-hero-stats { display:flex;align-items:center;gap:0;background:rgba(255,255,255,0.12);backdrop-filter:blur(8px);border-radius:12px;padding:12px 20px;width:fit-content; }
.support-hero-stat { text-align:center;padding:0 16px; }
.support-hero-stat-val { display:block;font-size:20px;font-weight:800;color:#fff; }
.support-hero-stat-lbl { display:block;font-size:11px;color:rgba(255,255,255,0.7);margin-top:2px;font-weight:500; }
.support-hero-stat-sep { width:1px;background:rgba(255,255,255,0.2);height:36px; }

.support-hero-cta-wrap { display:flex;flex-direction:column;gap:10px;align-items:flex-end; }
.support-hero-btn {
  padding:11px 24px;border-radius:10px;
  background:#fff;color:var(--primary);
  font-size:14px;font-weight:700;
  border:none;cursor:pointer;
  display:flex;align-items:center;gap:8px;
  transition:all 0.2s ease;
  white-space:nowrap;
  box-shadow:0 4px 12px rgba(0,0,0,0.15);
}
.support-hero-btn:hover { transform:translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,0.2); }
.support-hero-btn-ghost {
  padding:11px 24px;border-radius:10px;
  background:rgba(255,255,255,0.15);color:#fff;
  font-size:14px;font-weight:600;
  border:1.5px solid rgba(255,255,255,0.3);cursor:pointer;
  display:flex;align-items:center;gap:8px;
  transition:all 0.2s ease;
  white-space:nowrap;
  backdrop-filter:blur(8px);
}
.support-hero-btn-ghost:hover { background:rgba(255,255,255,0.25); }

/* ══ TWO-COL GRID ══ */
.support-two-col { display:grid;grid-template-columns:1fr 1fr;gap:20px; }
.support-col { display:flex;flex-direction:column;gap:20px; }

/* ══ CARD BOX ══ */
.support-card-box {
  background:var(--white);border-radius:16px;
  border:1px solid var(--border);
  box-shadow:var(--shadow-sm);
  overflow:hidden;
  transition:var(--transition);
}
.support-card-box:hover { box-shadow:var(--shadow); }

.support-card-header {
  display:flex;align-items:center;gap:14px;
  padding:20px 24px;
  border-bottom:1px solid var(--border);
  background:var(--gray-50);
}
.support-card-icon-wrap { width:38px;height:38px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
.support-card-title { font-size:15px;font-weight:700;color:var(--gray-800);margin:0 0 2px; }
.support-card-sub   { font-size:12px;color:var(--gray-400);margin:0; }

/* ══ FAQ ══ */
.faq-search-wrap { position:relative;padding:16px 24px 8px; }
.faq-search-icon { position:absolute;left:36px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none; }
.faq-search-input {
  width:100%;padding:10px 14px 10px 36px;
  border:1.5px solid var(--gray-200);border-radius:10px;
  font-size:13px;color:var(--gray-700);
  font-family:inherit;outline:none;
  transition:var(--transition);background:var(--white);
}
.faq-search-input:focus { border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-bg); }
.faq-search-input::placeholder { color:var(--gray-400); }

.faq-list { padding:8px 24px 0; }

.faq-item {
  border-bottom:1px solid var(--border);
  cursor:pointer;
  transition:var(--transition);
}
.faq-item:last-child { border-bottom:none; }

.faq-question {
  display:flex;align-items:center;gap:12px;
  padding:14px 0;
  font-size:13px;font-weight:600;color:var(--gray-700);
  user-select:none;
}
.faq-q-icon { width:30px;height:30px;border-radius:8px;background:var(--gray-100);color:var(--gray-500);display:flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0; }
.faq-question span { flex:1; }
.faq-arrow { font-size:12px;color:var(--gray-400);transition:transform 0.3s ease;flex-shrink:0; }

.faq-answer {
  max-height:0;overflow:hidden;
  font-size:13px;color:var(--gray-600);line-height:1.7;
  transition:max-height 0.35s ease, padding 0.25s ease;
  padding:0 0 0 42px;
}

.faq-item.open .faq-arrow { transform:rotate(-180deg); }
.faq-item.open .faq-question { color:var(--primary); }
.faq-item.open .faq-q-icon { background:var(--primary-bg);color:var(--primary); }
.faq-item.open .faq-answer { max-height:200px;padding:0 0 16px 42px; }

.faq-empty { text-align:center;padding:32px 24px;color:var(--gray-400); }
.faq-empty i { font-size:28px;margin-bottom:10px;display:block; }
.faq-empty p { font-size:13px;margin:0; }

/* ══ CONTACT CHANNELS ══ */
.contact-channels-list { padding:0 24px; }
.contact-channel {
  display:flex;align-items:center;gap:14px;
  padding:16px 0;
  border-bottom:1px solid var(--border);
}
.contact-channel-icon { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
.contact-channel-info { flex:1; }
.contact-channel-label { font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--gray-400);margin-bottom:2px; }
.contact-channel-value { font-size:14px;font-weight:600;color:var(--gray-800);display:block; }
.contact-channel-value:hover { color:var(--primary); }
.contact-channel-note { font-size:11px;color:var(--gray-400);margin-top:3px;display:flex;align-items:center;gap:5px; }
.contact-channel-btn {
  padding:7px 14px;border-radius:8px;
  border:1.5px solid var(--gray-200);background:var(--white);
  font-size:12px;font-weight:600;color:var(--gray-600);
  cursor:pointer;transition:var(--transition);
  display:flex;align-items:center;gap:6px;white-space:nowrap;
  text-decoration:none;
}
.contact-channel-btn:hover { border-color:var(--primary);color:var(--primary);background:rgba(0,177,170,0.04); }
.contact-channel-btn-primary { background:var(--primary);color:#fff;border-color:var(--primary); }
.contact-channel-btn-primary:hover { background:var(--primary-dark);border-color:var(--primary-dark);color:#fff; }

/* ══ TICKET FORM ══ */
.ticket-form-body { padding:20px 24px; }
.tf-group { margin-bottom:18px; }
.tf-label { display:block;font-size:12px;font-weight:600;color:var(--gray-700);margin-bottom:7px; }
.tf-required { color:var(--danger); }
.tf-optional { color:var(--gray-400);font-weight:400; }
.tf-input-wrap,.tf-select-wrap { position:relative; }
.tf-icon { position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:12px;pointer-events:none;z-index:1; }
.tf-sel-arrow { position:absolute;right:10px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:10px;pointer-events:none; }
.tf-input {
  width:100%;padding:10px 14px;
  border:1.5px solid var(--gray-200);border-radius:9px;
  font-size:13px;color:var(--gray-800);background:var(--white);
  font-family:inherit;outline:none;transition:var(--transition);
}
.tf-input:focus { border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-bg); }
.tf-input::placeholder { color:var(--gray-400); }
.tf-input-wrap .tf-input,.tf-select-wrap .tf-input { padding-left:34px; }
.tf-select { appearance:none;cursor:pointer;padding-right:30px; }
.tf-textarea { resize:vertical;min-height:120px;font-size:13px; }
.tf-row { display:grid;grid-template-columns:1fr 1fr;gap:14px; }

/* Priority pills */
.tf-priority-grid { display:grid;grid-template-columns:repeat(4, 1fr);gap:8px; }
.tf-priority-opt { position:relative;cursor:pointer; }
.tf-priority-opt input { position:absolute;opacity:0;pointer-events:none; }
.tf-priority-pill {
  display:block;text-align:center;
  padding:7px 8px;border-radius:8px;
  font-size:12px;font-weight:600;
  color:var(--pc);background:var(--pb);
  border:1.5px solid transparent;
  transition:var(--transition);cursor:pointer;
}
.tf-priority-opt input:checked + .tf-priority-pill { border-color:var(--pc);box-shadow:0 0 0 2px var(--pb); }

/* File dropzone */
.tf-dropzone {
  border:2px dashed var(--gray-200);border-radius:10px;
  padding:22px;text-align:center;
  cursor:pointer;transition:var(--transition);
  background:var(--gray-50);
}
.tf-dropzone:hover,.tf-dropzone.dragover { border-color:var(--primary);background:var(--primary-bg); }
.tf-drop-icon { font-size:28px;color:var(--gray-300);margin-bottom:8px;display:block; }
.tf-dropzone:hover .tf-drop-icon { color:var(--primary); }
.tf-drop-text { font-size:13px;color:var(--gray-500); }
.tf-drop-link { color:var(--primary);font-weight:600;text-decoration:underline; }
.tf-drop-hint { font-size:11px;color:var(--gray-400);margin-top:4px; }

.tf-file-list { margin-top:8px;display:flex;flex-direction:column;gap:6px; }
.tf-file-item {
  display:flex;align-items:center;gap:8px;
  background:var(--gray-50);border-radius:7px;
  padding:6px 10px;font-size:12px;color:var(--gray-700);
  border:1px solid var(--border);
}
.tf-file-item i { color:var(--danger); }
.tf-file-item span { flex:1; }
.tf-file-remove { cursor:pointer;color:var(--gray-400);font-size:14px;transition:color 0.2s; }
.tf-file-remove:hover { color:var(--danger); }

.ticket-form-footer {
  display:flex;gap:10px;justify-content:flex-end;
  padding:14px 24px;
  border-top:1px solid var(--border);
  background:var(--gray-50);
}

/* Success state */
.ticket-success { text-align:center;padding:40px 28px; }
.ticket-success-icon { width:72px;height:72px;border-radius:50%;background:rgba(16,185,129,0.1);color:var(--green);display:inline-flex;align-items:center;justify-content:center;font-size:30px;margin-bottom:16px;animation:scaleIn 0.5s cubic-bezier(0.34,1.56,0.64,1); }
@keyframes scaleIn { from{transform:scale(0)} to{transform:scale(1)} }
.ticket-success h4 { font-size:18px;font-weight:700;color:var(--gray-800);margin:0 0 8px; }
.ticket-success p { font-size:13px;color:var(--gray-500);line-height:1.65;margin:0 0 20px; }

/* ══ RECENT TICKETS ══ */
.recent-tickets-list { padding:0 24px; }
.recent-ticket-item {
  display:flex;align-items:center;gap:12px;
  padding:14px 0;
  border-bottom:1px solid var(--border);
  transition:var(--transition);
}
.recent-ticket-item:hover { background:var(--gray-50);margin:0 -24px;padding:14px 24px;border-radius:8px;border-bottom-color:transparent; }

.recent-ticket-id {
  font-size:11px;font-weight:700;color:var(--primary);
  background:var(--primary-bg);padding:4px 8px;border-radius:6px;
  white-space:nowrap;flex-shrink:0;
}
.recent-ticket-info { flex:1; }
.recent-ticket-subject { font-size:13px;font-weight:600;color:var(--gray-800);margin-bottom:3px; }
.recent-ticket-meta { font-size:11px;color:var(--gray-400);display:flex;align-items:center;gap:6px;flex-wrap:wrap; }
.recent-ticket-meta i { font-size:10px; }
.dot { color:var(--gray-300); }

.ticket-pill { display:inline-flex;align-items:center;font-size:11px;font-weight:700;padding:4px 10px;border-radius:20px;white-space:nowrap;flex-shrink:0; }
.ticket-pill-progress { background:rgba(37,99,235,0.1);color:var(--primary); }
.ticket-pill-resolved { background:rgba(16,185,129,0.1);color:var(--green); }
.ticket-pill-open     { background:rgba(245,158,11,0.1);color:var(--warning); }
.ticket-pill-closed   { background:var(--gray-100);color:var(--gray-500); }

/* ══ RESPONSIVE ══ */
@media (max-width:900px) {
  .support-two-col { grid-template-columns:1fr; }
  .support-hero-content { flex-direction:column;align-items:flex-start; }
  .support-hero-cta-wrap { flex-direction:row;align-items:flex-start; }
  .tf-row { grid-template-columns:1fr; }
}
</style>

<script>
// ── FAQ TOGGLE ──
function toggleFaq(item) {
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}

// ── FAQ SEARCH ──
function filterFaqs() {
  const q = document.getElementById('faqSearch').value.toLowerCase();
  const items = document.querySelectorAll('.faq-item');
  let shown = 0;
  items.forEach(item => {
    const text = (item.querySelector('.faq-question span').textContent + ' ' + item.getAttribute('data-keywords') + ' ' + item.querySelector('.faq-answer').textContent).toLowerCase();
    const match = text.includes(q);
    item.style.display = match ? '' : 'none';
    if (match) shown++;
  });
  document.getElementById('faqEmpty').style.display = shown === 0 ? 'block' : 'none';
}

// ── TICKET SUBMIT ──
function submitTicket(e) {
  e.preventDefault();
  const form   = document.getElementById('ticketForm');
  const body   = form.querySelector('.ticket-form-body');
  const footer = form.querySelector('.ticket-form-footer');
  const success= document.getElementById('ticketSuccess');

  body.style.opacity = '0';
  body.style.transform = 'translateY(-8px)';
  body.style.transition = 'all 0.3s ease';

  setTimeout(() => {
    body.style.display = 'none';
    footer.style.display = 'none';
    success.style.display = 'block';
  }, 300);
}

function resetTicketSuccess() {
  const form   = document.getElementById('ticketForm');
  const body   = form.querySelector('.ticket-form-body');
  const footer = form.querySelector('.ticket-form-footer');
  const success= document.getElementById('ticketSuccess');
  success.style.display = 'none';
  body.style.display = 'block';
  body.style.opacity = '1';
  body.style.transform = 'none';
  footer.style.display = 'flex';
  form.reset();
  document.getElementById('tfFileList').innerHTML = '';
}

function resetTicketForm() {
  const form = document.getElementById('ticketForm');
  form.reset();
  document.getElementById('tfFileList').innerHTML = '';
}

// ── FILE HANDLING ──
function handleFileSelect(e) {
  const files = e.target.files;
  renderFiles(files);
}

function handleDrop(e) {
  e.preventDefault();
  document.getElementById('tfDropzone').classList.remove('dragover');
  renderFiles(e.dataTransfer.files);
}

function handleDragOver(e) {
  e.preventDefault();
  document.getElementById('tfDropzone').classList.add('dragover');
}

function handleDragLeave() {
  document.getElementById('tfDropzone').classList.remove('dragover');
}

function renderFiles(files) {
  const list = document.getElementById('tfFileList');
  Array.from(files).forEach(file => {
    const item = document.createElement('div');
    item.className = 'tf-file-item';
    const ext = file.name.split('.').pop().toLowerCase();
    const icon = { pdf:'fa-file-pdf', png:'fa-file-image', jpg:'fa-file-image', jpeg:'fa-file-image' }[ext] || 'fa-file';
    item.innerHTML = `<i class="fas ${icon}"></i><span>${file.name}</span><span style="color:var(--gray-400);font-size:11px">${(file.size/1024).toFixed(1)}KB</span><i class="fas fa-xmark tf-file-remove" onclick="this.closest('.tf-file-item').remove()"></i>`;
    list.appendChild(item);
  });
}

// ── COPY TO CLIPBOARD ──
function copyToClipboard(text, btn) {
  navigator.clipboard.writeText(text).then(() => {
    const orig = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-circle-check"></i> Copied!';
    btn.style.color = 'var(--green)';
    btn.style.borderColor = 'rgba(16,185,129,0.4)';
    setTimeout(() => { btn.innerHTML = orig; btn.style.color = ''; btn.style.borderColor = ''; }, 2000);
  });
}
</script>

</x-layouts::company>
