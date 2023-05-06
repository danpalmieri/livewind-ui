@props([
    'color' => 'primary',
    'icon' => null,
    'iconPosition' => 'before',
    'tag' => 'button',
    'type' => 'button',
    'size' => 'md',
    'loadingFeedback' => false,
    'loadingText' => 'Salvando...',
])

@php
    $buttonClasses = generateClasses([
        'inline-flex items-center justify-center font-medium tracking-tight transition rounded disabled:cursor-not-allowed disabled:opacity-50 focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset',
        'bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700' => $color === 'primary',
        'bg-zinc-800 hover:bg-zinc-700 focus:bg-zinc-600 focus:ring-offset-zinc-600' => $color === 'dark',
        'h-9 px-4' => $size === 'md',
        'text-white focus:ring-white' => $color !== 'secondary',
        'bg-danger-600 hover:bg-danger-500 focus:bg-danger-700 focus:ring-offset-danger-700' => $color === 'danger',
        'text-gray-800 bg-white border hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'secondary',
        'bg-success-600 hover:bg-success-500 focus:bg-success-700 focus:ring-offset-success-700' => $color === 'success',
        'bg-warning-600 hover:bg-warning-500 focus:bg-warning-700 focus:ring-offset-warning-700' => $color === 'warning',
        'h-8 px-3 text-sm' => $size === 'sm',
        'h-11 px-6 text-xl' => $size === 'lg',
    ]);

    $iconClasses = generateClasses([
        'w-[1.07rem] h-[1.07rem]' => $size === 'md',
        'w-5 h-5' => $size === 'lg',
        'w-4 h-4' => $size === 'sm',
        'mr-1.5 -ml-1' => ($iconPosition === 'before') && ($size === 'md'),
        'mr-2 -ml-2' => ($iconPosition === 'before') && ($size === 'lg'),
        'mr-1 -ml-0.5' => ($iconPosition === 'before') && ($size === 'sm'),
        'ml-1.5 -mr-1' => ($iconPosition === 'after') && ($size === 'md'),
        'ml-2 -mr-2' => ($iconPosition === 'after') && ($size === 'lg'),
        'ml-1 -mr-0.5' => ($iconPosition === 'after') && ($size === 'sm'),
    ]);
@endphp

@if ($tag === 'button')
    <button
        type="{{ $type }}"
        {{ $attributes->class([$buttonClasses]) }}
    >
        @if ($icon && $iconPosition === 'before')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif

        <span>
            @if($loadingFeedback)
            <span wire:loading.remove>{{ $slot }}</span>
            <span wire:loading>{{ $loadingText }}</span>
            @else
            <span>{{ $slot }}</span>
            @endif
        </span>

        @if ($icon && $iconPosition === 'after')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        @if ($icon && $iconPosition === 'before')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif

        <span>{{ $slot }}</span>

        @if ($icon && $iconPosition === 'after')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif
    </a>
@endif
