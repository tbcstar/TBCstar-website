<div>
    @if($enable)
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
            Пополнение баланса временно отключено.
        </div>
    @endif
</div>
