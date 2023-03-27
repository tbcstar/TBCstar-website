<!DOCTYPE html>
<html lang="ru-ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://bnetaccount.akamaized.net/static/images/favicon.ico">
    <title>@yield('title')</title>
    <link href="https://bnetaccount.akamaized.net/static/css/app.52ebb7ae2cf114c33ebcbed04c2db599.css" rel="stylesheet">
</head>
<body class="not-found">
<div id="app" class="d-flex flex-column">
    <header class="header">
        @include('layouts.navigation.navigation-account')
    </header>
    <main class="flex-fill">
        @yield('message')
    </main>
    <footer class="footer mt-5">
        <div>
            <div class="NavbarFooter is-regionless" data-timestamp="1626365218692" data-hash="d2874fd5b5266fb20255f7ac41cd359df78bd1b5" data-region-selection="none" data-region="eu" data-locale="ru-ru" data-geoip-service-url="https://geo.battle.net" data-country="RU" data-administrative-division="VLA">
                <div class="NavbarFooter-overlay"></div>
                <div class="NavbarFooter-selector">
                    <div class="NavbarFooter-selectorToggle" tabindex="0" role="button" aria-haspopup="true" aria-label="Выберите язык">
                        <div class="NavbarFooter-icon NavbarFooter-selectorToggleIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                                <use xlink:href="#Navbar-icon-globe"></use>
                            </svg>
                        </div>
                        <label class="NavbarFooter-selectorToggleLabel">
                            {{ config('app.locales.'.app()->getLocale()) }}
                        </label>
                        <div class="NavbarFooter-icon NavbarFooter-selectorToggleArrow">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                                <use xlink:href="#Navbar-icon-selector"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="NavbarFooter-selectorDropdown" role="listbox">
                        <div class="NavbarFooter-selectorDropdownContainer">
                            <div class="NavbarFooter-selectorCloser">
                                <div class="NavbarFooter-selectorCloserAnchor">
                                    <div class="NavbarFooter-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                                            <use xlink:href="#Navbar-icon-close"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="NavbarFooter-selectorLocales NavbarFooter-selectorSection">
                                <div class="NavbarFooter-selectorSectionBlock">
                                    <a class="NavbarFooter-selectorLocale @if(app()->isLocale('de')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'de') }}">
                                        <div class="NavbarFooter-selectorOptionLabel">Deutsch</div>
                                        <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                                <use xlink:href="#Navbar-icon-check"></use>
                                            </svg>
                                        </div>
                                    </a>
                                    <a class="NavbarFooter-selectorLocale @if(app()->isLocale('en')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'en') }}">
                                        <div class="NavbarFooter-selectorOptionLabel">English (EU)</div>
                                        <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                                <use xlink:href="#Navbar-icon-check"></use>
                                            </svg>
                                        </div>
                                    </a>
                                    <a class="NavbarFooter-selectorLocale @if(app()->isLocale('es')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'es') }}" data-id="es-es">
                                        <div class="NavbarFooter-selectorOptionLabel">Español (EU)</div>
                                        <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                        </div>
                                    </a>
                                    <a class="NavbarFooter-selectorLocale @if(app()->isLocale('fr')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'fr') }}" data-id="fr-fr">
                                        <div class="NavbarFooter-selectorOptionLabel">Français</div>
                                        <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                        </div>
                                    </a>
                                </div>
                                <div class="NavbarFooter-selectorSectionBlock">
                                    <a class="NavbarFooter-selectorLocale @if(app()->isLocale('it')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'it') }}" data-id="it-it">
                                        <div class="NavbarFooter-selectorOptionLabel">Italiano</div>
                                        <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                        </div>
                                    </a>
                                    <a class="NavbarFooter-selectorLocale @if(app()->isLocale('pt')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'pt') }}" data-id="pt-pt">
                                        <div class="NavbarFooter-selectorOptionLabel">Português (EU)</div>
                                        <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                        </div>
                                    </a>
                                    <a class="NavbarFooter-selectorLocale @if(app()->isLocale('ru')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'ru') }}" data-id="ru-ru">
                                        <div class="NavbarFooter-selectorOptionLabel">Русский</div>
                                        <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="NavbarFooter-selectorTick"></div>
                        </div>
                    </div>
                </div>

                <div class="NavbarFooter-links NavbarFooter-mainLinks">
                    <div class="NavbarFooter-linksLeft">
                        <div class="NavbarFooter-link NavbarFooter-mainLink">

                        </div>
                    </div>
                    <div class="NavbarFooter-linksRight">
                        <div class="NavbarFooter-link NavbarFooter-mainLink">

                        </div>
                    </div>
                </div>
                <div class="NavbarFooter-copyright">© {{ config('app.name') }}, Inc., 2021</div>
            </div>
        </div>
    </footer>
    <div id="navbar-scripts">
        <script src="{{ asset('static/navbar/js/navbar.min.js') }}" id="nav-script"></script>
    </div>
</div>
<div class="loading-overlay hide"></div>
</body>
</html>
