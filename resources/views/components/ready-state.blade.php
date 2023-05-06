@props([
    'ready' => false,
])

@if($ready)
{{ $slot }}
@else
<x-lui::loading inline />
@endif
