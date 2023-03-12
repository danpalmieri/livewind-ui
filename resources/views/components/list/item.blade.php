@props([
    'end' => null,
    'start' => null,
    'tag' => 'div',
    'type' => 'button',
])

@php
    $contentClasses = 'flex-grow self-center py-3';
@endphp

<li class="flex items-center space-x-4">
    @if ($start)
        <div class="flex-shrink-0 flex items-center py-3">
            {{ $start }}
        </div>
    @endif

    @if ($tag === 'div')
        <div {{ $attributes->class([$contentClasses]) }}>
            {{ $slot }}
        </div>
    @elseif ($tag === 'button')
        <button
            type="{{ $type }}"
            {{ $attributes->class([$contentClasses]) }}
        >
            {{ $slot }}
        </button>
    @elseif ($tag === 'a')
        <a {{ $attributes->class([$contentClasses]) }}>
            {{ $slot }}
        </a>
    @endif

    @if ($end)
        <div class="flex-shrink-0 flex items-center py-3">
            {{ $end }}
        </div>
    @endif
</li>