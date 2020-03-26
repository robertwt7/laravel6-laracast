<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
        // we're using DB Facade that's why we need to use backlash, otherwise we can call use DB; on top
        // $post = \DB::table('posts')->where('slug', $slug)->first();

        // Now since we are using model we are not going to use DB facade anymore
        $post = Post::where('slug', $slug)->firstOrFail();

        // Cancelled because we use firstOrFail
        // if (! $post) {
        //     abort(404);
        // }

        return view('post', [
            'post' => $post
        ]);
    }
}
