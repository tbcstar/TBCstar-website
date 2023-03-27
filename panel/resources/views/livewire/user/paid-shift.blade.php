<div data-v-15d61d2e="" data-v-05ef4306="" data-v-34b77a92="" class="card mt-card-top battle-tag"
     x-data="{updateShift: false}" x-cloak>
    <div data-v-15d61d2e="" class="card-title">
        <div data-v-05ef4306="" data-v-15d61d2e="" class="row">
            <div data-v-05ef4306="" data-v-15d61d2e="" class="col-12 col-md-6">
                <h3 data-v-05ef4306="" data-v-15d61d2e="">NightHoldTag</h3>
            </div>
            <div data-v-05ef4306="" data-v-15d61d2e="" class="col-12 col-md-6">
                <a x-on:click="updateShift = true"  data-v-05ef4306="" data-v-15d61d2e="" href="javascript:void(0)" class="card-header-link
                    float-md-right">
                    <svg data-v-9b2a6982="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pen fa-w-16"><path data-v-9b2a6982="" fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"></path></svg>
                    Платная смена
                </a>
            </div>
            <div data-v-05ef4306="" data-v-15d61d2e="" class="col-sm-12 col-md-10 label description">
                    <span data-v-05ef4306="" data-v-15d61d2e="">
                        Именно под этим именем вас будут видеть на форуме.
                    </span>
            </div>
        </div>
    </div>
    <div data-v-4918d6bc="" class="alert-message info">Стоимость смены: {{ config('pay.bonus_change_tag') . ' ' . trans_choice('account.bonus', config('pay.bonus_change_tag')) }}. Первый раз бесплатно. </div>
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
                        <span data-v-05ef4306="" data-v-15d61d2e="" class="">{{ auth()->user()->forum->username ?? ''}}</span>
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
                                    <input data-v-112a4620="" data-v-15d61d2e="" type="text" wire:model.defer="state.username" placeholder="NightHoldTag" data-vv-validate-on="blur" data-vv-as="NightHoldTag" aria-required="true" aria-invalid="false" class="input-block">
                                    <x-jet-input-error for="state.username" class="mt-2" />
                                    @if (session()->has('message'))
                                        <div data-v-4918d6bc="" class="alert-message error">
                                            {{ session('message') }}
                                        </div>
                                    @endif
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
</div>
