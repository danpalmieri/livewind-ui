@props([
    'actions' => null,
    'card' => false,
    'description' => null,
    'header' => null,
    'heading' => null,
    'width' => 'xl',
])

@unless ($card)
    <form {{ $attributes->class([
        'space-y-6',
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
        {{ $header }}

        @if ($heading)
            <div class="space-y-1">
                <x-app-ui::form.heading>{{ $heading }}</x-app-ui::form.heading>

                <x-app-ui::form.description>{{ $description }}</x-app-ui::form.description>
            </div>
        @endif

        <div class="space-y-6">
            {{ $slot }}
        </div>

        @if ($actions)
            <div class="space-x-4">
                {{ $actions }}
            </div>
        @endif
    </form>
@else
    <form {{ $attributes->class(['grid md:grid-cols-[2fr,3fr] gap-6 md:gap-12']) }}>
        <div>
            {{ $header }}

            @if ($heading)
                <div class="space-y-1">
                    <x-app-ui::form.heading>{{ $heading }}</x-app-ui::form.heading>

                    <x-app-ui::form.description>{{ $description }}</x-app-ui::form.description>
                </div>
            @endif
        </div>

        <div class="p-2 space-y-2 bg-white shadow rounded-xl">
            <div class="p-4 space-y-4">
                {{ $slot }}
            </div>

            @if ($actions)
                <x-app-ui::hr />

                <div class="px-4 py-2">
                    <x-app-ui::card.actions>
                        {{ $actions }}
                    </x-app-ui::card.actions>
                </div>
            @endif
        </div>
    </form>
@endif