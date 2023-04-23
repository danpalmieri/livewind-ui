@props([
    'title' => null,
    'description' => null,
    'divider' => false,
    'actions' => null
])

<div class="flex justify-between items-center">
    <div>
        <h3 class="text-xl font-semibold">{{ $title }}</h3>
        <p class="text-zinc-500">{{ $description }}</p>
    </div>

    {{ $slot }}
</div>

@if($divider)
    <hr class="border-2 border-zinc-200/80">
@endif
