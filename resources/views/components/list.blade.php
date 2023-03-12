@props([
    'actions' => null,
    'footer' => null,
    'header' => null,
    'heading' => null,
    'subheading' => null,
])

<ul {{ $attributes->class(['bg-white shadow rounded-xl']) }}>
    @if ($header || $heading)
        <div class="px-2 pt-2 space-y-2">
            <div class="px-4 py-2">
                @if ($header)
                    {{ $header }}
                @else
                    <x-app-ui::list.heading>
                        {{ $heading }}
                    </x-app-ui::list.heading>

                    @if ($subheading)
                        <x-app-ui::list.subheading>
                            {{ $subheading }}
                        </x-app-ui::list.subheading>
                    @endif
                @endif
            </div>

            <x-app-ui::hr />
        </div>
    @endif

    <div class="divide-y px-4">
        {{ $slot }}
    </div>

    @if ($footer || $actions)
        <div class="px-2 pb-2 space-y-2">
            <x-app-ui::hr />

            <div class="px-4 py-2">
                @if ($footer)
                    {{ $footer }}
                @else
                    <x-app-ui::list.actions>
                        {{ $actions }}
                    </x-app-ui::list.actions>
                @endif
            </div>
        </div>
    @endif
</ul>