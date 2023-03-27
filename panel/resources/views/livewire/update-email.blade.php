<div data-v-15d61d2e="" data-v-7c3c8cd5="" data-v-34b77a92="" class="card mt-card-top email" x-data="{updateEmail: false}" x-cloak>
    <div data-v-15d61d2e="" class="card-title">
        <div data-v-f521b32c="" data-v-15d61d2e="" class="row">
            <div data-v-f521b32c="" data-v-15d61d2e="" class="col-12 col-md-6">
                <h3 data-v-f521b32c="" data-v-15d61d2e="">Электронная почта</h3>
            </div>
            <div data-v-f521b32c="" data-v-15d61d2e="" class="col-12 col-md-6">
                <a x-on:click="updateEmail = true" data-v-f521b32c="" data-v-15d61d2e="" href="javascript:void(0)
" class="card-header-link float-md-right"><svg data-v-f521b32c="" data-v-15d61d2e="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pen fa-w-16"><path data-v-f521b32c="" data-v-15d61d2e="" fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z" class=""></path></svg> Обновить
                </a>
            </div>
        </div>
    </div>
    <div data-v-15d61d2e="" class="card-subtitle">
        <div data-v-7c3c8cd5="" data-v-15d61d2e="">
            @if(!auth()->user()->email_verified_at)
                <div data-v-4918d6bc="" class="alert-message success" data-v-15d61d2e="">
                    <div data-v-cc173d72="" class="d-none icon"></div>
                    <div data-v-cc173d72="" class="">
                        <h3 data-v-cc173d72="" class="uppercase"></h3>
                        <span data-v-f521b32c=""><!---->
                            <span data-v-f521b32c="">
					Чтобы подтвердить ваш адрес электронной почты, щелкните по ссылке в письме, отправленном по адресу {{ auth()->user()->email_hidden }}.
                                @if(session('message'))
                                    <span data-v-f521b32c="">
                                    Письмо с запросом подтверждения отправлено.
                                </span>
                                @else
                                    <span data-v-f521b32c="">
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <div>
                                            <x-jet-button data-v-0a034e2c="" type="submit">
                                                @lang('account.account_4')
                                            </x-jet-button>
                                        </div>
                                    </form>
                                </span>
                                @endif
                            </span>
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div data-v-15d61d2e="" class="card-body">
        <div data-v-f521b32c="" data-v-15d61d2e="">
            <div data-v-f521b32c="" data-v-15d61d2e="" id="placeholder-86" class="hide">
                <div data-v-f521b32c="" data-v-15d61d2e="">
                    <div data-v-f521b32c="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                        <div data-v-f521b32c="" data-v-15d61d2e="" class="col-4 col-sm-3 col-md-3 col-xl-2 label">
                            Электронная почта
                        </div>
                        <div data-v-f521b32c="" data-v-15d61d2e="" class="col-8 col-sm-9 col-md-9 col-xl-10">
                            <span data-v-f521b32c="" data-v-15d61d2e="" class="placeholder-l animated-background"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-f521b32c="" data-v-15d61d2e="" class="">
                <div x-show=!updateEmail data-v-f521b32c="" data-v-15d61d2e="">
                    <div data-v-f521b32c="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                        <div data-v-f521b32c="" data-v-15d61d2e="" class="col-sm-12 col-sm-3 col-md-3 col-xl-2 label">Электронная почта</div>
                        <div data-v-f521b32c="" data-v-15d61d2e="" class="col-sm-12 col-sm-9 col-md-9 col-xl-10">{{ auth()->user()->email_hidden }}
                            @if(!auth()->user()->email_verified_at)
                                <span data-v-f521b32c="" data-v-15d61d2e="" class="label">
								(Не подтверждено)
							</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div x-show=updateEmail @click.away="updateEmail = false" data-v-f521b32c="" data-v-15d61d2e=""
                     class="edit-info">
                    <form wire:submit.prevent="protectionValidate" data-v-f521b32c="" data-v-15d61d2e="">
                        <div data-v-f521b32c="" data-v-15d61d2e="" class="row">
                            <div data-v-f521b32c="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label email-label">
                                Электронная почта
                            </div>
                            <div data-v-f521b32c="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                                <input data-v-f521b32c="" data-v-15d61d2e="" type="text" id="email" wire:model.defer="state.email" name="email"
                                       placeholder="Электронная почта" data-vv-validate-on="blur" data-vv-as="электронная почта" class="input-block" aria-required="true" aria-invalid="false">
                                <span data-v-f521b32c="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                            </div>
                        </div>
                        <div data-v-f521b32c="" data-v-15d61d2e="" class="row mt-3">
                            <div data-v-f521b32c="" data-v-15d61d2e="" class="col offset-md-3 offset-lg-3 offset-xl-2">
                                <button wire:click="update" x-on:click="updateEmail = false" data-v-312dd04b=""
                                        data-v-f521b32c="" class="btn-primary btn" data-v-15d61d2e="">
                                    Сохранить
                                </button>
                                <button x-on:click="updateEmail = false" data-v-312dd04b="" data-v-f521b32c=""
                                        class="ml-md-3 mt-3 mt-md-0 btn-secondary btn" data-v-15d61d2e="">
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
