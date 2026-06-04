<div class="max-w-2xl mx-auto py-8">
  <div class="card anim-up">
    <div class="card-header" style="border-bottom: 1px solid var(--border); padding-bottom: 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
      <div>
        <h2 class="card-title" style="font-size: 1.25rem; display: flex; align-items: center; gap: 8px;"><i class="fas fa-paper-plane"></i> Send Internship Offer</h2>
        <p style="font-size: 0.85rem; color: var(--gray-500); margin-top: 4px; font-weight: normal;">Directly invite {{ $intern->name }} to join your team</p>
      </div>
    </div>

    @if (session()->has('error'))
      <div style="background: var(--danger-bg); color: var(--danger); padding: 12px 16px; border-radius: 8px; font-size: 13px; font-weight: 500; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
        <i class="fas fa-triangle-exclamation"></i>
        <span>{{ session('error') }}</span>
      </div>
    @endif

    <div class="card-body">
      <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px; padding: 16px; background: var(--gray-50); border-radius: 12px; border: 1px solid var(--border);">
        <div style="width: 48px; height: 48px; border-radius: 50%; background: var(--primary-bg); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem; flex-shrink: 0;">
          {{ strtoupper(substr($intern->name, 0, 2)) }}
        </div>
        <div>
          <div style="font-weight: 700; color: var(--gray-800); font-size: 1rem;">{{ $intern->name }}</div>
          <div style="font-size: 0.8rem; color: var(--gray-500); margin-top: 2px;">{{ $intern->userInfo->university ?? 'N/A' }} • GPA: {{ $intern->userInfo->gpa ?? 'N/A' }}</div>
        </div>
      </div>

      <form wire:submit.prevent="sendOffer">
        <div class="form-group" style="margin-bottom: 20px;">
          <label class="form-label" style="font-weight: 600; color: var(--gray-700); margin-bottom: 6px; display: block; font-size: 13px;">Select Internship Listing *</label>
          <select wire:model="internship_id" class="form-control" style="width: 100%; padding: 10px 12px; border: 1.5px solid var(--border); border-radius: 8px; font-size: 13px; background: white; color: var(--gray-800); outline: none;">
            <option value="">-- Choose an active position --</option>
            @foreach($internships as $item)
              <option value="{{ $item->id }}">{{ $item->title }} ({{ $item->location }})</option>
            @endforeach
          </select>
          @error('internship_id') <span style="color: var(--danger); font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group" style="margin-bottom: 24px;">
          <label class="form-label" style="font-weight: 600; color: var(--gray-700); margin-bottom: 6px; display: block; font-size: 13px;">Offer Message (Optional)</label>
          <textarea wire:model="message" class="form-control" rows="5" placeholder="Write a welcoming note, outline the next steps, or specify starting dates..." style="width: 100%; padding: 12px; border: 1.5px solid var(--border); border-radius: 8px; font-size: 13px; resize: vertical; color: var(--gray-800); outline: none;"></textarea>
          @error('message') <span style="color: var(--danger); font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 12px; justify-content: flex-end;">
          <a href="{{ route('company.applicants', ['company' => auth()->user()->company->slug]) }}" class="btn btn-ghost" style="padding: 10px 20px; border-radius: 8px; font-weight: 600; font-size: 13px; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; border: 1.5px solid var(--border);">Cancel</a>
          <button type="submit" class="btn btn-primary" style="padding: 10px 24px; border-radius: 8px; font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;" @if(empty($internships)) disabled @endif>
            <i class="fas fa-paper-plane"></i> Send Offer
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
