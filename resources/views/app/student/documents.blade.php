<x-layouts::app :title="__('My Documents')">
<!-- Page Header -->
<div class="page-header-bar" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
  <div>
    <p class="page-subtitle" style="margin: 0; color: var(--text-muted, #666); font-size: 0.9rem;">Manage all your internship-related documents</p>
  </div>
  <button class="btn btn-primary" onclick="triggerUpload()"><i class="fas fa-upload"></i> Upload Document</button>
  <input type="file" id="globalFileInput" accept=".pdf,.doc,.docx" style="display:none;" onchange="handleFileUpload(this)">
</div>

<!-- Two-Col Grid -->
<div class="two-col-grid" style="display: grid; grid-template-columns: 1fr 340px; gap: 24px;">

  <!-- LEFT: Uploaded Documents -->
  <div class="col-main">
    <div class="card">
      <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Uploaded Documents</h3>
        <span class="card-count" style="font-size: 0.8rem; color: var(--text-muted, #888);">6 files</span>
      </div>
      <div class="card-body">

        <div class="document-item" style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid var(--border, #f0f0f0);">
          <div class="document-icon red" style="color: #c62828; font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></div>
          <div class="document-info" style="flex: 1;">
            <div class="document-name" style="font-weight: 600; font-size: 0.9rem;">Resume.pdf</div>
            <div class="document-meta" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-top: 2px;">2.4 MB &nbsp;&middot;&nbsp; Uploaded May 10</div>
          </div>
          <div class="document-actions" style="display: flex; gap: 6px;">
            <button class="icon-btn" title="Download" onclick="downloadDoc('Resume.pdf')"><i class="fas fa-download"></i></button>
            <button class="icon-btn danger" title="Delete" onclick="deleteDoc(this,'Resume.pdf')"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>

        <div class="document-item" style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid var(--border, #f0f0f0);">
          <div class="document-icon red" style="color: #c62828; font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></div>
          <div class="document-info" style="flex: 1;">
            <div class="document-name" style="font-weight: 600; font-size: 0.9rem;">Cover Letter.pdf</div>
            <div class="document-meta" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-top: 2px;">1.1 MB &nbsp;&middot;&nbsp; Uploaded May 10</div>
          </div>
          <div class="document-actions" style="display: flex; gap: 6px;">
            <button class="icon-btn" title="Download" onclick="downloadDoc('Cover Letter.pdf')"><i class="fas fa-download"></i></button>
            <button class="icon-btn danger" title="Delete" onclick="deleteDoc(this,'Cover Letter.pdf')"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>

        <div class="document-item" style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid var(--border, #f0f0f0);">
          <div class="document-icon red" style="color: #c62828; font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></div>
          <div class="document-info" style="flex: 1;">
            <div class="document-name" style="font-weight: 600; font-size: 0.9rem;">Academic Transcript.pdf</div>
            <div class="document-meta" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-top: 2px;">3.2 MB &nbsp;&middot;&nbsp; Uploaded May 8</div>
          </div>
          <div class="document-actions" style="display: flex; gap: 6px;">
            <button class="icon-btn" title="Download" onclick="downloadDoc('Academic Transcript.pdf')"><i class="fas fa-download"></i></button>
            <button class="icon-btn danger" title="Delete" onclick="deleteDoc(this,'Academic Transcript.pdf')"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>

        <div class="document-item" style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid var(--border, #f0f0f0);">
          <div class="document-icon red" style="color: #c62828; font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></div>
          <div class="document-info" style="flex: 1;">
            <div class="document-name" style="font-weight: 600; font-size: 0.9rem;">National ID.pdf</div>
            <div class="document-meta" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-top: 2px;">0.8 MB &nbsp;&middot;&nbsp; Uploaded May 5</div>
          </div>
          <div class="document-actions" style="display: flex; gap: 6px;">
            <button class="icon-btn" title="Download" onclick="downloadDoc('National ID.pdf')"><i class="fas fa-download"></i></button>
            <button class="icon-btn danger" title="Delete" onclick="deleteDoc(this,'National ID.pdf')"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>

        <div class="document-item" style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid var(--border, #f0f0f0);">
          <div class="document-icon red" style="color: #c62828; font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></div>
          <div class="document-info" style="flex: 1;">
            <div class="document-name" style="font-weight: 600; font-size: 0.9rem;">Reference Letter.pdf</div>
            <div class="document-meta" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-top: 2px;">1.5 MB &nbsp;&middot;&nbsp; Uploaded May 12</div>
          </div>
          <div class="document-actions" style="display: flex; gap: 6px;">
            <button class="icon-btn" title="Download" onclick="downloadDoc('Reference Letter.pdf')"><i class="fas fa-download"></i></button>
            <button class="icon-btn danger" title="Delete" onclick="deleteDoc(this,'Reference Letter.pdf')"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>

        <div class="document-item" style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: none;">
          <div class="document-icon red" style="color: #c62828; font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></div>
          <div class="document-info" style="flex: 1;">
            <div class="document-name" style="font-weight: 600; font-size: 0.9rem;">Internship Agreement.pdf</div>
            <div class="document-meta" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-top: 2px;">2.1 MB &nbsp;&middot;&nbsp; Uploaded May 14</div>
          </div>
          <div class="document-actions" style="display: flex; gap: 6px;">
            <button class="icon-btn" title="Download" onclick="downloadDoc('Internship Agreement.pdf')"><i class="fas fa-download"></i></button>
            <button class="icon-btn danger" title="Delete" onclick="deleteDoc(this,'Internship Agreement.pdf')"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- RIGHT -->
  <div class="col-sidebar" style="display: flex; flex-direction: column; gap: 24px;">

    <!-- Upload Zone -->
    <div class="card">
      <div class="card-header" style="margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Upload New Document</h3>
      </div>
      <div class="card-body">
        <div class="upload-zone" style="border: 2px dashed var(--border, #e0e0e0); border-radius: 12px; padding: 24px; text-align: center; background: #fafafa; cursor: pointer;" onclick="triggerUpload()" ondragover="event.preventDefault();this.style.borderColor='var(--primary)'" ondragleave="this.style.borderColor='var(--border)'" ondrop="handleDrop(event)">
          <div class="upload-zone-icon" style="font-size: 2.2rem; color: var(--text-muted, #888); margin-bottom: 12px;"><i class="fas fa-cloud-arrow-up"></i></div>
          <div class="upload-zone-title" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 4px;">Drag &amp; drop files here</div>
          <div class="upload-zone-sub" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-bottom: 8px;">or click to browse</div>
          <div class="upload-zone-note" style="font-size: 0.72rem; color: #aaa;">PDF, DOC, DOCX up to 10MB</div>
          <button class="btn btn-outline" style="margin-top: 12px; padding: 6px 16px; font-size: 0.8rem;" onclick="event.stopPropagation();triggerUpload()">Browse Files</button>
        </div>
      </div>
    </div>

    <!-- Document Requirements -->
    <div class="card">
      <div class="card-header" style="margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Document Requirements</h3>
      </div>
      <div class="card-body">
        <div class="requirement-item completed" style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
          <div class="requirement-icon" style="color: #2e7d32; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">Resume</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: #2e7d32;">Uploaded</div>
          </div>
        </div>
        <div class="requirement-item completed" style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
          <div class="requirement-icon" style="color: #2e7d32; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">Cover Letter</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: #2e7d32;">Uploaded</div>
          </div>
        </div>
        <div class="requirement-item completed" style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
          <div class="requirement-icon" style="color: #2e7d32; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">Academic Transcript</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: #2e7d32;">Uploaded</div>
          </div>
        </div>
        <div class="requirement-item completed" style="display: flex; align-items: center; gap: 10px; margin-bottom: 0;">
          <div class="requirement-icon" style="color: #2e7d32; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">ID Copy</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: #2e7d32;">Uploaded</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<script>
function showToast(msg,type){ if(window.showGlobalToast) showGlobalToast(msg,type); }
function triggerUpload(){ document.getElementById('globalFileInput').click(); }
function handleFileUpload(input){
  if(!input.files[0]) return;
  var name = input.files[0].name;
  var size = (input.files[0].size/1024/1024).toFixed(1)+' MB';
  showToast(name+' uploaded successfully', 'success');
  input.value='';
}
function handleDrop(e){
  e.preventDefault();
  e.currentTarget.style.borderColor='var(--border)';
  var file = e.dataTransfer.files[0];
  if(file) showToast(file.name+' uploaded','success');
}
function downloadDoc(name){
  showToast('Downloading '+name+'...','success');
}
function deleteDoc(btn, name){
  if(!confirm('Delete '+name+'? This cannot be undone.')) return;
  var item = btn.closest('.document-item');
  item.style.opacity='0'; item.style.transition='opacity 0.3s';
  setTimeout(function(){ item.remove(); },'300');
  showToast(name+' deleted.','warning');
}
</script>
</x-layouts::app>
