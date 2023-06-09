@props([
    'actions' => null,
    'breadcrumbs' => null,
    'backgroundColor' => null,
    'description' => null,
    'heading' => null,
])

<div {{ $attributes->class([
    'bg-zinc-100' => $backgroundColor !== 'light',
    'bg-white' => $backgroundColor === 'light',
]) }}>
    <div class="w-full max-w-6xl space-y-6 px-4 py-8 mx-auto sm:px-6 md:px-8">
        @if ($actions || $heading)
            <div class="grid gap-4 md:gap-6 md:grid-cols-2">
                <div class="space-y-1">
                    @if ($breadcrumbs)
                        <div class="-mt-2">
                            {{ $breadcrumbs }}
                        </div>
                    @endif

                    @if ($heading)
                        <x-lui::section.heading>{{ $heading }}</x-lui::section.heading>
                    @endif

                    @if ($description)
                        <x-lui::section.description>{{ $description }}</x-lui::section.description>
                    @endif
                </div>

                @if ($actions)
                    <div class="flex items-center space-x-4 md:justify-self-end">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        @endif

        @if ($slot->isNotEmpty())
            <div class="space-y-8">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
