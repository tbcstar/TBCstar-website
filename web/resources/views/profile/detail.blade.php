<x-account-layout>
<div data-v-34b77a92="">
    <div data-v-ba34107c="" data-v-34b77a92="" class="title-bar text-center text-lg-left position-relative">
        <h1 data-v-ba34107c="">Информация о записи</h1>
        <div data-v-ba34107c="" class="back d-lg-none position-absolute">
            <a data-v-ba34107c="" href="/" class="router-link-active"></a>
        </div>
    </div>

    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
    <div data-v-15d61d2e="" data-v-7c3c8cd5="" data-v-34b77a92="" class="card mt-card-top
    personal-info" x-data="{isEditing: false}" x-cloak>
        <div data-v-15d61d2e="" class="card-title">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row">
                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                    <h3 data-v-7c3c8cd5="" data-v-15d61d2e="">Личная информация</h3>
                </div>
                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                    <a x-on:click="isEditing = true" data-v-7c3c8cd5=""
                       data-v-15d61d2e=""
                       class="card-header-link float-md-right" href="javascript:void(0)">
                        Обновить
                    </a>
                </div>
            </div>
        </div>
        <div data-v-15d61d2e="" class="card-subtitle">
            <div data-v-7c3c8cd5="" data-v-15d61d2e=""><!----> <!----></div>
        </div>
        <div data-v-15d61d2e="" class="card-body" >
            <div data-v-112a4620="" data-v-15d61d2e="">
                <div data-v-112a4620="" data-v-15d61d2e="" id="placeholder-15">

                    <div x-show=!isEditing data-v-7c3c8cd5="" data-v-15d61d2e="">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-3 col-md-3 col-xl-2
                    label">Аватар</div>
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-9 col-md-9 col-xl-10">
                        <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="mr-2">
                            <div class="mt-2">
                                <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="rounded-full h-20 w-20 object-cover">
                            </div>
                        </span>
                            </div>

                        </div>
                        @endif
                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-3 col-md-3 col-xl-2 label">Имя</div>
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-9 col-md-9 col-xl-10">
                        <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="mr-2">
                            {{ auth()->user()->full_name_hidden }}
                        </span>
                            </div>

                        </div>

                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-3 col-md-3 col-xl-2 label">Электронная почта</div>
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-9 col-md-9 col-xl-10">
                                {{ auth()->user()->email_hidden }}
                            </div>
                        </div>

                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3 last">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-3 col-md-3 col-xl-2 label">Страна</div>
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-9 col-md-9 col-xl-10">
                                {{ auth()->user()->full_country }}
                            </div>
                        </div>

                    </div>

                    <div x-show=isEditing @click.away="isEditing = false" data-v-7c3c8cd5="" data-v-15d61d2e="" class="edit-info">
                        @livewire('profile.update-profile-information-form')
                    </div>

                </div>
            </div>
        </div>

    </div>
    @endif

    <div data-v-15d61d2e="" data-v-53d343a4="" class="card mt-card-top"
         x-data="{updatePhone: false}" x-cloak>
        <div data-v-15d61d2e="" class="card-title">
            <div data-v-9b2a6982="" data-v-15d61d2e="" class="row">
                <div data-v-9b2a6982="" data-v-15d61d2e="" class="col-12 col-md-6">
                    <h3 data-v-9b2a6982="" data-v-15d61d2e="">Номер телефона</h3>
                </div>
                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                    <a x-on:click="updatePhone = true" data-v-7c3c8cd5=""
                       data-v-15d61d2e=""
                       class="card-header-link float-md-right" href="javascript:void(0)">
                        @if(auth()->user()->phone_number)
                        Обновить
                        @else
                        Добавить
                        @endif
                    </a>
                </div>
            </div>
        </div>
        <livewire:update-phone />
    </div>

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
        <div data-v-4918d6bc="" class="alert-message info">Стоимость смены: {{ setting('platnye-uslugi.NightHoldTag') . ' ' . trans_choice('account.bonus', setting('platnye-uslugi.NightHoldTag')) }}. Первый раз бесплатно. </div>
        <livewire:user.paid-shift />
    </div>
</div>
</x-account-layout>
