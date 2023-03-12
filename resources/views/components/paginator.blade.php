@props([
    'align' => 'center',
    'flat' => false,
])

<div {{ $attributes->class([
    'flex items-center',
    'justify-center' => $align === 'center',
    'justify-end' => $align === 'right',
]) }}>
    <nav class="{{ generateClasses([
        'py-3 border rounded-lg',
        'bg-white' => ! $flat,
        'border-gray-300' => $flat,
    ]) }}">
        <ol class="flex items-center text-sm text-gray-500 divide-x divide-gray-300">
            {{ $slot }}
        </ol>
    </nav>
</div>