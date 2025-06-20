@props([
    'variant' => 'primary'
])

<button class="btn btn-{{ $variant }}">
    {{ $slot }}
</button>
