@props([
    'title' => null,
    'titleBadge' => null,
    'description' => null,
    'image' => null,
    'actions' => null,
    'breadcrumbs' => null,
    'tabs' => null,
    'divider' => false,
])

<div>
    @isset($breadcrumbs)
        {{ $breadcrumbs }}
    @endisset

    <div class="flex items-center justify-between">
        <div class="page-title flex flex-1 items-center space-x-7 !text-2xl">

            @isset($image)
                <img src="{{ $image }}" alt="{{ $title }}" class="w-20 h-20 rounded">
            @endisset

            <div>
                <div class="flex items-center space-x-5">
                    <h2 class="font-semibold text-4xl leading-tight">{{ $title }}</h2>

                    @isset($titleBadge)
                        <x-lui::badge class="mt-1" size="lg">{{ $titleBadge }}</x-lui::badge>
                    @endisset
                </div>

                @isset($description)
                    <div class="mt-1 text-lg text-zinc-700">{{ $description }}</div>
                @endisset
            </div>

        </div>

        @isset($actions)
            <div class="flex items-center space-x-2">
                {{ $actions }}
            </div>
        @endisset
    </div>

    @isset($tabs)
        <div class="__pb-3 __border-b border-zinc-200 my-6">
            {{ $tabs }}
        </div>
    @endisset

    @if($divider)
        <div class="border-b mb-8 mt-5"></div>
    @endif
</div>
