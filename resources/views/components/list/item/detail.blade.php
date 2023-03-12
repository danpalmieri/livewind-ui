@props([
    'icon' => null,
    'variant' => null,
])

<div {{ $attributes->class([
    'flex items-center space-x-1 font-medium',
    'text-sm text-gray-500' => ! $variant,
    'text-sm' => $variant === 'secondary',
]) }}>
    @if ($icon)
        <x-dynamic-component :component="$icon" :class="[
            null => 'w-5 h-5',
            'primary' => 'w-6 h-6',
            'secondary' => 'w-5 h-5',
        ][$variant]" />
    @endif

    <span class="truncate">{{ $slot }}</span>
</div>