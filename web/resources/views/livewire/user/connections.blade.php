<div data-v-15d61d2e="" class="card-body">
    <div data-v-01546580="" data-v-15d61d2e="" class="" data-placeholder-id="placeholder-24285c80-1637-11ec-9f0f-0f9cee781e83">
        <div data-v-6de7e15f="" data-v-01546580="" class="row no-gutters account align-items-center"
             data-v-15d61d2e="">
            <div data-v-6de7e15f="" class="col-12 col-xl-2 col-md-3 col-sm-12 pr-xl-3 pr-md-3 label">
                <div data-v-01546580="" data-v-6de7e15f="">Форум</div>
            </div>
            @if($forums)
                <div data-v-6de7e15f="" class="col-12 col-xl-7 col-md-5 col-sm-12">
                    <div data-v-01546580="" data-v-6de7e15f="">
                        <div data-v-38f21e12="" data-v-01546580="" class="connected-account" data-v-6de7e15f="">
                            <span data-v-38f21e12="" class="text">Подключено к {{ $forums->username }}</span>
                        </div>
                    </div>
                </div>
            @else
                <div data-v-6de7e15f="" class="col-12 col-xl-7 col-md-5 col-sm-12">
                    <div data-v-01546580="" data-v-6de7e15f="">
                        <span data-v-01546580="" data-v-6de7e15f="">Нет прикрепленной записи</span>
                    </div>
                </div>
                <div data-v-6de7e15f="" class="col-12 col-xl-3 col-md-4 col-sm-12 pl-xl-3 text-xl-right pl-md-3 text-md-right side">
                    <div data-v-01546580="" data-v-6de7e15f="" class="mt-3 mt-md-0 text-right">
                        <a data-v-01546580="" wire:click="confirmUserForums" wire:loading.attr="disabled"
                           href="javascript:void(0)" class="text-nowrap"
                           data-v-6de7e15f="">
                            <svg data-v-01546580="" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-plus fa-w-12"><path data-v-01546580="" fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z" class=""></path>
                            </svg> Прикрепить
                        </a>
                    </div>
                </div>

                <x-jet-dialog-modal wire:model="confirmingUserForums">
                    <x-slot name="title">
                        Прекрипить учетную запись
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Подтвердите пароль для прикрепления учетной записи. ') }}

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
                        <x-jet-danger-button class="ml-2" wire:click="connectionsUserForums" wire:loading.attr="disabled">
                            {{ __('Прекрипить') }}
                        </x-jet-danger-button>

                        <x-jet-secondary-button wire:click="$toggle('confirmingUserForums')" wire:loading.attr="disabled">
                            {{ __('Отмена') }}
                        </x-jet-secondary-button>
                    </x-slot>
                </x-jet-dialog-modal>
            @endif
        </div>
    </div>
</div>
