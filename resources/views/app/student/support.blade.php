<x-layouts::app :title="__('Help & Support')">
<!-- Support Hero -->
<div class="support-card">
  <div class="support-card-icon"><i class="fas fa-headset"></i></div>
  <div class="support-card-content">
    <h2>How can we help you?</h2>
    <p>Browse our frequently asked questions, submit a support ticket, or reach out to us directly. We're here to make your internship journey smooth.</p>
  </div>
</div>

<!-- Two-Col Grid -->
<div class="support-grid">

  <!-- LEFT -->
  <div class="support-col">

    <!-- FAQ -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Frequently Asked Questions</h3>
      </div>
      <div class="card-body faq-body">

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span>How do I apply for an internship?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            Browse the Internship Listings page, find a position that interests you, and click the "Apply Now" button. Make sure your documents are uploaded before applying, as they will be submitted along with your application.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span>Can I withdraw an application?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            Yes, you can withdraw a pending application from the Applications page by clicking the "Withdraw" button on the relevant row. Once an offer has been accepted, please contact the coordinator to discuss withdrawal.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span>What documents do I need to upload?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            The required documents are: Resume, Cover Letter, Academic Transcript, and a copy of your National ID or passport. Additional documents such as reference letters may be required depending on the internship.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span>How will I know if I got an interview?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            You will receive a notification inside the platform and an email to your registered address. Your application status will also update to "Interview Scheduled" on the Applications page with the date and time details.
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span>What happens after I'm accepted?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            Upon acceptance, you will need to sign the Internship Agreement document and upload it to the Documents section. The university coordinator will then complete the administrative process and confirm your start date with the company.
          </div>
        </div>

      </div>
    </div>

    <!-- Contact Us -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Contact Us</h3>
      </div>
      <div class="card-body contact-channels">
        <div class="contact-channel-item">
          <div class="contact-icon-wrap" style="background: rgba(37,99,235,0.1); color: var(--primary);">
            <i class="fas fa-envelope"></i>
          </div>
          <div class="contact-channel-info">
            <div class="contact-channel-label">Email Support</div>
            <a href="mailto:internlink@epoka.edu.al" class="contact-channel-value">internlink@epoka.edu.al</a>
            <div class="contact-channel-note">Replies within 24 hours</div>
          </div>
          <button class="btn btn-sm btn-outline" onclick="navigator.clipboard.writeText('internlink@epoka.edu.al'); alert('Email copied!');">Copy</button>
        </div>

        <div class="contact-channel-item">
          <div class="contact-icon-wrap" style="background: var(--primary-bg); color: var(--primary);">
            <i class="fas fa-phone"></i>
          </div>
          <div class="contact-channel-info">
            <div class="contact-channel-label">Phone Support</div>
            <div class="contact-channel-value">+355 4 223 2086</div>
            <div class="contact-channel-note">Available Mon-Fri, 9am-5pm</div>
          </div>
          <a href="tel:+35542232086" class="btn btn-sm btn-outline">Call</a>
        </div>

        <div class="contact-channel-item" style="border-bottom: none; padding-bottom: 0;">
          <div class="contact-icon-wrap" style="background: rgba(99,102,241,0.1); color: #6366F1;">
            <i class="fas fa-comment-dots"></i>
          </div>
          <div class="contact-channel-info">
            <div class="contact-channel-label">Live Chat</div>
            <div class="contact-channel-value">In-App Assistant</div>
            <div class="contact-channel-note">Online now</div>
          </div>
          <button class="btn btn-sm btn-primary">Chat</button>
        </div>
      </div>
    </div>

  </div>

  <!-- RIGHT -->
  <div class="support-col">

    <!-- Submit a Ticket -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Submit a Ticket</h3>
      </div>
      <div class="card-body">
        <form class="ticket-form" onsubmit="submitTicket(event);">
          <div class="form-group">
            <label class="form-label">Subject</label>
            <input type="text" class="form-control" placeholder="Brief description of your issue" required />
          </div>
          <div class="form-group">
            <label class="form-label">Category</label>
            <div style="position: relative;">
              <select class="form-control" required style="appearance: none; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; padding-right: 36px;">
                <option value="">Select a category</option>
                <option>Application Issue</option>
                <option>Document Upload</option>
                <option>Account Access</option>
                <option>Technical Problem</option>
                <option>General Inquiry</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="5" placeholder="Describe your issue in detail..." required style="resize: vertical;"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block" style="justify-content: center;"><i class="fas fa-paper-plane"></i> Submit Ticket</button>
        </form>
      </div>
    </div>

    <!-- My Tickets -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">My Tickets</h3>
      </div>
      <div class="card-body recent-tickets">

        <div class="ticket-item">
          <div class="ticket-num-badge">#TK-1042</div>
          <div class="ticket-info">
            <div class="ticket-subject">Document upload not working</div>
            <div class="ticket-meta">Submitted May 18 &nbsp;·&nbsp; Open</div>
          </div>
          <span class="ticket-status in-progress">Open</span>
        </div>

        <div class="ticket-item">
          <div class="ticket-num-badge">#TK-1039</div>
          <div class="ticket-info">
            <div class="ticket-subject">Application status not updating</div>
            <div class="ticket-meta">Submitted May 14 &nbsp;·&nbsp; Resolved</div>
          </div>
          <span class="ticket-status resolved">Resolved</span>
        </div>

        <div class="ticket-item" style="border-bottom: none; padding-bottom: 0;">
          <div class="ticket-num-badge">#TK-1031</div>
          <div class="ticket-info">
            <div class="ticket-subject">Unable to download transcript</div>
            <div class="ticket-meta">Submitted May 8 &nbsp;·&nbsp; Resolved</div>
          </div>
          <span class="ticket-status resolved">Resolved</span>
        </div>

      </div>
    </div>

  </div>
</div>

<script>
  function toggleFaq(item) {
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
  }

  function submitTicket(e) {
    e.preventDefault();
    const btn = e.target.querySelector('[type="submit"]');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-circle-check"></i> Ticket Submitted!';
     btn.style.background = 'var(--primary)';
    btn.disabled = true;
    setTimeout(() => {
      btn.innerHTML = originalText;
      btn.style.background = '';
      btn.disabled = false;
      e.target.reset();
    }, 2500);
  }
</script>
</x-layouts::app>
