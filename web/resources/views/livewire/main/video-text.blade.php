<div media-small="gutter-vertical" media-large="!gutter-vertical">
    <div class="align-center" media-wide="!align-center">
        <h1 class="margin-none font-semp-xxxLarge-white text-upper">{{ $video_text->getTranslatedAttribute('title', App()->getLocale(), 'ru') }}</h1>
        <div class="contain-masthead" media-wide="contain-left">
            <div class="space-rhythm-medium"></div>
            <p class="margin-none font-bliz-light-medium-beige">{{ $video_text->getTranslatedAttribute('body', App()->getLocale(), 'ru') }}</p>
            <div class="space-rhythm-large"></div>
            <div class="List List--gutters List--center List--vertical" media-large="!List--vertical" media-wide="!List--center List--left">
                @if($video_text->link_one)
                <a class="Link Button Button--ghost Panel-button" href="{{ $video_text->link_one }}">
                    <div class="Button-outer">
                        <div class="Button-inner">
                            <div class="Button-label" data-text="{{ $video_text->getTranslatedAttribute('link_one_text', App()->getLocale(), 'ru') }}">{{ $video_text->getTranslatedAttribute('link_one_text', App()->getLocale(), 'ru') }}</div>
                        </div>
                    </div>
                </a>
                @endif
                @if($video_text->link_two)
                <a class="Link Link--external Button Button--ghost Panel-button Button--purchase" href="{{ $video_text->link_two }}">
                    <div class="Button-outer">
                        <div class="Button-inner">
                            <div class="Button-label" data-text="{{ $video_text->getTranslatedAttribute('link_two_text', App()->getLocale(), 'ru') }}">{{ $video_text->getTranslatedAttribute('link_two_text', App()->getLocale(), 'ru') }}</div>
                        </div>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
