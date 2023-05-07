<div wire:init="init">
    @if($ready)
    <div wire:key="ready-section">
        {{ $slot }}
    </div>
    @else
    <x-lui::loading inline />
    @endif
</div>
