<?php

namespace App\Http\Livewire\User;

use App\Models\Payment\History;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class Payment extends Component
{
    public $option;

    public $sum;

    public $enable;

    protected $messages = [
        'sum.required' => 'Введите количество бонусов.',
        'sum.min' => 'Минимальная сумма: :min бонусов.'
    ];

    protected function rules()
    {
        return [
            'sum' => [
                'required',
                'numeric',
                'min:'.config('pay.bonus_min_payment')
            ]
        ];
    }

    public function mount()
    {
        $this->enable = config('pay.enable_payment');
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
            $order_amount = $this->sum*config('pay.bonus_payment');
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

            $url = 'https://pay.freekassa.ru/?m='.$merchant_id.'&oa='.$order_amount.'&o='.$order_id.'&s='.$sign.'&currency=RUB&us_login='.Auth::user()->username;
            return redirect($url);
        }
        if ($this->option === 'enot') {

            $MERCHANT_ID   = config('enot.app_id');
            $SECRET_WORD   = config('enot.secret_key_1');
            $PAYMENT_ID    = time();
            $ORDER_AMOUNT  = $this->sum*config('pay.bonus_payment');

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
