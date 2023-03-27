<?php

namespace App\Http\Livewire;

use App\Models\Main\VideoFone;
use Livewire\Component;

class VideoPane extends Component
{
    public $fines;

    public function mount()
    {
        $this->fines = VideoFone::orderBy('created_at')->first();
    }

    public function render()
    {
        return view('livewire.video-pane');
    }
}
