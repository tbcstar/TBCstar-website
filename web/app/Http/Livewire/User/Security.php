<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Security extends Component
{
    public $countProgress = 0;

    public function render()
    {
        if(auth()->user()->email_verified_at) {
            $this->countProgress = 33;
        }
        if (auth()->user()->two_factor_secret) {
            $this->countProgress = 67;
        }
        if (auth()->user()->phone_number) {
            $this->countProgress = 100;
        }
        return view('livewire.user.security');
    }
}
