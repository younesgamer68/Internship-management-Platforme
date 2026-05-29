@php
    $user = auth()->user();
@endphp

@if($user->isAdmin())
    @if(str_starts_with(request()->route()?->getName() ?? '', 'admin.') || str_starts_with(request()->route()?->uri() ?? '', 'admin/'))
        @include('app.admin.dashboard')
    @else
        @livewire('app.admin-dashboard')
    @endif
@elseif($user->isIntern())
    @include('app.student.dashboard')
@elseif($user->isCompanyManager())
    @include('app.company.dashboard')
@else
    {{-- Helpdesk Agent --}}
    @livewire('app.agent-dashboard')
@endif