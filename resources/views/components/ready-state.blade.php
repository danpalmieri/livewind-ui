<div wire:init="init">
    @if($ready)
    <div>
        {{ $slot }}
    </div>
    @else
    <x-lui::loading inline />
    @endif
</div>
