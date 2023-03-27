<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://bnetaccount.akamaized.net/static/images/favicon.ico">
    <title>500 - ошибка сервера</title>
    <link href="{{ asset('static/css/app.197e10d6e1ab03d7ded5b80d5b1125e0.css') }}"
          rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#reload').click(function() {
                window.location.reload();
            });
        });
    </script>
</head>
<body class="server-error">
<div data-v-1de32453="" class="server-error-container">
    <div data-v-1de32453="" class="video-container">
        <video data-v-1de32453="" autoplay="autoplay" muted="muted" loop="loop">
            <source data-v-1de32453="" src="{{ asset('static/media/error.mp4') }}" type="video/mp4"></video>
    </div>
    <div data-v-1de32453="" class="error-content">
        <h1 data-v-1de32453="">500 - ошибка сервера</h1>
        Произошла ошибка. Ваш запрос не был выполнен.
        <div data-v-1de32453="">
            <button data-v-312dd04b="" data-v-1de32453="" id="reload" class="btn btn-primary mt-3 btn">
                Повтор
            </button>
            <a href="{{ url('/') }}" data-v-312dd04b="" data-v-1de32453="" id="952221340" class="btn btn-secondary mt-3
            ml-sm-0
            ml-md-3
            btn">
                Главная
            </a>
        </div>
    </div>
</div>
<div class="loading-overlay hide"></div>
</body></html>
