<div>
    <button type="submit" wire:click="$toggle('confirmSend')" wire:loading.attr="disabled" data-v-312dd04b=""
            data-v-7090ae16="" class="btn-tertiary btn" data-v-15d61d2e="">
        Выбрать
    </button>

    <x-jet-confirmation-modal wire:model="confirmSend">
        <x-slot name="title">
            @if($item->code === 'unmute')
                Снять мут с персонажа
            @else
                @if(auth()->user()->status && auth()->user()->status->active === 1)
                    Снять блокировку аккаунта
                @else
                    Блокировка не найдена.
                @endif
            @endif
        </x-slot>

        <x-slot name="content">
            <div data-v-0a034e2c="" class="row">
                <div data-v-0a034e2c="" class="overview-card col-12">
                    <div data-v-15d61d2e="" data-v-0a034e2c="" id="431329672" class="card account-overview-transactions">
                        <div data-v-15d61d2e="" class="card-body">
                            <div data-v-15d61d2e="" class="account-overview-transactions-table">
                                <div data-v-70ad3292="" data-v-15d61d2e="" class="account-table-container">
                                    <table data-v-483e03c5="" data-v-121e7cc8="" class="account-table thead-hide thead-no-border table-background-transparent table b-table table-dark">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th aria-colindex="3" class="d-none d-md-table-cell">Game Account Status</th>
                                            <th aria-colindex="4" class="d-none d-xl-table-cell">Last Played Date Millis</th>
                                            <th aria-colindex="5" class="d-none d-md-table-cell">Game Time View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($item->code === 'unmute')
                                            <tr>
                                                <td aria-colindex="2" class="align-middle">
                                                    <span data-v-121e7cc8="" class="text-light"></span>
                                                    <span data-v-121e7cc8="">{{ auth()->user()->active->name }} ({{ auth()->user()->active->level }})</span>
                                                    <div data-v-121e7cc8="">{{ auth()->user()->active->realmName }}</div>
                                                    <div data-v-121e7cc8="" class="d-md-none">
                                                        <div data-v-121e7cc8="" class="mt-4">
                                                            <div data-v-121e7cc8="" class="info-label">Время в игре</div>
                                                            <span data-v-121e7cc8="" class="text-light">{{ Text::totalTime(auth()->user()->active->totaltime) }}</span>
                                                        </div>
                                                        <div data-v-121e7cc8="" class="mt-4">
                                                            <div data-v-121e7cc8="" class="info-label">Последний вход</div>
                                                            <span data-v-121e7cc8="" class="text-light">{{ Text::lastLoginCharacters(auth()->user()->active->logout_time) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                                                    <span data-v-121e7cc8="" class="text-light">Время в игре</span>
                                                    <div data-v-121e7cc8="" class="info-label">{{ Text::totalTime(auth()->user()->active->totaltime) }}</div>
                                                </td>
                                                <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                                                    <span data-v-121e7cc8="" class="text-light">Последний вход</span>
                                                    <div data-v-121e7cc8="" class="info-label">{{ Text::lastLoginCharacters(auth()->user()->active->logout_time) }}</div>
                                                </td>
                                                <td aria-colindex="4" class="d-none d-xl-table-cell align-middle"></td>
                                                <td aria-colindex="5" class="d-none d-md-table-cell align-middle">
                                                    <span data-v-121e7cc8=""></span>
                                                </td>
                                            </tr>
                                        @else
                                            @if(auth()->user()->status && auth()->user()->status->active === 1)
                                                <tr class="">
                                                    <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                                                        @if(auth()->user()->status)
                                                            @if(auth()->user()->status->active === 1)
                                                                <span data-v-60053bb6="" class="text-warning">Неактивна</span>
                                                            @else
                                                                <span data-v-60053bb6="" class="info-label">Активна</span>
                                                            @endif
                                                        @else
                                                            <span data-v-60053bb6="" class="info-label">Активна</span>
                                                        @endif
                                                        <div data-v-60053bb6="" class="info-label">Состояние записи</div>
                                                    </td>
                                                    @if(auth()->user()->status)
                                                        @if(auth()->user()->status->active === 1)
                                                            <td aria-colindex="5" class="d-none d-xl-table-cell align-middle">
                                                                <div data-v-121e7cc8="" class="info-label">Заблокировал: {{ auth()->user()->status->bannedby }}</div>
                                                                <div data-v-121e7cc8="" class="text-light">Причина: {{ auth()->user()->status->banreason }}</div>
                                                            </td>
                                                            <td aria-colindex="6" class="d-none d-xl-table-cell align-middle">
                                                                <div data-v-121e7cc8="" class="info-label">Начало:
                                                                    {{ auth()->user()->status->bandate->format('d.m.Y H:i') }}
                                                                </div>
                                                                <div data-v-121e7cc8="" class="text-light">Окончание:
                                                                    @if(auth()->user()->status->bandate != auth()->user()->status->unbandate)
                                                                        {{ auth()->user()->status->unbandate->diffForHumans() }}
                                                                    @else
                                                                        Перманентный
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        @endif
                                                    @endif
                                                </tr>
                                            @endif
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmSend')" wire:loading.attr="disabled">
                {{ __('Отмена') }}
            </x-jet-secondary-button>

            @if(auth()->user()->status && auth()->user()->status->active === 1)
                <x-jet-danger-button class="ml-2" wire:click="send" wire:loading.attr="disabled">
                    {{ __('Отправить') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-confirmation-modal>
</div>
