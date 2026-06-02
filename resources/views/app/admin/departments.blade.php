<x-layouts::app :title="__('Departments')">
    <livewire:admin.departments-table />

<style>
.dept-name-cell { display:flex;align-items:center;gap:10px; }
.dept-icon-sm { width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0; }

.faculty-tag { display:inline-block;background:rgba(99,102,241,0.1);color:#6366F1;font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px; }

.head-cell { display:flex;align-items:center;gap:8px;font-size:13px;color:var(--gray-700); }
.head-avatar { width:26px;height:26px;border-radius:50%;background:var(--primary-bg);color:var(--primary);font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0; }

.intern-count { font-weight:700;font-size:14px; }
.intern-count.green { color:var(--green); }
.intern-count.warning { color:var(--warning); }

.count-badge { font-size:12px;font-weight:400;color:var(--gray-400);margin-left:4px; }

.view-stats-strip { display:flex;align-items:center;background:var(--gray-50);border-radius:12px;padding:16px 0; }
.view-stat-item { flex:1;text-align:center; }
.view-stat-value { font-size:22px;font-weight:700;color:var(--gray-800); }
.view-stat-value.green { color:var(--green); }
.view-stat-label { font-size:11px;color:var(--gray-400);font-weight:500;margin-top:2px; }
.view-stat-sep { width:1px;background:var(--gray-200);height:36px; }
.dept-view-icon-wrap { width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0; }

/* shared modal styles (copied) */
.modal-overlay { position:fixed;inset:0;background:rgba(15,23,42,.55);backdrop-filter:blur(4px);z-index:1000;display:flex;align-items:center;justify-content:center; }
.modal-overlay.open { animation:fadeIn .2s ease; }
@keyframes fadeIn { from{opacity:0} to{opacity:1} }
.slide-panel { background:#fff;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.18);width:520px;max-width:94vw;max-height:90vh;display:flex;flex-direction:column;animation:popIn .25s cubic-bezier(.16,1,.3,1);overflow:hidden; }
.slide-panel-header { display:flex;align-items:center;justify-content:space-between;padding:22px 24px;border-bottom:1px solid var(--gray-100);background:var(--gray-50);flex-shrink:0; }
.slide-panel-title { display:flex;align-items:center;gap:14px; }
.slide-panel-icon { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
.slide-panel-title h3 { font-size:16px;font-weight:700;color:var(--gray-800);margin:0; }
.slide-panel-title p  { font-size:12px;color:var(--gray-500);margin:2px 0 0; }
.panel-close-btn { width:34px;height:34px;border-radius:8px;background:var(--gray-100);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--gray-600);font-size:15px;transition:var(--transition); }
.panel-close-btn:hover { background:var(--gray-200); }
.slide-panel-body { flex:1;overflow-y:auto;padding:24px;scrollbar-width:thin; }
.panel-section-label { font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--gray-400);margin:20px 0 14px;padding-bottom:8px;border-bottom:1px solid var(--gray-100); }
.panel-section-label:first-child { margin-top:0; }
.slide-panel-footer { display:flex;gap:10px;justify-content:flex-end;padding-top:20px;margin-top:8px;border-top:1px solid var(--gray-100); }
.form-input { width:100%;padding:10px 14px;border:1.5px solid var(--gray-200);border-radius:8px;font-size:13px;color:var(--gray-800);background:#fff;transition:var(--transition);outline:none; }
.form-input:focus { border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-bg); }
.form-input::placeholder { color:var(--gray-400); }
.form-textarea { resize:vertical;min-height:80px; }
.form-row-2 { display:grid;grid-template-columns:1fr 1fr;gap:14px; }
.input-with-icon { position:relative; }
.input-with-icon .input-icon { position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none; }
.input-with-icon .form-input { padding-left:34px; }
.select-wrapper-panel { position:relative; }
.select-wrapper-panel .input-icon { position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none;z-index:1; }
.select-wrapper-panel .select-arrow { position:absolute;right:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:11px;pointer-events:none; }
.select-wrapper-panel .form-select { padding-left:34px;padding-right:30px;appearance:none; }
.center-modal { background:#fff;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.18);width:560px;max-width:94vw;animation:popIn .25s cubic-bezier(.16,1,.3,1);overflow:hidden; }
@keyframes popIn { from{transform:scale(.92);opacity:0} to{transform:scale(1);opacity:1} }
.center-modal-header { display:flex;align-items:center;gap:14px;padding:22px 24px;border-bottom:1px solid var(--gray-100);background:var(--gray-50); }
.center-modal-title-wrap { flex:1; }
.center-modal-title-wrap h3 { font-size:16px;font-weight:700;color:var(--gray-800);margin:0; }
.center-modal-title-wrap p  { font-size:12px;color:var(--gray-500);margin:3px 0 0; }
.center-modal-footer { display:flex;gap:10px;justify-content:flex-end;padding:16px 24px;border-top:1px solid var(--gray-100); }
.delete-modal-box { width:420px;text-align:center;padding:32px 28px; }
.delete-modal-icon-wrap { margin-bottom:16px; }
.delete-modal-icon { width:64px;height:64px;border-radius:50%;background:rgba(239,68,68,.1);color:var(--danger);display:inline-flex;align-items:center;justify-content:center;font-size:26px; }
.delete-modal-title { font-size:18px;font-weight:700;color:var(--gray-800);margin:0 0 8px; }
.delete-modal-desc { font-size:14px;color:var(--gray-500);line-height:1.6;margin-bottom:24px; }
.delete-modal-actions { display:flex;gap:10px;justify-content:center; }
.btn-icon-outline { display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;padding:0;border-radius:8px;background:transparent;border:1.5px solid var(--gray-300);color:var(--gray-600);font-size:13px;transition:var(--transition); }
.btn-icon-outline:hover { background:var(--gray-50);border-color:var(--primary);color:var(--primary); }
.btn-icon-danger { display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;padding:0;border-radius:8px;background:transparent;border:1.5px solid rgba(239,68,68,.3);color:var(--danger);font-size:13px;transition:var(--transition); }
.btn-icon-danger:hover { background:rgba(239,68,68,.08); }
.toast-notification { position:fixed;bottom:28px;right:28px;background:var(--gray-900);color:#fff;border-radius:10px;padding:12px 20px;font-size:13px;font-weight:500;display:flex;align-items:center;gap:10px;box-shadow:0 8px 24px rgba(0,0,0,.2);z-index:2000;transform:translateY(80px);opacity:0;transition:all .35s cubic-bezier(.16,1,.3,1);pointer-events:none; }
.toast-notification.show { transform:translateY(0);opacity:1; }
.toast-icon { color:var(--green);font-size:16px; }
.view-info-grid { display:grid;grid-template-columns:1fr 1fr;gap:14px; }
.view-info-item { display:flex;flex-direction:column;gap:4px; }
.view-info-label { font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--gray-400);display:flex;align-items:center;gap:5px; }
.view-info-value { font-size:14px;font-weight:600;color:var(--gray-800); }
.required { color:var(--danger); }
</style>
</x-layouts::app>
