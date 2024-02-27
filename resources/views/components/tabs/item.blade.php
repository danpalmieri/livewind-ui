@props([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
    'icon' => null
])

@php
    $buttonClasses = generateClasses([
        'flex font-medium items-center h-6 items-center border-b relative top-[7px] space-x-2 pb-[20px] transition focus:outline-none',
        'text-gray-600 border-transparent' => ! $active,
        'text-gray-900 border-black' => $active,
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
