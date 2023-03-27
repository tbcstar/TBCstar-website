<?php

namespace App\Http\Livewire\User;

use App\Models\UserData;
use Livewire\Component;

class Referrals extends Component
{
    public int $referral;

    public function mount()
    {
        $this->referral = UserData::where('referred_by', auth()->id())->get()->count();
    }

    public function render()
    {
        return view('livewire.user.refferals', [
            'referrals' => UserData::where('referred_by', auth()->id())->with('referrer')->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
}
