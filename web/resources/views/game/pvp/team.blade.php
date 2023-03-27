<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/guild-profile.1f853b4c461a8c2e895a.css') }}" rel="stylesheet" type="text/css"/>
    @endpush

        <div class="Pane Pane--underSiteNav Pane--bgTop Pane--dirt" queryselectoralways="42 43">
            <div class="Pane-bg" style="background-color: rgb(12, 1, 1); background-image: url({{ asset('cms/template_resource/IV6P6UECWEKV1538070269784.jpg') }});">
                <div class="Pane-overlay"></div>
            </div>
            <div class="Pane-content">
                <div class="GuildProfileHeader flex-items-center flex flex-justify-space padding-top-small padding-bottom-small margin-top-large margin-botуtom-normal">
                    <div class="GuildProfileHeader-info flex flex-items-center">
                        <div class="GuildProfileHeader-logo Logo Logo--smaller  Logo--{{ Utils::factionArena($data->captainGuid) }} "
                             style="opacity: 1;
                        transform: scale(1);"></div>
                        <div class="GuildProfileHeader-title" style="opacity: 1; transform: translate(0px, 0px); transition-duration: 600ms; transition-timing-function: ease;">
                            <div class="GuildProfileHeader-guildName font-semp-xLarge-white">{{ $team }}</div>
                            <div class="GuildProfileHeader-realm font-semp-small-white">{{ Server::GetRealmNameBySlug($servers) }}</div>
                        </div>
                        <div class="GuildProfileHeader-stats flex flex-column flex-justify-center" style="opacity: 1; transform: translate(0px, 0px); transition-duration: 600ms; transition-timing-function: ease;">
                            <div class="GuildProfileHeader-totals flex">
                                <a class="GuildProfileHeader-stat font-bliz-light-medium-lightGold hover-white" href="">
                                    <div class="Media--inline Media--flush Media--tiny Media" data-queryselectoralways-ignore="true">
                                        <div class="Media-image">
                                    <span class="Icon Media-icon Icon--shield Icon--svg">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="injected-svg Icon-svg" data-src="/static/components/Icon/svg/shield.933e04dc2d00d7a10d060298d2299559.svg#shield" xmlns:xlink="http://www.w3.org/1999/xlink" data-queryselectoralways-ignore="">
                                          <path xmlns="http://www.w3.org/2000/svg" d="M31.725 61.416c-9.022 0-26.748-19.035-26.85-42.062a1.226 1.226 0 01.005-.276c0-.065.004-.128.012-.193.122-1.43.93-2.706 2.193-3.467.142-.106.301-.187.476-.24.067-.02 6.74-2.043 10.721-4.421 4.022-2.399 10.542-8.272 10.607-8.331.061-.056.128-.107.198-.152l.302-.18c.094-.057.192-.101.292-.135a4.3 4.3 0 01.803-.292c1.041-.259 1.544-.226 2.371-.033.043.01.115.032.177.052.25.066.499.159.752.278.091.033.18.073.267.123l.207.122-.004.006c.118.062.226.138.322.225.68.609 6.746 6.02 10.632 8.34 4.041 2.41 10.607 4.375 10.673 4.393.181.054.347.138.494.248 1.223.743 2.02 1.969 2.169 3.35.023.1.035.204.035.31.004.035 0 .132 0 .167l-.002.094c-.103 23.035-17.83 42.074-26.852 42.074z" id="shield-2"></path>
                                       </svg>
                                    </span>
                                        </div>
                                        <div class="Media-text">{{ $data->rating }}</div>
                                    </div>
                                </a>
                                <a class="GuildProfileHeader-stat font-bliz-light-medium-lightGold hover-white">
                                    <div class="Media--inline Media--flush Media--tiny Media" data-queryselectoralways-ignore="true">
                                        <div class="Media-image">
                                    <span class="Icon Media-icon Icon--group Icon--svg">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="injected-svg Icon-svg" data-src="/static/components/Icon/svg/group.40d5733c633288c6b72255ec0b077a55.svg#group" xmlns:xlink="http://www.w3.org/1999/xlink" data-queryselectoralways-ignore="">
                                          <path xmlns="http://www.w3.org/2000/svg" d="M47.911 38.353a4.185 4.185 0 00-4.179-4.193h-23.88a4.185 4.185 0 00-4.179 4.193v5.901c5.247 1.75 7.365 5.029 7.365 10.884v3.283h17.509v-3.283c0-5.854 2.117-9.133 7.364-10.884v-5.901zm-16.098-8.865c4.154 0 7.521-3.379 7.521-7.546 0-4.169-3.367-7.548-7.521-7.548-4.155 0-7.523 3.38-7.523 7.548 0 4.167 3.368 7.546 7.523 7.546zm-14.776-8.087a7.47 7.47 0 002.645-.489c.398-3.397 2.172-6.427 4.742-8.456-.654-3.499-3.709-6.149-7.387-6.149-4.155 0-7.523 3.379-7.523 7.548 0 4.167 3.368 7.546 7.523 7.546zm-6.738 26.255v-9.303c0-4.913 4.656-8.236 9.552-8.236h2.311c-.85-1.425-1.514-2.721-1.957-4.043H5.076a4.184 4.184 0 00-4.179 4.193v5.901c5.247 1.75 6.716 5.029 6.716 10.884v3.283h9.225c-.744-.723-1.735-1.191-2.973-1.604l-3.566-1.075zm48.209-21.583H43.404c-.444 1.328-1.103 2.634-1.943 4.043h2.271c4.897 0 8.209 3.324 8.209 8.236v9.304l-2.895 1.073c-1.238.413-2.102.88-2.704 1.604h9.629V47.05c0-5.854 1.469-9.133 6.716-10.884v-5.901a4.185 4.185 0 00-4.179-4.192zm-14.552-5.156a7.473 7.473 0 002.633.485c4.155 0 7.521-3.379 7.521-7.546 0-4.169-3.367-7.548-7.521-7.548-3.668 0-6.719 2.635-7.385 6.12 2.59 2.025 4.374 5.063 4.752 8.489z" id="group-1"></path>
                                       </svg>
                                    </span>
                                        </div>
                                        <div class="Media-text">{{ $data->members->count() }} участников</div>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="Divider Divider--opaque Divider--thin margin-top-small margin-bottom-normal"></div>
                <div class="List HorizontalNav-itemsContainer">
                    <a class="Link HorizontalNav-link List-item " href="{{ route('arena', ['servers' => $servers, 'type' => '3v3']) }}">
                        <div class="HorizontalNav-item">Рейтинг PVP</div>
                    </a>
                    <a class="Link HorizontalNav-link List-item " href="{{ route('arena', ['servers' => $servers, 'type' => '2v2']) }}">
                        <div class="HorizontalNav-item">Назад</div>
                    </a>

                </div>

                <div tabindex="-1" role="group" style="outline: none;">
                    <div class="GuildProfileRoster GuildProfile-tab">
                        <div class="Grid padding-top-normal">
                            <div class="GuildProfileRoster-header font-semp-small-white text-upper margin-bottom-normal">Участники команды арены</div>
                            <div class="PagedTable">
                                <div class="margin-bottom-medium GuildProfileRoster-table Table--flex ControlledTable ControlledTable--animated" data-queryselectoralways-ignore="true">
                                    <div class="ControlledTable-head">
                                        <div class="ControlledTable-row">
                                            <div class="ControlledTable-col ControlledTable-label">
                                                <button class="ControlledTable-labelOuter" data-label="Имя" data-key="name" data-index="0">
                                                    <div class="align-center ControlledTable-labelInner">
                                                        <div class="ControlledTable-labelText">Имя</div>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="ControlledTable-col ControlledTable-label">
                                                <button class="ControlledTable-labelOuter" data-label="Раса" data-key="race" data-index="1">
                                                    <div class="align-center ControlledTable-labelInner">
                                                        <div class="ControlledTable-labelText">Раса</div>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="ControlledTable-col ControlledTable-label">
                                                <button class="ControlledTable-labelOuter" data-label="Класс" data-key="class" data-index="2">
                                                    <div class="align-center ControlledTable-labelInner">
                                                        <div class="ControlledTable-labelText">Класс</div>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="ControlledTable-col ControlledTable-label">
                                                <button class="ControlledTable-labelOuter" data-label="Уровень" data-key="level" data-index="4">
                                                    <div class="align-center ControlledTable-labelInner">
                                                        <div class="ControlledTable-labelText">Уровень</div>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="ControlledTable-col ControlledTable-label is-sorted">
                                                <button class="ControlledTable-labelOuter" data-label="Ранг в гильдии" data-key="guild-rank" data-index="5">
                                                    <div class="align-center ControlledTable-labelInner">
                                                        <div class="ControlledTable-labelText">Персональный рейтинг</div>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ControlledTable-body">
                                        @foreach($data->members as $member)
                                            <div class="ControlledTable-row" style="transform: translate3d(0px, 0px, 0px); opacity: 1; transition-duration: 300ms; transition-timing-function: ease;">
                                            <div class="ControlledTable-data ControlledTable-col align-left padding-top-double-tiny padding-bottom-double-tiny padding-right-none" data-value="Ааргхм">
                                          <span class="Tooltip-wrapper">
                                             <div class="Character  Character--@lang('characters.class_key_'.
                                             $member->characters->class)  Character--DAMAGE GuildProfileRoster-character Character--name Character--small Character--avatar margin-top-tiny margin-bottom-tiny float-left block">
                                                <a class="Character-link" href="{{ route('characters.show',
            ['server' => $member->characters->realmSlug, 'characters' => $member->characters->name])
             }}">
                                                   <div class="Character-table">
                                                      <div class="Character-avatar-section">
                                                         <div class="List List--vertical List--center">
                                                            <div class="List-item">
                                                               <div class="Character-avatar">
                                                                  <div class="Avatar Avatar--medium">
                                                                     <div class="Avatar-image" style="background-image: url({{ Utils::imageClass($member->characters->race, $member->characters->gender) }});"></div>
                                                                     <div class="Avatar-overlay"></div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="List-item"></div>
                                                         </div>
                                                      </div>
                                                      <div class="Character-details">
                                                         <div class="Character-name">{{ $member->characters->name }}</div>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </span>
                                            </div>
                                            <div class="ControlledTable-data ControlledTable-col align-center" data-value="Таурен">
                                                <div class="position-relative width-full height-full">
                                                    <div class="position-centered text-no-sizing">
                                                <span class="Tooltip-wrapper text-no-sizing">
                                                   <a class="text-no-sizing screen-reader-text" href="/">
                                                      <div class="GameIcon--{{ Utils::iconClass($member->characters->race, $member->characters->gender) }}
                                                          GameIcon GameIcon--rounded
                                                      GameIcon--bordered GameIcon--medium">
                                                         <div class="GameIcon-icon"></div>
                                                         <div class="GameIcon-transmog"></div>
                                                         <div class="GameIcon-borderImage"></div>
                                                      </div>
                                                      @lang('characters.race_'. $member->characters->race)
                                                   </a>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ControlledTable-data ControlledTable-col align-center" data-value="Охотник">
                                                <div class="position-relative width-full height-full">
                                                    <div class="position-centered text-no-sizing">
                                                <span class="Tooltip-wrapper text-no-sizing">
                                                   <a class="text-no-sizing screen-reader-text" href="/">
                                                      <div class="GameIcon--rounded  GameIcon--@lang('characters.class_key_'. $member->characters->class)  GameIcon GameIcon--bordered GameIcon--medium">
                                                         <div class="GameIcon-icon"></div>
                                                         <div class="GameIcon-transmog"></div>
                                                         <div class="GameIcon-borderImage"></div>
                                                      </div>
                                                      @lang('characters.class_'. $member->characters->class)
                                                   </a>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ControlledTable-data ControlledTable-col align-center" data-value="{{ $member->characters->level }}">{{ $member->characters->level }}</div>
                                            <div class="ControlledTable-data ControlledTable-col align-center" data-value="{{ $member->personalRating }}">{{ $member->personalRating }}</div>
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

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
        <script src="{{ asset('static/guild-profile.57a6a3615048a449a279.js') }}"></script>
    @endpush
</x-app-layout>
