<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Gifts extends Component
{
    public $user;

    public function render()
    {
        $gifts = $this->user->gifts()->get()->sortByDesc('created_at');

        return view('livewire.user.gifts', compact('gifts'));
    }
}
