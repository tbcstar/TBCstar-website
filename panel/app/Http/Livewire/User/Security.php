<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Security extends Component
{
    public int $progress = 0;

    public function render()
    {
        if(auth()->user()->email_verified_at) {
            $this->progress = 50;
        }
        if (isset(auth()->user()->info->phone_number)) {
            $this->progress = 50;
        }
        return view('livewire.user.security');
    }
}
