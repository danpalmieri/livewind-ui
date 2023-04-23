@props([
    'title' => null,
    'description' => null,
    'actions' => null
])

<div class="flex justify-between items-center">
    <div>
        <h3 class="text-xl font-semibold">{{ $title }}</h3>
        <p class="text-zinc-500">{{ $description }}</p>
    </div>

    {{ $slot }}
</div>
