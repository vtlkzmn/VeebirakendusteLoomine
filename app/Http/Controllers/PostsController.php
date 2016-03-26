<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Post;
use Illuminate\Http\Request;
use \DB;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    public function reviews(Post $post)
    {
        return view('reviews', compact('post'));
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

    public function deleteEstate($post)
    {
        DB::table('posts')->where('id', $post)->delete();

        return back();
    }

    public function addEstate(Request $request)
    {

        DB::table('posts')->insert([
            'subject' => $request->subject,
            'body' => $request->body
        ]);

        return back();
    }
}
