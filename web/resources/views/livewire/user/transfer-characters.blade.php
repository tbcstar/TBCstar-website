<div>
    <div data-v-0a034e2c="" class="row">
        <div data-v-0a034e2c="" class="overview-card col-12">
            <div data-v-15d61d2e="" data-v-7090ae16="" data-v-0a034e2c="" class="card account-overview-code">
                <div data-v-15d61d2e="" class="card-title">
                    <div data-v-7090ae16="" data-v-15d61d2e="">
                        <h3 data-v-7090ae16="" data-v-15d61d2e="">
                            Критерии
                        </h3>
                    </div>
                </div>
                <div data-v-15d61d2e="" class="card-body">
                    <div data-v-7090ae16="" data-v-15d61d2e="" id="redeem-code-form">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                            <ul>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">Клонируемый персонаж не удаляется на другом сервере Минимальный уровень предметов персонажа для переноса не должен быть ниже 226 уровня предметов, для персонажей с серверов Wowcircle x5 и Wowcircle x100 - не ниже 232 уровня предметов.</li></div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">При клонировании не переносятся транспортные средства, но дается летающий и наземный транспорт на персонажа на нашем сервере</li></div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">При клонировании у персонажа переносится (не клонируется) золото. Максимальная сумма переносимого золота = 10000 золотых монет.</li> </div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">При клонировании на нашем сервере персонаж автоматически получает максимальный навык верховой езды, даже если он не был изучен на сервере, откуда происходит клоинрование</li> </div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">Один игрок может осуществить бесплатно только одно клонирование, повторное клонирование будет стоить 79 бонусов.</li>
                            </div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">При клонировании персонажа не берутся в учет достижения, профессии и реагенты.</li></div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">При клонировании не учитывается экипировка персонажа, выдается экипировка 180 уровня предметов на одну выбранную специализацию персонажа</li></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-v-0a034e2c="" class="row">
        @empty($list)
            <livewire:user.transfer-characters-create />
        @else
            <livewire:user.transfer-characters-list />
        @endempty
    </div>
</div>
