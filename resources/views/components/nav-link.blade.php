@props([
    'active' => false,
    'icon' => 'fas fa-home', // Default Font Awesome icon
    'href' => '#',
])

@php
    $classes = $active
        ? 'flex items-center px-4 py-2 rounded-lg bg-blue-50 text-blue-700 font-semibold shadow-sm transition group'
        : 'flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-blue-700 transition group';
    $iconClasses = $active
        ? 'text-blue-600 group-hover:text-blue-700'
        : 'text-gray-400 group-hover:text-blue-700';
@endphp

<a
    {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}
>
    <i class="{{ $icon }} w-5 h-5 mr-3 {{ $iconClasses }}"></i>
    {{ $slot }}
</a>
