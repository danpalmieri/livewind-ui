@props([
    'actions' => null,
    'closeEventName' => 'close-popover',
    'content' => null,
    'displayClasses' => 'inline-block',
    'heading' => null,
    'id' => null,
    'open' => false,
    'openEventName' => 'open-popover',
    'position' => 'below',
    'trigger' => null,
    'width' => 'lg',
])

<div
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    @if ($id)
        x-on:{{ $closeEventName }}.window="if ($event.detail.id === '{{ $id }}') open = false"
        x-on:{{ $openEventName }}.window="if ($event.detail.id === '{{ $id }}') open = true"
    @endif
    x-bind:aria-expanded="open"
    aria-haspopup="true"
    {{ $attributes->class(["relative {$displayClasses}"]) }}
>
    {{ $trigger }}

    <div
        x-show="open"
        x-on:click.away="open = false"
        x-transition:enter="transition ease duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        x-cloak
        role="menu"
        tabindex="-1"
        class="{{ generateClasses([
            'absolute left-0 z-10 w-screen mt-2 shadow-xl top-full rounded-xl',
            'max-w-lg' => $width === 'lg',
            'md:mt-0 md:left-full md:top-0 md:ml-2' => $position === 'right',
            'max-w-xs' => $width === 'xs',
            'max-w-sm' => $width === 'sm',
            'max-w-md' => $width === 'md',
            'max-w-xl' => $width === 'xl',
            'max-w-2xl' => $width === '2xl',
            'max-w-3xl' => $width === '3xl',
            'max-w-4xl' => $width === '4xl',
            'max-w-5xl' => $width === '5xl',
            'max-w-6xl' => $width === '6xl',
            'max-w-7xl' => $width === '7xl',
        ]) }}"
    >
        <div class="px-6 py-4 bg-white shadow rounded-xl space-y-4">
            <div class="space-y-1">
                @if ($heading)
                    <x-lui::popover.heading>{{ $heading }}</x-lui::popover.heading>
                @endif

                @if ($content)
                    <x-lui::popover.content>{{ $content }}</x-lui::popover.content>
                @endif

                {{ $slot }}
            </div>

            @if ($actions)
                {{ $actions }}
            @endif
        </div>
    </div>
</div>
