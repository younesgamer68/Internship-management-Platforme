<x-layouts::app :title="__('Dashboard')">
    @if(auth()->user()->isAdmin())
        @livewire('admin.management')
    @else
        @livewire('app.agent-dashboard')
    @endif
</x-layouts::app>