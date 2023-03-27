<x-guest-layout>
    <x-jet-authentication-card>
        <div class="step" id="step-root">
            <div class="blizzard-logo"></div>
            <div class="step__content step__block" id="flow-content-container">
                <i class="phantom" id="step-meta-data" data-step-id="set-battletag" data-step-has-errors="false"></i>
                <h1 class="step__title step__block">Начать</h1>
                <p class="step__description step__block">Для создания учетной записи заполните все поля, расположенные ниже</p>

                <form method="POST" action="{{ route('register') }}" class="step__form step__block" id="register">
                    @csrf

                    <div class="step__field step__form__block">
                        <input class="step__input" valid="true" id="capture-username" data-capture-id="username"
                               name="username" placeholder="@lang('account.create_step_3_7')" type="text"
                               minlength="3" autocomplete="username" maxlength="16"/>
                        <span class="step__tooltip">
                                <span class="step__tooltip__anchor">
                                    <span class="step__tooltip__description">Используется для входа в игру. Может содержать в себе цифры и буквы английского алфавита</span>
                                </span>
                                <span class="step__tooltip__title">
                                    <span class="step__input-addon--show-password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
</svg>
                                </span>
                            </span>
                        </span>
                        <span class="step__field__indicator"></span>
                    </div>
                    @error('username')
                    <ul class="step__form__block step__field-errors" id="capture-error-email-container">
                        <li class="step__field-errors-item"> {{ $message }} </li>
                    </ul>
                    @enderror

                    <div class="step__field step__form__block">
                        <input class="step__input" valid="true" id="capture-name" data-capture-id="name" name="name"
                               placeholder="@lang('account.create_step_6_3', ['name' => config('app.name')])Tag"
                               type="text" autocomplete="nickname" maxlength="30" />
                        <span class="step__tooltip">
                                <span class="step__tooltip__anchor">
                                    <span class="step__tooltip__description">NightholdTAG - ваше публичное имя (никнейм), используется на форуме и виден всем другим игрокам. Не может быть одинаковым с вашим логином.</span>
                                </span>
                                <span class="step__tooltip__title">
                                    <span class="step__input-addon--show-password">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
</svg>
                                </span>
                            </span>
                        </span>
                        <span class="step__field__indicator"></span>
                    </div>

                    @error('name')
                    <ul class="step__form__block step__field-errors" id="capture-error-email-container">
                        <li class="step__field-errors-item">{{ $message }}</li>
                    </ul>
                    @enderror

                    <div class="step__field step__form__block">
                        <input class="step__input" valid="true" id="capture-email" data-capture-id="email"
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
                        <input class="step__input" valid="true" id="capture-password" data-capture-id="password"
                               name="password" placeholder="@lang('account.create_step_5_3')" type="password"
                               minlength="8" autocomplete="new-password" maxlength="16" data-blz-password-weak-error="@lang('account.create_step_5_4')" title="@lang('account.create_step_5_5')" />
                        <span class="step__input-addon--caps-alert" id="caps-alert"> <i class="fas fa-arrow-alt-square-up"></i> </span>
                        <span class="step__input-addon--show-password" id="show-password">
                            <i class="fas fa-eye-slash"></i>
                            <i class="fas fa-eye"></i>
                        </span>
                        <span class="step__field__indicator"></span>
                    </div>
                    @error('password')
                    <ul class="step__form__block step__field-errors" id="capture-error-password-container">
                        <li class="step__field-errors-item">{{ $message }}</li>
                    </ul>
                    @enderror

                    <progress class="step__password-strength-meter step__form__block" id="password-strength-bar" value="0"></progress>
                    <div class="step__password-strength-status step__form__block" id="password-strength-status" data-blz-password-strength-poor="@lang('account.create_step_5_6')" data-blz-password-strength-uncommon="@lang('account.create_step_5_7')" data-blz-password-strength-epic="@lang('account.create_step_5_8')">@lang('account.create_step_5_9')
                    </div>
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                        <div class="step__legal-checkboxes step__form__block" id="legal-checkboxes">
                            <label class="step__field--label step__form__block">
                                <x-jet-checkbox class="step__checkbox" name="terms" id="terms"/>
                                <span class="step__field__indicator--checkbox"> <svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" focusable="false" data-prefix="far" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M435.848 83.466L172.804 346.51l-96.652-96.652c-4.686-4.686-12.284-4.686-16.971 0l-28.284 28.284c-4.686 4.686-4.686 12.284 0 16.971l133.421 133.421c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-28.284-28.284c-4.686-4.686-12.284-4.686-16.97 0z"></path></svg><!-- <i class="far fa-check"></i> --></span>
                                <span class="step__field--label__text">{!! __('Я подтверждаю согласие на
                                :privacy_policy',
                                ['privacy_policy' => '<a target="_blank" href="https://nighthold.pro/privacy-policy">'.__
                                ('Политику конфиденциальности').' <svg class="svg-inline--fa fa-external-link fa-w-16" aria-hidden="true" focusable="false" data-prefix="far" data-icon="external-link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M497.6,0,334.4.17A14.4,14.4,0,0,0,320,14.57V47.88a14.4,14.4,0,0,0,14.69,14.4l73.63-2.72,2.06,2.06L131.52,340.49a12,12,0,0,0,0,17l23,23a12,12,0,0,0,17,0L450.38,101.62l2.06,2.06-2.72,73.63A14.4,14.4,0,0,0,464.12,192h33.31a14.4,14.4,0,0,0,14.4-14.4L512,14.4A14.4,14.4,0,0,0,497.6,0ZM432,288H416a16,16,0,0,0-16,16V458a6,6,0,0,1-6,6H54a6,6,0,0,1-6-6V118a6,6,0,0,1,6-6H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V304A16,16,0,0,0,432,288Z"></path></svg></a>',
                            ]) !!}</span>
                            </label>
                        </div>
                        @error('terms')
                        <ul class="step__form__block step__field-errors" id="capture-error-legal-container">
                            <li class="step__field-errors-item">{{ $message }}</li>
                        </ul>
                        @enderror
                    @endif

                    <button type="submit" class="step__button--primary step__block" data-sitekey="6LdmpDQcAAAAAPHSJALNtAjgsoExfRXdxt8740hf"
                            data-callback='onSubmit'
                            data-action='submit'>@lang('account.create_step_2_6')</button>
                </form>
                <div class="step__hr step__block">
                    <span class="step__hr__title">Или</span>
                </div>
                <div class="step__block">Уже есть учетная запись? <a href="{{ route('login') }}">Вход</a>
                </div>
            </div>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
