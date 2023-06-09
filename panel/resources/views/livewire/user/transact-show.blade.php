<div>
    <div>
    <ul class="nav nav-tabs">
    <li class="nav-item d-flex align-items-end">
        <a href="javascript:void(0)" class="nav-link {{ $activeTab === 'trans' ? 'active' : '' }}" wire:click="$set('activeTab', 'trans')">购买</a>
    </li>
    <li class="nav-item d-flex align-items-end">
        <a href="javascript:void(0)" class="nav-link {{ $activeTab === 'gifts' ? 'active' : '' }}" wire:click="$set('activeTab', 'gifts')">礼物</a>
    </li>
    </ul>
    </div>
    <div class="tab-content">
        @if($activeTab == 'trans')
            <livewire:user.transact :user="$user" />
        @else
            <livewire:user.gifts :user="$user" />
        @endif
    </div>
</div>
