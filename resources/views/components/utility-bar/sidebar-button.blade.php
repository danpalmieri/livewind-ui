@props([
    'icon' => null,
    'alwaysVisible' => false
])

<div {{ $attributes->class([($alwaysVisible ? '' : 'lg:hidden').' ']) }}>
    <x-lui::icon-button x-on:click="open = !open" label="Open menu" :icon="$icon" />
</div>
