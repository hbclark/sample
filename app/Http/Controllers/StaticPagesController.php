<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StaticPagesController extends Controller
{
    public function home(){
        $feed_items=[];
        if(Auth::check()){
            $feed_items=Auth::user()->feed()->paginate(30);
        }
        return view('static-pages.home',compact('feed_items'));
    }
    public function help(){
        return view('static-pages.help');
    }
    public function about(){
        return view ('static-pages.about');
    }
    public function default(){
        return view('layouts.default');
    }
}
