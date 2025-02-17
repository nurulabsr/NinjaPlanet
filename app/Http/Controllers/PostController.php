<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PostController extends Controller{
    
    public function CreatePost(){
        $posts = Post::all();
        $categories = PostCategory::all();
        return view('Post.Form.create', compact('posts', 'categories'));
    }

    public function StorePost(Request $request){
        $post = new Post();
        $request->validate([
             'post_title' => ['required', 'string', 'alpha'],
             'post_category' => ['required', 'string'],
             'post_thumnail' => ['required', 'file', 'image', 'mimes:png,jpg'],
             'post_image'    => ['required', 'file', 'image', 'mimes:jpg,png'],
             'post_video' => ['required', 'file', 'mimetypes:video/mp4', 'mimes:mp4'],
             'post_description' => ['required', 'string']

        ]);
         $changeFileName = Str::uuid() .'__'. Str::slug($request->post_thumnail->getClientOriginalName());
         $filePath = $request->post_thumnail->storeAs('PostImage', $changeFileName);
         $changeFileName2 = Str::uuid() .'__'. Str::slug($request->post_image->getClientOriginalName());
         $filePath2 = $request->post_image->storeAs('PostImage2', $changeFileName2);
        $post->post_title = $request->post_title;
        $post->post_thumnail = 'storage/'.$filePath;
        $post->post_image = 'storage/'.$filePath2;
        $post->category_id = $request->post_category;
        $post->post_video = $request->post_video;
        $post->post_description = $request->post_description;
        $post->save();
        // return redirect()->route('post.create');
    }

    public function CreateCategoryPost(){
        return view('Post.Form.create-category');
    }
    public function StoreCategoryPost(Request $request){
        $request->validate([
            'post_category' => ['required', 'alpha', 'string', 'alpha_dash'],
        ]);
       $postCategory = PostCategory::firstOrNew(['post_category_name' => $request->post_category]);
       $postCategory->post_category_name = $request->post_category;
       $postCategory->save();
       return redirect()->route('post.category.create')->with('success', 'Category created successfully');;
    }
}
