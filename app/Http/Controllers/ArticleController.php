<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function artikel($id){
        return ('Halaman artikel dengan id ').$id;
    }
}
