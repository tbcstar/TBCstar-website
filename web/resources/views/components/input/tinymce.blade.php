@php
    $model = $attributes->wire('model')->value();
@endphp

<div
    wire:ignore
    x-data
    {{ $attributes }}
>
    <script src="https://cdn.tiny.cloud/1/wwqqv9id7ffnpz5q9ych4h63q8thnarin4suzc90i3jyrp4x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            // All your init stuff here, then the super important part at the bottom
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });

                // This section says that when you leave the text edit area, it will set whatever livewire variable you like to the currnt contents
                editor.on('blur', function (e) {
                @this.set( '{{ $model }}', editor.getContent());
                });
            },
        });
    </script>
    <textarea class="h-screen p-2"
              id="body"
              name="body"
    > </textarea>
</div>
