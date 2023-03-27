<?php

namespace App\Http\Livewire;

use App\Models\Game\Wotlk;
use App\Models\User;
use Livewire\Component;

class CreateGameAccount extends Component
{
    public $option;

    public $username;

    public $password;

    public $email;

    public $account;

    protected $rules = [
        'username' => 'required|string|min:3|max:16|unique:WotlkAuth.account,username|regex:/(^([a-zA-Z0-9-]+)(\d+)?$)/u',
        'password' => 'required|max:16'
    ];

    protected $messages = [
        'username.required' => 'Введите логин.',
        'username.min' => 'Минимальная длина: :min символов.',
        'username.max' => 'Максимальная длина: :max символов.',
        'username.unique' => 'Логин уже занят.',
        'username.regex' => 'Логин может содержать только латинские буквы, цифры и дефис',

        'password.required' => 'Введите пароль.',
        'password.max' => 'Максимальная длина: :max символов.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->account = auth()->user()->wotlk;
    }

    public function createValidate() {

        $validatedData = $this->validate();
    }

    public function create() {

        $validatedData = $this->validate();

        $hashed_pass = strtoupper(sha1(strtoupper($validatedData['username'] . ':' . $validatedData['password'])));

        Wotlk::create([
            'username' => $validatedData['username'],
            'sha_pass_hash' => $hashed_pass,
            'email' => $this->email,
            'reg_mail' => $this->email,
            'expansion' => '2'
        ]);

        $user = User::where('email', auth()->user()->email)->first();

        $user->update([
            'username' => $validatedData['username']
        ]);
        $this->reset(['username']);
        $this->emit('saved');

        return redirect()->route('profile.games');
    }

    public function render()
    {
        return view('livewire.create-game-account');
    }
}
