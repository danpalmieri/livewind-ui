@props([
    'color' => null,
    'detail' => null,
    'icon' => null,
    'tag' => 'button',
    'type' => 'button',
])

@php
    $buttonClasses = generateClasses([
        'flex items-center w-full hover:bg-gray-100 py-2 px-4 text-[13px] font-medium focus:outline-none group',
        'hover:bg-primary-600 focus:bg-primary-700' => $color === 'primary',
        'hover:bg-danger-600 focus:bg-danger-700' => $color === 'danger',
        'hover:bg-success-600 focus:bg-success-700' => $color === 'success',
        'hover:bg-warning-600 focus:bg-warning-700' => $color === 'warning',
    ]);

    $detailClasses = generateClasses([
        'ml-auto text-xs text-zinc-500',
        'group-hover:text-primary-100 group-focus:text-primary-100' => $color === 'primary',
        'group-hover:text-danger-100 group-focus:text-danger-100' => $color === 'danger',
        'group-hover:text-success-100 group-focus:text-success-100' => $color === 'success',
        'group-hover:text-warning-100 group-focus:text-warning-100' => $color === 'warning',
    ]);

    $iconClasses = generateClasses([
        'mr-2 -ml-1 w-[15px] h-[15px]',
        'text-primary-600' => $color === 'primary',
        'text-danger-500' => $color === 'danger',
        'text-success-500' => $color === 'success',
        'text-warning-500' => $color === 'warning',
    ]);
@endphp

<li {{ $attributes }}>
    @if ($tag === 'button')
        <button
            type="{{ $type }}"
            {{ $attributes->class([$buttonClasses]) }}
        >
            @if ($icon)
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            @endif

            <span>{{ $slot }}</span>

            @if ($detail)
                <span class="{{ $detailClasses }}">
                    {{ $detail }}
                </span>
            @endif
        </button>
    @elseif ($tag === 'a')
        <a {{ $attributes->class([$buttonClasses]) }}>
            @if ($icon)
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            @endif

            <span>{{ $slot }}</span>

            @if ($detail)
                <span class="{{ $detailClasses }}">
                    {{ $detail }}
                </span>
            @endif
        </a>
    @endif
</li>
