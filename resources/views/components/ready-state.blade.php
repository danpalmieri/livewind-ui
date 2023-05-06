@props([
    'isReady' => false,
])

@if($isReady)
<x-lui::loading inline />
@else
{{ $slot }}
@endif
