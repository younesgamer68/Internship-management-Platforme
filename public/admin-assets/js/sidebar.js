/* ============================================
   Sidebar - Reusable across all dashboards
   ============================================ */

(function () {
  'use strict';

  function initSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggle');
    const collapseBtn = document.getElementById('sidebarCollapseBtn');
    const mainContent = document.querySelector('.main-content');
    const topbar = document.querySelector('.topbar');

    if (!sidebar) return;

    // Mark active nav item based on current URL
    const currentPath = window.location.pathname.split('/').pop() || 'Dashboard.html';
    const navItems = sidebar.querySelectorAll('.nav-item[href]');

    navItems.forEach(item => {
      const href = item.getAttribute('href');
      if (href && (href === currentPath || href.endsWith(currentPath))) {
        item.classList.add('active');
      }
    });

    // Mobile toggle
    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('mobile-open');
        overlay && overlay.classList.toggle('active');
      });
    }

    // Overlay click to close
    if (overlay) {
      overlay.addEventListener('click', () => {
        sidebar.classList.remove('mobile-open');
        overlay.classList.remove('active');
      });
    }

    // Desktop collapse (Disabled - always open)
    if (sidebar.classList.contains('collapsed')) {
      sidebar.classList.remove('collapsed');
    }
  }

  document.addEventListener('DOMContentLoaded', initSidebar);
})();
