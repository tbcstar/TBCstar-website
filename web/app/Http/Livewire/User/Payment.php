<?php

namespace App\Http\Livewire\User;

use App\Models\Payment\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maksa988\FreeKassa\Facades\FreeKassa;

class Payment extends Component
{
    public $option;

    public $sum;

    public $game;

    protected $rules = [
        'sum' => [
            'required',
            'numeric',
            'min:5'
        ],
    ];

    protected $messages = [
        'sum.required' => 'Введите количество бонусов.',
        'sum.min' => 'Минимальная сумма: :min бонусов.'
    ];

    public function mount()
    {
        $this->game = Auth::user()->wotlk;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function paymentCreateValidate() {
        $validatedData = $this->validate();
    }

    public function paymentCreate() {
        $validatedData = $this->validate();

        if ($this->option === 'FreeKassa') {
            $order_id = time();
            $merchant_id = config('freekassa.project_id');
            $secret_word = config('freekassa.secret_key');
            $order_amount = $this->sum*setting('platnye-uslugi.payment_bonus');
            $currency = 'RUB';
            $sign = md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$currency.':'.$order_id);

            History::create([
                'user_id' => Auth::id(),
                'service' => 'balance',
                'services' => 'FreeKassa',
                'title' => 'Пополнение баланса',
                'price' => $this->sum,
                'status' => '0',
                'order_id' => $order_id
            ]);

            $url = 'https://pay.freekassa.ru/?m='.$merchant_id.'&oa='.$order_amount.'&o='.$order_id.'&s='.$sign.'&currency=RUB&us_login='.Auth::user()->name;
            return redirect($url);
        }
        if ($this->option === 'enot') {

            $MERCHANT_ID   = config('enot.app_id');
            $SECRET_WORD   = config('enot.secret_key_1');
            $PAYMENT_ID    = time();
            $ORDER_AMOUNT  = $this->sum*setting('platnye-uslugi.payment_bonus');

            $sign = md5($MERCHANT_ID.':'.$ORDER_AMOUNT.':'.$SECRET_WORD.':'.$PAYMENT_ID);

            History::create([
                'user_id' => Auth::id(),
                'service' => 'balance',
                'services' => 'Enot',
                'title' => 'Пополнение баланса',
                'price' => $this->sum,
                'status' => '0',
                'order_id' => $PAYMENT_ID
            ]);

            $url = 'https://enot.io/pay?m='.$MERCHANT_ID.'&oa='.$ORDER_AMOUNT.'&o='.$PAYMENT_ID.'&s='.$sign.'&cr=RUB';
            return redirect($url);
        }
        return null;
    }

    public function render()
    {
        return view('livewire.user.payment');
    }
}
