<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class TransactView extends Component
{
    public $item;

    public function mount($order)
    {
        $this->item = $order;
    }

    public function render()
    {
        return view('livewire.user.transact-view');
    }
}
