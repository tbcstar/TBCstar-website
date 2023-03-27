<x-account-layout>
    <div data-v-a1d75ea0="" class="payment-overview">
        <div data-v-ba34107c="" data-v-a1d75ea0="" class="title-bar text-center text-lg-left position-relative">
            <h1 data-v-ba34107c="">Способы оплаты</h1>
            <div data-v-ba34107c="" class="back d-lg-none position-absolute">
                <a data-v-ba34107c="" href="/" class="router-link-active">
                    <svg data-v-ba34107c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8"><path data-v-ba34107c="" fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path></svg>
                </a>
            </div>
        </div>
        <div>
            <div data-v-15d61d2e="" data-v-0d6bdad4="" data-v-a1d75ea0="" id="754157079" data-blz-addressable-by="balance" class="card">
                <div data-v-15d61d2e="" class="card-title">
                    <div data-v-0d6bdad4="" data-v-15d61d2e="">
                        <h3 data-v-0d6bdad4="" data-v-15d61d2e="">Кошелек</h3>
                    </div>
                </div>
                <div data-v-15d61d2e="" class="card-body">
                    <div data-v-0d6bdad4="" data-v-15d61d2e="">
                        <div data-v-6de7e15f="" data-v-0d6bdad4="" data-v-15d61d2e="" class="row no-gutters">
                            <div data-v-6de7e15f="" class="col-12 col-xl-8 col-md-12 col-sm-12">
                                <div data-v-0d6bdad4="" data-v-6de7e15f="">
                                    <div data-v-6de7e15f="" data-v-0d6bdad4="" class="row no-gutters">
                                        <div data-v-6de7e15f="" class="col-12 col-xl-3 col-md-4 col-sm-12 pr-xl-3 pr-md-3 label">
                                            <div data-v-0d6bdad4="" data-v-6de7e15f="">Текущий баланс</div>
                                        </div>
                                        <div data-v-6de7e15f="" class="col-12 col-xl-9 col-md-8 col-sm-12">
                                            <div data-v-0d6bdad4="" data-v-6de7e15f="" class="main-balance">
                                                {{ auth()->user()->wotlk->donate->bonuses ?? 0 }} Бонусов
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-6de7e15f="" data-v-0d6bdad4="" class="row no-gutters mt-3 fade-under-review-balance">
                                        <div data-v-6de7e15f="" class="col-12 col-xl-3 col-md-4 col-sm-12 pr-xl-3 pr-md-3 label">
                                            <div data-v-0d6bdad4="" data-v-6de7e15f="">Эквивалент</div>
                                        </div>
                                        <div data-v-6de7e15f="" class="col-12 col-xl-9 col-md-8 col-sm-12">
                                            <div data-v-0d6bdad4="" data-v-6de7e15f="">1 бонус = 10 рублей</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-6de7e15f="" class="col-12 col-xl-4 col-md-12 col-sm-12 pl-xl-3 text-xl-right side">
                                <div data-v-0d6bdad4="" data-v-6de7e15f="">
                                    <div data-v-6de7e15f="" data-v-0d6bdad4="" class="row no-gutters">
                                        <div data-v-6de7e15f="" class="col-12 col-xl-12 col-md-12 col-sm-12  side">
                                            <div data-v-0d6bdad4="" data-v-6de7e15f="" class="mt-3 mt-xl-0">
                                                <a href="{{ route('profile.payment.create') }}" class="management-link" data-v-0d6bdad4=""
                                                   data-v-6de7e15f=""><svg data-v-0d6bdad4="" data-v-6de7e15f="" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-plus fa-w-12"><path data-v-0d6bdad4="" data-v-6de7e15f="" fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"></path></svg>
                                                    Пополнить кошелек
                                                </a>
                                                <a href="{{ route('profile.payment.payoff') }}" class="management-link"
                                                   data-v-0d6bdad4=""
                                                   data-v-6de7e15f=""><svg data-v-0d6bdad4="" data-v-6de7e15f="" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-plus fa-w-12"><path data-v-0d6bdad4="" data-v-6de7e15f="" fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"></path></svg>
                                                    Вывод средств
                                                </a>
                                                <a data-v-0d6bdad4="" data-v-6de7e15f="" target="_blank" href="{{ route('profile.checkout.key') }}"
                                                   class="management-link mt-xl-3"><svg data-v-0d6bdad4="" data-v-6de7e15f="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="credit-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-credit-card fa-w-18"><path data-v-0d6bdad4="" data-v-6de7e15f="" fill="currentColor" d="M0 432c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V256H0v176zm192-68c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-40zm-128 0c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM576 80v48H0V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48z"></path></svg>
                                                    Использовать код
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-v-0a034e2c="" class="row  mt-card-top">
                <div data-v-0a034e2c="" class="overview-card col-12">
                    <div data-v-15d61d2e="" data-v-0a034e2c="" class="card account-overview-transactions">
                        <div data-v-15d61d2e="" class="card-title">
                            <div data-v-15d61d2e="" class="row">
                                <div data-v-15d61d2e="" class="col-12 col-md-6">
                                    <h3 data-v-15d61d2e="" class="text-uppercase">Последние операции</h3>
                                </div>
                                <div data-v-15d61d2e="" class="col-12 col-md-6 text-uppercase">
                                    <a href="{{ route('profile.transactions') }}" class="card-header-link float-md-right" data-v-15d61d2e="">
                                        Смотреть все операции
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-chevron-right fa-w-10"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-v-15d61d2e="" class="card-body">
                            <livewire:user.transactions />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-account-layout>
