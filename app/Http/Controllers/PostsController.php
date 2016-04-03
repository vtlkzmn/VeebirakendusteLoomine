<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Post;
use Illuminate\Http\Request;
use \DB;
use Illuminate\Support\Facades\Redirect;
use DateTime;


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
            'body' => $request->body,
            "created_at" => new DateTime
        ]);

        return back();
    }

    public function getLatestEstate(){
        if(\Request::ajax()){
            $newest_progress = DB::table("posts")->whereNotNull("created_at")->orderBy("created_at","desc")->first();
            $created = $newest_progress->created_at;
            $subject = $newest_progress->subject;
            $body = $newest_progress->body;
                return \Response::json(array(
                    'created' => $created,
                    'subject'   => $subject,
                    'body'   => $body
                ));
        }
    }

    public function getMyXML(){

        if(\Request::ajax()){

            $filename ="myxml.xml"; // public folder

            try
            {
                $contents = \File::get($filename);
            }
            catch (Illuminate\Filesystem\FileNotFoundException $exception)
            {
                die("The file doesn't exist");
            }

            return \Response::make($contents,200)->header('Content-Type','application/xml');

        }
    }


}
