@extends('errors::layout')

@section('title', __('页面未找到'))

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
                <h1 data-v-3e2c78e8="">404 页面未找到</h1>
                我们已经派出救援队来把你带到安全的地方。
                <div data-v-3e2c78e8="">
                    <a href="{{ url('/') }}" data-v-3e2c78e8="" class="btn btn-primary mt-3">
                        首页
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
