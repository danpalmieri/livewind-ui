@props([
    'align' => 'left',
    'checkbox' => false,
])

<td {{ $attributes->class([
    'px-4',
    'text-left' => $align === 'left',
    'py-3' => ! $checkbox,
    'text-center' => $align === 'center',
    'text-right' => $align === 'right',
    'w-12' => $checkbox,
]) }}>
    {{ $slot }}
</td>