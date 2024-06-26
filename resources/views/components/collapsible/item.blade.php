@props([
    'flat' => false,
    'heading',
    'open' => false,
])

<li
        x-data="{ open: {{ $open ? 'true' : 'false' }} }"
        {{ $attributes->class(['py-2']) }}
>
    <button
            x-on:click="open = ! open"
            x-bind:class="{
            '{{ generateClasses([
                'hover:bg-zinc-500/5',
                'focus:ring-2 focus:ring-inset focus:ring-primary-500 focus:bg-primary-500/10' => ! $flat,
            ]) }}': ! open,
            '{{ generateClasses([
                'bg-primary-500/10 ring-2 ring-primary-500 ring-inset' => ! $flat,
                'bg-white' => $flat,
            ]) }}': open,
        }"
            type="button"
            class="{{ generateClasses([
            'flex items-center justify-between text-left w-full px-2 py-1 font-medium transition rounded-lg focus:outline-none',
            ' focus:ring-inset focus:ring-primary-500 focus:bg-white focus:outline-none' => $flat,
        ]) }}"
    >
        <span>{{ $heading }}</span>

        <svg
                x-bind:class="{
                'rotate-0 text-zinc-400': ! open,
                'rotate-180 text-primary-600': open,
            }"
                class="flex-shrink-0 -mr-2 transition w-5 h-5"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
        >
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.25 10.75L12 14.25L8.75 10.75"/>
        </svg>
    </button>

    <div x-show="open" class="px-4 py-2">
        <p class="text-zinc-600">
            {{ $slot }}
        </p>
    </div>
</li>
