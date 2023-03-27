<div>
    <div data-v-332b66b6="" class="tab-pane show fade active">
        <div data-v-332b66b6="">
        <div data-v-70ad3292="" class="account-table-container">
            <table data-v-483e03c5="" data-v-70ad3292="" class="table b-table table-hover table-dark transactions-table thead-no-border thead-text-normal card-background-color">
                <thead class="thead-dark">
                    <tr>
                    <th tabindex="0" aria-colindex="1" aria-label="Click to sort Ascending" aria-sort="descending" class="sorting sorting_desc d-none d-md-table-cell blz-md-15 text-nowrap">Дата</th><th aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 text-nowrap">Наименование</th><th aria-colindex="3" class="d-none d-md-table-cell blz-md-15 text-nowrap">Итого</th><th aria-colindex="4" class="blz-xs-35 blz-md-15 pl-1 pl-md-4 text-nowrap">Статус</th><th aria-colindex="5" class="d-none d-md-table-cell blz-md-15 text-nowrap">№ заказа</th></tr>
                </thead>
                <tbody>
                @foreach($transact as $item)
                <tr aria-rowindex="{{ $loop->index }}">
                    <td aria-colindex="1" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                        {{ $item->created_at->format('d.m.Y H:m') }}
                    </td> <td aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 pr-3 align-middle text-white blz-text-md-white-70">
                        <div data-v-70ad3292="" class="d-none d-block d-md-none">
                            <div data-v-70ad3292="" class="label">{{ $item->created_at->format('d.m.Y H:m') }}</div>
                            <h6 data-v-70ad3292="" class=" blz-truncate-2">{{ $item->title }}</h6>
                        </div>
                        <div data-v-70ad3292="" class="d-none d-md-block">
                            <span data-v-70ad3292="" class="blz-truncate-2">{{ $item->title }}</span>
                        </div>
                    </td>
                    <td aria-colindex="3" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                        {{ $item->price . ' ' . trans_choice('account.bonus', $item->price) }}
                    </td>
                    <td aria-colindex="4" class="blz-xs-35 blz-md-15 pl-1 pr-3 pl-md-4 align-middle text-left text-white blz-text-md-white-70">
                        <div data-v-70ad3292="" class="text-nowrap d-flex align-items-center justify-content-end justify-content-md-start">
                                <span data-v-70ad3292="" title="@lang('transact.status_'.$item->status)" class="text-truncate blz-text-capitalize-first blz-mw-100px">@lang('transact.status_'.$item->status)</span>
                                <svg data-v-70ad3292="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="d-none d-inline-block d-md-none text-muted ml-1 svg-inline--fa fa-chevron-right fa-w-10"><path data-v-70ad3292="" fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                        </div>
                    </td>
                    <td aria-colindex="5" class="d-none d-md-table-cell blz-md-15 align-middle">
                        @if($item->order_id)
                        <a data-v-70ad3292="" href="{{ route('profile.transactions.view', [$item->order_id, $item->id]) }}"
                           class="d-none
                        d-md-block">
                            EU{{$item->order_id}}
                        </a>
                        @else
                            System Info
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @if($transact->isEmpty())
                <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                    История пуста.
                </div>
            @endif
        </div>
    </div>
        {{ $transact->links('profile.ref_paginate') }}
    </div>
</div>
