@props([
    'errorText' => null,
    'helperText' => null,
    'icon' => null,
    'iconPosition' => 'before',
    'id' => null,
    'label' => null,
    'name' => null,
    'type' => 'text',
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
        @if ($icon && $iconPosition === 'before')
            <span class="{{ generateClasses([
                'absolute inset-y-0 left-0 flex items-center justify-center w-10 h-10 transition pointer-events-none group-focus-within:text-primary-500',
                'text-gray-400' => (! $errorText) && (! $name || ! $errors->has($name)),
                'text-danger-400' => $errorText || ($name && $errors->has($name)),
            ]) }}">
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            </span>
        @endif

        <input
            @if ($id) id="{{ $id }}" @endif
            @if ($name) name="{{ $name }}" @endif
            @if ($type) type="{{ $type }}" @endif
            {{ $attributes->class([
                'block w-full h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600',
                'border-gray-300' => (! $errorText) && (! $name || ! $errors->has($name)),
                'border-danger-600 ring-danger-600' => $errorText || ($name && $errors->has($name)),
                'pl-10' => $icon && ($iconPosition === 'before'),
                'pr-10' => $icon && ($iconPosition === 'after'),
            ]) }}
        />

        @if ($icon && $iconPosition === 'after')
            <span class="{{ generateClasses([
                'absolute inset-y-0 right-0 flex items-center justify-center w-10 h-10 transition pointer-events-none group-focus-within:text-primary-500',
                'text-gray-400' => (! $errorText) && (! $name || ! $errors->has($name)),
                'text-danger-400' => $errorText || ($name && $errors->has($name)),
            ]) }}">
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            </span>
        @endif
    </div>

    @if ($errorText || ($name && $errors->has($name)))
        <p class="text-sm text-danger-600">{{ $name && $errors->has($name) ? $errors->first($name) : $errorText }}</p>
    @endif

    @if ($helperText)
        <p class="text-sm text-gray-600">{{ $helperText }}</p>
    @endif
</div>