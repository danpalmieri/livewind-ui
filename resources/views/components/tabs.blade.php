@props([
    'size' => 'lg',
])
@php
    $classes = generateClasses([
        'inline-flex items-center justify-center space-x-9 border-b-4 border-zinc-400',
        'text-lg' => $size === 'lg',
        'text-sm' => $size === 'sm',
    ]);
@endphp
<nav {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</nav>
