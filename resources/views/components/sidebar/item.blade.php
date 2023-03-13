@props([
    'active' => false,
    'icon' => null,
])

<li>
    <a {{ $attributes->class([
        'flex items-center h-10 px-4 space-x-3 rounded',
        'transition hover:bg-gray-500/5 focus:bg-primary-500/10 focus:text-primary-600 focus:outline-none' => ! $active,
        'font-bold' => $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" :class="'w-5 h-5' . ($active ? '' : ' text-primary-500')" />
        @endif

        <span class="font-medium">{{ $slot }}</span>

        @if($active)
            <div class="flex-1 flex justify-end">
                <x-icon name="bi-dot" class="text-primary-800 w-5 h-5" />
            </div>
        @endif
    </a>
</li>
