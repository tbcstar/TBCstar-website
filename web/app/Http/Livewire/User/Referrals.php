<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User\Referrals as Referral;

class Referrals extends Component
{
    public $referralsCount;

    public $referralsCountDone;

    public function mount()
    {
        $this->referralsCount = Referral::where('ref_id', auth()->id())->get()->count();
        $this->referralsCountDone = Referral::where('ref_id', auth()->id())->where(['status' => 1])->max('bonus') ?? 0;
    }

    public function render()
    {
        return view('livewire.user.refferals', [
            'referrals' => Referral::where('ref_id', auth()->id())->with('referrer')->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
}
