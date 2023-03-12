@props([
    'columns' => null,
    'flat' => false,
])

<div {{ $attributes->class(['overflow-x-auto -mx-4']) }}>
    <div class="inline-block min-w-full px-4">
        <div class="{{ generateClasses([
            'overflow-hidden bg-white rounded-xl',
            'shadow' => ! $flat,
            'border' => $flat,
        ]) }}">
            <table class="w-full text-left divide-y table-auto">
                <thead>
                    <tr class="divide-x bg-gray-50">
                        {{ $columns }}
                    </tr>
                </thead>

                <tbody class="divide-y whitespace-nowrap">
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>