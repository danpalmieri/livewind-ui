@props([
    'active' => false,
    'icon' => null,
])

<li>
    <a {{ $attributes->class([
        'flex items-center h-10 px-4 space-x-3 rounded',
        'transition hover:bg-gray-500/5 focus:bg-primary-500/10 focus:text-primary-600 focus:outline-none' => ! $active,
        'font-semibold' => $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" :class="'w-5 h-5' . ($active ? '' : ' text-primary-500')" />
        @endif

        <span class="font-medium">{{ $slot }}</span>

        @if($active)
            <div class="flex-1 text-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-primary-800" viewBox="0 0 16 16">
                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                </svg>
            </div>
        @endif
    </a>
</li>
