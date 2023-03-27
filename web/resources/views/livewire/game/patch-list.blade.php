@foreach($data as $item)
    <div class="SortTable-row">
        <div class="SortTable-col SortTable-data align-left">
            {{ $item->title }}
        </div>
        <div class="SortTable-col SortTable-data align-right">
            {{ $item->updated_at }}
        </div>
        <div class="SortTable-col SortTable-data align-right">
        <a class="HorizontalNav-link is-selected" href="{{ $item->slug }}">
            Скачать
        </a>
        </div>
    </div>
@endforeach
