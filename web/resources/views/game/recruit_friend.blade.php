<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/recruit-a-friend.3c556b56a16cff8d3ecd.css') }}" rel="stylesheet" type="text/css"/>
    @endpush

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush

    <div class="Pane Pane--dirtDark Pane--full z-index-above" queryselectoralways="31">
        <div class="Pane-bg">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="react-mount" id="recruit-a-friend-mount" data-initial-state-variable-name="recruitAFriendInitialState">
                <div class="RafApp">
                    <div class="Raf-MastheadSection">
                        <div class="Raf-RepeatingSection Raf-RepeatingSection--underSiteNav">
                            <div class="Raf-RepeatingSection-bg" style="background: url({{ asset('v3/assets/Header_sky_expanded.jpg') }}) 0% 30% / 100% no-repeat, url({{ asset('v3/assets/Pane-dirtLight.jpg') }}) center top / 100% repeat-y; background-blend-mode: lighten;"></div>
                            <div class="Raf-RepeatingSection-content">
                                <div class="space-huge"></div>
                                <div class="Raf-Header">
                                    <div class="align-center contain-large">
                                        <h1 class="fontFamily-semplicita fontWeight-bold font-size-medium color-beige-dark textShadow-small-black text-upper"></h1>
                                        <h2 class="font-semp-xLarge-white lineHeight-small">Пригласи друга</h2>
                                        <p class="contain-medium color-monochrome-white textShadow-xlarge-black">
                                            Пригласите в игру  друзей — и получите невероятные награды!
                                        </p>
                                    </div>
                                </div>
                                <div class="space-large"></div>
                                <div class="Raf-FriendsSection">
                                    <div class="contain-wide margin-top-medium margin-bottom-small">
                                        <div class="LabeledDivider Raf-LabeledDivider--noDivider">
                                            <div class="LabeledDivider-children LabeledDivider-children--text">
                                                ПОЛУЧАЙТЕ ЩЕДРЫЕ НАГРАДЫ, КОГДА ВАШИ ДРУЗЬЯ ОТЫГРАЮТ 12 ЧАСОВ НА ПЕРСОНАЖЕ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-huge"></div>
                            </div>
                        </div>
                    </div>
                    <div class="Divider" data-queryselectoralways-ignore="true"></div>
                    <div class="Raf-RepeatingSection">
                        <div class="Raf-RepeatingSection-bg" style="background: url({{ asset('v3/assets/repeating_map_red.jpg') }}) center top / 100% repeat-y;"></div>
                        <div class="Raf-RepeatingSection-content">
                            <div class="space-normal"></div>
                            <div class="space-medium"></div>
                            <div class="Raf-RewardsSection">
                                <div class="contain-large margin-top-medium margin-bottom-normal">
                                    <div class="LabeledDivider">
                                        <div class="LabeledDivider-children LabeledDivider-children--text">НАГРАДЫ ЗА ПРИГЛАШЕНИЕ</div>
                                    </div>
                                </div>
                                <div class="contain-medium align-center color-monochrome-white">Вы можете приглашать друзей и вместе отправиться на поиски приключений в Азероте, чтобы получать уникальные награды, когда они отыграют 12 часов на персонаже!</div>
                                <div class="Raf-AttentionText Raf-AttentionText--large-margin">
                                    <div class="Raf-AttentionText-column"></div>
                                    <div class="Raf-AttentionText-text">Для получения наград приглашающему игроку требуется активная учетная запись. У приглашенного должен быть подтвержден EMail</div>
                                    <div class="Raf-AttentionText-column"></div>
                                </div>
                            </div>
                            <div class="space-medium"></div>
                            <div class="contain-large">
                                <div class="Raf-RewardCards">
                                    <div class="Grid Grid--center Grid--gutters margin-top-small">
                                        <div class="Grid-1of3">
                                            <div class="Raf-RewardCard">
                                                <a role="button" tabindex="0" class="ControlledModalToggle Raf-RewardCard-modal-toggle">
                                                    <div class="Raf-RewardCard-link">
                                                        <div class="Raf-RewardCard-background" style="background-image: url({{ asset('v3/assets/RAF_recruiter_rewards_background.jpg') }});">
                                                            <div class="Raf-RewardCard-foregroundWrapper">
                                                                <div class="Raf-RewardCard-foreground" style="background-image: url({{ asset('v3/assets/img_1.png') }});"></div></div><div class="Raf-RewardCard-border"></div><div class="Raf-RewardCard-breakout" style="background-image: url({{ asset('v3/assets/img_1.png') }});"></div></div>
                                                        <div class="Raf-RewardCard-rewardName">10 эмблем</div>
                                                        <div class="Raf-RewardCard-subtitle">за первого друга.</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="Grid-1of3">
                                            <div class="Raf-RewardCard">
                                                <a role="button" tabindex="0" class="ControlledModalToggle Raf-RewardCard-modal-toggle">
                                                    <div class="Raf-RewardCard-link">
                                                        <div class="Raf-RewardCard-background" style="background-image: url({{ asset('v3/assets/RAF_recruiter_rewards_background.jpg') }});">
                                                            <div class="Raf-RewardCard-foregroundWrapper">
                                                                <div class="Raf-RewardCard-foreground" style="background-image: url({{ asset('v3/assets/img_2.png') }});"></div></div><div class="Raf-RewardCard-border"></div><div class="Raf-RewardCard-breakout" style="background-image: url({{ asset('v3/assets/img_2.png') }});"></div></div>
                                                        <div class="Raf-RewardCard-rewardName">5 эмблем</div>
                                                        <div class="Raf-RewardCard-subtitle">за каждого следующего друга.</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="Grid-1of3">
                                            <div class="Raf-RewardCard">
                                                <a role="button" tabindex="0" class="ControlledModalToggle Raf-RewardCard-modal-toggle">
                                                    <div class="Raf-RewardCard-link">
                                                        <div class="Raf-RewardCard-background" style="background-image: url({{ asset('v3/assets/RAF_recruiter_rewards_background.jpg') }});">
                                                            <div class="Raf-RewardCard-foregroundWrapper">
                                                                <div class="Raf-RewardCard-foreground" style="background-image: url({{ asset('v3/assets/img_3.png') }});"></div></div><div class="Raf-RewardCard-border"></div><div class="Raf-RewardCard-breakout" style="background-image: url({{ asset('v3/assets/img_3.png') }});"></div></div>
                                                        <div class="Raf-RewardCard-rewardName">Прогулочная ракета</div>
                                                        <div class="Raf-RewardCard-subtitle">За трех друзей, отыгравших по 24 часа</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="Grid-1of3">
                                            <div class="Raf-RewardCard">
                                                <a role="button" tabindex="0" class="ControlledModalToggle Raf-RewardCard-modal-toggle">
                                                    <div class="Raf-RewardCard-link">
                                                        <div class="Raf-RewardCard-background" style="background-image: url({{ asset('v3/assets/RAF_recruiter_rewards_background.jpg') }});">
                                                            <div class="Raf-RewardCard-foregroundWrapper">
                                                                <div class="Raf-RewardCard-foreground" style="background-image: url({{ asset('v3/assets/img_4.png') }});"></div></div><div class="Raf-RewardCard-border"></div><div class="Raf-RewardCard-breakout" style="background-image: url({{ asset('v3/assets/img_4.png') }});"></div></div>
                                                        <div class="Raf-RewardCard-rewardName">VIP на 1 месяц</div>
                                                        <div class="Raf-RewardCard-subtitle">За 10 друзей</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Divider" data-queryselectoralways-ignore="true"></div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
