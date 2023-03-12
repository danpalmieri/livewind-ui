@props([
    'avatar' => null,
    'details' => null,
    'name' => null,
])

<div {{ $attributes->class(['flex items-center space-x-4']) }}>
    {{ $avatar }}

    @if ($details || $name)
        <div class="font-medium">
            @if ($name)
                <p>{{ $name }}</p>
            @endif

            @if ($details)
                <p class="text-sm text-gray-600">{{ $details }}</p>
            @endif
        </div>
    @endif
</div>