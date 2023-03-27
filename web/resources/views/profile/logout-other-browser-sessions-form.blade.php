<x-jet-action-section>
    <x-slot name="title">
        <div data-v-06fe2774="" data-v-15d61d2e="" class="row">
            <div data-v-06fe2774="" data-v-15d61d2e="" class="col-12 col-md-9">
                <h3 data-v-06fe2774="" data-v-15d61d2e="">Недавняя активность входа на учетную запись</h3>
            </div>
            <div data-v-06fe2774="" data-v-15d61d2e="" class="col-12 col-md-3">
                <a href="javascript:void(0)" class="card-header-link float-md-right" data-v-06fe2774=""
                   data-v-15d61d2e="" wire:click="confirmLogout" wire:loading.attr="disabled">
                    {{ __('Выйти со всех устройств ') }}
                </a>
            </div>
        </div>
    </x-slot>

    <x-slot name="description">
        <div data-v-06fe2774="" data-v-15d61d2e="">
            <div data-v-4918d6bc="" data-v-06fe2774="" class="alert-message info" data-v-15d61d2e="">
                <div data-v-4918d6bc="" class="d-none icon"></div>
                <div data-v-4918d6bc="" class="">
                    <h3 data-v-4918d6bc="" class="uppercase"></h3>
                    <span data-v-06fe2774="">Заметили подозрительную активность?</span> <a data-v-06fe2774="" href="javascript:void(0)">
                        Пожалуйста, обновите пароль для обеспечения безопасности учетной записи.
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="content">
        @if (count($this->sessions) > 0)
            <div data-v-06fe2774="" data-v-15d61d2e="" class="" data-placeholder-id="placeholder-15e4d880-eaed-11eb-b955-53958dd53a20">
                <div data-v-06fe2774="" data-v-15d61d2e="">
                    <table data-v-483e03c5="" data-v-06fe2774="" aria-busy="false" aria-colcount="4" class="devices-table table b-table table-dark" sort-direction="asc" data-v-15d61d2e="" id="__BVID__93_">
                        <thead class="thead-dark">
                        <tr>
                            <th aria-colindex="1" class="icon d-table-cell align-middle">Regional Franchise Icon</th>
                            <th aria-colindex="2" class="d-table-cell align-middle">Localized Name</th>
                            <th aria-colindex="3" class="d-none d-md-table-cell align-middle">Login Date</th>
                            <th aria-colindex="4" class="d-none d-md-table-cell align-middle">Login Location</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        @foreach ($this->sessions as $session)
                            <tr class="">
                                <td aria-colindex="1" class="icon d-table-cell align-middle">
                                    <div data-v-06fe2774="">
                                        <img data-v-06fe2774="" src="{{ asset('static/game-icons/battle-net-web.svg') }}" class="d-block float-left">
                                    </div>
                                </td>
                                <td aria-colindex="2" class="d-table-cell align-middle">
                                    <div data-v-06fe2774="" class="text-light">Сайт</div>
                                    <div data-v-06fe2774="" class="label">{{ $session->agent->platform() }} - {{ $session->agent->browser() }}</div>
                                    <div data-v-06fe2774="" class="d-md-none">
                                        <span data-v-06fe2774="" class="text-light">{{ $session->last_active }}</span>
                                        <div data-v-06fe2774="" class="text-light">
                                <span data-v-06fe2774="">{{ $session->ip_address }}
                                <!--span data-v-06fe2774="">,</span-->
                                </span>
                                            <!--span data-v-06fe2774="">Российская Федерация</span-->
                                        </div>
                                    </div>
                                </td>
                                <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                                    <span data-v-06fe2774="" class="text-light">{{ $session->last_active }}</span>
                                </td>
                                <td aria-colindex="4" class="d-none d-md-table-cell align-middle">
                                    <div data-v-06fe2774="" class="text-light">
                            <span data-v-06fe2774="">{{ $session->ip_address }}
                            <!--span data-v-06fe2774="">,</span-->
                            </span> <!--span data-v-06fe2774="">Российская Федерация</span-->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div data-v-06fe2774="" data-v-15d61d2e="" class="label total-logins">
                        Информация о последних активных входах на учетную запись.
                    </div>
                </div>
            </div>
        @endif

        <x-jet-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                {{ __('Log Out Other Browser Sessions') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                 placeholder="{{ __('Password') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2"
                              wire:click="logoutOtherBrowserSessions"
                              wire:loading.attr="disabled">
                    {{ __('Log Out Other Browser Sessions') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
