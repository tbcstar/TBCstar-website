<div>
    @if($enable)
        <form wire:submit.prevent="paymentCreateValidate">
            <div data-v-2d0dc31c="" data-v-15d61d2e="">
                    <div data-v-15e52fe7="" data-v-15d61d2e="" class="row">
                        <div data-v-15e52fe7="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                            <select data-v-8dca2dd6="" wire:model="service" name="service" data-v-7c3c8cd5="" title="" class="grid-100 input-block" data-v-15d61d2e="">
                                <option value="">服务</option>
                                <option value="qw">QIWI</option>
                                <option value="ya">ЮMoney</option>
                                <option value="cd">银行卡</option>
                            </select>
                            @error('service')<span data-v-15e52fe7="" data-v-15d61d2e="" class="is-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @if($service)
                    <div data-v-15e52fe7="" data-v-15d61d2e="" class="row">
                        <div data-v-15e52fe7="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                            <input data-v-15e52fe7="" data-v-15d61d2e="" type="number" wire:model="wallet" name="wallet"
                                   placeholder="@if($service === 'qw') 输入电话号码 @elseif($service ===
                                   'ya') 输入ЮMoney电子钱包号码 @else 输入银行卡号码 @endif"
                                   required class="mt-3">
                            @error('wallet')<span data-v-15e52fe7="" data-v-15d61d2e="" class="is-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
                    @if($wallet)
                    <div data-v-15e52fe7="" data-v-15d61d2e="" class="row">
                        <div data-v-15e52fe7="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                            <input data-v-15e52fe7="" data-v-15d61d2e="" type="number" wire:model="sum" name="sum"
                                   placeholder="输入奖励积分数量" required class="mt-3">
                            @error('sum')<span data-v-15e52fe7="" data-v-15d61d2e="" class="is-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
                <div data-v-2d0dc31c="" data-v-15d61d2e="" class="row mt-4">
                    <button wire:click="paymentCreate" type="submit" data-v-312dd04b="" data-v-2d0dc31c="" data-v-15d61d2e=""
                            class="btn-primary mr-3 btn">继续</button>
                    <a href="{{ route('profile.payment') }}" class="btn btn-secondary back-btn" data-v-2d0dc31c=""
                       data-v-15d61d2e="">取消</a>
                </div>
            </div>
        </form>
    @else
        <div data-v-70ad3292="" class=" table-background-transparent">
            充值已暂时关闭。
        </div>
    @endif
</div>
