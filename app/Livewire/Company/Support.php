<?php

namespace App\Livewire\Company;

use App\Models\SupportTicket;
use App\Models\SupportTicketReply;
use App\Models\User;
use App\Notifications\NewTicketNotification;
use App\Notifications\TicketReplyNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Support extends Component
{
    // Form fields
    public $subject;
    public $category_id;
    public $description;
    public string $priority = 'medium';

    // Detailed view
    public ?int $selectedTicketId = null;
    public string $replyMessage = '';
    public bool $showDetailModal = false;

    public function submitTicket(): void
    {
        $this->validate([
            'subject'     => 'required|string|max:255',
            'category_id' => 'required|string',
            'description' => 'required|string',
            'priority'    => 'required|string|in:low,medium,high,urgent',
        ]);

        $user = Auth::user();

        $ticket = SupportTicket::create([
            'user_id'       => $user->id,
            'ticket_number' => 'TK-' . rand(100000, 999999),
            'subject'       => $this->subject,
            'category'      => $this->category_id,
            'description'   => $this->description,
            'priority'      => $this->priority,
            'status'        => 'open',
            'user_type'     => 'company',
        ]);

        // Notify admins
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewTicketNotification($ticket));
        }

        $this->reset(['subject', 'category_id', 'description', 'priority']);

        session()->flash('message', 'Ticket Submitted Successfully!');
    }

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

    public function sendReply(): void
    {
        $this->validate([
            'replyMessage' => 'required|string|min:2',
        ]);

        if (! $this->selectedTicketId) {
            return;
        }

        $ticket = SupportTicket::findOrFail($this->selectedTicketId);

        if ($ticket->user_id !== Auth::id()) {
            abort(403);
        }

        SupportTicketReply::create([
            'ticket_id'      => $ticket->id,
            'user_id'        => Auth::id(),
            'message'        => $this->replyMessage,
            'is_admin_reply' => false,
        ]);

        // If ticket is closed, reopen it
        if ($ticket->status === 'closed' || $ticket->status === 'resolved') {
            $ticket->update(['status' => 'open']);
        }

        // Notify assigned admin or all admins if unassigned
        $notifiable = $ticket->assignedTo ?? User::where('role', 'admin')->first();
        if ($notifiable) {
            $notifiable->notify(new TicketReplyNotification($ticket, $this->replyMessage, false));
        }

        $this->replyMessage = '';
    }

    #[Computed]
    public function selectedTicket(): ?SupportTicket
    {
        if (! $this->selectedTicketId) {
            return null;
        }

        return SupportTicket::with(['replies.user', 'assignedTo'])
            ->where('user_id', Auth::id())
            ->find($this->selectedTicketId);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $tickets = SupportTicket::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.company.support', compact('tickets'));
    }
}
