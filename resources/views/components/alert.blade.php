@props([
    'color' => 'primary',
    'footer' => null,
    'heading' => null,
    'icon' => null,
])

<div {{ $attributes->class(['bg-white shadow rounded-xl']) }}>
    <div class="flex px-6 py-4 space-x-4">
        @if ($icon)
            <x-dynamic-component :component="$icon" :class="generateClasses([
                'flex-shrink-0 w-7 h-7',
                'text-primary-500' => $color === 'primary',
                'text-danger-500' => $color === 'danger',
                'text-gray-500' => $color === 'secondary',
                'text-success-500' => $color === 'success',
                'text-warning-500' => $color === 'warning',
            ])" />
        @endif

        <div class="space-y-1">
            @if ($heading)
                <h2 class="text-lg font-semibold leading-6 tracking-tight">
                    {{ $heading }}
                </h2>
            @endif

            @if ($slot->isNotEmpty())
                <p class="text-gray-600">
                    {{ $slot }}
                </p>
            @endif
        </div>
    </div>

    @if ($footer)
        <div class="p-2 -mt-2 space-y-2">
            <x-app-ui::hr />

            <div class="py-1">
                {{ $footer }}
            </div>
        </div>
    @endif
</div>