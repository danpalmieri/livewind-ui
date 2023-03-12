@props([
    'actions' => null,
    'footer' => null,
    'header' => null,
    'heading' => null,
    'image' => null,
    'imageAlt' => null,
    'subheading' => null,
])

@php
    $imageAlt ??= $heading;
@endphp

<div {{ $attributes->class(['p-2 space-y-2 bg-white shadow rounded-xl']) }}>
    @if ($header)
        <div class="px-4 py-2">
            {{ $header }}
        </div>
    @endif

    @if ($header && ($actions || $heading || $image || $slot->isNotEmpty() || $subheading))
        <x-app-ui::hr />
    @endif

    @if ($actions || $heading || $image || $slot->isNotEmpty() || $subheading)
        <div class="space-y-2">
            @if ($image)
                <figure class="relative aspect-w-16 aspect-h-9">
                    <div aria-hidden="true" class="absolute inset-0 bg-gray-200 animate-pulse rounded-lg"></div>

                    <img
                        class="absolute inset-0 object-cover rounded-lg"
                        src="{{ $image }}"
                        @if ($imageAlt) alt="{{ $imageAlt }}" @endif
                    />
                </figure>
            @endif

            @if ($heading || $subheading)
                <div class="p-4 space-y-1">
                    @if ($heading)
                        <x-app-ui::card.heading>
                            {{ $heading }}
                        </x-app-ui::card.heading>
                    @endif

                    @if ($subheading)
                        <x-app-ui::card.subheading>
                            {{ $subheading }}
                        </x-app-ui::card.subheading>
                    @endif
                </div>
            @endif

            @if ($slot->isNotEmpty())
                <div class="px-4 py-2 space-y-4">
                    {{ $slot }}
                </div>
            @endif

            {{ $actions }}
        </div>
    @endif

    @if ($footer && ($actions || $heading || $image || $slot->isNotEmpty() || $subheading))
        <x-app-ui::hr />
    @endif

    @if ($footer)
        <div class="px-4 py-2">
            {{ $footer }}
        </div>
    @endif
</div>