<div data-v-332b66b6="" class="tab-pane show fade active">
        <div data-v-332b66b6="">
            <div data-v-70ad3292="" class="account-table-container">
                <table data-v-483e03c5="" data-v-70ad3292="" class="table b-table table-dark gift-claims-table thead-no-border thead-text-normal card-background-color mt-md-5">
                    <thead class="thead-dark">
                    <tr>
                        <th tabindex="0" aria-colindex="1" aria-label="Click to sort Ascending" aria-sort="descending" class="sorting sorting_desc d-none d-md-table-cell blz-md-15 text-nowrap">Дата</th>
                        <th aria-colindex="2" class="w-100 pl-sm-3 pr-sm-1 text-nowrap">Продукт/услуга</th>
                        <th aria-colindex="3" class="blz-xs-35 blz-md-15 pl-1 pl-md-4 text-nowrap">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gifts as $item)
                        <tr aria-rowindex="1" class="">
                        <td aria-colindex="1" class="d-none d-md-table-cell blz-md-15 align-middle text-nowrap">
                            {{ $item->created_at->format('j F Y') }} г.
                        </td>
                            <td aria-colindex="2" class="w-100 pl-sm-3 pr-sm-3 align-middle text-white blz-text-md-white-70">
                                <div data-v-70ad3292="" class="d-none d-block d-md-none">
                                    <div data-v-70ad3292="" class="label">
                                        {{ $item->created_at->format('j F Y') }} г .
                                    </div>
                                    <h6 data-v-70ad3292="" class=" blz-truncate-2">{{ $item->title }}</h6>
                                </div>
                                <div data-v-70ad3292="" class="d-none d-md-block">
                                    <span data-v-70ad3292="" class="blz-truncate-2">{{ $item->title }}</span>
                                </div>
                            </td>
                            <td aria-colindex="3" class="blz-xs-35 blz-md-15 pl-1 pl-md-4 pr-3 pr-md-5 align-left align-middle text-white blz-text-md-white-70">
                                <div data-v-70ad3292="" class="text-nowrap d-flex align-items-center justify-content-end justify-content-md-start">
                                    @if($item->status === 1)
                                    <span data-v-70ad3292="" title="Использовано" class="text-truncate blz-text-capitalize-first blz-mw-100px">Использовано</span>
                                    @else
                                        @if(auth()->user()->active)
                                            <livewire:user.select-gifts-and-send :item="$item" />
                                        @elseif($item->type == "vote")
                                            <livewire:select-gifts-vote :item="$item" />
                                        @else
                                            <button type="submit" wire:click="select" wire:loading.attr="disabled" data-v-15d61d2e="" class="btn-tertiary btn">
                                               Выбрать персонажа
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($gifts->isEmpty())
                <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                    Ваша история подарков в настоящий момент пуста.
                </div>
                @endif
            </div>
        </div>
    </div>
