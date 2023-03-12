@props([
    'actions' => null,
    'color' => 'primary',
    'description' => null,
    'details' => null,
    'icon' => null,
])

<div {{ $attributes->class(['flex items-start w-full px-3 py-2 space-x-2 text-xs shadow bg-white/50 ring-gray-200 ring-1 rounded-xl backdrop-blur-xl backdrop-saturate-150']) }}>
    @if ($icon)
        <x-dynamic-component :component="$icon" :class="generateClasses([
            'flex-shrink-0 w-6 h-6',
            'text-primary-500' => $color === 'primary',
            'text-danger-500' => $color === 'danger',
            'text-success-500' => $color === 'success',
            'text-warning-500' => $color === 'warning',
        ])" />
    @endif

    <div class="flex-1 space-y-1">
        <div class="flex items-center justify-between space-x-2 font-medium">
            <p class="text-sm leading-6 truncate">
                {{ $slot }}
            </p>

            @if ($details)
                <p class="font-medium leading-6 text-gray-500">
                    {{ $details }}
                </p>
            @endif
        </div>

        @if ($description)
            <p class="text-gray-600">
                {{ $description }}
            </p>
        @endif

        @if ($actions)
            <div class="flex items-center font-medium space-x-3">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
