@props([
    'tag' => 'a',
    'type' => 'button',
])

@php
    $buttonClasses = 'block transition rounded-full focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:outline-none';
@endphp

<li>
    @if ($tag === 'a')
        <a {{ $attributes->class([$buttonClasses]) }}>
            {{ $slot }}
        </a>
    @elseif ($tag === 'button')
        <button
            type="{{ $type }}"
            {{ $attributes->class([$buttonClasses]) }}
        >
            {{ $slot }}
        </button>
    @endif
</li>