@props([
    'active' => false,
    'icon' => null,
])

<li>
    <a {{ $attributes->class([
        'flex items-center h-10 px-2 space-x-2 rounded-lg',
        'transition hover:bg-gray-500/5 focus:bg-primary-500/10 focus:text-primary-600 focus:outline-none' => ! $active,
        'text-white bg-primary-600' => $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" :class="'w-7 h-7' . ($active ? '' : ' text-primary-500')" />
        @endif

        <span class="font-medium">{{ $slot }}</span>
    </a>
</li>