@foreach($data as $item)
    <div class="SortTable-row">
        <livewire:game.item-bonus-info :item="$item->item_id" />
    </div>
@endforeach
