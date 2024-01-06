<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            //  'post_category' => ['required', 'string', 'alpha'],
             'post_thumnail' => ['required', 'file', 'image', 'mimes:png,jpg'],
             'post_image'    => ['required', 'file', 'image', 'mimes:jpg,png'],
             'post_video' => ['required', 'file', 'mimetypes:video/mp4', 'mimes:mp4'],
             'post_description' => ['required', 'string', '']

        ]);

        $post->post_title = $request->post_title;
        $post->post_thumnail = $request->post_thumnail;
        $post->post_image = $request->post_image;
        $post->post_video = $request->post_video;
        $post->post_description = $request->post_description;
        $post->save();
    }

    public function CreateCategoryPost(){
        view('Post.Form.category-create');
    }
    public function StoreCategoryPost(Request $request){
       $postCategory = new Category();
       $request->validate([
           'post_category' => ['required', 'alpha', 'string']
       ]);
    }
}
