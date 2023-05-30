@props([
    'color' => 'primary',
    'tag' => 'a',
    'type' => 'button',
])

@php
    $linkClasses = generateClasses([
        'transition focus:outline-none focus:underline',
        'text-primary-600 hover:text-primary-600' => $color === 'primary',
        'text-zinc-900 hover:text-zinc-900' => $color === 'dark',
        'text-danger-600 hover:text-danger-500' => $color === 'danger',
        'text-zinc-600 hover:text-zinc-500' => $color === 'secondary',
        'text-success-600 hover:text-success-500' => $color === 'success',
        'text-warning-600 hover:text-warning-500' => $color === 'warning',
    ]);
@endphp

@if ($tag === 'a')
    <a {{ $attributes->class([$linkClasses]) }}>
        {{ $slot }}
    </a>
@elseif ($tag === 'button')
    <button
        type="{{ $type }}"
        {{ $attributes->class([$linkClasses]) }}
    >
        {{ $slot }}
    </button>
@endif
