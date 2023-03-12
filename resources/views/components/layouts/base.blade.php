@props([
    'backgroundColor' => null,
    'paddingY' => false,
])

<main {{ $attributes->class([
    'antialiased min-h-screen w-screen',
    'bg-gray-100' => ! $backgroundColor,
    'bg-white' => $backgroundColor === 'light',
    'py-4' => $paddingY,
]) }}>
    {{ $slot }}
</main>