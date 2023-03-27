<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class TransactShow extends Component
{
    public $user;

    public $activeTab = 'trans';

    public $validTabs = ['trans', 'gifts'];

    public function setTab($tab)
    {
        if (! in_array($tab, $this->validTabs)) {
            return;
        }
        $this->activeTab = $tab;
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.user.transact-show');
    }
}
