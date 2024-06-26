@props([
    'id' => random_int(1, 9999999),
    'color' => 'primary',
    'icon' => null,
    'tag' => 'button',
    'type' => 'button',
    'size' => 'md',
    'loadingFeedback' => false,
    'loadingDisable' => false,
    'loadingText' => 'Salvando...',
    'eventLoadingFeedback' => null,
])

@php
    $buttonClasses = generateClasses([
        'inline-flex font-medium items-center justify-center tracking-tight transition rounded disabled:cursor-not-allowed disabled:opacity-50 focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset',
        'bg-primary-700 hover:bg-primary-800 font-medium focus:bg-primary-700 focus:ring-offset-primary-700' => $color === 'primary',
        'bg-zinc-800 hover:bg-zinc-700 focus:bg-zinc-600 focus:ring-offset-zinc-600' => $color === 'dark',
        'text-white focus:ring-white' => $color !== 'secondary' && $color !== 'tertiary',
        'bg-danger-600 hover:bg-danger-500 focus:bg-danger-700 focus:ring-offset-danger-700' => $color === 'danger',
        'text-black bg-white border border-black/[0.15] hover:bg-zinc-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'secondary',
        'text-black bg-zinc-100 hover:bg-zinc-200/80 border border-white focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'tertiary',
        '!text-primary-900/80 bg-primary-200/40 hover:bg-primary-200/60 border border-white focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'tertiary2',
        'bg-success-600 hover:bg-success-500 focus:bg-success-700 focus:ring-offset-success-700' => $color === 'success',
        'bg-warning-600 hover:bg-warning-500 focus:bg-warning-700 focus:ring-offset-warning-700' => $color === 'warning',
        'h-8 px-4' => $size === 'md',
        'h-7 px-2 text-[13px]' => $size === 'xs',
        'h-[30px] px-3 text-sm' => $size === 'sm',
        'h-11 px-6 text-xl' => $size === 'lg',
    ]);

    $iconClasses = generateClasses([
        'mr-1.5 -ml-1 w-[1.07rem] h-[1.07rem]' => $size === 'md',
        'mr-2 -ml-2 w-5 h-5' => $size === 'lg',
        'mr-1.5 -ml-0.5 w-4 h-4' => $size === 'sm',
        'mr-1 -ml-0.5 w-3 h-3' => $size === 'xs',
    ]);

    $loadingIconClasses = generateClasses([
        'w-[1.07rem] h-[1.07rem]' => $size === 'md',
        'w-5 h-5' => $size === 'lg',
        'w-4 h-4' => $size === 'sm',
        'w-4 h-4' => $size === 'xs',
    ]);
@endphp

<{{ $tag }}
    x-data
    id="button_{{ $id }}"
    type="{{ $type }}"
    @if($loadingDisable) wire:loading.attr="disabled" @endif
    @if($eventLoadingFeedback) x-on:click="$dispatch('button-loading-event', {{ json_encode(['id' => $id, 'event' => $eventLoadingFeedback, 'icon' => $icon]) }})" @endif
    {{ $attributes->class([$buttonClasses]) }}
>
    @if ($icon)
        @if($loadingFeedback)
        <x-dynamic-component id="button_icon_{{ $id }}" wire:loading.remove :component="$icon" :class="$iconClasses" />

        @if($loadingText !== 'icon')
        <svg xmlns="http://www.w3.org/2000/svg" wire:loading width="16" height="16" fill="currentColor" class="{{ $iconClasses }} animate-spin" viewBox="0 0 16 16">
            <path d="M15.6,5.6l-0.9,0.6C14.9,6.8,15,7.4,15,8c0,3.9-3.1,7-7,7s-7-3.1-7-7c0-3.9,3.1-7,7-7c0.8,0,1.5,0.1,2.2,0.4l0.5-0.9
            C9.8,0.2,8.9,0,8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8C16,7.2,15.9,6.4,15.6,5.6z"/>
        </svg>
        @endif

        @else
        <x-dynamic-component id="button_icon_{{ $id }}" :component="$icon" :class="$iconClasses" />
        @endif
    @endif

    <span>
        @if($loadingFeedback)
        <span wire:loading.remove>{{ $slot }}</span>

        @if($loadingText === 'icon')
        <svg xmlns="http://www.w3.org/2000/svg" wire:loading width="16" height="16" fill="currentColor" class="{{ $loadingIconClasses }} animate-spin" viewBox="0 0 16 16">
            <path d="M15.6,5.6l-0.9,0.6C14.9,6.8,15,7.4,15,8c0,3.9-3.1,7-7,7s-7-3.1-7-7c0-3.9,3.1-7,7-7c0.8,0,1.5,0.1,2.2,0.4l0.5-0.9
            C9.8,0.2,8.9,0,8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8C16,7.2,15.9,6.4,15.6,5.6z"/>
        </svg>
        @else
        <span wire:loading>{{ $loadingText }}</span>
        @endif

        @else
        <span id="button_text_{{ $id }}">{{ $slot }}</span>
        @endif
    </span>
</{{ $tag }}>
