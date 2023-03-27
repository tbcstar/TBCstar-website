<form data-v-6061b8eb="" data-v-15d61d2e="" wire:submit.prevent="updatePassword">

    <div data-v-6061b8eb="" data-v-15d61d2e="" class="row">
        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label tall-text">Старый пароль</div>
        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
            <div data-v-75bcaa18="" data-v-6061b8eb="" data-v-15d61d2e="" class="blz-password input-block">
                <div data-v-75bcaa18="" class="password-reveal-wrapper">
                    <input data-v-75bcaa18="" id="old-password" placeholder="Введите старый пароль" type="password" wire:model.defer="state.current_password" autocomplete="current-password" maxlength="128" data-vv-as="Старый пароль">
                </div>
            </div>
            <x-input-error-profile for="current_password" class="mt-2" />
        </div>
    </div>
    <div data-v-6061b8eb="" data-v-15d61d2e="" class="row mt-3">
        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label tall-text">Новый пароль</div>
        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
            <div data-v-75bcaa18="" data-v-6061b8eb="" data-v-15d61d2e="" aria-required="false" aria-invalid="false" class="blz-password input-block">
                <div data-v-75bcaa18="" class="password-reveal-wrapper">
                    <input data-v-75bcaa18="" id="new-password" placeholder="Введите новый пароль" type="password" wire:model.defer="state.password" autocomplete="new-password" maxlength="128" data-vv-as="Новый пароль">
                    <span data-v-75bcaa18="" class="caps-lock-indicator"></span>
                </div>
            </div>
            <x-input-error-profile for="password" class="mt-2" />
        </div>
    </div>

    <div data-v-6061b8eb="" data-v-15d61d2e="" class="row mt-3">
        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label tall-text">Подтвердите пароль</div>
        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
            <div data-v-75bcaa18="" data-v-6061b8eb="" data-v-15d61d2e="" aria-required="false" aria-invalid="false" class="blz-password input-block">
                <div data-v-75bcaa18="" class="password-reveal-wrapper">
                    <input data-v-75bcaa18="" id="password_confirmation" placeholder="Подтвердите новый пароль"
                           type="password" wire:model.defer="state.password_confirmation" autocomplete="new-password" maxlength="128" data-vv-as="Новый пароль">
                    <span data-v-75bcaa18="" class="caps-lock-indicator"></span>
                </div>
            </div>
            <x-input-error-profile for="password_confirmation" class="mt-2" />
        </div>
    </div>

    <div data-v-6061b8eb="" data-v-15d61d2e="" class="row mt-3">
        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col offset-md-3 offset-lg-3 offset-xl-2">

            <button data-v-312dd04b="" data-v-6061b8eb="" id="password-submit" type="submit" data-v-15d61d2e="" class="btn-primary btn">
                Сохранить
            </button>

            <x-jet-action-message on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
        </div>
    </div>
</form>
