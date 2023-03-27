<nav class="SiteNav" role="navigation" aria-label="Main">
    <div class="Sticky SiteNav-sticky">
        <div class="Sticky-content">
            <div class="SiteNav-area">
                <div class="SiteNav-bar">
                    <div class="SiteNav-menu">
                        <a class="Link Link--block SiteNav-logo" href="/" data-analytics="main-nav" data-analytics-placement="Logo">
                            <div class="Logo Logo--wow Logo--wowSitenav SiteNav-logo-full position-absolute"></div>
                            <div class="Logo Logo--wowIcon SiteNav-logo-icon"></div>
                        </a>
                        <div class="SiteNav-sectionLeft">
                            <div class="SiteNav-menuList List">
                                {{ menu('web', 'menu.webMenu') }}
                            </div>
                        </div>
                        @include('menu.user_menu')
                    </div>
                </div>
                {{ menu('web', 'menu.webDropdown') }}
                @include('menu.searchDropdown')
                @include('menu.characterDropdown')
            </div>
        </div>
    </div>
</nav>
