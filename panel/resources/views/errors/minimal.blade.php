<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://bnetaccount.akamaized.net/static/images/favicon.ico">
    <title>@yield('title')</title>
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
@yield('message')
</html>
