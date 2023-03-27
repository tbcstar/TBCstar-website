<?php

namespace App\Http\Livewire\User;

use App\Models\Payment\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Transact extends Component
{
    public $user;

    public function render()
    {
        $transact = $this->user->transactions()->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.user.transact', compact('transact'));
    }
}
