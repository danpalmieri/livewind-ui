@props([
    'heading' => null,
    'action' => null,
    'actionLabel' => null,
    'collapsible' => true
])

<nav x-data="{open: true}" {{ $attributes->class(['py-2 space-y-1']) }}>
    @if ($heading)
        <div class="flex px-2 justify-between">
            <button class="px-1.5 py-1 rounded @if($collapsible) hover:bg-gray-100 @else cursor-default @endif flex text-xs space-x-1 text-gray-500 font-medium" @if($collapsible) @click="open = !open" @endif>
                @if($collapsible)
                <span class="w-3 h-3 inline-block">
                    <x-icon name="bi-chevron-down" class="w-3 h-3 inline-block" x-show="open" />
                    <x-icon name="bi-chevron-right" class="w-3 h-3 inline-block" x-show="!open" />
                </span>
                @endif
                <span>{{ $heading }}</span>
            </button>
            @if($action)
            <button wire:click="{{ $action }}" class="px-0.5 text-gray-500 rounded hover:bg-gray-100">
                <x-icon name="bi-plus" class="w-5 h-5" />
            </button>
            @endif
        </div>
    @endif

    <ul class="px-2" x-show="open" x-transition.fade.origin.top>
        {{ $slot }}
    </ul>
</nav>
