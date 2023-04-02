<x-jet-action-section>
    <x-slot name="title">
        <div data-v-09cc4f2a="" data-v-15d61d2e="" class="row">
            <div data-v-09cc4f2a="" data-v-15d61d2e="" class="col-12 col-md-6">
                <h3 data-v-09cc4f2a="" data-v-15d61d2e="">Authenticator</h3>
            </div>
            <div data-v-09cc4f2a="" data-v-15d61d2e="" class="col-sm-12 col-md-10 label authenticator-sub-title">
                通过使用Authenticator应用程序保护您的账户安全。
            </div>
        </div>
    </x-slot>

    <x-slot name="content">
        <div data-v-09cc4f2a="" data-v-15d61d2e="">
            <div data-v-09cc4f2a="" data-v-15d61d2e="" id="placeholder-82" class="hide">
                <div data-v-09cc4f2a="" data-v-15d61d2e="">
                    <div data-v-09cc4f2a="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                        <div data-v-09cc4f2a="" data-v-15d61d2e="" class="col-4 col-sm-3 col-md-3 col-xl-2 label">
                            状态
                        </div>
                        <div data-v-09cc4f2a="" data-v-15d61d2e="" class="col-8 col-sm-9 col-md-9 col-xl-10">
                            <span data-v-09cc4f2a="" data-v-15d61d2e="" class="placeholder-l animated-background"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-09cc4f2a="" data-v-15d61d2e="" class="">
                <div data-v-09cc4f2a="" data-v-15d61d2e="">
                    <div data-v-6de7e15f="" data-v-09cc4f2a="" class="row no-gutters" data-v-15d61d2e="">
                        <div data-v-6de7e15f="" class="col-12 col-xl-2 col-md-3 col-sm-12 pr-xl-3 pr-md-3 label">
                            <div data-v-09cc4f2a="" data-v-6de7e15f="">状态</div>
                        </div>
                        <div data-v-6de7e15f="" class="col-12 col-xl-10 col-md-9 col-sm-12">
                            <div data-v-09cc4f2a="" data-v-6de7e15f="">
                                @if ($this->enabled)
                                    @if ($showingQrCode)
                                        <div class="mt-4 max-w-xl text-sm text-red-600">
                                            <p class="font-semibold">
                                                {{ __('现在启用了双重身份验证。请使用应用程序扫描以下 QR 码以验证您的手机的真实性。') }}
                                            </p>
                                        </div>

                                        <div class="mt-4">
                                            {!! $this->user->twoFactorQrCodeSvg() !!}
                                        </div>
                                    @endif

                                    @if ($showingRecoveryCodes)
                                        <div class="mt-4 max-w-xl text-sm text-red-600">
                                            <p class="font-semibold">
                                                {{ __('请在安全的密码管理器中保存这些恢复代码。如果您的双重身份验证设备丢失，可以使用它们恢复访问您的帐户。') }}
                                            </p>
                                        </div>

                                        <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-800 rounded-lg">
                                            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                                                <div>{{ $code }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif

                                @if (! $this->enabled)
                                    <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                                        <x-jet-button type="button" wire:loading.attr="disabled">
                                            {{ __('启用') }}
                                        </x-jet-button>
                                    </x-jet-confirms-password>
                                @else
                                    @if ($showingRecoveryCodes)
                                        <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                                            <x-jet-button type="button">
                                                {{ __('重新生成恢复代码') }}
                                            </x-jet-button>
                                        </x-jet-confirms-password>
                                    @else
                                        <x-jet-confirms-password wire:then="showRecoveryCodes">
                                            <x-jet-button type="button">
                                                {{ __('显示恢复代码') }}
                                            </x-jet-button>
                                        </x-jet-confirms-password>
                                    @endif

                                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                                        <x-jet-danger-button wire:loading.attr="disabled">
                                            {{ __('禁用') }}
                                        </x-jet-danger-button>
                                    </x-jet-confirms-password>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-jet-action-section>
