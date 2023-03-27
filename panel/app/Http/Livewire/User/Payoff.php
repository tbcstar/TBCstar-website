<?php

namespace App\Http\Livewire\User;

use App\Models\Payment\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Payoff extends Component
{

    public $sum;

    public $service;

    public $wallet;

    public $enable;

    protected function rules()
    {
        return [
            'sum' => [
                'required',
                'numeric',
                'min:'.$this->ruleMinPayoff(),
                'max:'.auth()->user()->donate->bonuses,
            ],
            'wallet' => [
                'required',
                'numeric',
                'min:'.$this->ruleMinWallet()
            ]
        ];
    }

    private function ruleMinWallet()
    {
        if ($this->service === 'qw') {
            return 11;
        } elseif( $this->service === 'ya') {
            return 14;
        } else {
            return 16;
        }
    }


    private function ruleMinPayoff() {
        if ($this->service === 'qw' || $this->service === 'ya') {
            return config('pay.bonus_min_payoff');
        } else {
            return config('pay.bonus_min_payoff_cd');
        }
    }

    protected $messages = [
        'sum.required' => 'Введите количество бонусов.',
        'sum.min' => 'Минимальная сумма: :min.',
        'sum.max' => 'Максимальная сумма: :max.',
        'sum.numeric' => 'Введите числовое значение.',
        'wallet.required' => 'Укажите номер для вывода',
        'wallet.numeric' => 'Введите числовое значение.',
        'wallet.min' => 'Минимальное количество символов :min',
    ];

    public function mount()
    {
        $this->enable = config('pay.enable_payoff');
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

        History::create([
            'user_id' => Auth::id(),
            'service' => 'withdraw',
            'services' => 'Enot',
            'servicesKey' => $this->service,
            'title' => 'Вывод средств',
            'price' => $this->sum,
            'status' => '2',
            'order_id' => time(),
            'wallet' => $this->wallet,
        ]);

        return redirect()->route('profile.transactions');
    }

    public function render()
    {
        return view('livewire.user.payoff');
    }
}
