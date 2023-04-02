<x-app-layout>
    <div x-data="{create: false}" x-cloak>
        <div data-v-ba34107c="" class="title-bar text-center text-lg-left position-relative">
            <h1 data-v-ba34107c="">游戏</h1>
            <div data-v-ba34107c="" class="back d-lg-none position-absolute">
                <a data-v-ba34107c="" href="/" class="router-link-active">
                    <svg data-v-ba34107c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8"><path data-v-ba34107c="" fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div data-v-15d61d2e="" class="card mt-card-top account-overview-games ">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">游戏</h3>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                    <div data-v-15d61d2e="" class="account-overview-games-table">
                        <table data-v-483e03c5="" data-v-121e7cc8="" class="account-table thead-hide thead-no-border table-background-transparent table b-table table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th aria-colindex="1" class="game-icon">区域游戏特许经营标识文件名</th>
                                    <th aria-colindex="2">本地化游戏名称</th>
                                    <th aria-colindex="3" class="d-none d-md-table-cell">游戏帐户状态</th>
                                    <th aria-colindex="4" class="d-none d-xl-table-cell">上次游戏日期毫秒数</th>
                                    <th aria-colindex="5" class="d-none d-md-table-cell">游戏时间查看</th>
                                    <th aria-colindex="6" class="d-none d-md-table-cell">链接</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td aria-colindex="1" class="game-icon">
                                        <div data-v-60053bb6="">
                                            <img data-v-60053bb6="" src="{{ asset('images/world-of-warcraft.svg') }}" class="d-block float-left">
                                        </div>
                                    </td>
                                    <td aria-colindex="2" class="align-middle">
                                        <span data-v-60053bb6="" class="text-light">魔兽世界：巫妖王之怒®</span>
                                        <span data-v-60053bb6=""></span>
                                        <div data-v-60053bb6="">({{ auth()->user()->username }})</div>
                                        <div data-v-60053bb6="" class="d-md-none">
                                            <div data-v-60053bb6="" class="mt-4">
                                                <div data-v-60053bb6="" class="info-label">账户状态</div>
                                                @if(auth()->user()->status)
                                                    <span data-v-60053bb6="" class="text-warning">非活跃状态</span>
                                                @else
                                                    <span data-v-60053bb6="" class="info-label">活跃状态</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div data-v-60053bb6="" class="d-md-none mt-4 account-links">
                                            <div data-v-60053bb6="">
                                                @if(auth()->user()->status)
                                                    <div data-v-121e7cc8="" class="info-label">封禁者：{{ auth()->user()->status->bannedby }}</div>
                                                    <div data-v-121e7cc8="" class="text-light">原因：{{ auth()->user()->status->banreason }}</div>
                                                    <div data-v-121e7cc8="" class="info-label">开始时间：
                                                        {{ auth()->user()->status->bandate->diffForHumans() }}
                                                    </div>
                                                    <div data-v-121e7cc8="" class="text-light">结束时间：
                                                        @if(auth()->user()->status->bandate != auth()->user()->status->unbandate)
                                                            {{ auth()->user()->status->unbandate->diffForHumans() }}
                                                        @else
                                                            永久封禁
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                                        @if(auth()->user()->status)
                                            <span data-v-60053bb6="" class="text-warning">非活跃状态</span>
                                        @else
                                            <span data-v-60053bb6="" class="info-label">活跃状态</span>
                                        @endif
                                        <div data-v-60053bb6="" class="info-label">账户状态</div>
                                    </td>
                                    <td aria-colindex="4" class="d-none d-xl-table-cell align-middle">
                                        <div data-v-60053bb6="" class="text-light">
                                            @empty(auth()->user()->last_login)
                                                {{ auth()->user()->joindate->diffForHumans() }}
                                            @else
                                                {{ auth()->user()->last_login->diffForHumans() }}
                                            @endempty
                                        </div>
                                        <div data-v-60053bb6="" class="info-label">最后一次游戏</div>
                                    </td>
                                    @if(auth()->user()->status)
                                        <td aria-colindex="5" class="d-none d-xl-table-cell align-middle">
                                            <div data-v-121e7cc8="" class="info-label">封禁者：{{ auth()->user()->status->bannedby }}</div>
                                            <div data-v-121e7cc8="" class="text-light">原因：{{ auth()->user()->status->banreason }}</div>
                                        </td>
                                        <td aria-colindex="6" class="d-none d-xl-table-cell align-middle">
                                            <div data-v-121e7cc8="" class="info-label">开始时间：
                                                {{ auth()->user()->status->bandate->format('d.m.Y H:i') }}
                                            </div>
                                            <div data-v-121e7cc8="" class="text-light">结束时间：
                                                @if(auth()->user()->status->bandate != auth()->user()->status->unbandate)
                                                    {{ auth()->user()->status->unbandate->diffForHumans() }}
                                                @else
                                                    永久封禁
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

    </div>
</x-app-layout>
