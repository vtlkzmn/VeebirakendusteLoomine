<?php

namespace App\Http\Controllers;

use App\Review;
use App\Post;
use Illuminate\Http\Request;
use \DB;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function addReview(Request $request, Post $post)
    {
        $review = new Review();

        $review->post_id = $post->id;
        $review->body = $request->post_body;

        $post->reviews()->save($review);

        return back();
    }

    public function deleteReviews($post)
    {
        DB::table('reviews')->where('post_id', $post)->delete();

        return back();
    }

    public function deletePost($post) {
        DB::table('posts')->where('id', $post)->delete();

        return back();
    }
}
