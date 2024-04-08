@props([
    'color' => null,
    'icon' => null,
    'iconPosition' => 'before',
    'size' => 'md',
])

@php
    $iconClasses = generateClasses([
        'mr-1' => $iconPosition === 'before',
        'w-4 h-4' => $size === 'sm',
        'w-5 h-5' => $size === 'md',
        'ml-1' => $iconPosition === 'after',
        'w-6 h-6' => $size === 'lg',
        '-ml-1' => ($iconPosition === 'before') && ($size === 'md'),
        '-ml-1.5' => ($iconPosition === 'before') && ($size === 'lg'),
        '-mr-1' => ($iconPosition === 'after') && ($size === 'md'),
        '-mr-1.5' => ($iconPosition === 'after') && ($size === 'lg'),
    ]);
@endphp

<span {{ $attributes->class([
    'inline-flex items-center justify-center tracking-tight rounded-full',
    'text-zinc-600 bg-zinc-100' => (! $color) || ($color === 'secondary'),
    'h-6 px-2 text-sm' => $size === 'md',
    'h-5 px-1.5 text-xs' => $size === 'sm',
    'text-danger-600 bg-danger-500/10' => $color === 'danger',
    'text-primary-600 bg-primary-500/10' => $color === 'primary',
    'text-success-600 bg-success-500/10' => $color === 'success',
    'text-warning-600 bg-warning-500/10' => $color === 'warning',
    'h-7 px-3 text-base' => $size === 'lg',
]) }}>
    @if ($icon && $iconPosition === 'before')
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endif

    <span>{{ $slot }}</span>

    @if ($icon && $iconPosition === 'after')
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endif
</span>
