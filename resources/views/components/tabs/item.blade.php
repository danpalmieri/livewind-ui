@props([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
    'icon' => null
])

@php
    $buttonClasses = generateClasses([
        'flex font-medium items-center h-6 items-center border-b relative top-[7px] space-x-2 pb-[20px] transition focus:outline-none',
        'text-gray-600 border-transparent hover:text-gray-900' => ! $active,
        'text-gray-900 border-black' => $active,
    ]);
@endphp

@if ($tag === 'button')
    <button
            type="{{ $type }}"
            {{ $attributes->class([$buttonClasses]) }}
    >
        @if ($icon)
            <x-dynamic-component :component="$icon" class="w-4 h-4 opacity-80" />
        @endif
        <span>{{ $slot }}</span>
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" class="w-4 h-4 opacity-80" />
        @endif
        <span>{{ $slot }}</span>
    </a>
@endif
