@props([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
])

@php
    $buttonClasses = generateClasses([
        'flex items-center h-8 px-5 transition rounded focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-inset',
        'hover:text-gray-800 focus:text-primary-600' => ! $active,
        'text-primary-600 shadow font-medium bg-white' => $active,
    ]);
@endphp

@if ($tag === 'button')
    <button
        type="{{ $type }}"
        {{ $attributes->class([$buttonClasses]) }}
    >
        {{ $slot }}
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        {{ $slot }}
    </a>
@endif
