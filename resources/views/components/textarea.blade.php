@props([
    'errorText' => null,
    'helperText' => null,
    'id' => null,
    'label' => null,
    'name' => null,
])

@php
    $id ??= $name;
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
        <textarea
            @if ($id) id="{{ $id }}" @endif
            @if ($name) name="{{ $name }}" @endif
            {{ $attributes->class([
                'block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-600',
                'border-gray-300' => (! $errorText) && (! $name || ! $errors->has($name)),
                'border-danger-600 ring-danger-600' => $errorText || ($name && $errors->has($name)),
            ]) }}
        >{{ $slot }}</textarea>
    </div>

    @if ($errorText || ($name && $errors->has($name)))
        <p class="text-sm text-danger-600">{{ $name && $errors->has($name) ? $errors->first($name) : $errorText }}</p>
    @endif

    @if ($helperText)
        <p class="text-sm text-gray-600">{{ $helperText }}</p>
    @endif
</div>