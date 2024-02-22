@props([
    'heading' => null,
    'action' => null,
    'actionLabel' => null,
])

<nav x-data="{open: true}" {{ $attributes->class(['py-2 space-y-1']) }}>
    @if ($heading)
        <div class="flex px-2 justify-between">
            <button class="px-1.5 py-1 rounded hover:bg-gray-100 flex text-xs space-x-1 text-gray-500 font-medium" @click="open = !open" >
                <span class="w-3 h-3 inline-block">
                    <x-icon name="bi-chevron-down" class="w-3 h-3 inline-block" x-show="open" />
                    <x-icon name="bi-chevron-right" class="w-3 h-3 inline-block" x-show="!open" />
                </span>
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
