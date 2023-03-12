@props([
    'legend' => null,
])

<fieldset {{ $attributes->class(['space-y-4']) }}>
    @if ($legend)
        <legend class="text-lg font-semibold tracking-tight">{{ $legend }}</legend>
    @endif

    {{ $slot }}
</fieldset>