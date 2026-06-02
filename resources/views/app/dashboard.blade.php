@php
    $user = auth()->user();
@endphp

@if($user->isAdmin())
    @if(str_starts_with(request()->route()?->getName() ?? '', 'admin.') || str_starts_with(request()->route()?->uri() ?? '', 'admin/'))
        @include('app.admin.dashboard')
    @else
        <x-layouts::app.sidebar title="Admin Dashboard">
            <flux:main>
                <div class="animate-enter">
                    @livewire('app.admin-dashboard')
                </div>
            </flux:main>
        </x-layouts::app.sidebar>
    @endif
@elseif($user->isIntern())
    @include('app.student.dashboard')
@elseif($user->isCompanyManager())
    @include('app.company.dashboard')
@else
    {{-- Helpdesk Agent --}}
    <x-layouts::app.sidebar title="Agent Dashboard">
        <flux:main>
            <div class="animate-enter">
                @livewire('app.agent-dashboard')
            </div>
        </flux:main>
    </x-layouts::app.sidebar>
@endif