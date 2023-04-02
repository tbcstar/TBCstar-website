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
        'username.required' => '请输入登录名。',
        'username.min' => '最小长度：:min个字符。',
        'username.max' => '最大长度：:max个字符。',
        'username.unique' => '登录名已被使用。',
        'username.regex' => '登录名只能包含拉丁字母，数字和短横线。',
        
        'password.required' => '请输入密码。',
        'password.max' => '最大长度：:max个字符。',
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
