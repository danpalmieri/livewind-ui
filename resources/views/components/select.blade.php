@props([
    'errorText' => null,
    'helperText' => null,
    'icon' => null,
    'id' => null,
    'label' => null,
    'name' => null,
])

@php
    $id ??= $name;

    $iconClasses = 'w-7 h-7';
@endphp

<div class="space-y-2">
    @if ($label)
        <label
            @if ($id) for="{{ $id }}" @endif
            class="{{ generateClasses([
                'inline-block text-sm font-medium leading-4',
                'text-gray-700' => (! $errorText) && (! $name || ! $errors->has($name)),
                'text-danger-700' => $errorText || ($name && $errors->has($name)),
            ]) }}"
        >
            {{ $label }}
        </label>
    @endif

    <div class="relative group">
        <select
            @if ($id) id="{{ $id }}" @endif
            @if ($name) name="{{ $name }}" @endif
            {{ $attributes->class([
                'block w-full h-10 pr-10 transition duration-75 bg-none rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600',
                'border-gray-300' => (! $errorText) && (! $name || ! $errors->has($name)),
                'border-danger-600 ring-danger-600' => $errorText || ($name && $errors->has($name)),
            ]) }}
        >
            {{ $slot }}
        </select>

        <span class="{{ generateClasses([
            'absolute inset-y-0 right-0 flex items-center justify-center w-10 h-10 transition pointer-events-none group-focus-within:text-primary-500',
            'text-gray-400' => (! $errorText) && (! $name || ! $errors->has($name)),
            'text-danger-400' => $errorText || ($name && $errors->has($name)),
        ]) }}">
            @unless ($icon)
                <svg class="{{ $iconClasses }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.25 10.75L12 14.25L8.75 10.75"/>
                </svg>
            @else
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            @endunless
        </span>
    </div>

    @if ($errorText || ($name && $errors->has($name)))
        <p class="text-sm text-danger-600">{{ $name && $errors->has($name) ? $errors->first($name) : $errorText }}</p>
    @endif

    @if ($helperText)
        <p class="text-sm text-gray-600">{{ $helperText }}</p>
    @endif
</div>