@props([
    'active' => false,
    'icon' => null,
    'backgroundColor' => 'light',
])

<li>
    <a {{ $attributes->class([
        'flex transition items-center focus:outline-none h-10 px-4 space-x-5 rounded',
        'font-semibold' => $active,
        'text-white/90 hover:bg-white/10' => $backgroundColor === 'dark' && ! $active,
        'text-black focus:bg-black/80 bg-white focus:text-black' => $backgroundColor === 'dark' && $active,
        'hover:bg-gray-500/5' => $backgroundColor === 'light' && ! $active,
        'hover:bg-gray-500/5 focus:bg-primary-500/10 focus:text-primary-600 ' => $backgroundColor === 'light' && $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" {{ $attributes->class([
                'w-[1.15rem] h-[1.15rem]',
                'text-black' => $backgroundColor === 'light' && $active,
                'text-black' => $backgroundColor === 'dark' && $active,
                'text-primary-600' => $backgroundColor === 'light' && ! $active,
                'text-white/90' => $backgroundColor === 'dark' && ! $active,
            ]) }} />
        @endif

        <span>{{ $slot }}</span>

        @if($active)
            <div class="flex-1 flex justify-end">
                <x-icon name="bi-arrow-left-circle-fill" {{ $attributes->class([
                    'rounded-full w-2 h-2',
                    'text-black bg-black' => $backgroundColor === 'light',
                    'text-primary-600 bg-primary-600' => $backgroundColor === 'dark',
                ]) }} />
            </div>
        @endif
    </a>
</li>
