<div data-v-15d61d2e="" class="card-body">
    <div data-v-05ef4306="" data-v-15d61d2e="">
        <div data-v-05ef4306="" data-v-15d61d2e="" class="hide">
            <div data-v-05ef4306="" data-v-15d61d2e="" class="row">
                <div data-v-05ef4306="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2">
                    <span data-v-05ef4306="" data-v-15d61d2e="" class="label">NightHoldTag</span>
                </div>
                <div data-v-05ef4306="" data-v-15d61d2e="" class="col-12 col-md-9 col-xl-10">
                    <span data-v-05ef4306="" data-v-15d61d2e="" class="placeholder-l animated-background"></span>
                </div>
            </div>
        </div>
        <div x-show=!updateShift data-v-05ef4306="" data-v-15d61d2e="">
            <div data-v-05ef4306="" data-v-15d61d2e="" class="row">
                <div data-v-05ef4306="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2">
                    <span data-v-05ef4306="" data-v-15d61d2e="" class="label">NightHoldTag</span>
                </div>
                <div data-v-05ef4306="" data-v-15d61d2e="" class="col-12 col-md-9 col-xl-10">
                    <span data-v-05ef4306="" data-v-15d61d2e="" class="">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>
        <div x-show=updateShift data-v-05ef4306="" data-v-15d61d2e="">
            <div data-v-15d61d2e="" class="" data-v-112a4620="">
                <div data-v-15d61d2e="" class="edit-info" data-v-112a4620="" data-vv-scope="edit-email">
                    <form wire:submit.prevent="protectionValidate" data-v-112a4620="" data-v-15d61d2e="">
                        <div data-v-112a4620="" data-v-15d61d2e="" class="row">
                            <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label email-label">
                                NightHoldTag
                            </div>
                            <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                                <input data-v-112a4620="" data-v-15d61d2e="" type="text" wire:model.defer="state.name" placeholder="NightHoldTag" data-vv-validate-on="blur" data-vv-as="NightHoldTag" aria-required="true" aria-invalid="false" class="input-block">
                                <x-jet-input-error for="state.name" class="mt-2" />
                            </div>
                        </div>
                        <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
                            <div data-v-112a4620="" data-v-15d61d2e="" class="col offset-md-3 offset-lg-3 offset-xl-2">
                                <button wire:click="protection" type="submit"
                                        data-v-312dd04b="" data-v-112a4620="" data-v-15d61d2e="" class="btn-primary btn">
                                    Сохранить
                                </button>
                                <button x-on:click="updateShift = false" type="reset" data-v-312dd04b=""
                                        data-v-112a4620="" data-v-15d61d2e="" class="ml-md-3 mt-3 mt-md-0 btn-secondary btn">
                                    Отмена
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
