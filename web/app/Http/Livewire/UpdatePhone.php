<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Redirector;

class UpdatePhone extends Component
{
    public bool $confirmingUserDelete = false;

    public mixed $password;

    public array $state = [];

    protected array $rules = [
        'state.phone_number' => 'required|min:6'
    ];

    protected array $messages = [
        'state.phone_number.required' => 'Введите номер.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function protectionValidate() {
        $validatedData = $this->validate();
    }

    public function confirmUserDelete()
    {
        $this->resetErrorBag();

        $this->password = '';

        $this->dispatchBrowserEvent('confirming-delete-user');

        $this->confirmingUserDelete = true;
    }

    /**
     * @throws ValidationException
     */
    public function delete(): RedirectResponse|Redirector
    {
        $this->resetErrorBag();

        if (! Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }
        $user = User::where('email', auth()->user()->email)->first();

        $user->update([
            'phone_number' => NULL
        ]);

        return redirect()->route('profile.detail');
    }

    public function protection() {
        $validatedData = $this->validate();

        $user = User::where('email', auth()->user()->email)->first();

        $user->update([
            'phone_number' => $validatedData['state']['phone_number']
        ]);

        return redirect()->route('profile.detail');
    }

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function render()
    {
        return view('livewire.update-phone');
    }
}
