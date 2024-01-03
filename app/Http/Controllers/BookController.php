<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

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
    }

}
