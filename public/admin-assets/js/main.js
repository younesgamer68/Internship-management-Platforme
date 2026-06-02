/* ============================================
   Main JS - Common utilities
   ============================================ */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    initFAQ();
    initModals();
    animateNumbers();
    animateBars();
    initDonutCharts();
    initDropdowns();
  });

  // FAQ accordion
  function initFAQ() {
    document.querySelectorAll('.faq-question').forEach(btn => {
      btn.addEventListener('click', function () {
        const item = this.closest('.faq-item');
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
      });
    });
  }

  // Modal open/close
  function initModals() {
    document.querySelectorAll('[data-modal]').forEach(btn => {
      btn.addEventListener('click', function () {
        const modalId = this.dataset.modal;
        const modal = document.getElementById(modalId);
        if (modal) modal.classList.add('active');
      });
    });

    document.querySelectorAll('.modal-close, [data-modal-close]').forEach(btn => {
      btn.addEventListener('click', function () {
        const overlay = this.closest('.modal-overlay');
        if (overlay) overlay.classList.remove('active');
      });
    });

    document.querySelectorAll('.modal-overlay').forEach(overlay => {
      overlay.addEventListener('click', function (e) {
        if (e.target === this) this.classList.remove('active');
      });
    });
  }

  // Animate stat numbers
  function animateNumbers() {
    document.querySelectorAll('.stat-value[data-target]').forEach(el => {
      const target = parseInt(el.dataset.target, 10);
      const duration = 1000;
      const start = performance.now();

      function update(now) {
        const elapsed = now - start;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.floor(eased * target).toLocaleString();
        if (progress < 1) requestAnimationFrame(update);
      }

      requestAnimationFrame(update);
    });
  }

  // Animate progress bars
  function animateBars() {
    document.querySelectorAll('.progress-fill[data-width], .analytics-bar-fill[data-width]').forEach(el => {
      const width = el.dataset.width;
      setTimeout(() => {
        el.style.width = width + '%';
      }, 100);
    });
  }

  // Donut charts via SVG
  function initDonutCharts() {
    document.querySelectorAll('.donut-chart[data-value]').forEach(el => {
      const value = parseFloat(el.dataset.value);
      const color = el.dataset.color || '#2563EB';
      const trackColor = '#E5E7EB';
      const r = 34;
      const cx = 45;
      const cy = 45;
      const circumference = 2 * Math.PI * r;
      const offset = circumference - (value / 100) * circumference;

      const svg = el.querySelector('svg');
      if (!svg) return;

      svg.setAttribute('viewBox', '0 0 90 90');

      svg.innerHTML = `
        <circle cx="${cx}" cy="${cy}" r="${r}" fill="none" stroke="${trackColor}" stroke-width="8"/>
        <circle cx="${cx}" cy="${cy}" r="${r}" fill="none" stroke="${color}" stroke-width="8"
          stroke-linecap="round"
          stroke-dasharray="${circumference}"
          stroke-dashoffset="${circumference}"
          style="transition: stroke-dashoffset 1s ease;"
          class="donut-arc"/>
      `;

      setTimeout(() => {
        const arc = svg.querySelector('.donut-arc');
        if (arc) arc.style.strokeDashoffset = offset;
      }, 200);
    });
  }

  // Dropdown menus
  function initDropdowns() {
    document.querySelectorAll('[data-dropdown]').forEach(btn => {
      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        const targetId = this.dataset.dropdown;
        const menu = document.getElementById(targetId);
        if (!menu) return;

        const isOpen = menu.classList.contains('open');
        document.querySelectorAll('.dropdown-menu.open').forEach(m => m.classList.remove('open'));

        if (!isOpen) menu.classList.add('open');
      });
    });

    document.addEventListener('click', () => {
      document.querySelectorAll('.dropdown-menu.open').forEach(m => m.classList.remove('open'));
    });
  }

  // Toast notifications
  window.showToast = function (message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.innerHTML = `
      <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'times-circle' : 'info-circle'}"></i>
      <span>${message}</span>
    `;

    let container = document.getElementById('toastContainer');
    if (!container) {
      container = document.createElement('div');
      container.id = 'toastContainer';
      container.style.cssText = 'position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:8px;';
      document.body.appendChild(container);
    }

    toast.style.cssText = `
      display:flex;align-items:center;gap:10px;
      padding:12px 18px;background:white;border-radius:10px;
      box-shadow:0 4px 12px rgba(0,0,0,0.15);border-left:4px solid;
      font-size:13px;font-weight:500;color:#374151;
      animation:slideIn 0.3s ease;min-width:240px;
      border-left-color:${type === 'success' ? '#10B981' : type === 'error' ? '#EF4444' : '#2563EB'};
    `;

    if (!document.getElementById('toastStyles')) {
      const style = document.createElement('style');
      style.id = 'toastStyles';
      style.textContent = '@keyframes slideIn{from{opacity:0;transform:translateX(20px)}to{opacity:1;transform:translateX(0)}}';
      document.head.appendChild(style);
    }

    container.appendChild(toast);
    setTimeout(() => {
      toast.style.animation = 'slideIn 0.3s ease reverse';
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  };

})();
