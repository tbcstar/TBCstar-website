<?php

namespace App\Http\Livewire;

use Livewire\Component;
use TCG\Voyager\Models\Post;
use App\Services\Utils;

class News extends Component
{
    public $post;

    public function mount()
    {
        $raw = Post::select(['id','title', 'slug', 'image', 'created_at'])->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->orderBy('updated_at', 'DESC')->limit(4)->get();
        $collection = [];
        foreach($raw as $key) {
            $collection[] = $this->buildArticle($key);
        }
        $this->post = json_encode([
            'articles' =>
                $collection
        ], true);
    }

    public function render()
    {
        return view('livewire.news');
    }

    private function buildArticle($raw): array
    {
        return array(
            'id' => $raw->id,
            'category' => $raw->category,
            'title' => $raw->getTranslatedAttribute('title', App()->getLocale(), 'ru'),
            'published' => $raw->created_at,
            'image' => [
                'width' => 1200,
                'height' => 675,
                'url' => config('app.url') . '/storage/' . Utils::Images($raw->image)
            ],
            'type' => 'BLOG',
            'url' => route('news.show', [$raw->id, $raw->slug]),
            'analytics' => [
                'name' => 'home-masthead-news',
                'placement' => 'slot:0 - type:blog - id:'.$raw->id.' || ' . $raw->getTranslatedAttribute('title', App
                    ()->getLocale(), 'ru')
            ]
        );
    }
}
