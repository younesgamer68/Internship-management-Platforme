<?php

namespace App\Livewire\Admin;

use App\Models\SupportTicket;
use App\Models\SupportTicketReply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class SupportTickets extends Component
{
    use WithPagination;

    // Filters
    public string $filterStatus   = '';
    public string $filterPriority = '';
    public string $filterUserType = '';
    public string $filterSearch   = '';
    public string $filterDate     = '';

    // Ticket detail modal
    public ?int $selectedTicketId = null;
    public string $replyMessage   = '';
    public bool $showDetailModal  = false;

    protected $queryString = ['filterStatus', 'filterPriority', 'filterUserType', 'filterSearch'];

    public function updatedFilterStatus():   void { $this->resetPage(); }
    public function updatedFilterPriority(): void { $this->resetPage(); }
    public function updatedFilterUserType(): void { $this->resetPage(); }
    public function updatedFilterSearch():   void { $this->resetPage(); }

    // ─────────────────────────────────────────────────────────────────
    // Ticket Selection & Detail
    // ─────────────────────────────────────────────────────────────────

    public function openTicket(int $ticketId): void
    {
        $this->selectedTicketId = $ticketId;
        $this->replyMessage     = '';
        $this->showDetailModal  = true;
    }

    public function closeModal(): void
    {
        $this->showDetailModal  = false;
        $this->selectedTicketId = null;
        $this->replyMessage     = '';
    }

    // ─────────────────────────────────────────────────────────────────
    // Admin Actions
    // ─────────────────────────────────────────────────────────────────

    public function sendReply(): void
    {
        $this->validate(['replyMessage' => 'required|string|min:2']);

        if (! $this->selectedTicketId) {
            return;
        }

        $ticket = SupportTicket::findOrFail($this->selectedTicketId);

        SupportTicketReply::create([
            'ticket_id'      => $ticket->id,
            'user_id'        => Auth::id(),
            'message'        => $this->replyMessage,
            'is_admin_reply' => true,
        ]);

        // Notify the ticket owner
        $ticket->user?->notify(new \App\Notifications\TicketReplyNotification($ticket, $this->replyMessage, true));

        // Auto-set status to "in_progress" if still open
        if ($ticket->status === 'open') {
            $ticket->update(['status' => 'in_progress']);
        }

        $this->replyMessage = '';
        $this->dispatch('reply-sent');
    }

    public function closeTicket(int $ticketId): void
    {
        $ticket = SupportTicket::findOrFail($ticketId);
        $ticket->update([
            'status'    => 'closed',
            'closed_at' => now(),
        ]);
        $this->dispatch('ticket-updated');
    }

    public function reopenTicket(int $ticketId): void
    {
        $ticket = SupportTicket::findOrFail($ticketId);
        $ticket->update([
            'status'    => 'open',
            'closed_at' => null,
        ]);
        $this->dispatch('ticket-updated');
    }

    public function resolveTicket(int $ticketId): void
    {
        $ticket = SupportTicket::findOrFail($ticketId);
        $ticket->update([
            'status'      => 'resolved',
            'resolved_at' => now(),
        ]);
        $this->dispatch('ticket-updated');
    }

    public function assignTicket(int $ticketId, int $adminId): void
    {
        SupportTicket::findOrFail($ticketId)->update(['assigned_to' => $adminId]);
        $this->dispatch('ticket-updated');
    }

    // ─────────────────────────────────────────────────────────────────
    // Computed
    // ─────────────────────────────────────────────────────────────────

    #[Computed]
    public function selectedTicket(): ?SupportTicket
    {
        if (! $this->selectedTicketId) {
            return null;
        }

        return SupportTicket::with(['user', 'assignedTo', 'replies.user'])
            ->find($this->selectedTicketId);
    }

    #[Computed]
    public function stats(): array
    {
        return [
            'open'        => SupportTicket::where('status', 'open')->count(),
            'in_progress' => SupportTicket::where('status', 'in_progress')->count(),
            'resolved'    => SupportTicket::where('status', 'resolved')->count(),
            'closed'      => SupportTicket::where('status', 'closed')->count(),
            'urgent'      => SupportTicket::where('priority', 'urgent')->whereNotIn('status', ['closed', 'resolved'])->count(),
        ];
    }

    #[Computed]
    public function admins(): \Illuminate\Database\Eloquent\Collection
    {
        return User::where('role', 'admin')->get(['id', 'name']);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $query = SupportTicket::with(['user', 'assignedTo'])
            ->when($this->filterStatus,   fn ($q) => $q->where('status', $this->filterStatus))
            ->when($this->filterPriority, fn ($q) => $q->where('priority', $this->filterPriority))
            ->when($this->filterUserType, fn ($q) => $q->where('user_type', $this->filterUserType))
            ->when($this->filterSearch,   fn ($q) => $q->where(function ($sq) {
                $sq->where('subject', 'like', '%' . $this->filterSearch . '%')
                   ->orWhere('ticket_number', 'like', '%' . $this->filterSearch . '%');
            }))
            ->when($this->filterDate, fn ($q) => $q->whereDate('created_at', $this->filterDate))
            ->latest();

        $tickets = $query->paginate(15);

        return view('livewire.admin.support-tickets', ['tickets' => $tickets]);
    }
}
