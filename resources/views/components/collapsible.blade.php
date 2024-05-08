@props([
    'flat' => false,
])

<div {{ $attributes->class([
    'p-2 overflow-hidden rounded-xl',
    'bg-white shadow' => ! $flat,
    'border border-gray-200/60' => $flat,
]) }}>
    <ul class="-my-2 divide-y divide-gray-200/60">
        {{ $slot }}
    </ul>
</div>
