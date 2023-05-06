@props([
    'title' => null,
    'description' => null,
    'actions' => null,
])

<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="flex justify-between md:col-span-1">
        <div class="px-4 sm:px-0 pt-4">
            <h3 class="font-medium text-lg text-zinc-900">{{ $title }}</h3>
            <p class="mt-1 text-zinc-500">
                {{ $description }}
            </p>
        </div>
    </div>

    <x-lui::paper class="mt-5 overflow-hidden relative !p-0 md:col-span-2 md:mt-0">
        <div class="px-4 py-5 sm:p-6">
            {{ $slot }}
        </div>

        @isset($actions)
        <div class="flex items-center justify-end bg-zinc-50 px-4 py-3 text-right sm:px-6">
            {{ $actions }}
        </div>
        @endisset
    </x-lui::paper>
</div>
