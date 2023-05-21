@props([
    'active' => false,
    'color' => null,
    'flat' => false,
])

<li>
    <a {{ $attributes->class([
        'cursor-pointer transition focus:outline-none focus:underline',
        'focus:text-zinc-800' => ! $active,
        'p-2 rounded-lg' => $active && (! $flat),
        'hover:underline' => ! $active || $flat,
        'text-zinc-800' => $active && ($color !== 'primary'),
        'bg-zinc-500/5' => $active && ($color !== 'primary') && (! $flat),
        'text-primary-600' => $active && ($color === 'primary'),
        'bg-primary-500/10' => $active && ($color === 'primary') && (! $flat),
    ]) }}>
        {{ $slot }}
    </a>
</li>
