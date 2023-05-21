@props([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
    'icon' => null
])

@php
    $buttonClasses = generateClasses([
        'flex items-center h-8 items-center border-bottom-3 border-transparent space-x-2 transition rounded focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-inset',
        'hover:text-zinc-800 focus:text-primary-600' => ! $active,
        'text-primary-600 border-primary-600 font-medium' => $active,
    ]);
@endphp

@if ($tag === 'button')
    <button
        type="{{ $type }}"
        {{ $attributes->class([$buttonClasses]) }}
    >
        @if ($icon)
            <x-dynamic-component :component="$icon" class="w-5 h-5 opacity-80" />
        @endif
        <span>{{ $slot }}</span>
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" class="w-5 h-5 opacity-80" />
        @endif
        <span>{{ $slot }}</span>
    </a>
@endif
