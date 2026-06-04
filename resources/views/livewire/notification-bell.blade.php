<div wire:poll.30s="refreshNotifications" class="relative" x-data="{ open: $wire.entangle('showDropdown') }" @click.outside="open = false">

    {{-- Bell Button --}}
    <button wire:click="toggleDropdown" type="button"
        class="relative flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 transition hover:border-[var(--primary)] hover:bg-[var(--primary-bg,rgba(0,177,170,0.08))] hover:text-[var(--primary)]"
        style="transition: all 0.2s;">
        <i class="fas fa-bell text-sm"></i>
        @if ($this->unreadCount > 0)
            <span class="absolute -top-1 -right-1 flex h-4.5 min-w-[18px] items-center justify-center rounded-full bg-red-500 px-1 text-[10px] font-bold text-white shadow-sm"
                style="height:18px;min-width:18px;padding:0 4px;border-radius:9px;font-size:10px;font-weight:700;background:#ef4444;">
                {{ $this->unreadCount > 99 ? '99+' : $this->unreadCount }}
            </span>
        @endif
    </button>

    {{-- Dropdown Panel --}}
    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-1"
        class="absolute right-0 top-full mt-2 z-[9998] w-[360px] rounded-2xl bg-white shadow-[0_20px_60px_-10px_rgba(0,0,0,0.18),0_0_0_1px_rgba(0,0,0,0.06)] overflow-hidden"
        style="transform-origin: top right;">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-gray-100 px-4 py-3">
            <div class="flex items-center gap-2">
                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600">
                    <i class="fas fa-bell text-white" style="font-size:11px;"></i>
                </div>
                <span class="text-sm font-bold text-gray-800">Notifications</span>
                @if ($this->unreadCount > 0)
                    <span class="rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-bold text-red-600">
                        {{ $this->unreadCount }} new
                    </span>
                @endif
            </div>
            @if ($this->unreadCount > 0)
                <button wire:click="markAllRead" type="button"
                    class="text-[11px] font-medium text-[var(--primary,#00b1aa)] hover:underline transition">
                    Mark all read
                </button>
            @endif
        </div>

        {{-- Notification List --}}
        <div class="max-h-[380px] overflow-y-auto [&::-webkit-scrollbar]:w-[3px] [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-200">
            @forelse ($this->notifications as $notification)
                @php
                    $data     = $notification->data ?? [];
                    $type     = $data['type'] ?? 'system';
                    $title    = $data['title'] ?? 'Notification';
                    $body     = $data['body'] ?? ($data['message'] ?? '');
                    $isUnread = is_null($notification->read_at);

                    $iconMap = [
                        'new_offer'       => ['icon' => 'fa-gift',          'bg' => '#dcfce7', 'color' => '#16a34a'],
                        'offer_accepted'  => ['icon' => 'fa-circle-check',  'bg' => '#dcfce7', 'color' => '#16a34a'],
                        'offer_rejected'  => ['icon' => 'fa-circle-xmark',  'bg' => '#fee2e2', 'color' => '#dc2626'],
                        'new_application' => ['icon' => 'fa-file-alt',      'bg' => '#dbeafe', 'color' => '#2563eb'],
                        'ticket_reply'    => ['icon' => 'fa-reply',         'bg' => '#fef3c7', 'color' => '#d97706'],
                        'new_ticket'      => ['icon' => 'fa-ticket',        'bg' => '#ede9fe', 'color' => '#7c3aed'],
                        'interview'       => ['icon' => 'fa-calendar-check','bg' => '#fce7f3', 'color' => '#db2777'],
                        'system'          => ['icon' => 'fa-bell',          'bg' => '#f1f5f9', 'color' => '#64748b'],
                    ];
                    $icon = $iconMap[$type] ?? $iconMap['system'];
                @endphp
                <button wire:click="markRead('{{ $notification->id }}')" type="button"
                    class="relative flex w-full items-start text-left transition hover:bg-gray-50 {{ $isUnread ? 'bg-blue-50/40' : '' }}" style="padding: 20px; gap: 16px;">

                    {{-- Unread dot --}}
                    @if ($isUnread)
                        <span class="absolute right-4 top-4 h-2 w-2 rounded-full bg-blue-500"></span>
                    @endif

                    {{-- Icon --}}
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl"
                        style="background:{{ $icon['bg'] }};">
                        <i class="fas {{ $icon['icon'] }} text-xs" style="color:{{ $icon['color'] }};font-size:13px;"></i>
                    </div>

                    {{-- Content --}}
                    <div class="min-w-0 flex-1 pr-4" style="padding-top: 4px; padding-bottom: 4px;">
                        <div class="text-[13px] font-semibold text-gray-800 leading-relaxed" style="margin-bottom: 8px;">{{ $title }}</div>
                        @if ($body)
                            <div class="text-[12px] text-gray-600 leading-relaxed line-clamp-2" style="margin-bottom: 8px;">{{ $body }}</div>
                        @endif
                        <div class="text-[11px] text-gray-400 font-medium" style="margin-top: 4px;">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                </button>
            @empty
                <div class="flex flex-col items-center justify-center py-12 px-6">
                    <div class="mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100">
                        <i class="fas fa-bell-slash text-gray-400" style="font-size:20px;"></i>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 mb-1">All caught up!</p>
                    <p class="text-xs text-gray-400 text-center">No notifications yet. We'll let you know when something happens.</p>
                </div>
            @endforelse
        </div>

        {{-- Footer --}}
        @if ($this->notifications->isNotEmpty())
            <div class="border-t border-gray-100 px-4 py-2.5 text-center">
                <p class="text-[10.5px] text-gray-400">
                    Showing {{ $this->notifications->count() }} most recent · Updates every 30s
                </p>
            </div>
        @endif
    </div>

    {{-- Notification Pop-up Toast --}}
    <div x-data="{ showToast: false }" 
         @new-notification.window="showToast = true; setTimeout(() => showToast = false, 5000)"
         x-show="showToast"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-8"
         @click="document.querySelector('[x-data*=showDropdown]').__x.$data.open = true; showToast = false;"
         class="fixed bottom-8 right-8 z-[99999] cursor-pointer rounded-2xl bg-white p-4 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.2)] border border-gray-100 flex items-center gap-4 transition-transform hover:scale-105"
         style="display: none; min-width: 280px;">
         <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white shadow-md">
             <i class="fas fa-bell"></i>
         </div>
         <div>
             <div class="text-[13px] font-bold text-gray-800">New Notification</div>
             <div class="text-[12px] text-gray-500 mt-0.5">You have a new message. Click to view.</div>
         </div>
    </div>
</div>