<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ItemBonusInfo extends Component
{
    public $item;

    public function render()
    {
        return view('livewire.game.item-bonus-info', [
            'icon' => DB::table('icons')->where('displayid', $this->item)->first(),
            'info' => DB::connection('WotlkWorld')->table('item_template')->where('entry', $this->item)->first(),
            'title' => DB::connection('WotlkWorld')->table('item_template_locale')->where('locale', 'ruRU')
                ->where('ID', $this->item)->first(),
        ]);
    }
}
