<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\CommentPosted;

class Post extends Component
{
    public $perPage = 5;

    public $post;

    public $body;

    public $attributes;

    protected $rules = [
        'body' => 'required|min:10',
    ];

    protected $listeners = [
        'addComment' => 'addComment',
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function deletePost() {

        $this->post->comments()->forceDelete();
        $post = $this->post->forums_id;
        $this->post->delete();

        return redirect()->route('forums.show', [$post]);
    }

    public function addComment()
    {
        $comment = $this->post->comments()->save(
            auth()->user()->comments()->make($this->validate())
        );

        CommentPosted::dispatch($comment);

        $this->comments = $this->post->comments()
            ->where('parent_id', 0)
            ->with('user')
            ->orderBy('created_at')
            ->withTrashed()
            ->get();

        $this->reset(['body']);
        $this->emit('userStore');
    }

    public function upvote()
    {
        $this->post->upvote(auth()->user());
    }

    public function downvote()
    {
        $this->post->downvote(auth()->user());
    }

    public function render()
    {
        $comments = $this->post->comments()
            ->where('parent_id', 0)
            ->with('user')
            ->with('reply')
            ->orderBy('created_at')
            ->withTrashed()
            ->paginate($this->perPage);

        $this->emit('userStore');

        return view('livewire.post', ['comments' => $comments]);
    }
}
