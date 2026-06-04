<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\User;
use App\Models\Internship;
use App\Models\InternshipOffer;
use App\Notifications\NewOfferNotification;
use Illuminate\Support\Facades\Auth;

class SendOffer extends Component
{
    public $internId;
    public $intern;
    public $internships = [];
    
    // Form fields
    public $internship_id = '';
    public $message = '';

    protected $rules = [
        'internship_id' => 'required|exists:internships,id',
        'message' => 'nullable|string|max:1000',
    ];

    public function mount($company, $intern)
    {
        $this->internId = $intern;
        $this->intern = User::whereIn('role', ['student', 'intern'])->findOrFail($intern);
        
        $companyId = Auth::user()->company_id;
        if (!$companyId) {
            abort(403, 'Unauthorized company access.');
        }

        $this->internships = Internship::where('company_id', $companyId)
            ->where('status', 'active')
            ->get();
            
        if ($this->internships->isEmpty()) {
            session()->flash('error', 'You must have at least one active internship listing to send an offer.');
        }
    }

    public function sendOffer()
    {
        $this->validate();

        $companyId = Auth::user()->company_id;

        // Check if an offer already exists
        $exists = InternshipOffer::where('internship_id', $this->internship_id)
            ->where('user_id', $this->internId)
            ->exists();

        if ($exists) {
            session()->flash('error', 'An offer has already been sent to this intern for this internship.');
            return;
        }

        $offer = InternshipOffer::create([
            'internship_id' => $this->internship_id,
            'company_id' => $companyId,
            'user_id' => $this->internId,
            'status' => 'pending',
            'message' => $this->message,
        ]);

        // Notify the intern
        $this->intern->notify(new NewOfferNotification($offer));

        session()->flash('success', 'Offer successfully sent to ' . $this->intern->name);

        return redirect()->route('company.applicants', ['company' => Auth::user()->company->slug]);
    }

    public function render()
    {
        return view('livewire.company.send-offer')
            ->layout('layouts.company', ['title' => 'Send Internship Offer']);
    }
}
