<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    // public function artikel($id){
    //     $article = Article::find($id);
    //     return view('article',['article' => $article]);
    // }
    
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-articles')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function artikel($id)
    {
        $article = Cache::remember("article:$id", 60, function () use ($id) {
            return Article::findOrFail($id);
        });
        return view('article')
            ->with('article', $article);
    }

    public function index()
    {
        $article = Article::all();
        return view('manage',['article' => $article]);
    }

    public function add()
    {
        return view('addarticle');
    }

    public function create(Request $request)
    {
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $request->image
        ]);
        return redirect('/manage');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('editarticle',['article'=>$article]);
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->featured_image = $request->image;
        $article->save();
        return redirect('/manage');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/manage');
    }
}