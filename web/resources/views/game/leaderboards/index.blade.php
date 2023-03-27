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

        <div class="Pane bordered Pane--underSiteNav Pane--above Pane--abover" data-url="https://images.blz-contentstack.com/v3/assets/blt3452e3b114fab0cd/bltf5a3620c49785a38/5fbc2f3bae5aee5796129654/SanguineDepthDungeon_Masthead.jpg" media-medium="!Pane--full" queryselectoralways="0 31" media-original="Pane bordered Pane--underSiteNav Pane--above Pane--full Pane--abover"><div class="Pane-bg" style="background-color:#160000;background-image:url(&quot;https://images.blz-contentstack.com/v3/assets/blt3452e3b114fab0cd/bltf5a3620c49785a38/5fbc2f3bae5aee5796129654/SanguineDepthDungeon_Masthead.jpg&quot;);"><div class="Pane-overlay"></div></div><div class="Pane-content"><div class="space-medium space-huge" media-wide="space-huge" queryselectoralways="0" media-original="space-medium"></div><h1 class="margin-none font-semp-xLarge-white" media-nav="!align-center" queryselectoralways="0" media-original="margin-none font-semp-xLarge-white align-center">Рейтинги подземелий с эпохальным ключом</h1>
                <div class="space-medium"></div>
                <div class="" media-medium="!gutter-small" media-nav="!contain-medium" queryselectoralways="0" media-original="contain-medium gutter-small">
                    <div class="List List--gutters" media-nav="!List--full !List--vertical List--gutters" queryselectoralways="0" media-original="List List--vertical List--full">
                        <div class="List-item">
                            <div class="SelectMenu SelectMenu--fullscreen" media-medium="!SelectMenu--fullscreen">
                                <div class="SelectMenu-toggle">{{ $server ?? 'Shadowsong x100' }}</div>
                                <div class="SelectMenu-menu">
                                    <div class="SelectMenu-close">
                                        <span class="Icon Icon--closeGold SelectMenu-close-icon"></span>
                                    </div>
                                    <div class="SelectMenu-inputContainer">
                                        <input class="SelectMenu-input" type="search"/></div>
                                    <div class="SelectMenu-items">
                                        @foreach(config('servers.realm') as $servers)
                                            <div class="SelectMenu-item" data-value="{{ $servers['name'] }}">
                                                <a class="Link SelectMenu-link" href="{{ route('leaderboards',
                                                ['server' => $servers['slug'], 'instance' => $instanceName]) }}">{{ $servers['name'] }}
                                                </a>
                                            </div>
                                        @endforeach
                                        <div class="SelectMenu-exception">Результатов не найдено.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-normal" media-nav="!space-normal"></div>
                        </div>
                        <div class="List-item">
                            <div class="SelectMenu" media-medium="!SelectMenu--fullscreen" queryselectoralways="0 39" media-original="SelectMenu SelectMenu--fullscreen">
                                <div class="SelectMenu-toggle">{{ $instanceName }}</div>
                                <div class="SelectMenu-menu">
                                    <div class="SelectMenu-close">
                                        <span class="Icon Icon--closeGold SelectMenu-close-icon"></span>
                                    </div>
                                    <div class="SelectMenu-inputContainer"><input class="SelectMenu-input" type="search"></div>
                                    <div class="SelectMenu-items">
                                        @foreach(config('instance.mythic') as $inst)
                                        <div class="SelectMenu-item" data-value="{{ $inst['name'] }}">
                                            <a class="Link SelectMenu-link" href="{{ route('leaderboards',
                                            ['server' => 'shadowsong-x100', 'instance'
                                             =>
                                            $inst['slug']]) }}">{{
                                            $inst['name'] }}</a>
                                        </div>
                                        @endforeach
                                        <div class="SelectMenu-exception">Результатов не найдено.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-medium space-huge" media-wide="space-huge" queryselectoralways="0" media-original="space-medium"></div>
            </div>
        </div>
        <div class="Divider"></div>
        <div class="Pane bordered" data-url="https://images.blz-contentstack.com/v3/assets/blt3452e3b114fab0cd/bltf8c0ec5111551d52/5fd9053eb3d923131ee4bf25/SanguineDepthDungeon_Bkg.jpg" queryselectoralways="31">
            <div class="Pane-bg" style="background-color:#160000;background-image:url(&quot;https://images.blz-contentstack.com/v3/assets/blt3452e3b114fab0cd/bltf8c0ec5111551d52/5fd9053eb3d923131ee4bf25/SanguineDepthDungeon_Bkg.jpg&quot;);">
                <div class="Pane-overlay"></div>
            </div>
            <div class="Pane-content">
                <div class="contain-max">
                    <div class="space-medium space-large" media-wide="space-large" queryselectoralways="0" media-original="space-medium"></div>
                    <div class="Paginator" data-page="1" data-size="100" data-total="1" queryselectoralways="30">
                        <div class="Paginator-pages">
                            <div class="Paginator-page" data-page="1">
                                <div class="SortTable SortTable--disabled SortTable--flex SortTable--dataPadding" media-wide="!SortTable--alignTop" queryselectoralways="0 44" media-original="SortTable SortTable--disabled SortTable--flex SortTable--alignTop SortTable--dataPadding" style="">
                                    <div class="SortTable-head">
                                        <div class="SortTable-row">
                                            <div class="SortTable-col SortTable-label is-sorted" data-priority="2">
                                                <div class="SortTable-labelOuter">
                                                    <div class="SortTable-labelInner">
                                                        <div class="SortTable-labelText">Ранг</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="SortTable-col SortTable-label" data-priority="3">
                                                <div class="SortTable-labelOuter">
                                                    <div class="SortTable-labelInner">
                                                        <div class="SortTable-labelText">Эпохальный уровень</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="SortTable-col SortTable-label" data-priority="4">
                                                <div class="SortTable-labelOuter">
                                                    <div class="SortTable-labelInner">
                                                        <div class="SortTable-labelText">Время</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="SortTable-col SortTable-label SortTable-label--left" data-priority="1">
                                                <div class="SortTable-labelOuter">
                                                    <div class="SortTable-labelInner">
                                                        <div class="SortTable-labelText">Группа</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-body">
                                        @forelse($data as $item)
                                        <div class="SortTable-row">
                                            <div class="SortTable-col SortTable-data align-center text-nowrap
                                            fontWeight-bold" data-value="{{ $loop->index+1 }}">{{ $loop->index+1 }}</div>
                                            <div class="SortTable-col SortTable-data align-center text-nowrap"
                                                 data-value="{{ $item->level }}">{{ $item->level }}</div>
                                            <div class="SortTable-col SortTable-data align-center text-nowrap"
                                                 data-value="{{ $item->time }}">{{ Text::MythicTime($item->time) }}</div>
                                            <div class="SortTable-col SortTable-data" data-value="alliance">
                                                <div class="List" media-wide="!List--vertical" queryselectoralways="0" media-original="List List--vertical">
                                                    @php
                                                    $characters = Utils::instanceCharacters($item->guids);
                                                    @endphp

                                                    @foreach($characters as $char)
                                                        @empty(!$char)
                                                            <div class="List-item gutter-tiny">
                                                        <a class="Link Character Character--{{ __('characters.class_key_'.$char->class) }}
                                                        Character--role Character--inline Character--small
                                                        Character--name"
                                                           href="{{ route('characters.show',['server' =>
                                                           $char->realmSlug, 'characters' => $char->name]) }}">
                                                            <div class="Character-link">
                                                                <div class="Character-table">
                                                                    <div class="Character-avatar">
                                                                        <div class="Avatar Avatar--anon Avatar--medium">
                                                                            <div class="Avatar-image"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Character-details">
                                                                        <div class="Character-name"> {{ $char->name }} </div>
                                                                        <div class="Character-realm">{{ $char->realmName }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                        @endempty
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <p>No data!</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-large"></div>
                </div>
            </div>
            </div>
</x-app-layout>
