@props([
    'icon' => null,
    'iconColor' => null,
    'label' => null,
])

<div {{ $attributes->class(['space-y-1']) }}>
    @if ($label)
        <p class="text-xs font-medium tracking-wide text-gray-500 uppercase">{{ $label }}</p>
    @endif

    <div class="flex items-center space-x-1 font-medium">
        @if ($icon)
            <x-dynamic-component :component="$icon" :class="generateClasses([
                'w-5 h-5',
                'text-gray-500' => ! $iconColor,
                'text-danger-500' => $iconColor === 'danger',
                'text-primary-500' => $iconColor === 'primary',
                'text-success-500' => $iconColor === 'success',
                'text-warning-500' => $iconColor === 'warning',
            ])" />
        @endif

        <span>{{ $slot }}</span>
    </div>
</div>
