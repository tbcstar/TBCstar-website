<x-guest-layout>
    <x-jet-authentication-card>
        <div class="step" id="step-root">
            <div class="blizzard-logo"></div>
            <div class="step__content step__block" id="flow-content-container">
                <i class="phantom" id="step-meta-data" data-step-id="set-battletag" data-step-has-errors="false"></i>
                <h1 class="step__title step__block"></h1>
                <p class="step__description step__block">{{ __('您忘记密码了吗？没问题。请告诉我们您的电子邮件地址，我们将向您发送重置密码的链接。') }}</p>

                <form action="{{ route('password.update') }}" method="post" id="password-form" novalidate="novalidate" class="step__form step__block" >
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="step__field step__form__block">
                        <input class="step__input" valid="true" id="capture-email" data-capture-id="email" value="{{ old('email', $request->email) }}"
                               name="email" placeholder="@lang('account.create_step_3_5')" type="email" minlength="3"
                               autocomplete="email" maxlength="30" />
                        <span class="step__field__indicator"></span>
                    </div>
                    @error('email')
                    <ul class="step__form__block step__field-errors" id="capture-error-email-container">
                        <li class="step__field-errors-item">{{ $message }}</li>
                    </ul>
                    @enderror

                    <div class="step__field step__form__block">
                        <input class="step__input"
                               name="password" placeholder="Пароль" type="password" minlength="3" maxlength="30" />
                        <span class="step__field__indicator"></span>
                    </div>
                    @error('password')
                    <ul class="step__form__block step__field-errors" id="capture-error-email-container">
                        <li class="step__field-errors-item">{{ $message }}</li>
                    </ul>
                    @enderror

                    @if (session('status'))
                        <div class="alert alert-icon alert-info">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="submit" class="step__button--primary step__block">保存</button>
                </form>

                <div class="step__hr step__block">
                    <span class="step__hr__title">或者</span>
                </div>
                <div class="step__block">
                    <a href="{{ route('register') }}">创建帐户</a>
                </div>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
