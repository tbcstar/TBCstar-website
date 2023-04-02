@component('mail::message')
{{ __('您已被邀请加入 :team 团队！', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('如果您还没有账号，请点击下方按钮创建账号。创建账号后，您可以点击邮件中的接受邀请按钮接受团队邀请：') }}

@component('mail::button', ['url' => route('register')])
{{ __('创建账号') }}
@endcomponent

{{ __('如果您已经有账号，请点击下方按钮接受邀请：') }}

@else
{{ __('请点击下方按钮接受邀请：') }}
@endif


@component('mail::button', ['url' => $acceptUrl])
{{ __('接受邀请') }}
@endcomponent

{{ __('如果您并没有期望接收到这个团队邀请，请忽略此邮件。') }}
@endcomponent
