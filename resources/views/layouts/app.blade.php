@php
    $user = auth()->user();
    $routeName = request()->route()?->getName();
    $uri = request()->route()?->uri();
    
    // Determine which layout to use
    if ($user) {
        if ($user->isIntern()) {
            $layout = 'student';
        } elseif ($user->isCompanyManager()) {
            $layout = 'company';
        } elseif ($user->isAdmin()) {
            // Admin can be on Internship Admin Portal or Helpdesk Admin Portal
            if (str_starts_with($routeName ?? '', 'admin.') || str_starts_with($uri ?? '', 'admin/')) {
                $layout = 'admin';
            } else {
                $layout = 'helpdesk';
            }
        } else {
            // Helpdesk agent/operator
            $layout = 'helpdesk';
        }
    } else {
        $layout = 'helpdesk';
    }
@endphp

@if($layout === 'admin')
    <x-layouts::admin :title="$title ?? null">
        <div class="animate-enter">
            {{ $slot }}
        </div>
    </x-layouts::admin>
@elseif($layout === 'student')
    <x-layouts::student :title="$title ?? null">
        <div class="animate-enter">
            {{ $slot }}
        </div>
    </x-layouts::student>
@elseif($layout === 'company')
    <x-layouts::company :title="$title ?? null">
        <div class="animate-enter">
            {{ $slot }}
        </div>
    </x-layouts::company>
@else
    {{-- Helpdesk / Default layout --}}
    <x-layouts::app.sidebar :title="$title ?? null">
        @if(request()->route() && request()->route()->uri() === "tickets/{ticket}")
            <div class="animate-enter">
                {{ $slot }}
            </div>
        @else
            <flux:main>
                <div class="animate-enter">
                    {{ $slot }}
                </div>
            </flux:main>
        @endif
    </x-layouts::app.sidebar>
@endif

