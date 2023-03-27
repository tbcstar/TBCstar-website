<x-account-layout>
    <div data-v-332b66b6="" class="transactions-overview">
        <div data-v-ba34107c="" data-v-332b66b6="" class="title-bar text-center text-lg-left position-relative mb-md-0 pb-md-0">
            <h1 data-v-ba34107c="">История платежей</h1>
            <div data-v-ba34107c="" class="back d-lg-none position-absolute">
                <a data-v-ba34107c="" href="/" class="router-link-active">
                    <svg data-v-ba34107c="" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8"><path data-v-ba34107c="" fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path></svg>
                </a>
            </div>
        </div>
        <div data-v-332b66b6="" class="mt-sm-0 mt-md-4 pt-md-1 tabs">
            <livewire:user.transact-show :user="auth()->user()" />
        </div>
    </div>
</x-account-layout>
