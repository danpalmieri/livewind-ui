@props([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
    'icon' => null
])

@php
    $buttonClasses = generateClasses([
        'flex items-center h-6 items-center border-b-[2px] relative top-[8px] space-x-2 pb-[20px] transition focus:outline-none',
        'hover:text-primary-600 text-black border-transparent' => ! $active,
        'text-primary-600 border-primary-600' => $active,
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
