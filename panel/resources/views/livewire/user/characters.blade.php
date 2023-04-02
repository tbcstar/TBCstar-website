<div data-v-15d61d2e="" class="card-body">
    <div data-v-15d61d2e="" class="account-overview-transactions-table">
        <div data-v-70ad3292="" data-v-15d61d2e="" class="account-table-container">
            <table data-v-483e03c5="" data-v-121e7cc8="" class="account-table thead-hide thead-no-border table-background-transparent table b-table table-dark">
                <thead class="thead-dark">
                <tr>
                    <th aria-colindex="1" class="game-icon">区域游戏特许经营标志文件名</th>
                    <th aria-colindex="2">本地化游戏名称</th>
                    <th aria-colindex="3" class="d-none d-md-table-cell">游戏账户状态</th>
                    <th aria-colindex="4" class="d-none d-xl-table-cell">上次游戏时间（毫秒）</th>
                    <th aria-colindex="5" class="d-none d-md-table-cell">游戏时间视图</th>
                    <th aria-colindex="6" class="d-none d-md-table-cell">链接</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($characters as $item)
                    <tr>
                        <td aria-colindex="1" class="d-none d-md-table-cell align-middle">
                            <div data-v-121e7cc8="">
                                <img data-v-121e7cc8="" src="{{ Utils::imageClass($item->race, $item->gender) }}" class="d-block float-left" style="border-radius:
                                20px
                                 !important;"></div>
                        </td>
                        <td aria-colindex="1" class="d-none d-md-table-cell align-middle d-md-none">
                            <div data-v-121e7cc8="">
                                <img data-v-121e7cc8="" src="{{ Utils::imageRace($item->race) }}" class="d-block float-left">
                            </div>
                        </td>
                        <td aria-colindex="2" class="align-middle">
                            <span data-v-121e7cc8="" class="text-light"></span>
                            <span data-v-121e7cc8="">{{ $item->name }} ({{ $item->level }})</span>
                            <div data-v-121e7cc8="">{{ $item->realmName }}</div>
                            <div data-v-121e7cc8="" class="d-md-none">
                                <div data-v-121e7cc8="" class="mt-4">
                                    <div data-v-121e7cc8="" class="info-label">游戏时间</div>
                                    <span data-v-121e7cc8="" class="text-light">{{ Text::totalTime($item->totaltime) }}</span>
                                </div>
                                <div data-v-121e7cc8="" class="mt-4">
                                    <div data-v-121e7cc8="" class="info-label">上次登录时间</div>
                                    <span data-v-121e7cc8="" class="text-light">{{ Text::lastLoginCharacters($item->logout_time) }}</span>
                                </div>
                            </div>
                            <div data-v-121e7cc8="" class="d-md-none mt-4 account-links">
                                <div data-v-7090ae16="" data-v-15d61d2e="" class="col-md-3 col-lg-3 mt-2 mt-md-0">
                                    @if($item->isActive === 0)
                                        <button type="submit" wire:click="update({{ $item->guid }})"
                                                data-v-15d61d2e="" class="btn-tertiary btn">
                                            选择
                                        </button>
                                    @else
                                        <button type="submit" disabled data-v-15d61d2e="" class="btn-tertiary btn">
                                            已选择
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                            <span data-v-121e7cc8="" class="text-light">游戏时间</span>
                            <div data-v-121e7cc8="" class="info-label">{{ Text::totalTime($item->totaltime) }}</div>
                        </td>
                        <td aria-colindex="3" class="d-none d-md-table-cell align-middle">
                            <span data-v-121e7cc8="" class="text-light">上次登录时间</span>
                            <div data-v-121e7cc8="" class="info-label">{{ Text::lastLoginCharacters($item->logout_time) }}</div>
                        </td>
                        <td aria-colindex="4" class="d-none d-xl-table-cell align-middle"></td>
                        <td aria-colindex="5" class="d-none d-md-table-cell align-middle">
                            <span data-v-121e7cc8=""></span>
                        </td>
                        <td aria-colindex="6" class="d-none d-md-table-cell font-weight-bold text-right align-middle">
                            <div data-v-121e7cc8="" class="account-links">
                                <div data-v-7090ae16="" data-v-15d61d2e="" class="col-md-3 col-lg-3 mt-2 mt-md-0">
                                    @if($item->isActive === 0)
                                        <button type="submit" wire:click="update({{ $item->guid }})"
                                                data-v-15d61d2e="" class="btn-tertiary btn">
                                            选择
                                        </button>
                                    @else
                                        <button type="submit" disabled data-v-15d61d2e="" class="btn-tertiary btn">
                                            已选择
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
