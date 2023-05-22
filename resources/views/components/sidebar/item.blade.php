@props([
    'active' => false,
    'icon' => null,
    'backgroundColor' => 'light',
])

<li>
    <a {{ $attributes->class([
        'flex transition items-center focus:outline-none h-10 px-4 space-x-5 rounded',
        'text-white/90 hover:bg-white/10' => $backgroundColor === 'dark' && ! $active,
        'text-primary-500 font-bold focus:bg-primary-500/80 bg-white focus:text-primary-500' => $backgroundColor === 'dark' && $active,
        'hover:bg-gray-500/5' => $backgroundColor === 'light' && ! $active,
        'hover:bg-gray-500/5 font-bold focus:bg-primary-500/10 focus:text-primary-600 ' => $backgroundColor === 'light' && $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" {{ $attributes->class([
                'w-[1.15rem] h-[1.15rem]',
                'text-primary-800' => $backgroundColor === 'light' && $active,
                'text-primary-500' => $backgroundColor === 'dark' && $active,
                'text-primary-500' => $backgroundColor === 'light' && ! $active,
                'text-white/90' => $backgroundColor === 'dark' && ! $active,
            ]) }} />
        @endif

        <span>{{ $slot }}</span>

        @if($active)
            <div class="flex-1 flex justify-end">
                <x-icon name="bi-arrow-left-circle-fill" {{ $attributes->class([
                    'rounded-full w-2 h-2',
                    'text-primary-800 bg-primary-800' => $backgroundColor === 'light',
                    'text-primary-500 bg-primary-500' => $backgroundColor === 'dark',
                ]) }} />
            </div>
        @endif
    </a>
</li>
