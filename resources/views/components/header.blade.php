@props([
    'actions' => null,
    'backgroundColor' => null,
    'breadcrumbs' => null,
    'heading' => null,
    'meta' => null,
    'subheading' => null,
    'tabs' => null,
])

<header {{ $attributes->class([
    'bg-gray-100' => $backgroundColor !== 'light',
    'bg-white' => $backgroundColor === 'light',
]) }}>
    <div class="w-full max-w-6xl px-4 mx-auto sm:px-6 md:px-8">
        <div class="grid gap-6 py-8 md:grid-cols-2">
            <div class="space-y-6">
                <div class="space-y-1">
                    @if ($breadcrumbs)
                        <div class="-mt-2">
                            {{ $breadcrumbs }}
                        </div>
                    @endif

                    <div class="space-y-2">
                        @php
                            $headingTag = $heading->attributes->get('tag', 'h1');
                        @endphp

                        <{{ $headingTag }} class="text-2xl font-semibold tracking-tight md:text-3xl">
                            {{ $heading }}
                        </{{ $headingTag }}>

                        @if ($subheading)
                            @php
                                $subheadingTag = $subheading->attributes->get('tag', 'h2');
                            @endphp

                            <{{ $subheadingTag }} class="text-gray-500">
                                {{ $subheading }}
                            </{{ $subheadingTag }}>
                        @endif
                    </div>
                </div>

                @if ($meta)
                    <div class="flex space-x-8">
                        {{ $meta }}
                    </div>
                @endif
            </div>

            @if ($actions)
                <div class="flex items-center space-x-4 md:justify-self-end">
                    {{ $actions }}
                </div>
            @endif
        </div>

        @if ($tabs)
            <div class="flex items-center justify-center pb-2">
                <div class="w-auto mx-auto overflow-x-auto rounded-xl sm:inline-block">
                    {{ $tabs }}
                </div>
            </div>
        @endif
    </div>
</header>