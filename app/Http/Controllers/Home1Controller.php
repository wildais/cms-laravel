<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    // public function home(){
    //     return view('home');
    // }

    public function home()
    {
        $articles = Cache::remember('articles', 60, function () {
            return Article::all();
        });
        return view('home')
            ->with('articles', $articles);
    }
}
