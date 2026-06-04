<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\InternshipOffer;
use App\Notifications\OfferResponseNotification;
use Illuminate\Support\Facades\Auth;

class Offers extends Component
{
    public function mount($company = null)
    {
        if (!Auth::user() || !in_array(Auth::user()->role, ['student', 'intern'])) {
            abort(403);
        }
    }

    public function acceptOffer($id)
    {
        $offer = InternshipOffer::where('user_id', Auth::id())->findOrFail($id);
        
        if ($offer->status !== 'pending') {
            session()->flash('error', 'This offer has already been processed.');
            return;
        }

        $offer->update([
            'status' => 'accepted',
            'responded_at' => now(),
        ]);

        // Notify the company managers
        $companyUsers = \App\Models\User::where('company_id', $offer->company_id)->get();
        foreach ($companyUsers as $user) {
            $user->notify(new OfferResponseNotification($offer));
        }

        session()->flash('success', 'You have accepted the offer! The company has been notified.');
    }

    public function rejectOffer($id)
    {
        $offer = InternshipOffer::where('user_id', Auth::id())->findOrFail($id);
        
        if ($offer->status !== 'pending') {
            session()->flash('error', 'This offer has already been processed.');
            return;
        }

        $offer->update([
            'status' => 'rejected',
            'responded_at' => now(),
        ]);

        // Notify the company managers
        $companyUsers = \App\Models\User::where('company_id', $offer->company_id)->get();
        foreach ($companyUsers as $user) {
            $user->notify(new OfferResponseNotification($offer));
        }

        session()->flash('info', 'You have declined the offer.');
    }

    public function render()
    {
        $offers = InternshipOffer::with(['internship.company', 'company'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.student.offers', [
            'offers' => $offers
        ])->layout('layouts.student', ['title' => 'My Offers']);
    }
}
