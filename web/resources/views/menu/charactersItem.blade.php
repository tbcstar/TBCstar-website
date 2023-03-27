@empty(!$char)
    @foreach($char as $items)
        <div class="Grid-1of2 SyncHeight-item" media-small="" media-wide="Grid-1of3" media-huge="Grid-1of4 !hide">
            <a class="Link Character Character--{{ __('characters.class_key_'.$items->class) }} Character--name
            Character--avatar Character--level Character--realm Character--onDark" href="{{ route('characters.show',
            ['server' => $items->realmSlug, 'characters' => $items->name])
             }}">
                <div class="Character-link">
                    <div class="Character-table">
                        <div class="Character-bust">
                            <div class="Art Art--above">
                                <div class="Art-size" style="padding-top:50.43478260869565%"></div>
                                <div class="Art-image" style="background-image:url({{ Utils::imageClass($items->race, $items->gender)}});"></div>
                                <div class="Art-overlay"></div>
                            </div>
                        </div>
                        <div class="Character-avatar">
                            <div class="Avatar">
                                <div class="Avatar-image" style="background-image:url({{ Utils::imageClass($items->race, $items->gender)}});"></div>
                            </div>
                        </div>
                        <div class="Character-details">
                            <div class="Character-role"></div>
                            <div class="Character-name">{{ $items->name }}</div>
                            <div class="Character-level"><b>{{ $items->level }}</b>
                            {{ __('characters.class_'.$items->class)}} <!-- (Стихии) -->
                            </div>
                            <div class="Character-realm">{{ $items->realmName }}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endempty
