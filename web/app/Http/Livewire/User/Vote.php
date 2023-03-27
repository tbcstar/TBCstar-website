<?php

namespace App\Http\Livewire\User;

use App\Models\Game\AccountDonate;
use App\Models\Payment\History;
use App\Models\User;
use App\Models\User\Votes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Vote extends Component
{
    public $voteCount;
    public $voteCountDone;


    public function mount()
    {
        $this->voteCount = Votes::where('name', auth()->user()->name)->get()->count();
        $this->voteCountDone = Votes::where('name', auth()->user()->name)->whereComplete(1)->get()->count();
    }

    public function render()
    {
        return view('livewire.user.vote', [
            'votes' => Votes::where('name', auth()->user()->name)
                ->orderBy('created_at', 'DESC')
                ->paginate(10)
        ]);
    }

}
