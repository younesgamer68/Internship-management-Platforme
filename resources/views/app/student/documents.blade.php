<x-layouts::app :title="__('My Documents')">
<!-- Page Header -->
<div class="page-header-bar" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
  <div>
    <p class="page-subtitle" style="margin: 0; color: var(--text-muted, #666); font-size: 0.9rem;">Manage all your internship-related documents</p>
  </div>
  <button class="btn btn-primary" onclick="triggerUpload()"><i class="fas fa-upload"></i> Upload Document</button>
  <form id="uploadForm" action="{{ route('student.documents.upload', ['company' => request()->route('company') ?? 'internlink-demo']) }}" method="POST" enctype="multipart/form-data" style="display:none;">
    @csrf
    <input type="file" id="globalFileInput" name="document" accept=".pdf,.doc,.docx" onchange="document.getElementById('uploadForm').submit();">
  </form>
</div>

<!-- Two-Col Grid -->
<div class="two-col-grid" style="display: grid; grid-template-columns: 1fr 340px; gap: 24px;">

  <!-- LEFT: Uploaded Documents -->
  <div class="col-main">
    <div class="card">
      <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <h3 class="card-title" style="font-size: 1rem; font-weight: 600; margin: 0;">Uploaded Documents</h3>
        <span class="card-count" style="font-size: 0.8rem; color: var(--text-muted, #888);">{{ $documents->count() }} files</span>
      </div>
      <div class="card-body">

        @forelse($documents as $doc)
        <div class="document-item" style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid var(--border, #f0f0f0);">
          <div class="document-icon red" style="color: #c62828; font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></div>
          <div class="document-info" style="flex: 1;">
            <div class="document-name" style="font-weight: 600; font-size: 0.9rem;">{{ $doc->name }}</div>
            <div class="document-meta" style="font-size: 0.78rem; color: var(--text-muted, #888); margin-top: 2px;">{{ number_format($doc->size / 1048576, 2) }} MB &nbsp;&middot;&nbsp; Uploaded {{ $doc->created_at->format('M d') }}</div>
          </div>
          <div class="document-actions" style="display: flex; gap: 6px;">
            <a href="{{ asset('storage/' . $doc->path) }}" target="_blank" class="icon-btn" title="Download" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; border: 1px solid var(--border); background: var(--white); color: var(--gray-600); text-decoration: none;"><i class="fas fa-download"></i></a>
            <form action="{{ route('student.documents.destroy', ['company' => request()->route('company') ?? 'internlink-demo', 'document' => $doc]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete {{ addslashes($doc->name) }}? This cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="icon-btn danger" title="Delete" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; border: 1px solid #fee2e2; background: #fef2f2; color: #ef4444; cursor: pointer;"><i class="fas fa-trash-alt"></i></button>
            </form>
          </div>
        </div>
        @empty
        <div style="padding: 30px; text-align: center; color: var(--gray-500);">
            <i class="fas fa-folder-open" style="font-size: 2rem; margin-bottom: 10px; color: var(--gray-300);"></i>
            <p style="margin: 0;">No documents uploaded yet.</p>
        </div>
        @endforelse

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
        @php
            $hasResume = $documents->contains(fn($d) => str_contains(strtolower($d->name), 'resume') || str_contains(strtolower($d->name), 'cv'));
            $hasCoverLetter = $documents->contains(fn($d) => str_contains(strtolower($d->name), 'cover letter'));
            $hasTranscript = $documents->contains(fn($d) => str_contains(strtolower($d->name), 'transcript'));
            $hasId = $documents->contains(fn($d) => str_contains(strtolower($d->name), 'id'));
        @endphp

        <div class="requirement-item {{ $hasResume ? 'completed' : '' }}" style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
          <div class="requirement-icon" style="color: {{ $hasResume ? '#2e7d32' : '#ccc' }}; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">Resume</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: {{ $hasResume ? '#2e7d32' : 'var(--text-muted)' }};">{{ $hasResume ? 'Uploaded' : 'Missing' }}</div>
          </div>
        </div>
        <div class="requirement-item {{ $hasCoverLetter ? 'completed' : '' }}" style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
          <div class="requirement-icon" style="color: {{ $hasCoverLetter ? '#2e7d32' : '#ccc' }}; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">Cover Letter</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: {{ $hasCoverLetter ? '#2e7d32' : 'var(--text-muted)' }};">{{ $hasCoverLetter ? 'Uploaded' : 'Missing' }}</div>
          </div>
        </div>
        <div class="requirement-item {{ $hasTranscript ? 'completed' : '' }}" style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
          <div class="requirement-icon" style="color: {{ $hasTranscript ? '#2e7d32' : '#ccc' }}; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">Academic Transcript</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: {{ $hasTranscript ? '#2e7d32' : 'var(--text-muted)' }};">{{ $hasTranscript ? 'Uploaded' : 'Missing' }}</div>
          </div>
        </div>
        <div class="requirement-item {{ $hasId ? 'completed' : '' }}" style="display: flex; align-items: center; gap: 10px; margin-bottom: 0;">
          <div class="requirement-icon" style="color: {{ $hasId ? '#2e7d32' : '#ccc' }}; font-size: 1.1rem;"><i class="fas fa-circle-check"></i></div>
          <div class="requirement-info">
            <div class="requirement-name" style="font-weight: 600; font-size: 0.85rem;">ID Copy</div>
            <div class="requirement-status" style="font-size: 0.72rem; color: {{ $hasId ? '#2e7d32' : 'var(--text-muted)' }};">{{ $hasId ? 'Uploaded' : 'Missing' }}</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<script>
function showToast(msg, type) { 
    if (typeof showGlobalToast === 'function') {
        showGlobalToast(msg, type); 
    } else {
        alert(type.toUpperCase() + ': ' + msg);
    }
}
function triggerUpload(){ document.getElementById('globalFileInput').click(); }

function handleDrop(e){
  e.preventDefault();
  e.currentTarget.style.borderColor='var(--border)';
  var file = e.dataTransfer.files[0];
  if(file) {
      document.getElementById('globalFileInput').files = e.dataTransfer.files;
      document.getElementById('uploadForm').submit();
  }
}

@if(session('success'))
  document.addEventListener('DOMContentLoaded', () => {
      showToast("{{ session('success') }}", 'success');
  });
@endif

@if($errors->any())
  document.addEventListener('DOMContentLoaded', () => {
      showToast("{{ $errors->first() }}", 'danger');
  });
@endif
</script>
</x-layouts::app>
