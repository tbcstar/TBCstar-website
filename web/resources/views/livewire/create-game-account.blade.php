<div>
    <form wire:submit.prevent="createValidate">
        <div data-v-2d0dc31c="" data-v-15d61d2e="">

            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                    Дополнение
                </div>
                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                    <select data-v-8dca2dd6="" wire:model="option" data-v-7c3c8cd5="" id="country" title=""
                            class="grid-100 input-block" data-v-15d61d2e="">
                        <option value="">Выбрать</option>
                        <option value="wotlk">Wrath of the Lich King</option>
                        <option value="sl" disabled>Shadowlands</option>
                    </select>
                    <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="help-block"></span>
                </div>
            </div>

            @if($option === 'wotlk')

                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                    <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                        Логин
                    </div>
                    <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                        <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" wire:model="username"
                               placeholder="Логин" data-vv-as="Логин" aria-required="true" aria-invalid="false"
                               class="input-block">
                        <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                        <x-jet-input-error for="username" class="mt-2" />
                    </div>
                </div>

                <div data-v-6061b8eb="" data-v-15d61d2e="" class="row mt-3">
                    <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label
                    tall-text">Пароль</div>
                    <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                        <div data-v-75bcaa18="" data-v-6061b8eb="" data-v-15d61d2e="" class="blz-password input-block">
                            <div data-v-75bcaa18="" class="password-reveal-wrapper">
                                <input data-v-75bcaa18="" placeholder="Подтвердите пароль"
                                       type="password" wire:model="password" autocomplete="password" maxlength="16"
                                       data-vv-as="Подтвердите пароль">
                            </div>
                        </div>
                        <x-input-error-profile for="password" class="mt-2" />
                    </div>
                </div>
            @endif

            @if($option === 'sl')

                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                    <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                        E-Mail
                    </div>
                    <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                        <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" wire:model="email" disabled
                               placeholder="E-Mail" data-vv-as="E-Mail" aria-required="true" aria-invalid="false"
                               class="input-block">
                        <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>
                </div>

                <div data-v-6061b8eb="" data-v-15d61d2e="" class="row mt-3">
                    <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label
                    tall-text">Пароль</div>
                    <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                        <div data-v-75bcaa18="" data-v-6061b8eb="" data-v-15d61d2e="" class="blz-password input-block">
                            <div data-v-75bcaa18="" class="password-reveal-wrapper">
                                <input data-v-75bcaa18="" placeholder="Подтвердите пароль"
                                       type="password" wire:model="password" autocomplete="password" maxlength="16"
                                       data-vv-as="Подтвердите пароль">
                            </div>
                        </div>
                        <x-input-error-profile for="password" class="mt-2" />
                    </div>
                </div>
            @endif
            <div data-v-2d0dc31c="" data-v-15d61d2e="" class="row mt-4">
                <button wire:click="create" type="submit" data-v-312dd04b=""
                        data-v-2d0dc31c="" data-v-15d61d2e=""
                        class="btn-primary mr-3 btn">Продолжить</button>
                <button x-on:click="create = false" type="button" data-v-312dd04b=""
                        data-v-112a4620="" data-v-15d61d2e="" class="btn-secondary mr-3 btn">
                    Отмена
                </button>
                <div wire:loading wire:target="create">
                    Processing...
                </div>
                <x-jet-action-message data-v-312dd04b=""
                                      data-v-112a4620="" data-v-15d61d2e="" class="btn-secondary btn" on="saved">
                    {{ __('Учетная запись успешно создана.') }}
                </x-jet-action-message>
            </div>
        </div>
    </form>
</div>
