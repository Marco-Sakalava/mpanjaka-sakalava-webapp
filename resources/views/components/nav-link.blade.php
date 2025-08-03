@props(['active'])

@php
$classes = ($active ?? false)
            // État ACTIF
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-500 font-semibold text-sm leading-5 text-gray-900 focus:outline-none focus:border-red-700 transition duration-150 ease-in-out'
            // État INACTIF
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-semibold text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>