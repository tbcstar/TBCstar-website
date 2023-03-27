<div>
    @if($game)
        <form wire:submit.prevent="paymentCreateValidate">
            <div data-v-2d0dc31c="" data-v-15d61d2e="">
                <ul data-v-2d0dc31c="" data-v-15d61d2e="" class="wallet-options">
                    <li data-v-2d0dc31c="" data-v-15d61d2e="">
                        <div data-v-2d0dc31c="" data-v-15d61d2e="" class="custom-control custom-radio">
                            <input data-v-2d0dc31c="" data-v-15d61d2e="" type="radio" wire:model="option" name="option"
                                   id="FreeKassa" value="FreeKassa" class="custom-control-input">
                            <label data-v-2d0dc31c="" data-v-15d61d2e="" for="FreeKassa" class="custom-control-label">
                                FreeKassa
                            </label>
                        </div>
                    </li>
                    <li data-v-2d0dc31c="" data-v-15d61d2e="">
                        <div data-v-2d0dc31c="" data-v-15d61d2e="" class="custom-control custom-radio">
                            <input data-v-2d0dc31c="" data-v-15d61d2e="" type="radio" wire:model="option" name="option"
                                   id="Enot" value="enot" class="custom-control-input">
                            <label data-v-2d0dc31c="" data-v-15d61d2e="" for="Enot" class="custom-control-label">
                                Enot
                            </label>
                        </div>
                    </li>
                </ul>
                @if($option)
                    <div data-v-15e52fe7="" data-v-15d61d2e="" class="row">
                        <div data-v-15e52fe7="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                            <select data-v-8dca2dd6="" wire:model="service" name="service" data-v-7c3c8cd5="" title="" class="grid-100 input-block" data-v-15d61d2e="">
                                <option value="">Сервис</option>
                                <option value="qw">QIWI</option>
                                <option value="ya">ЮMoney</option>
                                <option value="cd">Банковские карты</option>
                            </select>
                            @error('service')<span data-v-15e52fe7="" data-v-15d61d2e="" class="is-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @if($service)
                    <div data-v-15e52fe7="" data-v-15d61d2e="" class="row">
                        <div data-v-15e52fe7="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                            <input data-v-15e52fe7="" data-v-15d61d2e="" type="number" wire:model="wallet" name="wallet"
                                   placeholder="Введите номер кошелька" required class="mt-3">
                            @error('wallet')<span data-v-15e52fe7="" data-v-15d61d2e="" class="is-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
                    <div data-v-15e52fe7="" data-v-15d61d2e="" class="row">
                        <div data-v-15e52fe7="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                            <input data-v-15e52fe7="" data-v-15d61d2e="" type="number" wire:model="sum" name="sum"
                                   placeholder="Введите количество бонусов" required class="mt-3">
                            @error('sum')<span data-v-15e52fe7="" data-v-15d61d2e="" class="is-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                @endif
                <div data-v-2d0dc31c="" data-v-15d61d2e="" class="row mt-4">
                    <button wire:click="paymentCreate" type="submit" data-v-312dd04b="" data-v-2d0dc31c="" data-v-15d61d2e=""
                            class="btn-primary mr-3 btn">Продолжить</button>
                    <a href="{{ route('profile.payment') }}" class="btn btn-secondary back-btn" data-v-2d0dc31c=""
                       data-v-15d61d2e="">Отмена</a>
                </div>
            </div>
        </form>
    @else
        <div data-v-70ad3292="" class=" table-background-transparent">
            У вас нет игровых аккаунтов. <a href="{{ route('profile.games') }}">Создайте учетную запись</a>
        </div>
    @endif
</div>
