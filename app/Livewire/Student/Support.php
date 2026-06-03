<?php

namespace App\Livewire\Student;

use App\Models\SupportTicket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Support extends Component
{
    public $subject;
    public $category_id;
    public $description;

    public function mount()
    {
    }

    public function submitTicket()
    {
        $this->validate([
            'subject' => 'required|string|max:255',
            'category_id' => 'required|string',
            'description' => 'required|string',
        ]);

        $user = Auth::user();

        SupportTicket::create([
            'user_id' => $user->id,
            'ticket_number' => 'TK-' . rand(100000, 999999),
            'subject' => $this->subject,
            'category' => $this->category_id,
            'description' => $this->description,
            'status' => 'open',
        ]);

        $this->reset(['subject', 'category_id', 'description']);

        session()->flash('message', 'Ticket Submitted Successfully!');
    }

    public function render()
    {
        $user = Auth::user();
        $tickets = SupportTicket::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('livewire.student.support', compact('tickets'));
    }
}

