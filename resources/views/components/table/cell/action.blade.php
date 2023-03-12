@props([
    'tag' => 'button',
    'type' => 'button',
])

@php
    $buttonClasses = 'text-sm font-semibold text-primary-600 hover:underline focus:underline focus:outline-none';
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