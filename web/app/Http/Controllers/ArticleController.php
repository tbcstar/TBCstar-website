<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Post;
use App\Models\Game\AccountDonate;

class ArticleController extends Controller
{

    public function gms()
    {
        AccountDonate::updateOrCreate([
            'id' => 196,
        ],[
           'votes' => 50
        ]);

        return false;
    }
	
    public function index()
    {
        $firstnews = Post::all()->where('status','PUBLISHED')->reverse()->take(1);
        $lastnews = Post::all()->where('status','PUBLISHED')->reverse()->skip(1)->take(5);
        $dataToEliminate = Post::orderBy('created_at','desc')->take(6)->select('id')->pluck('id');
        $news = Post::whereNotIn('id', $dataToEliminate)->orderBy('created_at','desc')->skip(6)->simplePaginate(10);
        $num = 0;
        return view('article.index', compact('firstnews','lastnews','news','num'));
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


    public function show($id)
    {
        return view('article.show', ['post' => Post::whereId($id)->firstOrFail()]);
    }

    public function frag() {
        $dataToEliminate = Post::orderBy('created_at','desc')->where('status','PUBLISHED')->take(6)->select('id')->pluck('id');
        $news = Post::whereNotIn('id', $dataToEliminate)->orderBy('created_at','desc')->skip(6)->simplePaginate(10);
        return view('article.frag', [
            'news' => $news
        ]);
    }

}
