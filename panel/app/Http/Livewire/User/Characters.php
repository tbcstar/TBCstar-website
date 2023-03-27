<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Characters extends Component
{
    public $characters;

    public function update($guid) {
        \App\Models\Characters::whereAccount(auth()->id())->where('isActive', 1)->update([
            'isActive' => 0
        ]);
        \App\Models\Characters::whereGuid($guid)->update([
            'isActive' => 1
        ]);

        return redirect()->route('profile.characters');
    }

    public function mount()

    {
        $this->characters = \App\Models\Characters::whereAccount(auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.user.characters');
    }
}
