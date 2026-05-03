@props([
    'sidebar' => false,
])
@php
    $logoClasses = $sidebar
        ? 'h-8 w-auto max-w-45 object-contain'
        : 'h-8 w-auto max-w-45 object-contain';
@endphp

<a href="{{ $attributes->get('href', url('/')) }}" class="inline-flex items-center shrink-0" wire:navigate>
    <img x-bind:src="$store.ui.darkMode ? '{{ asset('images/Logos/TDM.png') }}' : '{{ asset('images/Logos/TLM.png') }}'"
        alt="InternLink Logo" class="{{ $logoClasses }}">
</a>
