import sys
import re

file_path = r'c:\Users\HADROC\Herd\Interhship_Plat\resources\views\app\admin\universities.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace submitUnivEdit
new_edit = """function submitUnivEdit(e) {
  e.preventDefault();
  if (!univCardBeingEdited) { closeUnivModal('univEditModal'); return; }
  const id = univCardBeingEdited.getAttribute('data-id');
  const name = document.getElementById('uedit-name').value.trim();
  const city = document.getElementById('uedit-city').value;
  const site = document.getElementById('uedit-website').value.trim();
  const sts  = document.getElementById('uedit-status').value;
  const facs = document.getElementById('uedit-faculties').value;

  fetch(`/admin/universities/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    },
    body: JSON.stringify({ name, city, website: site, status: sts, faculties_count: facs })
  }).then(res => res.json()).then(data => {
    if (data.success) {
      univCardBeingEdited.querySelector('.univ-card-info h4').textContent = name;
      univCardBeingEdited.querySelector('.univ-card-location').innerHTML = `<i class="fas fa-location-dot"></i> ${city}, Albania`;
      univCardBeingEdited.querySelector('.univ-card-website').innerHTML  = `<i class="fas fa-globe"></i> ${site}`;

      const statsVals = univCardBeingEdited.querySelectorAll('.univ-stat-value');
      if (statsVals[1] && facs) statsVals[1].textContent = facs;

      const sb = univCardBeingEdited.querySelector('.status-badge');
      const cls = { Active:'active', Pending:'pending', Inactive:'inactive' }[sts] || 'active';
      sb.className = 'status-badge ' + cls;
      sb.textContent = sts;

      univCardBeingEdited.setAttribute('data-status', sts);
      univCardBeingEdited.setAttribute('data-city', city);
      univCardBeingEdited.setAttribute('data-name', name.toLowerCase());

      univCardBeingEdited.style.outline = '2px solid var(--primary)';
      setTimeout(() => { if (univCardBeingEdited) univCardBeingEdited.style.outline = ''; }, 900);
      univCardBeingEdited = null;
      closeUnivModal('univEditModal');
      showUnivToast('University updated successfully!');
    }
  });
}"""

content = re.sub(r'function submitUnivEdit\(e\) \{.*?(?=// ── ADD ──)', new_edit + '\n\n', content, flags=re.DOTALL)


# Replace submitUnivAdd
new_add = """function submitUnivAdd(e) {
  e.preventDefault();
  const name  = document.getElementById('uadd-name').value.trim();
  const city  = document.getElementById('uadd-city').value;
  const site  = document.getElementById('uadd-website').value.trim();
  const facs  = document.getElementById('uadd-faculties').value || '0';
  const depts = document.getElementById('uadd-departments').value || '0';
  const sts   = document.getElementById('uadd-status').value;

  fetch('/admin/universities', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    },
    body: JSON.stringify({ name, city, website: site, status: sts, faculties_count: facs, departments_count: depts })
  }).then(res => res.json()).then(data => {
    if (data.success) {
      window.location.reload(); // Reload to show the new card with proper DB ID
    }
  });
}"""

content = re.sub(r'function submitUnivAdd\(e\) \{.*?(?=// ── DELETE ──)', new_add + '\n\n', content, flags=re.DOTALL)

# Replace confirmUnivDelete
new_del = """function confirmUnivDelete() {
  if (!univCardToDelete) return;
  const id = univCardToDelete.getAttribute('data-id');
  fetch(`/admin/universities/${id}`, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
    }
  }).then(res => res.json()).then(data => {
    if (data.success) {
      univCardToDelete.style.opacity  = '0';
      univCardToDelete.style.transform= 'scale(0.93)';
      univCardToDelete.style.transition = 'all .35s ease';
      setTimeout(() => { univCardToDelete.remove(); univCardToDelete = null; }, 360);
      closeUnivModal('univDeleteModal');
      showUnivToast('University removed.');
    }
  });
}"""

content = re.sub(r'function confirmUnivDelete\(\) \{.*?(?=// ── FILTER ──)', new_del + '\n\n', content, flags=re.DOTALL)

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(content)

print('JS Updated!')
