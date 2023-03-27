<x-login-layout>
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
                            {{ __('Забыли свой пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы пришлем вам ссылку для сброса пароля.') }}
                        </div>
                        <br>
                        @if (session('status'))
                            <div class="alert alert-icon alert-info">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-jet-validation-errors class="alert alert-icon alert-error" />

                        <form method="POST" action="{{ route('password.email') }}" class="username-required input-focus form-with-captcha">
                            @csrf

                            <div class="block">
                                <x-jet-input id="email" placeholder="E-Mail" class="input-block" type="email"
                                             name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="control-group submit ">
                                <button
                                    type="submit"
                                    id="submit"
                                    class="btn-block btn btn-primary btn-block "
                                    data-loading-text=""
                                    tabindex="0"
                                >
                                    Сбросить пароль
                                    <i class="spinner-battlenet"></i>
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
</x-login-layout>
