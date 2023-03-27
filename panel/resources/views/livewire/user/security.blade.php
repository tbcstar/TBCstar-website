<div data-v-38b4c94e="" data-v-15d61d2e="" class="row">
    <div data-v-38b4c94e="" data-v-15d61d2e="" class="security-level col-12 col-md-5">
        <div data-v-38b4c94e="" data-v-15d61d2e="" class="security-level-indicator">
            <div data-v-38b4c94e="" data-v-15d61d2e="" data-progress="{{ $progress }}" class="radial-progress">
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="circle">
                    <div data-v-38b4c94e="" data-v-15d61d2e="" class="mask full">
                        <div data-v-38b4c94e="" data-v-15d61d2e="" class="fill"></div>
                    </div>
                    <div data-v-38b4c94e="" data-v-15d61d2e="" class="mask half">
                        <div data-v-38b4c94e="" data-v-15d61d2e="" class="fill"></div>
                        <div data-v-38b4c94e="" data-v-15d61d2e="" class="fill fix"></div>
                    </div>
                    <div data-v-38b4c94e="" data-v-15d61d2e="" class="shadow"></div>
                </div>
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="inset">
                    <div data-v-38b4c94e="" data-v-15d61d2e="" class="percentage">%
                        <div data-v-38b4c94e="" data-v-15d61d2e="" class="security-level-complete">@lang('account.account_17')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-12 col-md-7">
        @if(auth()->user()->email_verified_at)
        <div data-v-38b4c94e="" data-v-15d61d2e="" class="row mt-4 mt-md-0">
            <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-3">
                <span data-v-38b4c94e="" data-v-15d61d2e="" class="add-security verified">
                    <span data-v-38b4c94e="" data-v-15d61d2e=""></span>
                </span>
            </div>
            <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-9 security-option">
                <div data-v-38b4c94e="" data-v-15d61d2e="">
                    @lang('account.account_18')
                </div>
            </div>
        </div>
        @else
            <div data-v-38b4c94e="" data-v-15d61d2e="" class="row mt-3">
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-3">
            <span data-v-38b4c94e="" data-v-15d61d2e="" class="add-security">
                <span data-v-38b4c94e="" data-v-15d61d2e="">
                    <span data-v-38b4c94e="" data-v-15d61d2e="" class="cross"></span>
                </span>
            </span>
                </div>
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-9 security-option">
                    <div data-v-38b4c94e="" data-v-15d61d2e="">
                        <a data-v-38b4c94e="" href="{{ route('profile.detail') }}" class="" data-v-15d61d2e="">
                            @lang('account.account_19')
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if(auth()->user()->info->phone_number)
            <div data-v-38b4c94e="" data-v-15d61d2e="" class="row mt-3">
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-3">
            <span data-v-38b4c94e="" data-v-15d61d2e="" class="add-security verified">
                <span data-v-38b4c94e="" data-v-15d61d2e=""></span>
            </span>
                </div>
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-9 security-option">
                    <div data-v-38b4c94e="" data-v-15d61d2e="" style="">
                         @lang('account.account_22')
                    </div>
                </div>
            </div>
        @else
            <div data-v-38b4c94e="" data-v-15d61d2e="" class="row mt-3">
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-3">
                <span data-v-38b4c94e="" data-v-15d61d2e="" class="add-security">
                    <span data-v-38b4c94e="" data-v-15d61d2e="">
                        <span data-v-38b4c94e="" data-v-15d61d2e="" class="cross"></span>
                    </span>
                </span>
                </div>
                <div data-v-38b4c94e="" data-v-15d61d2e="" class="col-9 security-option">
                    <div data-v-38b4c94e="" data-v-15d61d2e="">
                        <a data-v-38b4c94e="" href="{{ route('profile.detail') }}" class="security-link" data-v-15d61d2e="">
                              @lang('account.account_23')
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
