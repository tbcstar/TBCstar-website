 <td aria-colindex="1" class="d-none d-md-table-cell align-middle">
    <div data-v-121e7cc8="">
        <img data-v-121e7cc8="" src="{{ Utils::imageClass($list->race, $list->gender) }}" class="d-block float-left"
             style="border-radius:
                                20px
                                 !important;"></div>
</td>
<td aria-colindex="1" class="d-none d-md-table-cell align-middle d-md-none">
    <div data-v-121e7cc8="">
        <img data-v-121e7cc8="" src="{{ Utils::imageRace($list->race) }}" class="d-block float-left">
    </div>
</td>
<td aria-colindex="2" class="align-middle">
    <span data-v-121e7cc8="" class="text-light"></span>
    <span data-v-121e7cc8="">{{ $list->name }} ({{ $list->level }})</span>
    <div data-v-121e7cc8="">{{ $list->realmName }}</div>
    <div data-v-121e7cc8="" class="d-md-none">
        <div data-v-121e7cc8="" class="mt-4">
            <div data-v-121e7cc8="" class="info-label">游戏时间</div>
            <span data-v-121e7cc8="" class="text-light">{{ Text::totalTime($list->totaltime) }}</span>
        </div>
        <div data-v-121e7cc8="" class="mt-4">
            <div data-v-121e7cc8="" class="info-label">最后登录</div>
            <span data-v-121e7cc8="" class="text-light">{{ Text::lastLoginCharacters($list->logout_time) }}</span>
        </div>
    </div>
    <div data-v-121e7cc8="" class="d-md-none mt-4 account-links">
        <div data-v-7090ae16="" data-v-15d61d2e="" class="col-md-3 col-lg-3 mt-2 mt-md-0">
            @if($list->isActive === 0)
                <button type="submit" wire:click="$emitSelf('updating({{ $list->guid }})')"
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
    <div data-v-121e7cc8="" class="info-label">{{ Text::totalTime($list->totaltime) }}</div>
</td>
<td aria-colindex="3" class="d-none d-md-table-cell align-middle">
    <span data-v-121e7cc8="" class="text-light">最后登录</span>
    <div data-v-121e7cc8="" class="info-label">{{ Text::lastLoginCharacters($list->logout_time) }}</div>
</td>
<td aria-colindex="4" class="d-none d-xl-table-cell align-middle"></td>
<td aria-colindex="5" class="d-none d-md-table-cell align-middle">
    <span data-v-121e7cc8=""></span>
</td>
<td aria-colindex="6" class="d-none d-md-table-cell font-weight-bold text-right align-middle">
    <div data-v-121e7cc8="" class="account-links">
        <div data-v-7090ae16="" data-v-15d61d2e="" class="col-md-3 col-lg-3 mt-2 mt-md-0">
            @if($list->isActive === 0)
                <button type="submit" wire:click="$emitSelf('updating({{ $list->guid }})')"
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
