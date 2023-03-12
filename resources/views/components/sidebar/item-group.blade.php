@props([
    'heading' => null,
])

<nav {{ $attributes->class(['my-4 space-y-2']) }}>
    @if ($heading)
        <p class="px-4 text-lg font-semibold">{{ $heading }}</p>
    @endif

    <ul class="px-2 space-y-1">
        {{ $slot }}
    </ul>
</nav>