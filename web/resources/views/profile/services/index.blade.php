<x-account-layout>
    <div data-v-76e36490="" class="connections">
        <div data-v-ba34107c="" data-v-76e36490="" class="title-bar text-center text-lg-left position-relative">
            <h1 data-v-ba34107c="">Список услуг</h1>
            <div data-v-ba34107c="" class="back d-lg-none position-absolute"><a data-v-ba34107c="" href="/" class="router-link-active"><svg data-v-ba34107c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8"><path data-v-ba34107c="" fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z" class=""></path></svg></a>
            </div>
        </div>
        <div data-v-15d61d2e="" data-v-01546580="" data-v-76e36490="" id="516726831" class="card connected-accounts mt-card-top">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-01546580="" data-v-15d61d2e="" class="row">
                    <div data-v-01546580="" data-v-15d61d2e="" class="col-12 col-md-8 col-lg-7">
                        <h3 data-v-01546580="" data-v-15d61d2e="">Услуги сервера</h3>
                    </div>
                    <div data-v-01546580="" data-v-15d61d2e="" class="col-12 mt-2 label description">
                        <span data-v-01546580="" data-v-15d61d2e="">Все что находится в данном разделе используется только по вашей инициативе. Возврату оказанные услуги не подлежат. После нажатия на кнопку, услуги считаются оказанными в полном обьеме.(За исключением технических сбоев работы сервера)
			            </span>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-body">
                <div data-v-01546580="" data-v-15d61d2e="" class="" data-placeholder-id="placeholder-4dee6a60-9878-11eb-9a01-67ca6d76841f">
                    <livewire:profile.service :user="auth()->user()" />
                </div>
            </div>
        </div>
    </div>
</x-account-layout>
