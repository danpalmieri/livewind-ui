@props([
    'active' => false,
    'icon' => null,
    'backgroundColor' => 'light',
])

<li>
    <a {{ $attributes->class([
        'flex transition font-medium items-center focus:outline-none h-10 px-4 space-x-3 rounded',
        'text-white/80 hover:bg-white/10' => $backgroundColor === 'dark' && ! $active,
        'text-white font-bold focus:bg-white/80 focus:text-white' => $backgroundColor === 'dark' && $active,
        'hover:bg-gray-500/5' => $backgroundColor === 'light' && ! $active,
        'hover:bg-gray-500/5 font-bold focus:bg-primary-500/10 focus:text-primary-600 ' => $backgroundColor === 'light' && $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" {{ $attributes->class([
                'w-5 h-5',
                'text-primary-800' => $backgroundColor === 'light' && $active,
                'text-white' => $backgroundColor === 'dark' && $active,
                'text-primary-500' => $backgroundColor === 'light' && ! $active,
                'text-white/80' => $backgroundColor === 'dark' && ! $active,
            ]) }} />
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
