@props([
    'ariaLabel' => 'Sidebar',
    'backgroundColor' => 'light',
    'header' => null,
    'iconMenu' => null,
    'menu' => null,
    'size' => '275px',
])

<div {{ $attributes->class([
    'flex h-full border-r',
    'bg-black' => $backgroundColor === 'dark',
    'w-['.$size.']' => ! $iconMenu,
    'bg-gray-50' => $backgroundColor === 'light',
    'w-80' => $iconMenu,
]) }}>
    @if ($iconMenu)
        <nav class="flex flex-col items-center flex-shrink-0 w-12 py-2 space-y-2 border-r shadow-sm">
            {{ $iconMenu }}
        </nav>
    @endif

    <nav aria-label="{{ $ariaLabel }}" class="flex flex-col flex-1">
        @if ($header)
            <div class="flex items-center flex-shrink-0">
                {{ $header }}
            </div>
        @endif

        <div class="flex-1 divide-y divide-white/20 overflow-y-auto pb-2">
            {{ $menu }}
        </div>

        @if($footer)
        <footer class="divide-y divide-white/20">
            {{ $footer }}
        </footer>
        @endif
    </nav>
</div>
