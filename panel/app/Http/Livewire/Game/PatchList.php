<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PatchList extends Component
{
    public $data;

    public function mount()
    {
        $this->data = DB::table('patch_list')->orderByDesc('updated_at')->get();
    }

    public function render()
    {
        return view('livewire.game.patch-list');
    }
}
