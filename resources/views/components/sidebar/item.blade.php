@props([
    'active' => false,
    'icon' => null,
])

<li>
    <a {{ $attributes->class([
        'flex items-center h-10 px-4 space-x-3 rounded',
        'transition font-medium hover:bg-gray-500/5 focus:bg-primary-500/10 focus:text-primary-600 focus:outline-none' => ! $active,
        'font-bold' => $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" :class="'w-5 h-5 ' . ($active ? 'text-primary-800' : ' text-primary-500')" />
        @endif

        <span>{{ $slot }}</span>

        @if($active)
            <div class="flex-1 flex justify-end">
                <x-icon name="bi-arrow-left-circle-fill" class="text-primary-800 bg-primary-800 rounded-full w-2 h-2" />
            </div>
        @endif
    </a>
</li>
