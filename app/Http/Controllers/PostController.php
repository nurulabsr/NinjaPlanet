<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    
    public function CreatePost(){
        $posts = Post::all();

        return view('Post.Form.create');
    }
}
