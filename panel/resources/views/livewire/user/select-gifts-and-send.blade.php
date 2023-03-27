<div>
    <button type="submit" wire:click="$toggle('confirmGiftSend')" wire:loading.attr="disabled"
            data-v-15d61d2e="" class="btn-tertiary btn">
        Использовать
    </button>
    <x-jet-confirmation-modal wire:model="confirmGiftSend">
        <x-slot name="title">
            {{ __('Выбранный персонаж. Сменить можно во вкладке "Персонажи"') }}
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
            <x-jet-secondary-button wire:click="$toggle('confirmGiftSend')" wire:loading.attr="disabled">
                {{ __('Отмена') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="sendGifts" wire:loading.attr="disabled">
                {{ __('Отправить') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
