<?php

namespace App\Http\Livewire\User;

use App\Models\Game\AccountTransfer;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class TransferCharactersList extends Component
{
    public $list;

    public function mount() {
        $this->list = AccountTransfer::where('accountid', auth()->user()->wotlk->id)->get();
    }

    public function delete($id): RedirectResponse|Redirector {
        AccountTransfer::whereId($id)->delete();
        return redirect()->route('profile.transfer');
    }

    public function render()
    {
        return view('livewire.user.transfer-characters-list');
    }
}
