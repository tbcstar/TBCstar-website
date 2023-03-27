<div class="VideoPane-bg">
    <video class="VideoPane-video" src="{{ asset('storage/'.$fines->video) }}" data-src="{{ asset('storage/'.$fines->video)
    }}" loop="loop"
           muted="muted"
           autoplay="autoplay" playsinline="playsinline"></video>
    <div class="VideoPane-overlay"></div>
    <div class="VideoPane-fallback BackgroundVideo-fallback" style="background-image: url('{{ $fines->images }}');
        "></div>
</div>
<div class="VideoPane-content">
    <div class="gutter-normal gutter-negative" media-wide="hide">
        <div class="Art Art--fadeBottom" style="margin-bottom:-52.5%;">
            <div class="Art-size" style="padding-top:90%"></div>
            <div class="Art-image" style="background-image:url({{ $fines->images_phone }});"></div>
            <div class="Art-overlay"></div>
        </div>
    </div>
    <div class="hide" media-wide="!hide">
        <div class="space-huge"></div>
        <div class="space-large"></div>
    </div>
    <div class="align-left">
        <livewire:main.video-text />
    </div>
    <div class="hide" media-wide="!hide">
        <div class="space-large"></div>
    </div>
    <div class="space-large" media-wide="space-huge"></div>
    <livewire:news />
    <div class="space-normal"></div>
</div>
