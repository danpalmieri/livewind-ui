@props([
    'ariaLabelledby' => null,
    'closeButtonLabel' => 'Close panel',
    'closeEventName' => 'close-slide-over',
    'closeIcon' => null,
    'displayClasses' => 'inline-block',
    'heading' => null,
    'id' => null,
    'open' => false,
    'openEventName' => 'open-slide-over',
    'trigger' => null,
    'width' => 'xl',
])

@php
    $closeIconClasses = 'w-5 h-5';
@endphp

<div
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    @if ($id)
        x-on:{{ $closeEventName }}.window="if ($event.detail.id === '{{ $id }}') open = false"
        x-on:{{ $openEventName }}.window="if ($event.detail.id === '{{ $id }}') open = true"
    @endif
    @if ($ariaLabelledby)
        aria-labelledby="{{ $ariaLabelledby }}"
    @elseif ($heading)
        aria-labelledby="{{ "{$id}.heading" }}"
    @endif
    role="dialog"
    aria-modal="true"
    class="{{ $displayClasses }}"
>
    {{ $trigger }}

    <div
        x-show="open"
        x-transition:enter="transition ease duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
        class="fixed inset-0 z-40 flex items-center h-screen"
    >
        <button
            x-on:click="open = false"
            type="button"
            aria-hidden="true"
            class="fixed inset-0 w-full h-full bg-black/50 focus:outline-none"
        ></button>

        <div
            x-show="open"
            x-transition:enter="transition ease duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-cloak
            {{ $attributes->class([
                'relative flex flex-col w-full h-screen ml-auto bg-white',
                'max-w-xs' => $width === 'xs',
                'max-w-sm' => $width === 'sm',
                'max-w-md' => $width === 'md',
                'max-w-lg' => $width === 'lg',
                'max-w-xl' => $width === 'xl',
                'max-w-2xl' => $width === '2xl',
                'max-w-3xl' => $width === '3xl',
                'max-w-4xl' => $width === '4xl',
                'max-w-5xl' => $width === '5xl',
                'max-w-6xl' => $width === '6xl',
                'max-w-7xl' => $width === '7xl',
            ]) }}
        >
            <div class="flex items-center justify-between flex-shrink-0 px-4 border-b h-14">
                @if ($heading)
                    <p id="{{ "{$id}.heading" }}" class="font-semibold tracking-tight">{{ $heading }}</p>
                @endif

                <button
                    x-on:click="open = false"
                    type="button"
                    class="flex items-center justify-center w-10 h-10 -mr-2 text-zinc-500 transition rounded-full focus:text-primary-600 hover:bg-zinc-500/5 focus:bg-primary-500/10 focus:outline-none"
                >
                    <x-lui::sr-only>{{ $closeButtonLabel }}</x-lui::sr-only>

                    @unless ($closeIcon)
                        <svg class="{{ $closeIconClasses }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L6.75 17.25"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75L17.25 17.25"/>
                        </svg>
                    @else
                        <x-dynamic-component :component="$closeIcon" :class="$closeIconClasses" />
                    @endunless
                </button>
            </div>

            <div class="flex-1 p-6 space-y-6 overflow-y-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
