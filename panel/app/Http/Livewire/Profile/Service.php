<?php

namespace App\Http\Livewire\Profile;

use App\Models\Services;
use Livewire\Component;

class Service extends Component
{

    public $data;

    public function mount()
    {
        $this->data = Services::where('active', 1)->get();
    }

    public function render()
    {
        return view('livewire.profile.service');
    }
}
