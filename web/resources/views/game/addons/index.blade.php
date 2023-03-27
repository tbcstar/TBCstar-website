<x-app-layout>
    @push('css')
        <link href="{{ asset('static/3.130ed27842b953a05ff8.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/realm-status.9802a5aa1ebc394c24c4.css') }}" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush

    <div class="Pane Pane--dirtDark Pane--full z-index-above" queryselectoralways="31">
        <div class="Pane-bg">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="react-mount" id="realm-status-mount" data-initial-state-variable-name="realmStatusInitialState">
                <div tabindex="-1" locale="ru-RU" style="outline: none;">
                    <div class="Pane Pane--underSiteNav Pane--bgTop" data-queryselectoralways-ignore="true" queryselectoralways="31">
                        <div class="Pane-bg" data-background-image="{{ asset('cms/template_resource/1620896874_27.jpg') }}" data-loaded="true" style="background-color: rgb(9, 12, 29); background-image: url({{ asset('cms/template_resource/1620896874_27.jpg') }});">
                            <div class="Pane-overlay"></div>
                        </div>
                        <div class="Pane-content">
                            <div class="padding-top-huge margin-bottom-large">
                                <div class="contain-masthead align-center">
                                    <div class="font-semp-xxxLarge-white">Список аддонов</div>
                                    <div class="space-rhythm-medium"></div>
                                    <div class="Content">
                                        <span class="font-bliz-light-small-beige">Список аддонов, переработанных под
                                            наш сервер.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="margin-bottom-normal">
                                <div class="flex-items-end margin-bottom-normal flex flex-justify-space">
                                    <div class="margin-right-norma">
                                        <div class="HorizontalNav HorizontalNav--flex HorizontalNav--gutters">
                                            <div class="HorizontalNav-itemsContainer">
                                                <div class="MediaAwareSlider MediaAwareSlider--disabled HorizontalNav-items">
                                                    <a href="{{ route('addons.index') }}" class="HorizontalNav-link is-selected"
                                                       type="button">
                                                        <div class="HorizontalNav-item">Список аддонов</div>
                                                    </a>
                                                    <a href="{{ route('patch.index') }}" class="HorizontalNav-link "
                                                       type="button">
                                                        <div class="HorizontalNav-item">Список патчей</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Divider Divider--opaque Divider--thin margin-top-normal" data-queryselectoralways-ignore="true"></div>
                            </div>
                            <div class="RealmsTable">
                                <div class="SortTable SortTable--flex" data-queryselectoralways-ignore="true" queryselectoralways="44">
                                    <div class="SortTable-head">
                                        <div class="SortTable-col SortTable-label">
                                            <button class="SortTable-labelOuter align-center">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Название</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="SortTable-col SortTable-label">
                                            <button class="SortTable-labelOuter align-center">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Версия</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="SortTable-col SortTable-label">
                                            <button class="SortTable-labelOuter align-center">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Категория</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="SortTable-col SortTable-label">
                                            <button class="SortTable-labelOuter align-center">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Обновлен</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="SortTable-col SortTable-label">
                                            <button class="SortTable-labelOuter align-center">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Скачать</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="SortTable-col SortTable-label">
                                            <button class="SortTable-labelOuter align-center">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Подробнее</div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="SortTable-body">
                                        @foreach($data as $item)
                                        <div class="SortTable-row">
                                            <div class="SortTable-col SortTable-data align-center">
                                                {{ $item->title }}
                                            </div>
                                            <div class="SortTable-col SortTable-data align-center">
                                                {{ $item->version }}
                                            </div>
                                            <div class="SortTable-col SortTable-data align-center">
                                                {{ $item->sub_title }}
                                            </div>
                                            <div class="SortTable-col SortTable-data align-center">
                                                {{ $item->updated_at }}
                                            </div>
                                            <div class="SortTable-col SortTable-data align-center">
                                                    <a class="HorizontalNav-link is-selected" href="{{ $item->files }}">
                                                        Скачать
                                                    </a>
                                            </div>
                                            <div class="SortTable-col SortTable-data align-center">
                                                <a class="HorizontalNav-link is-selected" href="{{ route('addons.show', [$item->slug])}}">
                                                    Подробнее
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
