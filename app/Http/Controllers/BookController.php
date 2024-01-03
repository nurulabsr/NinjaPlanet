<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request, Illuminate\Support\Str;

class BookController extends Controller{
    public function CreateBookData(){
        $books  = Book::all();
        $categories = Category::all();
        return view('Book.Form.create', compact('books', 'categories'));
    }

    public function StoreBookData(Request $request){
        $bookData = new Book();
        $request->validate([
            'book_name'     =>    [ 'required',  'string'  ,   'alpha_num',  'size:255'  ],
            'book_author'   =>    [ 'required',  'string'  ,   'alpha_num',  'size:255'  ],
            'book_price'    =>    [ 'required',  'integer' ,   'numeric',    'min:0.001' ],
            'publish_year'  =>    [ 'required',  'string'  ,   'numeric',    'integer'   ],
            'book_category' =>    [ 'required',  'string'  ,   'alpha_num',  'size:256'  ],
            'book_description' => [ 'required',   'string',    'alpha_num',  'size:5000' ],
  
        ]);

        if($request->hasFile('book_image')){
          $request->validate([
            'book_image' => ['required', 'max:2048', 'mimes:png,jpg, jpeg'],
          ]); 
        }
        $chnage_book_image_file_name = Str::uuid() .'_Ninja_'. Str::slug($request->book_image->getClientOriginalName());
        $book_image_path = $request->book_image->storeAs('BookImage', $chnage_book_image_file_name);

        $bookData->book_name        = $request->book_name;     
        $bookData->book_authors     = $request->book_author;
        $bookData->publish_year     = $request->publish_year;
        $bookData->book_description = $request->book_description;
        $bookData->book_price       = $request->book_price;
        $bookData->category_id      = $request->book_category_id;
        $bookData->book_image       = 'storage/'.$book_image_path;

        $bookData->save();
    } 


    public function CreateBookCategoryData(){
       return view('Create');
    }

    public function StroreBookCategoryData(Request $request){
    

    }

}
