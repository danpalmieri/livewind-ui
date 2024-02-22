<div {{ $attributes->class(['relative']) }}>
    <div aria-hidden="true" class="absolute inset-y-0 left-0 h-full ml-4 border-l border-gray-300 border-dashed"></div>

    <ul class="space-y-4">
        {{ $slot }}
    </ul>
</div>