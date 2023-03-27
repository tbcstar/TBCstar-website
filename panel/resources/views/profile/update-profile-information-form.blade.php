<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">

        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                Имя
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" id="first-name" wire:model.defer="state.first_name" placeholder="Имя" data-vv-as="Имя" aria-required="true" aria-invalid="false" class="input-block">
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="first_name" class="mt-2" />
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="Фамилия" data-vv-as="Фамилия" id="last-name" wire:model.defer="state.last_name" aria-required="true" aria-invalid="false" class="input-block">
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>
        </div>

        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                Дата рождения
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" id="day" wire:model.defer="state.day"
                       placeholder="День" data-vv-as="День" aria-required="true" aria-invalid="false"
                       class="input-block" @if(auth()->user()->info->day) disabled @endif>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="day" class="mt-2" />
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="Месяц" data-vv-as="Месяц"
                       id="month" wire:model.defer="state.month" aria-required="true" aria-invalid="false"
                       class="input-block" @if(auth()->user()->info->month) disabled @endif>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="month" class="mt-2" />
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="Год" data-vv-as="Год"
                       id="year" wire:model.defer="state.year" aria-required="true" aria-invalid="false"
                       class="input-block" @if(auth()->user()->info->year) disabled @endif>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="year" class="mt-2" />
            </div>
        </div>

        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                Страна / Регион
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                <select data-v-8dca2dd6="" wire:model.defer="state.country" data-v-7c3c8cd5="" id="country" title=""
                        class="grid-100 input-block" data-v-15d61d2e="" @if(auth()->user()->info->country) disabled @endif>
                    <option value="">Страна</option>
                    <option value="AUS">Австралия</option>
                    <option value="AUT">Австрия</option>
                    <option value="AZE">Азербайджан</option>
                    <option value="ALA">Аландские острова</option>
                    <option value="ALB">Албания</option>
                    <option value="DZA">Алжир</option>
                    <option value="ASM">Американское Самоа</option>
                    <option value="AIA">Ангилья</option>
                    <option value="AGO">Ангола</option>
                    <option value="AND">Андорра</option>
                    <option value="ATA">Антарктика</option>
                    <option value="ATG">Антигуа и Барбуда</option>
                    <option value="ARG">Аргентина</option>
                    <option value="ARM">Армения</option>
                    <option value="ABW">Аруба</option>
                    <option value="AFG">Афганистан</option>
                    <option value="BHS">Багамы</option>
                    <option value="BGD">Бангладеш</option>
                    <option value="BRB">Барбадос</option>
                    <option value="BHR">Бахрейн</option>
                    <option value="BLZ">Белиз</option>
                    <option value="BEL">Бельгия</option>
                    <option value="BEN">Бенин</option>
                    <option value="BMU">Бермудские о-ва</option>
                    <option value="BGR">Болгария</option>
                    <option value="BOL">Боливия</option>
                    <option value="BIH">Босния и Герцеговина</option>
                    <option value="BWA">Ботсвана</option>
                    <option value="BRA">Бразилия</option>
                    <option value="IOT">Британская территория в Индийском океане</option>
                    <option value="BRN">Бруней Даруссалам</option>
                    <option value="BFA">Буркина Фасо</option>
                    <option value="BDI">Бурунди</option>
                    <option value="BTN">Бутан</option>
                    <option value="MKD">Бывшая Югославская Республика Македония</option>
                    <option value="VUT">Вануату</option>
                    <option value="GBR">Великобритания</option>
                    <option value="HUN">Венгрия</option>
                    <option value="VEN">Венесуэла</option>
                    <option value="VGB">Виргинские о-ва, Великобритания</option>
                    <option value="VIR">Виргинские о-ва, США</option>
                    <option value="UMI">Внешние Малые острова США</option>
                    <option value="TLS">Восточный Тимор</option>
                    <option value="VNM">Вьетнам</option>
                    <option value="GAB">Габон</option>
                    <option value="HTI">Гаити</option>
                    <option value="GUY">Гайана</option>
                    <option value="GMB">Гамбия</option>
                    <option value="GHA">Гана</option>
                    <option value="GLP">Гваделупа</option>
                    <option value="GTM">Гватемала</option>
                    <option value="GIN">Гвинея</option>
                    <option value="GNB">Гвинея-Бисау</option>
                    <option value="DEU">Германия</option>
                    <option value="GGY">Гернси</option>
                    <option value="GIB">Гибралтар</option>
                    <option value="HND">Гондурас</option>
                    <option value="HKG">Гонконг</option>
                    <option value="GRD">Гренада</option>
                    <option value="GRL">Гренландия</option>
                    <option value="GRC">Греция</option>
                    <option value="GEO">Грузия</option>
                    <option value="DNK">Дания</option>
                    <option value="COD">Демократическая республика Конго</option>
                    <option value="STP">Демократическая Республика Сан-Томе и Принсипи</option>
                    <option value="JEY">Джерси</option> <option value="DJI">Джибути</option>
                    <option value="DMA">Доминика</option>
                    <option value="DOM">Доминиканская республика</option>
                    <option value="EGY">Египет</option>
                    <option value="ZMB">Замбия</option>
                    <option value="ESH">Западная Сахара</option>
                    <option value="ZWE">Зимбабве</option>
                    <option value="ISR">Израиль</option>
                    <option value="IND">Индия</option>
                    <option value="IDN">Индонезия</option>
                    <option value="JOR">Иордан</option>
                    <option value="IRQ">Ирак</option>
                    <option value="IRL">Ирландия</option>
                    <option value="IRN">Исламская Республика Иран</option>
                    <option value="ISL">Исландия</option>
                    <option value="ESP">Испания</option>
                    <option value="ITA">Италия</option>
                    <option value="YEM">Йемен</option>
                    <option value="CPV">Кабо-Верде</option>
                    <option value="KAZ">Казахстан</option>
                    <option value="CYM">Каймановы о-ва</option>
                    <option value="KHM">Камбоджа</option>
                    <option value="CMR">Камерун</option>
                    <option value="CAN">Канада</option>
                    <option value="QAT">Катар</option>
                    <option value="KEN">Кения</option>
                    <option value="CYP">Кипр</option>
                    <option value="KGZ">Киргизстан</option>
                    <option value="KIR">Кирибати</option>
                    <option value="CHN">Китай</option>
                    <option value="COL">Колумбия</option>
                    <option value="COM">Коморские Острова</option>
                    <option value="COG">Конго</option>
                    <option value="CRI">Коста-Рика</option>
                    <option value="CIV">Кот-д&#39;Ивуар</option>
                    <option value="CUB">Куба</option>
                    <option value="KWT">Кувейт</option>
                    <option value="LAO">Лаосская Народно-Демократическая Республика</option>
                    <option value="LVA">Латвия</option>
                    <option value="LSO">Лесото</option>
                    <option value="LBR">Либерия</option>
                    <option value="LBN">Ливан</option>
                    <option value="LBY">Ливийская Арабская Джамахирия</option>
                    <option value="LTU">Литва</option>
                    <option value="LIE">Лихтенштейн</option>
                    <option value="LUX">Люксембург</option>
                    <option value="MUS">Маврикий</option>
                    <option value="MRT">Мавритания</option>
                    <option value="MDG">Мадагаскар</option>
                    <option value="MAC">Макао</option>
                    <option value="MWI">Малави</option>
                    <option value="MYS">Малайзия</option>
                    <option value="MLI">Мали</option>
                    <option value="MLT">Мальта</option>
                    <option value="MAR">Марокко</option>
                    <option value="MTQ">Мартиника</option>
                    <option value="MHL">Маршалловы о-ва</option>
                    <option value="MEX">Мексика</option>
                    <option value="MOZ">Мозамбик</option>
                    <option value="MCO">Монако</option>
                    <option value="MNG">Монголия</option>
                    <option value="MSR">Монтсеррат</option>
                    <option value="MMR">Мьянма</option>
                    <option value="NAM">Намибия</option>
                    <option value="NRU">Науру</option>
                    <option value="NPL">Непал</option>
                    <option value="NER">Нигер</option>
                    <option value="NGA">Нигерия</option>
                    <option value="ANT">Нидерландские Антильские О-ва</option>
                    <option value="NLD">Нидерланды</option>
                    <option value="NIC">Никарагуа</option>
                    <option value="NIU">Ниуэ</option>
                    <option value="NZL">Новая Зеландия</option>
                    <option value="NCL">Новая Каледония</option>
                    <option value="NOR">Норвегия</option>
                    <option value="TZA">Объединённая Республика Танзания</option>
                    <option value="ARE">Объединенные Арабские Эмираты</option>
                    <option value="COK">О-ва Кука</option>
                    <option value="TCA">О-ва Теркс и Кайкос</option>
                    <option value="FJI">о-ва Фиджи</option>
                    <option value="BVT">О-в Буве</option>
                    <option value="GUM">О-в Гуам</option>
                    <option value="NFK">О-в Норфолк</option>
                    <option value="OMN">Оман</option>
                    <option value="SJM">Острова Свальбард и Ян-Майен</option>
                    <option value="WLF">Острова Уоллис и Футуна</option>
                    <option value="CCK">Остров Кокос</option>
                    <option value="MYT">Остров Майотта</option>
                    <option value="IMN">Остров Мэн</option>
                    <option value="CXR">Остров Рождества</option>
                    <option value="BLM">Остров Св. Варфоломея</option>
                    <option value="SHN">Остров Св. Елены</option>
                    <option value="MAF">Остров Св. Мартина (Фр.)</option>
                    <option value="HMD">Остров Херд и острова МакДональд</option>
                    <option value="PAK">Пакистан</option>
                    <option value="PLW">Палау</option>
                    <option value="PSE">Палестина</option>
                    <option value="PAN">Панама</option>
                    <option value="PNG">Папуа Новая Гвинея</option>
                    <option value="PRY">Парагвай</option>
                    <option value="PER">Перу</option>
                    <option value="PCN">Питкэрн</option>
                    <option value="POL">Польша</option>
                    <option value="PRT">Португалия</option>
                    <option value="PRI">Пуэрто-Рико</option>
                    <option value="BLR">Республика Беларусь</option>
                    <option value="KOR">Республика Корея</option>
                    <option value="MDV">Республика Мальдивы</option>
                    <option value="MDA">Республика Молдова</option>
                    <option value="REU">Реюньон</option>
                    <option value="RUS">Российская Федерация</option>
                    <option value="RWA">Руанда</option>
                    <option value="ROU">Румыния</option>
                    <option value="SLV">Сальвадор</option>
                    <option value="WSM">Самоа</option>
                    <option value="SMR">Сан-Марино</option>
                    <option value="SAU">Саудовская Аравия</option>
                    <option value="SWZ">Свазиленд</option>
                    <option value="VAT">Святой Престол (Ватикан)</option>
                    <option value="MNP">Северные Марианские о-ва</option>
                    <option value="SYC">Сейшельские о-ва</option>
                    <option value="SEN">Сенегал</option>
                    <option value="SPM">Сен-Пьер и Микелон</option>
                    <option value="VCT">Сент-Винсент и Гренадины</option>
                    <option value="KNA">Сент-Китс и Невис</option>
                    <option value="LCA">Сент-Люсия</option>
                    <option value="SRB">Сербия</option>
                    <option value="SGP">Сингапур</option>
                    <option value="SVK">Словакия</option>
                    <option value="SVN">Словения</option>
                    <option value="SLB">Соломоновы о-ва</option>
                    <option value="SOM">Сомали</option>
                    <option value="SDN">Судан</option>
                    <option value="SUR">Суринам</option>
                    <option value="USA">США</option>
                    <option value="SLE">Сьерра-Леоне</option>
                    <option value="TJK">Таджикистан</option>
                    <option value="THA">Таиланд</option>
                    <option value="TWN">Тайвань</option>
                    <option value="TGO">Того</option>
                    <option value="TKL">Токелау</option>
                    <option value="TON">Тонга</option>
                    <option value="TTO">Тринидад и Тобаго</option>
                    <option value="TUV">Тувалу</option>
                    <option value="TUN">Тунис</option>
                    <option value="TKM">Туркменистан</option>
                    <option value="TUR">Турция</option>
                    <option value="UGA">Уганда</option>
                    <option value="UZB">Узбекистан</option>
                    <option value="UKR">Украина</option>
                    <option value="URY">Уругвай</option>
                    <option value="FRO">Фарерские о-ва</option>
                    <option value="FSM">Федеративные Штаты Микронезии</option>
                    <option value="PHL">Филиппины</option>
                    <option value="FIN">Финляндия</option>
                    <option value="FLK">Фолклендские о-ва (Мальвинские острова)</option>
                    <option value="FRA">Франция</option>
                    <option value="GUF">Французская Гвиана</option>
                    <option value="PYF">Французская Полинезия</option>
                    <option value="ATF">Французские Южные территории</option>
                    <option value="HRV">Хорватия</option>
                    <option value="CAF">Центральноафриканская республика</option>
                    <option value="TCD">Чад</option>
                    <option value="MNE">Черногория</option>
                    <option value="CZE">Чешская республика</option>
                    <option value="CHL">Чили</option>
                    <option value="CHE">Швейцария</option>
                    <option value="SWE">Швеция</option>
                    <option value="LKA">Шри-Ланка</option>
                    <option value="ECU">Эквадор</option>
                    <option value="GNQ">Экваториальная Гвинея</option>
                    <option value="ERI">Эритрея</option>
                    <option value="EST">Эстония</option>
                    <option value="ETH">Эфиопия</option>
                    <option value="SGS">Южная Георгия и Южные Сандвичевы острова</option>
                    <option value="ZAF">Южно-Африканская Республика</option>
                    <option value="JAM">Ямайка</option>
                    <option value="JPN">Япония</option>
                </select>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="help-block"></span>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-112a4620="" data-v-15d61d2e="" class="col offset-md-3 offset-lg-3 offset-xl-2">
                <button wire:loading.attr="disabled" wire:target="photo" type="submit" data-v-312dd04b=""
                        data-v-112a4620="" data-v-15d61d2e="" class="btn-primary btn">
                    Сохранить
                </button>
                <button x-on:click="isEditing = false" type="button" data-v-312dd04b=""
                        data-v-112a4620="" data-v-15d61d2e="" class="btn-secondary btn">
                    Отмена
                </button>
                <x-jet-action-message data-v-312dd04b="" data-v-112a4620=""
                                      data-v-15d61d2e="" class="btn-secondary btn" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
            </div>
        </div>
    </x-slot>
</x-jet-form-section>
