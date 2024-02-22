@props([
    'legend' => null,
])

<fieldset {{ $attributes->class(['space-y-6']) }}>
    @if ($legend)
        <legend class="text-lg font-semibold tracking-tight">{{ $legend }}</legend>
    @endif

    {{ $slot }}
</fieldset>