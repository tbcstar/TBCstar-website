<!DOCTYPE HTML>
<html lang="{{ preg_replace_callback('/\-\s*\w\s*\w/', function($m) { return strtoupper($m[0]); }, app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/icons/wow-favicon.ico') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main-9296f9fec4.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdn.tiny.cloud/1/wwqqv9id7ffnpz5q9ych4h63q8thnarin4suzc90i3jyrp4x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>var whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
    <script src="//wow.zamimg.com/widgets/power.js"></script>

    <script type="text/javascript" src="{{ asset('assets/js/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $('body').removeClass('no-js');

            // TODO: Remove the following code when fixing the white flash issue.
            // Its here to fix the deeplinking bug in Firefox
            if (location.href.indexOf('#') > -1) {
                location.href+='';
            }
        })
    </script>

    <!--[if lte IE 8]>
      <script type="text/javascript" src="{{ asset('forum/static/js/vendor/jquery-compat/dist/jquery.min.js') }}"></script>
    <![endif]-->
    <script type="text/javascript">
        //<![CDATA[
        var Core = Core || {},
            Login = Login || {};
        Core.staticUrl         = '/asset';
        Core.sharedStaticUrl   = '/forums/static/local-common';
        Core.baseUrl           = '/forums';
        Core.projectUrl        = '/forums';
        Core.cdnUrl            = '/';
        Core.supportUrl        = '/';
        Core.secureSupportUrl  = '/';
        Core.project           = 'forums';
        Core.locale            = '{{ app()->getLocale() }}';
        Core.language          = 'ru';
        Core.region            = 'eu';
        Core.shortDateFormat   = 'dd/MM/yyyy';
        Core.dateTimeFormat    = 'dd/MM/yyyy HH:mm';
        Core.loggedIn          = @guest false; @else true; @endguest
            Core.userAgent         = 'web';
        Login.embeddedUrl      = '/{{ app()->getLocale() }}/login';
        Core.community         = 'wow';
        //]]>
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/nav-client/navbar-tk.min.js') }}?v=84"></script>
    <script type="text/javascript">
        //<![CDATA[
        window.nav.notifications.endpoint = "/notification/list";
        //]]>
    </script>
    <script type="text/javascript">
        //<![CDATA[
        var LOCALIZATION = LOCALIZATION || {};
        LOCALIZATION.URL_PROMPT = "@lang('forum.urlprompt')";
        //]]>
    </script>
    @stack('css')
</head>
<body class="{{ app()->getLocale() }} Theme--wow">
<script type="text/javascript">
    //<![CDATA[
    var LOCALIZATION = LOCALIZATION || {};

    LOCALIZATION.SPAMMING = "Спам";
    LOCALIZATION.REAL_LIFE_THREATS = "Угрозы в реальной жизни";
    LOCALIZATION.ADVERTISING_STRADING = "Реклама";
    LOCALIZATION.OTHER = "Иное";
    LOCALIZATION.TROLLING = "Троллинг";

    LOCALIZATION.EDIT = "Редактировать"
    LOCALIZATION.SAVE = "Сохранить"
    LOCALIZATION.PREVIEW = "Предпросмотр";
    LOCALIZATION.CANCEL = "Отменить";
    LOCALIZATION.UPDATE_POST = "Сообщение";
    LOCALIZATION.REPORT = "Сообщить модераторам";
    LOCALIZATION.SOLUTION_MARK = "Отмечено как решение вопроса";
    LOCALIZATION.SOLUTION_UNMARK = "Снять пометку «Решение вопроса»";
    LOCALIZATION.COPY_LINK = "Скопировать ссылку:";
    LOCALIZATION.UNPOSTED_PROMPT = "Вы начали писать сообщение...";
    LOCALIZATION.BLOCKDAY = "Дни";
    LOCALIZATION.BLOCK = "Блокировка пользователя";
    LOCALIZATION.BLOCKSUB = "Заблокировать";
    LOCALIZATION.BOLD = "Полужирный";
    LOCALIZATION.ITALICS = "Курсив";
    LOCALIZATION.UNDERLINE = "Подчеркивание";
    LOCALIZATION.LIST = "Несортированный список";
    LOCALIZATION.LIST_ITEM = "Список";
    LOCALIZATION.QUOTE = "Цитирование";
    LOCALIZATION.CODE = "Код";
    LOCALIZATION.URL = "Ссылка";

    LOCALIZATION.DELETE_CONFIRM = "Вы точно хотите удалить это сообщение?";
    LOCALIZATION.CLOSED_CONFIRM = "Вы точно хотите закрыть эту тему?";
    LOCALIZATION.UNCLOSED_CONFIRM = "Вы точно хотите открыть эту тему?";
    LOCALIZATION.STICKY_CONFIRM = "Вы точно хотите закрепить эту тему?";
    LOCALIZATION.ERROR_EDIT = "Ошибка при редактировании";
    LOCALIZATION.ERROR_PREVIEW = "Ошибка при предварительном просмотре";
    LOCALIZATION.DELETE_SUCCESS = "удалено";
    LOCALIZATION.CLOSED_SUCCESS = "Закрыто";
    LOCALIZATION.UNCLOSED_SUCCESS = "Открыто";
    LOCALIZATION.STICKY_SUCCESS = "Закреплено";
    LOCALIZATION.ERROR_DELETE = "Ошибка при удалении";
    LOCALIZATION.STICKY_DELETE = "Ошибка при закреплении";
    LOCALIZATION.CLOSED_DELETE = "Ошибка при закрытии темы";
    LOCALIZATION.UNCLOSED_DELETE = "Ошибка при открытии темы";
    LOCALIZATION.REPORT_SUCCESS = "Готово!"
    LOCALIZATION.ERROR_REPORT = "Ошибка при отправлении жалобы";
    LOCALIZATION.ERROR_BLOCK = "Ошибка при отправлении блокировки";

    LOCALIZATION.ERROR_EMPTY = "Warning! No topics were selected";
    LOCALIZATION.ERROR_UPDATE = "Ошибка при обновлении";
    LOCALIZATION.ERROR_UPDATE_MOD = "Error Updating";
    LOCALIZATION.UPDATE_SUCCESS_MOD = "Update successful";
    LOCALIZATION.UPDATE_SUCCESS = "Update successful";
    LOCALIZATION.ERROR_MOVING = "Error Moving";
    LOCALIZATION.MOVING_SUCCESS = "Move Topic successful";
    LOCALIZATION.DELETE_CONFIRM_MOD = "Are you sure you want to delete this post?";
    LOCALIZATION.DELETE_SUCCESS_MOD = "Delete Successful";
    LOCALIZATION.ERROR_DELETE_MOD = "Error Deleting";
    LOCALIZATION.TOPIC_TITLE = "Заголовок темы";
    LOCALIZATION.TOPIC_POST_LIMIT = "Post Limit";
    //]]>
</script>
@include('layouts.navigation.navigation-menu')
<div class="Subnav">
    <div class="Container Container--content Container--breadcrumbs">
        <div class="GameSite-link"> <a class="GameSite-link--heading" href="/"> <i class="Icon"></i>World of Warcraft </a> </div>
        @yield('sidebar')
    </div>
</div>
<div role="main">
    {{ $slot }}
</div>
@include('layouts.footer')

<script src="{{ asset('static/scripts/navbar.min.js') }}?v8.2.1"></script>
@stack('modals')

<script src="{{ mix('js/app.js') }}" defer></script>
<livewire:scripts/>
@stack('scripts')
</body>
</html>
