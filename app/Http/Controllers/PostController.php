<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    
    public function CreatePost(){
        $posts = Post::all();

        return view('Post.Form.create');
    }

    public function StorePost(Request $request){
        $post = new Post();
        $request->validate([
            'post_title' => ['required', 'string', 'alpha'],
             'post_category' => ['required', 'string', 'alpha'],
             'post_thumnail' => ['required', 'file', 'image', 'mimes:png,jpg'],
             'post_image'    => ['required', 'file', 'image', 'mimes:jpg,png'],
             'post_video'    => ['required', 'file', 'video', 'mimes:mp4'],
             
        ]);
    }
}
