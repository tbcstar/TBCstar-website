<?php

namespace App\Http\Livewire\User;

use App\Services\Soap;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class SelectGiftsAndSend extends Component
{
    public $item;

    public $confirmGiftSend = false;

    public function mount($item)
    {
        $this->item = $item;
    }

    public function confirmGiftSend()
    {
        $this->resetErrorBag();

        $this->confirmGiftSend = true;
    }

    public function sendGifts(): RedirectResponse|Redirector
    {
        $soap = new Soap();
        $soap->cmd('.send items '. auth()->user()->active->name .' "'.$this->item->title.'" "Награда за акцию: Пригласи друга." '. $this->item->item .'[:'.$this->item->countItem.']');
        $this->item->update([
            'status' => 1
        ]);
        return redirect()->route('profile.transactions');
    }

    public function render()
    {
        return view('livewire.user.select-gifts-and-send');
    }
}
