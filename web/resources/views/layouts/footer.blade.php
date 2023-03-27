<div class="Divider"></div>

<div class="Pane Pane--dirtLight Pane--bgBottom bordered" queryselectoralways="30">
    <div class="Pane-bg">
        <div class="Pane-overlay"></div>
    </div>
    <div class="Pane-content">
        <div class="gutter-normal gutter-vertical">
            <div class="SocialLinks SocialLinks--wow">
                <div class="SocialLinks-title">NightHold в соцсетях</div>
                <div class="SocialLinks-links">
                    <a class="Link SocialLinks-link" href="https://discord.gg/BXGv7DFHXH" data-analytics="sns-refer" data-analytics-placement="Footer - discord">
                                 <span class="Icon Icon--social-discord Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 71 55" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/Discord-Logo-Color.svg#discord"></use>
                                    </svg>
                                 </span>
                    </a>
                    <a class="Link SocialLinks-link" href="https://www.youtube.com/channel/UCij2qo4DftJuF86KWM_7qtg" data-analytics="sns-refer" data-analytics-placement="Footer - youtube">
                                 <span class="Icon Icon--social-youtube Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-youtube.f56a46d1a6cc2ffd841bc4a8d1de3d3d.svg#social-youtube"></use>
                                    </svg>
                                 </span>
                    </a>
                    <a class="Link SocialLinks-link" href="https://vk.com/nightholdwow" data-analytics="sns-refer" data-analytics-placement="Footer - vkontakte">
                                 <span class="Icon Icon--social-vkontakte Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-vkontakte.57ff1545fb0a71780640cc4f07ad2be3.svg#social-vkontakte"></use>
                                    </svg>
                                 </span>
                    </a>
                    <a class="Link SocialLinks-link" href="https://instagram.com/nighthold.pro" data-analytics="sns-refer" data-analytics-placement="Footer - instagram">
                                 <span class="Icon Icon--social-instagram Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-instagram.d8f4f26719bf05eaaa420654df619d00.svg#social-instagram"></use>
                                    </svg>
                                 </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Pane Pane--dirtDark Pane--above">
    <div class="Pane-bg">
        <div class="Pane-overlay"></div>
    </div>
    <div class="Pane-content">
        <div class="SiteFooter">
            <div class="NavbarFooter is-regionless" >
                <div class="NavbarFooter-overlay" role="presentation"></div>
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
                <style>.NavbarFooter-doNotSell {
                        display: none;
                    }
                    .NavbarFooter[data-country="US"][data-administrative-division="CA"] > .NavbarFooter-doNotSell,
                    .NavbarFooter[data-country="US"][data-administrative-division="NV"] > .NavbarFooter-doNotSell {
                        display: block;
                    }
                </style>
                <nav class="NavbarFooter-links NavbarFooter-mainLinks">

                </nav>
                <div class="NavbarFooter-copyright">© {{ config('app.name') }}, Inc., 2021 - {{ date('Y') }}</div>
            </div>
        </div>
    </div>
</div>
