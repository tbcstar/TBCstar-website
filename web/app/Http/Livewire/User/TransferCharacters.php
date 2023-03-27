<?php

namespace App\Http\Livewire\User;

use App\Models\Game\AccountTransfer;
use Livewire\Component;

class TransferCharacters extends Component
{
    public $list = '';

    public function mount() {
        $this->list = AccountTransfer::where('accountid', auth()->user()->wotlk->id)->first();
    }

    public function render()
    {
        return view('livewire.user.transfer-characters');
    }
}
