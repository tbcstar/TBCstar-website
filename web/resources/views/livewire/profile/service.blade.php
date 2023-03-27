@foreach($data as $item)
<div data-v-6de7e15f="" data-v-01546580="" class="row no-gutters account align-items-center" data-v-15d61d2e="">
    <div data-v-6de7e15f="" class="col-12 col-xl-2 col-md-3 col-sm-12 pr-xl-3 pr-md-3 label">
        <div data-v-01546580="" data-v-6de7e15f="">
            {{ $item->title }}
        </div>
    </div>
    <div data-v-6de7e15f="" class="col-12 col-xl-7 col-md-5 col-sm-12">
        <div data-v-01546580="" data-v-6de7e15f="">
            @if($item->price > 1)
            <span  data-v-01546580="" data-v-6de7e15f="">{{ $item->price . ' ' . trans_choice('account.bonus', $item->price) }}</span>
            @else
            <span data-v-01546580="" data-v-6de7e15f="">Бесплатно</span>
            @endif
        </div>
    </div>
    <div data-v-6de7e15f="" class="col-12 col-xl-3 col-md-4 col-sm-12 pl-xl-3 text-xl-right pl-md-3 text-md-right side">
        <div data-v-01546580="" data-v-6de7e15f="" class="mt-3 mt-md-0 text-right">
            <livewire:profile.service-send :item="$item" />
        </div>
    </div>
</div>
@endforeach
