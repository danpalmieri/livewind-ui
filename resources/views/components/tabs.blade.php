@props([
    'size' => 'lg',
])
@php
    $classes = generateClasses([
        'inline-flex items-center justify-center',
        'text-lg' => $size === 'lg',
        'text-base' => $size === 'md',
        'text-sm' => $size === 'sm',
    ]);
@endphp
<div class="border-b pb-1.5 w-full">
    <nav {{ $attributes->class([$classes]) }}>
    {{ $slot }}
    </nav>
</div>
