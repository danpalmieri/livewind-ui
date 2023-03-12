@props([
    'align' => 'left',
    'checkbox' => false,
])

<th {{ $attributes->class([
    'px-4',
    'text-left' => $align === 'left',
    'py-2 text-sm font-semibold text-gray-600' => ! $checkbox,
    'text-center' => $align === 'center',
    'text-right' => $align === 'right',
    'w-12' => $checkbox,
]) }}>
    {{ $slot }}
</th>