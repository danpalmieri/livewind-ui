@props(['size' => 'md', 'title' => null, 'description' => null, 'disabled' => false, 'id' => 'switch'])

<div x-data="{ on: $wire.get('{{ $attributes->get('model') }}') }"
     x-on:force-switch-update-{{ $id }}.window="on = $wire.get('{{ $attributes->get('model') }}')"
     x-init="$watch('on', value => $wire.set('{{ $attributes->get('model') }}', value))"
>
    <div class="flex justify-between space-x-3">
        <button
            wire:ignore
            @unless($disabled) x-on:click="on = !on" @endunless
            type="button"
            class="relative inline-flex flex-shrink-0
            md:h-6 md:w-11 h-8 w-16
            border-2 border-transparent rounded-full cursor-pointer
            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500
            transition-colors duration-200 ease-in-out"
            role="switch"
            aria-checked="true"
            x-ref="switch"
            x-state:on="Enabled" x-state:off="Not Enabled"
            x-bind:class="[ on ? 'bg-primary-600': 'bg-zinc-200' ]"
            aria-labelledby="availability-label"
            :aria-checked="on.toString()"
        >
            <span aria-hidden="true"
            class="inline-block
            md:w-5 md:h-5 w-7 h-7
            duration-200 ease-in-out transition-transform bg-white rounded-full shadow pointer-events-none ring-0"
            x-state:on="Enabled" x-state:off="Not Enabled"
            x-bind:class="{ 'md:translate-x-5 translate-x-8': on }">
            </span>
        </button>

        @if($title)
            <div class="flex flex-col flex-grow" id="availability-label">
                <h2 class="flex items-center space-x-3">
                    <span class="font-medium text-zinc-900">{{ $title }}</span>
                    <div class="flex-grow h-px bg-zinc-200"></div>
                </h2>
                @if($description)
                    <p class="max-w-lg mt-1 text-sm text-zinc-500">{{ $description }}</p>
                @endif
            </div>
        @endif
    </div>
    {{ $slot ?? '' }}
</div>
