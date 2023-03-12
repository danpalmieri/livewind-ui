@props([
    'flat' => false,
])

<div {{ $attributes->class([
    'p-2 overflow-hidden rounded-xl',
    'bg-white shadow' => ! $flat,
    'border' => $flat,
]) }}>
    <ul class="-my-2 divide-y">
        {{ $slot }}
    </ul>
</div>