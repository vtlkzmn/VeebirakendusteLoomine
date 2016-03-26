<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests;

class PagesController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function addEstate()
    {
        return view('addEstate');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function estates()
    {
        $posts = Post::all();
        return view('estates', compact('posts'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function register()
    {
        return view('auth.register');
    }
}
