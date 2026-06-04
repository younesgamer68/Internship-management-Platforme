<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class NotificationBell extends Component
{
    public bool $showDropdown = false;

    #[On('notifications-updated')]
    public function refreshNotifications(): void
    {
        $oldUnread = $this->unreadCount;
        unset($this->notifications, $this->unreadCount);
        $newUnread = $this->unreadCount;

        if ($newUnread > $oldUnread) {
            $this->dispatch('new-notification');
        }
    }

    public function markRead(string $id): mixed
    {
        $notification = Auth::user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();

            $data = $notification->data ?? [];
            $type = $data['type'] ?? null;

            $this->dispatch('notifications-updated');

            // Route to the correct page based on notification type
            $user        = Auth::user();
            $companySlug = $user->company?->slug ?? 'internlink-demo';

            return match ($type) {
                'new_offer'        => redirect()->route('student.offers', ['company' => $companySlug]),
                'offer_accepted',
                'offer_rejected'   => redirect()->route('company.offers', ['company' => $companySlug]),
                'new_application'  => redirect()->route('company.applicants', ['company' => $companySlug]),
                'ticket_reply'     => redirect()->route('student.support', ['company' => $companySlug]),
                'new_ticket'       => redirect()->route('admin.support', ['company' => $companySlug]),
                default            => null,
            };
        }

        return null;
    }

    public function markAllRead(): void
    {
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);
        $this->dispatch('notifications-updated');
    }

    public function toggleDropdown(): void
    {
        $this->showDropdown = ! $this->showDropdown;
    }

    public function closeDropdown(): void
    {
        $this->showDropdown = false;
    }

    #[Computed]
    public function notifications(): \Illuminate\Database\Eloquent\Collection
    {
        return Auth::user()->notifications()->latest()->take(15)->get();
    }

    #[Computed]
    public function unreadCount(): int
    {
        return Auth::user()->unreadNotifications()->count();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.notification-bell');
    }
}

