<div>
    @if (session()->has('message'))
        <div style="background: var(--green); color: white; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i> {{ session('message') }}
        </div>
    @endif

    <!-- Submit a Ticket -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Submit a Ticket</h3>
      </div>
      <div class="card-body">
        <form class="ticket-form" wire:submit.prevent="submitTicket">
          <div class="form-group">
            <label class="form-label">Subject</label>
            <input type="text" class="form-input" wire:model="subject" placeholder="Brief description of your issue" required />
            @error('subject') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>
          <div class="form-group">
            <label class="form-label">Category</label>
            <div style="position: relative;">
              <select class="form-select" wire:model="category_id" required style="appearance: none; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; padding-right: 36px;">
                <option value="">Select a category</option>
                <option value="Application Issue">Application Issue</option>
                <option value="Document Upload">Document Upload</option>
                <option value="Account Access">Account Access</option>
                <option value="Technical Problem">Technical Problem</option>
                <option value="General Inquiry">General Inquiry</option>
              </select>
            </div>
            @error('category_id') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>
          <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-textarea" wire:model="description" rows="5" placeholder="Describe your issue in detail..." required style="resize: vertical;"></textarea>
            @error('description') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>
          <button type="submit" class="btn btn-primary btn-block" style="justify-content: center;" wire:loading.attr="disabled">
            <span wire:loading.remove><i class="fas fa-paper-plane"></i> Submit Ticket</span>
            <span wire:loading><i class="fas fa-spinner fa-spin"></i> Submitting...</span>
          </button>
        </form>
      </div>
    </div>

    <!-- My Tickets -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">My Tickets</h3>
      </div>
      <div class="card-body recent-tickets">
        @if($tickets->isEmpty())
          <div style="text-align: center; padding: 30px 10px; color: var(--gray-500);">
             <div style="font-size: 40px; margin-bottom: 15px; opacity: 0.3;"><i class="fas fa-ticket-alt"></i></div>
             <p>You haven't submitted any tickets yet.</p>
          </div>
        @else
            @foreach($tickets as $ticket)
            <div class="ticket-item" style="{{ $loop->last ? 'border-bottom: none; padding-bottom: 0;' : '' }}">
            <div class="ticket-num-badge">{{ $ticket->ticket_number }}</div>
            <div class="ticket-info">
                <div class="ticket-subject">{{ $ticket->subject }}</div>
                <div class="ticket-meta">Submitted {{ $ticket->created_at->format('M j') }} &nbsp;·&nbsp; {{ ucfirst($ticket->status) }}</div>
            </div>
            @if($ticket->status === 'resolved' || $ticket->status === 'closed')
                <span class="ticket-status resolved">{{ ucfirst($ticket->status) }}</span>
            @else
                <span class="ticket-status in-progress">{{ ucfirst($ticket->status) }}</span>
            @endif
            </div>
            @endforeach
        @endif
      </div>
    </div>
</div>
