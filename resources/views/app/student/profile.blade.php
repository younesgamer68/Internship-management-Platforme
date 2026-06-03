<x-layouts::student title="My Profile">
@php $slug = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp

<style>
/* ─── Profile Hero ─── */
.profile-hero {
  background: var(--white); border-radius: 20px;
  border: 1px solid var(--border); box-shadow: var(--shadow-sm);
  overflow: hidden; margin-bottom: 24px;
}
.profile-cover {
  height: 130px;
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, #4f46e5 100%);
  position: relative;
}
.profile-cover-pattern {
  position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='0.06'%3E%3Cpath d='M30 0l30 30-30 30L0 30z'/%3E%3C/g%3E%3C/svg%3E");
}
.profile-hero-body { padding: 0 28px 24px; display: flex; align-items: flex-end; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-top: -50px; }
.profile-avatar {
  width: 100px; height: 100px; border-radius: 50%;
  border: 4px solid var(--white); background: var(--primary); color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-size: 2rem; font-weight: 800; box-shadow: 0 4px 16px rgba(0,0,0,0.14);
  flex-shrink: 0; position: relative;
}
.profile-avatar-upload {
  position: absolute; bottom: 0; right: 0; width: 28px; height: 28px;
  background: var(--primary); border: 2px solid var(--white); border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.65rem; color: #fff; cursor: pointer; transition: opacity 0.2s;
}
.profile-avatar-upload:hover { opacity: 0.85; }
.profile-identity { flex: 1; padding-top: 58px; min-width: 200px; }
.profile-identity h2 { font-size: 1.45rem; font-weight: 800; margin: 0 0 4px; color: var(--gray-900); letter-spacing: -0.02em; }
.profile-identity p { margin: 0 0 12px; color: var(--text-muted); font-size: .9rem; font-weight: 500; }
.profile-tags { display: flex; gap: 8px; flex-wrap: wrap; }
.ptag {
  display: inline-flex; align-items: center; gap: 5px; padding: 3px 10px;
  border-radius: 6px; font-size: .75rem; font-weight: 700;
}
.ptag-blue   { background: var(--primary-bg); color: var(--primary); }
.ptag-green  { background: var(--green-bg); color: var(--green); }
.ptag-purple { background: rgba(139,92,246,.1); color: #8B5CF6; }
.profile-actions { display: flex; gap: 10px; padding-top: 58px; flex-shrink: 0; flex-wrap: wrap; align-items: flex-start; }
.btn-edit-profile {
  padding: 9px 18px; border-radius: 10px; border: 1.5px solid var(--border);
  background: var(--white); color: var(--gray-700); font-size: .85rem; font-weight: 600;
  cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 7px;
}
.btn-edit-profile:hover { background: var(--gray-50); border-color: var(--gray-300); }
.btn-change-pass {
  padding: 9px 18px; border-radius: 10px; border: 1.5px solid var(--primary);
  background: var(--primary-bg); color: var(--primary); font-size: .85rem; font-weight: 600;
  cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 7px;
}
.btn-change-pass:hover { background: var(--primary); color: #fff; }

/* ─── Two-col layout ─── */
.profile-grid { display: grid; grid-template-columns: 1fr 320px; gap: 22px; }

/* ─── Cards ─── */
.p-card {
  background: var(--white); border-radius: 16px; border: 1px solid var(--border);
  box-shadow: var(--shadow-sm); overflow: hidden; margin-bottom: 22px; transition: box-shadow .2s;
}
.p-card:hover { box-shadow: var(--shadow); }
.p-card:last-child { margin-bottom: 0; }
.p-card-header {
  display: flex; align-items: center; justify-content: space-between;
  padding: 18px 22px 14px; border-bottom: 1px solid var(--gray-100);
}
.p-card-title { font-size: .95rem; font-weight: 700; color: var(--gray-900); display: flex; align-items: center; gap: 8px; margin: 0; }
.p-card-title i { color: var(--primary); }
.p-card-body { padding: 18px 22px; }
.btn-edit-section {
  padding: 6px 14px; border-radius: 8px; border: 1.5px solid var(--border);
  background: transparent; color: var(--gray-600); font-size: .78rem; font-weight: 600;
  cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 5px;
}
.btn-edit-section:hover { background: var(--primary-bg); border-color: var(--primary); color: var(--primary); }

/* ─── Info grid ─── */
.info-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.info-field {}
.info-label { font-size: .75rem; color: var(--text-muted); font-weight: 600; margin-bottom: 4px; text-transform: uppercase; letter-spacing: .04em; }
.info-value { font-size: .9rem; font-weight: 600; color: var(--gray-800); }

/* ─── Skill tags ─── */
.skill-tags-wrap { display: flex; gap: 8px; flex-wrap: wrap; }
.skill-tag {
  padding: 5px 12px; border-radius: 8px; background: var(--primary-bg);
  color: var(--primary); font-size: .78rem; font-weight: 700;
  display: inline-flex; align-items: center; gap: 5px;
}
.skill-tag .remove-skill {
  cursor: pointer; opacity: .6; font-size: .68rem; margin-left: 2px;
  transition: opacity .15s; border: none; background: none; color: inherit; padding: 0;
}
.skill-tag .remove-skill:hover { opacity: 1; }

/* ─── Language list ─── */
.lang-item { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--gray-100); }
.lang-item:last-child { border-bottom: none; }
.lang-left { display: flex; align-items: center; gap: 10px; }
.lang-icon { width: 30px; height: 30px; border-radius: 50%; background: var(--gray-100); color: var(--gray-500); display: flex; align-items: center; justify-content: center; font-size: .8rem; }
.lang-name { font-weight: 600; font-size: .88rem; color: var(--gray-800); }
.lang-badge { padding: 3px 10px; border-radius: 20px; font-size: .72rem; font-weight: 700; }
.lang-fluent  { background: var(--green-bg); color: var(--green); }
.lang-native  { background: var(--primary-bg); color: var(--primary); }
.lang-basic   { background: var(--gray-100); color: var(--gray-600); }

/* ─── Social links ─── */
.social-item { display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid var(--gray-100); }
.social-item:last-child { border-bottom: none; }
.social-icon-wrap { width: 36px; height: 36px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
.social-icon-wrap.linkedin { background: rgba(0,119,181,.1); color: #0077b5; }
.social-icon-wrap.github   { background: rgba(36,41,47,.1); color: #24292f; }
.social-icon-wrap.twitter  { background: rgba(29,155,240,.1); color: #1d9bf0; }
.social-info { flex: 1; min-width: 0; }
.social-platform { font-size: .72rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: .04em; }
.social-link { font-size: .85rem; color: var(--primary); font-weight: 600; text-decoration: none; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; }
.social-link:hover { text-decoration: underline; }
.social-link.empty { color: var(--gray-400); font-style: italic; font-weight: 400; }
.social-edit-btn { width: 28px; height: 28px; border-radius: 7px; border: 1.5px solid var(--border); background: transparent; color: var(--gray-400); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: .72rem; transition: all .2s; flex-shrink: 0; }
.social-edit-btn:hover { background: var(--primary-bg); border-color: var(--primary); color: var(--primary); }

/* ─── Completion meter ─── */
.completion-bar-wrap { background: var(--gray-100); border-radius: 20px; height: 8px; overflow: hidden; margin-top: 8px; }
.completion-bar { height: 100%; border-radius: 20px; background: linear-gradient(90deg, var(--primary), var(--primary-light)); transition: width 1s ease; }

/* ─── Modal shared ─── */
.modal-overlay {
  display: flex; visibility: hidden; pointer-events: none;
  position: fixed; inset: 0; background: rgba(0,0,0,.48);
  z-index: 9990; align-items: center; justify-content: center; padding: 20px;
  backdrop-filter: blur(5px);
}
.modal-overlay.open { visibility: visible; pointer-events: all; animation: fadeInOv .2s ease; }
@keyframes fadeInOv { from { opacity: 0; } to { opacity: 1; } }
.modal-box {
  background: var(--white); border-radius: 22px; padding: 32px;
  width: 100%; max-width: 480px; box-shadow: 0 28px 70px rgba(0,0,0,.2);
  animation: slideUpM .28s cubic-bezier(.16,1,.3,1); position: relative;
  max-height: 90vh; overflow-y: auto;
}
@keyframes slideUpM { from { opacity: 0; transform: translateY(26px) scale(.97); } to { opacity: 1; transform: none; } }
.modal-close {
  position: absolute; top: 16px; right: 16px; width: 34px; height: 34px;
  border-radius: 9px; background: var(--gray-100); border: none; cursor: pointer;
  color: var(--gray-600); font-size: 15px; display: flex; align-items: center; justify-content: center;
  transition: all .2s;
}
.modal-close:hover { background: var(--danger-bg); color: var(--danger); }
.modal-head { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
.modal-icon { width: 40px; height: 40px; border-radius: 10px; background: var(--primary-bg); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
.modal-head-title { font-size: 1.15rem; font-weight: 800; color: var(--gray-900); }
.modal-head-sub { font-size: .8rem; color: var(--text-muted); margin-top: 2px; }
.form-group { margin-bottom: 16px; }
.form-label { display: block; font-size: .78rem; font-weight: 700; color: var(--gray-700); margin-bottom: 7px; }
.form-input, .form-select, .form-textarea {
  width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: 10px;
  font-size: .87rem; background: var(--gray-50); color: inherit; outline: none;
  transition: all .2s; box-sizing: border-box; font-family: inherit;
}
.form-input:focus, .form-select:focus, .form-textarea:focus {
  border-color: var(--primary); background: var(--white); box-shadow: 0 0 0 3px var(--primary-bg);
}
.form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.modal-footer { display: flex; gap: 10px; margin-top: 22px; }
.btn-modal-cancel { flex: 0 0 auto; padding: 12px 20px; border-radius: 11px; background: var(--gray-100); color: var(--gray-700); border: none; font-size: .88rem; font-weight: 700; cursor: pointer; transition: background .2s; }
.btn-modal-cancel:hover { background: var(--gray-200); }
.btn-modal-save { flex: 1; padding: 12px; border-radius: 11px; background: var(--primary); color: #fff; border: none; font-size: .88rem; font-weight: 700; cursor: pointer; transition: opacity .2s; display: flex; align-items: center; justify-content: center; gap: 8px; }
.btn-modal-save:hover { opacity: .92; }
.social-input-row { display: flex; align-items: center; gap: 10px; }
.social-input-icon { width: 38px; height: 38px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }

/* ─── Responsive ─── */
@media (max-width: 1100px) { .profile-grid { grid-template-columns: 1fr; } }
@media (max-width: 640px) {
  .profile-hero-body { flex-direction: column; align-items: flex-start; }
  .profile-actions { padding-top: 0; }
  .info-grid-2 { grid-template-columns: 1fr; }
  .form-grid-2 { grid-template-columns: 1fr; }
}
</style>

<livewire:student.profile />

</x-layouts::student>
