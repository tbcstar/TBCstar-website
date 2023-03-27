<div wire:poll.750ms="update" data-v-15d61d2e="" class="card-body" >
    <div data-v-15d61d2e="" class="account-overview-transactions-table" data-placeholder-id="placeholder-e4cab810-e186-11eb-9690-a9d2fce3ed9b">
        <div data-v-70ad3292="" class="account-table-container" data-v-15d61d2e="">
            <table data-v-483e03c5="" data-v-70ad3292="" class="table b-table table-hover table-dark account-table thead-hide thead-no-border table-background-transparent">
                <thead class="thead-dark">
                <tr>
                    <th class="sorting sorting_desc d-none d-md-table-cell blz-md-15">№</th>
                    <th aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 pr-1">Имя</th>
                    <th aria-colindex="3" class="d-none d-md-table-cell blz-md-15">Бонусы</th>
                </tr>
                </thead>
                <tbody class="">
                @empty(!$top)
                    @empty(!isset($top[0]))
                    <tr aria-rowindex="1">
                            <td aria-colindex="1" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                                1.
                            </td>
                            <td aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 pr-1 align-middle text-white blz-text-md-white-70">
                                <div data-v-70ad3292="" class="d-none d-block d-md-none">
                                    <div data-v-70ad3292="" class="label">1.</div>
                                    <h6 data-v-70ad3292="" class=" blz-truncate-2">{{ $top[0]->username }}</h6>
                                </div>
                                <div data-v-70ad3292="" class="d-none d-md-block">
                                    <span data-v-70ad3292="" class="blz-truncate-2">{{ $top[0]->username
                                    }}</span>
                                </div>
                            </td>
                            <td aria-colindex="3" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                                {{ $top[0]->bonuses . ' ' . trans_choice('account.bonus',
                                $top[0]->bonuses) }}
                            </td>
                        </tr>
                    @endempty
                    @empty(!isset($top[1]))
                    <tr aria-rowindex="2">
                            <td aria-colindex="1" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                                2.
                            </td>
                            <td aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 pr-1 align-middle text-white blz-text-md-white-70">
                                <div data-v-70ad3292="" class="d-none d-block d-md-none">
                                    <div data-v-70ad3292="" class="label">2.</div>
                                    <h6 data-v-70ad3292="" class=" blz-truncate-2">{{ $top[1]->username }}</h6>
                                </div>
                                <div data-v-70ad3292="" class="d-none d-md-block">
                                    <span data-v-70ad3292="" class="blz-truncate-2">{{ $top[1]->username
                                    }}</span>
                                </div>
                            </td>
                            <td aria-colindex="3" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                                {{ $top[1]->bonuses . ' ' . trans_choice('account.bonus',
                                $top[1]->bonuses) }}
                            </td>
                    </tr>
                    @endempty
                    @empty(!isset($top[2]))
                    <tr aria-rowindex="3">
                        <td aria-colindex="1" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                            3.
                        </td>
                        <td aria-colindex="2" class="w-100 w-md-auto blz-md-40 pl-3 pr-1 align-middle text-white blz-text-md-white-70">
                            <div data-v-70ad3292="" class="d-none d-block d-md-none">
                                <div data-v-70ad3292="" class="label">3.</div>
                                <h6 data-v-70ad3292="" class=" blz-truncate-2">{{ $top[2]->username }}</h6>
                            </div>
                            <div data-v-70ad3292="" class="d-none d-md-block">
                                <span data-v-70ad3292="" class="blz-truncate-2">{{ $top[2]->username }}</span>
                            </div>
                        </td>
                        <td aria-colindex="3" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                            {{ $top[2]->bonuses . ' ' . trans_choice('account.bonus', $top[2]->bonuses) }}
                        </td>
                    </tr>
                    @endempty
                @endempty
                </tbody>
            </table>
            @empty($top)
                <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                    Нет данных для отображения
                </div>
            @endempty
        </div>
    </div>
</div>
