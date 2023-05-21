@props([
    'size' => 'lg',
])
@php
    $classes = generateClasses([
        'inline-flex items-center justify-center space-x-10 text-zinc-600',
        'text-lg' => $size === 'lg',
        'text-sm' => $size === 'sm',
    ]);
@endphp
<nav {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</nav>
