@props([
    'icon' => null,
])

<div {{ $attributes->class(['lg:hidden mr-2 -ml-2']) }}>
    <x-app-ui::icon-button x-on:click="open = true" label="Open menu" :icon="$icon" />
</div>