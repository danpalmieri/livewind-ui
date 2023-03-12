@props([
    'ariaLabel' => 'Sidebar',
    'backgroundColor' => null,
    'header' => null,
    'iconMenu' => null,
    'menu' => null,
])

<div {{ $attributes->class([
    'flex h-full border-r',
    'bg-gray-100' => $backgroundColor !== 'light',
    'w-72' => ! $iconMenu,
    'bg-white' => $backgroundColor === 'light',
    'w-80' => $iconMenu,
]) }}>
    @if ($iconMenu)
        <nav class="flex flex-col items-center flex-shrink-0 w-12 py-2 space-y-2 border-r shadow-sm">
            {{ $iconMenu }}
        </nav>
    @endif

    <nav aria-label="{{ $ariaLabel }}" class="flex flex-col flex-1">
        @if ($header)
            <div class="flex items-center flex-shrink-0 h-16 px-4 border-b">
                {{ $header }}
            </div>
        @endif

        <div class="flex-1 overflow-y-auto">
            {{ $menu }}
        </div>
    </nav>
</div>