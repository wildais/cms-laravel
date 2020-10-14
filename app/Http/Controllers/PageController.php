<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return ('Selamat Datang');
    }

    public function about(){
        return ('NAMA-NIM');
    }

    public function artikel($id){
        return ('Halaman artikel dengan id ').$id;
    }
}