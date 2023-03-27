<div class="Dropdown SiteNav-doormat SiteNav-characterDropdown" name="SiteNav-user">
    <div class="SiteNav-doormatContent">
        <div class="Grid Grid--gutters">
            <div class="Grid--full">
                <div class="gutter-tiny gutter-vertical">
                    <div class="SiteNav-sectionTitle font-title-tiny-onDark">Выбрать другого персонажа</div>
                </div>
            </div>
        </div>
        <div class="Grid Grid--gutters SyncHeight">
            @include('menu.charactersItem')
        </div>
        <div class="List List--vertical List--right">
            @can('browse_admin')
                <div class="List-item">
                    <a class="SiteNav-pageLink" href="{{ route('voyager.dashboard') }}">Admin Panel</a>
                </div>
            @endcan

            <div class="List-item">
                <a class="SiteNav-pageLink" href="{{ route('characters') }}">Все ваши персонажи</a>
            </div>
            <div class="List-item">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="SiteNav-pageLink" data-analytics="main-nav" data-analytics-placement="Community - Log
                    Out" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                        Выход
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
