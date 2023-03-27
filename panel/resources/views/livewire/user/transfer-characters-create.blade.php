<div data-v-0a034e2c="" class="overview-card col-12">
    <div data-v-15d61d2e="" data-v-7c3c8cd5="" data-v-34b77a92="" class="card mt-card-top personal-info">

        <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">Подать заявку</h3>
                    </div>
                </div>
            </div>
        <div data-v-15d61d2e="" class="card-body">
            <div data-v-112a4620="" data-v-15d61d2e="">
                <div data-v-112a4620="" data-v-15d61d2e="" id="placeholder-15">

                    <div  data-v-7c3c8cd5="" data-v-15d61d2e="" class="edit-info">
                        <form wire:submit.prevent="saveValidate" data-v-112a4620="" data-v-15d61d2e="">

                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    Login/Password
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                                    <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="Login"
                                           data-vv-as="Login" wire:model="login" aria-required="true"
                                           aria-invalid="false" class="input-block">
                                    @error('login')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                                    <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="Password"
                                           data-vv-as="Password" wire:model="password" aria-required="true"
                                           aria-invalid="false" class="input-block">
                                    @error('password')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label email-label">
                                    Имя персонажа
                                </div>
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                                    <input data-v-112a4620="" data-v-15d61d2e="" type="text" placeholder="Имя персонажа"
                                           class="input-block" wire:model="nameOld">
                                    @error('nameOld')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    Сервер
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="server" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">Сервер</option>
                                        <option value="Wowcircle x1">Wowcircle x1</option>
                                        <option value="Wowcircle x5">Wowcircle x5</option>
                                        <option value="Wowcircle x100">Wowcircle x100</option>
                                        <option value="Sirus x2">Sirus x2</option>
                                        <option value="Sirus x4">Sirus x4</option>
                                        <option value="Sirus x10">Sirus x10</option>
                                        <option value="Uwow x30">Uwow x30</option>
                                        <option value="Ezwow x2-x8">Ezwow x2-x8</option>
                                        <option value="Warmane 3.3.5">Warmane 3.3.5</option>
                                    </select>
                                    @error('server')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @if($server)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    Фракция
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="faction" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">Фракция</option>
                                        <option value="Альянс">Альянс</option>
                                        <option value="Орда">Орда</option>
                                    </select>
                                    @error('faction')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($faction)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    Пол персонажа
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="gender" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">Пол персонажа</option>
                                        <option value="Мужской">Мужской</option>
                                        <option value="Женский">Женский</option>
                                    </select>
                                    @error('gender')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($faction)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    Раса
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="rasa" data-v-7c3c8cd5="" class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">Раса</option>
                                        @if($faction === 'Альянс')
                                            <option value="Человек">Человек</option>
                                            <option value="Дворф">Дворф</option>
                                            <option value="Ночной Эльф">Ночной Эльф</option>
                                            <option value="Гном">Гном</option>
                                            <option value="Дреней">Дреней</option>
                                            <option value="Ворген">Ворген</option>
                                            <option value="Пандарен">Пандарен</option>
                                            <option value="Эльф Бездны">Эльф Бездны</option>
                                            <option value="Охотник на Демонов">Охотник на Демонов</option>
                                        @endif
                                        @if($faction === 'Орда')
                                            <option value="">Раса</option>
                                            <option value="Орк">Орк</option>
                                            <option value="Нежить">Нежить</option>
                                            <option value="Таурен">Таурен</option>
                                            <option value="Тролль">Тролль</option>
                                            <option value="Эльф Крови">Эльф Крови</option>
                                            <option value="Гоблин">Гоблин</option>
                                            <option value="Ночнорожденный">Ночнорожденный</option>
                                            <option value="Вульпера">Вульпера</option>
                                            <option value="Охотник на Демонов">Охотник на Демонов</option>
                                        @endif
                                    </select>
                                    @error('rasa')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($rasa)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    Класс
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="class" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">Класс</option>
                                        <option value="Воин">Воин</option>
                                        <option value="Паладин">Паладин</option>
                                        <option value="Охотник">Охотник</option>
                                        <option value="Разбойник">Разбойник</option>
                                        <option value="Жрец">Жрец</option>
                                        <option value="Шаман">Шаман</option>
                                        <option value="Маг">Маг</option>
                                        <option value="Чернокнижник">Чернокнижник</option>
                                        <option value="Друид">Друид</option>
                                        <option value="Рыцарь Смерти">Рыцарь Смерти</option>
                                    </select>
                                    @error('class')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($class)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    Специализация
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="specializacia" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">Специализация</option>
                                        @if($class === "Воин")
                                        <option value="Оружие">Оружие</option>
                                        <option value="Неистовство">Неистовство</option>
                                        <option value="Защита">Защита</option>
                                        @endif
                                        @if($class === "Паладин")
                                        <option value="Свет">Свет</option>
                                        <option value="Защита">Защита</option>
                                        <option value="Воздаяние">Воздаяние</option>
                                        @endif
                                        @if($class === "Охотник")
                                            <option value="Повелитель зверей">Повелитель зверей</option>
                                            <option value="Стрельба">Стрельба</option>
                                            <option value="Выживание">Выживание</option>
                                        @endif
                                        @if($class === "Разбойник")
                                            <option value="Ликвидация">Ликвидация</option>
                                            <option value="Бой">Бой</option>
                                            <option value="Скрытность">Скрытность</option>
                                        @endif
                                        @if($class === "Жрец")
                                            <option value="Послушание">Послушание</option>
                                            <option value="Свет">Свет</option>
                                            <option value="Тьма">Тьма</option>
                                        @endif
                                        @if($class === "Шаман")
                                            <option value="Стихии">Стихии</option>
                                            <option value="Совершенствование">Совершенствование</option>
                                            <option value="Исцеление">Исцеление</option>
                                        @endif
                                        @if($class === "Маг")
                                            <option value="Тайная магия">Тайная магия</option>
                                            <option value="Огонь">Огонь</option>
                                            <option value="Лед">Лед</option>
                                        @endif
                                        @if($class === "Чернокнижник")
                                            <option value="Колдовство">Колдовство</option>
                                            <option value="Демонология">Демонология</option>
                                            <option value="Разрушение">Разрушение</option>
                                        @endif
                                        @if($class === "Друид")
                                            <option value="Баланс">Баланс</option>
                                            <option value="Сила зверя">Сила зверя</option>
                                            <option value="Исцеление">Исцеление</option>
                                        @endif
                                        @if($class === "Рыцарь Смерти")
                                            <option value="Кровь">Кровь</option>
                                            <option value="Лед">Лед</option>
                                            <option value="Нечестивость">Нечестивость</option>
                                        @endif
                                    </select>
                                    @error('specializacia')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($specializacia)
                            <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label email-label">
                                    Имя персонажа
                                </div>
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                                    <input data-v-112a4620="" data-v-15d61d2e="" type="text"
                                           placeholder="Желаемое Имя персонажа на нашем сервере" class="input-block"
                                           wire:model="name">
                                    @error('name')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col offset-md-3 offset-lg-3 offset-xl-2">
                                    <button wire:click="save" wire:loading.attr="disabled" type="submit"
                                            data-v-312dd04b=""
                                            data-v-112a4620=""
                                            data-v-15d61d2e="" class="btn-primary btn">
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
