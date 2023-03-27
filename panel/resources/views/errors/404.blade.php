@extends('errors::layout')

@section('title', __('Not Found'))

@section('code', '404')

@section('message')
<div class="row no-gutters">
    <div class="col-12">
        <div data-v-3e2c78e8="" class="not-found-container">
            <div data-v-3e2c78e8="" class="video-container">
                <video data-v-3e2c78e8="" autoplay="autoplay" muted="muted" loop="loop">
                    <source data-v-3e2c78e8="" src="{{ asset('static/media/murloc.mp4') }}" type="video/mp4"></video>
            </div>
            <div data-v-3e2c78e8="" class="error-content">
                <h1 data-v-3e2c78e8="">404 – страница не найдена</h1>
                Мы выслали за вами спасательный отряд мурлоков, они отведут вас в безопасное место.
                <div data-v-3e2c78e8="">
                    <a href="{{ url('/') }}" data-v-3e2c78e8="" class="btn btn-primary mt-3">
                        Главная
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
