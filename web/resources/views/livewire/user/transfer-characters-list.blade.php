<div data-v-0a034e2c="" class="overview-card col-12">
        <div data-v-15d61d2e="" data-v-0a034e2c="" class="card account-overview-transactions">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">Мои заявки</h3>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-15d61d2e="" class="account-overview-transactions-table">
                    <div data-v-70ad3292="" data-v-15d61d2e="" class="account-table-container">
                        <table data-v-483e03c5="" data-v-70ad3292="" aria-busy="false" aria-colcount="5"
                               aria-rowcount="-1" sort-direction="asc" class="table b-table table-hover table-dark account-table thead-hide thead-no-border table-background-transparent">
                            <thead class="thead-dark">
                                <tr>
                                    <th aria-colindex="1" class="w-md-auto">Ник</th>
                                    <th aria-colindex="2" class="w-md-auto">Сервер</th>
                                    <th aria-colindex="3" class="w-md-auto">Фракция</th>
                                    <th aria-colindex="4" class="w-md-auto">Раса</th>
                                    <th aria-colindex="5" class="w-md-auto">Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr aria-rowindex="1" class="">
                                    <td aria-colindex="1" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                                        {{ $item->nameOld }}
                                    </td>
                                    <td aria-colindex="2" class="w-100 pl-sm-3 pr-sm-3 align-middle text-white blz-text-md-white-70">
                                        <div data-v-70ad3292="" class="d-none d-block d-md-none">
                                            <div data-v-70ad3292="" class="label">
                                                {{ $item->nameOld }}
                                            </div>
                                            <h6 data-v-70ad3292="" class=" blz-truncate-2">{{ $item->server }}</h6>
                                        </div>
                                        <div data-v-70ad3292="" class="d-none d-md-block">
                                            <span data-v-70ad3292="" class="blz-truncate-2">{{ $item->server }}</span>
                                        </div>
                                    </td>
                                    <td aria-colindex="3" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">{{ $item->faction }}</td>
                                    <td aria-colindex="4" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">{{ $item->rasa }}</td>
                                    <td aria-colindex="5" class="blz-xs-35 blz-md-15 pl-1 pl-md-4 pr-3 pr-md-5 align-left align-middle text-white blz-text-md-white-70">
                                        <div data-v-70ad3292="" class="text-nowrap d-flex align-items-center justify-content-end justify-content-md-start">
                                            @if($item->status === 1)
                                                <span data-v-70ad3292="" title="Выполнено" class="text-truncate blz-text-capitalize-first blz-mw-100px">
                                                    Выполнено
                                                </span>
                                            @elseif($item->status === 0)
                                                <span data-v-70ad3292="" title="В обработке" class="text-truncate blz-text-capitalize-first blz-mw-100px">
                                                    В обработке
                                                </span>
                                            @else
                                                <span data-v-70ad3292="" title="Отклонено" class="text-truncate blz-text-capitalize-first blz-mw-100px">
                                                    Отклонено
                                                </span>
                                            @endif

                                        </div>
                                    </td>
                                    @if($item->status === 0)
                                    <td aria-colindex="6" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                                        <x-jet-danger-button class="ml-2" wire:click="delete({{ $item->id }})" wire:loading.attr="disabled">
                                            {{ __('Отменить') }}
                                        </x-jet-danger-button>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                @if($list->isEmpty())
                    <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                        Заявок не найдено.
                    </div>
                @endif
            </div>
    </div>
</div>
