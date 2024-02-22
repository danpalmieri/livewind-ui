@props([
    'color' => 'dark',
    'icon' => null,
    'label' => null,
    'tag' => 'button',
    'type' => 'button',
])

@php
    $buttonClasses = generateClasses([
        'flex items-center justify-center w-8 h-8 transition rounded-full hover:bg-zinc-500/5 focus:outline-none',
        'text-primary-600 focus:bg-primary-500/10' => $color === 'primary',
        'text-danger-500 focus:bg-danger-500/10' => $color === 'danger',
        'text-zinc-500 focus:bg-zinc-500/10' => $color === 'secondary',
        'text-success-500 focus:bg-success-500/10' => $color === 'success',
        'text-warning-500 focus:bg-warning-500/10' => $color === 'warning',
        'text-black focus:bg-zinc-500/10' => $color === 'dark',
    ]);

    $iconClasses = 'w-4 h-4';
@endphp

@if ($tag === 'button')
    <button
        type="{{ $type }}"
        {{ $attributes->class([$buttonClasses]) }}
    >
        @if ($label)
            <x-lui::sr-only>{{ $label }}</x-lui::sr-only>
        @endif

        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        @if ($label)
            <x-lui::sr-only>{{ $label }}</x-lui::sr-only>
        @endif

        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    </a>
@endif
