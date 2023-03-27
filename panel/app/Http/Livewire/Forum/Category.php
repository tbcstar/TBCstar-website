<?php

namespace App\Http\Livewire\Forum;

use App\Models\Forum\Forums;
use Livewire\Component;

class Category extends Component
{

    public $category;

    public function mount() {
        $this->category = Forums::where('parent_id', 0)->with('parent')->orderByDesc('created_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.forum.category');
    }
}
