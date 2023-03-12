@props([
    'active' => false,
    'disabled' => false,
    'icon' => false,
    'label' => null,
    'separator' => false,
    'tag' => 'button',
    'type' => 'button',
])

@php
    if ($separator) {
        $label ??= '...';
    }

    $buttonClasses = generateClasses([
        'relative flex items-center justify-center font-medium min-w-[2rem] px-1.5 h-8 -my-3 rounded-md focus:outline-none',
        'hover:bg-gray-500/5 focus:bg-primary-500/10 focus:ring-2 focus:ring-primary-500' => (! $active) && (! $disabled) && (! $separator),
        'focus:text-primary-600' => (! $active) && (! $disabled) && (! $icon) && (! $separator),
        'transition' => ((! $active) && (! $disabled) && (! $separator)) || $active,
        'text-primary-600' => ((! $active) && (! $disabled) && $icon && (! $separator)) || $active,
        'z-10 focus:underline bg-primary-500/10 ring-2 ring-primary-500' => $active,
        'cursor-not-allowed opacity-75' => $disabled,
        'cursor-default' => $separator,
    ]);

    $iconClasses = 'h-7 w-7';
@endphp

<li>
    @if ($tag === 'button')
        <button
            @if ($disabled || $separator) disabled @endif
            type="{{ $type }}"
            {{ $attributes->class([$buttonClasses]) }}
        >
            @if ($icon)
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            @endif

            <span>{{ $label }}</span>
        </button>
    @elseif ($tag === 'a')
        <a {{ $attributes->class([$buttonClasses]) }}>
            @if ($icon)
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            @endif

            <span>{{ $label }}</span>
        </a>
    @endif
</li>