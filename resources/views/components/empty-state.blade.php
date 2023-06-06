@props([
    'actions' => null,
    'description' => null,
    'footer' => null,
    'flat' => false,
    'icon' => null,
    'illustration' => null,
    'heading' => null,
    'width' => 'md',
])

<div {{ $attributes->class([
    'flex flex-col items-center justify-center p-6 space-y-6 text-center rounded-2xl',
    'bg-white shadow' => ! $flat,
    'bg-white' => $flat,
    'max-w-xs' => $width === 'xs',
    'max-w-sm' => $width === 'sm',
    'max-w-md' => $width === 'md',
    'max-w-lg' => $width === 'lg',
    'max-w-xl' => $width === 'xl',
    'max-w-2xl' => $width === '2xl',
    'max-w-3xl' => $width === '3xl',
    'max-w-4xl' => $width === '4xl',
    'max-w-5xl' => $width === '5xl',
    'max-w-6xl' => $width === '6xl',
    'max-w-7xl' => $width === '7xl',
]) }}>

    @if ($illustration)
        <div class="flex items-center justify-center h-[200px]">
            <img src="{{ $illustration }}" alt="" class="w-full h-full object-contain" />
        </div>
    @endif

    @if ($icon)
        <div class="{{ generateClasses([
            'flex items-center justify-center w-16 h-16 text-primary-600 rounded-full',
            'bg-primary-50' => ! $flat,
            'bg-white shadow' => $flat,
        ]) }}">
            <x-dynamic-component :component="$icon" class="w-8 h-8" />
        </div>
    @endif

    <div class="max-w-xs space-y-1">
        <h2 class="text-xl font-semibold tracking-tight">{{ $heading }}</h2>

        @if ($description)
            <p class="text-sm font-medium text-zinc-500">
                {{ $description }}
            </p>
        @endif

        {{ $slot }}
    </div>

    @if ($actions)
        <div class="flex items-center space-x-4 justify-center">
            {{ $actions }}
        </div>
    @endif

    @if ('footer')
        <div class="flex mt-4 items-center space-x-1 justify-center text-sm">
            {{ $footer }}
        </div>
    @endif
</div>
