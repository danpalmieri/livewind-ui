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

<div class="flex space-x-4">
    <input
        @if ($id) id="{{ $id }}" @endif
        @if ($name) name="{{ $name }}" @endif
        type="checkbox"
        {{ $attributes->class([
            'transition duration-75 rounded shadow-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-500',
            'border-gray-300' => (! $errorText) && (! $name || ! $errors->has($name)),
            'border-danger-300 ring-danger-500' => $errorText || ($name && $errors->has($name)),
        ]) }}
    />

    @if ($errorText || ($name && $errors->has($name)) || $label || $helperText)
        <div class="flex flex-col space-y-1">
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

            @if ($errorText || ($name && $errors->has($name)))
                <p class="text-sm text-danger-600">{{ $name && $errors->has($name) ? $errors->first($name) : $errorText }}</p>
            @endif

            @if ($helperText)
                <p class="text-sm text-gray-600">{{ $helperText }}</p>
            @endif
        </div>
    @endif
</div>