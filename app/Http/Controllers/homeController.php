<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index(){
        $title = 'home';
        return view('back.index',['title'=>$title]);
    }
}
