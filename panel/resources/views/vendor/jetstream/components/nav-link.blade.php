@props(['active'])

@php
$classes = ($active ?? false)
            ? 'router-link-exact-active router-link-active'
            : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
