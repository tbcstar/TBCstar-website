<x-app-layout>
    <div data-v-0a034e2c="" class="account-overview">
        <div data-v-0a034e2c="" class="title-bar">
            <h1 data-v-0a034e2c="">@lang('account.account_1')</h1>
        </div>

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
                                        {{ auth()->user()->donate->bonuses . ' ' . trans_choice('account.bonus', auth()->user()->donate->bonuses) }}
                                    </span>
                                </div>
                            </div>
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8">
                                    <span data-v-15d61d2e="" class="vote" data-v-50ca0f35="">
                                        {{ auth()->user()->donate->votes . ' ' . trans_choice('account.votes', auth()->user()->donate->votes) }}
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
                                        {{ auth()->user()->info->full_name_hidden  ?? 'Не указано.' }}
                                    </span>
                                </div>
                            </div>
                            <div data-v-19975e4f="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="label col-12 col-md-4">
                                    NightHoldTag
                                </div>
                                <div data-v-19975e4f="" data-v-15d61d2e="" class="col-12 col-md-8">
                                    <span data-v-19975e4f="" data-v-15d61d2e="">
                                        {{ auth()->user()->forum->username ?? ''}}
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
                                        {{ auth()->user()->info->phone_hidden  ?? 'Не указано.' }}
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

</x-app-layout>
