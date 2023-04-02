<div class="List List--gutters">
    <div class="List-item font-semp-small-white text-upper">最新新闻</div>
    <div class="List-item fontFamily-blizzard">
        <a class="Link Link--text" href="{{ route('news.index') }}" data-analytics="homepage-panel"
           data-analytics-placement="News ||
        Home - View All News">查看所有新闻</a>
    </div>
</div>
<div class="gutter-normal gutter-negative">
    <div class="MastheadFeaturedNewsMount" data-props="{{ $post }}" style="min-height: 250px;"></div>
</div>
