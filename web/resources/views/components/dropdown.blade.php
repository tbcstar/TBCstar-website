@props([
    'icon' => null,
    'label',
    'position' => 'end',
])

@php
    $attributes = $attributes->class([
        'dropdown d-inline-block',
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
        {{ $label }}
    </button>

    <div class="dropdown-menu dropdown-menu-{{ $position }}">
        {{ $slot }}
    </div>
</div>
