<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/7.a443545c59725220e960.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/16.be68fe1e28dbf276ed18.css') }}" rel="stylesheet" type="text/css"/>
    @endpush

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush

        <div class="react-mount" id="short-story-mount" data-initial-state-variable-name="shortStoryInitialState">
            <article class="page-ShortStory position-relative">
                <div class="Pane Masthead Pane--underSiteNav z-index-above Pane--dimmed" data-queryselectoralways-ignore="true" queryselectoralways="31">
                    <div class="Pane-bg" data-background-image="https://bnetcmsus-a.akamaihd.net/cms/template_resource/CRR4G4YI37601533254913292.jpg" data-loaded="true" style="background-color: rgb(0, 0, 0); background-image: url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/CRR4G4YI37601533254913292.jpg);">
                        <div class="Pane-overlay"></div>
                    </div>
                    <div class="Pane-content">
                        <div class="Masthead-container align-center padding-top-double-huge padding-bottom-double-huge">
                            <h1 class="font-semp-xxxLarge-white margin-none">{{ $data->title }}</h1>
                            <h2 class="font-semp-small-darkBeige margin-top-tiny margin-bottom-none">
                                {{ $data->sub_title }}
                            </h2>
                            @foreach(json_decode($data->files) as $files)
                            <div class="Grid gutter-negative gutter-small">
                                <div class="contain-large">
                                    <div class="margin-top-medium contain-small">
                                        <div class="gutter-small margin-bottom-small Grid-col">
                                            <a class="Button Button Button--ghost Button--full Button--purchase"
                                               href="{{ asset("storage/$files->download_link") }}" rel="noopener noreferrer">
                                                <div class="Button-outer Button-outer">
                                                    <div class="Button-inner Button-inner">
                                                        <div class="Button-label Button-label">Скачать</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="Divider Divider--thin" data-queryselectoralways-ignore="true"></div>
                <div class="Divider Divider--thin Divider--opaque" data-queryselectoralways-ignore="true"></div>
                <div class="Pane Pane--repeat Pane--dirtDark" data-queryselectoralways-ignore="true" queryselectoralways="31">
                    <div class="Pane-bg" data-loaded="true">
                        <div class="Pane-overlay"></div>
                    </div>
                    <div class="Pane-content">
                        <div class="Grid">
                            <div class="gutter-normal Grid-3of5 Grid-1of5--prefix Grid-1of5--suffix">
                                <div class="font-size-small">
                                    <p align="center">
                                        {!! $data->content !!}
                                    </p>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
</x-app-layout>
