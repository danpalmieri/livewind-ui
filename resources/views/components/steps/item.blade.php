@props([
    'active' => false,
    'completed' => false,
    'completedIcon' => null,
    'label' => null,
    'tag' => 'button',
    'type' => 'button',
])

@php
    $buttonClasses = generateClasses([
        'relative block w-full text-left px-6 py-3 rounded-xl focus:outline-none',
        'bg-gray-50' => (! $active) && (! $completed),
        'text-primary-600 bg-primary-50 ring-2 ring-primary-500 ring-inset' => $active,
        'text-white bg-primary-600' => (! $active) && $completed,
    ]);

    $completedIconClasses = 'absolute top-0 right-0 m-2 w-7 h-7';

    $labelClasses = generateClasses([
        'text-xs font-medium',
        'text-gray-500' => (! $active) && (! $completed),
        'text-primary-200' => (! $active) && $completed,
    ]);

    $nameClasses = 'text-xl font-semibold tracking-tight';
@endphp

<li>
    @if ($tag === 'button')
        <button
            type="{{ $type }}"
            {{ $attributes->class([$buttonClasses]) }}
        >
            @if ($label)
                <p class="{{ $labelClasses }}">{{ $label }}</p>
            @endif

            <p class="{{ $nameClasses }}">{{ $slot }}</p>

            @if ($completed && $completedIcon)
                <x-dynamic-component :component="$completedIcon" :class="$completedIconClasses" />
            @endif
        </button>
    @elseif ($tag === 'a')
        <a {{ $attributes->class([$buttonClasses]) }}>
            @if ($label)
                <p class="{{ $labelClasses }}">{{ $label }}</p>
            @endif

            <p class="{{ $nameClasses }}">{{ $slot }}</p>

            @if ($completed && $completedIcon)
                <x-dynamic-component :component="$completedIcon" :class="$completedIconClasses" />
            @endif
        </a>
    @endif
</li>