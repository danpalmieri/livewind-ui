@props([
    'align' => 'left',
])

<div {{ $attributes->class([
    'flex flex-1 items-center',
    'md:justify-center' => $align === 'center',
    'md:justify-end md:text-right' => $align === 'right',
 ]) }}>
    <div>
        {{ $slot }}
    </div>
</div>