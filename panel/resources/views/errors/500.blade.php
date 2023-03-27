@extends('errors::minimal')

@section('title', __('500 - ошибка сервера'))

@section('code', '500')

@section('message')
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
    </body>
@endsection

