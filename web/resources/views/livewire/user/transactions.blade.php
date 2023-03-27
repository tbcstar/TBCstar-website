<div data-v-15d61d2e="" class="account-overview-transactions-table">
    <div data-v-70ad3292="" class="account-table-container" data-v-15d61d2e="">
        <table data-v-483e03c5="" data-v-70ad3292="" aria-busy="false" aria-colcount="4" aria-rowcount="-1" class="table b-table table-hover table-dark account-table thead-hide thead-no-border table-background-transparent" sort-direction="asc" id="__BVID__34_">
            <thead class="thead-dark">
            <tr>
                <th tabindex="0" aria-colindex="1" aria-label="Click to sort Ascending" aria-sort="descending" class="sorting sorting_desc d-none d-md-table-cell blz-md-15">Дата</th><th aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 pr-1">Наименование</th><th aria-colindex="3" class="d-none d-md-table-cell blz-md-15">Итого</th><th aria-colindex="4" class="blz-xs-35 blz-md-15">Статус</th></tr>
            </thead>
            <tbody class="">
                @foreach($transactions as $item)

                    <tr aria-rowindex="{{ $loop->index }}">
                        <td aria-colindex="1" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                            {{ $item->created_at->format('d.m.Y H:m') }}
                        </td>
                        <td aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 pr-3 align-middle text-white blz-text-md-white-70">
                            <div data-v-70ad3292="" class="d-none d-block d-md-none">
                                <div data-v-70ad3292="" class="label">{{ $item->created_at->format('d.m.Y') }}</div>
                                <h6 data-v-70ad3292="" class=" blz-truncate-2">{{ $item->title }}</h6>
                            </div>
                            <div data-v-70ad3292="" class="d-none d-md-block">
                                <span data-v-70ad3292="" class="blz-truncate-2">{{ $item->title }}</span>
                            </div>
                        </td>
                        <td aria-colindex="3" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                            {{ $item->price . ' ' . trans_choice('account.bonus', $item->price) }}
                        </td> <td aria-colindex="4" class="blz-xs-35 blz-md-15 pl-1 pr-3 pl-md-4 align-middle text-left text-white blz-text-md-white-70">
                            <div data-v-70ad3292="" class="text-nowrap d-flex align-items-center justify-content-end justify-content-md-start">
                                <span data-v-70ad3292="" title="@lang('transact.status_'.$item->status)" class="text-truncate
                                    blz-text-capitalize-first blz-mw-100px">@lang('transact.status_'.$item->status)</span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($transactions->isEmpty())
        <div data-v-70ad3292="" class="table-states-container table-background-transparent">
            Вы пока не делали заказов.
        </div>
        @endif
    </div>
</div>
