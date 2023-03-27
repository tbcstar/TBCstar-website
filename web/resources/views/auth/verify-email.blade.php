<x-guest-layout>
    <x-jet-authentication-card>
        <div class="inner-wrapper">
            <div class="box-wrapper ">
                <h1 class="logo ">Авторизация</h1>
                <div class="hide" id="info-wrapper">
                    <h2><strong class="info-title"></strong></h2>
                    <p class="info-body"></p>
                    <button class="btn btn-block hide visible-phone" id="info-phone-close">Закрыть</button>
                </div>
                <div class="input" id="login-wrapper">
                    <div class="login">

                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('Спасибо за регистрацию! Прежде чем начать, не могли бы вы подтвердить свой адрес электронной почты, щелкнув ссылку, которую мы только что отправили вам? Если вы не получили письмо, мы с радостью отправим вам другое.') }}
                        </div>
                        <br>
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-icon alert-info">
                                {{ __('На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.') }}
                            </div>
                        @endif

                        <x-jet-validation-errors class="alert alert-icon alert-error" />

                        <form method="POST" action="{{ route('verification.send') }}" class="username-required input-focus form-with-captcha">
                            @csrf

                            <div class="control-group submit ">
                                <x-jet-button type="submit" id="submit" data-loading-text="" class="btn-block btn
                                btn-primary btn-block ">
                                    <i class="spinner-battlenet"></i>
                                    {{ __('Выслать повторно письмо для подтверждения') }}
                                </x-jet-button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('logout') }}" class="username-required input-focus form-with-captcha">
                            @csrf
                            <div class="control-group submit ">
                                <button type="submit" id="submit" data-loading-text="" class="btn-block btn
                                btn-primary btn-block ">
                                    <i class="spinner-battlenet"></i>
                                    {{ __('Выйти') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <img src="{{ asset('static/images/toolkit/themes/bnet/icons/sprite-24-red.0PPlX.png') }}" class="hide" />
            <img src="{{ asset('static/images/toolkit/themes/bnet/spinners/spinner-battlenet.1IdwV.png') }}" class="hide" />
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
