<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <link rel="shortcut icon" type="image/x-icon" href="https://nighthold.pro/forum/static/images/icons/wow-favicon.ico" />
    <script>var dataLayer = dataLayer || [];
        dataLayer.push({"locale":"ru-RU", "serverRegion":"eu", "region":"eu", "localeRegion":"eu", "project":"wow",  "authenticated":"1", "userId":1, "hasGameTime":"0"  });
    </script>
<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src='https://vk.com/js/api/openapi.js?169',t.onload=function(){VK.Retargeting.Init("VK-RTRG-1239084-4ZZ5v"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1239084-4ZZ5v" style="position:fixed; left:-999px;" alt=""/></noscript>
    <script src="//code-ya.jivosite.com/widget/DcBoftpGkW" async></script>
    <!— Yandex.Metrika counter —>
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(82884523, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/82884523" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!— /Yandex.Metrika counter —>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M9NHLHV');</script>
    <!-- End Google Tag Manager -->

    <script>
        window.__WOW_UI_PUBLIC_PATH__ = "{{ config('app.asset_url') . '/static/' }}"
    </script>
    <script src="{{ asset('static/core.04c3634bf4bf834dbb46.js') }}"></script>
    <script id="init">window.trigger("init");</script>
    <link href="{{ asset('static/core.b15be49248362418ef78.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static/styles/navbar.css') }}?v=8.27.2" rel="stylesheet">
    <link href="{{ asset('static/styles/photoswipe.css') }}?v=8.27.2" rel="stylesheet">
    <link href="{{ asset('static/styles/izimodal.css') }}?v=8.27.2" rel="stylesheet">
    <link href="{{ asset('static/styles/simplebar.css') }}?v=8.27.2" rel="stylesheet">
    @stack("css")
    @stack("characters")
</head>
<body class="ru-ru">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9NHLHV"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div class="body">
        <div class="page">
            <div class="BnetNav BnetNav--wow">
                <div class="BnetNav-sticky" media-nav="is-disabled">
                    <div class="Sticky-content">
                        <div class="BnetNav-navbar">
                            @include('layouts.navigation.navigation-menu')
                        </div>
                    </div>
                </div>
            </div>
            @include('menu.SiteNav')
            <span class="SkipLink-target" id="skip-link-target"></span>
            <main id="main" role="main">
                {{ $slot }}
            </main>
            <footer id="footer">
                @include('layouts.footer')
            </footer>
            <!--aside>
                <div class="PersistentCtaMount PersistentCtaMount--bcc" data-props='{"title":"Stormrage x7 3.3.5a+","subtitle":"Открытие игрового мира","completedSubtitle":"Доступно сейчас\n","prepurchaseButton":{"text":"Подробности","url":"https://nighthold.pro/ru-ru/forums/topic/219","analytics":{"event":"ctaOther","event_action":"","event_category":"","event_label":"learn more"}},"purchaseButton":{"text":"","url":"","analytics":{"event":"","event_action":"","event_category":"","event_label":""}},"countdownTimer":{"endTimestamp":1629471600,"daysLabel":"дн.","hoursLabel":"ч.","minutesLabel":"Мин.","secondsLabel":"сек"},"forceCompletion":false,"hideTimer":false}'></div>
            </aside-->
        </div>
    </div>
    <x-photoswipe />
    <script src="{{ asset('static/scripts/navbar.js') }}?v=8.27.2"></script>
    <!--script src="{{ asset('static/scripts/harle.js') }}"></script-->
    @stack("scripts")
    <script>window.dispatchEvent(new CustomEvent("navbarAddFooterLinks", {
            detail: {
                secondary: [{
                    text: "Файлы cookie",
                    href: "/cookies"
                }]
            }
        }));
    </script>
    @stack('modals')
    @livewireScripts

    </body>
</html>
