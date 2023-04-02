<div data-v-0a034e2c="" class="row">
    <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
        <div data-v-15d61d2e="" data-v-50ca0f34="" data-v-2a9932ea="" class="card account-overview-code">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-50ca0f34="" data-v-15d61d2e="" class="row">
                    <div data-v-50ca0f34="" data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-50ca0f34="" data-v-15d61d2e="">信息</h3>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-50ca0f34="" data-v-15d61d2e="">
                    <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12">在当前页面上，您可以查看所有您招募的人，并复制您的招募链接以邀请朋友</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-12 col-md-12"></div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-12 col-md-12">为了获得奖励，玩家需要在游戏中玩12个小时/div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
        <div data-v-15d61d2e="" data-v-21c799d2="" data-v-2a9932ea="" class="card account-overview-details">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                    <div data-v-21c799d2="" data-v-15d61d2e="" class="col-12 col-md-8 col-lg-7">
                        <h3 data-v-21c799d2="" data-v-15d61d2e="">招募数据</h3>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-21c799d2="" data-v-15d61d2e="">
                    <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-4">账户</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-12 col-md-8">
                            {{ auth()->user()->info->name }}
                        </div>
                    </div>
                    <div data-v-21c799d2="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                        <div class="label col-12 col-md-4">
                            链接
                        </div>
                        <div class="col-12 col-md-8 text-truncate">
                            <span data-v-15d61d2e="" class="" data-v-19975e4f="">
                                {{ config('app.url') . "?ref=" . Hashids::encode(auth()->id()) }}
                            </span>
                        </div>
                    </div>
                    <div data-v-21c799d2="" data-v-15d61d2e="" class="row mt-3 mt-md-3">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-4">招募的人数</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-12 col-md-8">
                            {{ $referral }} 人
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-v-0a034e2c="" class="row">
    <div data-v-0a034e2c="" class="overview-card col-12">
        <div data-v-15d61d2e="" data-v-2a9932ea="" class="card account-overview-transactions">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">我的招募</h3>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-15d61d2e="" class="account-overview-transactions-table">
                    <div data-v-70ad3292="" data-v-15d61d2e="" class="account-table-container">
                        <table data-v-483e03c5="" data-v-70ad3292="" aria-busy="false" aria-colcount="3" class="table
                         b-table table-hover table-dark account-table thead-no-border table-background-transparent">
                            <thead class="thead-dark">
                                <tr>
                                    <th aria-colindex="1" class="w-md-auto5">账户</th>
                                    <th aria-colindex="4" class="w-md-auto">状态</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($referrals as $item)
                                <tr>
                                    <th aria-colindex="1" class="w-md-auto">账户 ({{ $item->referrer->username }})</th>
                                    <th aria-colindex="3" class="w-md-auto">游戏时长 {{ Text::totalTime($item->characters->totaltime ?? '0') }}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($referrals->isEmpty())
                            <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                                您没有招募。
                            </div>
                        @endif
                    </div>
                </div>
                {{ $referrals->links('profile.ref_paginate') }}
            </div>
        </div>
    </div>
</div>
