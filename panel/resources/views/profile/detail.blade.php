<x-app-layout>
<div data-v-34b77a92="">
    <div data-v-ba34107c="" data-v-34b77a92="" class="title-bar text-center text-lg-left position-relative">
        <h1 data-v-ba34107c="">记录信息</h1>
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
                    <h3 data-v-7c3c8cd5="" data-v-15d61d2e="">个人信息</h3>
                </div>
                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-6">
                    <a x-on:click="isEditing = true" data-v-7c3c8cd5=""
                       data-v-15d61d2e=""
                       class="card-header-link float-md-right" href="javascript:void(0)">
                        <svg data-v-f521b32c="" data-v-15d61d2e="" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pen fa-w-16"><path data-v-f521b32c="" data-v-15d61d2e="" fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z" class=""></path></svg> 更新
                    </a>
                </div>
            </div>
        </div>
        <div data-v-15d61d2e="" class="card-subtitle">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="">
                @if(auth()->user()->info->day && auth()->user()->info->month && auth()->user()->info->year && auth()->user()->info->country)
                <div x-show=isEditing data-v-4918d6bc="" class="alert-message success" data-v-15d61d2e="">
                    <div data-v-cc173d72="" class="d-none icon"></div>
                    <div data-v-cc173d72="" class="">
                        <h3 data-v-cc173d72="" class="uppercase"></h3>
                        <span data-v-7c3c8cd5=""请联系客服指定其他国家或生日。</span>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div data-v-15d61d2e="" class="card-body" >
            <div data-v-112a4620="" data-v-15d61d2e="">
                <div data-v-112a4620="" data-v-15d61d2e="" id="placeholder-15">

                    <div x-show=!isEditing data-v-7c3c8cd5="" data-v-15d61d2e="">
                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-3 col-md-3 col-xl-2 label">姓名</div>
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-9 col-md-9 col-xl-10">
                        <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="mr-2">
                            {{ auth()->user()->info->full_name_hidden  ?? '未指定。' }}
                        </span>
                            </div>

                        </div>

                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-3 col-md-3 col-xl-2
                            label">出生日期</div>
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-9 col-md-9 col-xl-10">
                                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="mr-2">
                                    {{ auth()->user()->info->full_date  ?? '未指定。' }}
                                </span>
                            </div>
                        </div>

                        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3 last">
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-3 col-md-3 col-xl-2 label">国家</div>
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-sm-9 col-md-9 col-xl-10">
                                {{ auth()->user()->info->full_country  ?? '未指定。' }}
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

    <livewire:update-email />
    <livewire:update-phone />
    <livewire:user.paid-shift />
</div>
</x-app-layout>
