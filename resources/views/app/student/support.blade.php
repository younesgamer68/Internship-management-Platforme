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

        <div class="faq-item" x-data="{ open: false }" :class="open ? 'open' : ''">
          <div class="faq-question" @click="open = !open">
            <span>How do I apply for an internship?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            Browse the Internship Listings page, find a position that interests you, and click the "Apply Now" button. Make sure your documents are uploaded before applying, as they will be submitted along with your application.
          </div>
        </div>

        <div class="faq-item" x-data="{ open: false }" :class="open ? 'open' : ''">
          <div class="faq-question" @click="open = !open">
            <span>Can I withdraw an application?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            Yes, you can withdraw a pending application from the Applications page by clicking the "Withdraw" button on the relevant row. Once an offer has been accepted, please contact the coordinator to discuss withdrawal.
          </div>
        </div>

        <div class="faq-item" x-data="{ open: false }" :class="open ? 'open' : ''">
          <div class="faq-question" @click="open = !open">
            <span>What documents do I need to upload?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            The required documents are: Resume, Cover Letter, Academic Transcript, and a copy of your National ID or passport. Additional documents such as reference letters may be required depending on the internship.
          </div>
        </div>

        <div class="faq-item" x-data="{ open: false }" :class="open ? 'open' : ''">
          <div class="faq-question" @click="open = !open">
            <span>How will I know if I got an interview?</span>
            <i class="fas fa-chevron-down faq-chevron"></i>
          </div>
          <div class="faq-answer">
            You will receive a notification inside the platform and an email to your registered address. Your application status will also update to "Interview Scheduled" on the Applications page with the date and time details.
          </div>
        </div>

        <div class="faq-item" x-data="{ open: false }" :class="open ? 'open' : ''">
          <div class="faq-question" @click="open = !open">
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
            <a href="mailto:youness.ben-touttibt.00@edu.uiz.ac.ma" class="contact-channel-value">youness.ben-touttibt.00@edu.uiz.ac.ma</a>
            <div class="contact-channel-note">Replies within 24 hours</div>
          </div>
          <button class="btn btn-sm btn-outline" onclick="copyEmail()">Copy</button>
        </div>

        <div class="contact-channel-item">
          <div class="contact-icon-wrap" style="background: var(--primary-bg); color: var(--primary);">
            <i class="fas fa-phone"></i>
          </div>
          <div class="contact-channel-info">
            <div class="contact-channel-label">Phone Support</div>
            <div class="contact-channel-value">+212 650-671376</div>
            <div class="contact-channel-note">Available Mon-Fri, 9am-5pm</div>
          </div>
          <a href="tel:+212650671376" class="btn btn-sm btn-outline">Call</a>
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
          <button class="btn btn-sm btn-primary" onclick="window.dispatchEvent(new CustomEvent('open-chatbot-widget'))">Chat</button>
        </div>
      </div>
    </div>

  </div>

  <!-- RIGHT -->
  <div class="support-col">
      <livewire:student.support />
  </div>
</div>

<script>
  function copyEmail() {
    const email = "youness.ben-touttibt.00@edu.uiz.ac.ma";
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(email).then(() => {
            if (window.showGlobalToast) {
                window.showGlobalToast("Email copied to clipboard!", "success");
            } else {
                alert("Email copied!");
            }
        }).catch(err => {
            fallbackCopy(email);
        });
    } else {
        fallbackCopy(email);
    }
  }

  function fallbackCopy(text) {
    var temp = document.createElement("input");
    temp.value = text;
    document.body.appendChild(temp);
    temp.select();
    try {
        document.execCommand("copy");
        if (window.showGlobalToast) {
            window.showGlobalToast("Email copied to clipboard!", "success");
        } else {
            alert("Email copied!");
        }
    } catch(err) {
        if (window.showGlobalToast) {
            window.showGlobalToast("Failed to copy email.", "error");
        } else {
            alert("Failed to copy email.");
        }
    }
    document.body.removeChild(temp);
  }
</script>
</x-layouts::app>
