<div data-v-15d61d2e="" data-v-53d343a4="" class="card mt-card-top" x-data="{updatePhone: false}" x-cloak>
    <div data-v-15d61d2e="" class="card-title">
        <div data-v-9b2a6982="" data-v-15d61d2e="" class="row">
            <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-12 col-md-6">
                <h3 data-v-9b2a6982="" data-v-15d61d2e="">电话号码</h3>
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                <a x-on:click="updatePhone = true" data-v-7c3c8cd5=""
                   data-v-15d61d2e=""
                   class="card-header-link float-md-right" href="javascript:void(0)">
                    @if(auth()->user()->info->phone_number)
                        <svg data-v-f521b32c="" data-v-15d61d2e="" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pen fa-w-16"><path data-v-f521b32c="" data-v-15d61d2e="" fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z" class=""></path></svg> 更新
                    @else
                        <svg data-v-f521b32c="" data-v-15d61d2e="" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pen fa-w-16"><path data-v-f521b32c="" data-v-15d61d2e="" fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z" class=""></path></svg> 添加
                    @endif
                </a>
            </div>
        </div>
    </div>
    <div data-v-15d61d2e="" class="card-body">
        <div x-show=!updatePhone data-v-9b2a6982="" data-v-15d61d2e="">
            <div data-v-9b2a6982="" data-v-15d61d2e="" id="placeholder-88" class="hide">
                <div data-v-9b2a6982="" data-v-15d61d2e="">
                    <div data-v-9b2a6982="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                        <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-4 col-sm-3 col-md-3 col-xl-2 label">
                            电话号码
                        </div>
                        <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-8 col-sm-9 col-md-9 col-xl-10">
                            <span data-v-9b2a6982="" data-v-15d61d2e="" class="placeholder-l animated-background"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-9b2a6982="" data-v-15d61d2e="" class="">
                <div data-v-9b2a6982="" data-v-15d61d2e="">
                    <div data-v-9b2a6982="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                        <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-sm-12 col-sm-3 col-md-3 col-xl-2 label">电话号码</div>
                        <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-sm-12 col-sm-4 col-md-4 col-xl-2">
                            <div data-v-9b2a6982="" data-v-15d61d2e="">{{ auth()->user()->info->phone_hidden  ?? '未指定.' }}</div>
                        </div>
                        @if(auth()->user()->info->phone_number)
                            <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-sm-12 col-sm-5 col-md-5 col-xl-8">
                                <a data-v-9b2a6982="" href="javascript:void(0)" wire:click="confirmUserDelete" wire:loading.attr="disabled" class="link float-md-right"
                                   data-v-15d61d2e="">删除</a>
                            </div>

                            <x-jet-dialog-modal wire:model="confirmingUserDelete">
                                <x-slot name="title">
                                    你确定吗？
                                </x-slot>

                                <x-slot name="content">
                                    {{ __('如果您关闭此功能，您的帐户安全级别将降低。要关闭吗？') }}

                                    <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                        <x-jet-input type="password" class="mt-1 block w-3/4"
                                                     placeholder="{{ __('密码') }}"
                                                     x-ref="password"
                                                     wire:model.defer="password"
                                                     wire:keydown.enter="deleteUser" />

                                        <x-jet-input-error for="password" class="mt-2" />
                                    </div>
                                </x-slot>

                                <x-slot name="footer">
                                    <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                                        {{ __('终止') }}
                                    </x-jet-danger-button>

                                    <x-jet-secondary-button wire:click="$toggle('confirmingUserDelete')" wire:loading.attr="disabled">
                                        {{ __('取消') }}
                                    </x-jet-secondary-button>
                                </x-slot>
                            </x-jet-dialog-modal>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div x-show=updatePhone data-v-53d343a4="" data-v-15d61d2e="">
            <div data-v-53d343a4="" data-v-15d61d2e="" >
                <div data-v-53d343a4="" data-v-15d61d2e="" class="mt-4">
                    电话号码
                </div>
                <div data-v-53d343a4="" data-v-15d61d2e="" class="mt-4"></div>
                <form wire:submit.prevent="protectionValidate" data-v-53d343a4="" data-v-15d61d2e="">
                    <div data-v-53d343a4="" data-v-15d61d2e="" class="row">
                        <div data-v-53d343a4="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-4">
                            <input data-v-53d343a4="" data-v-15d61d2e="" type="tel" wire:model.defer="state.phone_number"
                                   data-vv-as="电话号码" placeholder="输入电话号码" class="" aria-required="true" aria-invalid="true">
                            <x-jet-input-error for="state.phone_number" class="mt-2" />
                        </div>
                    </div>
                    <div data-v-53d343a4="" data-v-15d61d2e="" class="row mt-4">
                        <div data-v-53d343a4="" data-v-15d61d2e="" class="col-12">
                            <button wire:click="protection" x-on:click="updatePhone = false" data-v-312dd04b="" data-v-53d343a4="" class="btn-primary
                    mr-3 btn" data-v-15d61d2e="">
                                继续
                            </button>
                            <button x-on:click="updatePhone = false" data-v-312dd04b="" data-v-53d343a4="" class="btn-secondary mt-3 mt-md-0 btn" type="button" data-v-15d61d2e="">
                                取消
                            </button>
                            <x-jet-action-message data-v-312dd04b="" data-v-112a4620=""
                                                  data-v-15d61d2e="" class="ml-md-3 mt-3 mt-md-0" on="saved">
                                {{ __('保存。') }}
                            </x-jet-action-message>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
