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

    public function offline_addEstate()
    {
        return view('offline_addEstate');
    }

    public function reviews()
    {
        return view('reviews');
    }

    protected $posts_per_page = 7;

    public function estates(Request $request)
    {
        $posts = Post::paginate($this->posts_per_page);

        if ($request->ajax()){
            return [
                'posts' => view('ajax.estates', compact('posts'))->render(),
                'next_page' => $posts->nextPageUrl()
            ];
        }

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
