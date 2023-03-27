<?php

namespace App\Http\Livewire\User;

use App\Models\Payment\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Payoff extends Component
{

    public $option;

    public $sum;

    public $service;

    public $wallet;

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
            History::create([
                'user_id' => Auth::id(),
                'service' => 'withdraw',
                'services' => 'FreeKassa',
                'servicesKey' => $this->service,
                'title' => 'Вывод средств',
                'price' => $this->sum,
                'status' => '2',
                'order_id' => time(),
                'wallet' => $this->wallet,
            ]);
            return redirect()->route('profile.transactions');
        }
        if ($this->option === 'enot') {
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
        return null;
    }

    public function render()
    {
        return view('livewire.user.payoff');
    }
}
