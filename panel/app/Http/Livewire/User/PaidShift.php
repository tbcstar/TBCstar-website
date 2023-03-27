<?php

namespace App\Http\Livewire\User;

use App\Models\Forum\ForumsXF;
use App\Models\Game\AccountDonate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaidShift extends Component
{

    public $state = [];

    protected $rules = [
        'state.username' => 'required|min:3|max:10'
    ];

    protected $messages = [
        'state.username.required' => 'Введите NightHoldTag.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function protectionValidate() {
        $validatedData = $this->validate();
    }


    public function protection() {
        $validatedData = $this->validate();

        $this->resetErrorBag();

        $user = User::whereId(auth()->id())->first();

        if ($user->info->free_name === 1) {

            $balance = AccountDonate::where('id', $user->id)->first();
            if ($balance->bonuses >= config('pay.bonus_change_tag')) {
                $forumUser = ForumsXF::where('email', $user->email)->first();
                if ($forumUser){

                    $forumUser->update([
                        'username' => $validatedData['state']['username']
                    ]);

                    AccountDonate::where('id', $user->id)->update([
                        'bonuses' => DB::raw('bonuses - ' . config('pay.bonus_change_tag'))
                    ]);

                    $this->emit('saved');
                    $this->emit('refresh-navigation-menu');

                }  else {
                    session()->flash('message', 'Даного пользователя не найдена на форуме. Смена имени не возможна.');
                }
            }
            session()->flash('message', 'У вас недостаточное бонусов');
        } else {
            $forumUser = ForumsXF::where('email', $user->email)->first();

            if ($forumUser) {

                $forumUser->update([
                    'username' => $validatedData['state']['username']
                ]);

                $user->info->update([
                    'free_name' => 1
                ]);

                session()->flash('message', 'Успешно.');

                $this->emit('saved');
                $this->emit('refresh-navigation-menu');
            }  else {
                session()->flash('message', 'Даного пользователя не найдена на форуме. Смена имени не возможна.');
            }
        }

    }

    public function mount()
    {
        $this->state = Auth::user()->forum->withoutRelations()->toArray();
    }

    public function render()
    {
        return view('livewire.user.paid-shift');
    }
}
