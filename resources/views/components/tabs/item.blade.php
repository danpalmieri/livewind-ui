@props([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
    'icon' => null
])

@php
    $buttonClasses = generateClasses([
        'flex font-medium items-center items-center border-b-2 relative top-[7px] space-x-2 pb-2 transition focus:outline-none',
        'text-gray-600 border-transparent hover:text-gray-900' => ! $active,
        'text-primary-700 font-semibold border-primary-700' => $active,
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
        <span @if($active) class="block rounded-lg border-gray-200/70" @endif>{{ $slot }}</span>
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" class="w-4 h-4 opacity-80" />
        @endif
        <span @if($active) class="block rounded-lg border-gray-200/70" @endif>{{ $slot }}</span>
    </a>
@endif
