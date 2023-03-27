<?php

namespace App\Http\Livewire\Profile;

use App\Models\Game\AccountDonate;
use App\Models\Payment\History;
use App\Services\Soap;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Redirector;

class ServiceSend extends Component
{
    public $item;

    public $confirmSend = false;

    public function mount($item)
    {
        $this->item = $item;
    }

    public function confirmSend()
    {
        $this->resetErrorBag();

        $this->confirmSend = true;
    }

    public function send(): RedirectResponse|Redirector
    {
        $balance = AccountDonate::where('id', auth()->id())->first();
        if ($balance) {
            if ($balance->bonuses >= $this->item->price) {

                AccountDonate::updateOrCreate([
                    'id' => auth()->id(),
                ],[
                    'bonuses' => DB::raw('bonuses - ' . $this->item->price)
                ]);

                $soap = new Soap();
                $soap->cmd('.unban account '. auth()->user()->username);

                History::create([
                    'user_id' => auth()->id(),
                    'service' => 'balance',
                    'services' => 'System',
                    'title' => 'Снятие блокировки аккаунта',
                    'price' => $this->item->price,
                    'status' => '1'
                ]);
            }
            $this->addError('state.name', 'У вас недостаточное бонусов');
        }
        return redirect()->route('profile.services');
    }

    public function render()
    {
        return view('livewire.profile.service-send');
    }
}
