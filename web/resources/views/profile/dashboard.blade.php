<x-account-layout>
    <div data-v-0a034e2c="" class="account-overview">
        <div data-v-0a034e2c="" class="title-bar">
            <h1 data-v-0a034e2c="">@lang('account.account_1')</h1>
        </div>
        @if(!auth()->user()->email_verified_at && !session('message'))
        <div data-v-4918d6bc="" data-v-0a034e2c="" class="m-0 alert-message info clearfix">
            <div data-v-4918d6bc="" class="float-left icon">
                <svg data-v-0a034e2c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-exclamation-triangle fa-w-18 fa-3x"><path data-v-0a034e2c="" fill="currentColor" d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z" class=""></path>
                </svg>
            </div>
            <div data-v-4918d6bc="" class="float-left reduced-width">
                <h3 data-v-4918d6bc="" class="uppercase"></h3>
                <span data-v-0a034e2c="">
                        <span data-v-0a034e2c="" class="label notification-title">
				@lang('account.account_2', ['email' => auth()->user()->email])
			        </span>
                        <span data-v-0a034e2c="" class="description">
                            @lang('account.account_3')
			            </span>
                        <span data-v-0a034e2c="" class="banner-link">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <x-jet-button data-v-0a034e2c="" type="submit">
                                        @lang('account.account_4')
                                    </x-jet-button>
                                </div>
                            </form>
                        </span>
                    </span>
            </div>
        </div>
        @endif
        @if(session('message'))
        <div data-v-4918d6bc="" data-v-0a034e2c="" class="m-0 alert-message info clearfix">
            <div data-v-4918d6bc="" class="float-left icon">
                <svg data-v-0a034e2c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-exclamation-triangle fa-w-18 fa-3x"><path data-v-0a034e2c="" fill="currentColor" d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z" class=""></path>
                </svg>
            </div>
            <div data-v-4918d6bc="" class="float-left reduced-width">
                <h3 data-v-4918d6bc="" class="uppercase"></h3>
                <span data-v-0a034e2c="">
                        <span data-v-0a034e2c="" class="label notification-title">
				@lang('account.account_2', ['email' => auth()->user()->email])
			        </span>
                        <span data-v-0a034e2c="" class="description">
                            @lang('account.account_5', ['email' => auth()->user()->email])
			            </span>
                    </span>
            </div>
        </div>
        @endif

        <div data-v-0a034e2c="" class="row">
            <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
                <div data-v-15d61d2e="" data-v-7090ae16="" data-v-0a034e2c="" class="card account-overview-code">
                    <div data-v-15d61d2e="" class="card-title">
                        <div data-v-7090ae16="" data-v-15d61d2e="">
                            <h3 data-v-7090ae16="" data-v-15d61d2e="">
                                  @lang('account.account_6')
                            </h3>
                        </div>
                    </div>
                    <div data-v-15d61d2e="" class="card-body">
                        <div data-v-7090ae16="" data-v-15d61d2e="" id="redeem-code-form">
                            <form data-v-7090ae16="" data-v-15d61d2e="" id="code-claim" method="get"
                                  autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="row" action="#">
                                <input data-v-7090ae16="" data-v-15d61d2e="" type="hidden" name="returnUrl" value="#">
                                <div data-v-7090ae16="" data-v-15d61d2e="" class="col-md-6 col-lg-7">
                                    <input data-v-7090ae16="" data-v-15d61d2e="" placeholder="XXXX-XXXX-XXXX-XXXX" type="text" id="redeem-code" name="keyCode" value="" class="input-block">
                                </div>
                                <div data-v-7090ae16="" data-v-15d61d2e="" class="col-md-4 col-lg-4 mt-2 mt-md-0">
                                    <button data-v-312dd04b="" data-v-7090ae16="" id="redeem-code-button"
                                            class="btn-tertiary btn" data-v-15d61d2e="" disabled>
                                        @lang('account.account_7')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
                <div data-v-15d61d2e="" data-v-50ca0f34="" data-v-0a034e2c="" class="card account-overview-code">
                    <div data-v-15d61d2e="" class="card-title">
                        <div data-v-50ca0f34="" data-v-15d61d2e="" class="row">
                            <div data-v-50ca0f34="" data-v-15d61d2e="" class="col-12 col-md-6">
                                <h3 data-v-50ca0f34="" data-v-15d61d2e="">@lang('account.account_8')</h3>
                            </div>
                            <div data-v-50ca0f34="" data-v-15d61d2e="" class="col-12 col-md-6">
                                <a data-v-50ca0f34="" href="{{ route('profile.payment') }}" class="card-header-link float-md-right"
                                   data-v-15d61d2e="">
                                    @lang('account.account_9')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-v-15d61d2e="" class="card-body">
                        <div data-v-19975e4f="" data-v-15d61d2e="">
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8">
                                    <span data-v-15d61d2e="" class="balance" data-v-50ca0f34="">
                                        @if(auth()->user()->wotlk->donate)
                                            {{ auth()->user()->wotlk->donate->bonuses . ' ' . trans_choice('account.bonus', auth()->user()->wotlk->donate->bonuses) }}
                                        @else
                                            0 Бонусов
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8">
                                    <span data-v-15d61d2e="" class="vote" data-v-50ca0f35="">
                                        @if(auth()->user()->wotlk->donate)
                                            {{ auth()->user()->wotlk->donate->votes . ' ' . trans_choice('account.votes', auth()->user()->wotlk->donate->votes) }}
                                        @else
                                            0 Голосов
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div data-v-0a034e2c="" class="row">
            <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
                <div data-v-15d61d2e="" data-v-19975e4f="" data-v-0a034e2c="" id="273523731" class="card account-overview-details">
                    <div data-v-15d61d2e="" class="card-title">
                        <div data-v-19975e4f="" data-v-15d61d2e="" class="row">
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8 col-lg-7">
                                <h3 data-v-19975e4f="" data-v-15d61d2e="">@lang('account.account_10')</h3>
                            </div>
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-4 col-lg-5">
                                <a data-v-19975e4f="" href="{{ route('profile.detail') }}" class="card-header-link float-md-right" data-v-15d61d2e="">
                                     @lang('account.account_11')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-v-15d61d2e="" class="card-body">
                        <div data-v-19975e4f="" data-v-15d61d2e="" class="">
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="label col-12 col-md-4">
                                     @lang('account.account_12')
                                </div>
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8">
                                    <span data-v-19975e4f="" data-v-15d61d2e="">
                                        {{ auth()->user()->full_name_hidden }}
                                    </span>
                                </div>
                            </div>
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="label col-12 col-md-4">
                                    NightHoldTag
                                </div>
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8">
                                    <span data-v-19975e4f="" data-v-15d61d2e="">
                                        {{ auth()->user()->name }}
                                    </span>
                                </div>
                            </div>
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="label col-12 col-md-4">
                                    @lang('account.account_13')
                                </div>
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8 text-truncate">
                                    <span data-v-19975e4f="" data-v-15d61d2e="">
                                    {{ auth()->user()->email_hidden }}
                                </span>
                                </div>
                            </div>
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="label col-12 col-md-4">
                                     @lang('account.account_14')
                                </div>
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8">
                                    <span data-v-19975e4f="" data-v-15d61d2e="">
                                        {{ auth()->user()->phone_hidden }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
                <div data-v-15d61d2e="" data-v-38b4c94e="" data-v-0a034e2c="" class="card account-overview-security">
                    <div data-v-15d61d2e="" class="card-title">
                        <div data-v-38b4c94e="" data-v-15d61d2e="" class="row">
                            <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-12 col-md-6">
                                <h3 data-v-38b4c94e="" data-v-15d61d2e="">@lang('account.account_15')</h3>
                            </div>
                            <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-12 col-md-6">
                                <a data-v-38b4c94e="" href="{{ route('profile.security') }}" class="card-header-link float-md-right"
                                   data-v-15d61d2e="">
                                    @lang('account.account_16')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-v-15d61d2e="" class="card-body">
                        <livewire:user.security />
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-account-layout>
