<div {{ $attributes->class(['fixed inset-0 z-50 p-3 pointer-events-none']) }}>
    <div class="flex flex-col w-full h-auto max-w-xs ml-auto space-y-2 pointer-events-auto">
        {{ $slot }}
    </div>
</div>