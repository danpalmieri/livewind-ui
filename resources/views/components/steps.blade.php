@props([
    'count' => 4,
])

@php
    $count = (int) $count;
@endphp

<ul {{ $attributes->class([
    'relative grid w-full gap-4 md:gap-8',
    'md:grid-cols-2 lg:grid-cols-4' => ($count === 1) || ($count === 2) || ($count === 4) || ($count === 7) || ($count === 8),
    'md:grid-cols-3' => ($count === 3) || ($count === 6),
    'md:grid-cols-3 lg:grid-cols-5' => $count === 5,
]) }}>
    {{ $slot }}
</ul>