<?php

namespace App\Http\Livewire;

use App\Models\Forum\ForumsXF;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Livewire\Redirector;

class UpdateEmail extends Component
{
    public array $state = [];

    protected array $rules = [
        'state.email' => 'required|email|min:6'
    ];

    protected array $messages = [
        'state.email.required' => 'Введите email.',
        'state.email.email' => 'Введите корректный email.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function protectionValidate() {
        $validatedData = $this->validate();
    }

    public function update() {
        $validatedData = $this->validate();

        $user = User::where('email', auth()->user()->email)->first();

        if ($validatedData['state']['email'] !== $user->email) {

            ForumsXF::where('email', $user->email)->update([
                'email' => $validatedData['state']['email']
            ]);

            $user->update([
                'email' => $validatedData['state']['email'],
                'email_verified_at' => null,
            ]);

            $user->sendEmailVerificationNotification();

        }
        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function render()
    {
        return view('livewire.update-email');
    }

}
