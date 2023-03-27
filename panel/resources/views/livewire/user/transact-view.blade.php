<div data-v-15d61d2e="" class="card-title">
    <h3 data-v-6d23d421="" data-v-15d61d2e="">Заказ №EU{{ $item->order_id }}</h3></div>
<div data-v-15d61d2e="" class="card-subtitle">
    <div data-v-6d23d421="" data-v-15d61d2e=""><!----> <!----></div>
</div>
<div data-v-15d61d2e="" class="card-body">
    <div data-v-6d23d421="" data-v-15d61d2e="" class="" data-placeholder-id="placeholder-0319db10-0735-11ec-b7cb-1f0721352564">
        <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters">
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-6 mb-3 mb-md-4">
                <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters flex-row">
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-3 order-text-label">Дата заказа</div>
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-auto order-text-data">{{ $item->created_at->format('d.m.Y H:m') }}</div>
                </div>
            </div>
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-6 mb-3 mb-md-4">
                <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters flex-row text-md-right">
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-4 offset-md-4 order-text-label">Состояние заказа</div>
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-4 order-text-data">
                        <span data-v-6d23d421="" data-v-15d61d2e="" class="blz-text-capitalize-first">
                            @lang('transact.status_'.$item->status)
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters justify-content-md-between">
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-6 mb-3 mb-md-4">
                <div data-v-6d23d421="" data-v-15d61d2e="" class="row flex-row no-gutters">
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-3 order-text-label">Способ оплаты</div>
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-7 order-text-data">
                        {{ $item->services }}
                    </div>
                </div>
            </div>
        </div>
        <hr data-v-6d23d421="" data-v-15d61d2e="" class="mb-4 margin-normalizer">
        <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters justify-content-md-between mb-2">
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-6 ml-md-auto">
                <div data-v-6d23d421="" data-v-15d61d2e="" class="order-text-label">Продукты</div>
            </div>
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-6 text-right d-none d-md-block">
                <div data-v-6d23d421="" data-v-15d61d2e="" class="order-text-label">Цена</div>
            </div>
        </div>
        <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters justify-content-md-between mb-3">
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-8 ml-md-auto order-text-data">
                {{ $item->title }}
            </div>
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-4 text-left text-md-right order-text-data order-text-sm-grey">
                {{ $item->price . ' ' . trans_choice('account.bonus', $item->price) }}
            </div>
        </div>
        <hr data-v-6d23d421="" data-v-15d61d2e="" class="mb-4 mt-4"> <!---->
        <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters mb-4 justify-content-end">
            <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 col-md-6">
                <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters flex-row text-sm-left text-md-right">
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-4 offset-md-4 order-text-label">Итого</div>
                    <div data-v-6d23d421="" data-v-15d61d2e="" class="col-4 order-text-data">
                        {{ $item->price . ' ' . trans_choice('account.bonus', $item->price) }}
                    </div>
                </div>
            </div>
        </div>
        <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters mb-4 justify-content-md-end">
            <div data-v-6d23d421="" data-v-15d61d2e="" class="row no-gutters flex-row text-right">
                <div data-v-6d23d421="" data-v-15d61d2e="" class="col-12 blz-text-small-medium">Включая НДС</div>
            </div>
        </div>
        <hr data-v-6d23d421="" data-v-15d61d2e="" class="mb-4">
        <section data-v-7d2c0330="" data-v-6d23d421="" data-v-15d61d2e="">
            <h4 data-v-7d2c0330="" class="body-text">Возникли проблемы ?</h4>
            <ul data-v-7d2c0330="" class="list-unstyled list-of-links">
                <li data-v-7d2c0330="">
                    <a data-v-7d2c0330="" href="https://community.nighthold.pro/forums/problemy-s-donatom.111/" target="_blank">
                        Служба поддержки
                        <span data-v-7d2c0330="" class="icon icon-external-link margin-left-tiny"></span>
                    </a>
                </li>
            </ul>
        </section>
    </div>
</div>
