@props([
    'color' => 'primary',
    'icon' => null,
    'iconPosition' => 'before',
    'tag' => 'button',
    'type' => 'button',
    'size' => 'md',
    'loadingFeedback' => false,
    'loadingDisable' => false,
    'loadingText' => 'Salvando...',
    'eventLoadingFeedback' => null,
])

@php
    $id = random_int(1, 9999999);
    $buttonClasses = generateClasses([
        'inline-flex items-center justify-center font-medium tracking-tight transition rounded disabled:cursor-not-allowed disabled:opacity-50 focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset',
        'bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700' => $color === 'primary',
        'bg-zinc-800 hover:bg-zinc-700 focus:bg-zinc-600 focus:ring-offset-zinc-600' => $color === 'dark',
        'h-9 px-4' => $size === 'md',
        'text-white focus:ring-white' => $color !== 'secondary',
        'bg-danger-600 hover:bg-danger-500 focus:bg-danger-700 focus:ring-offset-danger-700' => $color === 'danger',
        'text-gray-800 bg-white border hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'secondary',
        'bg-success-600 hover:bg-success-500 focus:bg-success-700 focus:ring-offset-success-700' => $color === 'success',
        'bg-warning-600 hover:bg-warning-500 focus:bg-warning-700 focus:ring-offset-warning-700' => $color === 'warning',
        'h-8 px-3 text-sm' => $size === 'sm',
        'h-11 px-6 text-xl' => $size === 'lg',
    ]);

    $iconClasses = generateClasses([
        'w-[1.07rem] h-[1.07rem]' => $size === 'md',
        'w-5 h-5' => $size === 'lg',
        'w-4 h-4' => $size === 'sm',
        'mr-1.5 -ml-1' => ($iconPosition === 'before') && ($size === 'md') && ($loadingText !== 'icon'),
        'mr-2 -ml-2' => ($iconPosition === 'before') && ($size === 'lg') && ($loadingText !== 'icon'),
        'mr-1 -ml-0.5' => ($iconPosition === 'before') && ($size === 'sm') && ($loadingText !== 'icon'),
        'ml-1.5 -mr-1' => ($iconPosition === 'after') && ($size === 'md') && ($loadingText !== 'icon'),
        'ml-2 -mr-2' => ($iconPosition === 'after') && ($size === 'lg') && ($loadingText !== 'icon'),
        'ml-1 -mr-0.5' => ($iconPosition === 'after') && ($size === 'sm') && ($loadingText !== 'icon'),
    ]);
@endphp

@if($eventLoadingFeedback)
<script>
    document.addEventListener("DOMContentLoaded", () => {
        let button;

        Livewire.hook('message.sent', (message,component) => {
            if (message.updateQueue[0].payload.event === '{{ $eventLoadingFeedback }}') {
                document.getElementById('button_{{ $id }}').disabled = true;
                document.getElementById('button_icon_{{ $id }}').style.display = 'none';
                button = document.getElementById('button_text_{{ $id }}').innerHTML;
                document.getElementById('button_text_{{ $id }}').innerHTML = 'Aguarde...';
            }
        });

        Livewire.hook('message.processed', (message,component) => {
            if (message.updateQueue[0].payload.event === '{{ $eventLoadingFeedback }}') {
                document.getElementById('button_{{ $id }}').disabled = false;
                document.getElementById('button_icon_{{ $id }}').style.display = 'inline-block';
                document.getElementById('button_text_{{ $id }}').innerHTML = button;
            }
        });
    });
</script>
@endif

<{{ $tag }}
    id="button_{{ $id }}"
    type="{{ $type }}"
    @if($loadingDisable) wire:loading.attr="disabled" @endif
    {{ $attributes->class([$buttonClasses]) }}
>
    @if ($icon && $iconPosition === 'before')
        @if($loadingFeedback)
        <x-dynamic-component id="button_icon_{{ $id }}" wire:loading.remove :component="$icon" :class="$iconClasses" />
        <svg xmlns="http://www.w3.org/2000/svg" wire:loading width="16" height="16" fill="currentColor" class="{{ $iconClasses }} animate-spin" viewBox="0 0 16 16">
            <path d="M15.6,5.6l-0.9,0.6C14.9,6.8,15,7.4,15,8c0,3.9-3.1,7-7,7s-7-3.1-7-7c0-3.9,3.1-7,7-7c0.8,0,1.5,0.1,2.2,0.4l0.5-0.9
            C9.8,0.2,8.9,0,8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8C16,7.2,15.9,6.4,15.6,5.6z"/>
            </svg>
        @else
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif
    @endif

    <span>
        @if($loadingFeedback)
        <span wire:loading.remove>{{ $slot }}</span>

        @if($loadingText === 'icon')
        <svg xmlns="http://www.w3.org/2000/svg" wire:loading width="16" height="16" fill="currentColor" class="{{ $iconClasses }} animate-spin" viewBox="0 0 16 16">
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

    @if ($icon && $iconPosition === 'after')
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endif
</{{ $tag }}>
