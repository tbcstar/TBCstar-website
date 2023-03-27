<x-account-layout>
    <div x-data="{create: false}" x-cloak>
        <div data-v-ba34107c="" class="title-bar text-center text-lg-left position-relative">
            <h1 data-v-ba34107c="">Игры</h1>
            <div data-v-ba34107c="" class="back d-lg-none position-absolute">
                <a data-v-ba34107c="" href="/" class="router-link-active">
                    <svg data-v-ba34107c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8"><path data-v-ba34107c="" fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path>
                    </svg>
                </a>
            </div>
        </div>

        @if(!auth()->user()->wotlk)
        <div x-show=!create data-v-15d61d2e="" class="card account-overview-transactions ">
            <div data-v-15d61d2e="" class="card-title">
                    <div data-v-15d61d2e="" class="row">
                        <div data-v-15d61d2e="" class="col-12 col-md-6">
                            <h3 data-v-15d61d2e="" class="text-uppercase">Игры</h3>
                        </div>
                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                            @if(!auth()->user()->wotlk)
                            <a x-on:click="create = true" data-v-7c3c8cd5=""
                               data-v-15d61d2e=""
                               class="card-header-link float-md-right" href="javascript:void(0)">
                                Добавить
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-15d61d2e="" class="account-overview-games-table">
                    <table data-v-483e03c5="" data-v-121e7cc8="" class="account-table thead-hide thead-no-border table-background-transparent table b-table table-dark">
                        <thead class="thead-dark">
                        <tr>
                            <th aria-colindex="1" class="w-md-auto5">Аккаунт</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                        У вас нет игровых аккаунтов.
                    </div>
                </div>
            </div>
        </div>
        @else
        <div x-show=!create data-v-15d61d2e="" class="card mt-card-top account-overview-games ">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">Игры</h3>
                    </div>
                    <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                        @if(!auth()->user()->wotlk)
                        <a x-on:click="create = true" data-v-7c3c8cd5=""
                           data-v-15d61d2e=""
                           class="card-header-link float-md-right" href="javascript:void(0)">
                            Добавить
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                    <div data-v-15d61d2e="" class="account-overview-games-table">
                        <table data-v-483e03c5="" data-v-121e7cc8="" class="account-table thead-hide thead-no-border table-background-transparent table b-table table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th aria-colindex="1" class="game-icon">Regional Game Franchise Icon Filename</th>
                                    <th aria-colindex="2">Localized Game Name</th>
                                    <th aria-colindex="3" class="d-none d-md-table-cell">Game Account Status</th>
                                    <th aria-colindex="4" class="d-none d-xl-table-cell">Last Played Date Millis</th>
                                    <th aria-colindex="5" class="d-none d-md-table-cell">Game Time View</th>
                                    <th aria-colindex="6" class="d-none d-md-table-cell">Links</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td aria-colindex="1" class="game-icon">
                                        <div data-v-60053bb6="">
                                            <img data-v-60053bb6="" src="{{ asset('images/world-of-warcraft.svg') }}" class="d-block float-left">
                                        </div>
                                    </td>
                                    <td aria-colindex="2" class="align-middle">
                                        <span data-v-60053bb6="" class="text-light">WoW: Wrath of the Lich King®</span>
                                        <span data-v-60053bb6=""></span>
                                        <div data-v-60053bb6="">({{ auth()->user()->wotlk->username }})</div>
                                        <div data-v-60053bb6="" class="d-md-none">
                                            <div data-v-60053bb6="" class="mt-4">
                                                <div data-v-60053bb6="" class="info-label">Состояние записи</div>
                                                @if(auth()->user()->wotlk->status)
                                                    @if(auth()->user()->wotlk->status->active === 1)
                                                        <span data-v-60053bb6="" class="text-warning">Неактивна</span>
                                                    @else
                                                        <span data-v-60053bb6="" class="info-label">Активна</span>
                                                    @endif
                                                @else
                                                    <span data-v-60053bb6="" class="info-label">Активна</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div data-v-60053bb6="" class="d-md-none mt-4 account-links">
                                            <div data-v-60053bb6="">
                                                @if(auth()->user()->wotlk->status)
                                                    @if(auth()->user()->wotlk->status->active === 1)
                                                        <div data-v-121e7cc8="" class="info-label">Заблокировал: {{ auth()->user()->wotlk->status->bannedby }}</div>
                                                        <div data-v-121e7cc8="" class="text-light">Причина: {{ auth()->user()->wotlk->status->banreason }}</div>
                                                        <div data-v-121e7cc8="" class="info-label">Начало:
                                                            {{ auth()->user()->wotlk->status->bandate->diffForHumans() }}
                                                        </div>
                                                        <div data-v-121e7cc8="" class="text-light">Окончание:
                                                            @if(auth()->user()->wotlk->status->bandate != auth()->user()->wotlk->status->unbandate)
                                                                {{ auth()->user()->wotlk->status->unbandate->diffForHumans() }}
                                                            @else
                                                                Перманентный
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                                        @if(auth()->user()->wotlk->status)
                                            @if(auth()->user()->wotlk->status->active === 1)
                                                <span data-v-60053bb6="" class="text-warning">Неактивна</span>
                                            @else
                                                <span data-v-60053bb6="" class="info-label">Активна</span>
                                            @endif
                                        @else
                                            <span data-v-60053bb6="" class="info-label">Активна</span>
                                        @endif
                                        <div data-v-60053bb6="" class="info-label">Состояние записи</div>
                                    </td>
                                    <td aria-colindex="4" class="d-none d-xl-table-cell align-middle">
                                        <div data-v-60053bb6="" class="text-light">
                                            @empty(auth()->user()->wotlk->last_login)
                                                {{ auth()->user()->wotlk->joindate->diffForHumans() }}
                                            @else
                                                {{ auth()->user()->wotlk->last_login->diffForHumans() }}
                                            @endempty
                                        </div>
                                        <div data-v-60053bb6="" class="info-label">Последняя игра</div>
                                    </td>
                                    @if(auth()->user()->wotlk->status)
                                        @if(auth()->user()->wotlk->status->active === 1)
                                            <td aria-colindex="5" class="d-none d-xl-table-cell align-middle">
                                                <div data-v-121e7cc8="" class="info-label">Заблокировал: {{ auth()->user()->wotlk->status->bannedby }}</div>
                                                <div data-v-121e7cc8="" class="text-light">Причина: {{ auth()->user()->wotlk->status->banreason }}</div>
                                            </td>
                                            <td aria-colindex="6" class="d-none d-xl-table-cell align-middle">
                                                <div data-v-121e7cc8="" class="info-label">Начало:
                                                    {{ auth()->user()->wotlk->status->bandate->format('d.m.Y H:i') }}
                                                </div>
                                                <div data-v-121e7cc8="" class="text-light">Окончание:
                                                    @if(auth()->user()->wotlk->status->bandate != auth()->user()->wotlk->status->unbandate)
                                                        {{ auth()->user()->wotlk->status->unbandate->diffForHumans() }}
                                                    @else
                                                        Перманентный
                                                    @endif
                                                </div>
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        @endif
        <div x-show=create data-v-15d61d2e="" class="card mt-card-top
        account-overview-games ">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">Игры</h3>
                    </div>
                    <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                        @if(!auth()->user()->wotlk)
                        <a x-on:click="create = true" data-v-7c3c8cd5=""
                           data-v-15d61d2e=""
                           class="card-header-link float-md-right" href="javascript:void(0)">
                            Добавить
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div @click.away="create = false" data-v-15d61d2e="" class="card-body" >
            <div data-v-112a4620="" data-v-15d61d2e="">
                <div data-v-112a4620="" data-v-15d61d2e="">

                    <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="edit-info">
                        <livewire:create-game-account />
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-account-layout>
