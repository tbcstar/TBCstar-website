@props([
    'label' => null,
    'model',
    'lazy' => false,
    'debounce' => false,
])

@php
    if ($lazy) $bind = '.lazy';
    else if (ctype_digit($debounce)) $bind = '.debounce.' . $debounce . 'ms';
    else if ($debounce) $bind = '';
    else $bind = '.defer';

    $attributes = $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($model),
    ])->merge([
        'id' => $model,
        'wire:model' . $bind => 'model.' . $model,
    ]);
@endphp

<div class="mb-3">
    @if($label)
        <label for="{{ $model }}" class="form-label">{{ $label }}</label>
    @endif

    <textarea {{ $attributes }}></textarea>

    @error($model)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
