@props([
    'ready' => false,
])

<div wire:init="init">
    @if($ready)
    {{ $slot }}
    @else
    <x-lui::loading inline />
    @endif
</div>
