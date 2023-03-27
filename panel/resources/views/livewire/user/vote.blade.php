<div data-v-0a034e2c="" class="row">
    <div data-v-0a034e2c="" class="overview-card col-12 col-xl-6">
        <div data-v-15d61d2e="" data-v-7090ae16="" data-v-0a034e2c="" class="card account-overview-code">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-7090ae16="" data-v-15d61d2e="">
                    <h3 data-v-7090ae16="" data-v-15d61d2e="">
                        Заработано
                    </h3>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-7090ae16="" data-v-15d61d2e="" id="redeem-code-form">
                    <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-8 col-md-8">Аккаунт</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-4 col-md-4">{{ auth()->user()->username }} </div>
                        <hr>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-6 col-md-6">Вами заработано</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-6 col-md-6">
                            <span data-v-15d61d2e="" class="balance " data-v-50ca0f34="">{{ $voteCountDone }}
                                Голосов</span>
                        </div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12">
                            На текущей странице вы можете посмотреть все свои голоса, а так же сколько вы в общем заработали на голосовании.
                        </div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-12 col-md-12">
                            За одно голосование вы получаете 1 голос</div>
                        <hr>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-8 col-md-8">Количество голосов</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-4 col-md-4">{{ $voteCount }} </div>
                        <hr>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-4 col-md-8">MMOTOP</div>
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="col-8 col-md-4">
                            <a href="https://wow.mmotop.ru/servers/35233/votes/new" target="_blank">
                                <button data-v-15d61d2e="" class="btn-tertiary btn">
                                    Голосовать
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
                        <h3 data-v-50ca0f34="" data-v-15d61d2e="">Правила</h3>
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
                                <li class="label">При голосовании Вы не указали имя аккаунта. А как тогда найти Ваш голос?</li>
                                <li class="label">Вы указали имя персонажа, Вашего кота... А нужно это -
                                    <h3>{{ auth()->user()->username }}</h3></li>
                                <li class="label">Вы голосовали не за наш сервер, но все равно почему то решили получить бонус.</li>
                                <li class="label">Если не отображается последний голос, то помните, что задержка составляет до 4 часов.</li>
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
                        <h3 data-v-15d61d2e="" class="text-uppercase">Мои голоса</h3>
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
                                    <th tabindex="0" aria-colindex="1" aria-label="Click to sort Ascending" aria-sort="descending" class="w-md-auto">Дата</th>
                                    <th aria-colindex="2" class="w-md-auto">Тип</th>
                                    <th aria-colindex="3" class="w-md-auto">Количество</th>
                                    <th aria-colindex="4" class="w-md-auto">IP</th>
                                    <th aria-colindex="5" class="w-md-auto">Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($votes as $item)
                            <tr aria-rowindex="0">
                                <th aria-colindex="1" class="w-md-auto d-none d-md-table-cell">{{ $item->voted_at }}</th>
                                <th aria-colindex="2" class="w-md-auto">Голосов ({{ $item->vote }})</th>
                                <th aria-colindex="3" class="w-md-auto">{{ $item->balance }} Голос</th>
                                <th aria-colindex="4" class="w-md-auto">{{ $item->ip }}</th>
                                <th aria-colindex="5" class="w-md-auto">Получено</th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($votes->isEmpty())
                            <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                                У вас нет голосов.
                            </div>
                        @endif
                    </div>
                </div>
                {{ $votes->links('profile.ref_paginate') }}
            </div>
        </div>
    </div>
</div>
