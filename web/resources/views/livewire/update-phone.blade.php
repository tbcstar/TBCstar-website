<div data-v-15d61d2e="" class="card-body">
    <div x-show=!updatePhone data-v-9b2a6982="" data-v-15d61d2e="">
        <div data-v-9b2a6982="" data-v-15d61d2e="" id="placeholder-88" class="hide">
            <div data-v-9b2a6982="" data-v-15d61d2e="">
                <div data-v-9b2a6982="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                    <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-4 col-sm-3 col-md-3 col-xl-2 label">
                        Номер телефона
                    </div>
                    <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-8 col-sm-9 col-md-9 col-xl-10">
                        <span data-v-9b2a6982="" data-v-15d61d2e="" class="placeholder-l animated-background"></span>
                    </div>
                </div>
            </div>
        </div>
        <div data-v-9b2a6982="" data-v-15d61d2e="" class="">
            <div data-v-9b2a6982="" data-v-15d61d2e="">
                <div data-v-9b2a6982="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                    <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-sm-12 col-sm-3 col-md-3 col-xl-2 label">Номер телефона</div>
                    <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-sm-12 col-sm-4 col-md-4 col-xl-2">
                        <div data-v-9b2a6982="" data-v-15d61d2e="">{{ auth()->user()->phone_hidden }}</div>
                    </div>
                    @if(auth()->user()->phone_number)
                        <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-sm-12 col-sm-5 col-md-5 col-xl-8">
                            <a data-v-9b2a6982="" href="javascript:void(0)" wire:click="confirmUserDelete" wire:loading.attr="disabled" class="link float-md-right"
                               data-v-15d61d2e="">Удалить</a>
                        </div>

                        <x-jet-dialog-modal wire:model="confirmingUserDelete">
                            <x-slot name="title">
                                ВЫ УВЕРЕНЫ?
                            </x-slot>

                            <x-slot name="content">
                                {{ __('Если вы отключите эту функцию, уровень безопасности вашей записи понизится. Отключить?') }}

                                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                                 placeholder="{{ __('Пароль') }}"
                                                 x-ref="password"
                                                 wire:model.defer="password"
                                                 wire:keydown.enter="deleteUser" />

                                    <x-jet-input-error for="password" class="mt-2" />
                                </div>
                            </x-slot>

                            <x-slot name="footer">
                                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                                    {{ __('Прекрипить') }}
                                </x-jet-danger-button>

                                <x-jet-secondary-button wire:click="$toggle('confirmingUserDelete')" wire:loading.attr="disabled">
                                    {{ __('Отмена') }}
                                </x-jet-secondary-button>
                            </x-slot>
                        </x-jet-dialog-modal>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div x-show=updatePhone data-v-53d343a4="" data-v-15d61d2e="">
        <div data-v-53d343a4="" data-v-15d61d2e="" >
            <div data-v-53d343a4="" data-v-15d61d2e="" class="mt-4">
                Номер телефона
            </div>
            <div data-v-53d343a4="" data-v-15d61d2e="" class="mt-4"></div>
            <form wire:submit.prevent="protectionValidate" data-v-53d343a4="" data-v-15d61d2e="">
                <div data-v-53d343a4="" data-v-15d61d2e="" class="row">
                    <div data-v-53d343a4="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                        <input data-v-53d343a4="" data-v-15d61d2e="" type="tel" wire:model.defer="state.phone_number"
                               data-vv-as="номер телефона" placeholder="Введите номер телефона" class="" aria-required="true" aria-invalid="true">
                        <x-jet-input-error for="state.phone_number" class="mt-2" />
                    </div>
                </div>
                <div data-v-53d343a4="" data-v-15d61d2e="" class="row mt-4">
                    <div data-v-53d343a4="" data-v-15d61d2e="" class="col-12">
                        <button wire:click="protection" x-on:click="updatePhone = false" data-v-312dd04b="" data-v-53d343a4="" class="btn-primary
                    mr-3 btn" data-v-15d61d2e="">
                            Продолжить
                        </button>
                        <button x-on:click="updatePhone = false" data-v-312dd04b="" data-v-53d343a4="" class="btn-secondary mt-3 mt-md-0 btn" type="button" data-v-15d61d2e="">
                            Отмена
                        </button>
                        <x-jet-action-message data-v-312dd04b="" data-v-112a4620=""
                                              data-v-15d61d2e="" class="ml-md-3 mt-3 mt-md-0" on="saved">
                            {{ __('Saved.') }}
                        </x-jet-action-message>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
