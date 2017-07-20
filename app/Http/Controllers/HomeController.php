<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showHome()
    {
        return view('home');
    }

    public function showStories()
    {
        $stories = Post::paginate(10);
        return view('story', ['stories' => $stories]);
    }
}
