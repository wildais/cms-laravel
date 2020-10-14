<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    // public function artikel($id){
    //     $article = Article::find($id);
    //     return view('article',['article' => $article]);
    // }

    public function artikel($id)
    {
        $article = Cache::remember("article:$id", 60, function () use ($id) {
            return Article::findOrFail($id);
        });
        return view('article')
            ->with('article', $article);
    }
}
