<x-layouts::admin title="Users Management">

  @livewire('admin.users-table')

  <!-- ═══════════════════════════════════════
       STYLES
  ════════════════════════════════════════ -->
  <style>
    @keyframes slideUp {
      from { transform: translateY(20px); opacity: 0; }
      to   { transform: translateY(0);    opacity: 1; }
    }

    /* ── SEARCH INPUT WRAPPER ── */
    .search-input-wrapper {
      display:flex;align-items:center;gap:8px;
      background:#fff;border:1.5px solid var(--gray-300);
      border-radius:8px;padding:8px 14px;flex:1;min-width:200px;
      transition: var(--transition);
    }
    html.admin-dark .search-input-wrapper, html.dark .search-input-wrapper {
      background: var(--white);
      border-color: var(--border);
    }

    /* ── FILTER SELECT CUSTOM ── */
    .filter-select-custom {
      padding:9px 14px;border:1.5px solid var(--gray-300);border-radius:8px;
      font-size:13px;color:var(--gray-700);background:#fff;cursor:pointer;
      transition: var(--transition);
    }
    html.admin-dark .filter-select-custom, html.dark .filter-select-custom {
      background: var(--white);
      border-color: var(--border);
      color: var(--gray-700);
    }

    /* ── ROLE BADGES ── */
    .role-badge-student {
      padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;
      background:rgba(59,130,246,0.1);color:#1D4ED8;
      white-space: nowrap;
    }
    .role-badge-company {
      padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;
      background:rgba(16,185,129,0.1);color:#065F46;
      white-space: nowrap;
    }
    .role-badge-admin {
      padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;
      background:rgba(239,68,68,0.1);color:#991B1B;
      white-space: nowrap;
    }
    html.admin-dark .role-badge-student, html.dark .role-badge-student {
      background: rgba(59,130,246,0.15);
      color: #60A5FA;
    }
    html.admin-dark .role-badge-company, html.dark .role-badge-company {
      background: rgba(16,185,129,0.15);
      color: #34D399;
    }
    html.admin-dark .role-badge-admin, html.dark .role-badge-admin {
      background: rgba(239,68,68,0.15);
      color: #F87171;
    }

    /* ── ACTION BUTTONS ── */
    .action-btn {
      width: 32px; height: 32px; border-radius: 8px;
      border: 1.5px solid var(--gray-300); background: #fff;
      color: var(--gray-600); cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      font-size: 13px; transition: all 0.2s;
    }
    .action-btn:hover {
      background: var(--primary-bg); color: var(--primary); border-color: var(--primary);
    }
    .action-btn-edit:hover {
      background: rgba(59,130,246,0.08); color: #3b82f6; border-color: #3b82f6;
    }
    .action-btn-danger:hover {
      background: rgba(239,68,68,0.08); color: #ef4444; border-color: #ef4444;
    }
    html.admin-dark .action-btn, html.dark .action-btn {
      background: var(--white);
      border-color: var(--border);
      color: var(--gray-400);
    }
    html.admin-dark .action-btn:hover, html.dark .action-btn:hover {
      background: var(--primary-bg);
      color: var(--primary);
      border-color: var(--primary);
    }
    html.admin-dark .action-btn-edit:hover, html.dark .action-btn-edit:hover {
      background: rgba(59,130,246,0.15);
      color: #60a5fa;
      border-color: #3b82f6;
    }
    html.admin-dark .action-btn-danger:hover, html.dark .action-btn-danger:hover {
      background: rgba(239,68,68,0.15);
      color: #f87171;
      border-color: #ef4444;
    }

    /* ── PAGINATION BUTTONS ── */
    .pagination-btn {
      width:32px;height:32px;border-radius:8px;
      border:1.5px solid var(--gray-300);background:#fff;
      color:var(--gray-600);cursor:pointer;font-size:12px;
      display:inline-flex;align-items:center;justify-content:center;
      transition: var(--transition);
    }
    .pagination-btn:hover {
      border-color: var(--primary); color: var(--primary); background: var(--gray-50);
    }
    .pagination-btn.active {
      border-color: var(--primary); background: var(--primary); color: #fff; font-weight: 600;
    }
    .pagination-btn.active:hover {
      background: var(--primary-dark); border-color: var(--primary-dark);
    }
    html.admin-dark .pagination-btn, html.dark .pagination-btn {
      background: var(--white);
      border-color: var(--border);
      color: var(--gray-400);
    }
    html.admin-dark .pagination-btn:hover, html.dark .pagination-btn:hover {
      background: var(--gray-100);
      color: var(--primary);
      border-color: var(--primary);
    }

    /* ── MODALS CONTENT BOX ── */
    .modal-content-box {
      background: #fff; border-radius: 16px;
      width: 100%; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
      overflow: hidden; animation: slideUp 0.25s ease;
    }
    html.admin-dark .modal-content-box, html.dark .modal-content-box {
      background: var(--white);
      border: 1px solid var(--border);
      box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
    }

    /* ── DELETE WARNING BOX ── */
    .delete-warning-box {
      margin: 0 24px 20px; padding: 12px 14px; border-radius: 8px;
      border: 1.5px solid #FECACA; background: #FEF2F2;
    }
    html.admin-dark .delete-warning-box, html.dark .delete-warning-box {
      border-color: rgba(239,68,68,0.3);
      background: rgba(239,68,68,0.1);
    }
    .delete-warning-text {
      color: #991B1B;
    }
    html.admin-dark .delete-warning-text, html.dark .delete-warning-text {
      color: #f87171;
    }
  </style>

</x-layouts::admin>
