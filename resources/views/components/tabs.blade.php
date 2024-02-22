@props([
    'size' => 'lg',
])
@php
    $classes = generateClasses([
        'inline-flex items-center justify-center space-x-9',
        'text-lg' => $size === 'lg',
        'text-base' => $size === 'md',
        'text-sm' => $size === 'sm',
    ]);
@endphp
<div class="border-b-2 border-zinc-300/80 pb-1.5 w-full">
    <nav {{ $attributes->class([$classes]) }}>
    {{ $slot }}
    </nav>
</div>
