<div>
  <!-- Page Header -->
  <div class="page-header anim-up" data-delay="0" style="margin-bottom: 24px;">
    <div>
      <h2 class="page-title">Internship Offers</h2>
      <p class="page-subtitle">Manage direct internship invitations from recruiters</p>
    </div>
  </div>

  @if (session()->has('success'))
    <div style="background: var(--green-bg); color: var(--green); padding: 12px 16px; border-radius: 8px; font-size: 13px; font-weight: 500; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;" class="anim-up">
      <i class="fas fa-circle-check"></i>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  @if (session()->has('info'))
    <div style="background: var(--primary-bg); color: var(--primary); padding: 12px 16px; border-radius: 8px; font-size: 13px; font-weight: 500; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;" class="anim-up">
      <i class="fas fa-circle-info"></i>
      <span>{{ session('info') }}</span>
    </div>
  @endif

  @if (session()->has('error'))
    <div style="background: var(--danger-bg); color: var(--danger); padding: 12px 16px; border-radius: 8px; font-size: 13px; font-weight: 500; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;" class="anim-up">
      <i class="fas fa-triangle-exclamation"></i>
      <span>{{ session('error') }}</span>
    </div>
  @endif

  <!-- Offers Grid -->
  <div style="display: grid; grid-template-columns: 1fr; gap: 20px;" class="anim-up" data-delay="80">
    @forelse($offers as $offer)
      @php
        $companyName = $offer->company->company_name ?? 'A Company';
        $initials = strtoupper(substr($companyName, 0, 2));
        $statusClass = match($offer->status) {
            'pending' => 'status-badge new',
            'accepted' => 'status-badge accepted',
            'rejected' => 'status-badge rejected',
            default => 'status-badge new'
        };
      @endphp
      <div class="card hover-lift" style="padding: 24px; display: flex; flex-direction: column; gap: 16px; border: 1px solid var(--border); border-radius: 12px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px;">
          <div style="display: flex; align-items: center; gap: 16px;">
            <div style="width: 48px; height: 48px; border-radius: 12px; background: var(--primary-bg); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem; border: 1px solid rgba(0, 177, 170, 0.15); flex-shrink: 0;">
              {{ $initials }}
            </div>
            <div>
              <h3 style="font-weight: 700; color: var(--gray-800); font-size: 1.05rem; margin: 0;">{{ $offer->internship->title }}</h3>
              <p style="font-size: 0.85rem; color: var(--gray-500); margin: 4px 0 0;">{{ $companyName }} • {{ $offer->internship->location }}</p>
            </div>
          </div>
          <span class="{{ $statusClass }}">{{ ucfirst($offer->status) }}</span>
        </div>

        @if($offer->message)
          <div style="padding: 14px 16px; background: var(--gray-50); border-radius: 10px; font-size: 0.85rem; color: var(--gray-600); line-height: 1.6; border: 1px solid var(--border);">
            <div style="font-weight: 600; font-size: 10px; text-transform: uppercase; letter-spacing: 0.05em; color: var(--gray-400); margin-bottom: 6px;">Recruiter's Note</div>
            {{ $offer->message }}
          </div>
        @endif

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; border-top: 1px solid var(--border); padding-top: 16px; margin-top: 8px;">
          <div style="display: flex; gap: 16px; font-size: 0.8rem; color: var(--gray-400); font-weight: 500;">
            <span><i class="fas fa-calendar" style="margin-right: 4px;"></i> Offered on {{ $offer->created_at->format('M j, Y') }}</span>
            @if($offer->responded_at)
              <span><i class="fas fa-clock" style="margin-right: 4px;"></i> Responded on {{ $offer->responded_at->format('M j, Y') }}</span>
            @endif
          </div>
          
          <div style="display: flex; gap: 10px;">
            @if($offer->status === 'pending')
              <button wire:click="rejectOffer({{ $offer->id }})" class="action-btn reject" style="padding: 6px 12px; font-size: 13px;">
                <i class="fas fa-times"></i> Decline
              </button>
              <button wire:click="acceptOffer({{ $offer->id }})" class="action-btn accept" style="padding: 6px 12px; font-size: 13px;">
                <i class="fas fa-check"></i> Accept Offer
              </button>
            @elseif($offer->status === 'accepted')
              <span style="color: var(--green); font-size: 0.85rem; font-weight: 600; display: flex; align-items: center; gap: 6px;">
                <i class="fas fa-circle-check"></i> Accepted
              </span>
            @else
              <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600; display: flex; align-items: center; gap: 6px;">
                <i class="fas fa-circle-xmark"></i> Declined
              </span>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="card" style="text-align: center; padding: 48px 24px;">
        <i class="fas fa-gift" style="font-size: 36px; color: var(--gray-300); margin-bottom: 12px;"></i>
        <h3 style="font-size: 1rem; font-weight: 700; color: var(--gray-800); margin: 0;">No Internship Offers Yet</h3>
        <p style="font-size: 0.85rem; color: var(--gray-400); margin: 6px 0 0;">Recruiters will send offers directly to you if you are a great match.</p>
      </div>
    @endforelse
  </div>
</div>
