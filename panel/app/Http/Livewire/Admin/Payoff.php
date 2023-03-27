<?php

namespace App\Http\Livewire\Admin;

use App\Models\Game\AccountDonate;
use App\Models\Payment\History;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Redirector;

class Payoff extends Component
{
    public $item;

    public function updates($item)
    {
        $url = 'https://enot.io/request/payoff?api_key='.
            config('enot.api_key').'&email='.
            config('enot.api_email').'&service='.
            $item['servicesKey'].'&wallet='.
            $item['wallet'].'&amount='.
            $item['price']*config('pay.bonus_payoff').'&orderid='
            .$item['order_id'];

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        if($jsonData->status === 'error') {

            session()->flash('message', $jsonData->message);

        } else {
            session()->flash('message', 'Вывод выполнен успешно.');

            History::whereId($item['id'])->update([
                'status' => 1
            ]);

            AccountDonate::updateOrCreate([
                'id' => $item['user_id'],
            ],[
                'bonuses' => DB::raw('bonuses - ' . $item['price'])
            ]);
        }
    }


    public function danger($item)
    {
        History::whereId($item['id'])->update([
            'status' => 0
        ]);

        session()->flash('message', 'Вывод отклонен.');
    }

    public function render()
    {
        return view('livewire.admin.payoff', [
            'withdraw' => History::whereService('withdraw')->whereStatus(2)->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
}
