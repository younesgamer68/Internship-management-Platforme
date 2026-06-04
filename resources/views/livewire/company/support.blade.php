<div>
    @if (session()->has('message'))
        <div style="background: #10b981; color: white; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i> {{ session('message') }}
        </div>
    @endif

    <!-- Submit a Ticket -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Submit a Support Ticket</h3>
      </div>
      <div class="card-body">
        <form class="ticket-form" wire:submit.prevent="submitTicket">
          <div class="form-group">
            <label class="form-label">Subject</label>
            <input type="text" class="form-input" wire:model="subject" placeholder="Brief description of your issue" required />
            @error('subject') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>
          
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
            <div class="form-group" style="margin-bottom: 0;">
              <label class="form-label">Category</label>
              <div style="position: relative;">
                <select class="form-select" wire:model="category_id" required style="appearance: none; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; padding-right: 36px;">
                  <option value="">Select a category</option>
                  <option value="Posting & Listings">Posting & Listings</option>
                  <option value="Applicant Management">Applicant Management</option>
                  <option value="Interview Scheduling">Interview Scheduling</option>
                  <option value="Billing & Subscription">Billing & Subscription</option>
                  <option value="Technical Issue">Technical Issue</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              @error('category_id') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 0;">
              <label class="form-label">Priority</label>
              <div style="position: relative;">
                <select class="form-select" wire:model="priority" required style="appearance: none; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; padding-right: 36px;">
                  <option value="low">Low</option>
                  <option value="medium">Medium</option>
                  <option value="high">High</option>
                  <option value="urgent">Urgent</option>
                </select>
              </div>
              @error('priority') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
            </div>
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
    <div class="card" style="margin-top: 24px;">
      <div class="card-header">
        <h3 class="card-title">My Support Tickets</h3>
      </div>
      <div class="card-body recent-tickets">
        @if($tickets->isEmpty())
          <div style="text-align: center; padding: 30px 10px; color: var(--gray-500);">
             <div style="font-size: 40px; margin-bottom: 15px; opacity: 0.3;"><i class="fas fa-ticket-alt"></i></div>
             <p>You haven't submitted any tickets yet.</p>
          </div>
        @else
            @foreach($tickets as $ticket)
              <div class="ticket-item" style="display: flex; align-items: center; justify-content: space-between; padding: 16px 0; border-bottom: 1px solid #f1f5f9; {{ $loop->last ? 'border-bottom: none; padding-bottom: 0;' : '' }}">
                <div style="display: flex; align-items: center; gap: 12px; flex: 1; min-width: 0;">
                  <div class="ticket-num-badge" style="font-family: monospace; font-weight: 700; background: var(--primary-bg); color: var(--primary); padding: 4px 8px; border-radius: 6px; font-size: 12px;">
                    {{ $ticket->ticket_number }}
                  </div>
                  <div class="ticket-info" style="min-width: 0;">
                      <div class="ticket-subject" style="font-weight: 600; color: #1f2937; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: 13.5px;">{{ $ticket->subject }}</div>
                      <div class="ticket-meta" style="font-size: 11px; color: #9ca3af; margin-top: 3px;">
                        Category: {{ $ticket->category }} &nbsp;·&nbsp; Submitted {{ $ticket->created_at->format('M j \a\t g:i A') }}
                      </div>
                  </div>
                </div>

                <div style="display: flex; align-items: center; gap: 12px;">
                  @php
                    $statusColors = [
                      'open'        => 'background: rgba(245, 158, 11, 0.1); color: #d97706;',
                      'in_progress' => 'background: rgba(59, 130, 246, 0.1); color: #2563eb;',
                      'resolved'    => 'background: rgba(16, 185, 129, 0.1); color: #16a34a;',
                      'closed'      => 'background: rgba(100, 116, 139, 0.1); color: #475569;'
                    ];
                    $statusStyle = $statusColors[$ticket->status] ?? 'background: #f3f4f6; color: #4b5563;';
                  @endphp
                  <span style="font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 12px; {{ $statusStyle }}">
                    {{ ucfirst($ticket->status) }}
                  </span>
                  
                  <button type="button" class="btn btn-outline btn-sm" wire:click="openTicket({{ $ticket->id }})" style="padding: 6px 12px; font-size: 12px;">
                    <i class="fas fa-comments"></i> Chat
                  </button>
                </div>
              </div>
            @endforeach
        @endif
      </div>
    </div>

    <!-- Ticket Detail Modal -->
    @if($showDetailModal && $this->selectedTicket)
      <div style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,0.5);backdrop-filter:blur(4px);z-index:9999;align-items:center;justify-content:center;padding:24px;">
        <div class="card" style="max-width:680px;width:100%;height:580px;display:flex;flex-direction:column;overflow:hidden;margin-bottom:0;">
          
          <!-- Modal Header -->
          <div style="padding:16px 20px;border-bottom:1px solid #f1f5f9;background:#fafafa;display:flex;align-items:center;justify-content:space-between;flex-shrink:0;">
            <div>
              <div style="display:flex;align-items:center;gap:8px;">
                <span style="font-family:monospace;font-weight:800;color:var(--primary);font-size:14px;">{{ $this->selectedTicket->ticket_number }}</span>
                <span style="font-size:11px;font-weight:700;padding:2px 8px;border-radius:10px;background:rgba(245, 158, 11, 0.1);color:#d97706;">
                  {{ ucfirst($this->selectedTicket->status) }}
                </span>
              </div>
              <div style="font-size:14px;font-weight:700;color:#1f2937;margin-top:4px;">{{ $this->selectedTicket->subject }}</div>
            </div>
            <button wire:click="closeModal" style="width:30px;height:30px;border-radius:6px;background:#f3f4f6;border:none;color:#4b5563;cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;">
              <i class="fas fa-xmark"></i>
            </button>
          </div>

          <!-- Ticket Thread -->
          <div style="flex:1;overflow-y:auto;padding:20px;background:#f8fafc;display:flex;flex-direction:column;gap:12px;min-height:0;"
               x-init="setTimeout(() => { $el.scrollTop = $el.scrollHeight }, 100)">
            
            <!-- Description Card -->
            <div style="display:flex;align-items:flex-start;gap:10px;">
              <div style="width:32px;height:32px;border-radius:50%;background:#efefef;color:#4b5563;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0;">
                {{ collect(explode(' ', Auth::user()->name))->take(2)->map(fn($w)=>substr($w,0,1))->implode('') }}
              </div>
              <div style="flex:1;background:white;border-radius:10px;padding:12px;border:1px solid #e5e7eb;box-shadow:0 1px 2px rgba(0,0,0,0.01);">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;">
                  <div style="font-weight:700;color:#1f2937;font-size:12.5px;">{{ Auth::user()->name }} (You)</div>
                  <div style="font-size:10.5px;color:#9ca3af;">{{ $this->selectedTicket->created_at->format('M j, Y \a\t g:i A') }}</div>
                </div>
                <p style="font-size:12.5px;color:#374151;line-height:1.55;white-space:pre-wrap;margin:0;">{{ $this->selectedTicket->description }}</p>
              </div>
            </div>

            <div style="text-align:center;position:relative;margin:8px 0;">
              <span style="background:#f8fafc;padding:0 10px;font-size:10px;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.05em;position:relative;z-index:1;">Responses</span>
              <div style="position:absolute;left:0;right:0;top:50%;height:1px;background:#e2e8f0;z-index:0;"></div>
            </div>

            <!-- Replies -->
            @forelse($this->selectedTicket->replies as $reply)
              <div style="display:flex;align-items:flex-start;gap:10px;{{ !$reply->is_admin_reply ? 'flex-direction:row-reverse;' : '' }}">
                <div style="width:32px;height:32px;border-radius:50%;background:{{ $reply->is_admin_reply ? 'var(--primary)' : '#efefef' }};color:{{ $reply->is_admin_reply ? 'white' : '#4b5563' }};display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0;">
                  {{ $reply->is_admin_reply ? 'AD' : collect(explode(' ', $reply->user?->name ?? 'User'))->take(2)->map(fn($w)=>substr($w,0,1))->implode('') }}
                </div>
                <div style="flex:1;max-width: 85%; background:{{ $reply->is_admin_reply ? 'white' : 'var(--primary-bg)' }};border-radius:10px;padding:12px;border:1px solid {{ $reply->is_admin_reply ? '#e5e7eb' : 'var(--primary-bg)' }};box-shadow:0 1px 2px rgba(0,0,0,0.01);">
                  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;">
                    <div style="font-weight:700;color:#1f2937;font-size:12.5px;">
                      {{ $reply->user?->name }}
                      @if($reply->is_admin_reply)
                        <span style="font-size:9.5px;padding:1px 4px;background:var(--primary-bg);color:var(--primary);border-radius:4px;margin-left:4px;font-weight:700;">Support Agent</span>
                      @endif
                    </div>
                    <div style="font-size:10.5px;color:#9ca3af;">{{ $reply->created_at->format('M j, Y \a\t g:i A') }}</div>
                  </div>
                  <p style="font-size:12.5px;color:#374151;line-height:1.55;white-space:pre-wrap;margin:0;">{{ $reply->message }}</p>
                </div>
              </div>
            @empty
              <div style="text-align:center;padding:16px;color:#9ca3af;font-size:12px;font-style:italic;">
                No replies from agents yet. We will notify you here and via email when there is an update.
              </div>
            @endforelse
          </div>

          <!-- Modal Footer Reply Input -->
          <div style="padding:12px 20px;border-top:1px solid #f1f5f9;background:white;flex-shrink:0;">
            <form wire:submit.prevent="sendReply">
              <div style="display:flex;gap:10px;align-items:flex-end;">
                <div style="flex:1;">
                  <textarea class="form-control" placeholder="Type your reply to the support team..." rows="2" 
                            style="width:100%;resize:none;font-size:12.5px;padding:8px 12px;border:1px solid #d1d5db;border-radius:8px;" wire:model="replyMessage" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="padding: 8px 16px; font-size:12.5px; align-self:stretch; display:flex; align-items:center; justify-content:center; gap:6px;" wire:loading.attr="disabled">
                  <span wire:loading.remove><i class="fas fa-paper-plane"></i> Send</span>
                  <span wire:loading><i class="fas fa-spinner fa-spin"></i></span>
                </button>
              </div>
            </form>
          </div>

        </div>
      </div>
    @endif
</div>
