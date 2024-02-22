@props([
    'icon' => null,
])

@php
    $iconClasses = 'text-zinc-400 w-5 h-5';
@endphp

<li {{ $attributes }}>
    @unless ($icon)
        <svg class="{{ $iconClasses }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.75 8.75L14.25 12L10.75 15.25"/>
        </svg>
    @else
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endunless
</li>
