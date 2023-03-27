<?php

namespace App\Http\Livewire\User;

use App\Models\Forum\ForumsXF;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Redirector;

class Connections extends Component
{
    public bool $confirmingUserForums = false;

    public $forums;

    public $password;

    public function mount()
    {
        $this->forums = ForumsXF::where('username', auth()->user()->name)->first();
    }

    public function confirmUserForums()
    {
        $this->resetErrorBag();

        $this->password = '';

        $this->dispatchBrowserEvent('confirming-delete-user');

        $this->confirmingUserForums = true;
    }

    /**
     * @throws ValidationException
     */
    public function connectionsUserForums(): RedirectResponse|Redirector
    {
        $this->resetErrorBag();

        if (! Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        $dir = '/var/www/www-root/data/www/community.nighthold.pro';

        require($dir.'/src/XF.php');

        \XF::start($dir);
        $app = \XF::app();

        $user = $app->repository('XF:User')->setupBaseUser();

        $user->username = auth()->user()->name;
        $user->email = auth()->user()->email;
        $user->Auth->setPassword($this->password);
        $user->save();

        return redirect()->route('profile.connections');
    }
    public function render()
    {
        return view('livewire.user.connections');
    }
}
