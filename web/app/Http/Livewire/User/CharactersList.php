<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class CharactersList extends Component
{
    public $list;

    public function mount($item)
    {
        $this->list = \App\Models\Characters::where('guid', $item->guid)->first();
    }

    public function updating($name, $value)
    {
        \App\Models\Characters::whereId(auth()->id())->where('isActive', 1)->update([
            'isActive' => 0
        ]);
        \App\Models\Characters::whereGuid($value)->update([
            'isActive' => 1
        ]);
    }
    public function render()
    {
        return view('livewire.user.characters-list');
    }
}
