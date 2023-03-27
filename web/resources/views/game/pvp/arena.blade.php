<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    <div class="Pane bordered Pane--underSiteNav Pane--above Pane--full Pane--abover" data-url="{{ asset('cms/template_resource/g9/G9J3FHALXB151474926117919.jpg') }}" media-medium="!Pane--full">
        <div class="Pane-bg" style="background-image:url({{ asset('cms/template_resource/g9/G9J3FHALXB151474926117919.jpg') }});">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="space-medium"></div>
            <div media-huge="space-medium"></div>
            <div class="align-center" media-wide="!align-center align-left">
                <h1 class="margin-none font-semp-xxxLarge-white">Рейтинговая таблица PvP</h1>
            </div>
            <div class="space-rhythm-medium"></div>
            <div class="contain-large align-center" media-wide="!align-center !contain-large contain-wide contain-left align-left">
                <p class="margin-none font-bliz-light-small-beige">Могучие герои Альянса и Орды сражаются за славу на аренах и полях боя. Подвиги 1000 лучших игроков вашего региона навеки входят в анналы истории.</p>
            </div>
            <div class="space-rhythm-medium"></div>
            <div class="contain-medium gutter-small" media-medium="!gutter-small" media-nav="!contain-medium">
                <div class="List List--vertical List--full" media-nav="!List--full !List--vertical List--gutters">
                    <div class="List-item">
                        <div class="SelectMenu SelectMenu--fullscreen" media-medium="!SelectMenu--fullscreen">
                            <div class="SelectMenu-toggle">{{ Server::GetRealmNameBySlug($servers) }}</div>
                            <div class="SelectMenu-menu">
                                <div class="SelectMenu-close">
                                    <span class="Icon Icon--closeGold SelectMenu-close-icon"></span>
                                </div>
                                <div class="SelectMenu-inputContainer">
                                    <input class="SelectMenu-input" type="search"/></div>
                                <div class="SelectMenu-items">
                                    @foreach(Server::getServer() as $server)
                                        <div class="SelectMenu-item" data-value="{{ $server['name'] }}">
                                            <a class="Link SelectMenu-link" href="{{ route('arena', ['servers' => $server['slug'], 'type' => $type]) }}">
                                                {{ $server['name'] }}
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
                        <div class="SelectMenu SelectMenu--fullscreen" media-medium="!SelectMenu--fullscreen">
                            <div class="SelectMenu-toggle">@lang('theme.arena_'.$type)</div>
                            <div class="SelectMenu-menu">
                                <div class="SelectMenu-close">
                                    <span class="Icon Icon--closeGold SelectMenu-close-icon"></span>
                                </div>
                                <div class="SelectMenu-inputContainer">
                                    <input class="SelectMenu-input" type="search"/></div>
                                <div class="SelectMenu-items">
                                    @if($server_type === 'wotlk')
                                        <div class="SelectMenu-item" data-value="Арена 1х1">
                                            <a class="Link SelectMenu-link" href="{{ route('arena', ['servers' => $servers, 'type' => '1v1']) }}">
                                                Арена 1х1
                                            </a>
                                        </div>
                                    @endif
                                    <div class="SelectMenu-item" data-value="Арена 2х2">
                                        <a class="Link SelectMenu-link" href="{{ route('arena', ['servers' => $servers, 'type' => '2v2']) }}">
                                            Арена 2х2
                                        </a>
                                    </div>
                                    <div class="SelectMenu-item" data-value="Арена 3х3">
                                        <a class="Link SelectMenu-link" href="{{ route('arena', ['servers' => $servers, 'type' => '3v3']) }}">
                                            Арена 3х3
                                        </a>
                                    </div>
                                    @if($server_type === 'sl')
                                        <div class="SelectMenu-item" data-value="Поля боя 10x10">
                                            <a class="Link SelectMenu-link" href="{{ route('arena', ['servers' => $servers, 'type' => '10v10']) }}">
                                                Поля боя 10x10
                                            </a>
                                        </div>
                                    @endif
                                    <div class="SelectMenu-exception">Результатов не найдено.</div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-medium" media-wide="space-huge"></div>
        </div>
    </div>
    <div class="Divider"></div>
    <div class="Pane Pane--dirtBlue bordered">
        <div class="Pane-bg">
            <div class="Pane-overlay"></div>
        </div>

        <div class="Pane-content">
            <div media-wide="space-normal"></div>
            <div class="space-normal"></div>
            <div class="Paginator" data-url="{{ route('arena', ['servers' => $servers, 'type' => $type]) }}" data-page="1" data-size="30" data-total="10">
                <div class="Paginator-pages">
                    <div class="Paginator-page" data-page="1">
                        <div class="SortTable SortTable--flex">
                            <div class="SortTable-head">
                                @if($type === '2v2')
                                    <div class="SortTable-row">
                                        <div class="SortTable-col SortTable-label" data-priority="2">
                                            <div class="SortTable-labelOuter">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Рейтинг</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="SortTable-col SortTable-label SortTable-label--left" data-priority="1">
                                            <div class="SortTable-labelOuter">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Команда</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="SortTable-col SortTable-label" data-priority="2" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-label">
                                            <div class="SortTable-labelOuter">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Игр за сезон</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="SortTable-col SortTable-label" data-priority="3" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-label">
                                            <div class="SortTable-labelOuter">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Побед за сезон</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="SortTable-col SortTable-label" data-priority="4" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-label">
                                            <div class="SortTable-labelOuter">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Игр за неделю</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="SortTable-col SortTable-label" data-priority="5" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-label">
                                            <div class="SortTable-labelOuter">
                                                <div class="SortTable-labelInner">
                                                    <div class="SortTable-labelText">Побед за неделю</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="SortTable-row">
                                    <div class="SortTable-col SortTable-label is-sorted" data-priority="1">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Ранг</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-label" data-priority="2">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Ступень/Рейтинг</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-label SortTable-label--left" data-priority="1">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Игрок</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-label hide" data-priority="4" media-wide="!hide">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Класс</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-label hide" data-priority="4" media-wide="!hide">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Фракция</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-label hide" data-priority="4" media-wide="!hide">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Игровой мир</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-label hide" data-priority="3" media-wide="!hide">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Победы</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-label hide" data-priority="6" media-wide="!hide">
                                        <div class="SortTable-labelOuter">
                                            <div class="SortTable-labelInner">
                                                <div class="SortTable-labelText">Поражения</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="SortTable-body">
                                @foreach($data as $item)
                                    @if($item->team_member->characters)
                                        @if($type === '2v2')

                                            <div class="SortTable-row">
                                                <div class="SortTable-col SortTable-data align-center text-nowrap">
                                                    <div class="flex flex-align-center flex-justify-center">
                                                        <a class="Link" data-tooltip="pvp-tier-tooltip-{{ Utils::imageRating($item->rating)['tier'] }}" queryselectoralways="0 37">
                                                            <div class="List">
                                                                <div class="List-item">
                                                                    <img src="{{ Utils::imageRating($item->rating)['images'] }}" style="max-width: 32px; margin-right: 5px;">
                                                                </div>
                                                                <div class="List-item">
                                                                    {{ $item->rating }}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="SortTable-col SortTable-data" data-value="Делаем работу">
                                                    <a class="Link Character Character--inline Character--small
                                                    Character--name margin-top-xSmall Character--avatar" href="{{
                                                    route('team', ['servers' => $servers, 'type' => $type, 'team' =>
                                                    $item->name]) }}" media-wide="Character--avatar" queryselectoralways="0 1" media-original="Link Character Character--inline Character--small Character--name margin-top-xSmall Character--avatar">
                                                        <div class="Character-link">
                                                            <div class="Character-table">
                                                                <div class="Character-avatar">
                                                                    <div class="Avatar Avatar--medium">

                                                                        <div class="Avatar-image"
                                                                             style="background-image:url({{ asset('static/components/Icon/Icon-wow-ocho.png') }});
                                                                                 "></div>
                                                                    </div>
                                                                </div>
                                                                <div class="Character-details">
                                                                    <div class="Character-role"></div>
                                                                    <div class="Character-name">{{ $item->name }}</div>

                                                                    <div class="Character-level"><b>0</b></div>
                                                                    <div class="Character-realm">0</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>

                                                </div>

                                                <div class="SortTable-col SortTable-data text-nowrap align-center" data-value="54" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-data text-nowrap align-center">{{ $item->seasonGames }}</div>
                                                <div class="SortTable-col SortTable-data text-nowrap align-center color-status-success" data-value="{{ $item->seasonGames }}" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-data text-nowrap align-center color-status-success">{{ $item->seasonGames }}</div>
                                                <div class="SortTable-col SortTable-data text-nowrap align-center" data-value="0" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-data text-nowrap align-center">{{ $item->seasonWins }}</div>
                                                <div class="SortTable-col SortTable-data text-nowrap align-center color-status-success" data-value="{{ $item->seasonWins }}" media-wide="!hide" queryselectoralways="0 1" media-original="SortTable-col SortTable-data text-nowrap align-center color-status-success">{{ $item->seasonWins }}</div>
                                            </div>
                                        @else
                                            <div class="SortTable-row">
                                                <div class="SortTable-col SortTable-data align-center text-nowrap" data-value="{{ $loop->iteration }}">{{ $loop->iteration }}</div>
                                                <div class="SortTable-col SortTable-data align-center text-nowrap">
                                                    <div class="flex flex-align-center flex-justify-center">
                                                        <a class="Link" data-tooltip="pvp-tier-tooltip-{{ Utils::imageRating($item->rating)['tier'] }}">
                                                            <div class="List">
                                                                <div class="List-item">
                                                                    <img src="{{ Utils::imageRating($item->rating)['images'] }}" style="max-width: 32px; margin-right: 5px;"></div>
                                                                <div class="List-item">{{ $item->rating }}</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="SortTable-col SortTable-data" data-value="{{ $item->team_member->characters->name }}">
                                                    <a class="Link Character Character--@lang('characters.class_key_'.
                                                    $item->team_member->characters->class) Character--inline Character--small Character--name margin-top-xSmall" href="{{ route('characters.show', [$item->team_member->characters->realmSlug, strtolower($item->team_member->characters->name) ]) }}" media-wide="Character--avatar">
                                                        <div class="Character-link">
                                                            <div class="Character-table">
                                                                <div class="Character-bust">
                                                                    <div class="Art Art--above">
                                                                        <div class="Art-size" style="padding-top:50.43478260869565%"></div>
                                                                        <div class="Art-image" style="background-image:url({{ Utils::imageClass($item->team_member->characters->race, $item->team_member->characters->gender) }});"></div>
                                                                        <div class="Art-overlay"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="Character-avatar">
                                                                    <div class="Avatar Avatar--medium">
                                                                        <div class="Avatar-image" style="background-image:url({{ Utils::imageClass($item->team_member->characters->race, $item->team_member->characters->gender) }});"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="Character-details">
                                                                    <div class="Character-role"></div>
                                                                    <div class="Character-name">{{ $item->team_member->characters->name }}</div>
                                                                    <div class="Character-level"><b>{{ $item->team_member->characters->level }}</b> @lang('forum.class_'. $item->team_member->characters->class) </div>
                                                                    <div class="Character-realm">{{ $item->team_member->characters->realmName }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="Link inline align-right font-semp-xSmall-lightGold float-right" data-modal="entry-details-modal-1" media-wide="hide">
                                                        <div class="inline">Вид</div>
                                                        <span class="Icon Icon--open-table Icon--small inline gutter-small-left">
                                                <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/open-table.e50c0d6eb051e0e76928b7f5eeb6b08e.svg#open-table"></use></svg>
                                            </span>
                                                    </a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="SortTable-col SortTable-data hide align-center" data-value="Маг" media-wide="!hide">
                                                    <a class="Link" data-url="/" data-tooltip="{{ $loop->iteration
                                                    }}-{{ $item->team_member->characters->name }}-character-class-tooltip">
                                                        <div class="GameIcon GameIcon--@lang('characters.class_key_'. $item->team_member->characters->class) GameIcon--medium GameIcon--bordered GameIcon--rounded margin-top-xSmall">
                                                            <div class="GameIcon-icon"></div>
                                                            <div class="GameIcon-transmog"></div>
                                                            <div class="GameIcon-borderImage"></div>
                                                        </div>
                                                    </a>
                                                    <div class="Tooltip" name="{{ $loop->iteration }}-{{ $item->team_member->characters->name }}-character-class-tooltip">
                                                        <div class="GameTooltip">
                                                            <div class="ui-tooltip">
                                                                <div class="font-bliz-light-small-white">
                                                                    {{ Utils::classes($item->team_member->characters->class)['name'] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="SortTable-col SortTable-data hide font-none align-center" data-value="{{ Utils::faction($item->team_member->characters->race)['enum'] }}" media-wide="!hide">
                                                    <a class="Link" data-tooltip="{{ $loop->iteration }}-{{ $item->team_member->characters->name }}-character-faction-tooltip">
                                            <span class="Icon Icon--{{ Utils::faction($item->team_member->characters->race)['slug'] }} Icon--medium">
                                                <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="{{ Utils::faction($item->team_member->characters->race)['images'] }}"></use>
                                                </svg>
                                            </span>
                                                    </a>
                                                    <div class="Tooltip" name="{{ $loop->iteration }}-{{ $item->team_member->characters->name }}-character-faction-tooltip">
                                                        <div class="GameTooltip">
                                                            <div class="ui-tooltip">
                                                                <div class="font-bliz-light-small-white">
                                                                    {{ Utils::faction($item->team_member->characters->race)['name'] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="SortTable-col SortTable-data hide text-nowrap align-center" data-value="{{ $item->team_member->characters->realmName }}" media-wide="!hide">{{ $item->team_member->characters->realmName }}</div>
                                                <div class="SortTable-col SortTable-data hide text-nowrap align-center color-status-success" data-value="{{ $item->team_member->seasonWins }}" media-wide="!hide">{{ $item->team_member->seasonWins }}</div>
                                                <div class="SortTable-col SortTable-data hide text-nowrap align-center color-status-error" data-value="{{ $item->team_member->seasonWins - $item->team_member->seasonGames }}" media-wide="!hide">{{ $item->team_member->seasonWins - $item->team_member->seasonGames }}</div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            @foreach($data as $item)
                                @if($item->team_member->characters)
                                    @if($type != '2v2')
                                        <div class="Modal" data-modal="entry-details-modal-{{ $loop->iteration }}" data-izimodal-group="entry-details-modals" style="display: none;">
                                            <div class="Modal-back" title="Назад">
                                                <div class="List">
                                                    <div class="List-item">
                                            <span class="Icon Icon--back Icon--small Modal-icon">
                                                <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/back.c10b080238aab11233897a18a4bc84ac.svg#back"></use></svg>
                                            </span>
                                                    </div>
                                                    <div class="List-item">
                                                        <div class="Modal-backText">Назад</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Modal-close" data-izimodal-close="data-izimodal-close">
                                    <span class="Icon Icon--close Icon--small Modal-icon">
                                        <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/close.a9ffd5f54f2a6c649636aab0e0392caa.svg#close"></use></svg></span>
                                            </div>
                                            <table class="width-full">
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Ранг</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left font-size-small">{{ $loop->iteration }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Ступень/Рейтинг</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left">
                                                        <div class="font-size-small">Ветеран</div>
                                                        <div class="font-size-xSmall">Рейтинг: {{ $item->team_member->rating }}</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Игрок</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left">
                                                        <a class="Link font-size-small color-class-MAGE-onDark" href="/">
                                                            {{ $item->team_member->characters->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Класс</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left font-size-small">{{ Utils::classes($item->team_member->characters->class)['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Фракция</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left font-size-small">{{ Utils::faction($item->team_member->characters->race)['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Игровой мир</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left font-size-small">{{ $item->team_member->characters->realmName }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Победы</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left font-size-small color-win">
                                                        {{ $item->team_member->seasonWins }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="gutter-normal-bottom font-semp-medium-white">Поражения</td>
                                                    <td class="gutter-normal-bottom gutter-normal-left font-size-small color-loss">
                                                        {{ $item->team_member->seasonWins - $item->team_member->seasonGames }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="space-huge"></div>
            <div media-wide="space-large"></div>
            <div class="Tooltip" name="pvp-tier-tooltip-8">
                <div class="GameTooltip"><div class="ui-tooltip"><div class="List"><div class="List-item"><img src="{{ asset('cms/template_resource/RJ6XE5WS8D6G1528483047503.png') }}" style="max-width: 32px;"></div><div class="List-item gutter-small-left"><div class="font-bliz-light-small-white">Без ранга</div></div></div><div class="space-small"></div><div class="font-size-xSmall color-beige-medium">Присуждается игрокам с рейтингом 0+.</div></div></div>
            </div>
            <div class="Tooltip" name="pvp-tier-tooltip-9">
                <div class="GameTooltip"><div class="ui-tooltip"><div class="List"><div class="List-item"><img src="{{ asset('cms/template_resource/FQHOIXM3MSHQ1528483047541.png') }}" style="max-width: 32px;"></div><div class="List-item gutter-small-left"><div class="font-bliz-light-small-white">Боец</div></div></div><div class="space-small"></div><div class="font-size-xSmall color-beige-medium">Присуждается игрокам с рейтингом 1370+.</div></div></div></div>
            <div class="Tooltip" name="pvp-tier-tooltip-11">
                <div class="GameTooltip"><div class="ui-tooltip"><div class="List"><div class="List-item"><img src="{{ asset('cms/template_resource/Q4TDZMWJS1DC1528483047584.png') }}" style="max-width: 32px;"></div><div class="List-item gutter-small-left"><div class="font-bliz-light-small-white">Претендент</div></div></div><div class="space-small"></div><div class="font-size-xSmall color-beige-medium">Присуждается игрокам с рейтингом 1570+.</div></div></div></div>
            <div class="Tooltip" name="pvp-tier-tooltip-12">
                <div class="GameTooltip"><div class="ui-tooltip"><div class="List"><div class="List-item"><img src="{{ asset('cms/template_resource/RI4P9I2JXXXL1528483047769.png') }}" style="max-width: 32px;"></div><div class="List-item gutter-small-left"><div class="font-bliz-light-small-white">Фаворит</div></div></div><div class="space-small"></div><div class="font-size-xSmall color-beige-medium">Присуждается игрокам с рейтингом 1770+.</div></div></div></div>
            <div class="Tooltip" name="pvp-tier-tooltip-13">
                <div class="GameTooltip"><div class="ui-tooltip"><div class="List"><div class="List-item"><img src="{{ asset('cms/template_resource/9WPOSOBTK7GY1528483047820.png') }}" style="max-width: 32px;"></div><div class="List-item gutter-small-left"><div class="font-bliz-light-small-white">Дуэлянт</div></div></div><div class="space-small"></div><div class="font-size-xSmall color-beige-medium">Присуждается игрокам с рейтингом 2070+.</div></div></div></div>
            <div class="Tooltip" name="pvp-tier-tooltip-14">
                <div class="GameTooltip"><div class="ui-tooltip"><div class="List"><div class="List-item"><img src="{{ asset('cms/template_resource/O3AI2CT4Q06V1528483048012.png') }}" style="max-width: 32px;"></div><div class="List-item gutter-small-left"><div class="font-bliz-light-small-white">Ветеран</div></div></div><div class="space-small"></div><div class="font-size-xSmall color-beige-medium">Присуждается игрокам с рейтингом 2370+.</div></div></div></div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
