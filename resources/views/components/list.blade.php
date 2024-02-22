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
                    <x-lui::list.heading>
                        {{ $heading }}
                    </x-lui::list.heading>

                    @if ($subheading)
                        <x-lui::list.subheading>
                            {{ $subheading }}
                        </x-lui::list.subheading>
                    @endif
                @endif
            </div>

            <x-lui::hr />
        </div>
    @endif

    <div class="divide-y px-4">
        {{ $slot }}
    </div>

    @if ($footer || $actions)
        <div class="px-2 pb-2 space-y-2">
            <x-lui::hr />

            <div class="px-4 py-2">
                @if ($footer)
                    {{ $footer }}
                @else
                    <x-lui::list.actions>
                        {{ $actions }}
                    </x-lui::list.actions>
                @endif
            </div>
        </div>
    @endif
</ul>
