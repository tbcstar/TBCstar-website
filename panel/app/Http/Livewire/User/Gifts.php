<?php

namespace App\Http\Livewire\User;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class Gifts extends Component
{
    public $user;

    public function select(): RedirectResponse|Redirector
    {
        return redirect()->route('profile.characters');
    }
    public function render()
    {
        $gifts = $this->user->gifts()->get()->sortByDesc('created_at');

        return view('livewire.user.gifts', compact('gifts'));
    }
}
