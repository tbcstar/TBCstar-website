@props(['submit'])

<form data-v-112a4620="" data-v-15d61d2e="" wire:submit.prevent="{{ $submit }}">

    {{ $form }}

    @if (isset($actions))
        {{ $actions }}
    @endif
</form>
