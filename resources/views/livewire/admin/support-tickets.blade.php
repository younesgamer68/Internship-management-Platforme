<div>
  <!-- Stat Cards -->
  <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:16px;margin-bottom:24px;">
    <!-- Open Stats -->
    <div class="card" style="padding:16px;display:flex;align-items:center;gap:14px;border-left:4px solid #f59e0b;">
      <div style="width:40px;height:40px;border-radius:10px;background:rgba(245,158,11,0.1);color:#f59e0b;display:flex;align-items:center;justify-content:center;font-size:18px;">
        <i class="fas fa-folder-open"></i>
      </div>
      <div>
        <div style="font-size:22px;font-weight:800;color:var(--gray-800);">{{ $this->stats['open'] }}</div>
        <div style="font-size:12px;color:var(--gray-400);font-weight:500;">Open Tickets</div>
      </div>
    </div>
    <!-- In Progress Stats -->
    <div class="card" style="padding:16px;display:flex;align-items:center;gap:14px;border-left:4px solid #3b82f6;">
      <div style="width:40px;height:40px;border-radius:10px;background:rgba(59,130,246,0.1);color:#3b82f6;display:flex;align-items:center;justify-content:center;font-size:18px;">
        <i class="fas fa-spinner fa-pulse"></i>
      </div>
      <div>
        <div style="font-size:22px;font-weight:800;color:var(--gray-800);">{{ $this->stats['in_progress'] }}</div>
        <div style="font-size:12px;color:var(--gray-400);font-weight:500;">In Progress</div>
      </div>
    </div>
    <!-- Resolved Stats -->
    <div class="card" style="padding:16px;display:flex;align-items:center;gap:14px;border-left:4px solid #10b981;">
      <div style="width:40px;height:40px;border-radius:10px;background:rgba(16,185,129,0.1);color:#10b981;display:flex;align-items:center;justify-content:center;font-size:18px;">
        <i class="fas fa-check-double"></i>
      </div>
      <div>
        <div style="font-size:22px;font-weight:800;color:var(--gray-800);">{{ $this->stats['resolved'] }}</div>
        <div style="font-size:12px;color:var(--gray-400);font-weight:500;">Resolved</div>
      </div>
    </div>
    <!-- Urgent Stats -->
    <div class="card" style="padding:16px;display:flex;align-items:center;gap:14px;border-left:4px solid #ef4444;">
      <div style="width:40px;height:40px;border-radius:10px;background:rgba(239,68,68,0.1);color:#ef4444;display:flex;align-items:center;justify-content:center;font-size:18px;">
        <i class="fas fa-triangle-exclamation"></i>
      </div>
      <div>
        <div style="font-size:22px;font-weight:800;color:var(--gray-800);">{{ $this->stats['urgent'] }}</div>
        <div style="font-size:12px;color:var(--gray-400);font-weight:500;">Urgent / High</div>
      </div>
    </div>
  </div>

  <!-- Filter Bar -->
  <div class="filter-bar" style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-bottom:20px;">
    <div class="search-input-wrapper">
      <i class="fas fa-search" style="color:var(--gray-400);font-size:13px;"></i>
      <input type="text" placeholder="Search by subject or ticket number..." style="border:none;outline:none;font-size:13px;width:100%;color:var(--gray-800);background:transparent;" wire:model.live.debounce.300ms="filterSearch"/>
    </div>
    <select class="filter-select-custom" wire:model.live="filterStatus">
      <option value="">All Statuses</option>
      <option value="open">Open</option>
      <option value="in_progress">In Progress</option>
      <option value="resolved">Resolved</option>
      <option value="closed">Closed</option>
    </select>
    <select class="filter-select-custom" wire:model.live="filterPriority">
      <option value="">All Priorities</option>
      <option value="low">Low</option>
      <option value="medium">Medium</option>
      <option value="high">High</option>
      <option value="urgent">Urgent</option>
    </select>
    <select class="filter-select-custom" wire:model.live="filterUserType">
      <option value="">All Submitter Roles</option>
      <option value="intern">Student (Intern)</option>
      <option value="company">Company</option>
    </select>
    <input type="date" class="filter-select-custom" wire:model.live="filterDate" style="padding: 6px 12px; min-width: 140px;" />
  </div>

  <!-- Tickets List Card -->
  <div class="card">
    <div class="card-header" style="display:flex;justify-content:between;align-items:center;">
      <span class="card-title">Support Tickets <span style="font-size:13px;font-weight:400;color:var(--gray-400);">({{ $tickets->total() }} total)</span></span>
      <div style="font-size:11px;color:var(--gray-400);font-weight:500;"><i class="fas fa-clock"></i> Auto-refreshes in real-time</div>
    </div>
    <div class="card-body" style="padding-top:16px;">
      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>Ticket #</th>
              <th>Submitter</th>
              <th>Subject</th>
              <th>Category</th>
              <th>Priority</th>
              <th>Assigned To</th>
              <th>Created</th>
              <th>Status</th>
              <th style="text-align:center;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($tickets as $ticket)
              <tr>
                <td>
                  <span style="font-family:monospace;font-weight:700;color:var(--primary);">{{ $ticket->ticket_number }}</span>
                </td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div style="width:28px;height:28px;border-radius:50%;background:#efefef;color:var(--gray-600);display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;">
                      {{ collect(explode(' ', $ticket->user?->name ?? 'User'))->take(2)->map(fn($w)=>substr($w,0,1))->implode('') }}
                    </div>
                    <div>
                      <div style="font-weight:600;color:var(--gray-800);font-size:12.5px;">{{ $ticket->user?->name ?? 'User' }}</div>
                      <div>
                        @if($ticket->user_type === 'intern')
                          <span style="font-size:10px;padding:1px 5px;background:rgba(0,177,170,0.1);color:#00b1aa;border-radius:4px;font-weight:600;">Student</span>
                        @else
                          <span style="font-size:10px;padding:1px 5px;background:rgba(139,92,246,0.1);color:#8b5cf6;border-radius:4px;font-weight:600;">Company</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <span style="font-weight:600;color:var(--gray-800);font-size:12.5px;max-width:200px;display:inline-block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{ $ticket->subject }}">
                    {{ $ticket->subject }}
                  </span>
                </td>
                <td style="color:var(--gray-600);font-size:12.5px;">{{ $ticket->category }}</td>
                <td>
                  @php
                    $colors = [
                      'urgent' => ['bg' => 'rgba(239,68,68,0.1)', 'color' => '#dc2626'],
                      'high'   => ['bg' => 'rgba(249,115,22,0.1)', 'color' => '#ea580c'],
                      'medium' => ['bg' => 'rgba(245,158,11,0.1)', 'color' => '#d97706'],
                      'low'    => ['bg' => 'rgba(16,185,129,0.1)', 'color' => '#15803d']
                    ];
                    $priorityColor = $colors[$ticket->priority] ?? ['bg' => '#f3f4f6', 'color' => '#4b5563'];
                  @endphp
                  <span style="font-size:11px;font-weight:700;padding:3px 8px;border-radius:12px;background:{{ $priorityColor['bg'] }};color:{{ $priorityColor['color'] }}">
                    {{ ucfirst($ticket->priority) }}
                  </span>
                </td>
                <td style="color:var(--gray-700);font-size:12.5px;">
                  @if($ticket->assignedTo)
                    <div style="display:flex;align-items:center;gap:4px;">
                      <i class="fas fa-user-shield" style="color:var(--primary);font-size:11px;"></i>
                      <span>{{ $ticket->assignedTo->name }}</span>
                    </div>
                  @else
                    <span style="color:var(--gray-400);font-style:italic;">Unassigned</span>
                  @endif
                </td>
                <td style="color:var(--gray-500);font-size:12px;">{{ $ticket->created_at->diffForHumans() }}</td>
                <td>
                  @php
                    $statuses = [
                      'open'        => ['bg' => 'rgba(245,158,11,0.1)', 'color' => '#d97706', 'label' => 'Open'],
                      'in_progress' => ['bg' => 'rgba(59,130,246,0.1)', 'color' => '#2563eb', 'label' => 'In Progress'],
                      'resolved'    => ['bg' => 'rgba(16,185,129,0.1)', 'color' => '#16a34a', 'label' => 'Resolved'],
                      'closed'      => ['bg' => 'rgba(100,116,139,0.1)', 'color' => '#475569', 'label' => 'Closed']
                    ];
                    $statusDetail = $statuses[$ticket->status] ?? ['bg' => '#f3f4f6', 'color' => '#4b5563', 'label' => ucfirst($ticket->status)];
                  @endphp
                  <span style="font-size:11px;font-weight:700;padding:3px 8px;border-radius:12px;background:{{ $statusDetail['bg'] }};color:{{ $statusDetail['color'] }}">
                    {{ $statusDetail['label'] }}
                  </span>
                </td>
                <td>
                  <div style="display:flex;align-items:center;justify-content:center;gap:6px;">
                    <button title="Open Ticket Details" class="action-btn" wire:click="openTicket({{ $ticket->id }})" style="padding: 6px 10px;">
                      <i class="fas fa-comment-dots"></i> Manage
                    </button>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" style="text-align:center;padding:40px;color:var(--gray-400);">
                  <div style="font-size:32px;opacity:0.3;margin-bottom:12px;"><i class="fas fa-ticket-alt"></i></div>
                  <p>No support tickets match your search filters.</p>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      @if ($tickets->hasPages())
        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:20px;padding-top:16px;border-top:1px solid var(--border);">
          <span style="font-size:12px;color:var(--gray-500);">Showing {{ $tickets->firstItem() }}–{{ $tickets->lastItem() }} of {{ $tickets->total() }} tickets</span>
          <div style="display:flex;gap:6px;">
            @if ($tickets->onFirstPage())
                <button class="pagination-btn" style="opacity: 0.5; cursor: not-allowed;" disabled><i class="fas fa-chevron-left"></i></button>
            @else
                <button class="pagination-btn" wire:click="previousPage" wire:loading.attr="disabled"><i class="fas fa-chevron-left"></i></button>
            @endif

            @foreach (range(1, $tickets->lastPage()) as $page)
                @if ($page == $tickets->currentPage())
                    <button class="pagination-btn active">{{ $page }}</button>
                @else
                    <button class="pagination-btn" wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled">{{ $page }}</button>
                @endif
            @endforeach

            @if ($tickets->hasMorePages())
                <button class="pagination-btn" wire:click="nextPage" wire:loading.attr="disabled"><i class="fas fa-chevron-right"></i></button>
            @else
                <button class="pagination-btn" style="opacity: 0.5; cursor: not-allowed;" disabled><i class="fas fa-chevron-right"></i></button>
            @endif
          </div>
        </div>
      @endif
    </div>
  </div>

  <!-- ═══════════════════════════════════════
       TICKET DETAIL & CHAT MODAL
  ════════════════════════════════════════ -->
  @if($showDetailModal && $this->selectedTicket)
    @teleport('body')
    <div style="display:flex;position:fixed;inset:0;background:rgba(0,0,0,0.5);backdrop-filter:blur(4px);z-index:9999;align-items:center;justify-content:center;padding:24px;">
      <div class="modal-content-box" style="max-width:760px;width:100%;height:680px;display:flex;flex-direction:column;overflow:hidden;">
        
        <!-- Modal Header -->
        <div style="padding:16px 24px;border-b:1px solid var(--border);background:#fafafa;display:flex;align-items:center;justify-content:space-between;flex-shrink:0;">
          <div>
            <div style="display:flex;align-items:center;gap:8px;">
              <span style="font-family:monospace;font-weight:800;color:var(--primary);font-size:15px;">{{ $this->selectedTicket->ticket_number }}</span>
              <span style="font-size:11px;font-weight:700;padding:2px 8px;border-radius:10px;background:rgba(245,158,11,0.1);color:#d97706;">
                {{ ucfirst($this->selectedTicket->status) }}
              </span>
            </div>
            <div style="font-size:15px;font-weight:700;color:var(--gray-800);margin-top:4px;">{{ $this->selectedTicket->subject }}</div>
          </div>
          <button wire:click="closeModal" style="width:32px;height:32px;border-radius:8px;background:var(--gray-100);border:none;color:var(--gray-600);cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;">
            <i class="fas fa-xmark"></i>
          </button>
        </div>

        <!-- Ticket Configuration Row (Assign, Actions) -->
        <div style="padding:10px 24px;background:#f0fdfa;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;font-size:12.5px;flex-shrink:0;">
          <div style="display:flex;align-items:center;gap:16px;">
            <!-- Assign To -->
            <div style="display:flex;align-items:center;gap:6px;">
              <span style="color:var(--gray-500);font-weight:500;">Assignee:</span>
              <select style="padding:4px 8px;border-radius:6px;border:1px solid var(--gray-200);background:white;outline:none;" 
                      wire:change="assignTicket({{ $this->selectedTicket->id }}, $event.target.value)">
                <option value="">Unassigned</option>
                @foreach($this->admins as $admin)
                  <option value="{{ $admin->id }}" {{ $this->selectedTicket->assigned_to === $admin->id ? 'selected' : '' }}>
                    {{ $admin->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- Status Controls -->
          <div style="display:flex;align-items:center;gap:8px;">
            @if($this->selectedTicket->status !== 'resolved')
              <button class="btn btn-outline btn-sm" style="border-color:#10b981;color:#10b981;padding:4px 10px;font-size:11px;" 
                      wire:click="resolveTicket({{ $this->selectedTicket->id }})">
                <i class="fas fa-check"></i> Mark Resolved
              </button>
            @endif

            @if($this->selectedTicket->status !== 'closed')
              <button class="btn btn-outline btn-sm" style="border-color:#475569;color:#475569;padding:4px 10px;font-size:11px;"
                      wire:click="closeTicket({{ $this->selectedTicket->id }})">
                <i class="fas fa-lock"></i> Close Ticket
              </button>
            @else
              <button class="btn btn-outline btn-sm" style="border-color:var(--primary);color:var(--primary);padding:4px 10px;font-size:11px;"
                      wire:click="reopenTicket({{ $this->selectedTicket->id }})">
                <i class="fas fa-unlock"></i> Reopen Ticket
              </button>
            @endif
          </div>
        </div>

        <!-- Chat / Thread Area -->
        <div style="flex:1;overflow-y:auto;padding:24px;background:#f8fafc;display:flex;flex-direction:column;gap:16px;min-height:0;"
             x-init="setTimeout(() => { $el.scrollTop = $el.scrollHeight }, 100)"
             class="[&::-webkit-scrollbar]:w-[3px] [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-200">
          
          <!-- Submitter Initial Ticket Card -->
          <div style="display:flex;align-items:flex-start;gap:12px;">
            <div style="width:36px;height:36px;border-radius:50%;background:#efefef;color:var(--gray-600);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">
              {{ collect(explode(' ', $this->selectedTicket->user?->name ?? 'User'))->take(2)->map(fn($w)=>substr($w,0,1))->implode('') }}
            </div>
            <div style="flex:1;background:white;border-radius:12px;padding:16px;border:1px solid var(--border);box-shadow:0 1px 3px rgba(0,0,0,0.02);">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:8px;">
                <div style="font-weight:700;color:var(--gray-800);font-size:13px;">
                  {{ $this->selectedTicket->user?->name }} <span style="font-weight:500;color:var(--gray-400);font-size:11.5px;">(Ticket Creator)</span>
                </div>
                <div style="font-size:11px;color:var(--gray-400);">{{ $this->selectedTicket->created_at->format('M j, Y \a\t g:i A') }}</div>
              </div>
              <p style="font-size:13px;color:var(--gray-700);line-height:1.6;white-space:pre-wrap;margin:0;">{{ $this->selectedTicket->description }}</p>
              @if($this->selectedTicket->attachment_path)
                <div style="margin-top:12px;padding-top:12px;border-top:1px solid #f1f5f9;">
                  <a href="{{ Storage::url($this->selectedTicket->attachment_path) }}" target="_blank" 
                     style="display:inline-flex;align-items:center;gap:6px;font-size:11.5px;color:var(--primary);text-decoration:none;font-weight:600;background:rgba(0,177,170,0.06);padding:4px 10px;border-radius:6px;">
                    <i class="fas fa-paperclip"></i> View Attached File
                  </a>
                </div>
              @endif
            </div>
          </div>

          <div style="text-align:center;position:relative;margin:10px 0;">
            <span style="background:#f8fafc;padding:0 12px;font-size:11px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.05em;position:relative;z-index:1;">Conversation Thread</span>
            <div style="position:absolute;left:0;right:0;top:50%;height:1px;background:#e2e8f0;z-index:0;"></div>
          </div>

          <!-- Replies list -->
          @forelse($this->selectedTicket->replies as $reply)
            <div style="display:flex;align-items:flex-start;gap:12px;{{ $reply->is_admin_reply ? 'flex-direction:row-reverse;' : '' }}">
              <div style="width:36px;height:36px;border-radius:50%;background:{{ $reply->is_admin_reply ? 'var(--primary)' : '#efefef' }};color:{{ $reply->is_admin_reply ? 'white' : 'var(--gray-600)' }};display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">
                {{ $reply->is_admin_reply ? 'AD' : collect(explode(' ', $reply->user?->name ?? 'User'))->take(2)->map(fn($w)=>substr($w,0,1))->implode('') }}
              </div>
              <div style="flex:1;max-width: 80%; background:{{ $reply->is_admin_reply ? 'rgba(0,177,170,0.04)' : 'white' }};border-radius:12px;padding:16px;border:1px solid {{ $reply->is_admin_reply ? 'rgba(0,177,170,0.12)' : 'var(--border)' }};box-shadow:0 1px 3px rgba(0,0,0,0.02);">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:8px;">
                  <div style="font-weight:700;color:var(--gray-800);font-size:13px;">
                    {{ $reply->user?->name }} 
                    @if($reply->is_admin_reply)
                      <span style="font-size:10px;padding:1px 5px;background:var(--primary-bg);color:var(--primary);border-radius:4px;margin-left:4px;font-weight:700;">Admin Support</span>
                    @endif
                  </div>
                  <div style="font-size:11px;color:var(--gray-400);">{{ $reply->created_at->format('M j, Y \a\t g:i A') }}</div>
                </div>
                <p style="font-size:13px;color:var(--gray-700);line-height:1.6;white-space:pre-wrap;margin:0;">{{ $reply->message }}</p>
              </div>
            </div>
          @empty
            <div style="text-align:center;padding:20px;color:var(--gray-400);font-size:12px;font-style:italic;">
              No replies yet. Type a response below to communicate with the user.
            </div>
          @endforelse
        </div>

        <!-- Input / Reply Box -->
        <div style="padding:16px 24px;border-top:1px solid var(--border);background:white;flex-shrink:0;">
          @if($this->selectedTicket->isClosed())
            <div style="padding:8px 12px;background:#f1f5f9;border-radius:8px;text-align:center;font-size:12.5px;color:var(--gray-500);font-weight:500;">
              <i class="fas fa-lock"></i> This ticket is closed. Reopen it to send a reply.
            </div>
          @else
            <form wire:submit.prevent="sendReply">
              <div style="display:flex;gap:12px;align-items:flex-end;">
                <div style="flex:1;">
                  <textarea class="form-control" placeholder="Type your support reply here..." rows="2" 
                            style="width:100%;resize:none;font-size:13px;" wire:model="replyMessage" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size:13px; align-self:stretch; display:flex; align-items:center; justify-content:center; gap:8px;" wire:loading.attr="disabled">
                  <span wire:loading.remove><i class="fas fa-reply"></i> Reply</span>
                  <span wire:loading><i class="fas fa-spinner fa-spin"></i></span>
                </button>
              </div>
              @error('replyMessage') 
                <span class="error text-danger" style="font-size:11.5px;margin-top:4px;display:block;">{{ $message }}</span> 
              @enderror
            </form>
          @endif
        </div>

      </div>
    </div>
    @endteleport
  @endif

  <!-- Loading Overlay -->
  <div wire:loading.delay style="position:fixed;top:16px;right:16px;background:rgba(0,0,0,0.85);color:white;padding:8px 16px;border-radius:20px;font-size:12px;z-index:99999;display:flex;align-items:center;gap:8px;box-shadow:0 4px 12px rgba(0,0,0,0.15);">
    <i class="fas fa-spinner fa-spin"></i> Refreshing...
  </div>
</div>
