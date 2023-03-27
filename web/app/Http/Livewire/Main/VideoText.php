<?php

namespace App\Http\Livewire\Main;

use App\Models\Main\VideoText as Video;
use Livewire\Component;
use Illuminate\Support\Facades\Redis;

class VideoText extends Component
{
    public $video_text;

    public function mount()
    {
        $this->video_text = Video::orderBy('created_at')->first();
    }

    public function render()
    {
        return view('livewire.main.video-text');
    }
}
