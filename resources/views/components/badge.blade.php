@props([
    'color' => null,
    'icon' => null,
    'iconPosition' => 'before',
    'size' => 'md',
])

@php
    $iconClasses = generateClasses([
        'mr-1' => $iconPosition === 'before',
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
    'inline-flex items-center justify-center font-semibold tracking-tight rounded-full',
    'text-gray-600 bg-gray-100' => (! $color) || ($color === 'secondary'),
    'h-6 px-2 text-sm' => $size === 'md',
    'text-danger-700 bg-danger-500/10' => $color === 'danger',
    'text-primary-700 bg-primary-500/10' => $color === 'primary',
    'text-success-700 bg-success-500/10' => $color === 'success',
    'text-warning-700 bg-warning-500/10' => $color === 'warning',
    'h-7 px-3' => $size === 'lg',
]) }}>
    @if ($icon && $iconPosition === 'before')
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endif

    <span>{{ $slot }}</span>

    @if ($icon && $iconPosition === 'after')
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endif
</span>
