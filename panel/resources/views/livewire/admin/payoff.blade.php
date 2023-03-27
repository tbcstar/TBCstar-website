<div data-v-0a034e2c="" class="row">
    <div data-v-0a034e2c="" class="overview-card col-12">
        <div data-v-15d61d2e="" data-v-0a034e2c="" class="card account-overview-transactions">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">Заявки</h3>  <div data-v-15d61d2e="" class="card-subtitle">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="">
                                @if (session()->has('message'))
                                    <div data-v-4918d6bc="" class="alert-message success" data-v-15d61d2e="">
                                        <div data-v-cc173d72="" class="d-none icon"></div>
                                        <div data-v-cc173d72="" class="">
                                            <h3 data-v-cc173d72="" class="uppercase"></h3>
                                            <span data-v-7c3c8cd5="">{{ session('message') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-v-15d61d2e="" class="card-body">
                <div data-v-15d61d2e="" class="account-overview-transactions-table">
                    <div data-v-70ad3292="" data-v-15d61d2e="" class="account-table-container">
                        <table data-v-483e03c5="" data-v-70ad3292="" class="table
                         b-table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th tabindex="0" aria-colindex="1" aria-label="Click to sort Ascending"
                                    aria-sort="descending" class="w-md-auto">Пользователь</th>
                                <th aria-colindex="2"  class="w-md-auto">Баланс</th>
                                <th aria-colindex="3"  class="w-md-auto">Сервис</th>
                                <th aria-colindex="4" class="w-md-auto">Кошелек</th>
                                <th aria-colindex="5" class="w-md-auto">Сумма</th>
                                <th aria-colindex="7" class="w-md-auto">Одобрить</th>
                                <th aria-colindex="8" class="w-md-auto">Отклонить</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($withdraw as $item)
                                    <tr aria-rowindex="0">
                                        <th aria-colindex="1" class="w-md-auto d-none d-md-table-cell">{{ $item->user->username }}</th>
                                        <th aria-colindex="2" class="w-md-auto">{{ $item->user->donate->bonuses }}</th>
                                        <th aria-colindex="3" class="w-md-auto">{{ __('account.account_'.$item->servicesKey) }}</th>
                                        <th aria-colindex="4" class="w-md-auto">{{ $item->wallet }}</th>
                                        <th aria-colindex="5" class="w-md-auto">{{ $item->price }}</th>
                                        <th aria-colindex="7" class="w-md-auto">
                                            <button wire:click="updates( {{ $item}})" wire:loading.attr="disabled"
                                                    data-v-312dd04b="" data-v-f521b32c="" class="btn-warning btn"
                                                    data-v-15d61d2e="">
                                                Одобрить
                                            </button>
                                        </th>
                                        <th aria-colindex="8" class="w-md-auto">
                                            <button wire:click="danger( {{ $item}})" wire:loading.attr="disabled"
                                                    data-v-312dd04b="" data-v-f521b32c="" class="btn-danger btn" data-v-15d61d2e="">
                                                Отклонить
                                            </button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($withdraw->isEmpty())
                            <div data-v-70ad3292="" class="table-states-container table-background-transparent">
                                Заявок нет.
                            </div>
                        @endif
                    </div>
                </div>
                {{ $withdraw->links('profile.payment.payoff.paginate') }}
            </div>
        </div>
    </div>
</div>
