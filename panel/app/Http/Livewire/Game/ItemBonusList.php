<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ItemBonusList extends Component
{
    public $data;

    public function mount()
    {
        $this->data = DB::table('bonus_auction_list')->orderByDesc('updated_at')->get();
    }

    public function render()
    {
        return view('livewire.game.item-bonus-list');
    }
}
