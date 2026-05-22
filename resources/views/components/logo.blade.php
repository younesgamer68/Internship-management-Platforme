{{--
Logo Component — InternLink logo with size support

Props:
- $size : 'sm' (30px), 'md' (40px), 'lg' (50px), 'xl' (80px) — default 'md'
- $href : link URL — optional, wraps in <a> if provided
    - $darkOnly : retained for compatibility
    - $class : additional CSS classes
    --}}

    @props([
        'size' => 'md',
        'href' => null,
        'darkOnly' => false,
        'small' => null,
    ])@php
    $sizes = [
        'sm' => ['img' => 'width:30px; height:30px;', 'imgClass' => 'w-[30px] h-[30px]'],
        'md' => ['img' => 'width:40px; height:40px;', 'imgClass' => 'w-10 h-10'],
        'lg' => ['img' => 'height:45px; width:auto;', 'imgClass' => ''],
        'xl' => ['img' => 'height:80px; width:auto;', 'imgClass' => ''],
    ];
    $s = $sizes[$size] ?? $sizes['md'];
@endphp
@if ($href)
       <a href="{{ $href }}" class="shrink-0 transition hover:opacity-80 {{ $attributes->get('class', '') }}" wire:navigate>
            @if ($small)
                <img x-show="!$store.ui.darkMode && isAtTop" src="{{ asset('images/Logos/TLM.png') }}" alt="InternLink Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }}">
                <img x-show="!$store.ui.darkMode && !isAtTop" src="{{ asset('images/Logos/Small Logo.png') }}" alt="InternLink Small Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">

                <img x-show="$store.ui.darkMode && isAtTop" src="{{ asset('images/Logos/TDM.png') }}" alt="InternLink Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">
                <img x-show="$store.ui.darkMode && !isAtTop" src="{{ asset($small) }}" alt="InternLink Small Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">
            @else
                <img x-show="!$store.ui.darkMode" src="{{ asset('images/Logos/TLM.png') }}" alt="InternLink Logo"
                        class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }}">
                <img x-show="$store.ui.darkMode" src="{{ asset('images/Logos/TDM.png') }}" alt="InternLink Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">
            @endif
    </a>
@else
    <div class="shrink-0 {{ $attributes->get('class', '') }}">
            @if ($small)
                <img x-show="!$store.ui.darkMode && isAtTop" src="{{ asset('images/Logos/TLM.png') }}" alt="InternLink Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }}">
                <img x-show="!$store.ui.darkMode && !isAtTop" src="{{ asset($small) }}" alt="InternLink Small Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">

                <img x-show="$store.ui.darkMode && isAtTop" src="{{ asset('images/Logos/TDM.png') }}" alt="InternLink Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">
                <img x-show="$store.ui.darkMode && !isAtTop" src="{{ asset($small) }}" alt="InternLink Small Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">
            @else
                <img x-show="!$store.ui.darkMode" src="{{ asset('images/Logos/TLM.png') }}" alt="InternLink Logo"
                        class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }}">
                <img x-show="$store.ui.darkMode" src="{{ asset('images/Logos/TDM.png') }}" alt="InternLink Logo"
                    class="{{ $s['imgClass'] }} object-contain" style="{{ $s['img'] }} display:none;">
            @endif
        </div>
@endif