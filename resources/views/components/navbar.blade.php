@props([
    'desktopMenu' => null,
    'fullWidth' => false,
    'mobileMenu' => null,
    'mobileMenuIcon' => null,
    'mobileMenuId' => 'mobile-menu',
    'start' => null,
])

@php
    $mobileMenuIconClasses = 'w-7 h-7';
@endphp

<div {{ $attributes->class([
    'w-full max-w-6xl px-4 mx-auto sm:px-6 md:px-8' => ! $fullWidth,
]) }}>
    <nav
        x-data="{ open: false }"
        class="{{ generateClasses([
            'sticky top-0 z-10 w-full bg-white shadow',
            'rounded-2xl' => ! $fullWidth,
        ]) }}"
    >
        <div class="{{ generateClasses([
            'w-full max-w-6xl mx-auto sm:px-2 md:px-4' => $fullWidth,
        ]) }}">
            <div class="flex items-center justify-between px-4 h-14">
                <div>
                    {{ $start }}
                </div>

                <ul class="items-center hidden space-x-2 text-sm font-medium text-gray-600 md:flex">
                    {{ $desktopMenu }}
                </ul>

                <div class="md:hidden">
                    <button
                        x-on:click="open = ! open"
                        type="button"
                        aria-controls="{{ $mobileMenuId }}"
                        x-bind:aria-expanded="open"
                        class="flex items-center justify-center w-10 h-10 -mr-2 text-primary-500 transition rounded-full hover:bg-gray-500/5 focus:bg-primary-500/10 focus:outline-none"
                    >
                        @unless ($mobileMenuIcon)
                            <svg class="{{ $mobileMenuIconClasses }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.75 5.75H19.25"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.75 18.25H19.25"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.75 12H19.25"/>
                            </svg>
                        @else
                            <x-dynamic-component :component="$mobileMenuIcon" :class="$mobileMenuIconClasses" />
                        @endunless
                    </button>
                </div>
            </div>

            <div
                x-show="open"
                x-cloak
                id="{{ $mobileMenuId }}"
                class="px-2 md:hidden"
            >
                <x-app-ui::hr />

                <ul class="flex flex-col py-2 space-y-1 text-sm font-medium text-gray-600">
                    {{ $mobileMenu }}
                </ul>
            </div>
        </div>
    </nav>
</div>