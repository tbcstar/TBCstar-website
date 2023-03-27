<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush

    <div class="Pane Pane--full Pane--dirtDark">
        <div class="Pane-bg">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="Pane Pane--underSiteNav Pane--cropMax Pane--transparent" data-url="{{ asset('cms/template_resource/p8/P8LCY89PNXOK1466794718015.jpg') }}">
                <div class="Pane-bg" style="background-image:url({{ asset('cms/template_resource/p8/P8LCY89PNXOK1466794718015.jpg') }});">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="contain-max">
                        <div class="space-large" media-large="space-huge"></div>
                        <div class="Grid">
                            <div class="Grid-full font-semp-xLarge-white" media-large="font-semp-xxxLarge-white" media-wide="Grid-1of2" media-huge="Grid-2of3">@lang('search.search_8')</div>
                            <div class="Grid-full padding-top-small" media-wide="Grid-1of2" media-huge="Grid-1of3">
                                <form class="SiteNav-searchBox" action="{{ route('search') }}" method="GET">
                                    <span class="Icon Icon--searchGold SiteNav-searchIcon"></span>
                                    <input class="SiteNav-searchInput" id="searchInput" name="q" type="search" placeholder="@lang('navbar.navbar_9')" value="{{ request()->q }}" autocomplete="off"></form>
                            </div>
                        </div>
                        <div class="Grid">
                            <div class="Grid-full padding-top-normal" media-wide="!padding-top-normal">
                                <div class="font-bliz-light-medium-white">
                                    @lang('search.search_1') <b>«{{ request()->q }}»</b>
                                </div>
                                <div class="space-large"></div>
                                <div class="List--vertical List--separatorAll List--full">
                                    @if(count($characters) || count($post))
                                        @if(count($characters))
                                            <div class="List-item">
                                                <div class="gutter-normal gutter-vertical">
                                                    <div class="List List--gutters">
                                                        <div class="List-item">
                                                            <div class="font-semp-small-white text-upper">@lang('search.search_3')</div>
                                                        </div>
                                                        <div class="List-item">
                                                            <a class="Link Link--text" href="{{ route('search.character', ['q' => request()->q]) }}">@lang('search.search_4') {{ count($characters) }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="space-normal"></div>
                                                    <div class="Grid Grid--gutters SyncHeight SyncHeight--disabled" media-medium="!SyncHeight--disabled">
                                                        @foreach($characters as $char)
                                                            <div class="Grid-full SyncHeight-item" media-medium="Grid-1of2" media-wide="Grid-1of4">
                                                                <a class="Link Character Character--{{ __('characters
                                                                .class_key_'.$char->class) }} Character--name Character--avatar Character--level Character--realm Character--square" href="{{ route('characters.show',
            ['server' => $char->realmSlug, 'characters' => $char->name])
             }}"><div class="Character-link"><div class="Character-table"><div class="Character-bust"><div class="Art Art--above"><div class="Art-size" style="padding-top:50.43478260869565%"></div><div class="Art-image" style="background-image:url({{ Utils::imageClass($char->race, $char->gender)}});"></div><div class="Art-overlay"></div></div></div><div class="Character-avatar"><div class="Avatar"><div class="Avatar-image" style="background-image:url({{ Utils::imageClass($char->race, $char->gender)}});"></div></div></div><div class="Character-details"><div class="Character-role"></div><div class="Character-name">{{ $char->name }}</div><div class="Character-level"><b>{{ $char->level }}</b> {{ __('characters.class_'.$char->class) }}</div><div class="Character-realm">{{ $char->realmName }}</div></div></div></div></a></div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(count($post))
                                            <div class="List-item">
                                                <div class="gutter-normal gutter-vertical">
                                                    <div class="List List--gutters">
                                                        <div class="List-item">
                                                            <div class="font-semp-small-white text-upper">@lang('search.search_6')</div></div>
                                                        <div class="List-item">
                                                            <a class="Link Link--text" href="{{ route('search.blog', ['q' => request()->q]) }}">@lang('search.search_7') {{ count($post) }}</a></div>
                                                    </div>
                                                    <div class="space-normal"></div>
                                                    <div class="Grid Grid--gutters SyncHeight SyncHeight--disabled" media-medium="!SyncHeight--disabled">
                                                        @foreach($post as $first)
                                                            <div class="Grid-full" media-medium="Grid-1of2" media-wide="Grid-1of4">
                                                                <div class="ArticleTile ArticleTile--stacked">
                                                                    <div class="ArticleTile-content">
                                                                        <div class="Tile ArticleTile-tile"><div class="Tile-area"><div class="Tile-bg" style="background-image:url({{ asset('/storage/' . $first->image) }});"></div><div class="Tile-content"></div></div></div><div class="ArticleTile-fade"></div><div class="ArticleTile-play"><div class="ArticleTile-playArrow"></div></div><div class="ArticleTile-bottom SyncHeight-item" data-syncheight-multiplier="1"><div class="ArticleTile-bottomInner"><div class="ArticleTile-left"><div class="ArticleTile-title">{{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en') }}</div></div>
                                                                                <div class="ArticleTile-right">
                                                                                    <div class="ArticleTile-commentTotal List-right"><a class="Link Link--external ArticleTile-comments" href="/"><div class="CommentTotal CommentTotal--horizontal CommentTotal--right ArticleTile-commentTotal"><span class="Icon Icon--comment Icon--small CommentTotal-icon"><svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/comment.88a6bb267bb247fed6a4ae5b51ea531d.svg#comment"></use></svg></span><div class="CommentTotal-number">0</div></div></a></div></div>
                                                                            </div>
                                                                        </div><a class="Link ArticleTile-link" href="{{ route('news.show', [$first->id, $first->slug]) }}" data-thumb="{{ asset('/storage/' . $first->image) }}"></a></div></div></div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="List--vertical List--separatorAll List--full">@lang('search.search_2')</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="space-large" media-large="space-huge"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
