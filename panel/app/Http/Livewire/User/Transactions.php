<?php

namespace App\Http\Livewire\User;

use App\Models\Payment\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Transactions extends Component
{
    public $transactions;

    public function mount()
    {
        $this->transactions = History::where('service', 'balance')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.transactions');
    }
}
