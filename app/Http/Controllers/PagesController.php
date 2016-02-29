<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function home()
    {
        return view('/');
    }

    public function states()
    {
        return view('states');
    }

    public function contact()
    {
        return view('contact');
    }

    public function reviews() {
        return view('reviews.index');
    }
}
