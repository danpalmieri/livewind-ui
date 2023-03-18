@props([
    'iconMenu' => false,
    'sidebar' => null,
    'open' => cookie('lui-sidebar-open') ?? true,
])

<div
    x-data="{ open: $persist({{ $open ? 'true' : 'false' }}).using(sessionStorage) }"
    x-init="$watch('open', value => Cookies.set('lui-sidebar-open', value))"
    {{ $attributes->class(['flex min-h-full']) }}
>
    <button
        x-show="open"
        x-on:click="open = false"
        x-transition:enter="transition ease duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
        type="button"
        aria-hidden="true"
        class="fixed inset-0 z-20 w-full h-full bg-black/50 focus:outline-none lg:hidden"
    ></button>

    <aside
        x-bind:class="open ? 'translate-x-0' : '-translate-x-full duration-300'"
        class="fixed inset-y-0 left-0 z-20 h-screen transition lg:z-0"
    >
        {{ $sidebar }}
    </aside>

    <main x-bind:class="open ? '{{ $iconMenu ? 'lg:pl-80' : 'lg:pl-72' }}' : ''" class="{{ generateClasses([
        'flex-1 min-h-screen w-screen',
        'lg:pl-80' => $open && $iconMenu,
        'lg:pl-72' => $open && ! $iconMenu
    ]) }}">
        {{ $slot }}
    </main>
</div>
