<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Создание учетной записи NightHold</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Создание учетной записи Blizzard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#003564" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('account/creation/static/images/meta/favicon.ico') }}?v=58-1" />
    <script type="module" src="{{ asset('static/js/flow/flow-b3a8a202ab1057ca184b.js') }}" defer></script>
    <script nomodule src="{{ asset('static/js/flow/flow-legacy-a4a5efecf8831b768122.js') }}" defer></script>
    <link href="{{ asset('static/css/flow/flow.4S1K6.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('static/css/navbar.min.css') }}?v=58-1">
    <script src="{{ asset('static/js/navbar.min.js') }}?v=58-1" defer></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("register").submit();
        }
    </script>
<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src='https://vk.com/js/api/openapi.js?169',t.onload=function(){VK.Retargeting.Init("VK-RTRG-1239084-4ZZ5v"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1239084-4ZZ5v" style="position:fixed; left:-999px;" alt=""/></noscript>
</head>
<body >
<div class="step-container">
            {{ $slot }}
</div>
<script>
    "use strict";
    !function(n){var a="/account/creation/error-report";function o(r,e,n){void 0!==e[n]&&(r[n]=e[n])}function c(){return{system:function(){var r={};r.clientTimeMillis=Date.now();var e=n.navigator;return o(r,e,"oscpu"),o(r,e,"hardwareConcurrency"),o(r,e,"deviceMemory"),r}(),network:function(){var r={},e=n.navigator.connection;return void 0!==e&&(o(r,e,"downlink"),o(r,e,"downlinkMax"),o(r,e,"effectiveType"),o(r,e,"rtt"),o(r,e,"type")),r}(),browser:function(){var r={};o(r,n&&n.location,"href"),o(r,window,"devicePixelRatio"),o(r,window,"innerHeight"),o(r,window,"innerWidth");var e=n.navigator;return o(r,e,"platform"),o(r,e,"userAgent"),o(r,e,"language"),o(r,e,"cookieEnabled"),r}()}}function r(r,e,n,o,t){var i=function(r,e,n,o){return{message:r,source:e,lineno:n,colno:o}}(r,e,n,o);!function(r){console.info("An error occurred. Submitting report.");var e=new XMLHttpRequest;e.open("POST",a),e.setRequestHeader("Content-Type","application/json"),e.setRequestHeader("Accept","application/json"),e.addEventListener("error",function(r){console.error("An error occurred while sending an error-report. Error: "+r)}),e.send(JSON.stringify(r))}({environment:c(),error:i}),console.error(t)}void 0!==n?(n.onerror=r,n.errorReporter={global:r},console.debug("Listening for unhandled errors...")):console.error('Unable to bind onError listener as "window" was undefined.')}(window,document);
</script>
<script>
    window['blz-public-path'] = '/static/js/flow/';
</script>

<script>
    dataLayer = [{
        event: 'pageLoad',
        flowId: 'create-full',
        theme: '',
        appId: '',
        callbackUrl: '',
        continuationType: 'DOWNLOAD_PHOENIX',
        clientEnvironment: 'STANDALONE_BROWSER',
        userAgent: 'web',
        meta: ''
    }];
</script>
<script>
    document.addEventListener("touchstart", function(){}, false);
</script>
</body>
</html>
