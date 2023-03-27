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
                        @if (session('status'))
                            <div class="alert alert-icon alert-info">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}" class="username-required input-focus form-with-captcha">
                                @csrf

                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="control-group ">
                                    <label id="accountName-label" class="control-label"
                                           for="accountName">@lang('account.login_5')</label>
                                    <div class="controls">
                                        <x-jet-input id="accountName" placeholder="E-Mail" class="input-block"
                                                     type="email" name="email"
                                                     :value="old('email', $request->email)" required autofocus />
                                        <span class="input-after"></span>
                                        @error('email')<span class="error-helper error-helper-accountName status-warning" style="display: block;">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label id="password-label" class="control-label"
                                           for="password">@lang('account.login_7')</label>
                                    <div class="controls">
                                        <x-jet-input id="password" class="input-block" type="password" name="password" required autocomplete="current-password" spellcheck="false"
                                                     data-password-show-aria="@lang('account.login_9')"
                                                     data-password-hide-aria="@lang('account.login_10')"
                                                     placeholder="Пароль" />
                                        <span class="input-after"></span>
                                        @error('password')<span class="error-helper error-helper-password status-warning" style="display: block;">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="control-group ">
                                <label id="password-label" class="control-label"
                                       for="password">@lang('account.login_7')</label>
                                <div class="controls">
                                    <x-jet-input id="password" class="input-block" type="password" name="password_confirmation" required autocomplete="current-password" spellcheck="false"
                                                 data-password-show-aria="@lang('account.login_9')"
                                                 data-password-hide-aria="@lang('account.login_10')"
                                                 placeholder="Повторите пароль" />
                                    <span class="input-after"></span>
                                    @error('password')<span class="error-helper error-helper-password status-warning" style="display: block;">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="control-group submit ">
                                <button
                                    type="submit"
                                    id="submit"
                                    class="btn-block btn btn-primary btn-block "
                                    data-loading-text=""
                                    tabindex="0"
                                >
                                    Сохранить
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
</x-guest-layout>
