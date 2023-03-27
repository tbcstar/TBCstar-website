<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request) {
        $searchTerm = '%' . $request->get('q') . '%';
        $post = Post::where('title', 'like', $searchTerm)->get();
        $characters = Characters::like('name', Str::ucfirst($request->get('q')))->limit(10)->get();
        ///$guild = Guild::like('name', Str::ucfirst($request->get('q')))->get();
        return view('search.index', [
            'post' => $post,
            'characters' => $characters,
        ]);
    }

    public function character(Request $request) {
        return view('search.characters', [
            'characters' => Characters::like('name', Str::ucfirst($request->get('q')))->paginate(10)
        ]);
    }

    public function blog(Request $request) {
        if ($request->get('q')) {
            return view('search.blog', [
                'post' => Post::like('body', Str::ucfirst($request->get('q')))->paginate(25)
            ]);
        } else {
            $user = User::where('name', $request->get('a'))->first();
            return view('article.search_author', [
                'post' => Post::where('author_id', $user->id)->orderBy('created_at', 'DESC')->paginate(25)
            ]);
        }
    }

    public function forum(Request $request): string
    {
        if(request('q') || request('a')) {
            if(request('q')) {
                $q = request('q');
                $max_page = 10;
                $results = $this->searchForum($q, $max_page);
            } else {
                $q = request('a');
                $max_page = 10;
                $results = $this->searchForumUser($q, $max_page);
            }
            return view('forum.search', [
                'result' => $results,
            ])->render();
        }
        return view('forum.search', [
            'result' => null,
        ])->render();
    }

    public function searchForum($q, $count){
        $query = mb_strtolower($q, 'UTF-8');
        return \App\Models\Post::where('title','LIKE','%'.$query.'%')->orWhere('body','LIKE','%'.$query.'%')->paginate($count);
    }

    private function searchForumUser($q, int $max_page)
    {
        $user = User::where('name', $q)->select('name', 'id')->first();
        return \App\Models\Post::where('user_id', $user->id)->whereNotNull('parent_id')->paginate($max_page);
    }
}
