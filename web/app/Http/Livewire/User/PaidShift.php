<?php

namespace App\Http\Livewire\User;

use App\Models\Forum\ForumsXF;
use App\Models\Game\AccountDonate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PaidShift extends Component
{

    public $state = [];

    protected $rules = [
        'state.name' => 'required|min:3|max:10'
    ];

    protected $messages = [
        'state.name.required' => 'Введите NightHoldTag.'
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

        $user = User::where('email', auth()->user()->email)->first();

        if ($user->free_name === 1) {
            $balance = AccountDonate::where('id', $user->wotlk->id)->first();
            if ($balance) {
                if ($balance->bonuses >= setting('platnye-uslugi.NightHoldTag')) {

                    $newBalance = $balance->bonuses - setting('platnye-uslugi.NightHoldTag');
                    AccountDonate::where('id', $user->wotlk->id)->update([
                        'bonuses' => $newBalance
                    ]);

                    $forumUser = ForumsXF::where('email', $user->email)->first();

                    if ($forumUser){

                        $forumUser->update([
                            'username' => $validatedData['state']['name']
                        ]);

                        $user->update([
                            'name' => $validatedData['state']['name'],
                            'free_name' => 1
                        ]);

                    }  else {
                        $this->addError('state.name', 'Даного пользователя не найдено на форуме. Смена имени не возможна.');
                    }


                }
                $this->addError('state.name', 'У вас недостаточное бонусов');
            }
        } else {
            $forumUser = ForumsXF::where('email', $user->email)->first();

            if ($forumUser){
                $forumUser->update([
                    'username' => $validatedData['state']['name']
                ]);

                $user->update([
                    'name' => $validatedData['state']['name'],
                    'free_name' => 1
                ]);
            }  else {
                $this->addError('state.name', 'Даного пользователя не найдена на форуме. Смена имени не возможна.');
            }
        }

        ///$this->emit('saved');
        ///$this->emit('refresh-navigation-menu');

        return redirect()->route('profile.detail');
    }

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function render()
    {
        return view('livewire.user.paid-shift');
    }
}
