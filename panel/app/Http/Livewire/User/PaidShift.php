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
        'state.username.required' => '请输入论坛昵称。'
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
                    session()->flash('message', '该用户在论坛中不存在。无法更改用户名。');
                }
            }
            session()->flash('message', '您的DP点数不足');
        } else {
            $forumUser = ForumsXF::where('email', $user->email)->first();

            if ($forumUser) {

                $forumUser->update([
                    'username' => $validatedData['state']['username']
                ]);

                $user->info->update([
                    'free_name' => 1
                ]);

                session()->flash('message', '成功');

                $this->emit('saved');
                $this->emit('refresh-navigation-menu');
            }  else {
                session()->flash('message', '该用户在论坛中不存在。无法更改用户名。');
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
