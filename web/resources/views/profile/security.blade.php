<x-account-layout>
    <div data-v-37d13747="" class="security-overview">
        <div data-v-ba34107c="" data-v-37d13747="" class="title-bar text-center text-lg-left position-relative">
            <h1 data-v-ba34107c="">Безопасность</h1>
            <div data-v-ba34107c="" class="back d-lg-none position-absolute">
                <a data-v-ba34107c="" href="/" class="router-link-active"></a>
            </div>
        </div>

        <div data-v-15d61d2e="" data-v-6061b8eb="" data-v-37d13747="" class="card mt-card-top password-info">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-6061b8eb="" data-v-15d61d2e="" class="row">
                    <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-6061b8eb="" data-v-15d61d2e="">Пароль</h3>
                    </div>
                    <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-sm-12 col-md-10 label description">
                        <span data-v-6061b8eb="" data-v-15d61d2e="">
                            Рекомендуем периодически обновлять пароль, чтобы повысить безопасность учетной записи.
                        </span>
                    </div>
                </div>
            </div>

            <div data-v-15d61d2e="" class="card-body">
                <div data-v-6061b8eb="" data-v-15d61d2e="">
                    <div data-v-6061b8eb="" data-v-15d61d2e="" id="placeholder-89" class="hide">
                        <div data-v-6061b8eb="" data-v-15d61d2e="">
                            <div data-v-6061b8eb="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                                <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-4 col-sm-3 col-md-3 col-xl-2 label">
                                    Пароль
                                </div>
                                <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-8 col-sm-9 col-md-9 col-xl-10">
                                    <span data-v-6061b8eb="" data-v-15d61d2e="" class="placeholder-l animated-background"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-v-6061b8eb="" data-v-15d61d2e="">
                        <div data-v-6061b8eb="" data-v-15d61d2e="">
                            <div data-v-6061b8eb="" data-v-15d61d2e="" class="hide" id="placeholder-9">
                                <div data-v-6061b8eb="" data-v-15d61d2e="" class="">
                                    <div data-v-6061b8eb="" data-v-15d61d2e="" class="row mt-3 mt-sm-0">
                                        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-4 col-sm-3 col-md-3 col-xl-2 label">
                                            Пароль
                                        </div>
                                        <div data-v-6061b8eb="" data-v-15d61d2e="" class="col-8 col-sm-9 col-md-9 col-xl-10">
                                            <span data-v-6061b8eb="" data-v-15d61d2e="" class="placeholder-l animated-background"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-6061b8eb="" data-v-15d61d2e="" data-placeholder-id="placeholder-12088d80-cad4-11eb-a2a5-39aa9ac31a12">
                                <div data-v-6061b8eb="" data-v-15d61d2e="" class="edit-info">
                                    @livewire('profile.update-password-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewire('profile.logout-other-browser-sessions-form')

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            @livewire('profile.delete-user-form')
        @endif
    </div>
</x-account-layout>
