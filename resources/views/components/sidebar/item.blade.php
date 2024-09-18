@props([
    'active' => false,
    'icon' => null,
    'backgroundColor' => 'light',
])

<li>
    <a {{ $attributes->class([
        'flex transition items-center focus:outline-none h-8 px-2 tracking-tight text-gray-800 space-x-3 rounded text-[14px]',
        'text-primary-700 font-semibold' => $active,
        'text-white/90 hover:bg-white/10' => $backgroundColor === 'dark' && ! $active,
        'text-black focus:bg-black/80 bg-white focus:text-black' => $backgroundColor === 'dark' && $active,
        'hover:bg-gray-500/5' => $backgroundColor === 'light' && ! $active,
        'hover:bg-gray-500/5 focus:bg-gray-500/10 focus:text-gray-600 ' => $backgroundColor === 'light' && $active,
    ]) }}>
        @if ($icon)
            <x-dynamic-component :component="$icon" {{ $attributes->class([
                'w-[1.07rem] h-[1.07rem] opacity-90',
                'text-black' => $backgroundColor === 'light' && $active,
                'text-black' => $backgroundColor === 'dark' && $active,
                'text-gray-600' => $backgroundColor === 'light' && ! $active,
                'text-white/90' => $backgroundColor === 'dark' && ! $active,
            ]) }} />
        @endif

        <span class="tracking-normal">{{ $slot }}</span>
    </a>
</li>
