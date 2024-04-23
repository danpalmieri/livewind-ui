@props([
    'backgroundColor' => null,
    'end' => null,
    'start' => null,
])

<div {{ $attributes->class([
    'sticky top-0 z-10 flex items-center justify-between space-x-4 flex-shrink-0 h-12 px-4 border-b',
    'bg-zinc-100' => $backgroundColor !== 'light',
    'bg-white' => $backgroundColor === 'light',
]) }}>
    @unless($start || $end)
        <div class="flex w-full">
            {{ $slot }}
        </div>
    @else
        <div class="flex items-center space-x-1.5">
            {{ $start }}
        </div>

        <div class="flex items-center space-x-1.5">
            {{ $end }}
        </div>
    @endunless
</div>
