<x-app-layout>
    <div data-v-76e36490="" class="connections">
        <div data-v-ba34107c="" data-v-76e36490="" class="title-bar text-center text-lg-left position-relative">
            <h1 data-v-ba34107c="">Подключения</h1>
            <div data-v-ba34107c="" class="back d-lg-none position-absolute">
                <a data-v-ba34107c="" href="/" class="router-link-active">
                    <svg data-v-ba34107c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8"><path data-v-ba34107c="" fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z" class=""></path></svg></a>
            </div>
        </div>

        <div data-v-15d61d2e="" data-v-01546580="" data-v-76e36490="" class="card connected-accounts mt-card-top">
            <div data-v-15d61d2e="" class="card-title">
                <div data-v-01546580="" data-v-15d61d2e="" class="row">
                    <div data-v-01546580="" data-v-15d61d2e="" class="col-12 col-md-8 col-lg-7">
                        <h3 data-v-01546580="" data-v-15d61d2e="">Прикрепленные записи</h3>
                    </div>
                    <div data-v-01546580="" data-v-15d61d2e="" class="col-12 mt-2 label description">
                        <span data-v-01546580="" data-v-15d61d2e="">
                            Привяжите другие учетные записи к своей учетной записи {{ config('app.name') }}, чтобы получить
                            доступ к
                            другим
                            дополнительным возможностям.
                        </span>
                    </div>
                </div>
            </div>
            <div data-v-15d61d2e="" class="card-subtitle">
                <div data-v-01546580="" data-v-15d61d2e=""><!----> <!----></div>
            </div>
            <livewire:user.connections />
        </div>

    </div>
</x-app-layout>
