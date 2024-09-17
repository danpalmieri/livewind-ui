@props([
    'active' => false,
    'icon' => null,
    'backgroundColor' => 'light',
])

<li>
    <a {{ $attributes->class([
        'flex transition items-center focus:outline-none h-8 px-2 tracking-tight text-gray-800 space-x-3 rounded text-[14px]',
        'bg-gray-100' => $active,
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

{{--        @if($active)--}}
{{--            <div class="flex-1 flex justify-end">--}}
{{--                <x-icon name="bi-arrow-left-circle-fill" {{ $attributes->class([--}}
{{--                    'rounded-full w-2 h-2',--}}
{{--                    'text-black bg-black' => $backgroundColor === 'light',--}}
{{--                    'text-gray-600 bg-gray-600' => $backgroundColor === 'dark',--}}
{{--                ]) }} />--}}
{{--            </div>--}}
{{--        @endif--}}
    </a>
</li>
