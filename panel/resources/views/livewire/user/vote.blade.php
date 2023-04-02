<div data-v-0a034e2c="" class="row">
    <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
        <div data-v-15d61d2e="" data-v-7090ae16="" data-v-0a034e2c="" class="card account-overview-code">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-7090ae16="" data-v-15d61d2e="">
                    <h3 data-v-7090ae16="" data-v-15d61d2e="">
                        赚取
                    </h3>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-7090ae16="" data-v-15d61d2e="" id="redeem-code-form">
                    <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-8 col-md-8">帐户</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-4 col-md-4">{{ auth()->user()->username }} </div>
                        <hr>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-6 col-md-6">您赚取的</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-6 col-md-6">
                            <span data-v-15d61d2e="" class="balance " data-v-50ca0f34="">{{ $voteCountDone }}
                                票数</span>
                        </div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12">
                             在当前页面，您可以查看您的所有投票以及您总共在投票中赚取了多少。
                        </div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-12 col-md-12">
                            每投一票，您将获得1票</div>
                        <hr>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-8 col-md-8">票数总计</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-4 col-md-4">{{ $voteCount }} </div>
                        <hr>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-4 col-md-8">MMOTOP</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-8 col-md-4">
                            <a href="https://wow.mmotop.ru/servers/35233/votes/new" target="_blank">
                                <button data-v-15d61d2e="" class="btn-tertiary btn">
                                    投票
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
        <div data-v-15d61d2e="" data-v-50ca0f34="" data-v-0a034e2c="" id="389548993" class="card account-overview-code">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-50ca0f34="" data-v-15d61d2e="" class="row">
                    <div data-v-50ca0f34="" data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-50ca0f34="" data-v-15d61d2e="">规则</h3>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-50ca0f34="" data-v-15d61d2e="">
                    <div data-v-50ca0f34="" data-v-15d61d2e="" id="balance-overview-placeholder" class="hide balance-content-placeholder">
                        <div data-v-50ca0f34="" data-v-15d61d2e="">
                            <div data-v-50ca0f34="" data-v-15d61d2e="" class="placeholder-content animated-background"></div>
                        </div>
                    </div>
                    <div data-v-50ca0f34="" data-v-15d61d2e="">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                            <ul>
                                <li class="label">在投票时，您没有提供帐户名称。那么如何找到您的投票呢？</li>
                                <li class="label">您提供了角色名称，您的猫的名字... 但实际上需要的是 -
                                    <h3>{{ auth()->user()->username }}</h3></li>
                                <li class="label">您投票支持的不是我们的服务器，但您仍然决定领取奖金。</li>
                                <li class="label">如果最后一票没有显示，请记住，延迟可能长达4小时。</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-v-0a034e2c="" class="row">
    <div data-v-0a034e2c="" class="overview-card col-12">
        <div data-v-15d61d2e="" data-v-0a034e2c="" class="card account-overview-transactions">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">我的投票</h3>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-15d61d2e="" class="account-overview-transactions-table">
                    <div data-v-70ad3292="" data-v-15d61d2e="" class="account-table-container">
                        <table data-v-483e03c5="" data-v-70ad3292="" class="table
                         b-table table-hover table-dark account-table thead-no-border table-background-transparent">
                            <thead class="thead-dark">
                                <tr>
                                    <th tabindex="0" aria-colindex="1" aria-label="点击升序排序" aria-sort="descending" class="w-md-auto">日期</th>
                                    <th aria-colindex="2" class="w-md-auto">类型</th>
                                    <th aria-colindex="3" class="w-md-auto">数量</th>
                                    <th aria-colindex="4" class="w-md-auto">IP</th>
                                    <th aria-colindex="5" class="w-md-auto">状态</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($votes as $item)
                            <tr aria-rowindex="0">
                                <th aria-colindex="1" class="w-md-auto d-none d-md-table-cell">{{ $item->voted_at }}</th>
                                <th aria-colindex="2" class="w-md-auto">投票 ({{ $item->vote }})</th>
                                <th aria-colindex="3" class="w-md-auto">{{ $item->balance }} 票</th>
                                <th aria-colindex="4" class="w-md-auto">{{ $item->ip }}</th>
                                <th aria-colindex="5" class="w-md-auto">已领取</th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($votes->isEmpty())
                            <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                                你没有投票。
                            </div>
                        @endif
                    </div>
                </div>
                {{ $votes->links('profile.ref_paginate') }}
            </div>
        </div>
    </div>
</div>
