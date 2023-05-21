@props([
    'title' => null,
    'description' => null,
    'divider' => false,
    'actions' => null
])

<div class="flex justify-between items-center">
    <div>
        <h3 class="text-2xl font-medium">{{ $title }}</h3>
        <p class="text-zinc-600 mt-1">{{ $description }}</p>
    </div>

    {{ $slot }}
</div>

@if($divider)
    <hr class="border-1">
@endif
