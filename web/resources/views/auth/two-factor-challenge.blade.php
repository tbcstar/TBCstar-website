<x-guest-layout>
    <x-jet-authentication-card>
        <div x-data="{ recovery: false }" class="inner-wrapper">
            <div class="box-wrapper ">
                <h1 class="logo ">Авторизация</h1>
                <div class="hide" id="info-wrapper">
                    <h2><strong class="info-title"></strong></h2>
                    <p class="info-body"></p>
                    <button class="btn btn-block hide visible-phone" id="info-phone-close">Закрыть</button>
                </div>
                <div class="input" id="login-wrapper">
                    <div class="login">
                        @if (session('status'))
                            <div class="alert alert-icon alert-info">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-icon alert-info" x-show="! recovery">
                            {{ __('Пожалуйста, подтвердите доступ к своей учетной записи, введя код аутентификации, предоставленный вашим приложением аутентификации.') }}
                        </div>

                        <div class="alert alert-icon alert-info" x-show="recovery">
                            {{ __('Подтвердите доступ к своей учетной записи, введя один из кодов аварийного восстановления.') }}
                        </div>
                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf
                            <div id="login-input-container" class="">

                                <div id="js-errors" class="alert alert-error alert-icon hide" role="alert"
                                     aria-relevant="additions removals" data-support-aria="@lang('account.login_15')">
                                    <p id="cookie-check" class="hide">@lang('account.login_3')</p>
                                </div>

                                <x-jet-validation-errors class="mb-4" />

                                <noscript>
                                    <div id="javascript-disabled" class="alert alert-error alert-icon">
                                        @lang('account.login_4')
                                    </div>
                                </noscript>

                                <div class="control-group" x-show="! recovery">
                                    <x-jet-label for="code" class="control-label" value="{{ __('Code') }}" />
                                    <div class="controls">
                                        <x-jet-input id="code" class="input-block" type="text" inputmode="numeric"
                                                     name="code" autofocus x-ref="code" autocomplete="one-time-code"
                                                     placeholder="Введите код" />
                                    </div>
                                </div>

                                <div class="control-group" x-show="recovery">
                                    <x-jet-label class="control-label" for="recovery_code" value="{{ __('Recovery
                                    Code') }}" />
                                    <div class="controls">
                                        <x-jet-input id="recovery_code" class="input-block" type="text"
                                                     name="recovery_code" x-ref="recovery_code"
                                                     autocomplete="one-time-code" placeholder="Введите код восстановления" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group submit ">
                                <button
                                    type="submit"
                                    id="submit"
                                    class="btn-block btn btn-primary btn-block "
                                    data-loading-text=""
                                    tabindex="0">
                                    Подтвердить
                                    <i class="spinner-battlenet"></i>
                                </button>
                            </div>
                        </form>
                        <div class="thirdparty-line">
                            <span>Или</span>
                        </div>
                        <ul id="help-links" role="navigation">
                            <button type="button" class="btn btn-tertiary"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                                {{ __('Использовать код восстановления') }}
                            </button>

                            <button type="button" class="btn btn-tertiary"
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                                {{ __('Использовать код аутентификации') }}
                            </button>
                        </ul>
                    </div>
                </div>
            </div>
            <img src="{{ asset('static/images/toolkit/themes/bnet/icons/sprite-24-red.0PPlX.png') }}" class="hide" />
            <img src="{{ asset('static/images/toolkit/themes/bnet/spinners/spinner-battlenet.1IdwV.png') }}" class="hide" />
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
