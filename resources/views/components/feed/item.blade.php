@props([
    'backgroundColor' => null,
    'color' => null,
    'description' => null,
    'details' => null,
    'icon' => null,
])

<li {{ $attributes->class(['flex space-x-3']) }}>
    <div class="{{ generateClasses([
        'relative flex items-center justify-center flex-shrink-0 w-8 h-8 border rounded-full ring-4',
        'ring-gray-100' => $backgroundColor !== 'light',
        'ring-white' => $backgroundColor === 'light',
        'text-gray-400 border-gray-200 bg-gray-50' => ! $color,
        'text-danger-500 border-danger-500 bg-danger-50' => $color === 'danger',
        'text-primary-500 border-primary-500 bg-primary-50' => $color === 'primary',
        'text-success-500 border-success-500 bg-success-50' => $color === 'success',
        'text-warning-500 border-warning-500 bg-warning-50' => $color === 'warning',
    ]) }}">
        <x-dynamic-component :component="$icon" class="w-6 h-6" />
    </div>

    <div class="space-y-1">
        <div>
            <p class="text-sm font-medium">{{ $slot }}</p>

            @if ($description)
                <p class="text-sm text-gray-600">
                    {{ $description }}
                </p>
            @endif
        </div>

        @if ($details)
            <p class="text-xs font-medium text-gray-500">{{ $details }}</p>
        @endif
    </div>
</li>