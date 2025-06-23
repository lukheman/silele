@props([
    'variant' => 'primary',
    'icon' => null
])

@php
    $classes = 'btn btn-' . $variant;
@endphp

<button id="{{ $attributes->get('id')}}" {{ $attributes->merge(['class' => $classes])}}>
    <i class="{{ $icon }} w-5 h-5"></i>
    {{ $slot }}
</button>
