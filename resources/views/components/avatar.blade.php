@props([
    'alt' => null,
    'size' => 'md',
    'src' => null,
    'stacked' => false,
    'status' => null,
])

<div {{ $attributes->class([
    'relative rounded-full',
    'w-10 h-10' => $size === 'md',
    'ring-2 ring-white' => $stacked,
    'w-8 h-8' => $size === 'sm',
    'w-12 h-12' => $size === 'lg',
]) }}>
    <div aria-hidden="true" class="absolute inset-0 bg-gray-200 rounded-full animate-pulse"></div>

    @if ($src)
        <img
            src="{{ $src }}"
            @if ($alt) alt="{{ $alt }}" @endif
            class="absolute inset-0 object-cover rounded-full"
        />
    @endif

    @if ($status)
        <div aria-hidden="true" class="{{ generateClasses([
            'absolute bottom-0 right-0 w-2.5 h-2.5 rounded-full ring-2 ring-white',
            'bg-gray-300' => $status === 'gray',
            'bg-green-500' => $status === 'green',
            'bg-red-500' => $status === 'red',
            'bg-yellow-500' => $status === 'yellow',
        ]) }}"></div>
    @endif
</div>