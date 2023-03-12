@props([
    'backgroundColor' => null,
    'end' => null,
    'start' => null,
])

<div {{ $attributes->class([
    'sticky top-0 z-10 flex items-center justify-between space-x-4 flex-shrink-0 h-16 px-4 border-b',
    'bg-gray-100' => $backgroundColor !== 'light',
    'bg-white' => $backgroundColor === 'light',
]) }}>
    <div class="flex items-center">
        {{ $start }}
    </div>

    <div class="flex items-center">
        {{ $end }}
    </div>
</div>
