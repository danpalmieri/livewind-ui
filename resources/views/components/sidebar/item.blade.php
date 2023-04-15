@props([
    'active' => false,
    'icon' => null,
])

<li>
    <a {{ $attributes->class([
        'flex transition font-medium items-center focus:bg-primary-500/10 focus:text-primary-600 focus:outline-none h-10 px-4 space-x-3 rounded',
        'text-white/80 hover:bg-white/10' => $backgroundColor === 'dark' && ! $active,
        'text-white' => $backgroundColor === 'dark' && $active,
        'hover:bg-gray-500/5' => $backgroundColor === 'light' && ! $active,
        'font-bold' => $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" :class="'w-5 h-5 ' . ($active ? 'text-primary-800' : ' text-primary-500')" />
        @endif

        <span>{{ $slot }}</span>

        @if($active)
            <div class="flex-1 flex justify-end">
                <x-icon name="bi-arrow-left-circle-fill" {{ $attributes->class([
                    'rounded-full w-2 h-2',
                    'text-primary-800 bg-primary-800' => $backgroundColor === 'light',
                    'text-white bg-white' => $backgroundColor === 'dark',
                ]) }} />
            </div>
        @endif
    </a>
</li>
