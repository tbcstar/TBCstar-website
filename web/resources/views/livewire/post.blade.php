<div class="TopicPost
@if($post->user->hasPermission('forum_nighthold')) TopicPost--blizzard
@endif @if($post->user->hasPermission('forum_mvp')) TopicPost--mvp
@endif" id="post-{{ $post->id }}"  data-topic-post="{&quot;id&quot;:&quot;{{ $post->id }}&quot;,&quot;
valueVoted&quot;:{{ $this->post->upvotes + $this->post->downvotes }},&quot;rank&quot;:{&quot;voteUp&quot;:{{ $this->post->upvotes }},&quot;
voteDown&quot;:{{ $this->post->downvotes }}},&quot;author&quot;:{&quot;id&quot;:&quot;{{ $post->user->id }}&quot;,&quot;
name&quot;:&quot;{{ $post->user->name }}&quot;}}" data-topic="{ &quot;sticky&quot;:&quot;false&quot;,&quot;
featured&quot;:&quot;false&quot;,&quot;locked&quot;:&quot;false&quot;,&quot;frozen&quot;:&quot;false&quot;,&quot;hidden&quot;:&quot;false&quot;,&quot;pollId&quot;:&quot;0&quot;}">
    <span id="{{ $post->id }}"></span>
    <div class="TopicPost-content">

        <div class="TopicPost-authorIcon
            @if($post->user->hasPermission('forum_nighthold'))TopicPost-authorIcon--blizzard @endif
            @if($post->user->hasPermission('forum_mvp')) TopicPost-authorIcon--mvp @endif">
            @if($post->user->hasPermission('forum_nighthold'))
                <svg xmlns="http://www.w3.org/2000/svg">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo_svg"/>
                </svg>
            @endif
            @if($post->user->hasPermission('forum_mvp'))
                <svg xmlns="http://www.w3.org/2000/svg">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo_svg"/>
                </svg>
            @endif
        </div>
        <aside class="TopicPost-author">
            <div class="Author-block">
                <div class="Author @if($post->user->hasPermission('forum_nighthold')) Author--blizzard @endif
                @if($post->user->hasPermission('forum_mvp')) Author--mvp @endif" id="" data-topic-post-body-content="true">
                    <a href="{{ $post->user->path() }}" class="Author-avatar">
                        <img src="{{ asset('/storage/'.$post->user->profile_photo_path) }}" alt="" />
                    </a>
                    <div class="Author-details">
                        <a class="Author-name--profileLink" href="{{ $post->user->path() }}">{{ Str::Title($post->user->name) }}</a>
                        <span class="Author-job">{{ $post->user->role->display_name }}</span>
                        <span class="Author-posts">
                        <a class="Author-posts" href="{{ route('forum.search', ['a' => $post->user->name]) }}" data-toggle="tooltip" data-tooltip-content="@lang('forum.view_message_history')" data-original-title="" title="">
                        @lang('forum.count_messages', ['count' => 0])</a>
                        </span>
                    </div>
                </div>
            </div>
        </aside>
        <div class="TopicPost-body" data-topic-post-body="true">
            <div class="TopicPost-details">
                @if($this->post->score() >= 50)
                    <div class="TopicPost-bodyStatus">
                        <div class="TopicPost-statusTag highly-rated">
                            <span class="TopicPost-statusTagContent"> <i class="thumbsup"></i>
                            <span class="TopicPost-statusTagText">Высокий рейтинг</span>
                            </span>
                        </div>
                    </div>
                @endif
                <div class="Timestamp-details">
                    <a class="TopicPost-timestamp" href="#post-{{ $post->id }}" data-toggle="tooltip"
                       data-tooltip-content="{{ $post->created_at->format('m/d/Y H:i') }}"
                       data-original-title="" title="">{{ $post->created_at->format('m.d.Y H:i') }}</a>
                    @if($post->created_at != $post->updated_at)
                        &#160;(Отредактировано)
                    @endif
                    @if($this->post->score() > 0 || $this->post->score() <= -1)
                    <span class="TopicPost-rank
                    @if($this->post->score() > 0)
                        TopicPost-rank--up
                    @else
                        TopicPost-rank--down
                    @endif" data-topic-post-rank="true" data-toggle="tooltip" data-tooltip-content="{{ $this->post->downvotes }} Dislikes,
                        {{ $this->post->upvotes }} Likes">
                        {{ $this->post->score() }}
                    </span>
                    @else
                        <span class="TopicPost-rank TopicPost-rank--none" data-topic-post-rank="true"></span>
                    @endif

                </div>
                <aside class="TopicPost-control" x-data="{menu: false}" x-cloak>
                        <div class="TopicPost-menu Dropdown open">
                            <button x-on:click="menu = true" class="Button-dropdown Button--secondary Button--icon"
                                    data-tooltip-content="Дополнительные настройки" type="button" data-original-title="" title="">
                                <span class="Button-content">
                                <i class="Icon Icon--16 Icon--blue Icon--button Icon--caretdown"></i>
                            </span>
                            </button>
                            <div x-show=menu @click.away="menu = false" class="Dropdown-menu">
                                <span class="Dropdown-arrow Dropdown-arrow--up" data-attachment="top right" data-target-attachment="bottom center"></span>
                                <div class="Dropdown-items">
                                    <span class="Dropdown-item">Заблокировать</span>
                                    <div class="Dropdown-divider"></div>
                                    <span class="Dropdown-item">Открыть тему</span>
                                    <div class="Dropdown-divider"></div>
                                    <span class="Dropdown-item">Открепить тему</span>
                                    <div class="Dropdown-divider"></div>
                                    <span class="Dropdown-item" wire:click="deletePost">Удалить</span>
                                    <div class="Dropdown-divider"></div>
                                    <a href="{{ route('forums.topic.edit', [$post->id])}}" class="Dropdown-item">Редактировать</a>
                                    <span class="Dropdown-item">Сообщить модераторам</span>
                                </div>
                            </div>
                        </div>
                </aside>
            </div>

            <button class="TopicPost-button TopicPost-button--viewPost is-hidden" data-topic-post-button="true" data-topic-viewpost-button="true" data-trigger="view.post.topicpost">
                <span class="Button-content">@lang('forum.view_post_topicpost')</span>
            </button>
            <div class="TopicPost-bodyContent" data-topic-post-body-content="true">{!! $post->body !!}</div>
            @if(auth()->check())
                <footer class="TopicPost-actions" data-topic-post-body-content="true">
                    <x-btn.link class="TopicPost-button TopicPost-button--like" wire:click="upvote">
                        <span class="Button-content"><i class="Icon"></i>Нравится</span>
                    </x-btn.link>
                    <x-btn.link class="TopicPost-button TopicPost-button--dislike" wire:click="downvote">
                        <span class="Button-content"><i class="Icon"></i>Не нравится</span>
                    </x-btn.link>
                </footer>
            @endif
        </div>
    </div>
    <x-comment.list :comments="$comments"></x-comment.list>

    <script type="text/javascript">
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) + 500 >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>

    @guest
        <section class="Section Section--secondary">
            <div data-topic-post="true" tabindex="0" class="TopicForm is-editing" id="topic-reply">
                <div class="LoginPlaceholder-content">
                    <aside class="LoginPlaceholder-author">
                        <div class="Author" id="" data-topic-post-body-content="true">
                            <div class="Author-avatar Author-avatar--default"></div>
                            <div class="Author-details">
                                <span class="Author-name is-blank"></span>
                                <span class="Author-posts is-blank"></span>
                            </div>
                        </div>
                        <div class="Author-ignored is-hidden" data-topic-post-ignored-author="true">
                            <span class="Author-name"> </span>
                            <div class="Author-posts Author-posts--ignored">@lang('forum.ignored')</div>
                        </div>
                    </aside>
                    <div class="LoginPlaceholder-details">
                        <div class="LogIn-message">@lang('forum.logIn_message')</div>
                        <a class="LogIn-button" href="{{ route('login') }}">
                            <span class="LogIn-button-content" >@lang('forum.logIn_content')</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @else
        @if(!$post->locked || auth()->user()->hasPermission('create_closed_topic_thead'))
            @include('forums.create.reply')
        @else
            @include('forums.create.reply_topic_closed')
        @endif
    @endguest
</div>

